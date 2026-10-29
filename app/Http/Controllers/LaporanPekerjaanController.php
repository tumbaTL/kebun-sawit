<?php

namespace App\Http\Controllers;

use App\Models\WorkReport;
use App\Models\WorkTask;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Throwable;

class LaporanPekerjaanController extends Controller
{
    public function index(Request $request): View
    {
        $workerId = $request->user()->id;

        $assignedTasks = WorkTask::query()->where('worker_id', $workerId);

        $tugas = (clone $assignedTasks)
            ->orderBy('deadline')
            ->orderBy('task_code')
            ->get([
                'id',
                'task_code',
                'name',
                'location',
                'start_date',
                'deadline',
                'status',
            ]);

        $totalTugas = (clone $assignedTasks)->count();

        $tugasSelesai = (clone $assignedTasks)
            ->where('status', 'Selesai')
            ->count();

        $riwayat = WorkReport::query()
            ->with('task:id,task_code,name')
            ->where('worker_id', $workerId)
            ->orderByDesc('work_date')
            ->orderByDesc('id')
            ->get();

        return view('dashboard.laporan-pekerjaan', [
            'tugas' => $tugas,
            'riwayat' => $riwayat,
            'totalTugas' => $totalTugas,
            'tugasSelesai' => $tugasSelesai,
            'reportCode' => $this->generateReportCode(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $workerId = $request->user()->id;

        $validated = $request->validate([
            'id_laporan' => [
                'required',
                'string',
                'max:40',
                'regex:/^REP-[A-Za-z0-9-]+$/',
                'unique:work_reports,report_code',
            ],
            'tanggal_pekerjaan' => [
                'required',
                'date',
                'before_or_equal:today',
            ],
            'tugas_id' => [
                'required',
                'integer',
                Rule::exists('work_tasks', 'id')->where(
                    fn($query) => $query->where('worker_id', $workerId)
                ),
            ],
            'catatan' => [
                'required',
                'string',
                'max:10000',
            ],
            'harvest_tons' => [
                'nullable',
                'numeric',
                'gt:0',
            ],
            'foto' => [
                'nullable',
                'array',
                'max:3',
            ],
            'foto.*' => [
                'image',
                'mimes:jpg,jpeg,png',
                'max:5120',
            ],
        ], [
            'id_laporan.unique' => 'ID laporan ini sudah digunakan. Muat ulang halaman lalu coba lagi.',
            'tanggal_pekerjaan.before_or_equal' => 'Tanggal pekerjaan tidak boleh di masa depan.',
            'tugas_id.exists' => 'Tugas yang dipilih tidak ditugaskan kepada akun Anda.',
            'harvest_tons.numeric' => 'Jumlah hasil panen harus berupa angka dalam satuan ton.',
            'harvest_tons.gt' => 'Jumlah hasil panen harus lebih besar dari 0 ton.',
            'foto.max' => 'Maksimal 3 foto untuk satu laporan.',
            'foto.*.image' => 'Semua file yang diunggah harus berupa gambar.',
            'foto.*.mimes' => 'Foto harus berformat JPG atau PNG.',
            'foto.*.max' => 'Ukuran setiap foto maksimal 5 MB.',
        ]);

        $task = WorkTask::query()
            ->where('worker_id', $workerId)
            ->findOrFail((int) $validated['tugas_id']);

        // Mengenali tugas panen berdasarkan nama tugas.
        $isHarvestTask = Str::contains(
            Str::lower($task->name),
            ['panen', 'pemanenan']
        );

        // Jumlah hasil panen wajib diisi untuk tugas panen.
        if ($isHarvestTask && !$request->filled('harvest_tons')) {
            return back()
                ->withErrors([
                    'harvest_tons' => 'Jumlah hasil panen wajib diisi untuk tugas panen.',
                ])
                ->withInput();
        }

        // Foto tetap disimpan pada disk lokal.
        // Database menyimpan path foto, bukan file gambar secara langsung.
        $savedPaths = [];

        try {
            foreach ($request->file('foto', []) as $photo) {
                $path = $photo->store(
                    'laporan-pekerjaan/' . $workerId,
                    'local'
                );

                if (!$path) {
                    throw new \RuntimeException(
                        'Foto gagal disimpan ke folder penyimpanan.'
                    );
                }

                $savedPaths[] = $path;
            }

            WorkReport::create([
                'report_code' => $validated['id_laporan'],
                'worker_id' => $workerId,
                'work_task_id' => $task->id,
                'task_name' => $task->name,
                'task_location' => $task->location,
                'work_date' => $validated['tanggal_pekerjaan'],
                'notes' => $validated['catatan'],

                // Simpan tonase hanya untuk laporan tugas panen.
                'harvest_tons' => $isHarvestTask
                    ? $validated['harvest_tons']
                    : null,

                'photo_paths' => $savedPaths ?: null,
                'status_verification' => 'Menunggu',
            ]);
        } catch (Throwable $exception) {
            if ($savedPaths !== []) {
                Storage::disk('local')->delete($savedPaths);
            }

            throw $exception;
        }

        return redirect()
            ->route('pekerja.laporan-pekerjaan')
            ->with(
                'success',
                'Laporan ' . $validated['id_laporan'] . ' berhasil dikirim.'
            );
    }

    private function generateReportCode(): string
    {
        do {
            $code = 'REP-' . now()->format('Ymd') . '-' . Str::upper(Str::random(4));
        } while (
            WorkReport::query()
                ->where('report_code', $code)
                ->exists()
        );

        return $code;
    }
}
