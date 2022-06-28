@extends('user.porto.layouts.userLayoutMaster')
@push('css')
    <link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
        input.flight_input {
            border: none;
            width: 100%;
            font-size: 14px !important;
        }

        input.flight_input:focus {
            outline: none;
        }

        input.flight_input {
            border: none;
            width: 100%;
            font-size: 14px !important;
            background-color: white;
        }

        tr {
            height: 0px;
        }

        .navbartexts span.input-group-append {
            display: none;
        }

        .select2-search--dropdown .select2-search__field {
            border: none !important;
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

        input#datepicker {
            color: black;
            padding-top: 0;
        }

        .owl-carousel .owl-nav button[class*="owl-"] {
            background-color: #151B49;
            border-color: #151B49 #151B49 #151B49;
            color: #FFF;
        }

        input#datepicker2 {
            color: black;
            padding-top: 0;
        }

        .mynav {
            display: flex;
            flex-direction: row !important;
        }

        .card-body {
            /* padding: 32px; */
            padding: 1.3rem !important;
        }

        @media only screen and (max-width: 738px) {
            .vl {
                display: none;
            }

            input.flight_input {
                width: 50%;
                text-align: center;
                padding: 0px 50px;
            }
        }

        .select2-search--dropdown .select2-search__field {
            border: none !important;
        }

        .gj-datepicker.gj-datepicker-bootstrap.gj-unselectable.input-group {
            width: 100% !important;
        }

        .owl-carousel .owl-nav button[class*="owl-"] {
            background-color: #151B49;
            border-color: #151B49 #151B49 #151B49;
            color: #FFF;
            border-radius: 50%;
        }

        a.nav-link.btn.font-weight-bold.active {
            border-bottom: 2px solid;
        }
    </style>
