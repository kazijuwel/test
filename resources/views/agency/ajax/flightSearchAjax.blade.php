<div class="card" data-url="{{route('flightBooking',['userType'=>'agent'])}}" data-id="{{$key}}">
    <div class="card-header segmentHeader">
        <div class="flightImage d-flex justify-content-between airportWithCode">
                    <span class="d-flex align-items-center mx-1">
                        <img width="100px" src="http://pics.avs.io/80/50/{{$flight['Carrier'][0]}}@2x.png" alt="">
                    </span>
            <div class="d-flex flex-column  justify-content-center mx-1 justify-content-md-start">
                <span class="airlineNameBox"> {{Str::limit($flight['Airline'][0],14)}}</span>
                <span class="spanText">
                        {{$flight['Segments'][0][0]['Carrier']}} {{$flight['Segments'][0][0]['FlightNumber']}} |
                    {{$flight['Segments'][0][array_key_last($flight['Segments'][0])]['Carrier']}} {{$flight['Segments'][0][array_key_last($flight['Segments'][0])]['FlightNumber']}}
                    </span>
            </div>
        </div>
        <div class="">
            <div class="flightrow d-flex justify-content-around">
                <div class="flightdate">
                    <h5 style="color: #0077d7" class="p-0 m-0"> {{$flight['Segments'][0][0]['Origin']}}
                        <b>{{ \Carbon\Carbon::parse($flight['Segments'][0][0]['DepartureTime'])->format('H:m') }}</b></h5>
                    <span
                        class="dateBox spanText">{{ \Carbon\Carbon::parse($flight['Segments'][0][0]['DepartureTime'])->format('D,d M ') }}</span>
                    <br>
                    <span class="cityName spanText">{{getCity($flight['Segments'][0][0]['Origin'])}}</span>
                </div>
                <div class="airTime">
                    <span
                        class="dateBox spanText">{{timestamToTimeDiffarece($flight['Segments'][0][0]['DepartureTime'],$flight['Segments'][0][array_key_last($flight['Segments'][0])]['ArrivalTime'])}}</span>
                    <br>
                    <span class="flightLogo">

                                <span class="flightLogoBefore"></span>
                            </span> <br>
                    <a href="javascript:void(0)" style="color: #0077d7; font-size: 10px" data-toggle="tooltip"
                       data-placement="bottom" title="
            @if (count($flight['Segments'][0]) == 2)
                    {{getCity($flight['Segments'][0][0]['Destination'])}} ({{$flight['Segments'][0][0]['Destination']}}) {{timestamToTimeDiffarece($flight['Segments'][0][0]['DepartureTime'],$flight['Segments'][0][array_key_last($flight['Segments'][0])]['ArrivalTime'])}} Layover
                    @elseif (count($flight['Segments'][0]) == 1)
                    {{timestamToTimeDiffarece($flight['Segments'][0][0]['DepartureTime'],$flight['Segments'][0][0]['ArrivalTime'])}} in {{getCity($flight['Segments'][0][0]['Origin'])}} ({{$flight['Segments'][0][0]['Destination']}})
                    @endif

                        ">

                        @if (count($flight['Segments'][0]) == 2)
                            One Stop via {{$flight['Segments'][0][0]['Destination']}}
                        @elseif (count($flight['Segments'][0]) == 1)
                            Direct FLight in {{$flight['Segments'][0][0]['Destination']}}
                        @endif


                    </a>
                </div>
                <div class="airlineToRouteBox">
                    <h5 @class('p-0 m-0') style="color: #0077d7">
                                <span class="timeBox">
                                    {{ \Carbon\Carbon::parse($flight['Segments'][0][array_key_last($flight['Segments'][0])]['ArrivalTime'])->format('H:m') }}
                                        <span class="arrivalPlusTimeBox">+1 Day</span>
                                </span> {{$flight['Segments'][0][array_key_last($flight['Segments'][0])]['Destination']}}
                    </h5>
                    <span class="dateBox spanText">{{ \Carbon\Carbon::parse($flight['Segments'][0][array_key_last($flight['Segments'][0])]['ArrivalTime'])->format('D,d M ') }}</span> <br>
                    <span class="cityName spanText">{{getCity($flight['Segments'][0][array_key_last($flight['Segments'][0])]['Destination'])}}</span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around align-items-center priceAndBook">
            <div class="priceData mt-2">
                <h4 class="p-0 m-0 ml-3 oldPrice grossinv strikefare ">

                    <del>{{flight_price_to_currency($flight['Prices'][0]['TotalPrice'])}} {{customer_price_calculation(string_to_int($flight['Prices'][0]['TotalPrice'])) - 500}}</del>
                </h4>
                <h3 class="p-0 m-0 "><b>{{flight_price_to_currency($flight['Prices'][0]['TotalPrice'])}} {{customer_price_calculation(string_to_int($flight['Prices'][0]['TotalPrice'])) - 500}}</b></h3>
            </div>
            <div class="text-right d-flex justify-content-center align-items-center">
                <div class="">
                    <a href="{{route('flightDetails',['company'=>$company->id,'way'=>'one'])}}" class="btn bookBtn flightDetails" data-key="{{$key}}" style="background: #0077d7">Book Now</a>
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
                            @if ($flight['Refundable'][0])
                                Refundable
                            @else
                                <span class="text-danger">Not Refundable</span>
                                @endif
                        </span>

                <button type="button" class="flightDetailBtn" data-target="ViewFlightDetails-1">Flight Details
                </button>
            </div>
        </div>
    </div>
    <div class="card-footer" style="display: none; background: #fff;">
        <ul class="nav nav-tabs tablink horizontal-scrollable" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#flightDetails_{{$tabKey}}" role="tab"
                   aria-controls="home" aria-selected="true">Flight Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#fareSummary_{{$tabKey}}" role="tab"
                   aria-controls="profile" aria-selected="false">Fare Summary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#discountGrossTab_{{$tabKey}}" role="tab"
                   aria-controls="contact" aria-selected="false">Discount & Grosss</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#baggageTab_{{$tabKey}}" role="tab"
                   aria-controls="contact" aria-selected="false">Baggage</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#cancellationTab_{{$tabKey}}" role="tab"
                   aria-controls="contact" aria-selected="false">Cancellation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#dateChangeTab_{{$tabKey}}" role="tab"
                   aria-controls="contact" aria-selected="false">Date Change</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="flightDetails_{{$tabKey}}" role="tabpanel">
                <div class="fromToCityDateTimeBox">
                    <h6 class="fromCityName">{{getCity($flight['Segments'][0][0]['Origin'])}} <span class="directionArrow">→</span> {{getCity($flight['Segments'][0][0]['Destination'])}} <span
                            class="dateTimeBox">{{\Carbon\Carbon::parse($flight['Segments'][0][0]['ArrivalTime'])->format('d M Y')}}</span></h6>
                    @foreach($flight['Segments'][0] as $key=> $segment)
                                @if (!$loop->first)
                                    <div class="layoverTimeMainBox columnBlock">
                                        <div class="layoverTimeInnerBox d-inline-flex align-items-center">
                                            <span class="fontSemibold textDarkBlue">Plane Change </span>&nbsp;

                                            - {{getCity($flight['Segments'][0][$key]['Origin'])}} ({{$flight['Segments'][0][$key]['Origin']}})
                                            {{timestamToTimeDiffarece($flight['Segments'][0][$key-1]['ArrivalTime'],$flight['Segments'][0][$key]['DepartureTime'])}}

                                            Layover
                                        </div>
                                    </div>
                                @endif
                                <div class="segmentResult"
                             style="display: grid; grid-template-columns: 20% 70% 10%; grid-column-gap: 10px">
                            <div class="">
                                <div class="flightImage d-flex justify-content-lg-start ">
                                        <span class="d-flex align-items-center">
                                            <img width="50px" src="http://pics.avs.io/122/56/{{$segment['Carrier']}}@2x.png" alt="">
                                        </span>
                                    <div class="d-flex flex-column justify-content-center" style="padding-left: 18px;">
                                        <span class="airlineNameBox">{{$segment['Airline']}}</span>
                                        <span class="spanText"> {{$segment['Carrier']}}{{$segment['FlightNumber']}} Economy | {{$segment['Equipment']}} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-around">
                                <div class="flightdate">
                                    <h5 style="color: #0077d7" class="p-0 m-0"> {{$segment['Origin'] }} <b> {{ \Carbon\Carbon::parse($segment['DepartureTime'])->format('H:m') }}</b></h5>
                                    <span class="dateBox spanText">{{ \Carbon\Carbon::parse($segment['DepartureTime'])->format('D,d M') }}</span> <br>
                                    <span class="cityName spanText">{{getCity($segment['Origin'])}}</span>
                                </div>
                                <div class="airTime">
                                    <span class="dateBox spanText">{{timestamToTimeDiffarece($segment['DepartureTime'],$segment['ArrivalTime'])}}</span> <br>
                                    <span class="flightLogo">
                                            <span class="flightLogoBefore"></span>
                                        </span>
                                </div>
                                <div class="airlineToRouteBox">
                                    <h5 class="p-0 m-0" style="color: #0077d7">
                                <span class="timeBox">
                                    {{ \Carbon\Carbon::parse($segment['ArrivalTime'])->format('H:m') }}

                                </span> {{$segment['Destination'] }}
                                    </h5>
                                    <span class="dateBox spanText">{{ \Carbon\Carbon::parse($segment['ArrivalTime'])->format('D,d M') }}</span> <br>
                                    <span class="cityName spanText">{{getCity($segment['Destination'])}}</span>
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
            <div class="tab-pane fade show " id="cancellationTab_{{$tabKey}}" role="tabpanel">add.b.</div>
            <div class="tab-pane fade" id="dateChangeTab_{{$tabKey}}" role="tabpanel">ds...</div>
        </div>

    </div>
</div>





