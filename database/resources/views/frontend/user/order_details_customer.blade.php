<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{ translate('Order id')}}: {{ $order->code }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
</div>

@php
    $status = $order->orderDetails->first()->delivery_status;
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
@endphp

<div class="modal-body gry-bg px-3 pt-3">
    <div class="py-4">
        <div class="row gutters-5 text-center aiz-steps">
            <div class="col @if($status == 'pending') active @else done @endif">
                <div class="icon">
                    <i class="las la-file-invoice"></i>
                </div>
                <div class="title fs-12">{{ translate('Order placed')}}</div>
            </div>
            <div class="col @if($status == 'confirmed') active @elseif($status == 'on_delivery' || $status == 'delivered') done @endif">
                <div class="icon">
                    <i class="las la-newspaper"></i>
                </div>
              <div class="title fs-12">{{ translate('Confirmed')}}</div>
            </div>
            <div class="col @if($status == 'on_delivery') active @elseif($status == 'delivered') done @endif">
                <div class="icon">
                    <i class="las la-truck"></i>
                </div>
                <div class="title fs-12">{{ translate('On delivery')}}</div>
            </div>
            <div class="col @if($status == 'delivered') done @endif">
                <div class="icon">
                    <i class="las la-clipboard-check"></i>
                </div>
                <div class="title fs-12">{{ translate('Delivered')}}</div>
            </div>
        </div>
    </div>


    <div class="card mt-4">
        <div class="card-header">
          <b class="fs-15">{{ translate('Order Summary') }}</b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <table class="table table-borderless">
                        <tr>
                            <td class="w-50 fw-600">{{ translate('Order Code')}}:</td>
                            <td>{{ $order->code }}</td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">{{ translate('Customer')}}:</td>
                            <td>{{ json_decode($order->shipping_address)->name }}</td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">{{ translate('Email')}}:</td>
                            @if ($order->user_id != null)
                                <td>{{ $order->user->email }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">{{ translate('Shipping address')}}:</td>
                            <td>{{ json_decode($order->shipping_address)->address }}, {{ json_decode($order->shipping_address)->city }}, {{ json_decode($order->shipping_address)->postal_code }}, {{ json_decode($order->shipping_address)->country }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <table class="table table-borderless">
                        <tr>
                            <td class="w-50 fw-600">{{ translate('Order date')}}:</td>
                            <td>{{\Carbon\Carbon::parse($order->date)->format('j F Y, h:i A')}}</td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">{{ translate('Delivery date')}}:</td>
                            <td>@if($order->delivery_date != null)
                            {{\Carbon\Carbon::parse($order->delivery_date)->format('j F Y')}}
                            @else
                            @endif</td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">{{ translate('Order status')}}:</td>
                            <td>{{ translate(ucfirst(str_replace('_', ' ', $status))) }}</td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">{{ translate('Total order amount')}}:</td>
                            <td>{{ single_price($order->grand_total) }}</td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">{{ translate('Shipping method')}}:</td>
                            <td>{{ translate('Flat shipping rate')}}</td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">{{ translate('Payment method')}}:</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $order->payment_type)) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div class="card mt-4">
                <div class="card-header">
                  <b class="fs-15">{{ translate('Order Details') }}</b>
                </div>
                <div class="card-body pb-0">
                    <table class="table table-borderless table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="30%">{{ translate('Product')}}</th>
                                <th>{{ translate('Variation')}}</th>
                                <th>{{ translate('Quantity')}}</th>
                                <th>{{ translate('Delivery Type')}}</th>
                                <th>{{ translate('Delivery Status')}}</th>
                                <th>{{ translate('Price')}}</th>
                                @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                                    <th>{{ translate('Refund')}}</th>
                                @endif
                                @if($status == 'delivered')
                                <th>{{ translate('Product Received?')}}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $subtotal = 0;
                        @endphp
                            @foreach ($order->orderDetails as $key => $orderDetail)
                                @php
                                    $subtotal +=round(((($orderDetail->price+ $orderDetail->commision)/$orderDetail->quantity)+ $orderDetail->shipping_cost ) * $orderDetail->quantity);
                                @endphp
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        @if ($orderDetail->product != null)
                                            <a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank">{{ $orderDetail->product->getTranslation('name') }}</a>
                                        @else
                                            <strong>{{  translate('Product Unavailable') }}</strong>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $orderDetail->variation }}
                                    </td>
                                    <td>
                                        {{ $orderDetail->quantity }}
                                    </td>
                                    
                                    {{--<td>
                                        @if ($orderDetail->shipping_type != null && $orderDetail->shipping_type == 'home_delivery')
                                            {{  translate('Home Delivery') }}
                                        @elseif ($orderDetail->shipping_type == 'pickup_point')
                                            @if ($orderDetail->pickup_point != null)
                                                {{ $orderDetail->pickup_point->name }} ({{  translate('Pickip Point') }})
                                            @endif
                                        @endif
                                    </td>--}}
                                    <td>
                                    @if ($orderDetail->delivry_methods_title != null)
                                        {{ $orderDetail->delivry_methods_title }}

                                     @endif
                                    </td>
                                    <td>{{  Str::ucfirst($orderDetail->delivery_status) }}</td>
                                    <td>{{ single_price((($orderDetail->price+ $orderDetail->commision)/$orderDetail->quantity)+ $orderDetail->shipping_cost ) }}</td>
                                    {{--<td>{{ single_price($orderDetail->price + $orderDetail->tax + $orderDetail->commision + $orderDetail->shipping_cost) }}</td>--}}
                                    @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                                        @php
                                            $no_of_max_day = \App\BusinessSetting::where('type', 'refund_request_time')->first()->value;
                                            $last_refund_date = $orderDetail->created_at->addDays($no_of_max_day);
                                            $today_date = Carbon\Carbon::now();
                                        @endphp
                                        <td>
                                            @if ($orderDetail->product != null && $orderDetail->product->refundable != 0 && $orderDetail->refund_request == null && $today_date <= $last_refund_date && $orderDetail->delivery_status == 'delivered')
                                                <a href="{{route('refund_request_send_page', $orderDetail->id)}}" class="btn btn-primary btn-sm">{{  translate('Send') }}</a>
                                            @elseif ($orderDetail->refund_request != null && $orderDetail->refund_request->refund_status == 0)
                                                <b class="text-info">{{  translate('Pending') }}</b>
                                            @elseif ($orderDetail->refund_request != null && $orderDetail->refund_request->refund_status == 1)
                                                <b class="text-success">{{  translate('Approved') }}</b>
                                            @elseif ($orderDetail->product->refundable != 0)
                                                <b>{{  translate('N/A') }}</b>
                                            @else
                                                <b>{{  translate('Non-refundable') }}</b>
                                            @endif
                                        </td>

                                        @if($status == 'delivered')
                                        <td>
                                            @if ($orderDetail->received_status != null)
                                            @if ($orderDetail->received_status == 'Yes')
                                            <p class="text-success text-center text-bold"><b>{{ $orderDetail->received_status }}</b></p>
                                            @elseif($orderDetail->received_status == 'No')
                                            <p class="text-danger text-center text-bold"><b>{{ $orderDetail->received_status }}</b></p>
                                            @endif
                                            @else
                                            <div class="btn-group">
                                            <a onClick="delivery_receive_status({{$orderDetail->id}}, 'Yes')" class="btn-xs btn btn-success">{{ translate('Yes') }}</a>

                                            <a onClick="delivery_receive_status({{$orderDetail->id}}, 'No')" class="btn-xs btn btn-danger">{{ translate('No') }}</a>
                                            </div>
                                            @endif
                                        </td>
                                        @endif
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card mt-4">
                <div class="card-header">
                  <b class="fs-15">{{ translate('Order Ammount') }}</b>
                </div>
                <div class="card-body pb-0">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="w-50 fw-600">{{ translate('Subtotal')}}</td>
                                <td class="text-right">
                                    <span class="strong-600">{{$subtotal .'৳'}}</span>

                                {{--<td>{{ single_price($orderDetail->price + $orderDetail->tax + ($orderDetail->commision * $orderDetail->quantity)) }}</td>--}}
                                </td>
                            </tr>
                           {{-- <tr>
                                <td class="w-50 fw-600">{{ translate('Shipping')}}</td>
                                <td class="text-right">
                                    <span class="text-italic">{{ single_price($order->orderDetails->sum('shipping_cost')) }}</span>
                                </td>
                            </tr>--}}
                            <tr>
                                <td class="w-50 fw-600">{{ translate('Delivery Charge')}}</td>
                                <td class="text-right">
                                    <span class="text-italic">{{ single_price($order->orderDetails->sum('delivry_methods_charge')) }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-50 fw-600">{{ translate('Tax')}}</td>
                                <td class="text-right">
                                    <span class="text-italic">{{ single_price($order->orderDetails->sum('tax')) }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-50 fw-600">{{ translate('Coupon')}}</td>
                                <td class="text-right">
                                    <span class="text-italic">{{ single_price($order->coupon_discount) }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-50 fw-600">{{ translate('Total')}}</td>
                                <td class="text-right">
                                    <strong><span>{{ single_price($order->grand_total) }}</span></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($order->manual_payment && $order->manual_payment_data == null)
                <button onclick="show_make_payment_modal({{ $order->id }})" class="btn btn-block btn-primary">{{ translate('Make Payment')}}</button>
            @endif
        </div>
    </div>
</div>

<script type="text/javascript">
    function show_make_payment_modal(order_id){
        $.post('{{ route('checkout.make_payment') }}', {_token:'{{ csrf_token() }}', order_id : order_id}, function(data){
            $('#payment_modal_body').html(data);
            $('#payment_modal').modal('show');
            $('input[name=order_id]').val(order_id);
        });
    }

    function delivery_receive_status(id, status)
  {
        var order_detail_id = id;
        var status = status;
        $.post('{{ route('orders.update_delivery_status') }}', {_token:'{{ @csrf_token() }}',order_detail_id:order_detail_id,status:status}, function(data){
            AIZ.plugins.notify('success', '{{ translate('Order status has been updated') }}');
        });


  }


</script>
