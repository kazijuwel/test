<style>

    .zoom {
            
        transition: transform .4s; /* Animation */
        
        margin: 0 auto;
        }

    .zoom:hover {
        transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    .slider-custom-caption {

        margin-top: -130px;
        }

    .owl-prev,.owl-next
    {
    background: #000033 !important;
    /* background: #04252b !important; */
        
    }
    .slider-card-bg-color
    {
    background: #00003398 !important;
    color: #fff !important;
    }
    .item-hover-border:hover{
        border: 2px solid white;
    }



    @media only screen and (max-width: 600px) {
        .slider-custom-caption {
        margin-top: 0px;

        }
    }
    @media only screen and (max-width: 600px) {
        .divheight {
        height: 100% !important  ;

        }
        /* #mobileRes{
            margin: 0 auto;
            padding: 20px;
        } */

    .slider-custom-caption h2
    {
    font-size: 19px !important;
    }


    .slider-custom-caption h4
    {
    font-size: 16px !important;
    }


    .text-6{
        font-size: 18px !important;
    }

}

/* .hide {
  display: none;
}
    
.magic:hover + .hide {
  display: inline;
} */


@media only screen and (min-width: 1030px) {
     .big-screen{
        margin-top:185px !important;
    }
}

</style>

<div class="z-index-1 appear-animation" data-appear-animation="fadeInDownShorter" data-appear-animation-delay="100">
    <div class="owl-carousel owl-theme full-width owl-loaded owl-drag owl-carousel-init m-0" data-plugin-options="{'items': 1, 'loop': true, 'nav': true, 'dots': false,
    {{-- 'animateOut':'fadeOut', --}}
     {{-- 'animateOut': 'slideOutLeft', 'animateIn': 'slideInRight', --}} 'autoplayHoverPause':false,  'autoplay':true, 'autoplayTimeout': 5000}">
     @foreach ($sliders as $slider)

        <div>
            {{-- <img src="img/trip/s3.jpg" class="img-fluid" alt=""> --}}
            <img class="img-fluid" src="{{ asset('storage/slider/'.$slider->image_name) }}" alt="">
        </div>
    @endforeach
    </div>
    <div class="slider-contact-form mt-5" >
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="slider-contact-form-wrapper rounded p-5 w3-card" style="background: linear-gradient(
                        90deg,#011a62,#0940b3);">
                        
                        <div class="row" id="mobileRes">
                            <div class="col-lg-12 mt-3">
                                <div class="tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#flight" data-toggle="tab" style="border-top-color:transparent;"><i class="fa fa-plane magic"></i> <span class="show">Flight</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#hotel" style="border-top-color:transparent;" data-toggle="tab"> <i class="fa fa-hospital-alt magic"></i> <span class="show hide">Hotels</span></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="flight" class="tab-pane active">
                                            
                                            <input type="radio" checked name="trip" id="round-trip" value="round_trip"> <label for="round-trip"><b>Round Trip</b></label>
                                            &nbsp; &nbsp;
                                            
                                            <input type="radio" name="trip" id="one-trip" value="one_trip"> <label for="one-trip"><b>One Way</b></label>
                                            &nbsp; &nbsp;
                                            
                                            <input type="radio" name="trip" id="multi-trip" value="multi_trip"> <label for="multi-trip"><b>Multi</b></label>
    
                                            <form action="{{route('welcome.searchForFlight')}}" method="get" class="form-group mt-3 single-trip">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-1" >
                                                        <label for="ok" class="pt-2"><i class="fa fa-plane-departure"></i></label>
                                                    </div>
                                                    <div class="col-md-11 mb-2">
                                                        <input type="text" class="form-control form-control-lg text-2 w3-border " style="border: 1px solid #0059ad !important;" placeholder="Flying From" name="from" id="ok">
                                                    </div>
    
                                                    <div class="col-md-1" >
                                                        <label for="to" class="pt-2"><i class="fa fa-plane-arrival"></i></label>
                                                    </div>
                                                    <div class="col-md-11 mb-2">
                                                        <input type="text" class="form-control form-control-lg text-2 w3-border " style="border: 1px solid #0059ad !important;" placeholder="Flying To" name="to">
                                                    </div>
                                                    <div class="col-md-1" >
                                                        <label for="to" class="pt-2"><i class="fa fa-calendar-alt"></i></label>
                                                    </div>
                                                    <div class="col-md-11 mb-2">
                                                        <input type="text" id="from" class="form-control form-control-lg text-2 w3-border " placeholder="Depart" name="depart_date" style="border: 1px solid #0059ad !important;">
                                                        
                                                    </div>
                                                    <div class="col-md-1 round-trip-form" >
                                                        <label for="to" class="pt-2"><i class="fa fa-calendar-alt"></i></label>
                                                    </div>
                                                    <div class="col-md-11 round-trip-form mb-2" >
                                                        <input type="text" id="to" class="form-control form-control-lg text-2 w3-border " placeholder="Return" name="return_date" style="border: 1px solid #0059ad !important;">
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    
                                                    <div class="col-md-12">
                                                        <button class="w3-center w3-round w3-round-large w3-button w3-border-blue w3-bordered btn-block w3-blue">Search</button>
                                                    </div>
                                                    
                                                </div>
                                            </form>
    
                                            <form action="" class="form-group mt-2 multi-city" style="display: none;">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-1" >
                                                        <label for="from" class="pt-2"><i class="fa fa-plane-departure"></i></label>
                                                    </div>
                                                    <div class="col-md-11 mb-2">
                                                        <input type="text" class="form-control form-control-lg text-2 w3-border " style="border: 1px solid #0059ad !important;" placeholder="From">
                                                    </div>
                                                    <div class="col-md-1" >
                                                        <label for="to" class="pt-2"><i class="fa fa-plane-arrival"></i></label>
                                                    </div>
                                                    <div class="col-md-11 mb-2">
                                                        <input type="text" class="form-control form-control-lg text-2 w3-border " style="border: 1px solid #0059ad !important;" placeholder="To">
                                                    </div>
                                                    <div class="col-md-1" >
                                                        <label for="to" class="pt-2"><i class="fa fa-calendar-alt"></i></label>
                                                    </div>
                                                    <div class="col-md-11 mb-2">
                                                        <input type="text" id="datepicker" class="form-control form-control-lg text-2 w3-border " placeholder="Depart" style="border: 1px solid #0059ad !important;">
                                                    </div>
                                                    
                                                    
                                                </div>
    
                                                
                                                <div class="add-more" >
                                                </div>
                                                <a class="m-3 pb-3" id="add">Click For More</a>
                                                <div class="row mt-4">
                                                   
                                                    <div class="col-md-12 ">
                                                        <button class="w3-center w3-round w3-round-large w3-button w3-border-blue w3-bordered btn-block w3-blue">Search</button>
                                                    </div>
                                                    
                                                </div>
                                            </form>
    
                                        </div>
                                        <div id="hotel" class="tab-pane">
                                            <div style="min-height: 325px;">
                                                <p class="w3-text-red">Search Hotel</p>
                                                <div class="row">
                                                    <div class="col-md-1" >
                                                        <label for="ok" class="pt-2 ml-1"><i class="fa fa-map-marker-alt"></i></label>
                                                    </div>
                                                    <div class="col-md-11 mb-2">
                                                        <input type="text" class="form-control form-control-lg text-2 w3-border " style="border: 1px solid #0059ad !important;" placeholder="Destination" name="from" id="ok">
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
    </div>    
