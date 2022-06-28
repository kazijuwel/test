<section class="">
    <div class="container">
        <div class="bg-white rounded">
            <center>
                <div class="d-flex align-items-baseline">
                    <h5>
                        <b> Populer Products </b>
                    </h5>
                    {{-- <h6 class="py-10px"><span class="border-primary border-width-2 pb-0 d-inline-block">Everything We Expect to See in 2021</span></h6> --}}
                    <a href="{{ route('all_products', ['type' => 'populer-products']) }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">View More</a>
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
                            @foreach ($populerProducts as $key => $product)
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

                                            @else
                                                <div class="mainDiv" style="position: relative;">
                                                    <a href="{{ route('product', $product->slug) }}"
                                                        class="d-block">
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
                                                                                alt=""
                                                                                style="position: relative; width: 25%">
                                                                            <div class="d-flex justify-content-center align-items-center"
                                                                                style="position: absolute;top: 12px; font-size: 10px;  right: 8px;  color: #FFF; font-weight: 700">
                                                                                <span
                                                                                    style="">{{ discount_perchent($product->id) }}%</span>
                                                                            </div>

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
            </div>
        </div>
    </div>
    </div>
</section>
