@extends('frontend.mobile.layout.app')
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
    <meta property="product:price:currency" content="{{ \App\Currency::findOrFail(\App\BusinessSetting::where('type', 'system_default_currency')->first()->value)->code }}" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
@endsection
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
    <section class="gallery-wrap">
      @php
      $photos = explode(',',$detailedProduct->photos);
     @endphp
     @foreach ($photos as $key => $photo)
      <a href="{{ uploaded_asset($photo) }}" data-fancybox="gallery" class="img-big-wrap"><img
          src="{{ uploaded_asset($photo) }}"></a>
          @endforeach
      <div class="thumbs-wrap scroll-horizontal">
        @foreach ($photos as $key => $photo)
        <a href="{{ uploaded_asset($photo) }}" data-fancybox="gallery" class="item-thumb"> <img
            src="{{ uploaded_asset($photo) }}"></a>
        @endforeach
     
      </div>
    </section>
    <section class="padding-around ml-1">
        <h4 class="title-detail"><b>{{ $detailedProduct->getTranslation('name') }}</b></h4>
        <div class="price-wrap mb-3">
          <span class="h5 price">{{ home_discounted_price($detailedProduct->id) }}</span>
        </div> <!-- price-wrap.// -->
        <div class="rating-wrap mb-3">
          <!--rating-->
          <div class="col-6">
            @php
                $total = 0;
                $total += $detailedProduct->reviews->count();
            @endphp
            <span class="rating">
                {{ renderStarRating($detailedProduct->rating) }}
            </span>
            <span class="ml-1 opacity-50">({{ $total }} {{ translate('reviews') }})</span>

        </div>


          <!---rating-->
          <ul class="rating-stars">
            @php
            $total = 0;
            $total += $detailedProduct->reviews->count();
           @endphp

            <li>
              <i class="fa fa-star"></i>
               <i class="fa fa-star"></i>
              <i class="fa fa-star"></i> 
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </li>
            @if($total==1)
            <li style="width:80%" class="stars-active">
              <i class="fa fa-star"></i>
            </li>
            @elseif($total==2)
            <li style="width:80%" class="stars-active">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </li>
            @elseif($total==3)
            <li style="width:80%" class="stars-active">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </li>
            @elseif($total==4)
            <li style="width:80%" class="stars-active">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </li>
            @elseif($total==5)
            <li style="width:80%" class="stars-active">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </li>
            @else
            <li style="width:80%" class="stars-active">
            </li>
            @endif
          </ul>
          <p class="label-rating text-muted">{{$total }} Rating <span style="color:black">Brand:</span>No Brand</p>
        </div> <!-- rating-wrap.// -->
        <div>
          <ul>
            <li>Type: Over-Ear Gaming Wireless Headset<br></li>
            <li>Weight: 245 g</li>
            <li>Charging Time: 2.5 hour</li>
            <li>Capacity： 450 mAh</li>
            <li>Music Time: 36 hours</li>
          </ul>
        <hr>
       </div>
       <div class="price-wrap mb-3">
        <span class="h5 price">{{ home_discounted_base_price($detailedProduct->id) }} </span>
        {{-- <span class="p price text-primary"><del>160.95</del> </span> --}}
        <hr>
       </div> 
       <div class="customquenty mb1">
        <span class="h5 ">Quentity</span>

        <div class="input-group input-spinner float-right">
          <div class="input-group-prepend">
            <button class="btn btn-light" type="button"> <i class="fa fa-minus"></i> </button>
          </div>
          <input type="number" class="form-control" value="1">
          <div class="input-group-append">
            <button class="btn btn-light" type="button"> <i class="fa fa-plus"></i> </button>
          </div>
        </div>

       </div>
       <div class="row mt-2">
        <div class="col-md-4" style="padding: 2px;">
          <button id="submitBtn" type="submit" class="btn btn-primary" >
            <i class="fa fa-shopping-cart aria-hidden="true"></i> ADD TO CART</button>
        </div>
        <div class="col-md-4" style="padding: 2px;">
            <button id="submitBtn2" name="orderNow" value="on" type="submit" class="btn btn-danger"><i class="fa fa-shopping-basket" aria-hidden="true"></i> ORDER NOW</button>
        </div>
        </div>
        <article class="mt-3">
          <p>
            Tovar xarakteristikasi uchun tekst tekst shunchaki... Lorem ipsum dolor sit amet, consectetur adipisicing
            elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna <br> <a href="#" class="btn-link"> + Read more </a>
          </p>
        </article>


    </section>
    <hr class="divider my-3">
    <div class="producttitle" style="background: #ffffff;;padding: 5px;border-bottom: 1px solid #d7d7d7;">
      <h3 style="margin: 0;font-size: 18px;"> Related Product</h3>
    </div>
    <section class="scroll-horizontal padding-x">
      @foreach (filter_products(\App\Product::where('category_id', $detailedProduct->category_id)->where('id', '!=', $detailedProduct->id))->limit(10)->get() as $key => $related_product)
      <div class="item">
        <a href="#" class="product-sm">
          <div class="img-wrap"> <img src="{{ uploaded_asset($related_product->thumbnail_img) }}"> </div>
          <div class="text-wrap">
            <p class="title text-truncate">{{ $related_product->getTranslation('name') }}</p>
            <div class="price">{{ home_discounted_base_price($related_product->id) }}</div> <!-- price-wrap.// -->
          </div>
        </a>
      </div>
      @endforeach
    </section>
  </main>

@endsection