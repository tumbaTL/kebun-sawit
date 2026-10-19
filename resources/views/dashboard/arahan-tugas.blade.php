<!DOCTYPE html>

<html lang="id">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Arahan Tugas - Sihombing Group</title>



    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://unpkg.com/lucide@latest"></script>



    <style>
        :root {

            --green: #08752b;

            --green-light: #8cf28a;

            --green-soft: #e1f3e3;

            --border: #d2ded1;

            --text: #242824;

            --muted: #697168;

            --background: #f8f9f8;

        }



        * {

            box-sizing: border-box;

        }



        html,

        body {

            margin: 0;

            min-height: 100%;

            font-family: 'Inter', sans-serif;

            color: var(--text);

            background: var(--background);

            font-size: 12px;

        }



        body {

            min-width: 760px;

        }



        button,

        input {

            font: inherit;

        }



        /* SIDEBAR - disamakan persis dengan Dashboard Pekerja */
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

        .sidebar-bottom a,
        .sidebar-bottom button {
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

            height: 42px;

            background: #fff;

            border-bottom: 1px solid var(--border);

            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 17px;

            padding: 0 15px;

        }



        .search-top {

            width: 172px;

            height: 32px;

            border: 1px solid var(--border);

            border-radius: 20px;

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 0 12px;

            color: #596259;

            background: #f8f9f8;

        }



        .search-top input {

            width: 100%;

            min-width: 0;

            border: none;

            outline: none;

            background: transparent;

            font-size: 9px;

        }



        .top-icon {

            color: #404840;

            font-size: 14px;

            cursor: pointer;

        }



        .avatar {

            width: 27px;

            height: 27px;

            border: 1px solid var(--green);

            border-radius: 50%;

            background: #eaf5eb;

            display: grid;

            place-items: center;

            color: var(--green);

            overflow: hidden;

        }



        .content {

            padding: 38px 20px 35px 21px;

            max-width: 1200px;

            margin: 0 auto;

        }



        .page-title {

            font-size: 22px;

            line-height: 1.3;

            font-weight: 700;

            letter-spacing: -.5px;

            margin: 0 0 3px;

        }



        .page-description {

            margin: 0;

            font-size: 9px;

            color: #667064;

        }



        .stats {

            display: grid;

            grid-template-columns: repeat(4, minmax(0, 1fr));

            gap: 10px;

            margin-top: 17px;

        }



        .stat-card {

            min-width: 0;

            height: 100px;

            padding: 11px 11px 9px;

            background: #fff;

            border: 1px solid var(--border);

            border-radius: 10px;

        }



        .stat-top {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 5px;

        }



        .stat-icon {

            font-size: 16px;

        }



        .stat-label {

            font-size: 8px;

            white-space: nowrap;

        }



        .green {

            color: #07822d;

        }



        .orange {

            color: #f07800;

        }



        .red {

            color: #ff252c;

        }



        .stat-number {

            font-size: 32px;

            line-height: 1.2;

            font-weight: 700;

            margin-top: 6px;

        }



        .stat-caption {

            font-size: 9px;

            margin-top: 1px;

            color: #4d554c;

        }



        .task-panel {

            margin-top: 18px;

            background: #fff;

            border: 1px solid var(--border);

            border-radius: 10px;

            overflow: hidden;

        }



        .filter-bar {

            min-height: 60px;

            padding: 15px 16px;

            display: flex;

            align-items: center;

            gap: 11px;

            flex-wrap: wrap;

        }



        .task-search {

            height: 29px;

            width: min(260px, 42%);

            display: flex;

            align-items: center;

            gap: 9px;

            padding: 0 10px;

            border: 1px solid #cbd6ca;

            border-radius: 9px;

            background: #fafbfa;

            color: #414b40;

        }



        .task-search input {

            width: 100%;

            min-width: 0;

            outline: none;

            border: none;

            background: transparent;

            font-size: 10px;

        }



        .filter-label {

            white-space: nowrap;

            font-size: 9px;

        }



        .filter-buttons {

            display: flex;

            align-items: center;

            gap: 5px;

            flex-wrap: wrap;

        }



        .filter-button {

            border: none;

            background: #e9e9e9;

            color: #424742;

            border-radius: 14px;

            padding: 5px 12px;

            font-size: 8px;

            cursor: pointer;

            white-space: nowrap;

        }



        .filter-button.active {

            background: #258238;

            color: #fff;

        }



        .table-wrap {

            width: 100%;

            overflow-x: auto;

        }



        .task-table {

            width: 100%;

            border-collapse: collapse;

            table-layout: fixed;

        }



        .task-table thead {

            background: #eeeeee;

        }



        .task-table th {

            height: 43px;

            text-align: left;

            padding: 0 10px;

            font-size: 8px;

            font-weight: 500;

            color: #444b43;

            letter-spacing: .3px;

        }



        .task-table th:first-child,

        .task-table td:first-child {

            padding-left: 16px;

            width: 78px;

        }



        .task-table th:nth-child(2) {

            width: 24%;

        }



        .task-table th:nth-child(3) {

            width: 18%;

        }



        .task-table th:nth-child(4) {

            width: 12%;

        }



        .task-table th:nth-child(5) {

            width: 15%;

        }



        .task-table th:last-child,

        .task-table td:last-child {

            width: 86px;

            text-align: center;

            padding-right: 12px;

        }



        .task-table td {

            height: 55px;

            padding: 8px 10px;

            border-bottom: 1px solid var(--border);

            vertical-align: middle;

            font-size: 10px;

            color: #465045;

        }



        .task-id {

            color: #08752b;

            font-size: 10px;

            line-height: 1.25;

            font-weight: 800;

        }



        .task-name {

            font-size: 13px;

            font-weight: 600;

            line-height: 1.35;

            color: #262926;

        }



        .task-name.urgent-name {

            color: #ff252c;

        }



        .task-detail {

            margin-top: 2px;

            font-size: 9px;

            line-height: 1.35;

            color: #667064;

        }



        .location {

            display: flex;

            align-items: flex-start;

            gap: 4px;

            line-height: 1.4;

        }



        .location i {

            margin-top: 2px;

            font-size: 11px;

            flex-shrink: 0;

        }



        .status {

            display: inline-flex;

            align-items: center;

            gap: 5px;

            border-radius: 6px;

            padding: 5px 7px;

            font-size: 8px;

            white-space: nowrap;

        }



        .status::before {

            content: "";

            display: inline-block;

            width: 5px;

            height: 5px;

            border-radius: 50%;

            background: currentColor;

        }



        .status-progress {

            color: #08752b;

            background: #8cf28a;

        }



        .status-pending {

            color: #555b55;

            background: #e9e9e9;

        }



        .status-completed {

            color: #176f2c;

            background: #d6ead8;

        }



        .status-urgent {

            color: #ed222b;

            background: #ffe0e1;

        }



        .detail-button {

            display: inline-block;

            min-width: 61px;

            padding: 4px 8px;

            border: 1px solid #23813a;

            border-radius: 6px;

            background: #fff;

            color: #176e2c;

            text-decoration: none;

            font-size: 9px;

            cursor: pointer;

        }



        .detail-button:hover {

            background: #eef8ef;

        }



        .table-footer {

            height: 43px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 12px;

            font-size: 8px;

            color: #444c43;

        }



        .pagination {

            display: flex;

            align-items: center;

            gap: 7px;

        }



        .page-button {

            min-width: 22px;

            height: 22px;

            border: none;

            background: transparent;

            border-radius: 6px;

            color: #424b42;

            font-size: 9px;

            cursor: pointer;

        }



        .page-button.active {

            background: #08752b;

            color: #fff;

        }



        .empty-row {

            text-align: center;

            padding: 25px !important;

            color: #70786f !important;

        }



        @media (max-width: 900px) {

            .content {

                padding-left: 14px;

                padding-right: 14px;

            }



            .stats {

                gap: 7px;

            }



            .stat-card {

                padding-left: 8px;

                padding-right: 8px;

            }



            .filter-bar {

                gap: 8px;

            }



            .task-search {

                width: 42%;

            }

        }
    </style>

