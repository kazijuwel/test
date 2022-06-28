<section style="margin-top: -8px">
    <div class="w3-content w3-section" style="max-width:500px">

        @foreach ($slider_images as $key => $value)
        <img class="mySlides" src="{{ uploaded_asset($slider_images[$key]) }}" style="width:100%">
        @endforeach
    </div>

</section>

@if (get_setting('home_banner1_images') != null)
@php $banner_1_imags = json_decode(get_setting('home_banner1_images'));   $count = 0; @endphp
<section class="mt-2">
    <div class="row">
    @foreach ($banner_1_imags as $key => $value)
        <?php if($count == 2) break; ?>
        <div class="col-6">
            <div class="ml-1">
                <img src="{{ uploaded_asset($banner_1_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" height="40%" width="100%">
            </div>
        </div>
        <?php $count++; ?>
        @endforeach
    </div>
</section>
@endif
<h6>
    <div class="row" style="margin: 0">
        <div class="col-12">
            <p class="title-section" style="font-size:14px; font-weight:bold; color:#FD6500; text-align:center;">FEATURED CATEGORY</p>
        </div>
    </div>
</h6>
<div class="feature-category px-1" style="background-color: #F2F3F8;">
    <div class="owl-carousel owl-theme slide_1">
        @foreach ($categorys as $category)
        <a href="{{ route('products.category', $category->slug) }}">
        <div class="item feature_category">
                <div>
                    <img src="{{ uploaded_asset($category->icon) }}" height="40px" width="30px" alt="{{ $category->getTranslation('name') }}">
                </div>
                <div class="text-justify">
                    <p class="text-center">{{ $category->getTranslation('name') }}</p>
                </div>
        </div>
        </a>
        @endforeach
    </div>
</div>

@if($aftercategoryAd->bobAdItems()->count() > 0)
<div class="row my-2 px-2">
    @if($aftercategoryAd->container_item_count == 1)
    @foreach ($aftercategoryAd->bobAdItems()->take(1) as $ad)
    <div class="col-12">
        <a href="{{$ad->url }}">
          <img src="{{ asset('public/uploads/advertisment/'.$ad->image_name) }}" alt="images" height="100%" width="100%">
       </a>
    </div>
    <input type="hidden" name="ads[]" class="add" value="{{$ad->id}}">
    @endforeach
    @elseif($aftercategoryAd->container_item_count == 2)
    @foreach ($aftercategoryAd->bobAdItems()->take(2) as $ad)
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
















<p class="title-section" style="font-size:14px; font-weight:bold ;color:#FD6500;">Daily Deal</p>
<div class="hr mt-0">

</div>
<script type="text/javascript">
    $('.owl-carousel.slide_1').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:4
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })

</script>
@section('script')
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
