<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Jadwal - Sihombing Group</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f7f8f7;
            color: #303330;
            font-size: 13px;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        /* SIDEBAR — disamakan dengan Input Pekerjaan */
        .app {
            width: 100%;
            min-height: 100vh;
            display: flex;
            background: #f7f8f7;
        }

        .sidebar {
            width: 195px;
            min-width: 195px;
            height: 100vh;
            position: sticky;
            top: 0;
            background: #fff;
            border-right: 1px solid #d9ded9;
            display: flex;
            flex-direction: column;
        }

        .brand {
            height: 83px;
            padding: 25px 22px 0;
            flex-shrink: 0;
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
            padding: 0 10px;
            margin-top: 0;
        }

        .menu-item {
            min-height: 40px;
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
            stroke-width: 1.8;
            flex-shrink: 0;
        }

        .menu-item span {
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

        .menu-item.active svg {
            color: #086b22;
        }

        .menu a {
            text-decoration: none;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 0 10px 16px;
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

        /* AREA UTAMA */
        .main {
            flex: 1;
            min-width: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            min-height: 62px;
            background: #fff;
            border-bottom: 1px solid #dfe3df;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 22px;
            flex-shrink: 0;
            gap: 18px;
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
            flex-shrink: 0;
        }

        .search-top input {
            width: 100%;
            min-width: 0;
            border: none;
            outline: none;
            background: transparent;
            font-family: inherit;
            font-size: 11px;
            color: #555;
        }

        .top-icon {
            position: relative;
            color: #3f4640;
            display: flex;
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

        .content {
            flex: 1;
            padding: 16px 20px 26px;
            min-width: 0;
        }

        .flash {
            margin-bottom: 12px;
            padding: 11px 14px;
            border-radius: 8px;
            font-size: 11px;
        }

        .flash.success {
            color: #08751b;
            background: #eaf8e9;
            border: 1px solid #b2e4b0;
        }

        .flash.error {
            color: #b51d1d;
            background: #fff0f0;
            border: 1px solid #f1c2c2;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }

        .page-heading h1 {
            font-size: 25px;
            line-height: 1.2;
            font-weight: 600;
            color: #272b28;
            margin-bottom: 4px;
        }

        .page-heading p {
            color: #626862;
            font-size: 11px;
        }

        .page-status {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 6px;
            margin-top: 7px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 9px;
            border-radius: 14px;
            font-size: 8px;
            white-space: nowrap;
        }

        .status-active {
            background: #8cf083;
            color: #086b22;
        }

        .status-updated {
            background: #367b3f;
            color: #fff;
        }

        .actions,
        .table-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            align-items: center;
        }

        button,
        .btn-link {
            cursor: pointer;
        }

        .btn {
            min-height: 36px;
            border-radius: 8px;
            padding: 0 13px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            font-size: 11px;
            font-weight: 600;
            border: 1px solid #bfcdbf;
            background: #fff;
            color: #08751b;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn svg {
            width: 15px;
            height: 15px;
        }

        .btn-primary {
            background: #087a2a;
            border-color: #087a2a;
            color: #fff;
        }

        .btn-primary:hover {
            background: #066420;
        }

        .btn:hover:not(:disabled) {
            filter: brightness(.98);
        }

        .btn:disabled {
            opacity: .45;
            cursor: not-allowed;
        }

        .layout {
            display: grid;
            grid-template-columns: minmax(265px, 310px) minmax(0, 1fr);
            gap: 20px;
            align-items: start;
        }

        .side-column {
            min-width: 0;
            display: grid;
            gap: 18px;
        }

        .card {
            background: #fff;
            border: 1px solid #d5ddd5;
            border-radius: 11px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .025);
            min-width: 0;
        }

        .card-head {
            padding: 16px 18px;
            border-bottom: 1px solid #e0e6e0;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .card-head svg {
            width: 17px;
            height: 17px;
            color: #087a2a;
        }

        .form-body {
            padding: 16px 18px 18px;
        }

        .field {
            min-width: 0;
            margin-bottom: 12px;
        }

        .field label {
            display: block;
            margin-bottom: 5px;
            color: #4e584f;
            font-size: 10px;
            font-weight: 500;
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            min-width: 0;
            min-height: 37px;
            padding: 8px 10px;
            border: 1px solid #cfd8cf;
            border-radius: 7px;
            background: #fff;
            color: #39433b;
            outline: 0;
            font-family: inherit;
            font-size: 11px;
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: #4caf50;
            box-shadow: 0 0 0 2px rgba(76, 175, 80, .09);
        }

        .field input[readonly] {
            background: #f0f3f0;
            color: #5a625b;
        }

        .field textarea {
            height: 72px;
            resize: vertical;
        }

        .field-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            gap: 10px;
        }

        .save {
            width: 100%;
            min-height: 39px;
            margin-top: 3px;
            background: #087a2a;
            color: #fff;
            border: 1px solid #087a2a;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 600;
        }

        .save:hover {
            background: #066420;
        }

        .calendar {
            padding: 16px;
        }

        .calendar-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
            font-size: 12px;
            font-weight: 600;
        }

        .calendar-title>div {
            display: flex;
            gap: 4px;
        }

        .calendar-title button {
            border: 0;
            background: transparent;
            color: #4c554d;
            padding: 3px;
            display: flex;
        }

        .calendar-title svg {
            width: 16px;
            height: 16px;
        }

        .weekdays,
        .days {
            display: grid;
            grid-template-columns: repeat(7, minmax(0, 1fr));
            text-align: center;
            gap: 4px;
        }

        .weekdays {
            margin-bottom: 7px;
            color: #758076;
            font-size: 9px;
            font-weight: 600;
        }

        .day {
            position: relative;
            display: grid;
            place-items: center;
            min-height: 29px;
            border-radius: 7px;
            font-size: 10px;
            color: #3e493f;
            cursor: pointer;
        }

        .day:hover:not(.muted) {
            background: #eef9ed;
        }

        .day.muted {
            color: #b9c0b9;
            cursor: default;
        }

        .day.selected {
            background: #d9f6dc;
            color: #08752a;
            font-weight: 700;
        }

        .day.has-schedule::after {
            content: '';
            position: absolute;
            bottom: 3px;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: #08752a;
        }

        .legend {
            border-top: 1px solid #e1e7e1;
            margin-top: 12px;
            padding-top: 11px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            color: #69736a;
            font-size: 9px;
        }

        .dot {
            display: inline-block;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            margin-right: 5px;
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
            padding: 16px 17px;
            border-bottom: 1px solid #e0e6e0;
        }

        .table-title {
            font-size: 14px;
            font-weight: 600;
        }

        .table-actions button {
            border: 1px solid #d5ddd5;
            background: #f7f8f7;
            border-radius: 6px;
            padding: 8px 10px;
            font-size: 10px;
            display: flex;
            align-items: center;
            gap: 5px;
            color: #49534a;
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
            min-width: 650px;
            text-align: left;
        }

        thead {
            background: #f0f2f0;
        }

        th {
            padding: 13px 12px;
            color: #586258;
            font-size: 9px;
            font-weight: 600;
        }

        td {
            padding: 13px 12px;
            border-top: 1px solid #e7ebe7;
            font-size: 10.5px;
            line-height: 1.45;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fafcfa;
        }

        tbody tr.selected-row {
            background: #f0faf0;
        }

        .row-select {
            color: #344337;
            text-decoration: none;
            font-weight: 500;
            white-space: nowrap;
        }

        .row-select:hover {
            color: #087a2a;
            text-decoration: underline;
        }

        .person {
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 0;
        }

        .initials {
            width: 27px;
            height: 27px;
            flex: 0 0 27px;
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
            font-size: 9px;
            white-space: nowrap;
        }

        .scheduled {
            background: #e2f3e4;
            color: #1e702b;
        }

        .progress-status {
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

        .empty-state {
            padding: 28px 14px;
            color: #758076;
            text-align: center;
            font-size: 11px;
        }

        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 13px 17px;
            color: #788078;
            font-size: 10px;
            border-top: 1px solid #e1e7e1;
            flex-wrap: wrap;
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .pagination svg {
            width: 13px;
            height: 13px;
        }

        .pagination a,
        .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 27px;
            height: 27px;
            padding: 0 7px;
            border: 1px solid #d5ddd5;
            border-radius: 6px;
            text-decoration: none;
            color: #4e584f;
            background: #fff;
            font-size: 10px;
        }

        .pagination span[aria-current="page"] {
            color: #fff;
            background: #087a2a;
            border-color: #087a2a;
        }

        .pagination span[aria-disabled="true"] {
            color: #aeb6ae;
            background: #f7f8f7;
        }

        .validation {
            color: #bb2222;
            font-size: 9px;
            margin-top: 4px;
        }

        @media (max-width: 1100px) {
            .layout {
                grid-template-columns: minmax(245px, 300px) minmax(0, 1fr);
                gap: 13px;
            }

            .content {
                padding: 14px;
            }

            .page-heading h1 {
                font-size: 22px;
            }

            .actions .btn {
                padding: 0 9px;
            }
        }

        @media (max-width: 850px) {
            .layout {
                grid-template-columns: 1fr;
            }

            .side-column {
                display: grid;
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
                gap: 14px;
            }

            .calendar {
                margin-top: 0;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .actions {
                align-self: flex-start;
            }
        }

        @media (max-width: 720px) {
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
                padding: 12px;
            }

            .side-column {
                grid-template-columns: 1fr;
            }

            .calendar {
                margin-top: 0;
            }

            .field-row {
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
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
                <div class="brand-subtitle">Kelola Jadwal</div>
            </div>
            <nav class="menu">
                @if (auth()->user()->role === 'staf')
                    <a href="{{ route('pemilik.dashboard') }}"
                        class="menu-item {{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}"><i
                            data-lucide="grid-2x2"></i><span>Dashboard</span></a>
                    <a href="{{ route('pemilik.pohon-lokasi') }}"
                        class="menu-item {{ request()->routeIs('pemilik.pohon-lokasi') ? 'active' : '' }}"><i
                            data-lucide="map"></i><span>Data Pohon &amp; Lokasi</span></a>
                    <a href="{{ route('pemilik.input-pekerjaan') }}"
                        class="menu-item {{ request()->routeIs('pemilik.input-pekerjaan') ? 'active' : '' }}"><i
                            data-lucide="tractor"></i><span>Input Pekerjaan</span></a>
                    <a href="{{ route('pemilik.perawatan') }}"
                        class="menu-item {{ request()->routeIs('pemilik.perawatan') ? 'active' : '' }}"><i
                            data-lucide="archive"></i><span>Kelola Perawatan</span></a>
                    <a href="{{ route('pemilik.jadwal') }}"
                        class="menu-item {{ request()->routeIs('pemilik.jadwal') ? 'active' : '' }}"><i
                            data-lucide="calendar-days"></i><span>Kelola Jadwal</span>
                    </a>

                    <a href="{{ route('pemilik.verifikasi-laporan') }}"
                        class="menu-item {{ request()->routeIs('pemilik.verifikasi-laporan*') ? 'active' : '' }}">

                        <i data-lucide="clipboard-check"></i>

                        <span>Verifikasi Laporan</span>
                    </a>

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


                @elseif (auth()->user()->role === 'pemilik')
                    <a href="{{ route('pemilik.keuangan') }}"
                        class="menu-item {{ request()->routeIs('pemilik.keuangan') ? 'active' : '' }}"><i
                            data-lucide="banknote"></i><span>Laporan Keuangan</span></a>
                @endif
            </nav>
            <div class="sidebar-bottom">
                <div class="sidebar-divider"></div>
                <a href="#" class="support"><i data-lucide="circle-help"></i><span>Support</span></a>
                <a href="{{ route('logout') }}" class="logout"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        data-lucide="log-out"></i><span>Logout</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="top-brand">Kelola Jadwal</div>
                <div class="top-right">
                    <label class="search-top"><i data-lucide="search"></i><input type="search" id="scheduleSearch"
                            placeholder="Cari jadwal..." oninput="searchSchedules()"></label>
                    <div class="top-icon"><i data-lucide="bell"></i><span class="notification-dot"></span></div>
                    <div class="top-icon"><i data-lucide="settings"></i></div>
                    <div class="profile-avatar">
                        @php
                            $name = auth()->user()->name ?? 'Staf Kebun';
                            $initials = collect(explode(' ', $name))->filter()->map(fn($word) => strtoupper(substr($word, 0, 1)))->take(2)->implode('');
                        @endphp
                        {{ $initials ?: 'SK' }}
                    </div>
                </div>
            </header>

            <section class="content">
                @if (session('success'))
                    <div class="flash success" role="status">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="flash error" role="alert">Periksa kembali formulir. {{ $errors->first() }}</div>
                @endif

                <div class="page-header">
                    <div class="page-heading">
                        <h1>Kelola Jadwal</h1>
                        <p>Atur dan pantau jadwal pemeliharaan kebun sawit.</p>
                        <div class="page-status">
                            <span class="status-badge status-active">{{ $schedules->total() }} Jadwal Terdaftar</span>
                            <span
                                class="status-badge status-updated">{{ $schedules->total() ? 'Terhubung ke database' : 'Belum ada data' }}</span>
                        </div>
                    </div>
                    <div class="actions">
                        <a class="btn btn-primary"
                            href="{{ route('pemilik.jadwal', ['new' => 1, 'month' => $calendarMonth]) }}"><i
                                data-lucide="plus"></i>Tambah Jadwal</a>
                        <button class="btn" type="button" {{ $selectedSchedule ? '' : 'disabled' }}
                            onclick="focusScheduleForm()"><i data-lucide="pencil"></i>Edit</button>
                        @if ($selectedSchedule)
                            <button class="btn" type="button" onclick="deleteSelectedSchedule()"><i
                                    data-lucide="trash-2"></i>Hapus</button>
                            <form id="deleteScheduleForm" action="{{ route('pemilik.jadwal.destroy', $selectedSchedule) }}"
                                method="POST" style="display:none;">@csrf @method('DELETE')</form>
                        @else
                            <button class="btn" type="button" disabled><i data-lucide="trash-2"></i>Hapus</button>
                        @endif
                    </div>
                </div>

                <div class="layout">
                    <div class="side-column">
                        <section class="card" id="scheduleFormCard">
                            <div class="card-head"><i data-lucide="calendar-days"></i>Detail Jadwal</div>
                            @if ($selectedSchedule)
                                <form class="form-body" id="scheduleForm"
                                    action="{{ route('pemilik.jadwal.update', $selectedSchedule) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                            @else
                                    <form class="form-body" id="scheduleForm" action="{{ route('pemilik.jadwal.store') }}"
                                        method="POST">
                                        @csrf
                                @endif
                                    <div class="field-row">
                                        <div class="field">
                                            <label for="scheduleCode">ID Jadwal</label>
                                            <input id="scheduleCode" type="text"
                                                value="{{ $selectedSchedule?->schedule_code ?? $nextScheduleCode }}"
                                                readonly>
                                        </div>
                                        <div class="field">
                                            <label for="scheduleStatus">Status</label>
                                            <select id="scheduleStatus" name="status" required>
                                                @foreach (['Terjadwal', 'Dalam Proses', 'Selesai', 'Mendesak'] as $status)
                                                    <option value="{{ $status }}" @selected(old('status', $selectedSchedule?->status ?? 'Terjadwal') === $status)>{{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <div class="validation">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="activity">Kegiatan</label>
                                        <input id="activity" name="activity"
                                            value="{{ old('activity', $selectedSchedule?->activity ?? '') }}"
                                            placeholder="Contoh: Pemupukan Urea" maxlength="150" required>
                                        @error('activity')
                                        <div class="validation">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="field-row">
                                        <div class="field">
                                            <label for="scheduleDate">Tanggal</label>
                                            <input id="scheduleDate" name="schedule_date" type="date"
                                                value="{{ old('schedule_date', $selectedSchedule?->schedule_date?->format('Y-m-d') ?? '') }}"
                                                required>
                                            @error('schedule_date')
                                            <div class="validation">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="field">
                                            <label for="location">Lokasi</label>
                                            <input id="location" name="location"
                                                value="{{ old('location', $selectedSchedule?->location ?? '') }}"
                                                placeholder="Contoh: Blok B-02" maxlength="150" required>
                                            @error('location')
                                            <div class="validation">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="workerId">Pekerja</label>
                                        <select id="workerId" name="worker_id" required>
                                            <option value="">Pilih pekerja</option>
                                            @foreach ($workers as $worker)
                                                <option value="{{ $worker->id }}" @selected((string) old('worker_id', $selectedSchedule?->worker_id ?? '') === (string) $worker->id)>
                                                    {{ $worker->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('worker_id')
                                        <div class="validation">{{ $message }}</div>@enderror
                                        @if ($workers->isEmpty())
                                            <div class="validation">Belum ada akun dengan role pekerja. Buat akun pekerja
                                        terlebih dahulu.</div>@endif
                                    </div>
                                    <div class="field">
                                        <label for="notes">Catatan (opsional)</label>
                                        <textarea id="notes" name="notes"
                                            placeholder="Tambahkan catatan jadwal jika diperlukan...">{{ old('notes', $selectedSchedule?->notes ?? '') }}</textarea>
                                        @error('notes')
                                        <div class="validation">{{ $message }}</div>@enderror
                                    </div>
                                    <button class="save"
                                        type="submit">{{ $selectedSchedule ? 'Simpan Perubahan' : 'Simpan Jadwal' }}</button>
                                </form>
                        </section>

                        <section class="card calendar">
                            <div class="calendar-title">
                                <span id="monthLabel">Kalender Jadwal</span>
                                <div>
                                    <button type="button" onclick="changeMonth(-1)" aria-label="Bulan sebelumnya"><i
                                            data-lucide="chevron-left"></i></button>
                                    <button type="button" onclick="changeMonth(1)" aria-label="Bulan berikutnya"><i
                                            data-lucide="chevron-right"></i></button>
                                </div>
                            </div>
                            <div class="weekdays">
                                <span>Min</span><span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span>
                            </div>
                            <div class="days" id="calendarDays"></div>
                            <div class="legend"><span><i class="dot"></i>Memiliki jadwal</span><span><i
                                        class="dot red"></i>Mendesak</span></div>
                        </section>
                    </div>

                    <section class="card">
                        <div class="table-head">
                            <div class="table-title">Daftar Jadwal Pemeliharaan</div>
                            <div class="table-actions">
                                <button type="button" onclick="filterSchedules()"><i
                                        data-lucide="list-filter"></i>Filter</button>
                                <button type="button" onclick="exportSchedule()"><i
                                        data-lucide="download"></i>Export</button>
                            </div>
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
                                    @forelse ($schedules as $schedule)
                                        @php
                                            $statusClass = match ($schedule->status) {
                                                'Terjadwal' => 'scheduled',
                                                'Dalam Proses' => 'progress-status',
                                                'Selesai' => 'completed',
                                                default => 'urgent',
                                            };
                                            $workerName = $schedule->worker?->name ?? 'Pekerja tidak tersedia';
                                            $workerInitials = collect(explode(' ', $workerName))->filter()->map(fn($word) => strtoupper(substr($word, 0, 1)))->take(2)->implode('');
                                        @endphp
                                        <tr
                                            class="{{ $selectedSchedule && $selectedSchedule->id === $schedule->id ? 'selected-row' : '' }}">
                                            <td><a class="row-select"
                                                    href="{{ route('pemilik.jadwal', ['schedule' => $schedule->id, 'month' => $calendarMonth]) }}">{{ $schedule->schedule_date->locale('id')->translatedFormat('d M Y') }}</a>
                                            </td>
                                            <td>{{ $schedule->activity }}</td>
                                            <td>{{ $schedule->location }}</td>
                                            <td>
                                                <div class="person"><span
                                                        class="initials">{{ $workerInitials ?: 'PK' }}</span><span>{{ $workerName }}</span>
                                                </div>
                                            </td>
                                            <td><span class="status {{ $statusClass }}">{{ $schedule->status }}</span></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="empty-state">Belum ada jadwal tersimpan. Klik “Tambah
                                                Jadwal” dan isi formulir di sebelah kiri.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="table-footer">
                            <span id="rowCount">Menampilkan
                                {{ $schedules->firstItem() ?? 0 }}–{{ $schedules->lastItem() ?? 0 }} dari
                                {{ $schedules->total() }} jadwal</span>
                            <div class="pagination">{{ $schedules->links() }}</div>
                        </div>
                    </section>
                </div>
            </section>
        </main>
    </div>

    <script>
        if (window.lucide) lucide.createIcons();

        function focusScheduleForm() {
            document.getElementById('scheduleFormCard').scrollIntoView({ behavior: 'smooth', block: 'start' });
            document.getElementById('activity').focus({ preventScroll: true });
        }

        function deleteSelectedSchedule() {
            if (confirm('Yakin ingin menghapus jadwal yang sedang dipilih?')) {
                document.getElementById('deleteScheduleForm').submit();
            }
        }

        function searchSchedules() {
            const query = document.getElementById('scheduleSearch').value.toLowerCase().trim();
            const rows = document.querySelectorAll('#scheduleTable tbody tr');
            let visible = 0;
            rows.forEach(row => {
                const match = row.innerText.toLowerCase().includes(query);
                row.hidden = !match;
                if (match && !row.querySelector('.empty-state')) visible++;
            });
            document.getElementById('rowCount').textContent = query ? 'Menampilkan ' + visible + ' jadwal yang cocok' : 'Menampilkan {{ $schedules->firstItem() ?? 0 }}–{{ $schedules->lastItem() ?? 0 }} dari {{ $schedules->total() }} jadwal';
        }

        function filterSchedules() {
            const choice = prompt('Filter status jadwal:\nKetik: Terjadwal, Dalam Proses, Selesai, atau Mendesak.\nKosongkan untuk menampilkan semua.');
            if (choice === null) return;
            const filter = choice.trim().toLowerCase();
            const rows = document.querySelectorAll('#scheduleTable tbody tr');
            let visible = 0;
            rows.forEach(row => {
                const match = !filter || row.innerText.toLowerCase().includes(filter);
                row.hidden = !match;
                if (match && !row.querySelector('.empty-state')) visible++;
            });
            document.getElementById('rowCount').textContent = 'Menampilkan ' + visible + ' jadwal';
        }

        function exportSchedule() {
            const table = document.getElementById('scheduleTable');
            const rows = Array.from(table.querySelectorAll('thead tr, tbody tr')).filter(row => !row.hidden && !row.querySelector('.empty-state'));
            const csv = rows.map(row => Array.from(row.cells).map(cell => '"' + cell.innerText.replace(/"/g, '""').trim() + '"').join(',')).join('\r\n');
            const blob = new Blob(['\ufeff' + csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'daftar-jadwal-pemeliharaan.csv';
            link.click();
            URL.revokeObjectURL(url);
        }

        const allScheduleDates = new Set(@json($scheduleDates));
        let currentMonth = new Date(@json($calendarMonth) + '-01T12:00:00');
        function renderCalendar() {
            const year = currentMonth.getFullYear();
            const month = currentMonth.getMonth();
            document.getElementById('monthLabel').textContent = new Intl.DateTimeFormat('id-ID', { month: 'long', year: 'numeric' }).format(currentMonth);
            const holder = document.getElementById('calendarDays');
            holder.innerHTML = '';
            const firstOffset = new Date(year, month, 1).getDay();
            const daysCount = new Date(year, month + 1, 0).getDate();
            const previousCount = new Date(year, month, 0).getDate();
            const currentInputDate = document.getElementById('scheduleDate').value;
            for (let i = 0; i < 42; i++) {
                const day = document.createElement('button');
                day.type = 'button';
                day.className = 'day';
                let dayNumber;
                let muted = false;
                let dateValue;
                if (i < firstOffset) {
                    dayNumber = previousCount - firstOffset + i + 1;
                    muted = true;
                    const d = new Date(year, month - 1, dayNumber);
                    dateValue = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
                } else if (i >= firstOffset + daysCount) {
                    dayNumber = i - firstOffset - daysCount + 1;
                    muted = true;
                    const d = new Date(year, month + 1, dayNumber);
                    dateValue = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
                } else {
                    dayNumber = i - firstOffset + 1;
                    dateValue = `${year}-${String(month + 1).padStart(2, '0')}-${String(dayNumber).padStart(2, '0')}`;
                }
                day.textContent = dayNumber;
                if (muted) day.classList.add('muted');
                if (allScheduleDates.has(dateValue)) day.classList.add('has-schedule');
                if (currentInputDate === dateValue) day.classList.add('selected');
                day.disabled = muted;
                day.addEventListener('click', () => {
                    document.getElementById('scheduleDate').value = dateValue;
                    renderCalendar();
                });
                holder.appendChild(day);
            }
        }
        function changeMonth(delta) {
            currentMonth.setMonth(currentMonth.getMonth() + delta);
            renderCalendar();
        }
        document.getElementById('scheduleDate').addEventListener('change', renderCalendar);
        renderCalendar();
    </script>
</body>

</html>