<style>
    /* =========================================
       SIHOMBING GROUP — LEAF ANIMATION LOADER
    ========================================= */

    #sg-loading-screen {
        position: fixed;
        inset: 0;
        z-index: 999999;
        display: grid;
        place-items: center;
        overflow: hidden;
        isolation: isolate;
        padding: 20px;

        color: #17452a;
        font-family: 'Poppins', Arial, sans-serif;

        opacity: 1;
        visibility: visible;
        background: #f5f9f2;
        transition: opacity .35s ease, visibility .35s ease;
    }

    #sg-loading-screen.sg-loading-hidden {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
    }

    #sg-loading-screen,
    #sg-loading-screen * {
        box-sizing: border-box;
    }

    /* Latar kebun yang lembut */
    #sg-loading-screen::before {
        content: "";
        position: absolute;
        inset: -14px;
        z-index: -2;

        background:
            url("{{ asset('images/staff-background.png') }}") center / cover no-repeat;

        filter: blur(4px);
        transform: scale(1.035);
    }

    /* Lapisan terang agar teks tetap jelas */
    #sg-loading-screen::after {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -1;
        background:
            radial-gradient(circle at 50% 43%,
                rgba(255, 255, 255, .78) 0%,
                rgba(249, 252, 247, .76) 32%,
                rgba(239, 247, 235, .66) 100%);
    }

    /* Gelombang dekoratif bagian bawah */
    #sg-loading-screen .sg-leaf-wave {
        position: absolute;
        z-index: 0;
        left: -10%;
        bottom: -100px;
        width: 120%;
        height: 230px;
        pointer-events: none;
        opacity: .4;
        border-radius: 50% 50% 0 0;

        background:
            linear-gradient(180deg,
                rgba(192, 226, 181, .05),
                rgba(130, 196, 126, .35));

        transform: rotate(-4deg);
        animation: sg-wave-motion 9s ease-in-out infinite alternate;
    }

    #sg-loading-screen .sg-leaf-wave.wave-two {
        bottom: -145px;
        opacity: .27;
        background:
            linear-gradient(180deg,
                rgba(72, 151, 83, .02),
                rgba(66, 156, 80, .42));
        transform: rotate(5deg);
        animation-delay: -3s;
    }

    /* =========================================
       DAUN-DAUN BERTERBANGAN
    ========================================= */

    #sg-loading-screen .sg-flying-leaves {
        position: absolute;
        inset: 0;
        z-index: 2;
        overflow: hidden;
        pointer-events: none;
    }

    #sg-loading-screen .sg-flying-leaf {
        position: absolute;
        display: block;
        width: 42px;
        height: 27px;
        opacity: .6;
        filter: drop-shadow(0 3px 4px rgba(28, 88, 36, .12));

        animation: sg-leaf-fly 8s ease-in-out infinite;
        will-change: transform;
    }

    #sg-loading-screen .sg-flying-leaf svg {
        display: block;
        width: 100%;
        height: 100%;
        overflow: visible;
    }

    #sg-loading-screen .sg-leaf-1 {
        left: 8%;
        top: 17%;
        width: 43px;
        animation-duration: 7.8s;
        animation-delay: -.5s;
    }

    #sg-loading-screen .sg-leaf-2 {
        left: 23%;
        top: 69%;
        width: 31px;
        opacity: .5;
        animation-duration: 9.2s;
        animation-delay: -3s;
    }

    #sg-loading-screen .sg-leaf-3 {
        right: 12%;
        top: 21%;
        width: 36px;
        animation-duration: 8.5s;
        animation-delay: -2s;
    }

    #sg-loading-screen .sg-leaf-4 {
        right: 21%;
        top: 72%;
        width: 46px;
        opacity: .48;
        animation-duration: 10s;
        animation-delay: -5s;
    }

    #sg-loading-screen .sg-leaf-5 {
        left: 13%;
        top: 47%;
        width: 24px;
        opacity: .4;
        animation-duration: 6.9s;
        animation-delay: -4s;
    }

    #sg-loading-screen .sg-leaf-6 {
        right: 9%;
        top: 48%;
        width: 28px;
        opacity: .43;
        animation-duration: 9.5s;
        animation-delay: -1s;
    }

    #sg-loading-screen .sg-leaf-7 {
        left: 39%;
        top: 12%;
        width: 25px;
        opacity: .34;
        animation-duration: 8.6s;
        animation-delay: -6s;
    }

    #sg-loading-screen .sg-leaf-8 {
        right: 37%;
        top: 79%;
        width: 32px;
        opacity: .4;
        animation-duration: 7.4s;
        animation-delay: -2.7s;
    }

    #sg-loading-screen .sg-leaf-9 {
        left: 4%;
        top: 79%;
        width: 31px;
        opacity: .34;
        animation-duration: 10.2s;
        animation-delay: -6.5s;
    }

    #sg-loading-screen .sg-leaf-10 {
        right: 4%;
        top: 9%;
        width: 25px;
        opacity: .48;
        animation-duration: 7.2s;
        animation-delay: -3.4s;
    }

    @keyframes sg-leaf-fly {
        0% {
            transform: translate3d(-8px, 18px, 0) rotate(-22deg);
        }

        25% {
            transform: translate3d(24px, -14px, 0) rotate(15deg);
        }

        50% {
            transform: translate3d(47px, -48px, 0) rotate(38deg);
        }

        75% {
            transform: translate3d(12px, -68px, 0) rotate(-5deg);
        }

        100% {
            transform: translate3d(-18px, -22px, 0) rotate(-28deg);
        }
    }

    /* =========================================
       ISI LOADING
    ========================================= */

    #sg-loading-screen .sg-loading-content {
        position: relative;
        z-index: 3;
        width: min(360px, 92vw);
        padding: 25px 20px;
        text-align: center;
    }

    #sg-loading-screen .sg-loading-ring {
        position: relative;
        display: grid;
        place-items: center;

        width: 96px;
        height: 96px;
        margin: 0 auto 22px;

        border-radius: 50%;
        background:
            conic-gradient(from 0deg,
                #165d36 0deg,
                #56b876 125deg,
                rgba(138, 200, 145, .15) 126deg,
                rgba(138, 200, 145, .15) 225deg,
                #a4d7a6 285deg,
                #165d36 360deg);

        animation: sg-ring-rotate 4s linear infinite;
    }

    #sg-loading-screen .sg-loading-ring::before {
        content: "";
        position: absolute;
        inset: 5px;
        border: 1px solid rgba(255, 255, 255, .8);
        border-radius: 50%;
        background: rgba(248, 252, 246, .92);
    }

    #sg-loading-screen .sg-loading-symbol {
        position: relative;
        z-index: 1;
        display: grid;
        place-items: center;

        width: 67px;
        height: 67px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .85);
    }

    #sg-loading-screen .sg-loading-symbol svg {
        width: 42px;
        height: 42px;
    }

    @keyframes sg-ring-rotate {
        to {
            transform: rotate(360deg);
        }
    }

    #sg-loading-screen .sg-loading-brand {
        margin-bottom: 5px;
        color: #17512d;
        font-size: 19px;
        font-weight: 600;
        letter-spacing: -.4px;
    }

    #sg-loading-screen .sg-loading-subtitle {
        margin-bottom: 19px;
        color: #778879;
        font-size: 11px;
        letter-spacing: .5px;
    }

    #sg-loading-screen .sg-loading-message {
        margin: 0;
        color: #45654b;
        font-size: 12px;
        font-weight: 400;
    }

    #sg-loading-screen .sg-loading-dots {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 7px;
        height: 24px;
        margin-top: 8px;
    }

    #sg-loading-screen .sg-loading-dots span {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #2f8b4d;
        opacity: .3;
        transform: scale(.78);
        animation: sg-dot-bounce 1.1s ease-in-out infinite;
    }

    #sg-loading-screen .sg-loading-dots span:nth-child(2) {
        animation-delay: .16s;
    }

    #sg-loading-screen .sg-loading-dots span:nth-child(3) {
        animation-delay: .32s;
    }

    #sg-loading-screen .sg-loading-dots span:nth-child(4) {
        animation-delay: .48s;
    }

    #sg-loading-screen .sg-loading-dots span:nth-child(5) {
        animation-delay: .64s;
    }

    @keyframes sg-dot-bounce {

        0%,
        60%,
        100% {
            opacity: .3;
            transform: translateY(0) scale(.78);
        }

        30% {
            opacity: 1;
            transform: translateY(-3px) scale(1);
        }
    }

    #sg-loading-screen .sg-loading-footer {
        margin-top: 17px;
        color: #849384;
        font-size: 9px;
        letter-spacing: .25px;
    }

    @media (max-width: 600px) {
        #sg-loading-screen .sg-loading-content {
            width: min(310px, 94vw);
            padding: 18px 12px;
        }

        #sg-loading-screen .sg-loading-ring {
            width: 82px;
            height: 82px;
            margin-bottom: 18px;
        }

        #sg-loading-screen .sg-loading-symbol {
            width: 57px;
            height: 57px;
        }

        #sg-loading-screen .sg-loading-symbol svg {
            width: 36px;
            height: 36px;
        }

        #sg-loading-screen .sg-loading-brand {
            font-size: 17px;
        }

        #sg-loading-screen .sg-flying-leaf {
            opacity: .36;
        }
    }

    @media (prefers-reduced-motion: reduce) {

        #sg-loading-screen *,
        #sg-loading-screen *::before,
        #sg-loading-screen *::after {
            animation-duration: 8s !important;
            transition-duration: .01ms !important;
        }
    }
