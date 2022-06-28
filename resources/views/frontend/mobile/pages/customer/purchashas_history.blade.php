@extends('frontend.mobile.layout.app')
@section('content')
@section('css')
<style>
    .card .card-body {
    /* padding: 20px 25px; */
    /* border-radius: 4px; */
}
</style>
@endsection
<main class="app-content">
    @include('frontend.mobile.partials.search')
    <!---End Header-->
    <hr class="divider">
    <section>
        <div class="card">
            <div class="card-body">
                @include('frontend.mobile.pages.userdetails')
                @include('frontend.mobile.layout.dashboardlink')
            </div>
          </div>
   </section>
    <hr class="divider">
    <section class="padding-around">
       
            <div class="card mt-2">
               <div class="card-header">
                   <p><strong>Purchase History</strong></p>
               </div>
                   <div class="card-body">
                       <div style="overflow: auto;">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>{{ translate('Code')}}</th>
                                    <th>{{ translate('Date')}}</th>
                                    <th>{{ translate('Amount')}}</th>
                                    <th >{{ translate('Delivery Status')}}</th>
                                    <th >{{ translate('Payment Status')}}</th>
                                    <th class="text-right">{{ translate('Options')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($orders as $key => $order)
                                    @if (count($order->orderDetails) > 0)
                                    
                                        <tr>
                                            <td>
                                                <a href="#{{ $order->code }}" onclick="show_purchase_history_details({{ $order->id }})">{{ $order->code }}</a>
                                            </td>
                                            <td >{{ date('d-m-Y', $order->date) }}</td>
                                            <td>
                                                {{ single_price($order->grand_total) }}
                                            </td>
                                            <td>
                                                {{ translate(ucfirst(str_replace('_', ' ', $order->orderDetails->first()->delivery_status))) }}
                                                @if($order->delivery_viewed == 0)
                                                    <span class="ml-2" style="color:green"><strong>*</strong></span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($order->payment_status == 'paid')
                                                    <span class="badge badge-inline badge-success">{{translate('Paid')}}</span>
                                                @else
                                                    <span class="badge badge-inline badge-danger">{{translate('Unpaid')}}</span>
                                                @endif
                                                @if($order->payment_status_viewed == 0)
                                                    <span class="ml-2" style="color:green"><strong></strong></span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                @if ($order->orderDetails->first()->delivery_status == 'pending' && $order->payment_status == 'unpaid')
                                                    <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('orders.destroy', $order->id)}}" title="{{ translate('Cancel') }}">
                                                       <i class="fa fa-trash"></i>
                                                   </a>
                                                @endif
                                                <a href="javascript:void(0)" class="btn btn-soft-info btn-icon btn-circle btn-sm" onclick="show_purchase_history_details({{ $order->id }})" title="{{ translate('Order Details') }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-soft-warning btn-icon btn-circle btn-sm" href="{{ route('customer.invoice.download', $order->id) }}" title="{{ translate('Download Invoice') }}">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @else
                                    
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="aiz-pagination">
                                {{ $orders->links() }}
                          </div>
                        </div>
                   </div>
             </div>
    </section>



   <!--start footer-->
   </main>

@endsection