<?php

namespace App\Http\Controllers;

use App\Models\Sale;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        // Filter bulan yang dipilih pada halaman laporan.
        $selectedMonth = request()->query('month', 'all');

        // Validasi format bulan.
        if (
            !is_string($selectedMonth) ||
            (
                $selectedMonth !== 'all' &&
                !preg_match('/^\d{4}-(0[1-9]|1[0-2])$/', $selectedMonth)
            )
        ) {
            $selectedMonth = 'all';
        }

        // Nama bulan dalam bahasa Indonesia.
        $monthNames = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        // Ambil daftar bulan yang tersedia.
        $availableMonths = Sale::query()
            ->selectRaw("DATE_FORMAT(sale_date, '%Y-%m') AS month")
            ->distinct()
            ->orderByDesc('month')
            ->pluck('month');

        // Siapkan pilihan bulan untuk halaman Blade.
        $monthOptions = $availableMonths->map(
            function ($month) use ($monthNames) {
                $monthNumber = (int) substr($month, 5, 2);
                $year = substr($month, 0, 4);

                return [
                    'value' => $month,
                    'label' => $monthNames[$monthNumber] . ' ' . $year,
                ];
            }
        )->values()->all();

        // Ambil data penjualan.
        $query = Sale::with('creator');

        // Terapkan filter bulan.
        if ($selectedMonth !== 'all') {
            $year = (int) substr($selectedMonth, 0, 4);
            $month = (int) substr($selectedMonth, 5, 2);

            $query->whereYear('sale_date', $year)
                ->whereMonth('sale_date', $month);
        }

        $sales = $query
            ->orderByDesc('sale_date')
            ->orderByDesc('id')
            ->get();

        // Hitung total berdasarkan data yang ditampilkan.
        $totalSales = $sales->sum(
            fn($sale) => (float) $sale->total_amount
        );

        $totalTons = $sales->sum(
            fn($sale) => (float) $sale->weight_tons
        );

        $paidSales = $sales
            ->where('status', 'Lunas')
            ->sum(fn($sale) => (float) $sale->total_amount);

        $unpaidSales = $sales
            ->where('status', 'Belum Lunas')
            ->sum(fn($sale) => (float) $sale->total_amount);

        $partialSales = $sales
            ->where('status', 'Sebagian Lunas')
            ->sum(fn($sale) => (float) $sale->total_amount);

        // Sesuaikan nama variabel dengan halaman Blade.
        $paidAmount = $paidSales;
        $unpaidAmount = $unpaidSales;
        $partialAmount = $partialSales;

        // Variabel ringkasan tambahan untuk tampilan.
        $totalPenjualan = $totalSales;
        $totalAmount = $totalSales;
        $totalTonase = $totalTons;
        $belumLunas = $unpaidSales;
        $jumlahPenjualan = $sales->count();

        // Pemilik hanya melihat laporan penjualan.
        // Pemilik hanya melihat laporan penjualan.
        return view('dashboard.penjualan-pemilik', compact(
            'sales',
            'selectedMonth',
            'monthOptions',
            'totalSales',
            'totalTons',
            'paidSales',
            'unpaidSales',
            'partialSales',
            'totalPenjualan',
            'totalAmount',
            'totalTonase',
            'belumLunas',
            'jumlahPenjualan',
            'paidAmount',
            'unpaidAmount',
            'partialAmount'
        ));
    }
}