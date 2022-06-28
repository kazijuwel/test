@extends('backend.layouts.app')

@section('content')
@php
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
@endphp
<div class="card">
      <form class="" id="sort_orders" action="" method="GET">
        <div class="card-header row gutters-5">
          <div class="col text-center text-md-left">
            <h5 class="mb-md-0 h6">{{ translate('Delivery Status') }}</h5>
          </div>
          <div class="col-lg-2">
              <div class="form-group mb-0">
                  <input type="text" class="aiz-date-range form-control" value="{{ $date }}" name="date" placeholder="{{ translate('Filter by Delivery date') }}" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
              </div>
          </div>
          <div class="col-lg-2 ml-auto">
            <select class="form-control aiz-selectpicker" name="payment_type" id="payment_type" onchange="sort_orders()">
                <option value="">{{translate('Filter by Payment Status')}}</option>
                <option value="paid"  @isset($payment_type) @if($payment_type == 'paid') selected @endif @endisset>{{translate('Paid')}}</option>
                <option value="unpaid"  @isset($payment_type) @if($payment_type == 'unpaid') selected @endif @endisset>{{translate('Un-Paid')}}</option>
            </select>
          </div>
          <div class="col-lg-2 ml-auto">
            <select class="form-control aiz-selectpicker" name="delivery_status" id="delivery_status" onchange="sort_orders()">
                <option value="">{{translate('Filter by Deliver Status')}}</option>
                <option value="pending" @isset($delivery_status) @if($delivery_status == 'pending') selected @endif @endisset>{{translate('Pending')}}</option>
                <option value="confirmed"   @isset($delivery_status) @if($delivery_status == 'confirmed') selected @endif @endisset>{{translate('Confirmed')}}</option>
                <option value="on_delivery"   @isset($delivery_status) @if($delivery_status == 'on_delivery') selected @endif @endisset>{{translate('On delivery')}}</option>
                <option value="delivered"   @isset($delivery_status) @if($delivery_status == 'delivered') selected @endif @endisset>{{translate('Delivered')}}</option>
            </select>
          </div>
          <div class="col-lg-2">
            <div class="form-group mb-0">
              <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Order code & hit Enter') }}">
            </div>
          </div>
          <div class="col-auto">
            <div class="form-group mb-0">
              <button type="submit" class="btn btn-primary">{{ translate('Filter') }}</button>
            </div>
          </div>
        </div>
    </form>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ translate('Order Code') }}</th>
                    <th>{{ translate('Order Date') }}</th>
                    <th data-breakpoints="md">{{ translate('Num. of Products') }}</th>
                    <th data-breakpoints="md">{{ translate('Customer') }}</th>
                    <th data-breakpoints="md">{{ translate('Delivery Status') }}</th>
                    <th data-breakpoints="md">{{ translate('Delivery Date') }}</th>
                    <th data-breakpoints="md">{{ translate('Payment Status') }}</th>
                    @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                        <th>{{ translate('Refund') }}</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @foreach ($orders as $key => $order)
                    <tr>
                        <td>
                            {{ ($key+1) + ($orders->currentPage() - 1)*$orders->perPage() }}
                        </td>
                        <td>
                            {{ $order->code }}
                        </td>
                        <td>{{\Carbon\Carbon::parse($order->created_at)->format('j F Y')}}</td>
                        <td class="text-center">
                            {{ count($order->orderDetails) }}
                        </td>

                        <td>
                            @if ($order->user != null)
                                {{ $order->user->name }}
                            @else
                                Guest ({{ $order->guest_id }})
                            @endif
                        </td>

                        <td>
                            @php
                            $status = $order->orderDetails->first()->delivery_status;
                            @endphp
                            
                            {{ translate(ucfirst(str_replace('_', ' ', $status))) }}
                        </td>
                        <td>
                            @if($order->delivery_date != null)
                            Befre/Or {{\Carbon\Carbon::parse($order->delivery_date)->format('j F Y')}}
                            @else
                            @endif
                        </td>
                        <td>
                            @if ($order->payment_status == 'paid')
                                <span class="badge badge-inline badge-success">{{translate('Paid')}}</span>
                            @else
                                <span class="badge badge-inline badge-danger">{{translate('Unpaid')}}</span>
                            @endif
                        </td>
                        @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                            <td>
                                @if (count($order->refund_requests) > 0)
                                    {{ count($order->refund_requests) }} {{ translate('Refund') }}
                                @else
                                    {{ translate('No Refund') }}
                                @endif
                            </td>
                        @endif
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $orders->appends(request()->input())->links() }}
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        function sort_orders(el){
            $('#sort_orders').submit();
        }
    </script>
@endsection
