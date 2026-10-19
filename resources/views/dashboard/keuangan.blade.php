<!DOCTYPE html>

<html lang="id">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Keuangan - Sihombing Group</title>



    <script src="https://unpkg.com/lucide@latest"></script>



    <style>
        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

        }



        :root {

            --green: #086b22;

            --dark-green: #2c8034;

            --light-green: #8cf083;

            --border: #d3ded0;

            --background: #f8f9f8;

        }



        body {

            font-family: Arial, Helvetica, sans-serif;

            background: var(--background);

            color: #292d2b;

            font-size: 13px;

        }



        /* SIDEBAR */

        .sidebar {

            position: fixed;

            top: 0;

            left: 0;

            width: 188px;

            height: 100vh;

            background: #fff;

            border-right: 1px solid #d9ded9;

            display: flex;

            flex-direction: column;

            z-index: 100;

        }



        .brand {

            height: 83px;

            flex: 0 0 83px;

            padding: 24px 21px 0;

        }



        .brand h3 {

            color: var(--green);

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 4px;

        }



        .brand p {

            color: #555d55;

            font-size: 11px;

        }



        .menu {

            padding: 0 5px;

            display: flex;

            flex-direction: column;

            gap: 5px;

        }



        .menu a {

            height: 35px;

            flex: 0 0 35px;

            display: flex;

            align-items: center;

            gap: 11px;

            padding: 0 15px;

            color: #4d554d;

            text-decoration: none;

            border-radius: 0 22px 22px 0;

            font-size: 11px;

            white-space: nowrap;

            transition: background .2s;

        }



        .menu a:hover {

            background: #edf8ed;

            color: var(--green);

        }



        .menu a.active {

            background: var(--light-green);

            color: var(--green);

            border-left: 3px solid var(--green);

            padding-left: 12px;

        }



        .menu-icon {

            width: 16px;

            height: 16px;

            flex: 0 0 16px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

        }



        .menu-icon svg {

            width: 15px;

            height: 15px;

            stroke-width: 1.8;

        }



        .sidebar-bottom {

            margin-top: auto;

            padding: 0 5px 12px;

        }



        .sidebar-divider {

            height: 1px;

            background: #d9ddd9;

            margin: 0 1px 18px;

        }



        .sidebar-bottom a {

            height: 34px;

            display: flex;

            align-items: center;

            gap: 11px;

            padding: 0 15px;

            text-decoration: none;

            font-size: 11px;

        }



        .support {

            color: #4d554d;

            margin-bottom: 4px;

        }



        .logout {

            color: #e32929;

        }



        /* MAIN CONTENT */

        .main {

            margin-left: 188px;

            padding: 24px 18px 35px 21px;

            min-height: 100vh;

        }



        /* HEADER */

        .topbar {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

            margin-bottom: 37px;

        }



        .topbar h1 {

            color: var(--green);

            font-size: 16px;

            font-weight: 700;

        }



        .filters {

            display: flex;

            gap: 11px;

            align-items: center;

        }



        .month-select {

            height: 33px;

            background: #fff;

            border: 1px solid var(--border);

            border-radius: 6px;

            padding: 0 10px;

            font-size: 10px;

            color: #343b34;

            min-width: 138px;

            outline: none;

        }



        .filter-btn {

            height: 33px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            padding: 0 16px;

            border: 0;

            border-radius: 6px;

            background: var(--green);

            color: #fff;

            font-size: 10px;

            cursor: pointer;

        }



        .filter-btn svg {

            width: 13px;

            height: 13px;

        }



        .filter-btn:hover {

            background: #064f19;

        }



        /* SUMMARY CARDS */

        .summary {

            display: grid;

            grid-template-columns: repeat(3, minmax(0, 1fr));

            gap: 16px;

            margin-bottom: 28px;

        }



        .summary-card {

            position: relative;

            min-height: 140px;

            padding: 17px 16px 14px;

            border-radius: 9px;

            background: #fff;

            box-shadow: 0 2px 6px rgba(0, 0, 0, .05);

            border-top: 3px solid var(--green);

            overflow: hidden;

        }



        .summary-card.expense {

            border-top-color: #e00000;

        }



        .summary-card.balance {

            background: var(--dark-green);

            color: #fff;

            border-top-color: var(--dark-green);

        }



        .card-icon {

            width: 23px;

            height: 19px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 5px;

            background: #91f88d;

            color: #166b23;

            margin-bottom: 17px;

        }



        .card-icon svg {

            width: 13px;

            height: 13px;

            stroke-width: 2;

        }



        .expense .card-icon {

            background: #ffe0df;

            color: #c92222;

        }



        .balance .card-icon {

            background: rgba(255, 255, 255, .22);

            color: #fff;

        }



        .change {

            position: absolute;

            top: 18px;

            right: 13px;

            font-size: 8px;

            font-weight: bold;

            color: #238438;

        }



        .expense .change {

            color: #d71920;

        }



        .card-label {

            font-size: 10px;

            color: #596359;

            margin-bottom: 5px;

        }



        .balance .card-label {

            color: #d4ead5;

        }



        .amount {

            font-size: 23px;

            font-weight: 750;

            line-height: 1.18;

            letter-spacing: -.5px;

            overflow-wrap: anywhere;

        }



        .currency {

            display: block;

            font-size: 20px;

            margin-bottom: 1px;

        }



        /* TRANSACTION TABLE */

        .transaction-box {

            background: #fff;

            border: 1px solid #cedbca;

            border-radius: 9px;

            overflow: hidden;

            box-shadow: 0 2px 5px rgba(0, 0, 0, .04);

        }



        .transaction-header {

            min-height: 58px;

            padding: 15px 16px;

            background: #f3f4f3;

            border-bottom: 1px solid #d2dbcf;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

        }



        .transaction-header h2 {

            font-size: 13px;

            font-weight: 700;

        }



        .search-box {

            width: 180px;

            height: 26px;

            padding: 0 9px;

            border: 1px solid #ccd7ca;

            border-radius: 6px;

            background: #fff;

            display: flex;

            align-items: center;

            gap: 5px;

        }



        .search-box svg {

            width: 13px;

            height: 13px;

            color: #424a42;

            flex-shrink: 0;

        }



        .search-box input {

            width: 100%;

            min-width: 0;

            border: 0;

            outline: none;

            font-size: 10px;

            background: transparent;

        }



        .table-wrap {

            width: 100%;

            overflow-x: auto;

        }



        table {

            width: 100%;

            border-collapse: collapse;

            table-layout: fixed;

        }



        thead {

            background: #e2e2e2;

        }



        th {

            height: 33px;

            padding: 9px 8px;

            font-size: 8px;

            color: #424a42;

            letter-spacing: .6px;

            font-weight: 600;

            text-transform: uppercase;

        }



        td {

            height: 38px;

            padding: 10px 9px;

            border-top: 1px solid #d5dfd2;

            font-size: 9px;

            line-height: 1.4;

            overflow-wrap: anywhere;

        }



        th:nth-child(1),

        td:nth-child(1) {

            width: 19%;

            text-align: center;

        }



        th:nth-child(2),

        td:nth-child(2) {

            width: 34%;

            text-align: left;

        }



        th:nth-child(3),

        td:nth-child(3),

        th:nth-child(4),

        td:nth-child(4) {

            width: 15%;

            text-align: right;

        }



        th:nth-child(5),

        td:nth-child(5) {

            width: 17%;

            text-align: center;

        }



        .income {

            color: #087b25;

            font-weight: bold;

        }



        .expense-text {

            color: #d32222;

            font-weight: bold;

        }



        .status {

            display: inline-block;

            min-width: 47px;

            padding: 3px 10px;

            border-radius: 20px;

            font-size: 8px;

            font-weight: 600;

            white-space: nowrap;

        }



        .status.paid {

            background: #91f78d;

            color: #176a23;

        }



        .status.pending {

            background: #e1e2e1;

            color: #535953;

        }



        .table-footer {

            min-height: 43px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 10px;

            padding: 8px 15px;

            background: #f3f4f3;

            border-top: 1px solid #d2dbcf;

        }



        .table-info {

            font-size: 9px;

            color: #606860;

        }



        .pagination {

            display: flex;

            align-items: center;

            gap: 4px;

        }



        .page-btn {

            min-width: 20px;

            height: 22px;

            padding: 0 5px;

            border: 0;

            border-radius: 4px;

            background: transparent;

            color: #303730;

            font-size: 10px;

            cursor: pointer;

        }



        .page-btn svg {

            width: 13px;

            height: 13px;

            vertical-align: middle;

        }



        .page-btn.active {

            background: var(--green);

            color: #fff;

        }



        .page-btn:disabled {

            opacity: .35;

            cursor: not-allowed;

        }



        .empty-row {

            text-align: center !important;

            padding: 25px;

            color: #777;

        }



        .transaction-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .add-transaction-btn {
            height: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 0 11px;
            border: 0;
            border-radius: 6px;
            background: var(--green);
            color: #fff;
            font-size: 10px;
            cursor: pointer;
            white-space: nowrap;
        }

        .add-transaction-btn:hover {
            background: #064f19;
        }

        .add-transaction-btn svg {
            width: 13px;
            height: 13px;
        }

        .flash-success {
            margin-bottom: 16px;
            padding: 10px 13px;
            border: 1px solid #b5dfb3;
            border-radius: 6px;
            background: #effbef;
            color: #176a23;
            font-size: 12px;
        }

        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 18px;
            background: rgba(17, 29, 19, .45);
        }

        .modal-overlay[hidden] {
            display: none;
        }

        .transaction-modal {
            width: 100%;
            max-width: 470px;
            max-height: calc(100vh - 36px);
            overflow-y: auto;
            padding: 22px;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 14px 40px rgba(0, 0, 0, .18);
        }

        .modal-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
        }

        .modal-heading h2 {
            color: var(--green);
            font-size: 16px;
        }

        .modal-close {
            width: 30px;
            height: 30px;
            border: 0;
            border-radius: 5px;
            background: #f0f3f0;
            cursor: pointer;
            font-size: 20px;
            color: #455045;
        }

        .form-field {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 13px;
        }

        .form-field label {
            color: #394139;
            font-size: 11px;
            font-weight: 600;
        }

        .form-field input,
        .form-field select {
            width: 100%;
            height: 36px;
            padding: 0 10px;
            border: 1px solid #ccd7ca;
            border-radius: 6px;
            background: #fff;
            color: #292d2b;
            font-size: 12px;
            outline: none;
        }

        .form-field input:focus,
        .form-field select:focus {
            border-color: var(--green);
        }

        .form-error {
            margin: 0 0 13px;
            padding: 9px 11px;
            background: #fff0f0;
            color: #b42323;
            border-radius: 5px;
            font-size: 11px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 18px;
        }

        .modal-actions button {
            height: 34px;
            padding: 0 13px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 11px;
        }

        .cancel-btn {
            border: 1px solid #ccd7ca;
            background: #fff;
            color: #3f493f;
        }

        .save-btn {
            border: 0;
            background: var(--green);
            color: #fff;
        }

        @media (max-width: 850px) {
            .transaction-actions {
                flex-wrap: wrap;
                justify-content: flex-end;
            }
        }

        @media (max-width: 600px) {
            .transaction-actions {
                width: 100%;
                justify-content: flex-start;
            }

            .transaction-actions .search-box {
                flex: 1;
                min-width: 145px;
            }

            .add-transaction-btn {
                flex: 0 0 auto;
            }
        }

        /* RESPONSIVE */

        @media (max-width: 850px) {

            .sidebar {

                width: 180px;

            }



            .main {

                margin-left: 180px;

                padding: 20px 13px;

            }



            .summary {

                gap: 10px;

            }



            .amount {

                font-size: 19px;

            }



            .summary-card {

                padding: 14px 11px;

            }

        }



        @media (max-width: 600px) {

            .sidebar {

                width: 64px;

            }



            .brand {

                height: 70px;

                flex-basis: 70px;

                padding: 20px 5px;

                text-align: center;

            }



            .brand h3 {

                font-size: 9px;

                overflow-wrap: anywhere;

            }



            .brand p {

                display: none;

            }



            .menu {

                padding: 0 5px;

            }



            .menu a {

                justify-content: center;

                padding: 0;

                font-size: 0;

            }



            .menu a.active {

                padding-left: 0;

            }



            .sidebar-bottom a {

                justify-content: center;

                padding: 0;

                font-size: 0;

            }



            .sidebar-divider {

                margin-left: 3px;

                margin-right: 3px;

            }



            .main {

                margin-left: 64px;

                padding: 17px 10px;

            }



            .topbar {

                align-items: flex-start;

                flex-direction: column;

                margin-bottom: 24px;

            }



            .filters {

                width: 100%;

            }



            .month-select {

                flex: 1;

                min-width: 0;

            }



            .summary {

                grid-template-columns: 1fr;

            }



            .summary-card {

                min-height: 120px;

            }



            .transaction-header {

                align-items: flex-start;

                flex-direction: column;

            }



            .search-box {

                width: 100%;

            }



            table {

                min-width: 610px;

            }

        }
    </style>

