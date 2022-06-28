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
                           Agent Order History ({{$order->id}})
                        </span>
                </h3>
            </div>
            <div class="card-body" style="white-space: nowrap;">
                <p><b>Agent Id</b>: {{$order->customer ? $order->customer->name : ''}}</p>
                <p> <b>Origin</b>: {{ $order->segments[0]['Origin']}} </p>
                <p><b>Destination</b>: {{$order->segments[array_key_last($order->segments)]['Destination'] }}</p>
                <p><b>DepartureTime</b>: {{Carbon\Carbon::parse($order->segments[0]['DepartureTime'] )->format('d M,Y-H:m')  }} </p>
                <p> <b>ArrivalTime</b>: {{Carbon\Carbon::parse($order->segments[array_key_last($order->segments)]['ArrivalTime'] )->format('d M,Y-H:m')  }}</p>
                <p><b>Total Price</b>: {{$order->prices['TotalPrice']}}</p>
                <p><b>Base Price</b>: {{$order->prices['BasePrice']}}</p>
                <p> <b>Taxes</b>: {{$order->prices['Taxes']}}</p>
                <p><b>Airline Name</b>: {{ $order->airline}}</p>
                <p><b>Refundable</b>:
                    @if ($order->refundable)
                        <span class="badge badge-success">Refundable</span>
                    @else
                        <span class="badge badge-danger">No Refundable</span>
                    @endif
                </p>
                <p><b>status</b>: {{$order->status}}</p>
                @if ($order->image)
                    <img class="img-fluid" src={{asset('storage/ticket/') ."/". $order->image}}  alt="">
                @endif
                <div class="airlineDetails">
                    <div class="row">

                        <div class="col-12 col-md-12">
                            @foreach($order->segments as $segment)
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <p><b>Origin: </b> {{$segment['Origin']}} </p>
                                            <p><b>ArrivalTime: </b> {{$segment['ArrivalTime']}}</p>
                                        </div>
                                        <div class="col-12 col-md-4">
                                           <p> <b>Destination: </b> {{$segment['Destination']}}</p>
                                           <p> <b>DepartureTime: </b> {{$segment['DepartureTime']}}</p>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <p><b>FlightTime: </b> {{$segment['FlightTime']}}</p>
                                            <p><b>FlightNumber: </b> {{$segment['FlightNumber']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <form action="{{route('admin.customerOrderStatusUpdate',['customer'=>$order->customer_id,'order'=>$order->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <select name="status" id="status" class="form-control">
                            @if ($order->status == 'pending')
                                <option {{$order->status == 'confirmed' ? 'selected' : ''}} value="confirmed">Confirmed</option>
                                <option {{$order->status == 'cancelled' ? 'selected' : ''}} value="cancelled">Cancelled</option>
                            @elseif ($order->status == 'confirmed')
                                <option {{$order->status == 'delivered' ? 'selected' : ''}} value="delivered">Delivered</option>
                            @endif
                            {{--                            <option {{$order->status == 'pending' ? 'selected' : ''}} value="">Select Option</option>--}}


                        </select>
                    </div>
                    @if ($order->status == 'confirmed')
                        <div class="form-group">
                            <label for="status">Upload Ticket</label>
                            <input type="file" name="ticket">
                            <label for="status">Update Status</label>
                        </div>
                    @endif

                    <div class="form-group">
                        <input type="submit" value="Update Status" {{$order->status == 'delivered' ? 'disabled' : ''}}  class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection


@push('js')



@endpush
