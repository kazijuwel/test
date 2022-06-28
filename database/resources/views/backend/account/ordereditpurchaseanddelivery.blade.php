@extends('backend.layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-md-12 mt-3">
    <p>Update Order</p>
    <div class="card bg-grad-2 text-white ">
        <div class="card-header">
        <div class="card-body">
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
<!---model-->

@endsection

@section('modal')


@endsection