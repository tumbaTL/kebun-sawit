<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Perawatan - Sihombing Group</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
            min-height: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f7f8f7;
            color: #202522;
            font-size: 13px;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }

        /* =========================================================
           APP
        ========================================================= */

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

        /* =========================
           SIDEBAR BOTTOM
        ========================= */

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

        /* =========================================================
           MAIN
        ========================================================= */

        .main {
            flex: 1;
            min-width: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* =========================================================
           TOP NAV
        ========================================================= */

        .topbar {
            height: 65px;
            background: #ffffff;
            border-bottom: 1px solid #e2e5e2;
            display: flex;
            align-items: center;
            padding: 0 20px;
        }

        .top-nav {
            display: flex;
            align-items: center;
            height: 100%;
            gap: 31px;
        }

        .top-nav a {
            height: 100%;
            display: flex;
            align-items: center;
            position: relative;
            color: #39423b;
            text-decoration: none;
            font-size: 12px;
            white-space: nowrap;
        }

        .top-nav a:hover {
            color: #106c27;
        }

        .top-nav a.active {
            color: #116c28;
            font-weight: 600;
        }

        .top-nav a.active::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 11px;
            height: 2px;
            background: #16752d;
        }

        .topbar-right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-box {
            width: 180px;
            height: 28px;
            border: 1px solid #cfd6cf;
            border-radius: 16px;
            display: flex;
            align-items: center;
            padding: 0 9px;
            gap: 7px;
            background: #fafbfa;
        }

        .search-box i {
            width: 15px;
            height: 15px;
            color: #3d453f;
        }

        .search-box input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            font-size: 11px;
            color: #555d57;
        }

        .search-box input::placeholder {
            color: #7c837d;
        }

        .top-icon {
            width: 18px;
            height: 18px;
            color: #313932;
            stroke-width: 1.8;
        }

        .profile-circle {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #17221a;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            font-weight: 600;
        }

        /* =========================================================
           CONTENT
        ========================================================= */

        .content {
            flex: 1;
            overflow-y: auto;
            padding: 14px 20px 30px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .page-title {
            font-size: 25px;
            line-height: 1;
            font-weight: 600;
            color: #1d211e;
        }

        .page-status {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-badge {
            height: 19px;
            padding: 0 11px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            font-weight: 500;
        }

        .status-active {
            background: #7df181;
            color: #176526;
        }

        .status-updated {
            background: #357b3e;
            color: #ffffff;
        }

        /* =========================================================
           GRID
        ========================================================= */

        .maintenance-grid {
            display: grid;
            grid-template-columns: 327px minmax(500px, 1fr);
            gap: 18px;
            align-items: start;
        }

        /* =========================================================
           CARD
        ========================================================= */

        .card {
            background: #ffffff;
            border: 1px solid #cbd2cc;
            border-radius: 9px;
            overflow: hidden;
        }

        /* =========================================================
           FORM CARD
        ========================================================= */

        .form-card {
            padding: 18px 18px 30px;
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 15px;
            font-weight: 600;
            color: #242a25;
            padding-bottom: 14px;
            border-bottom: 1px solid #d6dbd7;
            margin-bottom: 17px;
        }

        .card-title i {
            width: 16px;
            height: 16px;
            color: #188036;
            stroke-width: 2.2;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-label {
            display: block;
            font-size: 10.5px;
            color: #39423b;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            height: 33px;
            border: 1px solid #c7cec8;
            border-radius: 6px;
            background: #ffffff;
            outline: none;
            padding: 0 12px;
            color: #343b35;
            font-size: 11px;
        }

        .form-control::placeholder {
            color: #778079;
        }

        .form-control:focus {
            border-color: #23853b;
            box-shadow: 0 0 0 2px rgba(35, 133, 59, 0.08);
        }

        select.form-control {
            appearance: auto;
            cursor: pointer;
        }

        textarea.form-control {
            height: 68px;
            resize: none;
            padding: 9px 12px;
            line-height: 1.45;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 22px;
        }

        .btn {
            height: 31px;
            border-radius: 8px;
            padding: 0 15px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            font-size: 10.5px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn i {
            width: 13px;
            height: 13px;
        }

        .btn-save {
            min-width: 93px;
            background: #087126;
            color: #ffffff;
            border: 1px solid #087126;
        }

        .btn-save:hover {
            background: #075e20;
        }

        .btn-edit {
            min-width: 77px;
            background: #ffffff;
            color: #086d24;
            border: 1px solid #087126;
        }

        .btn-edit:hover {
            background: #f0faf1;
        }

        .delete-row {
            display: flex;
            justify-content: flex-end;
            margin-top: 38px;
        }

        .btn-delete {
            min-width: 88px;
            background: #ffffff;
            color: #e44b4b;
            border: 1px solid #f0caca;
        }

        .btn-delete:hover {
            background: #fff6f6;
        }

        /* =========================================================
           HISTORY CARD
        ========================================================= */

        .history-card {
            min-height: 459px;
        }

        .history-header {
            height: 59px;
            padding: 0 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #d5dad6;
        }

        .history-title {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 15px;
            font-weight: 600;
        }

        .history-title i {
            width: 16px;
            height: 16px;
            color: #148034;
            stroke-width: 2;
        }

        .filter-icon {
            width: 17px;
            height: 17px;
            color: #39433c;
        }

        /* =========================================================
           TABLE
        ========================================================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .history-table th {
            height: 49px;
            background: #f1f2f1;
            color: #39413b;
            text-align: left;
            padding: 0 10px;
            font-size: 8.5px;
            font-weight: 500;
            border-bottom: 1px solid #d0d5d1;
        }

        .history-table td {
            height: 55px;
            padding: 7px 10px;
            font-size: 10px;
            color: #353c36;
            border-bottom: 1px solid #d9ddd9;
            vertical-align: middle;
        }

        .history-table th:nth-child(1),
        .history-table td:nth-child(1) {
            width: 13%;
        }

        .history-table th:nth-child(2),
        .history-table td:nth-child(2) {
            width: 16%;
        }

        .history-table th:nth-child(3),
        .history-table td:nth-child(3) {
            width: 19%;
        }

        .history-table th:nth-child(4),
        .history-table td:nth-child(4) {
            width: 17%;
        }

        .history-table th:nth-child(5),
        .history-table td:nth-child(5) {
            width: 18%;
        }

        .history-table th:nth-child(6),
        .history-table td:nth-child(6) {
            width: 17%;
        }

        .tree-name {
            color: #087129;
            font-weight: 600;
            line-height: 1.25;
        }

        .worker-name {
            color: #333a34;
            line-height: 1.25;
        }

        .date-text {
            line-height: 1.35;
        }

        .type-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 20px;
            padding: 2px 7px;
            border-radius: 11px;
            font-size: 8.5px;
            line-height: 1.1;
            text-align: center;
        }

        .badge-green {
            background: #73ed7a;
            color: #126321;
        }

        .badge-dark-green {
            background: #3d8046;
            color: #ffffff;
        }

        .badge-red {
            background: #ffd7d7;
            color: #d93838;
        }

        .action-cell {
            color: #ffffff;
        }

        /* =========================================================
           BOTTOM PAGINATION
        ========================================================= */

        .history-footer {
            height: 54px;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
            padding: 0 11px 11px;
        }

        .pagination {
            display: flex;
            gap: 4px;
        }

        .page-btn {
            width: 17px;
            height: 17px;
            border: 1px solid #ccd2cd;
            border-radius: 4px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .page-btn i {
            width: 11px;
            height: 11px;
            color: #3c453e;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1000px) {

            .maintenance-grid {
                grid-template-columns: 1fr;
            }

            .form-card {
                max-width: none;
            }

            .history-card {
                min-height: auto;
            }
        }

        @media (max-width: 760px) {

            .sidebar {
                width: 180px;
                min-width: 180px;
            }

            .top-nav {
                gap: 16px;
            }

            .search-box {
                width: 140px;
            }

            .content {
                padding: 15px;
            }
        }

        @media (max-width: 600px) {

            .sidebar {
                display: none;
            }

            .top-nav a:nth-child(3) {
                display: none;
            }

            .topbar-right {
                gap: 10px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .history-table {
                min-width: 650px;
            }
        }
    </style>
</head>

<body>

    <div class="app">

        <aside class="sidebar">

            <div class="brand">
                <div class="brand-name">
                    Sihombing Group
                </div>

                <div class="brand-subtitle">
                    Kelola Perawatan
                </div>
            </div>

            <nav class="menu">

                <!-- Dashboard -->
                <a href="{{ route('pemilik.dashboard') }}" class="menu-item">
                    <i data-lucide="grid-2x2"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Data Pohon & Lokasi -->
                <a href="{{ url('/dashboard/pemilik/pohon-lokasi') }}" class="menu-item">
                    <i data-lucide="map"></i>
                    <span>Data Pohon & Lokasi</span>
                </a>

                <!-- Input Pekerjaan -->
                <a href="{{ route('pemilik.input-pekerjaan') }}" class="menu-item">
                    <i data-lucide="tractor"></i>
                    <span>Input Pekerjaan</span>
                </a>

                <!-- Kelola Perawatan -->
                <a href="{{ route('pemilik.perawatan') }}" class="menu-item active">
                    <i data-lucide="archive"></i>
                    <span>Kelola Perawatan</span>
                </a>

                <!-- Kelola Jadwal -->
                <a href="{{ route('pemilik.jadwal') }}" class="menu-item">
                    <i data-lucide="calendar-days"></i>
                    <span>Kelola Jadwal</span>
                </a>

                <!-- Laporan Keuangan -->
                <a href="{{ route('pemilik.keuangan') }}" class="menu-item">
                    <i data-lucide="banknote"></i>
                    <span>Laporan Keuangan</span>
                </a>

            </nav>

            <div class="sidebar-bottom">

                <div class="sidebar-divider"></div>

                <!-- Support -->
                <a href="#" class="support">
                    <i data-lucide="circle-help"></i>
                    <span>Support</span>
                </a>

                <!-- Logout -->
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


        <!-- =========================================================
         MAIN
    ========================================================== -->

        <main class="main">

            <!-- TOPBAR -->
            <header class="topbar">

                <nav class="top-nav">

                    <a href="{{ route('pemilik.dashboard') }}">
                        Overview
                    </a>

                    <a href="#" class="active">
                        Maintenance
                    </a>

                    <a href="#">
                        Field Ops
                    </a>

                </nav>

                <div class="topbar-right">

                    <div class="search-box">
                        <i data-lucide="search"></i>
                        <input type="text" placeholder="Search data...">
                    </div>

                    <i data-lucide="bell" class="top-icon"></i>

                    <i data-lucide="settings" class="top-icon"></i>

                    <div class="profile-circle">
                        SI
                    </div>

                </div>

            </header>


            <!-- CONTENT -->
            <section class="content">

                <!-- PAGE HEADER -->
                <div class="page-header">

                    <h1 class="page-title">
                        Kelola Perawatan
                    </h1>

                    <div class="page-status">

                        <span class="status-badge status-active">
                            Sector A-12 Active
                        </span>

                        <span class="status-badge status-updated">
                            Last Updated: 2h ago
                        </span>

                    </div>

                </div>


                <!-- MAIN GRID -->
                <div class="maintenance-grid">

                    <!-- =================================================
                     FORM PERAWATAN
                ================================================== -->

                    <div class="card form-card">

                        <div class="card-title">

                            <i data-lucide="list-plus"></i>

                            <span>
                                Form Perawatan
                            </span>

                        </div>


                        <form>

                            <!-- ID + TANGGAL -->
                            <div class="form-row">

                                <div class="form-group">

                                    <label class="form-label">
                                        ID Perawatan
                                    </label>

                                    <input type="text" class="form-control" value="MT-7729-24">

                                </div>


                                <div class="form-group">

                                    <label class="form-label">
                                        Tanggal Perawatan
                                    </label>

                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy">

                                </div>

                            </div>


                            <!-- JENIS PERAWATAN -->
                            <div class="form-group">

                                <label class="form-label">
                                    Jenis Perawatan
                                </label>

                                <select class="form-control">

                                    <option>
                                        Pemupukan NPK
                                    </option>

                                    <option>
                                        Pruning
                                    </option>

                                    <option>
                                        Pest Control
                                    </option>

                                    <option>
                                        Sanitation
                                    </option>

                                </select>

                            </div>


                            <!-- POHON + PEKERJA -->
                            <div class="form-row">

                                <div class="form-group">

                                    <label class="form-label">
                                        Pilih Pohon
                                    </label>

                                    <select class="form-control">

                                        <option>
                                            B-01-Palm
                                        </option>

                                        <option>
                                            A-04-Palm
                                        </option>

                                        <option>
                                            C-12-Palm
                                        </option>

                                        <option>
                                            B-09-Palm
                                        </option>

                                    </select>

                                </div>


                                <div class="form-group">

                                    <label class="form-label">
                                        Pilih Pekerja
                                    </label>

                                    <select class="form-control">

                                        <option>
                                            Andi Wijaya
                                        </option>

                                        <option>
                                            Siti Aminah
                                        </option>

                                        <option>
                                            Budi Santoso
                                        </option>

                                    </select>

                                </div>

                            </div>


                            <!-- KETERANGAN -->
                            <div class="form-group">

                                <label class="form-label">
                                    Keterangan
                                </label>

                                <textarea class="form-control"
                                    placeholder="Tambahkan catatan perawatan detail di sini..."></textarea>

                            </div>


                            <!-- BUTTON -->
                            <div class="form-actions">

                                <button type="button" class="btn btn-save">
                                    <i data-lucide="save"></i>
                                    Simpan
                                </button>


                                <button type="button" class="btn btn-edit">
                                    <i data-lucide="pencil"></i>
                                    Edit
                                </button>

                            </div>


                            <!-- DELETE -->
                            <div class="delete-row">

                                <button type="button" class="btn btn-delete">
                                    <i data-lucide="trash-2"></i>
                                    Hapus
                                </button>

                            </div>

                        </form>

                    </div>


                    <!-- =================================================
                     HISTORY PERAWATAN
                ================================================== -->

                    <div class="card history-card">

                        <!-- HEADER -->
                        <div class="history-header">

                            <div class="history-title">

                                <i data-lucide="history"></i>

                                <span>
                                    History Perawatan
                                </span>

                            </div>

                            <i data-lucide="filter" class="filter-icon"></i>

                        </div>


                        <!-- TABLE -->
                        <div class="table-wrapper">

                            <table class="history-table">

                                <thead>

                                    <tr>

                                        <th>
                                            ID
                                        </th>

                                        <th>
                                            POHON
                                        </th>

                                        <th>
                                            JENIS
                                        </th>

                                        <th>
                                            TANGGAL
                                        </th>

                                        <th>
                                            PEKERJA
                                        </th>

                                        <th>
                                            AKSI
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    <!-- ROW 1 -->
                                    <tr>

                                        <td>
                                            MT-7728
                                        </td>

                                        <td>
                                            <div class="tree-name">
                                                A-04-<br>
                                                Palm
                                            </div>
                                        </td>

                                        <td>
                                            <span class="type-badge badge-green">
                                                NPK<br>
                                                Fertilizer
                                            </span>
                                        </td>

                                        <td>
                                            <div class="date-text">
                                                24 Oct<br>
                                                2023
                                            </div>
                                        </td>

                                        <td>
                                            <div class="worker-name">
                                                Andi<br>
                                                Wijaya
                                            </div>
                                        </td>

                                        <td class="action-cell">
                                        </td>

                                    </tr>


                                    <!-- ROW 2 -->
                                    <tr>

                                        <td>
                                            MT-<br>
                                            7727
                                        </td>

                                        <td>
                                            <div class="tree-name">
                                                C-12-<br>
                                                Palm
                                            </div>
                                        </td>

                                        <td>
                                            <span class="type-badge badge-dark-green">
                                                Pruning
                                            </span>
                                        </td>

                                        <td>
                                            <div class="date-text">
                                                23 Oct<br>
                                                2023
                                            </div>
                                        </td>

                                        <td>
                                            <div class="worker-name">
                                                Siti<br>
                                                Aminah
                                            </div>
                                        </td>

                                        <td>
                                        </td>

                                    </tr>


                                    <!-- ROW 3 -->
                                    <tr>

                                        <td>
                                            MT-<br>
                                            7726
                                        </td>

                                        <td>
                                            <div class="tree-name">
                                                B-09-<br>
                                                Palm
                                            </div>
                                        </td>

                                        <td>
                                            <span class="type-badge badge-red">
                                                Pest<br>
                                                Control
                                            </span>
                                        </td>

                                        <td>
                                            <div class="date-text">
                                                22 Oct<br>
                                                2023
                                            </div>
                                        </td>

                                        <td>
                                            <div class="worker-name">
                                                Budi<br>
                                                Santoso
                                            </div>
                                        </td>

                                        <td>
                                        </td>

                                    </tr>


                                    <!-- ROW 4 -->
                                    <tr>

                                        <td>
                                            MT-<br>
                                            7725
                                        </td>

                                        <td>
                                            <div class="tree-name">
                                                A-01-<br>
                                                Palm
                                            </div>
                                        </td>

                                        <td>
                                            <span class="type-badge badge-green">
                                                Sanitation
                                            </span>
                                        </td>

                                        <td>
                                            <div class="date-text">
                                                21 Oct<br>
                                                2023
                                            </div>
                                        </td>

                                        <td>
                                            <div class="worker-name">
                                                Andi<br>
                                                Wijaya
                                            </div>
                                        </td>

                                        <td>
                                        </td>

                                    </tr>


                                    <!-- ROW 5 -->
                                    <tr>

                                        <td>
                                            MT-<br>
                                            7724
                                        </td>

                                        <td>
                                            <div class="tree-name">
                                                D-05-<br>
                                                Palm
                                            </div>
                                        </td>

                                        <td>
                                            <span class="type-badge badge-green">
                                                NPK<br>
                                                Fertilizer
                                            </span>
                                        </td>

                                        <td>
                                            <div class="date-text">
                                                20 Oct<br>
                                                2023
                                            </div>
                                        </td>

                                        <td>
                                            <div class="worker-name">
                                                Budi<br>
                                                Santoso
                                            </div>
                                        </td>

                                        <td>
                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>


                        <!-- FOOTER -->
                        <div class="history-footer">

                            <div class="pagination">

                                <button type="button" class="page-btn">
                                    <i data-lucide="chevron-left"></i>
                                </button>

                                <button type="button" class="page-btn">
                                    <i data-lucide="chevron-right"></i>
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </main>

    </div>


    <script>
        lucide.createIcons();
    </script>

</body>

</html>