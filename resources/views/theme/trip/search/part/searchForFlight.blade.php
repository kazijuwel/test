<div class="row ">

    <div class="col-md-12">

        <div class="w3-card m-lg-4">
            <div class="card- w3-card-4- px-5 rounded slider-card-bg-color-" style="background-color: white">
                <div class="card-body- py-1 pb-3">

                    <div class="row">
                        <div class="col-lg-12 mt-3">
                            <div class="tabs">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#flight" data-toggle="tab"><i class="fa fa-plane"></i>
                                            Flight</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="#hotel" data-toggle="tab"> <i class="fa fa-hospital-alt"></i> Hotels</a>
                                    </li> --}}
                                </ul>
                                <div class="tab-content">
                                    <div id="flight" class="tab-pane active">
                                        <a class="w3-button w3-border w3-border-green w3-round-xlarge w3-hover-blue "
                                            id="round-trip">Round Trip</a>

                                        <a class="w3-button w3-border w3-border-green w3-round-xlarge w3-hover-blue "
                                            id="one-trip">One Way</a>

                                        <a class="w3-button w3-border w3-border-green w3-round-xlarge w3-hover-blue "
                                            id="multi-trip">Multi-city</a>

                                        <form action="{{ route('welcome.searchForFlight') }}" method="get"
                                            class="form-group mt-3 single-trip">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input type="text"
                                                        class="form-control form-control-lg text-4 w3-border "
                                                        style="border: 1px solid #0059ad !important;" placeholder="From"
                                                        name="from">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text"
                                                        class="form-control form-control-lg text-4 w3-border "
                                                        style="border: 1px solid #0059ad !important;" placeholder="To"
                                                        name="to">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="from"
                                                        class="form-control form-control-lg text-4 w3-border "
                                                        placeholder="Depart" name="depart_date"
                                                        style="border: 1px solid #0059ad !important;">

                                                </div>
                                                <div class="col-md-3 round-trip-form">
                                                    <input type="text" id="to"
                                                        class="form-control form-control-lg text-4 w3-border "
                                                        placeholder="Return" name="return_date"
                                                        style="border: 1px solid #0059ad !important;">
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-5"></div>
                                                <div class="col-md-2">
                                                    <button
                                                        class="w3-center w3-round w3-round-large w3-button w3-border-green w3-bordered btn-block w3-green">Search</button>
                                                </div>
                                                <div class="col-md-5"></div>
                                            </div>
                                        </form>

                                        <form action="" class="form-group mt-2 multi-city" style="display: none;">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text"
                                                        class="form-control form-control-lg text-4 w3-border "
                                                        style="border: 1px solid #0059ad !important;"
                                                        placeholder="From">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text"
                                                        class="form-control form-control-lg text-4 w3-border "
                                                        style="border: 1px solid #0059ad !important;" placeholder="To">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="datepicker"
                                                        class="form-control form-control-lg text-4 w3-border "
                                                        placeholder="Depart"
                                                        style="border: 1px solid #0059ad !important;">
                                                </div>


                                            </div>


                                            <div class="add-more">
                                            </div>
                                            <a class="m-3 pb-3" id="add">Click For More</a>
                                            <div class="row mt-4">
                                                <div class="col-md-5"></div>
                                                <div class="col-md-2">
                                                    <button
                                                        class="w3-center w3-round w3-round-large w3-button w3-border-green w3-bordered btn-block w3-green">Search</button>
                                                </div>
                                                <div class="col-md-5"></div>
                                            </div>
                                        </form>

                                    </div>
                                    <div id="hotel" class="tab-pane">
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

