<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
        <meta name="app-url" content="{{ getBaseURL() }}">
        <meta name="file-base-url" content="{{ getFileBaseURL() }}">

        <title>@yield('meta_title', get_setting('website_name').' | '.get_setting('site_motto'))</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

       <link href="https://belaobela.com.bd/public/uploads/all/1ROzFINiBYoE9sQFb60CF8gxkUXoQLv7hQf2bKBF.png"
        rel="shortcut icon" type="image/x-icon">

    <link href="{{ asset('public/mobileview/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <!-- Font awesome 5 -->
    <link href="{{ asset('public/mobileview/fonts/fontawesome/css/all.min.css') }}" type="text/css" rel="stylesheet">
    <!--Aiz--->
    <link rel="stylesheet" href="{{ asset('public/assets/css/aiz-core.css') }}">
    <!---End AiZ-->
    <!-- custom style -->
    <link href="{{ asset('public/mobileview/css/mobile.css') }}" rel="stylesheet" type="text/css" />
    <!--selector-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('public/mobileview/') }}/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('public/mobileview') }}/owlcarousel/assets/owl.theme.default.min.css">

    <link href="{{ asset('public/mobileview/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/mobileview/css/footer.css') }}" rel="stylesheet" type="text/css" />
    @yield('css')
    <script>
        var AIZ = AIZ || {};
    </script>


    <style>
        #loader {
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid #FD6500;
          border-right: 16px solid green;
          border-bottom: 16px solid red;
          width: 120px;
          height: 120px;
          -webkit-animation: spin 2s linear infinite;
          animation: spin 2s linear infinite;
          margin: 0px auto;
          margin-top: 200px;
        }

        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }

    button.btn-header.bg-dark.siderbarbtn {
        border-radius: 18%;
        /* margin: -2px -4px; */
    }
    .myscroll a{
                margin-top: 5px;
                width: 100%;
            }
    button.bg-dark.siderbarbtn {
        border-radius: 17%;
        margin-right: 4px;

    }

    .sidebar button{
        background: #F15722;
        /* border: oldlace; */
        border: 2px solid #F15722;
        margin-right: 1px;
        border-radius: 12%;
    }

    .typed-search-box {
    z-index: 9999 !important;
}
.header-cer .owl-next{
    position: absolute;
    top: -5px;
    right: -9px;

}
.header-cer .owl-next:hover, .header-cer .owl-next:active , .header-cer .owl-prev:focus{
outline: none !important;
border:none !important;
background:none !important;

}
.header-cer .owl-next:hover, .header-cer .owl-next:active , .header-cer .owl-next:focus{
outline: none !important;
border:none !important;
background:none !important;

}
.header-cer .owl-prev{

    position: absolute;
    top: -5px;
    left: -10px;
}
.owl-item{
    margin-top: -5px;
    z-index: 9989;
    padding-top:0px;
    padding-bottom:0px;
}
.owl-theme .owl-nav [class*=owl-] {
    color: #FFF;
    font-size: 14px;
    margin: 0px;
    padding: 4px 7px;
    background: #D6D6D6;
    display: inline-block;
    cursor: pointer;
    border-radius: 3px;
}
.app-header {
    width: 100%;
    padding: 7px;
    width: 100%;
     height: 43px;
    z-index: 20;
    -webkit-transition: .4s;
    transition: .4s;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}


.collapse-btn.collapsed span.collapse-icon::after {
    font-family: "FontAwesome";
    content: '\f055';
    font-size: 1.2em;

}

.collapse-btn:not(.collapsed) span.collapse-icon::after{
    font-family: "FontAwesome";
    content: '\f056';
    font-size: 1.2em;
}
    </style>
    @stack('style')

