<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Pohon & Lokasi</title>

    <!-- Poppins -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Lucide -->

    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

        }

        html,

        body {

            width: 100%;

            height: 100%;

        }

        body {

            font-family: 'Poppins', sans-serif;

            background: #f7f8f7;

            color: #303330;

            font-size: 13px;

        }

        /* =========================

           APP

        ========================= */

        .app {

            width: 100%;

            min-height: 100vh;

            display: flex;

            background: #f7f8f7;

        }

        /* =========================

           SIDEBAR

        ========================= */

        .sidebar {

            width: 195px;

            min-width: 195px;

            height: 100vh;

            position: sticky;

            top: 0;

            background: #ffffff;

            border-right: 1px solid #d9ded9;

            display: flex;

            flex-direction: column;

        }

        .brand {

            height: 83px;

            padding: 25px 22px 0 22px;

        }

        .brand-name {

            color: #086b22;

            font-size: 12px;

            font-weight: 700;

            margin-bottom: 2px;

        }

        .brand-subtitle {

            color: #666;

            font-size: 11px;

        }

        /* MENU */

        .menu {

            padding: 0 10px;

            margin-top: 0;

        }

        .menu-item {

            height: 40px;

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 0 15px;

            margin-bottom: 5px;

            color: #525852;

            text-decoration: none;

            border-radius: 0 22px 22px 0;

            transition: .2s;

            font-size: 11.5px;

        }

        .menu-item svg {

            width: 16px;

            height: 16px;

            min-width: 16px;

            flex-shrink: 0;

            stroke-width: 1.8;

        }

        .menu-item span {

            display: inline-block;

            min-width: 0;

        }

        /* MENU AKTIF - BERLAKU DI SEMUA UKURAN LAYAR */

        .menu-item.active {

            background: #8cf083;

            color: #086b22;

            border-left: 3px solid #08751b;

            padding-left: 12px;

        }

        .menu-item.active svg {

            color: #086b22;

        }

        .menu a {

            text-decoration: none;

        }

        /* BOTTOM SIDEBAR */

        .sidebar-bottom {

            margin-top: auto;

            padding: 0 10px 16px 10px;

        }

        .sidebar-divider {

            height: 1px;

            background: #d9ddd9;

            margin: 0 6px 18px;

        }

        .support,

        .logout {

            height: 40px;

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 0 15px;

            text-decoration: none;

            font-size: 11.5px;

            border-radius: 5px;

        }

        .support {

            color: #555;

            margin-bottom: 4px;

        }

        .logout {

            color: #e32929;

        }

        .support svg,

        .logout svg {

            width: 16px;

            height: 16px;

        }

        /* =========================

           MAIN

        ========================= */

        .main {

            flex: 1;

            min-width: 0;

            min-height: 100vh;

            display: flex;

            flex-direction: column;

        }

        /* =========================

           TOPBAR

        ========================= */

        .topbar {

            height: 62px;

            background: #ffffff;

            border-bottom: 1px solid #dfe3df;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 22px;

        }

        .top-brand {

            color: #086b22;

            font-size: 18px;

            font-weight: 700;

        }

        .top-right {

            display: flex;

            align-items: center;

            gap: 20px;

        }

        .search-top {

            width: 220px;

            height: 34px;

            border: 1px solid #d5dad5;

            border-radius: 20px;

            display: flex;

            align-items: center;

            gap: 9px;

            padding: 0 12px;

            background: #f8f9f8;

        }

        .search-top svg {

            width: 15px;

            height: 15px;

            color: #414841;

        }

        .search-top input {

            width: 100%;

            border: none;

            outline: none;

            background: transparent;

            font-family: inherit;

            font-size: 11px;

            color: #555;

        }

        .search-top input::placeholder {

            color: #8b908b;

        }

        .top-icon {

            position: relative;

            color: #3f4640;

        }

        .top-icon svg {

            width: 18px;

            height: 18px;

        }

        .notification-dot {

            position: absolute;

            width: 6px;

            height: 6px;

            background: #ef2929;

            border-radius: 50%;

            right: -2px;

            top: 0;

        }

        .profile-avatar {

            width: 30px;

            height: 30px;

            border-radius: 50%;

            background: #2c853d;

            border: 2px solid #d7ead8;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 10px;

            font-weight: 600;

            overflow: hidden;

        }

        .profile-avatar img {

            width: 100%;

            height: 100%;

            object-fit: cover;

        }

        /* =========================

           CONTENT

        ========================= */

        .content {

            flex: 1;

            overflow-y: auto;

            padding: 22px;

            position: relative;

        }

        .page-heading {

            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            margin-bottom: 17px;

        }

        .heading-left h1 {

            font-size: 23px;

            line-height: 1.2;

            font-weight: 600;

            color: #272b28;

            margin-bottom: 4px;

        }

        .heading-left p {

            font-size: 11px;

            color: #626862;

        }

        .export-btn {

            border: none;

            background: #08751b;

            color: white;

            height: 32px;

            padding: 0 14px;

            border-radius: 8px;

            font-family: inherit;

            font-size: 10px;

            font-weight: 500;

            cursor: pointer;

            display: flex;

            align-items: center;

            gap: 5px;

        }

        .export-btn:hover {

            background: #066414;

        }

        .export-btn svg {

            width: 13px;

            height: 13px;

        }

        /* =========================

           TOP GRID

        ========================= */

        .top-grid {

            display: grid;

            grid-template-columns: minmax(0, 1fr) 230px;

            gap: 16px;

            margin-bottom: 16px;

        }

        /* =========================

           FORM CARD

        ========================= */

        .card {

            background: #ffffff;

            border: 1px solid #d5ddd5;

            border-radius: 10px;

            box-shadow: 0 1px 2px rgba(0, 0, 0, .02);

        }

        .form-card {

            padding: 17px;

        }

        .notice {
            padding: 11px 14px;
            margin-bottom: 14px;
            border-radius: 7px;
            font-size: 11px;
        }

        .notice-success {
            color: #086b22;
            background: #eaf8e9;
            border: 1px solid #b9e6b9;
        }

        .notice-error {
            color: #a51d1d;
            background: #fff0f0;
            border: 1px solid #ffd0d0;
        }

        .notice-error ul {
            padding-left: 18px;
        }

        .field-error {
            display: block;
            margin-top: 4px;
            color: #c62020;
            font-size: 9px;
        }

        .page-btn.disabled {
            opacity: .45;
            pointer-events: none;
        }

        .card-title {

            display: flex;

            align-items: center;

            gap: 7px;

            font-size: 13px;

            font-weight: 600;

            color: #2d332e;

            margin-bottom: 15px;

        }

        .card-title svg {

            width: 16px;

            height: 16px;

            color: #08751b;

        }

        .form-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            column-gap: 17px;

            row-gap: 12px;

        }

        .form-group label {

            display: block;

            font-size: 10px;

            font-weight: 500;

            color: #464c46;

            margin-bottom: 5px;

        }

        .form-control {

            width: 100%;

            height: 30px;

            border: 1px solid #d4dcd4;

            border-radius: 6px;

            padding: 0 10px;

            outline: none;

            background: white;

            color: #4d534e;

            font-family: inherit;

            font-size: 10px;

        }

        .form-control::placeholder {

            color: #8d948e;

        }

        .form-control:focus {

            border-color: #58a861;

            box-shadow: 0 0 0 2px rgba(75, 170, 88, .08);

        }

        select.form-control {

            cursor: pointer;

        }

        .radio-group {

            display: flex;

            align-items: center;

            gap: 7px;

            height: 30px;

        }

        .radio-item {

            display: flex;

            align-items: center;

            gap: 3px;

            font-size: 10px;

            color: #5d625d;

            white-space: nowrap;

        }

        .radio-item input {

            margin: 0;

            accent-color: #08751b;

        }

        .form-actions {

            display: flex;

            gap: 10px;

            margin-top: 15px;

        }

        .btn {

            height: 31px;

            min-width: 124px;

            border-radius: 7px;

            font-family: inherit;

            font-size: 10px;

            cursor: pointer;

        }

        .btn-primary {

            border: none;

            background: #08751b;

            color: white;

        }

        .btn-primary:hover {

            background: #066414;

        }

        .btn-outline {

            border: 1px solid #08751b;

            background: white;

            color: #08751b;

        }

        .btn-danger {

            border: 1px solid #ff5555;

            background: white;

            color: #e83232;

            min-width: 80px;

        }

        /* =========================

           LAND STATUS

        ========================= */

        .land-card {

            background: #2e8436;

            border: none;

            border-radius: 9px;

            padding: 17px;

            color: white;

            box-shadow: 0 4px 10px rgba(0, 0, 0, .08);

            min-height: 209px;

        }

        .land-icon {

            width: 22px;

            height: 22px;

            margin-bottom: 6px;

        }

        .land-card h2 {

            font-size: 17px;

            font-weight: 500;

            margin-bottom: 3px;

        }

        .land-card p {

            color: #d5f0d7;

            font-size: 10px;

            line-height: 1.55;

            max-width: 190px;

        }

        .land-stats {

            display: flex;

            justify-content: space-between;

            align-items: flex-end;

            margin-top: 20px;

        }

        .land-stat-label {

            font-size: 8px;

            text-transform: uppercase;

            letter-spacing: .4px;

            color: #b9dfbd;

            margin-bottom: 1px;

        }

        .land-stat-value {

            font-size: 27px;

            line-height: 1;

            font-weight: 500;

        }

        .land-stat-small {

            text-align: right;

        }

        .land-stat-small .land-stat-value {

            font-size: 17px;

        }

        .progress {

            width: 100%;

            height: 5px;

            background: rgba(255, 255, 255, .25);

            border-radius: 10px;

            overflow: hidden;

            margin-top: 10px;

        }

        .progress span {

            display: block;

            width: 94%;

            height: 100%;

            background: white;

            border-radius: inherit;

        }

        /* =========================

           TABLE CARD

        ========================= */

        .table-card {

            overflow: hidden;

        }

        .table-header {

            min-height: 59px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 16px;

            border-bottom: 1px solid #d8ded8;

        }

        .table-title {

            display: flex;

            align-items: center;

            gap: 7px;

            font-size: 13px;

            font-weight: 600;

        }

        .table-title svg {

            width: 15px;

            height: 15px;

            color: #08751b;

        }

        .table-tools {

            display: flex;

            align-items: center;

            gap: 6px;

        }

        .table-search {

            width: 223px;

            height: 27px;

            border: 1px solid #d4dad4;

            border-radius: 10px;

            background: #f7f8f7;

            display: flex;

            align-items: center;

            gap: 6px;

            padding: 0 9px;

        }

        .table-search svg {

            width: 11px;

            height: 11px;

            color: #6f756f;

        }

        .table-search input {

            width: 100%;

            border: none;

            outline: none;

            background: transparent;

            font-family: inherit;

            font-size: 9px;

        }

        .filter-btn {

            width: 25px;

            height: 27px;

            border: 1px solid #d4dad4;

            border-radius: 7px;

            background: #f7f8f7;

            display: flex;

            align-items: center;

            justify-content: center;

            cursor: pointer;

        }

        .filter-btn svg {

            width: 13px;

            height: 13px;

            color: #4f564f;

        }

        /* =========================

           TABLE

        ========================= */

        .table-wrapper {

            overflow-x: auto;

        }

        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 680px;

        }

        thead {

            background: #f0f2f0;

        }

        th {

            height: 35px;

            text-align: left;

            padding: 0 17px;

            color: #555b56;

            font-size: 10px;

            font-weight: 600;

            letter-spacing: .2px;

        }

        td {

            height: 37px;

            padding: 0 17px;

            border-bottom: 1px solid #e0e4e0;

            font-size: 10px;

            color: #535953;

        }

        tbody tr:last-child td {

            border-bottom: none;

        }

        .tree-id {

            color: #08751b;

            font-weight: 600;

        }

        .condition {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-width: 34px;

            height: 15px;

            padding: 0 7px;

            border-radius: 10px;

            font-size: 7px;

            font-weight: 600;

            text-transform: uppercase;

        }

        .condition.healthy {

            background: #7ff17f;

            color: #08751b;

        }

        .condition.urgent {

            background: #ffd5d5;

            color: #dc2020;

        }

        .condition.recovery {

            background: #357e43;

            color: white;

        }

        .maintenance {

            display: flex;

            align-items: center;

            gap: 6px;

        }

        .maintenance-dot {

            width: 6px;

            height: 6px;

            border-radius: 50%;

            background: #08751b;

        }

        .maintenance-dot.red {

            background: #d92323;

        }

        .maintenance-dot.light {

            background: #90ed90;

        }

        .more {

            width: 25px;

            height: 25px;

            display: flex;

            align-items: center;

            justify-content: center;

        }

        .more svg {

            width: 14px;

            height: 14px;

        }

        /* =========================

           TABLE FOOTER

        ========================= */

        .table-footer {

            min-height: 60px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 17px;

            color: #5f665f;

            font-size: 10px;

        }

        .pagination {

            display: flex;

            align-items: center;

            gap: 5px;

        }

        .page-btn {

            width: 29px;

            height: 29px;

            border: 1px solid #d7ddd7;

            border-radius: 9px;

            background: white;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #555d55;

            font-family: inherit;

            font-size: 10px;

            cursor: pointer;

        }

        .page-btn svg {

            width: 14px;

            height: 14px;

        }

        .page-btn.active {

            background: #08751b;

            border-color: #08751b;

            color: white;

        }

        .page-btn:hover:not(.active) {

            background: #f2f7f2;

        }

        /* =========================

           RESPONSIVE

        ========================= */

        @media (max-width: 950px) {

            .sidebar {

                width: 180px;

                min-width: 180px;

            }

            .top-grid {

                grid-template-columns: 1fr;

            }

            .land-card {

                min-height: auto;

            }

        }

        @media (max-width: 750px) {

            .sidebar {

                width: 65px;

                min-width: 65px;

            }

            .brand {

                padding: 20px 0;

                text-align: center;

                height: 90px;

            }

            .brand-name {

                font-size: 9px;

            }

            .brand-subtitle,

            .menu-item span,

            .support span,

            .logout span {

                display: none;

            }

            .menu-item,

            .support,

            .logout {

                justify-content: center;

                padding: 0;

                border-radius: 8px;

            }

            .menu-item.active {

                background: #8cf083;

                color: #086b22;

                border-left: 3px solid #08751b;

                padding-left: 12px;

            }

            .topbar {

                padding: 0 12px;

            }

            .top-brand {

                font-size: 15px;

            }

            .search-top {

                display: none;

            }

            .content {

                padding: 15px;

            }

            .page-heading {

                gap: 10px;

            }

            .heading-left h1 {

                font-size: 19px;

            }

            .form-grid {

                grid-template-columns: 1fr;

            }

            .table-header {

                gap: 10px;

            }

            .table-tools {

                width: 50%;

            }

            .table-search {

                width: 100%;

            }

        }
    </style>