</div>

{{-- <div class="row slider-custom-caption">

    <div class="col-md-12">

        <div class="container p-0">

            <div class="w3-card m-lg-4">


                <div class="card- w3-card-4- px-5 rounded slider-card-bg-color-" style="background-color: white">
                    <div class="card-body- py-1 pb-3">

                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#flight" data-toggle="tab"><i class="fa fa-plane magic"></i> <span class="show">Flight</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#hotel" data-toggle="tab"> <i class="fa fa-hospital-alt magic"></i> <span class="show hide">Hotels</span></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="flight" class="tab-pane active">
                                            
                                            <input type="radio" name="trip" id="round-trip" value="round_trip"> <label for="round-trip"><b>Round Trip</b></label>
                                            &nbsp; &nbsp;
                                            
                                            <input type="radio" name="trip" id="one-trip" value="one_trip"> <label for="one-trip"><b>One Way</b></label>
                                            &nbsp; &nbsp;
                                            
                                            <input type="radio" name="trip" id="multi-trip" value="multi_trip"> <label for="multi-trip"><b>Multi</b></label>

                                            <form action="{{route('welcome.searchForFlight')}}" method="get" class="form-group mt-3 single-trip">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-3 mb-2 mb-md-0">
                                                        <input type="text" class="form-control form-control-lg text-4 w3-border " style="border: 1px solid #0059ad !important;" placeholder="From" name="from">
                                                    </div>
                                                    <div class="col-md-3 mb-2 mb-md-0">
                                                        <input type="text" class="form-control form-control-lg text-4 w3-border " style="border: 1px solid #0059ad !important;" placeholder="To" name="to">
                                                    </div>
                                                    <div class="col-md-3 mb-2 mb-md-0">
                                                        <input type="text" id="from" class="form-control form-control-lg text-4 w3-border " placeholder="Depart" name="depart_date" style="border: 1px solid #0059ad !important;">
                                                        
                                                    </div>
                                                    <div class="col-md-3 round-trip-form mb-2 mb-md-0" >
                                                        <input type="text" id="to" class="form-control form-control-lg text-4 w3-border " placeholder="Return" name="return_date" style="border: 1px solid #0059ad !important;">
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-5"></div>
                                                    <div class="col-md-2">
                                                        <button class="w3-center w3-round w3-round-large w3-button w3-border-green w3-bordered btn-block w3-green">Search</button>
                                                    </div>
                                                    <div class="col-md-5"></div>
                                                </div>
                                            </form>

                                            <form action="" class="form-group mt-2 multi-city" style="display: none;">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-4 mb-2 mb-md-0">
                                                        <input type="text" class="form-control form-control-lg text-4 w3-border " style="border: 1px solid #0059ad !important;" placeholder="From">
                                                    </div>
                                                    <div class="col-md-4 mb-2 mb-md-0">
                                                        <input type="text" class="form-control form-control-lg text-4 w3-border " style="border: 1px solid #0059ad !important;" placeholder="To">
                                                    </div>
                                                    <div class="col-md-4 mb-2 mb-md-0">
                                                        <input type="text" id="datepicker" class="form-control form-control-lg text-4 w3-border " placeholder="Depart" style="border: 1px solid #0059ad !important;">
                                                    </div>
                                                    
                                                    
                                                </div>

                                                
                                                <div class="add-more" >
                                                </div>
                                                <a class="m-3 pb-3" id="add">Click For More</a>
                                                <div class="row mt-4">
                                                    <div class="col-md-5"></div>
                                                    <div class="col-md-2 ">
                                                        <button class="w3-center w3-round w3-round-large w3-button w3-border-green w3-bordered btn-block w3-green">Search</button>
                                                    </div>
                                                    <div class="col-md-5"></div>
                                                </div>
                                            </form>

                                        </div>
                                        <div id="hotel" class="tab-pane">
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
</div> --}}


