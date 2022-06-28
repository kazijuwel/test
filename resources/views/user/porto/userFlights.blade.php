@extends('user.porto.layouts.userLayoutMaster')
@push('css')
    <style>
        input.flight_input {
            border: none;
            width: 100%;
            font-size: 14px !important;
        }

        input.flight_input:focus {
            outline: none;
        }

        .navbartexts span.input-group-append {
            display: none;
        }

        input#datepicker {
            color: black;
            padding-top: 0;
        }

        input#datepicker2 {
            color: black;
            padding-top: 0;
        }

        .mynav {
            display: flex;
            flex-direction: row !important;
        }

        @media only screen and (max-width: 738px) {
            .vl {
                display: none;
            }
            input.flight_input{
                width: 50%;
                text-align: center;
                padding: 0px 50px;
            }
        }

    </style>
@endpush
@section('content')
    <div class="w3-border-bottom">
        <div role="main" class="container6 main margin-start card-bacground3">

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
    <div role="main" class="main margin-start card-bacground3">
        <div class="container6">
            <div class="row p-2">
                <div class="col-md-9 col-12 text-left">
                    <ul class="nav footer-main-links row text-center">
                        <li class="nav-item ml-2">
                            <a class="nav-link btn sub-head" href="#" style="font-size:12px; color: black;">One
                                Way</a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link btn sub-head" href="#" style="font-size:12px; color: black;">Round
                                Trip</a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link btn sub-head" href="#" style="font-size:12px; color: black;">Multi
                                City</a>
                        </li>
                        <li class="nav-item ml-2 dropdown">
                            <a class="nav-link dropdown-toggle btn sub-head" style="font-size:12px; color: black;" href="#"
                                id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
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
                            <a class="nav-link dropdown-toggle btn sub-head" style="font-size:12px; color: black;" href="#"
                                id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
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
                    {{-- <nav class="navbar navbar-expand-lg navbar-light" style="width: 100%;">
                        <div class="navbar" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto mynav">
                                <li class="nav-item active">
                                    <a class="nav-link btn sub-head" href="#" style="font-size:12px; color: black;">One
                                        Way</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn sub-head" href="#" style="font-size:12px; color: black;">Round
                                        Trip</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link btn sub-head" href="#" style="font-size:12px; color: black;">Multi
                                        City</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle btn sub-head" style="font-size:12px; color: black;"
                                        href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Adult
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle btn sub-head" style="font-size:12px; color: black;"
                                        href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
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
                    </nav> --}}
                </div>

                <div class="col-md-3 pt-3 text-center">
                    <div class="switchbtn">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                        <p class="d-inline sub-head">Direct Flights only</p>
                    </div>




                </div>
            </div>
        </div>


        <div class="row container6">
            <div class="col-md-12">
                <div class="card-bacground3 card border-curve2" style="margin-bottom: -20px;">
                    <div class="card-bacground3 border-curve2 pt-3" style="background-color: #FFFFFF;">

                        <form action="">
                            <div class="row tarek-card-center">
                                <div class="col-md-2">
                                    <div class="navbartexts ml-2">
                                        <p style="font-size: 10px;color:chocolate;" class="ml-3">From*</p>
                                        <p class="ml-3"><input name="from" class="flight_input" type="text"
                                                placeholder="Type city name" autocomplete="off"></p>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <img class="pt-2" src="{{ asset('user/img/bi-direction.png') }}" alt="">
                                </div>
                                <div class="col-md-2">
                                    <div class="navbartexts  ml-1">
                                        <p style="font-size: 10px;color:chocolate; ">To*</p>
                                        <p><input class="flight_input" name="to" type="text" placeholder="Type city name"
                                                autocomplete="off"></p>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="vl"></div>
                                </div>

                                <div class="col-md-2">
                                    <div class="navbartexts ml-2">
                                        <p style="font-size: 10px;color:chocolate;">Depart*</p>
                                        <p><input id="datepicker" name="depart_date" class="flight_input"
                                                placeholder="Select Date" autocomplete="off"></p>
                                    </div>
                                </div>
                                {{-- <input type="date"> --}}
                                <div class="col-md-2">
                                    <div class="navbartexts">
                                        <p style="font-size: 10px;color:chocolate;">Return</p>
                                        <p><input id="datepicker2" name="return_date" class="flight_input"
                                                placeholder="Select Date" autocomplete="off"></p>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="searchbtn pt-3">
                                        <button class="btn btn-tarek btn-rounded tarek-search-margin">Search</button>

                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- left right sidebar -->
    <div class="container py-4">

        <div class="row container6 pt-3">
            <div class="col-lg-3">
                <aside class="sidebar">
                    <p class="sub-head text-dark">Filter By</p>

                    <div class="row">


                        <div class="col-md-12">
                            <div class="row w3-round-large" style="background-color: #28157A; max-height: 30px;">
                                <div class="col-md-6 text-left pt-2">
                                    <p class="sub-head text-light w3-small">No of Stops</p>
                                </div>

                                <div class="col-md-6 text-right pt-2">
                                    <p class="sub-head text-light w3-small">From</p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table" style="min-width: 100%;">
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="stop" value="Boat">
                                                <label style="font-size: 10px;" for="stop"> 1 Stop</label><br>
                                            </td>
                                            <td class="w3-small">$100</td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="checkbox" name="stop" value="Boat">
                                                <label style="font-size: 10px;" for="stop"> 2+ Stops</label><br>
                                            </td>
                                            <td class="w3-small">$50</td>
                                        </tr>
                                    </table>

                                </div>
                            </div>



                        </div>



                        <div class="col-md-12">
                            <div class="row w3-round-large " style="background-color: #28157A; max-height: 30px;">
                                <div class="col-md-6 text-left pt-2">
                                    <p class="sub-head text-light w3-small">Airlines from</p>
                                </div>

                                <div class="col-md-6 text-right pt-2">
                                    <p class="sub-head text-light w3-small">From</p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table" style="min-width: 100%;">
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="stop" value="Boat">
                                                <label style="font-size: 10px;" for="stop"> Quatar (5)</label><br>
                                            </td>
                                            <td class="w3-small">$100</td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="checkbox" name="stop" value="Boat">
                                                <label style="font-size: 10px;" for="stop">Emirates(10)</label><br>
                                            </td>
                                            <td class="w3-small">$50</td>
                                        </tr>
                                    </table>

                                </div>
                            </div>



                        </div>


                        <div class="col-md-12">



                            <div class="row">
                                <div class="col-md-12 w3-round-large" style="background-color: #28157A; max-height: 30px;">
                                    <p class="sub-head text-light pt-2 w3-small">Departure time point 1</p>
                                </div>
                            </div>
                            <div class="row pt-2 pl-4">
                                <div class="col-5 pt-1 mr-1 tarek-mini-card2">

                                    <div class="row pt-3" style="margin-top: -10px;">



                                        <div class="col-6 text-left" style="margin-left: -15px;">

                                            <p class="tarek-height" style="font-size: 8px; "><span
                                                    class="font-weight-bold pb-4">Early Morning</span> <span
                                                    class="pt-5" style="white-space: nowrap;">06AM-8AM</span></p>


                                            <!-- <i class="fas fa-sun text-warning" ></i> -->
                                        </div>

                                        <div class="col-6 text-right">
                                            <p style="font-size: 9px;"><i class="fas fa-sun text-warning"></i></p>
                                        </div>




                                    </div>



                                </div>


                                <div class="col-5 pt-1 mr-1 tarek-mini-card2">

                                    <div class="row pt-3" style="margin-top: -10px;">



                                        <div class="col-6 text-left" style="margin-left: -15px;">

                                            <p class="tarek-height" style="font-size: 8px; "><span
                                                    class="font-weight-bold pb-4">Early Morning</span> <span
                                                    class="pt-5" style="white-space: nowrap;">06AM-8AM</span></p>


                                            <!-- <i class="fas fa-sun text-warning" ></i> -->
                                        </div>

                                        <div class="col-6 text-right">
                                            <p style="font-size: 9px;"><i class="fas fa-sun text-warning"></i></p>
                                        </div>




                                    </div>



                                </div>




                                <div class="col-5 pt-1 mr-1 mt-1 tarek-mini-card2">

                                    <div class="row pt-3" style="margin-top: -10px;">



                                        <div class="col-6 text-left" style="margin-left: -15px;">

                                            <p class="tarek-height" style="font-size: 8px; "><span
                                                    class="font-weight-bold pb-4">Early Morning</span> <span
                                                    class="pt-5" style="white-space: nowrap;">06AM-8AM</span></p>


                                            <!-- <i class="fas fa-sun text-warning" ></i> -->
                                        </div>

                                        <div class="col-6 text-right">
                                            <p style="font-size: 9px;"><i class="fas fa-sun text-warning"></i></p>
                                        </div>




                                    </div>



                                </div>




                                <div class="col-5 pt-1 mr-1 mt-1 tarek-mini-card2">

                                    <div class="row pt-3" style="margin-top: -10px;">



                                        <div class="col-6 text-left" style="margin-left: -15px;">

                                            <p class="tarek-height" style="font-size: 8px; "><span
                                                    class="font-weight-bold pb-4">Early Morning</span> <span
                                                    class="pt-5" style="white-space: nowrap;">06AM-8AM</span></p>


                                            <!-- <i class="fas fa-sun text-warning" ></i> -->
                                        </div>

                                        <div class="col-6 text-right">
                                            <p style="font-size: 9px;"><i class="fas fa-sun text-warning"></i></p>
                                        </div>




                                    </div>



                                </div>
                            </div>

                        </div>







                        <div class="col-md-12 pt-3">
                            <div class="row ">
                                <div class="col-md-12 w3-round-large" style="background-color: #28157A; max-height: 30px;">
                                    <p class="sub-head text-light pt-2 w3-small">Arrival time Point 2
                                    </p>
                                </div>
                            </div>
                            <div class="row pt-2 pl-4">

                                <div class="col-5 pt-1 mr-1 tarek-mini-card2">

                                    <div class="row pt-3" style="margin-top: -10px;">



                                        <div class="col-6 text-left" style="margin-left: -15px;">

                                            <p class="tarek-height" style="font-size: 8px; "><span
                                                    class="font-weight-bold pb-4">Early Morning</span> <span
                                                    class="pt-5" style="white-space: nowrap;">06AM-8AM</span></p>


                                            <!-- <i class="fas fa-sun text-warning" ></i> -->
                                        </div>

                                        <div class="col-6 text-right">
                                            <p style="font-size: 9px;"><i class="fas fa-sun text-warning"></i></p>
                                        </div>




                                    </div>



                                </div>


                                <div class="col-5 pt-1 mr-1 tarek-mini-card2">

                                    <div class="row pt-3" style="margin-top: -10px;">



                                        <div class="col-6 text-left" style="margin-left: -15px;">

                                            <p class="tarek-height" style="font-size: 8px; "><span
                                                    class="font-weight-bold pb-4">Early Morning</span> <span
                                                    class="pt-5" style="white-space: nowrap;">06AM-8AM</span></p>


                                            <!-- <i class="fas fa-sun text-warning" ></i> -->
                                        </div>

                                        <div class="col-6 text-right">
                                            <p style="font-size: 9px;"><i class="fas fa-sun text-warning"></i></p>
                                        </div>




                                    </div>



                                </div>




                                <div class="col-5 pt-1 mr-1 mt-1 tarek-mini-card2">

                                    <div class="row pt-3" style="margin-top: -10px;">



                                        <div class="col-6 text-left" style="margin-left: -15px;">

                                            <p class="tarek-height" style="font-size: 8px; "><span
                                                    class="font-weight-bold pb-4">Early Morning</span> <span
                                                    class="pt-5" style="white-space: nowrap;">06AM-8AM</span></p>


                                            <!-- <i class="fas fa-sun text-warning" ></i> -->
                                        </div>

                                        <div class="col-6 text-right">
                                            <p style="font-size: 9px;"><i class="fas fa-sun text-warning"></i></p>
                                        </div>




                                    </div>



                                </div>




                                <div class="col-5 pt-1 mr-1 mt-1 tarek-mini-card2">

                                    <div class="row pt-3" style="margin-top: -10px;">



                                        <div class="col-6 text-left" style="margin-left: -15px;">

                                            <p class="tarek-height" style="font-size: 8px; "><span
                                                    class="font-weight-bold pb-4">Early Morning</span> <span
                                                    class="pt-5" style="white-space: nowrap;">06AM-8AM</span></p>


                                            <!-- <i class="fas fa-sun text-warning" ></i> -->
                                        </div>

                                        <div class="col-6 text-right">
                                            <p style="font-size: 9px;"><i class="fas fa-sun text-warning"></i></p>
                                        </div>




                                    </div>



                                </div>


                                <!-- <div class="col-md-6 pt-1">
                                       <div class="card2 w3-round-xxlarge">
                                           <div class="card-body">
                                               <div class="row">
                                                   <div class="col-md-7">
                                                    <p style="font-size: x-small; padding-top: -20px; padding-left: -4px;">Early Morning  <i class="fas fa-sun text-warning"></i><br>  06AM-8AM
                                                        </p>
                                                   </div>
                                                   <div class="col-2">
                                                    <i class="fas fa-sun text-warning"></i>
                                                   </div>
                                               </div>
                                               
                                           </div>
                                       </div>
                                    </div>


                                    <div class="col-md-6 pt-1">
                                       <div class="card2 w3-round-xxlarge">
                                           <div class="card-body">
                                               <div class="row">
                                                   <div class="col-md-7">
                                                    <p style="font-size: x-small;">Early Morning <br>  06AM-8AM
                                                        </p>
                                                   </div>
                                                   <div class="col-2">
                                                    <i class="fas fa-sun text-warning"></i>
                                                   </div>
                                               </div>
                                               
                                           </div>
                                       </div>
                                    </div>

                                    <div class="col-md-6 pt-1">
                                       <div class="card2 w3-round-xxlarge">
                                           <div class="card-body ">
                                               <div class="row">
                                                   <div class="col-md-7">
                                                    <p style="font-size: x-small;">Early Morning <br>  06AM-8AM
                                                        </p>
                                                   </div>
                                                   <div class="col-2">
                                                    <i class="fas fa-sun text-warning"></i>
                                                   </div>
                                               </div>
                                               
                                           </div>
                                       </div>
                                    </div> -->
                            </div>

                        </div>


                    </div>

                </aside>
            </div>


            <div class="col-lg-7">
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
                                                    Wed, <br> <span style="white-space: nowrap;"> Sept 22 </span>
                                                </p>
                                                <p class="w3-small w3-text-black" style="margin-left: -30px;">$265
                                                </p>
                                            </div>



                                        </div>

                                        <div>

                                            <div class="tarek-trip-date-card">

                                                <p class="w3-text-black"
                                                    style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                    Wed, <br> <span style="white-space: nowrap;"> Sept 22 </span>
                                                </p>
                                                <p class="w3-small w3-text-black" style="margin-left: -30px;">$265
                                                </p>
                                            </div>



                                        </div>


                                        <div>

                                            <div class="tarek-trip-date-card">

                                                <p class="w3-text-black"
                                                    style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                    Wed, <br> <span style="white-space: nowrap;"> Sept 22 </span>
                                                </p>
                                                <p class="w3-small w3-text-black" style="margin-left: -30px;">$265
                                                </p>
                                            </div>



                                        </div>


                                        <div>

                                            <div class="tarek-trip-date-card">

                                                <p class="w3-text-black"
                                                    style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                    Wed, <br> <span style="white-space: nowrap;"> Sept 22 </span>
                                                </p>
                                                <p class="w3-small w3-text-black" style="margin-left: -30px;">$265
                                                </p>
                                            </div>



                                        </div>


                                        <div>

                                            <div class="tarek-trip-date-card">

                                                <p class="w3-text-black"
                                                    style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                    Wed, <br> <span style="white-space: nowrap;"> Sept 22 </span>
                                                </p>
                                                <p class="w3-small w3-text-black" style="margin-left: -30px;">$265
                                                </p>
                                            </div>



                                        </div>


                                        <div>

                                            <div class="tarek-trip-date-card">

                                                <p class="w3-text-black"
                                                    style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                    Wed, <br> <span style="white-space: nowrap;"> Sept 22 </span>
                                                </p>
                                                <p class="w3-small w3-text-black" style="margin-left: -30px;">$265
                                                </p>
                                            </div>



                                        </div>


                                        <div>

                                            <div class="tarek-trip-date-card">

                                                <p class="w3-text-black"
                                                    style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                    Wed, <br> <span style="white-space: nowrap;"> Sept 22 </span>
                                                </p>
                                                <p class="w3-small w3-text-black" style="margin-left: -30px;">$265
                                                </p>
                                            </div>



                                        </div>


                                        <div>

                                            <div class="tarek-trip-date-card">

                                                <p class="w3-text-black"
                                                    style="font-size: 10px; margin-left: -30px; margin-top: -20px;">
                                                    Wed, <br> <span style="white-space: nowrap;"> Sept 22 </span>
                                                </p>
                                                <p class="w3-small w3-text-black" style="margin-left: -30px;">$265
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
                        <p style="font-size: small;">Prices displayed include taxes and may change based on availability.
                            You can review any additional fees before check out. Prices are not final until you complete
                            your purchase.
                        </p>


                    </div>

                    <div class="col-md-2">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn sub-head w3-round-xxlarge text-light"
                                style="font-size:12px; color: black; background-color: #28157A;" href="#"
                                id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Sort by
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <p class="text-weight-bold text-dark pl-2">Price</p>
                                <a class="dropdown-item" href="#">Hight to Low</a>
                                <a class="dropdown-item" href="#">Low to Hight</a>

                        </li>
                    </div>
                </div>


                <hr>



                <div class="row pt-3">
                    <div class="col-md-12">
                        <div class="card w3-round-xxlarge">
                            <div class="card-body w3-round-xxlarge w3-white">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="icon-plane icons w3-text-lime"></i>
                                            </div>
                                            <div class="col-md-12">

                                                <p class="text-dark cardp" style="font-size: 11px;">Biman Bangladesh
                                                    Airlines <br> Flight No. 786</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> <span
                                                    class="sub-head text-dark">Dhaka (DAC)</span> <br> 10:20 <br>
                                                <span class=" text-dark"> Wednesday, 15 Sep 21 </span>
                                            </p>
                                        </div>

                                    </div>

                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> <span
                                                    class="sub-head text-dark"> Delhi (DAC)</span> <br> 10:20 <br>
                                                <span class=" text-dark"> Wednesday, 15 Sep 21 </span>
                                            </p>
                                        </div>

                                    </div>


                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> 10hrs 55mins <br><span
                                                    class="sub-head text-dark">One Stop </span> <br> Seats Left :
                                                <span class="text-warning"> 9 </span>
                                            </p>
                                        </div>

                                    </div>



                                    <div class="col-md-3 text-center">
                                        <p class="font-weight-bold">$600 </p>
                                        <a class="btn btn-tarek btn-rounded" style="margin-top: -25px;" href="">
                                            Book Now</a>
                                        <p style="font-size: 11px;">Refundable</p>

                                    </div>


                                </div>




                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col-md-12">
                        <div class="card w3-round-xxlarge">
                            <div class="card-body w3-round-xxlarge w3-white">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="icon-plane icons w3-text-lime"></i>
                                            </div>
                                            <div class="col-md-12">

                                                <p class="text-dark cardp" style="font-size: 11px;">Biman Bangladesh
                                                    Airlines <br> Flight No. 786</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> <span
                                                    class="sub-head text-dark">Dhaka (DAC)</span> <br> 10:20 <br>
                                                <span class=" text-dark"> Wednesday, 15 Sep 21 </span>
                                            </p>
                                        </div>

                                    </div>

                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> <span
                                                    class="sub-head text-dark"> Delhi (DAC)</span> <br> 10:20 <br>
                                                <span class=" text-dark"> Wednesday, 15 Sep 21 </span>
                                            </p>
                                        </div>

                                    </div>


                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> 10hrs 55mins <br><span
                                                    class="sub-head text-dark">One Stop </span> <br> Seats Left :
                                                <span class="text-warning"> 9 </span>
                                            </p>
                                        </div>

                                    </div>



                                    <div class="col-md-3 text-center">
                                        <p class="font-weight-bold">$600 </p>
                                        <a class="btn btn-tarek btn-rounded" style="margin-top: -25px;" href="">
                                            Book Now</a>
                                        <p style="font-size: 11px;">Refundable</p>

                                    </div>


                                </div>




                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col-md-12">
                        <div class="card w3-round-xxlarge">
                            <div class="card-body w3-round-xxlarge w3-white">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="icon-plane icons w3-text-lime"></i>
                                            </div>
                                            <div class="col-md-12">

                                                <p class="text-dark cardp" style="font-size: 11px;">Biman Bangladesh
                                                    Airlines <br> Flight No. 786</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> <span
                                                    class="sub-head text-dark">Dhaka (DAC)</span> <br> 10:20 <br>
                                                <span class=" text-dark"> Wednesday, 15 Sep 21 </span>
                                            </p>
                                        </div>

                                    </div>

                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> <span
                                                    class="sub-head text-dark"> Delhi (DAC)</span> <br> 10:20 <br>
                                                <span class=" text-dark"> Wednesday, 15 Sep 21 </span>
                                            </p>
                                        </div>

                                    </div>


                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> 10hrs 55mins <br><span
                                                    class="sub-head text-dark">One Stop </span> <br> Seats Left :
                                                <span class="text-warning"> 9 </span>
                                            </p>
                                        </div>

                                    </div>



                                    <div class="col-md-3 text-center">
                                        <p class="font-weight-bold">$600 </p>
                                        <a class="btn btn-tarek btn-rounded" style="margin-top: -25px;" href="">
                                            Book Now</a>
                                        <p style="font-size: 11px;">Refundable</p>

                                    </div>


                                </div>




                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col-md-12">
                        <div class="card w3-round-xxlarge">
                            <div class="card-body w3-round-xxlarge w3-white">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="icon-plane icons w3-text-lime"></i>
                                            </div>
                                            <div class="col-md-12">

                                                <p class="text-dark cardp" style="font-size: 11px;">Biman Bangladesh
                                                    Airlines <br> Flight No. 786</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> <span
                                                    class="sub-head text-dark">Dhaka (DAC)</span> <br> 10:20 <br>
                                                <span class=" text-dark"> Wednesday, 15 Sep 21 </span>
                                            </p>
                                        </div>

                                    </div>

                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> <span
                                                    class="sub-head text-dark"> Delhi (DAC)</span> <br> 10:20 <br>
                                                <span class=" text-dark"> Wednesday, 15 Sep 21 </span>
                                            </p>
                                        </div>

                                    </div>


                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> 10hrs 55mins <br><span
                                                    class="sub-head text-dark">One Stop </span> <br> Seats Left :
                                                <span class="text-warning"> 9 </span>
                                            </p>
                                        </div>

                                    </div>



                                    <div class="col-md-3 text-center">
                                        <p class="font-weight-bold">$600 </p>
                                        <a class="btn btn-tarek btn-rounded" style="margin-top: -25px;" href="">
                                            Book Now</a>
                                        <p style="font-size: 11px;">Refundable</p>

                                    </div>


                                </div>




                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col-md-12">
                        <div class="card bg-color-grey border-curve2 card-bacground3">
                            <div class="card-body card-bacground2 border-curve2 card-bacground3"
                                style="background-image: url('{{ asset('user/img/nightview.jpg') }}'); height: 150px;">

                                <div class="row text-right pt-5">

                                    <div class="col-md-9">
                                        <p class="font-weight-bold" style="font-size: large;">Trip to fascinating
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


                <div class="row pt-3">
                    <div class="col-md-12">
                        <div class="card w3-round-xxlarge">
                            <div class="card-body w3-round-xxlarge w3-white">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="icon-plane icons w3-text-lime"></i>
                                            </div>
                                            <div class="col-md-12">

                                                <p class="text-dark cardp" style="font-size: 11px;">Biman Bangladesh
                                                    Airlines <br> Flight No. 786</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> <span
                                                    class="sub-head text-dark">Dhaka (DAC)</span> <br> 10:20 <br>
                                                <span class=" text-dark"> Wednesday, 15 Sep 21 </span>
                                            </p>
                                        </div>

                                    </div>

                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> <span
                                                    class="sub-head text-dark"> Delhi (DAC)</span> <br> 10:20 <br>
                                                <span class=" text-dark"> Wednesday, 15 Sep 21 </span>
                                            </p>
                                        </div>

                                    </div>


                                    <div class="col-md-2  pt-2">
                                        <div class="row">

                                            <p class="cardp" style="font-size: 11px;"> 10hrs 55mins <br><span
                                                    class="sub-head text-dark">One Stop </span> <br> Seats Left :
                                                <span class="text-warning"> 9 </span>
                                            </p>
                                        </div>

                                    </div>



                                    <div class="col-md-3 text-center">
                                        <p class="font-weight-bold">$600 </p>
                                        <a class="btn btn-tarek btn-rounded" style="margin-top: -25px;" href="">
                                            Book Now</a>
                                        <p style="font-size: 11px;">Refundable</p>

                                    </div>


                                </div>




                            </div>
                        </div>
                    </div>
                </div>





            </div>



            <div class="col-lg-2">
                <aside class="sidebar pb-4">
                    <div class="row">
                        <div class="col-md-12">
                            Sponsor
                        </div>
                        <div class="col-md-12 col-6 ">
                            <div class="post-image">
                                <a href="">
                                    <img src="{{ asset('user/img/longheight.png') }}"
                                        class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="Ok nai" />
                                </a>
                            </div>
                        </div>

                        <div class="col-md-12  col-6">
                            <div class="post-image">
                                <a href="">
                                    <img src="{{ asset('user/img/longheight.png') }}"
                                        class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="Ok nai" />
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>

    </div>
    <!-- end left right sidebar -->

    {{-- <input id="datepicker" > --}}
@endsection
@push('js')
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
@endpush
