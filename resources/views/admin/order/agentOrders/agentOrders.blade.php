@extends('admin.layouts.adminMaster')

@push('css')

    <script src="{{ asset('select2/dist/css/select2.min.css') }}"></script>
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
        @include('alerts.alerts')
        <div class="card card-widget">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-briefcase text-primary"></i> <span class="badge badge-light">
                           Agent Order History
                        </span>
                </h3>
            </div>
            <div class="card-body" style="white-space: nowrap;">
                <div class="table-responsive">

                   <table class="table table-striped">
                       <tr>
                           <th>Sl</th>
                            <th>Action</th>
                           <th>Agent</th>
                           <th>Origin</th>
                           <th>Destination</th>
                           <th>DepartureTime</th>
                           <th>ArrivalTime</th>
                           <th>Flight Price</th>
                           <th>Return Flight Price</th>
                           <th>Passenger Count</th>
                           <th>Taxes</th>
                           <th>Return Flight Tax</th>
                           <th>Total Price</th>
                           <th>Airline Name</th>
                           <th>Refundable</th>
                           <th>status</th>
{{--                           <th>Ticket Download</th>--}}
                       </tr>
                       @forelse ($orders as $order)
                           <tr>
                               <td>{{$order->id}}</td>
                               <td>
                                   <a class="btn btn-info" href="{{route('admin.agentOrdersDetails',['agent'=>$order->user_id,'order'=>$order->id])}}">Details</a>
                               </td>
                               <td>{{$order->agent ? $order->agent->username : ''}}</td>
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
                               <td>{{ $order->finalPrice }}</td>
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
{{--                               <td>--}}
{{--                                   @if ($order->ti)--}}
{{--                                       <span class="badge badge-success"> <a href="{{asset('storage/ticket/')."/".$order->image}}" >Download Ticket</a></span>--}}
{{--                                   @else--}}
{{--                                       <span class="badge badge-danger">Ticket Not Ready Yet</span>--}}
{{--                                   @endif--}}
{{--                               </td>--}}


                           </tr>
                       @empty

                       @endforelse
                   </table>
{{--                    <table class="table table-striped">--}}
{{--                        <tr>--}}
{{--                            <th>Sl</th>--}}
{{--                            <th>Action</th>--}}
{{--                            <th>Origin</th>--}}
{{--                            <th>Destination</th>--}}
{{--                            <th>DepartureTime</th>--}}
{{--                            <th>ArrivalTime</th>--}}
{{--                            <th>Total Price</th>--}}
{{--                            <th>Base Price</th>--}}
{{--                            <th>Taxes</th>--}}
{{--                            <th>Airline Name</th>--}}
{{--                            <th>Refundable</th>--}}
{{--                            <th>status</th>--}}
{{--                            <th>Agent Name</th>--}}
{{--                        </tr>--}}
{{--                        @forelse ($orders as $order)--}}

{{--                            <tr>--}}
{{--                                <td>1</td>--}}
{{--                                <td>--}}
{{--                                    <a class="btn btn-info" href="{{route('admin.agentOrdersDetails',['agent'=>$order->agent_id,'order'=>$order->id])}}">Details</a>--}}
{{--                                </td>--}}
{{--                                <td>{{ $order->OriginCity}} ({{$order->Origin}})</td>--}}
{{--                                <td>{{ $order->DestinationCity}} ({{$order->Destination}})</td>--}}
{{--                                <td>{{ $order->DepartureTime}} </td>--}}
{{--                                <td>{{ $order->ArrivalTime}} </td>--}}
{{--                                <td>{{$order->TotalPrice}}</td>--}}
{{--                                <td>{{$order->BasePrice}}</td>--}}
{{--                                <td>{{$order->Taxes}}</td>--}}
{{--                                <td>{{ $order->Airline}}</td>--}}
{{--                                <td>--}}
{{--                                    @if ($order->Refundable)--}}
{{--                                        <span class="badge badge-success">Refundable</span>--}}
{{--                                    @else--}}
{{--                                        <span class="badge badge-danger">No Refundable</span>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td>{{ $order->status}}</td>--}}
{{--                                <th>{{$order->agent_id}}</th>--}}
{{--                            </tr>--}}
{{--                        @empty--}}

{{--                        @endforelse--}}
{{--                    </table>--}}
                </div>
            </div>
        </div>
    </section>
@endsection


@push('js')



@endpush