</head>



<body>



    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="brand">

            <h3>Sihombing Group</h3>

            <p>Laporan Keuangan</p>

        </div>





        <nav class="menu">



            @if (auth()->user()->role === 'staf')



                <a href="{{ route('pemilik.dashboard') }}"
                    class="{{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}">

                    <i data-lucide="layout-dashboard"></i>

                    <span>Dashboard</span>

                </a>



                <a href="{{ route('pemilik.pohon-lokasi') }}"
                    class="{{ request()->routeIs('pemilik.pohon-lokasi') ? 'active' : '' }}">

                    <i data-lucide="map"></i>

                    <span>Data Pohon &amp; Lokasi</span>

                </a>



                <a href="{{ route('pemilik.input-pekerjaan') }}"
                    class="{{ request()->routeIs('pemilik.input-pekerjaan') ? 'active' : '' }}">

                    <i data-lucide="tractor"></i>

                    <span>Input Pekerjaan</span>

                </a>



                <a href="{{ route('pemilik.perawatan') }}"
                    class="{{ request()->routeIs('pemilik.perawatan') ? 'active' : '' }}">

                    <i data-lucide="archive"></i>

                    <span>Kelola Perawatan</span>

                </a>



                <a href="{{ route('pemilik.jadwal') }}" class="{{ request()->routeIs('pemilik.jadwal') ? 'active' : '' }}">

                    <i data-lucide="calendar"></i>

                    <span>Kelola Jadwal</span>

                </a>



            @elseif (auth()->user()->role === 'pemilik')



                <a href="{{ route('pemilik.keuangan') }}"
                    class="{{ request()->routeIs('pemilik.keuangan') ? 'active' : '' }}">

                    <i data-lucide="banknote"></i>

                    <span>Laporan Keuangan</span>

                </a>



            @endif



        </nav>



        <div class="sidebar-bottom">

            <div class="sidebar-divider"></div>



            <a class="support" href="#" onclick="alert('Hubungi administrator untuk bantuan.'); return false;">

                <span class="menu-icon"><i data-lucide="circle-help"></i></span>

                Support

            </a>



            <a class="logout" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                <span class="menu-icon"><i data-lucide="log-out"></i></span>

                Logout

            </a>



            <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>

                @csrf

            </form>

        </div>

    </aside>



    <!-- MAIN CONTENT -->

    <main class="main">
        @if (session('success'))
            <div class="flash-success" role="status">{{ session('success') }}</div>
        @endif



        <!-- HEADER -->

        <header class="topbar">

            <h1>Laporan Keuangan</h1>



            <div class="filters">

                <select id="monthFilter" class="month-select" aria-label="Pilih bulan">
                    <option value="all" {{ $selectedMonth === 'all' ? 'selected' : '' }}>Semua Bulan</option>
                    @foreach ($monthOptions as $monthOption)
                        <option value="{{ $monthOption['value'] }}" {{ $selectedMonth === $monthOption['value'] ? 'selected' : '' }}>
                            {{ $monthOption['label'] }}
                        </option>
                    @endforeach
                </select>



                <button class="filter-btn" type="button" onclick="applyFilter()">

                    <i data-lucide="list-filter"></i>

                    Apply Filter

                </button>

            </div>

        </header>



        <!-- SUMMARY CARDS -->

        <section class="summary">

            <div class="summary-card">

                <div class="card-icon">

                    <i data-lucide="trending-up"></i>

                </div>



                <span class="change" id="incomeChange">0% vs bulan lalu</span>



                <div class="card-label">Total Pemasukan</div>



                <div class="amount">

                    <span class="currency">Rp</span>

                    <span id="totalIncomeAmount">{{ number_format($initialTotals['income'], 0, ',', '.') }}</span>
                </div>

            </div>



            <div class="summary-card expense">

                <div class="card-icon">

                    <i data-lucide="trending-down"></i>

                </div>



                <span class="change" id="expenseChange">0% vs bulan lalu</span>



                <div class="card-label">Total Pengeluaran</div>



                <div class="amount">

                    <span class="currency">Rp</span>

                    <span id="totalExpenseAmount">{{ number_format($initialTotals['expense'], 0, ',', '.') }}</span>
                </div>

            </div>



            <div class="summary-card balance">

                <div class="card-icon">

                    <i data-lucide="wallet"></i>

                </div>



                <div class="card-label">Saldo Akhir</div>



                <div class="amount">

                    <span class="currency">Rp</span>

                    <span id="totalBalanceAmount">{{ number_format($initialTotals['balance'], 0, ',', '.') }}</span>
                </div>

            </div>

        </section>



        <!-- DETAIL TRANSAKSI -->

        <section class="transaction-box">

            <div class="transaction-header">

                <h2>Detail Transaksi</h2>



                <div class="transaction-actions">
                    <label class="search-box">
                        <i data-lucide="search"></i>
                        <input type="search" id="searchInput" placeholder="Search transactions..."
                            aria-label="Cari transaksi">
                    </label>
                    <button class="add-transaction-btn" type="button" onclick="openTransactionModal()">
                        <i data-lucide="plus"></i>
                        Tambah Transaksi
                    </button>
                </div>

            </div>



            <div class="table-wrap">

                <table>

                    <thead>

                        <tr>

                            <th>Tanggal</th>

                            <th>Keterangan</th>

                            <th>Pemasukan</th>

                            <th>Pengeluaran</th>

                            <th>Status</th>

                        </tr>

                    </thead>



                    <tbody id="transactionBody"></tbody>

                </table>

            </div>



            <div class="table-footer">

                <span class="table-info" id="tableInfo"></span>

                <div class="pagination" id="pagination"></div>

            </div>

        </section>



        <div id="transactionModal" class="modal-overlay" hidden onclick="closeTransactionModal(event)">
            <section class="transaction-modal" role="dialog" aria-modal="true" aria-labelledby="transactionModalTitle"
                onclick="event.stopPropagation()">
                <div class="modal-heading">
                    <h2 id="transactionModalTitle">Tambah Transaksi</h2>
                    <button class="modal-close" type="button" aria-label="Tutup"
                        onclick="closeTransactionModal()">&times;</button>
                </div>

                @if ($errors->any())
                    <div class="form-error">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('pemilik.keuangan.store') }}" method="POST">
                    @csrf
                    <div class="form-field">
                        <label for="transaction_date">Tanggal</label>
                        <input type="date" id="transaction_date" name="transaction_date"
                            value="{{ old('transaction_date', now()->format('Y-m-d')) }}" required>
                    </div>
                    <div class="form-field">
                        <label for="description">Keterangan</label>
                        <input type="text" id="description" name="description" maxlength="255"
                            value="{{ old('description') }}" placeholder="Contoh: Penjualan TBS Blok A" required>
                    </div>
                    <div class="form-field">
                        <label for="type">Jenis Transaksi</label>
                        <select id="type" name="type" required>
                            <option value="income" {{ old('type', 'income') === 'income' ? 'selected' : '' }}>Pemasukan
                            </option>
                            <option value="expense" {{ old('type') === 'expense' ? 'selected' : '' }}>Pengeluaran</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <label for="amount">Nominal (Rp)</label>
                        <input type="number" id="amount" name="amount" min="0.01" max="9999999999999.99" step="0.01"
                            value="{{ old('amount') }}" placeholder="Masukkan nominal" required>
                    </div>
                    <div class="form-field">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="Lunas" {{ old('status', 'Lunas') === 'Lunas' ? 'selected' : '' }}>Lunas
                            </option>
                            <option value="Pending" {{ old('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>
                    <div class="modal-actions">
                        <button class="cancel-btn" type="button" onclick="closeTransactionModal()">Batal</button>
                        <button class="save-btn" type="submit">Simpan Transaksi</button>
                    </div>
                </form>
            </section>
        </div>
    </main>

    <script>

        lucide.createIcons();



        const transactions = @json($transactionData);

        let currentPage = 1;

        const perPage = 5;



        function rupiah(value) {

            if (value === 0) return '-';



            return 'Rp ' + value.toLocaleString('id-ID');

        }



        function dateLabel(value) {

            return new Date(value + 'T00:00:00')

                .toLocaleDateString('id-ID', {

                    day: '2-digit',

                    month: 'short',

                    year: 'numeric'

                });

        }



        function escapeHtml(value) {
            return String(value ?? '').replace(/[&<>"']/g, function (character) {
                return ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' })[character];
            });
        }

        function periodTransactions(month) {
            return transactions.filter(transaction => month === 'all' || transaction.date.startsWith(month));
        }

        function changeText(current, previous) {
            if (previous === 0) return current === 0 ? '0% vs bulan lalu' : 'Baru vs bulan lalu';
            const percentage = Math.round(((current - previous) / previous) * 100);
            return `${percentage > 0 ? '+' : ''}${percentage}% vs bulan lalu`;
        }

        function updateSummary() {
            const month = document.getElementById('monthFilter').value;
            const selected = periodTransactions(month);
            const totalIncome = selected.reduce((sum, transaction) => sum + Number(transaction.income || 0), 0);
            const totalExpense = selected.reduce((sum, transaction) => sum + Number(transaction.expense || 0), 0);

            document.getElementById('totalIncomeAmount').textContent = Math.round(totalIncome).toLocaleString('id-ID');
            document.getElementById('totalExpenseAmount').textContent = Math.round(totalExpense).toLocaleString('id-ID');
            document.getElementById('totalBalanceAmount').textContent = Math.round(totalIncome - totalExpense).toLocaleString('id-ID');

            const incomeChange = document.getElementById('incomeChange');
            const expenseChange = document.getElementById('expenseChange');
            if (month === 'all') {
                incomeChange.textContent = 'Semua periode';
                expenseChange.textContent = 'Semua periode';
                return;
            }

            const monthDate = new Date(`${month}-01T00:00:00`);
            monthDate.setMonth(monthDate.getMonth() - 1);
            const previousMonth = `${monthDate.getFullYear()}-${String(monthDate.getMonth() + 1).padStart(2, '0')}`;
            const previousTransactions = periodTransactions(previousMonth);
            const previousIncome = previousTransactions.reduce((sum, transaction) => sum + Number(transaction.income || 0), 0);
            const previousExpense = previousTransactions.reduce((sum, transaction) => sum + Number(transaction.expense || 0), 0);
            incomeChange.textContent = changeText(totalIncome, previousIncome);
            expenseChange.textContent = changeText(totalExpense, previousExpense);
        }

        function getFiltered() {

            const month = document.getElementById('monthFilter').value;

            const query = document.getElementById('searchInput')

                .value.toLowerCase().trim();



            return transactions.filter(transaction => {

                const matchesMonth =

                    month === 'all' || transaction.date.startsWith(month);



                const matchesSearch =

                    transaction.description.toLowerCase().includes(query) ||

                    transaction.status.toLowerCase().includes(query) ||

                    transaction.date.includes(query);



                return matchesMonth && matchesSearch;

            });

        }



        function applyFilter() {

            currentPage = 1;

            renderTable();

        }



        function renderTable() {
            updateSummary();
            const filtered = getFiltered();



            const totalPages = Math.max(

                1,

                Math.ceil(filtered.length / perPage)

            );



            if (currentPage > totalPages) {

                currentPage = totalPages;

            }



            const start = (currentPage - 1) * perPage;

            const items = filtered.slice(start, start + perPage);



            const body = document.getElementById('transactionBody');



            if (items.length) {

                body.innerHTML = items.map(transaction => `

                    <tr>

                        <td>${dateLabel(transaction.date)}</td>

                        <td>${escapeHtml(transaction.description)}</td>

                        <td class="income">${rupiah(transaction.income)}</td>

                        <td class="expense-text">${rupiah(transaction.expense)}</td>

                        <td>

                            <span class="status ${transaction.status === 'Lunas' ? 'paid' : 'pending'

                    }">${escapeHtml(transaction.status)}</span>

                        </td>

                    </tr>

                `).join('');

            } else {

                body.innerHTML = `

                    <tr>

                        <td colspan="5" class="empty-row">

                            Tidak ada transaksi yang ditemukan.

                        </td>

                    </tr>

                `;

            }



            document.getElementById('tableInfo').textContent =

                `Showing ${filtered.length ? start + 1 : 0}–` +

                `${Math.min(start + perPage, filtered.length)} of ` +

                `${filtered.length} transactions`;



            let paginationHTML = `

                <button class="page-btn" type="button"

                    ${currentPage === 1 ? 'disabled' : ''}

                    onclick="goToPage(${currentPage - 1})">

                    <i data-lucide="chevron-left"></i>

                </button>

            `;



            for (let page = 1; page <= totalPages; page++) {

                paginationHTML += `

                    <button class="page-btn ${page === currentPage ? 'active' : ''

                    }" type="button" onclick="goToPage(${page})">

                        ${page}

                    </button>

                `;

            }



            paginationHTML += `

                <button class="page-btn" type="button"

                    ${currentPage === totalPages ? 'disabled' : ''}

                    onclick="goToPage(${currentPage + 1})">

                    <i data-lucide="chevron-right"></i>

                </button>

            `;



            document.getElementById('pagination').innerHTML = paginationHTML;



            lucide.createIcons();

        }



        function goToPage(page) {

            const totalPages = Math.max(

                1,

                Math.ceil(getFiltered().length / perPage)

            );



            if (page < 1 || page > totalPages) return;



            currentPage = page;

            renderTable();

        }



        function openTransactionModal() {
            document.getElementById('transactionModal').hidden = false;
            const descriptionInput = document.getElementById('description');
            if (descriptionInput) descriptionInput.focus();
        }

        function closeTransactionModal(event) {
            if (event && event.target !== document.getElementById('transactionModal')) return;
            document.getElementById('transactionModal').hidden = true;
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeTransactionModal();
        });

        document.getElementById('monthFilter')
            .addEventListener('change', applyFilter);



        document.getElementById('searchInput')

            .addEventListener('input', applyFilter);



        renderTable();
        @if ($errors->any())
            openTransactionModal();
        @endif
    </script>



</body>



</html>