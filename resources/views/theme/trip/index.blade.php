@extends('user.porto.layouts.userLayoutMaster')
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

        div#myTabContent {
            border: none;
        }

        ul#myTab {
            border: none;
        }

    </style>
@endpush
@section('content')

    <div role="main" class="main">
        <div class="slider-container rev_slider_wrapper bg-color-grey-scale-1" style="height: 100vh;">
            <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider
                data-plugin-options="{'sliderLayout': 'fullscreen', 'delay': 9000, 'gridwidth': 1140, 'gridheight': 800, 'responsiveLevels': [4096,1200,992,500]}">
                <ul>
                    <li data-transition="fade">
                        <img src="{{ asset('user/img/tokyo-night1.jpg') }}" alt="" data-bgposition="100% 100%"
                            data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
                        <div class="tp-caption font-weight-light ws-normal text-center"
                            data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":0,"split":"chars","splitdelay":0.00,"ease":"Power2.easeInOut"},{"delay":"wait","speed":0,"to":"y:[0%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                            data-x="center" data-y="center" data-voffset="['53','53','53','105']"
                            data-fontsize="['18','18','18','40']" data-lineheight="['26','26','26','45']"
                            style="color: #080808; min-width: 1200px;">


                            <div class="row">

                                <div class="col-md-12">
                                    <a href="" class="btn w3-text-3 font-weight-bold w3-text-white"><i
                                            class="icon-plane icons"></i> <br> Flights</a>
                                    <a href="" class="btn w3-text-3 font-weight-bold w3-text-white"><i
                                            class="fas fa-hotel"></i> <br> Hotels</a>
                                    <a href="" class="btn w3-text-3 font-weight-bold w3-text-white"> <i
                                            class="fa fa-gift"></i> <br> Packages</a>
                                    <a href="" class="btn w3-text-3 font-weight-bold w3-text-white"> <i
                                            class="fa fa-bus"></i> <br> Transportation</a>
                                    <a href="" class="btn w3-text-3 font-weight-bold w3-text-white"> <i
                                            class="icon-tag icons"></i> <br> Special deals</a>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card w3-round-xxlarge">
                                        <div class="card-body w3-round-xxlarge w3-white">

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
                                                            <a class="btn sub-head nav-link" id="adult-tab" href="#"
                                                                id="navbarDropdown" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                Audit <i class="icon-arrow-down icons"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                <a class="dropdown-item" href="#">Lorem</a>
                                                                <a class="dropdown-item" href="#">Lorem</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#">Lorem</a>
                                                            </div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="btn sub-head nav-link" id="economy-tab" href="#"
                                                                id="navbarDropdown" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                Economy <i class="icon-arrow-down icons"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                <a class="dropdown-item" href="#">Lorem</a>
                                                                <a class="dropdown-item" href="#">Lorem</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#">Lorem</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="switchbtn">
                                                        <label class="switch">
                                                            <input type="checkbox" checked>
                                                            <span class="slider round"></span>
                                                        </label>
                                                        <p class="d-inline sub-head">Direct Flights only</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                    aria-labelledby="home-tab">
                                                    <form action="{{ route('welcome.flightLists') }}" method="GET">
                                                        <input type="hidden" name="type" value="one-way">
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
                                                                            <select id="user" name="from"
                                                                                class="form-control user-select select2-container step2-select select2"
                                                                                data-placeholder="Select City"
                                                                                data-ajax-url="{{ route('welcome.tripSearchAjax') }}"
                                                                                data-ajax-cache="true"
                                                                                data-ajax-dataType="json"
                                                                                data-ajax-delay="200" style="">

                                                                            </select>
                                                                            {{-- <input name="from" id="from" class="form-control w3-border-0" type="text"
                                                                                placeholder="Type City Name"> --}}
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
                                                                            <select id="modal-container" name="to"
                                                                            class="seleect5 search form-control"
                                                                            data-placeholder="Select City"
                                                                            data-ajax-url="{{ route('welcome.tripSearchAjax') }}"
                                                                            data-ajax-cache="true"
                                                                            data-ajax-dataType="json"
                                                                            data-ajax-delay="200" style="">

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
                                                                                class="form-control w3-border-0"
                                                                                type="text" placeholder="Type City Name">
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
        <div class="container4 pt-3 py-3">
            <div class="row ">
                <div class="col-md-12 ">
                    <div class="text-center">
                        <p> <span class="font-weight-bold w3-text-black"> News/Covid information:</span> Trip beyond is one
                            of the fastest growing agencies based in Dhaka, Bangladesh which is certified by International
                            Air Transport Association (IATA).
                            This company Was established with the slogan "Go beyond your dreams." We are trully commited to
                            providing you with quality services to make your tours easier, convented and hassle free.
                            Aliquyam sadipscing sed eos labore
                            voluptua at, ipsum diam sanctus ea kasd ea lorem, ut consetetur eirmod sea stet magna.</p>
                        <a class="w3-btn w3-white w3-border" href="">Red More</a>
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

                            <div class="lightbox"
                                data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
                                <div class="owl-carousel owl-theme stage-margin"
                                    data-plugin-options="{'items': 2, 'margin': 15, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/night-view2.jpg') }}" style="height: 240px;"
                                            alt="Project Image">


                                        <p class="pl-3" style="margin-top: -210px;"> <span
                                                class="w3-text-orange  font-weight-bold" style="font-size: 28px;"> 10% off
                                                <br></span> <span class="w3-text-white w3-large">with KLM</span></p>
                                        <div class="row  ml-3 pt-5 mt-5">
                                            <a href="" class="btn btn-tarek w3-round-xxlarge">Book Now</a>
                                        </div>



                                    </div>
                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/night-view-2.jpg') }}" style="height: 240px;"
                                            alt="Project Image">

                                        <p class="pl-3" style="margin-top: -210px;"> <span
                                                class="w3-text-white  font-weight-bold" style="font-size: 22px;"> Next
                                                pocket friendly
                                                Trip? <br></span> </p>
                                        <div class="w3-text-orange w3-large pl-3">Malaysia invites you <br>
                                            <div class="pt-5 mt-1">
                                                <a href="" class="btn w3-text-white w3-large">Plan it now <i
                                                        class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>





                                    </div>
                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/night-view2.jpg') }}" style="height: 240px;"
                                            alt="Project Image">

                                        <p class="pl-3" style="margin-top: -210px;"> <span
                                                class="w3-text-white  font-weight-bold"
                                                style="font-size: 18px; line-height: 1.5;"> <i class="icon-star icons"></i>
                                                5 start stays
                                                are now more affordable <br></span> <span
                                                class="w3-text-black w3-large">with KLM</span></p>
                                        <div class="row  ml-3 pt-5 mt-3">
                                            <a href="" class="btn btn-tarek w3-round-xxlarge">Check In</a>
                                        </div>


                                    </div>


                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/night-view-2.jpg') }}" style="height: 240px;"
                                            alt="Project Image">


                                        <p class="pl-3" style="margin-top: -210px;"> <span
                                                class="w3-text-orange  font-weight-bold" style="font-size: 28px;"> 10% off
                                                <br></span> <span class="w3-text-white w3-large">with KLM</span></p>
                                        <div class="row  ml-3 pt-5 mt-5">
                                            <a href="" class="btn btn-tarek w3-round-xxlarge">Book Now</a>
                                        </div>



                                    </div>
                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/night-view2.jpg') }}" style="height: 240px;"
                                            alt="Project Image">

                                        <p class="pl-3" style="margin-top: -210px;"> <span
                                                class="w3-text-white  font-weight-bold" style="font-size: 22px;"> Next
                                                pocket friendly
                                                Trip? <br></span> </p>
                                        <div class="w3-text-orange w3-large pl-3">Malaysia invites you <br>
                                            <div class="pt-5 mt-1">
                                                <a href="" class="btn w3-text-white w3-large">Plan it now <i
                                                        class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>





                                    </div>
                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/night-view-2.jpg') }}" style="height: 240px;"
                                            alt="Project Image">

                                        <p class="pl-3" style="margin-top: -210px;"> <span
                                                class="w3-text-white  font-weight-bold"
                                                style="font-size: 18px; line-height: 1.5;"> <i class="icon-star icons"></i>
                                                5 start stays
                                                are now more affordable <br></span> <span
                                                class="w3-text-black w3-large">with KLM</span></p>
                                        <div class="row  ml-3 pt-5 mt-3">
                                            <a href="" class="btn btn-tarek w3-round-xxlarge">Check In</a>
                                        </div>


                                    </div>



                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/projects/project-6.jpg') }}" alt="Project Image">

                                    </div>
                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/projects/project-7.jpg') }}" alt="Project Image">

                                    </div>
                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/projects/project.jpg') }}" alt="Project Image">

                                    </div>
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
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="blog-posts">

                                                <article class="post post-medium btn btn-rounded ">
                                                    <div class="post-image">
                                                        <a href="#">
                                                            <img src="img/promotion.png"
                                                                class="img-fluid img-thumbnail-no-borders rounded-5 border-curve"
                                                                alt="" />
                                                        </a>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row pl-3">
                                                <p class="w3-text-black font-weight-bold">Last minute Summer Trip</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <p>It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <a class="btn btn-tarek btn-rounded" href="">Let's go</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4 pt-3">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="post-image">
                                                <a href="blog-post.html">
                                                    <img src="img/promotion2.png"
                                                        class="img-fluid img-thumbnail img-thumbnail-no-borders w3-round-xxlarge"
                                                        style="max-height: 300px;" alt="" />
                                                </a>
                                            </div>

                                            <div class="row pt-5">
                                                <div class="col-md-12">
                                                    <p class="w3-text-black font-weight-bold">Flying from Delhi-London?</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <p>It is a long established fact that a reader will be distracted by
                                                            the r eadable content of a page when looking at its layout.</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a class="btn btn-tarek btn-rounded" href="">Book Now
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

            <div class="row">
                <div class="col">



                    <div class="row">
                        <div class="col">

                            <div class="text-center">
                                <p class="w3-text-black" style="font-size: 18px;"><b>Favourite Destination Packages</b>
                                </p>
                            </div>

                            <div class="lightbox">
                                <div class="owl-carousel owl-theme stage-margin"
                                    data-plugin-options="{'items': 2, 'margin': 15, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
                                    <div>


                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/night-view2.jpg') }}" style="height: 240px;"
                                            alt="Project Image">

                                        <div class="text-center " style="margin-top: -75px; margin-bottom: 60px;">
                                            <a href="" class="btn btn-tarek w3-round-xlarge">Plan Trip</a>
                                        </div>


                                        <div class="text-center">
                                            <span class="w3-text-black" style="font-size: 16px;"><b>Dhaka</b></span>
                                        </div>



                                    </div>
                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/night-view-2.jpg') }}" style="height: 240px;"
                                            alt="Project Image">
                                        <div class="text-center " style="margin-top: -75px; margin-bottom: 60px;">
                                            <a href="" class="btn btn-tarek w3-round-xlarge">Plan Trip</a>
                                        </div>
                                        <div class="text-center">
                                            <span class="w3-text-black" style="font-size: 16px;"><b>Agra</b></span>
                                        </div>

                                    </div>
                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/night-view2.jpg') }}" style="height: 240px;"
                                            alt="Project Image">
                                        <div class="text-center " style="margin-top: -75px; margin-bottom: 60px;">
                                            <a href="" class="btn btn-tarek w3-round-xlarge">Plan Trip</a>
                                        </div>

                                        <div class="text-center">
                                            <span class="w3-text-black" style="font-size: 16px;"><b>London</b></span>
                                        </div>

                                    </div>
                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/night-view-2.jpg') }}" style="height: 240px;"
                                            alt="Project Image">
                                        <div class="text-center " style="margin-top: -75px; margin-bottom: 60px;">
                                            <a href="" class="btn btn-tarek w3-round-xlarge">Plan Trip</a>
                                        </div>

                                        <div class="text-center">
                                            <span class="w3-text-black" style="font-size: 16px;"><b>Paris</b></span>
                                        </div>

                                    </div>
                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/night-view2.jpg') }}" style="height: 240px;"
                                            alt="Project Image">
                                        <div class="text-center " style="margin-top: -75px; margin-bottom: 60px;">
                                            <a href="" class="btn btn-tarek w3-round-xlarge">Plan Trip</a>
                                        </div>
                                        <div class="text-center">
                                            <span class="w3-text-black" style="font-size: 16px;"><b>Dubai</b></span>
                                        </div>

                                    </div>
                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/night-view-2.jpg') }}" style="height: 240px;"
                                            alt="Project Image">
                                        <div class="text-center " style="margin-top: -75px; margin-bottom: 60px;">
                                            <a href="" class="btn btn-tarek w3-round-xlarge">Plan Trip</a>
                                        </div>
                                        <div class="text-center">
                                            <span class="w3-text-black" style="font-size: 16px;"><b>Baali</b></span>
                                        </div>

                                    </div>
                                    <div>

                                        <img class="img-fluid w3-round-xxlarge"
                                            src="{{ asset('user/img/night-view2.jpg') }}" style="height: 240px;"
                                            alt="Project Image">
                                        <div class="text-center " style="margin-top: -75px; margin-bottom: 60px;">
                                            <a href="" class="btn btn-tarek w3-round-xlarge">Plan Trip</a>
                                        </div>
                                        <div class="text-center">
                                            <span class="w3-text-black" style="font-size: 16px;"><b>Tokyo</b></span>
                                        </div>

                                    </div>
                                    <div>
                                        <div class="text-center">
                                            <img class="img-fluid w3-round-xxlarge"
                                                src="{{ asset('user/img/night-view-2.jpg') }}" style="height: 240px;"
                                                alt="Project Image">



                                            <a href="" class="btn btn-tarek w3-round-xlarge"
                                                style="margin-top: -140px;">Plan Trip</a>

                                        </div>
                                        <div class="text-center">
                                            <span class="w3-text-black" style="font-size: 16px;"><b>Switzerland</b></span>
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
@endsection
@push('extra')
    <div class="container p-4 ">
        <div class="row">
            <div class="col">
                <div class="blog-posts">

                    <p class="black font-weight-bold" style="font-size: 18px;">Save on Travel with tripbeyond.com</p>

                    <p class="mini-p">Tripbeyond.com is a rapidly-growing global online travel agency,
                        Tripbeyond.com is here to help you plan the perfect trip. Whether you're going on holiday, taking a
                        business trip, or looking to set up a corporate travel account, Tripbeyond.com is here to help you
                        travel the world with cheap flights, discount hotels, and train tickets. Looking to find great
                        travel deals or enjoy the biggest savings on your next trip? Trip.com has you covered. With our
                        easy-to-use website and app, along with 24-hour customer service, booking your next trip couldn't be
                        simpler. With Tripbeyond.com, quality travel services in over a dozen languages including English,
                        Mandarin, Cantonese, Japanese, Korean, German, French, and Spanish are just a call—or click—away.
                        Easily Customize Your Trip with the Best Hotel and Flight Deals</p>

                    <p class="mini-p">Diam stet ipsum et erat dolore rebum et no ipsum ut, dolores sed diam est
                        dolor tempor diam nonumy consetetur. Dolor sed dolor stet labore eirmod, dolor dolores et eirmod
                        ipsum sea sit invidunt. Dolor dolores at diam dolor sed aliquyam clita, vero clita kasd no sed
                        dolor. Amet diam.</p>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col">
                <div class="blog-posts">

                    <p class="black font-weight-bold" style="font-size: 18px;">Featured Hotel Destinations</p>

                    <p class="mini-p">Hotels in Shanghai | Hotels in Beijing | Hotels in Guangzhou | Hotels in
                        Shenzhen | Hotels in Hangzhou | Hotels in Xiamen | Hotels in Chengdu | Hotels in Hong Kong | Hotels
                        in Macau | Hotels in Tokyo | Hotels in Osaka | Hotels in Kyoto | Hotels in Fukuoka | Hotels in
                        Sapporo | Hotels in Seoul | Hotels in Taipei | Hotels in Singapore | Hotels in Kuala Lumpur | Hotels
                        in Bangkok | Hotels in Da Nang</p>

                </div>
            </div>

        </div>



        <div class="row">
            <div class="col">
                <div class="blog-posts">

                    <p class="black font-weight-bold" style="font-size: 18px;">Featured Flight Destinations</p>

                    <p class="mini-p">Flights to Cebu | Flights to Jakarta | Flights to Hanoi | Flights to Chengdu
                        | Flights to Phuket | Flights to Macau | Flights to Ho Chi Minh | Flights to Osaka | Flights to
                        Shenzhen | Flights to Shanghai | Flights to Beijing | Flights to Hong Kong | Flights to Seoul |
                        Flights to Bangkok |Flights to Taipei | Flights to Singapore | Flights to Tokyo | Flights toManila |
                        Flights to Guangzhou | Flights to Kuala Lumpur</p>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <div class="blog-posts">

                    <p class="black font-weight-bold" style="font-size: 18px;">Featured Tours & Tickets</p>

                    <p class="mini-p">Shanghai Disneyland Ticket | Forbidden City Ticket | Terracotta Warriors
                        Ticket | Sichuan Opera Show Ticket | Universal Orlando Ticket | Legoland Florida Ticket | Antelope
                        Canyon Ticket | Empire State Building Observation Deck Ticket | Statue of Liberty Cruise | Kualoa
                        Ranch Day Tour</p>

                </div>
            </div>

        </div>
    </div>
@endpush
@push('js')
    <!-- Select2 -->
    <script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            // $('.select2').select2({
            //     theme: 'bootstrap4'
            // });

            $('.step2-select').select2({
                theme: 'bootstrap4',
                // minimumInputLength: 1,
                ajax: {
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        // alert(data[0].s);
                        var data = $.map(data, function(obj) {
                            obj.id = obj.id || obj.id;
                            return obj;
                        });
                        var data = $.map(data, function(obj) {
                            obj.text = obj.name;
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
    $(document).ready(function() {
        // seleect5 search
        // $('.seleect5').select2({
        //     theme: 'bootstrap4'
        // });

        $('.search').select2({
            theme: 'bootstrap4',
            containerCssClass: ".search",
            // minimumInputLength: 1,
            ajax: {
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    params.page = params.page || 1;
                    // alert(data[0].s);
                    var data = $.map(data, function(obj) {
                        obj.id = obj.id || obj.id;
                        return obj;
                    });
                    var data = $.map(data, function(obj) {
                        obj.text = obj.name;
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
