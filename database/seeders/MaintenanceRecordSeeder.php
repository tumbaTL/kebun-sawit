<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaintenanceRecordSeeder extends Seeder
{
    public function run(): void
    {
        $treeIds = DB::table('trees')->pluck('id')->all();
        $workerIds = DB::table('users')->where('role', 'pekerja')->pluck('id')->all();
        $creatorId = DB::table('users')
            ->whereIn('role', ['pemilik', 'staf', 'admin'])
            ->value('id') ?? ($workerIds[0] ?? null);

        if (empty($treeIds) || empty($workerIds)) {
            $this->command?->warn('Data trees atau user dengan role pekerja belum tersedia.');
            return;
        }

        $types = [
            'Pemupukan NPK',
            'Pruning',
            'Pest Control',
            'Sanitation',
        ];

        $notesByType = [
            'Pemupukan NPK' => 'Aplikasi pupuk NPK 15-15-15 dosis standar di piringan pohon.',
            'Pruning'       => 'Pemangkasan pelepah tua dan penyusunan pelepah di gawangan mati.',
            'Pest Control'  => 'Penyemprotan pengendalian hama ulat api dan pengecekan kumbang tanduk.',
            'Sanitation'    => 'Pembersihan gulma di sekitar piringan dan jalur panen.',
        ];

        $now = now();
        $totalRecords = 60;
        $dailyCounters = [];

        for ($i = 1; $i <= $totalRecords; $i++) {
            $date = now()->subDays(rand(0, 30));
            $dateKey = $date->format('ymd');

            $dailyCounters[$dateKey] = ($dailyCounters[$dateKey] ?? 0) + 1;
            $seq = str_pad((string) $dailyCounters[$dateKey], 4, '0', STR_PAD_LEFT);
            $maintenanceCode = "MT-{$dateKey}-{$seq}";

            $type = $types[array_rand($types)];

            DB::table('maintenance_records')->updateOrInsert(
                ['maintenance_code' => $maintenanceCode],
                [
                    'tree_id'          => $treeIds[array_rand($treeIds)],
                    'worker_id'        => $workerIds[array_rand($workerIds)],
                    'maintenance_type' => $type,
                    'maintenance_date' => $date->toDateString(),
                    'notes'            => $notesByType[$type],
                    'created_by'       => $creatorId,
                    'created_at'       => $now,
                    'updated_at'       => $now,
                ]
            );
        }
    }
}