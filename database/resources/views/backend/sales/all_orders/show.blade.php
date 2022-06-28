@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
          <h1 class="h2">{{ translate('Order Details') }}</h1>
        </div>
        <div class="card-header row gutters-5">
  			<div class="col text-center text-md-left">
  			</div>
              @php
             $status = $order->orderDetails->first();
             if($status)
             {
              $delivery_status =$status->delivery_status;
             }else {
              $delivery_status = Null;
             }

             $p_status = $order->orderDetails->first();
             if($p_status)
             {
              $payment_status =$p_status->payment_status;;
             }else {
              $payment_status = Null;
             }

             $w_status = $order->orderDetails->first();
             if($w_status)
             {
              $product_warranty =$p_status->warranty;;
             }else {
              $product_warranty = Null;
             }

                 // $delivery_status = $order->orderDetails->first()->delivery_status;

                  //$payment_status = $order->orderDetails->first()->payment_status;
                 // $product_warranty = $order->orderDetails->first()->warranty;
              @endphp
              <div class="col-md-3 ml-auto">
                  <label for=update_payment_status"">{{translate('Payment Status')}}</label>
                  <select class="form-control aiz-selectpicker"  data-minimum-results-for-search="Infinity" id="update_payment_status">
                      <option value="paid" @if ($payment_status == 'paid') selected @endif>{{translate('Paid')}}</option>
                      <option value="unpaid" @if ($payment_status == 'unpaid') selected @endif>{{translate('Unpaid')}}</option>
                  </select>
              </div>
  			{{-- <div class="col-md-3 ml-auto">
                  <label for=update_delivery_status"">{{translate('Delivery Status')}}</label>
                  <select class="form-control aiz-selectpicker"  data-minimum-results-for-search="Infinity" id="update_delivery_status">
                      <option value="pending" @if ($delivery_status == 'pending') selected @endif>{{translate('Pending')}}</option>
                      <option value="confirmed" @if ($delivery_status == 'confirmed') selected @endif>{{translate('Confirmed')}}</option>
                      <option value="on_delivery" @if ($delivery_status == 'on_delivery') selected @endif>{{translate('On delivery')}}</option>
                      <option value="delivered" @if ($delivery_status == 'delivered') selected @endif>{{translate('Delivered')}}</option>
                  </select>
  			</div> --}}
  		</div>
    	<div class="card-body">
        <div class="card-header row gutters-6">
  			<div class="col text-center text-md-left">
            <address>
                <strong class="text-main">{{ json_decode($order->shipping_address)->name }}</strong><br>
                {{ json_decode($order->shipping_address)->email }}<br>
                {{ json_decode($order->shipping_address)->phone }}<br>
                {{ json_decode($order->shipping_address)->address }}, {{ json_decode($order->shipping_address)->city }}, {{ json_decode($order->shipping_address)->postal_code }}<br>
                {{ json_decode($order->shipping_address)->country }}
            </address>
            @if ($order->manual_payment && is_array(json_decode($order->manual_payment_data, true)))
                <br>
                <strong class="text-main">{{ translate('Payment Information') }}</strong><br>
                {{ translate('Name') }}: {{ json_decode($order->manual_payment_data)->name }}, {{ translate('Amount') }}: {{ single_price(json_decode($order->manual_payment_data)->amount) }}, {{ translate('TRX ID') }}: {{ json_decode($order->manual_payment_data)->trx_id }}
                <br>
                <a href="{{ uploaded_asset(json_decode($order->manual_payment_data)->photo) }}" target="_blank"><img src="{{ uploaded_asset(json_decode($order->manual_payment_data)->photo) }}" alt="" height="100"></a>
            @endif
  				</div>
  				<div class="col-md-4 ml-auto">
            <table>
        				<tbody>
            				<tr>
            					<td class="text-main text-bold">{{translate('Order #')}}</td>
            					<td class="text-right text-info text-bold">	{{ $order->code }}</td>
            				</tr>
            				<tr>
                      <td class="text-main text-bold">{{translate('Order Status')}}</td>
                          @php
                          $status = $order->orderDetails;
                          $array1=[];
                          $array2 = array("delivered");
                          foreach($status as $key => $statuss){
                            $array1[]=$statuss->delivery_status;
                          }
                          $resultstusts = array_diff($array1, $array2);
                          @endphp
                             
            					<td class="text-right">
                          @if(count($resultstusts) > 0)
                          <span class="badge badge-inline badge-info">{{ translate("Panding") }}</span>
                          </span>
                          @else
                          <span class="badge badge-inline badge-success">{{ translate("Delivered") }}
                  
                         @endif
      					    </td>
            				</tr>
            				<tr>
            					<td class="text-main text-bold">{{translate('Order Date')}}	</td>
            					<td class="text-right">{{\Carbon\Carbon::parse($order->date)->format('j F Y, h:i A')}}</td>
            				</tr>
                    <tr>
                      <td class="text-main text-bold">{{translate('Delivery Date')}} </td>
                      <td class="text-right">@if($order->delivery_date != null)
                            {{\Carbon\Carbon::parse($order->delivery_date)->format('j F Y')}}
                            @else
                            @endif</td>
                    </tr>
                    <tr>
            					<td class="text-main text-bold">{{translate('Total amount')}}	</td>
            					<td class="text-right">
            						{{ single_price($order->grand_total) }}
            					</td>
            				</tr>
                    <tr>
            					<td class="text-main text-bold">{{translate('Payment method')}}</td>
            					<td class="text-right">{{ ucfirst(str_replace('_', ' ', $order->payment_type)) }}</td>
            				</tr>

        				</tbody>
    				</table>
  				</div>
  			</div>
    		<hr class="new-section-sm bord-no">
    		<div class="row">
    			<div class="col-lg-12 table-responsive">
    				<table class="table table-bordered invoice-summary">
        				<thead>
            				<tr class="bg-trans-dark">
                        <th class="min-col">#</th>
                        <th width="10%">{{translate('Photo')}}</th>
                        <th width="10%">{{translate('Saller')}}</th>
        					      <th class="text-uppercase">{{translate('Description')}}</th>
                        <th class="text-uppercase">{{translate('Delivery Type')}}</th>
              					<th class="min-col text-center text-uppercase">{{translate('Qty')}}</th>
              					<th class="min-col text-center text-uppercase">{{translate('Price')}}</th>
        					      <th class="min-col text-right text-uppercase">{{translate('Total')}}</th>
                        @if($status == 'delivered')
                        <th width="5%" class="text-uppercase">{{ translate('Product Received?')}}</th>
                        @endif
            				</tr>
        				</thead>
        				<tbody id="singleupdate_delivery_status">
                    @foreach ($order->orderDetails as $key => $orderDetail)
                    @php
                    $parts_warranty = json_decode($orderDetail->parts_warranty);

                     @endphp
                  
                      <tr>
                        <td>{{ $key+1 }}</td> 
                        <td>
                          @if ($orderDetail->product != null)
                            <a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank"><img height="50" src="{{ uploaded_asset($orderDetail->product->thumbnail_img) }}"></a>
                          @else
                            <strong>{{ translate('N/A') }}</strong>
                          @endif
                          </td>
                        <td>
                          @if($orderDetail->seller)
                          <a href="{{route('adminsellerview',$orderDetail->seller->id) }}">{{ $orderDetail->seller->name }}</a>
                          @endif
                        </td>

                        <td style="text-align: left;"><span style="font-weight: bold;">Product Name: </span>{{ $orderDetail->product->name }} @if($orderDetail->variation != null) ({{ $orderDetail->variation }}) @endif <br>
                        @if($orderDetail->warranty != null)
                            @php
                                $dateToModify = '+'.$orderDetail->warranty.'days';
                                $expireDate = new \DateTime();
                                $expireDate = $expireDate->modify($dateToModify);
                                $order_expire_at = $expireDate->format('d-m-Y');
                            @endphp

                            <span style="font-weight: bold;">Product Warranty </span>Expire Date: {{$order_expire_at}}<br>
                            @endif
                            @if($orderDetail->parts_warranty != null)
                            <span style="font-weight: bold;">Parts Warranty </span>Expire Date: <br>
                            @foreach($parts_warranty as $item)
                                @php
                                $dateToModify = '+'.$item->warranty_days.'days';
                                $expireDate = new \DateTime();
                                $expireDate = $expireDate->modify($dateToModify);
                                $order_expire_at = $expireDate->format('d-m-Y');
                                @endphp

                                {{$item->parts_name}} -- {{$order_expire_at}} <br>
                            @endforeach
                            @endif

                        </td>
                        {{--<td>
                          @if ($orderDetail->shipping_type != null && $orderDetail->shipping_type == 'home_delivery')
                            {{ translate('Home Delivery') }}
                          @elseif ($orderDetail->shipping_type == 'pickup_point')

                            @if ($orderDetail->pickup_point != null)
                              {{ $orderDetail->pickup_point->getTranslation('name') }} ({{ translate('Pickup Point') }})
                            @else
                              {{ translate('Pickup Point') }}
                            @endif
                          @endif
                        </td>--}}
                         {{-- <td>
                          @if ($orderDetail->delivry_methods_title != null)
                            {{ $orderDetail->delivry_methods_title }}

                          @endif
                        </td> --}}
                        <td>
                          <select class="adminsingleproductupdate" id="">
                            <option value="pending" @if ($orderDetail->delivery_status == 'pending') selected @endif>{{translate('Pending')}}</option>
                            <option value="confirmed" @if ($orderDetail->delivery_status == 'confirmed') selected @endif>{{translate('Confirmed')}}</option>
                            <option value="on_delivery" @if ($orderDetail->delivery_status == 'on_delivery') selected @endif>{{translate('On delivery')}}</option>
                            <option value="delivered" @if ($orderDetail->delivery_status == 'delivered') selected @endif>{{translate('Delivered')}}</option>
                        </select>
                        <input type="hidden" class="orderid" value="{{ $orderDetail->id}}">
                        </td>
                        

                        <td class="text-center">{{ $orderDetail->quantity }}</td>

                        <td class="text-center">{{ single_price(($orderDetail->price/$orderDetail->quantity)+($orderDetail->commision/$orderDetail->quantity)+($orderDetail->shipping_cost)) }}</td>

                        <td class="text-center">{{ single_price((($orderDetail->price/$orderDetail->quantity)+($orderDetail->commision/$orderDetail->quantity)+($orderDetail->shipping_cost))*$orderDetail->quantity) }}</td>
                        @if($status == 'delivered')
                          <td class="text-center">
                              @if ($orderDetail->received_status != null)
                              @if ($orderDetail->received_status == 'Yes')
                              <p class="badge badge-inline badge-success">{{ $orderDetail->received_status }}</p>
                              @elseif($orderDetail->received_status == 'No')
                              <p class="badge badge-inline badge-danger">{{ $orderDetail->received_status }}</p>
                              @endif
                              @endif
                          </td>
                        @endif
                      </tr>
                    @endforeach
        				</tbody>
    				</table>
    			</div>
    		</div>
    		<div class="clearfix float-right">
    			<table class="table">
        			<tbody>
        			{{--<tr>
        				<td>
        					<strong class="text-muted">{{translate('Sub Total')}} :</strong>
        				</td>
        				<td>
        					{{ single_price($order->orderDetails->sum('price') + $order->orderDetails->sum('commision') +$order->orderDetails->sum('shipping_cost')) }}
        				</td>
        			</tr>--}}
        			<tr>
        				<td>
        					<strong class="text-muted">{{translate('Tax')}} :</strong>
        				</td>
        				<td>
        					{{ single_price($order->orderDetails->sum('tax')) }}
        				</td>
        			</tr>
                    <tr>
        				<td>
        					<strong class="text-muted">{{translate('Delivery Charge')}} :</strong>
        				</td>
        				<td>
        					{{ single_price($order->orderDetails->sum('delivry_methods_charge') ) }}
        				</td>
        			</tr>
                    {{--<tr>
        				<td>
        					<strong class="text-muted">{{translate('Shipping')}} :</strong>
        				</td>
        				<td>
        					{{ single_price($order->orderDetails->sum('shipping_cost')) }}
        				</td>
        			</tr>--}}
                    <tr>
        				<td>
        					<strong class="text-muted">{{translate('Coupon')}} :</strong>
        				</td>
        				<td>
        					{{ single_price($order->coupon_discount) }}
        				</td>
        			</tr>
        			<tr>
        				<td>
        					<strong class="text-muted">{{translate('TOTAL')}} :</strong>
        				</td>
        				<td class="text-muted h5">
        					{{ single_price($order->grand_total) }}
        				</td>
        			</tr>
        			</tbody>
    			</table>
          <div class="text-right no-print">
            <a href="{{ route('customer.invoice.download', $order->id) }}" type="button" class="btn btn-icon btn-light"><i class="las la-print"></i></a>
          </div>
    		</div>

    	</div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
      $('#update_payment_status').on('change', function(){
      var x = document.getElementById("update_payment_status").value;
      
      if (confirm('Are you sure you want Change')) {      
                  var order_id = {{ $order->id }};
                  var status = $('#update_payment_status').val();
                  $.post('{{ route('orders.update_payment_status') }}', {_token:'{{ @csrf_token() }}',order_id:order_id,status:status}, function(data){
                      AIZ.plugins.notify('success', '{{ translate('Payment status has been updated') }}');
                  });
      }      //confirm
   });

