<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkTaskSeeder extends Seeder
{
    public function run(): void
    {
        $workerIds = DB::table('users')->where('role', 'pekerja')->pluck('id')->all();
        $creatorId = DB::table('users')
            ->whereIn('role', ['pemilik', 'staf', 'admin'])
            ->value('id') ?? ($workerIds[0] ?? null);

        if (empty($workerIds)) {
            $this->command?->warn('Belum ada akun dengan role pekerja.');
            return;
        }

        $locations = DB::table('blocks')->pluck('name')->all();
        if (empty($locations)) {
            $locations = [
                'Blok A-01 North', 'Blok B-02 North', 'Blok C-01 South',
                'Blok C-12 North', 'Blok D-01 West', 'Blok E-01 North',
            ];
        }

        $taskTemplates = [
            ['name' => 'Pemupukan NPK Rutin',       'desc' => 'Aplikasi pupuk NPK 15-15-15 di piringan pohon sesuai takaran blok.'],
            ['name' => 'Pruning Pelepah Tua',       'desc' => 'Pemangkasan pelepah kering dan penyusunan rapi di gawangan mati.'],
            ['name' => 'Pengendalian Hama Ulat Api','desc' => 'Penyemprotan insektisida pada pohon dengan gejala serangan ulat api.'],
            ['name' => 'Sanitasi Piringan & Jalur', 'desc' => 'Pembersihan gulma di sekitar piringan pohon dan jalur panen.'],
            ['name' => 'Panen Tandan Buah Segar',   'desc' => 'Pemanenan TBS matang dan pengumpulan brondolan ke TPH blok.'],
        ];

        $statuses = ['Belum Dimulai', 'Sedang Jalan', 'Selesai'];
        $year = now()->format('Y');
        $now = now();

        // Mulai dari 002 agar tidak menimpa TSK-2026-001 yang sudah ada
        for ($i = 2; $i <= 30; $i++) {
            $taskCode = sprintf('TSK-%s-%03d', $year, $i);
            $template = $taskTemplates[array_rand($taskTemplates)];
            $startDate = now()->subDays(rand(0, 10));
            $deadline = $startDate->copy()->addDays(rand(2, 5));

            DB::table('work_tasks')->updateOrInsert(
                ['task_code' => $taskCode],
                [
                    'name'        => $template['name'],
                    'worker_id'   => $workerIds[array_rand($workerIds)],
                    'location'    => $locations[array_rand($locations)],
                    'start_date'  => $startDate->toDateString(),
                    'deadline'    => $deadline->toDateString(),
                    'description' => $template['desc'],
                    'status'      => $statuses[array_rand($statuses)],
                    'created_by'  => $creatorId,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ]
            );
        }
    }
}