@extends('frontend.layouts.app')

@section('content')
    {{-- Categories , Sliders . Today's deal --}}
<!-- popup div section start here -->
@if(!empty(App\Models\Popup::where('type',1)->where('popup_type',1)->where('status',1)->first()->description))
<div class="hover_bkgr_fricc" id="first_popup_div">
    <span class="helper"></span>
    <div id="pop_up_1" style="">
        <div class="popupCloseButton" onclick="close_popup();">&times;</div>
        <img id="popup_banner_1" src="{{url('public/images/'.App\Models\Popup::where('type',1)->where('popup_type',1)->where('status',1)->first()->image)}}">
        <p style="">
        @if(!empty(App\Models\Popup::where('type',1)->where('popup_type',1)->where('status',1)->first()->description))
        {{App\Models\Popup::where('type',1)->where('popup_type',1)->where('status',1)->first()->description}}
        @endif
        </p>
        <a target="_blank" href="
            @if(!empty(App\Models\Popup::where('type',1)->where('popup_type',1)->where('status',1)->first()->link))
            {{App\Models\Popup::where('type',1)->where('popup_type',1)->where('status',1)->first()->link}}
            @endif
            " class="btn btn-success">Click here>></a>
    </div>
</div>
@endif

<!-- popup div section end here -->

    <div class="home-banner-area mb-4 pt-3">
        <div class="container">
            <div class="row gutters-10 position-relative">
                <div class="col-lg-3 position-static d-none d-lg-block">
                    @include('frontend.partials.category_menu')
                </div>

                @php
                    $num_todays_deal = count(filter_products(\App\Product::where('published', 1)->where('todays_deal', 1 ))->get());

                @endphp

                <div class="@if(get_setting('home_banner1_images') != null) col-lg-7 @else col-lg-9 @endif">
                    @if (get_setting('home_slider_images') != null)
                        <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true" data-infinite="true">
                            @php $slider_images = json_decode(get_setting('home_slider_images'), true);  @endphp
                            @foreach ($slider_images as $key => $value)
                                <div class="carousel-box">
                                    <a href="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                                        <img
                                            class="d-block mw-100 lazyload img-fit rounded shadow-sm"
                                            src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                            data-src="{{ uploaded_asset($slider_images[$key]) }}"
                                            alt="{{ env('APP_NAME')}} promo"

                                            height="457"

                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                                        >
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>

                {{-- start Side banner section --}}
                @if (get_setting('home_banner1_images') != null)
                <div class="col-xs-6 col-lg-2 order-3 mt-3 mt-lg-0 bannerresponsive">

                        @php $banner_1_imags = json_decode(get_setting('home_banner1_images'));   $count = 0; @endphp
                        @foreach ($banner_1_imags as $key => $value)
                            <?php if($count == 2) break; ?>
                    <a href="{{ json_decode(get_setting('home_banner1_links'), true)[$key] }}"><img  alt="{{ env('APP_NAME') }} promo" class="bannerimg banner-area img-responsive lazyload bannerpaddingright" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_1_imags[$key]) }}"/></a>
                                <?php $count++; ?>
                        @endforeach

                </div>
                @endif
                {{-- end Side banner section --}}
                {{-- end Side banner sectionnn --}}

            </div>
        </div>
    </div>


    {{-- Banner section 1 --}}
