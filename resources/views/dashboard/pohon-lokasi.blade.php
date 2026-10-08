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
            stroke-width: 1.8;
        }

        .menu-item:hover {
            background: #eaf8e9;
            color: #08751b;
        }

        .menu-item.active {
            background: #8cf083;
            color: #086b22;
            border-left: 3px solid #08751b;
            padding-left: 12px;
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
                padding-left: 0;
                border-left: none;
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

                <a href="{{ route('pemilik.dashboard') }}" class="menu-item">
                    <i data-lucide="grid-2x2"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('pemilik.pohon-lokasi') }}" class="menu-item active">
                    <i data-lucide="map"></i>
                    <span>Data Pohon & Lokasi</span>
                </a>

                <a href="#" class="menu-item">
                    <i data-lucide="tractor"></i>
                    <span>Input Pekerjaan</span>
                </a>

                <a href="#" class="menu-item">
                    <i data-lucide="archive"></i>
                    <span>Kelola Perawatan</span>
                </a>

                <a href="#" class="menu-item">
                    <i data-lucide="calendar-days"></i>
                    <span>Kelola Jadwal</span>
                </a>

                <a href="#" class="menu-item">
                    <i data-lucide="banknote"></i>
                    <span>Laporan Keuangan</span>
                </a>

            </nav>

            <div class="sidebar-bottom">

                <div class="sidebar-divider"></div>

                <a href="#" class="support">
                    <i data-lucide="circle-help"></i>
                    <span>Support</span>
                </a>

                <a href="{{ route('logout') }}" class="logout"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                    <i data-lucide="log-out"></i>
                    <span>Logout</span>

                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">

                    @csrf

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

                        <div class="form-grid">

                            <div class="form-group">

                                <label>ID Pohon</label>

                                <input type="text" id="treeId" class="form-control" placeholder="Contoh: PM-001-B2">

                            </div>


                            <div class="form-group">

                                <label>Lokasi (Blok)</label>

                                <input type="text" id="treeLocation" class="form-control"
                                    placeholder="Contoh: Blok B-02 North">

                            </div>


                            <div class="form-group">

                                <label>Umur Pohon (Bulan)</label>

                                <input type="number" id="treeAge" class="form-control" placeholder="24">

                            </div>


                            <div class="form-group">

                                <label>Kondisi Pohon</label>

                                <select id="treeCondition" class="form-control">

                                    <option value="Sehat">
                                        Sehat
                                    </option>

                                    <option value="Urgent">
                                        Urgent
                                    </option>

                                    <option value="Pemulihan">
                                        Pemulihan
                                    </option>

                                </select>

                            </div>


                            <div class="form-group">

                                <label>
                                    Status Perawatan
                                </label>

                                <div class="radio-group">

                                    <label class="radio-item">
                                        <input type="radio" name="maintenance" value="Terkendali" checked>
                                        Terkendali
                                    </label>

                                    <label class="radio-item">
                                        <input type="radio" name="maintenance" value="Jadwal Mendatang">
                                        Jadwal Mendatang
                                    </label>

                                    <label class="radio-item">
                                        <input type="radio" name="maintenance" value="Terlambat">
                                        Terlambat
                                    </label>

                                </div>

                            </div>

                        </div>


                        <div class="form-actions">

                            <button class="btn btn-primary" onclick="addTree()">

                                Tambah Pohon

                            </button>

                            <button class="btn btn-outline" onclick="editTree()">

                                Edit Data

                            </button>

                            <button class="btn btn-danger" onclick="deleteTree()">

                                Hapus

                            </button>

                        </div>

                    </div>


                    <!-- STATUS LAHAN -->

                    <div class="land-card">

                        <i data-lucide="leaf" class="land-icon"></i>

                        <h2>
                            Status Lahan
                        </h2>

                        <p>
                            Blok B-02 North saat ini memiliki efisiensi
                            perawatan sebesar 94%.
                        </p>


                        <div class="land-stats">

                            <div>

                                <div class="land-stat-label">
                                    Total Pohon
                                </div>

                                <div class="land-stat-value">
                                    1,284
                                </div>

                            </div>


                            <div class="land-stat-small">

                                <div class="land-stat-label">
                                    Rata-rata Umur
                                </div>

                                <div class="land-stat-value">
                                    32 Bln
                                </div>

                            </div>

                        </div>


                        <div class="progress">
                            <span></span>
                        </div>

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

                                <tr>

                                    <td>
                                        <span class="tree-id">
                                            PM-001-B2
                                        </span>
                                    </td>

                                    <td>
                                        Blok B-02 North
                                    </td>

                                    <td>
                                        24 Bln
                                    </td>

                                    <td>
                                        <span class="condition healthy">
                                            Sehat
                                        </span>
                                    </td>

                                    <td>

                                        <div class="maintenance">

                                            <span class="maintenance-dot"></span>

                                            Terkendali

                                        </div>

                                    </td>

                                    <td>

                                        <div class="more">
                                            <i data-lucide="more-vertical"></i>
                                        </div>

                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        <span class="tree-id">
                                            PM-002-B2
                                        </span>
                                    </td>

                                    <td>
                                        Blok B-02 North
                                    </td>

                                    <td>
                                        24 Bln
                                    </td>

                                    <td>
                                        <span class="condition urgent">
                                            Urgent
                                        </span>
                                    </td>

                                    <td>

                                        <div class="maintenance">

                                            <span class="maintenance-dot red"></span>

                                            Terlambat 2 Hari

                                        </div>

                                    </td>

                                    <td>

                                        <div class="more">
                                            <i data-lucide="more-vertical"></i>
                                        </div>

                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        <span class="tree-id">
                                            PM-003-B2
                                        </span>
                                    </td>

                                    <td>
                                        Blok B-02 North
                                    </td>

                                    <td>
                                        22 Bln
                                    </td>

                                    <td>
                                        <span class="condition recovery">
                                            Pemulihan
                                        </span>
                                    </td>

                                    <td>

                                        <div class="maintenance">

                                            <span class="maintenance-dot light"></span>

                                            Jadwal Mendatang

                                        </div>

                                    </td>

                                    <td>

                                        <div class="more">
                                            <i data-lucide="more-vertical"></i>
                                        </div>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>


                    <!-- TABLE FOOTER -->

                    <div class="table-footer">

                        <div>
                            Menampilkan 1-10 dari 1,284 data pohon
                        </div>


                        <div class="pagination">

                            <button class="page-btn">
                                <i data-lucide="chevron-left"></i>
                            </button>

                            <button class="page-btn active">
                                1
                            </button>

                            <button class="page-btn">
                                2
                            </button>

                            <button class="page-btn">
                                <i data-lucide="chevron-right"></i>
                            </button>

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
        // TAMBAH POHON
        // =========================

        function addTree() {

            const id =
                document.getElementById('treeId').value;

            const location =
                document.getElementById('treeLocation').value;

            const age =
                document.getElementById('treeAge').value;

            if (!id || !location || !age) {

                alert('Silakan lengkapi data pohon terlebih dahulu.');

                return;
            }

            alert(
                'Data pohon ' + id +
                ' berhasil disiapkan untuk ditambahkan.'
            );
        }


        // =========================
        // EDIT
        // =========================

        function editTree() {

            alert(
                'Pilih data pohon pada tabel untuk diedit.'
            );
        }


        // =========================
        // DELETE
        // =========================

        function deleteTree() {

            const confirmDelete =
                confirm(
                    'Apakah Anda yakin ingin menghapus data pohon?'
                );

            if (confirmDelete) {

                alert('Data pohon berhasil dihapus.');

            }
        }


        // =========================
        // EXPORT CSV
        // =========================

        function exportCSV() {

            const rows = [
                ['ID POHON', 'LOKASI', 'UMUR', 'KONDISI', 'STATUS PERAWATAN'],

                [
                    'PM-001-B2',
                    'Blok B-02 North',
                    '24 Bln',
                    'Sehat',
                    'Terkendali'
                ],

                [
                    'PM-002-B2',
                    'Blok B-02 North',
                    '24 Bln',
                    'Urgent',
                    'Terlambat 2 Hari'
                ],

                [
                    'PM-003-B2',
                    'Blok B-02 North',
                    '22 Bln',
                    'Pemulihan',
                    'Jadwal Mendatang'
                ]
            ];

            let csv = rows
                .map(row =>
                    row.map(value =>
                        `"${value}"`
                    ).join(',')
                )
                .join('\n');

            const blob =
                new Blob([csv], {
                    type: 'text/csv;charset=utf-8;'
                });

            const url =
                URL.createObjectURL(blob);

            const link =
                document.createElement('a');

            link.href = url;

            link.download =
                'data-pohon.csv';

            link.click();

            URL.revokeObjectURL(url);
        }

    </script>

</body>

</html>