@extends('admin.layouts.adminMaster')

@push('css')

    <script src="{{ asset('select2/dist/css/select2.min.css') }}"></script>

@endpush

@section('content')
    <section class="content">

        <br>
        @include('alerts.alerts')
        <div class="card card-widget">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-briefcase text-primary"></i> <span class="badge badge-light">
                           Customer Order History
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
                            <th>Total Price</th>
                            <th>Base Price</th>
                            <th>Taxes</th>
                            <th>Airline Name</th>
                            <th>Refundable</th>
                            <th>status</th>
                            <th>Stop</th>
                            <th>Customer Name</th>
                        </tr>
                        @forelse ($orders as $order)

                            <tr>
                                <td>1</td>
                                <td>
                                    <a class="btn btn-info" href="{{route('admin.customerOrdersDetails',['customer'=>$order->customer_id,'order'=>$order->id])}}">Details</a>
                                </td>

                                <td>{{ $order->segments[0]['Origin']}} </td>
                                <td>{{$order->segments[array_key_last($order->segments)]['Destination'] }}</td>
                                <td>{{Carbon\Carbon::parse($order->segments[0]['DepartureTime'] )->format('d M,Y-H:m')  }}</td>
                                <td>{{Carbon\Carbon::parse($order->segments[array_key_last($order->segments)]['ArrivalTime'] )->format('d M,Y-H:m')  }}</td>
                                <td>{{$order->prices['TotalPrice']}}</td>
                                <td>{{$order->prices['BasePrice']}}</td>
                                <td>{{$order->prices['Taxes']}}</td>
                                <td>{{ $order->airline}}</td>
                                <td>
                                    @if ($order->refundable)
                                        <span class="badge badge-success">Refundable</span>
                                    @else
                                        <span class="badge badge-danger">Not Refundable</span>
                                    @endif
                                </td>
                                <td>{{ $order->status}}</td>
                                <th>{{count($order->segments)}}</th>
                                <th>{{$order->customer ? $order->customer->name : ''}}</th>
                            </tr>
                        @empty

                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('js')



@endpush
