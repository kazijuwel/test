<!--<div class="owl-carousel owl-theme slide_2">-->
    <div class="row px-2">

        @foreach ($Dealy_products->sortByDesc('created_at') as $product)
            <div class="col-6">
                <div class="item product-item">
                    <a href="{{ route('product', $product->slug) }}" class="product-sm">
                        <div class="img-wrap">
                            <img src="{{ uploaded_asset($product->thumbnail_img) }}">
                            @if($product->delivery_free== true)
                            <div class="topleft" style="position: absolute; top:0px; left: 0px; width: 60px;">
                                <img class="topleft img-fluid" src="{{ asset('public/images/freedelivery.png') }}" alt="">

                            </div>
                            @endif
                        </div>
                        <div class="topright">
                            @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                <span class="product_image">
                                    <img src="{{ asset('public/mobileview/img/discount.png') }}"
                                        style="height: 40px; width:40px">
                                </span>
                                <span class="product_discount text-center"
                                    style="margin-left: -39px; font-size: 12px;">{{ discount_perchent($product->id) }}%</span>
                            @endif
                        </div>

                        <div class="text-wrap">
                            <p class="title text-justify text-center text-dark">
                                <b>{{ Str::limit($product->getTranslation('name'), 35, '...') }}</b>

                            </p>
                             <p class="title text-justify text-center text-dark">
                                <b>{{($product->getTranslation('unit')) }}</b></p>
                            <div class="price text-center">
                                <span style="color:#DF501F">{{ home_discounted_base_price($product->id) }}</span>
                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                    <small class="text-primary"><del>{{ home_base_price($product->id) }}</del></small>
                                @endif
                            </div>
                        </div>
                        <!-- price-wrap.// -->
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    @if($dailyAd->bobAdItems()->count() > 0)
    <div class="row my-2">
        @if($dailyAd->container_item_count == 1)
        @foreach ($dailyAd->bobAdItems()->take(1) as $ad)
        <div class="col-12">
            <a href="{{$ad->url }}">
              <img src="{{ asset('public/uploads/advertisment/'.$ad->image_name) }}" alt="images" height="100%" width="100%">
           </a>
        </div>
        @endforeach
        @elseif($dailyAd->container_item_count == 2)
        @foreach ($dailyAd->bobAdItems()->take(2) as $ad)
        <div class="col-6">
            <a href="{{$ad->url }}">
               <img src="{{ asset('public/uploads/advertisment/'.$ad->image_name) }}" alt="images" height="100%" width="100%">
            </a>
        </div>
        @endforeach
        @endif
    </div>
    @endif

    {{-- Best Sell Products --}}
    <p class="title-section" style="font-size:14px; font-weight:bold; color:#FD6500">Best Sell Products</p>
    <div class="hr mt-0">
    </div>
    {{-- <div  class="owl-carousel owl-theme slide_2"> --}}
    <div class="row px-2">
        @foreach ($best_Sellings->sortByDesc('customer_seen') as $product)
            <div class="col-6">

                <div class="item product-item ">
                    <a href="{{ route('product', $product->slug) }}" class="product-sm">
                        <div class="img-wrap">
                            <img src="{{ uploaded_asset($product->thumbnail_img) }}">
                            @if($product->delivery_free== true)
                            <div class="topleft" style="position: absolute; top:0px; left: 0px; width: 60px;">
                                <img class="topleft img-fluid" src="{{ asset('public/images/freedelivery.png') }}" alt="">

                            </div>
                            @endif
                            <div class="topright justify-content-center">
                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                    <span class="product_image">
                                        <img src="{{ asset('public/mobileview/img/discount.png') }}"
                                            style="height: 40px; width:40px">
                                    </span>
                                    <span class="product_discount text-center"
                                        style="">{{ discount_perchent($product->id) }}%</span>
                                @endif
                            </div>
                        </div>

                        <div class="text-wrap">
                            <p class="title text-justify text-center text-dark">
                                <b>{{ Str::limit($product->getTranslation('name'), 35, '...') }}</b></p>
                                 <p class="title text-justify text-center text-dark">
                                <b>{{($product->getTranslation('unit')) }}</b></p>
                            <div class="price text-center">
                                <span style="color:#DF501F">{{ home_discounted_base_price($product->id) }}</span>
                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                    <small class="text-primary"><del>{{ home_base_price($product->id) }}</del></small>
                                @endif
                            </div>
                        </div>
                        <!-- price-wrap.// -->
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <p class="title-section" style="font-size:14px; font-weight:bold; color:#FD6500">New Products</p>
    <!--<div class="owl-carousel owl-theme slide_2">-->
    <div class="row px-2">

        @foreach ($newproducts as $product)
            <div class="col-6">
                <div class="item product-item">
                    <a href="{{ route('product', $product->slug) }}" class="product-sm">
                        <div class="img-wrap">
                            <img src="{{ uploaded_asset($product->thumbnail_img) }}">
                            @if($product->delivery_free== true)
                            <div class="topleft" style="position: absolute; top:0px; left: 0px; width: 60px;">
                                <img class="topleft img-fluid" src="{{ asset('public/images/freedelivery.png') }}" alt="">

                            </div>
                            @endif
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
                                 <p class="title text-justify text-center text-dark">
                                <b>{{($product->getTranslation('unit')) }}</b></p>
                            <div class="price text-center">
                                <span style="color:#DF501F">{{ home_discounted_base_price($product->id) }}</span>
                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                    <small class="text-primary"><del>{{ home_base_price($product->id) }}</del></small>
                                @endif
                            </div>
                        </div>
                        <!-- price-wrap.// -->
                    </a>
                </div>
            </div>
        @endforeach
    </div>













    @if($newProductAd->bobAdItems()->count() > 0)
    <div class="row my-2 px-2">
        @if($newProductAd->container_item_count == 1)
        @foreach ($newProductAd->bobAdItems()->take(1) as $ad)
        <div class="col-12">
            <a href="{{$ad->url }}">
              <img src="{{ asset('public/uploads/advertisment/'.$ad->image_name) }}" alt="images" height="100%" width="100%">
           </a>
        </div>
        <input type="hidden" name="ads[]" class="add" value="{{$ad->id}}">
        @endforeach
        @elseif($newProductAd->container_item_count == 2)
        @foreach ($newProductAd->bobAdItems()->take(2) as $ad)
        <div class="col-6">
            <a href="{{$ad->url }}">
               <img src="{{ asset('public/uploads/advertisment/'.$ad->image_name) }}" alt="images" height="100%" width="100%">
            </a>
        </div>
        <input type="hidden" name="ads[]" class="add" value="{{$ad->id}}">
        @endforeach
        @endif
    </div>
    @endif


    <p class="title-section" style="font-size:14px; font-weight:bold; color:#FD6500;">Up Comming Products </p>
    <div class="row px-2">
        @foreach ($upcomming_products->sortByDesc('created_at') as $product)
            <div class="col-6">
                <div class="item product-item">
                    <a href="{{ route('product', $product->slug) }}" class="product-sm">
                        <div class="img-wrap">
                            <img src="{{ uploaded_asset($product->thumbnail_img) }}">
                            @if($product->delivery_free== true)
                            <div class="topleft" style="position: absolute; top:0px; left: 0px; width: 60px;">
                                <img class="topleft img-fluid" src="{{ asset('public/images/freedelivery.png') }}" alt="">

                            </div>
                            @endif
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
                                 <p class="title text-justify text-center text-dark">
                                <b>{{($product->getTranslation('unit')) }}</b></p>
                            <div class="price text-center">
                                <span style="color:#DF501F">{{ home_discounted_base_price($product->id) }}</span>
                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                    <small class="text-primary"><del>{{ home_base_price($product->id) }}</del></small>
                                @endif
                            </div>
                        </div>

                        <!-- price-wrap.// -->
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    @if($upcomingAd->bobAdItems()->count() > 0)
    <div class="row my-2 px-2">
        @if($upcomingAd->container_item_count == 1)
        @foreach ($upcomingAd->bobAdItems()->take(1) as $ad)
        <div class="col-12">
            <a href="{{$ad->url }}" onclick="adsclick({{$ad->id}})">
              <img src="{{ asset('public/uploads/advertisment/'.$ad->image_name) }}" alt="images" height="100%" width="100%">
           </a>
        </div>
        <input type="hidden" name="ads[]" class="add" value="{{$ad->id}}">
        @endforeach
        @elseif($upcomingAd->container_item_count == 2)
        @foreach ($upcomingAd->bobAdItems()->take(2) as $ad)
        <div class="col-6">
            <a href="{{$ad->url }}" onclick="adsclick({{$ad->id}})">
               <img src="{{ asset('public/uploads/advertisment/'.$ad->image_name) }}" alt="images" height="100%" width="100%">
            </a>
        </div>
        <input type="hidden" name="ads[]" class="add" value="{{$ad->id}}">
        @endforeach
        @endif
    </div>
    @endif

    <p class="title-section" style="font-size:14px; font-weight:bold; color:#FD6500;">Top Ranked Products</p>
    <!--<div class="owl-carousel owl-theme slide_2">-->
    <div class="row px-2">
        @foreach ($top_rankeds->sortByDesc('created_at') as $product)
            <div class="col-6">
                <div class="item product-item">
                    <a href="{{ route('product', $product->slug) }}" class="product-sm">
                        <div class="img-wrap">
                            <img src="{{ uploaded_asset($product->thumbnail_img) }}">
                            @if($product->delivery_free== true)
                            <div class="topleft" style="position: absolute; top:0px; left: 0px; width: 60px;">
                                <img class="topleft img-fluid" src="{{ asset('public/images/freedelivery.png') }}" alt="">

                            </div>
                            @endif
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
                                 <p class="title text-justify text-center text-dark">
                                <b>{{($product->getTranslation('unit')) }}</b></p>
                            <div class="price text-center">
                                <span style="color:#DF501F">{{ home_discounted_base_price($product->id) }}</span>
                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                    <small class="text-primary"><del>{{ home_base_price($product->id) }}</del></small>
                                @endif
                            </div>
                        </div>
                        <!-- price-wrap.// -->
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <p class="title-section" style="font-size:14px; font-weight:bold; color:#FD6500;">Populer Products</p>
    <!--<div class="owl-carousel owl-theme slide_2">-->
    <div class="row px-2">
        @foreach ($populerProducts->sortByDesc('created_at') as $product)
            <div class="col-6">
                <div class="item product-item">
                    <a href="{{ route('product', $product->slug) }}" class="product-sm">
                        <div class="img-wrap">
                            <img src="{{ uploaded_asset($product->thumbnail_img) }}">
                            @if($product->delivery_free== true)
                            <div class="topleft" style="position: absolute; top:0px; left: 0px; width: 60px;">
                                <img class="topleft img-fluid" src="{{ asset('public/images/freedelivery.png') }}" alt="">

                            </div>
                            @endif
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
                                 <p class="title text-justify text-center text-dark">
                                <b>{{($product->getTranslation('unit')) }}</b></p>
                            <div class="price text-center">
                                <span style="color:#DF501F">{{ home_discounted_base_price($product->id) }}</span>
                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                    <small class="text-primary"><del>{{ home_base_price($product->id) }}</del></small>
                                @endif
                            </div>
                        </div>
                        <!-- price-wrap.// -->
                    </a>
                </div>
            </div>
        @endforeach
    </div>



    @if($populerAd->bobAdItems()->count() > 0)
    <div class="row my-2 px-2">
        @if($populerAd->container_item_count == 1)
        @foreach ($populerAd->bobAdItems()->take(1) as $ad)
        <div class="col-12">
            <a href="{{$ad->url }}" onclick="adsclick({{$ad->id}})">
              <img src="{{ asset('public/uploads/advertisment/'.$ad->image_name) }}" alt="images" height="100%" width="100%">
           </a>
        </div>
        <input type="hidden" name="ads[]" class="add" value="{{$ad->id}}">
        @endforeach
        @elseif($populerAd->container_item_count == 2)
        @foreach ($populerAd->bobAdItems()->take(2) as $ad)
        <div class="col-6">
            <a href="{{$ad->url }}" onclick="adsclick({{$ad->id}})">
               <img src="{{ asset('public/uploads/advertisment/'.$ad->image_name) }}" alt="images" height="100%" width="100%">
            </a>
        </div>
        <input type="hidden" name="ads[]" class="add" value="{{$ad->id}}">
        @endforeach
        @endif
    </div>
    @endif




    <p class="title-section" style="font-size:14px; font-weight:bold;color:#FD6500;">Top Brands Products</p>
    <!--<div class="owl-carousel owl-theme slide_2">-->
    <div class="row px-2">
        @foreach ($top_brands->sortByDesc('created_at') as $product)
            <div class="col-6">
                <div class="item product-item">
                    <a href="{{ route('product', $product->slug) }}" class="product-sm">
                        <div class="img-wrap">
                            <img src="{{ uploaded_asset($product->thumbnail_img) }}">
                            @if($product->delivery_free== true)
                            <div class="topleft" style="position: absolute; top:0px; left: 0px; width: 60px;">
                                <img class="topleft img-fluid" src="{{ asset('public/images/freedelivery.png') }}" alt="">

                            </div>
                            @endif
                            <div class="topright">
                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                    <span class="product_image">
                                        <img src="{{ asset('public/mobileview/img/discount.png') }}"
                                            style="height: 40px; width:40px">
                                    </span>
                                    <span class="product_discount text-center"
                                        style="margin-left: -39px; font-size: 12px;">{{ discount_perchent($product->id) }}%</span>
                                @endif
                            </div>
                        </div>

                        <div class="text-wrap">
                            <p class="title text-justify text-center text-dark">
                                <b>{{ Str::limit($product->getTranslation('name'), 35, '...') }}</b></p>
                                 <p class="title text-justify text-center text-dark">
                                <b>{{($product->getTranslation('unit')) }}</b></p>

                            <div class="price text-center">
                                <span style="color:#DF501F">{{ home_discounted_base_price($product->id) }}</span>
                                @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                    <small class="text-primary"><del>{{ home_base_price($product->id) }}</del></small>
                                @endif
                            </div>
                        </div>
                        <!-- price-wrap.// -->
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    @section('js')
        <script type="text/javascript">
            var myIndex = 0;
            carousel();

            function carousel() {

                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                myIndex++;
                if (myIndex > x.length) {
                    myIndex = 1
                }
                x[myIndex - 1].style.display = "block";
                setTimeout(carousel, 2000); // Change image every 2 seconds
            }
        </script>
    @endsection
