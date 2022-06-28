
    <div class="col-md-12">
        <div class="card w3-round-xxlarge">
            <div class="card-body w3-round-xxlarge w3-white">
                <div class="flight-ticket-search">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ asset('user/svg/flight-ticket.svg') }}" height="18"
                                     alt="">
                            </div>
                            <div class="col-md-12">

                                <div class="text-dark cardp py-1"
                                     style="font-size: 9px; font-weight:700;">
                                    {{$flight['Airline']}}
                                </div>
                                <div class="text-dark cardp py-1"
                                     style="font-size: 9px; font-weight:700;">Flight No.
                                    {{$flight['Segments'][0]['FlightNumber']}}
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="  pt-2">
                        <div class="row d-flex flex-column justify-content-around">

                            <div class="cardp" style="font-size: 11px;"> <span
                                    class="sub-head font-weight-bold text-dark">
{{--                                    {{$from->Name}}--}}
                                                            ({{$flight['Segments'][0]['Origin']}})</span> </div>

                            <div class="text-dark cardp py-1" style="font-size: 10px;">
                                10:20
                            </div>
                            <div class="text-dark cardp py-1"
                                 style="font-size: 10px; font-weight:600;">
                                                        <span class="text-dark">
                                                           {{$flight['Segments'][0]['DepartureTime']}}
                                                        </span>
                            </div>
                        </div>
                    </div>
                    <div class=" pt-2">
                        <div class="row d-flex flex-column justify-content-around">

                            <div class="cardp" style="font-size: 11px;"> <span
                                    class="sub-head text-dark font-weight-bold">
{{--                                                            {{$to->Name}}--}}
                                    ({{$flight['Segments'][array_key_last($flight['Segments'])]['Destination']}}) </span>
                            </div>
                            <div class="text-dark cardp py-1" style="font-size: 10px;">
                                20:10
                            </div>
                            <div class="text-dark cardp py-1"
                                 style="font-size: 10px; font-weight:600;">
                                {{$flight['Segments'][array_key_last($flight['Segments'])]['ArrivalTime']}}
                            </div>
                        </div>
                    </div>


                    <div class=" pt-2">
                        <div class="row d-flex flex-column justify-content-around">

                            <div class="cardp" style="font-size: 11px;"> <span
                                    class="sub-head text-dark font-weight-bold">
                                                            250
                                                        </span>
                            </div>
                            <div class="text-dark cardp py-1" style="font-size: 10px;">
                                @if (count($flight['Segments']) == 2)
                                    Two Stop
                                @elseif (count($flight['Segments']) == 3)
                                    Three Stop
                                    @else
                                    One Stop
                                @endif

                            </div>
                            <div class="text-dark cardp py-1"
                                 style="font-size: 10px; font-weight:600;">
                                Seats Left : <span class="text-warning"> {{$flight['Seats']}} </span>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <div class="font-weight-bold">{{$flight['Prices']['TotalPrice']}} </div>
                        <div class="btn btn-tarek font-weight-bold btn-rounded bookNow"
                             data-url="{{route('flightBooking',['userType'=>'customer'])}}"
                             data-id="{{$key}}"
                        >
                            Book
                            Now</div>
{{--                        <div class="btn btn-tarek font-weight-bold btn-rounded bookNow"--}}
{{--                             data-url="{{route('flightDetalis',['userType'=>'customer'])}}"--}}
{{--                             data-id="{{$key}}"--}}
{{--                        >--}}
{{--                           Details</div>--}}
                        <div style="font-size: 11px;">
                            @if ($flight['Refundable'])
                                Refundable
                                @else
                                Not Refundable
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

