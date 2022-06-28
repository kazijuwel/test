@extends('frontend.layouts.app')

@section('meta_title'){{ $detailedProduct->meta_title }}@stop

@section('meta_description'){{ Str::limit($detailedProduct->meta_description, 270) }}@stop

    {{-- @section('meta_keywords'){{ Str::words($detailedProduct->tags,3) }}@stop --}}

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $detailedProduct->meta_title }}">
    <meta itemprop="description" content="{{ Str::limit($detailedProduct->meta_description, 270) }}">
    <meta itemprop="image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $detailedProduct->meta_title }}">
    <meta name="twitter:description" content="{{ Str::limit($detailedProduct->meta_description, 270) }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">
    <meta name="twitter:data1" content="{{ single_price($detailedProduct->unit_price) }}">
    <meta name="twitter:label1" content="Price">
    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $detailedProduct->meta_title }}" />
    <meta property="og:type" content="og:product" />
    <meta property="og:url" content="{{ route('product', $detailedProduct->slug) }}" />
    <meta property="og:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}" />
    <meta property="og:description" content="{{ Str::limit($detailedProduct->meta_description, 270) }}" />
    <meta property="og:site_name" content="{{ get_setting('meta_title') }}" />
    <meta property="og:price:amount" content="{{ single_price($detailedProduct->unit_price) }}" />
    <meta property="product:price:currency"
        content="{{ \App\Currency::findOrFail(\App\BusinessSetting::where('type', 'system_default_currency')->first()->value)->code }}" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
    <link rel="canonical" href="{{ url()->full() }}" />
    @php
    $imgs = $detailedProduct->photos;
    $scImg = '';
    if ($imgs) {
        $scImg = explode(',', $imgs)[0];
    } else {
        $scImg = ' ';
    }

    @endphp

    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "Product",
            "name": "{{ $detailedProduct->meta_title }}",
            "image": "{{ uploaded_asset($scImg) }}",
            "description": "{{ Str::limit($detailedProduct->meta_description, 270) }}",
            "sku": "0446310786",
            "mpn": "925872",
            "brand": {
                "@type": "Brand",
                "name": "{{ $detailedProduct->brand ? $detailedProduct->brand->name : 'unknown' }}"
            },
            "review": {
                "@type": "Review",
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "4.5",
                    "bestRating": "5"
                },
                "author": {
                    "@type": "Person",
                    "name": "{{ $detailedProduct->user ? $detailedProduct->user->name : 'Saif' }}"
                }
            },
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.5",
                "reviewCount": "{{ rand(10, 99) }}"
            },
            "offers": {
                "@type": "Offer",
                "url": "{{ url()->full() }}",
                "priceCurrency": "{{ \App\Currency::findOrFail(\App\BusinessSetting::where('type', 'system_default_currency')->first()->value)->code }}",
                "price": "{{ $detailedProduct->unit_price }}",
                "priceValidUntil": "{{ \Carbon\Carbon::now()->addDays(5)->format('Y-m-d') }}",
                "itemCondition": "https://schema.org/UsedCondition",
                "availability": "https://schema.org/InStock"
            }
        }
    </script>
@endsection


@section('css')
    <style>
        .short-description ul {
            list-style: none;
            padding: 3px;
        }

        .btn-soft-primary.fw-600 {
            background-color: #4c9cf3;
            color: #ffffff;
        }

        .btn-soft-primary:hover {
            color: #fff !important;
            background-color: #277af3 !important;
            border-color: #277af3 !important;
        }

        .btn-info {
            color: #fff;
            background-color: #b5e61d !important;
            border-color: #b5e61d !important;
        }

        .btn-info,
        .btn-soft-info:hover,
        .btn-outline-info:hover {
            background-color: #b5e61d !important;
            border-color: #b5e61d !important;
            color: var(--white) !important;
        }

        .btn-info:hover {
            color: #fff !important;
            background-color: #8db709 !important;
            border-color: #8db709 !important;
        }

        .btn-info {
            color: #fff;
            background-color: #4fcff1;
             !important;
            border-color: #4fcff1;
             !important;
        }

        .btn-success,
        .btn-soft-success:hover,
        .btn-outline-success:hover {
            background-color: #4fcff1;
             !important;
            border-color: #4fcff1;
             !important;
            color: var(--white) !important;
        }

        .btn-success:hover {
            color: #fff !important;
            background-color: #31a1bf !important;
            border-color: #31a1bf !important;
        }

        .btn-warning,
        .btn-soft-warning:hover,
        .btn-outline-warning:hover {
            background-color: #efc818;
             !important;
            border-color: #efc818;
             !important;
            color: var(--white) !important;
        }

        .btn-secondary,
        .btn-soft-secondary:hover,
        .btn-outline-secondary:hover {
            background-color: #f84581;
             !important;
            border-color: #f84581;
             !important;
            color: var(--white) !important;
        }

        .btn-secondary:hover {
            color: #fff !important;
            background-color: #df2c68 !important;
            border-color: #df2c68 !important;
        }

        .btn-warning:hover {
            color: #fff !important;
            background-color: #dcb80f !important;
            border-color: #dcb80f !important;
        }

        .btn-danger,
        .btn-soft-danger:hover,
        .btn-outline-success:hover {
            background-color: #a996e7;
             !important;
            border-color: #a996e7;
             !important;
            color: var(--white) !important;
        }

        .btn-danger:not(:disabled):not(.disabled).active,
        .btn-danger:not(:disabled):not(.disabled):active,
        .show>.btn-danger.dropdown-toggle {
            color: #fff;
            background-color: #a996e7 !important;
            border-color: #a996e7 !important;
        }

        .btn-danger:hover {
            color: #fff !important;
            background-color: #846dd0 !important;
            border-color: #846dd0 !important;
        }


        .btn-sm {
            padding: 5px;
            font-size: 12px;
        }


        @media (min-width: 320px) and (max-width: 640px) {
            .btn-sm {
                padding: 5px;
                font-size: 12px;
            }

            button.btn.btn-sm.btn-soft-primary.fw-600 {
                width: 100%;
                margin-bottom: 3px;
            }

            button.btn.btn-sm.btn-info.fw-600 {
                width: 100%;
                margin-bottom: 3px;
            }

            button.btn.btn-sm.btn-success.fw-600 {
                width: 100%;
                margin-bottom: 3px;
            }

            button.btn.btn-sm.btn-danger.add-to-cart.fw-600 {
                width: 100%;
                margin-bottom: 3px;
            }

            button.btn.btn-sm.btn-primary.buy-now.fw-600 {
                width: 100%;
                margin-bottom: 3px;
            }

            button.btn.btn-sm.btn-warning.fw-600 {
                width: 100%;
                margin-bottom: 3px;
            }

            /*nav tab start*/
            a.nav-item.nav-link.btn.btn-sm.btn-danger.fw-600.mr-1.active.text-reset {
                width: 100%;
                margin-bottom: 2px;
            }

            a.nav-item.nav-link.btn.btn-sm.btn-success.fw-600.mr-1.text-reset {
                width: 100%;
                margin-bottom: 2px;
            }

            a.nav-item.nav-link.btn.btn-sm.btn-info.fw-600.mr-1.text-reset {
                width: 100%;
                margin-bottom: 2px;
            }

            a.nav-item.nav-link.btn.btn-sm.btn-warning.fw-600.mr-1.text-reset {
                width: 100%;
                margin-bottom: 2px;
            }

            a.nav-item.nav-link.btn.btn-sm.btn-primary.fw-600.mr-1 {
                width: 100%;
                margin-bottom: 2px;
            }

            a.nav-item.nav-link.btn.btn-sm.btn-secondary.fw-600.mr-1.text-reset {
                width: 100%;
                margin-bottom: 2px;
            }

            .div1,
            .div2 {
                display: inline-block !important;
            }
        }

        /*@media (min-width: 641px) and (max-width: 1024px) {
                    button.btn.btn-sm.btn-warning.buy-now.fw-600 {
                        margin-top: 5px;
                    }
                }
                @media (min-width: 1030px) and (max-width: 1366px) {
                    button.btn.btn-sm.btn-warning.buy-now.fw-600 {
                        margin-top: 5px;
                    }
                }*/

        .thumb-image {
            width: 500px;
        }

        /* .thumb-image>img {
            width: 100%;
        } */

    </style>