<div class="row">
    <div class="col-md-12">
        <div class="w3-card m-lg-4">
            <div class="px-5 rounded slider-card-bg-color-" style="background-color: white">
                <div class="py-1 pb-3 pt-3">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="w3-card card-default rounded w3-hover w3-sand w3-hover-light-gray">
                                <div class="card-body ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 w3-center">
                                                <img class="w3-cirlce" src="{{asset('img/trip/airlogo/QR.png')}}" alt="" style="height:35px;"> <br>
                                                <span class="mt-3"><b>Qatar Airlines</b></span>
                                            </div>
                                            <div class="col-md-2">
                                                <h4 class=""><b>10.00 am</b> <br>
                                                    <small class="">DAC</small>
                                                </h4>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fas fa-plane-departure fa-3x p-3 w3-text-indigo"></i>
                                            </div>
                                            <div class="col-md-2">
                                                 <h4 class="">
                                                     <b>11.00 pm</b> <br>
                                                     <small>LAS</small>
                                                 </h4>
                                            </div>
                                            <div class="col-md-3" style="border-left: 2px solid #27aae0;">
                                                <h4 style="text-align: center;">
                                                    <b>$1,705</b>
                                                </h4>
                                                <a href="{{route('welcome.flightDetails')}}" class="btn btn-block btn-primary">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="w3-card card-default rounded w3-hover w3-sand w3-hover-light-gray">
                                <div class="card-body ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 w3-center">
                                                <img class="w3-cirlce" src="{{asset('img/trip/airlogo/TK.png')}}" alt="" style="height:35px;"> <br>
                                                <span class="mt-3"><b>Turky Airlines</b></span>
                                            </div>
                                            <div class="col-md-2">
                                                <h4 class=""><b>12.00 pm</b> <br>
                                                    <small class="">DAC</small>
                                                </h4>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fas fa-plane-departure fa-3x p-3 w3-text-indigo"></i>
                                            </div>
                                            <div class="col-md-2">
                                                 <h4 class="">
                                                     <b>11.00 pm</b> <br>
                                                     <small>LAS</small>
                                                 </h4>
                                            </div>
                                            <div class="col-md-3" style="border-left: 2px solid #27aae0;">
                                                <h4 style="text-align: center;">
                                                    <b>$1,559</b>
                                                </h4>
                                                <a href="{{route('welcome.flightDetails')}}" class="btn btn-block btn-primary">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2 mt-2">
                            <div class="w3-card card-default rounded w3-hover w3-sand w3-hover-light-gray">
                                <div class="card-body ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 w3-center">
                                                <img class="w3-cirlce" src="{{asset('img/trip/airlogo/BA.png')}}" alt="" style="height:35px;"> <br>
                                                <span class="mt-3"><b>British Airlines</b></span>
                                            </div>
                                            <div class="col-md-2">
                                                <h4 class=""><b>12.00 pm</b> <br>
                                                    <small class="">DAC</small>
                                                </h4>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fas fa-plane-departure fa-3x p-3 w3-text-indigo"></i>
                                            </div>
                                            <div class="col-md-2">
                                                 <h4 class="">
                                                     <b>11.00 pm</b> <br>
                                                     <small>LAS</small>
                                                 </h4>
                                            </div>
                                            <div class="col-md-3" style="border-left: 2px solid #27aae0;">
                                                <h4 style="text-align: center;">
                                                    <b>$1,559</b>
                                                </h4>
                                                <a href="{{route('welcome.flightDetails')}}" class="btn btn-block btn-primary">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="w3-card card-default rounded w3-hover w3-sand w3-hover-light-gray">
                                <div class="card-body ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 w3-center">
                                                <img class="w3-cirlce" src="{{asset('img/trip/airlogo/EY.png')}}" alt="" style="height:35px;"> <br>
                                                <span class="mt-3"><b> Airways</b></span>
                                            </div>
                                            <div class="col-md-2">
                                                <h4 class=""><b>10.00 am</b> <br>
                                                    <small class="">DAC</small>
                                                </h4>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fas fa-plane-departure fa-3x p-3 w3-text-indigo"></i>
                                            </div>
                                            <div class="col-md-2">
                                                 <h4 class="">
                                                     <b>11.00 pm</b> <br>
                                                     <small>LAS</small>
                                                 </h4>
                                            </div>
                                            <div class="col-md-3" style="border-left: 2px solid #27aae0;">
                                                <h4 style="text-align: center;">
                                                    <b>$1,705</b>
                                                </h4>
                                                <a href="{{route('welcome.flightDetails')}}" class="btn btn-block btn-primary">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2 mt-2">
                            <div class="w3-card card-default rounded w3-hover w3-sand w3-hover-light-gray">
                                <div class="card-body ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 w3-center">
                                                <img class="w3-cirlce" src="{{asset('img/trip/airlogo/EK.png')}}" alt="" style="height:35px;"> <br>
                                                <span class="mt-3"><b>Emirates</b></span>
                                            </div>
                                            <div class="col-md-2">
                                                <h4 class=""><b>12.00 pm</b> <br>
                                                    <small class="">DAC</small>
                                                </h4>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fas fa-plane-departure fa-3x p-3 w3-text-indigo"></i>
                                            </div>
                                            <div class="col-md-2">
                                                 <h4 class="">
                                                     <b>11.00 pm</b> <br>
                                                     <small>LAS</small>
                                                 </h4>
                                            </div>
                                            <div class="col-md-3" style="border-left: 2px solid #27aae0;">
                                                <h4 style="text-align: center;">
                                                    <b>$1,559</b>
                                                </h4>
                                                <a href="{{route('welcome.flightDetails')}}" class="btn btn-block btn-primary">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="w3-card card-default rounded w3-hover w3-sand w3-hover-light-gray">
                                <div class="card-body ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 w3-center">
                                                <img class="w3-cirlce" src="{{asset('img/trip/airlogo/QR.png')}}" alt="" style="height:35px;"> <br>
                                                <span class="mt-3"><b>Qatar Airlines</b></span>
                                            </div>
                                            <div class="col-md-2">
                                                <h4 class=""><b>10.00 am</b> <br>
                                                    <small class="">DAC</small>
                                                </h4>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fas fa-plane-departure fa-3x p-3 w3-text-indigo"></i>
                                            </div>
                                            <div class="col-md-2">
                                                 <h4 class="">
                                                     <b>11.00 pm</b> <br>
                                                     <small>LAS</small>
                                                 </h4>
                                            </div>
                                            <div class="col-md-3" style="border-left: 2px solid #27aae0;">
                                                <h4 style="text-align: center;">
                                                    <b>$1,705</b>
                                                </h4>
                                                <a href="{{route('welcome.flightDetails')}}" class="btn btn-block btn-primary">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-2">
                            <div class="w3-card card-default rounded w3-hover w3-sand w3-hover-light-gray">
                                <div class="card-body ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 w3-center">
                                                <img class="w3-cirlce" src="{{asset('img/trip/airlogo/SV.png')}}" alt="" style="height:35px;"> <br>
                                                <span class="mt-3"><b>Saudia Airline</b></span>
                                            </div>
                                            <div class="col-md-2">
                                                <h4 class=""><b>10.00 am</b> <br>
                                                    <small class="">DAC</small>
                                                </h4>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fas fa-plane-departure fa-3x p-3 w3-text-indigo"></i>
                                            </div>
                                            <div class="col-md-2">
                                                 <h4 class="">
                                                     <b>11.00 pm</b> <br>
                                                     <small>LAS</small>
                                                 </h4>
                                            </div>
                                            <div class="col-md-3" style="border-left: 2px solid #27aae0;">
                                                <h4 style="text-align: center;">
                                                    <b>$1,705</b>
                                                </h4>
                                                <a href="{{route('welcome.flightDetails')}}" class="btn btn-block btn-primary">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-2">
                            <div class="w3-card card-default rounded w3-hover w3-sand w3-hover-light-gray">
                                <div class="card-body ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 w3-center">
                                                <img class="w3-cirlce" src="{{asset('img/trip/airlogo/G9.png')}}" alt="" style="height:35px;"> <br>
                                                <span class="mt-3"><b>Air Arabia</b></span>
                                            </div>
                                            <div class="col-md-2">
                                                <h4 class=""><b>10.00 am</b> <br>
                                                    <small class="">DAC</small>
                                                </h4>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fas fa-plane-departure fa-3x p-3 w3-text-indigo"></i>
                                            </div>
                                            <div class="col-md-2">
                                                 <h4 class="">
                                                     <b>11.00 pm</b> <br>
                                                     <small>LAS</small>
                                                 </h4>
                                            </div>
                                            <div class="col-md-3" style="border-left: 2px solid #27aae0;">
                                                <h4 style="text-align: center;">
                                                    <b>$1,705</b>
                                                </h4>
                                                <a href="{{route('welcome.flightDetails')}}" class="btn btn-block btn-primary">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-2">
                            <div class="w3-card card-default rounded w3-hover w3-sand w3-hover-light-gray">
                                <div class="card-body ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 w3-center">
                                                <img class="w3-cirlce" src="{{asset('img/trip/airlogo/FZ.png')}}" alt="" style="height:35px;"> <br>
                                                <span class="mt-3"><b>Fly Dubai</b></span>
                                            </div>
                                            <div class="col-md-2">
                                                <h4 class=""><b>10.00 am</b> <br>
                                                    <small class="">DAC</small>
                                                </h4>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fas fa-plane-departure fa-3x p-3 w3-text-indigo"></i>
                                            </div>
                                            <div class="col-md-2">
                                                 <h4 class="">
                                                     <b>11.00 pm</b> <br>
                                                     <small>LAS</small>
                                                 </h4>
                                            </div>
                                            <div class="col-md-3" style="border-left: 2px solid #27aae0;">
                                                <h4 style="text-align: center;">
                                                    <b>$1,705</b>
                                                </h4>
                                                <a href="{{route('welcome.flightDetails')}}" class="btn btn-block btn-primary">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-2">
                            <div class="w3-card card-default rounded w3-hover w3-sand w3-hover-light-gray">
                                <div class="card-body ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 w3-center">
                                                <img class="w3-cirlce" src="{{asset('img/trip/airlogo/GF.png')}}" alt="" style="height:35px;"> <br>
                                                <span class="mt-3"><b>Gulf Airline</b></span>
                                            </div>
                                            <div class="col-md-2">
                                                <h4 class=""><b>10.00 am</b> <br>
                                                    <small class="">DAC</small>
                                                </h4>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fas fa-plane-departure fa-3x p-3 w3-text-indigo"></i>
                                            </div>
                                            <div class="col-md-2">
                                                 <h4 class="">
                                                     <b>11.00 pm</b> <br>
                                                     <small>LAS</small>
                                                 </h4>
                                            </div>
                                            <div class="col-md-3" style="border-left: 2px solid #27aae0;">
                                                <h4 style="text-align: center;">
                                                    <b>$1,705</b>
                                                </h4>
                                                <a href="{{route('welcome.flightDetails')}}" class="btn btn-block btn-primary">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-2">
                            <div class="w3-card card-default rounded w3-hover w3-sand w3-hover-light-gray">
                                <div class="card-body ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 w3-center">
                                                <img class="w3-cirlce" src="{{asset('img/trip/airlogo/SG.png')}}" alt="" style="height:35px;"> <br>
                                                <span class="mt-3"><b>SpiceJet</b></span>
                                            </div>
                                            <div class="col-md-2">
                                                <h4 class=""><b>10.00 am</b> <br>
                                                    <small class="">DAC</small>
                                                </h4>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fas fa-plane-departure fa-3x p-3 w3-text-indigo"></i>
                                            </div>
                                            <div class="col-md-2">
                                                 <h4 class="">
                                                     <b>11.00 pm</b> <br>
                                                     <small>LAS</small>
                                                 </h4>
                                            </div>
                                            <div class="col-md-3" style="border-left: 2px solid #27aae0;">
                                                <h4 style="text-align: center;">
                                                    <b>$1,705</b>
                                                </h4>
                                                <a href="{{route('welcome.flightDetails')}}" class="btn btn-block btn-primary">Details</a>
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
</div>
