{{-- <section class=" border-top mt-auto" style="background: #fcf2ed;">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-12">
                <ul class="list-inline mb-0 list-inline  justify-content-between justify-content-lg-start mb-0 pre-footer fs-16">
                    <li class="list-inline-item mr-3 pb-2 pt-2"><a href="{{ route('terms') }}">Terms of Use</a></li>
                    <!-- <li class="list-inline-item mr-3 pb-2 pt-2"><a href="">Return Policy</a></li> -->
                    <li class="list-inline-item mr-3 pb-2 pt-2"><a href="{{ route('privacypolicy') }}">Privacy policy</a></li>
                    <li class="list-inline-item mr-3 pb-2 pt-2"><a href="{{ route('supportpolicy') }}">FAQ</a></li>

                </ul>

            </div>
        </div>
    </div>
</section> --}}
{{-- <section class=" border-top mt-auto pb-1 pt-3" style="background: #fbeae0;">
    <div class="container">
        <div class="row no-gutters">

            <div class="col-lg-2 col-md-6 pb-3">
                <div class="newsletter_text text_white">
                    <h5 style="font-size: 18px;"> Signup to Newsletter</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-2">
            <form method="POST" action="{{ route('subscribers.store') }}">
                @csrf
                <div class="input-group">
                    <input type="email" class="border-0 border-lg form-control" id="search" name="email" placeholder="Enter you email here..." autocomplete="off">
                    <div class="input-group-append d-none d-lg-block">
                        <button style="color: black;" class="btn btn-primary" type="submit">
                            <b>SUBMIT</b>
                        </button>
                    </div>
                </div>
            </form>
            </div>
            <div class="col-lg-6  col-md-6 pb-2 text-right">
                @if (get_setting('payment_method_images') != null)
                    @foreach (explode(',', get_setting('payment_method_images')) as $key => $value)
                <img class="img-fit" src="{{ uploaded_asset($value) }}" style="width:80%">
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section> --}}
<style>

    </style>
<!--<section class="mt-auto pb-1 pt-2" style="background: #FD6500; margin:0px 80px 0px 70px;">-->
<!--    <div class="container-fluid">-->
<!--        <div class="row no-gutters d-flex justify-content-beween align-items-center">-->
<!--            <div class="col-lg-4 col-md-3">-->
<!--                <div class="d-flex justify-content-beween align-items-center" style="margin-left: 50px;">-->
<!--                    {{-- <img src="{{ asset('public/images/email.svg') }}" class=""  height="50px"> --}}-->
<!--                    <i style="font-size:30px;" class="fa-solid fa-bullhorn text-white"></i>-->
<!--                    <h5 style="font-size: 15px; color: white; margin-left: 20px;"> Signup and <br>-->
<!--                        <span style="font-size:20px; color: white;">Get 100 tk coupon code</span>-->
<!--                    </h5>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="col-lg-6  col-md-5">-->
<!--                <div style="margin-left: 45px;">-->
<!--                    <span style="font-size: 22px; color: white;"> সাইন আপ করলেই পাচ্ছেন ১০০ টাকার কুপন কোড</span>-->
<!--                    <br>-->
<!--                    <span style="font-size: 12px; color: white; margin-left:100px;">সবাই মিলে একসাথে কেনাকাটা করি বেলা অবেলাতে</span>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="col-lg-2 col-md-5">-->
               <!-- <form method="POST" action="{{ route('subscribers.store') }}">
<!--                    @csrf-->
<!--                    <div class="input-group d-flex align-items-center" style="width: 400px; margin-left: 65px;">-->
<!--                        <input type="email" class="border-0 border-lg form-control" id="search" name="email"-->
<!--                            placeholder="Enter you email here..." autocomplete="off"-->
<!--                            style="border-radius: 41px; position: relative;">-->
<!--                        <button class="btn btn-primary footer-email-button" type="submit"-->
<!--                            style="display: inline-flex; position:absolute; right:0; height: 35px; width: 35px; border-radius: 50%; justify-content: center; align-items: center; margin:4px; background-color:#52555C; border-color: #52555C">-->
<!--                            <i class="fas fa-paper-plane"></i>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </form>-->