<section class="section section-text-light section-background section-center section-overlay-opacity- section-overlay-opacity-gradient- m-0 big-screen" style="background: #ededed;">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="mb-4 w3-text-black">Browse By Proparty Type</h3>
                <div class="owl-carousel owl-theme show-nav-title" data-plugin-options="{'items': 4, 'margin': 10, 'loop': true, 'autoplay': true, 'autoplayTimeout': 9000, 'nav': true, 'dots': false}">
                    
                    <div>
                        <img alt="" style="height: 170px;" class="img-fluid rounded" src="{{asset('img/trip/s3.jpg')}}">
                        <p style="color: #283891;" class="mt-2"><b>Flight</b></p>
                    </div> 
                    <div>
                        <img alt="" style="height: 170px;" class="img-fluid rounded" src="{{asset('img/trip/s2.jpg')}}">
                        <p style="color: #283891;" class="mt-2"><b>Destination</b></p>
                    </div> 
                    <div>
                        <img alt="" style="height: 170px;" class="img-fluid rounded" src="{{asset('img/trip/s1.jpg')}}">
                        <p style="color: #283891;" class="mt-2"><b>Place</b></p>
                    </div>
                    <div>
                        <img alt="" style="height: 170px;" class="img-fluid rounded" src="{{asset('img/trip/Hotel-design.jpg')}}">
                        <p style="color: #283891;" class="mt-2"><b>Hotel</b></p>
                    </div>
                    <div>
                        <img alt="" style="height: 170px;" class="img-fluid rounded" src="{{asset('img/trip/AW_Tony-Bordelais-2-e1614871773493.jpg')}}">
                        <p style="color: #283891;" class="mt-2"><b>Airlines</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container mt-4">
    <div class="w3-card  w3-border-yellow">
        <div class="card-body w3-round w3-border-yellow" style="background-image: url('https://img.freepik.com/free-vector/yellow-background-abstract-gradient-studio-room_28629-428.jpg?size=626&ext=jpg')">
            <div class="row">
                <div class="col-md-3 mt-3">
                    <img class="w3-round" src="{{asset('img/5.jpg')}}" alt="">
                </div>
                <div class="col-md-9">
                    <p class="p-1 w3-text-white"><b>Become Our Partner </b></p>
                    <div class="row">
                        
                        <div class="col-md-3">
                            <a href="{{route('welcome.becomePartner')}}" style="text-decoration: none;"  class="w3-button w3-blue w3-hover-blue w3-border w3-border-blue w3-round-sm py-1 w3-text-white"><i class="far fa-arrow-alt-circle-right w3-text-white"></i> <b>New Partner</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-2">
    <br>
    <h3 class="mt-4 mb-4" style="letter-spacing: 1.5px;"><b>Homes Guest Love</b></h3>
    
    <div class="row">
        <div class="col-lg-3">
            <div class="card zoom w3-border">
                <div class="card-header p-0">
                    <a class="lightbox" href="" data-plugin-options="{'type':'image'}">
                        <img class="img-fluid w3-round" width="100%" height="200" src="{{asset('img/trip/card_img1.jpg')}}" alt="Project Image">
                    </a>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Paris</small></h6>
                    <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
                    <div class="row">
                        <div class="col-md-2">
                            <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                        </div>
                        <div class="col-md-10">
                            <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100 views</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card zoom w3-border">
                <div class="card-header p-0">
                    <a class="lightbox" href="" data-plugin-options="{'type':'image'}">
                        <img class="img-fluid w3-round" width="100%" height="200" src="{{asset('img/trip/card_img3.jpg')}}" alt="Project Image">
                    </a>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Paris</small></h6>
                    <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
                    <div class="row">
                        <div class="col-md-2">
                            <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                        </div>
                        <div class="col-md-10">
                            <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100 views</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card zoom w3-border">
                <div class="card-header p-0">
                    <a class="lightbox" href="" data-plugin-options="{'type':'image'}">
                        <img class="img-fluid w3-round" width="100%" height="200" src="{{asset('img/trip/card_img2.jpg')}}" alt="Project Image">
                    </a>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Paris</small></h6>
                    <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
                    <div class="row">
                        <div class="col-md-2">
                            <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                        </div>
                        <div class="col-md-10">
                            <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100 views</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card zoom w3-border">
                <div class="card-header p-0">
                    <a class="lightbox" href="" data-plugin-options="{'type':'image'}">
                        <img class="img-fluid w3-round" width="100%" height="200" src="{{asset('img/trip/card_img1.jpg')}}" alt="Project Image">
                    </a>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Paris</small></h6>
                    <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
                    <div class="row">
                        <div class="col-md-2">
                            <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                        </div>
                        <div class="col-md-10">
                            <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100 views</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 mt-3">
            <div class="card zoom w3-border">
                <div class="card-header p-0">
                    <a class="lightbox" href="" data-plugin-options="{'type':'image'}">
                        <img class="img-fluid w3-round" width="100%" height="200" src="{{asset('img/trip/rio.jpg')}}" alt="Project Image">
                    </a>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Rio de janeiro </small></h6>
                    <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.90</b></p>
                    <div class="row">
                        <div class="col-md-2">
                            <p class="py-1 px-1"><span class="badge badge-primary">7.0</span></p>
                        </div>
                        <div class="col-md-10">
                            <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100 views</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt-3">
            <div class="card zoom w3-border">
                <div class="card-header p-0">
                    <a class="lightbox" href="" data-plugin-options="{'type':'image'}">
                        <img class="img-fluid w3-round" width="100%" height="200" src="{{asset('img/trip/rio2.jpg')}}" alt="Project Image">
                    </a>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Rio de janeiro</small></h6>
                    <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $1.00</b></p>
                    <div class="row">
                        <div class="col-md-2">
                            <p class="py-1 px-1"><span class="badge badge-primary">7.0</span></p>
                        </div>
                        <div class="col-md-10">
                            <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100 views</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt-3">
            <div class="card zoom w3-border">
                <div class="card-header p-0">
                    <a class="lightbox" href="" data-plugin-options="{'type':'image'}">
                        <img class="img-fluid w3-round" width="100%" height="200" src="{{asset('img/trip/rio3.jpg')}}" alt="Project Image">
                    </a>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Paris</small></h6>
                    <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
                    <div class="row">
                        <div class="col-md-2">
                            <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                        </div>
                        <div class="col-md-10">
                            <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100 views</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt-3">
            <div class="card zoom w3-border">
                <div class="card-header p-0">
                    <a class="lightbox" href="" data-plugin-options="{'type':'image'}">
                        <img class="img-fluid w3-round" width="100%" height="200" src="{{asset('img/trip/rio4.jpg')}}" alt="Project Image">
                    </a>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Paris</small></h6>
                    <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
                    <div class="row">
                        <div class="col-md-2">
                            <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                        </div>
                        <div class="col-md-10">
                            <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100 views</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-2">
    <h3 class="mt-4 mb-3" style="letter-spacing: 1.5px;"><b>Get inspiration for your next trip</b></h3>
    <br>
    <div class="row">
        <div class="col-lg-4">
            <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom">
                <span class="thumb-info-wrapper">
                    <img src="{{asset('img/trip/pool_image.jpg')}}" class="img-fluid" alt="">
                    <span class="thumb-info-title">
                        <span class="thumb-info-inner line-height-1">Simple title</span>
                        <span class="thumb-info-type opacity-8">Exerpt</span>
                        <span class="thumb-info-show-more-content opacity-7"><p class="mb-0 text-1 line-height-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p></span>
                    </span>
                </span>
            </span>
        </div>
        <div class="col-lg-4">
            <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom">
                <span class="thumb-info-wrapper">
                    <img src="{{asset('img/trip/dubai.jpg')}}" class="img-fluid" alt="">
                    <span class="thumb-info-title">
                        <span class="thumb-info-inner line-height-1">Simple title</span>
                        <span class="thumb-info-type opacity-8">Exerpt</span>
                        <span class="thumb-info-show-more-content opacity-7"><p class="mb-0 text-1 line-height-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p></span>
                    </span>
                </span>
            </span>
        </div>
        <div class="col-lg-4">
            <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom">
                <span class="thumb-info-wrapper">
                    <img src="{{asset('img/trip/cht.jpg')}}" class="img-fluid" alt="">
                    <span class="thumb-info-title">
                        <span class="thumb-info-inner line-height-1">Simple title</span>
                        <span class="thumb-info-type opacity-8">Exerpt</span>
                        <span class="thumb-info-show-more-content opacity-7"><p class="mb-0 text-1 line-height-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p></span>
                    </span>
                </span>
            </span>
        </div>
        
        <div class="col-lg-4 mt-3">
            <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom">
                <span class="thumb-info-wrapper">
                    <img src="{{asset('img/trip/aus.jpg')}}" class="img-fluid" alt="">
                    <span class="thumb-info-title">
                        <span class="thumb-info-inner line-height-1">Simple title</span>
                        <span class="thumb-info-type opacity-8">Exerpt</span>
                        <span class="thumb-info-show-more-content opacity-7"><p class="mb-0 text-1 line-height-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p></span>
                    </span>
                </span>
            </span>
        </div>

        <div class="col-lg-4 mt-3">
            <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom">
                <span class="thumb-info-wrapper">
                    <img src="{{asset('img/trip/zealand.jpg')}}" class="img-fluid" alt="">
                    <span class="thumb-info-title">
                        <span class="thumb-info-inner line-height-1">Simple title</span>
                        <span class="thumb-info-type opacity-8">Exerpt</span>
                        <span class="thumb-info-show-more-content opacity-7"><p class="mb-0 text-1 line-height-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p></span>
                    </span>
                </span>
            </span>
        </div>

        <div class="col-lg-4 mt-3">
            <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom">
                <span class="thumb-info-wrapper">
                    <img src="{{asset('img/trip/qatar.jpg')}}" class="img-fluid" alt="">
                    <span class="thumb-info-title">
                        <span class="thumb-info-inner line-height-1">Simple title</span>
                        <span class="thumb-info-type opacity-8">Exerpt</span>
                        <span class="thumb-info-show-more-content opacity-7"><p class="mb-0 text-1 line-height-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p></span>
                    </span>
                </span>
            </span>
        </div>
    </div>