// $('#update_delivery_status').on('change', function(){
// if (confirm('Are you sure you want Change')) {    
//             var order_id = {{ $order->id }};
//             var status = $('#update_delivery_status').val();
//             $.post('{{ route('orders.update_delivery_status') }}', {_token:'{{ @csrf_token() }}',order_id:order_id,status:status}, function(data){
            
//                 AIZ.plugins.notify('success', '{{ translate('Delivery status has been updated') }}');
//             });       
//       }
// });

</script>
<script>
// $("#singleupdate_delivery_status").change(function(){
//   alert("The text has been changed.");
// });

// var row = $(this).closest("tr");
//     var id = parseFloat(row.find("#proid").val());
//     
// $('.gg').on('change',function(){
//   var d= $(this).val();
//   var row = $(this).closest("tr");
//   var orderDetailsId=parseFloat(row.find(".orderid").val());
//   alert(orderDetailsId);
// });
  $(".adminsingleproductupdate").on('change',function(){
    if (confirm('Are you sure you want Change')) {  
    var status= $(this).val();
    var order_id = "{{ $order->id }}";
    
    var row = $(this).closest("tr");
    var orderDetailsId=parseFloat(row.find(".orderid").val());
  
    $.post('{{ route('adminorderstatuschange') }}', 
    {_token:'{{ @csrf_token() }}',
    orderDetailsId:orderDetailsId,
    orderId:order_id,
    status:status},
     function(data){
                AIZ.plugins.notify('success', '{{ translate('Delivery status has been updated') }}');
            });
    }

  });

</script>
@endsection