</style>

<div id="sg-loading-screen" role="status" aria-live="polite" aria-hidden="false">

    <div class="sg-leaf-wave"></div>
    <div class="sg-leaf-wave wave-two"></div>

    <!-- Daun dekoratif yang bergerak -->
    <div class="sg-flying-leaves" aria-hidden="true">

        <span class="sg-flying-leaf sg-leaf-1">
            <svg viewBox="0 0 42 24" fill="none">
                <path d="M2 20C6 4 25 0 40 3C34 18 16 26 2 20Z" fill="#438e43" />
                <path d="M3 20L35 5" stroke="#b8dca6" stroke-width="1.2" />
            </svg>
        </span>

        <span class="sg-flying-leaf sg-leaf-2">
            <svg viewBox="0 0 42 24" fill="none">
                <path d="M2 20C6 4 25 0 40 3C34 18 16 26 2 20Z" fill="#72ad55" />
                <path d="M3 20L35 5" stroke="#d0e5b9" stroke-width="1.2" />
            </svg>
        </span>

        <span class="sg-flying-leaf sg-leaf-3">
            <svg viewBox="0 0 42 24" fill="none">
                <path d="M2 20C6 4 25 0 40 3C34 18 16 26 2 20Z" fill="#267442" />
                <path d="M3 20L35 5" stroke="#a9d7a2" stroke-width="1.2" />
            </svg>
        </span>

        <span class="sg-flying-leaf sg-leaf-4">
            <svg viewBox="0 0 42 24" fill="none">
                <path d="M2 20C6 4 25 0 40 3C34 18 16 26 2 20Z" fill="#8cbd65" />
                <path d="M3 20L35 5" stroke="#d6edbd" stroke-width="1.2" />
            </svg>
        </span>

        <span class="sg-flying-leaf sg-leaf-5">
            <svg viewBox="0 0 42 24" fill="none">
                <path d="M2 20C6 4 25 0 40 3C34 18 16 26 2 20Z" fill="#39874a" />
                <path d="M3 20L35 5" stroke="#b8dca6" stroke-width="1.2" />
            </svg>
        </span>

        <span class="sg-flying-leaf sg-leaf-6">
            <svg viewBox="0 0 42 24" fill="none">
                <path d="M2 20C6 4 25 0 40 3C34 18 16 26 2 20Z" fill="#6ca950" />
                <path d="M3 20L35 5" stroke="#d0e5b9" stroke-width="1.2" />
            </svg>
        </span>

        <span class="sg-flying-leaf sg-leaf-7">
            <svg viewBox="0 0 42 24" fill="none">
                <path d="M2 20C6 4 25 0 40 3C34 18 16 26 2 20Z" fill="#347d40" />
                <path d="M3 20L35 5" stroke="#b8dca6" stroke-width="1.2" />
            </svg>
        </span>

        <span class="sg-flying-leaf sg-leaf-8">
            <svg viewBox="0 0 42 24" fill="none">
                <path d="M2 20C6 4 25 0 40 3C34 18 16 26 2 20Z" fill="#82b960" />
                <path d="M3 20L35 5" stroke="#d0e5b9" stroke-width="1.2" />
            </svg>
        </span>

        <span class="sg-flying-leaf sg-leaf-9">
            <svg viewBox="0 0 42 24" fill="none">
                <path d="M2 20C6 4 25 0 40 3C34 18 16 26 2 20Z" fill="#428e4a" />
                <path d="M3 20L35 5" stroke="#b8dca6" stroke-width="1.2" />
            </svg>
        </span>

        <span class="sg-flying-leaf sg-leaf-10">
            <svg viewBox="0 0 42 24" fill="none">
                <path d="M2 20C6 4 25 0 40 3C34 18 16 26 2 20Z" fill="#5a9c48" />
                <path d="M3 20L35 5" stroke="#d0e5b9" stroke-width="1.2" />
            </svg>
        </span>

    </div>

    <!-- Konten utama -->
    <div class="sg-loading-content">

        <div class="sg-loading-ring">
            <div class="sg-loading-symbol">
                <svg viewBox="0 0 48 48" fill="none" aria-hidden="true">
                    <path d="M24 20C16 9 8 12 4 7C14 6 21 12 25 18" fill="#388b47" />
                    <path d="M24 19C26 8 35 4 43 6C38 16 31 19 25 21" fill="#6caf55" />
                    <path d="M24 19C20 8 23 3 26 2C31 11 28 17 26 21" fill="#26733b" />
                    <path d="M23 23H27L29 43H21Z" fill="#947346" />
                </svg>
            </div>
        </div>

        <div class="sg-loading-brand">Sihombing Group</div>
        <div class="sg-loading-subtitle">Sistem Informasi Kebun Sawit</div>

        <p class="sg-loading-message" id="sg-loading-message">
            Memuat data...
        </p>

        <div class="sg-loading-dots" aria-hidden="true">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="sg-loading-footer">
            Mengelola kebun dengan lebih baik
        </div>
    </div>
