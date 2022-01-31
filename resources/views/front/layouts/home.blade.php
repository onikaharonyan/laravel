<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield ( 'title' )</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset ( 'front/img/favicon.png' ) }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset ( 'front/css/bootstrap.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/animate.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/magnific-popup.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/fontawesome-all.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/owl.carousel.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/jquery-ui.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/flaticon.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/jarallax.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/nice-select.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/odometer.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/aos.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/slick.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/default.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/style.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'front/css/responsive.css' ) }}">
</head>
<body>

<!-- header-area -->
<header class="header-style-two inner-page-header">
    <div class="header-top-wrap">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-top-right">
                        <ul>
                            @auth
                                <li class="header-top-user d-flex justify-content-center">
                                    <a href="{{ route ( 'front.create.car' ) }}">{{ Auth ()-> user ()->name }}</a>
                                </li>
                                    /
                                <li class="header-top-user d-flex justify-content-center">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @else
                                <li class="header-top-login">
                                    <a href="{{ route ( 'login.and.registr' ) }}"><i class="far fa-user-circle"></i> LOGIN</a>
                                    <a href="{{ route ( 'login.and.registr' ) }}">REGISTER</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="main-header menu-area">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu-wrap">
                        <nav class="menu-nav show">
                            <div class="logo d-flex justify-content-between">
                                <a href="{{ route ( 'main' ) }}"><img src="{{ asset ( 'front/img/logo/b_logo.png' ) }}" alt="Logo"></a>
                                <div class="header-action d-block d-md-none">
                                    <ul>
                                        @auth
                                            <li>
                                                <a href="{{ route ( 'front.create.car' ) }}" class="btn" style="color: #fff;">add car</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li class="dropdown {{ request()->routeIs('main') ? 'active' : '' }}">
                                        <a href="{{ route ( 'main' ) }}">HOME</a>
                                    </li>
                                    <li class="dropdown {{ request()->routeIs('main.cars') ? 'active' : '' }}">
                                        <a href="{{ route ( 'main.cars' ) }}">Cars</a>
                                    </li>
                                    @auth
                                        <li class="dropdown">
                                            <a href="#">Brand / Model</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route ( 'front.create.brand' ) }}">Add brand</a></li>
                                                <li><a href="{{ route ( 'front.create.model' ) }}">Add model</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="header-action d-none d-md-block">
                                <ul>
                                    @auth
                                        <li class="header-btn">
                                            <a href="{{ route ( 'front.create.car' ) }}" class="btn">add car</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <div class="menu-backdrop"></div>
                        <div class="close-btn"><i class="fas fa-times"></i></div>

                        <nav class="menu-box">
                            <div class="nav-logo"><a href="index.html"><img src="img/logo/logo.png" alt="" title=""></a>
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
        <div id="collapse-search-body" class="collapse-search-body collapse">
            <div class="search-body">
                <div class="container custom-container">
                    <form action="#">
                        <div class="form-item">
                            <input name="search" placeholder="Type here...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->

<!-- main-area -->
<main>

   @yield ( 'content' )

</main>
<!-- main-area-end -->

<!-- footer-area -->
<footer class="footer-bg" data-background="{{ asset ( 'front/img/bg/footer_bg.jpg' ) }}">
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="copyright-text">
                        <p>Copyright © 2021. All rights reserved. by Business-theme</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <button class="scroll-top scroll-to-target" data-target="html">
                        <i class="fas fa-angle-up"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->

<!-- JS here -->
<script data-cfasync="false" src="{{ asset ( 'front/../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js' ) }}">
</script><script src="{{ asset ( 'front/js/vendor/jquery-3.5.0.min.js' ) }}"></script>
<script src="{{ asset ( 'front/js/popper.min.js' ) }}"></script>
<script src="{{ asset ( 'front/js/bootstrap.min.js' ) }}"></script>
<script src="{{ asset ( 'front/js/isotope.pkgd.min.js' ) }}"></script>
<script src="{{ asset ( 'front/js/imagesloaded.pkgd.min.js' ) }}"></script>
<script src="{{ asset ( 'front/js/jquery.magnific-popup.min.js' ) }}"></script>
<script src="{{ asset ( 'front/js/jquery.nice-select.min.js' ) }}"></script>
<script src="{{ asset ( 'front/js/owl.carousel.min.js' ) }}"></script>
<script src="{{ asset ( 'front/js/jquery.odometer.min.js' ) }}"></script>
<script src="{{ asset ( 'front/js/jquery.accrue.min.js' ) }}"></script>
<script src="{{ asset ( 'front/js/jquery.appear.js' ) }}"></script>
<script src="{{ asset ( 'front/js/jarallax.min.js' ) }}"></script>
<script src="{{ asset ( 'front/js/slick.min.js' ) }}"></script>
<script src="{{ asset ( 'front/js/ajax-form.js' ) }}"></script>
<script src="{{ asset ( 'front/js/wow.min.js' ) }}"></script>
<script src="{{ asset ( 'front/js/aos.j' ) }}s"></script>
<script src="{{ asset ( 'front/js/plugins.js' ) }}"></script>
<script src="{{ asset ( 'front/js/main.js' ) }}"></script>
</body>
</html>
