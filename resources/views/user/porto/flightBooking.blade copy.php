@extends('user.porto.layouts.userLayoutMaster')
@push('css')
<link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<style>
input[type="submit"] {
    background-color: transparent;
    outline: none;
    border: none;
    color: white;
}
</style>
@endpush
@section('content')
<div role="main" class="main margin-start">
    <div class="container4">
        <div class="row" style="border-bottom: 1px solid;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <a class="btn sub-head" href="#our_story">Flights</a>
                        <a class="btn sub-head" href="#our_mission">Hotels</a>
                        <a class="btn sub-head" href="#our_service">Packages</a>

                        <a class="btn sub-head" href="#our_value">Transportation</a>

                        <a class="btn sub-head" href="#why_us">Special Deals</a>

                    </div>
                </div>
            </div>
        </div>


        <div class="row pt-4">
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
                    <div class="col-md-12">
                        <div class="card bg-color-grey w3-round-xxlarge">
                            <div class="card-body  w3-round-xxlarge tarek-card-hight" style="background-color: #ffff;">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="row">

                                            <div class="col-md-7">
                                                <div class="row">
                                                    <p class="btn btn-tarek w3-text-black">Depart</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <p class="font-weight-bold w3-text-black">
                                            {{ \Carbon\Carbon::parse($flight->start)->format('D, M y') }}<span
                                                class="pl-2 pr-2">|</span> {{ $flight->airport->countryName }} -
                                            {{ $flight->airport2->countryName }}
                                        </p>
                                    </div>

                                    <div class="col-md-5 text-right">
                                        <p class="w3-text-black"> <i class="icon-note icons"></i> <u> Change flight
                                            </u></p>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <p class="font-booking"> <span
                                                class="w3-text-black font-weight-bold">{{ \Carbon\Carbon::parse($flight->start)->format('H:m') }}</span>
                                            <br>{{ timestamToTimeDiffarece($flight->start, $flight->end) }}<br> <span
                                                class="w3-text-black font-weight-bold">{{ \Carbon\Carbon::parse($flight->end)->format('H:m') }}</span>
                                        </p>
                                    </div>

                                    <div class="col-md-5">
                                        <p class="font-booking w3-text-black"><i class="icon-plane icons w3-text-lime">
                                            </i>{{ $flight->airport->name }} Airport <br> <br> <i
                                                class="icon-plane icons w3-text-lime"></i>
                                            {{ $flight->airport2->name }} Airport
                                        </p>

                                    </div>

                                    <div class="col-md-5">
                                        <div class="row text-left">
                                            <div class="col-md-1">
                                                <i class="icon-plane icons w3-text-lime"></i>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="font-booking w3-text-black"> {{ $flight->airline->Airline }}
                                                    - {{ $flight->airline->IATA }} <br> Airbus A350
                                                    XWBEconomyIn-flight <br> <span style="border-bottom: 1px dashed;">
                                                        In-flight services</span> </p>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>


                {{-- <div class="row pt-3">
                        <div class="col-md-12">
                            <div class="card bg-color-grey w3-round-xxlarge">
                                <div class="card-body  w3-round-xxlarge tarek-card-hight" style="background-color: #ffff;">
                                    <div class="row">

                                        <div class="col-md-2">
                                            <div class="row">

                                                <div class="col-md-7">
                                                    <div class="row">
                                                        <p class="btn btn-tarek w3-text-black">Return</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <p class="font-weight-bold w3-text-black">Wed, Sep 22 <span
                                                    class="pl-2 pr-2">|</span> Hong Kong - Kuala Lumpur</p>
                                        </div>

                                        <div class="col-md-5 text-right">
                                            <p class="w3-text-black"> <i class="icon-note icons"></i> <u> Change flight
                                                </u></p>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-2 text-center">
                                            <p class="font-booking"> <span
                                                    class="w3-text-black font-weight-bold">12.45</span> <br>3h 55min <br>
                                                <span class="w3-text-black font-weight-bold">16.40</span>
                                            </p>
                                        </div>

                                        <div class="col-md-5">
                                            <p class="font-booking w3-text-black"><i class="icon-plane icons w3-text-lime">
                                                </i>HKG Hong Kong International Airport T1 <br> <br> <i
                                                    class="icon-plane icons w3-text-lime"></i> KUL Kuala Lumpur
                                                International Airport M</p>

                                        </div>

                                        <div class="col-md-5">
                                            <div class="row text-left">
                                                <div class="col-md-1">
                                                    <i class="icon-plane icons w3-text-lime"></i>
                                                </div>
                                                <div class="col-md-9">
                                                    <p class="font-booking w3-text-black"> Biman Bangladesh Airlines - AX786
                                                        <br> Airbus A350 XWBEconomyIn-flight <br> <span
                                                            style="border-bottom: 1px dashed;">In-flight services</span>
                                                    </p>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> --}}


                <div class="row pt-3">
                    <div class="col-md-12">
                        <div class="w3-round-xxlarge mt-4 pt-2 tarek-baggage-card" style="background-color: #28157A; ">

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
                        @csrf
                        <input type="hidden" name="fs" value="{{ $flight->id }}">
                        <div class="col-md-12 pt-3">
                            <div class="card bg-color-grey w3-round-xxlarge">
                                <div class="card-body  w3-round-xxlarge" style="background-color: #ffff;">
                                    <div class="row">
                                        <div class="text-left">
                                            <p class="w3-text-black font-weight-bold">Passenger</p>

                                            <p class="w3-text-black font-weight-bold">Passenger 1: Adult Ticket </p>
                                        </div>
                                    </div>
                                    <div class="row" style="border-bottom: 1px dashed; padding-bottom: 10px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="row pt-2">
                                                        <div class="col-md-12">
                                                            <div class="text-left pl-2 w3-text-yellow">
                                                                <label class="font-weight-bold"
                                                                    style="color: #28157A; font-size: 10px" for="">
                                                                    First Name</label>
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
                                                                    style="color: #28157A; font-size: 10px" for="">
                                                                    Middle Name</label>
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
                                                                    style="color: #28157A; font-size: 10px" for="">Last
                                                                    Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="text-left">
                                                                <input name="last_name" class="form-control w3-border-0"
                                                                    type="text" placeholder="Eg.Smith">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="row pt-2">
                                                        <div class="col-md-12">
                                                            <div class="text-left pl-2 w3-text-yellow">
                                                                <label class="font-weight-bold"
                                                                    style="color: #28157A; font-size: 10px" for="">
                                                                    Gender</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="text-left">
                                                                <select name="gender" id="" class="w3-border-0">
                                                                    <option value="">Select..</option>
                                                                    <option value="male" class="form-control">Male
                                                                    </option>
                                                                    <option value="female" class="form-control">
                                                                        Female
                                                                    </option>
                                                                    <option value="other" class="form-control">Other
                                                                    </option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-4">
                                                    <div class="row pt-2">
                                                        <div class="col-md-12">
                                                            <div class="text-left pl-2 w3-text-yellow">
                                                                <label class="font-weight-bold"
                                                                    style="color: #28157A; font-size: 10px" for=""> Date
                                                                    of Birth</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="text-left">
                                                                <input type="date" name="dob" class="w3-border-0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="row pt-2">
                                                        <div class="col-md-12">
                                                            <div class="text-left pl-2 w3-text-yellow">
                                                                <label class="font-weight-bold"
                                                                    style="color: #28157A; font-size: 10px"
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
                                                                {{-- <select id="nationality" name="nationality"
                                                                        class="w3-border-0 form-control user-select select2-container step2-select select2"
                                                                        data-placeholder="Select..."
                                                                        data-ajax-url="{{ route('welcome.nationalityAjax') }}"
                                                                data-ajax-cache="true" data-ajax-dataType="json"
                                                                data-ajax-delay="200" style="">
                                                                </select> --}}
                                                                <!-- <input class="form-control w3-border-0" type="text" placeholder="Type City Name"> -->
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="another"> <div class="col-md-12"><div class="row"><div class="col-md-4"><div class="row pt-2"><div class="col-md-12"><div class="text-left pl-2 w3-text-yellow"><label class="font-weight-bold"style="color: #28157A; font-size: 10px" for="">First Name</label></div></div><div class="col-md-12"><div class="text-left"><input name="first_name"class="form-control w3-border-0" type="text"placeholder="Eg.John"></div></div></div></div><div class="col-md-4"><div class="row pt-2"><div class="col-md-12"><div class="text-left pl-2 w3-text-yellow"><label class="font-weight-bold" style="color: #28157A; font-size: 10px" for=""> Middle Name</label></div></div><div class="col-md-12"><div class="text-left"><input name="middle_name"class="form-control w3-border-0" type="text"placeholder="Eg.J"></div></div></div> </div><div class="col-md-4"><div class="row pt-2"><div class="col-md-12"><div class="text-left pl-2 w3-text-yellow"><label class="font-weight-bold" style="color: #28157A; font-size: 10px" for="">Last Name</label></div></div><div class="col-md-12"><div class="text-left"><input name="last_name" class="form-control w3-border-0" type="text" placeholder="Eg.Smith"> </div> </div> </div> </div> <div class="col-md-4"> <div class="row pt-2"> <div class="col-md-12"> <div class="text-left pl-2 w3-text-yellow"> <label class="font-weight-bold" style="color: #28157A; font-size: 10px" for=""> Gender</label> </div> </div> <div class="col-md-12"> <div class="text-left"> <select name="gender" id="" class="w3-border-0"> <option value="">Select..</option> <option value="male" class="form-control">Male </option> <option value="female" class="form-control"> Female </option> <option value="other" class="form-control">Other </option> </select> </div> </div> </div> </div> <div class="col-md-4"> <div class="row pt-2"> <div class="col-md-12"> <div class="text-left pl-2 w3-text-yellow"> <label class="font-weight-bold" style="color: #28157A; font-size: 10px" for=""> Date of Birth</label> </div> </div> <div class="col-md-12"> <div class="text-left"> <input type="date" name="dob" class="w3-border-0"> </div>  </div> </div>  </div> <div class="col-md-4"><div class="row pt-2"> <div class="col-md-12"> <div class="text-left pl-2 w3-text-yellow"> <label class="font-weight-bold" style="color: #28157A; font-size: 10px" for="">Nationality</label> </div> </div> <div class="col-md-12"> <div class="text-left"> <select name="" id="" class="w3-border-0"> <option value="">Select..</option> <option value="2">Afghan</option> <option value="3">Albanian</option> <option value="4">Aland Islander</option> <option value="5">Algerian</option> </select></div></div></div></div></div></div></div></div> --}}


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
                        </div>



                        <div class="row pt-3">
                            <div class="col-md-12">
                                <div class="card bg-color-grey w3-round-xxlarge">
                                    <div class="card-body  w3-round-xxlarge"
                                        style="max-height: 250px; background-color: #ffff;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text-left">
                                                    <p class="w3-text-black font-weight-bold">Contact Details</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="border-bottom: 1px dashed; padding-bottom: 30px;">
                                            <div class="col-md-4">
                                                <div class="row pt-2">
                                                    <div class="col-md-12">
                                                        <div class="text-left">
                                                            <label class="font-weight-bold"
                                                                style="color: #28157A; font-size: 10px"
                                                                for="">Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">

                                                        <div class="text-left">
                                                            <input name="c_name" class="form-control w3-border-0"
                                                                type="text" placeholder="Eg.John">
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="row pt-2">
                                                    <div class="col-md-12">
                                                        <div class="text-left w3-text-yellow">
                                                            <label class="font-weight-bold"
                                                                style="color: #28157A; font-size: 10px;"
                                                                for="">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">

                                                        <div class="text-left">
                                                            <input name="c_email" class="form-control w3-border-0"
                                                                type="text" placeholder="Eg.jig@live.com">
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="row pt-2">
                                                    <div class="col-md-12">
                                                        <div class="text-left">
                                                            <label class="font-weight-bold"
                                                                style="color: #28157A; font-size: 10px;" for="">Phone
                                                                Number</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">

                                                        <div class="text-left">
                                                            <input name="c_phone" class="form-control w3-border-0"
                                                                type="text" placeholder="Eg. +91 9910000000">
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row pt-2">
                                            <div class="col-md-12">
                                                <div class="text-left">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" name="c_promossion"
                                                            type="checkbox"
                                                            data-msg-required="Please select at least one option."
                                                            id="inlineCheckbox1"> Contact for Promotions
                                                    </label>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row pt-3">
                            <div class="col-md-12">
                                <div class="card bg-color-grey w3-round-xxlarge">
                                    <div class="card-body  w3-round-xxlarge"
                                        style="max-height: 310px; background-color: #ffff;">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <p>I have read and agreed to the following Tripbeyond.com booking terms
                                                    and
                                                    conditions: Flight Booking Policies, Privacy Statement.</p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row w3-round-xxlarge"
                                                    style="background-color: #28157A; min-height: 40px;">
                                                    <div class="col-md-12 pt-2">
                                                        <input type="submit" value="Agree & Continue">
                                                        {{-- <a class="w3-text-white" href="">Agree & Continue</a> --}}
                                                    </div>
                                                    {{-- <input type="submit" class="w3-text-white" value="Agree & Continue"> --}}

                                                </div>

                                            </div>
                                        </div>





                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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



                                            <div class="row pt-3">
                                                <div class="text-left">
                                                    <p class="w3-text-black font-weight-bold" style="font-size: 13px;">
                                                        Adult</p>
                                                </div>

                                            </div>

                                            <div class="row pt-3">
                                                <div class="text-left">
                                                    <p class="font-weight-bold" style="font-size: 13px;">Fare</p>
                                                </div>

                                            </div>

                                            <div class="row pt-3">
                                                <div class="text-left">
                                                    <p class="font-weight-bold" style="font-size: 13px;">Taxes & fees
                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-6">

                                            <div class="row pt-3">
                                                <div class="text-right">
                                                    <p>${{ $flight->price }} x 1</p>
                                                </div>

                                            </div>

                                            <div class="row pt-3">
                                                <div class="text-right">
                                                    <p>${{ $flight->price }}.70</p>
                                                </div>

                                            </div>

                                            <div class="row pt-3">
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
                                            <div class="row pt-3">
                                                <div class="text-left">
                                                    <p class="w3-text-black font-weight-bold" style="font-size: 13px;">
                                                        Coupon Code</p>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-7 w3-round-xxlarge pt-1"
                                            style="background-color: #291A6D; max-height: 30px;">

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