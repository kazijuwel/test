@extends('frontend.mobile.layout.app')
@section('css')
    <link href="{{ asset('public/mobileview') }}/plugins/fancybox/fancybox.min.css" type="text/css" rel="stylesheet">
    <style>
        .card {
            -webkit-box-shadow: 0 0 13px 0 rgb(82 63 105 / 5%);
            box-shadow: 0 0 13px 0 rgb(82 63 105 / 5%);
            background-color: #fff;
            margin-bottom: 5px;
            border-color: #ebedf2;
        }

        .toTopImg {
        display: none !important;
          }
    </style>
@endsection
@section('meta_keywords'){{ $detailedProduct->tags }}@stop
@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $detailedProduct->meta_title }}">
    <meta itemprop="description" content="{{ $detailedProduct->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $detailedProduct->meta_title }}">
    <meta name="twitter:description" content="{{ $detailedProduct->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">
    <meta name="twitter:data1" content="{{ single_price($detailedProduct->unit_price) }}">
    <meta name="twitter:label1" content="Price">
    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $detailedProduct->meta_title }}" />
    <meta property="og:type" content="og:product" />
    <meta property="og:url" content="{{ route('product', $detailedProduct->slug) }}" />
    <meta property="og:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}" />
    <meta property="og:description" content="{{ $detailedProduct->meta_description }}" />
    <meta property="og:site_name" content="{{ get_setting('meta_title') }}" />
    <meta property="og:price:amount" content="{{ single_price($detailedProduct->unit_price) }}" />
    <meta property="product:price:currency"
        content="{{ \App\Currency::findOrFail(\App\BusinessSetting::where('type', 'system_default_currency')->first()->value)->code }}" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">

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
@section('content')
    <main class="app-content">
        <section class="footer-button" style="position:fixed; bottom:50px;z-index:9999;width:100%">
            <div class="row p-1">
                <div class="col-6 ">
                    <a href="tel:01841-695695" class="btn btn-primary  px-5 p-2 text-white" style="width: 100%">
                       <i class="fa fa-phone"></i>  Call
                    </a>
                </div>
                <div class="col-6">
                    <button onclick="buyNow()" class="btn btn-primary   r-0 p-2" style="width: 100%">
                       <i class="fa fa-shopping-cart"></i>  Buy Now
                    </button>
                </div>

            </div>
         </section>

        <section class="gallery-wrap">
            @php
                $photos = explode(',', $detailedProduct->photos);
                // dd($photos[0]);
            @endphp

            <a href="{{ uploaded_asset($photos[0]) }}" data-fancybox="gallery" class="img-big-wrap"><img
                    src="{{ uploaded_asset($photos[0]) }}"></a>

            <div class="thumbs-wrap scroll-horizontal">
                @foreach ($photos as $key => $photo)
                    <a href="{{ uploaded_asset($photo) }}" data-fancybox="gallery" class="item-thumb"> <img
                            src="{{ uploaded_asset($photo) }}"></a>
                @endforeach

            </div>
        </section>
        <section class="padding-around" style="padding: 12px !important">
            <h5 class="title-detail">
                <b>{{ $detailedProduct->getTranslation('name') }}</b>
            </h5>
            <div class="price-wrap mt-1">
                <span class="" style="font-size: 17px;color:#707070">
                    Product
                    Id:{{ date('Y.d.m', strtotime($detailedProduct->created_at)) }}.{{ $detailedProduct->category_id }}.{{ $detailedProduct->id }}
                </span>
            </div>


            <section class="mt-2">
                <div class="row">
                    <div class="col-6">
                        <ul class="rating-stars">
                            @php
                                $rating = renderStarRating($detailedProduct->rating);
                                if ($rating > 0) {
                                    $rating = $rating;
                                } else {
                                    $rating = 0;
                                }

                            @endphp
                            @if ($rating == 1)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            @elseif($rating == 2)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            @elseif($rating == 3)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            @elseif($rating == 4)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            @elseif($rating == 5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            @else
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            @endif
                        </ul>
                        <div class="rating-wrap">
                            @php
                                $total = 0;
                                $total += $detailedProduct->reviews->count();
                            @endphp
                            <span class="rating">
                                {{ renderStarRating($detailedProduct->rating) }}
                            </span>
                            <span class="ml-1 opacity-50">({{ $total }} {{ translate('reviews') }})</span>

                        </div>
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
                                        alt="{{ $detailedProduct->brand->getTranslation('name') }}" height="24">
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
                    </div>
                </div>
            </section>

            <section class="mt-2">
                <div class="row">

                    <div class="col-12">
                        <div class="m-0">
                            <h5 class="ml-1">Price: <span
                                    class="text-danger">{{ home_discounted_price($detailedProduct->id) }}<del
                                        class="ml-2">{{ home_base_price($detailedProduct->id) }}</span></del>
                            </h5>
                        </div>
                        <div class="qitem" style="margin-top: -13px">
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
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="">
                                        <div class="my-2">
                                            <h5>{{ translate('Quantity') }}:</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="product-quantity d-flex align-items-center">
                                            <div class="row no-gutters align-items-center aiz-plus-minus mr-3"
                                                style="width: 130px;">
                                                <button class="btn col-auto btn-icon btn-sm btn-circle btn-light"
                                                    type="button" data-type="minus" data-field="quantity" disabled="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input type="text" name="quantity"
                                                    class="col border-0 text-center flex-grow-1 fs-16 input-number"
                                                    placeholder="1" value="{{ $detailedProduct->min_qty }}"
                                                    min="{{ $detailedProduct->min_qty }}" max="10" readonly>
                                                <button class="btn  col-auto btn-icon btn-sm btn-circle btn-light"
                                                    type="button" data-type="plus" data-field="quantity">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            {{-- <div class="avialable-amount opacity-60">(<span id="available-quantity">{{ $qty }}</span> {{ translate('available')}}) ({{$detailedProduct->num_of_sale}} Sold)</div> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-start" id="chosen_price_div" style="margin-top:-12px">
                                    <div class="col-10">
                                        <div class="my-2">
                                            <h5 class="ml-1">{{ translate('Total Price') }}:
                                                <strong id="chosen_price" class="h5 fw-600 text-danger">
                                                    {{ home_discounted_price($detailedProduct->id) }}
                                                </strong>

                                            </h5>
                                        </div>
                                    </div>
                                    @if($detailedProduct->featured == "5")
                                    <div class="col-2">
                                        <img class="img-fluid"
                                            src="{{ asset('public/images/freedelivery.png') }}" alt="">

                                    </div>
                                    @endif
                                    <!-- <div class="col-sm-8 col-xs-8 mt-1">
                                                    <button type="button" class="btn btn-sm btn-success fw-600">
                                                        <span class="d-md-inline-block">Monthly EMI BDT 5,224</span>
                                                    </button>
                                                </div> -->

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-2">
                <div class="row">
                    <div class="col-6">
                        <!--<a onclick="showModal()">-->
                        <!--    <div class="" style="background:#81a311">-->
                        <!--        <p class="p-2 text-white text-center">-->
                        <!--            <i class="fa fa-phone"></i>Call for Order<br>(ফোনে অর্ডার করুন)-->
                        <!--        </p>-->
                        <!--    </div>-->
                        <!--</a>-->

                        <!--@if (\App\BusinessSetting::where('type', 'conversation_system')->first()->value == 1)
    -->
                        <!--    <a onclick="show_chat_modal()">-->
                        <!--        <div class="bg-info">-->
                        <!--            <p class="p-2 text-white text-center">Message Seller</p>-->
                        <!--        </div>-->
                        <!--    </a>-->
                        <!--
    @endif-->
                        <!--<a onclick="addToWishList({{ $detailedProduct->id }})">-->
                        <!--    <div class="mt-2" style="background:#F1C818">-->
                        <!--        <p class="p-2 text-white text-center">Add to Wishlist</p>-->
                        <!--    </div>-->
                        <!--</a>-->
                        @if ($qty > 0)
                            <a onclick="addToCart()">
                                <div class="mt-2" style="background:#FD6500;">
                                    <p class="p-2 text-white text-center">Add to Cart<br>( কার্টে যোগ করুন )</p>
                                </div>
                            </a>
                        @else
                            <a>
                                <div class="mt-2" style="background:#A996E7" disabled>
                                    <p class="p-2 text-white text-center">Add to Cart</p>
                                </div>
                            </a>
                        @endif

                    </div>
                    <div class="col-6">
                        <!--<a href="{{ route('contuct_us.create') }}">-->
                        <!--    <div class="mb-2" style="background:#A996E7">-->
                        <!--        <p class="p-2  text-white text-center">Bulk Order<br>(পাইকারি ক্রয়)</p>-->
                        <!--    </div>-->
                        <!--</a>-->

                        <!--    <a onclick="showModal()" class="btn btn-light mr-1" style="font-size: 12px; color:#e3571a;">-->
                        <!--    <i class="fa fa-phone"></i> Call for Order-->
                        <!--</a>-->



                        <!--<a onclick="addToCompare({{ $detailedProduct->id }})">-->
                        <!--    <div class="" style="background:#81a311">-->
                        <!--        <p class="p-2 text-white text-center">Add to Compare</p>-->
                        <!--    </div>-->
                        <!--</a>-->
                        @if ($qty > 0)
                            <a onclick="buyNow()">
                                <div class="bg-danger mt-2">
                                    <p class="p-2 text-white text-center">Buy Now<br>(সরাসরি ক্রয় করুন)</p>
                                </div>
                            </a>
                        @else
                            <a>
                                <div class="bg-danger mt-2" disabled>
                                    <p class="p-2 text-white text-center">Buy Now</p>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </section>

            <section class="mb-1">
                <div class="col-12">
                    <article class="">
                        <p>
                            @if (isset($detailedProduct->quick_overview))
                                <div class="row no-gutters">
                                    <div class="short-description">
                                        <h5 class="mb-3 fs-20 fw-600">Quick Overview</h5>
                                        <div class="mw-100 overflow-hidden text-left">
                                            <?php echo $detailedProduct->quick_overview; ?>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </p>
                    </article>
                </div>
                <div class="col-12">
                    <div class="deliverymt-1" style="line-height: 1.5px">
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
                        <p><i class="las la-times-circle mr-1 fs-18"></i>Sold out: {{ $detailedProduct->num_of_sale }}
                            @if ($detailedProduct->unit != null)
                                {{ $detailedProduct->getTranslation('unit') }}
                            @endif
                        </p>
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
            </section>



            <section class="mt-3">
                <div class="row">
                    <div class="col-12">
                        <div id="accordion">
                            <div class="card">
                                <div id="Details">
                                    <div class="p-2 text-white bg-danger">
                                        <div class="text-center">
                                            Details
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card-body" id="DetailsContent">
                                        {!! $detailedProduct->getTranslation('description') !!}
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div id="Special">
                                    <div class="p-2 text-white" style="background: #81a311">
                                        <div class="text-center">
                                            Special Features
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card-body" id="SpecialContent">
                                        {!! $detailedProduct->special_feature !!}
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div id="Specifiction">
                                    <div class="p-2 text-white" style="background: #9f88e9">
                                        <div class="text-center">
                                            Specifiction
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card-body" id="SpecifictionContent">
                                        {!! $detailedProduct->specification !!}
                                    </div>
                                </div>
                            </div>



                            <div class="card">
                                <div id="FAQ">
                                    <div class="p-2 text-white" style="background: #F1C818">
                                        <div class="text-center">
                                            FAQ
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card-body" id="FAQContent">
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
                                                                            data-toggle="collapse"
                                                                            data-target="#collapseOne" aria-expanded="true"
                                                                            aria-controls="collapseOne"
                                                                            style="padding: 1px 0px 5px 9px;">
                                                                            <span
                                                                                style="font-size:25px; font-weight:600;color:#d5071b">Q.</span>
                                                                            <strong
                                                                                style="color: #676565;">{{ $value->question }}</strong>
                                                                        </p>
                                                                    </div>

                                                                    <div class="collapse show"
                                                                        aria-labelledby="headingOne"
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
                                </div>
                            </div>

                            <div class="card">
                                <div id="customer">
                                    <div class="p-2 text-white bg-info">
                                        <div class="text-center">
                                            Customer Review
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card-body" id="customerContent">
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
                                </div>
                            </div>



                        </div>


                    </div>
                </div>
            </section>
            <section>
                <div class="row mt-4">
                    <div class="col-2">
                        <div class="my-2">{{ translate('Share') }}: </div>
                    </div>
                    <div class="col-8">
                        <div class="aiz-share">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 d-flex justify-content-sm-center" style="margin-top: 10px;">
                        @if (get_setting('payment_method_images') != null)
                            @foreach (explode(',', get_setting('payment_method_images')) as $key => $value)
                                <img class="img-fit" src="{{ uploaded_asset($value) }}" style="width:100%">
                            @endforeach
                        @endif

                    </div>
                    <div class="col-2"></div>

                </div>
            </section>
            <section>
                <hr class="divider my-3">

                <div class="producttitle" style="background: #ffffff;;padding: 5px;border-bottom: 1px solid #d7d7d7;">
                    <h3 style="margin: 0;font-size: 18px;"> Related Product</h3>
                </div>


                <div class="owl-carousel slide_releted">
                    @foreach ($reletedproducts as $key => $product)
                        <div class="item product-item">
                            <a href="{{ route('product', $product->slug) }}" class="product-sm">
                                <div class="img-wrap">
                                    <img src="{{ uploaded_asset($product->thumbnail_img) }}">
                                    <div class="topright">
                                        @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                            <span class="product_image">
                                                <img src="{{ asset('public/mobileview/img/discount.png') }}"
                                                    style="height: 40px; width:40px">
                                            </span>
                                            <span class="product_discount"
                                                style="margin-left: -39px; font-size: 12px;">{{ discount_perchent($product->id) }}%</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="text-wrap">
                                    <p class="title text-justify text-center text-dark">
                                        <b>{{ Str::limit($product->getTranslation('name'), 35, '...') }}</b></p>

                                    <div class="price text-center">
                                        <span style="color:#DF501F">{{ home_discounted_base_price($product->id) }}</span>
                                        @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                            <small
                                                class="text-primary"><del>{{ home_base_price($product->id) }}</del></small>
                                        @endif
                                    </div>
                                </div>
                                <!-- price-wrap.// -->
                            </a>
                        </div>
                    @endforeach
                </div>












            </section>
            <!---Start footer Button--->



            <!---End footer Button--->
            <!---main div-->
            </div>
            </div>












            <div class="modal fade" id="chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size"
                    role="document">
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
                                        value="{{ $detailedProduct->name }}"
                                        placeholder="{{ translate('Product Name') }}" required>
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
                                                value="{{ old('email') }}"
                                                placeholder="{{ translate('Email Or Phone') }}" name="email" id="email">
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
                                                <input type="checkbox" name="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>
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


            <div class="modal fade" id="addToCart">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size"
                    role="document">
                    <div class="modal-content position-relative">
                        <div class="c-preloader text-center p-3">
                            <i class="las la-spinner la-spin la-3x"></i>
                        </div>
                        <button type="button" class="close absolute-top-right btn-icon close z-1" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true" class="la-2x">&times;</span>
                        </button>
                        <div id="addToCart-modal-body" data-v="sdfas">

                        </div>
                    </div>
                </div>
            </div>

    </main>

@endsection
@section('js')
    <script>
        $("#DetailsContent").hide();
        $("#SpecialContent").hide();
        $("#SpecifictionContent").hide();
        $("#FAQContent").hide();
        $("#customerContent").hide();

        $(document).ready(function() {
            $(document).on('click', '#Details', function() {
                $("#DetailsContent").slideToggle();
                $("#SpecialContent").hide();
                $("#SpecifictionContent").hide();
                $("#FAQContent").hide();
                $("#customerContent").hide();
            })
            $(document).on('click', '#Special', function() {
                $("#SpecialContent").slideToggle();
                $("#DetailsContent").hide();
                $("#SpecifictionContent").hide();
                $("#FAQContent").hide();
                $("#customerContent").hide();
            })
            $(document).on('click', '#Specifiction', function() {
                $("#SpecifictionContent").slideToggle();
                $("#DetailsContent").hide();
                $("#SpecialContent").hide();
                $("#FAQContent").hide();
                $("#customerContent").hide();
            })
            $(document).on('click', '#FAQ', function() {
                $("#FAQContent").slideToggle();
                $("#DetailsContent").hide();
                $("#SpecialContent").hide();
                $("#SpecifictionContent").hide();
                $("#customerContent").hide();
            })
            $(document).on('click', '#customer', function() {
                $("#customerContent").slideToggle();
                $("#DetailsContent").hide();
                $("#SpecialContent").hide();
                $("#SpecifictionContent").hide();
                $("#FAQContent").hide();

            })


        });
    </script>

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
            $('#chat_modal').modal('show');
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
    <script src="{{ asset('public/mobileview') }}/plugins/fancybox/fancybox.min.js" type="text/javascript"></script>

    <script>
        var incrementPlus;
        var incrementMinus;
        var min = "{{ $detailedProduct->min_qty }}"
        var max = 10;

        var buttonPlus = $(".cart-qty-plus");
        var buttonMinus = $(".cart-qty-minus");

        var incrementPlus = buttonPlus.click(function() {
            var quentity = $("#quentity").val();
            if (quentity >= max) {
                quentity = 9;
            }
            $("#quentity").val(Number(quentity) + 1);


        });

        var incrementMinus = buttonMinus.click(function() {

            var quentity = $("#quentity").val();
            if (quentity == 1) {
                quentity = 2;
            }
            $("#quentity").val(Number(quentity) - 1);
        });
    </script>
    <script type="text/javascript">
        $('.owl-carousel.slide_releted').owlCarousel({
            loop: true,
            margin: 5,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        })
    </script>
@endsection
