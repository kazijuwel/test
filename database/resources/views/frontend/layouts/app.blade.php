<!DOCTYPE html>
@if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
    <html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @else
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        @endif
        <head>

            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta name="app-url" content="{{ getBaseURL() }}">
            <meta name="file-base-url" content="{{ getFileBaseURL() }}">

            <title>@yield('meta_title', get_setting('website_name').' | '.get_setting('site_motto'))</title>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="robots" content="index, follow">
            <meta name="description" content="@yield('meta_description', get_setting('meta_description') )" />
            <meta name="keywords" content="@yield('meta_keywords', get_setting('meta_keywords') )">

        @yield('meta')

        @if(!isset($detailedProduct) && !isset($shop) && !isset($page))
            <!-- Schema.org markup for Google+ -->
                <meta itemprop="name" content="{{ config('app.name', 'Laravel') }}">
                <meta itemprop="description" content="{{ get_setting('meta_description') }}">
                <meta itemprop="image" content="{{ uploaded_asset(get_setting('meta_image')) }}">

                <!-- Twitter Card data -->
                <meta name="twitter:card" content="product">
                <meta name="twitter:site" content="@publisher_handle">
                <meta name="twitter:title" content="{{ config('app.name', 'Laravel') }}">
                <meta name="twitter:description" content="{{ get_setting('meta_description') }}">
                <meta name="twitter:creator" content="@author_handle">
                <meta name="twitter:image" content="{{ uploaded_asset(get_setting('meta_image')) }}">

                <!-- Open Graph data -->
                <meta property="og:title" content="{{ config('app.name', 'Laravel') }}" />
                <meta property="og:type" content="website" />
                <meta property="og:url" content="{{ route('home') }}" />
                <meta property="og:image" content="{{ uploaded_asset(get_setting('meta_image')) }}" />
                <meta property="og:description" content="{{ get_setting('meta_description') }}" />
                <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
                <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
        @endif

        <!-- Favicon -->
            <link rel="icon" href="{{ uploaded_asset(get_setting('site_icon')) }}">

            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

            <!-- CSS Files -->
            <link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css') }}">
            @if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
                <link rel="stylesheet" href="{{ static_asset('assets/css/bootstrap-rtl.min.css') }}">
            @endif
            <link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css') }}">
            <link rel="stylesheet" href="{{ static_asset('assets/css/css-linearicons.css') }}">
            <link rel="stylesheet" href="{{ static_asset('assets/css/custom-style.css') }}">
            <!--style-->
            {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
            <link rel="stylesheet" href="{{ asset('public/cp/plugins/select2/css/select2.min.css') }}">
            <link rel="stylesheet" href="{{ asset('public/cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"> --}}

            <script>
                var AIZ = AIZ || {};
            </script>

            <style>
                body{
                    font-family: 'Open Sans', sans-serif;
                    font-weight: 400;
                }
                :root{
                    --primary: {{ get_setting('base_color', '#e62d04') }};
                    --hov-primary: {{ get_setting('base_hov_color', '#c52907') }};
                    --soft-primary: {{ hex2rgba(get_setting('base_color','#e62d04'),.15) }};
                }
                .pre-footer a {
                    color:
                        #282828;
                }
                .common-none{
                    display:none;
                }

                /* slider end*//*your custom css goes here*/

                /* Popup box BEGIN */
                .hover_bkgr_fricc{
                    background:rgba(0,0,0,.4);
                    cursor:pointer;
                    display:none;
                    height:100%;
                    position:fixed;
                    text-align:center;
                    top:0;
                    width:100%;
                    z-index:10000;
                }
                .hover_bkgr_fricc .helper{
                    display:inline-block;
                    height:100%;
                    vertical-align:middle;
                }
                .hover_bkgr_fricc > div {
                    background-color: #fff;
                    box-shadow: 10px 10px 60px #555;
                    display: inline-block;
                    height: auto;
                    max-width: 551px;
                    min-height: 100px;
                    vertical-align: middle;
                    width: 60%;
                    position: relative;
                    border-radius: 8px;
                    padding: 15px 5%;
                }
                .popupCloseButton {
                    background-color: #fff;
                    border: 3px solid #999;
                    border-radius: 50px;
                    cursor: pointer;
                    display: inline-block;
                    font-family: arial;
                    font-weight: bold;
                    position: absolute;
                    top: -20px;
                    right: -20px;
                    font-size: 25px;
                    line-height: 30px;
                    width: 30px;
                    height: 30px;
                    text-align: center;
                }
                .popupCloseButton:hover {
                    background-color: #ccc;
                }
                .trigger_popup_fricc {
                    cursor: pointer;
                    font-size: 20px;
                    margin: 20px;
                    display: inline-block;
                    font-weight: bold;
                }
                #popup_banner_1{
                    padding-top: 0px;
                    width: 594px;
                    margin-left: -14px;
                    margin-top: -13px;
                }
                #pop_up_1 p{
                    text-align: left;
                    margin-left: 0px;
                    padding: 15px;
                }
                #pop_up_1{
                    border: 3px solid #f16522;
                    padding: 10px;
                    padding-left:14px;
                    max-width: 600px !important;
                    min-height: 600px !important;
                    border-radius:50% !important;
                }
                .popupCloseButton{
                    margin-right: 100px;
                    margin-top: 69px;
                    height: 33px;
                    width: 34px;
                    padding-right: 1px;
                }
                .g-3{
                    padding-left: 128px;
                    padding-top: 10px;
                }
                #popup_email{
                    margin-left: 3px;
                    padding-right: 13px;
                }
                #popup_mobile{
                    margin-left: -4px;
                    width: 102%;
                }
                #popup_comment{
                    margin-left: -23px;
                    width: 191px;
                }
                #popup_submit{
                    margin-top: 10px;
                }
                #second_popup_div{
                    display:none;
                }
                #first_popup_div{
                    display:none;
                }

                /* Popup box END */

                @media screen and (max-width: 992px) {
                    #pop_up_1 {
                        padding: 10px;
                        padding-left: 14px;
                        max-width: 600px !important;
                        min-height: 447px !important;
                        border-radius: 50% !important;
                    }
                    #popup_banner_1 {
                        padding-top: 0px;
                        width: 453px;
                        margin-left: -13px;
                        margin-top: -11px;
                    }
                    .popupCloseButton {
                        margin-right: 94px;
                        margin-top: 38px;
                    }
                    .g-3{
                        padding-left: 63px;
                        padding-top: 10px;
                    }
                }

                @media screen and (max-width: 600px) {
                    #pop_up_1{
                        padding: 10px;
                        padding-left: 14px;
                        max-width: 216px !important;
                        min-height: 216px !important;
                        border-radius: 50% !important;
                        border: 2px solid #f16522;
                    }
                    /* #popup_banner_1 {
                        padding-top: 1px;
                        width: 204px;
                        margin-left: -10px;
                    } */
                    #popup_banner_1 {
                        padding-top: 1px;
                        width: 212px;
                        margin-left: -14px;
                    }

                    #pop_up_1 p {
                        text-align: left;
                        margin-left: 0px;
                        padding: 0;
                        font-size: 9px
                    }
                    #pop_up_1 a{
                        margin-top: -8px;
                        font-size: 9px;
                        height: 16px;
                        width: 92px;
                        padding-bottom: 13px;
                        padding-top: 0px;
                    }
                    .popupCloseButton {
                        padding-right: 0px;
                        height: 32px;
                        width: 32px;
                        margin-right: 42px;
                        margin-top: 19px;
                    }

                    .g-3{
                        padding-left: 12px;
                        padding-top: 0px;
                        margin-top: -8px;
                    }

                    .col-auto b{
                        font-size: 9px;
                    }
                    #popup_name{
                        width: 101px;
                        height: 1px;
                        font-size: 10px;
                        padding: 8px;
                    }
                    #popup_email{
                        width: 101px;
                        height: 1px;
                        font-size: 10px;
                        padding: 8px;
                        margin-left: 1px;
                    }
                    #popup_mobile{
                        width: 101px;
                        height: 1px;
                        font-size: 10px;
                        padding: 8px;
                    }
                    #popup_comment{
                        width: 101px;
                        height: 1px;
                        font-size: 10px;
                        margin-left: -18px;
                        padding: 8px;
                    }
                    #popup_submit {
                        margin-top: 0px;
                        height: 10px;
                        padding-top: 0px;
                        padding-bottom: 12px;
                        padding-left: 10px;
                        width: 51px;
                        font-size: 9px;
                        margin-left: 14px;
                    }

                }

            </style>


            @if (\App\BusinessSetting::where('type', 'google_analytics')->first()->value == 1)
            <!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('TRACKING_ID') }}"></script>

                <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag(){dataLayer.push(arguments);}
                    gtag('js', new Date());
                    gtag('config', '{{ env('TRACKING_ID') }}');
                </script>
            @endif

            @if (\App\BusinessSetting::where('type', 'facebook_pixel')->first()->value == 1)
            <!-- Facebook Pixel Code -->
                <script>
                    !function(f,b,e,v,n,t,s)
                    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                        n.queue=[];t=b.createElement(e);t.async=!0;
                        t.src=v;s=b.getElementsByTagName(e)[0];
                        s.parentNode.insertBefore(t,s)}(window, document,'script',
                        'https://connect.facebook.net/en_US/fbevents.js');
                    fbq('init', '{{ env('FACEBOOK_PIXEL_ID') }}');
                    fbq('track', 'PageView');
                </script>
                <noscript>
                    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id={{ env('FACEBOOK_PIXEL_ID') }}/&ev=PageView&noscript=1"/>
                </noscript>
                <!-- End Facebook Pixel Code -->
            @endif

            @php
                echo get_setting('header_script');
            @endphp

            @yield('css')

        </head>
        <body>


        <!-- Second popup div section start here -->

        <form class="form form-horizontal mar-top" action="{{route('survey_popup.store')}}" method="POST" enctype="multipart/form-data" id="choice_form_1">
            @csrf
            @if (\App\Models\Popup::where('type', '1')->where('popup_type',2)->where('status',1)->first() != null)
                <div class="hover_bkgr_fricc"  id="second_popup_div">
                    <span class="helper"></span>
                    <div id="pop_up_1" style="">
                        <div class="popupCloseButton" onclick="close_popup();">&times;</div>
                        @if (\App\Models\Popup::where('type', '1')->where('popup_type',2)->where('status',1)->first() != null)
                            <img id="popup_banner_1" src="{{url('public/images/'.App\Models\Popup::where('type',1)->where('popup_type',2)->where('status',1)->first()->image)}}">
                            <p>
                                {{App\Models\Popup::where('type',1)->where('popup_type',2)->where('status',1)->first()->description}}
                            </p>
                        @endif

                        <div class="row g-3 align-items-center" style="margin-top: -2px;">
                            <div class="col-auto">
                                <label for="inputPassword6" class="col-form-label"><b>Name</b></label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="name" id="popup_name" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="inputPassword6" class="col-form-label"><b>Email</b></label>
                            </div>
                            <div class="col-auto">
                                <input type="email" name="email" id="popup_email" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="inputPassword6" class="col-form-label"><b>Mobile</b></label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="mobile" id="popup_mobile" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="inputPassword6" class="col-form-label"><b>Comment</b></label>
                            </div>
                            <div class="col-auto">
                                <textarea type="text" name="comment" id="popup_comment" class="form-control" aria-describedby="passwordHelpInline" required></textarea>
                            </div>
                        </div>

                        <button target="_blank" href="
            @if(!empty(App\Models\Popup::where('type',1)->where('status',1)->first()->link))
                        {{App\Models\Popup::where('type',1)->where('status',1)->first()->link}}
                        @endif
                            " class="btn btn-success" id="popup_submit">Submit</button>
                    </div>
                </div>
            @endif
        </form>

        <!-- Second popup div section end here -->


        <!-- aiz-main-wrapper -->
        <div class="aiz-main-wrapper d-flex flex-column">

            <!-- Header -->
            @include('frontend.inc.nav')

            @yield('content')

            @include('frontend.inc.footer')

        </div>

        @if (get_setting('show_cookies_agreement') == 'on')
            <div class="aiz-cookie-alert shadow-xl">
                <div class="p-3 bg-dark rounded">
                    <div class="text-white mb-3">
                        @php
                            echo get_setting('cookies_agreement_text');
                        @endphp
                    </div>
                    <button class="btn btn-primary aiz-cookie-accepet">
                        {{ translate('Ok. I Understood') }}
                    </button>
                </div>
            </div>
        @endif

        @include('frontend.partials.modal')

        <div class="modal fade" id="addToCart">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
                <div class="modal-content position-relative">
                    <div class="c-preloader text-center p-3">
                        <i class="las la-spinner la-spin la-3x"></i>
                    </div>
                    <button type="button" class="close absolute-top-right btn-icon close z-1" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la-2x">&times;</span>
                    </button>
                    <div id="addToCart-modal-body">

                    </div>
                </div>
            </div>
        </div>

        @yield('modal')

        <!-- SCRIPTS -->
        <script src="{{ static_asset('assets/js/vendors.js') }}"></script>
        <script src="{{ static_asset('assets/js/aiz-core.js') }}"></script>


        <script type="text/javascript">

            // master script for popup start here
            var current_url = window.location.href;
            var referel_url = document.referrer;
            var APP_URL = {!! json_encode(url('/')) !!}+'/';
            // alert(referel_url);

            if(current_url === APP_URL){

                if(referel_url !== APP_URL && referel_url !== "http://localhost/"){
                    $('#second_popup_div').show();
                }
                else{
                    var time = <?php if(!empty(App\Models\Popup::where('type',1)->where('popup_type',1)->where('status',1)->first())){ echo App\Models\Popup::where('type',1)->where('popup_type',1)->where('status',1)->first()->showing_time ;}else{
                        echo 0;
                    } ?>;
                    if (time !== 0){
                        setTimeout(
                            function() {
                                $('#first_popup_div').show();

                            }, time*1000);
                    }
                }

            }

            else{

            }

            function close_popup(){
                $('.hover_bkgr_fricc').hide();
            }
            function show_second_popup(){
                $('#second_popup_div').show();
            }

            $("#search").keyup(function(){
                setTimeout(
                    function() {
                        var search_value = $('.search-nothing').html();
                        if(search_value !== ""){
                            show_second_popup();
                        }
                    },3500);
        });



            // var message = "Please cancel and fill-up the survey Form";
            // window.onbeforeunload = function(event) {
            //     var e = e || window.event;
            //     if (e) {
            //         e.returnValue =   false;
            //     }
            //     return $('#second_popup_div').show();
            // };

            // master script for popup end here

        </script>



        // @if (get_setting('facebook_chat') == 1)
        //     <script type="text/javascript">
        //         window.fbAsyncInit = function() {
        //             FB.init({
        //                 xfbml            : true,
        //                 version          : 'v3.3'
        //             });
        //         };

        //         (function(d, s, id) {
        //             var js, fjs = d.getElementsByTagName(s)[0];
        //             if (d.getElementById(id)) return;
        //             js = d.createElement(s); js.id = id;
        //             js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        //             fjs.parentNode.insertBefore(js, fjs);
        //         }(document, 'script', 'facebook-jssdk'));
        //     </script>
        //     <div id="fb-root"></div>
        //     <!-- Your customer chat code -->
        //     <div class="fb-customerchat"
        //          attribution=setup_tool
        //          page_id="{{ env('FACEBOOK_PAGE_ID') }}">
        //     </div>
        // @endif

        <script>
            @foreach (session('flash_notification', collect())->toArray() as $message)
            AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
            @endforeach
        </script>


        <script>


            $(document).ready(function() {
                $('.category-nav-element').each(function(i, el) {
                    $(el).on('mouseover', function(){
                        if(!$(el).find('.sub-cat-menu').hasClass('loaded')){
                            $.post('{{ route('category.elements') }}', {_token: AIZ.data.csrf, id:$(el).data('id')}, function(data){
                                $(el).find('.sub-cat-menu').addClass('loaded').html(data);
                            });
                        }
                    });
                });
                if ($('#lang-change').length > 0) {
                    $('#lang-change .dropdown-menu a').each(function() {
                        $(this).on('click', function(e){
                            e.preventDefault();
                            var $this = $(this);
                            var locale = $this.data('flag');
                            $.post('{{ route('language.change') }}',{_token: AIZ.data.csrf, locale:locale}, function(data){
                                location.reload();
                            });

                        });
                    });
                }

                if ($('#currency-change').length > 0) {
                    $('#currency-change .dropdown-menu a').each(function() {
                        $(this).on('click', function(e){
                            e.preventDefault();
                            var $this = $(this);
                            var currency_code = $this.data('currency');
                            $.post('{{ route('currency.change') }}',{_token: AIZ.data.csrf, currency_code:currency_code}, function(data){
                                location.reload();
                            });

                        });
                    });
                }
            });

            $('#search').on('keyup', function(){
                search();
            });

            $('#search').on('focus', function(){
                search();
            });

            function search(){
                var searchKey = $('#search').val();
                if(searchKey.length > 0){
                    $('body').addClass("typed-search-box-shown");

                    $('.typed-search-box').removeClass('d-none');
                    $('.search-preloader').removeClass('d-none');
                    $.post('{{ route('search.ajax') }}', { _token: AIZ.data.csrf, search:searchKey}, function(data){
                        if(data == '0'){
                            // $('.typed-search-box').addClass('d-none');
                            $('#search-content').html(null);
                            $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for <strong>"'+searchKey+'"</strong>');
                            $('.search-preloader').addClass('d-none');

                        }
                        else{
                            $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                            $('#search-content').html(data);
                            $('.search-preloader').addClass('d-none');
                        }
                    });
                }
                else {
                    $('.typed-search-box').addClass('d-none');
                    $('body').removeClass("typed-search-box-shown");
                }
            }

            function updateNavCart(){
                $.post('{{ route('cart.nav_cart') }}', {_token: AIZ.data.csrf }, function(data){
                    $('#cart_items').html(data);
                });
            }

            function removeFromCart(key){
                $.post('{{ route('cart.removeFromCart') }}', {_token: AIZ.data.csrf, key:key}, function(data){
                    updateNavCart();
                    $('#cart-summary').html(data);
                    AIZ.plugins.notify('success', 'Item has been removed from cart');
                    $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())-1);
                });
            }

            function addToCompare(id){
                $.post('{{ route('compare.addToCompare') }}', {_token: AIZ.data.csrf, id:id}, function(data){
                    $('#compare').html(data);
                    AIZ.plugins.notify('success', "{{ translate('Item has been added to compare list') }}");
                    $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html())+1);
                });
            }

            function addToWishList(id){
                @if (Auth::check() && (Auth::user()->user_type == 'customer' || Auth::user()->user_type == 'seller'))
                $.post('{{ route('wishlists.store') }}', {_token: AIZ.data.csrf, id:id}, function(data){
                    if(data != 0){
                        $('#wishlist').html(data);
                        AIZ.plugins.notify('success', "{{ translate('Item has been added to wishlist') }}");
                    }
                    else{
                        AIZ.plugins.notify('warning', "{{ translate('Please login first') }}");
                    }
                });
                @else
                AIZ.plugins.notify('warning', "{{ translate('Please login first') }}");
                @endif
            }

            function showAddToCartModal(id){
                if(!$('#modal-size').hasClass('modal-lg')){
                    $('#modal-size').addClass('modal-lg');
                }
                $('#addToCart-modal-body').html(null);
                $('#addToCart').modal();
                $('.c-preloader').show();
                $.post('{{ route('cart.showCartModal') }}', {_token: AIZ.data.csrf, id:id}, function(data){
                    $('.c-preloader').hide();
                    $('#addToCart-modal-body').html(data);
                    AIZ.plugins.slickCarousel();
                    AIZ.plugins.zoom();
                    AIZ.extra.plusMinus();
                    getVariantPrice();
                });
            }

            $('#option-choice-form-selected').on('change', function(){

                var seller_shipping_id = $(this).val();
                var newPrice = $(this).children(':selected').data('price');
                var type = $(this).children(':selected').data('type');


                $("#seller_shipping_id").val(seller_shipping_id);
                $("#seller_shipping_type").val(type);
                /*$("#flat_shipping_cost").val(newPrice);*/
                if(newPrice <= 0){
                    $("#flat_shipping_cost").val(newPrice);
                    /*$("#flat_shipping_cost").val(newPrice);*/
                    $("#flat_shipping_cost").prop('readonly', true);
                    $("#chang").hide();
                }else{
                    $("#flat_shipping_cost").prop('readonly', false);
                    $("#chang").show();


                    /*  $("#flat_shipping_cost").val(newPrice);*/
                }



            });

            $('#option-choice-form input').on('change', function(){
                getVariantPrice();
            });

            function getVariantPrice(){
                if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()){
                    $.ajax({
                        type:"POST",
                        url: '{{ route('products.variant_price') }}',
                        data: $('#option-choice-form').serializeArray(),
                        success: function(data){
                            $('#option-choice-form #chosen_price_div').removeClass('d-none');
                            $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                            $('#available-quantity').html(data.quantity);
                            $('.input-number').prop('max', data.quantity);
                            //console.log(data.quantity);
                            if(parseInt(data.quantity) < 1 && data.digital  == 0){
                                $('.buy-now').hide();
                                $('.add-to-cart').hide();
                            }
                            else{
                                $('.buy-now').show();
                                $('.add-to-cart').show();
                            }
                        }
                    });
                }
            }

            function checkAddToCartValidity(){
                var names = {};
                $('#option-choice-form input:radio').each(function() { // find unique names
                    names[$(this).attr('name')] = true;
                });
                var count = 0;
                $.each(names, function() { // then count them
                    count++;
                });

                if($('#option-choice-form input:radio:checked').length == count){
                    return true;
                }

                return false;
            }

            function addToCart(){
                if(checkAddToCartValidity()) {
                    $('#addToCart').modal();
                    $('.c-preloader').show();
                    $.ajax({
                        type:"POST",
                        url: '{{ route('cart.addToCart') }}',
                        data: $('#option-choice-form').serializeArray(),
                        success: function(data){
                            $('#addToCart-modal-body').html(null);
                            $('.c-preloader').hide();
                            $('#modal-size').removeClass('modal-lg');
                            $('#addToCart-modal-body').html(data.view);
                            updateNavCart();
                            $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
                        }
                    });
                }
                else{
                    AIZ.plugins.notify('warning', 'Please choose all the options');
                }
            }

            function buyNow(){
                if(checkAddToCartValidity()) {
                    $('#addToCart-modal-body').html(null);
                    $('#addToCart').modal();
                    $('.c-preloader').show();
                    $.ajax({
                        type:"POST",
                        url: '{{ route('cart.addToCart') }}',
                        data: $('#option-choice-form').serializeArray(),
                        success: function(data){
                            if(data.status == 1){
                                updateNavCart();
                                $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
                                window.location.replace("{{ route('cart') }}");
                            }
                            else{
                                $('#addToCart-modal-body').html(null);
                                $('.c-preloader').hide();
                                $('#modal-size').removeClass('modal-lg');
                                $('#addToCart-modal-body').html(data.view);
                            }
                        }
                    });
                }
                else{
                    AIZ.plugins.notify('warning', 'Please choose all the options');
                }
            }

            function show_purchase_history_details(order_id)
            {
                $('#order-details-modal-body').html(null);

                if(!$('#modal-size').hasClass('modal-lg')){
                    $('#modal-size').addClass('modal-lg');
                }

                $.post('{{ route('purchase_history.details') }}', { _token : AIZ.data.csrf, order_id : order_id}, function(data){
                    $('#order-details-modal-body').html(data);
                    $('#order_details').modal();
                    $('.c-preloader').hide();
                });
            }

            function show_order_details(order_id)
            {
                $('#order-details-modal-body').html(null);

                if(!$('#modal-size').hasClass('modal-lg')){
                    $('#modal-size').addClass('modal-lg');
                }

                $.post('{{ route('orders.details') }}', { _token : AIZ.data.csrf, order_id : order_id}, function(data){
                    $('#order-details-modal-body').html(data);
                    $('#order_details').modal();
                    $('.c-preloader').hide();
                });
            }

            function cartQuantityInitialize(){
                $('.btn-number').click(function(e) {
                    e.preventDefault();

                    fieldName = $(this).attr('data-field');
                    type = $(this).attr('data-type');
                    var input = $("input[name='" + fieldName + "']");
                    var currentVal = parseInt(input.val());

                    if (!isNaN(currentVal)) {
                        if (type == 'minus') {

                            if (currentVal > input.attr('min')) {
                                input.val(currentVal - 1).change();
                            }
                            if (parseInt(input.val()) == input.attr('min')) {
                                $(this).attr('disabled', true);
                            }

                        } else if (type == 'plus') {

                            if (currentVal < input.attr('max')) {
                                input.val(currentVal + 1).change();
                            }
                            if (parseInt(input.val()) == input.attr('max')) {
                                $(this).attr('disabled', true);
                            }

                        }
                    } else {
                        input.val(0);
                    }
                });

                $('.input-number').focusin(function() {
                    $(this).data('oldValue', $(this).val());
                });

                $('.input-number').change(function() {

                    minValue = parseInt($(this).attr('min'));
                    maxValue = parseInt($(this).attr('max'));
                    valueCurrent = parseInt($(this).val());

                    name = $(this).attr('name');
                    if (valueCurrent >= minValue) {
                        $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
                    } else {
                        alert('Sorry, the minimum value was reached');
                        $(this).val($(this).data('oldValue'));
                    }
                    if (valueCurrent <= maxValue) {
                        $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
                    } else {
                        alert('Sorry, the maximum value was reached');
                        $(this).val($(this).data('oldValue'));
                    }


                });
                $(".input-number").keydown(function(e) {
                    // Allow: backspace, delete, tab, escape, enter and .
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                        // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                        // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
            }

            function imageInputInitialize(){
                $('.custom-input-file').each(function() {
                    var $input = $(this),
                        $label = $input.next('label'),
                        labelVal = $label.html();

                    $input.on('change', function(e) {
                        var fileName = '';

                        if (this.files && this.files.length > 1)
                            fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                        else if (e.target.value)
                            fileName = e.target.value.split('\\').pop();

                        if (fileName)
                            $label.find('span').html(fileName);
                        else
                            $label.html(labelVal);
                    });

                    // Firefox bug fix
                    $input
                        .on('focus', function() {
                            $input.addClass('has-focus');
                        })
                        .on('blur', function() {
                            $input.removeClass('has-focus');
                        });
                });
            }

        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('body').append('<div class="toTopImg text-center" style="display:none"> <i class="la la-angle-up la-flip-horizontal la-1x"></i><br><span style="text-align:center;font-size: 11px; margin-left: -2px;">TOP</span></div>');
                $(window).scroll(function () {
                    if ($(this).scrollTop() != 0) {
                        $('.toTopImg').fadeIn();
                    } else {
                        $('.toTopImg').fadeOut();
                    }
                });
                $('.toTopImg').click(function(){
                    $("html, body").animate({ scrollTop: 0 }, 600);
                    return false;
                });
            });
            
            
        function doc_keyUp(e) {
        // this would test for whichever key is 40 (down arrow) and the ctrl key at the same time
        if (e.ctrlKey + e.altKey && e.keyCode == '67') {

        window.location.href = "{{ route('clear_cache')}}";
        // call your function to do the thing 
            }
        }
        // register the handler 
        document.addEventListener('keyup', doc_keyUp, false);
        </script>

        @yield('script')

        @php
            echo get_setting('footer_script');
        @endphp

        </body>
        </html>
