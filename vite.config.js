import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'public/core/assets/css/owl.carousel.min.css',
                'public/core/assets/css/slicknav.css',
                'public/core/assets/css/flaticon.css',
                'public/core/assets/css/gijgo.css',
                'public/core/assets/css/animate.min.css',
                'public/core/assets/css/animated-headline.css',
                'public/core/assets/css/magnific-popup.css',
                'public/core/assets/css/fontawesome-all.min.css',
                'public/core/assets/css/themify-icons.css',
                'public/core/assets/css/slick.css',
                'public/core/assets/css/nice-select.css',
                'public/core/assets/css/style.css',

                'resources/js/app.js',
                'resources/assets/js/frontend/app.js',

                'resources/assets/js/frontend/vendor/modernizr-3.5.0.min.js',
                'resources/assets/js/frontend/vendor/jquery-1.12.4.min.js',

                'resources/assets/js/frontend/core/popper.min.js',
                'resources/assets/js/frontend/core/jquery.slicknav.min.js',

                'resources/assets/js/frontend/core/owl.carousel.min.js',
                'resources/assets/js/frontend/core/slick.min.js',
                'resources/assets/js/frontend/core/wow.min.js',
                'resources/assets/js/frontend/core/animated.headline.js',
                'resources/assets/js/frontend/core/jquery.magnific-popup.js',

                'resources/assets/js/frontend/core/gijgo.min.js',
                'resources/assets/js/frontend/core/jquery.nice-select.min.js ',
                'resources/assets/js/frontend/core/jquery.sticky.js',

                'resources/assets/js/frontend/core/counterup.min.js',
                'resources/assets/js/frontend/core/waypoints.min.js',
                'resources/assets/js/frontend/core/jquery.countdown.min.js',
                'resources/assets/js/frontend/core/hover-direction-snake.min.js',

                'resources/assets/js/frontend/core/contact.js',
                'resources/assets/js/frontend/core/jquery.form.js',
                'resources/assets/js/frontend/core/jquery.validate.min.js',
                'resources/assets/js/frontend/core/mail-script.js',
                'resources/assets/js/frontend/core/jquery.ajaxchimp.min.js',

                'resources/assets/js/frontend/core/plugins.js',
                'resources/assets/js/frontend/core/main.js'
            ],
            refresh: true,
        }),
    ],
});
