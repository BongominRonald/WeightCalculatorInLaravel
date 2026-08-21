import './bootstrap';
import Alpine from 'alpinejs';
import 'animate.css';

window.Alpine = Alpine;
Alpine.start();

(function () {
    window.onload = function () {
        window.setTimeout(fadeout, 500);
    }

    function fadeout() {
        const preloader = document.querySelector('.preloader');
        if (preloader) {
            preloader.style.opacity = '0';
            preloader.style.display = 'none';
        }
    }

    if (typeof WOW !== 'undefined') {
        new WOW().init();
    }
})();
