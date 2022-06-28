<section class="mb-4">
    <div class="container">
        <div class="px-2 py-4 px-md-4 py-md-3 bg-white rounded">
            <center>
                <div class="d-flex align-items-baseline">
                    <h5>
                        <b> {{ translate('Upcoming Products') }}</b>
                    </h5>
                    <a href="{{ route('all_products', ['type' => 'upcoming-products']) }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">View More</a>
                    {{-- <h6 class="py-10px"><span class="border-primary border-width-2 pb-0 d-inline-block">Everything We Expect to See in 2021</span></h6> --}}
                </div>
            </center>

            {{-- For hr tag --}}
            <div class="" style="background-color: #FD6500; padding: 1px;">
            </div>

            {{-- <div class="aiz-carousel carosole2 gutters-10 half-outside-arrow" data-items="6" data-xl-items="4" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                    @foreach (filter_products(\App\Product::where('published', 1)->where('featured', '4'))->limit(12)->get()
    as $key => $product)
                    <div class="carousel-box">
                        <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="{{ route('product', $product->slug) }}" class="d-block">
                                    <img
                                        class="lazyload img-fluid"
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
                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                    <a href="{{ route('product', $product->slug) }}" class="d-block text-reset">{{  $product->getTranslation('name')  }}</a>
                                </h3>
                                  <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-27px"
                                            class="d-block text-reset">{{ $product->getTranslation('unit') }}

                                               </h3>

                                <div class="fs-15">
                                    @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                        <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>
                                    @endif
                                    <span class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                </div>
                                @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                                    <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                        {{ translate('Club Point') }}:
                                        <span class="fw-700 float-right">{{ $product->earn_point }}</span>
                                    </div>
                                @endif

                                <div class="d-flex justify-content-between mt-2 muted">
                                    <span class="fw-700 float-right">{{ renderStarRating($product->rating) }}</span>
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> --}}

            {{-- Test --}}
            <div class="pt-4"
                style="display:grid;grid-template-columns: 31.6% 33% 33%;grid-column-gap: 1.2%;grid-row-gap:10px;">
                @foreach (filter_products(\App\Product::where('published', 1)->where('featured', '4'))->take(7)->get()
    as $key => $product)
                    @if ($loop->first)
                        <div class="mainDiv" style="position: relative;grid-row:1/4;height:100%;">
                            <a href="{{ route('product', $product->slug) }}" class="d-block"
                                style="height:inherit">
                                <div class="card mb-0" style="height: inherit">
                                    <div class="">
                                        <img class="text-center"
                                            src="{{ uploaded_asset($product->thumbnail_img) }}" alt="image"
                                            style="width: 100% ; position: relative;">
                                        @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                            <div class="discount"
                                                style="position: absolute; top: 0; right:0; margin: 8px; text-align: right; ">
                                                <img class=""
                                                    src="{{ asset('public/images/discount.svg') }}" alt=""
                                                    style="position: relative; width: 12%">
                                                <div class="d-flex justify-content-center align-items-center"
                                                    style="position: absolute;top: 10px; font-size: 10px;  right: 8px;  color: #FFF; font-weight: 700">
                                                    <span style="">{{ discount_perchent($product->id) }}%</span>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($product->delivery_free == true)
                                            <div class="free_delivery"
                                                style="position: absolute; top: 0; right:0; margin: 5px; text-align: left; ">
                                                <img class=""
                                                    src="{{ asset('public/images/freedelivery.png') }}" alt=""
                                                    style="position: relative; width: 40%">
                                            </div>
                                        @endif
                                    @else
                                        <div class="mainDiv" style="position: relative;">
                                            <a href="{{ route('product', $product->slug) }}" class="d-block">
                                                <div class="card mb-0">
                                                    <div class="media">
                                                        <div class="w3-display-container" style="width: 50%">
                                                            <img class="text-center"
                                                                src="{{ uploaded_asset($product->thumbnail_img) }}"
                                                                alt="image"
                                                                style="height: 185px; ; position: relative;">
                                                            @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                                <div class="discount"
                                                                    style="position: absolute; top: 0; right:0; margin: 8px; text-align: right; ">
                                                                    <img class=""
                                                                        src="{{ asset('public/images/discount.svg') }}"
                                                                        alt="" style="position: relative; width: 25%">
                                                                    <div class="d-flex justify-content-center align-items-center"
                                                                        style="position: absolute;top: 12px; font-size: 10px;  right: 8px;  color: #FFF; font-weight: 700">
                                                                        <span
                                                                            style="">{{ discount_perchent($product->id) }}%</span>
                                                                    </div>

                                                                </div>
                                                            @endif
                                                            @if ($product->delivery_free == true)
                                            <div class="free_delivery"
                                                style="position: absolute; top: 0; right:0; margin: 5px; text-align: left; ">
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
    {{-- End Test --}}
    </div>
    </div>
</section>
