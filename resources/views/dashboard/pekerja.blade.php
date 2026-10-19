<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pekerja | Sihombing Group</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --green: #287d35;
            --green-dark: #126524;
            --green-light: #8df58e;
            --border: #d4ded2;
            --text: #292d29;
            --muted: #657064;
            --bg: #f8f9f7;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', Arial, sans-serif;
            color: var(--text);
            background: var(--bg);
            font-size: 12px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 200px;
            background: #fff;
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            z-index: 20;
        }

        .brand {
            padding: 20px 16px;
            border-bottom: 1px solid #edf0eb;
        }

        .brand h2 {
            color: var(--green);
            font-size: 16px;
            margin: 0 0 8px;
            font-weight: 800;
        }

        .brand p {
            color: var(--green-dark);
            font-size: 10px;
            margin: 0;
            font-weight: 600;
        }

        .menu {
            padding: 12px 8px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 11px;
            min-height: 40px;
            margin-bottom: 4px;
            padding: 0 12px;
            border-radius: 6px;
            font-size: 11px;
            color: #303930;
            transition: background .2s;
        }

        .menu a svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .menu a:hover {
            background: #eff9ee;
            color: var(--green-dark);
        }

        .menu a.active {
            background: var(--green-light);
            color: var(--green-dark);
            font-weight: 600;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid var(--border);
            padding: 12px 10px;
        }

        .sidebar-bottom a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 5px;
            font-size: 10px;
        }

        .sidebar-bottom svg {
            width: 15px;
            height: 15px;
        }

        .sidebar-bottom .logout {
            color: #e11d2e;
        }

        .main {
            margin-left: 200px;
            min-height: 100vh;
        }

        .topbar {
            height: 52px;
            background: #fff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 22px;
        }

        .topbar-title {
            font-size: 13px;
            font-weight: 700;
            color: var(--green-dark);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-pill {
            border: 1px solid #d0d9cd;
            background: #f7f8f6;
            border-radius: 20px;
            padding: 6px 12px;
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 10px;
        }

        .user-pill svg {
            width: 13px;
            height: 13px;
            color: var(--green);
        }

        .top-icon {
            border: 0;
            background: transparent;
            color: #455145;
            cursor: pointer;
            display: flex;
            padding: 3px;
        }

        .top-icon svg {
            width: 17px;
            height: 17px;
        }

        .avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #d9e9d4;
            border: 1px solid #b6cdb1;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-dark);
            font-weight: 800;
            font-size: 11px;
        }

        .content {
            padding: 24px;
        }

        .welcome {
            background: #fff;
            border: 1px solid #f0f1ee;
            border-radius: 10px;
            min-height: 135px;
            padding: 32px 22px;
            margin-bottom: 20px;
        }

        .welcome h1 {
            color: var(--green-dark);
            font-size: 23px;
            margin: 0 0 9px;
            letter-spacing: -.5px;
            font-weight: 700;
        }

        .welcome p {
            color: #525b50;
            margin: 0 0 5px;
            font-size: 11px;
            line-height: 1.5;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 22px;
        }

        .stat-card {
            min-height: 82px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 9px;
            display: flex;
            align-items: center;
            padding: 15px;
            gap: 14px;
            min-width: 0;
        }

        .stat-card.late {
            border-left: 3px solid #dc2626;
        }

        .stat-icon {
            width: 38px;
            height: 38px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stat-icon svg {
            width: 19px;
            height: 19px;
        }

        .stat-icon.green {
            background: #2c8138;
            color: #fff;
        }

        .stat-icon.light {
            background: #91f594;
            color: #17692a;
        }

        .stat-icon.red {
            background: #ffe0de;
            color: #dc2626;
        }

        .stat-label {
            color: #4b5449;
            font-size: 10px;
            margin-bottom: 5px;
        }

        .stat-number {
            font-size: 19px;
            font-weight: 700;
        }

        .task-panel {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 9px;
            overflow: hidden;
            box-shadow: 0 2px 3px #0000000d;
        }

        .task-heading {
            min-height: 52px;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border);
        }

        .task-heading h2 {
            font-size: 13px;
            margin: 0;
            font-weight: 700;
        }

        .filter-wrap {
            position: relative;
        }

        .filter-button {
            border: 0;
            border-radius: 6px;
            background: #eeeeec;
            padding: 8px 12px;
            font-size: 10px;
            color: #444b43;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .filter-button svg {
            width: 13px;
            height: 13px;
        }

        .filter-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 36px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 7px;
            box-shadow: 0 5px 15px #00000012;
            min-width: 140px;
            padding: 5px;
            z-index: 5;
        }

        .filter-menu.show {
            display: block;
        }

        .filter-menu button {
            display: block;
            width: 100%;
            border: 0;
            background: white;
            padding: 9px;
            text-align: left;
            font-size: 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        .filter-menu button:hover {
            background: #eff9ee;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 680px;
        }

        thead {
            background: #efefed;
        }

        th {
            text-align: left;
            font-size: 9px;
            font-weight: 600;
            letter-spacing: .3px;
            color: #485047;
            padding: 13px 15px;
            white-space: nowrap;
        }

        td {
            padding: 14px 15px;
            border-bottom: 1px solid var(--border);
            font-size: 10px;
            white-space: nowrap;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        tbody tr:hover {
            background: #fbfdf9;
        }

        .task-id {
            color: var(--green);
            font-weight: 700;
        }

        .location {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: #51594f;
        }

        .location svg {
            width: 12px;
            height: 12px;
        }

        .status {
            display: inline-block;
            border-radius: 20px;
            padding: 5px 8px;
            font-size: 9px;
        }

        .status::before {
            content: '';
            display: inline-block;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            margin: 0 5px 1px 0;
        }

        .status.selesai,
        .status.berjalan {
            color: #176b2a;
            background: #d8f8d9;
        }

        .status.selesai::before,
        .status.berjalan::before {
            background: #16852a;
        }

        .status.menunggu {
            color: #60645e;
            background: #e7e8e5;
        }

        .status.menunggu::before {
            background: #747970;
        }

        .status.terlambat {
            color: #b91c1c;
            background: #ffdedd;
        }

        .status.terlambat::before {
            background: #dc2626;
        }

        .deadline-late {
            color: #dc2626;
            font-weight: 600;
        }

        .detail-link {
            color: var(--green-dark);
            font-weight: 600;
        }

        .detail-link:hover {
            text-decoration: underline;
        }

        .table-footer {
            min-height: 42px;
            background: #f1f2ef;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 15px;
            font-size: 9px;
            color: #485047;
        }

        .pagination {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .pagination button {
            border: 0;
            background: transparent;
            cursor: pointer;
            padding: 3px;
            color: #485047;
            display: flex;
        }

        .pagination svg {
            width: 14px;
            height: 14px;
        }

        .floating-button {
            position: fixed;
            right: 18px;
            bottom: 18px;
            width: 42px;
            height: 42px;
            border: 0;
            border-radius: 12px;
            background: var(--green);
            color: white;
            box-shadow: 0 4px 9px #00000020;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .floating-button svg {
            width: 19px;
            height: 19px;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 175px;
            }

            .main {
                margin-left: 175px;
            }

            .content {
                padding: 16px;
            }

            .stats {
                gap: 8px;
            }

            .stat-card {
                padding: 10px;
                gap: 8px;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                width: 62px;
            }

            .brand {
                padding: 17px 5px;
                overflow: hidden;
            }

            .brand h2 {
                font-size: 9px;
                overflow-wrap: anywhere;
            }

            .brand p {
                display: none;
            }

            .menu {
                padding: 8px 4px;
            }

            .menu a {
                justify-content: center;
                padding: 0;
            }

            .menu a span,
            .sidebar-bottom a span {
                display: none;
            }

            .main {
                margin-left: 62px;
            }

            .topbar {
                padding: 0 8px;
            }

            .topbar-right {
                gap: 7px;
            }

            .user-pill {
                max-width: 110px;
                overflow: hidden;
            }

            .content {
                padding: 12px 9px;
            }

            .welcome {
                padding: 22px 14px;
                min-height: auto;
            }

            .welcome h1 {
                font-size: 19px;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 8px;
            }

            .stat-card {
                min-height: 65px;
                padding: 10px 13px;
            }

            .task-heading {
                padding: 10px;
            }

            .table-footer {
                padding: 0 8px;
            }
        }
    </style>
</head>

<body>
    @php
        $namaPekerja = auth()->user()->name ?? 'Pekerja';
        $namaDepan = explode(' ', trim($namaPekerja))[0];

        /*
         * DATA CONTOH:
         * Ganti dengan data database saat fitur tugas sudah terhubung.
         */
        $tugas = [
            [
                'id' => 'TGS-10224',
                'jenis' => 'Pemangkasan Pelepah',
                'lokasi' => 'Blok C12 - Barat',
                'deadline' => '14:00 WIB',
                'status' => 'Selesai',
                'class' => 'selesai',
            ],
            [
                'id' => 'TGS-10225',
                'jenis' => 'Pemupukan Organik',
                'lokasi' => 'Blok D05 - Tengah',
                'deadline' => '17:00 WIB',
                'status' => 'Berjalan',
                'class' => 'berjalan',
            ],
            [
                'id' => 'TGS-10226',
                'jenis' => 'Pengecekan Hama',
                'lokasi' => 'Blok B08 - Utara',
                'deadline' => 'Besok, 08:00',
                'status' => 'Menunggu',
                'class' => 'menunggu',
            ],
            [
                'id' => 'TGS-10227',
                'jenis' => 'Panen TBS',
                'lokasi' => 'Blok A01 - Selatan',
                'deadline' => 'TERLEWAT',
                'status' => 'Terlambat',
                'class' => 'terlambat',
            ],
        ];

        $jumlahTugas = 12;
        $jumlahSelesai = 8;
        $jumlahBelumSelesai = 4;
    @endphp

    <aside class="sidebar">
        <div class="brand">
            <h2>Sihombing Group</h2>
            <p>Dashboard Pekerja</p>
        </div>

        <nav class="menu">
            <a href="{{ route('pekerja.dashboard') }}"
                class="{{ request()->routeIs('pekerja.dashboard') ? 'active' : '' }}">
                <i data-lucide="layout-dashboard"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('pekerja.arahan-tugas') }}"
                class="{{ request()->routeIs('pekerja.arahan-tugas') ? 'active' : '' }}">
                <i data-lucide="clipboard-list"></i>
                <span>Arahan Tugas</span>
            </a>

            <a href="{{ route('pekerja.laporan-pekerjaan') }}"
                class="{{ request()->routeIs('pekerja.laporan-pekerjaan') ? 'active' : '' }}">
                <i data-lucide="file-text"></i>
                <span>Laporan Pekerjaan</span>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <a href="#" onclick="alert('Silakan hubungi administrator untuk bantuan.'); return false;">
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

    <main class="main">
        <header class="topbar">
            <div class="topbar-title">Dashboard Pekerja</div>

            <div class="topbar-right">
                <div class="user-pill">
                    <i data-lucide="user-round"></i>
                    <span>{{ $namaPekerja }}</span>
                </div>

                <button class="top-icon" type="button" aria-label="Notifikasi"
                    onclick="alert('Belum ada notifikasi baru.')">
                    <i data-lucide="bell"></i>
                </button>

                <button class="top-icon" type="button" aria-label="Pengaturan"
                    onclick="alert('Pengaturan belum tersedia.')">
                    <i data-lucide="settings"></i>
                </button>

                <div class="avatar" title="{{ $namaPekerja }}">
                    {{ strtoupper(substr($namaPekerja, 0, 1)) }}
                </div>
            </div>
        </header>

        <section class="content">
            <div class="welcome">
                <h1>Selamat Pagi, {{ $namaDepan }}!</h1>
                <p>Siap untuk melanjutkan pemeliharaan di Blok C12 hari ini?</p>
                <p>Tetap jaga keselamatan kerja.</p>
            </div>

            <section class="stats">
                <article class="stat-card">
                    <div class="stat-icon green">
                        <i data-lucide="clipboard-list"></i>
                    </div>
                    <div>
                        <div class="stat-label">Tugas Hari Ini</div>
                        <div class="stat-number">
                            {{ str_pad($jumlahTugas, 2, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon light">
                        <i data-lucide="check-circle"></i>
                    </div>
                    <div>
                        <div class="stat-label">Tugas Selesai</div>
                        <div class="stat-number">
                            {{ str_pad($jumlahSelesai, 2, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>
                </article>

                <article class="stat-card late">
                    <div class="stat-icon red">
                        <i data-lucide="clipboard-clock"></i>
                    </div>
                    <div>
                        <div class="stat-label">Tugas Belum Selesai</div>
                        <div class="stat-number">
                            {{ str_pad($jumlahBelumSelesai, 2, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>
                </article>
            </section>

            <section class="task-panel">
                <div class="task-heading">
                    <h2>Daftar Tugas</h2>

                    <div class="filter-wrap">
                        <button class="filter-button" id="filter-button" type="button">
                            <i data-lucide="list-filter"></i>
                            Filter
                        </button>

                        <div class="filter-menu" id="filter-menu">
                            <button type="button" data-filter="semua">Semua tugas</button>
                            <button type="button" data-filter="selesai">Selesai</button>
                            <button type="button" data-filter="berjalan">Berjalan</button>
                            <button type="button" data-filter="menunggu">Menunggu</button>
                            <button type="button" data-filter="terlambat">Terlambat</button>
                        </div>
                    </div>
                </div>

                <div class="table-wrap">
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

                        <tbody id="task-body">
                            @foreach ($tugas as $item)
                                <tr data-status="{{ $item['class'] }}">
                                    <td class="task-id">{{ $item['id'] }}</td>
                                    <td>{{ $item['jenis'] }}</td>
                                    <td>
                                        <span class="location">
                                            <i data-lucide="map-pin"></i>
                                            {{ $item['lokasi'] }}
                                        </span>
                                    </td>
                                    <td class="{{ $item['class'] === 'terlambat' ? 'deadline-late' : '' }}">
                                        {{ $item['deadline'] }}
                                    </td>
                                    <td>
                                        <span class="status {{ $item['class'] }}">
                                            {{ $item['status'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <a class="detail-link" href="{{ route('pekerja.arahan-tugas') }}">
                                            Detail
                                        </a>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <span id="task-count">Menampilkan 4 tugas contoh</span>

                    <div class="pagination">
                        <button type="button" aria-label="Halaman sebelumnya">
                            <i data-lucide="chevron-left"></i>
                        </button>
                        <button type="button" aria-label="Halaman berikutnya">
                            <i data-lucide="chevron-right"></i>
                        </button>
                    </div>
                </div>
            </section>
        </section>
    </main>

    <button class="floating-button" type="button" title="Bantuan"
        onclick="alert('Silakan hubungi administrator untuk bantuan.')">
        <i data-lucide="scan-qr-code"></i>
    </button>

    <script>
        if (window.lucide) {
            lucide.createIcons();
        }

        const filterButton = document.getElementById('filter-button');
        const filterMenu = document.getElementById('filter-menu');
        const taskRows = Array.from(document.querySelectorAll('#task-body tr'));
        const taskCount = document.getElementById('task-count');

        filterButton.addEventListener('click', function () {
            filterMenu.classList.toggle('show');
        });

        filterMenu.querySelectorAll('button').forEach(function (button) {
            button.addEventListener('click', function () {
                const filter = this.dataset.filter;
                let visible = 0;

                taskRows.forEach(function (row) {
                    const match =
                        filter === 'semua' ||
                        row.dataset.status === filter;

                    row.style.display = match ? '' : 'none';

                    if (match) {
                        visible++;
                    }
                });

                taskCount.textContent =
                    'Menampilkan ' + visible + ' tugas contoh';

                filterMenu.classList.remove('show');
            });
        });

        document.addEventListener('click', function (event) {
            if (!event.target.closest('.filter-wrap')) {
                filterMenu.classList.remove('show');
            }
        });
    </script>
</body>

</html>