@endsection


@section('content')
    <section class="pt-3">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <ul class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item opacity-50">
                            <a class="text-reset" href="{{ route('home') }}">{{ translate('Home') }}</a>
                        </li>

                        <li class="breadcrumb-item fw-600  text-dark">
                            {{-- <a class="text-reset"
                                href="{{ route('search') }}">"{{ translate('All Products') }}"
                            </a> --}}
                                @if($detailedProduct->category)
                                <a href="{{ route('products.category',$detailedProduct->category->slug)}}">
                                {{  $detailedProduct->category->name }}
                            </a>
                           @endif
                        </li>

                        <li class="breadcrumb-item fw-600  text-dark">
                            <a class="text-reset" href="#"
                                onclick='location.reload(true); return false;'>{{ $detailedProduct->getTranslation('name') }}</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-4 pt-1">
        <div class="container">
            <div class="bg-white shadow-sm rounded p-3">
                <div class="row">
                    {{-- <div class="col-xl-5 col-lg-6 mb-0">
                        <div class="z-3 row gutters-10">
                            @php
                                $photos = explode(',', $detailedProduct->photos);
                            @endphp
                            <div class="col order-1 order-md-2">
                                <div class="aiz-carousel product-gallery" data-nav-for='.product-gallery-thumb'
                                    data-fade='true'>
                                    @foreach ($photos as $key => $photo)
                                        <div class="carousel-box rounded thumb-image">
                                            <img class="img-fluid lazyload" data-imagezoom="true"
                                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                data-src="{{ uploaded_asset($photo) }}"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                >
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <div class="col-12 mt-3 mt-md-0">
                            <div class="product-gallery-thumb" data-items='5' data-nav-for='.product-gallery'
                                data-vertical='false' data-vertical-sm='true' data-focus-select='true' data-arrows='true'>
                                <div class="carousel-box c-pointer border p-1 rounded d-flex justify-contain-center align-items-center">
                                        @foreach ($photos as $key => $photo)
                                                <img class="lazyload img-fluid size-90px mx-auto"
                                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                data-src="{{ uploaded_asset($photo) }}"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">

                                        @endforeach
                                </div>
                            </div>
                        </div>

                    </div> --}}


                    <div class="col-xl-5 col-lg-6 mb-0">
                        <div class="z-3 row gutters-10">
                            @php
                                $photos = explode(',', $detailedProduct->photos);
                            @endphp
                            <div class="col order-1 order-md-2">
                                <div class="aiz-carousel product-gallery" data-nav-for='.product-gallery-thumb'
                                    data-fade='true'>
                                    @foreach ($photos as $key => $photo)
                                        <div class="carousel-box rounded thumb-image">
                                            <img class="img-fluid lazyload" data-imagezoom="true"
                                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                data-src="{{ uploaded_asset($photo) }}"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-12  mt-3 mt-md-0">
                            <div class="aiz-carousel product-gallery-thumb" data-items='4' data-nav-for='.product-gallery'
                                data-vertical='' data-vertical-sm='false' data-focus-select='true' data-arrows='true'>
                                @foreach ($photos as $key => $photo)
                                    <div class="carousel-box c-pointer border p-1 m-1 rounded d-flex justify-content-between"
                                        style="height: 80px !important;">
                                        <img class="lazyload img-fluid mx-auto"
                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                            data-src="{{ uploaded_asset($photo) }}"
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                            style="height: 80px !important;">
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    </div>

                    <div class="col-xl-4 col-lg-6">
                        <div class="text-left">

                            <h1 class="mb-2 fs-20 fw-600">
                                {{ $detailedProduct->getTranslation('name') }}
                            </h1>
                            <div class="row align-items-center">

                                <div class="col-6">
                                    @php
                                        $total = 0;
                                        $total += $detailedProduct->reviews->count();
                                    @endphp
                                    <span class="rating">
                                        {{ renderStarRating($detailedProduct->rating) }}
                                    </span>
                                    <span class="ml-1 opacity-50">({{ $total }}
                                        {{ translate('reviews') }})</span>

                                </div>

                                <div class="col-6">
                                    @php
                                        $qty = 0;
                                        if ($detailedProduct->variant_product) {
                                            foreach ($detailedProduct->stocks as $key => $stock) {
                                                $qty += $stock->qty;
                                            }
                                        } else {
                                            $qty = $detailedProduct->current_stock;
                                        }
                                    @endphp
                                    @if ($detailedProduct->brand != null)
                                        <span>
                                            <a href="{{ route('products.brand', $detailedProduct->brand->slug) }}">
                                                <img src="{{ uploaded_asset($detailedProduct->brand->logo) }}"
                                                    alt="{{ $detailedProduct->brand->getTranslation('name') }}"
                                                    height="24">
                                            </a>
                                        </span>
                                    @endif
                                    @if ($qty > 0)
                                        <span
                                            class="badge badge-md badge-inline badge-pill badge-success">{{ translate('In stock') }}</span>
                                    @else
                                        <span
                                            class="badge badge-md badge-inline badge-pill badge-danger">{{ translate('Out of stock') }}</span>
                                    @endif
                                    @if ($detailedProduct->delivery_free == true)
                                    <div class="free_delivery" style="width: 50%">
                                        <img class="img-fluid" src="{{ asset('public/images/freedelivery.png') }}"
                                            alt="">
                                    </div>
                                    @endif

                                </div>

                            </div>

                            <div class="row align-items-center">
                                <div class="col-12">
                                    <h1 class="mb-2 fs-16 fw-600">
                                        Product Id:
                                        {{ date('Y.d.m', strtotime($detailedProduct->created_at)) }}.{{ $detailedProduct->category_id }}.{{ $detailedProduct->id }}
                                    </h1>
                                </div>
                            </div>

                            @if (home_price($detailedProduct->id) != home_discounted_price($detailedProduct->id))

                                <div class="row no-gutters mt-3">
                                    <div class="col-sm-2">
                                        <div class="my-1">{{ translate('Price') }}:</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="fs-20 opacity-60">
                                            <del>
                                                {{ home_price($detailedProduct->id) }}
                                                @if ($detailedProduct->unit != null)
                                                    <span>/{{ $detailedProduct->getTranslation('unit') }}</span>
                                                @endif
                                            </del>
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters my-2">
                                    <div class="col-sm-4">
                                        <div class="">{{ translate('Dicount Price') }}: </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="">
                                            <strong class="h5 fw-600 text-primary">
                                                {{ home_discounted_price($detailedProduct->id) }}
                                            </strong>
                                            @if ($detailedProduct->unit != null)
                                                <span
                                                    class="opacity-70">/{{ $detailedProduct->getTranslation('unit') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row no-gutters mt-3">
                                    <div class="col-sm-2">
                                        <div class="my-1">{{ translate('Price') }}:</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="">
                                            <strong class="h5 fw-600 text-primary">
                                                {{ home_discounted_price($detailedProduct->id) }}
                                            </strong>
                                            @if ($detailedProduct->unit != null)
                                                <span
                                                    class="opacity-70">/{{ $detailedProduct->getTranslation('unit') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated && $detailedProduct->earn_point > 0)
                                <div class="row no-gutters mt-4">
                                    <div class="col-sm-2">
                                        <div class="opacity-50 my-2">{{ translate('Club Point') }}:</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="d-inline-block rounded px-2 bg-soft-primary border-soft-primary border">
                                            <span class="strong-700">{{ $detailedProduct->earn_point }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            <form id="option-choice-form">
                                @csrf
                                <input type="hidden" name="id" value="{{ $detailedProduct->id }}">

                                @if ($detailedProduct->choice_options != null)
                                    @foreach (json_decode($detailedProduct->choice_options) as $key => $choice)
                                        <div class="row no-gutters">
                                            <div class="col-sm-2">
                                                <div class="opacity-50 my-2">
                                                    {{ \App\Attribute::find($choice->attribute_id)->getTranslation('name') }}:
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="aiz-radio-inline">
                                                    @foreach ($choice->values as $key => $value)
                                                        <label class="aiz-megabox pl-0 mr-2">
                                                            <input type="radio"
                                                                name="attribute_id_{{ $choice->attribute_id }}"
                                                                value="{{ $value }}"
                                                                @if ($key == 0) checked @endif>
                                                            <span
                                                                class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center py-1 px-1 mb-1">
                                                                {{ $value }}
                                                            </span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                @if (count(json_decode($detailedProduct->colors)) > 0)
                                    <div class="row no-gutters">
                                        <div class="col-sm-2">
                                            <div class="my-2">{{ translate('Color') }}:</div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="aiz-radio-inline">
                                                @foreach (json_decode($detailedProduct->colors) as $key => $color)
                                                    <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip"
                                                        data-title="{{ \App\Color::where('code', $color)->first()->name }}">
                                                        <input type="radio" name="color" value="{{ $color }}"
                                                            @if ($key == 0) checked @endif>
                                                        <span
                                                            class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                            <span class="size-20px d-inline-block rounded"
                                                                style="background: {{ $color }};"></span>
                                                        </span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Quantity + Add to cart -->
                                <div class="row no-gutters">
                                    <div class="col-sm-3">
                                        <div class="my-1">{{ translate('Quantity') }}:</div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="product-quantity d-flex align-items-center">
                                            <div class="row no-gutters align-items-center aiz-plus-minus mr-3"
                                                style="width: 130px;">
                                                <button class="btn col-auto btn-icon btn-sm btn-circle btn-light"
                                                    type="button" data-type="minus" data-field="quantity" disabled="">
                                                    <i class="las la-minus"></i>
                                                </button>
                                                <input type="text" name="quantity"
                                                    class="col border-0 text-center flex-grow-1 fs-16 input-number"
                                                    placeholder="1" value="{{ $detailedProduct->min_qty }}"
                                                    min="{{ $detailedProduct->min_qty }}" max="10" readonly>






                                                <button class="btn  col-auto btn-icon btn-sm btn-circle btn-light"
                                                    type="button" data-type="plus" data-field="quantity">
                                                    <i class="las la-plus"></i>
                                                </button>
                                            </div>
                                            {{-- <div class="avialable-amount opacity-60">(<span id="available-quantity">{{ $qty }}</span> {{ translate('available')}}) ({{$detailedProduct->num_of_sale}} Sold)</div> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                                    <div class="col-sm-4">
                                        <div class="my-1">{{ translate('Total Price') }}:</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="product-price mt-1">
                                            <strong id="chosen_price" class="h5 fw-600 text-primary">

                                            </strong>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-8 col-xs-8 mt-1">
                                                <button type="button" class="btn btn-sm btn-success fw-600">
                                                    <span class="d-md-inline-block">Monthly EMI BDT 5,224</span>
                                                </button>
                                            </div> -->

                                </div>

                                @if (isset($detailedProduct->quick_overview))
                                    <div class="row no-gutters">
                                        <div class="short-description">
                                            <h5 class="mb-2 fs-20 fw-600">Quick Overview</h5>
                                            <div class="mw-100 overflow-hidden text-left">
                                                <?php echo $detailedProduct->quick_overview; ?>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                            </form>




                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 pt-5">
                        <div class="delivery p-2">
                            <h1 class="mb-2 fs-20 fw-600">
                                Product Information
                            </h1>
                            @if ($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                                <p><i class="las la-user mr-1 fs-18"></i>Seller: {{ $detailedProduct->user->name }}</p>
                            @else
                                <p><i class="las la-user mr-1 fs-18"></i>Seller: {{ translate('Bela Obela') }}</p>
                            @endif
                            <p><i class="las la-database mr-1 fs-18"></i>Avaiable stock: {{ $qty }}
                                @if ($detailedProduct->unit != null)
                                    {{ $detailedProduct->getTranslation('unit') }}
                                @endif
                            </p>
                            <p><i class="las la-times-circle mr-1 fs-18"></i>Sold out:
                                {{ $detailedProduct->num_of_sale }}
                                @if ($detailedProduct->unit != null)
                                    {{ $detailedProduct->getTranslation('unit') }}
                                @endif
                            </p>


                            @php
                                $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                                $refund_sticker = \App\BusinessSetting::where('type', 'refund_sticker')->first();
                            @endphp
                            @if ($refund_request_addon != null && $refund_request_addon->activated == 1 && $detailedProduct->refundable)
                                <p>Refund Status: <span style="color:green;">Refundable</span></p>
                            @else
                                <p>Refund Status: <span style="color:red;">non-Refundable</span></p>
                            @endif



                            @if (isset($detailedProduct->authenticity))
                                <p><i class="las la-file mr-1 fs-18"></i>Authenticity:
                                    {{ $detailedProduct->authenticity }}</p>
                            @endif
                            @if (isset($detailedProduct->product_origin_country))
                                <p><i class="las la-globe mr-1 fs-18"></i>Counry of origin:
                                    {{ $detailedProduct->product_origin_country }}</p>
                            @endif
                            @if (isset($detailedProduct->product_assemble_country))
                                <p><i class="las la-globe mr-1 fs-18"></i>Counry of Assemble:
                                    {{ $detailedProduct->product_assemble_country }}</p>
                            @endif
                            @if (isset($detailedProduct->product_license))
                                <p><i class="las la-award mr-1 fs-18"></i>Product Certification:
                                    {{ $detailedProduct->product_license }}</p>
                            @endif
                            @php
                                $month = floor($detailedProduct->warranty_days / 30);
                            @endphp
                            @if ($detailedProduct->is_warranty == 1)
                                <p><i class="las la-shield-alt mr-1 fs-18"></i>Warrenty: {{ $month }} Months</p>
                            @else
                            @endif
                            @if ($detailedProduct->parts_warranty == 1)
                                <h1 class="mb-2 fs-16 fw-600">
                                    Parts Warranty
                                </h1>
                                @foreach ($detailedProduct->product_parts_warranty as $value)
                                    @php
                                        $parts_month = floor($value->warranty_days / 30);
                                    @endphp
                                    <p><i class="fa fa-shield ml-4"></i><span
                                            style="text-transform: capitalize;">{{ $value->parts_name }}</span>:
                                        {{ $parts_month }} Months</p>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <!-- <div class="col-auto">

                                    </div> -->
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="mt-0">
                            <!-- <div class="col-auto">
                                            <small class="mr-2 opacity-50">{{ translate('Sold by') }}: </small><br>
                                            @if ($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
    <a href="{{ route('shop.visit', $detailedProduct->user->shop->slug) }}" class="text-reset">{{ $detailedProduct->user->shop->name }}</a>
@else
    {{ translate('Inhouse product') }}
    @endif
                                        </div> -->

                            <!--@if (\App\BusinessSetting::where('type', 'conversation_system')->first()->value == 1)-->
                            <!--    <button class="btn btn-sm btn-soft-primary fw-600" onclick="show_chat_modal()">-->
                            <!--        {{ translate('Message Seller') }}</button>-->
                            <!--@endif-->
                            <!--<a href="{{ route('contuct_us.create') }}" type="button"-->
                            <!--    class="btn btn-sm btn-warning fw-600">-->
                            <!--    Discount for Bulk Order-->
                            <!--</a>-->
                            <!--<button type="button" class="btn btn-sm btn-info fw-600"-->
                            <!--    onclick="addToWishList({{ $detailedProduct->id }})">-->

                            <!--    <span class="d-md-inline-block">{{ translate('Add to wishlist') }}</span>-->
                            <!--</button>-->
                            <!--<button type="button" class="btn btn-sm btn-success fw-600"-->
                            <!--    onclick="addToCompare({{ $detailedProduct->id }})">-->

                            <!--    <span class="d-md-inline-block"> {{ translate('Add to compare') }}</span>-->
                            <!--</button>-->
                            @if (Auth::check() && \App\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated && (\App\AffiliateOption::where('type', 'product_sharing')->first()->status || \App\AffiliateOption::where('type', 'category_wise_affiliate')->first()->status) && Auth::user()->affiliate_user != null && Auth::user()->affiliate_user->status)
                                @php
                                    if (Auth::check()) {
                                        if (Auth::user()->referral_code == null) {
                                            Auth::user()->referral_code = substr(Auth::user()->id . Str::random(10), 0, 10);
                                            Auth::user()->save();
                                        }
                                        $referral_code = Auth::user()->referral_code;
                                        $referral_code_url = URL::to('/product') . '/' . $detailedProduct->slug . "?product_referral_code=$referral_code";
                                    }
                                @endphp
                                <div class="form-group">
                                    <textarea id="referral_code_url" class="form-control" readonly type="text"
                                        style="display:none">{{ $referral_code_url }}</textarea>
                                </div>
                                <button type=button id="ref-cpurl-btn" class="btn btn-sm btn-secondary"
                                    data-attrcpy="{{ translate('Copied') }}"
                                    onclick="CopyToClipboard('referral_code_url')">{{ translate('Copy the Promote Link') }}</button>
                            @endif
                            @if ($qty > 0)
                                <button type="button" class="btn btn-lg  add-to-cart fw-600"
                                    onclick="addToCart()" style="background-color:#F89820; ">
                                    <span style="color:white;" class="d-md-inline-block"> {{ translate('Add to cart') }}</span>
                                </button>



                                 <button type="button" class="btn btn-lg  add-to-cart fw-600"
                                    onclick="buyNow()" style="background-color:#27378E; margin-left:20px; width:130px;">
                                    <span style="color:white;" class="d-md-inline-block"> {{ translate(' Buy Now ') }}</span>
                                </button>
                            @else
                                <button type="button" class="btn btn-lg btn-secondary fw-600" disabled>
                                    <i class="la la-cart-arrow-down"></i> {{ translate('Out of Stock') }}
                                </button>
                            @endif

                        </div>

                        @php
                            $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                            $refund_sticker = \App\BusinessSetting::where('type', 'refund_sticker')->first();
                        @endphp
                        @if ($refund_request_addon != null && $refund_request_addon->activated == 1 && $detailedProduct->refundable)
                            <!-- <div class="row no-gutters mt-4">
                                        <div class="col-sm-2">
                                            <div class="opacity-50 my-2">{{ translate('Refund') }}:</div>
                                        </div>
                                        <div class="col-sm-10">
                                            <a href="{{ route('returnpolicy') }}" target="_blank">
                                                @if ($refund_sticker != null && $refund_sticker->value != null)
    <img src="{{ uploaded_asset($refund_sticker->value) }}" height="36">
@else
    <img src="{{ static_asset('assets/img/refund-sticker.jpg') }}" height="36">
    @endif
                                            </a>
                                            <a href="{{ route('returnpolicy') }}" class="ml-2" target="_blank">View Policy</a>
                                        </div>
                                    </div> -->
                        @endif
                        <div class="row no-gutters mt-4">
                            <div class="col-sm-1">
                                <div class="my-2">{{ translate('Share') }}: </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="aiz-share"></div>

                            </div>
                            <div class="col-sm-6" style="margin-top: 10px;">
                                @if (get_setting('payment_method_images') != null)
                                    @foreach (explode(',', get_setting('payment_method_images')) as $key => $value)
                                        <img class="img-fit" src="{{ uploaded_asset($value) }}"
                                            style="width:100%">
                                    @endforeach
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-xl-3 order-1 order-xl-0">

                    <!-- <div class="bg-white shadow-sm mb-3">
                                <div class="position-relative p-3 text-left">
                                    @if ($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1 && $detailedProduct->user->seller->verification_status == 1)
    <div class="absolute-top-right p-2 bg-white z-1">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" viewBox="0 0 287.5 442.2" width="22" height="34">
                                                <polygon style="fill:#F8B517;" points="223.4,442.2 143.8,376.7 64.1,442.2 64.1,215.3 223.4,215.3 "/>
                                                <circle style="fill:#FBD303;" cx="143.8" cy="143.8" r="143.8"/>
                                                <circle style="fill:#F8B517;" cx="143.8" cy="143.8" r="93.6"/>
                                                <polygon style="fill:#FCFCFD;" points="143.8,55.9 163.4,116.6 227.5,116.6 175.6,154.3 195.6,215.3 143.8,177.7 91.9,215.3 111.9,154.3
                                                60,116.6 124.1,116.6 "/>
                                            </svg>
                                        </div>
    @endif

                                    <div class="opacity-50 fs-12 border-bottom">{{ translate('Sold By') }}</div>
                                    @if ($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                                        <a href="{{ route('shop.visit', $detailedProduct->user->shop->slug) }}" class="text-reset d-block fw-600">
                                            {{ $detailedProduct->user->shop->name }}
                                            @if ($detailedProduct->user->seller->verification_status == 1)
    <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>
@else
    <span class="ml-2"><i class="fa fa-times-circle" style="color:red"></i></span>
    @endif
                                        </a>
                                        <div class="location opacity-70">{{ $detailedProduct->user->shop->address }}</div>
@else
    <div class="fw-600">{{ env('APP_NAME') }}</div>
                                    @endif
                                    @php
                                        $total = 0;
                                        $rating = 0;
                                        foreach ($detailedProduct->user->products as $key => $seller_product) {
                                            $total += $seller_product->reviews->count();
                                            $rating += $seller_product->reviews->sum('rating');
                                        }
                                    @endphp

                                    <div class="text-center border rounded p-2 mt-3">
                                        <div class="rating">
                                            @if ($total > 0)
    {{ renderStarRating($rating / $total) }}
@else
    {{ renderStarRating(0) }}
    @endif
                                        </div>
                                        <div class="opacity-60 fs-12">({{ $total }} {{ translate('customer reviews') }})</div>
                                    </div>
                                </div>
                                @if ($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
    <div class="row no-gutters align-items-center border-top">
                                        <div class="col">
                                            <a href="{{ route('shop.visit', $detailedProduct->user->shop->slug) }}" class="d-block btn btn-soft-primary rounded-0">{{ translate('Visit Store') }}</a>
                                        </div>
                                        <div class="col">
                                            <ul class="social list-inline mb-0">
                                                <li class="list-inline-item mr-0">
                                                    <a href="{{ $detailedProduct->user->shop->facebook }}" class="facebook" target="_blank">
                                                        <i class="lab la-facebook-f opacity-60"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item mr-0">
                                                    <a href="{{ $detailedProduct->user->shop->google }}" class="google" target="_blank">
                                                        <i class="lab la-google opacity-60"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item mr-0">
                                                    <a href="{{ $detailedProduct->user->shop->twitter }}" class="twitter" target="_blank">
                                                        <i class="lab la-twitter opacity-60"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="{{ $detailedProduct->user->shop->youtube }}" class="youtube" target="_blank">
                                                        <i class="lab la-youtube opacity-60"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
    @endif
                            </div> -->

                    <div class="bg-white rounded shadow-sm mb-3">
                        <div class="p-3 border-bottom fs-16 fw-600">
                            {{ translate('Top Selling Products') }}
                        </div>
                        <div class="p-3">
                            <ul class="list-group list-group-flush">
                                @foreach (filter_products(\App\Product::where('user_id', $detailedProduct->user_id)->orderBy('num_of_sale', 'desc'))->limit(6)->get()
        as $key => $top_product)
                                    <li class="py-3 px-0 list-group-item border-light">
                                        <div class="row gutters-10 align-items-center">
                                            <div class="col-5">
                                                <a href="{{ route('product', $top_product->slug) }}"
                                                    class="d-block text-reset">
                                                    <img class="img-fit lazyload h-xxl-110px h-xl-80px h-120px"
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($top_product->thumbnail_img) }}"
                                                        alt="{{ $top_product->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                </a>
                                            </div>
                                            <div class="col-7 text-left">
                                                <h4 class="fs-13 text-truncate-2">
                                                    <a href="{{ route('product', $top_product->slug) }}"
                                                        class="d-block text-reset">{{ $top_product->getTranslation('name') }}</a>
                                                </h4>
                                                <div class="rating rating-sm mt-1">
                                                    {{ renderStarRating($top_product->rating) }}
                                                </div>
                                                <div class="mt-2">
                                                    <span
                                                        class="fs-17 fw-600 text-primary">{{ home_discounted_base_price($top_product->id) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 order-0 order-xl-1">
                    <div class="bg-white mb-3 shadow-sm rounded">
                        <div class="nav aiz-nav-tabs">
                            <a href="#tab_default_3" data-toggle="tab"
                                class="nav-item nav-link btn btn-sm btn-info fw-600 mr-1 text-reset">{{ translate('Details') }}</a>
                            <a href="#tab_default_1" data-toggle="tab"
                                class="nav-item nav-link btn btn-sm btn-danger fw-600 mr-1 active text-reset">{{ translate('Special Features') }}</a>
                            <a href="#tab_default_2" data-toggle="tab"
                                class="nav-item nav-link btn btn-sm btn-success fw-600 mr-1 text-reset">{{ translate('Specification') }}</a>
                            <a href="#tab_default_4" data-toggle="tab"
                                class="nav-item nav-link btn btn-sm btn-warning fw-600 mr-1 text-reset">{{ translate('FAQ') }}</a>
                            @if ($detailedProduct->video_link != null)
                                <a href="#tab_default_5" data-toggle="tab"
                                    class="nav-item nav-link btn btn-sm btn-primary fw-600 mr-1">{{ translate('Video') }}</a>
                            @endif
                            @if ($detailedProduct->pdf != null)
                                <a href="#tab_default_6" data-toggle="tab"
                                    class="nav-item nav-link btn btn-sm btn-primary fw-600 mr-1">{{ translate('Downloads') }}</a>
                            @endif
                            <a href="#tab_default_7" data-toggle="tab"
                                class="nav-item nav-link btn btn-sm btn-secondary fw-600 mr-1 text-reset">{{ translate('Customer Review') }}</a>
                            @php
                                $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                                $refund_sticker = \App\BusinessSetting::where('type', 'refund_sticker')->first();
                            @endphp
                            @if ($refund_request_addon != null && $refund_request_addon->activated == 1 && $detailedProduct->refundable)
                                <a href="{{ route('returnpolicy') }}" target="_blank"
                                    class="nav-item nav-link btn btn-sm btn-warning fw-600 mr-1 text-reset">{{ translate('Refund Policy') }}</a>
                            @endif
                        </div>

                        <div class="tab-content pt-0">
                            <div class="tab-pane fade active show" id="tab_default_3">
                                <div class="p-4">
                                    <div class="mw-100 overflow-hidden text-left">
                                        <?php echo $detailedProduct->getTranslation('description'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_default_1">
                                <div class="p-4">
                                    <div class="mw-100 overflow-hidden text-left">
                                        <?php echo $detailedProduct->special_feature; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_default_2">
                                <div class="p-4">
                                    <div class="mw-100 overflow-hidden text-left">
                                        <?php echo $detailedProduct->specification; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_default_4">
                                <div class="p-4">
                                    <h1 class="text-center">Frequently Asked Questions (FAQ)</h1>
                                    <div class="container py-3">
                                        <div class="row">
                                            <div class="col-12 mx-auto">
                                                <div class="accordion" id="faqExample">
                                                    @foreach ($detailedProduct->product_faq as $value)
                                                        <div class="card"
                                                            style="border: 0px;border-radius: 0px;">
                                                            <div class="card-header p-1" id="headingOne"
                                                                style="background-color: #faf8f9;border-bottom: 0px; border-left: 3px solid #d5071b;">
                                                                <p class="fs-15 fw-500 mb-0" type="button"
                                                                    data-toggle="collapse" data-target="#collapseOne"
                                                                    aria-expanded="true" aria-controls="collapseOne"
                                                                    style="padding: 1px 0px 5px 9px;">
                                                                    <span
                                                                        style="font-size:25px; font-weight:600;color:#d5071b">Q.</span>
                                                                    <strong
                                                                        style="color: #676565;">{{ $value->question }}</strong>
                                                                </p>
                                                            </div>

                                                            <div class="collapse show" aria-labelledby="headingOne"
                                                                data-parent="#faqExample"
                                                                style="border-left: 3px solid #959193;">
                                                                <div class="card-body"
                                                                    style="padding-left:15px;padding: 1px 0px 12px 12px;">
                                                                    <span
                                                                        style="font-size:25px; font-weight:600;color:#959193">A.</span>
                                                                    {{ $value->answer }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>

                                            </div>
                                        </div>
                                        <!--/row-->
                                        @if (count($detailedProduct->product_faq) <= 0)
                                            <div class="text-center fs-18">
                                                {{ translate('There have been no FAQ for this product yet.') }}
                                            </div>
                                        @endif
                                    </div>
                                    <!--container-->
                                </div>

                            </div>

                            <div class="tab-pane fade" id="tab_default_5">
                                <div class="p-4">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        @if ($detailedProduct->video_provider == 'youtube' && isset(explode('=', $detailedProduct->video_link)[1]))
                                            <iframe class="embed-responsive-item"
                                                src="https://www.youtube.com/embed/{{ explode('=', $detailedProduct->video_link)[1] }}"></iframe>
                                        @elseif ($detailedProduct->video_provider == 'dailymotion' && isset(explode('video/', $detailedProduct->video_link)[1]))
                                            <iframe class="embed-responsive-item"
                                                src="https://www.dailymotion.com/embed/video/{{ explode('video/', $detailedProduct->video_link)[1] }}"></iframe>
                                        @elseif ($detailedProduct->video_provider == 'vimeo' && isset(explode('vimeo.com/', $detailedProduct->video_link)[1]))
                                            <iframe
                                                src="https://player.vimeo.com/video/{{ explode('vimeo.com/', $detailedProduct->video_link)[1] }}"
                                                width="500" height="281" frameborder="0" webkitallowfullscreen
                                                mozallowfullscreen allowfullscreen></iframe>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_default_6">
                                <div class="p-4 text-center ">
                                    <a href="{{ uploaded_asset($detailedProduct->pdf) }}"
                                        class="btn btn-primary">{{ translate('Download') }}</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_default_7">
                                <div class="p-4">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($detailedProduct->reviews as $key => $review)
                                            @if ($review->user != null)
                                                <li class="media list-group-item d-flex">
                                                    <span class="avatar avatar-md mr-3">
                                                        <img class="lazyload"
                                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                            @if ($review->user->avatar_original != null) data-src="{{ uploaded_asset($review->user->avatar_original) }}"
                                                    @else
                                                        data-src="{{ static_asset('assets/img/placeholder.jpg') }}" @endif>
                                                    </span>
                                                    <div class="media-body text-left">
                                                        <div class="d-flex justify-content-between">
                                                            <h3 class="fs-15 fw-600 mb-0">{{ $review->user->name }}
                                                            </h3>
                                                            <span class="rating rating-sm">
                                                                @for ($i = 0; $i < $review->rating; $i++)
                                                                    <i class="las la-star active"></i>
                                                                @endfor
                                                                @for ($i = 0; $i < 5 - $review->rating; $i++)
                                                                    <i class="las la-star"></i>
                                                                @endfor
                                                            </span>
                                                        </div>
                                                        <div class="opacity-60 mb-2">
                                                            {{ date('d-m-Y', strtotime($review->created_at)) }}</div>
                                                        <p class="comment-text">
                                                            {{ $review->comment }}
                                                        </p>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>

                                    @if (count($detailedProduct->reviews) <= 0)
                                        <div class="text-center fs-18 opacity-70">
                                            {{ translate('There have been no reviews for this product yet.') }}
                                        </div>
                                    @endif

                                    @if (Auth::check())
                                        @php
                                            $commentable = false;
                                        @endphp
                                        @foreach ($detailedProduct->orderDetails as $key => $orderDetail)
                                            @if ($orderDetail->order != null &&
    $orderDetail->order->user_id == Auth::user()->id &&
    $orderDetail->delivery_status == 'delivered' &&
    \App\Review::where('user_id', Auth::user()->id)->where('product_id', $detailedProduct->id)->first() == null)
                                                @php
                                                    $commentable = true;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if ($commentable)
                                            <div class="pt-4">
                                                <div class="border-bottom mb-4">
                                                    <h3 class="fs-17 fw-600">
                                                        {{ translate('Write a review') }}
                                                    </h3>
                                                </div>
                                                <form class="form-default" role="form"
                                                    action="{{ route('reviews.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $detailedProduct->id }}">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""
                                                                    class="text-uppercase c-gray-light">{{ translate('Your name') }}</label>
                                                                <input type="text" name="name"
                                                                    value="{{ Auth::user()->name }}"
                                                                    class="form-control" disabled required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""
                                                                    class="text-uppercase c-gray-light">{{ translate('Email') }}</label>
                                                                <input type="text" name="email"
                                                                    value="{{ Auth::user()->email }}"
                                                                    class="form-control" required disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="opacity-60">{{ translate('Rating') }}</label>
                                                        <div class="rating rating-input">
                                                            <label>
                                                                <input type="radio" name="rating" value="1">
                                                                <i class="las la-star"></i>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="rating" value="2">
                                                                <i class="las la-star"></i>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="rating" value="3">
                                                                <i class="las la-star"></i>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="rating" value="4">
                                                                <i class="las la-star"></i>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="rating" value="5">
                                                                <i class="las la-star"></i>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            class="opacity-60">{{ translate('Comment') }}</label>
                                                        <textarea class="form-control" rows="4" name="comment" placeholder="{{ translate('Your review') }}"
                                                            required></textarea>
                                                    </div>

                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary mt-3">
                                                            {{ translate('Submit review') }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>

                        </div>







                    </div>
                    <div class="bg-white rounded shadow-sm">
                        <div class="border-bottom p-3">
                            <h3 class="fs-16 fw-600 mb-0">
                                <span class="mr-4">{{ translate('Related products') }}</span>
                            </h3>
                        </div>
                        <div class="p-3">
                            <div class="aiz-carousel aiz-carousel-image-size gutters-5 half-outside-arrow" data-items="5"
                                data-xl-items="3" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2"
                                data-arrows='true' data-infinite='true'>
                                @foreach (filter_products(\App\Product::where('category_id', $detailedProduct->category_id)->where('id', '!=', $detailedProduct->id))->limit(10)->get()
        as $key => $related_product)
                                    <div class="carousel-box">
                                        <div
                                            class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                            <div class="">
                                                <a href="{{ route('product', $related_product->slug) }}"
                                                    class="d-block">
                                                    <img class="img-fluid img-fit lazyload mx-auto h-100px h-md-210px"
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($related_product->thumbnail_img) }}"
                                                        alt="{{ $related_product->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                </a>
                                            </div>
                                            <div class="p-md-3 p-2 text-left">
                                                <div class="fs-15">
                                                    @if (home_base_price($related_product->id) != home_discounted_base_price($related_product->id))
                                                        <del
                                                            class="fw-600 opacity-50 mr-1">{{ home_base_price($related_product->id) }}</del>
                                                    @endif
                                                    <span
                                                        class="fw-700 text-primary">{{ home_discounted_base_price($related_product->id) }}</span>
                                                </div>
                                                <div class="rating rating-sm mt-1">
                                                    {{ renderStarRating($related_product->rating) }}
                                                </div>
                                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="{{ route('product', $related_product->slug) }}"
                                                        class="d-block text-reset">{{ $related_product->getTranslation('name') }}</a>
                                                </h3>
                                                @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                                                    <div
                                                        class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                                        {{ translate('Club Point') }}:
                                                        <span
                                                            class="fw-700 float-right">{{ $related_product->earn_point }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('modal')
    <div class="modal fade" id="chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title fw-600 h5">{{ translate('Any query about this product') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="{{ route('conversations.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $detailedProduct->id }}">
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" name="title"
                                value="{{ $detailedProduct->name }}" placeholder="{{ translate('Product Name') }}"
                                required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="8" name="message" required
                                placeholder="{{ translate('Your Question') }}">{{ route('product', $detailedProduct->slug) }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary fw-600"
                            data-dismiss="modal">{{ translate('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary fw-600">{{ translate('Send') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fw-600">{{ translate('Login') }}</h6>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <form class="form-default" role="form" action="{{ route('cart.login.submit') }}"
                            method="POST">
                            @csrf
                            <div class="form-group">
                                @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                                    <input type="text"
                                        class="form-control h-auto form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        value="{{ old('email') }}" placeholder="{{ translate('Email Or Phone') }}"
                                        name="email" id="email">
                                @else
                                    <input type="email"
                                        class="form-control h-auto form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        value="{{ old('email') }}" placeholder="{{ translate('Email') }}"
                                        name="email">
                                @endif
                                @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                                    <span
                                        class="opacity-60">{{ translate('Use country code before number') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control h-auto form-control-lg"
                                    placeholder="{{ translate('Password') }}">
                            </div>

                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class=opacity-60>{{ translate('Remember Me') }}</span>
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('password.request') }}"
                                        class="text-reset opacity-60 fs-14">{{ translate('Forgot password?') }}</a>
                                </div>
                            </div>

                            <div class="mb-5">
                                <button type="submit"
                                    class="btn btn-primary btn-block fw-600">{{ translate('Login') }}</button>
                            </div>
                        </form>

                        <div class="text-center mb-3">
                            <p class="text-muted mb-0">{{ translate('Dont have an account?') }}</p>
                            <a href="{{ route('user.registration') }}">{{ translate('Register Now') }}</a>
                        </div>
                        @if (\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                            <div class="separator mb-3">
                                <span class="bg-white px-3 opacity-60">{{ translate('Or Login With') }}</span>
                            </div>
                            <ul class="list-inline social colored text-center mb-5">
                                @if (\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1)
                                    <li class="list-inline-item">
                                        <a href="{{ route('social.login', ['provider' => 'facebook']) }}"
                                            class="facebook">
                                            <i class="lab la-facebook-f"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (\App\BusinessSetting::where('type', 'google_login')->first()->value == 1)
                                    <li class="list-inline-item">
                                        <a href="{{ route('social.login', ['provider' => 'google']) }}"
                                            class="google">
                                            <i class="lab la-google"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                    <li class="list-inline-item">
                                        <a href="{{ route('social.login', ['provider' => 'twitter']) }}"
                                            class="twitter">
                                            <i class="lab la-twitter"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    {{-- ImageZoom Start --}}
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        var bobJquery = $.noConflict();
    </script>
    <script src="{{ asset('public/assets/imagezoom.js') }}"></script>
    {{-- ImageZoom End --}}

    <script type="text/javascript">
        $(document).ready(function() {
            getVariantPrice();
        });

        function CopyToClipboard(containerid) {
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(document.getElementById(containerid));
                range.select().createTextRange();
                document.execCommand("Copy");

            } else if (window.getSelection) {
                var range = document.createRange();
                document.getElementById(containerid).style.display = "block";
                range.selectNode(document.getElementById(containerid));
                window.getSelection().addRange(range);
                document.execCommand("Copy");
                document.getElementById(containerid).style.display = "none";

            }
            AIZ.plugins.notify('success', 'Copied');
        }

        function show_chat_modal() {
            @if (Auth::check())
                $('#chat_modal').modal('show');
            @else
                $('#login_modal').modal('show');
            @endif
        }
    </script>

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>


@endsection
