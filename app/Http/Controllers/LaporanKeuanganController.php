<?php

namespace App\Http\Controllers;

use App\Models\FinancialTransaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LaporanKeuanganController extends Controller
{
    public function index(Request $request): View
    {
        $selectedMonth = (string) $request->query('month', now()->format('Y-m'));
        if ($selectedMonth !== 'all' && !preg_match('/^\d{4}-(0[1-9]|1[0-2])$/', $selectedMonth)) {
            $selectedMonth = now()->format('Y-m');
        }

        $transactions = FinancialTransaction::query()
            ->orderByDesc('transaction_date')
            ->orderByDesc('id')
            ->get();

        $monthKeys = $transactions
            ->map(fn(FinancialTransaction $transaction) => $transaction->transaction_date->format('Y-m'))
            ->push(now()->format('Y-m'));

        if ($selectedMonth !== 'all') {
            $monthKeys->push($selectedMonth);
        }

        $monthOptions = $monthKeys
            ->toBase()
            ->unique()
            ->sortDesc()
            ->values()
            ->map(fn(string $month) => [
                'value' => $month,
                'label' => \Carbon\Carbon::createFromFormat('!Y-m', $month)->format('F Y'),
            ])
            ->all();

        $periodTransactions = $transactions->filter(function (FinancialTransaction $transaction) use ($selectedMonth) {
            return $selectedMonth === 'all'
                || $transaction->transaction_date->format('Y-m') === $selectedMonth;
        });

        $initialTotals = [
            'income' => (float) $periodTransactions->sum('income'),
            'expense' => (float) $periodTransactions->sum('expense'),
        ];
        $initialTotals['balance'] = $initialTotals['income'] - $initialTotals['expense'];

        $transactionData = $transactions->map(fn(FinancialTransaction $transaction) => [
            'id' => $transaction->id,
            'date' => $transaction->transaction_date->format('Y-m-d'),
            'description' => $transaction->description,
            'income' => (float) $transaction->income,
            'expense' => (float) $transaction->expense,
            'status' => $transaction->status,
        ])->values();

        return view('dashboard.keuangan', compact(
            'transactions',
            'transactionData',
            'monthOptions',
            'selectedMonth',
            'initialTotals',
        ));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'transaction_date' => ['required', 'date'],
            'description' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:income,expense'],
            'amount' => ['required', 'numeric', 'min:0.01', 'max:9999999999999.99'],
            'status' => ['required', 'in:Lunas,Pending'],
        ]);

        $amount = (float) $validated['amount'];
        $isIncome = $validated['type'] === 'income';

        FinancialTransaction::create([
            'transaction_date' => $validated['transaction_date'],
            'description' => $validated['description'],
            'income' => $isIncome ? $amount : 0,
            'expense' => $isIncome ? 0 : $amount,
            'status' => $validated['status'],
            'created_by' => $request->user()->id,
        ]);

        return redirect()
            ->route('pemilik.keuangan', ['month' => substr($validated['transaction_date'], 0, 7)])
            ->with('success', 'Transaksi berhasil disimpan.');
    }
}
