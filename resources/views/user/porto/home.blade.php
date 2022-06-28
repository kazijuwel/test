@if(request()->has('status'))
@php
$status=request()->get('status');
$payment_ref_id=request()->get('payment_ref_id');
$order_id=request()->get('order_id');
$merchant=request()->get('merchant');
$txd=request()->get('merchant');
@endphp
@if($status=="Success")
<script>window.location = "{{ route('nagad.success', ['order_id' => $order_id,'payment_ref_id' =>$payment_ref_id,'merchant'=> $merchant]) }}";</script>
exit();
@else
 <script>window.location = "{{ route('nagad.errorstatus',$status)}}";
 </script>
 exit();
@endif
@endif

@extends('user.porto.layouts.userLayoutMaster2')
@push('css')
<link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<style>
    a#home-tab {
        border: none;
        background-color: #fff;
        color: black;
        margin: 2px 5px;
        font-weight: normal;
    }

    .owl-carousel .owl-nav button.owl-prev,
    .owl-carousel .owl-nav button.owl-next {
        display: inline-block;
        position: absolute;
        top: 50%;
        width: 30px;
        height: 30px;
        outline: 0;
        margin: 0;
        transform: translate3d(0, -50%, 0);
        border-radius: 50%;
    }

    .select2-container--bootstrap4 .select2-selection {
        background-color: #fff;
        border: 0px solid #ced4da;
        border-radius: 0.25rem;
        -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        width: 100%;
    }

    .select2-container--bootstrap4 .select2-selection--single .select2-selection__arrow b {
        top: 60%;
        border-color: #343a40 transparent transparent;
        border-style: solid;
        border-width: 0px 0px 0;
        width: 0;
        height: 0;
        left: 50%;
        margin-left: -4px;
        margin-top: -2px;
        position: absolute;
    }


    .owl-carousel .owl-nav button[class*="owl-"]:hover,
    .owl-carousel .owl-nav button[class*="owl-"].hover {
        background-color: #151B49;
        border-color: #151B49 #151B49 #151B49;
    }

    .owl-carousel .owl-nav button[class*="owl-"] {
        background-color: #151B49;
        border-color: #151B49 #151B49 #151B49;
        color: #FFF;
    }

    /* a#home-tab .active{
                                                            background-color: gray;
                                                        } */
    a#home-tab:hover,
    a#home-tab:focus,
    a#home-tab:active {
        border: none;
    }

    a#profile-tab {
        border: none;
        background-color: #fff;
        color: black !important;
        margin: 2px 5px;
    }

    a#profile-tab:hover,
    a#profile-tab:focus,
    a#profile-tab:active {
        border: none;
    }

    a#contact-tab {
        border: none;
        background-color: #fff;
        color: black;
        margin: 2px 5px;
    }

    a#contact-tab:hover,
    a#contact-tab:focus,
    a#contact-tab:active {
        border: none;
    }


    a#adult-tab {
        border: none;
        background-color: #fff;
        color: black;
        margin: 2px 5px;
        font-weight: normal;
    }

    a#adult-tab:hover,
    a#adult-tab:focus,
    a#adult-tab:active {
        border: none;
    }

    .tarek-border {
        border: none;
    }


    a#economy-tab {
        border: none;
        background-color: #fff;
        color: black;
        margin: 2px 5px;
        font-weight: normal;
    }

    a#economy-tab:hover,
    a#economy-tab:focus,
    a#economy-tab:active {
        border: none;
    }



    a.active:hover,
    a.active:focus,
    a.active:active {
        background-color: #d6d6d6 !important;
        font-weight: 700 !important;
    }

    .select2-search--dropdown .select2-search__field {
        border: none !important;
    }

    input#departs {
        padding-left: 10px !important;
        padding-right: 10px !important;
    }

    div#myTabContent {
        border: none;
    }

    ul#myTab {
        border: none;
    }

    p {
        line-height: normal !important;
    }