</div>

<script>
    (function () {
        'use strict';

        const overlay = document.getElementById('sg-loading-screen');

        if (!overlay || overlay.dataset.sgInitialized === 'true') {
            return;
        }

        overlay.dataset.sgInitialized = 'true';

        const message = document.getElementById('sg-loading-message');
        let fallbackTimer = null;
        let hideTimer = null;

        function hideLoading() {
            overlay.classList.add('sg-loading-hidden');
            overlay.setAttribute('aria-hidden', 'true');

            if (fallbackTimer !== null) {
                clearTimeout(fallbackTimer);
                fallbackTimer = null;
            }
        }

        function showLoading() {
            if (hideTimer !== null) {
                clearTimeout(hideTimer);
                hideTimer = null;
            }

            if (fallbackTimer !== null) {
                clearTimeout(fallbackTimer);
            }

            overlay.classList.remove('sg-loading-hidden');
            overlay.setAttribute('aria-hidden', 'false');

            if (message) {
                message.textContent = 'Memuat data...';
            }

            // Pengaman agar overlay tidak menutupi halaman terlalu lama
            fallbackTimer = window.setTimeout(hideLoading, 7000);
        }

        // Tampilan awal: hilangkan overlay saat dokumen telah siap.
        if (document.readyState === 'complete') {
            hideTimer = window.setTimeout(hideLoading, 450);
        } else {
            document.addEventListener('DOMContentLoaded', function () {
                hideTimer = window.setTimeout(hideLoading, 450);
            }, { once: true });

            window.addEventListener('load', function () {
                hideTimer = window.setTimeout(hideLoading, 250);
            }, { once: true });
        }

        // Saat halaman dipulihkan melalui tombol Back/Forward.
        window.addEventListener('pageshow', function () {
            hideLoading();
        });

        // Loading untuk perpindahan tautan internal.
        document.addEventListener('click', function (event) {
            if (
                event.defaultPrevented ||
                event.button !== 0 ||
                event.metaKey ||
                event.ctrlKey ||
                event.shiftKey ||
                event.altKey ||
                !(event.target instanceof Element)
            ) {
                return;
            }

            const link = event.target.closest('a[href]');

            if (
                !link ||
                link.hasAttribute('download') ||
                link.hasAttribute('data-no-loading') ||
                (link.target && link.target !== '_self')
            ) {
                return;
            }

            let targetUrl;

            try {
                targetUrl = new URL(link.href, window.location.href);
            } catch (error) {
                return;
            }

            if (
                targetUrl.origin !== window.location.origin ||
                targetUrl.protocol === 'mailto:' ||
                targetUrl.protocol === 'tel:'
            ) {
                return;
            }

            if (
                targetUrl.pathname === window.location.pathname &&
                targetUrl.search === window.location.search &&
                targetUrl.hash
            ) {
                return;
            }

            showLoading();
        });

        // Loading untuk formulir yang benar-benar dikirim.
        document.addEventListener('submit', function (event) {
            if (event.defaultPrevented) {
                return;
            }

            const form = event.target;

            if (
                !(form instanceof HTMLFormElement) ||
                form.hasAttribute('data-no-loading') ||
                (form.target && form.target !== '_self') ||
                form.method.toLowerCase() === 'dialog'
            ) {
                return;
            }

            showLoading();
        });

    })();
</script>