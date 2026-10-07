<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Pemilik</title>

    <!-- Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #202020;
            color: #343434;
            font-size: 13px;
        }

        /* =====================================================
           LAYOUT
        ===================================================== */

        .app {
            width: calc(100% - 32px);
            height: calc(100vh - 24px);
            margin: 12px 16px;
            background: #f7f8f7;
            display: flex;
            overflow: hidden;
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            width: 195px;
            min-width: 195px;
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

        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        /* =====================================================
           HEADER
        ===================================================== */

        .topbar {
            height: 45px;
            background: #ffffff;
            border-bottom: 1px solid #d8ddd8;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px 0 17px;
        }

        .page-title {
            color: #086b22;
            font-size: 11.5px;
            font-weight: 600;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 19px;
        }

        .top-icon {
            color: #4e564f;
            position: relative;
            cursor: pointer;
        }

        .top-icon svg {
            width: 16px;
            height: 16px;
        }

        .notification-dot {
            width: 5px;
            height: 5px;
            background: #dc1717;
            border-radius: 50%;
            position: absolute;
            right: 1px;
            top: 0;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 8px;
            padding-left: 2px;
        }

        .profile-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #0b6e25;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 600;
            border: 2px solid #d8ead7;
        }

        .profile-info {
            line-height: 1.3;
        }

        .profile-name {
            font-size: 10.5px;
            font-weight: 600;
            color: #292d29;
        }

        .profile-role {
            font-size: 9.5px;
            color: #777;
        }

        /* =====================================================
           CONTENT
        ===================================================== */

        .content {
            flex: 1;
            overflow-y: auto;
            padding: 22px;
            position: relative;
        }

        /* =====================================================
           STAT CARDS
        ===================================================== */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 16px;
        }

        .stat-card {
            height: 102px;
            background: #fff;
            border: 1px solid #d3dbd2;
            border-radius: 8px;
            display: flex;
            align-items: center;
            padding: 15px 17px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .02);
        }

        .stat-icon {
            width: 34px;
            height: 34px;
            min-width: 34px;
            border-radius: 7px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
        }

        .stat-icon svg {
            width: 17px;
            height: 17px;
        }

        .stat-icon.dark {
            background: #328543;
            color: white;
        }

        .stat-icon.light {
            background: #8bf083;
            color: #08751b;
        }

        .stat-icon.green {
            background: #317e41;
            color: white;
        }

        .stat-icon.gray {
            background: #e8e9e8;
            color: #08751b;
        }

        .stat-title {
            font-size: 11px;
            color: #555;
            margin-bottom: 2px;
        }

        .stat-value {
            font-size: 13px;
            font-weight: 600;
            color: #303530;
        }

        .stat-change {
            color: #08751b;
            font-size: 10px;
            font-weight: 600;
            margin-top: 1px;
        }

        .stat-normal {
            color: #555;
            font-size: 10px;
        }

        .stat-urgent {
            color: #dc1515;
            font-size: 10px;
            font-weight: 600;
        }

        /* =====================================================
           MIDDLE SECTION
        ===================================================== */

        .middle {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 205px;
            gap: 16px;
            margin-bottom: 16px;
        }

        /* CHART */

        .chart-card {
            height: 278px;
            background: white;
            border: 1px solid #d3dbd2;
            border-radius: 8px;
            overflow: hidden;
        }

        .card-header {
            height: 65px;
            padding: 18px 17px 0;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .card-title {
            font-size: 11.5px;
            font-weight: 600;
            color: #333;
        }

        .card-subtitle {
            font-size: 10px;
            color: #666;
            margin-top: 2px;
        }

        .select-box {
            width: 123px;
            height: 30px;
            border: 1px solid #aab4aa;
            border-radius: 6px;
            background: white;
            color: #555;
            font-family: inherit;
            font-size: 10px;
            padding: 0 8px;
            outline: none;
        }

        .chart {
            height: 212px;
            display: flex;
            align-items: flex-end;
            padding: 0 17px 0;
            gap: 0;
        }

        .bar {
            flex: 1;
            border-radius: 6px 6px 0 0;
            background: #086b22;
            margin-right: 1px;
        }

        .bar:nth-child(1) {
            height: 57%;
        }

        .bar:nth-child(2) {
            height: 74%;
        }

        .bar:nth-child(3) {
            height: 39%;
        }

        .bar:nth-child(4) {
            height: 83%;
        }

        .bar:nth-child(5) {
            height: 62%;
        }

        .bar:nth-child(6) {
            height: 70%;
        }

        .bar:nth-child(7) {
            height: 48%;
            background: #70d66c;
        }

        .bar:nth-child(8) {
            height: 79%;
        }

        /* =====================================================
           ESTATE SUMMARY
        ===================================================== */

        .estate-card {
            height: 268px;
            background: linear-gradient(150deg, #076c20, #18752c);
            border-radius: 8px;
            padding: 17px;
            color: white;
            box-shadow: 0 3px 7px rgba(0, 80, 20, .15);
        }

        .estate-title {
            font-size: 11.5px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .estate-description {
            font-size: 10px;
            line-height: 1.6;
            color: #d2ead4;
            margin-bottom: 7px;
        }

        .estate-row {
            height: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, .18);
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 10px;
        }

        .estate-status {
            font-weight: 600;
        }

        .estate-button {
            width: 100%;
            height: 40px;
            border: none;
            border-radius: 6px;
            background: white;
            color: #086b22;
            font-family: inherit;
            font-size: 10px;
            font-weight: 600;
            margin-top: 15px;
            cursor: pointer;
        }

        .estate-button:hover {
            background: #f0f0f0;
        }

        /* =====================================================
           ACTIVITY TABLE
        ===================================================== */

        .activity-card {
            background: white;
            border: 1px solid #d3dbd2;
            border-radius: 8px;
            overflow: hidden;
        }

        .activity-header {
            height: 50px;
            padding: 0 17px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e1e4e1;
        }

        .activity-title {
            font-size: 11.5px;
            font-weight: 600;
        }

        .view-all {
            color: #08751b;
            text-decoration: none;
            font-size: 10px;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f1f3f1;
        }

        th {
            height: 35px;
            text-align: left;
            padding: 0 17px;
            font-size: 9.5px;
            color: #555d56;
            font-weight: 600;
            letter-spacing: .2px;
        }

        td {
            height: 50px;
            padding: 5px 17px;
            border-bottom: 1px solid #d9ded9;
            font-size: 10px;
            color: #3e423f;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .date {
            line-height: 1.4;
        }

        .activity-name {
            font-weight: 600;
            color: #303530;
        }

        .worker {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .worker-avatar {
            width: 21px;
            height: 21px;
            border-radius: 50%;
            background: #e9ece9;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 7px;
            font-weight: 600;
            color: #19722d;
        }

        .status {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 60px;
            height: 20px;
            padding: 0 9px;
            border-radius: 15px;
            font-size: 9px;
            font-weight: 600;
        }

        .status.done {
            background: #8af184;
            color: #08751b;
        }

        .status.running {
            background: #377d45;
            color: white;
            line-height: 10px;
            text-align: center;
        }

        .status.urgent {
            background: #ffd7d7;
            color: #e22121;
        }

        .action {
            text-align: center;
            color: #444;
        }

        .action svg {
            width: 16px;
            height: 16px;
        }

        /* =====================================================
           FLOATING BUTTON
        ===================================================== */

        .floating-button {
            position: fixed;
            right: 25px;
            bottom: 17px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #08751b;
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, .2);
            cursor: pointer;
        }

        .floating-button svg {
            width: 20px;
            height: 20px;
        }

        .floating-button:hover {
            background: #066414;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1000px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .middle {
                grid-template-columns: 1fr;
            }

            .estate-card {
                height: auto;
            }

        }

        @media (max-width: 750px) {

            body {
                background: #f7f8f7;
            }

            .app {
                width: 100%;
                height: 100vh;
                margin: 0;
            }

            .sidebar {
                width: 65px;
                min-width: 65px;
            }

            .brand {
                padding: 20px 0;
                text-align: center;
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

            .content {
                padding: 12px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .topbar {
                padding: 0 10px;
            }

            .profile-info {
                display: none;
            }

            .activity-card {
                overflow-x: auto;
            }

            table {
                min-width: 650px;
            }
        }
    </style>
</head>

<body>

<div class="app">

    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside class="sidebar">

        <div class="brand">
            <div class="brand-name">
                Sihombing Group
            </div>

            <div class="brand-subtitle">
                Dashboard
            </div>
        </div>


        <nav class="menu">

            <a href="#" class="menu-item active">
                <i data-lucide="grid-2x2"></i>
                <span>Dashboard</span>
            </a>

            <a href="#" class="menu-item">
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

            <a href="{{ route('logout') }}"
               class="logout"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                <i data-lucide="log-out"></i>

                <span>Logout</span>

            </a>

            <form id="logout-form"
                  action="{{ route('logout') }}"
                  method="POST"
                  style="display:none;">

                @csrf

            </form>

        </div>

    </aside>


    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="main">

        <!-- TOPBAR -->

        <header class="topbar">

            <div class="page-title">
                Dashboard Pemilik
            </div>


            <div class="top-right">

                <div class="top-icon">

                    <i data-lucide="bell"></i>

                    <span class="notification-dot"></span>

                </div>


                <div class="top-icon">

                    <i data-lucide="settings"></i>

                </div>


                <div class="profile">

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


                    <div class="profile-info">

                        <div class="profile-name">
                            {{ $name }}
                        </div>

                        <div class="profile-role">
                            Estates Owner
                        </div>

                    </div>

                </div>

            </div>

        </header>


        <!-- =================================================
             CONTENT
        ================================================== -->

        <section class="content">


            <!-- STATISTICS -->

            <div class="stats">


                <!-- TOTAL POHON -->

                <div class="stat-card">

                    <div class="stat-icon dark">
                        <i data-lucide="trees"></i>
                    </div>

                    <div>

                        <div class="stat-title">
                            Total Pohon
                        </div>

                        <div class="stat-value">
                            12,450
                        </div>

                        <div class="stat-change">
                            +12% vs last month
                        </div>

                    </div>

                </div>


                <!-- TOTAL PEKERJA -->

                <div class="stat-card">

                    <div class="stat-icon light">
                        <i data-lucide="users"></i>
                    </div>

                    <div>

                        <div class="stat-title">
                            Total Pekerja
                        </div>

                        <div class="stat-value">
                            148
                        </div>

                        <div class="stat-normal">
                            Active today
                        </div>

                    </div>

                </div>


                <!-- TUGAS AKTIF -->

                <div class="stat-card">

                    <div class="stat-icon green">
                        <i data-lucide="circle-check"></i>
                    </div>

                    <div>

                        <div class="stat-title">
                            Tugas Aktif
                        </div>

                        <div class="stat-value">
                            32
                        </div>

                        <div class="stat-urgent">
                            4 Urgent tasks
                        </div>

                    </div>

                </div>


                <!-- JADWAL -->

                <div class="stat-card">

                    <div class="stat-icon gray">
                        <i data-lucide="calendar-days"></i>
                    </div>

                    <div>

                        <div class="stat-title">
                            Jadwal Hari Ini
                        </div>

                        <div class="stat-value">
                            18
                        </div>

                        <div class="stat-normal">
                            Events & Inspections
                        </div>

                    </div>

                </div>

            </div>


            <!-- MIDDLE -->

            <div class="middle">


                <!-- KONDISI KEBUN -->

                <div class="chart-card">

                    <div class="card-header">

                        <div>

                            <div class="card-title">
                                Kondisi Kebun
                            </div>

                            <div class="card-subtitle">
                                Monitoring kesehatan kelapa sawit per blok
                            </div>

                        </div>


                        <select class="select-box">

                            <option>
                                7 Hari Terakhir
                            </option>

                            <option>
                                30 Hari Terakhir
                            </option>

                            <option>
                                3 Bulan Terakhir
                            </option>

                        </select>

                    </div>


                    <div class="chart">

                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>

                    </div>

                </div>


                <!-- RINGKASAN ESTATE -->

                <div class="estate-card">

                    <div class="estate-title">
                        Ringkasan Estate
                    </div>

                    <div class="estate-description">

                        Kesehatan keseluruhan estate mencapai 94%.
                        Sistem irigasi berjalan optimal.

                    </div>


                    <div class="estate-row">

                        <span>
                            Blok Utara
                        </span>

                        <span class="estate-status">
                            Sehat
                        </span>

                    </div>


                    <div class="estate-row">

                        <span>
                            Blok Selatan
                        </span>

                        <span class="estate-status">
                            Maintenance
                        </span>

                    </div>


                    <div class="estate-row">

                        <span>
                            Nursery
                        </span>

                        <span class="estate-status">
                            Optimal
                        </span>

                    </div>


                    <button class="estate-button">
                        Lihat Laporan Lengkap
                    </button>

                </div>

            </div>


            <!-- =================================================
                 AKTIVITAS TERBARU
            ================================================== -->

            <div class="activity-card">


                <div class="activity-header">

                    <div class="activity-title">
                        Aktivitas Terbaru
                    </div>

                    <a href="#" class="view-all">
                        Lihat Semua ›
                    </a>

                </div>


                <table>

                    <thead>

                    <tr>

                        <th>
                            TANGGAL
                        </th>

                        <th>
                            AKTIVITAS
                        </th>

                        <th>
                            PEKERJA
                        </th>

                        <th>
                            STATUS
                        </th>

                        <th>
                            AKSI
                        </th>

                    </tr>

                    </thead>


                    <tbody>


                    <!-- ROW 1 -->

                    <tr>

                        <td class="date">
                            24 Okt 2023,<br>
                            09:15
                        </td>

                        <td class="activity-name">
                            Pemupukan Blok A-12
                        </td>

                        <td>

                            <div class="worker">

                                <div class="worker-avatar">
                                    AD
                                </div>

                                Agus Dermawan

                            </div>

                        </td>

                        <td>

                            <span class="status done">
                                Selesai
                            </span>

                        </td>

                        <td class="action">

                            <i data-lucide="more-vertical"></i>

                        </td>

                    </tr>


                    <!-- ROW 2 -->

                    <tr>

                        <td class="date">
                            24 Okt 2023,<br>
                            08:30
                        </td>

                        <td class="activity-name">
                            Inspeksi Hama Blok C-02
                        </td>

                        <td>

                            <div class="worker">

                                <div class="worker-avatar">
                                    SM
                                </div>

                                Siti Maryam

                            </div>

                        </td>

                        <td>

                            <span class="status running">
                                Sedang<br>Jalan
                            </span>

                        </td>

                        <td class="action">

                            <i data-lucide="more-vertical"></i>

                        </td>

                    </tr>


                    <!-- ROW 3 -->

                    <tr>

                        <td class="date">
                            23 Okt 2023,<br>
                            16:45
                        </td>

                        <td class="activity-name">
                            Panen TBS Blok B-05
                        </td>

                        <td>

                            <div class="worker">

                                <div class="worker-avatar">
                                    RT
                                </div>

                                Rahmat Toyo

                            </div>

                        </td>

                        <td>

                            <span class="status urgent">
                                Urgent
                            </span>

                        </td>

                        <td class="action">

                            <i data-lucide="more-vertical"></i>

                        </td>

                    </tr>


                    <!-- ROW 4 -->

                    <tr>

                        <td class="date">
                            23 Okt 2023,<br>
                            14:00
                        </td>

                        <td class="activity-name">
                            Pembersihan Gulma Blok A-01
                        </td>

                        <td>

                            <div class="worker">

                                <div class="worker-avatar">
                                    BK
                                </div>

                                Bambang Kusuma

                            </div>

                        </td>

                        <td>

                            <span class="status done">
                                Selesai
                            </span>

                        </td>

                        <td class="action">

                            <i data-lucide="more-vertical"></i>

                        </td>

                    </tr>


                    </tbody>

                </table>

            </div>


        </section>

    </main>


    <!-- FLOATING BUTTON -->

    <button class="floating-button">

        <i data-lucide="plus"></i>

    </button>


</div>


<script>
    lucide.createIcons();
</script>

</body>

</html>