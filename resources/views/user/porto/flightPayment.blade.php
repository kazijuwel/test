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

        li.nav-item.active a.nav-link {
            color: #08C;
        }

        /* li.nav-item.active {
            border-bottom: 2px solid;
            color: #08C;
        } */

        li.nav-item a.nav-link {
            color: black;
            font-weight: 700;
        }

        .nav-tabs li .nav-link,
        .nav-tabs li .nav-link:hover {
            border: none !important;
            background-color: transparent !important;
            color: #08c;
        }

        li.nav-item a.nav-link.active {
            border-bottom: 2px solid;
            color: #08C;
        }
        .nav-tabs li.active .nav-link, .nav-tabs li.active .nav-link:hover, .nav-tabs li.active .nav-link:focus{
            color: #08C;
     
        }

    </style>
@endpush
@section('content')
    <div role="main" class="main margin-start">

        {{-- {{ $ticket->id }} --}}
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
                    <p class="btn w3-btn-secondary w3-round-xlarge w3-text-black" style="background-color: #afb7be;">1</p>
                    <p class=" btn font-weight-bold w3-text-black">Passenger Details</p>


                    <p class="btn btn-tarek w3-round-xlarge w3-text-black">2</p>
                    <p class=" btn font-weight-bold w3-text-black">Payments</p>

                    <p class="btn w3-btn-secondary w3-round-xlarge w3-text-black" style="background-color: #afb7be;">3</p>

                    <p class=" btn font-weight-bold w3-text-black">Receipt</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="row pt-3">
                        <div class="col-md-12">
                            <div class="card">
                                <center>
                                    <p style="margin: 0;padding: 5px;background: #232f3e;color: white;font-size: 20px;">
                                        Payment Method</p>
                                </center>
                                <div class="card-header">
                                    <h3>SELECT PAYMENT METHOD</h3>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="nav-tab-id">
                                        <li class="nav-item active">
                                            <a class="nav-link" data-toggle="pill" href="#online"
                                                style="text-decoration: none;">Online Payment</a>
                                        </li>

                                        <li class="nav-item ">
                                            <a class="nav-link" style="text-decoration: none;" data-toggle="pill"
                                                href="#balance">My Wallet</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" style="text-decoration: none;" data-toggle="pill"
                                                href="#hc">Hand Cash</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" style="text-decoration: none;" data-toggle="pill"
                                                href="#bkash">bKash</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" style="text-decoration: none;" data-toggle="pill"
                                                href="#nagad">Nagad</a>
                                        </li>

                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane container active bg-light" id="online">
                                            <div class="p-5">
                                              <a href="#" class="btn btn-info py-2 px-3" style="font-size: 25px">Pay Online Now</a>
                                            </div>
                                        </div>
                                        <div class="tab-pane container" id="balance">
                                            <div class="p-3 bg-light">
                                                <div class="mybalanetotal">
                                                    <p>My Balance Total (BDT)
                                                    </p>
                                                    <div class="mt-3">  <a href="#" class="btn btn-info py-2 px-3" style="font-size: 25px">700</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane container fade" id="hc">
                                            <div class="p-5 bg-light w3-center ">
                                                <a href="#" class="btn btn-info py-2 px-3" style="font-size: 25px">Cash</a>
                                            </div>
                                        </div>
                                        <div class="tab-pane container fade" id="bkash">

                                            <div class="p-5 bg-light">

                                                <div class="row">
                                                    <div class="col-sm-6 m-auto">
                                                        <div class="usercontent">
                                                            <div class="myrecentorder">
                                                                @include('alerts.alerts')
                                                                <p
                                                                    style="font-weight: bold;border-bottom: 1px solid #eaeded;padding: 5px 0;">
                                                                    Make Payment to bKash </p>
                                                                <div>
                                                                    <form method="POST" action="{{ route('welcome.createFlightTicketPayment') }}">
                                                                        @csrf
                                                                        <input type="hidden" name="payment_type" value="bkash">
                                                                        <input type="hidden" name="ticket" value="{{ $ticket->id }}">
                                                                        <input type="hidden" name="fs" value="{{ $flight->id}}">
                                                                        <div class="form-group ">
                                                                            <label for="paid_amount"
                                                                                class="">Paid Amount
                                                                                ({{ $flight->price}})</label>
                                                                            @if ($errors->has('paid_amount'))
                                                                                <p style="color: red;margin: 0;">
                                                                                    {{ $errors->first('paid_amount') }}
                                                                                </p>
                                                                            @endif
                                                                            <input type="number" class="form-control"
                                                                                value="" name="paid_amount"
                                                                                placeholder="Paid Amount">
                                                                        </div>

                                                                        <div class="form-group ">
                                                                            <label for="account_number"
                                                                                class="">Sender Personal
                                                                                Number</label>
                                                                            @if ($errors->has('account_number'))
                                                                                <p style="color: red;margin: 0;">
                                                                                    {{ $errors->first('account_number') }}
                                                                                </p>
                                                                            @endif
                                                                            <input type="text" class="form-control"
                                                                                name="account_number"
                                                                                placeholder="bKash Mobile Number">
                                                                        </div>

                                                                        <div class="form-group ">
                                                                            <label for="" class="">Note with
                                                                                Transaction ID</label>
                                                                            @if ($errors->has('transaction_id'))
                                                                                <p style="color: red;margin: 0;">
                                                                                    {{ $errors->first('note') }}</p>
                                                                            @endif
                                                                            <input type="note" class="form-control"
                                                                                name="transaction_id"
                                                                                placeholder="Note with Transaction ID">
                                                                        </div>

                                                                        <div class="form-group ">
                                                                            <div class="">

                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    {{-- <div class="col-sm-6">
                                                        <div class="usercontent">
                                                            <div class="myrecentorder">
                                                                @include('alerts.alerts')
                                                                <p
                                                                    style="font-weight: bold;border-bottom: 1px solid #eaeded;padding: 5px 0;">
                                                                    Please use following steps to pay bKash: </p>
                                                                <div>

                                                                    1. Go to bKash Menu by dialing *247# <br>
                                                                    2. Choose 'Payment' option by pressing '3' <br>
                                                                    3. Enter our Merchant wallet number :
                                                                    <b>
                                                                        01407063353 <br>
                                                                    </b>
                                                                    4. Enter BDT. <b>
                                                                        6. Enter the counter number : 1 <br>
                                                                        7. Now enter your PIN to confirm: xxxx <br>
                                                                        8. Done!

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div> --}}
                                                </div>

                                            </div>

                                        </div>
                                        <div class="tab-pane container fade" id="nagad">

                                            <div class="p-5 bg-light">

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="nagadcontent">
                                                            <div class="myrecentorder">
                                                                @include('alerts.alerts')
                                                                <p
                                                                    style="font-weight: bold;border-bottom: 1px solid #eaeded;padding: 5px 0;">
                                                                    Make Payment to Nagad </p>
                                                                <div>
                                                                    <form method="POST" action="#">

                                                                        @csrf
                                                                        <input type="hidden" name="nagad" value="nagad">
                                                                        <div class="form-group ">
                                                                            <label for="paid_amount"
                                                                                class="">Paid Amount
                                                                                (BDT)</label>
                                                                            @if ($errors->has('paid_amount'))
                                                                                <p style="color: red;margin: 0;">
                                                                                    {{ $errors->first('paid_amount') }}
                                                                                </p>
                                                                            @endif
                                                                            <input type="number" class="form-control"
                                                                                value="" name="paid_amount"
                                                                                placeholder="Paid Amount">
                                                                        </div>

                                                                        <div class="form-group ">
                                                                            <label for="account_number"
                                                                                class="">Sender Number</label>
                                                                            @if ($errors->has('account_number'))
                                                                                <p style="color: red;margin: 0;">
                                                                                    {{ $errors->first('account_number') }}
                                                                                </p>
                                                                            @endif
                                                                            <input type="text" class="form-control"
                                                                                name="account_number"
                                                                                placeholder="Nagad Mobile Number">
                                                                        </div>

                                                                        <div class="form-group ">
                                                                            <label for="" class="">Note with
                                                                                Transaction ID</label>
                                                                            @if ($errors->has('note'))
                                                                                <p style="color: red;margin: 0;">
                                                                                    {{ $errors->first('note') }}</p>
                                                                            @endif
                                                                            <input type="note" class="form-control"
                                                                                name="note"
                                                                                placeholder="Note with Transaction ID">
                                                                        </div>

                                                                        <div class="form-group ">
                                                                            <div class="">

                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="col-sm-6">


                                                        <div class="nagadcontent">
                                                            <div class="myrecentorder">
                                                                @include('alerts.alerts')
                                                                <p
                                                                    style="font-weight: bold;border-bottom: 1px solid #eaeded;padding: 5px 0;">
                                                                    Follow the steps below to make ‘Nagad’ payment: </p>
                                                                <div>
                                                                    ‘Nagad’ payment via USSD: <br>

                                                                    – Dial *167# <br>

                                                                    – Press 4 from the menu to select payment <br>

                                                                    – Type the Merchant Account Number 01407063353<br>

                                                                    – Type the amount <br>

                                                                    – Type the counter number <br>

                                                                    – Type the reference <br>

                                                                    – Type PIN <br>

                                                                    – Receive confirmation SMS at the end of payment <br>

                                                                    <br>
                                                                    ‘Nagad’ payment via app: <br>

                                                                    – Log in to Nagad App <br>

                                                                    – Click the Merchant Pay button <br>

                                                                    – Type the Merchant Account Number 01407063353 <br>

                                                                    – Type the amount <br>

                                                                    – Type reference and PIN <br>

                                                                    – Tap & hold <br>

                                                                    – Receive confirmation SMS at the end of payment <br>

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
                                        </div>

                                        <div class="col-sm-6">

                                            <div class="row pt-3">
                                                <div class="text-right">
                                                    <p>${{ $flight->price }} x 1</p>
                                                </div>

                                            </div>

                                            <div class="row pt-3">
                                                <div class="text-right">
                                                    <p>${{ $flight->price }}</p>
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
                                                        ${{ $flight->price }} </p>
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
