(function () {
    "use strict";

    const selector = "[data-count-up]";

    function animateCounter(element) {
        if (element.dataset.countUpInitialized === "true") {
            return;
        }

        const target = Number(element.dataset.countUp);
        const decimals = Math.max(
            0,
            Math.min(6, Number(element.dataset.countDecimals) || 0),
        );
        const duration = Math.max(
            300,
            Number(element.dataset.countDuration) || 1500,
        );

        if (!Number.isFinite(target)) {
            return;
        }

        element.dataset.countUpInitialized = "true";

        const formatter = new Intl.NumberFormat("id-ID", {
            minimumFractionDigits: decimals,
            maximumFractionDigits: decimals,
        });

        // Jika pengguna memilih mengurangi animasi, tampilkan nilai akhir.
        if (
            window.matchMedia &&
            window.matchMedia("(prefers-reduced-motion: reduce)").matches
        ) {
            element.textContent = formatter.format(target);
            return;
        }

        let startTime = null;
        element.textContent = formatter.format(0);

        function step(timestamp) {
            if (startTime === null) {
                startTime = timestamp;
            }

            const progress = Math.min((timestamp - startTime) / duration, 1);

            // Animasi melambat secara halus di akhir.
            const eased = 1 - Math.pow(1 - progress, 4);
            const currentValue = progress >= 1 ? target : target * eased;

            element.textContent = formatter.format(currentValue);

            if (progress < 1) {
                requestAnimationFrame(step);
            }
        }

        requestAnimationFrame(step);
    }

    function runCounters() {
        document.querySelectorAll(selector).forEach(animateCounter);
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", runCounters, {
            once: true,
        });
    } else {
        runCounters();
    }

    // Jalankan ulang jika halaman dipulihkan dari browser Back/Forward.
    window.addEventListener("pageshow", function (event) {
        if (!event.persisted) {
            return;
        }

        document.querySelectorAll(selector).forEach(function (element) {
            delete element.dataset.countUpInitialized;
        });

        runCounters();
    });
})();
