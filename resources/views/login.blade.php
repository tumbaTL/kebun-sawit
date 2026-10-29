<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sihombing Group</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {

            --green: #08752c;

            --green-dark: #064522;

            --green-light: #72d88b;

            --text: #17251c;

            --muted: #737b78;

            --border: #dce4dd;

            --white: #ffffff;

        }

        * {

            box-sizing: border-box;

            margin: 0;

            padding: 0;

        }

        body {

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 32px;

            font-family: 'Poppins', sans-serif;

            color: var(--text);

            background:

                linear-gradient(135deg, rgba(238, 244, 235, .8), rgba(247, 248, 244, .95)),

                url("{{ asset('images/sawit.jpg') }}") center/cover fixed;

        }

        button,

        input {

            font: inherit;

        }

        .login-card {

            width: min(1380px, 100%);

            min-height: 720px;

            display: grid;

            grid-template-columns: 1fr 1fr;

            overflow: hidden;

            background: var(--white);

            border: 1px solid rgba(255, 255, 255, .8);

            border-radius: 24px;

            box-shadow: 0 24px 80px rgba(20, 57, 31, .18);

        }

        /* PANEL KIRI */

        .brand-panel {

            position: relative;

            isolation: isolate;

            display: flex;

            flex-direction: column;

            justify-content: center;

            padding: 65px;

            color: white;

            background:

                linear-gradient(145deg,

                    rgba(2, 35, 17, .91) 0%,

                    rgba(3, 55, 25, .76) 48%,

                    rgba(5, 42, 19, .24) 100%),

                url("{{ asset('images/sawit.jpg') }}") center/cover no-repeat;

        }

        .brand-panel::after {

            content: "";

            position: absolute;

            z-index: -1;

            inset: 0;

            background: linear-gradient(0deg,

                    rgba(0, 30, 12, .45),

                    transparent 60%);

            pointer-events: none;

        }

        .brand-content {

            position: relative;

            z-index: 1;

        }

        .brand-logo {

            width: 118px;

            height: 118px;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: hidden;

            margin-bottom: 16px;

            background: #fff;

            border: 1px solid rgba(255, 255, 255, .55);

            border-radius: 50%;

            box-shadow: 0 12px 35px rgba(0, 0, 0, .14);

        }

        .brand-logo img {

            width: 80%;

            height: 80%;

            object-fit: contain;

        }

        .brand-name {

            margin-bottom: 38px;

            font-size: 15px;

            font-weight: 600;

            letter-spacing: 4px;

        }

        .brand-line {

            width: 42px;

            height: 3px;

            margin-bottom: 25px;

            background: var(--green-light);

            border-radius: 5px;

        }

        /* Slogan utama sengaja dihilangkan sesuai permintaan. */

        .brand-description {

            max-width: 440px;

            color: rgba(255, 255, 255, .88);

            font-size: 14px;

            line-height: 1.9;

        }

        .benefits {

            display: grid;

            grid-template-columns: repeat(3, minmax(0, 1fr));

            gap: 14px;

            margin-top: 46px;

        }

        .benefit {

            text-align: center;

            font-size: 11px;

            line-height: 1.7;

            color: rgba(255, 255, 255, .85);

        }

        .benefit-icon {

            width: 52px;

            height: 52px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin: 0 auto 10px;

            color: white;

            background: rgba(255, 255, 255, .12);

            border: 1px solid rgba(255, 255, 255, .15);

            border-radius: 50%;

            backdrop-filter: blur(8px);

        }

        .benefit-icon svg {

            width: 24px;

            height: 24px;

            stroke: currentColor;

            fill: none;

            stroke-width: 1.7;

            stroke-linecap: round;

            stroke-linejoin: round;

        }

        .benefit strong {

            display: block;

            margin-bottom: 2px;

            color: white;

            font-size: 12px;

            font-weight: 600;

        }

        /* PANEL KANAN */

        .form-panel {

            position: relative;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 65px 70px;

            background:

                radial-gradient(circle at 100% 0%,

                    rgba(217, 237, 219, .28),

                    transparent 28%),

                #fff;

        }

        .form-container {

            width: 100%;

            max-width: 490px;

        }

        .eyebrow {

            margin-bottom: 12px;

            color: var(--green-dark);

            font-size: 11px;

            font-weight: 700;

            letter-spacing: 4px;

        }

        .heading-line {

            width: 42px;

            height: 3px;

            margin-bottom: 25px;

            background: var(--green);

            border-radius: 5px;

        }

        .form-title {

            margin-bottom: 10px;

            color: #12271a;

            font-size: clamp(27px, 3vw, 35px);

            font-weight: 700;

            line-height: 1.3;

        }

        .form-subtitle {

            margin-bottom: 42px;

            color: var(--muted);

            font-size: 14px;

            line-height: 1.8;

        }

        .form-group {

            margin-bottom: 22px;

        }

        .form-label {

            display: block;

            margin-bottom: 9px;

            color: #202922;

            font-size: 13px;

            font-weight: 600;

        }

        .input-wrapper {

            position: relative;

        }

        .input-icon {

            position: absolute;

            top: 50%;

            left: 17px;

            width: 21px;

            height: 21px;

            color: #59675e;

            transform: translateY(-50%);

            pointer-events: none;

        }

        .input-icon svg,

        .toggle-password svg {

            width: 100%;

            height: 100%;

            fill: none;

            stroke: currentColor;

            stroke-width: 1.8;

            stroke-linecap: round;

            stroke-linejoin: round;

        }

        .form-input {

            width: 100%;

            height: 58px;

            padding: 0 52px;

            color: #26372b;

            background: #f7f9f7;

            border: 1px solid #d7dfd9;

            border-radius: 13px;

            outline: none;

            font-size: 13px;

            transition: border-color .2s, box-shadow .2s, background .2s;

        }

        .form-input:focus {

            background: white;

            border-color: #59b878;

            box-shadow: 0 0 0 4px rgba(45, 145, 73, .09);

        }

        .form-input::placeholder {

            color: #a0a9a2;

        }

        .toggle-password {

            position: absolute;

            top: 50%;

            right: 17px;

            width: 22px;

            height: 22px;

            padding: 0;

            color: #68746c;

            background: transparent;

            border: none;

            cursor: pointer;

            transform: translateY(-50%);

        }

        .toggle-password:hover {

            color: var(--green);

        }

        .form-error {

            display: block;

            margin-top: 7px;

            color: #c62828;

            font-size: 11px;

        }

        .alert-error {

            margin-bottom: 22px;

            padding: 13px 15px;

            color: #a82020;

            background: #fff1f0;

            border: 1px solid #ffd3cf;

            border-radius: 10px;

            font-size: 12px;

            line-height: 1.7;

        }

        .form-options {

            display: flex;

            align-items: center;

            justify-content: space-between;

            flex-wrap: wrap;

            gap: 12px;

            margin: 8px 0 30px;

        }

        .remember {

            display: inline-flex;

            align-items: center;

            gap: 10px;

            color: #28352c;

            font-size: 12px;

            cursor: pointer;

        }

        .remember input {

            width: 19px;

            height: 19px;

            accent-color: var(--green);

            cursor: pointer;

        }

        .forgot-link {

            padding: 0;

            color: var(--green-dark);

            background: none;

            border: none;

            font-size: 12px;

            font-weight: 600;

            cursor: pointer;

        }

        .forgot-link:hover {

            text-decoration: underline;

        }

        .submit-button {

            width: 100%;

            min-height: 62px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 15px;

            color: white;

            background: linear-gradient(110deg, #08712b, #075126);

            border: none;

            border-radius: 13px;

            box-shadow: 0 8px 18px rgba(6, 95, 39, .15);

            font-size: 15px;

            font-weight: 600;

            cursor: pointer;

            transition: transform .2s, box-shadow .2s, background .2s;

        }

        .submit-button:hover {

            background: linear-gradient(110deg, #075c25, #043f1c);

            box-shadow: 0 12px 25px rgba(6, 95, 39, .22);

            transform: translateY(-2px);

        }

        .submit-button:active {

            transform: translateY(0);

        }

        .submit-button svg {

            width: 21px;

            height: 21px;

            fill: none;

            stroke: currentColor;

            stroke-width: 1.8;

            stroke-linecap: round;

            stroke-linejoin: round;

        }

        .footer {

            margin-top: 38px;

            color: #858c87;

            text-align: center;

            font-size: 11px;

            line-height: 1.8;

        }

        /* RESPONSIVE */

        @media (max-width: 1000px) {

            body {

                padding: 20px;

            }

            .login-card {

                grid-template-columns: .85fr 1.15fr;

                min-height: 650px;

            }

            .brand-panel {

                padding: 38px;

            }

            .form-panel {

                padding: 45px 38px;

            }

            .brand-logo {

                width: 95px;

                height: 95px;

            }

            .brand-name {

                font-size: 12px;

                letter-spacing: 3px;

            }

            .benefits {

                gap: 8px;

            }

        }

        @media (max-width: 700px) {

            body {

                min-height: 100vh;

                padding: 16px;

                background: #f0f4ef;

            }

            .login-card {

                width: 100%;

                max-width: 480px;

                min-height: auto;

                display: block;

                border-radius: 20px;

            }

            .brand-panel {

                min-height: 185px;

                padding: 25px 26px;

                background-position: center 45%;

            }

            .brand-logo {

                width: 60px;

                height: 60px;

                margin-bottom: 9px;

            }

            .brand-name {

                margin-bottom: 0;

                font-size: 10px;

                letter-spacing: 2.5px;

            }

            .brand-line,

            .brand-description,

            .benefits {

                display: none;

            }

            .form-panel {

                padding: 32px 25px;

            }

            .eyebrow {

                font-size: 10px;

                letter-spacing: 3px;

            }

            .heading-line {

                margin-bottom: 18px;

            }

            .form-title {

                font-size: 27px;

            }

            .form-subtitle {

                margin-bottom: 28px;

                font-size: 12px;

            }

            .form-input {

                height: 53px;

            }

            .form-group {

                margin-bottom: 18px;

            }

            .form-options {

                align-items: flex-start;

                margin-bottom: 24px;

            }

            .remember,

            .forgot-link {

                font-size: 11px;

            }

            .submit-button {

                min-height: 55px;

            }

            .footer {

                margin-top: 25px;

            }

        }

        @media (prefers-reduced-motion: reduce) {

            *,

            *::before,

            *::after {

                transition: none !important;

                scroll-behavior: auto !important;

            }

        }



        /* FIX: Login pas layar desktop tanpa scroll */
        html {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            width: 100%;
            height: 100vh;
            height: 100dvh;
            min-height: 0;
            padding: 12px;
            overflow: hidden;
        }

        .login-card {
            width: min(1440px, 100%);
            height: calc(100dvh - 24px);
            min-height: 0;
            max-height: calc(100dvh - 24px);
        }

        .brand-panel,
        .form-panel {
            min-height: 0;
            height: 100%;
            padding: clamp(20px, 4vh, 50px) clamp(24px, 4vw, 60px);
            overflow: hidden;
        }

        .form-subtitle {
            margin-bottom: clamp(16px, 3vh, 30px);
        }

        .form-group {
            margin-bottom: clamp(12px, 2vh, 18px);
        }

        .form-input {
            height: 52px;
        }

        .form-options {
            margin-bottom: clamp(14px, 2.5vh, 24px);
        }

        .submit-button {
            min-height: 54px;
        }

        .footer {
            margin-top: clamp(16px, 3vh, 28px);
        }

        /* Laptop dengan layar pendek */
        @media (min-width: 701px) and (max-height: 760px) {

            .brand-panel,
            .form-panel {
                padding: 20px 28px;
            }

            .brand-logo {
                width: 82px;
                height: 82px;
            }

            .brand-name {
                margin-bottom: 18px;
            }

            .benefits {
                margin-top: 20px;
            }

            .heading-line {
                margin-bottom: 14px;
            }

            .form-title {
                font-size: 27px;
            }
        }

        /* HP tetap dapat di-scroll jika diperlukan */
        @media (max-width: 700px) {
            html {
                height: auto;
                overflow-x: hidden;
                overflow-y: auto;
            }

            body {
                width: 100%;
                height: auto;
                min-height: 100vh;
                min-height: 100dvh;
                padding: 12px;
                overflow: visible;
            }

            .login-card {
                height: auto;
                max-height: none;
                min-height: 0;
            }

            .brand-panel,
            .form-panel {
                height: auto;
                overflow: visible;
            }
        }
    </style>

</head>

<body>

    <main class="login-card">

        <!-- PANEL IDENTITAS PERUSAHAAN -->

        <section class="brand-panel">

            <div class="brand-content">

                <div class="brand-logo">

                    <img src="{{ asset('images/logo-sg.png') }}" alt="Logo Sihombing Group">

                </div>

                <div class="brand-name">SIHOMBING GROUP</div>

                <div class="brand-line"></div>

                <!-- Kalimat slogan yang diminta dihapus tidak ditampilkan. -->

                <p class="brand-description">

                    Mengelola kebun sawit dengan data, teknologi,

                    dan people untuk masa depan yang lebih baik.

                </p>

                <div class="benefits">

                    <div class="benefit">

                        <div class="benefit-icon">

                            <svg viewBox="0 0 24 24">

                                <path d="M11 20a8 8 0 0 1 0-16h8v8a8 8 0 0 1-8 8Z" />

                                <path d="M8 16 17 7" />

                                <path d="M13 7h4v4" />

                            </svg>

                        </div>

                        <strong>Produktivitas</strong>

                        Lebih Tinggi

                    </div>

                    <div class="benefit">

                        <div class="benefit-icon">

                            <svg viewBox="0 0 24 24">

                                <path d="M4 19V12h4v7" />

                                <path d="M10 19V6h4v13" />

                                <path d="M16 19V3h4v16" />

                                <path d="M3 21h18" />

                            </svg>

                        </div>

                        <strong>Pengelolaan</strong>

                        Lebih Efisien

                    </div>

                    <div class="benefit">

                        <div class="benefit-icon">

                            <svg viewBox="0 0 24 24">

                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />

                                <circle cx="9" cy="7" r="4" />

                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />

                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />

                            </svg>

                        </div>

                        <strong>Lingkungan</strong>

                        Lebih Terjaga

                    </div>

                </div>

            </div>

        </section>

        <!-- PANEL FORM LOGIN -->

        <section class="form-panel">

            <div class="form-container">

                <div class="eyebrow">SELAMAT DATANG</div>

                <div class="heading-line"></div>

                <h1 class="form-title">Masuk ke Sistem</h1>

                <p class="form-subtitle">

                    Akses akun Anda untuk melanjutkan ke

                    Sistem Manajemen Presisi Sihombing Group.

                </p>

                @if ($errors->any())

                    <div class="alert-error" role="alert">

                        @foreach ($errors->all() as $error)

                            <div>{{ $error }}</div>

                        @endforeach

                    </div>

                @endif

                @if (session('error'))

                    <div class="alert-error" role="alert">

                        {{ session('error') }}

                    </div>

                @endif

                <form id="loginForm" action="{{ route('login.process') }}" method="POST">

                    @csrf

                    <!-- USERNAME / EMAIL -->

                    <div class="form-group">

                        <label class="form-label" for="email">

                            Username

                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">

                                <svg viewBox="0 0 24 24">

                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />

                                    <circle cx="12" cy="7" r="4" />

                                </svg>

                            </span>

                            <input class="form-input" type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan username atau email" autocomplete="username" required autofocus>

                        </div>

                        @error('email')

                            <span class="form-error">{{ $message }}</span>

                        @enderror

                    </div>

                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label class="form-label" for="password">

                            Password

                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">

                                <svg viewBox="0 0 24 24">

                                    <rect x="3" y="10" width="18" height="11" rx="2" />

                                    <path d="M7 10V7a5 5 0 0 1 10 0v3" />

                                    <path d="M12 14v3" />

                                </svg>

                            </span>

                            <input class="form-input" type="password" id="password" name="password"
                                placeholder="Masukkan password" autocomplete="current-password" required>

                            <button type="button" class="toggle-password" id="togglePassword"
                                aria-label="Tampilkan password" aria-pressed="false">

                                <svg id="eyeIcon" viewBox="0 0 24 24">

                                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z" />

                                    <circle cx="12" cy="12" r="3" />

                                </svg>

                            </button>

                        </div>

                        @error('password')

                            <span class="form-error">{{ $message }}</span>

                        @enderror

                    </div>

                    <!-- OPSI LOGIN -->

                    <div class="form-options">

                        <label class="remember" for="remember">

                            <input type="checkbox" id="remember" name="remember" value="1">

                            <span>Ingat username</span>

                        </label>

                        <button class="forgot-link" type="button" id="forgotButton">

                            Lupa nama pengguna dan kata sandi?

                        </button>

                    </div>

                    <!-- TOMBOL MASUK -->

                    <button class="submit-button" type="submit">

                        <span>Masuk</span>

                        <svg viewBox="0 0 24 24">

                            <path d="M5 12h14" />

                            <path d="m12 5 7 7-7 7" />

                        </svg>

                    </button>

                </form>

                <footer class="footer">

                    &copy; {{ date('Y') }} Sihombing Group.

                    Semua hak dilindungi.

                </footer>

            </div>

        </section>

    </main>

    <script>

        // Menampilkan atau menyembunyikan password.

        const passwordInput = document.getElementById('password');

        const togglePassword = document.getElementById('togglePassword');

        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {

            const showPassword = passwordInput.type === 'password';

            passwordInput.type = showPassword ? 'text' : 'password';

            this.setAttribute(

                'aria-label',

                showPassword ? 'Sembunyikan password' : 'Tampilkan password'

            );

            this.setAttribute('aria-pressed', String(showPassword));

            eyeIcon.innerHTML = showPassword

                ? '<path d="M3 3l18 18"/><path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/><path d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.5 0 10 7 10 7a15.8 15.8 0 0 1-3.1 3.9"/><path d="M6.2 6.2C3.5 8 2 12 2 12s3.5 7 10 7a10.8 10.8 0 0 0 4-.8"/>'

                : '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>';

        });

        // Ingat username secara lokal, bukan password.

        const emailInput = document.getElementById('email');

        const rememberCheckbox = document.getElementById('remember');

        const loginForm = document.getElementById('loginForm');

        const savedEmailKey = 'sihombing_login_email';

        try {

            const savedEmail = localStorage.getItem(savedEmailKey);

            if (savedEmail && !emailInput.value) {

                emailInput.value = savedEmail;

                rememberCheckbox.checked = true;

            }

        } catch (error) {

            // Login tetap berfungsi jika penyimpanan browser tidak tersedia.

        }

        loginForm.addEventListener('submit', function () {

            try {

                if (rememberCheckbox.checked) {

                    localStorage.setItem(savedEmailKey, emailInput.value);

                } else {

                    localStorage.removeItem(savedEmailKey);

                }

            } catch (error) {

                // Tidak mengganggu proses autentikasi Laravel.

            }

        });

        // Mengarahkan pengguna ke halaman pemulihan password.
        document.getElementById('forgotButton').addEventListener('click', function () {
            window.location.href = "{{ route('password.request') }}";
        });

    </script>

    @include('components.loading-screen')

</body>

</html>