<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Perawatan - Sihombing Group</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>

    <style>

        :root {

            --green: #086b22;

            --green-dark: #096a24;

            --green-soft: #8cf083;

            --line: #d4ddd4;

            --text: #252a26;

            --muted: #505950;

            --page: #f8f9f8;

        }

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

            color: var(--text);

            background: var(--page);

            font-size: 12px;

        }

        button,

        input,

        select,

        textarea {

            font: inherit;

        }

        .topbar {

            position: fixed;

            z-index: 10;

            top: 0;

            left: 195px;

            right: 0;

            height: 70px;

            display: flex;

            align-items: center;

            padding: 0 14px;

            gap: 39px;

            background: #fafbfa;

            border-bottom: 1px solid #d9ded9;

        }

        .brand {

            color: var(--green);

            font-size: 11px;

            font-weight: 700;

            white-space: nowrap;

        }

        .top-nav {

            display: flex;

            align-items: center;

            height: 100%;

            gap: 29px;

        }

        .top-nav a {

            height: 100%;

            display: flex;

            align-items: center;

            position: relative;

            color: #374139;

            text-decoration: none;

            font-size: 11px;

            white-space: nowrap;

        }

        .top-nav a.active {

            color: var(--green);

            font-weight: 700;

        }

        .top-nav a.active::after {

            content: "";

            position: absolute;

            bottom: 9px;

            left: 0;

            right: 0;

            height: 2px;

            background: #17732c;

        }

        .topbar-right {

            margin-left: auto;

            display: flex;

            align-items: center;

            gap: 19px;

        }

        .search-box {

            width: 158px;

            height: 23px;

            border: 1px solid #cfd7cf;

            border-radius: 14px;

            display: flex;

            align-items: center;

            gap: 6px;

            padding: 0 7px;

            background: #f7f8f7;

        }

        .search-box svg {

            width: 12px;

            height: 12px;

            color: #424a43;

        }

        .search-box input {

            width: 100%;

            min-width: 0;

            border: 0;

            outline: 0;

            background: transparent;

            font-size: 9px;

        }

        .search-box input::placeholder {

            color: #7c837d;

        }

        .top-icon {

            width: 15px;

            height: 15px;

            color: #313a33;

            stroke-width: 1.8;

        }

        .profile-circle {

            width: 22px;

            height: 22px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #17221a;

            color: white;

            border: 2px solid #d9ded9;

        }

        .profile-circle svg {

            width: 12px;

            height: 12px;

        }

        /* SIDEBAR — menggunakan aturan yang sama dengan Kelola Jadwal */
        .sidebar {
            flex: 0 0 195px;
            width: 195px;
            min-width: 195px;
            height: 100vh;
            position: sticky;
            top: 0;
            background: #fff;
            border-right: 1px solid #d9ded9;
            display: flex;
            flex-direction: column;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar .brand {
            height: 83px;
            padding: 25px 22px 0;
            flex-shrink: 0;
            color: #086b22;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .sidebar .brand-name {
            color: #086b22;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: 700;
            line-height: normal;
            margin-bottom: 2px;
        }

        .sidebar .brand-subtitle {
            color: #666;
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            font-weight: 400;
            line-height: normal;
        }

        .sidebar nav.menu {
            padding: 0 10px;
            margin-top: 0;
            flex: 0 0 auto;
        }

        .sidebar .menu-item {
            min-height: 40px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 15px;
            margin-bottom: 5px;
            color: #525852;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-size: 11.5px;
            font-weight: 400;
            line-height: 1.35;
            border-radius: 0 22px 22px 0;
            transition: .2s;
        }

        .sidebar .menu-item svg {
            width: 16px;
            height: 16px;
            min-width: 16px;
            stroke-width: 1.8;
            flex-shrink: 0;
        }

        .sidebar .menu-item span {
            min-width: 0;
        }

        .sidebar .menu-item:hover {
            background: #eaf8e9;
            color: #08751b;
        }

        .sidebar .menu-item.active {
            background: #8cf083;
            color: #086b22;
            border-left: 3px solid #08751b;
            padding-left: 12px;
        }

        .sidebar .menu-item.active svg {
            color: #086b22;
        }

        .sidebar .menu-item a {
            text-decoration: none;
        }

        .sidebar .sidebar-bottom {
            margin-top: auto;
            padding: 0 10px 16px;
            flex-shrink: 0;
        }

        .sidebar .sidebar-divider {
            height: 1px;
            background: #d9ddd9;
            margin: 0 6px 18px;
        }

        .sidebar .support,
        .sidebar .logout {
            height: 40px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 15px;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-size: 11.5px;
            font-weight: 400;
            border-radius: 5px;
        }

        .sidebar .support {
            color: #555;
            margin-bottom: 4px;
        }

        .sidebar .logout {
            color: #e32929;
        }

        .sidebar .support svg,
        .sidebar .logout svg {
            width: 16px;
            height: 16px;
            min-width: 16px;
        }

        .main {

            margin-left: 195px;

            padding-top: 70px;

            min-height: 100vh;

        }

        .content {

            padding: 18px 20px 30px 20px;

        }

        .page-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 12px;

            margin-bottom: 17px;

        }

        .page-title {

            font-size: 22px;

            line-height: 1.15;

            font-weight: 600;

            letter-spacing: -0.6px;

        }

        .page-status {

            display: flex;

            align-items: center;

            gap: 6px;

        }

        .status-badge {

            height: 17px;

            padding: 0 9px;

            border-radius: 12px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            font-size: 8px;

            white-space: nowrap;

        }

        .status-active {

            background: #8cf083;

            color: #176526;

        }

        .status-updated {

            background: #367b3f;

            color: white;

        }

        .maintenance-grid {

            display: grid;

            grid-template-columns: minmax(320px, 360px) minmax(0, 1fr);

            gap: 18px;

            align-items: start;

        }

        .card {

            background: #fff;

            border: 1px solid #cbd5cc;

            border-radius: 9px;

            overflow: hidden;

            box-shadow: 0 2px 4px rgba(20, 40, 20, .035);

        }

        .form-card {

            padding: 17px 16px 27px;

        }

        .card-title {

            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 13px;

            font-weight: 600;

            color: #222824;

            padding-bottom: 12px;

            border-bottom: 1px solid #d6ddd6;

            margin-bottom: 16px;

        }

        .card-title svg {

            width: 15px;

            height: 15px;

            color: #188036;

            stroke-width: 2.2;

        }

        .form-row {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 11px;

        }

        .form-group {

            margin-bottom: 11px;

            min-width: 0;

        }

        .form-label {

            display: block;

            font-size: 9.5px;

            color: #39423b;

            margin-bottom: 4px;

        }

        .form-control {

            display: block;

            width: 100%;

            height: 29px;

            border: 1px solid #cbd4cb;

            border-radius: 6px;

            background: white;

            outline: none;

            padding: 0 10px;

            color: #343b35;

            font-size: 10px;

        }

        .form-control::placeholder {

            color: #778079;

        }

        .form-control:focus {

            border-color: #23853b;

            box-shadow: 0 0 0 2px rgba(35, 133, 59, .08);

        }

        .form-control[readonly] {

            background: #f1f3f1;

            color: #4c554d;

        }

        select.form-control {

            cursor: pointer;

            padding-right: 4px;

        }

        textarea.form-control {

            height: 61px;

            resize: none;

            padding: 8px 10px;

            line-height: 1.45;

        }

        .form-actions {

            display: flex;

            align-items: center;

            gap: 9px;

            margin-top: 20px;

        }

        .btn {

            height: 28px;

            border-radius: 8px;

            padding: 0 13px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 6px;

            font-size: 9px;

            cursor: pointer;

            transition: .2s;

        }

        .btn svg {

            width: 12px;

            height: 12px;

        }

        .btn-save {

            min-width: 82px;

            background: #087126;

            color: #fff;

            border: 1px solid #087126;

            box-shadow: 0 2px 3px #00000012;

        }

        .btn-save:hover {

            background: #075e20;

        }

        .btn-edit {

            min-width: 68px;

            background: #fff;

            color: #086d24;

            border: 1px solid #087126;

        }

        .btn-edit:hover {

            background: #f0faf1;

        }

        .delete-row {

            display: flex;

            justify-content: flex-end;

            margin-top: 5px;

        }

        .btn-delete {

            min-width: 77px;

            background: #fff;

            color: #e32626;

            border: 1px solid #f0d8d8;

        }

        .history-card {

            min-width: 0;

        }

        .history-header {

            height: 52px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 16px;

            border-bottom: 1px solid #d5ddd5;

        }

        .history-title {

            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 13px;

            font-weight: 600;

        }

        .history-title svg {

            width: 15px;

            height: 15px;

            color: #188036;

            stroke-width: 2.2;

        }

        .filter-icon {

            width: 14px;

            height: 14px;

            color: #4d574e;

        }

        .table-wrapper {

            width: 100%;

            overflow-x: auto;

        }

        .history-table {

            width: 100%;

            border-collapse: collapse;

            table-layout: fixed;

        }

        .history-table thead {

            background: #f0f2f0;

        }

        .history-table th {

            height: 43px;

            padding: 0 8px;

            text-align: left;

            font-size: 8px;

            font-weight: 500;

            letter-spacing: .2px;

            color: #4b554c;

            border-bottom: 1px solid #d5ddd5;

        }

        .history-table td {

            height: 49px;

            padding: 7px 8px;

            font-size: 10px;

            line-height: 1.35;

            color: #29302a;

            border-bottom: 1px solid #d5ddd5;

            overflow-wrap: anywhere;

        }

        .history-table tbody tr:last-child td {

            border-bottom: 0;

        }

        .history-table th:nth-child(1),

        .history-table td:nth-child(1) {

            width: 12%;

            padding-left: 30px;

        }

        .history-table th:nth-child(2),

        .history-table td:nth-child(2) {

            width: 15%;

        }

        .history-table th:nth-child(3),

        .history-table td:nth-child(3) {

            width: 18%;

        }

        .history-table th:nth-child(4),

        .history-table td:nth-child(4) {

            width: 16%;

        }

        .history-table th:nth-child(5),

        .history-table td:nth-child(5) {

            width: 17%;

        }

        .history-table th:nth-child(6),

        .history-table td:nth-child(6) {

            width: 22%;

        }

        .tree-name {

            color: #087126 !important;

            font-weight: 700 !important;

        }

        .type-badge {

            display: inline-block;

            border-radius: 12px;

            padding: 4px 7px;

            font-size: 8px;

            line-height: 1.15;

            text-align: center;

        }

        .fertilizer {

            background: #8cf083;

            color: #126323;

        }

        .pruning {

            background: #397e43;

            color: white;

        }

        .pest {

            background: #ffdada;

            color: #b90000;

        }

        .sanitation {

            background: #8cf083;

            color: #126323;

        }

        .history-footer {

            min-height: 42px;

            height: auto;

            border-top: 1px solid #d5ddd5;

            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 4px;

            padding: 0 11px;

            background: #fbfcfb;

        }

        .page-button {

            width: 12px;

            height: 13px;

            border: 1px solid #cbd3cb;

            border-radius: 3px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            color: #4b554c;

            background: #fff;

        }

        .page-button svg {

            width: 9px;

            height: 9px;

        }

        @media (min-width: 1200px) {

            .maintenance-grid {

                grid-template-columns: 360px minmax(0, 1fr);

            }

            .content {

                padding-right: 14px;

            }

        }

        @media (max-width: 850px) {

            .topbar {

                gap: 22px;

            }

            .top-nav {

                gap: 18px;

            }

            .maintenance-grid {

                grid-template-columns: minmax(250px, 1fr);

            }

            .history-table {

                min-width: 520px;

            }

            .page-header {

                align-items: flex-start;

            }

        }

        @media (max-width: 800px) {

            .sidebar {

                width: 180px;

                min-width: 180px;

            }

            .topbar {

                left: 180px;

            }

            .main {

                margin-left: 180px;

            }

            .topbar-right {

                gap: 10px;

            }

            .search-box {

                width: 170px;

            }

        }

        @media (max-width: 650px) {

            .sidebar {

                width: 170px;

                min-width: 170px;

            }

            .topbar {

                left: 170px;

                padding: 0 12px;

            }

            .main {

                margin-left: 170px;

            }

            .top-nav {

                gap: 13px;

            }

            .top-nav a {

                font-size: 10px;

            }

            .top-nav a:nth-child(3) {

                display: none;

            }

            .topbar-right {

                gap: 8px;

            }

            .search-box {

                width: 100px;

            }

            .content {

                padding: 16px 10px;

            }

            .page-header {

                flex-direction: column;

            }

            .page-title {

                font-size: 21px;

            }

            .form-row {

                grid-template-columns: 1fr 1fr;

            }

        }

        .alert {

            padding: 11px 14px;

            border-radius: 7px;

            margin-bottom: 14px;

            font-size: 11px;

        }

        .alert-success {

            color: #176526;

            background: #e8f8e8;

            border: 1px solid #b7e5b7;

        }

        .alert-error {

            color: #9f2020;

            background: #fff0f0;

            border: 1px solid #f0c4c4;

        }

        .alert-error ul {

            padding-left: 18px;

            margin: 4px 0 0;

        }

        .history-table tbody tr {

            cursor: pointer;

        }

        .history-table tbody tr:hover {

            background: #f4faf4;

        }

        .history-table tbody tr.selected {

            background: #e8f8e8;

            outline: 1px solid #8dd594;

        }

        .table-actions {

            display: flex;

            align-items: center;

            gap: 8px;

        }

        .table-action {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            width: 22px;

            height: 22px;

            background: transparent;

            border: 0;

            cursor: pointer;

            color: #4d574e;

            border-radius: 4px;

        }

        .table-action:hover {

            background: #e9f7e9;

            color: #087126;

        }

        .table-action.delete {

            color: #e32626;

        }

        .table-action svg {

            width: 14px;

            height: 14px;

        }

        .form-help {

            display: block;

            margin-top: 4px;

            color: #6a746b;

            font-size: 9px;

        }

        .empty-row {

            text-align: center;

            color: #6a746b !important;

            padding: 24px 10px !important;

        }

        .history-summary {

            margin-right: auto;

            font-size: 9px;

            color: #626862;

        }

        .page-button {

            min-width: 22px;

            height: 22px;

            text-decoration: none;

        }

        .page-button.disabled {

            opacity: .4;

            pointer-events: none;

        }

        @media (max-width: 1100px) {

            .maintenance-grid {

                grid-template-columns: minmax(300px, 360px) minmax(0, 1fr);

            }

        }

        /* Sidebar tetap 195px pada ukuran tablet lebar, seperti Kelola Jadwal */
        @media (min-width: 721px) and (max-width: 800px) {
            .sidebar {
                width: 195px;
                min-width: 195px;
                flex-basis: 195px;
            }
            .topbar { left: 195px; }
            .main { margin-left: 195px; }
        }

        /* Breakpoint sidebar mengikuti Kelola Jadwal */
        @media (max-width: 720px) {
            .sidebar {
                width: 65px;
                min-width: 65px;
                flex-basis: 65px;
            }
            .sidebar .brand {
                height: 90px;
                padding: 20px 0;
                text-align: center;
            }
            .sidebar .brand-name {
                font-size: 9px;
                overflow: hidden;
            }
            .sidebar .brand-subtitle,
            .sidebar .menu-item span,
            .sidebar .support span,
            .sidebar .logout span {
                display: none;
            }
            .sidebar .menu-item,
            .sidebar .support,
            .sidebar .logout {
                justify-content: center;
                padding: 0;
                border-radius: 8px;
            }
            .sidebar .menu-item.active {
                padding-left: 0;
            }
            .topbar {
                left: 65px;
            }
            .main {
                margin-left: 65px;
            }
        }

        /* ================================================
           FIX LAYOUT: halaman tidak ikut bergeser/scroll
           Sidebar dan topbar tetap, konten pas di viewport
        ================================================ */
        html,
        body {
            width: 100%;
            height: 100%;
            min-height: 0;
            margin: 0;
            overflow: hidden !important;
        }

        body {
            position: relative;
        }

        .sidebar {
            position: fixed !important;
            top: 0;
            left: 0;
            z-index: 20;
            width: 195px;
            min-width: 195px;
            height: 100vh;
            max-height: 100vh;
            overflow: hidden;
        }

        .topbar {
            position: fixed !important;
            top: 0;
            left: 195px;
            right: 0;
            height: 70px;
            z-index: 10;
        }

        .main {
            display: flex;
            flex-direction: column;
            margin-left: 195px !important;
            padding-top: 70px !important;
            width: calc(100% - 195px);
            height: 100vh;
            min-height: 0 !important;
            max-height: 100vh;
            overflow: hidden !important;
        }

        .content {
            flex: 1 1 auto;
            width: 100%;
            min-height: 0;
            height: auto;
            overflow: hidden !important;
        }

        @media (min-width: 721px) and (max-width: 800px) {
            .sidebar {
                width: 195px;
                min-width: 195px;
            }

            .topbar {
                left: 195px;
            }

            .main {
                margin-left: 195px !important;
                width: calc(100% - 195px);
            }
        }

        @media (max-width: 720px) {
            .sidebar {
                width: 65px;
                min-width: 65px;
            }

            .topbar {
                left: 65px;
            }

            .main {
                margin-left: 65px !important;
                width: calc(100% - 65px);
            }
        }

    </style>

    <link rel="stylesheet" href="{{ asset('css/staff-background.css') }}">

