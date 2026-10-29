<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - Sihombing Group</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        :root {
            --green: #086b22;
            --dark-green: #2c8034;
            --light-green: #8cf083;
            --border: #d3ded0
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8f9f8;
            color: #292d2b;
            font-size: 13px
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 207px;
            height: 100vh;
            background: white;
            border-right: 1px solid #d9ded9;
            display: flex;
            flex-direction: column
        }

        .brand {
            height: 83px;
            flex: 0 0 83px;
            padding: 24px 21px 0
        }

        .brand h3 {
            color: var(--green);
            font-size: 13px;
            margin-bottom: 4px
        }

        .brand p {
            color: #555d55;
            font-size: 11px
        }

        .menu {
            padding: 0 5px;
            display: flex;
            flex-direction: column;
            gap: 5px
        }

        .menu a {
            height: 40px;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 15px;
            color: #4d554d;
            text-decoration: none;
            border-radius: 0 22px 22px 0;
            font-size: 11px
        }

        .menu a.active {
            background: var(--light-green);
            color: var(--green);
            border-left: 3px solid var(--green);
            padding-left: 12px
        }

        .menu-icon {
            width: 16px;
            height: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center
        }

        .menu-icon svg {
            width: 16px;
            height: 16px
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 0 5px 12px
        }

        .sidebar-divider {
            height: 1px;
            background: #d9ddd9;
            margin: 0 1px 18px
        }

        .sidebar-bottom a {
            height: 34px;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 15px;
            text-decoration: none;
            font-size: 11px;
            color: #4d554d
        }

        .logout {
            color: #e32929 !important
        }

        .main {
            margin-left: 207px;
            padding: 24px 18px 35px 21px;
            min-height: 100vh
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px
        }

        .topbar h1 {
            color: var(--green);
            font-size: 16px
        }

        .filters {
            display: flex;
            gap: 11px;
            align-items: center
        }

        .month-select {
            height: 36px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 0 10px;
            font-size: 11px;
            min-width: 155px
        }

        .filter-btn {
            height: 36px;
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 0 16px;
            border: 0;
            border-radius: 6px;
            background: var(--green);
            color: white;
            font-size: 11px;
            cursor: pointer
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 25px
        }

        .summary-card {
            min-height: 125px;
            padding: 17px 16px;
            border-radius: 9px;
            background: white;
            box-shadow: 0 2px 6px #0000000d;
            border-top: 3px solid var(--green)
        }

        .summary-card.tonnage {
            border-top-color: #699b54
        }

        .summary-card.unpaid {
            background: var(--dark-green);
            color: white;
            border-top-color: var(--dark-green)
        }

        .card-label {
            font-size: 11px;
            color: #596359;
            margin: 14px 0 5px
        }

        .unpaid .card-label {
            color: #d4ead5
        }

        .amount {
            font-size: 23px;
            font-weight: 750;
            overflow-wrap: anywhere
        }

        .currency {
            display: block;
            font-size: 20px
        }

        .small-note {
            margin-top: 7px;
            font-size: 10px;
            color: #687168
        }

        .unpaid .small-note {
            color: #e0f0e1
        }

        .transaction-box {
            background: white;
            border: 1px solid #cedbca;
            border-radius: 9px;
            overflow: hidden;
            box-shadow: 0 2px 5px #0000000a
        }

        .transaction-header {
            min-height: 58px;
            padding: 15px 16px;
            background: #f3f4f3;
            border-bottom: 1px solid #d2dbcf;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px
        }

        .transaction-header h2 {
            font-size: 13px
        }

        .search-box {
            width: 230px;
            height: 31px;
            padding: 0 9px;
            border: 1px solid #ccd7ca;
            border-radius: 6px;
            background: white;
            display: flex;
            align-items: center;
            gap: 5px
        }

        .search-box svg {
            width: 14px;
            height: 14px
        }

        .search-box input {
            width: 100%;
            border: 0;
            outline: none;
            font-size: 11px
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto
        }

        table {
            width: 100%;
            min-width: 920px;
            border-collapse: collapse
        }

        thead {
            background: #e2e2e2
        }

        th {
            padding: 10px 8px;
            font-size: 8px;
            color: #424a42;
            letter-spacing: .5px;
            text-transform: uppercase;
            text-align: left;
            white-space: nowrap
        }

        td {
            padding: 11px 9px;
            border-top: 1px solid #d5dfd2;
            font-size: 10px;
            line-height: 1.45
        }

        .money {
            color: #087b25;
            font-weight: bold;
            white-space: nowrap
        }

        .status {
            display: inline-block;
            min-width: 66px;
            padding: 4px 9px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 600;
            text-align: center
        }

        .paid {
            background: #91f78d;
            color: #176a23
        }

        .pending {
            background: #ffe6e6;
            color: #a82020
        }

        .empty-row {
            text-align: center !important;
            padding: 30px !important;
            color: #777
        }

        .footer {
            padding: 10px 15px;
            background: #f3f4f3;
            border-top: 1px solid #d2dbcf;
            font-size: 10px;
            color: #606860
        }

        @media(max-width:950px) {
            .summary {
                grid-template-columns: 1fr 1fr
            }

            .main {
                padding: 18px
            }

            .transaction-header {
                align-items: flex-start;
                flex-direction: column
            }

            .search-box {
                width: 100%
            }
        }

        @media(max-width:650px) {
            .sidebar {
                width: 65px
            }

            .brand {
                padding: 20px 4px;
                text-align: center
            }

            .brand h3 {
                font-size: 9px
            }

            .brand p,
            .menu a:not(.active) {
                font-size: 0
            }

            .menu a {
                justify-content: center;
                padding: 0
            }

            .menu a span:not(.menu-icon) {
                display: none
            }

            .sidebar-bottom a {
                justify-content: center;
                padding: 0;
                font-size: 0
            }

            .main {
                margin-left: 65px;
                padding: 14px 10px
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column
            }

            .filters {
                width: 100%
            }

            .month-select {
                flex: 1;
                min-width: 0
            }

            .summary {
                grid-template-columns: 1fr
            }
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/staff-background.css') }}">

</head>

<body>
    <aside class="sidebar">
        <div class="brand">
            <h3>Sihombing Group</h3>
            <p>Laporan Penjualan</p>
        </div>
        <nav class="menu">
            <a href="{{ route('pemilik.keuangan') }}" class="active">
                <span class="menu-icon"><i data-lucide="chart-no-axes-combined"></i></span>
                <span>Laporan Penjualan</span>
            </a>
        </nav>
        <div class="sidebar-bottom">
            <div class="sidebar-divider"></div>
            <a class="support" href="#" onclick="alert('Silakan hubungi administrator untuk bantuan.');return false">
                <span class="menu-icon"><i data-lucide="circle-help"></i></span>Support
            </a>
            <a class="logout" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-owner-form').submit()">
                <span class="menu-icon"><i data-lucide="log-out"></i></span>Logout
            </a>
            <form id="logout-owner-form" action="{{ route('logout') }}" method="POST" hidden>@csrf</form>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <h1>Laporan Penjualan</h1>
            <form class="filters" method="GET" action="{{ route('pemilik.keuangan') }}">
                <select name="month" class="month-select">
                    <option value="all" {{ $selectedMonth === 'all' ? 'selected' : '' }}>Semua Periode</option>
                    @foreach ($monthOptions as $monthOption)
                        <option value="{{ $monthOption['value'] }}" {{ $selectedMonth === $monthOption['value'] ? 'selected' : '' }}>{{ $monthOption['label'] }}</option>
                    @endforeach
                </select>
                <button class="filter-btn" type="submit"><i data-lucide="list-filter"></i> Terapkan Filter</button>
            </form>
        </header>

        <section class="summary">
            <article class="summary-card">
                <div class="amount">
                    <span class="currency">Rp</span>
                    <span data-count-up="{{ (float) $totalAmount }}"
                        data-count-decimals="0">{{ number_format($totalAmount, 0, ',', '.') }}</span>
                </div>
            </article>
            <article class="summary-card tonnage">
                <div class="amount">
                    <span data-count-up="{{ (float) $totalTons }}"
                        data-count-decimals="3">{{ number_format($totalTons, 3, ',', '.') }}</span>
                    ton
                </div>
            </article>
            <article class="summary-card unpaid">
                <div class="amount">
                    <span class="currency">Rp</span>
                    <span data-count-up="{{ (float) $unpaidAmount }}"
                        data-count-decimals="0">{{ number_format($unpaidAmount, 0, ',', '.') }}</span>
                </div>
            </article>
        </section>

        <section class="transaction-box">
            <div class="transaction-header">
                <h2>Detail Laporan Penjualan</h2>
                <label class="search-box"><i data-lucide="search"></i><input id="ownerSearch" type="search"
                        placeholder="Cari pabrik, petugas, periode..."></label>
            </div>
            <div class="table-wrap">
                <table id="ownerTable">
                    <thead>
                        <tr>
                            <th>Tanggal Kirim</th>
                            <th>Periode Panen 14 Hari</th>
                            <th>Pabrik Tujuan</th>
                            <th>TBS (Ton)</th>
                            <th>Harga/kg</th>
                            <th>Total Penjualan</th>
                            <th>Status</th>
                            <th>Dicatat Oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sales as $sale)
                            <tr>
                                <td>{{ $sale->sale_date->format('d M Y') }}</td>
                                <td>{{ $sale->harvest_period_start->format('d M Y') }} –
                                    {{ $sale->harvest_period_end->format('d M Y') }}
                                </td>
                                <td>{{ $sale->factory_name }}</td>
                                <td>{{ number_format((float) $sale->weight_tons, 3, ',', '.') }}</td>
                                <td>Rp {{ number_format((float) $sale->price_per_kg, 0, ',', '.') }}</td>
                                <td class="money">Rp {{ number_format((float) $sale->total_amount, 0, ',', '.') }}</td>
                                <td><span
                                        class="status {{ $sale->status === 'Lunas' ? 'paid' : 'pending' }}">{{ $sale->status }}</span>
                                </td>
                                <td>{{ $sale->creator?->name ?? 'Staf tidak tersedia' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="empty-row">Belum ada data penjualan untuk periode ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="footer" id="ownerInfo">Menampilkan {{ $sales->count() }} catatan. Halaman ini hanya untuk
                melihat laporan.</div>
        </section>
    </main>
    <script>
        if (window.lucide) window.lucide.createIcons();

        document.getElementById('ownerSearch').addEventListener('input', function () {
            const term = this.value.toLowerCase();
            let shown = 0;

            document.querySelectorAll('#ownerTable tbody tr').forEach(function (row) {
                const visible = row.innerText.toLowerCase().includes(term);
                row.style.display = visible ? '' : 'none';
                if (visible && !row.querySelector('.empty-row')) shown++;
            });

            document.getElementById('ownerInfo').textContent =
                'Menampilkan ' + shown + ' catatan. Halaman ini hanya untuk melihat laporan.';
        });
    </script>

    <script src="{{ asset('js/count-up.js') }}" defer></script>

</body>

</html>