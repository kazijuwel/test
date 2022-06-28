@extends('company.layouts.companyMaster')

@push('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.4/sweetalert2.min.css"></script>
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
        .flight-info {
            display: block;
            color: grey;
            font-size: 90%;
            line-height: 20px;
        }
    </style>
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


        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link:hover {
            color: blueviolet;
            font-weight: 600;
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
                grid-template-columns: 20% 20% 25% 20%;
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
            width: 30px;
            height: 19px;
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
        .towayHeader {
            display: grid;
            grid-template-rows: auto auto;
            row-gap: 15px;
        }

        .depart {
            background-color: #e5f1fb;
            color: #002441;
            font-size: 13px;
            border-radius: 3px;
            padding: 5px 5px;
        }

        .flightLogo2 {
            width: 100%;
            height: 16px;
            display: block;
            position: absolute;
            top: 21px;
            left: -3px;
            background: url(https://bd.flyhub.com/Content/lib/img/icons/Flight-Go-Blue.svg) no-repeat left center;
        }

        .partTwo {
            display: grid;
            grid-template-columns:  45% 10% 45%;
        }

        .card {
            margin: 15px 20px;
        }
    </style>
@endpush

@section('content')
    @include('alerts.alerts')
    <?php $tabKey = 1; ?>
    <section class="content">
        <br>

        <div class="card">
            <div class="card-header book">
                <div class="d-flex justify-content-between">
                    <div @class('card-title')>
                        Passenger Details <br>
                        <small class="text-right"> (Book &amp; Hold)</small>
                    </div>
                    <span><i class="fas fa-plus"></i></span>
                </div>
            </div>
            <div class="card-body show" id="show" style="display: block">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs bg-info" id="myTab" role="tablist" style="border-radius: 10px">
                            <?php $key = 1; ?>
{{--                            @for ($i = 0; $i <$flight->Passenger[0]->adult ; $i++)--}}
                            @for ($i = 0; $i <$flight->Passenger[0]->totalPassenger ; $i++)
                                <li class="nav-item">
                                    <a class="nav-link {{$key == 1 ? 'active':''}}" data-toggle="tab"
                                       href="#adult{{$key}}"
                                       role="tab" aria-controls="home" aria-selected="true">Passenger {{$key}}</a>
                                </li>
                                <?php $key++; ?>
                            @endfor
                        </ul>
                        <form action="{{route('flightBookNow',['company'=>$company->id])}}" id="bookNow"
                              enctype="multipart/form-data" method="post">
                            @csrf
                            <input type="hidden" name="flight" value="{{json_encode($flight) }}">
                            <input type="hidden" name="totalPrice" value="{{$flight->Prices[0]->TotalPrice}}">
                            <input type="hidden" name="totalPassenger" value="{{$flight->Passenger[0]->adult}}">
                            <input type="hidden" name="way" value="{{$way}}">
                            <div class="tab-content" id="myTabContent">
                                <?php $key = 1; ?>
{{--                                    @for ($i = 0; $i <$flight->Passenger[0]->adult ; $i++)--}}
                                @for ($i = 0; $i <$flight->Passenger[0]->totalPassenger ; $i++)
                                    <div class="tab-pane fade show {{$key == 1 ? 'active':''}}" id="adult{{$key}}"
                                         role="tabpanel"
                                         aria-labelledby="home-tab">

                                        <div class="row">
                                            <div class="col-md-6 pt-2">
                                                <div class="form-group">
                                                    <label class="booking-label" for="first_name_{{$key}}">First/Given Name</label>
                                                    <input type="text" class="form-control first_name_{{$key}}"
                                                           id="first_name_{{$key}}" name="adult[{{$key}}][name]"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-6 pt-2">
                                                <div class="form-group">
                                                    <label class="booking-label " for="Surname_of_Adult_{{$key}}">Last/Surname*</label>
                                                    <input type="text" class="form-control "
                                                           id="Surname_of_Adult_{{$key}}"
                                                           name="adult[{{$key}}][sureName]" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="booking-label" for="gender-{{$key}}">Gender*</label>
                                                    <select name="adult[{{$key}}][gender]" id="gender-{{$key}}"
                                                            class="form-control " required="">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="booking-label" for="dateOfBirth_{{$key}}">Date Of
                                                        Birth  <i data-toggle="tooltip" data-placement="bottom" title="Date of birth(Age of Adult should be 12 or above on the date of travel" class="fas fa-exclamation text-info"></i></label>
                                                    </label>
                                                    <input type="date"
                                                           @class('form-control') name="adult[{{$key}}][dateOfBirth]">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="booking-label"
                                                           for="Passport_Number_Of_Adult_{{$key}}">Passport
                                                        Number*</label>
                                                    <input type="text" class="form-control "
                                                           id="Passport_Number_Of_Adult_1"
                                                           name="adult[{{$key}}][passportNumber]" required="" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="booking-label" for="passportExpireDate-{{$key}}">Expires On
                                                        <i data-toggle="tooltip" data-placement="bottom" title="Passport Expiry should be more than Passport Expiry should be more than " class="fas fa-exclamation text-info"></i></label>
                                                    <input type="date" id="passportExpireDate-{{$key}}"
                                                           class="dateOfPassportExpiry form-control"
                                                           name="adult[{{$key}}][passportExpireDate]">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="booking-label" for="nationality-{{$key}}">Passport Nationality</label>
                                                    <select id="nationality" name="adult[{{$key}}][nationality]" class="form-control">
                                                        <option value="">Select Country</option>
                                                        @foreach($countries as $country)
                                                            <option value="{{$country->id}}">{{$country->name}} ({{$country->iso}})</option>
                                                        @endforeach
                                                    </select>
{{--                                                    <select id="nationality" name="nationality"--}}
{{--                                                            class="form-control select2-container step2-select select2"--}}
{{--                                                            data-placeholder="Mobile or Email"--}}
{{--                                                            data-ajax-url="{{ route('fetchCountry') }}" data-ajax-cache="true"--}}
{{--                                                            data-ajax-dataType="json" data-ajax-delay="200" style="width: 100%;">--}}
{{--                                                        <option>{{ old('nationality') }}</option>--}}
{{--                                                    </select>--}}
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <?php $key++; ?>
                                @endfor
                            </div>
                            <div class="form-gruop">
                                <label for="condition">
                                    <input type="checkbox" name="condition" id="condition"> I have read and agree to the Terms and Conditions
                                </label>
                            </div>


{{--                            <div class="col-12">--}}

{{--                            <fieldset>--}}
{{--                                <legend><h4><b>Booking details will be sent to</b></h4> </legend>--}}

{{--                                <div class="row">--}}
{{--                                    <div class="col-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="booking-label"--}}
{{--                                                   for="email"> Email Address</label>--}}
{{--                                            <input type="email" class="form-control "--}}
{{--                                                   id="Passport_Number_Of_Adult_1"--}}
{{--                                                   name="email" required="" placeholder="Email Address">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="booking-label"--}}
{{--                                                   for="mobile">Mobile Number</label>--}}
{{--                                            <input type="text" class="form-control "--}}
{{--                                                   id="mobile"--}}
{{--                                                   name="mobile" required="" placeholder="01712345678">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </fieldset>--}}

{{--                            </div>--}}
                            <div class="col-12">
                                <input type="submit" id="flightBookingBtn" class="btn btn-success"
                                       value="Order Ticket(s)" style="">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div id="searchData">
            @if ($way && $way='one')
                <div class="card" data-url="{{route('flightBooking',['userType'=>'agent'])}}" data-id="{{$key}}">
                    <div class="card-header segmentHeader">
                        <div class="flightImage d-flex justify-content-between airportWithCode">
                    <span class="d-flex align-items-center mx-1">
                        <img width="100px" src="http://pics.avs.io/80/50/{{$flight->Carrier[0]}}@2x.png" alt="">
                    </span>
                            <div class="d-flex flex-column  justify-content-center mx-1 justify-content-md-start">
                                <span class="airlineNameBox"> {{Str::limit($flight->Airline[0],14)}}</span>
                                <span class="spanText">
                        {{$flight->Segments[0][0]->Carrier}} {{$flight->Segments[0][0]->FlightNumber}} |
                    {{$flight->Segments[0][array_key_last($flight->Segments[0])]->Carrier}} {{$flight->Segments[0][array_key_last($flight->Segments[0])]->FlightNumber}}
                    </span>
                            </div>
                        </div>
                        <div class="">
                            <div class="flightrow d-flex justify-content-around">
                                <div class="flightdate">
                                    <h5 style="color: #0077d7" class="p-0 m-0"> {{$flight->Segments[0][0]->Origin}}
                                        <b>{{ \Carbon\Carbon::parse($flight->Segments[0][0]->DepartureTime)->format('H:m') }}</b>
                                    </h5>
                                    <span
                                        class="dateBox spanText">{{ \Carbon\Carbon::parse($flight->Segments[0][0]->DepartureTime)->format('D,d M ') }}</span>
                                    <br>
                                    <span class="cityName spanText">{{getCity($flight->Segments[0][0]->Origin)}}</span>
                                </div>
                                <div class="airTime">
                    <span
                        class="dateBox spanText">{{timestamToTimeDiffarece($flight->Segments[0][0]->DepartureTime,$flight->Segments[0][array_key_last($flight->Segments[0])]->ArrivalTime)}}</span>
                                    <br>
                                    <span class="flightLogo">

                                <span class="flightLogoBefore"></span>
                            </span> <br>
                                    <a href="javascript:void(0)" style="color: #0077d7; font-size: 10px"
                                       data-toggle="tooltip"
                                       data-placement="bottom" title="
            @if (count($flight->Segments[0]) == 2)
                                    {{getCity($flight->Segments[0][0]->Destination)}} ({{$flight->Segments[0][0]->Destination}}) {{timestamToTimeDiffarece($flight->Segments[0][0]->DepartureTime,$flight->Segments[0][array_key_last($flight->Segments[0])]->ArrivalTime)}} Layover
                    @elseif (count($flight->Segments[0]) == 1)
                                    {{timestamToTimeDiffarece($flight->Segments[0][0]->DepartureTime,$flight->Segments[0][0]->ArrivalTime)}} in {{getCity($flight->Segments[0][0]->Origin)}} ({{$flight->Segments[0][0]->Destination}})
                    @endif

                                        ">

                                        @if (count($flight->Segments[0]) == 2)
                                            One Stop via {{$flight->Segments[0][0]->Destination}}
                                        @elseif (count($flight->Segments[0]) == 1)
                                            Direct FLight in {{$flight->Segments[0][0]->Destination}}
                                        @endif


                                    </a>
                                </div>
                                <div class="airlineToRouteBox">
                                    <h5 @class('p-0 m-0') style="color: #0077d7">
                                <span class="timeBox">
                                    {{ \Carbon\Carbon::parse($flight->Segments[0][array_key_last($flight->Segments[0])]->ArrivalTime)->format('H:m') }}
                                        <span class="arrivalPlusTimeBox">+1 Day</span>
                                </span> {{$flight->Segments[0][array_key_last($flight->Segments[0])]->Destination}}
                                    </h5>
                                    <span
                                        class="dateBox spanText">{{ \Carbon\Carbon::parse($flight->Segments[0][array_key_last($flight->Segments[0])]->ArrivalTime)->format('D,d M ') }}</span>
                                    <br>
                                    <span
                                        class="cityName spanText">{{getCity($flight->Segments[0][array_key_last($flight->Segments[0])]->Destination)}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around align-items-center priceAndBook">
                            <div class="priceData mt-2">
                                <h4 class="p-0 m-0 ml-3 oldPrice grossinv strikefare ">
                                    <del>{{flight_price_to_currency($flight->Prices[0]->TotalPrice)}} {{customer_price_calculation(string_to_int($flight->Prices[0]->TotalPrice)) - 500}}</del>
                                </h4>
                                <h3 class="p-0 m-0 ">
                                    <b>{{flight_price_to_currency($flight->Prices[0]->TotalPrice)}} {{customer_price_calculation(string_to_int($flight->Prices[0]->TotalPrice)) - 500}}</b>
                                </h3>
                            </div>
                            <div class="text-right d-flex justify-content-center align-items-center">
                                <div class="">
                                    {{--                                <a href="{{route('flightDetails',['company'=>$company->id])}}" class="btn bookBtn flightDetails" data-key="{{$key}}" style="background: #0077d7">Book Now</a>--}}
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

                            </span>
                            @if ($flight->Refundable[0])
                                Refundable
                            @else
                                <span class="text-danger">Not Refundable</span>
                            @endif
                        </span>

                                <button type="button" class="flightDetailBtn" data-target="ViewFlightDetails-1">Flight
                                    Details
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="display: none; background: #fff;">
                        <ul class="nav nav-tabs tablink horizontal-scrollable" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab"
                                   href="#flightDetails_{{$tabKey}}" role="tab"
                                   aria-controls="home" aria-selected="true">Flight Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#fareSummary_{{$tabKey}}"
                                   role="tab"
                                   aria-controls="profile" aria-selected="false">Fare Summary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab"
                                   href="#discountGrossTab_{{$tabKey}}" role="tab"
                                   aria-controls="contact" aria-selected="false">Discount & Grosss</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#baggageTab_{{$tabKey}}"
                                   role="tab"
                                   aria-controls="contact" aria-selected="false">Baggage</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab"
                                   href="#cancellationTab_{{$tabKey}}" role="tab"
                                   aria-controls="contact" aria-selected="false">Cancellation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#dateChangeTab_{{$tabKey}}"
                                   role="tab"
                                   aria-controls="contact" aria-selected="false">Date Change</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="flightDetails_{{$tabKey}}" role="tabpanel">
                                <div class="fromToCityDateTimeBox">
                                    <h6 class="fromCityName">{{getCity($flight->Segments[0][0]->Origin)}} <span
                                            class="directionArrow">→</span> {{getCity($flight->Segments[0][0]->Destination)}}
                                        <span
                                            class="dateTimeBox">{{\Carbon\Carbon::parse($flight->Segments[0][0]->ArrivalTime)->format('d M Y')}}</span>
                                    </h6>
                                    @foreach($flight->Segments[0] as $key=> $segment)
                                        @if (!$loop->first)
                                            <div class="layoverTimeMainBox columnBlock">
                                                <div class="layoverTimeInnerBox d-inline-flex align-items-center">
                                                    <span class="fontSemibold textDarkBlue">Plane Change </span>&nbsp;

                                                    - {{getCity($flight->Segments[0][$key]->Origin)}}
                                                    ({{$flight->Segments[0][$key]->Origin}})
                                                    {{timestamToTimeDiffarece($flight->Segments[0][$key-1]->ArrivalTime,$flight->Segments[0][$key]->DepartureTime)}}

                                                    Layover
                                                </div>
                                            </div>
                                        @endif
                                        <div class="segmentResult"
                                             style="display: grid; grid-template-columns: 20% 70% 10%; grid-column-gap: 10px">
                                            <div class="">
                                                <div class="flightImage d-flex justify-content-lg-start ">
                                        <span class="d-flex align-items-center">
                                            <img width="50px"
                                                 src="http://pics.avs.io/122/56/{{$segment->Carrier}}@2x.png" alt="">
                                        </span>
                                                    <div class="d-flex flex-column justify-content-center"
                                                         style="padding-left: 18px;">
                                                        <span class="airlineNameBox">{{$segment->Airline}}</span>
                                                        <span
                                                            class="spanText"> {{$segment->Carrier}}{{$segment->FlightNumber}} Economy | {{$segment->Equipment}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <div class="flightdate">
                                                    <h5 style="color: #0077d7" class="p-0 m-0"> {{$segment->Origin }}
                                                        <b> {{ \Carbon\Carbon::parse($segment->DepartureTime)->format('H:m') }}</b>
                                                    </h5>
                                                    <span
                                                        class="dateBox spanText">{{ \Carbon\Carbon::parse($segment->DepartureTime)->format('D,d M') }}</span>
                                                    <br>
                                                    <span class="cityName spanText">{{getCity($segment->Origin)}}</span>
                                                </div>
                                                <div class="airTime">
                                                    <span
                                                        class="dateBox spanText">{{timestamToTimeDiffarece($segment->DepartureTime,$segment->ArrivalTime)}}</span>
                                                    <br>
                                                    <span class="flightLogo">
                                            <span class="flightLogoBefore"></span>
                                        </span>
                                                </div>
                                                <div class="airlineToRouteBox">
                                                    <h5 class="p-0 m-0" style="color: #0077d7">
                                <span class="timeBox">
                                    {{ \Carbon\Carbon::parse($segment->ArrivalTime)->format('H:m') }}

                                </span> {{$segment->Destination }}
                                                    </h5>
                                                    <span
                                                        class="dateBox spanText">{{ \Carbon\Carbon::parse($segment->ArrivalTime)->format('D,d M') }}</span>
                                                    <br>
                                                    <span
                                                        class="cityName spanText">{{getCity($segment->Destination)}}</span>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="bookingClassBox d-md-flex align-items-center">
                                                    <span class="seatIcon"></span>
                                                    {{--                                    <span class="seatType">{{$flight->Seats']}}  </span>--}}
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                            </div>
                            <div class="tab-pane fade show " id="fareSummary_{{$tabKey}}" role="tabpanel">
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
                            <div class="tab-pane fade show " id="discountGrossTab_{{$tabKey}}" role="tabpanel">
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
                            <div class="tab-pane fade show " id="baggageTab_{{$tabKey}}" role="tabpanel">
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
                            <div class="tab-pane fade show " id="cancellationTab_{{$tabKey}}" role="tabpanel">add.b.
                            </div>
                            <div class="tab-pane fade" id="dateChangeTab_{{$tabKey}}" role="tabpanel">ds...</div>
                        </div>

                    </div>
                </div>
            @else
                <div class="card" data-url="{{route('flightBooking',['userType'=>'agent'])}}" data-id="{{$key}}">
                    <div class="card-header towayHeader">
                        <div class="partOne d-flex justify-content-between">
                            <div class="d-flex logo-air">
                                <div class="flight-logo d-flex align-items-center">
                                    <img width="70px" src="http://pics.avs.io/122/56/{{$flight->Carrier[0]}}@2x.png"
                                         alt="">
                                </div>
                                <div class="flex-sm-column flex-xs-row pl-sm-2 d-flex align-items-xs-center pl-2">
                                    <span class="mr-xs-2">{{Str::limit($flight->Airline[0],14)}}</span>
                                    <span>
                         {{$flight->Segments[0][0]->Carrier}} {{$flight->Segments[0][0]->FlightNumber}} |
                    {{$flight->Segments[0][array_key_last($flight->Segments[0])]->Carrier}} {{$flight->Segments[0][array_key_last($flight->Segments[0])]->FlightNumber}}
                    </span>
                                </div>
                            </div>


                            <div class="d-flex justify-content-end text-right">
                                <div class="price">
                                    <del>{{flight_price_to_currency($flight->Prices[0]->TotalPrice)}} {{(string_to_int($flight->Prices[0]->TotalPrice) + string_to_int($flight->Prices[1]->TotalPrice)) - 1000}}</del>

                                    <h4 class="p-0 m-0">
                                        {{(string_to_int($flight->Prices[0]->TotalPrice) +
                                        string_to_int($flight->Prices[1]->TotalPrice))}}
                                    </h4>
                                </div>
                                <div class="book-btn d-flex align-items-center pl-3">
{{--                                    <a href="{{route('flightDetails',['company'=>$company->id])}}"--}}
{{--                                       class="btn bookBtn flightDetails" data-key="{{$key}}"--}}
{{--                                       style="background: #0077d7">Book Now</a>--}}
                                </div>
                            </div>

                        </div>
                        <div class="partTwo pt-2">
                            <div class="">
                                <div class="depart d-flex flex-column">
                                    Depart {{ \Carbon\Carbon::parse($flight->Segments[0][0]->ArrivalTime)->format('D,d M ') }}
                                    • {{Str::limit($flight->Airline[0],14)}}
                                </div>
                                <div class="departSegment d-flex justify-content-between pt-2">
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-0 pb-0">{{$flight->Segments[0][0]->Origin}} <span
                                                class="timeBox">{{ \Carbon\Carbon::parse($flight->Segments[0][0]->ArrivalTime)->format('H:i') }}</span>
                                        </h5>
                                        <span class="cityName">{{getCity($flight->Segments[0][0]->Origin)}}</span>
                                    </div>
                                    <div class="airTime text-center ">
                        <span class="dateBox spanText">
                            {{timestamToTimeDiffarece($flight->Segments[0][0]->DepartureTime,$flight->Segments[0][0]->ArrivalTime)}} in {{getCity($flight->Segments[0][0]->Destination)}} ({{$flight->Segments[0][0]->Destination}})
                    </span> <br>
                                        <span class="flightLogo2">
                                <span class="flightLogoBefore"></span>
                            </span> <br>
                                        <a href="javascript:void(0)" style="color: #0077d7; font-size: 10px"
                                           data-toggle="tooltip" data-placement="bottom" title=""
                                           data-original-title="@if (count($flight->Segments[0]) == 2)
                                           {{getCity($flight->Segments[0][0]->Destination)}} ({{$flight->Segments[0][0]->Destination}}) {{timestamToTimeDiffarece($flight->Segments[0][0]->DepartureTime,$flight->Segments[0][array_key_last($flight->Segments[0])]->ArrivalTime)}} Layover
                    @elseif (count($flight->Segments[0]) == 1)
                                           {{timestamToTimeDiffarece($flight->Segments[0][0]->DepartureTime,$flight->Segments[0][0]->ArrivalTime)}} in {{getCity($flight->Segments[0][0]->Origin)}} ({{$flight->Segments[0][0]->Destination}})
                    @endif
                                               ">
                                            @if (count($flight->Segments[0]) == 2)
                                                One Stop via {{$flight->Segments[0][0]->Destination}}
                                            @elseif (count($flight->Segments[0]) == 1)
                                                Direct FLight in {{$flight->Segments[0][0]->Destination}}
                                            @endif
                                        </a>
                                    </div>
                                    <div class="airlineToRouteBox">
                                        <h5 class="p-0 m-0">
                        <span class="timeBox">
                            {{\Carbon\Carbon::parse($flight->Segments[0][array_key_last($flight->Segments[0])]->ArrivalTime)->format('H:i')}}
                        </span> {{$flight->Segments[0][array_key_last($flight->Segments[0])]->Destination}}
                                        </h5>
                                        <span
                                            class="cityName">{{getCity($flight->Segments[0][array_key_last($flight->Segments[0])]->Destination)}}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-center align-items-center align-self-stretch">
                                <div class="align-self-stretch"
                                     style="border-left: 2px solid gray; border-color: #dedede"> &nbsp;
                                </div>
                            </div>
                            <div class="">
                                <div class="depart d-flex flex-column">
                                    Depart {{ \Carbon\Carbon::parse($flight->Segments[1][0]->ArrivalTime)->format('D,d M ') }}
                                    • {{Str::limit($flight->Airline[0],14)}}
                                </div>
                                <div class="departSegment d-flex justify-content-between pt-2">
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-0 pb-0">{{$flight->Segments[1][0]->Origin}} <span
                                                class="timeBox">{{ \Carbon\Carbon::parse($flight->Segments[1][0]->ArrivalTime)->format('H:i') }}</span>
                                        </h5>
                                        <span class="cityName">{{getCity($flight->Segments[1][0]->Origin)}}</span>
                                    </div>
                                    <div class="airTime text-center ">
                        <span class="dateBox spanText">
                            {{timestamToTimeDiffarece($flight->Segments[1][0]->DepartureTime,$flight->Segments[1][0]->ArrivalTime)}} in {{getCity($flight->Segments[1][0]->Destination)}} ({{$flight->Segments[1][0]->Destination}})
                    </span> <br>
                                        <span class="flightLogo2">
                                <span class="flightLogoBefore"></span>
                            </span> <br>
                                        <a href="javascript:void(0)" style="color: #0077d7; font-size: 10px"
                                           data-toggle="tooltip" data-placement="bottom" title=""
                                           data-original-title="@if (count($flight->Segments[1]) == 2)
                                           {{getCity($flight->Segments[1][0]->Destination)}} ({{$flight->Segments[1][0]->Destination}}) {{timestamToTimeDiffarece($flight->Segments[1][0]->DepartureTime,$flight->Segments[1][array_key_last($flight->Segments[1])]->ArrivalTime)}} Layover
                    @elseif (count($flight->Segments[1]) == 1)
                                           {{timestamToTimeDiffarece($flight->Segments[1][0]->DepartureTime,$flight->Segments[1][0]->ArrivalTime)}} in {{getCity($flight->Segments[1][0]->Origin)}} ({{$flight->Segments[1][0]->Destination}})
                    @endif
                                               ">
                                            @if (count($flight->Segments[1]) == 2)
                                                One Stop via {{$flight->Segments[1][0]->Destination}}
                                            @elseif (count($flight->Segments[1]) == 1)
                                                Direct FLight in {{$flight->Segments[1][0]->Destination}}
                                            @endif
                                        </a>
                                    </div>
                                    <div class="airlineToRouteBox">
                                        <h5 class="p-0 m-0">
                        <span class="timeBox">
                            {{\Carbon\Carbon::parse($flight->Segments[1][array_key_last($flight->Segments[1])]->ArrivalTime)->format('H:i')}}
                        </span> {{$flight->Segments[1][array_key_last($flight->Segments[1])]->Destination}}
                                        </h5>
                                        <span
                                            class="cityName">{{getCity($flight->Segments[1][array_key_last($flight->Segments[1])]->Destination)}}</span>
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

                            </span>
                            @if ($flight->Refundable[0])
                                Refundable
                            @else
                                <span class="text-danger">Not Refundable</span>
                            @endif
                        </span>
                                <button type="button" class="flightDetailBtn" data-target="ViewFlightDetails-1">Flight
                                    Details
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="display: none; background: #fff;">
                        <ul class="nav nav-tabs tablink horizontal-scrollable" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab"
                                   href="#flightDetails_{{$tabKey}}" role="tab"
                                   aria-controls="home" aria-selected="true">Flight Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#fareSummary_{{$tabKey}}"
                                   role="tab"
                                   aria-controls="profile" aria-selected="false">Fare Summary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab"
                                   href="#discountGrossTab_{{$tabKey}}" role="tab"
                                   aria-controls="contact" aria-selected="false">Discount & Grosss</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#baggageTab_{{$tabKey}}"
                                   role="tab"
                                   aria-controls="contact" aria-selected="false">Baggage</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab"
                                   href="#cancellationTab_{{$tabKey}}" role="tab"
                                   aria-controls="contact" aria-selected="false">Cancellation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#dateChangeTab_{{$tabKey}}"
                                   role="tab"
                                   aria-controls="contact" aria-selected="false">Date Change</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="flightDetails_{{$tabKey}}" role="tabpanel">
                                <div class="fromToCityDateTimeBox">
                                    <h6 class="fromCityName">{{getCity($flight->Segments[0][0]->Origin)}} <span
                                            class="directionArrow">→</span> {{getCity($flight->Segments[0][array_key_last($flight->Segments[0])]->Destination)}}
                                        <span
                                            class="dateTimeBox">{{\Carbon\Carbon::parse($flight->Segments[0][0]->ArrivalTime)->format('d M Y')}}</span>
                                    </h6>
                                    @foreach($flight->Segments[0] as $key=> $segment)
                                        @if (!$loop->first)
                                            <div class="layoverTimeMainBox columnBlock">
                                                <div class="layoverTimeInnerBox d-inline-flex align-items-center">
                                                    <span class="fontSemibold textDarkBlue">Plane Change </span>&nbsp;

                                                    - {{getCity($flight->Segments[0][$key]->Origin)}}
                                                    ({{$flight->Segments[0][$key]->Origin}})
                                                    {{timestamToTimeDiffarece($flight->Segments[0][$key-1]->ArrivalTime,$flight->Segments[0][$key]->DepartureTime)}}

                                                    Layover
                                                </div>
                                            </div>
                                        @endif
                                        <div class="segmentResult"
                                             style="display: grid; grid-template-columns: 20% 70% 10%; grid-column-gap: 10px">
                                            <div class="">
                                                <div class="flightImage d-flex justify-content-lg-start ">
                                        <span class="d-flex align-items-center">
                                            <img width="50px"
                                                 src="http://pics.avs.io/122/56/{{$segment->Carrier}}@2x.png" alt="">
                                        </span>
                                                    <div class="d-flex flex-column justify-content-center"
                                                         style="padding-left: 18px;">
                                                        <span class="airlineNameBox">{{$segment->Airline}}</span>
                                                        <span
                                                            class="spanText"> {{$segment->Carrier}}{{$segment->FlightNumber}} Economy | {{$segment->Equipment}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <div class="flightdate">
                                                    <h5 style="color: #0077d7" class="p-0 m-0"> {{$segment->Origin }}
                                                        <b> {{ \Carbon\Carbon::parse($segment->DepartureTime)->format('H:m') }}</b>
                                                    </h5>
                                                    <span
                                                        class="dateBox spanText">{{ \Carbon\Carbon::parse($segment->DepartureTime)->format('D,d M') }}</span>
                                                    <br>
                                                    <span
                                                        class="cityName spanText">{{getCity($segment->Origin)}}</span>
                                                </div>
                                                <div class="airTime">
                                                    <span
                                                        class="dateBox spanText">{{timestamToTimeDiffarece($segment->DepartureTime,$segment->ArrivalTime)}}</span>
                                                    <br>
                                                    <span class="flightLogo">
                                            <span class="flightLogoBefore"></span>
                                        </span>
                                                </div>
                                                <div class="airlineToRouteBox">
                                                    <h5 class="p-0 m-0" style="color: #0077d7">
                                <span class="timeBox">
                                    {{ \Carbon\Carbon::parse($segment->ArrivalTime)->format('H:m') }}

                                </span> {{$segment->Destination }}
                                                    </h5>
                                                    <span
                                                        class="dateBox spanText">{{ \Carbon\Carbon::parse($segment->ArrivalTime)->format('D,d M') }}</span>
                                                    <br>
                                                    <span
                                                        class="cityName spanText">{{getCity($segment->Destination)}}</span>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="bookingClassBox d-md-flex align-items-center">
                                                    <span class="seatIcon"></span>
                                                    {{--                                    <span class="seatType">{{$flight['Seats']}}  </span>--}}
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                                <hr>
                                <div class="fromToCityDateTimeBox">
                                    <h6 class="fromCityName">{{getCity($flight->Segments[1][0]->Origin)}} <span
                                            class="directionArrow">→</span> {{getCity($flight->Segments[1][array_key_last($flight->Segments[1])]->Destination)}}
                                        <span
                                            class="dateTimeBox">{{\Carbon\Carbon::parse($flight->Segments[1][0]->ArrivalTime)->format('d M Y')}}</span>
                                    </h6>
                                    @foreach($flight->Segments[1] as $key=> $segment)
                                        @if (!$loop->first)
                                            <div class="layoverTimeMainBox columnBlock">
                                                <div class="layoverTimeInnerBox d-inline-flex align-items-center">
                                                    <span class="fontSemibold textDarkBlue">Plane Change </span>&nbsp;

                                                    - {{getCity($flight->Segments[1][$key]->Origin)}}
                                                    ({{$flight->Segments[1][$key]->Origin}})
                                                    {{timestamToTimeDiffarece($flight->Segments[1][$key-1]->ArrivalTime,$flight->Segments[1][$key]->DepartureTime)}}

                                                    Layover
                                                </div>
                                            </div>
                                        @endif
                                        <div class="segmentResult"
                                             style="display: grid; grid-template-columns: 20% 70% 10%; grid-column-gap: 10px">
                                            <div class="">
                                                <div class="flightImage d-flex justify-content-lg-start ">
                                        <span class="d-flex align-items-center">
                                            <img width="50px"
                                                 src="http://pics.avs.io/122/56/{{$segment->Carrier}}@2x.png" alt="">
                                        </span>
                                                    <div class="d-flex flex-column justify-content-center"
                                                         style="padding-left: 18px;">
                                                        <span class="airlineNameBox">{{$segment->Airline}}</span>
                                                        <span
                                                            class="spanText"> {{$segment->Carrier}}{{$segment->FlightNumber}} Economy | {{$segment->Equipment}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <div class="flightdate">
                                                    <h5 style="color: #0077d7" class="p-0 m-0"> {{$segment->Origin }}
                                                        <b> {{ \Carbon\Carbon::parse($segment->DepartureTime)->format('H:m') }}</b>
                                                    </h5>
                                                    <span
                                                        class="dateBox spanText">{{ \Carbon\Carbon::parse($segment->DepartureTime)->format('D,d M') }}</span>
                                                    <br>
                                                    <span
                                                        class="cityName spanText">{{getCity($segment->Origin)}}</span>
                                                </div>
                                                <div class="airTime">
                                                    <span
                                                        class="dateBox spanText">{{timestamToTimeDiffarece($segment->DepartureTime,$segment->ArrivalTime)}}</span>
                                                    <br>
                                                    <span class="flightLogo">
                                            <span class="flightLogoBefore"></span>
                                        </span>
                                                </div>
                                                <div class="airlineToRouteBox">
                                                    <h5 class="p-0 m-0" style="color: #0077d7">
                                <span class="timeBox">
                                    {{ \Carbon\Carbon::parse($segment->ArrivalTime)->format('H:m') }}

                                </span> {{$segment->Destination }}
                                                    </h5>
                                                    <span
                                                        class="dateBox spanText">{{ \Carbon\Carbon::parse($segment->ArrivalTime)->format('D,d M') }}</span>
                                                    <br>
                                                    <span
                                                        class="cityName spanText">{{getCity($segment->Destination)}}</span>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="bookingClassBox d-md-flex align-items-center">
                                                    <span class="seatIcon"></span>
                                                    {{--                                    <span class="seatType">{{$flight['Seats']}}  </span>--}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="tab-pane fade show " id="fareSummary_{{$tabKey}}" role="tabpanel">
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
                            <div class="tab-pane fade show " id="discountGrossTab_{{$tabKey}}" role="tabpanel">
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
                            <div class="tab-pane fade show " id="baggageTab_{{$tabKey}}" role="tabpanel">
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
                            <div class="tab-pane fade show " id="cancellationTab_{{$tabKey}}" role="tabpanel">add.b.
                            </div>
                            <div class="tab-pane fade" id="dateChangeTab_{{$tabKey}}" role="tabpanel">ds...</div>
                        </div>

                    </div>
                </div>
            @endif


        </div>


    </section>

@endsection
@push('js')
    <script src="{{ asset('assets/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.book').click(function () {
            setTimeout(function () {
                $("#show").slideToggle();
            }, 100);

        })
    </script>
    <script>
        $(document).on('click', '.flightDetailBtn', function (e) {
            var that = $(this);
            that.closest('.card').find('.card-footer').slideToggle();
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $("#nationality").select2();
    </script>

@endpush
