<?php

namespace App\Http\Controllers;

use App\Models\WorkTask;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardPekerjaController extends Controller
{
    public function index(Request $request): View
    {
        $worker = $request->user();

        // Ambil hanya tugas milik pekerja yang sedang login.
        $assignedTasks = WorkTask::query()
            ->where('worker_id', $worker->id);

        // Tugas yang berada dalam rentang tanggal hari ini.
        $jumlahTugas = (clone $assignedTasks)
            ->whereDate('start_date', '<=', today()->toDateString())
            ->whereDate('deadline', '>=', today()->toDateString())
            ->count();

        // Fallback: jika tidak ada tugas tepat di rentang tanggal hari ini, tampilkan total tugas aktif
        if ($jumlahTugas === 0) {
            $jumlahTugas = (clone $assignedTasks)
                ->where('status', '!=', 'Selesai')
                ->count();
        }

        $jumlahSelesai = (clone $assignedTasks)
            ->where('status', 'Selesai')
            ->count();

        $jumlahBelumSelesai = (clone $assignedTasks)
            ->where('status', '!=', 'Selesai')
            ->count();

        // Daftar seluruh tugas pekerja, termasuk yang akan datang
        // dan yang terlambat.
        $tugas = (clone $assignedTasks)
            ->orderBy('deadline')
            ->orderByDesc('id')
            ->get()
            ->map(function (WorkTask $task): array {
                $statusAsli = mb_strtolower(
                    trim((string) $task->status)
                );

                $isSelesai = $statusAsli === 'selesai';

                $isOverdue = !$isSelesai
                    && $task->deadline
                    && $task->deadline->lt(today());

                if ($isSelesai) {
                    $status = 'Selesai';
                    $statusClass = 'selesai';
                } elseif ($isOverdue) {
                    $status = 'Terlambat';
                    $statusClass = 'terlambat';
                } elseif (in_array(
                    $statusAsli,
                    ['sedang jalan', 'berjalan', 'in progress'],
                    true
                )) {
                    $status = 'Berjalan';
                    $statusClass = 'berjalan';
                } else {
                    $status = 'Menunggu';
                    $statusClass = 'menunggu';
                }

                if ($isOverdue) {
                    $deadlineText = 'TERLEWAT';
                } elseif (!$task->deadline) {
                    $deadlineText = '—';
                } elseif ($task->deadline->isToday()) {
                    $deadlineText = 'Hari ini';
                } elseif ($task->deadline->isTomorrow()) {
                    $deadlineText = 'Besok';
                } else {
                    $deadlineText = $task->deadline->format('d M Y');
                }

                return [
                    'id' => $task->task_code,
                    'jenis' => $task->name,
                    'lokasi' => $task->location ?: '—',
                    'deadline' => $deadlineText,
                    'status' => $status,
                    'class' => $statusClass,
                ];
            })
            ->all();

        $namaPekerja = $worker->name ?? 'Pekerja';
        $namaDepan = explode(' ', trim($namaPekerja))[0] ?: 'Pekerja';

        return view('dashboard.pekerja', compact(
            'namaPekerja',
            'namaDepan',
            'jumlahTugas',
            'jumlahSelesai',
            'jumlahBelumSelesai',
            'tugas'
        ));
    }
}