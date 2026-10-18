<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkTask;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class InputPekerjaanController extends Controller
{
    public function index()
    {
        $tasks = WorkTask::with('worker')
            ->latest()
            ->paginate(10);

        $workers = User::query()
            ->where('role', 'pekerja')
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('dashboard.pekerjaan', [
            'tasks' => $tasks,
            'workers' => $workers,
            'nextTaskCode' => $this->generateTaskCode(),
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'id_tugas' => Str::upper(trim((string) $request->input('id_tugas'))),
        ]);

        $validated = $request->validate([
            'id_tugas' => [
                'required',
                'string',
                'max:30',
                'unique:work_tasks,task_code',
            ],
            'nama_tugas' => ['required', 'string', 'max:150'],
            'pekerja' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->where('role', 'pekerja'),
            ],
            'lokasi' => ['required', 'string', 'max:150'],
            'tanggal_mulai' => ['required', 'date'],
            'deadline' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'deskripsi' => ['nullable', 'string', 'max:5000'],
        ], [
            'id_tugas.required' => 'ID tugas wajib diisi.',
            'id_tugas.unique' => 'ID tugas tersebut sudah digunakan.',
            'nama_tugas.required' => 'Nama tugas wajib diisi.',
            'pekerja.required' => 'Pilih anggota tim yang akan mengerjakan tugas.',
            'pekerja.exists' => 'Akun yang dipilih bukan akun pekerja yang valid.',
            'lokasi.required' => 'Lokasi blok wajib diisi.',
            'tanggal_mulai.required' => 'Tanggal mulai wajib diisi.',
            'deadline.after_or_equal' => 'Deadline tidak boleh lebih awal dari tanggal mulai.',
        ]);

        WorkTask::create([
            'task_code' => $validated['id_tugas'],
            'name' => $validated['nama_tugas'],
            'worker_id' => $validated['pekerja'],
            'location' => $validated['lokasi'],
            'start_date' => $validated['tanggal_mulai'],
            'deadline' => $validated['deadline'],
            'description' => $validated['deskripsi'] ?? null,
            'status' => 'Belum Dimulai',
            'created_by' => $request->user()->id,
        ]);

        return redirect()
            ->route('pemilik.input-pekerjaan')
            ->with('success', 'Tugas ' . $validated['id_tugas'] . ' berhasil disimpan.');
    }

    public function update(Request $request, WorkTask $task)
    {
        $request->merge([
            'id_tugas' => Str::upper(trim((string) $request->input('id_tugas'))),
        ]);

        $validated = $request->validate([
            'id_tugas' => [
                'required',
                'string',
                'max:30',
                Rule::unique('work_tasks', 'task_code')->ignore($task->id),
            ],
            'nama_tugas' => ['required', 'string', 'max:150'],
            'pekerja' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->where('role', 'pekerja'),
            ],
            'lokasi' => ['required', 'string', 'max:150'],
            'tanggal_mulai' => ['required', 'date'],
            'deadline' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'deskripsi' => ['nullable', 'string', 'max:5000'],
            'status' => [
                'required',
                Rule::in(['Belum Dimulai', 'Sedang Jalan', 'Selesai']),
            ],
        ], [
            'id_tugas.required' => 'ID tugas wajib diisi.',
            'id_tugas.unique' => 'ID tugas tersebut sudah digunakan.',
            'nama_tugas.required' => 'Nama tugas wajib diisi.',
            'pekerja.required' => 'Pilih anggota tim yang akan mengerjakan tugas.',
            'pekerja.exists' => 'Akun yang dipilih bukan akun pekerja yang valid.',
            'lokasi.required' => 'Lokasi blok wajib diisi.',
            'tanggal_mulai.required' => 'Tanggal mulai wajib diisi.',
            'deadline.after_or_equal' => 'Deadline tidak boleh lebih awal dari tanggal mulai.',
        ]);

        $task->update([
            'task_code' => $validated['id_tugas'],
            'name' => $validated['nama_tugas'],
            'worker_id' => $validated['pekerja'],
            'location' => $validated['lokasi'],
            'start_date' => $validated['tanggal_mulai'],
            'deadline' => $validated['deadline'],
            'description' => $validated['deskripsi'] ?? null,
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('pemilik.input-pekerjaan')
            ->with('success', 'Tugas ' . $task->task_code . ' berhasil diperbarui.');
    }

    public function destroy(WorkTask $task)
    {
        $taskCode = $task->task_code;
        $task->delete();

        return redirect()
            ->route('pemilik.input-pekerjaan')
            ->with('success', 'Tugas ' . $taskCode . ' berhasil dihapus.');
    }

    private function generateTaskCode(): string
    {
        $year = now()->format('Y');
        $sequence = 1;

        do {
            $code = sprintf('TSK-%s-%03d', $year, $sequence);
            $sequence++;
        } while (WorkTask::where('task_code', $code)->exists());

        return $code;
    }
}
