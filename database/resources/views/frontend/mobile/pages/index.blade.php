@extends('frontend.mobile.layout.app')
@section('content')
    <main class="app-content">
        <section>
            <div class="input-group" style="background-color: #B0E0E6;padding: 8px 10px 8px 10px;">
                <input type="text" class="form-control" placeholder="Search Your Product"
                    style="height:37px; border-radius: 0px">
                <div class="input-group-append">
                    <span class="input-group-text bgprimary" style="width:70px; height:37px; border-radius: 0px"><i
                            class="fa fa-search text-white" aria-hidden="true"></i></span>
                </div>
            </div>
        </section>
        <section>
            <div class="w3-content w3-section" style="max-width:500px">
                @php $slider_images = json_decode(get_setting('home_slider_images'), true);  @endphp
                @foreach ($slider_images as $key => $value)
                <img class="mySlides" src="{{ uploaded_asset($slider_images[$key]) }}" style="width:100%">
                @endforeach
            </div>
        
        </section>
        
        <section>
            <div style="margin-top: -10px;">
                <img src="{{asset('public/mobileview')}}/img/hbanner2.jpg" style="width:100%">
            </div>
        </section>


        <hr class="divider my-1">

        <h6>
            <div class="row" style="margin: 0">
                <div class="col-6">
                    <span style="font-size:13px; font-weight:bold">Best Sales</span>
        
                </div>
                {{-- <div class="col-6 text-center">
                    <a href="" style="font-size:13px; font-weight:bold">All Super Sales</a>
                </div> --}}
        
            </div>
        </h6>
       
        <section class="scroll-horizontal padding-x">
            @foreach (filter_products(\App\Product::where('published', 1)->orderBy('num_of_sale', 'desc'))->get() as $key => $product)
            <div class="item">
                <a href="{{ route('product', $product->slug) }}" class="product-sm">
                    <div class="img-wrap"> <img src="{{ uploaded_asset($product->thumbnail_img) }}">
                        <div class="topright">
                            <span><img src="" style="height: 40px; width:40px"> <span style="margin-left: -39px; font-size: 12px;">30%</span></span>
                        </div>
                    </div>
                    <div class="text-wrap">
                        <p class="title text-truncate">{{  $product->getTranslation('name')  }}</p>
                        <div>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            (0)
                        </div>
                        <div class="price">
                            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                            <small class="text-primary">{{ home_base_price($product->id) }}<del>{{ home_base_price($product->id)}}</del></small></div>
                            @endif
                            <small class="text-primary">{{ home_discounted_base_price($product->id) }}</small></div>
                        <!-- price-wrap.// -->
                    </div>
                </a>
             </div>
             @endforeach

        </section>
        <hr class="divider my-1">
        
        <p class="title-section" style="font-size:14px; font-weight:bold">Top BRAND</p>

        <section class="padding-around">
            <ul class="row" style="margin:0">
                @foreach (\App\Brand::take(12) as $key => $brand)
                <li class="col-3">
                    <a href="#">
                        <img src="{{ uploaded_asset($brand->logo) }}" alt="" style="height: 30px; width: 100%; border: 1px solid gray;">
                        </span>
                    </a>
                </li>
                @endforeach


        
            </ul>
        </section>
        <section class="padding-around">
            <p class="title-section" style="font-size:14px; font-weight:bold">Daily Deal</p>
            <p class="title-section" style="font-size:10px; ">Great Saving Every Day</p>
            <div class="row" style="margin:0">
                @foreach (filter_products(\App\Product::where('published', 1)->where('todays_deal', '1'))->limit(12)->get()
                as $key => $product)
                <div class="col-6 col-sm-6 col-md-4" style="border: .5px solid #e9e9e9ba;">
                    <a href="{{ route('product', $product->slug) }}" class="product-sm pt-2">
                        <div class="img-wrap"> <img src="{{ uploaded_asset($product->thumbnail_img) }}">
                            <div class="topright">
                                <span><img src="{{ static_asset('assets/img/placeholder.jpg') }}" style="height: 40px; width:40px"> <span
                                        style="margin-left: -39px; font-size: 12px;">30%</span></span>
                            </div>
                        </div>

                        <div class="text-wrap">
                            <p class="title text-truncate">{{ $product->getTranslation('name') }}</p>
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                (0)
                            </div>
                            <div class="price"> &nbsp; <small class="text-primary"><del></del></small></div>
                            <!-- price-wrap.// -->
                        </div>
                    </a>
                </div> <!-- col.// -->
                @endforeach


              
        
        
        
            </div> <!-- row end -->
        </section>
        <!--upcomming product-->

       
        
    </main>

@endsection