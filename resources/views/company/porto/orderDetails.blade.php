@extends('company.layouts.companyMaster')

@push('css')
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
            grid-column-gap: 10px ";
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
                grid-column-gap: 10px ";
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
    <section class="content">
        <br>
        <div class="col-sm-12">
            @include('alerts.alerts')
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="card">
                    <div class="card-header">
                        <h3>Order Details</h3>
                        @if ($order->company)
                            <a href="{{ route('admin.companyDetails', $order->company_id) }}"><span
                                    class="badge badge-success">{{ $order->company->company_code }}</span></a>

                        @endif
                    </div>
                </div>

                <div class="card card-widget">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-briefcase text-primary"></i> <span class="badge badge-light">
                           Agent Order History ({{$order->id}})
                        </span>
                        </h3>
                    </div>
                    <div class="card-body" style="white-space: nowrap;">
                      <div class="d-flex justify-content-between">
                          <div class="departsFlight">
                              <p><b>Agent Id</b>: {{$order->user_id}}</p>
                              <p> <b>Origin</b>: {{ getCity(json_decode($order->segments)[0][0]->Origin)}} ({{json_decode($order->segments)[0][0]->Origin}})</p>
                              <p><b>Destination</b>: {{ getCity(json_decode($order->segments)[0][array_key_last(json_decode($order->segments)[0])]->Destination)}}({{json_decode($order->segments)[0][array_key_last(json_decode($order->segments)[0])]->Destination}})</p>
                              <p><b>DepartureTime</b>: {{ flighDateTime(json_decode($order->segments)[0][0]->DepartureTime)}} </p>
                              <p> <b>ArrivalTime</b>: {{ flighDateTime(json_decode($order->segments)[0][array_key_last(json_decode($order->segments)[0])]->ArrivalTime)}}</p>
                              <p><b>Total Price</b>: {{ json_decode($order->prices)[0]->TotalPrice}}</p>
                              <p><b>Base Price</b>: {{ json_decode($order->prices)[0]->BasePrice}}</p>
                              <p><b>Total Passenger</b>: {{ $order->passengerCount()}}</p>
                              <p> <b>Taxes</b>: {{ json_decode($order->prices)[0]->Taxes}}</p>
                              <p> <b>Total Price</b>: {{flight_price_to_currency(json_decode($order->prices)[0]->TotalPrice). string_to_int(json_decode($order->prices)[0]->TotalPrice) * $order->passengerCount()}}</p>

                              <p><b>Airline Name</b>: {{ json_decode($order->airline)[0]}}</p>
                              <p><b>Refundable</b>:
                                  @if (json_decode($order->refundable)[0])
                                      <span class="badge badge-success">Refundable</span>
                                  @else
                                      <span class="badge badge-danger">No Refundable</span>
                                  @endif
                              </p>
                              <p><b>status</b>: {{$order->status}}</p>
                              <p>@if ($order->ticket)
                                      <a href="{{asset('storage/ticket/') ."/". $order->ticket}}" @class('badge badge-success')>Download Ticket</a>
                                  @endif</p>
                              <p>
                          </div>
                          @if ($order->return_flight)
                          <div class="ReturnFlight">
                              <p><b>Agent Id</b>: {{$order->user_id}}</p>
                              <p> <b>Origin</b>: {{ getCity(json_decode($order->segments)[1][0]->Origin)}} ({{json_decode($order->segments)[1][0]->Origin}})</p>
                              <p><b>Destination</b>: {{ getCity(json_decode($order->segments)[1][array_key_last(json_decode($order->segments)[1])]->Destination)}}({{json_decode($order->segments)[1][array_key_last(json_decode($order->segments)[1])]->Destination}})</p>
                              <p><b>DepartureTime</b>: {{ flighDateTime(json_decode($order->segments)[1][0]->DepartureTime)}} </p>
                              <p> <b>ArrivalTime</b>: {{ flighDateTime(json_decode($order->segments)[1][array_key_last(json_decode($order->segments)[1])]->ArrivalTime)}}</p>
                              <p><b>Total Price</b>: {{ json_decode($order->prices)[1]->TotalPrice}}</p>
                              <p><b>Base Price</b>: {{ json_decode($order->prices)[1]->BasePrice}}</p>
                              <p><b>Total Passenger</b>: {{ $order->passengerCount()}}</p>
                              <p> <b>Taxes</b>: {{ json_decode($order->prices)[1]->Taxes}}</p>
                              <p> <b>Total Price</b>: {{flight_price_to_currency(json_decode($order->prices)[1]->TotalPrice). string_to_int(json_decode($order->prices)[1]->TotalPrice) * $order->passengerCount()}}</p>

                              <p><b>Airline Name</b>: {{ json_decode($order->airline)[1]}}</p>
                              <p><b>Refundable</b>:
                                  @if (json_decode($order->refundable)[1])
                                      <span class="badge badge-success">Refundable</span>
                                  @else
                                      <span class="badge badge-danger">No Refundable</span>
                                  @endif
                              </p>
                              <p><b>status</b>: {{$order->status}}</p>
                              <p>@if ($order->return_ticket)
                                      <a href="{{asset('storage/ticket/') ."/". $order->return_ticket}}" @class('badge badge-success')>Download Ticket</a>
                                  @endif</p>
                              <p>
                          </div>
                          @endif
                      </div>
                            <span class="btn btn-success segments">Segments</span>
                            <span class="btn btn-info passengers">Passengers</span>
                        </p>

                    </div>

                    <div class="card passengersView" style="display: none">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs bg-outline-info" id="myTab" role="tablist">
                                        <?php $key = 1; ?>
                                        @foreach($order->passenger as $passenger)
                                            <li class="nav-item">
                                                <a class="nav-link {{$key == 1 ? 'active':''}}"  data-toggle="tab" href="#passenger{{$key}}"
                                                   role="tab" aria-controls="home" aria-selected="true">Passenger {{$key}}</a>
                                            </li>
                                            <?php $key++; ?>
                                        @endforeach

                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <?php $key = 1; ?>
                                        @foreach ($order->passenger as $passenger)
                                            <div class="tab-pane fade show {{$key == 1 ? 'active':''}}" id="passenger{{$key}}" role="tabpanel"
                                                 aria-labelledby="home-tab">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>First name</th>
                                                        <td>{{$passenger->first_name}}</td>
                                                    </tr><tr>
                                                        <th>Sure name</th>
                                                        <td>{{$passenger->sure_name}}</td>
                                                    </tr><tr>
                                                        <th>Date Or Birth</th>
                                                        <td>{{$passenger->dob}}</td>
                                                    </tr><tr>
                                                        <th>Gender</th>
                                                        <td>{{$passenger->gender}}</td>
                                                    </tr>
                                                   <tr>
                                                        <th>Passport Number</th>
                                                        <td>{{$passenger->passport_number}}</td>
                                                    </tr><tr>
                                                        <th>Passport Expire Date</th>
                                                        <td>{{$passenger->passport_expire_date}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nationality</th>
                                                        <td>{{$passenger->country ? $passenger->country->name : ''}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <?php $key++; ?>
                                        @endforeach

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card segmentsView" style="display: none">
                       <div class="card-footer">
                           @if ($order->return_flight)
                               <div class="fromToCityDateTimeBox">
                                   <h6 class="fromCityName">{{getCity(json_decode($order->segments)[0][0]->Origin)}} <span
                                           class="directionArrow">→</span> {{getCity(json_decode($order->segments)[0][array_key_last(json_decode($order->segments)[0])]->Destination)}}
                                       <span
                                           class="dateTimeBox">{{\Carbon\Carbon::parse(json_decode($order->segments)[0][0]->ArrivalTime)->format('d M Y')}}</span>
                                   </h6>
                                   @foreach(json_decode($order->segments)[0] as $key=> $segment)
                                       @if (!$loop->first)
                                           <div class="layoverTimeMainBox columnBlock">
                                               <div class="layoverTimeInnerBox d-inline-flex align-items-center">
                                                   <span class="fontSemibold textDarkBlue">Plane Change </span>&nbsp;

                                                   - {{getCity(json_decode($order->segments)[0][$key]->Origin)}}
                                                   ({{json_decode($order->segments)[0][$key]->Origin}})
                                                   {{timestamToTimeDiffarece(json_decode($order->segments)[0][$key-1]->ArrivalTime,json_decode($order->segments)[0][$key]->DepartureTime)}}

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
                               <hr style="border-bottom: 1px solid gray;">
                               <div class="fromToCityDateTimeBox">
                                   <h6 class="fromCityName">{{getCity(json_decode($order->segments)[1][0]->Origin)}} <span
                                           class="directionArrow">→</span> {{getCity(json_decode($order->segments)[1][array_key_last(json_decode($order->segments)[1])]->Destination)}}
                                       <span
                                           class="dateTimeBox">{{\Carbon\Carbon::parse(json_decode($order->segments)[1][0]->ArrivalTime)->format('d M Y')}}</span>
                                   </h6>
                                   @foreach(json_decode($order->segments)[1] as $key=> $segment)
                                       @if (!$loop->first)
                                           <div class="layoverTimeMainBox columnBlock">
                                               <div class="layoverTimeInnerBox d-inline-flex align-items-center">
                                                   <span class="fontSemibold textDarkBlue">Plane Change </span>&nbsp;

                                                   - {{getCity(json_decode($order->segments)[1][$key]->Origin)}}
                                                   ({{json_decode($order->segments)[1][$key]->Origin}})
                                                   {{timestamToTimeDiffarece(json_decode($order->segments)[1][$key-1]->ArrivalTime,json_decode($order->segments)[1][$key]->DepartureTime)}}

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
                           @else
                               <div class="fromToCityDateTimeBox">
                                   <h6 class="fromCityName">{{getCity(json_decode($order->segments)[0][0]->Origin)}} <span
                                           class="directionArrow">→</span> {{getCity(json_decode($order->segments)[0][array_key_last(json_decode($order->segments)[0])]->Destination)}}
                                       <span
                                           class="dateTimeBox">{{\Carbon\Carbon::parse(json_decode($order->segments)[0][0]->ArrivalTime)->format('d M Y')}}</span>
                                   </h6>
                                   @foreach(json_decode($order->segments)[0] as $key=> $segment)
                                       @if (!$loop->first)
                                           <div class="layoverTimeMainBox columnBlock">
                                               <div class="layoverTimeInnerBox d-inline-flex align-items-center">
                                                   <span class="fontSemibold textDarkBlue">Plane Change </span>&nbsp;

                                                   - {{getCity(json_decode($order->segments)[0][$key]->Origin)}}
                                                   ({{json_decode($order->segments)[0][$key]->Origin}})
                                                   {{timestamToTimeDiffarece(json_decode($order->segments)[0][$key-1]->ArrivalTime,json_decode($order->segments)[0][$key]->DepartureTime)}}

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
                           @endif
                       </div>

                    </div>

                </div>

            </div><!-- /.container-fluid -->
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.segments').click(function (){
            $('.passengersView').slideUp();
            $('.segmentsView').slideToggle();
        });
        $('.passengers').click(function (){
            $('.segmentsView').slideUp();
            $('.passengersView').slideToggle();
        });
    </script>
@endpush