</div>

<div class="container py-2">
    <h3 class="mt-4 mb-3" style="letter-spacing: 1.5px;"><b>Explore Our Hotels
    </b></h3>
    <br>
    <div class="row">
        {{-- <div class="col-lg-3">
            <div class="card">
                <div class="card-header p-0">
                    <div class="thumb-info thumb-info-hide-wrapper-bg">
                        <div class="thumb-info-wrapper">
                            <img src="{{asset('img/trip/hotel.jpg')}}" style="height: 230px;" width="100%" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">Hotel Paradies</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Dhaka</small></h6>
                    <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from $2/night</b></p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header p-0">
                    <div class="thumb-info thumb-info-hide-wrapper-bg">
                        <div class="thumb-info-wrapper">
                            <img src="{{asset('img/trip/dt.jpg')}}" style="height: 230px;" width="100%" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">Hotel Sharjah</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Dubai</small></h6>
                    <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from $12/night</b></p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header p-0">
                    <div class="thumb-info thumb-info-hide-wrapper-bg">
                        <div class="thumb-info-wrapper">
                            <img src="{{asset('img/trip/magnolia-hotel-and-spa.jpg')}}" style="height: 230px;" width="100%" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">Magnolia hotel & spa</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Torronto, Canada</small></h6>
                    <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from $21/night</b></p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header p-0">
                    <div class="thumb-info thumb-info-hide-wrapper-bg">
                        <div class="thumb-info-wrapper">
                            <img src="{{asset('img/trip/deluxe-double-room.jpg')}}" style="height: 230px;" width="100%" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">Swiss international hotel</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Mentenegro</small></h6>
                    <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from $31/night</b></p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt-3">
            <div class="card">
                <div class="card-header p-0">
                    <div class="thumb-info thumb-info-hide-wrapper-bg">
                        <div class="thumb-info-wrapper">
                            <img src="{{asset('img/trip/hotel1.jpg')}}" style="height: 230px;" width="100%" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">Swiss international hotel</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Mentenegro</small></h6>
                    <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from $31/night</b></p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt-3">
            <div class="card">
                <div class="card-header p-0">
                    <div class="thumb-info thumb-info-hide-wrapper-bg">
                        <div class="thumb-info-wrapper">
                            <img src="{{asset('img/trip/hotel2.jpg')}}" style="height: 230px;" width="100%" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">Swiss international hotel</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Mentenegro</small></h6>
                    <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from $31/night</b></p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt-3">
            <div class="card">
                <div class="card-header p-0">
                    <div class="thumb-info thumb-info-hide-wrapper-bg">
                        <div class="thumb-info-wrapper">
                            <img src="{{asset('img/trip/hotel3.jpg')}}" style="height: 230px;" width="100%" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">Swiss international hotel</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Mentenegro</small></h6>
                    <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from $31/night</b></p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt-3">
            <div class="card">
                <div class="card-header p-0">
                    <div class="thumb-info thumb-info-hide-wrapper-bg">
                        <div class="thumb-info-wrapper">
                            <img src="{{asset('img/trip/hotel4.jpg')}}" style="height: 230px;" width="100%" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">Swiss international hotel</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Mentenegro</small></h6>
                    <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from $31/night</b></p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt-3">
            <div class="card">
                <div class="card-header p-0">
                    <div class="thumb-info thumb-info-hide-wrapper-bg">
                        <div class="thumb-info-wrapper">
                            <img src="{{asset('img/trip/deluxe-double-room.jpg')}}" style="height: 230px;" width="100%" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">Swiss international hotel</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Mentenegro</small></h6>
                    <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from $31/night</b></p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt-3">
            <div class="card">
                <div class="card-header p-0">
                    <div class="thumb-info thumb-info-hide-wrapper-bg">
                        <div class="thumb-info-wrapper">
                            <img src="{{asset('img/trip/dt.jpg')}}" style="height: 230px;" width="100%" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">Hotel Sharjah</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Dubai</small></h6>
                    <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from $12/night</b></p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt-3">
            <div class="card">
                <div class="card-header p-0">
                    <div class="thumb-info thumb-info-hide-wrapper-bg">
                        <div class="thumb-info-wrapper">
                            <img src="{{asset('img/trip/hotel3.jpg')}}" style="height: 230px;" width="100%" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">Swiss international hotel</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Mentenegro</small></h6>
                    <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from $31/night</b></p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt-3">
            <div class="card">
                <div class="card-header p-0">
                    <div class="thumb-info thumb-info-hide-wrapper-bg">
                        <div class="thumb-info-wrapper">
                            <img src="{{asset('img/trip/magnolia-hotel-and-spa.jpg')}}" style="height: 230px;" width="100%" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-body pl-2 pt-0 pr-2 pb-0">
                    <p class="card-title m-0 mt-2 w3-text-black">Magnolia hotel & spa</p>
                    <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> Torronto, Canada</small></h6>
                    <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from $21/night</b></p>
                </div>
            </div>
        </div> --}}
        @foreach ($hotels as $hotel)
            <div class="col-lg-3 mt-3">
                <a href="{{route('welcome.hotelDetails',['hotel'=>$hotel,'title'=>$hotel->title])}}">
                    <div class="w3-card">
                        <div class="card-header p-0">
                            <div class="thumb-info thumb-info-hide-wrapper-bg">
                                <div class="thumb-info-wrapper">
                                    
                                    <img src="{{ route('imagecache',['template'=>'cplg','filename'=>$hotel->image]) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pl-2 pt-0 pr-2 pb-0">
                            <p class="card-title m-0 mt-2 w3-text-black">{{ucfirst($hotel->title)}}</p>
                            <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> {{ucfirst($hotel->city)}}, {{ucfirst($hotel->country)}}</small></h6>
                            <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from ${{$hotel->cost}}/night</b></p>
                        </div>
                    </div>
                </a>
            </div> 
        @endforeach
    </div>
