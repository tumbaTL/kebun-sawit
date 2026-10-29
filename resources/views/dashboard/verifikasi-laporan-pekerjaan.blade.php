<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Laporan Pekerjaan - Sihombing Group</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f7f8f7;
            color: #303330;
            font-size: 13px
        }

        .app {
            width: 100%;
            height: 100vh;
            margin: 0;
            background: #f7f8f7;
            display: flex;
            overflow: hidden
        }

        .sidebar {
            width: 195px;
            min-width: 195px;
            background: #fff;
            border-right: 1px solid #d9ded9;
            display: flex;
            flex-direction: column
        }

        .brand {
            height: 83px;
            padding: 25px 22px 0 22px
        }

        .brand-name {
            color: #086b22;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 2px
        }

        .brand-subtitle {
            color: #666;
            font-size: 11px
        }

        .menu {
            padding: 0 10px;
            margin-top: 0
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
            font-size: 11.5px
        }

        .menu-item svg {
            width: 16px;
            height: 16px;
            stroke-width: 1.8
        }

        .menu-item:hover {
            background: #eaf8e9;
            color: #08751b
        }

        .menu-item.active {
            background: #8cf083;
            color: #086b22;
            border-left: 3px solid #08751b;
            padding-left: 12px
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 0 10px 22px
        }

        .sidebar-divider {
            height: 1px;
            background: #d9ddd9;
            margin: 0 6px 18px
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
            border-radius: 5px
        }

        .support {
            color: #555;
            margin-bottom: 4px
        }

        .logout {
            color: #e32929
        }

        .support svg,
        .logout svg {
            width: 16px;
            height: 16px
        }

        .main {
            flex: 1;
            min-width: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column
        }

        .topbar {
            height: 68px;
            background: #fff;
            border-bottom: 1px solid #d9ded9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 25px;
            flex-shrink: 0
        }

        .top-brand {
            color: #086b22;
            font-size: 17px;
            font-weight: 700
        }

        .top-user {
            color: #606660;
            font-size: 11px
        }

        .content {
            flex: 1;
            padding: 24px;
            background: #f7f8f7;
            overflow-y: auto
        }

        .heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            margin-bottom: 18px
        }

        .heading h1 {
            font-size: 22px;
            line-height: 1.3;
            font-weight: 600;
            color: #272b28;
            margin-bottom: 5px
        }

        .heading p {
            font-size: 12px;
            color: #626862
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 18px
        }

        .summary-card {
            background: #fff;
            border: 1px solid #d9ded9;
            border-radius: 10px;
            padding: 16px
        }

        .summary-label {
            color: #626862;
            font-size: 11px;
            margin-bottom: 7px
        }

        .summary-value {
            font-size: 25px;
            font-weight: 700;
            color: #263b29
        }

        .summary-card.pending .summary-value {
            color: #a46a0a
        }

        .summary-card.approved .summary-value {
            color: #21803b
        }

        .summary-card.rejected .summary-value {
            color: #c83232
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

        .report-list {
            display: grid;
            gap: 14px
        }

        .report-card {
            background: #fff;
            border: 1px solid #d9ded9;
            border-radius: 10px;
            padding: 18px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .025)
        }

        .report-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 13px
        }

        .report-code {
            font-size: 11px;
            color: #687068;
            margin-bottom: 4px
        }

        .report-title {
            font-size: 16px;
            font-weight: 600;
            color: #243128;
            margin-bottom: 5px
        }

        .meta {
            font-size: 11px;
            color: #636a63;
            line-height: 1.8
        }

        .status {
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 10px;
            font-weight: 600
        }

        .status.waiting {
            background: #fff4d9;
            color: #906112
        }

        .status.approved {
            background: #e2f7e6;
            color: #1c7631
        }

        .status.rejected {
            background: #ffe6e6;
            color: #ad2828
        }

        .notes {
            background: #f8faf8;
            border: 1px solid #e2e8e2;
            border-radius: 8px;
            padding: 12px;
            margin: 12px 0;
            font-size: 12px;
            line-height: 1.65;
            white-space: pre-wrap;
            overflow-wrap: anywhere
        }

        .section-label {
            font-size: 11px;
            font-weight: 600;
            color: #465046;
            margin: 12px 0 7px
        }

        .photo-links {
            display: flex;
            flex-wrap: wrap;
            gap: 8px
        }

        .photo-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #08751b;
            text-decoration: none;
            background: #edf8ee;
            border: 1px solid #cfe8d1;
            border-radius: 7px;
            padding: 7px 10px;
            font-size: 11px
        }

        .photo-link:hover {
            background: #ddf2df
        }

        .verify-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e6eae6
        }

        .verify-box {
            border: 1px solid #e0e5e0;
            border-radius: 8px;
            padding: 12px;
            min-width: 0
        }

        .verify-box h3 {
            font-size: 12px;
            margin-bottom: 8px
        }

        .verify-box.approve h3 {
            color: #217c35
        }

        .verify-box.reject h3 {
            color: #b52828
        }

        .verify-box label {
            display: block;
            font-size: 10px;
            color: #525a52;
            margin-bottom: 5px
        }

        textarea {
            width: 100%;
            min-height: 65px;
            border: 1px solid #cfd7cf;
            border-radius: 6px;
            padding: 9px;
            font: inherit;
            font-size: 11px;
            resize: vertical;
            outline-color: #4c9f59;
            margin-bottom: 9px
        }

        .btn {
            border: 0;
            border-radius: 7px;
            padding: 9px 13px;
            color: #fff;
            font-family: inherit;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer
        }

        .btn.approve {
            background: #287d36
        }

        .btn.reject {
            background: #c73535
        }

        .btn:hover {
            filter: brightness(.94)
        }

        .verified-detail {
            margin-top: 14px;
            background: #f5f8f5;
            border-radius: 8px;
            padding: 11px;
            font-size: 11px;
            line-height: 1.7;
            color: #505a50
        }

        .empty {
            background: #fff;
            border: 1px dashed #cbd5cb;
            border-radius: 10px;
            padding: 32px;
            text-align: center;
            color: #697169;
            font-size: 12px
        }

        .pagination {
            margin-top: 18px
        }

        .pagination nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            font-size: 11px
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 6px 10px;
            border: 1px solid #d7ded7;
            border-radius: 5px;
            text-decoration: none;
            color: #315737;
            background: #fff;
            margin: 2px
        }

        .pagination [aria-current="page"] span {
            background: #e3f5e5
        }

        @media(max-width:900px) {
            .sidebar {
                width: 195px;
                min-width: 195px
            }

            .content {
                padding: 17px
            }

            .summary {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media(max-width:750px) {
            .sidebar {
                width: 65px;
                min-width: 65px
            }

            .brand {
                height: auto;
                padding: 20px 0;
                text-align: center
            }

            .brand-name {
                font-size: 9px
            }

            .brand-subtitle,
            .menu-item span,
            .support span,
            .logout span {
                display: none
            }

            .menu-item,
            .support,
            .logout {
                justify-content: center;
                padding: 0;
                border-radius: 8px
            }

            .menu-item.active {
                padding-left: 0;
                border-left: none
            }

            .content {
                padding: 12px
            }

            .stats {
                grid-template-columns: 1fr
            }
        }

        @media(max-width:650px) {
            .topbar {
                height: 54px;
                padding: 0 15px
            }

            .content {
                padding: 13px
            }

            .heading h1 {
                font-size: 19px
            }

            .summary {
                gap: 8px
            }

            .summary-card {
                padding: 12px
            }

            .summary-value {
                font-size: 21px
            }

            .report-card {
                padding: 13px
            }

            .report-top {
                display: block
            }

            .report-top .status {
                margin-top: 10px
            }

            .verify-grid {
                grid-template-columns: 1fr
            }
        }
    </style>

<link rel="stylesheet" href="{{ asset('css/staff-background.css') }}">

</head>

<body>
    @php
        $dashboardRoute = \Illuminate\Support\Facades\Route::has('pemilik.dashboard') ? route('pemilik.dashboard') : url('/dashboard/pemilik');
        $pohonRoute = \Illuminate\Support\Facades\Route::has('pemilik.pohon-lokasi') ? route('pemilik.pohon-lokasi') : url('/dashboard/pemilik/pohon-lokasi');
        $pekerjaanRoute = \Illuminate\Support\Facades\Route::has('pemilik.input-pekerjaan') ? route('pemilik.input-pekerjaan') : url('/dashboard/pemilik/input-pekerjaan');
        $perawatanRoute = \Illuminate\Support\Facades\Route::has('pemilik.perawatan') ? route('pemilik.perawatan') : url('/dashboard/pemilik/kelola-perawatan');
        $jadwalRoute = \Illuminate\Support\Facades\Route::has('pemilik.jadwal') ? route('pemilik.jadwal') : url('/dashboard/pemilik/kelola-jadwal');
        $logoutRoute = \Illuminate\Support\Facades\Route::has('logout') ? route('logout') : url('/logout');
    @endphp
    <div class="app">
        <aside class="sidebar">
            <div class="brand">
                <div class="brand-name">Sihombing Group</div>
                <div class="brand-subtitle">Dashboard</div>
            </div>
            <nav class="menu">
                <a href="{{ $dashboardRoute }}"
                    class="menu-item {{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}"><i
                        data-lucide="layout-dashboard"></i><span>Dashboard</span></a>
                <a href="{{ $pohonRoute }}"
                    class="menu-item {{ request()->routeIs('pemilik.pohon-lokasi') ? 'active' : '' }}"><i
                        data-lucide="map"></i><span>Data Pohon &amp; Lokasi</span></a>
                <a href="{{ $pekerjaanRoute }}"
                    class="menu-item {{ request()->routeIs('pemilik.input-pekerjaan') ? 'active' : '' }}"><i
                        data-lucide="tractor"></i><span>Input Pekerjaan</span></a>
                <a href="{{ $perawatanRoute }}"
                    class="menu-item {{ request()->routeIs('pemilik.perawatan') ? 'active' : '' }}"><i
                        data-lucide="archive"></i><span>Kelola Perawatan</span></a>
                <a href="{{ $jadwalRoute }}"
                    class="menu-item {{ request()->routeIs('pemilik.jadwal') ? 'active' : '' }}"><i
                        data-lucide="calendar"></i><span>Kelola Jadwal</span></a>
                <a href="{{ route('pemilik.verifikasi-laporan') }}" class="menu-item active"><i
                        data-lucide="clipboard-check"></i><span>Verifikasi Laporan</span></a>

                <a href="{{ route('staf.penjualan') }}"
                    class="menu-item {{ request()->routeIs('staf.penjualan*') ? 'active' : '' }}">
                    <i data-lucide="chart-no-axes-combined"></i>
                    <span>Laporan Penjualan</span>
                </a>

                <a href="{{ route('staf.hasil-penjualan') }}"
                    class="menu-item {{ request()->routeIs('staf.hasil-penjualan') ? 'active' : '' }}">
                    <i data-lucide="factory"></i>
                    <span>Hasil Penjualan ke Pabrik</span>
                </a>

            </nav>
            <div class="sidebar-bottom">
                <div class="sidebar-divider"></div>
                <a href="#" class="support"><i data-lucide="circle-help"></i><span>Support</span></a>
                <a href="{{ $logoutRoute }}" class="logout"
                    onclick="event.preventDefault();document.getElementById('logout-verifikasi-form').submit();"><i
                        data-lucide="log-out"></i><span>Logout</span></a>
                <form id="logout-verifikasi-form" action="{{ $logoutRoute }}" method="POST" style="display:none">@csrf
                </form>
            </div>
        </aside>
        <main class="main">
            <header class="topbar">
                <div class="top-brand">Verifikasi Laporan Pekerjaan</div>
                <div class="top-user">{{ auth()->user()->name }} · Staf Kebun</div>
            </header>
            <section class="content">
                <div class="heading">
                    <div>
                        <h1>Verifikasi Laporan Pekerjaan</h1>
                        <p>Periksa catatan dan dokumentasi dari pekerja sebelum menyetujui atau menolak laporan.</p>
                    </div>
                </div>

                @if (session('success'))
                <div class="alert success">{{ session('success') }}</div> @endif
                @if (session('error'))
                <div class="alert error">{{ session('error') }}</div> @endif
                @if ($errors->any())
                    <div class="alert error">
                        <ul>@foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                <div class="summary">
                    <div class="summary-card">
                        <div class="summary-label">Total Laporan</div>
                        <div class="summary-value">{{ $totalReports }}</div>
                    </div>
                    <div class="summary-card pending">
                        <div class="summary-label">Menunggu Verifikasi</div>
                        <div class="summary-value">{{ $pendingReports }}</div>
                    </div>
                    <div class="summary-card approved">
                        <div class="summary-label">Disetujui</div>
                        <div class="summary-value">{{ $approvedReports }}</div>
                    </div>
                    <div class="summary-card rejected">
                        <div class="summary-label">Ditolak</div>
                        <div class="summary-value">{{ $rejectedReports }}</div>
                    </div>
                </div>

                <div class="report-list">
                    @forelse ($reports as $report)
                        @php
                            $statusClass = match ($report->status_verification) {
                                'Disetujui' => 'approved',
                                'Ditolak' => 'rejected',
                                default => 'waiting',
                            };
                        @endphp
                        <article class="report-card">
                            <div class="report-top">
                                <div>
                                    <div class="report-code">{{ $report->report_code }}</div>
                                    <h2 class="report-title">{{ $report->task_name }}</h2>
                                    <div class="meta">
                                        Pekerja:
                                        <strong>{{ $report->worker?->name ?? ('User #' . $report->worker_id) }}</strong><br>
                                        Tanggal pekerjaan: {{ $report->work_date?->format('d M Y') ?? '-' }}<br>
                                        Lokasi: {{ $report->task_location ?: '-' }}
                                    </div>
                                </div>
                                <span class="status {{ $statusClass }}">{{ $report->status_verification }}</span>
                            </div>

                            <div class="section-label">Catatan dari pekerja</div>
                            <div class="notes">{{ $report->notes }}</div>

                            <div class="section-label">Dokumentasi foto</div>
                            <div class="photo-links">
                                @forelse (($report->photo_paths ?? []) as $photoIndex => $photoPath)
                                    <a class="photo-link"
                                        href="{{ route('pemilik.verifikasi-laporan.foto', ['workReport' => $report->id, 'photoIndex' => $photoIndex]) }}"
                                        target="_blank" rel="noopener noreferrer"><i data-lucide="image"></i> Lihat Foto
                                        {{ $loop->iteration }}</a>
                                @empty
                                    <span class="meta">Tidak ada foto yang dilampirkan.</span>
                                @endforelse
                            </div>

                            @if ($report->status_verification === 'Menunggu')
                                <div class="verify-grid">
                                    <div class="verify-box approve">
                                        <h3>Setujui laporan</h3>
                                        <form action="{{ route('pemilik.verifikasi-laporan.approve', $report) }}" method="POST">
                                            @csrf
                                            <label for="approve-note-{{ $report->id }}">Catatan verifikasi (opsional)</label>
                                            <textarea id="approve-note-{{ $report->id }}" name="catatan_verifikasi"
                                                maxlength="2000"
                                                placeholder="Contoh: hasil pekerjaan sesuai dengan foto dokumentasi."></textarea>
                                            <button type="submit" class="btn approve"
                                                onclick="return confirm('Setujui laporan {{ $report->report_code }}?')">Setujui
                                                Laporan</button>
                                        </form>
                                    </div>
                                    <div class="verify-box reject">
                                        <h3>Tolak laporan</h3>
                                        <form action="{{ route('pemilik.verifikasi-laporan.reject', $report) }}" method="POST">
                                            @csrf
                                            <label for="reject-note-{{ $report->id }}">Alasan penolakan (wajib)</label>
                                            <textarea id="reject-note-{{ $report->id }}" name="catatan_verifikasi" minlength="3"
                                                maxlength="2000" required
                                                placeholder="Tuliskan bagian yang perlu diperbaiki oleh pekerja."></textarea>
                                            <button type="submit" class="btn reject"
                                                onclick="return confirm('Tolak laporan {{ $report->report_code }}?')">Tolak
                                                Laporan</button>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="verified-detail">
                                    <strong>Diverifikasi oleh:</strong>
                                    {{ $report->verifier?->name ?? 'Akun verifikator tidak tersedia' }}<br>
                                    <strong>Waktu verifikasi:</strong>
                                    {{ $report->verified_at?->format('d M Y, H:i') ?? '-' }}<br>
                                    <strong>Catatan verifikasi:</strong> {{ $report->verification_notes ?: '-' }}
                                </div>
                            @endif
                        </article>
                    @empty
                        <div class="empty">Belum ada laporan pekerjaan yang dikirim oleh pekerja.</div>
                    @endforelse
                </div>

                @if ($reports->hasPages())
                <div class="pagination">{{ $reports->links() }}</div> @endif
            </section>
        </main>
    </div>
    <script>if (window.lucide) { window.lucide.createIcons(); }</script>
</body>

</html>