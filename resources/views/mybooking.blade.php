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

    .tarek-add-bk {
        background-color: #F4F4F4 !important;
    }
</style>
@endpush
@section('content')
<div role="main" class="main margin-start" style="background-color: #F4F4F4">
    <div style="background-color: #151B49; min-height: 100px ; margin-top: -2px; padding-top: 0%;">

    </div>

    <div style="margin-top: -100px;" style="background-color: #F4F4F4">
        <section class="container">
            <div class="row container3">

                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="w3-text-white" style="font-size: 13px; font-weight:500">My Bookings</h4>
                        </div>
                    </div>
                    <div class="card bg-color-white  w3-round-xlarge">
                        <div class="card-body   border-curve2">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-4">
                                            <a class="btn text-dark font-weight-bold" style="font-size: 14px;"
                                                href="">Upcoming</a>
                                        </div>
                                        <div class="col-4">
                                            <a class="btn text-dark font-weight-bold" style="font-size: 14px;"
                                                href="">Cencelled</a>
                                        </div>
                                        <div class="col-4">
                                            <a class="btn text-dark font-weight-bold" style="font-size: 14px;"
                                                href="">Complete</a>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-6" style="max-width:400px">
                                    <form role="search" action="page-search-results.html" method="get">
                                        <div class="simple-search input-group w3-round-xxlarge"
                                            style="border:1px solid black">
                                            <input class="form-control" style="color: black; " id="headerSearch"
                                                name="q" type="search" value="" placeholder="Search with booking...">
                                            <span class="input-group-append">
                                                <button class="btn" type="submit">
                                                    <i class="fa fa-search header-nav-top-icon"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>





        <section class="container pt-2">
            <div class="row container3">
                <div class="col-md-12 ">
                    <div class="flight-booking-card2">
                        <div class="tarek-card-part">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('user/svg/flight-3.svg') }}" height="18" alt="">
                            </div>
                            <div>
                                <div class="text-center">
                                    <div style="max-width: 30px;">
                                        <div class="topline d-flex flex-column align-items-center"><button
                                                class="tarek-btn-mini btn-tarek">Depart</button></div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="text-dark" style="font-size: 11px">12.45</div>
                                            <div style="font-size: 11px">3h 55min</div>
                                            <div class="text-dark" style="font-size: 11px">16.40</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="topline text-dark font-weight-bold" style="font-size: 12px">Wed, Sep 22 | Hong
                                Kong
                                - Kuala Lumpur</div>
                            <div class="second-grid-tarek">
                                <div style="d-flex flex-column justify-content-between align-items-center">
                                    <div><img src="{{ asset('user/svg/flight-2.svg') }}" height="18" alt=""></div>
                                    <div class="d-flex justify-content-center">
                                        <div> <img src="{{ asset('user/svg/dotline.svg') }}" height="18" alt=""></div>
                                    </div>

                                    <div><img src="{{ asset('user/svg/flight-2.svg') }}" height="18" alt=""></div>
                                </div>
                                <div class="d-flex flex-column justify-content-between">
                                    <div class="text-dark" style="font-size: 11px">HKG Hong Kong International Airport
                                        T1</div>
                                    <div class="text-dark" style="font-size: 11px">KUL Kuala Lumpur International
                                        Airport M</div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <div class="w3-text-black d-flex justify-content-end topline"> <i
                                    class="icon-note icons"></i>
                                <u> Change flight
                                </u>
                            </div>
                            <div class="third-grid-tarek">
                                <div> <img src="{{ asset('user/svg/flight-ticket.svg') }}" height="18" alt=""></div>
                                <div class="text-dark text-justify" style="font-size: 11px; line-height: 1.7;"> Biman
                                    Bangladesh Airlines - AX786
                                    Airbus A350 XWBEconomyIn-flight <br>
                                    <span style="border-bottom: 1px dashed;">In-flight services</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center pt-2">
                            <div class="d-flex flex-column">
                                <div class="row">
                                    <a href="" class="btn btn-tarek btn-rounded font-weight-bold w3-text-black">Cancel
                                        Flight</a>
                                </div>

                                <div class="row pt-1">
                                    <a href="" class="btn btn-tarek btn-rounded font-weight-bold w3-text-black">Baggage
                                        Info</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-12 pt-3">
                    <div class="flight-booking-card2">
                        <div class="tarek-card-part">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('user/svg/flight-3.svg') }}" height="18" alt="">
                            </div>
                            <div>
                                <div class="text-center">
                                    <div style="max-width: 30px;">
                                        <div class="topline d-flex flex-column align-items-center"><button
                                                class="tarek-btn-mini btn-tarek">Depart</button></div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="text-dark" style="font-size: 11px">12.45</div>
                                            <div style="font-size: 11px">3h 55min</div>
                                            <div class="text-dark" style="font-size: 11px">16.40</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="topline text-dark font-weight-bold" style="font-size: 12px">Wed, Sep 22 | Hong
                                Kong
                                - Kuala Lumpur</div>
                            <div class="second-grid-tarek">
                                <div style="d-flex flex-column justify-content-between align-items-center">
                                    <div><img src="{{ asset('user/svg/flight-2.svg') }}" height="18" alt=""></div>
                                    <div class="d-flex justify-content-center">
                                        <div> <img src="{{ asset('user/svg/dotline.svg') }}" height="18" alt=""></div>
                                    </div>

                                    <div><img src="{{ asset('user/svg/flight-2.svg') }}" height="18" alt=""></div>
                                </div>
                                <div class="d-flex flex-column justify-content-between pt-2">
                                    <div class="text-dark" style="font-size: 11px">HKG Hong Kong International Airport
                                        T1</div>
                                    <div class="text-dark" style="font-size: 11px">KUL Kuala Lumpur International
                                        Airport M</div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <div class="w3-text-black d-flex justify-content-end topline"> <i
                                    class="icon-note icons"></i>
                                <u> Change flight
                                </u>
                            </div>
                            <div class="third-grid-tarek">
                                <div> <img src="{{ asset('user/svg/flight-ticket.svg') }}" height="18" alt=""></div>
                                <div class="text-dark text-justify" style="font-size: 11px; line-height: 1.7;"> Biman
                                    Bangladesh Airlines - AX786
                                    Airbus A350 XWBEconomyIn-flight <br>
                                    <span style="border-bottom: 1px dashed;">In-flight services</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="d-flex flex-column">
                                <div class="row">
                                    <a href="" class="btn btn-tarek btn-rounded font-weight-bold w3-text-black">Cancel
                                        Flight</a>
                                </div>

                                <div class="row pt-1">
                                    <a href="" class="btn btn-tarek btn-rounded font-weight-bold w3-text-black">Baggage
                                        Info</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>






        <section class="container pt-5">
            <div class="row container3">
                <div class="col-md-12 ">
                    <div class="row pl-4">
                        <p style="font-size: 16px; font-weight: bold; color:black">Cancelled</p>
                    </div>
                    <div class="flight-booking-card2">
                        <div class="tarek-card-part">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('user/svg/flight-3.svg') }}" height="18" alt="">
                            </div>
                            <div>
                                <div class="text-center">
                                    <div style="max-width: 30px;">
                                        <div class="topline d-flex flex-column align-items-center"><button
                                                class="tarek-btn-mini btn-tarek">Depart</button></div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="text-dark" style="font-size: 11px">12.45</div>
                                            <div style="font-size: 11px">3h 55min</div>
                                            <div class="text-dark" style="font-size: 11px">16.40</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="topline text-dark font-weight-bold" style="font-size: 12px">Wed, Sep 22 | Hong
                                Kong
                                - Kuala Lumpur</div>
                            <div class="second-grid-tarek">
                                <div style="d-flex flex-column justify-content-between align-items-center">
                                    <div><img src="{{ asset('user/svg/flight-2.svg') }}" height="18" alt=""></div>
                                    <div class="d-flex justify-content-center">
                                        <div> <img src="{{ asset('user/svg/dotline.svg') }}" height="18" alt=""></div>
                                    </div>

                                    <div><img src="{{ asset('user/svg/flight-2.svg') }}" height="18" alt=""></div>
                                </div>
                                <div class="d-flex flex-column justify-content-between">
                                    <div class="text-dark" style="font-size: 11px">HKG Hong Kong International Airport
                                        T1</div>
                                    <div class="text-dark" style="font-size: 11px">KUL Kuala Lumpur International
                                        Airport M</div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <div class="w3-text-black d-flex justify-content-end topline"> <i
                                    class="icon-note icons"></i>
                                <u> Change flight
                                </u>
                            </div>
                            <div class="third-grid-tarek">
                                <div> <img src="{{ asset('user/svg/flight-ticket.svg') }}" height="18" alt=""></div>
                                <div class="text-dark text-justify" style="font-size: 11px; line-height: 1.7;"> Biman
                                    Bangladesh Airlines - AX786
                                    Airbus A350 XWBEconomyIn-flight <br>
                                    <span style="border-bottom: 1px dashed;">In-flight services</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="d-flex flex-column justify-content-center pt-2">
                                <div class="row">
                                    <a href=""
                                        class="btn btn-tarek btn-block btn-rounded font-weight-bold w3-text-black">Details</a>
                                </div>

                                <div class="row pt-3">
                                    <p class="text-3 text-dark font-weight-bold">Refunded <i
                                            class="icon-check icons bg-dark text-light"></i></p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>




                <div class="col-md-12 pt-5 mt-2">
                    <div class="row pl-4">
                        <p style="font-size: 16px; font-weight: bold; color:black">Cancelled</p>
                    </div>
                    <div class="flight-booking-card2">
                        <div class="tarek-card-part">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('user/svg/flight-3.svg') }}" height="18" alt="">
                            </div>
                            <div>
                                <div class="text-center">
                                    <div style="max-width: 30px;">
                                        <div class="topline d-flex flex-column align-items-center"><button
                                                class="tarek-btn-mini btn-tarek">Depart</button></div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="text-dark" style="font-size: 11px">12.45</div>
                                            <div style="font-size: 11px">3h 55min</div>
                                            <div class="text-dark" style="font-size: 11px">16.40</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="topline text-dark font-weight-bold" style="font-size: 12px">Wed, Sep 22 | Hong
                                Kong
                                - Kuala Lumpur</div>
                            <div class="second-grid-tarek">
                                <div style="d-flex flex-column justify-content-between align-items-center">
                                    <div><img src="{{ asset('user/svg/flight-2.svg') }}" height="18" alt=""></div>
                                    <div class="d-flex justify-content-center">
                                        <div> <img src="{{ asset('user/svg/dotline.svg') }}" height="18" alt=""></div>
                                    </div>

                                    <div><img src="{{ asset('user/svg/flight-2.svg') }}" height="18" alt=""></div>
                                </div>
                                <div class="d-flex flex-column justify-content-between">
                                    <div class="text-dark" style="font-size: 11px">HKG Hong Kong International Airport
                                        T1</div>
                                    <div class="text-dark" style="font-size: 11px">KUL Kuala Lumpur International
                                        Airport M</div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <div class="w3-text-black d-flex justify-content-end topline"> <i
                                    class="icon-note icons"></i>
                                <u> Change flight
                                </u>
                            </div>
                            <div class="third-grid-tarek">
                                <div> <img src="{{ asset('user/svg/flight-ticket.svg') }}" height="18" alt=""></div>
                                <div class="text-dark text-justify" style="font-size: 11px; line-height: 1.7;"> Biman
                                    Bangladesh Airlines - AX786
                                    Airbus A350 XWBEconomyIn-flight <br>
                                    <span style="border-bottom: 1px dashed;">In-flight services</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center pt-2">
                            <div class="d-flex flex-column justify-content-center">
                                <div class="row">
                                    <a href=""
                                        class="btn btn-tarek btn-block btn-rounded font-weight-bold w3-text-black">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


    </div>


</div>
@endsection