<!--     @if (get_setting('home_banner1_images') != null)
    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @php $banner_1_imags = json_decode(get_setting('home_banner1_images'));
      $count = 0;
    @endphp
                @foreach ($banner_1_imags as $key => $value)
                    <?php if($count == 8) break; ?>
                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="{{ json_decode(get_setting('home_banner1_links'), true)[$key] }}" class="d-block text-reset">
                                <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_1_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
 -->
    <!--popular Category start-->
    <section class="mb-4">
        <div class="container">
            <div class="row gutters-10">

                    <div class="col-lg-12">
                         <center><div class="d-flex mb-3 align-items-baseline border-bottom">
                    <div class="col-md-12">
                        <h2 class="h5 fw-700 mb-0" style="text-algin:center">
                            {{ translate('Popular By Choice') }}
                        </h2>
                        <h6 class="py-10px"><span class="border-primary border-width-2 pb-0 d-inline-block">Categories our customers love to check out</span></h6>
                    </div>
            </div></center>
                        <div class="row gutters-5">
                            @php
                                $featured_categories = \App\Category::where('featured', 1)->get();
                            @endphp

                            @foreach ($featured_categories as $key => $category)

                                    <div class="col-sm-2 col-6">

                                        <a  onclick="this.style.opacity=0.3" style="min-height: 110px;" href="{{ route('products.category', $category->slug) }}" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >
                                        {{-- <a style="min-height: 110px;" href="{{ route('products.category', $category->slug) }}" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2"> --}}
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-12 text-center">
                                                    <img
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($category->icon) }}"
                                                        alt="{{ $category->getTranslation('name') }}"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                                                    >
                                                    <div class="text-truncat-2 pl-3 fs-13 fw-500 text-center">{{ $category->getTranslation('name') }}</div>
                                                </div>


                                            </div>
                                        </a>
                                    </div>

                            @endforeach
                        </div>
                    </div>


            </div>
        </div>
    </section>
    <!-- popular Category end-->


    {{-- Flash Deal --}}
    @php
        $flash_deal = \App\FlashDeal::where('status', 1)->where('featured', 1)->where('stock_or_flash',1)->first();
    @endphp
    @if($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date)
    <section class="mb-4">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">

                <div class="d-flex flex-wrap mb-3 align-items-baseline border-bottom">
                    <div class="col-md-12" style="text-align: center">

                        <h3 class="h5 fw-700 mb-0" >
                            <span class="border-width-2 pb-3 d-inline-block">{{ translate('Flash Deal') }}</span>
                        </h3>
                    </div>

                    <div class="ml-auto ml-lg-8 align-items-center"><span><strong>Ending in</strong></span></div><div class="aiz-count-down flashdealmaginright pb-2"  data-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                    <a href="{{ route('flash-deal-details', $flash_deal->slug) }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto">{{ translate('View More') }}</a>

                </div>

                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                    @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                        @php
                            $product = \App\Product::find($flash_deal_product->product_id);
                        @endphp
                        @if ($product != null && $product->published != 0)
                            <div class="carousel-box">
                                <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                    <div class="position-relative">
                                        <a href="{{ route('product', $product->slug) }}" class="d-block">
                                            <img
                                                class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                                alt="{{  $product->getTranslation('name')  }}"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                            >
                                        </a>
                                        <div class="absolute-top-right aiz-p-hov-icon">
                                            <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                                                <i class="la la-heart-o"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="addToCompare({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to cart') }}" data-placement="left">
                                                <i class="las la-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-md-3 p-2 text-left">
                                        <div class="fs-15">
                                            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>
                                            @endif
                                            <span class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                        </div>
                                        <div class="rating rating-sm mt-1">
                                            {{ renderStarRating($product->rating) }}
                                        </div>
                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                            <a href="{{ route('product', $product->slug) }}" class="d-block text-reset">{{  $product->getTranslation('name')  }}</a>
                                        </h3>
                                        @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                                            <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                                {{ translate('Club Point') }}:
                                                <span class="fw-700 float-right">{{ $product->earn_point }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif


    {{-- Stock Out Offer --}}
    @php
        $flash_deal = \App\FlashDeal::where('status', 1)->where('featured', 1)->where('stock_or_flash',2)->first();
    @endphp
    @if($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date)
    <section class="mb-4">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">

                <div class="d-flex flex-wrap mb-3 align-items-baseline border-bottom">
                    <div class="col-md-12" style="text-align: center">
                    <h3 class="h5 fw-700 mb-0">
                        <span class="border-width-2 pb-3 d-inline-block">{{ translate('Stock Out Offer') }}</span>
                    </h3>
                    </div>
                    <div class="ml-auto ml-lg-8 align-items-center"><span><strong>Ending in</strong></span></div><div class="aiz-count-down flashdealmaginright pb-2"  data-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                    <a href="{{ route('flash-deal-details', $flash_deal->slug) }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto">{{ translate('View More') }}</a>
                </div>

                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                    @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                        @php
                            $product = \App\Product::find($flash_deal_product->product_id);
                        @endphp
                        @if ($product != null && $product->published != 0)
                            <div class="carousel-box">
                                <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                    <div class="position-relative">
                                        <a href="{{ route('product', $product->slug) }}" class="d-block">
                                            <img
                                                class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                                alt="{{  $product->getTranslation('name')  }}"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                            >
                                        </a>
                                        <div class="absolute-top-right aiz-p-hov-icon">
                                            <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                                                <i class="la la-heart-o"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="addToCompare({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to cart') }}" data-placement="left">
                                                <i class="las la-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-md-3 p-2 text-left">
                                        <div class="fs-15">
                                            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>
                                            @endif
                                            <span class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                        </div>
                                        <div class="rating rating-sm mt-1">
                                            {{ renderStarRating($product->rating) }}
                                        </div>
                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                            <a href="{{ route('product', $product->slug) }}" class="d-block text-reset">{{  $product->getTranslation('name')  }}</a>
                                        </h3>
                                        @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                                            <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                                {{ translate('Club Point') }}:
                                                <span class="fw-700 float-right">{{ $product->earn_point }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif


{{-- Start Daily Deal Section --}}
    @php
        $num_todays_deal = count(filter_products(\App\Product::where('published', 1)->where('todays_deal', 1 ))->get());

    @endphp
    @if($num_todays_deal > 0)
    <section class="mb-4">
    <div class="container">
        <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
            <center><div class="d-flex mb-3 align-items-baseline border-bottom">
                    <div class="col-md-12">
                        <h3 class="h5 fw-700 mb-0" style="text-algin:center">
                            {{ translate('Daily Deal') }}
                        </h3>
                        <h6 class="py-10px"><span class="border-primary border-width-2 pb-0 d-inline-block">Great Saving Every Day</span></h6>
                    </div>
            </div></center>
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                @foreach (filter_products(\App\Product::where('published', 1)->where('todays_deal', '1'))->limit(12)->get() as $key => $product)
                <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="{{ route('product', $product->slug) }}" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-140px h-md-210px"
                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                    alt="{{  $product->getTranslation('name')  }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                >
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="addToCompare({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
                                    <i class="las la-sync"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to cart') }}" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                    <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>
                                @endif
                                <span class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                {{ renderStarRating($product->rating) }}
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                <a href="{{ route('product', $product->slug) }}" class="d-block text-reset">{{  $product->getTranslation('name')  }}</a>
                            </h3>

                            @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                    {{ translate('Club Point') }}:
                                    <span class="fw-700 float-right">{{ $product->earn_point }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
    @endif

{{-- End Daily Deal Section --}}


    {{-- Best Selling as feature now....  --}}
    <div id="section_best_selling">

    </div>



    {{-- Featured Section as Best selling now.... --}}
    <div id="section_featured">

    </div>

 
    {{-- Upcoming Section --}}
    <div id="section_upcoming">

    </div>

    {{-- Pre Order Section --}}
    {{-- <div id="section_pre_order">

    </div> --}}


    {{-- Banner Section 2 --}}
    @if (get_setting('home_banner2_images') != null)
    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @php $banner_2_imags = json_decode(get_setting('home_banner2_images')); @endphp
                @foreach ($banner_2_imags as $key => $value)
                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="{{ json_decode(get_setting('home_banner2_links'), true)[$key] }}" class="d-block text-reset">
                                <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_2_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- Category wise Products --}}
    <div id="section_home_categories">

    </div>

    {{-- Classified Product --}}
    @if(\App\BusinessSetting::where('type', 'classified_product')->first()->value == 1)
        @php
            $customer_products = \App\CustomerProduct::where('status', '1')->where('published', '1')->take(10)->get();
        @endphp
           @if (count($customer_products) > 0)
               <section class="mb-4">
                   <div class="container">
                       <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                            <div class="d-flex mb-3 align-items-baseline border-bottom">
                                <h3 class="h5 fw-700 mb-0">
                                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Classified Ads') }}</span>
                                </h3>
                                <a href="{{ route('customer.products') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View More') }}</a>
                            </div>
                           <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                               @foreach ($customer_products as $key => $customer_product)
                                   <div class="carousel-box">
                                        <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                            <div class="position-relative">
                                                <a href="{{ route('customer.product', $customer_product->slug) }}" class="d-block">
                                                    <img
                                                        class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($customer_product->thumbnail_img) }}"
                                                        alt="{{ $customer_product->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                    >
                                                </a>
                                                <div class="absolute-top-left pt-2 pl-2">
                                                    @if($customer_product->conditon == 'new')
                                                       <span class="badge badge-inline badge-success">{{translate('new')}}</span>
                                                    @elseif($customer_product->conditon == 'used')
                                                       <span class="badge badge-inline badge-danger">{{translate('Used')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="p-md-3 p-2 text-left">
                                                <div class="fs-15 mb-1">
                                                    <span class="fw-700 text-primary">{{ single_price($customer_product->unit_price) }}</span>
                                                </div>
                                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="{{ route('customer.product', $customer_product->slug) }}" class="d-block text-reset">{{ $customer_product->getTranslation('name') }}</a>
                                                </h3>
                                            </div>
                                       </div>
                                   </div>
                               @endforeach
                           </div>
                       </div>
                   </div>
               </section>
           @endif
       @endif

    {{-- Banner Section 2 --}}
    @if (get_setting('home_banner3_images') != null)
    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @php $banner_3_imags = json_decode(get_setting('home_banner3_images')); @endphp
                @foreach ($banner_3_imags as $key => $value)
                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="{{ json_decode(get_setting('home_banner3_links'), true)[$key] }}" class="d-block text-reset">
                                <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_3_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- Best Seller --}}
   <!--  @if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
    <div id="section_best_sellers">

    </div>
    @endif -->

    {{-- Top 10 Brands --}}

    <!--our band start-->
      @php $top10_brands = json_decode(get_setting('top10_brands')); @endphp

   <!--  <section class="mb-4">
    <div class="container">

           <div class="col-md-12" style="text-align:center">
               <h2 class="h5 fw-700 mb-3" style="text-algin:center">
                  Our Brand
               </h2>

       </div>
        <div class="px-2 py-4 px-md-4 py-md-3 "  style="border:1px solid #dddd">

        <div class="col-md-12">
            <section class="customer-logos slider">
                @foreach ($top10_brands as $key => $value)
                    @php $brand = \App\Brand::find($value); @endphp
                    @if ($brand != null)
                <div class="slide"><img
                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                        data-src="{{ uploaded_asset($brand->logo) }}"
                        alt="{{ $brand->getTranslation('name') }}"
                        class="img-fluid img lazyload h-60px"
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                    ></div>
                    @endif
                @endforeach
            </section>
        </div>

    </div>
    </div>
    </section> -->
    <!--our band end-->


    <!--our product line start-->

    <div class="container py-md-4">
        <div class="col-md-12" style="text-align:center">
            <h2 class="h5 fw-700 mb-3" style="text-algin:center">
                Our Product Line
            </h2>

        </div>
        <div class="px-2 py-4 px-md-4 py-md-3 "  style="border:1px solid #dddd">
            <div class="col-md-12 col-md-12">
                @php
                        $featured_categories = \App\Category::where('parent_id', 0)->get();
                        $count = 0;
                        @endphp


                <p style="text-align:justify">
                    @foreach ($featured_categories as $key => $category)
                        <?php if($count == 30) break; ?>
                        <a style="color: #1b1b28;" href="{{ route('products.category', $category->slug) }}"><strong> {{ $category->getTranslation('name') }}</strong></a> | <?php $count++; ?>
                        @endforeach</p>


            </div>
        </div>

    </div>
    <!--our product line end-->

    <!--our trusted Corporate client start-->
    <!-- <div class="container py-md-4">
        <div class="col-md-12" style="text-align:center">
            <h2 class="h5 fw-700 px-2 py-4 px-md-4 py-md-3 " style="text-algin:center">
                Trusted Corporate Client
            </h2>

        </div>
        <div class="px-2 py-4 px-md-4 py-md-3 "  style="border:1px solid #dddd">
        <div class="col-md-12">
            <section class="customer-logos slider">

                <div class="slide"><img src="{{ static_asset('assets/img/corporate-client/c1.png') }}" style="width:68%; height:60px"></div>
                <div class="slide"><img src="{{ static_asset('assets/img/corporate-client/c2.png') }}" style="width:68%; height:60px"></div>
                <div class="slide"><img src="{{ static_asset('assets/img/corporate-client/c3.png') }}" style="width:68%; height:60px"></div>
                <div class="slide"><img src="{{ static_asset('assets/img/corporate-client/siemens-healthineers.png') }}" style="width:68%; height:60px"></div>
                <div class="slide"><img src="{{ static_asset('assets/img/corporate-client/rfl-logo.png') }}" style="width:68%; height:60px"></div>
                <div class="slide"><img src="{{ static_asset('assets/img/corporate-client/c1.png') }}" style="width:68%; height:60px"></div>
                <div class="slide"><img src="{{ static_asset('assets/img/corporate-client/epic.png') }}" style="width:68%; height:60px"></div>
                <div class="slide"><img src="{{ static_asset('assets/img/corporate-client/c2.png') }}" style="width:68%; height:60px"></div>
                <div class="slide"><img src="{{ static_asset('assets/img/corporate-client/sonali-bank.png') }}" style="width:68%; height:60px"></div>
                <div class="slide"><img src="{{ static_asset('assets/img/corporate-client/rfl-logo.png') }}" style="width:68%; height:60px"></div>
            </section>
        </div>
        </div>

    </div> -->
    <!--our trusted Corporate client end-->

   <!--  {{-- Top 10 categories and Brands --}} -->


@endsection

@section('script')

    <script>
      $(document).ready(function(){
            $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_selling') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });


            $.post('{{ route('home.section.upcoming') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_upcoming').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('{{ route('home.section.pre_order') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_pre_order').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('{{ route('home.section.home_categories') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });

            @if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
            $.post('{{ route('home.section.best_sellers') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_sellers').html(data);
                AIZ.plugins.slickCarousel();
            });
            @endif
        });

        /*  our band start*/
    $(document).ready(function(){
        $('.customer-logos').slick({
            slidesToShow: 8,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
    /*  our band end*/
    </script>
@endsection