@endpush
@section('content')

    <div class="w3-border-bottom card-bacground3">
        <div role="main" class="tarek-container-main main margin-start card-bacground3">
            <div class="left-part pr-3">
                <div class="row">
                    <div class="col-md-12 text-left py-1 ">
                        <a class="btn font-weight-bold" href="#our_story">Flights</a>
                        <a class="btn font-weight-bold" href="#our_mission">Hotels</a>
                        <a class="btn font-weight-bold" href="#our_service">Packages</a>
                        <a class="btn font-weight-bold" href="#our_value">Transportation</a>

                        <a class="btn font-weight-bold" href="#why_us">Special Deals</a>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="card-bacground3">
        <div role="main" class="tarek-container-main main margin-start card-bacground3">
            <div class="left-part pr-3">
                <div class="row py-2">
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-9">
                                <div class="col-md-12 text-left">
                                    <ul class="nav footer-main-links row text-center">
                                        <li class="nav-item ml-2">
                                            <a class="nav-link btn font-weight-bold " href="#"
                                               style="font-size:12px; color: black;">One
                                                Way</a>
                                        </li>
                                        <li class="nav-item ml-2">
                                            <a class="nav-link btn font-weight-bold " href="#"
                                               style="font-size:12px; color: black;">Round
                                                Trip</a>
                                        </li>
                                        <li class="nav-item ml-2">
                                            <a class="nav-link btn font-weight-bold " href="#"
                                               style="font-size:12px; color: black;">Multi
                                                City</a>
                                        </li>
                                        <li class="nav-item ml-2 dropdown">
                                            <a class="nav-link dropdown-toggle btn font-weight-bold "
                                               style="font-size:12px; color: black;" href="#" id="navbarDropdown"
                                               role="button" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">
                                                Adult
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </li>
                                        <li class="nav-item ml-2 dropdown">
                                            <a class="nav-link dropdown-toggle btn font-weight-bold"
                                               style="font-size:12px; color: black;" href="#" id="navbarDropdown"
                                               role="button" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">
                                                Economy
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-3 pt-3 text-center">
                                <div class="switchbtn">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                    <p class="d-inline ml-2">Direct Flights only</p>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="card-bacground3 w3-card card border-curve2 " style="margin-bottom: -20px;">
                            <div class="card-bacground3 border-curve2  "
                                 style="background-color: #FFFFFF; height:80.7995px">

                                <form action="{{ route('airSearch',['usertype'=>'customer']) }}" method="GET">
                                    <input type="hidden" name="type" value="one-way">
                                    <div class="row pt-3">


                                        <div class="col-md-2">
                                            <div class="navbartexts ml-2">
                                            <span style="font-size: 11px;color:orange; font-weight:600" class="ml-3">
                                                From*</span>
                                                <p>
                                                    <select id="user" name="from"
                                                            class="form-control user-select select2-container step2-select select2"
                                                            data-placeholder="Select City"
                                                            data-ajax-url="{{ route('welcome.tripSearchAjax2') }}"
                                                            data-ajax-cache="true" data-ajax-dataType="json"
                                                            data-ajax-delay="200"
                                                            style="border: none !important; width:180px">

                                                        @if ($from)
                                                            <option value="{{ $from->Code }}" selected>
                                                                {{ $from->Name }}</option>
                                                        @endif

                                                    </select>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-1">
                                            <img class="pt-2" src="{{ asset('user/img/bi-direction.png') }}" alt="">
                                        </div>

                                        <div class="col-md-2">
                                            <div class="navbartexts  ml-1">
                                                <span style="font-size: 11px;color:orange; font-weight:600;">To*</span>
                                                <p>
                                                    <select id="modal-container" name="to"
                                                            class="seleect5 search form-control"
                                                            data-placeholder="Select City"
                                                            data-ajax-url="{{ route('welcome.tripSearchAjax2') }}"
                                                            data-ajax-cache="true" data-ajax-dataType="json"
                                                            data-ajax-delay="200"
                                                            style="border: none !important; width:180px">
                                                        @if ($to)
                                                            <option value="{{ $to->Code }}" selected>
                                                                {{ $to->Name }}</option>
                                                        @endif
                                                    </select>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-1">
                                            <div class="vl"></div>
                                        </div>


                                        <div class="col-md-2">
                                            <div class="navbartexts ml-2">
                                                <span
                                                    style="font-size: 11px;color:orange; font-weight:600;">Depart*</span>
                                                <p>
                                                    {{-- <input id="datepicker" value="{{ @$departs?$departs:now() }}"
                                                        name="departs" class="form-control" width="276" /> --}}
                                                    <input type="date" name="departs" value="{{ $departs }}"
                                                           class="flight_input" placeholder="Select Date"
                                                           autocomplete="off">
                                                </p>
                                            </div>
                                        </div>

                                        {{-- <input type="date"> --}}

                                        <div class="col-md-2">
                                            <div class="navbartexts">
                                                <span
                                                    style="font-size: 11px;color:orange; font-weight:600;">Return</span>
                                                <p>
                                                    <input type="date" name="return" value="{{ $return }}"
                                                           class="flight_input" placeholder="Select Date"
                                                           autocomplete="off">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center pt-2">
                                            <div class="searchbtn">
                                                <input
                                                    class="btn btn-tarek btn-lg btn-rounded tarek-search-margin font-weight-bold"
                                                    type="submit" value="Search">
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







    <div class="w3-border-bottom" style="background-color: #FFFFFF">
        <div role="main" class="tarek-container-main main margin-start card-bacground3">
            <div class="left-part" style="background-color: #FFFFFF">
                <div class="col-md-12 mt-5" style="background-color: #FFFFFF">
                    <div class="row">
                        <div class="col-lg-3">
                            <aside class="sidebar">
                                <p class="sub-head text-dark">Filter By</p>

                                <div class="row">


                                    <div class="col-md-12">
                                        <div class="row w3-round-large d-flex align-items-center"
                                             style="background-color: #151B49; height: 36.2895px; align-item: center; ">
                                            <div class="col-md-6 d-flex align-items-center text-left">
                                                <span class="sub-head text-light w3-small">No of Stops</span>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center justify-content-end">
                                                <span class="sub-head text-light w3-small">From</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table m-0" style="min-width: 100%; ">
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="stop" value="Boat">
                                                            <label style="font-size: 10px;" for="stop"> 1
                                                                Stop</label><br>
                                                        </td>
                                                        <td class="w3-small d-flex justify-content-end">$100</td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="stop" value="Boat">
                                                            <label style="font-size: 10px;" for="stop"> 2+ Stops</label><br>
                                                        </td>
                                                        <td class="w3-small d-flex justify-content-end">$50</td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>


                                    </div>


                                    <div class="col-md-12">
                                        <div class="row w3-round-large d-flex align-items-center"
                                             style="background-color: #151B49; height: 36.2895px;">
                                            <div class="col-md-6 text-left d-flex align-items-center">
                                                <span class="sub-head text-light w3-small">Airlines from</span>
                                            </div>

                                            <div
                                                class="col-md-6 text-right d-flex align-items-center justify-content-end">
                                                <span class="sub-head text-light w3-small ">From</span>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table mb-0" style="min-width: 100%;">
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="stop" value="Boat">
                                                            <label style="font-size: 10px;" for="stop"> Quatar
                                                                (5)</label><br>
                                                        </td>
                                                        <td class="w3-small d-flex justify-content-end">$100</td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="stop" value="Boat">
                                                            <label style="font-size: 10px;"
                                                                   for="stop">Emirates(10)</label><br>
                                                        </td>
                                                        <td class="w3-small d-flex justify-content-end">$50</td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>


                                    </div>


                                    <div class="col-md-12">


                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-12 w3-round-large d-flex align-items-center"
                                                 style="background-color: #151B49; height: 36.2895px;">
                                                <span class="sub-head text-light w3-small">Departure time point 1</span>
                                            </div>
                                        </div>
                                        <div class="row pt-2 pl-4">
                                            <div class="col-5 pt-1 mr-1 tarek-mini-card2">
                                                <div class="row pt-3" style="margin-top: -10px;">
                                                    <div class="col-6 text-left" style="margin-left: -15px;">

                                                        <p class="tarek-height" style="font-size: 8px; "><span
                                                                class="font-weight-bold pb-4 text-dark">Early
                                                            Morning</span> <span class="pt-5"
                                                                                 style="white-space: nowrap;">06AM-8AM</span>
                                                        </p>

                                                        <!-- <i class="fas fa-sun text-warning" ></i> -->
                                                    </div>

                                                    <div class="col-6 text-right">
                                                        <p style="font-size: 9px;"><i
                                                                class="fas fa-sun text-warning"></i>
                                                        </p>
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="col-5 pt-1 mr-1 tarek-mini-card2">

                                                <div class="row pt-3" style="margin-top: -10px;">


                                                    <div class="col-6 text-left" style="margin-left: -15px;">

                                                        <p class="tarek-height" style="font-size: 8px; "><span
                                                                class="font-weight-bold pb-4 text-dark">Early
                                                            Morning</span> <span class="pt-5"
                                                                                 style="white-space: nowrap;">06AM-8AM</span>
                                                        </p>


                                                        <!-- <i class="fas fa-sun text-warning" ></i> -->
                                                    </div>

                                                    <div class="col-6 text-right">
                                                        <p style="font-size: 9px;"><i
                                                                class="fas fa-sun text-warning"></i>
                                                        </p>
                                                    </div>


                                                </div>


                                            </div>


                                            <div class="col-5 pt-1 mr-1 mt-1 tarek-mini-card2">

                                                <div class="row pt-3" style="margin-top: -10px;">


                                                    <div class="col-6 text-left" style="margin-left: -15px;">

                                                        <p class="tarek-height" style="font-size: 8px; "><span
                                                                class="font-weight-bold pb-4 text-dark">Early
                                                            Morning</span> <span class="pt-5"
                                                                                 style="white-space: nowrap;">06AM-8AM</span>
                                                        </p>


                                                        <!-- <i class="fas fa-sun text-warning" ></i> -->
                                                    </div>

                                                    <div class="col-6 text-right">
                                                        <p style="font-size: 9px;"><i
                                                                class="fas fa-sun text-warning"></i>
                                                        </p>
                                                    </div>


                                                </div>


                                            </div>


                                            <div class="col-5 pt-1 mr-1 mt-1 tarek-mini-card2">

                                                <div class="row pt-3" style="margin-top: -10px;">


                                                    <div class="col-6 text-left" style="margin-left: -15px;">

                                                        <p class="tarek-height" style="font-size: 8px; "><span
                                                                class="font-weight-bold pb-4 text-dark">Early
                                                            Morning</span> <span class="pt-5"
                                                                                 style="white-space: nowrap;">06AM-8AM</span>
                                                        </p>


                                                        <!-- <i class="fas fa-sun text-warning" ></i> -->
                                                    </div>

                                                    <div class="col-6 text-right">
                                                        <p style="font-size: 9px;"><i
                                                                class="fas fa-sun text-warning"></i>
                                                        </p>
                                                    </div>


                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12 pt-3">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-12 w3-round-large d-flex align-items-center"
                                                 style="background-color: #151B49; height: 36.2895px;">
                                                <span class="sub-head text-light w3-small">Arrival time Point 2</span>
                                            </div>
                                        </div>
                                        <div class="row pt-2 pl-4">
                                            <div class="col-5 pt-1 mr-1 tarek-mini-card2">
                                                <div class="row pt-3" style="margin-top: -10px;">
                                                    <div class="col-6 text-left" style="margin-left: -15px;">

                                                        <p class="tarek-height" style="font-size: 8px; "><span
                                                                class="font-weight-bold pb-4 text-dark">Early
                                                            Morning</span> <span class="pt-5"
                                                                                 style="white-space: nowrap;">06AM-8AM</span>
                                                        </p>

                                                        <!-- <i class="fas fa-sun text-warning" ></i> -->
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <p style="font-size: 9px;"><i
                                                                class="fas fa-sun text-warning"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 pt-1 mr-1 tarek-mini-card2">
                                                <div class="row pt-3" style="margin-top: -10px;">
                                                    <div class="col-6 text-left" style="margin-left: -15px;">
                                                        <p class="tarek-height" style="font-size: 8px; "><span
                                                                class="font-weight-bold pb-4 text-dark">Early
                                                            Morning</span> <span class="pt-5"
                                                                                 style="white-space: nowrap;">06AM-8AM</span>
                                                        </p>
                                                        <!-- <i class="fas fa-sun text-warning" ></i> -->
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <p style="font-size: 9px;"><i
                                                                class="fas fa-sun text-warning"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 pt-1 mr-1 mt-1 tarek-mini-card2">

                                                <div class="row pt-3" style="margin-top: -10px;">


                                                    <div class="col-6 text-left" style="margin-left: -15px;">

                                                        <p class="tarek-height" style="font-size: 8px; "><span
                                                                class="font-weight-bold pb-4 text-dark">Early
                                                            Morning</span> <span class="pt-5"
                                                                                 style="white-space: nowrap;">06AM-8AM</span>
                                                        </p>


                                                        <!-- <i class="fas fa-sun text-warning" ></i> -->
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <p style="font-size: 9px;"><i
                                                                class="fas fa-sun text-warning"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 pt-1 mr-1 mt-1 tarek-mini-card2">

                                                <div class="row pt-3" style="margin-top: -10px;">


                                                    <div class="col-6 text-left" style="margin-left: -15px;">

                                                        <p class="tarek-height" style="font-size: 8px; "><span
                                                                class="font-weight-bold pb-4 text-dark">Early
                                                            Morning</span> <span class="pt-5"
                                                                                 style="white-space: nowrap;">06AM-8AM</span>
                                                        </p>


                                                        <!-- <i class="fas fa-sun text-warning" ></i> -->
                                                    </div>

                                                    <div class="col-6 text-right">
                                                        <p style="font-size: 9px;"><i
                                                                class="fas fa-sun text-warning"></i>
                                                        </p>
                                                    </div>


                                                </div>


                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </aside>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <p class="font-weight-bold text-dark">Trip Details</p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="lightbox"
                                                 data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
                                                <div class="owl-carousel owl-theme stage-margin"
                                                     data-plugin-options="{'items': 7, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
                                                    <div>

                                                        <div class="tarek-trip-date-card">

                                                            <p class="w3-text-black"
                                                               style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                                Wed, <br> <span style="white-space: nowrap;"> Sept 22
                                                            </span>
                                                            </p>
                                                            <p class="w3-small w3-text-black"
                                                               style="margin-left: -30px;">
                                                                $265
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tarek-trip-date-card">
                                                            <p class="w3-text-black"
                                                               style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                                Wed, <br> <span style="white-space: nowrap;"> Sept 22
                                                            </span>
                                                            </p>
                                                            <p class="w3-small w3-text-black"
                                                               style="margin-left: -30px;">
                                                                $265
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tarek-trip-date-card">
                                                            <p class="w3-text-black"
                                                               style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                                Wed, <br> <span style="white-space: nowrap;"> Sept 22
                                                            </span>
                                                            </p>
                                                            <p class="w3-small w3-text-black"
                                                               style="margin-left: -30px;">
                                                                $265
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tarek-trip-date-card">
                                                            <p class="w3-text-black"
                                                               style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                                Wed, <br> <span style="white-space: nowrap;"> Sept 22
                                                            </span>
                                                            </p>
                                                            <p class="w3-small w3-text-black"
                                                               style="margin-left: -30px;">
                                                                $265
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tarek-trip-date-card">
                                                            <p class="w3-text-black"
                                                               style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                                Wed, <br> <span style="white-space: nowrap;"> Sept 22
                                                            </span>
                                                            </p>
                                                            <p class="w3-small w3-text-black"
                                                               style="margin-left: -30px;">
                                                                $265
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tarek-trip-date-card">
                                                            <p class="w3-text-black"
                                                               style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                                Wed, <br> <span style="white-space: nowrap;"> Sept 22
                                                            </span>
                                                            </p>
                                                            <p class="w3-small w3-text-black"
                                                               style="margin-left: -30px;">
                                                                $265
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tarek-trip-date-card">
                                                            <p class="w3-text-black"
                                                               style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                                Wed, <br> <span style="white-space: nowrap;"> Sept 22
                                                            </span>
                                                            </p>
                                                            <p class="w3-small w3-text-black"
                                                               style="margin-left: -30px;">
                                                                $265
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tarek-trip-date-card">
                                                            <p class="w3-text-black"
                                                               style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                                Wed, <br> <span style="white-space: nowrap;"> Sept 22
                                                            </span>
                                                            </p>
                                                            <p class="w3-small w3-text-black"
                                                               style="margin-left: -30px;">
                                                                $265
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 pt-3">
                                    <p style="font-size: small;">Prices displayed include taxes and may change based on
                                        availability.
                                        You can review any additional fees before check out. Prices are not final until
                                        you
                                        complete
                                        your purchase.
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle btn sub-head w3-round-xxlarge text-light"
                                           style="font-size:12px; color: black; background-color: #151B49;" href="#"
                                           id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            Sort by
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <p class="text-weight-bold text-dark pl-2">Price</p>
                                        </div>

                                    </li>
                                </div>
                            </div>
                            <hr>

                            <div class="row pt-3">
                                @foreach($allAvailableFlight as $key => $flight)
                                    @include('user.ajax.Air.availableFlight')
                                @endforeach
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12">
                                    <div class="card bg-color-grey border-curve2 card-bacground3">
                                        <div class="card-body card-bacground2 border-curve2 card-bacground3"
                                             style="background-image: url('{{ asset('user/img/nightview.jpg') }}'); height: 150px;">
                                            <div class="row text-right pt-5">
                                                <div class="col-md-9">
                                                    <p class="font-weight-bold" style="font-size: large;">Trip to
                                                        fascinating
                                                        destinations </p>
                                                </div>
                                                <div class="col-md-3">
                                                    <a class="btn btn-light" href=""> Plan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="div text-center mt-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-part pt-5" style="background-color: #FFFFFF">
                <aside class="sidebar pb-4">
                    <div class="row">
                        <div class="col-md-12">
                            Sponsor
                        </div>
                        <div class="col-md-12 col-6 ">
                            <div class="post-image">
                                <a href="">
                                    <img src="{{ asset('user/img/longheight.png') }}"
                                         class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0"
                                         alt="Ok nai"/>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12  col-6">
                            <div class="post-image">
                                <a href="">
                                    <img src="{{ asset('user/img/longheight.png') }}"
                                         class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0"
                                         alt="Ok nai"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>


@endsection
@push('js')
    <script>


        // $('#datepicker').datepicker({
        //     uiLibrary: 'bootstrap4'
        // });
        // $('#datepicker2').datepicker({
        //     uiLibrary: 'bootstrap4'
        // });
        // $('#datepicker').datepicker({ header: false });
        // $('#datepicker').datepicker('update', new Date())
        $('#datepicker').datepicker({
            format: 'mm/dd/yyyy',
        }).datepicker("setDate", 'now');
    </script>
    <script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>

        var flightJson = JSON.parse(@json($allAvailableFlightJson));

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
                            obj.id = obj.id || obj.id;
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
                            obj.id = obj.id || obj.id;
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
        $(document).on('click', '.bookNow', function (e) {
            e.preventDefault();
            var that = $(this);
            var url = that.attr('data-url');
            if (!url) {
                alert('Already Ordered');
            }
            var key = that.attr('data-id');
            var data = flightJson[key];

            $.ajax({
                url: url,
                method: "GET",
                data: {flightSegment: data},
                success: function (e) {
                    console.log(e.success);
                    if (e.success) {
                        that.attr('data-url', '');
                        that.text('Ordered');
                    }
                }
            });
        });
    </script>
@endpush
