<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\MaintenanceRecord;
use App\Models\MaintenanceSchedule;
use App\Models\Tree;
use App\Models\User;
use App\Models\WorkTask;
use Illuminate\Support\Collection;

class DashboardPemilikController extends Controller
{
    public function index()
    {
        $totalTrees = Tree::count();
        $totalWorkers = User::where('role', 'pekerja')->count();

        $activeTasks = WorkTask::whereNotIn('status', [
            'Selesai',
            'Dibatalkan',
        ])->count();

        $overdueTasks = WorkTask::whereDate('deadline', '<', today())
            ->whereNotIn('status', ['Selesai', 'Dibatalkan'])
            ->count();

        $todaySchedules = MaintenanceSchedule::whereDate('schedule_date', today())->count();

        $healthyTrees = Tree::where('condition', 'Sehat')->count();
        $healthPercentage = $totalTrees > 0
            ? (int) round(($healthyTrees / $totalTrees) * 100)
            : 0;

        $blockSummaries = Block::query()
            ->where('is_active', true)
            ->with(['trees:id,block_id,condition'])
            ->orderBy('block_code')
            ->get(['id', 'block_code', 'name'])
            ->map(function (Block $block): array {
                $total = $block->trees->count();
                $healthy = $block->trees->where('condition', 'Sehat')->count();
                $urgent = $block->trees->where('condition', 'Urgent')->count();
                $recovery = $block->trees->where('condition', 'Pemulihan')->count();
                $percentage = $total > 0 ? (int) round(($healthy / $total) * 100) : 0;

                if ($total === 0) {
                    $status = 'Belum ada data';
                } elseif ($urgent > 0) {
                    $status = 'Perlu Perawatan';
                } elseif ($recovery > 0) {
                    $status = 'Pemulihan';
                } elseif ($percentage === 100) {
                    $status = 'Sehat';
                } else {
                    $status = 'Perlu Perhatian';
                }

                return [
                    'id' => $block->id,
                    'code' => $block->block_code,
                    'name' => $block->name,
                    'total_trees' => $total,
                    'healthy_trees' => $healthy,
                    'health_percentage' => $percentage,
                    'bar_height' => max(8, (int) round($percentage * 1.7)),
                    'status' => $status,
                ];
            })
            ->values();

        $chartBlocks = $blockSummaries
            ->where('total_trees', '>', 0)
            ->take(8)
            ->values();

        $recentActivities = collect();

        $taskActivities = WorkTask::with('worker')
            ->latest('created_at')
            ->take(10)
            ->get()
            ->map(function (WorkTask $task): array {
                $date = $task->start_date ?: $task->created_at;

                return [
                    'date' => $date,
                    'sort_at' => $task->created_at?->timestamp ?? 0,
                    'activity' => $task->name,
                    'worker' => $task->worker?->name ?? 'Belum ditugaskan',
                    'status' => $task->status ?: 'Belum Dimulai',
                    'location' => $task->location,
                    'source' => 'Tugas',
                ];
            });

        $maintenanceActivities = MaintenanceRecord::with(['tree.block', 'worker'])
            ->latest('created_at')
            ->take(10)
            ->get()
            ->map(function (MaintenanceRecord $record): array {
                $date = $record->maintenance_date ?: $record->created_at;
                $treeCode = $record->tree?->tree_code;

                return [
                    'date' => $date,
                    'sort_at' => $record->created_at?->timestamp ?? 0,
                    'activity' => $record->maintenance_type . ($treeCode ? ' - ' . $treeCode : ''),
                    'worker' => $record->worker?->name ?? 'Belum ditugaskan',
                    'status' => 'Tercatat',
                    'location' => $record->tree?->block?->name ?? '-',
                    'source' => 'Perawatan',
                ];
            });

        $scheduleActivities = MaintenanceSchedule::with('worker')
            ->latest('created_at')
            ->take(10)
            ->get()
            ->map(function (MaintenanceSchedule $schedule): array {
                $date = $schedule->schedule_date ?: $schedule->created_at;

                return [
                    'date' => $date,
                    'sort_at' => $schedule->created_at?->timestamp ?? 0,
                    'activity' => $schedule->activity,
                    'worker' => $schedule->worker?->name ?? 'Belum ditugaskan',
                    'status' => $schedule->status ?: 'Terjadwal',
                    'location' => $schedule->location,
                    'source' => 'Jadwal',
                ];
            });

        $recentActivities = $recentActivities
            ->concat($taskActivities)
            ->concat($maintenanceActivities)
            ->concat($scheduleActivities)
            ->sortByDesc('sort_at')
            ->take(4)
            ->values();

        return view('dashboard.pemilik', compact(
            'totalTrees',
            'totalWorkers',
            'activeTasks',
            'overdueTasks',
            'todaySchedules',
            'healthyTrees',
            'healthPercentage',
            'blockSummaries',
            'chartBlocks',
            'recentActivities'
        ));
    }
}
