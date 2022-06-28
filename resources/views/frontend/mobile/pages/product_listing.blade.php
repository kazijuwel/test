@extends('frontend.mobile.layout.app')
@section('content')

    <main class="app-content">

        <section>
            <section class="mb-4 pt-3">
                <div class="container sm-px-0">
                    <form class="" id="search-form" action="" method="GET">
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="aiz-filter-sidebar collapse-sidebar-wrap sidebar-xl sidebar-right z-1035">
                                    <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" data-same=".filter-sidebar-thumb"></div>

                                    <div class="collapse-sidebar c-scrollbar-light text-left">
                                        <div class="d-flex d-xl-none justify-content-between align-items-center pl-3 border-bottom">
                                            <h3 class="h6 mb-0 fw-600">{{ translate('Filters') }}</h3>
                                            <button type="button" class="btn btn-sm p-2 filter-sidebar-thumb" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" type="button">
                                                <i class="las la-times la-2x"></i>
                                            </button>
                                        </div>
                                        <div class="bg-white shadow-sm rounded mb-3">
                                            <div class="fs-15 fw-600 p-3 border-bottom">
                                                {{ translate('Categories')}}
                                            </div>
                                            <div class="p-3">
                                                <ul class="list-unstyled">
                                                    @if (!isset($category_id))
                                                        @foreach (\App\Category::where('level', 0)->get() as $category)
                                                            <li class="mb-2 ml-2">
                                                                <a class="text-reset fs-14" href="{{ route('products.category', $category->slug) }}">{{ $category->getTranslation('name') }}</a>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li class="mb-2">
                                                            <a class="text-reset fs-14 fw-600" href="{{ route('search') }}">
                                                                <i class="las la-angle-left"></i>
                                                                {{ translate('All Categories')}}
                                                            </a>
                                                        </li>
                                                        @if (\App\Category::find($category_id)->parent_id != 0)
                                                            <li class="mb-2">
                                                                <a class="text-reset fs-14 fw-600" href="{{ route('products.category', \App\Category::find(\App\Category::find($category_id)->parent_id)->slug) }}">
                                                                    <i class="las la-angle-left"></i>
                                                                    {{ \App\Category::find(\App\Category::find($category_id)->parent_id)->getTranslation('name') }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                        <li class="mb-2">
                                                            <a class="text-reset fs-14 fw-600" href="{{ route('products.category', \App\Category::find($category_id)->slug) }}">
                                                                <i class="las la-angle-left"></i>
                                                                {{ \App\Category::find($category_id)->getTranslation('name') }}
                                                            </a>
                                                        </li>
                                                        @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($category_id) as $key => $id)
                                                            <li class="ml-4 mb-2">
                                                                <a class="text-reset fs-14" href="{{ route('products.category', \App\Category::find($id)->slug) }}">{{ \App\Category::find($id)->getTranslation('name') }}</a>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bg-white shadow-sm rounded mb-3">
                                            <div class="fs-15 fw-600 p-3 border-bottom">
                                                {{ translate('Price range')}}
                                            </div>
                                            <div class="p-3">
                                                <div class="aiz-range-slider">
                                                    <div
                                                        id="input-slider-range"
                                                        data-range-value-min="@if(count(\App\Product::query()->get()) < 1) 0 @else {{ filter_products(\App\Product::query())->get()->min('unit_price') }} @endif"
                                                        data-range-value-max="@if(count(\App\Product::query()->get()) < 1) 0 @else {{ filter_products(\App\Product::query())->get()->max('unit_price') }} @endif"
                                                    ></div>

                                                    <div class="row mt-2">
                                                        <div class="col-6">
                                                            <span class="range-slider-value value-low fs-14 fw-600 opacity-70"
                                                                @if (isset($min_price))
                                                                    data-range-value-low="{{ $min_price }}"
                                                                @elseif($products->min('unit_price') > 0)
                                                                    data-range-value-low="{{ $products->min('unit_price') }}"
                                                                @else
                                                                    data-range-value-low="0"
                                                                @endif
                                                                id="input-slider-range-value-low"
                                                            ></span>
                                                        </div>
                                                        <div class="col-6 text-right">
                                                            <span class="range-slider-value value-high fs-14 fw-600 opacity-70"
                                                                @if (isset($max_price))
                                                                    data-range-value-high="{{ $max_price }}"
                                                                @elseif($products->max('unit_price') > 0)
                                                                    data-range-value-high="{{ $products->max('unit_price') }}"
                                                                @else
                                                                    data-range-value-high="0"
                                                                @endif
                                                                id="input-slider-range-value-high"
                                                            ></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-white shadow-sm rounded mb-3">
                                            <div class="fs-15 fw-600 p-3 border-bottom">
                                                {{ translate('Filter by color')}}
                                            </div>
                                            <div class="p-3">
                                                <div class="aiz-radio-inline">
                                                    @foreach ($all_colors as $key => $color)
                                                    <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="{{ \App\Color::where('code', $color)->first()->name }}">
                                                        <input
                                                            type="radio"
                                                            name="color"
                                                            value="{{ $color }}"
                                                            onchange="filter()"
                                                            @if(isset($selected_color) && $selected_color == $color) checked @endif
                                                        >
                                                        <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                            <span class="size-30px d-inline-block rounded" style="background: {{ $color }};"></span>
                                                        </span>
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        @foreach ($attributes as $key => $attribute)
                                            @if (\App\Attribute::find($attribute['id']) != null)
                                                <div class="bg-white shadow-sm rounded mb-3">
                                                    <div class="fs-15 fw-600 p-3 border-bottom">
                                                        {{ translate('Filter by') }} {{ \App\Attribute::find($attribute['id'])->getTranslation('name') }}
                                                    </div>
                                                    <div class="p-3">
                                                        <div class="aiz-checkbox-list">
                                                            @if(array_key_exists('values', $attribute))
                                                                @foreach ($attribute['values'] as $key => $value)
                                                                    @php
                                                                        $flag = false;
                                                                        if(isset($selected_attributes)){
                                                                            foreach ($selected_attributes as $key => $selected_attribute) {
                                                                                if($selected_attribute['id'] == $attribute['id']){
                                                                                    if(in_array($value, $selected_attribute['values'])){
                                                                                        $flag = true;
                                                                                        break;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    @endphp
                                                                    <label class="aiz-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            name="attribute_{{ $attribute['id'] }}[]"
                                                                            value="{{ $value }}" @if ($flag) checked @endif
                                                                            onchange="filter()"
                                                                        >
                                                                        <span class="aiz-square-check"></span>
                                                                        <span>{{ $value }}</span>
                                                                    </label>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                        {{-- <button type="submit" class="btn btn-styled btn-block btn-base-4">Apply filter</button> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9">

                                <ul class="breadcrumb bg-transparent p-0">
                                    <li class="breadcrumb-item opacity-50">
                                        <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                                    </li>
                                    @if(!isset($category_id))
                                        <li class="breadcrumb-item fw-600  text-dark">
                                            <a class="text-reset" href="{{ route('search') }}">"{{ translate('All Categories')}}"</a>
                                        </li>
                                    @else
                                        <li class="breadcrumb-item opacity-50">
                                            <a class="text-reset" href="{{ route('search') }}">{{ translate('All Categories')}}</a>
                                        </li>
                                    @endif
                                    @if(isset($category_id))
                                        <li class="text-dark fw-600 breadcrumb-item">
                                            <a class="text-reset" href="{{ route('products.category', \App\Category::find($category_id)->slug) }}">"{{ \App\Category::find($category_id)->getTranslation('name') }}"</a>
                                        </li>
                                    @endif
                                </ul>

                                <div class="text-left mt-2">
                                    <div class="d-flex align-items-center">

                                        <div class="form-group">
                                            <label class="mb-0 opacity-50">{{ translate('Brands')}}</label>
                                            <select class="form-control form-control-sm" data-live-search="true" name="brand" onchange="filter()" >
                                                <option value="">{{ translate('Brands')}}</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->slug }}" @isset($brand_id) @if ($brand_id == $brand->id) selected @endif @endisset>{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        &nbsp;&nbsp;&nbsp;
                                        <div class="form-group">
                                            <label class="mb-0 opacity-50">{{ translate('Sort by')}}</label>
                                            <select class="form-control form-control-sm" name="sort_by" onchange="filter()">
                                                <option value="newest" @isset($sort_by) @if ($sort_by == 'newest') selected @endif @endisset>{{ translate('Newest')}}</option>
                                                <option value="oldest" @isset($sort_by) @if ($sort_by == 'oldest') selected @endif @endisset>{{ translate('Oldest')}}</option>
                                                <option value="price-asc" @isset($sort_by) @if ($sort_by == 'price-asc') selected @endif @endisset>{{ translate('Price low to high')}}</option>
                                                <option value="price-desc" @isset($sort_by) @if ($sort_by == 'price-desc') selected @endif @endisset>{{ translate('Price high to low')}}</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <input type="hidden" name="min_price" value="">
                                <input type="hidden" name="max_price" value="">
                                <!--new Products-->

                                    {{-- <div class="row" style="margin:0">
                                        @foreach ($products as $key => $product)
                                        <div class="col-6 col-sm-6 col-md-4" style="border: .5px solid #e9e9e9ba;">
                                            <a href="{{ route('product', $product->slug) }}" class="product-sm pt-2">
                                                <div class="img-wrap">
                                                    <img src="{{ uploaded_asset($product->thumbnail_img) }}">
                                                    <div class="topright">
                                                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                        <span class="product_image">
                                                            <img src="{{ asset('public/mobileview/img/discount.png') }}" style="height: 40px; width:40px">
                                                        </span>
                                                        <span class="product_discount" style="margin-left: -39px; font-size: 12px;">{{ discount_perchent($product->id) }}%</span>

                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="text-wrap">
                                                    <p class="title text-justify text-center text-dark">{{ $product->getTranslation('name') }}</p>


                                                    <div class="price text-center">
                                                      <span style="color:#F15722">  {{ home_discounted_base_price($product->id) }} </span>
                                                        &nbsp;<small class="text-primary"><del> {{ home_base_price($product->id) }}</del></small>
                                                    </div>
                                                    <!-- price-wrap.// -->
                                                </div>
                                            </a>
                                        </div> <!-- col.// -->
                                        @endforeach

                                    </div> <!-- row end --> --}}


                                    <div class="row">
                                        @foreach($products as $product)
                                        <div  class="col-6">
                                          <div class="item product-item">
                                                <a href="{{ route('product', $product->slug) }}" class="product-sm">
                                                    <div class="img-wrap">
                                                        <img src="{{ uploaded_asset($product->thumbnail_img) }}">
                                                        <div class="topright">
                                                            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                            <span class="product_image">
                                                                <img src="{{ asset('public/mobileview/img/discount.png') }}" style="height: 40px; width:40px">
                                                            </span>
                                                            <span class="product_discount" style="margin-left: -39px; font-size: 12px;">{{ discount_perchent($product->id) }}%</span>

                                                            @endif
                                                    </div>
                                                    </div>
                                                    <div class="text-wrap">
                                                        <p class="title text-justify text-center text-dark"><b>{{ Str::limit($product->getTranslation('name'),35,'...')  }}</b></p>
                                                        <div class="price text-center">
                                                            <span style="color:#DF501F">{{ home_discounted_base_price($product->id) }}</span>
                                                            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                            <small class="text-primary"><del>{{ home_base_price($product->id)}}</del></small>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <!-- price-wrap.// -->
                                                </a>
                                          </div>
                                        </div>
                                        @endforeach
                                    </div>




                                <!--product-->
                                {{-- <div class="row gutters-5 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-4 row-cols-md-3 row-cols-2">
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


                                <!--product-->
                                <div class="aiz-pagination aiz-pagination-center mt-4">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </section>
    </main>
@endsection
@section('js')
    <script type="text/javascript">

        $(document).ready(function() {
            $('.form-control[name="products"]').on('change', showAddToCartModal_bulk);


            function showAddToCartModal_bulk(id){

                var target = $(event.target);
                if(!$('#modal-size').hasClass('modal-lg')){
                    $('#modal-size').addClass('modal-lg');
                }
                $('#addToCart-modal-body').html(null);
                $('#addToCart').modal();
                $('.c-preloader').show();
                $.post('{{ route('cart.showCartModal') }}', {_token: AIZ.data.csrf, id:target.val()}, function(data){
                    $('.c-preloader').hide();
                    $('#addToCart-modal-body').html(data);
                    AIZ.plugins.slickCarousel();
                    AIZ.plugins.zoom();
                    AIZ.extra.plusMinus();
                    getVariantPrice();
                });

                //console.log(target.val() + " = " + target.find('option:selected').text());
                //alert(target.val() + " = " + target.find('option:selected').text());
            }
            });



        function filter(){
            $('#search-form').submit();
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
    </script>
@endsection