</head>

<body>

    <header class="topbar">

        <div class="brand">Sihombing Group</div>

        <nav class="top-nav">

            <a href="{{ route('pemilik.dashboard') }}">Overview</a>

            <a href="{{ route('pemilik.perawatan') }}" class="active">Maintenance</a>

            <a href="{{ route('pemilik.input-pekerjaan') }}">Field Ops</a>

        </nav>

        <div class="topbar-right">

            <label class="search-box">

                <i data-lucide="search"></i>

                <input type="search" id="maintenance-search" placeholder="Search data..."

                    aria-label="Cari riwayat perawatan">

            </label>

            <i data-lucide="bell" class="top-icon"></i>

            <i data-lucide="settings" class="top-icon"></i>

            <div class="profile-circle"><i data-lucide="user-round"></i></div>

        </div>

    </header>

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-name">Sihombing Group</div>
            <div class="brand-subtitle">Kelola Perawatan</div>
        </div>

        <nav class="menu">
            @if (auth()->check() && auth()->user()->role === 'staf')
                <a href="{{ route('pemilik.dashboard') }}" class="menu-item {{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}">
                    <i data-lucide="grid-2x2"></i><span>Dashboard</span>
                </a>
                <a href="{{ route('pemilik.pohon-lokasi') }}" class="menu-item {{ request()->routeIs('pemilik.pohon-lokasi') ? 'active' : '' }}">
                    <i data-lucide="map"></i><span>Data Pohon &amp; Lokasi</span>
                </a>
                <a href="{{ route('pemilik.input-pekerjaan') }}" class="menu-item {{ request()->routeIs('pemilik.input-pekerjaan') ? 'active' : '' }}">
                    <i data-lucide="tractor"></i><span>Input Pekerjaan</span>
                </a>
                <a href="{{ route('pemilik.perawatan') }}" class="menu-item {{ request()->routeIs('pemilik.perawatan') ? 'active' : '' }}">
                    <i data-lucide="archive"></i><span>Kelola Perawatan</span>
                </a>
                <a href="{{ route('pemilik.jadwal') }}" class="menu-item {{ request()->routeIs('pemilik.jadwal') ? 'active' : '' }}">
                    <i data-lucide="calendar-days"></i><span>Kelola Jadwal</span>
                </a>
                <a href="{{ route('pemilik.verifikasi-laporan') }}" class="menu-item {{ request()->routeIs('pemilik.verifikasi-laporan*') ? 'active' : '' }}">
                    <i data-lucide="clipboard-check"></i><span>Verifikasi Laporan</span>
                </a>
                <a href="{{ route('staf.penjualan') }}" class="menu-item {{ request()->routeIs('staf.penjualan*') ? 'active' : '' }}">
                    <i data-lucide="chart-no-axes-combined"></i><span>Laporan Penjualan</span>
                </a>
                <a href="{{ route('staf.hasil-penjualan') }}" class="menu-item {{ request()->routeIs('staf.hasil-penjualan') ? 'active' : '' }}">
                    <i data-lucide="factory"></i><span>Hasil Penjualan ke Pabrik</span>
                </a>
            @elseif (auth()->check() && auth()->user()->role === 'pemilik')
                <a href="{{ route('pemilik.keuangan') }}" class="menu-item {{ request()->routeIs('pemilik.keuangan') ? 'active' : '' }}">
                    <i data-lucide="chart-no-axes-combined"></i><span>Laporan Penjualan</span>
                </a>
            @endif
        </nav>

        <div class="sidebar-bottom">
            <div class="sidebar-divider"></div>
            <a href="#" class="support" onclick="alert('Silakan hubungi administrator untuk bantuan.'); return false;">
                <i data-lucide="circle-help"></i><span>Support</span>
            </a>
            <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i data-lucide="log-out"></i><span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </div>
    </aside>

    <main class="main">

        <section class="content">

            <div class="page-header">

                <h1 class="page-title">Kelola Perawatan</h1>

                <div class="page-status">

                    <span class="status-badge status-active">{{ $trees->count() }} Pohon Terdaftar</span>

                    <span class="status-badge status-updated">{{ $lastUpdatedLabel }}</span>

                </div>

            </div>

            @if (session('success'))

                <div class="alert alert-success" role="status">{{ session('success') }}</div>

            @endif

            @if ($errors->any())

                <div class="alert alert-error" role="alert">

                    <strong>Data belum bisa disimpan.</strong>

                    <ul>@foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>@endforeach

                    </ul>

                </div>

            @endif

            <div class="maintenance-grid">

                <section class="card form-card">

                    <h2 class="card-title"><i data-lucide="list-checks"></i><span>Form Perawatan</span></h2>

                    <form id="maintenance-form" method="POST" action="{{ route('pemilik.perawatan.store') }}"

                        data-store-url="{{ route('pemilik.perawatan.store') }}"

                        data-update-base="{{ url('/dashboard/pemilik/kelola-perawatan') }}">

                        @csrf

                        <input type="hidden" id="http-method">

                        <input type="hidden" id="selected-maintenance-id">

                        <div class="form-row">

                            <div class="form-group">

                                <label class="form-label" for="maintenance-code">ID Perawatan</label>

                                <input class="form-control" id="maintenance-code" name="maintenance_code" type="text"

                                    value="{{ old('maintenance_code', $nextMaintenanceCode) }}" readonly required>

                            </div>

                            <div class="form-group">

                                <label class="form-label" for="maintenance-date">Tanggal Perawatan</label>

                                <input class="form-control" id="maintenance-date" name="maintenance_date" type="date"

                                    value="{{ old('maintenance_date') }}" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="form-label" for="maintenance-type">Jenis Perawatan</label>

                            <select class="form-control" id="maintenance-type" name="maintenance_type" required>

                                <option value="">Pilih jenis perawatan</option>

                                @foreach (['Pemupukan NPK', 'Pruning', 'Pest Control', 'Sanitation'] as $type)

                                    <option value="{{ $type }}" @selected(old('maintenance_type') === $type)>{{ $type }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="form-row">

                            <div class="form-group">

                                <label class="form-label" for="tree-id">Pilih Pohon</label>

                                <select class="form-control" id="tree-id" name="tree_id" required>

                                    <option value="">Pilih pohon</option>

                                    @foreach ($trees as $tree)

                                        <option value="{{ $tree->id }}" @selected((string) old('tree_id') === (string) $tree->id)>

                                            {{ $tree->tree_code }}{{ $tree->block ? ' — ' . $tree->block->name : '' }}

                                        </option>

                                    @endforeach

                                </select>

                                @if ($trees->isEmpty()) <small class="form-help">Belum ada data pohon. Tambahkan

                                terlebih dahulu di Data Pohon &amp; Lokasi.</small> @endif

                            </div>

                            <div class="form-group">

                                <label class="form-label" for="worker-id">Pilih Pekerja</label>

                                <select class="form-control" id="worker-id" name="worker_id" required>

                                    <option value="">Pilih pekerja</option>

                                    @foreach ($workers as $worker)

                                        <option value="{{ $worker->id }}" @selected((string) old('worker_id') === (string) $worker->id)>{{ $worker->name }}</option>

                                    @endforeach

                                </select>

                                @if ($workers->isEmpty()) <small class="form-help">Belum ada akun dengan role pekerja di

                                tabel users.</small> @endif

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="form-label" for="maintenance-notes">Keterangan</label>

                            <textarea class="form-control" id="maintenance-notes" name="notes" maxlength="3000"

                                placeholder="Tambahkan catatan perawatan detail di sini...">{{ old('notes') }}</textarea>

                        </div>

                        <div class="form-actions">

                            <button type="submit" class="btn btn-save" id="save-button"><i data-lucide="save"></i><span

                                    id="save-label">Simpan</span></button>

                            <button type="button" class="btn btn-edit" id="edit-button"><i

                                    data-lucide="pencil"></i>Edit</button>

                        </div>

                        <div class="delete-row">

                            <button type="button" class="btn btn-delete" id="delete-button"><i

                                    data-lucide="trash-2"></i>Hapus</button>

                        </div>

                    </form>

                    <form id="delete-form" method="POST" action="" style="display:none;">

                        @csrf

                        @method('DELETE')

                    </form>

                </section>

                <section class="card history-card">

                    <div class="history-header">

                        <h2 class="history-title"><i data-lucide="history"></i><span>History Perawatan</span></h2>

                        <i data-lucide="list-filter" class="filter-icon" title="Gunakan pencarian di bagian atas"></i>

                    </div>

                    <div class="table-wrapper">

                        <table class="history-table" id="maintenance-table">

                            <thead>

                                <tr>

                                    <th>ID</th>

                                    <th>POHON</th>

                                    <th>JENIS</th>

                                    <th>TANGGAL</th>

                                    <th>PEKERJA</th>

                                    <th>AKSI</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($maintenances as $maintenance)

                                    @php

                                        $typeClass = match ($maintenance->maintenance_type) {

                                            'Pemupukan NPK' => 'fertilizer',

                                            'Pruning' => 'pruning',

                                            'Pest Control' => 'pest',

                                            default => 'sanitation',

                                        };

                                    @endphp

                                    <tr tabindex="0" role="button"

                                        aria-label="Pilih perawatan {{ $maintenance->maintenance_code }}"

                                        data-maintenance-id="{{ $maintenance->id }}"

                                        data-code="{{ $maintenance->maintenance_code }}"

                                        data-date="{{ $maintenance->maintenance_date->format('Y-m-d') }}"

                                        data-type="{{ $maintenance->maintenance_type }}"

                                        data-tree-id="{{ $maintenance->tree_id }}"

                                        data-worker-id="{{ $maintenance->worker_id }}"

                                        data-notes="{{ $maintenance->notes ?? '' }}" onclick="selectMaintenance(this)"

                                        onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();selectMaintenance(this);}">

                                        <td>{{ $maintenance->maintenance_code }}</td>

                                        <td class="tree-name">{{ $maintenance->tree->tree_code ?? 'Pohon dihapus' }}</td>

                                        <td><span

                                                class="type-badge {{ $typeClass }}">{{ $maintenance->maintenance_type }}</span>

                                        </td>

                                        <td>{{ $maintenance->maintenance_date->format('d M Y') }}</td>

                                        <td>{{ $maintenance->worker->name ?? 'Pekerja tidak tersedia' }}</td>

                                        <td>

                                            <div class="table-actions">

                                                <button type="button" class="table-action" title="Edit perawatan"

                                                    onclick="event.stopPropagation();selectMaintenance(this.closest('tr'));prepareEdit();"><i

                                                        data-lucide="pencil"></i></button>

                                                <button type="button" class="table-action delete" title="Hapus perawatan"

                                                    onclick="event.stopPropagation();selectMaintenance(this.closest('tr'));deleteSelectedMaintenance();"><i

                                                        data-lucide="trash-2"></i></button>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6" class="empty-row">Belum ada riwayat perawatan. Isi formulir di

                                            sebelah kiri untuk menambahkan data.</td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    <div class="history-footer">

                        <div class="history-summary">Menampilkan {{ $maintenances->count() }} dari

                            {{ $maintenances->total() }} data

                        </div>

                        @if ($maintenances->previousPageUrl())

                            <a class="page-button" href="{{ $maintenances->previousPageUrl() }}"

                                aria-label="Halaman sebelumnya"><i data-lucide="chevron-left"></i></a>

                        @else

                            <span class="page-button disabled" aria-hidden="true"><i data-lucide="chevron-left"></i></span>

                        @endif

                        <span class="page-button" style="width:auto;padding:0 6px;">{{ $maintenances->currentPage() }} /

                            {{ max(1, $maintenances->lastPage()) }}</span>

                        @if ($maintenances->nextPageUrl())

                            <a class="page-button" href="{{ $maintenances->nextPageUrl() }}"

                                aria-label="Halaman berikutnya"><i data-lucide="chevron-right"></i></a>

                        @else

                            <span class="page-button disabled" aria-hidden="true"><i data-lucide="chevron-right"></i></span>

                        @endif

                    </div>

                </section>

            </div>

        </section>

    </main>

    <script>

        lucide.createIcons();

        const maintenanceForm = document.getElementById('maintenance-form');

        const methodField = document.getElementById('http-method');

        const selectedIdField = document.getElementById('selected-maintenance-id');

        const codeField = document.getElementById('maintenance-code');

        const dateField = document.getElementById('maintenance-date');

        const typeField = document.getElementById('maintenance-type');

        const treeField = document.getElementById('tree-id');

        const workerField = document.getElementById('worker-id');

        const notesField = document.getElementById('maintenance-notes');

        const saveLabel = document.getElementById('save-label');

        const storeUrl = maintenanceForm.dataset.storeUrl;

        const updateBase = maintenanceForm.dataset.updateBase;

        let selectedRow = null;

        let selectedMaintenanceId = null;

        let editMode = false;

        function selectMaintenance(row) {

            if (!row || !row.dataset.maintenanceId) return;

            document.querySelectorAll('#maintenance-table tbody tr.selected').forEach(item => item.classList.remove('selected'));

            row.classList.add('selected');

            selectedRow = row;

            selectedMaintenanceId = row.dataset.maintenanceId;

            selectedIdField.value = selectedMaintenanceId;

        }

        function prepareEdit() {

            if (!selectedRow || !selectedMaintenanceId) {

                alert('Pilih satu baris pada History Perawatan terlebih dahulu.');

                return;

            }

            codeField.value = selectedRow.dataset.code || '';

            dateField.value = selectedRow.dataset.date || '';

            typeField.value = selectedRow.dataset.type || '';

            treeField.value = selectedRow.dataset.treeId || '';

            workerField.value = selectedRow.dataset.workerId || '';

            notesField.value = selectedRow.dataset.notes || '';

            maintenanceForm.action = updateBase + '/' + encodeURIComponent(selectedMaintenanceId);

            methodField.name = '_method';

            methodField.value = 'PUT';

            editMode = true;

            saveLabel.textContent = 'Simpan Perubahan';

            document.getElementById('save-button').title = 'Simpan perubahan perawatan terpilih';

            dateField.focus();

        }

        document.getElementById('edit-button').addEventListener('click', prepareEdit);

        document.getElementById('delete-button').addEventListener('click', deleteSelectedMaintenance);

        function deleteSelectedMaintenance() {

            if (!selectedMaintenanceId || !selectedRow) {

                alert('Pilih satu riwayat perawatan yang ingin dihapus.');

                return;

            }

            const code = selectedRow.dataset.code || 'perawatan ini';

            if (!confirm('Yakin ingin menghapus ' + code + '? Data yang dihapus tidak dapat dipulihkan.')) return;

            const deleteForm = document.getElementById('delete-form');

            deleteForm.action = updateBase + '/' + encodeURIComponent(selectedMaintenanceId);

            deleteForm.submit();

        }

        document.getElementById('maintenance-search').addEventListener('input', function () {

            const filter = this.value.toLocaleLowerCase();

            document.querySelectorAll('#maintenance-table tbody tr[data-maintenance-id]').forEach(row => {

                row.style.display = row.textContent.toLocaleLowerCase().includes(filter) ? '' : 'none';

            });

        });

    </script>

</body>

</html>
