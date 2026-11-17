<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreeSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // 1. Data Master Blok Kebun (15 Blok berbeda)
        $blocksData = [
            ['block_code' => 'A-01', 'name' => 'Blok A-01 North', 'area_name' => 'Zona Utara',   'short' => 'A1',  'lat' => -1.6101200, 'lng' => 103.6131200],
            ['block_code' => 'A-02', 'name' => 'Blok A-02 South', 'area_name' => 'Zona Utara',   'short' => 'A2',  'lat' => -1.6112500, 'lng' => 103.6142500],
            ['block_code' => 'A-03', 'name' => 'Blok A-03 East',  'area_name' => 'Zona Utara',   'short' => 'A3',  'lat' => -1.6118000, 'lng' => 103.6148000],
            ['block_code' => 'B-01', 'name' => 'Blok B-01 East',  'area_name' => 'Zona Timur',   'short' => 'B1',  'lat' => -1.6123800, 'lng' => 103.6153800],
            ['block_code' => 'B-02', 'name' => 'Blok B-02 North', 'area_name' => 'Zona Timur',   'short' => 'B2',  'lat' => -1.6134100, 'lng' => 103.6164100],
            ['block_code' => 'B-03', 'name' => 'Blok B-03 West',  'area_name' => 'Zona Barat',   'short' => 'B3',  'lat' => -1.6145400, 'lng' => 103.6175400],
            ['block_code' => 'C-01', 'name' => 'Blok C-01 South', 'area_name' => 'Zona Selatan', 'short' => 'C1',  'lat' => -1.6156700, 'lng' => 103.6186700],
            ['block_code' => 'C-02', 'name' => 'Blok C-02 East',  'area_name' => 'Zona Selatan', 'short' => 'C2',  'lat' => -1.6167000, 'lng' => 103.6197000],
            ['block_code' => 'C-05', 'name' => 'Blok C-05 West',  'area_name' => 'Zona Tengah',  'short' => 'C5',  'lat' => -1.6172000, 'lng' => 103.6202000],
            ['block_code' => 'C-12', 'name' => 'Blok C-12 North', 'area_name' => 'Zona Tengah',  'short' => 'C12', 'lat' => -1.6178300, 'lng' => 103.6208300],
            ['block_code' => 'D-01', 'name' => 'Blok D-01 West',  'area_name' => 'Zona Barat',   'short' => 'D1',  'lat' => -1.6189600, 'lng' => 103.6219600],
            ['block_code' => 'D-02', 'name' => 'Blok D-02 South', 'area_name' => 'Zona Selatan', 'short' => 'D2',  'lat' => -1.6191900, 'lng' => 103.6221900],
            ['block_code' => 'E-01', 'name' => 'Blok E-01 North', 'area_name' => 'Zona Timur',   'short' => 'E1',  'lat' => -1.6201000, 'lng' => 103.6231000],
            ['block_code' => 'E-02', 'name' => 'Blok E-02 West',  'area_name' => 'Zona Barat',   'short' => 'E2',  'lat' => -1.6212000, 'lng' => 103.6242000],
            ['block_code' => 'F-01', 'name' => 'Blok F-01 South', 'area_name' => 'Zona Selatan', 'short' => 'F1',  'lat' => -1.6223000, 'lng' => 103.6253000],
        ];

        $blockRefs = [];

        foreach ($blocksData as $item) {
            DB::table('blocks')->updateOrInsert(
                ['block_code' => $item['block_code']],
                [
                    'name'        => $item['name'],
                    'area_name'   => $item['area_name'],
                    'description' => 'Area perkebunan kelapa sawit ' . $item['name'],
                    'latitude'    => $item['lat'],
                    'longitude'   => $item['lng'],
                    'is_active'   => true,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ]
            );

            $blockId = DB::table('blocks')
                ->where('block_code', $item['block_code'])
                ->value('id');

            $blockRefs[] = [
                'id'    => $blockId,
                'short' => $item['short'],
                'lat'   => $item['lat'],
                'lng'   => $item['lng'],
            ];
        }

        // 2. Generate 500 Data Pohon Sawit di 15 Blok tersebut
        $totalTrees = 500;
        $conditions = ['Sehat', 'Sehat', 'Sehat', 'Sehat', 'Pemulihan', 'Urgent'];
        $statuses   = ['Terkendali', 'Terkendali', 'Terkendali', 'Jadwal Mendatang', 'Terlambat'];

        $notesPool = [
            'Pertumbuhan pelepah normal dan buah tandan segar optimal.',
            'Perlu pemupukan NPK lanjutan sesuai jadwal blok.',
            'Baru selesai pemangkasan pelepah kering.',
            'Terindikasi serangan ringan ulat kantong, dalam pemantauan.',
            'Kondisi tajuk daun hijau pekat dan produktivitas stabil.',
        ];

        for ($i = 1; $i <= $totalTrees; $i++) {
            $block = $blockRefs[($i - 1) % count($blockRefs)];
            $nomorUrut = str_pad((string) $i, 3, '0', STR_PAD_LEFT);
            $treeCode = "PM-{$nomorUrut}-{$block['short']}";
            $ageMonths = rand(12, 120);

            $latOffset = (($i % 20) - 10) * 0.00009;
            $lngOffset = ((int) floor($i / 20) - 12) * 0.00009;

            DB::table('trees')->updateOrInsert(
                ['tree_code' => $treeCode],
                [
                    'block_id'           => $block['id'],
                    'age_months'         => $ageMonths,
                    'condition'          => $conditions[array_rand($conditions)],
                    'maintenance_status' => $statuses[array_rand($statuses)],
                    'latitude'           => round($block['lat'] + $latOffset, 7),
                    'longitude'          => round($block['lng'] + $lngOffset, 7),
                    'planted_at'         => now()->subMonths($ageMonths)->toDateString(),
                    'notes'              => $notesPool[array_rand($notesPool)],
                    'created_at'         => $now,
                    'updated_at'         => $now,
                ]
            );
        }
    }
}