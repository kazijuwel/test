@extends('backend.layouts.app')

@section('content')
@php
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
@endphp
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-md-6">
   <div class="card">
       <div class="card-header">
           Order Number
       </div>
       <div class="card-body">
        <form action="" method="GET">
        <select class="form-control js-example-disabled-results" id="sel1" name="Orderid" required>
            <option value="">Select Order Number</option>
            @foreach($orders as $key => $order)
            <option value="{{ $order->code }}">{{ $order->code }}</option>
            @endforeach
          </select>
       </div>
       <div class="card-footer">
           <button type="submit" class="btn btn-success">Searching</button>
       </div>
    </form>
   </div>
</div>
<div class="col-md-12">
    <div class="card">
        @isset($orderItem)
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">purchase Price</th>
        <th scope="col">Delivery Cost</th>
        <th scope="col">Sub total</th>
        <th scope="col">Tax</th>
        <th scope="col">Commision</th>
        <th scope="col">Total</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orderItem->hasdeliveryandpaid as $order )
        <tr>
            <th scope="row">{{ $loop->index+1 }}</th>
            <td>{{ $order->product->name }}</td>
            <td>{{ $order->purchase_price }}</td>
            <td>{{ $order->shipping_cost }}</td>
            <td>{{ $order->price }}</td>
            <td>{{ $order->tax }}</td>
            <td>{{ $order->commision }}</td>
            <td>{{ $order->price+$order->tax+$order->shipping_cost+$order->commision }}</td>
            <td><button data-toggle="modal" class="btn btn-primary" id="orderidButton" data-attr="{{ route('ordereditpurchaseanddelivery', $order->id) }}"><i class="las la-edit"></i></button></td>
        </tr>


        @endforeach

    </tbody>
  </table>
    </div>
</div>
<hr>
<div class="col-md-6 float-right">
<div class="card">
    <table class="table">
        <tbody>
          <tr>
            <td>Price:</td>
            <td>{{ $orderItem->hasdeliveryandpaid->sum('price') }}</td>
          <tr>
          <tr>
            <td>Tax:</td>
            <td>{{ $orderItem->hasdeliveryandpaid->sum('tax') }}</td>
          </tr>
           <tr>
            <td>Commision:</td>
            <td>{{ $orderItem->hasdeliveryandpaid->sum('commision') }}</td>
            </tr>
            <tr>
            <td>Shipping  Cost:</td>
             <td> {{ $orderItem->hasdeliveryandpaid->sum('shipping_cost') }}</td>
            </tr>
            <tr>
            <td>Total:</td>
            <td>
                {{ $orderItem->hasdeliveryandpaid->sum('price')+$orderItem->hasdeliveryandpaid->sum('tax')+$orderItem->hasdeliveryandpaid->sum('shipping_cost')+$orderItem->hasdeliveryandpaid->sum('commision') }}</td>

          </tr>
        </tbody>
      </table>
</div>
</div>
</div>

@endisset
<div class="modal fade" id="orderModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Order Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('ordereditpurchaseanddeliverysave',$order->id) }}">
            @csrf
             <div class="form-group">
               <label for="exampleInputEmail1">Purchase Price</label>
               <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $order->purchase_price }}"name="purchase_price">
             </div>
             <div class="form-group">
                <label for="exampleInputEmail1">Delivery Price</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $order->shipping_cost }}" name="shipping_cost">
              </div>
             <button type="submit" class="btn btn-primary">Save</button>
           </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script>
var $disabledResults = $(".js-example-disabled-results");
$disabledResults.select2();


$(document).on('click', '#orderidButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                success: function(result) {
                    $('#orderModel').modal("show");
                    $('#code').val(result.code);
                    $('#orderidsf').val(result.id);


                    
                },
                // complete: function() {
                //     $('#loader').hide();
                // },
                // error: function(jqXHR, testStatus, error) {
                //     console.log(error);
                //     alert("Page " + href + " cannot open. Error:" + error);
                //     $('#loader').hide();
                // },
                timeout: 8000
            })
        });
</script>
@endsection

