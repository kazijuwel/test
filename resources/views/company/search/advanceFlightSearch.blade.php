@extends('company.layouts.companyMaster')

@push('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.4/sweetalert2.min.css"></script>
    <style>
        .flight-info {
            display: block;
            color: grey;
            font-size: 90%;
            line-height: 20px;
        }

        .stopBox {
            max-width: 100%;
            text-align: center;
            color: #0077d7;
            font-size: 10px;
            letter-spacing: 0.3px;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .flightResultItemRow .fromToRouteBox .travelRouteIconBox {
            width: 100%;
            height: 16px;
            display: block;
            position: absolute;
            top: 10px;
            left: 0px;
            background: url({{asset('img/Flight-Go-Blue.svg')}}) no-repeat left center;
        }

        .airlineToRouteBox {
            position: relative;
        }

        .arrivalPlusTimeBox {
            position: absolute;
            top: -10px;
            left: 0;
            font-size: 13px;
            color: #f78f76;
            font-weight: 600;
        }

        .timeBox {
            font-weight: 800;
        }

        .airTime {
            position: relative;
        }

        flightLogo {
            width: 116px;
            height: 16px;
            display: block;
            position: absolute;
            top: 18px;
            left: -33px;
            background: url(https://bd.flyhub.com/Content/lib/img/icons/Flight-Go-Blue.svg) no-repeat left center;
        }

        .flightLogo {
            width: 150%;
            height: 16px;
            display: block;
            position: absolute;
            top: 21px;
            left: -20px;
            background: url(https://bd.flyhub.com/Content/lib/img/icons/Flight-Go-Blue.svg) no-repeat left center;
        }

        .flightLogoBefore:before {
            content: '';
            position: absolute;
            top: 5px;
            right: 0px;
            width: 5px;
            height: 5px;
            background: #0077d7;
            display: inline-block;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        span.flightLogoBefore:after {
            content: '';
            position: absolute;
            top: 7.5px;
            right: 8px;
            left: 15px;
            height: 1px;
            border-bottom: 1px #d8d8d8 solid;
            display: inline-block;
        }

        .bookBtn {
            padding: 8px 37px;
            border-radius: 6px;
            color: #fff;
        }

        span.airlineNameBox {
            color: #2a2d34;
            font-size: 14px;
        }

        .spanText {
            color: #a7b0be;
        }

        .published {
            color: #0077d7;
            font-family: 'Inter-Medium';
            font-size: 11px;
            padding: 1px 5px;
            text-transform: uppercase;
            border: 1px #b0dcff solid;
            -webkit-border-radius: 3px;
            border-radius: 3px
        }

        span.ref {
            color: #8592a6;
            font-size: 14px;
            margin-right: 15px;
        }

        .dollerIcon {
            width: 12px;
            height: 12px;
            display: inline-block;
            margin-right: 3px;
            position: relative;
            top: 2px;
            background: url(https://bd.flyhub.com/Content/lib/img/icons/Doller-Blue-Icon.svg) no-repeat;
        }

        .flightDetailBtn {
            color: #0077d7;
            background: none;
            border: none;
            font-family: 'Inter-Medium';
            font-size: 14px;
            letter-spacing: 0.3px;
        }

        ul#myTab {
            border-bottom: 1px solid gray;
        }

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #0077d7;
            background-color: transparent !important;
            border: none;
            border-bottom: 3px solid !important;
            /* border-color: #dee2e6 #dee2e6 #fff; */
        }

        .fromToCityDateTimeBox h6 {
            color: #0077d7;
            font-family: 'Inter-Medium';
            font-size: 24px;
            padding: 10px 0px;
        }

        .dateTimeBox {
            color: #8592a6;
            font-size: 13px;
        }

        .seatIcon {
            width: 14px;
            -ms-flex: 0 0 14px;
            flex: 0 0 14px;
            height: 12px;
            display: inline-block;
            margin-right: 5px;
            background: url(https://bd.flyhub.com/Content/lib/img/icons/sit.svg) no-repeat;
        }

        .layoverTimeMainBox {
            position: relative;
            margin: 5px 0px 20px 0px;
        }

        .layoverTimeMainBox:before {
            content: '';
            position: absolute;
            top: 10px;
            right: 0px;
            left: 0px;
            height: 1px;
            background: #dedede;
            display: block;
        }

        .layoverTimeInnerBox {
            width: auto;
            min-height: 22px;
            padding: 0px 10px 0px 20px;
            color: #8592a6;
            font-size: 10px;
            position: relative;
            top: initial;
            left: 0;
            right: initial;
            z-index: 9;
            background: #fff;
            border: 1px #dedede solid;
            -webkit-border-radius: 3px;
            border-radius: 3px;
        }

        .layoverTimeInnerBox:before {
            content: '';
            position: absolute;
            top: 8px;
            left: 8px;
            width: 5px;
            height: 5px;
            display: inline-block;
            background: #0077d7;
        }

        .tablink a {
            color: #8592a6;
            padding: 5px 12px;
            position: relative;
        }
        .filghtSearchArea {
            display: grid;
            grid-template-columns: 25% 25% 25% 20%;
            grid-column-gap: 10px;
        }

        @media only screen and (min-width: 992px) {
            .segmentHeader {
                display: grid;
                grid-template-columns: 20% 50% 30%;
                grid-column-gap: 10px;
                padding: 30px 20px;
            }

        }

        /*        @media only screen and (max-width: 575px) {*/
        /*.segmentHeader{*/
        /*    display: grid;*/
        /*    grid-template-columns: ;*/
        /*}*/
        /*        }*/
        @media only screen and (max-width: 991px) {
            .segmentHeader {
                display: grid;
                grid-template-rows: auto auto auto;
                grid-template-columns:100% !important;
            }

            .airportWithCode {
                justify-content: left !important;
                flex-direction: row !important;
            }

            .flightrow {
                display: flex;
                justify-content: space-between !important;
                padding-top: 5px;
                padding-bottom: 5px;
            }

            .priceAndBook {
                justify-content: space-between !important;
            }

            .filghtSearchArea {
                display: grid;
                grid-template-columns: 25% 25% 25% 20%;
                grid-column-gap: 10px;
            }
        }

    </style>
    <style>
        .dropdown-item input[type="number"] {
            width: 51px;
        }

        input[type=radio] {
            border: 2px;
            width: 100%;
            width: 20px;
            height: 15px;
        }

        .radioContainer {
            font-size: 14px;
        }

        input.cabinClass {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        input.cabinClass:checked {
            content: none;
        }

        .secondary-btn {
            background-color: #0077d7 !important;
            color: #fff;
            padding: 13px 28px;
            border-radius: 10px;
        }

        .secondary-btn:focus {
            outline: none;
        }

        .dropdown-item {
            padding: 12px 15px;

        }

        .passengerDropdown .dropdown-item {
            background-color: transparent;
            color: black;

        }

        .passengerDropdown .dropdown-item:hover {
            background-color: #e5f1fb;
            color: #1481da;
        }

        .passengerDropdown .dropdown-item:active, .passengerDropdown .dropdown-item:focus {
            background-color: transparent;
            color: black;

        }

        .labelDesign {
            color: #0077d7 !important;
            font-weight: 600;
        }

        /*input Design*/
        span#select2-user-container {
            border: none;
            outline: none;
        }
    </style>
    <style>
        .towayHeader{
            display: grid;
            grid-template-rows: auto auto;
            row-gap: 15px;
        }

        .depart{
            background-color: #e5f1fb;
            color: #002441;
            font-size: 13px;
            border-radius: 3px;
            padding: 5px 5px;
        }
        .flightLogo2{
            width: 100%;
            height: 16px;
            display: block;
            position: absolute;
            top: 21px;
            left: -3px;
            background: url(https://bd.flyhub.com/Content/lib/img/icons/Flight-Go-Blue.svg) no-repeat left center;
        }
        .partTwo{
            display: grid;
            grid-template-columns:  45% 10% 45%  ;
        }
    </style>
@endpush

@section('content')
    @include('alerts.alerts')
    <section class="content">
        <br>

        <div class="card">
            <div class="card-header">
                <form action="{{route('airSearch',['usertype'=>'agent'])}}" method="GET" id="airSearch">
                    <input type="hidden" name="company" value="{{$company->id}}">
                    <div class="d-flex">
                        <div class="mx-2 radioContainer">
                            <label for="oneWay" @class('labelDesign')>
                                <input type="radio" id="oneWay" name="oneWay" value="oneway" checked> ONE-WAY
                            </label>
                        </div>
                        <div class="mx-2 radioContainer">
                            <label for="towWay">
                                <input type="radio" id="towWay" name="oneWay" value="twoway"> RETURN FLIGHT
                            </label>
                        </div>
                        <div class="mx-2 d-flex align-items-center" style="color: #7c7c7c;">
                            For
                        </div>
                        <div class="mx-2 passengerDropdown d-flex align-items-center">
                            <div class="dropdown show">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Passengers
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item d-flex justify-content-between" href="javascript:void(0)">
                                        <span>Adult</span>
                                        <input type="number" min="1" value="1" name="adult" width="30px">

                                    </a>
                                    <a class="dropdown-item d-flex justify-content-between" href="javascript:void(0)">
                                        <span>Child <small>2-12 years</small></span>
                                        <input type="number" min="1" name="children" width="30px">
                                    </a>
                                    <a class="dropdown-item d-flex justify-content-between" href="javascript:void(0)">
                                        <span>Infant <span>0-2 years</span></span>
                                        <input type="number" min="1" name="Infant" width="30px">
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="mx-2 d-flex align-items-center" style="color: #7c7c7c;">
                            In
                        </div>


                        <div class="mx-2 passengerDropdown d-flex align-items-center">
                            <div class="dropdown show">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cabin Class
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item d-flex justify-content-between cabin"
                                       href="javascript:void(0)">
                                        <label for="Economy"><input type="radio" value="Economy" id="Economy"
                                                                    @class('cabinClass') name="cabinClass">
                                            Economy</label>
                                    </a>
                                    <a class="dropdown-item d-flex justify-content-between" href="javascript:void(0)">
                                        <label for="Premium_Economy"><input type="radio" value="Premium Economy"
                                                                            id="Premium_Economy"
                                                                            @class('cabinClass') name="cabinClass">
                                            Premium Economy</label>
                                    </a>
                                    <a class="dropdown-item d-flex justify-content-between" href="javascript:void(0)">
                                        <label for="Business"><input type="radio" value="Business" id="Business"
                                                                     @class('cabinClass') name="cabinClass">
                                            Business</label>
                                    </a>
                                    <a class="dropdown-item d-flex justify-content-between form-check active"
                                       href="javascript:void(0)">
                                        <label for="First_Class"><input type="radio" value="First Class"
                                                                        id="First_Class"
                                                                        @class('cabinClass') name="cabinClass"> First
                                            Class</label>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filghtSearchArea">
                        <div class="form-group">
                            <label for="from" class="label">From</label>
                            <select id="user" name="from" role="textbox"
                                    class="form-control user-select select2-container step2-select select2"
                                    data-placeholder="Select City"
                                    data-ajax-url="{{ route('welcome.tripSearchAjax2') }}"
                                    data-ajax-cache="true" data-ajax-dataType="json" data-ajax-delay="200" style="">
                                <option value="DAC" selected>DHAKA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="to" class="label">To</label>
                            <select id="modal-container" name="to" class="seleect5 search form-control"
                                    data-placeholder="Select City"
                                    data-ajax-url="{{ route('welcome.tripSearchAjax2') }}"
                                    data-ajax-cache="true" data-ajax-dataType="json" data-ajax-delay="200" style="">
                                <option value="JED" selected>Jedda</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="departs">Departure Date</label>
                            <input type="date" name="departs" id="departs" class="form-control" placeholder="Date"
                                   value="{{\Carbon\Carbon::tomorrow()->format('Y-m-d')}}" id="">
                        </div>
                        <div class="form-group returnAppend">

                        </div>
                    </div>
                    <div class="submit">
                        <button class="hal-btn secondary-btn  with-right-icon" id="airSerchBtn" type="submit">
                            Search Flights &nbsp;
                            <img src="https://bd.flyhub.com/Content/lib/img/icons/white-plain.svg" alt="">
                        </button>
                    </div>
                </form>
            </div>
        </div>




        {{--        <div class="row">--}}
        {{--            @include('company.search.part.advanceFlightSearch')--}}
        {{--        </div>--}}
        <div class="card">







            <div class="card-header towayHeader">
                <div class="partOne d-flex justify-content-between">
                    <div class="d-flex logo-air">
                        <div class="flight-logo d-flex align-items-center">
                            <img width="70px" src="http://pics.avs.io/122/56/BG@2x.png" alt="">
                        </div>
                        <div class="flex-sm-column flex-xs-row pl-sm-2 d-flex align-items-xs-center pl-2">
                            <span class="mr-xs-2">Saudia</span>
                            <span>SV3871 | SV3870</span>
                        </div>
                    </div>


                    <div class="d-flex justify-content-end text-right">
                        <div class="price">
                            <del>BDT 115752</del>
                            <h4 class="p-0 m-0">BDT 109004</h4>
                        </div>
                        <div class="book-btn d-flex align-items-center pl-3">
                            <button class="btn btn-info">Book Now</button>
                        </div>
                    </div>

                </div>
                <div class="partTwo pt-2">
                    <div class="">
                        <div class="depart d-flex flex-column">
                            Depart Wed, 26 Jan • Saudia
                        </div>
                        <div class="departSegment d-flex justify-content-between pt-2">
                            <div class="d-flex flex-column">
                                <h5 @class('mb-0 pb-0')>DAC <span class="timeBox">16:55</span></h5>
                                <span class="cityName">Dhaka</span>
                            </div>
                            <div class="airTime text-center ">
                                <span class="dateBox spanText">13h 30m</span> <br>
                                <span class="flightLogo2">
                                <span class="flightLogoBefore"></span>
                            </span> <br>
                                <a href="javascript:void(0)" style="color: #0077d7; font-size: 10px" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Dubai (DXB) | 5h 0m Layover">One Stop via DXB</a>
                            </div>
                            <div class="airlineToRouteBox">
                                <h5 class="p-0 m-0">
                        <span class="timeBox">
                            21:45
                        </span> JED
                                </h5>
                                <span class="cityName">Jeddah</span>
                            </div>
                        </div>


                    </div>
                    <div class="d-flex justify-content-center align-items-center align-self-stretch" >
                        <div @class('align-self-stretch') style="border-left: 2px solid gray; border-color: #dedede"> &nbsp;</div>
                    </div>
                    <div class="">
                        <div class="depart d-flex flex-column">
                            Depart Wed, 26 Jan • Saudia
                        </div>
                        <div class="departSegment d-flex justify-content-between pt-2">
                            <div class="d-flex flex-column">
                                <h5 @class('mb-0 pb-0')>DAC <span class="timeBox">16:55</span></h5>
                                <span class="cityName">Dhaka</span>
                            </div>
                            <div class="airTime text-center ">
                                <span class="dateBox spanText">13h 30m</span> <br>
                                <span class="flightLogo2">
                                <span class="flightLogoBefore"></span>
                            </span> <br>
                                <a href="javascript:void(0)" style="color: #0077d7; font-size: 10px" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Dubai (DXB) | 5h 0m Layover">One Stop via DXB</a>
                            </div>
                            <div class="airlineToRouteBox">
                                <h5 class="p-0 m-0">
                        <span class="timeBox">
                            21:45
                        </span> JED
                                </h5>
                                <span class="cityName">Jeddah</span>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
            <div class="card-body" style="padding: 10px 20px">
                <div class="d-flex justify-content-between">
                    <div class="published">PUBLISH</div>
                    <div class="refundable">
                        <span class="ref">
                            <span class="dollerIcon">

                            </span>  Refundable
                        </span>

                        <button type="button" class="flightDetailBtn" data-target="ViewFlightDetails-1">Flight Details
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-footer" style="display: none; background: #fff;">
                <ul class="nav nav-tabs tablink" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#flightDetails_1" role="tab"
                           aria-controls="home" aria-selected="true">Flight Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#fareSummary_1" role="tab"
                           aria-controls="profile" aria-selected="false">Fare Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#discountGrossTab_1" role="tab"
                           aria-controls="contact" aria-selected="false">Discount & Grosss</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#baggageTab_1" role="tab"
                           aria-controls="contact" aria-selected="false">Baggage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#cancellationTab_1" role="tab"
                           aria-controls="contact" aria-selected="false">Cancellation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#dateChangeTab_1" role="tab"
                           aria-controls="contact" aria-selected="false">Date Change</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="flightDetails_1" role="tabpanel">
                        <div class="fromToCityDateTimeBox">
                            <h6 class="fromCityName">Dhaka <span class="directionArrow">→</span> Jeddah <span
                                    class="dateTimeBox">26 Jan 2022</span></h6>
                            <div class="segmentResult"
                                 style="display: grid; grid-template-columns: 20% 70% 10%; grid-column-gap: 10px">
                                <div class="">
                                    <div class="flightImage d-flex justify-content-lg-start ">
                                        <span class="d-flex align-items-center">
                                            <img width="50px" src="http://pics.avs.io/122/56/BG@2x.png" alt="">
                                        </span>
                                        <div class="d-flex flex-column justify-content-center"
                                             style="padding-left: 18px;">
                                            <span class="airlineNameBox">Emirates</span>
                                            <span class="spanText"> EK585 Economy | 77W </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-around">
                                    <div class="flightdate">
                                        <h5 style="color: #0077d7" class="p-0 m-0"> DAC <b>22:40</b></h5>
                                        <span class="dateBox spanText">Wed 26 Jan</span> <br>
                                        <span class="cityName spanText">Dhaka</span>
                                    </div>
                                    <div class="airTime">
                                        <span class="dateBox spanText">13h 30m</span> <br>
                                        <span class="flightLogo">
                                            <span class="flightLogoBefore"></span>
                                        </span>
                                    </div>
                                    <div class="airlineToRouteBox">
                                        <h5 class="p-0 m-0" style="color: #0077d7">
                                <span class="timeBox">
                                    09:10

                                </span> JED
                                        </h5>
                                        <span class="dateBox spanText">Thu 27 Jan</span> <br>
                                        <span class="cityName spanText">Jeddah</span>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="bookingClassBox d-md-flex align-items-center">
                                        <span class="seatIcon"></span>
                                        <span class="seatType">Y1 </span>
                                    </div>
                                </div>
                            </div>

                            <div class="layoverTimeMainBox columnBlock">
                                <div class="layoverTimeInnerBox d-inline-flex align-items-center">
                                    <span class="fontSemibold textDarkBlue">Plane Change </span>&nbsp; - Sharjah (SHJ)
                                    17h 40m Layover
                                </div>
                            </div>
                            <div class="segmentResult"
                                 style="display: grid; grid-template-columns: 20% 70% 10%; grid-column-gap: 10px">
                                <div class="">
                                    <div class="flightImage d-flex justify-content-lg-start ">
                                        <span class="d-flex align-items-center">
                                            <img width="50px" src="http://pics.avs.io/122/56/BG@2x.png" alt="">
                                        </span>
                                        <div class="d-flex flex-column justify-content-center"
                                             style="padding-left: 18px;">
                                            <span class="airlineNameBox">Emirates</span>
                                            <span class="spanText"> EK585 Economy | 77W </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-around">
                                    <div class="flightdate">
                                        <h5 style="color: #0077d7" class="p-0 m-0"> DAC <b>22:40</b></h5>
                                        <span class="dateBox spanText">Wed 26 Jan</span> <br>
                                        <span class="cityName spanText">Dhaka</span>
                                    </div>
                                    <div class="airTime">
                                        <span class="dateBox spanText">13h 30m</span> <br>
                                        <span class="flightLogo">
                                            <span class="flightLogoBefore"></span>
                                        </span>
                                    </div>
                                    <div class="airlineToRouteBox">
                                        <h5 class="p-0 m-0" style="color: #0077d7">
                                <span class="timeBox">
                                    09:10

                                </span> JED
                                        </h5>
                                        <span class="dateBox spanText">Thu 27 Jan</span> <br>
                                        <span class="cityName spanText">Jeddah</span>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="bookingClassBox d-md-flex align-items-center">
                                        <span class="seatIcon"></span>
                                        <span class="seatType">Y1 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show " id="fareSummary_1" role="tabpanel">
                        <table class="hal-table fareSummaryTable table">
                            <thead style="border-bottom-style: dotted !important; color:#002441 !important;">
                            <tr>
                                <th>Pax Type</th>
                                <th>Base Fare</th>
                                <th>Tax</th>
                                <th>Other</th>
                                <th>Discount</th>
                                <th>AIT &amp; VAT</th>
                                <th>Pax Count</th>
                                <th>Sub Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Adult</td>
                                <td>
                                    108583
                                </td>
                                <td>11793</td>
                                <td>0</td>
                                <td>

                                    <span>-7601</span>
                                </td>
                                <td>362</td>
                                <td>1</td>
                                <td>113137</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade show " id="discountGrossTab_1" role="tabpanel">
                        <table class="table hal-table discountGrossTable cancellationTable">
                            <thead>
                            <tr>
                                <th>Gross Amount</th>
                                <th>Total Discount</th>
                                <th>Invoice Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>120738</td>
                                <td>
                                    <span>-7601</span>
                                </td>
                                <td>113137</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade show " id="baggageTab_1" role="tabpanel">
                        <table class="table hal-table baggageTable cancellationTable">
                            <thead>
                            <tr>
                                <th>Baggage</th>
                                <th>Check in</th>
                                <th>Cabin</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Adult</td>
                                <td>35 K</td>
                                <td>SB</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade show " id="cancellationTab_1" role="tabpanel">add.b.</div>
                    <div class="tab-pane fade" id="dateChangeTab_1" role="tabpanel">ds...</div>
                </div>

            </div>


        </div>
    </section>

@endsection

@push('js')
    <script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.4/sweetalert2.min.js"></script>

    <script>
        $(document).on('click', '.flightDetailBtn', function (e) {
            var that = $(this);
            that.closest('.card').find('.card-footer').slideToggle();
        });
        $(document).ready(function () {

            // $('.select2').select2({
            //     theme: 'bootstrap4'
            // });

            $('.step2-select').select2({
                theme: 'bootstrap4',

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

        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).on('click', '#airSerchBtn', function () {
            $('.loaderIs').show();
        });
        $('input[type="radio"]').on('click change', function (e) {
            var that = $(this);
            var value = that.val();
            if (value == 'oneway') {

                $('label').removeClass('labelDesign');
                that.closest('label').addClass('labelDesign');
                $('.returnAppend').html('');

            } else if (value == 'twoway') {
                $('label').removeClass('labelDesign');
                that.closest('label').addClass('labelDesign');
                var returnForm = '<label for="return">Returning Date</label><input type="date" name="return" id="return" class="form-control" placeholder="Date"  id="return">';
                $('.returnAppend').html(returnForm);
            }
        });

    </script>
@endpush
