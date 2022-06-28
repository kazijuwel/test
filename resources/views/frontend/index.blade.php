@extends('frontend.layouts.app')

@section('content')

    {{-- Categories , Sliders . Today's deal --}}
    @if (!empty(
        App\Models\Popup::where('type', 1)->where('popup_type', 1)->where('status', 1)->first()->description
    ))
        <div class="hover_bkgr_fricc" id="first_popup_div">
            <span class="helper"></span>
            <div id="pop_up_1" style="">
                <div class="popupCloseButton" onclick="close_popup();">&times;</div>
                <img id="popup_banner_1"
                    src="{{ url(
                        'public/images/' .
                            App\Models\Popup::where('type', 1)->where('popup_type', 1)->where('status', 1)->first()->image,
                    ) }}">
                <p style="">
                    @if (!empty(
                        App\Models\Popup::where('type', 1)->where('popup_type', 1)->where('status', 1)->first()->description
                    ))
                        {{ App\Models\Popup::where('type', 1)->where('popup_type', 1)->where('status', 1)->first()->description }}
                    @endif
                </p>
                <a target="_blank" href="             @if (!empty(
                    App\Models\Popup::where('type', 1)->where('popup_type', 1)->where('status', 1)->first()->link
                )) {{ App\Models\Popup::where('type', 1)->where('popup_type', 1)->where('status', 1)->first()->link }} @endif
                        " class="btn btn-success">Click here>></a>
            </div>
        </div>
    @endif


    <div class="home-banner-area">
        <div class="container">
            <div class="row gutters-10 position-relative">
                <div class="col-md-3 position-static d-none d-lg-block">
                    @include('frontend.partials.category_menu')
                </div>

                @php
                    $num_todays_deal = count(filter_products(\App\Product::where('published', 1)->where('todays_deal', 1))->get());
                @endphp

                {{-- Banner --}}

                <div class="@if (get_setting('home_banner1_images') != null) col-lg-7 @else col-lg-9 @endif">
                    @if (get_setting('home_slider_images') != null)
                        <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true"
                            data-dots="true" data-autoplay="true" data-infinite="true">
                            @php $slider_images = json_decode(get_setting('home_slider_images'), true);  @endphp
                            @foreach ($slider_images as $key => $value)
                                <div class="carousel-box">
                                    <a href="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                                        <img class="d-block mw-100 lazyload img-fit rounded shadow-sm"
                                            src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                            data-src="{{ uploaded_asset($slider_images[$key]) }}"
                                            alt="{{ env('APP_NAME') }} promo" height="457"
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- start Side banner section --}}
                @if (get_setting('home_banner1_images') != null)
                    {{-- <div class="col-xs-6 col-lg-2 order-3 mt-3 mt-lg-0 bannerresponsive"> --}}
                    <div class="col-xs-6 col-lg-2 order-3 mt-3 mt-lg-0 bannerresponsive" style="height: 165px;">

                        @php
                            $banner_1_imags = json_decode(get_setting('home_banner1_images'));
                            $count = 0;
                        @endphp
                        @foreach ($banner_1_imags as $key => $value)
                            <?php if ($count == 2) {
                                break;
                            } ?>
                            <a href="{{ json_decode(get_setting('home_banner1_links'), true)[$key] }}"><img
                                    alt="{{ env('APP_NAME') }} promo"
                                    class="bannerimg banner-area img-responsive lazyload bannerpaddingright"
                                    src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                    data-src="{{ uploaded_asset($banner_1_imags[$key]) }}" /></a>
                            <?php $count++; ?>
                        @endforeach
                    </div>
                @endif
                {{-- </div> --}}
                {{-- <div style=" min-height:100%; position:fixed; overflow-y:scroll; overflow-x:hidden; right:-10px;">
                    <ul class="list-group text-center m-0 align-items-center" style="width: 40px;">
                        <li class="list-group-item" style="background-color: #FD6500;"><a
                                href="https://belaobela.com.bd/cart"><i class="fa fa-shopping-cart text-white"></i></a></li>
                        <li class="list-group-item" style="background-color: #FD6500;"><a
                                href="https://facebook.com/belaobelabd">
                                <i class="fab fa-facebook text-white"></i></a></li>
                        <li class="list-group-item" style="background-color: #FD6500;"><a
                                href="https://www.instagram.com/belaobela.com.bd">
                                <i class="fab fa-instagram text-white"></i></a></li>
                        <li class="list-group-item" style="background-color: #FD6500;"><a
                                href="https://belaobela.com.bd/"><i class="fas fa-shopping-bag text-white"></i></a>
                        </li>
                        <li class="list-group-item" style="background-color: #FD6500;"><a
                                href="{{ route('service.create') }}"><i class="fas fa-tools text-white"></i></a>
                        </li>
                          <li class="list-group-item" style="background-color: #FD6500;"><a
                                href="{{ route('service.create') }}"><i class="fas fa-tools text-white"></i></a>
                        </li>
                        <li class="list-group-item" style="background-color: #FD6500;"><a href="#"><i
                                    class="fas fa-angle-double-up text-white"></i></a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
    <br>

    {{-- Banner section 1 --}}
    <!-- @if (get_setting('home_banner1_images') != null)
    <div class="mb-4">
                                                                                                                    <div class="container">
                                                                                                                        <div class="row gutters-10">
                                                                                                                            @php
                                                                                                                                $banner_1_imags = json_decode(get_setting('home_banner1_images'));
                                                                                                                                $count = 0;
                                                                                                                            @endphp ?> ?>

                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                           </div>
    @endif
                                                                                                             -------------------->

    {{-- 7 catagories --}}
    <!--popular Category start-------------------->
    @php
    $featured_categories = \App\Category::where('featured', 1)->get();
    @endphp
    <section class="container">
        <div class="categories-menu"
            style="background-color:#faf9f8;border-radius:7px;padding:15px;display: grid; grid-template-columns: repeat(6,16%);justify-content:space-around;grid-gap:10px;">
            @foreach ($featured_categories as $key => $category)
                <!--Category Item-------------------->
                <a onclick="this.style.opacity=0.3"
                    href="{{ route('products.category', $category->slug_2 ?? $category->slug) }}"
                    class="category d-flex flex-column align-items-center justify-content-center"
                    style="border: 1px solid #eee; border-radius: 7px; height:150px;background-color:white;">

                    <!-- Category Image-------------------->
                    <img src="{{ uploaded_asset($category->icon) }}" data-src="{{ uploaded_asset($category->icon) }}"
                        alt="{{ $category->getTranslation('name') }}" class="img-fluid category__img"
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                        style="width: 50px;">
                    <!-- Category Text -------------------->
                    <span class="category__text">
                        {{ $category->getTranslation('name') }}
                    </span>
                </a>
            @endforeach
        </div>

        <style>
            .categories-menu a:hover {
                box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
            }

            .category__text {
                font-size: .9em;
            }

            .category__text:hover {
                color: orange;
                font-size: .9em;
            }

        </style>
    </section>

    <!-- popular Category end-------------------->

    {{-- Love it banner --}}
    <!---New Banner----------------->
    <section>
        <div class="container">
            <div class="row">
                @if ($afterCategory->after_category()->count() > 0)
                    @if ($afterCategory->container_item_count == 1)
                        @foreach ($afterCategory->after_category()->take(1) as $ad)
                            <div class="col-md-12">
                                <div class="newbannerimgsds">
                                    <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                        <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}"
                                            alt="bannerImage" width="100%">
                                    </a>
                                </div>

                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @elseif($afterCategory->container_item_count == 2)
                        @foreach ($afterCategory->after_category()->take(2) as $ad)
                            <div class="col-md-6">
                                <div class="newbannerimgsds">
                                    <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                        <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}"
                                            alt="bannerImage" width="100%">
                                    </a>
                                </div>

                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </section>
    <!--- End New Banner----------------->


    {{-- Flash Deal --}}
    @php
    $flash_deal = \App\FlashDeal::where('status', 1)
        ->where('featured', 1)
        ->where('stock_or_flash', 1)
        ->first();
    @endphp
    @if ($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date)
        <section class="mb-2">
            <div class="container">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="d-flex flex-wrap mb-3 align-items-baseline border-bottom">
                        <div class="col-md-12" style="text-align: center">

                            <h3 class="h5 fw-700 mb-0">
                                <span class="border-width-2 pb-3 d-inline-block">{{ translate('Flash Deala') }}</span>
                            </h3>
                        </div>

                        <div class="ml-auto ml-lg-8 align-items-center"><span><strong>Ending in</strong></span></div>
                        <div class="aiz-count-down flashdealmaginright pb-2"
                            data-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                        <!--<a href="{{ route('flash-deal-details', $flash_deal->slug) }}"----------------->
                        <!--    class="ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto">{{ translate('View More') }}</a>----------------->

                    </div>

                    <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5"
                        data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'
                        data-infinite='true'>
                        @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                            @php
                                $product = \App\Product::find($flash_deal_product->product_id);
                            @endphp
                            @if ($product != null && $product->published != 0)
                                <div class="carousel-box">
                                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                        <div class="position-relative">
                                            <a href="{{ route('product', $product->slug_2 ?? $product->slug) }}"
                                                class="d-block">
                                                <img class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                    data-src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}"
                                                    alt="{{ $product->getTranslation('name') }}"
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                            </a>
                                            <div class="absolute-top-right aiz-p-hov-icon">
                                                <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})"
                                                    data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}"
                                                    data-placement="left">
                                                    <i class="la la-heart-o"></i>
                                                </a>
                                                <a href="javascript:void(0)" onclick="addToCompare({{ $product->id }})"
                                                    data-toggle="tooltip" data-title="{{ translate('Add to compare') }}"
                                                    data-placement="left">
                                                    <i class="las la-sync"></i>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    onclick="showAddToCartModal({{ $product->id }})"
                                                    data-toggle="tooltip" data-title="{{ translate('Add to cart') }}"
                                                    data-placement="left">
                                                    <i class="las la-shopping-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="p-md-3 p-2 text-left">
                                            <div class="fs-15">
                                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                    <del
                                                        class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>
                                                @endif
                                                <span
                                                    class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                            </div>
                                            <div class="rating rating-sm mt-1">
                                                {{ renderStarRating($product->rating) }}
                                            </div>
                                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                <a href="{{ route('product', $product->slug_2 ?? $product->slug) }}"
                                                    class="d-block text-reset">{{ $product->getTranslation('name') }}</a>
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
    {{-- @php
    $flash_deal = \App\FlashDeal::where('status', 1)
        ->where('featured', 1)
        ->where('stock_or_flash', 2)
        ->first();
    @endphp
    @if ($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date)
        <section class="mb-4">
            <div class="container">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">

                    <div class="d-flex flex-wrap mb-3 align-items-baseline border-bottom">
                        <div class="col-md-12" style="text-align: center">
                            <h3 class="h5 fw-700 mb-0">
                                <span
                                    class="border-width-2 pb-3 d-inline-block">{{ translate('Stock Out Offer') }}</span>
                            </h3>
                        </div>
                        <div class="ml-auto ml-lg-8 align-items-center"><span><strong>Ending in</strong></span></div>
                        <div class="aiz-count-down flashdealmaginright pb-2"
                            data-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                        <!--<a href="{{ route('flash-deal-details', $flash_deal->slug) }}"----------------->
                        <!--    class="ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto">{{ translate('View More') }}</a>----------------->
                    </div>

                    <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5"
                        data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'
                        data-infinite='true'>
                        @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                            @php
                                $product = \App\Product::find($flash_deal_product->product_id);
                            @endphp
                            @if ($product != null && $product->published != 0)
                                <div class="carousel-box">
                                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                        <div class="position-relative">
                                            <a href="{{ route('product', $product->slug) }}" class="d-block">
                                                <img class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                    data-src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}"
                                                    alt="{{ $product->getTranslation('name') }}"
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                            </a>
                                            <div class="absolute-top-right aiz-p-hov-icon">
                                                <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})"
                                                    data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}"
                                                    data-placement="left">
                                                    <i class="la la-heart-o"></i>
                                                </a>
                                                <a href="javascript:void(0)" onclick="addToCompare({{ $product->id }})"
                                                    data-toggle="tooltip" data-title="{{ translate('Add to compare') }}"
                                                    data-placement="left">
                                                    <i class="las la-sync"></i>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    onclick="showAddToCartModal({{ $product->id }})"
                                                    data-toggle="tooltip" data-title="{{ translate('Add to cart') }}"
                                                    data-placement="left">
                                                    <i class="las la-shopping-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="p-md-3 p-2 text-left">
                                            <div class="fs-15">
                                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                    <del
                                                        class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>
                                                @endif
                                                <span
                                                    class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                            </div>
                                            <div class="rating rating-sm mt-1">
                                                {{ renderStarRating($product->rating) }}
                                            </div>
                                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                <a href="{{ route('product', $product->slug) }}"
                                                    class="d-block text-reset">{{ $product->getTranslation('name') }}</a>
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
    @endif --}}
    <!--End New Banner----------------->


    {{-- Start Daily Deal Section --}}
    @php
    $num_todays_deal = count(filter_products(\App\Product::where('published', 1)->where('todays_deal', 1))->get());
    @endphp
    @if ($num_todays_deal > 0)
        <section class="mb-2">
            <div class="container">
                <div class="px-0 py-4 py-md-3 bg-white rounded">
                    <center>
                        <div class="d-flex align-items-baseline">
                            <h5><b>
                                    {{ translate('Daily Deal') }}</b>
                            </h5>
                            {{-- <h6 class="py-10px"><span
                                        class="border-primary border-width-2 pb-0 d-inline-block">Great Saving Every
                                        Day</span></h6> --}}
                            <a href="{{ route('all_products', ['type' => 'daily-deal']) }}"
                                class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">View More</a>
                        </div>
                    </center>

                    {{-- For hr tag --}}
                    <div class="" style="background-color: #FD6500; padding: 1px;">
                    </div>

                    {{-- <div class="aiz-carousel carosole1 gutters-10 half-outside-arrow mt-4" data-items="6" data-xl-items="4" as $key => $product)
                            <div class="carousel-box">
                                <div class="aiz-card-box border border-light rounded hov-shadow-md has-transition">
                                    <div class="position-relative">
                                        <a href="{{ route('product', $product->slug) }}" class="d-block">
                                            <img class="img-fit lazyload"
                                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                data-src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}"
                                                alt="{{ $product->getTranslation('name') }}"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                        </a>
                                        <div class="absolute-top-right aiz-p-hov-icon">
                                            <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})"
                                                data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}"
                                                data-placement="left">
                                                <i class="la la-heart-o"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="addToCompare({{ $product->id }})"
                                                data-toggle="tooltip" data-title="{{ translate('Add to compare') }}"
                                                data-placement="left">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})"
                                                data-toggle="tooltip" data-title="{{ translate('Add to cart') }}"
                                                data-placement="left">
                                                <i class="las la-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-md-3 p-2 text-left">
                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                            <a href="{{ route('product', $product->slug) }}"
                                                class="d-block text-reset">{{ $product->getTranslation('name') }}</a>
                                        </h3>
                                        <div class="fs-15">
                                            @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                <del
                                                    class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>
                                            @endif
                                            <span
                                                class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>{{ renderStarRating($product->rating) }}</span>
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>



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
                    </div> --}}


                    <div class="pt-4"
                        style="display:grid;grid-template-columns: 31.6% 33% 33%;grid-column-gap: 1.2%;grid-row-gap:10px;">
                        @foreach (filter_products(\App\Product::where('published', 1)->where('todays_deal', '1'))->limit(7)->get()
        as $key => $product)
                            @if ($loop->first)
                                <div class="mainDiv" style="position: relative;grid-row:1/4;height:100%;">
                                    <a href="{{ route('product', $product->slug_2 ?? $product->slug) }}"
                                        class="d-block" style="height:inherit">
                                        <div class="card mb-0" style="height: inherit">
                                            <div class="">
                                                <img class="text-center"
                                                    src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}" alt="image"
                                                    style="width: 100% ; position: relative;">
                                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                    <div class="discount"
                                                        style="position: absolute; top: 0; right:0; margin: 8px; text-align: left; ">
                                                        <img class=""
                                                            src="{{ asset('public/images/discount.svg') }}" alt=""
                                                            style="position: relative; width: 12%;">
                                                        <div class="d-flex justify-content-center align-items-center"
                                                            style="position: absolute;top: 10px; font-size: 10px; left:10px;  color: #FFF; font-weight: 700">
                                                            <span style="">{{ discount_perchent($product->id) }}%</span>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($product->delivery_free == true)
                                                    <div class="free_delivery"
                                                        style="position: absolute; top: 0; right:0; margin: 5px; text-align: right; ">

                                                        <img class=""
                                                            src="{{ asset('public/images/freedelivery.png') }}" alt=""
                                                            style="position: relative; width: 35%">


                                                    </div>
                                                @endif
                                            @else
                                                <div class="mainDiv" style="position: relative;">
                                                    <a href="{{ route('product', $product->slug_2 ?? $product->slug) }}"
                                                        class="d-block">
                                                        <div class="card mb-0">
                                                            <div class="media">
                                                                <div class="w3-display-container" style="width: 50%">
                                                                    <img class="text-center"
                                                                        src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}"
                                                                        alt="image"
                                                                        style="height: 185px; ; position: relative;">
                                                                    @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                                        <div class="discount"
                                                                            style="position: absolute; top: 0; right:0; margin: 8px; text-align: left; ">
                                                                            <img class=""
                                                                                src="{{ asset('public/images/discount.svg') }}"
                                                                                alt=""
                                                                                style="position: relative; width: 25%">
                                                                            <div class="d-flex justify-content-center align-items-center"
                                                                                style="position: absolute;top: 12px; font-size: 10px; left:10px;  color: #FFF; font-weight: 700">
                                                                                <span
                                                                                    style="">{{ discount_perchent($product->id) }}%</span>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($product->delivery_free == true)
                                                                        <div class="free_delivery"
                                                                            style="position: absolute; top: 0; right:0; margin: 5px; text-align: right; ">

                                                                            <img class=""
                                                                                src="{{ asset('public/images/freedelivery.png') }}"
                                                                                alt=""
                                                                                style="position: relative; width: 50%">

                                                                        </div>
                                                                    @endif
                                                                </div>
                            @endif
                            <div class="media-body">
                                <div class="p-md-3">
                                    <h5 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                        <span class="d-block text-reset">{{ $product->getTranslation('name') }}
                                        </span>
                                    </h5>
                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-27px" class="d-block text-reset">
                                        {{ $product->getTranslation('unit') }}

                                    </h3>

                                    <div class="fs-15">
                                        @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                            <del class="fw-600 opacity-50">{{ home_base_price($product->id) }}</del>
                                        @endif
                                        <span
                                            class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <span
                                            class="fw-700 float-right text-mute">{{ renderStarRating($product->rating) }}</span>

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </a>
                <div class="aiz-p-hov-icon productcarthover" style="padding: 7px;position: absolute;top:0; right:40px;">
                    <a class="w3-animate-right" href="javascript:void(0)" onclick="addToWishList({{ $product->id }})"
                        data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                        <i class="la la-heart-o"></i>
                    </a>
                    <a class="w3-animate-right" href="javascript:void(0)" onclick="addToCompare({{ $product->id }})"
                        data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
                        <i class="las la-sync"></i>
                    </a>
                    <a class="w3-animate-right" href="javascript:void(0)"
                        onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip"
                        data-title="{{ translate('Add to cart') }}" data-placement="left">
                        <i class="las la-shopping-cart"></i>
                    </a>
                </div>
            </div>
    @endforeach

    </div>

    </section>
    @endif

    {{-- End Daily Deal Section --}}

    {{-- Add 2 banner --}}
    @if ($dailyAd->bobAdItems()->count() > 0)
        <section class="mb-2">
            <div class="container">
                <div class="row" style="margin: 40px 0 40px 0;">
                    @if ($dailyAd->container_item_count == 1)
                        @foreach ($dailyAd->bobAdItems()->take(1) as $ad)
                            <div class="col-md-12 pl-0">
                                <a href="{{ $ad->url }}">
                                    <img src="{{ asset('public/images/001.jpg') }}" alt="images" height="100%"
                                        width="100%">
                                </a>
                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @elseif($dailyAd->container_item_count == 2)
                        @foreach ($dailyAd->bobAdItems()->take(2) as $ad)
                            <div class="col-md-6 pr-0">
                                <a href="{{ $ad->url }}">
                                    <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}" alt="images"
                                        height="100%" width="100%">
                                </a>
                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Best Selling as feature now.... --}}
    {{-- <div id="section_best_selling">

    </div> --}}

    {{-- 3 Banner --}}
    {{-- <section>
        <div class="container">
            <div class="row bg-white">
                <div class="col-md-4">
                    <div class="newbannerimgsds">
                        <img src="{{ asset('public/images/newbanner.png') }}" alt="bannerImage" width="100%">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="newbannerimgsds">
                        <img src="{{ asset('public/images/newbanner.png') }}" alt="bannerImage" width="100%">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="newbannerimgsds">
                        <img src="{{ asset('public/images/newbanner.png') }}" alt="bannerImage" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </section> --}}



    {{-- Featured Section as Best selling now.... --}}
    <div id="section_featured">

    </div>


    {{-- Add 2 banner --}}
    @if ($bestSellAd->bobAdItems()->count() > 0)
        <section class="mb-2">
            <div class="container">
                <div class="row" style="margin: 40px 0 40px 0;">
                    @if ($bestSellAd->container_item_count == 1)
                        @foreach ($bestSellAd->bobAdItems()->take(1) as $ad)
                            <div class="col-md-12">
                                <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                    <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}" alt="images"
                                        height="100%" width="100%">
                                </a>
                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @elseif ($bestSellAd->container_item_count == 2)
                        @foreach ($bestSellAd->bobAdItems()->take(2) as $ad)
                            <div class="col-md-6">
                                <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                    <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}" alt="images"
                                        height="100%" width="100%">
                                </a>

                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @elseif($bestSellAd->container_item_count == 3)
                        @foreach ($bestSellAd->bobAdItems()->take(3) as $ad)
                            <div class="col-md-4">
                                <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                    <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}" alt="images"
                                        height="100%" width="100%">
                                </a>
                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif


    {{-- Upcoming Section --}}
    <div id="section_upcoming">
    </div>

    {{-- Add 2 banner --}}
    @if ($upcomingAd->bobAdItems()->count() > 0)
        <section class="">
            <div class="container">
                <div class="row" style="margin: 40px 0 40px 0;">
                    @if ($upcomingAd->container_item_count == 1)
                        @foreach ($upcomingAd->bobAdItems()->take(1) as $ad)
                            <div class="col-md-12 pl-0">
                                <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                    <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}" alt="images"
                                        height="100%" width="100%">
                                </a>
                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @elseif($upcomingAd->container_item_count == 2)
                        @foreach ($upcomingAd->bobAdItems()->take(2) as $ad)
                            <div class="col-md-6 pr-0">
                                <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                    <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}" alt="images"
                                        height="100%" width="100%">
                                </a>
                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @elseif($upcomingAd->container_item_count == 3)
                        @foreach ($upcomingAd->bobAdItems()->take(3) as $ad)
                            <div class="col-md-4 pr-0">
                                <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                    <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}" alt="images"
                                        height="100%" width="100%">
                                </a>
                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Start News Products --}}
    <section class="">
        <div class="container">
            <div class="bg-white rounded">
                <center>
                    <div class="d-flex align-items-baseline">
                        <h5>
                            <b> {{ translate('New Products') }}</b>
                        </h5>
                        {{-- <h6 class="py-10px"><span class="border-primary border-width-2 pb-0 d-inline-block">Everything We Expect to See in 2021</span></h6> --}}
                        <a href="{{ route('all_products', ['type' => 'new-products']) }}"
                            class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">View More</a>
                    </div>
                </center>

                {{-- For hr tag --}}
                <div class="" style="background-color: #FD6500; padding: 1px;">
                </div>
                {{-- <hr style="background-color: #FD6500; padding: 0; height:2px"> --}}

                <div class="row mt-4">
                    <div class="col-md-3">
                        @if ($inNewProductAd->bobAdItems()->count() > 0)
                            @if ($inNewProductAd->container_item_count == 1)
                                @foreach ($inNewProductAd->bobAdItems()->take(1) as $ad)
                                    <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                        <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}"
                                            class="img-fluid">
                                    </a>
                                @endforeach
                            @endif
                        @endif

                    </div>
                    <div class="col-md-9">
                        <div class="row">

                            @foreach (filter_products(\App\Product::where('published', 1)->orderBy('id', 'desc'))->limit(6)->get()
        as $key => $product)
                                <div class="col-md-4 px-1 mainDiv">
                                    <a href="{{ route('product', $product->slug_2 ?? $product->slug) }}">
                                        <div class="card" style="height: 386px;">
                                            <div class="card-body">
                                                <img class="text-center"
                                                    src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}" alt="image"
                                                    style="width: 100% ; position: relative;">
                                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                    <div class="discount"
                                                        style="position: absolute; top: 0; right:0; margin: 8px; text-align: left; ">
                                                        <img class=""
                                                            src="{{ asset('public/images/discount.svg') }}" alt=""
                                                            style="position: relative; width: 15%">
                                                        <div class="d-flex justify-content-center align-items-center"
                                                            style="position: absolute;top: 10px; font-size: 10px;  left: 15px;  color: #fff; font-weight: 700">
                                                            <span style="">{{ discount_perchent($product->id) }}%</span>
                                                        </div>

                                                    </div>
                                                @endif
                                                @if ($product->delivery_free == true)
                                                    <div class="free_delivery"
                                                        style="position: absolute; top: 0; right:0; margin: 5px; text-align: right; ">

                                                        <img class=""
                                                            src="{{ asset('public/images/freedelivery.png') }}" alt=""
                                                            style="position: relative; width: 40%">

                                                    </div>
                                                @endif
                                                <h5 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <span
                                                        class="d-block text-reset">{{ $product->getTranslation('name') }}
                                                    </span>
                                                </h5>

                                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-27px"
                                                    class="d-block text-reset">{{ $product->getTranslation('unit') }}

                                                </h3>

                                                <div class="mt-2">
                                                    @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                        <del
                                                            class="fw-600 opacity-50">{{ home_base_price($product->id) }}</del>
                                                    @endif
                                                    <span
                                                        class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between mt-2">
                                                    <span
                                                        class="fw-700 float-right text-muted">{{ renderStarRating($product->rating) }}</span>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="aiz-p-hov-icon productcarthover"
                                        style="padding: 7px;position: absolute;top:0; right:40px;">
                                        <a class="w3-animate-right" href="javascript:void(0)"
                                            onclick="addToWishList({{ $product->id }})" data-toggle="tooltip"
                                            data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                                            <i class="la la-heart-o"></i>
                                        </a>
                                        <a class="w3-animate-right" href="javascript:void(0)"
                                            onclick="addToCompare({{ $product->id }})" data-toggle="tooltip"
                                            data-title="{{ translate('Add to compare') }}" data-placement="left">
                                            <i class="las la-sync"></i>
                                        </a>
                                        <a class="w3-animate-right" href="javascript:void(0)"
                                            onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip"
                                            data-title="{{ translate('Add to cart') }}" data-placement="left">
                                            <i class="las la-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- <div class="pt-4"  style="display:grid;grid-template-columns: 31% 33% 33%;grid-gap: 10px;">

                    @foreach (filter_products(\App\Product::where('published', 1)->where('featured', '1'))->take(7)->get()
    as $key => $product)
                            @if ($loop->first)
                                <div class="card mb-0" style="grid-row:1/4;">
                                <div class="">
                                    <div class="w3-display-container">
                                    <img class="text-center" src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}"
                                        alt="image" style="width: 100% ;">
                                        <div class="w3-display-topright">
                                    <i class="fas fa-splotch fa-2x float-right"  style="color: #FD6500; margin: 35px 35px 0px 0px"></i>
                                </div>
                                </div>

                            @else
                                <div class="card mb-0">
                                <div class="media">
                                    <div class="w3-display-container" style="width: 50%">
                                        <img class="mr-2 mt-0" src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}"
                                        alt="image" style="width: 100%">
                                        <div class="w3-display-topright">
                                            <i class="fas fa-splotch fa-2x float-right"  style="color: #FD6500; margin: 10px 25px 0px 0px"></i>
                                        </div>
                                    </div>

                             @endif
                                    <div class="media-body">
                                        <div class="p-md-3">
                                            <h5 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                <a href="{{ route('product', $product->slug) }}"
                                                    class="d-block text-reset">{{ $product->getTranslation('name') }}
                                                </a>
                                            </h5>

                                            <div class="fs-15">
                                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                    <del
                                                        class="fw-600 opacity-50">{{ home_base_price($product->id) }}</del>
                                                @endif
                                                <span
                                                    class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between mt-4">
                                                <span class="fw-700 float-right text-mute">{{ renderStarRating($product->rating) }}</span>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    @endforeach
                    </div>
                    </div>
                </div> --}}
    </section>

    {{-- End News Products --}}




    <!--our band end----------------->
    <!--our product line start----------------->
    <!--our product line end----------------->
    <!--our Brand----------------->
    <!--End Our Brand----------------->

    {{-- End News Products --}}


    {{-- Add 2 banner --}}
    @if ($newProductAd->bobAdItems()->count() > 0)
        <section class="">
            <div class="container">
                <div class="row" style="margin: 40px 0 40px 0;">
                    @if ($newProductAd->container_item_count == 1)
                        @foreach ($newProductAd->bobAdItems()->take(1) as $ad)
                            <div class="col-md-12 pl-0">
                                <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                    <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}"
                                        alt="images" height="100%" width="100%">
                                </a>
                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @elseif($newProductAd->container_item_count == 2)
                        @foreach ($newProductAd->bobAdItems()->take(2) as $ad)
                            <div class="col-md-6 pr-0">
                                <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                    <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}"
                                        alt="images" height="100%" width="100%">
                                </a>
                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @elseif($newProductAd->container_item_count == 3)
                        @foreach ($newProductAd->bobAdItems()->take(3) as $ad)
                            <div class="col-md-4 pr-0">
                                <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                    <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}"
                                        alt="images" height="100%" width="100%">
                                </a>
                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Start Top Rank Products --}}
    <section class="">
        <div class="container">
            <div class="bg-white rounded">
                <center>
                    <div class="d-flex align-items-baseline">
                        <h5>
                            <b> {{ translate('Top Rank Products') }}</b>
                        </h5>
                        {{-- <h6 class="py-10px"><span class="border-primary border-width-2 pb-0 d-inline-block">Everything We Expect to See in 2021</span></h6> --}}
                        <a href="{{ route('all_products', ['type' => 'top-rank-products']) }}"
                            class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">View More</a>
                    </div>
                </center>

                {{-- For hr tag --}}
                <div class="" style="background-color: #FD6500; padding: 1px;">
                </div>
                {{-- <hr style="background-color: #FD6500; padding: 0; height:2px"> --}}

                <div class="row mt-4">
                    {{-- <div class="col-md-3">
                        <img src="{{ asset('public/images/az2.png') }}" class="img-fluid">
                    </div> --}}
                    <div class="col-md-12">
                        <div class="row">
                            <div class="pt-4"
                                style="display:grid;grid-template-columns: 31.6% 33% 33%;grid-column-gap: 1.2%;grid-row-gap:10px;">
                                @foreach (filter_products(\App\Product::where('published', 1)->where('featured', '6'))->take(7)->get()
        as $key => $product)
                                    @if ($loop->first)
                                        <div class="mainDiv" style="position: relative;grid-row:1/4;height:100%;">
                                            <a href="{{ route('product', $product->slug_2 ?? $product->slug) }}"
                                                class="d-block" style="height:inherit">
                                                <div class="card mb-0" style="height: inherit">
                                                    <div class="">
                                                        <img class="text-center"
                                                            src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}"
                                                            alt="image" style="width: 100% ; position: relative;">
                                                        @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                            <div class="discount"
                                                                style="position: absolute; top: 0; right:0; margin: 8px; text-align: left; ">
                                                                <img class=""
                                                                    src="{{ asset('public/images/discount.svg') }}"
                                                                    alt="" style="position: relative; width: 12%">
                                                                <div class="d-flex justify-content-center align-items-center"
                                                                    style="position: absolute; top: 10px; font-size: 10px; left:10px;  color: #FFF; font-weight: 700">
                                                                    <span
                                                                        style="">{{ discount_perchent($product->id) }}%</span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($product->delivery_free == true)
                                                            <div class="free_delivery"
                                                                style="position: absolute; top: 0; right:0; margin: 5px; text-align: right; ">

                                                                <img class=""
                                                                    src="{{ asset('public/images/freedelivery.png') }}"
                                                                    alt="" style="position: relative; width: 40%">

                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="mainDiv" style="position: relative;">
                                                            <a href="{{ route('product', $product->slug_2 ?? $product->slug) }}"
                                                                class="d-block">
                                                                <div class="card mb-0">
                                                                    <div class="media">
                                                                        <div class="w3-display-container"
                                                                            style="width: 50%">
                                                                            <img class="text-center"
                                                                                src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}"
                                                                                alt="image"
                                                                                style="height: 185px; ; position: relative;">
                                                                            @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                                                <div class="discount"
                                                                                    style="position: absolute; top: 0; right:0; margin: 8px; text-align: left; ">
                                                                                    <img class=""
                                                                                        src="{{ asset('public/images/discount.svg') }}"
                                                                                        alt=""
                                                                                        style="position: relative; width: 25%">
                                                                                    <div class="d-flex justify-content-center align-items-center"
                                                                                        style="position: absolute;top: 12px; font-size: 10px; left:10px;  color: #FFF; font-weight: 700">
                                                                                        <span>{{ discount_perchent($product->id) }}%</span>
                                                                                    </div>

                                                                                </div>
                                                                            @endif
                                                                            @if ($product->delivery_free == true)
                                                                                <div class="free_delivery"
                                                                                    style="position: absolute; top: 0; right:0; margin: 5px; text-align: right; ">

                                                                                    <img class=""
                                                                                        src="{{ asset('public/images/freedelivery.png') }}"
                                                                                        alt=""
                                                                                        style="position: relative; width: 40%">

                                                                                </div>
                                                                            @endif
                                                                        </div>
                                    @endif
                                    <div class="media-body">
                                        <div class="p-md-3">
                                            <h5 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                <span class="d-block text-reset">{{ $product->getTranslation('name') }}
                                                </span>
                                            </h5>

                                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-27px"
                                                class="d-block text-reset">{{ $product->getTranslation('unit') }}

                                            </h3>

                                            <div class="fs-15">
                                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                    <del
                                                        class="fw-600 opacity-50">{{ home_base_price($product->id) }}</del>
                                                @endif
                                                <span
                                                    class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between mt-4">
                                                <span
                                                    class="fw-700 float-right text-mute">{{ renderStarRating($product->rating) }}</span>

                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </a>
                        <div class="aiz-p-hov-icon productcarthover"
                            style="padding: 7px;position: absolute;top:0; right:40px;">
                            <a class="w3-animate-right" href="javascript:void(0)"
                                onclick="addToWishList({{ $product->id }})" data-toggle="tooltip"
                                data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                                <i class="la la-heart-o"></i>
                            </a>
                            <a class="w3-animate-right" href="javascript:void(0)"
                                onclick="addToCompare({{ $product->id }})" data-toggle="tooltip"
                                data-title="{{ translate('Add to compare') }}" data-placement="left">
                                <i class="las la-sync"></i>
                            </a>
                            <a class="w3-animate-right" href="javascript:void(0)"
                                onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip"
                                data-title="{{ translate('Add to cart') }}" data-placement="left">
                                <i class="las la-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    {{-- End Top Rank Products --}}
    {{-- start populer_product --}}
    @include('frontend.parts.populer_products');
    {{-- -End Populer Products --}}
    {{-- Add 2 banner --}}

    @if ($popProductAd->bobAdItems()->count() > 0)
        <section class="">
            <div class="container">
                <div class="row" style="margin: 40px 0 40px 0;">
                    @if ($popProductAd->container_item_count == 1)
                        @foreach ($popProductAd->bobAdItems()->take(1) as $ad)
                            <div class="col-md-12 pl-0">
                                <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                    <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}"
                                        alt="images" height="100%" width="100%">
                                </a>
                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @elseif($popProductAd->container_item_count == 2)
                        @foreach ($popProductAd->bobAdItems()->take(2) as $ad)
                            <div class="col-md-6 pr-0">
                                <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                    <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}"
                                        alt="images" height="100%" width="100%">
                                </a>
                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @elseif($popProductAd->container_item_count == 3)
                        @foreach ($popProductAd->bobAdItems()->take(3) as $ad)
                            <div class="col-md-4 pr-0">
                                <a onclick="adsclick({{ $ad->id }})" href="{{ $ad->url }}">
                                    <img src="{{ asset('public/uploads/advertisment/' . $ad->image_name) }}"
                                        alt="images" height="100%" width="100%">
                                </a>
                            </div>
                            <input type="hidden" name="ads[]" class="add" value="{{ $ad->id }}">
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Start Top Brand Products --}}
    <section class="mb-3">
        <div class="container">
            <div class="bg-white rounded">
                <center>
                    <div class="d-flex align-items-baseline">
                        <h5>
                            <b> {{ translate('Top Brands Products') }}</b>
                        </h5>
                        <a href="{{ route('all_products', ['type' => 'top-brands-products']) }}"
                            class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">View More</a>
                    </div>
                </center>
                <div class="" style="background-color: #FD6500; padding: 1px;">
                </div>
                <div class="pt-4" style="display:grid;grid-template-columns: 31% 33% 33%;grid-gap: 10px;">
                    @foreach (filter_products(\App\Product::where('published', 1)->where('featured', '7'))->take(7)->get()
        as $key => $product)
                        @if ($loop->first)
                            <div class="mainDiv" style="position: relative;grid-row:1/4;height:100%;">
                                <a href="{{ route('product', $product->slug_2 ?? $product->slug) }}"
                                    class="d-block" style="height:inherit">
                                    <div class="card mb-0" style="height: inherit">
                                        <div class="">
                                            <img class="text-center"
                                                src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}" alt="image"
                                                style="width: 100% ; position: relative;">
                                            @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                <div class="discount"
                                                    style="position: absolute; top: 0; right:0; margin: 8px; text-align: left; ">
                                                    <img class=""
                                                        src="{{ asset('public/images/discount.svg') }}" alt=""
                                                        style="position: relative; width: 12%">
                                                    <div class="d-flex justify-content-center align-items-center"
                                                        style="position: absolute;top: 10px; font-size: 10px; left:10px;  color: #FFF; font-weight: 700">
                                                        <span style="">{{ discount_perchent($product->id) }}%</span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($product->delivery_free == true)
                                                <div class="free_delivery"
                                                    style="position: absolute; top: 0; right:0; margin: 5px; text-align: right; ">

                                                    <img class=""
                                                        src="{{ asset('public/images/freedelivery.png') }}" alt=""
                                                        style="position: relative; width: 40%">

                                                </div>
                                            @endif
                                        @else
                                            <div class="mainDiv" style="position: relative;">
                                                <a href="{{ route('product', $product->slug_2 ?? $product->slug) }}"
                                                    class="d-block">
                                                    <div class="card mb-0">
                                                        <div class="media">
                                                            <div class="w3-display-container" style="width: 50%">
                                                                <img class="text-center"
                                                                    src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}"
                                                                    alt="image"
                                                                    style="height: 185px; ; position: relative;">
                                                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                                    <div class="discount"
                                                                        style="position: absolute; top: 0; right:0; margin: 8px; text-align: left; ">
                                                                        <img class=""
                                                                            src="{{ asset('public/images/discount.svg') }}"
                                                                            alt="" style="position: relative; width: 25%">
                                                                        <div class="d-flex justify-content-center align-items-center"
                                                                            style="position: absolute;top: 12px; font-size: 10px; left:10px;  color: #FFF; font-weight: 700">
                                                                            <span
                                                                                style="">{{ discount_perchent($product->id) }}%</span>
                                                                        </div>

                                                                    </div>
                                                                @endif
                                                                @if ($product->delivery_free == true)
                                                                    <div class="free_delivery"
                                                                        style="position: absolute; top: 0; right:0; margin: 5px; text-align: right; ">

                                                                        <img class=""
                                                                            src="{{ asset('public/images/freedelivery.png') }}"
                                                                            alt="" style="position: relative; width: 40%">

                                                                    </div>
                                                                @endif
                                                            </div>
                        @endif
                        <div class="media-body">
                            <div class="p-md-3">
                                <h5 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                    <span class="d-block text-reset">{{ $product->getTranslation('name') }}
                                    </span>
                                </h5>
                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-27px" class="d-block text-reset">
                                    {{ $product->getTranslation('unit') }}

                                </h3>

                                <div class="fs-15">
                                    @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                        <del class="fw-600 opacity-50">{{ home_base_price($product->id) }}</del>
                                    @endif
                                    <span
                                        class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <span
                                        class="fw-700 float-right text-mute">{{ renderStarRating($product->rating) }}</span>

                                </div>
                            </div>
                        </div>
                </div>
            </div>
            </a>
            <div class="aiz-p-hov-icon productcarthover" style="padding: 7px;position: absolute;top:0; right:40px;">
                <a class="w3-animate-right" href="javascript:void(0)" onclick="addToWishList({{ $product->id }})"
                    data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                    <i class="la la-heart-o"></i>
                </a>
                <a class="w3-animate-right" href="javascript:void(0)" onclick="addToCompare({{ $product->id }})"
                    data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
                    <i class="las la-sync"></i>
                </a>
                <a class="w3-animate-right" href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})"
                    data-toggle="tooltip" data-title="{{ translate('Add to cart') }}" data-placement="left">
                    <i class="las la-shopping-cart"></i>
                </a>
            </div>
        </div>
        @endforeach
        </div>
        </div>
        </div>
    </section>
    {{-- End Top Brand Products --}}

    {{-- pre Order Products- --}}
    {{-- <section class="mb-3">
        <div class="container">
            <div class="bg-white rounded">
                <center>
                    <div class="d-flex align-items-baseline">
                        <h5>
                            <b> {{ translate('Pre Order Products') }}</b>
                        </h5>
                    </div>
                </center>
                <div class="" style="background-color: #FD6500; padding: 1px;">
                </div>
                <div class="pt-4" style="display:grid;grid-template-columns: 31% 33% 33%;grid-gap: 10px;">
                    @foreach (filter_products(\App\Product::where('published', 1)->where('pre_order', '1'))->take(7)->get()
    as $key => $product)
                        @if ($loop->first)
                            <div class="mainDiv" style="position: relative;grid-row:1/4;height:100%;">
                                <a href="{{ route('product', $product->slug) }}" class="d-block"
                                    style="height:inherit">
                                    <div class="card mb-0" style="height: inherit">
                                        <div class="">
                                            <img class="text-center"
                                                src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}" alt="image"
                                                style="width: 100% ; position: relative;">
                                            @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                <div class="discount"
                                                    style="position: absolute; top: 0; right:0; margin: 8px; text-align: left; ">
                                                    <img class=""
                                                        src="{{ asset('public/images/discount.svg') }}" alt=""
                                                        style="position: relative; width: 12%">
                                                    <div class="d-flex justify-content-center align-items-center"
                                                        style="position: absolute;top: 10px; font-size: 10px; left:10px;  color: #FFF; font-weight: 700">
                                                        <span style="">{{ discount_perchent($product->id) }}%</span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($product->delivery_free == true)
                                            <div class="free_delivery"
                                                style="position: absolute; top: 0; right:0; margin: 5px; text-align: right; ">

                                                <img class=""
                                                    src="{{ asset('public/images/freedelivery.png') }}" alt=""
                                                    style="position: relative; width: 40%">

                                            </div>
                                        @endif
                                        @else
                                            <div class="mainDiv" style="position: relative;">
                                                <a href="{{ route('product', $product->slug) }}"
                                                    class="d-block">
                                                    <div class="card mb-0">
                                                        <div class="media">
                                                            <div class="w3-display-container" style="width: 50%">
                                                                <img class="text-center"
                                                                    src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}"
                                                                    alt="image"
                                                                    style="height: 185px; ; position: relative;">
                                                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                                    <div class="discount"
                                                                        style="position: absolute; top: 0; right:0; margin: 8px; text-align: left; ">
                                                                        <img class=""
                                                                            src="{{ asset('public/images/discount.svg') }}"
                                                                            alt="" style="position: relative; width: 25%">
                                                                        <div class="d-flex justify-content-center align-items-center"
                                                                            style="position: absolute;top: 12px; font-size: 10px; left:10px;  color: #FFF; font-weight: 700">
                                                                            <span
                                                                                style="">{{ discount_perchent($product->id) }}%</span>
                                                                        </div>

                                                                    </div>
                                                                @endif
                                                                @if ($product->delivery_free == true)
                                            <div class="free_delivery"
                                                style="position: absolute; top: 0; right:0; margin: 5px; text-align: right; ">

                                                <img class=""
                                                    src="{{ asset('public/images/freedelivery.png') }}" alt=""
                                                    style="position: relative; width: 40%">

                                            </div>
                                        @endif
                                                            </div>
                        @endif
                        <div class="media-body">
                            <div class="p-md-3">
                                <h5 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                    <span class="d-block text-reset">{{ $product->getTranslation('name') }}
                                    </span>
                                </h5>

                                <div class="fs-15">
                                    @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                        <del class="fw-600 opacity-50">{{ home_base_price($product->id) }}</del>
                                    @endif
                                    <span
                                        class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <span
                                        class="fw-700 float-right text-mute">{{ renderStarRating($product->rating) }}</span>

                                </div>
                            </div>
                        </div>
                </div>
            </div>
            </a>
            <div class="aiz-p-hov-icon productcarthover" style="padding: 7px;position: absolute;top:0; right:40px;">
                <a class="w3-animate-right" href="javascript:void(0)" onclick="addToWishList({{ $product->id }})"
                    data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                    <i class="la la-heart-o"></i>
                </a>
                <a class="w3-animate-right" href="javascript:void(0)" onclick="addToCompare({{ $product->id }})"
                    data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
                    <i class="las la-sync"></i>
                </a>
                <a class="w3-animate-right" href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})"
                    data-toggle="tooltip" data-title="{{ translate('Add to cart') }}" data-placement="left">
                    <i class="las la-shopping-cart"></i>
                </a>
            </div>
        </div>
        @endforeach
        </div>
        </div>
        </div>
    </section> --}}


    {{-- End Pre Order Products --}}



