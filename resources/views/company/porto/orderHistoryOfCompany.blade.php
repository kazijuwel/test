@extends('company.layouts.companyMaster')

@push('css')
    <style>
        ::-webkit-scrollbar {
            background: grey;
            height: 5px;
        }
        ::-webkit-scrollbar-thumb {
            background: black;
        }
    </style>
@endpush

@section('content')
    <section class="content">
        <br>
        <div class="col-sm-12">
            @include('alerts.alerts')
            <div>
            </div>
            <div class="card card-widget">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-briefcase text-primary"></i> <span class="badge badge-light">
                            Order History
                        </span>
                    </h3>
                </div>
                <div class="card-body" style="white-space: nowrap;">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Sl</th>
                                <th>Action</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>DepartureTime</th>
                                <th>ArrivalTime</th>
                                <th>Flight Price</th>
                                <th>Return Flight Price</th>
                                <th>Passenger Count</th>
                                <th>Taxes</th>
                                <th>Return Flight Tax</th>
                                <th>Final Total Price</th>
                                <th>Airline Name</th>
                                <th>Refundable</th>
                                <th>status</th>
                                <th>Ticket Download</th>
                            </tr>
                            @forelse ($agentOrders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>
                                        <a href="{{ route('company.orderDetailsOfCompany',['company'=>$company->id,'order'=>$order->id]) }}" class="btn btn-success">Details</a>
                                    </td>
                                    <td>{{ getCity(json_decode($order->segments)[0][0]->Origin)}} ({{json_decode($order->segments)[0][0]->Origin}})</td>
                                    <td>{{ getCity(json_decode($order->segments)[0][0]->Destination)}} ({{json_decode($order->segments)[0][0]->Destination}})</td>
                                    <td>{{ flighDateTime(json_decode($order->segments)[0][0]->DepartureTime)}}</td>
                                    <td>{{ flighDateTime(json_decode($order->segments)[0][array_key_last(json_decode($order->segments)[0])]->ArrivalTime)}}</td>
                                    <td>{{ json_decode($order->prices)[0]->TotalPrice}} </td>
                                    <td>@if($order->return_flight)
                                            {{ json_decode($order->prices)[1]->TotalPrice}}
                                            @endif
                                    </td>
                                    <td>{{ $order->passengerCount()}}</td>
                                    <td>{{ json_decode($order->prices)[0]->Taxes}} </td>
                                    <td>
                                        @if($order->return_flight)
                                            {{ json_decode($order->prices)[1]->Taxes}}
                                        @endif
                                    </td>
{{--                                    <td>{{flight_price_to_currency(json_decode($order->prices)[0]->TotalPrice). string_to_int(json_decode($order->prices)[0]->TotalPrice) * $order->passengerCount()}} </td>--}}
                                    <td>{{ $order->finalPrice }} </td>
                                    <td>{{json_decode($order->airline)[0]}} </td>
                                    <td>@if (json_decode($order->refundable)[0])
                                            <span class="text-success">
                                            Refundable
                                        </span>
                                        @else
                                            <span class="text-danger">
                                            Not Refundable
                                        </span>
                                        @endif </td>
                                    <td>{{$order->status}} </td>
                                    <td>
                                        @if ($order->ticket)
                                         <a href="{{asset('storage/ticket/') ."/". $order->ticket}}" @class('badge badge-success')>Download Ticket</a>
                                            @endif

                                            @if ($order->return_ticket)
                                                <a href="{{asset('storage/ticket/') ."/". $order->return_ticket}}" @class('badge badge-success')>Download return Ticket</a>
                                            @endif
                                    </td>


                                </tr>
                            @empty

                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>
@endpush