</head>
<body>


    <div class="screen-wrap" style="background-color:white;">

        @if($topAd->bobAdItems()->count() > 0)
        <section class="mt-0">
            <div class="row">
                @if($topAd->container_item_count == 1)
                @foreach ($topAd->bobAdItems()->take(1) as $ad)
                <div class="col-12">
                    <a href="#" onclick="adsclick({{$ad->id}})">
                    <img class="m-0" src="{{ asset('public/images/addvertisment.jpg') }}" alt="images" style="width:100%; height: 22px;">
                   </a>
                </div>
                <input type="hidden" name="ads[]" class="add" value="{{$ad->id}}">
                @endforeach
                @elseif($topAd->container_item_count == 2)
                @foreach ($topAd->bobAdItems()->take(2) as $ad)
                <div class="col-6">
                    <a href="#" onclick="adsclick({{$ad->id}})">
                    <img class="m-0" src="{{ asset('public/images/addvertisment.jpg') }}" alt="images" style="width:100%; height: 22px;">
                    </a>
                </div>
                <input type="hidden" name="ads[]" class="add" value="{{$ad->id}}">
                @endforeach
                @endif
            </div>
        </section>
        @endif


        <header class="app-header d-flex no-wrap justify-content-between align-items-center p-1"  style="background-color: white;">
            <div class="sidebar" style="">
                <button class="siderbarbtn" type="button" data-trigger="#sidebar_left" style="background:#F15722 ">
                    <i class="fa fa-bars" style="color:white"></i>
                </button>
           </div>
            <a class="d-block py-20 mr-4 text-center" href="{{ route('home') }}" style="width:180px;">
                @php
                    $header_logo = get_setting('header_logo');
                @endphp
                @if($header_logo != null)
                    <img src="{{ uploaded_asset($header_logo) }}" alt="{{ env('APP_NAME') }}"
                         class="img-fluid p-1" width="";>
                @else
                <img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"
                         class="img-fluid p-1 ml-1"  width="";>
                @endif
            </a>
            <form action="{{ route('search') }}" method="GET" style="">
            <div class="input-group">
                <input type="text" name="q" class="form-control" id="search" placeholder="Search Product..."
                    style="height:28px; border-radius: 0px">
                <div class="input-group-append">

                   <button type="submit" class="search-button">
                       <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
           </form>
        </header>
        <div id="search-content" class="text-left" style="position: absolute; top:65px; z-index:9999; background:white;">

        </div>
        {{-- <section class="scroll-horizontal myscroll mb-2 "> --}}
        <div class="px-3">
            <section class="owl-carousel owl-theme slide_5 header-cer myscroll">
                <a href="{{ route('categories.all') }}" class="btn btn-outline-dark btn-sm"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Product Shop</a>
                <a href="{{ route('service.create') }}" class="btn btn-outline-dark btn-sm"><i class="fa fa-cogs" aria-hidden="true"></i> Service Shop</a>
                <a href="#" class="btn btn-outline-dark btn-sm" onclick="showModal()"><i class="fa fa-phone" aria-hidden="true"></i> Call for Product</a>
                <a href="#" class="btn btn-outline-dark btn-sm" onclick="showModal2()"><i class="fa fa-phone" aria-hidden="true"></i> Call for Service</a>
                <a href="{{ route('shops.create') }}" class="btn btn-outline-dark btn-sm" ><i  aria-hidden="true"></i> Be a Seller</a>
                <a href="{{ route('service_provider.create')  }}" class="btn btn-outline-dark btn-sm"><i  aria-hidden="true"></i>Be a Service Provider</a>

    </section>
    </div>
        @yield('content')
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <!-- jQuery -->
    {{-- {{-- <script src="{{ asset('public/mobileview/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script> --}}
        <!-- Bootstrap4 files-->
    {{-- <script src="{{ asset('public/mobileview/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>  --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
    @include('frontend.mobile.layout.footer')
    @include('frontend.mobile.partials.updatecart')
    @include('frontend.mobile.partials.modal')
    @include('frontend.mobile.partials.script')
    @yield('js')
    <script type="text/javascript">
        $('.owl-carousel.slide_5').owlCarousel({
            loop:true,
            margin:8,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:2
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
    <script>
    $(document).ready(function() {
        $(document).on('click','.parentCat ',function(e){
            e.preventDefault();
            // key=$(this).attr('data-key');
            // $(".child_".key).show();
            var that = $(this);
            // that.show();
            // alert('ok');

            var dataKey = that.attr('data-key');
            // alert(dataKey);
            // $(".childCategory").hide();


            // $(".child_" + dataKey + ":visible").hide();
            // $(".child_" + dataKey + ":hidden").show();
            // $(".child_" + dataKey).toggle();
            // $(".child_" + dataKey).show();

            var className = ".child_" + dataKey;

            // that.find(".collapse-icon").removeClass("collapsed");
            // that.find(".collapse-icon").toggleClass("fa fa-minus-square");

            // that.find(".fa-icon-for-toogle").removeClass("fa-plus-circle");
            // that.find(".fa-icon-for-toogle").removeClass("fa-minus-circle");
            // that.closest(".myTable").find(".fa-icon-for-toogle").removeClass("fa-minus-circle").addClass("fa-plus-circle");
            $(".fa-icon-for-toogle").removeClass("fa-minus-circle").addClass("fa-plus-circle");


            if($(className).is(':visible'))
            {
                // alert('visible');
                $(className).hide();
                $(".childCategory").hide();
            // that.find(".fa-icon-for-toogle").removeClass("fa-minus-circle");
            // $(".fa-icon-for-toogle").removeClass("fa-minus-circle").addClass("fa-plus-circle");



            }
            else
            {
                $(".childCategory").hide();
                // alert('not');
                $(className).show();
                that.find(".fa-icon-for-toogle").removeClass("fa-plus-circle").addClass("fa-minus-circle");
            }

        })
    });
    </script>


</body>

<aside class="offcanvas" id="sidebar_left">
    <div class="p-3 mt-2" style="background:white ;">
            <button class="btn-close close">&times;</button>
            <img src="{{ uploaded_asset($header_logo) }}" class="img-fluid" alt="">

    </div>
    <hr>


    <nav class="">
        {{-- <input id="myInput" type="text" placeholder="Search..">
        <br><br> --}}


        <div id="custom-accordion">
            @foreach($parentCategorys as $key=>$parent)
                <div class="myTable">
                <div class="card-header" id="headingOne_{{ $key }}">
                    <div class="heading_{{ $key }}">
                        @if($parent->childCategory->count() > 0)
                        <div class="parentCat" data-key="{{ $key}}">
                        <div type="" class="">
                            <span>
                                <img src="{{ uploaded_asset($parent->icon) }}" width="
                                16">
                            </span>
                            <span class="ml-2 parentClass" >
                                {{  $parent->name }}
                            </span>
                            <span class="float-right">
                                {{-- <span class="collapse-icon collapsed"></span> --}}
                                <span class="fa-icon-for-toogle fa fa-plus-circle w3-large w3-text-gray collapse-btn"></span>
                            </span>
                        </div>
                       </div>
                    @else
                    <a type="button" class="w-100 text-dark" href="{{ route('products.category', $parent->slug) }}">
                        <span>
                            <img src="{{ uploaded_asset($parent->icon) }}" width="
                            16">
                        </span>
                        <span class="ml-2">{{  $parent->name }}</span>
                    </a>
                    @endif

                </div>
                @if($parent->childCategory->count() > 0)
                <div class="childCategory child_{{$key}}" style="display: none;">
                        <div class="">
                            <ul class="list-group">
                                @foreach($parent->childCategory as $childCat)
                                <a href="{{ route('products.category', $childCat->slug) }}" class="list-group-item list-group-item-action" class="list-group-item">
                                <span class="ml-1"> {{ $childCat->name }}</span>
                                </a>
                            @endforeach
                            </ul>
                        </div>
                </div>
                @endif


            </div>
            @endforeach
        </div>
        <div class="p-1 pl-4">
            <a href="{{ route('categories.all') }}" class="" style="color:black">
                <i class="fa fa-plus"></i> More Categories</a>
        </div>


    </nav>

</aside>

</html>
