<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperationalSampleSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $workerIds = DB::table('users')->where('role', 'pekerja')->pluck('id')->all();
        $creatorId = DB::table('users')
            ->whereIn('role', ['pemilik', 'staf', 'admin'])
            ->value('id') ?? ($workerIds[0] ?? null);

        $locations = DB::table('blocks')->pluck('name')->all();
        if (empty($locations)) {
            $locations = ['Blok A-01 North', 'Blok B-02 North', 'Blok C-12 North', 'Blok D-01 West'];
        }

        // 1. MAINTENANCE SCHEDULES (25 Jadwal)
        if (!empty($workerIds)) {
            $activities = [
                'Pemupukan NPK Blok',
                'Pruning Pelepah Berkala',
                'Pengendalian Hama & Gulma',
                'Sanitasi Piringan & TPH',
                'Panen Rotasi 14 Hari',
            ];
            $schedStatuses = ['Terjadwal', 'Berjalan', 'Selesai'];

            for ($i = 1; $i <= 25; $i++) {
                $code = sprintf('SCH-%s-%03d', now()->format('Y'), $i);
                $date = now()->addDays(rand(-7, 14));

                DB::table('maintenance_schedules')->updateOrInsert(
                    ['schedule_code' => $code],
                    [
                        'activity'      => $activities[array_rand($activities)],
                        'schedule_date' => $date->toDateString(),
                        'location'      => $locations[array_rand($locations)],
                        'worker_id'     => $workerIds[array_rand($workerIds)],
                        'status'        => $schedStatuses[array_rand($schedStatuses)],
                        'notes'         => 'Jadwal pemeliharaan berkala kebun sawit.',
                        'created_by'    => $creatorId,
                        'created_at'    => $now,
                        'updated_at'    => $now,
                    ]
                );
            }
        }

        // 2. WORK REPORTS (20 Laporan Pekerjaan)
        $tasks = DB::table('work_tasks')->get();
        if (!empty($workerIds) && $tasks->isNotEmpty()) {
            $verifStatuses = ['Menunggu', 'Disetujui', 'Disetujui', 'Perlu Revisi'];

            for ($i = 1; $i <= 20; $i++) {
                $task = $tasks->random();
                $date = now()->subDays(rand(0, 14));
                $reportCode = sprintf('RPT-%s-%04d', $date->format('ymd'), $i);

                DB::table('work_reports')->updateOrInsert(
                    ['report_code' => $reportCode],
                    [
                        'worker_id'           => $task->worker_id,
                        'work_task_id'        => $task->id,
                        'task_name'           => $task->name,
                        'task_location'       => $task->location,
                        'work_date'           => $date->toDateString(),
                        'notes'               => 'Pekerjaan ' . $task->name . ' di ' . $task->location . ' telah dilaksanakan sesuai SOP.',
                        'photo_paths'         => json_encode([]),
                        'status_verification' => $verifStatuses[array_rand($verifStatuses)],
                        'created_at'          => $now,
                        'updated_at'          => $now,
                    ]
                );
            }
        }

        // 3. FINANCIAL TRANSACTIONS (8 Transaksi)
        $transactions = [
            ['desc' => 'Penjualan TBS ke PKS PT Agro Sawit Mandiri (12.500 kg)', 'inc' => 33125000, 'exp' => 0, 'status' => 'Lunas'],
            ['desc' => 'Pembelian Pupuk NPK 15-15-15 (40 Sak)',                  'inc' => 0, 'exp' => 14800000, 'status' => 'Lunas'],
            ['desc' => 'Upah Borongan Panen & Muat TBS Periode I',               'inc' => 0, 'exp' => 6500000,  'status' => 'Lunas'],
            ['desc' => 'Penjualan TBS ke PKS Bina Karya (14.200 kg)',            'inc' => 38340000, 'exp' => 0, 'status' => 'Lunas'],
            ['desc' => 'Pembelian Herbisida & Pestisida Pengendali Ulat Api',    'inc' => 0, 'exp' => 4250000,  'status' => 'Lunas'],
            ['desc' => 'Biaya Solar & Perawatan Truk Angkut Kebun',              'inc' => 0, 'exp' => 2750000,  'status' => 'Lunas'],
            ['desc' => 'Penjualan TBS ke PKS PT Agro Sawit Mandiri (11.800 kg)', 'inc' => 31860000, 'exp' => 0, 'status' => 'Belum Lunas'],
            ['desc' => 'Upah Perawatan Pruning & Sanitasi Blok A-C',             'inc' => 0, 'exp' => 5400000,  'status' => 'Lunas'],
        ];

        DB::table('financial_transactions')
            ->where('description', 'like', '%TBS%')
            ->orWhere('description', 'like', '%Pupuk NPK%')
            ->delete();

        foreach ($transactions as $idx => $trx) {
            DB::table('financial_transactions')->insert([
                'transaction_date' => now()->subDays(24 - ($idx * 3))->toDateString(),
                'description'      => $trx['desc'],
                'income'           => $trx['inc'],
                'expense'          => $trx['exp'],
                'status'           => $trx['status'],
                'created_by'       => $creatorId,
                'created_at'       => $now,
                'updated_at'       => $now,
            ]);
        }
    }
}