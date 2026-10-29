<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class LaporanPenjualanStafController extends Controller
{
    public function index(Request $request): View
    {
        $selectedMonth = $this->normaliseMonth(
            (string) $request->query('month', now()->format('Y-m'))
        );

        $allSales = Sale::with('creator')
            ->orderByDesc('harvest_period_start')
            ->orderByDesc('sale_date')
            ->orderByDesc('id')
            ->get();

        $monthOptions = $this->monthOptions($selectedMonth);
        $sales = $this->filterByMonth($allSales, $selectedMonth);

        $totalAmount = (float) $sales->sum('total_amount');
        $totalTons = (float) $sales->sum('weight_tons');

        $unpaidAmount = (float) $sales
            ->where('status', 'Belum Lunas')
            ->sum('total_amount');

        return view('dashboard.laporan-penjualan', compact(
            'sales',
            'monthOptions',
            'selectedMonth',
            'totalAmount',
            'totalTons',
            'unpaidAmount'
        ));
    }

    public function store(Request $request): RedirectResponse
    {
        // Hanya staf yang boleh menambahkan laporan penjualan.
        abort_unless($request->user()?->role === 'staf', 403);

        $validated = $request->validate([
            'sale_date' => [
                'required',
                'date',
                'after_or_equal:harvest_period_start'
            ],
            'harvest_period_start' => ['required', 'date'],
            'factory_name' => ['required', 'string', 'max:150'],
            'weight_tons' => [
                'required',
                'numeric',
                'gt:0',
                'max:99999.999'
            ],
            'price_per_kg' => [
                'required',
                'numeric',
                'gt:0',
                'max:99999.99'
            ],
            'status' => ['required', 'in:Lunas,Belum Lunas'],
            'notes' => ['nullable', 'string', 'max:5000'],
        ], [
            'sale_date.after_or_equal' =>
                'Tanggal kirim tidak boleh lebih awal dari awal periode panen.',
        ]);

        $periodStart = Carbon::parse(
            $validated['harvest_period_start']
        )->startOfDay();

        // 14 hari termasuk tanggal awal.
        $periodEnd = $periodStart->copy()->addDays(13);

        $weightTons = (float) $validated['weight_tons'];
        $pricePerKg = (float) $validated['price_per_kg'];

        // Satu ton = 1.000 kg.
        $totalAmount = round(
            $weightTons * 1000 * $pricePerKg,
            2
        );

        Sale::create([
            'sale_date' => $validated['sale_date'],
            'harvest_period_start' => $periodStart->toDateString(),
            'harvest_period_end' => $periodEnd->toDateString(),
            'factory_name' => trim($validated['factory_name']),
            'weight_tons' => $weightTons,
            'price_per_kg' => $pricePerKg,
            'total_amount' => $totalAmount,
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? null,
            'created_by' => $request->user()->id,
        ]);

        return redirect()
            ->route('staf.penjualan')
            ->with(
                'success',
                'Laporan penjualan berhasil disimpan.'
            );
    }

    public function factoryResults(Request $request): View
    {
        $selectedMonth = $this->normaliseMonth(
            (string) $request->query('month', now()->format('Y-m'))
        );

        $allSales = Sale::with('creator')
            ->orderByDesc('harvest_period_start')
            ->orderByDesc('sale_date')
            ->orderByDesc('id')
            ->get();

        $monthOptions = $this->monthOptions($selectedMonth);
        $sales = $this->filterByMonth($allSales, $selectedMonth);

        $periodReports = $sales
            ->groupBy(function (Sale $sale) {
                return $sale->harvest_period_start->format('Y-m-d')
                    . '|'
                    . mb_strtolower(trim($sale->factory_name));
            })
            ->map(function (Collection $group): array {
                $first = $group->first();

                $paidCount = $group->where('status', 'Lunas')->count();

                $status = $paidCount === $group->count()
                    ? 'Lunas'
                    : ($paidCount === 0
                        ? 'Belum Lunas'
                        : 'Sebagian Lunas');

                return [
                    'period_start' => $first->harvest_period_start,
                    'period_end' => $first->harvest_period_end,
                    'factory_name' => $first->factory_name,
                    'shipments' => $group->count(),
                    'total_tons' => (float) $group->sum('weight_tons'),
                    'total_amount' => (float) $group->sum('total_amount'),
                    'status' => $status,
                ];
            })
            ->sortByDesc(
                fn(array $row) => $row['period_start']->format('Y-m-d')
            )
            ->values();

        $totalTons = (float) $sales->sum('weight_tons');
        $totalAmount = (float) $sales->sum('total_amount');
        $periodCount = $periodReports->count();

        return view('dashboard.hasil-penjualan-pabrik', compact(
            'periodReports',
            'monthOptions',
            'selectedMonth',
            'totalTons',
            'totalAmount',
            'periodCount'
        ));
    }

    private function normaliseMonth(string $month): string
    {
        if ($month === 'all') {
            return 'all';
        }

        return preg_match('/^\d{4}-(0[1-9]|1[0-2])$/', $month)
            ? $month
            : now()->format('Y-m');
    }



    private function monthOptions(string $selectedMonth = 'all'): Collection
    {
        // Ambil daftar bulan dari database sebagai teks YYYY-MM.
        $months = Sale::query()
            ->toBase()
            ->selectRaw("DATE_FORMAT(sale_date, '%Y-%m') AS month")
            ->whereNotNull('sale_date')
            ->distinct()
            ->orderByDesc('month')
            ->pluck('month');

        // Pastikan bulan terpilih tetap tersedia di pilihan filter.
        if (
            $selectedMonth !== 'all' &&
            preg_match('/^\d{4}-(0[1-9]|1[0-2])$/', $selectedMonth)
        ) {
            $months->push($selectedMonth);
        }

        // Hilangkan bulan duplikat dan urutkan dari terbaru.
        $months = $months
            ->filter()
            ->unique()
            ->sortDesc()
            ->values();

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

        // Ubah setiap teks bulan menjadi array yang dibutuhkan Blade.
        return $months->map(function ($month) use ($monthNames) {
            $monthNumber = (int) substr($month, 5, 2);
            $year = substr($month, 0, 4);

            return [
                'value' => $month,
                'label' => $monthNames[$monthNumber] . ' ' . $year,
            ];
        })->values();
    }


    private function filterByMonth(
        Collection $sales,
        string $selectedMonth
    ): Collection {
        if ($selectedMonth === 'all') {
            return $sales->values();
        }

        return $sales
            ->filter(
                fn(Sale $sale) =>
                    $sale->harvest_period_start->format('Y-m')
                    === $selectedMonth
            )
            ->values();
    }
}
