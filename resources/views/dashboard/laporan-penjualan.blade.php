<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Laporan Penjualan - Sihombing Group</title>
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
            --dark-green: #287d36;
            --light-green: #8cf083;
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

        .alert.error {
            background: #fff0f0;
            border: 1px solid #f2c2c2;
            color: #a52727
        }

        .alert ul {
            padding-left: 18px
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 20px
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
            border-top-color: #669b53
        }

        .summary-card:nth-child(3) {
            border-top-color: #cc3f3f
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
            margin-bottom: 20px;
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

        .panel-body {
            padding: 16px
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 13px
        }

        .field {
            min-width: 0
        }

        .field label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 6px;
            color: #394539
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            min-height: 36px;
            border: 1px solid #cfdacd;
            border-radius: 6px;
            padding: 8px 10px;
            background: #fff;
            color: #2d352d;
            font: inherit;
            font-size: 12px;
            outline-color: #72b47a
        }

        .field textarea {
            min-height: 70px;
            resize: vertical
        }

        .field.full {
            grid-column: 1/-1
        }

        .field .help {
            font-size: 10px;
            color: #737d73;
            margin-top: 5px;
            line-height: 1.4
        }

        .period-preview {
            background: #f4f8f3;
            border: 1px solid #dfe8dd;
            border-radius: 6px;
            padding: 10px;
            font-size: 12px;
            min-height: 36px;
            color: #315b35
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 9px;
            margin-top: 15px
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 36px;
            padding: 0 15px;
            border: 0;
            border-radius: 6px;
            background: #08752a;
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none
        }

        .btn svg {
            width: 15px;
            height: 15px
        }

        .btn:hover {
            background: #075f22
        }

        .btn.secondary {
            background: #e9f0e8;
            color: #355638
        }

        .list-tools {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .month-select,
        .search-input {
            height: 32px;
            border: 1px solid #ced9cc;
            border-radius: 6px;
            background: #fff;
            padding: 0 9px;
            font-size: 11px;
            max-width: 100%
        }

        .search-input {
            width: 210px
        }

        .table-wrap {
            overflow-x: auto
        }

        table {
            width: 100%;
            min-width: 900px;
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
            padding: 11px 9px;
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

        .empty {
            text-align: center;
            padding: 28px;
            color: #6b746b
        }

        .table-footer {
            padding: 10px 15px;
            background: #f3f5f3;
            border-top: 1px solid #d7e1d5;
            color: #687168;
            font-size: 10px
        }

        @media(max-width:1050px) {
            .form-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }

            .summary {
                grid-template-columns: 1fr 1fr
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

            .top-user {
                margin-top: 3px
            }
        }

        @media(max-width:560px) {

            .form-grid,
            .summary {
                grid-template-columns: 1fr
            }

            .field.full {
                grid-column: auto
            }

            .panel-head {
                align-items: flex-start;
                flex-direction: column
            }

            .list-tools {
                width: 100%;
                flex-wrap: wrap
            }

            .search-input {
                flex: 1;
                width: 100%
            }

            .form-actions {
                justify-content: stretch
            }

            .form-actions .btn {
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
                <div class="brand-subtitle">Laporan Penjualan</div>
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
                    onclick="event.preventDefault(); document.getElementById('logout-sales-form').submit();">
                    <i data-lucide="log-out"></i><span>Logout</span>
                </a>
                <form id="logout-sales-form" action="{{ route('logout') }}" method="POST" hidden>@csrf</form>
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <div>
                    <h1>Laporan Penjualan</h1>
                    <p class="page-description">Catat hasil penjualan TBS ke pabrik dan pantau nilai penjualannya.</p>
                </div>
                <div class="top-user">{{ auth()->user()->name }} · Staf Kebun</div>
            </header>

            @if (session('success'))
            <div class="alert success">{{ session('success') }}</div> @endif
            @if ($errors->any())
                <div class="alert error">
                    <ul>@foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>@endforeach
                    </ul>
            </div> @endif

            <section class="summary">
                <article class="summary-card">
                    <div class="summary-value">
                        Rp <span data-count-up="{{ (float) $totalAmount }}"
                            data-count-decimals="0">{{ number_format($totalAmount, 0, ',', '.') }}</span>
                    </div>
                </article>
                <article class="summary-card">
                    <div class="summary-value">
                        <span data-count-up="{{ (float) $totalTons }}"
                            data-count-decimals="3">{{ number_format($totalTons, 3, ',', '.') }}</span>
                        <small>ton</small>
                    </div>
                </article>
                <article class="summary-card">
                    <div class="summary-value">
                        Rp <span data-count-up="{{ (float) $unpaidAmount }}"
                            data-count-decimals="0">{{ number_format($unpaidAmount, 0, ',', '.') }}</span>
                    </div>
                </article>
            </section>

            <section class="panel">
                <div class="panel-head">
                    <h2>Tambah Laporan Penjualan</h2>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('staf.penjualan.store') }}">
                        @csrf
                        <div class="form-grid">
                            <div class="field"><label for="harvest_period_start">Tanggal awal periode
                                    panen</label><input type="date" id="harvest_period_start"
                                    name="harvest_period_start"
                                    value="{{ old('harvest_period_start', now()->startOfMonth()->format('Y-m-d')) }}"
                                    required>
                                <div class="help">Satu periode dihitung 14 hari, termasuk tanggal awal.</div>
                            </div>
                            <div class="field"><label>Periode panen (otomatis)</label>
                                <div class="period-preview" id="periodEndPreview">Pilih tanggal awal panen</div>
                            </div>
                            <div class="field"><label for="sale_date">Tanggal dikirim / dijual ke pabrik</label><input
                                    type="date" id="sale_date" name="sale_date"
                                    value="{{ old('sale_date', now()->format('Y-m-d')) }}" required></div>
                            <div class="field"><label for="factory_name">Nama pabrik tujuan</label><input type="text"
                                    id="factory_name" name="factory_name" value="{{ old('factory_name') }}"
                                    maxlength="150" placeholder="Contoh: PKS Sihombing" required></div>
                            <div class="field"><label for="weight_tons">Berat TBS (ton)</label><input type="number"
                                    id="weight_tons" name="weight_tons" value="{{ old('weight_tons') }}" min="0.001"
                                    max="99999.999" step="0.001" placeholder="Contoh: 24.500" required></div>
                            <div class="field"><label for="price_per_kg">Harga per kg (Rp)</label><input type="number"
                                    id="price_per_kg" name="price_per_kg" value="{{ old('price_per_kg') }}" min="0.01"
                                    max="99999.99" step="0.01" placeholder="Contoh: 2850" required></div>
                            <div class="field"><label for="status">Status pembayaran</label><select id="status"
                                    name="status" required>
                                    <option value="Belum Lunas" {{ old('status', 'Belum Lunas') === 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                                    <option value="Lunas" {{ old('status') === 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                </select></div>
                            <div class="field"><label>Perkiraan total penjualan</label>
                                <div class="period-preview" id="totalPreview">Rp 0</div>
                                <div class="help">Otomatis dihitung: ton × 1.000 × harga per kg.</div>
                            </div>
                            <div class="field full"><label for="notes">Catatan (opsional)</label><textarea id="notes"
                                    name="notes" maxlength="5000"
                                    placeholder="Contoh: nomor nota, kualitas TBS, atau catatan pengiriman">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                        <div class="form-actions"><button class="btn" type="submit"><i data-lucide="plus"></i>Simpan
                                Laporan Penjualan</button></div>
                    </form>
                </div>
            </section>

            <section class="panel">
                <div class="panel-head">
                    <h2>Riwayat Laporan Penjualan</h2>
                    <div class="list-tools">
                        <form method="GET" action="{{ route('staf.penjualan') }}" class="list-tools">
                            <select name="month" class="month-select" aria-label="Filter bulan">
                                <option value="all" {{ $selectedMonth === 'all' ? 'selected' : '' }}>Semua Periode
                                </option>@foreach ($monthOptions as $monthOption)
                                <option value="{{ $monthOption['value'] }}" {{ $selectedMonth === $monthOption['value'] ? 'selected' : '' }}>{{ $monthOption['label'] }}</option>@endforeach
                            </select>
                            <button class="btn secondary" type="submit">Filter</button>
                        </form>
                        <input id="searchSalesStaff" class="search-input" type="search"
                            placeholder="Cari pabrik atau petugas..." aria-label="Cari laporan">
                    </div>
                </div>
                <div class="table-wrap">
                    <table id="staffSalesTable">
                        <thead>
                            <tr>
                                <th>Periode Panen</th>
                                <th>Tanggal Kirim</th>
                                <th>Pabrik</th>
                                <th>TBS (Ton)</th>
                                <th>Harga/kg</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Dicatat Oleh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->harvest_period_start->format('d M Y') }} –
                                        {{ $sale->harvest_period_end->format('d M Y') }}
                                    </td>
                                    <td>{{ $sale->sale_date->format('d M Y') }}</td>
                                    <td>{{ $sale->factory_name }}@if($sale->notes)
                                    <div class="summary-note">{{ $sale->notes }}</div>@endif
                                    </td>
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
                                    <td colspan="8" class="empty">Belum ada laporan penjualan. Isi formulir di atas untuk
                                        menambah data pertama.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="table-footer" id="staffSalesInfo">Menampilkan {{ $sales->count() }} catatan untuk periode
                    yang dipilih.</div>
            </section>
        </main>
    </div>
    <script>
        if (window.lucide) window.lucide.createIcons();
        const startInput = document.getElementById('harvest_period_start');
        const tonInput = document.getElementById('weight_tons');
        const priceInput = document.getElementById('price_per_kg');
        const endPreview = document.getElementById('periodEndPreview');
        const totalPreview = document.getElementById('totalPreview');
        function updatePeriod() {
            if (!startInput.value) { endPreview.textContent = 'Pilih tanggal awal panen'; return; }
            const start = new Date(startInput.value + 'T00:00:00');
            start.setDate(start.getDate() + 13);
            const fmt = new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
            endPreview.textContent = `${fmt.format(new Date(startInput.value + 'T00:00:00'))} – ${fmt.format(start)}`;
        }
        function updateTotal() {
            const tons = Number(tonInput.value || 0), price = Number(priceInput.value || 0);
            totalPreview.textContent = 'Rp ' + new Intl.NumberFormat('id-ID', { maximumFractionDigits: 0 }).format(tons * 1000 * price);
        }
        startInput?.addEventListener('change', updatePeriod); tonInput?.addEventListener('input', updateTotal); priceInput?.addEventListener('input', updateTotal);
        updatePeriod(); updateTotal();
        document.getElementById('searchSalesStaff')?.addEventListener('input', function () {
            const term = this.value.toLowerCase(); let visible = 0;
            document.querySelectorAll('#staffSalesTable tbody tr').forEach(row => { const show = row.innerText.toLowerCase().includes(term); row.style.display = show ? '' : 'none'; if (show && !row.querySelector('.empty')) visible++; });
            document.getElementById('staffSalesInfo').textContent = `Menampilkan ${visible} catatan untuk periode yang dipilih.`;
        });
    </script>

    <script src="{{ asset('js/count-up.js') }}" defer></script>

</body>

</html>