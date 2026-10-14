<!DOCTYPE html>

<html lang="id">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Jadwal - Sihombing Group</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        * {

            box-sizing: border-box;

            margin: 0;

            padding: 0;

        }



        body {

            font-family: Inter, Arial, sans-serif;

            color: #263129;

            background: #f5f7f5;

            font-size: 13px;

        }



        /* =========================
           SIDEBAR
        ========================= */
        .sidebar {
            width: 195px;
            min-width: 195px;
            flex: 0 0 195px;
            height: 100vh;
            position: sticky;
            top: 0;
            background: #fff;
            border-right: 1px solid #d9ded9;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
        }

        .brand {
            height: 83px;
            min-height: 83px;
            padding: 25px 22px 0;
            flex-shrink: 0;
            box-sizing: border-box;
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

        .menu {
            display: flex;
            flex-direction: column;
            padding: 0 10px;
            margin: 0;
            flex-shrink: 0;
        }

        .menu-item {
            width: 100%;
            min-height: 40px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 15px;
            margin-bottom: 5px;
            color: #525852;
            text-decoration: none;
            border-radius: 0 22px 22px 0;
            transition: background .2s, color .2s;
            font-size: 11.5px;
            box-sizing: border-box;
        }

        .menu-item svg,
        .menu-item i {
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

        .menu-item.active svg,
        .menu-item.active i {
            color: #086b22;
        }

        .menu a {
            text-decoration: none;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 0 10px 22px;
            flex-shrink: 0;
            box-sizing: border-box;
        }

        .sidebar-divider {
            height: 1px;
            background: #d9ddd9;
            margin: 0 6px 18px;
        }

        .support,
        .logout {
            width: 100%;
            height: 40px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 15px;
            text-decoration: none;
            font-size: 11.5px;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .support {
            color: #555;
            margin-bottom: 4px;
        }

        .logout {
            color: #e32929;
        }

        .support svg,
        .logout svg,
        .support i,
        .logout i {
            width: 16px;
            height: 16px;
            min-width: 16px;
            flex-shrink: 0;
        }





        body {

            display: flex;

            min-height: 100vh;

        }

        .main {

            margin-left: 0;

            flex: 1;

            min-width: 0;

            min-height: 100vh;

            background: #f5f7f5;

            position: relative;

            z-index: 1;

        }



        .content {

            padding: 20px 26px;

            min-height: 500px;

            color: #263129;

        }



        .topbar {

            height: 82px;

            background: #fff;

            border-top: none;

            border-bottom: 1px solid #e0e6e0;

            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 18px;

            padding: 0 24px;

        }



        .search {

            width: 220px;

            background: #f4f6f4;

            border-radius: 20px;

            padding: 8px 12px;

            display: flex;

            align-items: center;

            gap: 8px;

        }



        .search svg {

            width: 15px;

            height: 15px;

            color: #647067;

        }



        .search input {

            width: 100%;

            border: 0;

            outline: 0;

            background: transparent;

            font: inherit;

        }



        .avatar {

            width: 29px;

            height: 29px;

            border-radius: 50%;

            background: #17351f;

            color: #fff;

            display: grid;

            place-items: center;

            font-size: 10px;

            font-weight: 700;

        }



        .content {

            padding: 20px 26px;

        }



        .page-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 16px;

            margin-bottom: 22px;

        }



        h1 {

            font-size: 25px;

            font-weight: 650;

            margin-bottom: 5px;

        }



        .subtitle {

            color: #717a72;

            font-size: 12px;

        }



        .actions {

            display: flex;

            gap: 8px;

            flex-wrap: wrap;

        }



        button {

            font-family: inherit;

            cursor: pointer;

        }



        .btn {

            border-radius: 8px;

            padding: 10px 14px;

            display: inline-flex;

            align-items: center;

            gap: 7px;

            font-size: 12px;

            font-weight: 600;

        }



        .btn svg {

            width: 15px;

            height: 15px;

        }



        .btn-primary {

            color: #fff;

            background: #08752a;

            border: 1px solid #08752a;

        }



        .btn-outline {

            background: #fff;

            color: #08752a;

            border: 1px solid #b6cdb9;

        }



        .layout {

            display: grid;

            grid-template-columns: 280px minmax(0, 1fr);

            gap: 18px;

            align-items: start;

        }



        .card {

            background: #fff;

            border: 1px solid #dfe5df;

            border-radius: 11px;

            overflow: hidden;

            box-shadow: 0 2px 5px #17271708;

        }



        .card-head {

            padding: 17px 18px;

            border-bottom: 1px solid #e4e9e4;

            font-size: 15px;

            font-weight: 650;

        }



        .form-body {

            padding: 18px;

        }



        .field {

            margin-bottom: 14px;

        }



        .field label {

            display: block;

            margin-bottom: 6px;

            color: #4e584f;

            font-size: 11px;

            font-weight: 600;

        }



        .field input,

        .field select {

            width: 100%;

            height: 36px;

            padding: 0 10px;

            border: 1px solid #cfd8cf;

            border-radius: 7px;

            background: #fff;

            color: #39433b;

            font: inherit;

        }



        .field-row {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 10px;

        }



        .save {

            width: 100%;

            padding: 12px;

            background: #08752a;

            border: 0;

            border-radius: 7px;

            color: #fff;

            font-weight: 600;

        }



        .calendar {

            margin-top: 18px;

            padding: 17px;

        }



        .calendar-title {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 16px;

            font-weight: 650;

        }



        .calendar-title button {

            border: 0;

            background: transparent;

            padding: 4px;

        }



        .calendar-title svg {

            width: 16px;

            height: 16px;

        }



        .weekdays,

        .days {

            display: grid;

            grid-template-columns: repeat(7, 1fr);

            text-align: center;

            gap: 4px;

        }



        .weekdays {

            margin-bottom: 7px;

            color: #758076;

            font-size: 10px;

            font-weight: 700;

        }



        .day {

            display: grid;

            place-items: center;

            min-height: 30px;

            border-radius: 7px;

            font-size: 11px;

        }



        .day.muted {

            color: #b9c0b9;

        }



        .day.selected {

            background: #d9f6dc;

            color: #08752a;

            font-weight: 700;

        }



        .legend {

            border-top: 1px solid #e1e7e1;

            margin-top: 14px;

            padding-top: 13px;

            display: grid;

            gap: 8px;

            color: #69736a;

            font-size: 10px;

        }



        .dot {

            display: inline-block;

            width: 8px;

            height: 8px;

            border-radius: 50%;

            margin-right: 7px;

            background: #08752a;

        }



        .dot.red {

            background: #c9473e;

        }



        .table-head {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 12px;

            padding: 17px 18px;

            border-bottom: 1px solid #e4e9e4;

        }



        .table-title {

            font-size: 15px;

            font-weight: 650;

        }



        .table-actions {

            display: flex;

            gap: 7px;

        }



        .table-actions button {

            border: 1px solid #dfe5df;

            background: #f7f8f7;

            border-radius: 6px;

            padding: 8px 10px;

            font-size: 11px;

            display: flex;

            align-items: center;

            gap: 5px;

        }



        .table-actions svg {

            width: 13px;

            height: 13px;

        }



        .table-wrap {

            overflow-x: auto;

        }



        table {

            border-collapse: collapse;

            width: 100%;

            min-width: 620px;

            text-align: left;

        }



        thead {

            background: #f2f4f2;

        }



        th {

            padding: 13px 14px;

            color: #69736a;

            font-size: 10px;

        }



        td {

            padding: 14px;

            border-top: 1px solid #edf0ed;

            font-size: 11px;

            line-height: 1.5;

        }



        .person {

            display: flex;

            align-items: center;

            gap: 8px;

        }



        .initials {

            width: 26px;

            height: 26px;

            display: grid;

            place-items: center;

            border-radius: 50%;

            background: #ddf5dd;

            color: #176d2a;

            font-size: 9px;

            font-weight: 700;

        }



        .status {

            display: inline-block;

            padding: 5px 9px;

            border-radius: 15px;

            font-size: 10px;

            white-space: nowrap;

        }



        .scheduled {

            background: #e2f3e4;

            color: #1e702b;

        }



        .progress {

            background: #fff0c7;

            color: #8b6410;

        }



        .completed {

            background: #eceeec;

            color: #606960;

        }



        .urgent {

            background: #ffe3e0;

            color: #b43c32;

        }



        .table-footer {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 12px;

            padding: 15px 18px;

            color: #788078;

            font-size: 10px;

        }



        @media (max-width: 1050px) {

            .layout {

                grid-template-columns: 1fr;

            }



            .side-column {

                display: grid;

                grid-template-columns: 1fr 1fr;

                gap: 16px;

            }



            .calendar {

                margin-top: 0;

            }

        }



        @media (max-width: 720px) {

            .sidebar {

                position: static;

                width: 100%;

                height: auto;

                padding: 12px;

            }



            .brand {

                padding: 8px 10px;

            }



            .nav-label {

                display: none;

            }



            .sidebar nav {

                display: flex;

                flex-wrap: wrap;

                padding-bottom: 0;

            }



            .sidebar-bottom {

                position: static;

                margin-top: 12px;

            }



            .menu-item {

                min-height: 36px;

                padding: 8px;

            }



            .main {

                margin-left: 0;

                flex: 1;

                min-width: 0;

                min-height: 100vh;

                background: #f5f7f5;

                position: relative;

                z-index: 1;

            }



            .topbar {

                padding: 0 14px;

            }



            .content {

                padding: 20px 26px;

                min-height: 500px;

                color: #263129;

            }



            .page-header {

                align-items: flex-start;

                flex-direction: column;

            }



            .side-column {

                grid-template-columns: 1fr;

            }



            .calendar {

                margin-top: 16px;

            }

        }
    </style>

</head>



<body>

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-name">Sihombing Group</div>
            <div class="brand-subtitle">Kelola Jadwal</div>
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

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="logout"
                    style="background: transparent; border: none; cursor: pointer; font-family: inherit; text-align: left;">
                    <i data-lucide="log-out"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <div class="main">

        <header class="topbar">

            <div class="search"><i data-lucide="search"></i><input type="search" placeholder="Cari jadwal..."></div>

            <i data-lucide="bell"></i>

            <div class="avatar">SI</div>

        </header>

        <main class="content">

            <div class="page-header">

                <div>

                    <h1>Kelola Jadwal</h1>

                    <p class="subtitle">Atur dan pantau jadwal pemeliharaan kebun sawit.</p>

                </div>

                <div class="actions">

                    <button class="btn btn-primary" type="button" onclick="addSchedule()"><i
                            data-lucide="plus"></i>Tambah Jadwal</button>

                    <button class="btn btn-outline" type="button" onclick="editSchedule()"><i
                            data-lucide="pencil"></i>Edit</button>

                    <button class="btn btn-outline" type="button" onclick="deleteSchedule()"><i
                            data-lucide="trash-2"></i>Hapus</button>

                </div>

            </div>

            <div class="layout">

                <div class="side-column">

                    <section class="card">

                        <div class="card-head">Detail Jadwal</div>

                        <div class="form-body">

                            <div class="field-row">

                                <div class="field"><label>ID Jadwal</label><input value="SCH-2026-001" readonly></div>

                                <div class="field"><label>Status</label><select id="scheduleStatus">

                                        <option>Terjadwal</option>

                                        <option>Dalam Proses</option>

                                        <option>Selesai</option>

                                        <option>Mendesak</option>

                                    </select></div>

                            </div>

                            <div class="field"><label>Kegiatan</label><input id="activity" value="Pemupukan Urea"
                                    placeholder="Nama kegiatan"></div>

                            <div class="field-row">

                                <div class="field"><label>Tanggal</label><input id="date" type="date"
                                        value="2026-10-14"></div>

                                <div class="field"><label>Lokasi</label><input id="location" value="Blok C-12"></div>

                            </div>

                            <div class="field"><label>Pekerja</label><input id="worker" value="Agus Santoso"
                                    placeholder="Nama pekerja"></div>

                            <button class="save" type="button" onclick="saveChanges()">Simpan Perubahan</button>

                        </div>

                    </section>

                    <section class="card calendar">

                        <div class="calendar-title"><span id="monthLabel">Kalender Jadwal</span>

                            <div><button type="button" onclick="changeMonth(-1)" aria-label="Bulan sebelumnya"><i
                                        data-lucide="chevron-left"></i></button><button type="button"
                                    onclick="changeMonth(1)" aria-label="Bulan berikutnya"><i
                                        data-lucide="chevron-right"></i></button></div>

                        </div>

                        <div class="weekdays">

                            <span>Min</span><span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span>

                        </div>

                        <div class="days" id="calendarDays"></div>

                        <div class="legend"><span><i class="dot"></i>Jadwal pemeliharaan</span><span><i
                                    class="dot red"></i>Jadwal mendesak</span></div>

                    </section>

                </div>

                <section class="card">

                    <div class="table-head">

                        <div class="table-title">Daftar Jadwal Pemeliharaan</div>

                        <div class="table-actions"><button type="button" onclick="toggleFilter()"><i
                                    data-lucide="list-filter"></i>Filter</button><button type="button"
                                onclick="exportSchedule()"><i data-lucide="download"></i>Export</button></div>

                    </div>

                    <div class="table-wrap">

                        <table id="scheduleTable">

                            <thead>

                                <tr>

                                    <th>TANGGAL</th>

                                    <th>KEGIATAN</th>

                                    <th>LOKASI</th>

                                    <th>PEKERJA</th>

                                    <th>STATUS</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td>14 Okt 2026</td>

                                    <td>Pemupukan Urea</td>

                                    <td>Blok C-12</td>

                                    <td>

                                        <div class="person"><span class="initials">AS</span>Agus Santoso</div>

                                    </td>

                                    <td><span class="status scheduled">Terjadwal</span></td>

                                </tr>

                                <tr>

                                    <td>15 Okt 2026</td>

                                    <td>Pembersihan Gulma</td>

                                    <td>Blok A-10</td>

                                    <td>

                                        <div class="person"><span class="initials">RN</span>Rahmat N.</div>

                                    </td>

                                    <td><span class="status progress">Dalam Proses</span></td>

                                </tr>

                                <tr>

                                    <td>16 Okt 2026</td>

                                    <td>Pengecekan Hama</td>

                                    <td>Blok D-01</td>

                                    <td>

                                        <div class="person"><span class="initials">SP</span>Siti Pujati</div>

                                    </td>

                                    <td><span class="status completed">Selesai</span></td>

                                </tr>

                                <tr>

                                    <td>17 Okt 2026</td>

                                    <td>Pemangkasan Pelepah</td>

                                    <td>Blok B-02</td>

                                    <td>

                                        <div class="person"><span class="initials">AS</span>Agus Santoso</div>

                                    </td>

                                    <td><span class="status urgent">Mendesak</span></td>

                                </tr>

                                <tr>

                                    <td>18 Okt 2026</td>

                                    <td>Aplikasi Herbisida</td>

                                    <td>Blok C-08</td>

                                    <td>

                                        <div class="person"><span class="initials">BD</span>Budi D.</div>

                                    </td>

                                    <td><span class="status completed">Selesai</span></td>

                                </tr>

                                <tr>

                                    <td>19 Okt 2026</td>

                                    <td>Monitoring Irigasi</td>

                                    <td>Blok A-05</td>

                                    <td>

                                        <div class="person"><span class="initials">RN</span>Rahmat N.</div>

                                    </td>

                                    <td><span class="status completed">Selesai</span></td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                    <div class="table-footer"><span id="rowCount">Menampilkan 6 jadwal</span><span>Halaman 1 dari

                            1</span></div>

                </section>

            </div>

        </main>

    </div>

    <script>

        let currentMonth = new Date(2026, 9, 1);

        function renderCalendar() {

            const year = currentMonth.getFullYear(), month = currentMonth.getMonth();

            document.getElementById('monthLabel').textContent = new Intl.DateTimeFormat('id-ID', { month: 'long', year: 'numeric' }).format(currentMonth);

            const holder = document.getElementById('calendarDays');

            holder.innerHTML = '';

            const offset = new Date(year, month, 1).getDay();

            const count = new Date(year, month + 1, 0).getDate();

            const previousCount = new Date(year, month, 0).getDate();

            for (let i = 0; i < 42; i++) {

                const day = document.createElement('div');

                day.className = 'day';

                let n, muted = false;

                if (i < offset) { n = previousCount - offset + i + 1; muted = true; }

                else if (i >= offset + count) { n = i - offset - count + 1; muted = true; }

                else { n = i - offset + 1; }

                day.textContent = n;

                if (muted) day.classList.add('muted');

                if (!muted && n === 14 && month === 9 && year === 2026) day.classList.add('selected');

                holder.appendChild(day);

            }

        }

        function changeMonth(delta) { currentMonth.setMonth(currentMonth.getMonth() + delta); renderCalendar(); }

        function saveChanges() {

            const activity = document.getElementById('activity').value.trim();

            if (!activity) { alert('Nama kegiatan wajib diisi.'); return; }

            alert('Perubahan formulir berhasil diperiksa. Penyimpanan ini masih berupa demo, belum ke database.');

        }

        function addSchedule() { alert('Form tambah jadwal belum terhubung ke database.'); }

        function editSchedule() { alert('Silakan ubah data pada formulir, lalu klik Simpan Perubahan.'); }

        function deleteSchedule() { if (confirm('Hapus jadwal contoh yang dipilih?')) alert('Fitur hapus belum terhubung ke database.'); }

        function toggleFilter() {

            const query = prompt('Masukkan kata untuk menyaring kegiatan, lokasi, pekerja, atau status:');

            if (query === null) return;

            const rows = document.querySelectorAll('#scheduleTable tbody tr');

            let visible = 0;

            rows.forEach(row => { const match = row.innerText.toLowerCase().includes(query.toLowerCase()); row.hidden = !match; if (match) visible++; });

            document.getElementById('rowCount').textContent = 'Menampilkan ' + visible + ' jadwal';

        }

        function exportSchedule() {

            const table = document.getElementById('scheduleTable');

            const csv = Array.from(table.rows).map(row => Array.from(row.cells).map(cell => '"' + cell.innerText.replace(/"/g, '""') + '"').join(',')).join('\r\n');

            const blob = new Blob(['\ufeff' + csv], { type: 'text/csv;charset=utf-8;' });

            const url = URL.createObjectURL(blob), link = document.createElement('a');

            link.href = url; link.download = 'daftar-jadwal-pemeliharaan.csv'; link.click(); URL.revokeObjectURL(url);

        }

        if (window.lucide) lucide.createIcons();

        renderCalendar();

    </script>

</body>



</html>