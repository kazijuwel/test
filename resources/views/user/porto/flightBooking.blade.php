@extends('user.porto.layouts.userLayoutMaster')
@push('css')
    <style>
        body {
            background-color: #F4F4F4 !important;
        }

        .container4 {
            max-width: 1050px;
            margin: 0 auto;
        }

    </style>
@endpush
@section('content')
    <div role="main" class="main margin-start" style="background-color: #F4F4F4">
        <div class="container4">
            <div class="row" style="border-bottom: 1px solid;">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <a class="btn" style="font-size: 14px; font-weight:500;" href="#our_story">Flights</a>
                            <a class="btn" style="font-size: 14px; font-weight:500" href="#our_mission">Hotels</a>
                            <a class="btn" style="font-size: 14px; font-weight:500"
                                href="#our_service">Packages</a>

                            <a class="btn" style="font-size: 14px; font-weight:500"
                                href="#our_value">Transportation</a>

                            <a class="btn" style="font-size: 14px; font-weight:500" href="#why_us">Special
                                Deals</a>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row pt-5 pb-2">
                <div class="col-md-12">
                    <p class="btn btn-tarek w3-round-xlarge w3-text-black">1</p>
                    <p class=" btn font-weight-bold w3-text-black">Passenger Details</p>

                    <p class="btn w3-btn-secondary w3-round-xlarge w3-text-black" style="background-color: #afb7be;">2</p>

                    <p class=" btn font-weight-bold w3-text-black">Payments</p>

                    <p class="btn w3-btn-secondary w3-round-xlarge w3-text-black" style="background-color: #afb7be;">3</p>

                    <p class=" btn font-weight-bold w3-text-black">Receipt</p>
                </div>
            </div>


            <!-- tarek-card-hight: max-height:150px; max-height:350 (1000px); max-height:450(800px) -->


            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="flight-booking-card">
                            <div>
                                <div class="topline d-flex flex-column align-items-center"><button
                                        class="tarek-btn-mini btn-tarek">Depart</button></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="text-dark" style="font-size: 11px">
                                        {{ \Carbon\Carbon::parse($flight->start)->format('H:m') }}</div>
                                    <div style="font-size: 11px">
                                        {{ timestamToTimeDiffarece($flight->start, $flight->end) }}</div>
                                    <div class="text-dark" style="font-size: 11px">
                                        {{ \Carbon\Carbon::parse($flight->end)->format('H:m') }}</div>
                                </div>
                            </div>
                            <div>
                                <div class="topline text-dark font-weight-bold" style="font-size: 12px">
                                    {{ \Carbon\Carbon::parse($flight->start)->format('D, M y') }} |
                                    {{ $flight->airport->countryName }} -
                                    {{ $flight->airport2->countryName }}</div>
                                <div class="second-grid-tarek">
                                    <div style="d-flex flex-column justify-content-between align-items-center">
                                        <div><img src="{{ asset('user/svg/flight-2.svg') }}" height="18" alt=""></div>
                                        <div class="d-flex justify-content-center">
                                            <div> <img src="{{ asset('user/svg/dotline.svg') }}" height="18" alt=""></div>
                                        </div>

                                        <div><img src="{{ asset('user/svg/flight-2.svg') }}" height="18" alt=""></div>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between">
                                        <div class="text-dark" style="font-size: 11px">{{ $flight->airport->name }}
                                            Airport</div>
                                        <div class="text-dark" style="font-size: 11px">
                                            {{ $flight->airport2->name }} Airport</div>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <div class="w3-text-black d-flex justify-content-end topline"> <i
                                        class="icon-note icons"></i> <u> Change flight
                                    </u></div>
                                <div class="third-grid-tarek">
                                    <div> <img src="{{ asset('user/svg/flight-ticket.svg') }}" height="18" alt=""></div>
                                    <div class="text-dark text-justify" style="font-size: 11px; line-height: 1.7;"> Biman
                                        Bangladesh Airlines - AX786
                                        Airbus A350 XWBEconomyIn-flight <br>
                                        <span style="border-bottom: 1px dashed;">In-flight services</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="flight-booking-card">
                            <div>
                                <div class="topline d-flex flex-column align-items-center"><button
                                        class="tarek-btn-mini btn-tarek">Return</button></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="text-dark" style="font-size: 11px">12.45</div>
                                    <div style="font-size: 11px">3h 55min</div>
                                    <div class="text-dark" style="font-size: 11px">16.40</div>
                                </div>
                            </div>
                            <div>
                                <div class="topline text-dark font-weight-bold" style="font-size: 12px">Wed, Sep 22 | Hong
                                    Kong - Kuala Lumpur</div>
                                <div class="second-grid-tarek">
                                    <div style="d-flex flex-column justify-content-between align-items-center">
                                        <div><img src="{{ asset('user/svg/flight-2.svg') }}" height="18" alt=""></div>
                                        <div class="d-flex justify-content-center">
                                            <div> <img src="{{ asset('user/svg/dotline.svg') }}" height="18" alt="">
                                            </div>
                                        </div>

                                        <div><img src="{{ asset('user/svg/flight-2.svg') }}" height="18" alt=""></div>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between">
                                        <div class="text-dark" style="font-size: 11px">HKG Hong Kong International
                                            Airport T1</div>
                                        <div class="text-dark" style="font-size: 11px">KUL Kuala Lumpur International
                                            Airport M</div>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <div class="w3-text-black d-flex justify-content-end topline"> <i
                                        class="icon-note icons"></i> <u> Change flight
                                    </u></div>
                                <div class="third-grid-tarek">
                                    <div> <img src="{{ asset('user/svg/flight-ticket.svg') }}" height="18" alt=""></div>
                                    <div class="text-dark text-justify" style="font-size: 11px; line-height: 1.7;"> Biman
                                        Bangladesh Airlines - AX786
                                        Airbus A350 XWBEconomyIn-flight <br>
                                        <span style="border-bottom: 1px dashed;">In-flight services</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row pt-3">
                        <div class="col-md-12">
                            <div class="w3-round-xxlarge mt-4 pt-2 tarek-baggage-card" style="background-color: #151B49; ">
                                <p class=" btn font-weight-bold w3-text-white"> <i class="icon-bag icons pr-2"></i> Baggage
                                    Details</p>
                                <p class=" btn font-weight-bold w3-text-white">Cancellation Fee</p>
                                <p class=" btn font-weight-bold w3-text-white"> <i class="icon-check icons pr-2"></i> Other
                                    T&C’S</p>
                                <p class=" btn font-weight-bold w3-text-white"> <i class="fa fa-wheelchair pr-2"></i>
                                    Special assistance</p>
                            </div>
                        </div>
                        <form action="{{ route('welcome.createFlightTicket') }}" method="POST">
                            <div class="col-md-12 pt-3">
                                <div class="card bg-color-grey w3-round-xxlarge">
                                    <form action="{{ route('welcome.createFlightTicket') }}" method="POST">
                                        @csrf
                                        <div class="card-body  w3-round-xxlarge" style="background-color: #ffff;">

                                            <div class="row">
                                                <div class="text-left">
                                                    <p class="w3-text-black font-weight-bold" style="font-size: 14px">
                                                        Passenger
                                                    </p>

                                                    <p class="w3-text-black font-weight-bold" style="font-size: 14px">
                                                        Passenger
                                                        1:
                                                        Adult Ticket </p>
                                                </div>
                                            </div>
                                            <div class="row"
                                                style="border-bottom: 1px dashed; padding-bottom: 10px;">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="row pt-2">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 w3-text-yellow">
                                                                        <label class="font-weight-bold"
                                                                            style="color: #151B49; font-size: 11px" for="">
                                                                            First
                                                                            Name</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left">
                                                                        <input name="first_name"
                                                                            class="form-control w3-border-0" type="text"
                                                                            placeholder="Eg.John">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row pt-2">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 w3-text-yellow">
                                                                        <label class="font-weight-bold"
                                                                            style="color: #151B49; font-size: 11px" for="">
                                                                            Middle
                                                                            Name</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left">
                                                                        <input name="middle_name"
                                                                            class="form-control w3-border-0" type="text"
                                                                            placeholder="Eg.J">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row pt-2">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 w3-text-yellow">
                                                                        <label class="font-weight-bold"
                                                                            style="color: #151B49; font-size: 11px"
                                                                            for="">Last
                                                                            Name</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left">
                                                                        <input name="last_name"
                                                                            class="form-control w3-border-0" type="text"
                                                                            placeholder="Eg.Smith">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row pt-2">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 w3-text-yellow">
                                                                        <label class="font-weight-bold"
                                                                            style="color: #151B49; font-size: 11px" for="">
                                                                            Gender</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left">
                                                                        <select name="gender" id="" class="w3-border-0">
                                                                            <option value="">Select..</option>
                                                                            <option value="male" class="form-control">
                                                                                Male
                                                                            </option>
                                                                            <option value="female" class="form-control">
                                                                                Female
                                                                            </option>
                                                                            <option value="other" class="form-control">
                                                                                Other
                                                                            </option>
                                                                        </select>
                                                                        <!-- <input class="form-control w3-border-0" type="text" placeholder="Type City Name"> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row pt-2">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 w3-text-yellow">
                                                                        <label class="font-weight-bold"
                                                                            style="color: #151B49; font-size: 11px" for="">
                                                                            Date
                                                                            of
                                                                            Birth</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left">
                                                                        {{-- <select name="" id="" class="w3-border-0">
                                                                        <option value="">Select..</option>
                                                                    </select> --}}
                                                                        <input class="form-control w3-border-0" name="dob"
                                                                            type="date" placeholder="Type City Name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row pt-2">
                                                                <div class="col-md-12">
                                                                    <div class="text-left pl-2 w3-text-yellow">
                                                                        <label class="font-weight-bold"
                                                                            style="color: #151B49; font-size: 11px"
                                                                            for="">Nationality</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="text-left">
                                                                        <select name="" id="" class="w3-border-0">
                                                                            <option value="">Select..</option>
                                                                            <option value="2">Afghan</option>
                                                                            <option value="3">Albanian</option>
                                                                            <option value="4">Aland Islander</option>
                                                                            <option value="5">Algerian</option>
                                                                        </select>
                                                                        <!-- <input class="form-control w3-border-0" type="text" placeholder="Type City Name"> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pt-3">
                                                <div class="col-md-12">
                                                    <div class="text-left">
                                                        <a class="btn btn-tarek2 w3-round-xxlarge" href=""> Add
                                                            Passenger</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>

                            <div class="col-md-12 pt-3">
                                <div class="card bg-color-grey w3-round-xxlarge">
                                    <div class="card-body  w3-round-xxlarge"
                                        style="max-height: 250px; background-color: #ffff;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text-left">
                                                    <p class="w3-text-black font-weight-bold" style="font-size: 14px">
                                                        Contact
                                                        Details</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"
                                            style="border-bottom: 1px dashed; padding-bottom: 30px;">
                                            <div class="col-md-4">
                                                <div class="row pt-2">
                                                    <div class="col-md-12">
                                                        <div class="text-left">
                                                            <label class="font-weight-bold"
                                                                style="color: #151B49; font-size: 11px" for="">Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="text-left">
                                                            <input class="form-control w3-border-0" type="text"
                                                                placeholder="Eg.John">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row pt-2">
                                                    <div class="col-md-12">
                                                        <div class="text-left w3-text-yellow">
                                                            <label class="font-weight-bold"
                                                                style="color: #151B49; font-size: 11px;"
                                                                for="">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="text-left">
                                                            <input class="form-control w3-border-0" type="text"
                                                                placeholder="Eg.jig@live.com">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row pt-2">
                                                    <div class="col-md-12">
                                                        <div class="text-left">
                                                            <label class="font-weight-bold"
                                                                style="color: #151B49; font-size: 11px;" for="">Phone
                                                                Number</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="text-left">
                                                            <input class="form-control w3-border-0" type="text"
                                                                placeholder="Eg. +91 9910000000">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-md-12">
                                                <div class="text-left">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" name="checkboxes[]" type="checkbox"
                                                            data-msg-required="Please select at least one option."
                                                            id="inlineCheckbox1" value="option1"> <span
                                                            style="font-size:12px">Contact for Promotions</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 pt-3">
                                <div class="card bg-color-grey w3-round-xxlarge">
                                    <div class="card-body  w3-round-xxlarge"
                                        style="max-height: 310px; background-color: #ffff;">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <p style="font-size: 12px; font-weight:400;word-spacing: 5px;">I have read
                                                    and
                                                    agreed to the following Tripbeyond.com booking terms and
                                                    conditions: Flight Booking Policies, Privacy Statement.</p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row w3-round-xxlarge"
                                                    style="background-color: #151B49; min-height: 40px;">
                                                    <div class="col-md-12 pt-2">
                                                        <input type="submit" class="text-white"
                                                            style="background-color: #151B49; border: 0"
                                                            value="Agree & Continue">
                                                        {{-- <a class="w3-text-white" href=""></a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bg-color-grey w3-round-xxlarge">
                                <div class="card-body  w3-round-xxlarge" style="background-color: #ffff;">
                                    <div class="row" style="border-bottom: 1px dashed;">
                                        <div class="text-left">
                                            <p class="w3-text-black font-weight-bold" style="font-size: 13px;">Price
                                                Details</p>
                                        </div>
                                    </div>
                                    <div class="row" style="border-bottom: 1px dashed;">
                                        <div class="col-sm-6">
                                            <div class="row pt-4">
                                                <div class="text-left">
                                                    <p class="w3-text-black font-weight-bold" style="font-size: 13px;">
                                                        Adult</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-left">
                                                    <p class="font-weight-bold" style="font-size: 13px;">Fare</p>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="text-left">
                                                    <p class="font-weight-bold" style="font-size: 13px;">Taxes & fees </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row pt-4">
                                                <div class="text-right">
                                                    <p>${{ $flight->price }} x 1</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-right">
                                                    <p>${{ $flight->price }}.70</p>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="text-right">
                                                    <p>{{ $tax = 30.5 }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row pt-3">
                                                <div class="text-left">
                                                    <p class="w3-text-black font-weight-bold" style="font-size: 13px;">
                                                        Total</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row pt-3">
                                                <div class="text-right">
                                                    <p class="w3-text-black font-weight-bold" style="font-size: 13px;">
                                                        ${{ $flight->price + $tax }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="row pt-2">
                                                <div class="text-left">
                                                    <p class="w3-text-black font-weight-bold" style="font-size: 13px;">
                                                        Coupon Code</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 w3-round-xxlarge pt-1"
                                            style="background-color: #151B49; max-height: 30px;">

                                            <div class="text-right">
                                                <p class="text-warning pt-1 w3-small">Apply</p>
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
        <div class="container pt-5">
            <div class="row text-center">
                <div class="col">
                    <div class="blog-posts">

                        <article class="post post-medium btn btn-rounded">
                            <div class="post-image">
                                <a href="#">
                                    <img src="img/ios.png"
                                        class="img-fluid img-thumbnail-no-borders rounded-5 border-curve" alt="" />
                                </a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('js')
        <script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>

        <script>
            $(document).ready(function() {

                // $('.select2').select2({
                //     theme: 'bootstrap4'
                // });

                $('.select2').select2({
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
                                obj.text = obj.nationality;
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