</head>

<body>

    <div class="app">

        <!-- =========================

         SIDEBAR

    ========================== -->

        <aside class="sidebar">

            <div class="brand">

                <div class="brand-name">

                    Sihombing Group

                </div>

                <div class="brand-subtitle">

                    Data Pohon & Lokasi

                </div>

            </div>

            <nav class="menu">

                @if (auth()->user()->role === 'staf')

                    <a href="{{ route('pemilik.dashboard') }}"
                        class="menu-item {{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}">

                        <i data-lucide="layout-dashboard"></i>

                        <span>Dashboard</span>

                    </a>

                    <a href="{{ route('pemilik.pohon-lokasi') }}"
                        class="menu-item {{ request()->routeIs('pemilik.pohon-lokasi') ? 'active' : '' }}">

                        <i data-lucide="map"></i>

                        <span>Data Pohon &amp; Lokasi</span>

                    </a>

                    <a href="{{ route('pemilik.input-pekerjaan') }}"
                        class="menu-item {{ request()->routeIs('pemilik.input-pekerjaan') ? 'active' : '' }}">

                        <i data-lucide="tractor"></i>

                        <span>Input Pekerjaan</span>

                    </a>

                    <a href="{{ route('pemilik.perawatan') }}"
                        class="menu-item {{ request()->routeIs('pemilik.perawatan') ? 'active' : '' }}">

                        <i data-lucide="archive"></i>

                        <span>Kelola Perawatan</span>

                    </a>

                    <a href="{{ route('pemilik.jadwal') }}"
                        class="menu-item {{ request()->routeIs('pemilik.jadwal') ? 'active' : '' }}">

                        <i data-lucide="calendar"></i>

                        <span>Kelola Jadwal</span>

                    </a>

                    <a href="{{ route('pemilik.verifikasi-laporan') }}"
                        class="menu-item {{ request()->routeIs('pemilik.verifikasi-laporan*') ? 'active' : '' }}">

                        <i data-lucide="clipboard-check"></i>

                        <span>Verifikasi Laporan</span>
                    </a>

                @elseif (auth()->user()->role === 'pemilik')

                    <a href="{{ route('pemilik.keuangan') }}"
                        class="menu-item {{ request()->routeIs('pemilik.keuangan') ? 'active' : '' }}">

                        <i data-lucide="banknote"></i>

                        <span>Laporan Keuangan</span>

                    </a>

                @endif

            </nav>

            <div class="sidebar-bottom">

                <div class="sidebar-divider"></div>

                <a href="#" class="support">

                    <i data-lucide="circle-help"></i>

                    <span>Support</span>

                </a>

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button type="submit" class="logout"
                        style="width: 100%; border: none; background: transparent; cursor: pointer; font-family: inherit; text-align: left;">

                        <i data-lucide="log-out"></i>

                        <span>Logout</span>

                    </button>

                </form>

            </div>

        </aside>

        <!-- =========================

         MAIN

    ========================== -->

        <main class="main">

            <!-- TOPBAR -->

            <header class="topbar">

                <div class="top-brand">

                    Sihombing Group

                </div>

                <div class="top-right">

                    <div class="search-top">

                        <i data-lucide="search"></i>

                        <input type="text" placeholder="Cari data pohon...">

                    </div>

                    <div class="top-icon">

                        <i data-lucide="bell"></i>

                        <span class="notification-dot"></span>

                    </div>

                    <div class="top-icon">

                        <i data-lucide="settings"></i>

                    </div>

                    <div class="profile-avatar">

                        @php

                            $name = Auth::user()->name ?? 'Pemilik Kebun';

                            $initials = collect(explode(' ', $name))

                                ->map(fn($word) => strtoupper(substr($word, 0, 1)))

                                ->take(2)

                                ->implode('');

                        @endphp

                        {{ $initials }}

                    </div>

                </div>

            </header>

            <!-- =========================

             CONTENT

        ========================== -->

            <section class="content">

                @if (session('success'))
                    <div class="notice notice-success" role="status">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="notice notice-error" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- PAGE TITLE -->

                <div class="page-heading">

                    <div class="heading-left">

                        <h1>

                            Data Pohon & Lokasi

                        </h1>

                        <p>

                            Kelola inventaris pohon sawit dan pantau kondisi setiap blok secara real-time.

                        </p>

                    </div>

                    <button class="export-btn" onclick="exportCSV()">

                        <i data-lucide="download"></i>

                        Ekspor CSV

                    </button>

                </div>

                <!-- =========================

                 FORM + STATUS

            ========================== -->

                <div class="top-grid">

                    <!-- FORM -->

                    <div class="card form-card">

                        <div class="card-title">
                            <i data-lucide="list-plus"></i>
                            Input Data Pohon
                        </div>

                        <form method="POST" action="{{ route('pemilik.pohon-lokasi.store') }}" id="treeForm">
                            @csrf

                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="treeId">ID Pohon</label>
                                    <input type="text" id="treeId" name="tree_code" class="form-control"
                                        placeholder="Contoh: PM-001-B2" value="{{ old('tree_code') }}" maxlength="50"
                                        required>
                                    @error('tree_code')
                                        <small class="field-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="treeLocation">Lokasi (Blok)</label>
                                    <input type="text" id="treeLocation" name="location" class="form-control"
                                        placeholder="Contoh: Blok B-02 North" value="{{ old('location') }}"
                                        maxlength="100" required>
                                    @error('location')
                                        <small class="field-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="treeAge">Umur Pohon (Bulan)</label>
                                    <input type="number" id="treeAge" name="age_months" class="form-control"
                                        placeholder="24" value="{{ old('age_months') }}" min="0" max="65535" required>
                                    @error('age_months')
                                        <small class="field-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="treeCondition">Kondisi Pohon</label>
                                    <select id="treeCondition" name="condition" class="form-control" required>
                                        <option value="Sehat" {{ old('condition', 'Sehat') === 'Sehat' ? 'selected' : '' }}>Sehat</option>
                                        <option value="Urgent" {{ old('condition') === 'Urgent' ? 'selected' : '' }}>
                                            Urgent</option>
                                        <option value="Pemulihan" {{ old('condition') === 'Pemulihan' ? 'selected' : '' }}>Pemulihan</option>
                                    </select>
                                    @error('condition')
                                        <small class="field-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Status Perawatan</label>
                                    <div class="radio-group">
                                        <label class="radio-item">
                                            <input type="radio" name="maintenance_status" value="Terkendali" {{ old('maintenance_status', 'Terkendali') === 'Terkendali' ? 'checked' : '' }} required>
                                            Terkendali
                                        </label>
                                        <label class="radio-item">
                                            <input type="radio" name="maintenance_status" value="Jadwal Mendatang" {{ old('maintenance_status') === 'Jadwal Mendatang' ? 'checked' : '' }}>
                                            Jadwal Mendatang
                                        </label>
                                        <label class="radio-item">
                                            <input type="radio" name="maintenance_status" value="Terlambat" {{ old('maintenance_status') === 'Terlambat' ? 'checked' : '' }}>
                                            Terlambat
                                        </label>
                                    </div>
                                    @error('maintenance_status')
                                        <small class="field-error">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    Tambah Pohon
                                </button>
                                <button type="button" class="btn btn-outline"
                                    onclick="alert('Fitur edit akan dihubungkan setelah fungsi tambah dan tampil data selesai diuji.');">
                                    Edit Data
                                </button>
                                <button type="button" class="btn btn-danger"
                                    onclick="alert('Fitur hapus belum dihubungkan ke database. Tidak ada data yang dihapus.');">
                                    Hapus
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- STATUS LAHAN -->

                    <div class="land-card">

                        <i data-lucide="leaf" class="land-icon"></i>

                        <h2>

                            Status Lahan

                        </h2>

                        <p>

                            Ringkasan inventaris mencakup {{ $totalBlocks }} blok dan data pohon yang tersimpan di
                            database.

                        </p>

                        <div class="land-stats">

                            <div>

                                <div class="land-stat-label">

                                    Total Pohon

                                </div>

                                <div class="land-stat-value">

                                    {{ number_format($totalTrees, 0, ',', '.') }}

                                </div>

                            </div>

                            <div class="land-stat-small">

                                <div class="land-stat-label">

                                    Rata-rata Umur

                                </div>

                                <div class="land-stat-value">

                                    {{ $averageAge }} Bln

                                </div>

                            </div>

                        </div>

                        <div class="progress" title="Persentase pohon dalam kondisi sehat">
                            <span style="width: {{ $healthyPercentage }}%"></span>
                        </div>
                        <p style="margin-top: 7px; font-size: 9px; color: #d5f0d7;">
                            {{ $healthyPercentage }}% pohon dalam kondisi sehat
                        </p>

                    </div>

                </div>

                <!-- =========================

                 TABLE

            ========================== -->

                <div class="card table-card">

                    <div class="table-header">

                        <div class="table-title">

                            <i data-lucide="table-2"></i>

                            Daftar Inventaris Pohon

                        </div>

                        <div class="table-tools">

                            <div class="table-search">

                                <i data-lucide="search"></i>

                                <input type="text" id="tableSearch" placeholder="Cari ID, Lokasi, atau Kondisi..."
                                    onkeyup="searchTable()">

                            </div>

                            <button class="filter-btn">

                                <i data-lucide="filter"></i>

                            </button>

                        </div>

                    </div>

                    <div class="table-wrapper">

                        <table id="treeTable">

                            <thead>

                                <tr>

                                    <th>ID POHON</th>

                                    <th>LOKASI</th>

                                    <th>UMUR</th>

                                    <th>KONDISI</th>

                                    <th>STATUS PERAWATAN</th>

                                    <th>AKSI</th>

                                </tr>

                            </thead>

                            <tbody>
                                @forelse ($trees as $tree)
                                    @php
                                        $conditionClass = match ($tree->condition) {
                                            'Sehat' => 'healthy',
                                            'Urgent' => 'urgent',
                                            default => 'recovery',
                                        };

                                        $maintenanceDotClass = match ($tree->maintenance_status) {
                                            'Terlambat' => 'red',
                                            'Jadwal Mendatang' => 'light',
                                            default => '',
                                        };
                                    @endphp
                                    <tr>
                                        <td><span class="tree-id">{{ $tree->tree_code }}</span></td>
                                        <td>{{ $tree->block?->name ?? '-' }}</td>
                                        <td>{{ $tree->age_months }} Bln</td>
                                        <td><span class="condition {{ $conditionClass }}">{{ $tree->condition }}</span></td>
                                        <td>
                                            <div class="maintenance">
                                                <span class="maintenance-dot {{ $maintenanceDotClass }}"></span>
                                                {{ $tree->maintenance_status }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="more" title="Aksi untuk {{ $tree->tree_code }}">
                                                <i data-lucide="more-vertical"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" style="text-align: center; padding: 24px;">
                                            Belum ada data pohon. Silakan tambahkan melalui formulir di atas.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    <!-- TABLE FOOTER -->
                    <div class="table-footer">
                        <div>
                            Menampilkan {{ $trees->firstItem() ?? 0 }}-{{ $trees->lastItem() ?? 0 }} dari
                            {{ number_format($trees->total(), 0, ',', '.') }} data pohon
                        </div>

                        <div class="pagination">
                            @if ($trees->onFirstPage())
                                <span class="page-btn disabled" aria-label="Halaman sebelumnya"><i
                                        data-lucide="chevron-left"></i></span>
                            @else
                                <a class="page-btn" href="{{ $trees->previousPageUrl() }}"
                                    aria-label="Halaman sebelumnya"><i data-lucide="chevron-left"></i></a>
                            @endif

                            <span class="page-btn active">{{ $trees->currentPage() }}</span>

                            @if ($trees->hasMorePages())
                                <a class="page-btn" href="{{ $trees->nextPageUrl() }}">{{ $trees->currentPage() + 1 }}</a>
                                <a class="page-btn" href="{{ $trees->nextPageUrl() }}" aria-label="Halaman berikutnya"><i
                                        data-lucide="chevron-right"></i></a>
                            @else
                                <span class="page-btn disabled" aria-label="Halaman berikutnya"><i
                                        data-lucide="chevron-right"></i></span>
                            @endif
                        </div>
                    </div>

                </div>

            </section>

        </main>

    </div>

    <script>

        lucide.createIcons();

        // =========================

        // SEARCH TABLE

        // =========================

        function searchTable() {

            const input =

                document.getElementById('tableSearch');

            const filter =

                input.value.toLowerCase();

            const table =

                document.getElementById('treeTable');

            const rows =

                table.getElementsByTagName('tbody')[0]

                    .getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {

                const text =

                    rows[i].textContent.toLowerCase();

                rows[i].style.display =

                    text.includes(filter) ? '' : 'none';

            }

        }

        // =========================
        // EDIT / HAPUS: belum diaktifkan agar tidak memberi kesan data sudah berubah.
        // =========================

        function editTree() {
            alert('Fitur edit belum dihubungkan ke database.');
        }

        function deleteTree() {
            alert('Fitur hapus belum dihubungkan ke database. Tidak ada data yang dihapus.');
        }

        // =========================
        // EXPORT CSV - berdasarkan data yang tampil di tabel
        // =========================

        function exportCSV() {
            const table = document.getElementById('treeTable');
            const rows = Array.from(table.querySelectorAll('tr')).map((row) => {
                return Array.from(row.querySelectorAll('th, td'))
                    .slice(0, -1)
                    .map((cell) => cell.innerText.trim());
            }).filter((row) => row.length > 0);

            const csv = rows.map((row) =>
                row.map((value) => `"${value.replace(/"/g, '""')}"`).join(',')
            ).join('\n');

            const blob = new Blob(['\ufeff' + csv], {
                type: 'text/csv;charset=utf-8;'
            });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'data-pohon.csv';
            link.click();
            URL.revokeObjectURL(url);
        }</script>

</body>

</html>