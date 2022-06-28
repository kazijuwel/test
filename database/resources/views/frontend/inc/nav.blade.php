<style>
    @media (max-width: 480px) {
        .d-xs-none {
            display: none !important;
        }
    }

    @media (max-width: 480px) {
        .d-xs-inline-block {
            display: inline-block !important;
        }
    }
    .btn-soft-primary.fw-600 {
        background-color: #ec8d60;
        border-color:#ec8d60;
        color: #ffffff;
    }
    .btn-soft-primary:hover {
        color: #fff !important;
        background-color: #f16522 !important;
        border-color: #f16522 !important;
    }

</style>

<script type="text/javascript">
    function showModal(){
        $('#call-for-order').modal('show');
    }
</script>


<div class="modal fade" id="call-for-order" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">“আপনি সরাসরি আমাদের কাছে ফোন করে যেকোন পন্যের অর্ডার দিতে 01811-446778 অথবা 01841-695695 এই নাম্বারে কল করুন”</h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
        </div>
    </div>
</div>

<!-- Top Bar -->
<div class="top-navbar border-soft-secondary z-1035" style="background: #fcf2ed">
    <div class="container">
        <div class="row">
        <!-- <div class="col-12 text-right ">
                <ul class="list-inline mb-0 list-inline  justify-content-between justify-content-lg-start mb-0">

                    <li class="list-inline-item mr-3 mr-10 mr-11 d-lg-inline-block">
                        <a href="https://servicepoint.belaobela.com.bd/"
                           class="text-reset py-2 d-block">Product Book</a>
                    </li>
                    <li class="list-inline-item mr-3 mr-10 mr-11  d-lg-inline-block">
                        <a href="https://servicepoint.belaobela.com.bd/"
                           class="text-reset py-2 d-block">Tutorial</a>
                    </li>
                    <li class="list-inline-item mr-3 mr-10 mr-11 d-lg-inline-block">
                        <a href="https://servicepoint.belaobela.com.bd/"
                           class="text-reset py-2 d-block">Offers</a>
                    </li>
                    <li class="list-inline-item mr-3 mr-10 mr-11 d-lg-inline-block">
                        <a href="{{ route('orders.track') }}"
                           class="text-reset py-2 d-block">Track Order</a>
                    </li>

                    <li class="list-inline-item mr-3 mr-10 mr-11  d-lg-inline-block">
                        <a href="https://servicepoint.belaobela.com.bd/"
                           class="text-reset py-2 d-block">Social Work</a>
                    </li>

                    <li class="list-inline-item mr-3 mr-10 mr-11 d-lg-inline-block">
                        <a href="{{ route('jobs.corner') }}"
                           class="text-reset py-2 d-block">Job Corner</a>
                    </li>
                    @auth
                        @if(isAdmin())
                            <li class="list-inline-item mr-3">
                                <a href="{{ route('admin_dashboard') }}"
                                   class="text-reset py-2 d-inline-block">{{ translate('My Panel')}}</a>
                            </li>
                        @else
                            <li class="list-inline-item mr-3">
                                <a href="{{ route('dashboard') }}"
                                   class="text-reset py-2 d-inline-block">{{ translate('My Panel')}}</a>
                            </li>
                        @endif
                        <li class="list-inline-item">
                            <a href="{{ route('logout') }}"
                               class="text-reset py-2 d-inline-block">{{ translate('Logout')}}</a>
                        </li>
                        @else
                            <li class="list-inline-item mr-3 mr-10 mr-11 d-lg-inline-block">
                                <a href="{{ route('user.login') }}"
                                   class="text-reset py-2 d-block">{{ translate('Sign In ')}}</a>
                            </li>

                            <li class="list-inline-item mr-3 mr-10 mr-11 d-lg-inline-block">
                                <a href="{{ route('user.registration') }}"
                                   class="text-reset py-2 d-block">{{ translate('Sign Up ')}}</a>
                            </li>
                            @endauth
                            @if(get_setting('show_currency_switcher') == 'on')
                                <li class="list-inline-item dropdown" id="currency-change">
                                    @php
                                        if(Session::has('currency_code')){
                                            $currency_code = Session::get('currency_code');
                                        }
                                        else{
                                            $currency_code = \App\Currency::findOrFail(\App\BusinessSetting::where('type', 'system_default_currency')->first()->value)->code;
                                        }
                                    @endphp
                                    <a href="javascript:void(0)" class="dropdown-toggle text-reset py-2"
                                       data-toggle="dropdown" data-display="static">
                                        {{ \App\Currency::where('code', $currency_code)->first()->name }} {{ (\App\Currency::where('code', $currency_code)->first()->symbol) }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                        @foreach (\App\Currency::where('status', 1)->get() as $key => $currency)
                                            <li>
                                                <a class="dropdown-item @if($currency_code == $currency->code) active @endif"
                                                   href="javascript:void(0)"
                                                   data-currency="{{ $currency->code }}">{{ $currency->name }}
                                                    ({{ $currency->symbol }})</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                            @if(get_setting('show_language_switcher') == 'on')
                                <li class="list-inline-item dropdown mr-3" id="lang-change">
                                    @php
                                        if(Session::has('locale')){
                                            $locale = Session::get('locale', Config::get('app.locale'));
                                        }
                                        else{
                                            $locale = 'en';
                                        }
                                    @endphp
                                    <a href="javascript:void(0)" class="dropdown-toggle text-reset py-2"
                                       data-toggle="dropdown"
                                       data-display="static">
                                        <img src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                             data-src="{{ static_asset('assets/img/flags/'.$locale.'.png') }}"
                                             class="mr-2 lazyload"
                                             alt="{{ \App\Language::where('code', $locale)->first()->name }}"
                                             height="11">
                                        <span
                                                class="">{{ \App\Language::where('code', $locale)->first()->name }}</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-left">
                                        @foreach (\App\Language::all() as $key => $language)
                                            <li>
                                                <a href="javascript:void(0)" data-flag="{{ $language->code }}"
                                                   class="dropdown-item @if($locale == $language) active @endif">
                                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                         data-src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}"
                                                         class="mr-1 lazyload" alt="{{ $language->name }}" height="11">
                                                    <span class="language">{{ $language->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                            @endif


                </ul>

            </div>-->
        </div>
    </div>
</div>
<!-- END Top Bar -->
<header class="@if(get_setting('header_stikcy') == 'on') sticky-top @endif z-1020 bg-white border-bottom shadow-sm">
    <div class="position-relative logo-bar-area" style="background: #03275b;">
        <div class="container">
            <div class="col-12 text-right d-none d-xl-block">
                <ul class="list-inline mb-0 list-inline  justify-content-between justify-content-lg-start mb-0">
                    <li class="list-inline-item mr-1 d-lg-inline-block">
                            <a onclick="showModal()" class="btn btn-soft-primary btn-sm shadow-md fs-14 fw-600">
                                {{ translate('Call for Order') }}
                            </a>
                        </li>
                    @if (get_setting('vendor_system_activation') == 1)
                        <li class="list-inline-item mr-1 d-lg-inline-block">
                            <a href="{{ route('shops.create') }}" class="btn btn-primary btn-sm shadow-md fs-14 fw-600">
                                {{ translate('Be a Seller') }}
                            </a>
                        </li>
                    @endif
                    <li class="list-inline-item d-lg-inline-block">
                        <a href="{{ route('service_provider.create') }}" class="btn btn-primary btn-sm shadow-md fs-14 fw-600">
                            Be a Service Provider
                        </a>
                    </li>
                </ul>

            </div>

         {{--   mobile view logo and search start--}}
            <div class="d-flex">
            {{-- logo start--}}
                <div class="col-xl-3 col-3  align-items-center d-block d-lg-none" style="padding-right: 0px;padding-left: 0px;">
                    <a href="{{ route('shops.create') }}" class="btn btn-primary btn-xs shadow-md fs-11 fw-600">
                        {{ translate('Be a Seller') }}
                    </a>

                </div>
            <div class="col-xl-4 col-4 ml-2  align-items-center d-block d-lg-none" style="padding-right: 0px;padding-left: 0px;">
                <a class="d-block py-20 mr-0 text-center" href="{{ route('home') }}">
                    @php
                        $header_logo = get_setting('header_logo');
                    @endphp
                    @if($header_logo != null)
                        <img src="{{ uploaded_asset($header_logo) }}" alt="{{ env('APP_NAME') }}"
                             class="mw-100 h-50px h-md-72px mb-0 mt-1" height="67">
                    @else
                        <img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"
                             class="mw-100 h-50px h-md-53px mb-0 mt-1" height="70">
                    @endif

                </a>

            </div>
            {{-- logo end--}}

                <div class="col-xl-5 col-5 ml-3 align-items-center d-block d-lg-none" style="padding-right: 0px;padding-left: 0px;">
                    <a href="{{ route('service_provider.create') }}" class="btn btn-primary btn-xs shadow-md fs-11 fw-600">
                        Be a Service Provider
                    </a>

                </div>

                {{--   product Service Provider start--}}
                {{--<div class="col-xl-8 col-8  align-items-center d-block d-lg-none">
                <ul class="list-inline mb-0 list-inline  justify-content-between justify-content-lg-start mb-0">
                    @if (get_setting('vendor_system_activation') == 1)
                        <li class="list-inline-item mr-0 d-lg-inline-block">
                            <a href="{{ route('shops.create') }}" class="btn btn-primary btn-xs shadow-md fs-11 fw-600">
                                {{ translate('Be a Seller') }}
                            </a>
                        </li>
                    @endif
                    <li class="list-inline-item d-lg-inline-block">
                        <a href="https://belaobela.com.bd/service" class="btn btn-primary btn-xs shadow-md fs-11 fw-600">
                            Be a Service Provider
                        </a>
                    </li>
                </ul>
            </div>--}}
                {{--product Service Provider end--}}
                {{-- search start--}}

                {{-- serach end--}}
            </div>

            <div class="d-flex align-items-center">

                <div class="col-auto col-xl-3 pl-0 pr-3  d-none d-lg-block align-items-center d-none d-xl-block">
                    <a style="display: none;"><i class="la la-phone la-flip-horizontal fs-16" style="font-weight: bold;"></i><strong>
                            {{ get_setting('contact_phone') }}</strong></a><br>
                    <a style="display: none;"><i class="la la-envelope la-flip-horizontal fs-16" aria-hidden="true"></i> <strong>{{ get_setting('contact_email') }} </strong>
                    </a>
                </div>


                <div class="col-xl-5 col-xl-5 col-xs-12  align-items-center d-none d-xl-block">
                    <a class="d-block py-20 mr-1 text-center" href="{{ route('home') }}">
                        @php
                            $header_logo = get_setting('header_logo');
                        @endphp
                        @if($header_logo != null)
                            <img src="{{ uploaded_asset($header_logo) }}" alt="{{ env('APP_NAME') }}"
                                 class="mw-100 h-60px h-md-62px mb-2 mt-1" height="60">
                        @else
                            <img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"
                                 class="mw-100 h-60px h-md-53px mb-2 mt-1" height="60">
                        @endif

                    </a>

                </div>


                <div class="col-auto col-xl-5 pl-0 pr-0  col-12 d-flex ">
                    {{--<a class="calculator"><i class="la la-calculator la-flip-horizontal fs-16 d-none d-lg-inline-block"
                                             aria-hidden="true" style="color: var(--primary);"></i>
                        <strong class="d-none d-lg-inline-block">Requirement Calculator </strong></a>--}}

                    <ul class="list-inline mb-0 list-inline  justify-content-between justify-content-lg-start mb-0 pt-2">

                        @auth
                            @if(isAdmin())
                                <li class="list-inline-item text-white mobileviewcart">
                                    <a href="{{ route('admin_dashboard') }}"
                                       class="text-reset py-2 d-inline-block">{{ translate('My Panel')}}</a>
                                </li>
                            @else
                                <li class="list-inline-item text-white mobileviewcart">
                                    <a href="{{ route('dashboard') }}"
                                       class="text-reset py-2 d-inline-block">{{ translate('My Panel')}}</a>
                                </li>
                            @endif
                            <li class="list-inline-item text-white mobileviewcart">
                                <a href="{{ route('logout') }}"
                                   class="text-reset py-2 d-inline-block">{{ translate('Logout')}}</a>
                            </li>
                            @else
                                <li class="list-inline-item text-white mobileviewcart">
                                    <a href="{{ route('user.login') }}"
                                       class="text-reset py-2 d-block">{{ translate('Sign In ')}}</a>
                                </li>

                                <li class="list-inline-item  text-white mobileviewcart">
                                    <a href="{{ route('user.registration') }}"
                                       class="text-reset py-2 d-block">{{ translate('Sign Up ')}}</a>
                                </li>
                                @endauth
                        <li class="list-inline-item text-white mobileviewcart">

                            @include('frontend.partials.compare')

                        </li>
                        <li class="list-inline-item text-white mobileviewcart">

                            @include('frontend.partials.wishlist')

                        </li>

                        <li class="list-inline-item text-white mobileviewcart">
                            <div class="align-self-stretch" data-hover="dropdown">
                                <div class="nav-cart-box dropdown h-100" id="cart_items">
                                    @include('frontend.partials.cart')
                                </div>
                            </div>
                        </li>


                    </ul>


                </div>


            </div>


            <div class="d-flex align-items-center">

                <div class="col-auto col-xl-3 pl-0  pr-4 d-flex align-items-center ">

                    @if(Route::currentRouteName() == 'home')
                        <div class="bg-primary  d-none d-xl-block align-self-stretch category-menu-icon-box  ml-0 mr-0"
                             style="width: 100%;">
                            <div class="h-100 d-flex align-items-center " id="category-menu-icon">
                                <a href="{{ route('categories.all') }}"
                                   class="dropdown-toggle   h-40px  pl-2 rounded  c-pointer text-light d-xs-none">
                                    <i class="las la-bars" aria-hidden="true"> </i> &nbsp <b>ALL CATEGORY</b> </a>


                            </div>
                        </div>


                    @else
                        <div class="bg-primary  d-xl-block align-self-stretch category-menu-icon-box  ml-0 mr-0"
                             style="width: 100%;">
                            <div class="h-100 d-flex align-items-center " id="category-menu-icon">
                                <div class="dropdown-toggle   h-40px  pl-2 rounded  c-pointer text-light d-xs-none">
                                    <i class="la la-bars" aria-hidden="true"></i> &nbsp <b>ALL CATEGORY</b>
                                </div>


                            </div>
                        </div>
                    @endif

                </div>
                <div class="col-10 col-xl-5 pl-0 pr-3 d-flex align-items-center">
                    <ul class="list-inline mb-0 pl-0 mobile-hor-swipe text-center" style="margin: 0 auto;">
                        <li class="list-inline-item mr-0">
                            <a href="https://belaobela.com.bd/" class="btn btn-primary fs-14 px-4 py-2 productservicemobile d-inline-block fw-600 hov-opacity-100 "
                               style="border-top-right-radius: 15px;border-top-left-radius: 15px;">
                                Product
                            </a>
                        </li>
                        <li class="list-inline-item mr-0">
                            <a href="https://belaobela.com.bd/service" class="btn fs-14 px-4 py-2 productservicemobile d-inline-block fw-600 hov-opacity-100 "
                               style="background: #fff;border-top-right-radius: 15px;border-top-left-radius: 15px;">
                                Service
                            </a>
                        </li>
                    </ul>

                </div>

               {{-- serach start --}}
                <div class="d-lg-none ml-auto mr-0">
                    <a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle" data-target=".front-header-search">
                        <i class="las la-search la-flip-horizontal la-2x" style="color: #ffffff"></i>
                    </a>
                </div>

                <div class="flex-grow-1 front-header-search d-flex align-items-center bg-white">
                    <div class="position-relative flex-grow-1">
                        <form action="{{ route('search') }}" method="GET" class="stop-propagation">
                            <div class="d-flex position-relative align-items-center">
                                <div class="d-lg-none" data-toggle="class-toggle" data-target=".front-header-search">
                                    <button class="btn px-2" type="button"><i class="la la-2x la-long-arrow-left"></i></button>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="border-0 border-lg form-control" id="search" name="q" placeholder="{{translate('Search Your Product Here.....')}}" autocomplete="off">
                                    <div class="input-group-append d-none d-lg-block">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="la la-search la-flip-horizontal fs-18" style="color:#ffffff"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100" style="min-height: 200px">
                            <div class="search-preloader absolute-top-center">
                                <div class="dot-loader"><div></div><div></div><div></div></div>
                            </div>
                            <div class="search-nothing d-none p-3 text-center fs-16">

                            </div>
                            <div id="search-content" class="text-left">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-none ml-3 mr-0">
                    <div class="nav-search-box">
                        <a href="#" class="nav-box-link">
                            <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                        </a>
                    </div>
                </div>
               {{-- serach end--}}


            </div>


        @if(Route::currentRouteName() != 'home')
            <div class="hover-category-menu position-absolute w-100 top-100 left-0 right-0 d-none z-3"
                 id="hover-category-menu">
                <div class="container">
                    <div class="row gutters-10 position-relative">
                        <div class="col-lg-3 position-static">
                            @include('frontend.partials.category_menu')
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</header>
