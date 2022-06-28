@if($products->count() > 0)
<div class="row gutters-5 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-4 row-cols-md-3 row-cols-2">

    @foreach ($products as $key => $product)
        <div class="col mb-3">
            <div class="aiz-card-box h-100 border border-light rounded shadow-sm hov-shadow-md has-transition bg-white">
                <div class="position-relative">
                    <a href="{{ route('product', $product->slug) }}" class="d-block">
                        <img
                            class="img-fit lazyload mx-auto h-160px h-md-220px h-xl-270px h-xxl-250px"
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
                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                        <a href="{{ route('product', $product->slug) }}" class="d-block text-reset">{{ $product->getTranslation('name') }}</a>
                    </h3>
                    
                     <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-27px" 
                                            class="d-block text-reset">{{ ($product->unit) }}
                                     
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
<div class="aiz-pagination aiz-pagination-center mt-4">
    {{ $products->links() }}
</div>
@else


<h4 class="text-info text-danger p-2"> No Product Fund</h4>


@endif