</head>



<body>
    @php
        $tasks = $tasks ?? [];
    @endphp

    {{-- SIDEBAR PEKERJA - sama dengan Dashboard Pekerja --}}
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

            <label class="search-top">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input type="text" id="topSearch" placeholder="Search tasks...">

            </label>



            <i class="fa-regular fa-bell top-icon" title="Notifikasi"></i>

            <i class="fa-solid fa-gear top-icon" title="Pengaturan"></i>



            <div class="avatar">

                <i class="fa-regular fa-user"></i>

            </div>

        </header>



        <section class="content">

            <h2 class="page-title">Arahan Tugas</h2>

            <p class="page-description">

                Kelola dan lacak tugas pemeliharaan perkebunan yang ditugaskan kepada Anda.

            </p>



            <div class="stats">

                <div class="stat-card">

                    <div class="stat-top">

                        <i class="fa-regular fa-clipboard stat-icon green"></i>

                        <span class="stat-label green">Active</span>

                    </div>

                    <div class="stat-number">{{ $totalTugas }}</div>

                    <div class="stat-caption">Total Assigned</div>

                </div>



                <div class="stat-card">

                    <div class="stat-top">

                        <i class="fa-solid fa-stopwatch stat-icon orange"></i>

                        <span class="stat-label orange">Action Required</span>

                    </div>

                    <div class="stat-number">{{ $sedangBerjalan }}</div>

                    <div class="stat-caption">In Progress</div>

                </div>



                <div class="stat-card">

                    <div class="stat-top">

                        <i class="fa-solid fa-exclamation stat-icon red"></i>

                        <span class="stat-label red">Urgent</span>

                    </div>

                    <div class="stat-number">{{ $terlambat }}</div>

                    <div class="stat-caption">Overdue Tasks</div>

                </div>



                <div class="stat-card">

                    <div class="stat-top">

                        <i class="fa-regular fa-circle-check stat-icon green"></i>

                        <span class="stat-label green">Done</span>

                    </div>

                    <div class="stat-number">{{ $selesai }}</div>

                    <div class="stat-caption">Completed Today</div>

                </div>

            </div>



            <section class="task-panel">

                <div class="filter-bar">

                    <label class="task-search">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        <input type="text" id="taskSearch" placeholder="Search by Task Name or ID...">

                    </label>



                    <span class="filter-label">Filter Status:</span>



                    <div class="filter-buttons">

                        <button type="button" class="filter-button active" data-status="All">All Tasks</button>

                        <button type="button" class="filter-button" data-status="Pending">Pending</button>

                        <button type="button" class="filter-button" data-status="In Progress">In Progress</button>

                        <button type="button" class="filter-button" data-status="Completed">Completed</button>

                    </div>

                </div>



                <div class="table-wrap">

                    <table class="task-table">

                        <thead>

                            <tr>

                                <th>ID<br>TUGAS</th>

                                <th>NAMA TUGAS</th>

                                <th>LOKASI</th>

                                <th>TANGGAL</th>

                                <th>STATUS</th>

                                <th>AKSI</th>

                            </tr>

                        </thead>



                        <tbody id="taskTableBody">

                            @foreach ($tasks as $task)

                                @php

                                    $statusClass = match ($task['status']) {

                                        'In Progress' => 'status-progress',

                                        'Pending' => 'status-pending',

                                        'Completed' => 'status-completed',

                                        'Urgent' => 'status-urgent',

                                        default => 'status-pending',

                                    };

                                @endphp



                                <tr class="task-row" data-status="{{ $task['status'] }}">

                                    <td>

                                        <div class="task-id">

                                            {{ $task['id'] }}

                                        </div>

                                    </td>



                                    <td>

                                        <div class="task-name {{ $task['status'] === 'Urgent' ? 'urgent-name' : '' }}">

                                            {{ $task['name'] }}

                                        </div>

                                        <div class="task-detail">{{ $task['detail'] }}</div>

                                    </td>



                                    <td>

                                        <div class="location">

                                            <i class="fa-solid fa-location-dot"></i>

                                            <span>{{ $task['location'] }}</span>

                                        </div>

                                    </td>



                                    <td>{{ $task['date'] }}</td>



                                    <td>

                                        <span class="status {{ $statusClass }}">

                                            {{ $task['status'] }}

                                        </span>

                                    </td>



                                    <td>

                                        <button type="button" class="detail-button"
                                            onclick="alert('Detail tugas {{ $task['id'] }}')">

                                            Detail

                                        </button>

                                    </td>

                                </tr>

                            @endforeach



                            <tr id="emptyRow" style="display:none">

                                <td colspan="6" class="empty-row">Tugas tidak ditemukan.</td>

                            </tr>

                        </tbody>

                    </table>

                </div>



                <footer class="table-footer">

                    <span id="taskCount">Showing 0 of {{ count($tasks) }} tasks</span>



                    <div class="pagination" id="pagination" aria-label="Navigasi halaman"></div>

                </footer>

            </section>

        </section>

    </main>



    <script>

        const taskRows = Array.from(document.querySelectorAll('.task-row'));
        const taskSearch = document.getElementById('taskSearch');
        const topSearch = document.getElementById('topSearch');
        const filterButtons = document.querySelectorAll('.filter-button');
        const emptyRow = document.getElementById('emptyRow');
        const taskCount = document.getElementById('taskCount');
        const pagination = document.getElementById('pagination');

        const perPage = 4;
        let selectedStatus = 'All';
        let currentPage = 1;

        function getFilteredRows() {
            const keywords = [taskSearch.value, topSearch.value]
                .map(value => value.trim().toLowerCase())
                .filter(Boolean);

            return taskRows.filter(row => {
                const rowText = row.textContent.toLowerCase();
                const matchesText = keywords.every(keyword => rowText.includes(keyword));
                const rowStatus = row.dataset.status || '';
                const matchesStatus = selectedStatus === 'All' || rowStatus === selectedStatus;
                return matchesText && matchesStatus;
            });
        }

        function renderPagination(totalPages) {
            pagination.innerHTML = '';

            const previous = document.createElement('button');
            previous.type = 'button';
            previous.className = 'page-button';
            previous.setAttribute('aria-label', 'Halaman sebelumnya');
            previous.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';
            previous.disabled = currentPage <= 1;
            previous.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    renderTasks();
                }
            });
            pagination.appendChild(previous);

            for (let page = 1; page <= totalPages; page++) {
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'page-button' + (page === currentPage ? ' active' : '');
                button.textContent = String(page);
                button.setAttribute('aria-label', `Halaman ${page}`);
                button.addEventListener('click', () => {
                    currentPage = page;
                    renderTasks();
                });
                pagination.appendChild(button);
            }

            const next = document.createElement('button');
            next.type = 'button';
            next.className = 'page-button';
            next.setAttribute('aria-label', 'Halaman berikutnya');
            next.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';
            next.disabled = currentPage >= totalPages;
            next.addEventListener('click', () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    renderTasks();
                }
            });
            pagination.appendChild(next);
        }

        function renderTasks() {
            const filteredRows = getFilteredRows();
            const totalPages = Math.max(1, Math.ceil(filteredRows.length / perPage));
            currentPage = Math.min(currentPage, totalPages);
            const start = (currentPage - 1) * perPage;
            const pageRows = new Set(filteredRows.slice(start, start + perPage));

            taskRows.forEach(row => {
                row.style.display = pageRows.has(row) ? '' : 'none';
            });

            emptyRow.style.display = filteredRows.length === 0 ? '' : 'none';
            const first = filteredRows.length === 0 ? 0 : start + 1;
            const last = Math.min(start + perPage, filteredRows.length);
            taskCount.textContent = `Showing ${first}–${last} of ${filteredRows.length} tasks`;
            renderPagination(totalPages);
        }

        taskSearch.addEventListener('input', () => {
            currentPage = 1;
            renderTasks();
        });
        topSearch.addEventListener('input', () => {
            currentPage = 1;
            renderTasks();
        });

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                selectedStatus = button.dataset.status || 'All';
                filterButtons.forEach(item => item.classList.remove('active'));
                button.classList.add('active');
                currentPage = 1;
                renderTasks();
            });
        });

        renderTasks();
    </script>



    <script>
        if (window.lucide) lucide.createIcons();
    </script>
</body>



</html>