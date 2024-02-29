<header>
    <!--? Header Start -->
    <div class="header-area header-transparent pt-20">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('core/assets/img/logo/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li class="active"><a href="#">Home</a></li>
                                        <li><a href="#about">About</a></li>
                                        <li><a href="#services">Services</a></li>
{{--                                        <li><a href="portfolio.html">Portfolio</a></li>--}}
{{--                                        <li><a href="blog.html">Blog</a>--}}
{{--                                            <ul class="submenu">--}}
{{--                                                <li><a href="blog.html">Blog</a></li>--}}
{{--                                                <li><a href="blog_details.html">Blog Details</a></li>--}}
{{--                                                <li><a href="elements.html">Element</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
                                        <li><a href="#footer">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                <button type="button" class="btn header-btn" data-bs-toggle="modal" data-bs-target="#bookingModal">
                                  Book an Appointment
                                </button>
{{--                                <a href="#bookingModal" class="btn header-btn">Book an Appointment</a>--}}
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