<!--                <a href="{{ route('user.registration') }}" class=" py-2 btn btn-primary d-block m-1" style="color:white; margin-left:10px;" ><i-->
<!--                                                    class="fas fa-sign-in-alt"></i> {{ translate('Sign Up ') }}</a>-->






<!--            </div>-->

<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<section class="mt-auto pb-1 pt-3" style="background: white;">
    <div class="container">
        <div class="row no-gutters d-flex justify-content-beween align-items-center">
            <div class="col-lg-4 col-md-6">
                @if (get_setting('payment_method_images') != null)
                    @foreach (explode(',', get_setting('payment_method_images')) as $key => $value)
                        <img class="img-fit" src="{{ uploaded_asset($value) }}" style="width:80%">
                    @endforeach
                @endif
            </div>

            <div class="col-lg-4 col-md-6">
                <a class="d-block py-20 mr-0 text-center" href="{{ route('home') }}">
                    <img src="{{ asset('public/images/logo2.png') }}" alt="Logo" width="300px">
                </a>
            </div>

            <div class="col-lg-4  col-md-6 text-right">
                <div class="findusmore text-center">
                    <ul class="list-inline my-3 my-md-0 social colored fs-16">
                        <li class="list-inline-item">
                            <span class="font-weight-bold"> Find Us On </span>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://facebook.com/belaobelabd" target="_blank" class="facebook"><i
                                    class="lab la-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://twitter.com/Bela_Obela" target="_blank" class="twitter"><i
                                    class="lab la-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/belaobela.com.bd" target="_blank"
                                class="instagram"><i class="lab la-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.youtube.com/channel/UCTD1TS761RVrX9H9OSJTogg?sub_confirmation=1"
                                target="_blank" class="youtube"><i class="lab la-youtube"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.linkedin.com/company/belaobela" target="_blank"
                                class="linkedin"><i class="lab la-linkedin-in"></i></a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>


<section class=" py-3 text-white" style="background: #ffff; " >
    <div class="container">
        <div class="row">


{{-- --------- --}}