</style>
@endpush
@section('content')
<div role="main" class="main">
    <div class="slider-container rev_slider_wrapper bg-color-grey-scale-1" style="max-height: 10px !importent">
        <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider
            data-plugin-options="{'width': 100%, 'height' : 485.6322px, 'delay': 9000, 'gridwidth': 1140, 'gridheight': 800, 'responsiveLevels': [4096,1200,992,500]}"
            style="max-height: 10px !important;">
            <ul>
                <li data-transition="fade">
                    <img src="{{ asset('user/img/banner-plan.jpeg') }}" alt="" data-bgposition="100% 100%"
                        data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
                    <div class="tp-caption font-weight-light ws-normal text-center"
                        data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":0,"split":"chars","splitdelay":0.00,"ease":"Power2.easeInOut"},{"delay":"wait","speed":0,"to":"y:[0%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                        data-x="center" data-y="center" data-voffset="['53','53','53','105']"
                        data-fontsize="['18','18','18','40']" data-lineheight="['26','26','26','45']"
                        style="color: #080808; width: 1200px;">
                        <div class="row" style="width:70%; margin: 0 auto">

                            <div class="col-md-12 d-flex justify-content-around pb-3" style="font-size: 1em;">
                                <a href="" class=" w3-text-white d-flex"><i class="icon-plane icons"
                                        style="color: #F6931D"></i> Flights</a>
                                <a href="{{ route('welcome.hotels') }}" class=" w3-text-white d-flex"><i
                                        class="fas fa-hotel d-inline"></i>
                                    Hotels</a>
                                <a href="{{ route('welcome.packages') }}" class=" w3-text-white d-flex"> <i
                                        class="fa fa-gift d-inline"></i>
                                    Packages</a>
                                <a href="" class=" w3-text-white d-flex "> <i class="fa fa-bus d-inline"></i>
                                    Transportation</a>
                                <a href="" class=" w3-text-white d-flex"> <i class="icon-tag icons"></i> Special
                                    deals</a>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card w3-round-xxlarge"
                                    style="height: 189.4276px; width:1086.8292px; margin: 0 auto;background-color: #ffff">
                                    <div class="card-body w3-round-xxlarge w3-white" style="">

                                        <div class="row tarek-card-center">
                                            <div class="col-md-9">
                                                <ul class="nav nav-tabs custom-navtab" id="myTab" role="tablist">
                                                    <li class="nav-item active">
                                                        <a class="nav-link sub-head custom-tab active" id="home-tab"
                                                            data-toggle="tab" href="#home" role="tab"
                                                            aria-controls="home" aria-selected="true">One Way</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link custom-tab" id="profile-tab"
                                                            data-toggle="tab" href="#profile" role="tab"
                                                            aria-controls="profile" aria-selected="false">Round Trip</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link custom-tab" id="contact-tab"
                                                            data-toggle="tab" href="#contact" role="tab"
                                                            aria-controls="contact" aria-selected="false">Multi CIty</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="btn sub-head nav-link d-flex" id="adult-tab" href="#"
                                                            id="navbarDropdown" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Audit <span
                                                                class="badge badge-warning text-dark d-inline-block p-1 ml-2"
                                                                style="height:18px; width:18px; border-radius:50%">4</span>
                                                            <i class="icon-arrow-down icons"></i>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="#"> Adult <span
                                                                    class="badge badge-warning text-dark d-inline-block p-1 ml-2"
                                                                    style="height:18px; width:18px; border-radius:50%">1</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">Adult <span
                                                                    class="badge badge-warning text-dark d-inline-block p-1 ml-2"
                                                                    style="height:18px; width:18px; border-radius:50%">2</span></a>

                                                            <a class="dropdown-item" href="#">Adult <span
                                                                    class="badge badge-warning text-dark d-inline-block p-1 ml-2"
                                                                    style="height:18px; width:18px; border-radius:50%">3</span></a>



                                                        </div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="btn sub-head nav-link d-flex" id="economy-tab"
                                                            href="#" id="navbarDropdown" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Economy <i class="icon-arrow-down icons"></i>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="#">Premium Economy</a>
                                                            <a class="dropdown-item" href="#">Business</a>
                                                            <a class="dropdown-item" href="#">First Class</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="switchbtn d-flex">
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                    <p class="d-inline pl-4 text-dark" style="font-size: 14px">Direct
                                                        Flights only</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <form action="{{ route('airSearch',['usertype'=>'customer']) }}" method="GET">
                                                    <input type="hidden" name="type" value="one-way">
                                                    <div class="row pt-3">

                                                        <div class="col-md-2">
                                                            <div class="row pt-2">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 pb-3"
                                                                        style="color: #F6931D ">
                                                                        <label for="from" style="font-size:14px">
                                                                            From*</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="text-left">
                                                                        <select id="user" name="from" role="textbox"
                                                                            class="form-control  step2-select select2"
                                                                            data-placeholder="Select City"
                                                                            data-ajax-url="{{ route('welcome.tripSearchAjax2') }}"
                                                                            data-ajax-cache="true"
                                                                            data-ajax-dataType="json"
                                                                            data-ajax-delay="200"
                                                                            style="border: none !important; width:150px">

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <img class="mt-3"
                                                                src="{{ asset('user/img/bi-direction.png') }}" alt="">
                                                        </div>
                                                        <div class="col-md-2  pt-2">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 pb-3"
                                                                        style="color: #F6931D">
                                                                        <label for="to" style="font-size:14px">
                                                                            To*</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="">
                                                                        <select id="modal-container" name="to"
                                                                            class="seleect5 search form-control"
                                                                            data-placeholder="Select City"
                                                                            data-ajax-url="{{ route('welcome.tripSearchAjax2') }}"
                                                                            data-ajax-cache="true"
                                                                            data-ajax-dataType="json"
                                                                            data-ajax-delay="200"
                                                                            style="border: none !important; width:150px">

                                                                        </select>
                                                                        {{-- <input class="form-control w3-border-0"
                                                                            type="text" name="to" id="to"
                                                                            placeholder="Type City Name"> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="vl"></div>
                                                        </div>
                                                        <div class="col-md-2  pt-2">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 pb-3"
                                                                        style="color: #F6931D ">
                                                                        <label for="departs" style="font-size:14px">
                                                                            Departs*</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left ">
                                                                        <input name="departs" id="departs"
                                                                            class="form-control w3-border-0"
                                                                            type="date">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
{{--                                                        <div class="col-md-2  pt-2">--}}
{{--                                                            <div class="row">--}}
{{--                                                                <div class="col-md-12">--}}
{{--                                                                    <div class="text-left pl-2 pb-3"--}}
{{--                                                                        style="color: #F6931D ">--}}
{{--                                                                        <label for="return" style="font-size:14px">--}}
{{--                                                                            Return</label>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-md-12">--}}
{{--                                                                    <div class="text-left ">--}}
{{--                                                                        <input name="return" id="return"--}}
{{--                                                                            class="form-control w3-border-0"--}}
{{--                                                                            type="date">--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}

{{--                                                        </div>--}}


                                                        <div class="col-md-2 text-center">
                                                            <div class="row pt-4">
                                                                <div class="col-md-12">
                                                                    <input type="submit" value="Search"
                                                                        class="btn btn-tarek btn-block font-weight-bold w3-text-light w3-round-xxlarge"
                                                                        style="font-size: 14px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                                aria-labelledby="profile-tab">
                                                <form action="" method="GET">
                                                    <input type="hidden" name="type" value="two-way">
                                                    <div class="row pt-3">
                                                        <div class="col-md-2">
                                                            <div class="row pt-2">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 pb-3 w3-text-yellow">
                                                                        <label for="from"> From*</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl2">
                                                                        <input name="from" id="from"
                                                                            class="form-control w3-border-0" type="text"
                                                                            placeholder="Type City Name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <img class="mt-3"
                                                                src="{{ asset('user/img/bi-direction.png') }}" alt="">
                                                        </div>
                                                        <div class="col-md-2  pt-2">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 pb-3 w3-text-yellow">
                                                                        <label for="to"> To*</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left">
                                                                        <input class="form-control w3-border-0"
                                                                            type="text" name="to" id="to"
                                                                            placeholder="Type City Name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="vl"></div>
                                                        </div>
                                                        <div class="col-md-2  pt-2">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 pb-3 w3-text-yellow">
                                                                        <label for="departs"> Departs*</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl2">
                                                                        <input name="departs" id="departs"
                                                                            class="form-control w3-border-0"
                                                                            type="date">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2  pt-2">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 pb-3 w3-text-yellow">
                                                                        <label for="return"> Return</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2">
                                                                        <input name="return" id="return"
                                                                            class="form-control w3-border-0"
                                                                            type="date">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 text-center">
                                                            <div class="row pt-4">
                                                                <div class="col-md-12">
                                                                    <input type="submit" value="Search"
                                                                        class="btn btn-tarek w3-text-light w3-round-xxlarge">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="contact" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <form action="" method="GET">
                                                    <input type="hidden" name="type" value="multi-way">
                                                    <div class="row pt-3">
                                                        <div class="col-md-2">
                                                            <div class="row pt-2">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 pb-3 w3-text-yellow">
                                                                        <label for="from"> From*</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl2">
                                                                        <input name="from" id="from"
                                                                            class="form-control w3-border-0" type="text"
                                                                            placeholder="Type City Name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <img class="mt-3"
                                                                src="{{ asset('user/img/bi-direction.png') }}" alt="">
                                                        </div>
                                                        <div class="col-md-2  pt-2">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 pb-3 w3-text-yellow">
                                                                        <label for="to"> To*</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left">
                                                                        <input class="form-control w3-border-0"
                                                                            type="text" name="to" id="to"
                                                                            placeholder="Type City Name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="vl"></div>
                                                        </div>
                                                        <div class="col-md-2  pt-2">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 pb-3 w3-text-yellow">
                                                                        <label for="departs"> Departs*</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl2">
                                                                        <input name="departs" id="departs"
                                                                            class="form-control w3-border-0"
                                                                            type="date">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2  pt-2">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 pb-3 w3-text-yellow">
                                                                        <label for="return"> Return</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2">
                                                                        <input name="return" id="return"
                                                                            class="form-control w3-border-0"
                                                                            type="date">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 text-center">
                                                            <div class="row pt-4">
                                                                <div class="col-md-12">
                                                                    <input type="submit" value="Search"
                                                                        class="btn btn-tarek w3-text-light w3-round-xxlarge">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @include('alerts.alerts')
    <div class="container4 pt-3 py-3">
        <div class="row ">
            <div class="col-md-12 mt-2">
                <div class="text-center">
                    <p> <small><span class="font-weight-bold w3-text-black"> News/Covid information:</span> Trip beyond
                            is one
                            of the fastest growing agencies based in Dhaka, Bangladesh which is certified by
                            International
                            Air Transport Association (IATA).
                            This company Was established with the slogan "Go beyond your dreams." We are trully commited
                            to
                            providing you with quality services to make your tours easier, convented and hassle free.
                            Aliquyam sadipscing sed eos labore
                            voluptua at, ipsum diam sanctus ea kasd ea lorem, ut consetetur eirmod sea stet
                            magna.</small></p>
                    <a class="w3-white font-weight-bold" style="border-bottom: 1px solid #D0D0D0" href="">Red More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-2 pt-5">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">

                        <div class="text-center">
                            <p class="w3-text-black" style="font-size: 18px;"><b>Find Great Deals, Only for you</b>
                            </p>
                        </div>

                        <div class="lightbox carousel-width "
                            data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
                            <div class="owl-carousel owl-theme stage-margin"
                                data-plugin-options="{'items': 3, 'margin': 15, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': -155}">

                                @foreach ($hotels as $hotel)
                                <div>
                                    <img class="img-fluid w3-round-xxlarge"
                                        src="{{ route('imagecache', ['template' => 'pfilg', 'filename' => $hotel->image]) }}"
                                        style="height: 195px; width:342px; position: relative" alt="Project Image">
                                    <div style="position: absolute; z-index: 99;top:0" class="p-5 pb-3">
                                        <p> <span class="w3-text-white  font-weight-bold" style="font-size: 22px;">{{
                                                $hotel->title }} <br></span> </p>
                                        <div class="w3-text-orange w3-large">{{ $hotel->cost }} <br>
                                            <div class="">
                                                <a href="{{ route('imagecache', ['template' => 'pfilg', 'filename' => $hotel->image]) }}"
                                                    class="btn w3-text-white w3-large">Plan it now <i
                                                        class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                {{-- <div>
                                    <img class="img-fluid w3-round-xxlarge"
                                        src="{{ route('imagecache',['template'=>'cardslider','filename'=>$hotel->image]) }}"
                                        style="height: 240px;" alt="Project Image">
                                    <p class="p-3" style="margin-top: -210px;"> <span
                                            class="w3-text-white  font-weight-bold" style="font-size: 22px;">{{
                                            $hotel->title }} <br></span> </p>
                                    <div class="w3-text-orange w3-large p-3 pb-2">{{ $hotel->cost }} <br>
                                        <div class="pt-5 mt-1">
                                            <a href="{{ route('imagecache',['template'=>'cardslider','filename'=>$hotel->image]) }}"
                                                class="btn w3-text-white w3-large">Plan it now <i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div> --}}
                                @endforeach
                                <div style="display: none">

                                </div>



                                {{-- <div>
                                    <img class="img-fluid w3-round-xxlarge"
                                        src="{{ asset('user/img/projects/project.jpg') }}" alt="Project Image">
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <div class="container py-2 pt-4">

        <div class="row">
            <div class="col">



                <div class="row">
                    <div class="col">

                        <div class="text-center">
                            <p class="w3-text-black" style="font-size: 18px;"><b>Exclusives from our partners</b></p>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="blog-posts">

                                            <article class="post post-medium btn btn-rounded ">
                                                <div class="post-image tarek-position">
                                                    <a href="#">
                                                        <img src="{{ asset('user/img/sea_view.jpg') }}"
                                                            class="img-fluid img-thumbnail-no-borders rounded-5 border-curve"
                                                            alt="Promotional Ads" />
                                                    </a>
                                                    <div class="tarek-topleft">
                                                        <button
                                                            class="btn btn-tarek2 btn-rounded px-3">Promotion</button>

                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row pl-5 pt-3">
                                            <p class="w3-text-black font-weight-bold">Last minute Summer Trip</p>
                                        </div>
                                        <div class="row pl-4">
                                            <div class="col-md-9">
                                                <p><small>It is a long established fact that a reader will be distracted
                                                        by the readable content of a page
                                                        when looking at its layout.</small></p>
                                            </div>
                                            <div class="col-md-3" style="height: 40px">
                                                <a class="btn btn-tarek btn-block btn-lg text-dark font-weight-bold btn-rounded"
                                                    href="">Let's go</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 pt-3">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="post-image tarek-position">
                                            <a href="blog-post.html">
                                                <img src="{{ asset('user/img/promotion2.jpg') }}"
                                                    class="img-fluid img-thumbnail img-thumbnail-no-borders w3-round-xxlarge"
                                                    style="height: 310px;" alt="Promotional Ads 2" />
                                            </a>
                                            <div class="tarek-topleft">
                                                <button class="btn btn-tarek2 btn-rounded px-3">Promotion</button>

                                            </div>
                                        </div>

                                        <div class="row pt-5">
                                            <div class="col-md-12">
                                                <p class="w3-text-black font-weight-bold">Flying from Delhi-London?</p>
                                            </div>
                                            <div class="row pt-2">
                                                <div class="col-md-8">
                                                    <p><small>It is a long established fact that a
                                                            reader will be distracted by the r
                                                            eadable content of a page when
                                                            looking at its layout.</small></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <a class="btn btn-tarek btn-lg text-dark font-weight-bold btn-block btn-rounded"
                                                        href="">Book Now
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </div>

    </div>
    <div class="container py-2 pt-4">
        {{-- @foreach ($destinations as $item)
        <img src="{{ route('imagecache',['template'=>'sli','filename'=>$item->image]) }}" alt="">
        @endforeach --}}
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="text-center">
                            <p class="w3-text-black" style="font-size: 18px;"><b>Favourite Destination Packages</b>
                            </p>
                        </div>
                        <div class="lightbox text-center">
                            <div class="carousel-width owl-carousel owl-theme stage-margin text-center "
                                data-plugin-options="{'items': 3, 'margin': 15, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
                                @foreach ($destinations as $item)
                                <div>
                                    <img class="img-fluid w3-round-xxlarge btn-rounded text-center"
                                        src="{{ asset('storage/destination/' . $item->image . '') }}"
                                        style="height: 270px; width:2700px;" alt="Project Image">

                                    <div class="text-center favourite-position" style="">
                                        <a href=""
                                            class="btn btn-tarek w3-round-xlarge font-weight-bold d-inline-block px-4 "
                                            style="font-size: 14px">{{ $item->title }}</a>
                                    </div>

                                    <div class="text-center">
                                        <span class="w3-text-black" style="font-size: 16px;"><b>{{ $item->country
                                                }}</b></span>
                                    </div>
                                </div>
                                @endforeach


                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>
@endsection
@push('extra')
<div class="container p-5 m-3">


    <div class="row">
        <div class="col">
            <div class="blog-posts">

                <p class="black font-weight-bold" style="font-size: 18px;">Featured Flight Destinations</p>

                <p class="mini-p">It is not always easy to find flights that suit our budget and personal needs. With
                    all the flight booking websites out there, it becomes even tougher to find the right one. It can be
                    frustrating when you don’t find the desired flights after hours of searching. But Trip Beyond makes
                    it really easy for you to fly with our exclusive services which helps you get your desired flights
                    in one click.</p>

            </div>
        </div>

    </div>


    <div class="row">
        <div class="col">
            <div class="blog-posts">

                <p class="black font-weight-bold" style="font-size: 18px;">Featured Tours & Tickets</p>

                <p class="mini-p">We are a top-rated travel agency that provides customers with an extensive list of
                    tours and air tickets. We help you travel to your favorite destinations across the globe, including
                    London, Paris, Athens, New York City, Toronto,Madrid and more with ease and convenience. Trip Beyond
                    also has a worldwide network of partners that allow them to offer tours</p>
                <p class="mini-p">Tour packages are created with your desired itinerary in mind. You can choose from a
                    variety of different tours for every type of traveler. We offer everything from backpacking trips to
                    luxury vacations, or whatever you want!</p>

            </div>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <div class="blog-posts">

                <p class="black font-weight-bold" style="font-size: 18px;">Save on Travel with tripbeyond.com</p>

                <p class="mini-p">Trip Beyond is a company that offers affordable holiday packages to places all over
                    the world. Our goal is to find the perfect trip for our clients, at the best prices. We Offer you
                    holiday packages that are cheaper than what you would find anywhere else online.</p>

                <p class="mini-p">Thinking of your holidays but not sure where to start? Check out Trip beyond, we have
                    holiday packages to suit any budget and for all kinds of people.</p>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col">
            <div class="blog-posts">

                <p class="black font-weight-bold" style="font-size: 18px;">Featured Hotel Destinations</p>

                <p class="mini-p">Trip Beyond is an online portal that lets you explore and book some of the best hotels
                    in the world. We provide a variety of services and facilities to its customers.
                </p>
                <p class="mini-p">Our dedicated team in Trip Beyond has selected and partnered with leading hotel brands
                    to help their customers find their desired hotels in one click. Moreover, we also provide some
                    exclusive offers for our valued customers.
                </p>

            </div>
        </div>
    </div>
</div>
@endpush
@push('js')
<!-- Select2 -->
<script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function () {

        // $('.select2').select2({
        //     theme: 'bootstrap4'
        // });

        // function formatState(state) {
        //     if (!state.id) { return state.img; }
        // var $state = $(
        //   '<span><img src="storage/product/' + state.img + '" class="img-loaded" /> <p>' + state.title + '</p> </span>'
        // );

        // var base_url = window.location.origin;
        // var url = base_url + '/storage/product/' + state.img;

        //     var $state = $(
        //         '<div class="media"><div class="media-body"><h4 class="media-heading" style="margin-top:4px;margin-bottom:-2px;">' + state.title + '</h4> ' + state.cat + ' > ' + state.sub + ' > ID:' + state.pr + '</div></div>'
        //     );
        //     return $state;
        // };

        var flightFrom = $('.step2-select').select2({
            theme: 'bootstrap4',
            containerCssClass: "tarek-border",
            containerCss: "border:none",
            // templateResult: formatState,

            // minimumInputLength: 1,
            ajax: {
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // alert(data[0].s);
                    var data = $.map(data, function (obj) {
                        obj.id = obj.Code || obj.Code;
                        return obj;
                    });
                    var data = $.map(data, function (obj) {
                        obj.text = "(" + obj.Code + ") " + obj.name;
                        return obj;
                    });
                    return {
                        results: data,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                }
            },
        });



        //// To


    });
</script>
<script>
    $(document).ready(function () {
        // seleect5 search
        // $('.seleect5').select2({
        //     theme: 'bootstrap4'
        // });

        $('.search').select2({
            theme: 'bootstrap4',
            containerCssClass: ".search",
            // minimumInputLength: 1,
            ajax: {
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // alert(data[0].s);
                    var data = $.map(data, function (obj) {
                        obj.id = obj.Code || obj.Code;
                        return obj;
                    });
                    var data = $.map(data, function (obj) {
                        obj.text = "(" + obj.Code + ") " + obj.name;
                        return obj;
                    });
                    return {
                        results: data,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                }
            },
        });

        //// To


    });
</script>
@endpush
