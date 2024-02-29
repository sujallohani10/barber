<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Barber') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('core/assets/img/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite([
    'resources/assets/sass/frontend/app.scss',
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
    ])
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('core/assets/img/logo/loder.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')

    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    @vite('resources/assets/js/frontend/app.js')

    @vite([
        'resources/assets/js/frontend/vendor/modernizr-3.5.0.min.js',
        'resources/assets/js/frontend/vendor/jquery-1.12.4.min.js',

        'resources/assets/js/frontend/core/jquery.slicknav.min.js',

        'resources/assets/js/frontend/core/owl.carousel.min.js',
        'resources/assets/js/frontend/core/slick.min.js',
        'resources/assets/js/frontend/core/wow.min.js',
        'resources/assets/js/frontend/core/animated.headline.js',
        'resources/assets/js/frontend/core/jquery.magnific-popup.js',

        'resources/assets/js/frontend/core/gijgo.min.js',
        'resources/assets/js/frontend/core/jquery.nice-select.min.js ',
        'resources/assets/js/frontend/core/jquery.sticky.js',

        'resources/assets/js/frontend/core/jquery.counterup.min.js',
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
    ])
</body>
</html>