@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var values = $('input[name="ads[]"]').map(function() {
                return $(this).val();
            }).get();
            console.log(values);
            var url = "{{ route('adViewUpdate') }}";

            $.post(url, {
                    "_token": "{{ csrf_token() }}",
                    values: values,
                },
                function(result) {
                    console.log("success view count");
                });


        });

        function adsclick(id) {
            var url = "{{ route('adClickUpdate') }}";
            $.post(url, {
                    "_token": "{{ csrf_token() }}",
                    value: id,
                },
                function(result) {
                    console.log("success click count");
                });
        }
    </script>


    <script>
        $(document).ready(function() {
            $.post('{{ route('home.section.featured') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_selling') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });


            $.post('{{ route('home.section.upcoming') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_upcoming').html(data);
                AIZ.plugins.slickCarousel();
            });

            // $.post('{{ route('home.section.pre_order') }}', {
            //     _token: '{{ csrf_token() }}'
            // }, function(data) {
            //     $('#section_pre_order').html(data);
            //     AIZ.plugins.slickCarousel();
            // });

            $.post('{{ route('home.section.home_categories') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });

            @if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                $.post('{{ route('home.section.best_sellers') }}', {
                    _token: '{{ csrf_token() }}'
                }, function(data) {
                    $('#section_best_sellers').html(data);
                    AIZ.plugins.slickCarousel();
                });
            @endif
        });

        /*  our band start*/
        $(document).ready(function() {
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
    </script>
@endsection
