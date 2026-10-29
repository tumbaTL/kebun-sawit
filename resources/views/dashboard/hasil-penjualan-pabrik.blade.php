<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Hasil Penjualan ke Pabrik - Sihombing Group</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f9f7;
            color: #263128;
            font-size: 13px
        }

        :root {
            --green: #08752a;
            --border: #d6e0d5;
            --muted: #687168
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 212px;
            height: 100vh;
            background: #fff;
            border-right: 1px solid #d9ded9;
            display: flex;
            flex-direction: column;
            z-index: 100;
            overflow-y: auto
        }

        .brand {
            padding: 29px 23px 20px
        }

        .brand strong {
            display: block;
            color: #08752a;
            font-size: 14px;
            margin-bottom: 4px
        }

        .brand span {
            font-size: 13px;
            color: #5b655e
        }

        .nav {
            padding: 0 9px;
            display: flex;
            flex-direction: column;
            gap: 5px
        }

        .nav a {
            min-height: 43px;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 8px 17px;
            color: #505b52;
            text-decoration: none;
            border-radius: 0 25px 25px 0;
            font-size: 14px;
            line-height: 1.3;
            transition: background .15s
        }

        .nav a svg {
            width: 19px;
            height: 19px;
            flex: 0 0 19px;
            stroke-width: 1.8
        }

        .nav a:hover {
            background: #eff8ee;
            color: #08752a
        }

        .nav a.active {
            background: #8cf083;
            color: #12672a;
            border-left: 3px solid #087b24;
            padding-left: 14px
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 20px 16px 13px
        }

        .sidebar-divider {
            height: 1px;
            background: #d9ded9;
            margin-bottom: 20px
        }

        .sidebar-bottom a {
            display: flex;
            align-items: center;
            gap: 14px;
            min-height: 42px;
            padding: 8px 12px;
            text-decoration: none;
            font-size: 14px;
            color: #505b52
        }

        .sidebar-bottom a svg {
            width: 19px;
            height: 19px
        }

        .sidebar-bottom .logout {
            color: #e32929
        }

        .main {
            margin-left: 212px;
            padding: 24px 22px 38px;
            min-height: 100vh
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 24px
        }

        .topbar h1 {
            font-size: 19px;
            color: #08752a
        }

        .top-user {
            font-size: 12px;
            color: #667066
        }

        .page-description {
            color: #6b746b;
            font-size: 12px;
            margin-top: 6px;
            line-height: 1.5
        }

        .month-select {
            height: 32px;
            border: 1px solid #ced9cc;
            border-radius: 6px;
            background: #fff;
            padding: 0 9px;
            font-size: 11px;
            max-width: 100%
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 32px;
            padding: 0 13px;
            border: 0;
            border-radius: 6px;
            background: #08752a;
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer
        }

        .btn svg {
            width: 14px;
            height: 14px
        }

        .filter-form {
            display: flex;
            align-items: center;
            gap: 8px
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 22px
        }

        .summary-card {
            background: #fff;
            border: 1px solid #e0e7df;
            border-top: 3px solid #08752a;
            border-radius: 9px;
            padding: 16px;
            min-height: 118px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .035)
        }

        .summary-card:nth-child(2) {
            border-top-color: #699b54
        }

        .summary-card:nth-child(3) {
            border-top-color: #2c8034
        }

        .summary-label {
            font-size: 11px;
            color: #687168;
            margin-bottom: 10px
        }

        .summary-value {
            font-size: 22px;
            font-weight: 700;
            color: #223629;
            overflow-wrap: anywhere
        }

        .summary-value small {
            font-size: 12px;
            font-weight: 600
        }

        .summary-note {
            font-size: 10px;
            color: #687168;
            margin-top: 6px
        }

        .panel {
            background: #fff;
            border: 1px solid #d7e1d5;
            border-radius: 9px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .03)
        }

        .panel-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            background: #f0f3f0;
            border-bottom: 1px solid #d7e1d5
        }

        .panel-head h2 {
            font-size: 14px
        }

        .table-wrap {
            overflow-x: auto
        }

        table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse
        }

        thead {
            background: #e4e6e4
        }

        th {
            font-size: 8px;
            letter-spacing: .4px;
            text-transform: uppercase;
            color: #495149;
            text-align: left;
            padding: 11px 9px;
            white-space: nowrap
        }

        td {
            border-top: 1px solid #e1e7df;
            padding: 12px 9px;
            font-size: 10px;
            line-height: 1.45
        }

        tbody tr:hover {
            background: #fbfdfb
        }

        .money {
            color: #08752a;
            font-weight: 700;
            white-space: nowrap
        }

        .status {
            display: inline-block;
            border-radius: 20px;
            padding: 4px 8px;
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap
        }

        .status.paid {
            background: #dff6df;
            color: #176a23
        }

        .status.pending {
            background: #fff0d6;
            color: #8b6116
        }

        .status.partial {
            background: #e7e9ff;
            color: #424c99
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #6b746b
        }

        .table-footer {
            padding: 10px 15px;
            background: #f3f5f3;
            border-top: 1px solid #d7e1d5;
            color: #687168;
            font-size: 10px
        }

        .alert {
            padding: 11px 14px;
            border-radius: 8px;
            margin-bottom: 14px;
            font-size: 12px
        }

        .alert.success {
            background: #e7f7e9;
            border: 1px solid #b8e7bf;
            color: #17672a
        }

        @media(max-width:950px) {
            .summary {
                grid-template-columns: 1fr 1fr
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column
            }
        }

        @media(max-width:760px) {
            .sidebar {
                width: 70px
            }

            .brand {
                padding: 21px 5px;
                text-align: center
            }

            .brand strong {
                font-size: 9px;
                overflow-wrap: anywhere
            }

            .brand span,
            .nav a span,
            .sidebar-bottom a span {
                display: none
            }

            .nav {
                padding: 0 5px
            }

            .nav a {
                justify-content: center;
                padding: 0;
                min-height: 43px
            }

            .nav a.active {
                padding-left: 0;
                border-left: 0
            }

            .sidebar-bottom {
                padding: 15px 5px
            }

            .sidebar-bottom a {
                justify-content: center;
                padding: 0
            }

            .main {
                margin-left: 70px;
                padding: 15px 12px
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column
            }
        }

        @media(max-width:560px) {
            .summary {
                grid-template-columns: 1fr
            }

            .panel-head {
                align-items: flex-start;
                flex-direction: column
            }

            .filter-form {
                width: 100%
            }

            .month-select {
                flex: 1
            }
        }

        /* SIDEBAR — disamakan dengan Kelola Perawatan */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            flex: 0 0 195px;
            width: 195px;
            min-width: 195px;
            height: 100vh;
            max-height: 100vh;
            background: #fff;
            border-right: 1px solid #d9ded9;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar .brand {
            height: 83px;
            padding: 25px 22px 0;
            flex: 0 0 83px;
            color: #086b22;
            font-family: 'Poppins', sans-serif;
            white-space: nowrap;
        }

        .sidebar .brand-name {
            color: #086b22;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: 700;
            line-height: normal;
            margin-bottom: 2px;
        }

        .sidebar .brand-subtitle {
            color: #666;
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            font-weight: 400;
            line-height: normal;
        }

        .sidebar nav.menu {
            padding: 0 10px;
            margin-top: 0;
            flex: 0 0 auto;
        }

        .sidebar .menu-item {
            width: 100%;
            min-height: 40px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 15px;
            margin-bottom: 5px;
            color: #525852;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-size: 11.5px;
            font-weight: 400;
            line-height: 1.35;
            border-radius: 0 22px 22px 0;
            transition: .2s;
        }

        .sidebar .menu-item svg {
            width: 16px;
            height: 16px;
            min-width: 16px;
            stroke-width: 1.8;
            flex: 0 0 16px;
        }

        .sidebar .menu-item span {
            min-width: 0;
        }

        .sidebar .menu-item:hover {
            background: #eaf8e9;
            color: #08751b;
        }

        .sidebar .menu-item.active {
            background: #8cf083;
            color: #086b22;
            border-left: 3px solid #08751b;
            padding-left: 12px;
        }

        .sidebar .menu-item.active svg {
            color: #086b22;
        }

        .sidebar .sidebar-bottom {
            margin-top: auto;
            padding: 0 10px 16px;
            flex: 0 0 auto;
            background: #fff;
        }

        .sidebar .sidebar-divider {
            height: 1px;
            background: #d9ddd9;
            margin: 0 6px 18px;
        }

        .sidebar .support,
        .sidebar .logout {
            height: 40px;
            min-height: 40px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 15px;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-size: 11.5px;
            font-weight: 400;
            border-radius: 5px;
        }

        .sidebar .support {
            color: #555;
            margin-bottom: 4px;
        }

        .sidebar .logout {
            color: #e32929;
        }

        .sidebar .support svg,
        .sidebar .logout svg {
            width: 16px;
            height: 16px;
            min-width: 16px;
            flex: 0 0 16px;
        }

        /* Konten dimulai tepat setelah sidebar 195 px */
        .main {
            margin-left: 195px;
            min-width: 0;
        }

        @media (max-width: 720px) {
            .sidebar {
                width: 65px;
                min-width: 65px;
                flex-basis: 65px;
            }

            .sidebar .brand {
                height: 90px;
                flex-basis: 90px;
                padding: 20px 0;
                text-align: center;
            }

            .sidebar .brand-name {
                font-size: 9px;
                overflow: hidden;
            }

            .sidebar .brand-subtitle,
            .sidebar .menu-item span,
            .sidebar .support span,
            .sidebar .logout span {
                display: none;
            }

            .sidebar .menu-item,
            .sidebar .support,
            .sidebar .logout {
                justify-content: center;
                padding: 0;
                border-radius: 8px;
            }

            .sidebar .menu-item.active {
                padding-left: 0;
            }

            .main {
                margin-left: 65px;
                padding-left: 12px;
                padding-right: 12px;
            }
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/staff-background.css') }}">

</head>

<body>
    <div class="app">
        <aside class="sidebar">
            <div class="brand">
                <div class="brand-name">Sihombing Group</div>
                <div class="brand-subtitle">Hasil Penjualan ke Pabrik</div>
            </div>
            <nav class="menu">
                <a href="{{ route('pemilik.dashboard') }}"
                    class="menu-item {{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}">
                    <i data-lucide="grid-2x2"></i><span>Dashboard</span>
                </a>
                <a href="{{ route('pemilik.pohon-lokasi') }}"
                    class="menu-item {{ request()->routeIs('pemilik.pohon-lokasi') ? 'active' : '' }}">
                    <i data-lucide="map"></i><span>Data Pohon &amp; Lokasi</span>
                </a>
                <a href="{{ route('pemilik.input-pekerjaan') }}"
                    class="menu-item {{ request()->routeIs('pemilik.input-pekerjaan') ? 'active' : '' }}">
                    <i data-lucide="tractor"></i><span>Input Pekerjaan</span>
                </a>
                <a href="{{ route('pemilik.perawatan') }}"
                    class="menu-item {{ request()->routeIs('pemilik.perawatan') ? 'active' : '' }}">
                    <i data-lucide="archive"></i><span>Kelola Perawatan</span>
                </a>
                <a href="{{ route('pemilik.jadwal') }}"
                    class="menu-item {{ request()->routeIs('pemilik.jadwal') ? 'active' : '' }}">
                    <i data-lucide="calendar-days"></i><span>Kelola Jadwal</span>
                </a>
                <a href="{{ route('pemilik.verifikasi-laporan') }}"
                    class="menu-item {{ request()->routeIs('pemilik.verifikasi-laporan*') ? 'active' : '' }}">
                    <i data-lucide="clipboard-check"></i><span>Verifikasi Laporan</span>
                </a>
                <a href="{{ route('staf.penjualan') }}"
                    class="menu-item {{ request()->routeIs('staf.penjualan*') ? 'active' : '' }}">
                    <i data-lucide="chart-no-axes-combined"></i><span>Laporan Penjualan</span>
                </a>
                <a href="{{ route('staf.hasil-penjualan') }}"
                    class="menu-item {{ request()->routeIs('staf.hasil-penjualan') ? 'active' : '' }}">
                    <i data-lucide="factory"></i><span>Hasil Penjualan ke Pabrik</span>
                </a>
            </nav>
            <div class="sidebar-bottom">
                <div class="sidebar-divider"></div>
                <a href="#" class="support"
                    onclick="alert('Silakan hubungi administrator untuk bantuan.'); return false;">
                    <i data-lucide="circle-help"></i><span>Support</span>
                </a>
                <a href="{{ route('logout') }}" class="logout"
                    onclick="event.preventDefault(); document.getElementById('logout-result-form').submit();">
                    <i data-lucide="log-out"></i><span>Logout</span>
                </a>
                <form id="logout-result-form" action="{{ route('logout') }}" method="POST" hidden>@csrf</form>
            </div>
        </aside>
        <main class="main">
            <header class="topbar">
                <div>
                    <h1>Hasil Penjualan ke Pabrik</h1>
                    <p class="page-description">Ringkasan tonase dan nilai penjualan berdasarkan periode panen 14 hari
                        per pabrik.</p>
                </div>
                <div class="top-user">{{ auth()->user()->name }} · Staf Kebun</div>
            </header>
            <section class="summary">
                <article class="summary-card">
                    <div class="summary-value">
                        <span data-count-up="{{ (float) $totalTons }}"
                            data-count-decimals="3">{{ number_format($totalTons, 3, ',', '.') }}</span>
                        <small>ton</small>
                    </div>
                </article>
                <article class="summary-card">
                    <div class="summary-value">
                        Rp <span data-count-up="{{ (float) $totalAmount }}"
                            data-count-decimals="0">{{ number_format($totalAmount, 0, ',', '.') }}</span>
                    </div>
                    <div class="summary-note">Nilai seluruh catatan penjualan</div>
                </article>
                <article class="summary-card">
                    <div class="summary-value">
                        <span data-count-up="{{ (float) $periodCount }}"
                            data-count-decimals="0">{{ number_format($periodCount, 0, ',', '.') }}</span>
                    </div>
                </article>
            </section>
            <section class="panel">
                <div class="panel-head">
                    <h2>Rekap Penjualan per 2 Minggu Panen</h2>
                    <form class="filter-form" method="GET" action="{{ route('staf.hasil-penjualan') }}"><select
                            name="month" class="month-select" aria-label="Pilih bulan">
                            <option value="all" {{ $selectedMonth === 'all' ? 'selected' : '' }}>Semua Periode</option>
                            @foreach ($monthOptions as $monthOption)
                            <option value="{{ $monthOption['value'] }}" {{ $selectedMonth === $monthOption['value'] ? 'selected' : '' }}>{{ $monthOption['label'] }}</option>@endforeach
                        </select><button class="btn" type="submit"><i data-lucide="list-filter"></i> Terapkan
                            Filter</button></form>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Periode Panen</th>
                                <th>Pabrik Tujuan</th>
                                <th>Jumlah Pengiriman</th>
                                <th>Total TBS (Ton)</th>
                                <th>Total Penjualan</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($periodReports as $report)
                                <tr>
                                    <td>{{ $report['period_start']->format('d M Y') }} –
                                        {{ $report['period_end']->format('d M Y') }}
                                    </td>
                                    <td>{{ $report['factory_name'] }}</td>
                                    <td>{{ $report['shipments'] }}</td>
                                    <td>{{ number_format($report['total_tons'], 3, ',', '.') }}</td>
                                    <td class="money">Rp {{ number_format($report['total_amount'], 0, ',', '.') }}</td>
                                    <td><span
                                            class="status {{ $report['status'] === 'Lunas' ? 'paid' : ($report['status'] === 'Sebagian Lunas' ? 'partial' : 'pending') }}">{{ $report['status'] }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty">Belum ada hasil penjualan. Tambahkan data melalui menu
                                        Laporan Penjualan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="table-footer">Setiap periode mencakup tanggal awal sampai 13 hari sesudahnya (total 14
                    hari). Data di halaman ini dihitung dari laporan penjualan yang diinput staf.</div>
            </section>
        </main>
    </div>
    <script>if (window.lucide) window.lucide.createIcons();</script>

    <script src="{{ asset('js/count-up.js') }}" defer></script>

</body>

</html>