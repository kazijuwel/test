@extends('user.porto.layouts.userLayoutMaster')
@push('css')
    <style>
        .list-group-item.active {
            z-index: 2;
            font-weight: 700;
            background-color: transparent;
            color: black;
        }

        .list-group-item {
            border: none;
            color: black;
            padding: 2px;
        }
        .list-group-item a{
            list-style: none !important;
            text-decoration: none !important;
            color: black;
        }

    </style>
@endpush

@section('content')
    <div class="container p-4">
        <div class="row">
            <div class="col-md-3">
                <aside class="sidebar mt-2">
                    <h5 class="font-weight-bold">My Orders</h5>
                    <ul class="nav nav-list flex-column">
                        <li class="nav-item"><a class="nav-link "
                                href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link text-dark active"
                                href="{{  route('user.myOrder')  }}">My Orders</a></li>
                        <li class="nav-item"><a class="nav-link "
                                href="{{  route('user.editProfile')  }}">Edit Profile</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('user.editPassword') }}">Change Password</a></li>

                        <li class="nav-item"><a class="nav-link"
                                href="#">Logout</a></li>
                    </ul>
                </aside>
                {{-- <ul class="list-group">
                    <li class="list-group-item "> <a href="{{ route('user.dashboard') }}"><i class="icon-home"></i> Dashboard</a>
                        </li>
                    <li class="list-group-item active"><a href="{{ route('user.myOrder') }}"> <i class="fas fa-angle-right"></i> My Order</a></li>
                    <li class="list-group-item"><a href="{{ route('user.editProfile') }}"> <i class="fas fa-angle-right"></i> Edit Profile</a></li>
                    <li class="list-group-item"><a href="{{ route('user.editPassword') }}"> <i class="fas fa-angle-right"></i> Change Password</a></li>
                    <li class="list-group-item"><a href="#"> <i class="fas fa-angle-right"></i> Logout</a></li>
                </ul> --}}
            </div>
            <div class="col-md-9">
                <div class="row" style="margin:0;">
                    <div class="col-md-12">
                        <div class="usercontent">
                            @include('alerts.alerts')
                            <div class="myrecentorder">
                                <p style="font-weight: bold;border-bottom: 1px solid #eaeded;padding: 5px 0;">Details of Order #{{ $order->id }} <span
                                        style="float:right;cursor: pointer;padding: 0 10px;" class="ipt"
                                        onClick="window.print()" value=" Print "><i class="fa fa-print"></i></span>
                                </p>
                                <div class="ibox-content p-xl">
                                    <div id="div_print">
                                        <div class="row">
                                            <div class="col-6 invoicelefttext">
                                                <div>
                                                    <p style="margin: 0;"><img src="{{ asset('user/img/tripbeyondlogo.png') }}"
                                                            style="max-width: 150px;"></p>
                                                </div>
                                                <h5>From:</h5>
                                                <address>
                                                    <strong>From</strong><br>
                                                    <abbr title="Phone">Mobile:</abbr> {{  $user->mobile }}
                                                    <abbr title="Phone">Email:</abbr> {{ $user->email }}
                                                </address>
                                                <div>
                                                    <strong>Status: </strong>
                                                    @if ($order->status == 'pending')
                                                        <span class="badge badge-warning">Pending</span>
                                                        @elseif ($order->status == 'cancelled')
                                                            <span class="badge badge-danger">cancelled</span>
                                                    @elseif ($order->status == 'delivered')
                                                        <span class="badge badge-success">Delivered</span>
                                                        @else
                                                        {{$order->status}}
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-6 text-right invoicerighttext">
                                                <h4>Invoice No.</h4>
                                                <h4 class="text-navy">{{ $order->id }}</h4>
                                                <span>To:</span>
                                                <address>
                                                    <strong>{{ $user->username  }} </strong><br>
                                                    <br>
                                                    <abbr title="Phone">Mobile:</abbr> {{ $user->mobile  }} <br>
                                                    <abbr title="Email">Email:</abbr>
                                                    {{ $user->email }}
                                                </address>
                                                <p>
                                                    <span><strong>Invoice Date:</strong>
                                                        {{ $order->created_at->toDateString() }}</span>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="table-responsive m-t">
                                            <table class="table invoice-table table-sm table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Origin</th>
                                                        <th>Destination</th>
                                                        <th>Airline</th>
                                                        <th>DepartureTime Date</th>
                                                        <th>ArrivalTime Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($order->segments  as $segment)

                                                        <tr>
                                                            <td>
                                                                <div><strong>{{$segment['Origin']}}</strong></div>
                                                            </td>
                                                            <td>{{$segment['Destination']}}</td>
                                                            <td>{{$order->airline}}</td>
                                                            <td>{{\Carbon\Carbon::parse($segment['DepartureTime'])->format('d M,Y: H:m')}}
                                                            </td>
                                                            <td>{{\Carbon\Carbon::parse($segment['ArrivalTime'])->format('d M,Y: H:m')}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- /table-responsive -->

                                        <table class="table invoice-total">
                                            <tbody>
                                                <tr>
                                                    <td width="70%"><strong>Sub Total :</strong></td>
                                                    <td style="text-align:right;"> {{$order->prices["TotalPrice"]}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Discount :</strong></td>
                                                    <td style="text-align:right;">
                                                        0%</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>TOTAL :</strong></td>
                                                    <td style="text-align:right;"> {{$order->prices["TotalPrice"]}}</td>
                                                </tr>

                                            </tbody>
                                        </table>


                                    </div>
                                    <div>

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

@endpush
