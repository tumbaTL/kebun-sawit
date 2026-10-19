<?php

namespace App\Http\Controllers;

use App\Models\WorkTask;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArahanTugasController extends Controller
{
    public function index(Request $request): View
    {
        // Pekerja hanya boleh melihat tugas yang ditugaskan kepadanya.
        $assignedTasks = WorkTask::query()
            ->where('worker_id', $request->user()->id);

        $totalTugas = (clone $assignedTasks)->count();

        $sedangBerjalan = (clone $assignedTasks)
            ->where('status', 'Sedang Jalan')
            ->count();

        $terlambat = (clone $assignedTasks)
            ->whereDate('deadline', '<', today())
            ->where('status', '!=', 'Selesai')
            ->count();

        // Tabel work_tasks belum memiliki kolom completed_at.
        // Untuk sementara updated_at hari ini dipakai sebagai perkiraan selesai hari ini.
        $selesai = (clone $assignedTasks)
            ->where('status', 'Selesai')
            ->whereDate('updated_at', now()->toDateString())
            ->count();

        $tasks = (clone $assignedTasks)
            ->orderBy('deadline')
            ->orderByDesc('id')
            ->get()
            ->map(function (WorkTask $task): array {
                $isOverdue = $task->status !== 'Selesai'
                    && $task->deadline
                    && $task->deadline->lt(today());

                $displayStatus = match (true) {
                    $task->status === 'Selesai' => 'Completed',
                    $isOverdue => 'Urgent',
                    $task->status === 'Sedang Jalan' => 'In Progress',
                    default => 'Pending',
                };

                return [
                    'id' => '#' . $task->task_code,
                    'name' => $task->name,
                    'detail' => $task->description ?: 'Tidak ada deskripsi tambahan',
                    'location' => $task->location,
                    'date' => $task->deadline?->format('M d, Y') ?? '-',
                    'status' => $displayStatus,
                ];
            })
            ->all();

        return view('dashboard.arahan-tugas', compact(
            'tasks',
            'totalTugas',
            'sedangBerjalan',
            'terlambat',
            'selesai'
        ));
    }
}

