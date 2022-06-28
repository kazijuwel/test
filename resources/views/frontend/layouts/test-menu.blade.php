<style>
    @media (max-width:480px){.d-xs-inline-block{display:inline-block !important;}}
    @media (max-width:480px){.d-xs-none{display:none !important;}}
</style>
<!-- Header -->

<header class=" sticky-top  z-1020 bg-white border-bottom shadow-sm">
    <div class="position-relative logo-bar-area" style="background: #fbeae0;">
        <div class="container">
            <div class="d-flex align-items-center pt-2 pb-2">

                <div class="col-auto col-xl-3 pl-0 pr-3  d-none d-lg-block align-items-center">
                    <a><i class="la la-phone la-flip-horizontal fs-16" style="font-weight: bold"></i><strong>
                            +8801723290034</strong></a><br>
                    <a><i class="la la-envelope la-flip-horizontal fs-16" aria-hidden="true"></i> <strong>support@orient.com.bd </strong>
                    </a>
                </div>


                <div class="col-xl-6  col-xs-8 align-items-center">
                    <a class="d-block py-20 mr-3 text-center" href="{{ route('home') }}">
                        @php
                            $header_logo = get_setting('header_logo');
                        @endphp
                        @if($header_logo != null)
                            <img src="{{ uploaded_asset($header_logo) }}" alt="{{ env('APP_NAME') }}"
                                 class="mw-100 h-30px h-md-40px" height="40">
                        @else
                            <img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"
                                 class="mw-100 h-30px h-md-40px" height="40">
                        @endif

                    </a>

                </div>

                <div class="col-auto col-xl-3 pl-0 pr-0  col-xs-4 text-right ">
                    <a><i class="la la-calculator la-flip-horizontal fs-16 d-none d-lg-inline-block"
                          aria-hidden="true"></i>
                        <strong class="d-none d-lg-inline-block">Requirement Calculator </strong></a>


                    <ul class="list-inline mb-0 list-inline  justify-content-between justify-content-lg-start mb-0 pt-2">
                        <li class="list-inline-item mr-3 d-none d-xs-inline-block">
                            <a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle" data-target=".front-header-search">
                                <i class="las la-search la-flip-horizontal la-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mr-3 d-none d-lg-inline-block">
                            <a href="http://localhost/oriend-active-ecommerce/wishlists"
                               class="d-flex align-items-center text-reset">
                                <i class="la la-heart-o la-2x opacity-80"></i><span
                                    class="badge badge-primary badge-inline badge-pill " style="    position: relative;
    top: -5px;
    right: 5px;">0</span><span class="d-none d-lg-block">Wishlist</span>

                            </a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="javascript:void(0)" class="d-flex align-items-center text-reset h-100"
                               data-toggle="dropdown" data-display="static">
                                <i class="la la-shopping-cart la-2x opacity-80"></i><span
                                    class="badge badge-primary badge-inline badge-pill" style="    position: relative;
    top: -5px;
    right: 5px;">0</span><span class="d-none d-lg-block">Cart</span>

                            </a>
                        </li>
                    </ul>


                </div>

            </div>


            <div class="d-flex align-items-center">

                <div class="col-auto col-xl-3 pl-0 pr-3  align-items-center">

                    <div class="d-none d-xl-block align-self-stretch category-menu-icon-box ml-auto mr-0">
                        <div class="h-100 d-flex align-items-center" id="category-menu-icon">
                            <div class="dropdown-toggle navbar-light bg-light h-40px w-50px pl-2 rounded border c-pointer">
                                <span class="navbar-toggler-icon"></span>
                            </div>
                        </div>
                    </div>


                </div>


                <div class="col-auto col-xl-6 pl-0 pr-3 d-flex align-items-center">
                    <ul class="list-inline mb-0 pl-0 mobile-hor-swipe text-center" style="margin: 0 auto;">
                        <li class="list-inline-item mr-0">
                            <a href="" class="btn btn-primary fs-14 px-4 py-2 d-inline-block fw-600 hov-opacity-100 "
                               style="border-top-right-radius: 15px;border-top-left-radius: 15px;">
                                Product
                            </a>
                        </li>
                        <li class="list-inline-item mr-0">
                            <a href="" class="btn fs-14 px-4 py-2 d-inline-block fw-600 hov-opacity-100 "
                               style="background: #fff;border-top-right-radius: 15px;border-top-left-radius: 15px;">
                                Service
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="col-auto col-xl-3 pl-0 pr-0  text-right d-none d-lg-block">
                    <div class="input-group">
                        <input type="text" class="border-0 border-lg form-control" id="search" name="q"
                               placeholder="Search Your Product Here....." autocomplete="off">
                        <div class="input-group-append d-none d-lg-block">
                            <button class="btn btn-primary" type="submit">
                                <i class="la la-search la-flip-horizontal fs-18"></i>
                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</header>

