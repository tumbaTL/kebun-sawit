<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Pekerja - Kebun Sawit</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7f5;
            color: #333;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 235px;
            background: #ffffff;
            border-right: 1px solid #e5e5e5;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
        }

        .logo {
            padding: 28px 25px 10px;
        }

        .logo h2 {
            color: #16833b;
            font-size: 20px;
            margin-bottom: 5px;
        }

        .logo p {
            font-size: 10px;
            color: #16833b;
        }

        .menu {
            margin-top: 25px;
            padding: 0 12px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #555;
            font-size: 13px;
            padding: 12px 15px;
            border-radius: 12px;
            margin-bottom: 5px;
        }

        .menu a:hover {
            background: #eaffed;
            color: #16833b;
        }

        .menu a.active {
            background: #7cf28a;
            color: #126f31;
            font-weight: bold;
        }

        .menu-icon {
            width: 17px;
            text-align: center;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid #e5e5e5;
            padding: 15px 12px 20px;
        }

        .sidebar-bottom a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #555;
            font-size: 13px;
            padding: 10px 15px;
        }

        .sidebar-bottom .logout {
            color: #e53935;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 235px;
            width: calc(100% - 235px);
        }

        /* ================= HEADER ================= */

        .header {
            height: 58px;
            background: white;
            border-bottom: 1px solid #e5e5e5;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 25px;
            gap: 18px;
        }

        .user-name {
            background: #f4f5f4;
            padding: 7px 14px;
            border-radius: 20px;
            font-size: 12px;
            color: #444;
        }

        .header-icon {
            font-size: 16px;
            color: #777;
        }

        .avatar {
            width: 27px;
            height: 27px;
            border-radius: 50%;
            background: #16833b;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: bold;
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 38px 28px;
        }

        .welcome h1 {
            color: #106d2d;
            font-size: 22px;
            margin-bottom: 7px;
        }

        .welcome p {
            color: #777;
            font-size: 12px;
            line-height: 1.6;
        }

        /* ================= CARDS ================= */

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 28px;
        }

        .card {
            background: white;
            border: 1px solid #dedede;
            border-radius: 8px;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 13px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.03);
        }

        .card-icon {
            width: 30px;
            height: 30px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .green {
            background: #e2f8e5;
            color: #16833b;
        }

        .light-green {
            background: #c8ffd0;
            color: #16833b;
        }

        .red {
            background: #ffe0e0;
            color: #e53935;
        }

        .card-title {
            font-size: 10px;
            color: #777;
            margin-bottom: 4px;
        }

        .card-number {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        /* ================= TASK ================= */

        .task-section {
            background: white;
            border: 1px solid #dedede;
            border-radius: 8px;
            margin-top: 22px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.03);
            overflow: hidden;
        }

        .task-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 18px 13px;
        }

        .task-header h2 {
            font-size: 15px;
            color: #444;
        }

        .filter {
            background: #f4f4f4;
            border: none;
            border-radius: 5px;
            padding: 5px 9px;
            color: #777;
            font-size: 10px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            background: #fafafa;
            color: #777;
            font-size: 9px;
            font-weight: normal;
            padding: 10px 12px;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        td {
            padding: 11px 12px;
            border-bottom: 1px solid #eee;
            font-size: 10px;
            color: #555;
        }

        .task-id {
            color: #16833b;
            font-weight: bold;
        }

        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 10px;
            font-size: 8px;
            font-weight: bold;
        }

        .status-selesai {
            background: #d9f9dd;
            color: #16833b;
        }

        .status-berjalan {
            background: #d9f9dd;
            color: #16833b;
        }

        .status-menunggu {
            background: #eeeeee;
            color: #777;
        }

        .status-terlambat {
            background: #ffdada;
            color: #e53935;
        }

        .detail {
            color: #16833b;
            text-decoration: none;
            font-weight: bold;
        }

        .detail:hover {
            text-decoration: underline;
        }

        .task-footer {
            padding: 11px 15px;
            display: flex;
            justify-content: space-between;
            font-size: 9px;
            color: #777;
        }

        /* ================= FLOATING BUTTON ================= */

        .floating-button {
            position: fixed;
            right: 22px;
            bottom: 20px;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: none;
            background: #16833b;
            color: white;
            font-size: 17px;
            cursor: pointer;
            box-shadow: 0 3px 8px rgba(0,0,0,0.15);
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
                width: calc(100% - 190px);
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 25px 18px;
            }

            table {
                min-width: 700px;
            }

            .task-section {
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            <h2>Sihombing Group</h2>
            <p>Dashboard Pekerja</p>
        </div>

        <nav class="menu">

            <a href="#" class="active">
                <span class="menu-icon">▦</span>
                Dashboard
            </a>

            <a href="#">
                <span class="menu-icon">▣</span>
                Arahan Tugas
            </a>

            <a href="#">
                <span class="menu-icon">▤</span>
                Data Pohon
            </a>

            <a href="#">
                <span class="menu-icon">▧</span>
                Laporan Pekerjaan
            </a>

        </nav>

        <div class="sidebar-bottom">

            <a href="#">
                <span>?</span>
                Support
            </a>

            <a href="#" class="logout"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span>↪</span>
                Logout
            </a>

            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                @csrf
            </form>

        </div>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <!-- HEADER -->
        <header class="header">

            <div class="user-name">
                👤 {{ Auth::user()->name }}
            </div>

            <span class="header-icon">♧</span>
            <span class="header-icon">⚙</span>

            <div class="avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

        </header>


        <!-- CONTENT -->
        <section class="content">

            <!-- WELCOME -->
            <div class="welcome">

                <h1>
                    Selamat Pagi, {{ Auth::user()->name }}!
                </h1>

                <p>
                    Siap untuk melanjutkan pemeliharaan di Blok C12 hari ini?
                    <br>
                    Tetap jaga keselamatan kerja.
                </p>

            </div>


            <!-- CARDS -->
            <div class="cards">

                <div class="card">

                    <div class="card-icon green">
                        ▣
                    </div>

                    <div>
                        <div class="card-title">
                            Tugas Hari Ini
                        </div>

                        <div class="card-number">
                            12
                        </div>
                    </div>

                </div>


                <div class="card">

                    <div class="card-icon light-green">
                        ✓
                    </div>

                    <div>
                        <div class="card-title">
                            Tugas Selesai
                        </div>

                        <div class="card-number">
                            08
                        </div>
                    </div>

                </div>


                <div class="card">

                    <div class="card-icon red">
                        ▣
                    </div>

                    <div>
                        <div class="card-title">
                            Tugas Belum Selesai
                        </div>

                        <div class="card-number">
                            04
                        </div>
                    </div>

                </div>

            </div>


            <!-- TASK TABLE -->
            <div class="task-section">

                <div class="task-header">

                    <h2>Daftar Tugas</h2>

                    <button class="filter">
                        ☷ Filter
                    </button>

                </div>


                <table>

                    <thead>

                        <tr>
                            <th>ID TUGAS</th>
                            <th>JENIS TUGAS</th>
                            <th>LOKASI</th>
                            <th>DEADLINE</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td class="task-id">
                                TGS-10224
                            </td>

                            <td>
                                Pemangkasan Pelepah
                            </td>

                            <td>
                                📍 Blok C12 - Barat
                            </td>

                            <td>
                                14:30 WIB
                            </td>

                            <td>
                                <span class="status status-selesai">
                                    ✓ Selesai
                                </span>
                            </td>

                            <td>
                                <a href="#" class="detail">
                                    Detail
                                </a>
                            </td>

                        </tr>


                        <tr>

                            <td class="task-id">
                                TGS-10225
                            </td>

                            <td>
                                Pemupukan Organik
                            </td>

                            <td>
                                📍 Blok D05 - Tengah
                            </td>

                            <td>
                                17:00 WIB
                            </td>

                            <td>
                                <span class="status status-berjalan">
                                    ✓ Berjalan
                                </span>
                            </td>

                            <td>
                                <a href="#" class="detail">
                                    Detail
                                </a>
                            </td>

                        </tr>


                        <tr>

                            <td class="task-id">
                                TGS-10226
                            </td>

                            <td>
                                Pengecekan Hama
                            </td>

                            <td>
                                📍 Blok B08 - Utara
                            </td>

                            <td>
                                Besok, 08:00
                            </td>

                            <td>
                                <span class="status status-menunggu">
                                    • Menunggu
                                </span>
                            </td>

                            <td>
                                <a href="#" class="detail">
                                    Detail
                                </a>
                            </td>

                        </tr>


                        <tr>

                            <td class="task-id">
                                TGS-10227
                            </td>

                            <td>
                                Panen TBS
                            </td>

                            <td>
                                📍 Blok A01 - Selatan
                            </td>

                            <td style="color:#e53935;">
                                TERLEWAT
                            </td>

                            <td>
                                <span class="status status-terlambat">
                                    ⚠ Terlambat
                                </span>
                            </td>

                            <td>
                                <a href="#" class="detail">
                                    Detail
                                </a>
                            </td>

                        </tr>

                    </tbody>

                </table>


                <div class="task-footer">

                    <span>
                        Menampilkan 4 dari 12 tugas
                    </span>

                    <span>
                        ‹ &nbsp; ›
                    </span>

                </div>

            </div>

        </section>

    </main>

</div>


<!-- FLOATING BUTTON -->
<button class="floating-button">
    ☎
</button>

</body>
</html>