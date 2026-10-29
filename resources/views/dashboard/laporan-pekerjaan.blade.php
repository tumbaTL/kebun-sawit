<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pekerjaan - Sihombing Group</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --green: #2f7e3b;
            --dark-green: #08752b;
            --border: #d6dfd2;
            --text: #29342c;
            --muted: #697369;
        }

        body {
            margin: 0;
            min-height: 100%;
            font-family: 'Inter', Arial, sans-serif;
            background: #f8f9f8;
            color: #242824;
            font-size: 12px;
        }

        /* Sidebar disamakan dengan resources/views/dashboard/arahan-tugas.blade.php */
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 200px;
            height: 100vh;
            background: #fff;
            border-right: 1px solid #d4ded2;
            display: flex;
            flex-direction: column;
            z-index: 20;
            box-sizing: border-box;
            font-family: 'Inter', Arial, sans-serif;
        }

        .brand {
            padding: 20px 16px;
            border-bottom: 1px solid #edf0eb;
        }

        .brand h2 {
            color: #287d35;
            font-size: 16px;
            margin: 0 0 8px;
            font-weight: 800;
        }

        .brand p {
            color: #126524;
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
            text-decoration: none;
            transition: background .2s;
        }

        .menu a svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .menu a:hover {
            background: #eff9ee;
            color: #126524;
        }

        .menu a.active {
            background: #8df58e;
            color: #126524;
            font-weight: 600;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid #d4ded2;
            padding: 12px 10px;
        }

        .sidebar-bottom a {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            padding: 10px 5px;
            border: 0;
            background: transparent;
            font-family: inherit;
            font-size: 10px;
            text-align: left;
            text-decoration: none;
            color: #303930;
            cursor: pointer;
            box-sizing: border-box;
        }

        .sidebar-bottom svg {
            width: 15px;
            height: 15px;
            flex-shrink: 0;
        }

        .sidebar-bottom .logout {
            color: #e11d2e;
        }

        .sidebar-bottom form {
            margin: 0;
        }

        .main {
            margin-left: 200px;
            min-height: 100vh;
        }

        .topbar {
            height: 54px;
            background: #fff;
            border-bottom: 1px solid #d8e0d5;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 17px 0 25px;
            gap: 16px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .search-top {
            width: 150px;
            height: 27px;
            border: 1px solid #d6ded3;
            border-radius: 18px;
            padding: 0 9px;
            display: flex;
            align-items: center;
            gap: 6px;
            background: #f8f9f8;
        }

        .search-top svg {
            width: 13px;
            height: 13px;
            color: #38513c;
        }

        .search-top input {
            width: 100%;
            min-width: 0;
            border: 0;
            outline: 0;
            background: transparent;
            font-size: 10px;
        }

        .topbar-right>svg {
            width: 15px;
            height: 15px;
            color: #08752b;
        }

        .avatar {
            width: 23px;
            height: 23px;
            border-radius: 50%;
            background: #d9e3d7;
            color: #315c37;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .avatar svg {
            width: 15px;
            height: 15px;
        }

        .content {
            padding: 17px 28px 35px;
            max-width: 1000px;
        }

        .page-title {
            margin: 0 0 4px;
            font-size: 21px;
            line-height: 1.3;
            color: #202722;
        }

        .page-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.65fr) minmax(150px, .8fr);
            gap: 12px;
            align-items: start;
        }

        .panel {
            background: #fff;
            border: 1px solid #d4dfd0;
            border-radius: 7px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .04);
        }

        .form-panel {
            padding: 13px 12px 12px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px 12px;
        }

        .field {
            min-width: 0;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        .field label {
            display: block;
            margin-bottom: 5px;
            font-size: 10px;
            color: #354237;
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            border: 1px solid #d5dfd2;
            border-radius: 5px;
            padding: 7px 9px;
            font-family: inherit;
            font-size: 10px;
            color: #364139;
            outline: none;
            background: #fff;
        }

        .field input,
        .field select {
            height: 29px;
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: #27833a;
            box-shadow: 0 0 0 2px rgba(39, 131, 58, .08);
        }

        .field input[readonly] {
            background: #f0f1ef;
        }

        .field textarea {
            resize: vertical;
            min-height: 71px;
            line-height: 1.5;
        }

        .upload-area {
            min-height: 80px;
            border: 1px dashed #b9c9b5;
            border-radius: 7px;
            background: #f4f5f3;
            display: flex !important;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
            cursor: pointer;
            text-align: center;
            color: #08752b !important;
            margin: 0 !important;
        }

        .upload-area svg {
            width: 24px;
            height: 24px;
        }

        .upload-area strong {
            font-size: 10px;
        }

        .upload-area small {
            font-size: 8px;
            color: #59635a;
        }

        .upload-area input {
            display: none;
        }

        .photo-preview {
            display: flex;
            gap: 5px;
            margin-top: 5px;
            flex-wrap: wrap;
        }

        .photo-preview img {
            width: 41px;
            height: 41px;
            border: 1px solid #d5dfd2;
            border-radius: 5px;
            object-fit: cover;
        }

        .submit-btn {
            width: 100%;
            min-height: 31px;
            margin-top: 12px;
            background: #2d7e35;
            color: #fff;
            border: 0;
            border-radius: 6px;
            font-weight: 600;
            font-size: 11px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .12);
        }

        .submit-btn:hover {
            background: #236b2b;
        }

        .side-info {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .tips-card {
            background: #347f40;
            color: #fff;
            padding: 13px 12px;
            border-radius: 7px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .12);
        }

        .tips-card svg {
            width: 17px;
            height: 17px;
            margin-bottom: 5px;
        }

        .tips-card h3 {
            font-size: 12px;
            margin: 0 0 8px;
        }

        .tips-card p {
            font-size: 10px;
            line-height: 1.55;
            margin: 0;
            color: #e3f0e3;
        }

        .summary-card {
            padding: 13px 12px;
        }

        .summary-title {
            font-size: 9px;
            letter-spacing: .3px;
            color: #465347;
            margin-bottom: 12px;
        }

        .summary-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            font-size: 10px;
        }

        .summary-row strong {
            color: #08752b;
            font-weight: 500;
        }

        .progress {
            width: 100%;
            height: 5px;
            background: #e9ece8;
            border-radius: 10px;
            overflow: hidden;
            margin: 9px 0 10px;
        }

        .progress span {
            display: block;
            height: 100%;
            background: #08752b;
            border-radius: 10px;
        }

        .summary-card p {
            margin: 0;
            font-size: 9px;
            line-height: 1.55;
            color: #687268;
        }

        .history {
            margin-top: 12px;
        }

        .history-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 11px;
        }

        .history-heading h2 {
            margin: 0;
            font-size: 13px;
        }

        .history-heading a {
            color: #08752b;
            text-decoration: none;
            font-size: 9px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 420px;
        }

        thead {
            background: #f0f1ef;
        }

        th {
            text-align: left;
            padding: 9px 12px;
            font-size: 8px;
            font-weight: 500;
            color: #4c574d;
            white-space: nowrap;
        }

        td {
            padding: 10px 12px;
            border-top: 1px solid #d8e0d5;
            font-size: 9px;
            color: #303a32;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 3px;
            border-radius: 12px;
            padding: 3px 6px;
            white-space: nowrap;
            font-size: 8px;
        }

        .status svg {
            width: 9px;
            height: 9px;
        }

        .status.verified {
            color: #075f27;
            background: #8af18e;
        }

        .status.pending {
            color: #515951;
            background: #e6e8e5;
        }

        .view-btn {
            display: inline-flex;
            color: #354237;
            text-decoration: none;
        }

        .view-btn svg {
            width: 13px;
            height: 13px;
        }

        .empty-history {
            padding: 18px;
            text-align: center;
            color: #7a837a;
            font-size: 10px;
        }

        .alert {
            margin-bottom: 12px;
            padding: 9px 11px;
            border-radius: 6px;
            background: #e8f7e9;
            color: #17662a;
            border: 1px solid #c5e8c8;
        }

        .alert.error {
            background: #fff0f0;
            color: #a52222;
            border-color: #f2caca;
        }

        @media (max-width:850px) {
            .content {
                padding: 18px 16px;
            }

            .page-layout {
                grid-template-columns: 1fr;
            }

            .side-info {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width:580px) {
            .topbar {
                padding: 0 10px;
            }

            .topbar-right {
                gap: 8px;
            }

            .search-top {
                width: 105px;
            }

            .content {
                padding: 17px 10px;
            }

            .form-grid,
            .side-info {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }
        }
    </style>

<link rel="stylesheet" href="{{ asset('css/staff-background.css') }}">

</head>

<body>
    @php
        $laporanRoute = \Illuminate\Support\Facades\Route::has('pekerja.laporan-pekerjaan')
            ? route('pekerja.laporan-pekerjaan') : url('/dashboard/pekerja/laporan-pekerjaan');
        $dashboardRoute = \Illuminate\Support\Facades\Route::has('pekerja.dashboard')
            ? route('pekerja.dashboard') : url('/dashboard/pekerja');
        $arahanRoute = \Illuminate\Support\Facades\Route::has('pekerja.arahan-tugas')
            ? route('pekerja.arahan-tugas') : url('/dashboard/pekerja/arahan-tugas');
        $logoutRoute = \Illuminate\Support\Facades\Route::has('logout') ? route('logout') : url('/logout');
        $riwayat = $riwayat ?? collect();
        $tugas = $tugas ?? collect();
        $totalTugas = isset($totalTugas) ? (int) $totalTugas : $tugas->count();
        $tugasSelesai = isset($tugasSelesai) ? (int) $tugasSelesai : 0;
        $persentase = $totalTugas > 0 ? min(100, ($tugasSelesai / $totalTugas) * 100) : 0;
    @endphp

    <aside class="sidebar">
        <div class="brand">
            <h2>Sihombing Group</h2>
            <p>Dashboard Pekerja</p>
        </div>
        <nav class="menu">
            <a href="{{ $dashboardRoute }}" class="{{ request()->routeIs('pekerja.dashboard') ? 'active' : '' }}">
                <i data-lucide="layout-dashboard"></i><span>Dashboard</span>
            </a>
            <a href="{{ $arahanRoute }}" class="{{ request()->routeIs('pekerja.arahan-tugas') ? 'active' : '' }}">
                <i data-lucide="clipboard-list"></i><span>Arahan Tugas</span>
            </a>
            <a href="{{ $laporanRoute }}" class="{{ request()->routeIs('pekerja.laporan-pekerjaan') ? 'active' : '' }}">
                <i data-lucide="file-text"></i><span>Laporan Pekerjaan</span>
            </a>
        </nav>
        <div class="sidebar-bottom">
            <a href="#" onclick="alert('Silakan hubungi administrator untuk bantuan.'); return false;">
                <i data-lucide="circle-help"></i><span>Support</span>
            </a>
            <a href="{{ $logoutRoute }}" class="logout"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i data-lucide="log-out"></i><span>Logout</span>
            </a>
            <form id="logout-form" action="{{ $logoutRoute }}" method="POST" style="display:none">@csrf</form>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div class="topbar-right">
                <label class="search-top">
                    <i data-lucide="search"></i>
                    <input type="search" id="search-history" placeholder="Search tasks...">
                </label>
                <i data-lucide="bell" title="Notifikasi"></i>
                <div class="avatar"><i data-lucide="user-round"></i></div>
            </div>
        </header>

        <div class="content">
            @if (session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert error">
                    <strong>Periksa kembali data laporan:</strong>
                    <ul style="margin:8px 0 0;padding-left:18px">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <h1 class="page-title">Kirim Laporan Pekerjaan</h1>

            <div class="page-layout">
                <section class="panel form-panel">
                    <form action="{{ $laporanRoute }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-grid">
                            <div class="field">
                                <label for="id_laporan">ID Laporan</label>
                                <input type="text" id="id_laporan" name="id_laporan"
                                    value="{{ old('id_laporan', 'REP-' . now()->format('Ymd') . '-' . str_pad((string) random_int(1, 9999), 4, '0', STR_PAD_LEFT)) }}"
                                    readonly>
                            </div>
                            <div class="field">
                                <label for="tanggal_pekerjaan">Tanggal Pekerjaan</label>
                                <input type="date" id="tanggal_pekerjaan" name="tanggal_pekerjaan"
                                    value="{{ old('tanggal_pekerjaan', now()->format('Y-m-d')) }}" required>
                            </div>
                            <div class="field full">
                                <label for="tugas_id">Pilih Tugas</label>
                                <select id="tugas_id" name="tugas_id" required>
                                    <option value="">-- Pilih Tugas Sesuai Jadwal --</option>
                                    @forelse ($tugas as $item)
                                        <option value="{{ data_get($item, 'id') }}" @selected((string) old('tugas_id') === (string) data_get($item, 'id'))>
                                            {{ data_get($item, 'task_code') ? data_get($item, 'task_code') . ' — ' : '' }}{{ data_get($item, 'name', data_get($item, 'nama_tugas', data_get($item, 'jenis_tugas', 'Tugas tanpa nama'))) }}@if(data_get($item, 'location', data_get($item, 'lokasi')))
                                                — {{ data_get($item, 'location', data_get($item, 'lokasi')) }}
                                            @endif
                                            @if(data_get($item, 'deadline'))
                                                (Batas:
                                                {{ \Illuminate\Support\Carbon::parse(data_get($item, 'deadline'))->format('d M Y') }})
                                            @endif
                                        </option>
                                    @empty
                                        <option value="" disabled>Belum ada tugas yang ditugaskan kepada Anda</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="field full">
                                <label for="catatan">Hasil Pekerjaan &amp; Catatan</label>
                                <textarea id="catatan" name="catatan"
                                    placeholder="Jelaskan detail pekerjaan, kendala yang dihadapi, atau jumlah pupuk/obat yang digunakan..."
                                    required>{{ old('catatan') }}</textarea>
                            </div>
                            <div class="field full">
                                <label for="foto">Dokumentasi Foto (Maks. 3)</label>
                                <label class="upload-area" for="foto">
                                    <i data-lucide="camera"></i>
                                    <strong>Ambil atau Unggah Foto</strong>
                                    <small>Format JPG/PNG, Maksimal 5MB per file</small>
                                    <input type="file" id="foto" name="foto[]" accept="image/jpeg,image/png,image/jpg"
                                        multiple>
                                </label>
                                <div class="photo-preview" id="photo-preview"></div>
                                <small id="photo-count" style="display:block;margin-top:5px;color:#697369"></small>
                            </div>
                        </div>
                        <button type="submit" class="submit-btn">▷ &nbsp; Kirim Laporan</button>
                    </form>
                </section>

                <aside class="side-info">
                    <section class="tips-card">
                        <i data-lucide="lightbulb"></i>
                        <h3>Tips Lapangan</h3>
                        <p>Pastikan foto dokumentasi jelas dan tidak buram untuk mempercepat proses verifikasi oleh
                            mandor.</p>
                    </section>
                    <section class="panel summary-card">
                        <div class="summary-title">RINGKASAN HARI INI</div>
                        <div class="summary-row"><span>Tugas Selesai</span><strong>{{ $tugasSelesai }} /
                                {{ $totalTugas }}</strong></div>
                        <div class="progress"><span style="width:{{ $persentase }}%"></span></div>
                        <p>
                            @if ($totalTugas > 0)
                                Selesaikan {{ max(0, $totalTugas - $tugasSelesai) }} tugas lagi untuk mencapai target
                                harian.
                            @else
                                Belum ada data tugas hari ini.
                            @endif
                        </p>
                    </section>
                </aside>
            </div>

            <section class="history">
                <div class="history-heading">
                    <h2>Riwayat Laporan</h2>
                    <a href="{{ $laporanRoute }}">Lihat Semua</a>
                </div>
                <div class="panel table-wrap">
                    @if ($riwayat->count())
                        <table id="history-table">
                            <thead>
                                <tr>
                                    <th>TANGGAL</th>
                                    <th>TUGAS PEKERJAAN</th>
                                    <th>STATUS VERIFIKASI</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayat as $laporan)
                                    @php
                                        $statusText = (string) data_get($laporan, 'status_verification', data_get($laporan, 'status_verifikasi', data_get($laporan, 'status', 'Menunggu')));
                                        $status = \Illuminate\Support\Str::lower($statusText);
                                        $verified = in_array($status, ['terverifikasi', 'verified', 'disetujui', 'approved']);
                                        $tanggal = data_get($laporan, 'work_date', data_get($laporan, 'tanggal_pekerjaan', data_get($laporan, 'created_at')));
                                        $namaTugas = data_get($laporan, 'task.name')
                                            ?: data_get($laporan, 'task_name')
                                            ?: data_get($laporan, 'nama_tugas')
                                            ?: data_get($laporan, 'tugas.nama_tugas')
                                            ?: 'Laporan pekerjaan';
                                    @endphp
                                    <tr>
                                        <td>{{ $tanggal ? \Illuminate\Support\Carbon::parse($tanggal)->format('d M Y') : '-' }}
                                        </td>
                                        <td>{{ $namaTugas }}</td>
                                        <td><span class="status {{ $verified ? 'verified' : 'pending' }}"><i
                                                    data-lucide="{{ $verified ? 'check-circle' : 'clock' }}"></i>{{ $statusText }}</span>
                                        </td>
                                        <td><a class="view-btn" href="#" onclick="return false;" title="Detail laporan"><i
                                                    data-lucide="eye"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="empty-history">Belum ada riwayat laporan untuk ditampilkan.</div>
                    @endif
                </div>
            </section>
        </div>
    </main>

    <script>
        lucide.createIcons();

        const photoInput = document.getElementById('foto');
        const photoPreview = document.getElementById('photo-preview');
        const photoCount = document.getElementById('photo-count');

        photoInput.addEventListener('change', function () {
            photoPreview.innerHTML = '';
            const files = Array.from(this.files || []);

            if (files.length > 3) {
                alert('Maksimal hanya 3 foto yang dapat diunggah.');
                this.value = '';
                photoCount.textContent = '';
                return;
            }
            if (files.some(file => file.size > 5 * 1024 * 1024)) {
                alert('Ukuran setiap foto maksimal 5 MB.');
                this.value = '';
                photoCount.textContent = '';
                return;
            }
            files.forEach(file => {
                if (!file.type.startsWith('image/')) return;
                const img = document.createElement('img');
                img.alt = file.name;
                img.src = URL.createObjectURL(file);
                photoPreview.appendChild(img);
            });
            photoCount.textContent = files.length ? files.length + ' foto dipilih' : '';
        });

        const searchInput = document.getElementById('search-history');
        searchInput.addEventListener('input', function () {
            const filter = this.value.toLowerCase();
            document.querySelectorAll('#history-table tbody tr').forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(filter) ? '' : 'none';
            });
        });
    </script>
</body>

</html>