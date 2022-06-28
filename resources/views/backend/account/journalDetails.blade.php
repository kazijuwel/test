@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
          <h1 class="h2">{{ translate('Journial Entries') }}</h1>
        </div>
    	<div class="card-body">
        <div class="card-header row gutters-6">
  			<div class="col text-center text-md-left">
            <address>
                <strong class="text-main"><span class="text-success">Belaobela sales of</span> {{ json_decode($order->shipping_address)->name }}</strong><br>
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
                         
                          @php
                          $status = $order->orderDetails;
                          $array1=[];
                          $array2 = array("delivered");
                          foreach($status as $key => $statuss){
                            $array1[]=$statuss->delivery_status;
                          }
                          $resultstusts = array_diff($array1, $array2);
                          @endphp
            				</tr>
            				<tr>
            					<td class="text-main text-bold">{{translate('Order Date')}}	</td>
            					<td class="text-right">{{\Carbon\Carbon::parse($order->date)->format('j F Y, h:i A')}}</td>
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
        				    <th class="text-uppercase">{{translate('Account')}}</th>
        				    <th class="min-col text-right text-uppercase">{{translate('Debit')}}</th>
                            <th class="min-col text-right text-uppercase">{{translate('Credit')}}</th>
            			</tr>
        				</thead>
        				<tbody id="singleupdate_delivery_status">
                    @foreach ($order->orderDetails as $key => $orderDetail)
                    @php
                    $parts_warranty = json_decode($orderDetail->parts_warranty);

                     @endphp
                  
                      <tr>
                        <td>{{ $key+1 }}</td> 
                        <td style="text-align: left;"><span style="font-weight: bold;">Product Name: </span>{{ $orderDetail->product->name }}

                        </td>
                        

                        <td class="text-center">{{ single_price(($orderDetail->price/$orderDetail->quantity)+($orderDetail->commision/$orderDetail->quantity)+($orderDetail->shipping_cost)) }}</td>

                        <td class="text-center">
							@if($orderDetail->payment_status == "paid")
							{{ single_price(($orderDetail->price/$orderDetail->quantity)+($orderDetail->commision/$orderDetail->quantity)+($orderDetail->shipping_cost)) }}
							@else
							0
							@endif
						</td>
                    
                      </tr>
                    @endforeach
        				</tbody>
    				</table>
    			</div>
    		</div>
            <div class="clearfix float-left">
                @if($order->hasunpaid() && $order->hasPaid() )
               <div class="p-4 ml-5 mt-5" style="border: 3px solid rgb(206, 16, 121)"> <h3>Unbalanced</h3> </div> 
                @elseif(!$order->hasunpaid() && $order->hasPaid())
                <div class="p-4 ml-5 mt-5" style="border: 3px solid rgb(31, 218, 14)"> <h3>Balanced</h3> </div> 
                @else
                <div class="p-4 ml-5 mt-5" style="border: 3px solid rgb(209, 6, 6)"> <h3>Unbalanced</h3> </div> 
                @endif
        	
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
