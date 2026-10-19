<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Input Pekerjaan</title>

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

            flex-shrink: 0;

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

        /* =========================

           CONTENT

        ========================= */

        .content {

            flex: 1;

            overflow-y: auto;

            padding: 10px;

            background: #f7f8f7;

        }

        /* =========================

           PAGE TITLE

        ========================= */

        .page-heading {

            margin-bottom: 8px;

        }

        .page-heading h1 {

            font-size: 16px;

            line-height: 1.2;

            font-weight: 600;

            color: #272b28;

            margin-bottom: 3px;

        }

        .page-heading p {

            font-size: 10px;

            color: #626862;

        }

        /* =========================

           TOP GRID

        ========================= */

        .top-grid {

            display: grid;

            grid-template-columns: minmax(0, 2.2fr) minmax(210px, 1fr);

            gap: 14px;

            margin-bottom: 10px;

        }

        /* =========================

           CARD

        ========================= */

        .card {

            background: #ffffff;

            border: 1px solid #d9ded9;

            border-radius: 9px;

            box-shadow: 0 1px 3px rgba(0, 0, 0, .02);

        }

        /* =========================

           FORM CARD

        ========================= */

        .form-card {

            padding: 13px 15px 14px;

        }

        .card-title {

            display: flex;

            align-items: center;

            gap: 7px;

            font-size: 11px;

            font-weight: 600;

            color: #303530;

            margin-bottom: 12px;

        }

        .card-title svg {

            width: 15px;

            height: 15px;

            color: #08751b;

            stroke-width: 2;

        }

        /* =========================

           FORM GRID

        ========================= */

        .form-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            column-gap: 14px;

            row-gap: 10px;

        }

        .form-group {

            display: flex;

            flex-direction: column;

        }

        .form-group.full {

            grid-column: 1 / -1;

        }

        .form-label {

            font-size: 10px;

            color: #4e554e;

            margin-bottom: 5px;

        }

        .form-control {

            width: 100%;

            height: 32px;

            border: 1px solid #d3d9d3;

            border-radius: 5px;

            background: #ffffff;

            padding: 0 10px;

            outline: none;

            font-family: inherit;

            font-size: 10px;

            color: #4d534d;

        }

        .form-control::placeholder {

            color: #9ca19c;

        }

        /* Pesan validasi dan status pekerjaan */
        .form-alert {
            border-radius: 7px;
            padding: 10px 12px;
            margin-bottom: 10px;
            font-size: 10px;
        }

        .form-alert.success {
            background: #e9f8e8;
            border: 1px solid #b5e6b2;
            color: #086b22;
        }

        .form-alert.error {
            background: #fff0f0;
            border: 1px solid #f3c3c3;
            color: #a51d1d;
        }

        .form-alert ul {
            margin: 5px 0 0 16px;
        }

        .field-error {
            color: #c62828;
            font-size: 9px;
            margin-top: 4px;
        }

        .status-pending {
            background: #edf0ed;
            color: #555d55;
        }

        .form-control:focus {

            border-color: #4caf50;

            box-shadow: 0 0 0 2px rgba(76, 175, 80, .08);

        }

        select.form-control {

            appearance: auto;

        }

        textarea.form-control {

            height: 76px;

            resize: none;

            padding: 9px 10px;

        }

        /* INPUT ICON */

        .input-icon {

            position: relative;

        }

        .input-icon svg {

            position: absolute;

            left: 9px;

            top: 50%;

            transform: translateY(-50%);

            width: 14px;

            height: 14px;

            color: #626a62;

            pointer-events: none;

        }

        .input-icon .form-control {

            padding-left: 30px;

        }

        /* =========================

           FORM BUTTONS

        ========================= */

        .form-actions {

            display: flex;

            align-items: center;

            gap: 10px;

            margin-top: 12px;

        }

        .btn {

            height: 38px;

            border-radius: 6px;

            padding: 0 18px;

            font-family: inherit;

            font-size: 10px;

            font-weight: 600;

            cursor: pointer;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            transition: .2s;

        }

        .btn svg {

            width: 14px;

            height: 14px;

        }

        .btn-primary {

            width: 118px;

            border: 1px solid #08751b;

            background: #08751b;

            color: #ffffff;

            box-shadow: 0 3px 8px rgba(8, 117, 27, .15);

        }

        .btn-primary:hover {

            background: #076518;

        }

        .btn-secondary {

            width: 98px;

            border: 1px solid #bfc9bf;

            background: #ffffff;

            color: #4e554e;

        }

        .btn-secondary:hover {

            background: #f4f6f4;

        }

        /* =========================

           GUIDE CARD

        ========================= */

        .guide-card {

            background: #2d8437;

            border: none;

            border-radius: 8px;

            padding: 15px;

            color: #ffffff;

            position: relative;

            overflow: hidden;

            min-height: 100%;

        }

        .guide-card::after {

            content: "";

            position: absolute;

            width: 82px;

            height: 82px;

            right: -17px;

            bottom: -28px;

            border-radius: 50%;

            border: 22px solid rgba(137, 240, 129, .28);

        }

        .guide-title {

            font-size: 11px;

            font-weight: 600;

            margin-bottom: 11px;

            position: relative;

            z-index: 2;

        }

        .guide-text {

            font-size: 9.5px;

            line-height: 1.7;

            color: rgba(255, 255, 255, .88);

            margin-bottom: 12px;

            position: relative;

            z-index: 2;

        }

        .guide-list {

            list-style: none;

            display: flex;

            flex-direction: column;

            gap: 8px;

            position: relative;

            z-index: 2;

        }

        .guide-list li {

            display: flex;

            align-items: flex-start;

            gap: 6px;

            font-size: 9.5px;

            line-height: 1.45;

            color: rgba(255, 255, 255, .92);

        }

        .guide-list svg {

            width: 12px;

            height: 12px;

            flex-shrink: 0;

            margin-top: 1px;

        }

        /* =========================

           TABLE CARD

        ========================= */

        .table-card {

            overflow: hidden;

        }

        .table-header {

            min-height: 59px;

            padding: 10px 15px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom: 1px solid #dfe3df;

        }

        .table-title h2 {

            font-size: 11px;

            font-weight: 600;

            color: #303530;

            margin-bottom: 2px;

        }

        .table-title p {

            font-size: 9px;

            color: #6c726c;

        }

        .table-tools {

            display: flex;

            align-items: center;

            gap: 7px;

        }

        .table-btn {

            height: 28px;

            padding: 0 10px;

            border: 1px solid #d3d9d3;

            border-radius: 5px;

            background: #ffffff;

            color: #505650;

            font-family: inherit;

            font-size: 9px;

            display: inline-flex;

            align-items: center;

            gap: 5px;

            cursor: pointer;

        }

        .table-btn:hover {

            background: #f5f7f5;

        }

        .table-btn svg {

            width: 12px;

            height: 12px;

        }

        /* =========================

           TABLE

        ========================= */

        .table-wrapper {

            width: 100%;

            overflow-x: auto;

        }

        table {

            width: 100%;

            border-collapse: collapse;

            table-layout: fixed;

        }

        thead {

            background: #f1f3f1;

        }

        th {

            height: 36px;

            padding: 0 14px;

            border-bottom: 1px solid #d9ded9;

            text-align: left;

            font-size: 9px;

            font-weight: 700;

            color: #4d534d;

            letter-spacing: .2px;

        }

        td {

            min-height: 55px;

            padding: 10px 14px;

            border-bottom: 1px solid #dfe3df;

            vertical-align: middle;

            font-size: 9px;

            color: #4b514b;

        }

        tbody tr:last-child td {

            border-bottom: none;

        }

        tbody tr:hover {

            background: #fafcfa;

        }

        /* COLUMN WIDTH */

        th:nth-child(1),

        td:nth-child(1) {

            width: 17%;

        }

        th:nth-child(2),

        td:nth-child(2) {

            width: 29%;

        }

        th:nth-child(3),

        td:nth-child(3) {

            width: 16%;

        }

        th:nth-child(4),

        td:nth-child(4) {

            width: 14%;

        }

        th:nth-child(5),

        td:nth-child(5) {

            width: 16%;

        }

        th:nth-child(6),

        td:nth-child(6) {

            width: 8%;

        }

        .task-id {

            color: #08751b;

            font-weight: 700;

            line-height: 1.35;

        }

        .task-name {

            color: #343934;

            font-weight: 600;

            margin-bottom: 2px;

        }

        .worker {

            color: #666c66;

            font-size: 8.5px;

            line-height: 1.4;

        }

        .location {

            display: flex;

            align-items: flex-start;

            gap: 3px;

        }

        .location svg {

            width: 10px;

            height: 10px;

            color: #17852d;

            flex-shrink: 0;

            margin-top: 1px;

        }

        .status {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-height: 22px;

            padding: 0 8px;

            border-radius: 20px;

            font-size: 8px;

            font-weight: 600;

        }

        .status-progress {

            background: #8cf083;

            color: #08751b;

        }

        .status-done {

            background: #398c48;

            color: #ffffff;

        }

        .status-late {

            background: #ffd4d4;

            color: #b51d1d;

        }

        .action-btn {

            border: none;

            background: transparent;

            cursor: pointer;

            color: #525852;

            padding: 3px;

        }

        .action-btn svg {

            width: 15px;

            height: 15px;

        }

        /* =========================

           TABLE FOOTER

        ========================= */

        .table-footer {

            min-height: 48px;

            padding: 0 15px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-top: 1px solid #dfe3df;

            background: #ffffff;

        }

        .table-info {

            font-size: 9px;

            color: #626862;

        }

        .pagination {

            display: flex;

            align-items: center;

            gap: 4px;

        }

        .page-btn {

            width: 27px;

            height: 27px;

            border: 1px solid #d6dbd6;

            border-radius: 5px;

            background: #ffffff;

            color: #3f453f;

            font-family: inherit;

            font-size: 9px;

            display: flex;

            align-items: center;

            justify-content: center;

            cursor: pointer;

        }

        .page-btn:hover {

            background: #f2f5f2;

        }

        .page-btn.active {

            background: #08751b;

            border-color: #08751b;

            color: #ffffff;

            font-weight: 600;

        }

        a.page-btn {
            text-decoration: none;
        }

        .page-btn.disabled {

            color: #b7bcb7;

            cursor: default;

        }

        /* MODAL EDIT TUGAS */
        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 18px;
            background: rgba(20, 30, 20, .45);
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal-card {
            width: min(620px, 100%);
            max-height: 90vh;
            overflow-y: auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 12px 36px rgba(0, 0, 0, .18);
            padding: 18px;
        }

        .modal-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
        }

        .modal-head h2 {
            font-size: 14px;
            color: #303530;
        }

        .modal-close {
            border: 0;
            background: transparent;
            font-size: 24px;
            cursor: pointer;
            color: #596059;
            line-height: 1;
        }

        .modal-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .modal-grid .form-group.full {
            grid-column: 1 / -1;
        }

        .modal-grid textarea.form-control {
            height: 76px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 16px;
        }

        .action-group {
            display: flex;
            align-items: center;
            gap: 5px;
            white-space: nowrap;
        }

        .action-btn.danger {
            color: #c62828;
        }

        .action-group form {
            display: inline-flex;
            margin: 0;
        }

        @media (max-width: 650px) {
            .modal-grid {
                grid-template-columns: 1fr;
            }

            .modal-grid .form-group.full {
                grid-column: auto;
            }
        }

        /* =========================

           RESPONSIVE

        ========================= */

        @media (max-width: 1000px) {

            .top-grid {

                grid-template-columns: 1fr;

            }

            .guide-card {

                min-height: 170px;

            }

        }

        @media (max-width: 800px) {

            .sidebar {

                width: 180px;

                min-width: 180px;

            }

            .top-right {

                gap: 10px;

            }

            .search-top {

                width: 170px;

            }

            .form-grid {

                grid-template-columns: 1fr;

            }

            .form-group.full {

                grid-column: auto;

            }

        }

        @media (max-width: 650px) {

            .sidebar {

                width: 170px;

                min-width: 170px;

            }

            .topbar {

                padding: 0 12px;

            }

            .top-brand {

                font-size: 15px;

            }

            .search-top {

                width: 140px;

            }

            .content {

                padding: 8px;

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

                    Input Pekerjaan

                </div>

            </div>

            <nav class="menu">

                @if (auth()->user()->role === 'staf')

                    <a href="{{ route('pemilik.dashboard') }}"
                        class="menu-item {{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}">

                        <i data-lucide="grid-2x2"></i>

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

                        <i data-lucide="calendar-days"></i>

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

        <!-- =====================================================

             MAIN

        ====================================================== -->

        <main class="main">

            <!-- TOPBAR -->

            <header class="topbar">

                <div class="top-brand">

                    Input Pekerjaan

                </div>

                <div class="top-right">

                    <div class="search-top">

                        <i data-lucide="search"></i>

                        <input type="text" id="taskSearch" placeholder="Cari tugas..." oninput="searchTasks()">

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

                                ->filter()

                                ->map(fn($word) => strtoupper(substr($word, 0, 1)))

                                ->take(2)

                                ->implode('');

                        @endphp

                        {{ $initials ?: 'PK' }}

                    </div>

                </div>

            </header>

            <!-- =================================================

                 CONTENT

            ================================================== -->

            <section class="content">
                @if (session('success'))
                    <div class="form-alert success" role="status">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="form-alert error" role="alert">
                        Periksa kembali data yang kamu masukkan.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- PAGE HEADING -->

                <div class="page-heading">

                    <h1>Input Pekerjaan</h1>

                    <p>

                        Kelola dan buat tugas pekerjaan untuk anggota tim.

                    </p>

                </div>

                <!-- =================================================

                     FORM + GUIDE

                ================================================== -->

                <div class="top-grid">

                    <!-- FORM -->

                    <div class="card form-card">

                        <div class="card-title">

                            <i data-lucide="list-plus"></i>

                            <span>Detail Tugas Baru</span>

                        </div>

                        <form action="{{ route('pemilik.input-pekerjaan.store') }}" method="POST">

                            @csrf

                            <div class="form-grid">

                                <!-- ID TUGAS -->

                                <div class="form-group">

                                    <label class="form-label">

                                        ID Tugas

                                    </label>

                                    <input type="text" name="id_tugas" class="form-control"
                                        value="{{ old('id_tugas', $nextTaskCode) }}" placeholder="Contoh: TSK-2026-001"
                                        maxlength="30" required>
                                    @error('id_tugas')
                                        <small class="field-error">{{ $message }}</small>
                                    @enderror

                                </div>

                                <!-- NAMA TUGAS -->

                                <div class="form-group">

                                    <label class="form-label">

                                        Nama Tugas

                                    </label>

                                    <input type="text" name="nama_tugas" class="form-control"
                                        value="{{ old('nama_tugas') }}" placeholder="Masukkan nama tugas..."
                                        maxlength="150" required>
                                    @error('nama_tugas')
                                        <small class="field-error">{{ $message }}</small>
                                    @enderror

                                </div>

                                <!-- PEKERJA -->

                                <div class="form-group">

                                    <label class="form-label">

                                        Pilih Pekerja

                                    </label>

                                    <select name="pekerja" class="form-control" required>
                                        <option value="">Pilih Anggota Tim</option>
                                        @forelse ($workers as $worker)
                                            <option value="{{ $worker->id }}" {{ (string) old('pekerja') === (string) $worker->id ? 'selected' : '' }}>
                                                {{ $worker->name }}
                                            </option>
                                        @empty
                                            <option value="" disabled>Belum ada akun pekerja</option>
                                        @endforelse
                                    </select>
                                    @error('pekerja')
                                        <small class="field-error">{{ $message }}</small>
                                    @enderror

                                </div>

                                <!-- LOKASI -->

                                <div class="form-group">

                                    <label class="form-label">

                                        Lokasi Blok

                                    </label>

                                    <div class="input-icon">

                                        <i data-lucide="map-pin"></i>

                                        <input type="text" name="lokasi" class="form-control"
                                            value="{{ old('lokasi') }}" placeholder="Contoh: Blok B-12" maxlength="150"
                                            required>
                                        @error('lokasi')
                                            <small class="field-error">{{ $message }}</small>
                                        @enderror

                                    </div>

                                </div>

                                <!-- TANGGAL MULAI -->

                                <div class="form-group">

                                    <label class="form-label">

                                        Tanggal Mulai

                                    </label>

                                    <input type="date" name="tanggal_mulai" class="form-control"
                                        value="{{ old('tanggal_mulai') }}" required>
                                    @error('tanggal_mulai')
                                        <small class="field-error">{{ $message }}</small>
                                    @enderror

                                </div>

                                <!-- DEADLINE -->

                                <div class="form-group">

                                    <label class="form-label">

                                        Deadline

                                    </label>

                                    <input type="date" name="deadline" class="form-control"
                                        value="{{ old('deadline') }}" required>
                                    @error('deadline')
                                        <small class="field-error">{{ $message }}</small>
                                    @enderror

                                </div>

                                <!-- DESKRIPSI -->

                                <div class="form-group full">

                                    <label class="form-label">

                                        Deskripsi Tugas

                                    </label>

                                    <textarea name="deskripsi" class="form-control"
                                        placeholder="Jelaskan detail instruksi pekerjaan di sini...">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <small class="field-error">{{ $message }}</small>
                                    @enderror

                                </div>

                            </div>

                            <!-- BUTTON -->

                            <div class="form-actions">

                                <button type="submit" class="btn btn-primary">

                                    <i data-lucide="save"></i>

                                    <span>

                                        Simpan<br>

                                        Tugas

                                    </span>

                                </button>

                                <button type="reset" class="btn btn-secondary">

                                    <i data-lucide="rotate-ccw"></i>

                                    <span>Reset</span>

                                </button>

                            </div>

                        </form>

                    </div>

                    <!-- GUIDE -->

                    <div class="guide-card">

                        <div class="guide-title">

                            Panduan Kerja

                        </div>

                        <div class="guide-text">

                            Pastikan setiap blok lokasi

                            sesuai dengan peta pemeliharaan

                            bulanan untuk menjaga efisiensi

                            panen.

                        </div>

                        <ul class="guide-list">

                            <li>

                                <i data-lucide="circle-check"></i>

                                <span>

                                    Verifikasi stok pupuk

                                    sebelum menugaskan.

                                </span>

                            </li>

                            <li>

                                <i data-lucide="circle-check"></i>

                                <span>

                                    Tentukan deadline

                                    maksimal 3 hari kerja.

                                </span>

                            </li>

                        </ul>

                    </div>

                </div>

                <!-- =================================================

                     TABLE

                ================================================== -->

                <div class="card table-card">

                    <!-- TABLE HEADER -->

                    <div class="table-header">

                        <div class="table-title">

                            <h2>

                                Daftar Pekerjaan Terbaru

                            </h2>

                            <p>

                                Menampilkan 10 tugas terakhir yang dibuat.

                            </p>

                        </div>

                        <div class="table-tools">

                            <button type="button" class="table-btn">

                                <i data-lucide="list-filter"></i>

                                <span>Filter</span>

                            </button>

                            <button type="button" class="table-btn" onclick="exportTasksCsv()">

                                <i data-lucide="download"></i>

                                <span>Export</span>

                            </button>

                        </div>

                    </div>

                    <!-- TABLE -->

                    <div class="table-wrapper">

                        <table id="tasksTable">

                            <thead>

                                <tr>

                                    <th>

                                        ID TUGAS

                                    </th>

                                    <th>

                                        TUGAS & PEKERJA

                                    </th>

                                    <th>

                                        LOKASI

                                    </th>

                                    <th>

                                        DEADLINE

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
                                @forelse ($tasks as $task)
                                    @php
                                        $isLate = $task->status !== 'Selesai' && $task->deadline->lt(today());
                                        $statusLabel = $isLate ? 'Terlambat' : $task->status;
                                        $statusClass = $isLate
                                            ? 'status-late'
                                            : match ($task->status) {
                                                'Selesai' => 'status-done',
                                                'Sedang Jalan' => 'status-progress',
                                                default => 'status-pending',
                                            };
                                    @endphp
                                    <tr data-task-row="true">
                                        <td>
                                            <div class="task-id">{{ $task->task_code }}</div>
                                        </td>
                                        <td>
                                            <div class="task-name">{{ $task->name }}</div>
                                            <div class="worker">Pekerja:
                                                {{ $task->worker->name ?? 'Akun pekerja tidak tersedia' }}</div>
                                        </td>
                                        <td>
                                            <div class="location">
                                                <i data-lucide="map-pin"></i>
                                                <span>{{ $task->location }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $task->deadline->format('d M Y') }}</td>
                                        <td><span class="status {{ $statusClass }}">{{ $statusLabel }}</span></td>
                                        <td>
                                            <div class="action-group">
                                                <button type="button" class="action-btn" title="Edit tugas"
                                                    data-id="{{ $task->id }}" data-code="{{ $task->task_code }}"
                                                    data-name="{{ $task->name }}" data-worker="{{ $task->worker_id }}"
                                                    data-location="{{ $task->location }}"
                                                    data-start-date="{{ $task->start_date->format('Y-m-d') }}"
                                                    data-deadline="{{ $task->deadline->format('Y-m-d') }}"
                                                    data-description="{{ $task->description ?? '' }}"
                                                    data-status="{{ $task->status }}" onclick="openEditTaskModal(this)">
                                                    <i data-lucide="pencil"></i>
                                                </button>
                                                <form action="{{ route('pemilik.input-pekerjaan.destroy', $task) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus tugas {{ $task->task_code }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn danger" title="Hapus tugas">
                                                        <i data-lucide="trash-2"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" style="text-align:center; padding:24px 14px; color:#777;">
                                            Belum ada pekerjaan tersimpan di database.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>

                    </div>

                    <!-- TABLE FOOTER -->

                    <div class="table-footer">

                        <div class="table-info">
                            Menampilkan {{ $tasks->firstItem() ?? 0 }}-{{ $tasks->lastItem() ?? 0 }} dari
                            {{ $tasks->total() }} tugas
                        </div>

                        <div class="pagination">
                            @if ($tasks->onFirstPage())
                                <span class="page-btn disabled" aria-disabled="true"><i
                                        data-lucide="chevron-left"></i></span>
                            @else
                                <a class="page-btn" href="{{ $tasks->previousPageUrl() }}"
                                    aria-label="Halaman sebelumnya"><i data-lucide="chevron-left"></i></a>
                            @endif

                            @if ($tasks->lastPage() > 1)
                                @php
                                    $startPage = max(1, $tasks->currentPage() - 1);
                                    $endPage = min($tasks->lastPage(), $tasks->currentPage() + 1);
                                @endphp
                                @for ($page = $startPage; $page <= $endPage; $page++)
                                    <a class="page-btn {{ $tasks->currentPage() === $page ? 'active' : '' }}"
                                        href="{{ $tasks->url($page) }}">{{ $page }}</a>
                                @endfor
                            @else
                                <span class="page-btn active">1</span>
                            @endif

                            @if ($tasks->hasMorePages())
                                <a class="page-btn" href="{{ $tasks->nextPageUrl() }}" aria-label="Halaman berikutnya"><i
                                        data-lucide="chevron-right"></i></a>
                            @else
                                <span class="page-btn disabled" aria-disabled="true"><i
                                        data-lucide="chevron-right"></i></span>
                            @endif
                        </div>

                    </div>

                </div>


                <!-- MODAL EDIT TUGAS -->
                <div class="modal-overlay" id="editTaskModal" aria-hidden="true"
                    onclick="closeEditTaskModalOnBackdrop(event)">
                    <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="editTaskTitle">
                        <div class="modal-head">
                            <h2 id="editTaskTitle">Edit Data Pekerjaan</h2>
                            <button type="button" class="modal-close" aria-label="Tutup"
                                onclick="closeEditTaskModal()">&times;</button>
                        </div>
                        <form id="editTaskForm" action="#" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-grid">
                                <div class="form-group">
                                    <label class="form-label" for="edit_task_code">ID Tugas</label>
                                    <input class="form-control" id="edit_task_code" name="id_tugas" maxlength="30"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="edit_task_name">Nama Tugas</label>
                                    <input class="form-control" id="edit_task_name" name="nama_tugas" maxlength="150"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="edit_task_worker">Pilih Pekerja</label>
                                    <select class="form-control" id="edit_task_worker" name="pekerja" required>
                                        <option value="">Pilih Anggota Tim</option>
                                        @foreach ($workers as $worker)
                                            <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="edit_task_location">Lokasi Blok</label>
                                    <input class="form-control" id="edit_task_location" name="lokasi" maxlength="150"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="edit_task_start">Tanggal Mulai</label>
                                    <input class="form-control" id="edit_task_start" type="date" name="tanggal_mulai"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="edit_task_deadline">Deadline</label>
                                    <input class="form-control" id="edit_task_deadline" type="date" name="deadline"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="edit_task_status">Status</label>
                                    <select class="form-control" id="edit_task_status" name="status" required>
                                        <option value="Belum Dimulai">Belum Dimulai</option>
                                        <option value="Sedang Jalan">Sedang Jalan</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </div>
                                <div class="form-group full">
                                    <label class="form-label" for="edit_task_description">Deskripsi Tugas</label>
                                    <textarea class="form-control" id="edit_task_description" name="deskripsi"
                                        maxlength="5000"></textarea>
                                </div>
                            </div>
                            <div class="modal-actions">
                                <button type="button" class="btn btn-secondary"
                                    onclick="closeEditTaskModal()">Batal</button>
                                <button type="submit" class="btn btn-primary" style="width:auto;">Simpan
                                    Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </section>

        </main>

    </div>

    <script>
        function searchTasks() {
            const input = document.getElementById('taskSearch');
            const filter = input.value.toLowerCase().trim();
            const rows = document.querySelectorAll('#tasksTable tbody tr[data-task-row="true"]');
            rows.forEach((row) => {
                row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
            });
        }

        function openEditTaskModal(button) {
            const modal = document.getElementById('editTaskModal');
            const form = document.getElementById('editTaskForm');
            form.action = `{{ url('/dashboard/pemilik/input-pekerjaan') }}/${button.dataset.id}`;

            document.getElementById('edit_task_code').value = button.dataset.code || '';
            document.getElementById('edit_task_name').value = button.dataset.name || '';
            document.getElementById('edit_task_worker').value = button.dataset.worker || '';
            document.getElementById('edit_task_location').value = button.dataset.location || '';
            document.getElementById('edit_task_start').value = button.dataset.startDate || '';
            document.getElementById('edit_task_deadline').value = button.dataset.deadline || '';
            document.getElementById('edit_task_description').value = button.dataset.description || '';
            document.getElementById('edit_task_status').value = button.dataset.status || 'Belum Dimulai';

            modal.classList.add('open');
            modal.setAttribute('aria-hidden', 'false');
        }

        function closeEditTaskModal() {
            const modal = document.getElementById('editTaskModal');
            modal.classList.remove('open');
            modal.setAttribute('aria-hidden', 'true');
        }

        function closeEditTaskModalOnBackdrop(event) {
            if (event.target.id === 'editTaskModal') closeEditTaskModal();
        }

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') closeEditTaskModal();
        });

        function exportTasksCsv() {
            const table = document.getElementById('tasksTable');
            const rows = Array.from(table.querySelectorAll('tbody tr[data-task-row="true"]'));
            const csvRows = [['ID TUGAS', 'TUGAS', 'PEKERJA', 'LOKASI', 'DEADLINE', 'STATUS']];
            rows.forEach((row) => {
                if (row.style.display === 'none') return;
                const cells = Array.from(row.querySelectorAll('td'));
                const values = [
                    cells[0]?.innerText,
                    cells[1]?.querySelector('.task-name')?.innerText,
                    cells[1]?.querySelector('.worker')?.innerText,
                    cells[2]?.innerText,
                    cells[3]?.innerText,
                    cells[4]?.innerText
                ].map((value) => String(value || '').replace(/\s+/g, ' ').trim());
                csvRows.push(values);
            });
            const csv = csvRows.map((row) => row.map((value) => {
                const escaped = String(value).replace(/"/g, '""');
                return '"' + escaped + '"';
            }).join(',')).join('\r\n');
            const blob = new Blob(['\ufeff' + csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'daftar-pekerjaan.csv';
            link.click();
            URL.revokeObjectURL(url);
        }

        lucide.createIcons();
    </script>

</body>

</html>