{{-- ----        <div class="col-6">

            @if (get_setting('widget_one_labels') != null)
                @foreach (json_decode(get_setting('widget_one_labels'), true) as $key => $value)
        @if ($key == 4)
        </div>
        <div class="col-6">
            @endif
            <a href="{{ json_decode(get_setting('widget_one_links'), true)[$key] }}">

                <div class="find_item">
                    <p>{{ $value }}
                        <span class="float-right">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </p>

                </div>
            </a>
            @endforeach
        </div>
        @endif --}}

            <div class="col-lg-4 col-xl-4  text-md-left">

                <div class=" text-md-left mt-4">
                    <h4 style="color:black;"class="fs-13 text-uppercase fw-600 border-bottom border-gray-400 pb-2 mb-4 fs-18">
                        {{ get_setting('widget_one') }}
                    </h4>
                    <ul class="list-unstyled fs-16" style="display:grid;grid-column-gap:10px;color:black;">
                        @if (get_setting('widget_one_labels') != null)
                            @foreach (json_decode(get_setting('widget_one_labels'), true) as $key => $value)
                               <li>
                                    <a class=" text-reset"
                                        href="{{ json_decode(get_setting('widget_one_links'), true)[$key] }}">
                                        {{ $value }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                        <li>
                            <a class=" text-reset"
                                href="{{ route('sitemapPage')}}">
                               Sitemap
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-xl-4  text-md-left">
                <div class="text-md-left mt-4">
                    <h4 style="color:black; " class="fs-13 text-uppercase fw-600 border-bottom border-gray-400 pb-2 mb-4 fs-18">
                        Phone & Email
                    </h4>
                    {{-- <ul class="list-unstyled fs-16">
                        @php
                        $featured_categories = \App\Category::where('featured', 1)->get();
                        $count = 0;
                        {{-- @endphp --}}
                    </ul>
                   <ul class="list-unstyled border border-secondary px-2 border-bottom-0 border-right-0 border-top-0 px-2" style="color:black;">
                        <!-- <li style="color:black; " class="mb-2">
                           <span  >
                                    {{ get_setting('contact_phone') }}</span>

                        </li> -->
                        <li style="padding-bottom:14px;"><a href="tel:+88-02-41031891"> phone +88-02-41031891 </a></li>
                        <li style="padding-bottom:14px;" ><a href="tel:+88-01870-728000">For Sales Inquiry +88-01870-728000 </a></li>
                        <li style="padding-bottom:14px;" ><a href="tel:+88-01870-728001">For Service Inquiry +88-01870-728001</a></li>
                        <li style="padding-bottom:14px;" ><a href="tel:+88-01870-728002">For Delivery Support +88-01870-728002</a> </li>
                         <li style="color:black; " >
                                <span class="d-block ">{{ translate('Email') }}: <a
                                        href="mailto:{{ get_setting('contact_email') }}"
                                        class="text-reset ">{{ get_setting('contact_email') }}</a></span>



                            </li>


                    </ul>

                </div>
            </div>
            <div class="col-lg-4 ml-xl-auto col-md-4 mr-0">
                <!--
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                        Contact Info
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <span class="d-block opacity-30">Address:</span>
                            <span class="d-block opacity-70">8/2, Motalib Tower (1st floor) Flat-2C, Paribag Dhaka-1000, Bangladesh</span>
                        </li>
                        <li class="mb-2">
                            <span class="d-block opacity-30">Phone:</span>
                            <span class="d-block opacity-70">01841-695 -695, 0181-1446778, 0184-7327607</span>
                        </li>
                        <li class="mb-2">
                            <span class="d-block opacity-30">Email:</span>
                            <span class="d-block opacity-70">
                           <a href="mailto:support@orient.com.bd" class="text-reset">support@orient.com.bd</a>
                        </span>
                        </li>
                    </ul>
                </div>-->
                {{-- <div class=" text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-400 pb-2 mb-4 fs-18">
                        KEEP IN TOUCH
                    </h4>
                    <ul class="list-inline my-3 my-md-0 social colored fs-16">
                         @if (get_setting('facebook_link') != null)
                        <li class="list-inline-item">
                            <a href="{{ get_setting('facebook_link') }}" target="_blank" class="facebook"><i class="lab la-facebook-f"></i></a>
                        </li>
                        @endif
                        @if (get_setting('twitter_link') != null)
                        <li class="list-inline-item">
                            <a href="{{ get_setting('twitter_link') }}" target="_blank" class="twitter"><i class="lab la-twitter"></i></a>
                        </li>
                        @endif
                        @if (get_setting('instagram_link') != null)
                        <li class="list-inline-item">
                            <a href="{{ get_setting('instagram_link') }}" target="_blank" class="instagram"><i class="lab la-instagram"></i></a>
                        </li>
                        @endif
                        @if (get_setting('youtube_link') != null)
                        <li class="list-inline-item">
                            <a href="{{ get_setting('youtube_link') }}" target="_blank" class="youtube"><i class="lab la-youtube"></i></a>
                        </li>
                        @endif
                        @if (get_setting('linkedin_link') != null)
                        <li class="list-inline-item">
                            <a href="{{ get_setting('linkedin_link') }}" target="_blank" class="linkedin"><i class="lab la-linkedin-in"></i></a>
                        </li>
                        @endif
                    </ul>
                </div> --}}
                {{-- <div class=" text-md-left pt-3 fs-16">
                    @php
                        echo get_setting('frontend_copyright_text');
                    @endphp
                </div> --}}
                <div class="text-md-left pt-1 fs-16">
                    <div class="text-center text-md-left mt-4">
                        <h4 style="color:black; " class="fs-18 text-uppercase fw-600 border-bottom border-gray-400 pb-2 mb-4">
                            {{ translate('Contact Info') }}
                        </h4>
                        <ul class="list-unstyled border border-secondary px-2 border-bottom-0 border-right-0 border-top-0 px-2">
                            <li style="color:black; " class="mb-2">
                                <span class="d-block">{{ translate('Address') }}:</span>
                                <span class="d-block">{{ get_setting('contact_address') }}</span>
                            </li>
                            <!--<li style="color:black; " class="mb-2">-->
                            <!--    <span class="d-block ">{{ translate('Email') }}: <a-->
                            <!--            href="mailto:{{ get_setting('contact_email') }}"-->
                            <!--            class="text-reset ">{{ get_setting('contact_email') }}</a></span>-->



                            <!--</li>-->
                            <li>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14608.050387610867!2d90.3947394!3d23.7469302!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x172ec8bb567c8be5!2sBelaobela.com.bd!5e0!3m2!1sen!2sbd!4v1652946913835!5m2!1sen!2sbd"
                            width="300" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </li>
                        </ul>
                    </div>
                </div>



            </div>

        </div>
    </div>
</section>

<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white shadow-lg border-top">
    <div class="d-flex justify-content-around align-items-center">
        <a href="{{ route('home') }}"
            class="text-reset flex-grow-1 text-center py-3 border-right {{ areActiveRoutes(['home'], 'bg-soft-primary') }}">
            <i class="las la-home la-2x"></i>
        </a>
        <a href="{{ route('categories.all') }}"
            class="text-reset flex-grow-1 text-center py-3 border-right {{ areActiveRoutes(['categories.all'], 'bg-soft-primary') }}">
            <span class="d-inline-block position-relative px-2">
                <i class="las la-list-ul la-2x"></i>
            </span>
        </a>
        <a href="{{ route('cart') }}"
            class="text-reset flex-grow-1 text-center py-3 border-right {{ areActiveRoutes(['cart'], 'bg-soft-primary') }}">
            <span class="d-inline-block position-relative px-2">
                <i class="las la-shopping-cart la-2x"></i>
                @if (Session::has('cart'))
                    <span class="badge badge-circle badge-primary position-absolute absolute-top-right"
                        id="cart_items_sidenav">{{ count(Session::get('cart')) }}</span>
                @else
                    <span class="badge badge-circle badge-primary position-absolute absolute-top-right"
                        id="cart_items_sidenav">0</span>
                @endif
            </span>
        </a>
        @if (Auth::check())
            @if (isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="text-reset flex-grow-1 text-center py-2">
                    <span class="avatar avatar-sm d-block mx-auto">
                        @if (Auth::user()->photo != null)
                            <img src="{{ custom_asset(Auth::user()->avatar_original) }}">
                        @else
                            <img src="{{ static_asset('assets/img/avatar-place.png') }}">
                        @endif
                    </span>
                </a>
            @else
                <a href="javascript:void(0)" class="text-reset flex-grow-1 text-center py-2 mobile-side-nav-thumb"
                    data-toggle="class-toggle" data-target=".aiz-mobile-side-nav">
                    <span class="avatar avatar-sm d-block mx-auto">
                        @if (Auth::user()->photo != null)
                            <img src="{{ custom_asset(Auth::user()->avatar_original) }}">
                        @else
                            <img src="{{ static_asset('assets/img/avatar-place.png') }}">
                        @endif
                    </span>
                </a>
            @endif
        @else
            <a href="{{ route('user.login') }}" class="text-reset flex-grow-1 text-center py-2">
                <span class="avatar avatar-sm d-block mx-auto">
                    <img src="{{ static_asset('assets/img/avatar-place.png') }}">
                </span>
            </a>
        @endif
    </div>
</div>

@if (Auth::check() && !isAdmin())
    <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
        <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-target=".aiz-mobile-side-nav"
            data-same=".mobile-side-nav-thumb"></div>
        <div class="collapse-sidebar bg-white">
            @include('frontend.inc.user_side_nav')
        </div>
    </div>
@endif

<section class="border-top mb-3" style="background: #FD6500;">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-12 text-center">
                <ul class="list-inline mb-0 list-inline  justify-content-between justify-content-lg-start mb-0 pre-footer fs-16">
                    <li class="list-inline-item  pb-2 pt-2"><a style="color: white; font-size: 14px; ">Copyright © Bela Obela</a></li>
                    <!-- <li class="list-inline-item mr-3 pb-2 pt-2"><a href="">Return Policy</a></li> -->
                    <!--@if (Route::currentRouteName() == 'home')-->
                    <!--<li class="list-inline-item  pb-2 pt-2"><a style=" font-family: tahoma; color: white;  font-size: 14px;" >Bela Obela.All right reserved</a></li>-->
                    <!--@else-->
                    <!--    <li class="list-inline-item mr-3 pb-2 pt-2"><a style=" font-family: fantasy; background: -webkit-linear-gradient(#17ff00 20%,  red); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 14px;" >Orient Bd Limited</a></li>-->
                    <!--@endif-->
                </ul>

            </div>
        </div>
    </div>
</section>