</div>

{{-- top destination --}}
<div class="container py-2">
    <h3 class="mt-4 mb-3" style="letter-spacing: 1.5px;"><b>Top International destinations
    </b></h3>
    {{-- <br> --}}
    <div class="row">
        
        {{-- <div class="col-sm-4 mb-2 mb-md-0">
            <div class="w3-card w3-round w3-border w3-border-blue w3-hover-shadow">
                <div class="card-body p-0 m-0">
                   <div class="row">
                        <img class="col-sm-6" src="{{asset('img/trip/bali.jpg')}}" alt="sans"/>

                        <div class="col-sm-6 mt-3">
                            <a href="">Bali</a>
                            <p>Indonesia</p>
                        </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-2 mb-md-0">
            <div class="w3-card w3-border w3-round w3-border-blue w3-hover-shadow">
                <div class="card-body p-0 m-0">
                   <div class="row">
                        <img class="col-sm-6" src="{{asset('img/trip/Phuket_Banner_Large_1920x368.jpg')}}" alt="sans"/>

                        <div class="col-sm-6 mt-3">
                            <a href="">Phuket</a>
                            <p>Thailand</p>
                        </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-2 mb-md-0">
            <div class="w3-card w3-border w3-round w3-border-blue w3-hover-shadow">
                <div class="card-body p-0 m-0">
                   <div class="row">
                        <img class="col-sm-6" src="{{asset('img/trip/Fiji_Banner_Large_1920x368_1.jpg')}}" alt="sans"/>

                        <div class="col-sm-6 mt-3">
                            <a href="">Fiji</a>
                            <p>Fiji</p>
                        </div>
                   </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-3 mb-2 mb-md-0">
            <div class="w3-card w3-round w3-border w3-border-blue w3-hover-shadow">
                <div class="card-body p-0 m-0">
                   <div class="row">
                        <img class="col-sm-6" src="{{asset('img/trip/Vancouver-GettyImages-170090887_4.jpg')}}" alt="sans"/>

                        <div class="col-sm-6 mt-3">
                            <a href="">Vancouver</a>
                            <p>Canada</p>
                        </div>
                   </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-3 mb-2 mb-md-0">
            <div class="w3-card w3-round w3-border w3-border-blue w3-hover-shadow">
                <div class="card-body p-0 m-0">
                   <div class="row">
                        <img class="col-sm-6" src="{{asset('img/trip/Fiji_Banner_Large_1920x368_1.jpg')}}" alt="sans"/>

                        <div class="col-sm-6 mt-3">
                            <a href="">Fiji</a>
                            <p>Fiji</p>
                        </div>
                   </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-3 mb-2 mb-md-0">
            <div class="w3-card w3-round w3-border w3-border-blue w3-hover-shadow">
                <div class="card-body p-0 m-0">
                   <div class="row">
                        <img class="col-sm-6" src="{{asset('img/trip/Tokyo-GettyImages-814186842_1.jpg')}}" alt="sans"/>

                        <div class="col-sm-6 mt-3">
                            <a href="">Tokyo</a>
                            <p>Japan</p>
                        </div>
                   </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-3 mb-2 mb-md-0">
            <div class="w3-card w3-round w3-border w3-border-blue w3-hover-shadow">
                <div class="card-body p-0 m-0">
                   <div class="row">
                        <img class="col-sm-6" src="{{asset('img/trip/Phuket_Banner_Large_1920x368.jpg')}}" alt="sans"/>

                        <div class="col-sm-6 mt-3">
                            <a href="">Phuket</a>
                            <p>Thailand</p>
                        </div>
                   </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-3 mb-2 mb-md-0">
            <div class="w3-card w3-round w3-border w3-border-blue w3-hover-shadow">
                <div class="card-body p-0 m-0">
                   <div class="row">
                        <img class="col-sm-6" src="{{asset('img/trip/Auckland-GettyImages-164563620_4.jpg')}}" alt="sans"/>

                        <div class="col-sm-6 mt-3">
                            <a href="">Auckland</a>
                            <p>Newzeland</p>
                        </div>
                   </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-3 mb-2 mb-md-0">
            <div class="w3-card w3-round w3-border w3-border-blue w3-hover-shadow">
                <div class="card-body p-0 m-0">
                   <div class="row">
                        <img class="col-sm-6" src="{{asset('img/trip/Tokyo-GettyImages-814186842_1.jpg')}}" alt="sans"/>

                        <div class="col-sm-6 mt-3">
                            <a href="">Tokyo</a>
                            <p>Japan</p>
                        </div>
                   </div>
                </div>
            </div>
        </div> --}}

        @foreach ($destinations as $destination)
        <div class="col-sm-4 mt-3 mb-2 mb-md-0">
            <div class="w3-card w3-round w3-border w3-border-blue w3-hover-shadow">
                <div class="card-body p-0 m-0">
                   <div class="row">
                    
                        <img class="col-sm-6" src="{{ route('imagecache',['template'=>'cpmd','filename'=>$destination->image]) }}" alt="sans"/>

                        <div class="col-sm-6 mt-3">
                            <a href="{{route('welcome.destinationDetails',['destination'=>$destination, 'title'=>$destination->title])}}">{{ucfirst($destination->title)}}</a>
                            <p>{{ucfirst($destination->country)}}</p>
                        </div>
                   </div>
                </div>
            </div>
        </div> 
        @endforeach

    </div>
</div>
{{-- ./top des --}}
<div class="container py-2">
    <div class="row">
        <div class="col-md-6">
            <img src="{{asset('img/trip/ui-img.png')}}" width="100%" alt="">
        </div>
        <div class="col-md-6 mt-5">
           <div class="card mt-5 w3-hover w3-hover-border-blue w3-border-brown">
               <div class="card-body w3-center">
                <h4 class="w3-text-yellow"><b>Download Our Apps</b></h4>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <img src="{{asset('img/trip/appleStore.png')}}" alt="">
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('img/trip/playStore.png')}}" alt="">

                    </div>
                    <div class="col-md-2"></div>
                </div>
               </div>
           </div>
        </div>
    </div>
</div>