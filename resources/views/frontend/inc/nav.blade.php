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
        border-color: #ec8d60;
        color: #ffffff;
    }

    .btn-soft-primary:hover {
        color: #fff !important;
        background-color: #f16522 !important;
        border-color: #f16522 !important;
    }
    .btnactive {
    background: #fd6500;
    color: white !important;
    font-weight: bold;
 }

</style>

<script type="text/javascript">
    function showModal() {
        $('#call-for-order').modal('show');
    }
    function showModal2() {
        $('#call-for-service').modal('show');
    }
</script>



<div class="modal fade" id="call-for-order" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">“আপনি সরাসরি আমাদের কাছে ফোন করে যেকোন পন্যের অর্ডার
                এর জন্য 01841-695695 এই নাম্বারে কল করুন”</h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="call-for-service" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">“আপনি সরাসরি আমাদের কাছে ফোন করে যেকোন পণ্য সার্ভিসিং এর জন্য কল করুন 01811-446778  নাম্বারে ”</h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Top Bar -->
{{-- Desktop a save asse --}}


<div class="position-relative logo-bar-area mt-1">
    <div class="container">
        {{-- cut hoise --}}
        {{-- mobile view logo and search start --}}
        <div class="d-flex justify-between-center align-items-center">
            <div class="col-auto col-xl-3 pl-0 pr-3 d-none d-lg-block align-items-center d-none d-xl-block">
                <a class="d-block py-20 mr-1 text-center" href="{{ route('home') }}">
                    @php
                        $header_logo = get_setting('header_logo');
                    @endphp
                    @if ($header_logo != null)
                        <img src="{{ uploaded_asset($header_logo) }}" alt="{{ env('APP_NAME') }}"
                            class="img-fluid">
                    @else
                        <img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"
                            class="img-fluid">
                    @endif
                </a>
            </div>
            {{-- Search --}}
            {{-- cut hoise --}}
            {{-- serach start --}}
            <div class="align-items-center d-none d-xl-block" style="">
                {{-- <a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle" data-target=".front-header-search">
                    <i class="las la-search la-flip-horizontal la-2x" style="color: #ffffff"></i>
                </a> --}}
                <div
                    class="flex-grow-1 front-header-search d-flex align-items-center bg-white position-relative flex-grow-1">
                    {{-- <div class="position-relative flex-grow-1"> --}}
                    <form action="{{ route('search') }}" method="GET" class="stop-propagation">
                        <div class="header-search-bar-sf">
                            {{-- <div class="d-flex position-relative align-items-center"> --}}
                            <div class="d-lg-none" data-toggle="class-toggle" data-target=".front-header-search">
                                <button class="btn px-2" type="button"><i
                                        class="la la-2x la-long-arrow-left"></i></button>
                            </div>

                            {{-- <div class="input-group"> --}}
                            <input type="text" class="border-right form-control " id="search" name="q"
                                placeholder="{{ translate('Search Your Product Here.....') }}" autocomplete="off">
                            <div class="search-select-and-btn-sf">
                                <!--<select name="" id="" class="" style="width: 60%">-->
                                <!--    <option style="background-color:#white;" value="">All Categories</option>-->
                                <!--    @foreach($allCategorys as $allCat)-->
                                <!--    <option style="background-color:#white;" value="">{{ $allCat->name }}</option>-->
                                <!--    @endforeach-->
                                <!--</select>-->
                                <button style="margin-left:140px;" class="search-btn-sf"><i class="la la-search "></i></button>
                            </div>
                            {{-- </div> --}}
                            {{-- </div> --}}
                        </div>
                    </form>
                    <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100"
                        style="min-height: 200px; opacity: 1;">
                        <div class="search-preloader absolute-top-center">
                            <div class="dot-loader">
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="search-nothing d-none p-3 text-center fs-16">

                        </div>
                        <div id="search-content" class="text-left">

                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
            {{-- cut hoise --}}
            {{-- serach end --}}
            {{-- Account and cart --}}
            <div class="col-auto col-xl-4 pl-0 pr-0 col-12">
                <ul class="list-inline mb-0 list-inline d-flex justify-content-between align-items-center justify-content-lg-start">
                    @if(Auth::check())
                        {{-- My Account --}}
                        <li class="list-inline-item" style="margin-left:60px;">
                            <div class="align-self-stretch" data-hover="dropdown">
                                <div class="nav-cart-box dropdown h-100" id="">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle inline-perfect-center" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="inline-perfect-center">
                                                <i class="far fa-user-circle fa-3x" style="color: #FD6500"></i> <span class="mx-2" style="font-size: 15px;"> {{ Auth::user()->name }}</span></span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if (isAdmin())
                                                {{-- <li class="list-inline-item text-white mobileviewcart">
                                                    <div class="admin d-flax justify-items-center">
                                                        <div class="icon">
                                                                <i class="la la-user-circle-o" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="icon-text">
                                                                <span class="">My</span>
                                                                <br>
                                                                <span class="tex-right">Pannel</span>
                                                            </div>

                                                        </div>
                                                        <a href="{{ route('admin_dashboard') }}"
                                                            class="text-reset py-2 d-inline-block">{{ translate('Admin') }}</a>
                                                </li>
                                                <li class="list-inline-item text-white mobileviewcart">
                                                    <div class="admin d-flax justify-items-center">
                                                        <div class="icon">
                                                                <i class="la la-user-circle-o" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="icon-text">
                                                                <span class="">My</span>
                                                                <br>
                                                                <span class="tex-right">Pannel</span>
                                                            </div>

                                                        </div>
                                                        <a href="{{ route('admin_dashboard') }}"
                                                            class="text-reset py-2 d-inline-block">{{ translate('Admin') }}</a>
                                                </li> --}}
                                                <a href="{{ route('admin_dashboard') }}" class="text-reset py-2 d-block m-2"><i
                                                    class="fas fa-sign-in-alt"></i> Admin Pannel</a>



                                            @else

                                                <a href="{{ route('dashboard') }}" class="btn"><i
                                                        class="fas fa-user"></i> {{ translate('My Panel') }}</a>

                                            @endif
                                            <a class="btn" href="{{ route('logout') }}"> <i
                                                    class="fas fa-sign-out-alt"></i> {{ translate('Logout') }}</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>

                    @else
                        <li class="list-inline-item"  style="margin-left:60px;" >
                            <div class="align-self-stretch" data-hover="dropdown">
                                <div class="nav-cart-box dropdown h-100">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle inline-perfect-center" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="inline-perfect-center">
                                                <i class="far fa-user-circle fa-3x" style="color: #FD6500"></i> <span class="mx-2" style="font-size: 15px;"> Account</span></span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="{{ route('user.login') }}" class="text-reset py-2 d-block m-2"><i
                                                    class="fas fa-sign-in-alt"></i> {{ translate('LogIn ') }}</a>

                                            <a href="{{ route('user.registration') }}"
                                                class="text-reset py-2 d-block m-2"><i class="fas fa-user-plus"></i>
                                                {{ translate('Register ') }}</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>
                        {{-- <li class="list-inline-item mobileviewcart">
                            <a href="{{ route('user.login') }}"
                                class="text-reset py-2 d-block">{{ translate('Sign In ') }}</a>
                        </li>

                        <li class="list-inline-item  mobileviewcart">
                            <a href="{{ route('user.registration') }}"
                                class="text-reset py-2 d-block">{{ translate('Sign Up ') }}</a>
                        </li> --}}
                    @endif


                    <li class="list-inline-item  mobileviewcart" style="margin-left:0 px;">
                        <div class="align-self-stretch" data-hover="dropdown">
                            <div class="nav-cart-box dropdown h-100" id="cart_items">
                                @include('frontend.partials.cart')
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        {{-- All Category --}}
        <div class="row">
            {{-- cut hoise --}}
            <div class="col-md-3">
                {{-- @if (Route::currentRouteName() == 'home') --}}
                <div class="bg-primary" style="width: 100%;">
                    <div class="d-flex align-items-center" id="category-menu-icon">
                        <a href="{{ route('categories.all') }}"
                            class="btn h-40px  pl-2 rounded  c-pointer text-white">
                            <b><i class="las la-bars fa-lg" aria-hidden="true"> </i> &nbsp ALL CATEGORY</b>
                        </a>
                    </div>
                </div>
                {{-- @else
                    <div class="bg-primary" style="width: 100%;">
                        <div class="d-flex align-items-center " id="category-menu-icon">
                            <div class="h-40px pl-2 rounded  c-pointer text-white">
                                <b><i class="las la-bars fa-lg btn" aria-hidden="true"> </i> &nbsp ALL CATEGORY</b>
                            </div>
                        </div>
                    </div>
                @endif --}}
            </div>

            <div class="col-md-9">
                <ul class="d-flex justify-space-between pl-0" style="white-space: nowrap">
                    <a href="{{ route('categories.all')}}"
                     class="btn btn-light mr-1 {{ (Route::currentRouteName() =='categories.all') ? 'btnactive' : '' }}"
                        style="font-size: 12px; color: #e3571a;" >
                        <i class="fa fa-shopping-bag"></i> Product Shop
                    </a>

                    <a href="{{ route('service.create') }}"
                    class="btn btn-light mr-1 {{ (Route::currentRouteName() =='service.create') ? 'btnactive' : '' }}"
                        style="font-size: 12px; color: #e3571a;">
                        <i class="fa fa-tools"></i> Service Shop
                    </a>

                    <a href="tel:01841-695695" class="btn btn-light mr-1" style="font-size: 12px; color:#e3571a;">
                        <i class="fa fa-phone"></i> Call for Order
                    </a>

        
                    <a href="tel:01811-446778" class="btn btn-light  mr-1" style="font-size: 12px; color:#e3571a;">
                        <i class="fa fa-phone"></i> Call for service
                    </a>



                    @if (get_setting('vendor_system_activation') == 1)

                        <a href="{{ route('shops.create') }}" class="btn btn-light  mr-1 {{ (Route::currentRouteName() =='shops.create') ? 'btnactive' : '' }}"
                            style="color: #e3571a; font-size:12px">
                            <i class="fa fa-users"></i> Be a Seller
                        </a>

                    @endif

                    <!--<a href="https://belaobela.com.bd/" class="btn btn-light  mr-1" style="color: #e3571a;">
                        <i class="fas fa-minus-square fa-lg"></i> Be a seller
                    </a>-->



                    <a href="{{ route('service_provider.create') }}" class="btn btn-light w-100  mr-1 {{ (Route::currentRouteName() =='service_provider.create') ? 'btnactive' : '' }}"
                        style="color: #e3571a; font-size:12px;">
                        <i class="fas fa-toolbox"></i> Be a Service Provider
                    </a>
                </ul>
            </div>
        </div>


        {{-- serach start --}}
        {{-- <div class="col-md-7">
                        <ul class="">
                            <li class="list-inline-item m-0">\
                                <a href="https://belaobela.com.bd/" class="btn btn-outline-light">
                                    Product Shop
                                </a>
                            </li>
                            <li class="list-inline-item m-0">
                                <a href="https://belaobela.com.bd/service" class="btn btn-outline-light" style="">
                                    Service Shop
                                </a>
                            </li>
                            <li class="list-inline-item m-0">
                                <a href="https://belaobela.com.bd/service" class="btn btn-outline-light" style="">
                                    Call for Product
                                </a>
                            </li>
                            <li class="list-inline-item m-0">
                                <a href="https://belaobela.com.bd/service" class="btn btn-outline-light" style="">
                                    Call for Service
                                </a>
                            </li>
                            <li class="list-inline-item m-0">
                                <a href="https://belaobela.com.bd/service" class="btn btn-outline-light" style="">
                                    Be a seller
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://belaobela.com.bd/service" class="btn btn-outline-light" style="">
                                    Be a Service Provider
                                </a>
                            </li>
                        </ul>
                    </div> --}}
        {{-- serach end --}}

        {{-- @if (Route::currentRouteName() != 'home')
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
        @endif --}}
    </div>
</div>
</header>
