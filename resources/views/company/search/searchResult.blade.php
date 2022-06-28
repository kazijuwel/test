@extends('company.layouts.companyMaster')

@push('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.4/sweetalert2.min.css"></script>
    <style>
        .flight-info {
            display: block;
            color: grey;
            font-size: 90%;
            line-height: 20px;
        }
        .horizontal-scrollable > li {
            overflow-x: auto;
            white-space: nowrap;
        }
        .airlineNameBox{
            text-transform: capitalize !important;
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
            .segmentHeader{
                display: grid; grid-template-columns: 20% 50% 30%; grid-column-gap: 10px; padding: 30px 20px;
            }

        }
        /*        @media only screen and (max-width: 575px) {*/
        /*.segmentHeader{*/
        /*    display: grid;*/
        /*    grid-template-columns: ;*/
        /*}*/
        /*        }*/
        @media only screen and (max-width: 991px) {
            .segmentHeader{
                display: grid;
                grid-template-rows: auto auto auto;
                grid-template-columns:100%  !important;
            }
            .airportWithCode{
                justify-content: left !important;
                flex-direction: row !important;
            }
            .flightrow{
                display: flex;
                justify-content:space-between !important;
                padding-top: 5px;
                padding-bottom: 5px;
            }
            .priceAndBook{
                justify-content:space-between !important;
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
        .radioContainer{
            font-size: 14px;
        }
        input.cabinClass{
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        input.cabinClass:checked{
            content: none;
        }
        .secondary-btn{
            background-color: #0077d7 !important;
            color: #fff;
            padding: 13px 28px;
            border-radius: 10px;
        }
        .secondary-btn:focus {
            outline:none;
        }
        .dropdown-item{
            padding: 12px 15px;

        }
        .passengerDropdown .dropdown-item{
            background-color: transparent;
            color: black;

        }
        .passengerDropdown .dropdown-item:hover{
            background-color: #e5f1fb;
            color: #1481da;
        }
        .passengerDropdown .dropdown-item:active,.passengerDropdown .dropdown-item:focus{
            background-color: transparent;
            color: black;

        }
        .labelDesign{
            color:  #0077d7!important;
            font-weight: 600;
        }
        /*input Design*/
        span#select2-user-container {
            border: none;
            outline: none;
        }
    </style>
    <style>
        .towayHeader{
            display: grid;
            grid-template-rows: auto auto;
            row-gap: 15px;
        }

        .depart{
            background-color: #e5f1fb;
            color: #002441;
            font-size: 13px;
            border-radius: 3px;
            padding: 5px 5px;
        }
        .flightLogo2{
            width: 100%;
            height: 16px;
            display: block;
            position: absolute;
            top: 21px;
            left: -3px;
            background: url(https://bd.flyhub.com/Content/lib/img/icons/Flight-Go-Blue.svg) no-repeat left center;
        }
        .partTwo{
            display: grid;
            grid-template-columns:  45% 10% 45%  ;
        }
        .card{
            margin: 15px 20px;
        }
    </style>
@endpush

@section('content')
    @include('alerts.alerts')
    <section class="content">
        <br>
        <div class="row">
            <div class="col-sm-12">
                @include('alerts.alerts')
                <div class="card">
                    <div class="card-header">
                        <form action="{{route('airSearch',['usertype'=>'agent'])}}" method="GET" id="airSearch">
                            <input type="hidden" name="company" value="{{$company->id}}">
                            <div class="d-flex">
                                <div class="mx-2 radioContainer">
                                    <label for="oneWay" @class('labelDesign')>
                                        <input type="radio" id="oneWay" name="oneWay" value="oneway" checked> ONE-WAY
                                    </label>
                                </div>
                                <div class="mx-2 radioContainer">
                                    <label for="towWay">
                                        <input type="radio" id="towWay" name="oneWay" value="twoway"> RETURN FLIGHT
                                    </label>
                                </div>
                                <div class="mx-2 d-flex align-items-center" style="color: #7c7c7c;">
                                    For
                                </div>
                                <div class="mx-2 passengerDropdown d-flex align-items-center">
                                    <div class="dropdown show">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Passengers
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item d-flex justify-content-between" href="javascript:void(0)">
                                                <span>Adult</span>
                                                <input type="number" min="1" value="1" name="adult" width="30px">

                                            </a>
                                            <a class="dropdown-item d-flex justify-content-between" href="javascript:void(0)">
                                                <span>Child <small>2-12 years</small></span>
                                                <input type="number" min="1" name="children" width="30px">
                                            </a>
                                            <a class="dropdown-item d-flex justify-content-between" href="javascript:void(0)">
                                                <span>Infant <span>0-2 years</span></span>
                                                <input type="number" min="1" name="Infant" width="30px">
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="mx-2 d-flex align-items-center" style="color: #7c7c7c;">
                                    In
                                </div>


                                <div class="mx-2 passengerDropdown d-flex align-items-center">
                                    <div class="dropdown show">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Cabin Class
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item d-flex justify-content-between cabin" href="javascript:void(0)">
                                                <label for="Economy"><input type="radio" value="Economy" id="Economy" @class('cabinClass') name="cabinClass" > Economy</label>
                                            </a>
                                            <a class="dropdown-item d-flex justify-content-between" href="javascript:void(0)">
                                                <label for="Premium_Economy"><input type="radio" value="Premium Economy" id="Premium_Economy" @class('cabinClass') name="cabinClass" > Premium Economy</label>
                                            </a>
                                            <a class="dropdown-item d-flex justify-content-between" href="javascript:void(0)">
                                                <label for="Business"><input type="radio" value="Business" id="Business" @class('cabinClass') name="cabinClass" > Business</label>
                                            </a>
                                            <a class="dropdown-item d-flex justify-content-between form-check active" href="javascript:void(0)">
                                                <label for="First_Class"><input type="radio" value="First Class" id="First_Class" @class('cabinClass') name="cabinClass" > First Class</label>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filghtSearchArea">
                                <div class="form-group">
                                    <label for="from" class="label">From</label>
                                    <select id="user" name="from" role="textbox"
                                            class="form-control user-select select2-container step2-select select2"
                                            data-placeholder="Select City" data-ajax-url="{{ route('welcome.tripSearchAjax2') }}"
                                            data-ajax-cache="true" data-ajax-dataType="json" data-ajax-delay="200" style="">
                                        <option value="DAC" selected>DHAKA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="to" class="label">To</label>
                                    <select id="modal-container" name="to" class="seleect5 search form-control"
                                            data-placeholder="Select City" data-ajax-url="{{ route('welcome.tripSearchAjax2') }}"
                                            data-ajax-cache="true" data-ajax-dataType="json" data-ajax-delay="200" style="">
                                        <option value="JED" selected>Jedda</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="departs">Departure Date</label>
                                    <input type="date" name="departs" id="departs" class="form-control" placeholder="Date" value="{{\Carbon\Carbon::tomorrow()->format('Y-m-d')}}" id="">
                                </div>
                                <div class="form-group returnAppend">

                                </div>
                            </div>
                            <div class="submit">
                                <button class="hal-btn secondary-btn  with-right-icon" id="airSerchBtn" type="submit">
                                    Search Flights &nbsp;
                                    <img src="https://bd.flyhub.com/Content/lib/img/icons/white-plain.svg" alt="">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="fly" style="text-align: center; display: none">
            <img src="{{asset('img/fly.gif')}}" alt="" style="width: 100%;">
        </div>
        <div id="searchData">

            <?php $tabKey =0; ?>
            @foreach($allAvailableFlights as $key=> $flight)
                @if (count($flight['Segments']) == 2)
                        @include('agency.ajax.towWayFlightSearchAjax')
                    @else
                        @include('agency.ajax.flightSearchAjax')
                @endif

                    <?php $tabKey++; ?>
            @endforeach
        </div>


    </section>

@endsection

@push('js')
    <script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.4/sweetalert2.min.js"></script>
    <script>

        var allFlights = @json($allAvailableFlightJson);
        var flightJson = JSON.parse(@json($allAvailableFlightJson));

    </script>
    <script>
        $(document).on('click', '.flightDetailBtn', function (e) {
            var that = $(this);
            that.closest('.card').find('.card-footer').slideToggle();
        });
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $(document).on('click', '.flightDetails', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var key = $(this).attr('data-key');

            submit(url, 'GET', [
                {name: 'json', value:encodeURIComponent(JSON.stringify(flightJson[key]))},

            ]);
            function submit(action, method,values) {
                var form = $('<form/>', {
                    action: action,
                    method: method
                });
                $.each(values, function () {
                    form.append($('<input/>', {
                        type: 'hidden',
                        name: this.name,
                        value: this.value
                    }));
                });
                form.appendTo('body').submit();
            }
        });
    </script>
    <script>
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
                            obj.id = obj.Code || obj.Code;
                            return obj;
                        });
                        var data = $.map(data, function (obj) {
                            obj.text = obj.name;
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
                            obj.id = obj.Code || obj.Code;
                            return obj;
                        });
                        var data = $.map(data, function (obj) {
                            obj.text = obj.name;
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
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).on('click','#airSerchBtn',function (){
            $('.loaderIs').show();
        });
        $('input[type="radio"]').on('click change', function(e) {
            var that= $(this);
            var value= that.val();
            if (value == 'oneway'){

                $('label').removeClass('labelDesign');
                that.closest('label').addClass('labelDesign');
                $('.returnAppend').html('');

            }else if(value == 'twoway'){
                $('label').removeClass('labelDesign');
                that.closest('label').addClass('labelDesign');
                var returnForm= '<label for="return">Returning Date</label><input type="date" name="return" id="return" class="form-control" placeholder="Date"  id="return">';
                $('.returnAppend').html(returnForm);
            }
        });
    </script>
@endpush
