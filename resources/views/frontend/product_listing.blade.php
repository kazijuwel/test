@extends('frontend.layouts.app')

@if (isset($category_id))
    @php
        $meta_title = \App\Category::find($category_id)->meta_title;
        $meta_description = \App\Category::find($category_id)->meta_description;
    @endphp
@elseif (isset($brand_id))
    @php
        $meta_title = \App\Brand::find($brand_id)->meta_title;
        $meta_description = \App\Brand::find($brand_id)->meta_description;
    @endphp
@else
    @php
        $meta_title         = get_setting('meta_title');
        $meta_description   = get_setting('meta_description');
    @endphp
@endif

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title }}">
    <meta itemprop="description" content="{{ $meta_description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
@endsection

@section('content')

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
                                @include('frontend.categoryparts.categories')
                                @include('frontend.categoryparts.pricerange')
                                @include('frontend.categoryparts.color')




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

                        <div class="text-left">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h1 class="h6 fw-600 text-body">
                                        @if(isset($category_id))
                                            {{ \App\Category::find($category_id)->getTranslation('name') }}
                                        @elseif(isset($query))
                                            {{ translate('Search result for ') }}"{{ $query }}"
                                        @else
                                            {{ translate('All Products') }}
                                        @endif
                                    </h1>
                                </div>


                                {{-- @if($category_id == 19)
                                <div class="form-group ml-xl-3 mr-0 w-434px d-none d-xl-block">
                                    <label style="color: red; font-size: 15px;" class="mb-0"><b>{{ translate('Bulk Order (একাধিক পন্য একসাথে অর্ডার করতে নিচের লিস্ট থেকে সরাসরি পন্য সিলেক্ট করুন)')}}</b></label>
                                    <select name="products" id="products" class="form-control aiz-selectpicker" required data-placeholder="{{ translate('Choose Products') }}" data-live-search="true" data-selected-text-format="count" onclick="showAddToCartModal_bulk()">
                                        <option value="">{{ translate('Choose Products')}}</option>
                                    @foreach($products_bulk as $key => $product)
                                        <option value="{{ $product->id }}">{{ $product->getTranslation('name') }}<span> &nbsp ----------&nbsp @if(home_base_price($product->id) != home_discounted_base_price($product->id)) {{home_discounted_base_price($product->id) }}  @else {{ home_base_price($product->id) }} @endif</span></option>
                                    @endforeach
                                </select>
                                </div>
                                 @endif --}}
                                 {{-- {{dd($category->childrenCategories)}} --}}
                                 {{-- {{dd($category->categoriesss)}} --}}
                                 {{-- {{dd($category->brands)}} --}}
                                 @include('frontend.categoryparts.searchingbrand')
                            </div>
                        </div>
                        <input type="hidden" name="min_price" value="">
                        <input type="hidden" name="max_price" value="">
                        <div id="bobProducts">
                        @include('frontend.categoryparts.products')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('script')
<script>
$(".categories").click(function(event) {
    event.preventDefault();
    var that=$(this);
    var url=that.attr('href');
    var loader= '<div class="row" style="margin-top: 100px;height:50vh"><div class="col-12 m-auto text-center" style="margin-top: 200px;" ><div class="spinner-border text-success" role="status" style="width: 50px; height:50px; text-align:center"> <span class="sr-only">Loading...</span> </div></div></div>';
    $("#bobProducts").html(loader);
    $.get(url,function(data){
        $("#bobProducts").empty();
        $("#bobProducts").html(data);
    })

});
</script>
<script>
    $(".input-slider-range").change(function(event) {
        event.preventDefault();
     
        var that=$(this);
        var url=that.attr('href');
        var loader= '<div class="row" style="margin-top: 100px;height:50vh"><div class="col-12 m-auto text-center" style="margin-top: 200px;" ><div class="spinner-border text-success" role="status" style="width: 50px; height:50px; text-align:center"> <span class="sr-only">Loading...</span> </div></div></div>';
        $("#bobProducts").html(loader);
        $.get(url,function(data){
            $("#bobProducts").empty();
            $("#bobProducts").html(data);
        })

    });
    </script>
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
