@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">Stock Of Supplier/Seller : {{$supplier->user ? $supplier->user->name : $supplier->name}} ({{$supplier->id}})</h1>
		</div>

	</div>
</div>

<div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table aiz-table mb-0">
          <thead>
          <tr>
              <th>Purchase Date</th>
              <th>Product Name</th>
              <th>Batch</th>
              <th>WareHouse</th>
              <th>Purchase Qty</th>
              <th>Stock Qty</th>
              <th>Purchase Sale Price</th>
              <th>Live Sale Price</th>
              {{-- <th>Sales History</th> --}}
          </tr>
          </thead>
          <tbody>
          @foreach($stocks as  $stock)
          <tr>
            <td>{{$stock->purchase->date}}</td>
            <td>
                <a href="{{route('products.all',['product'=>$stock->product_id])}}" class="ptintA">{{ $stock->product->name }}</a></td>
            <td>
                <a href="{{route('warehousePurchaseItem',['warehouse'=>$stock->warehouse_id,'purchase'=>$stock->purchase_id])}}">{{ $stock->purchase_id }}</a>
            </td>
            <td>
                <a href="{{route('all_store_list',['warehouse'=>$stock->warehouse_id])}}" class="ptintA">{{ $stock->warehouse->store_name }}</a>
            </td>
            <td>{{$stock->purchase_item->quantity}}</td>
            <td>{{$stock->quantity}}</td>
            <td>{{$stock->purchase_price}}</td>
            <td>{{$stock->product->unit_price}}</td>
            {{-- <td><a class="btn btn-sm btn-success" href="{{route('salesHistoryOfStock',$stock)}}">Sales History</a></td> --}}
          </tr>
          @endforeach
          </tbody>
      </table>
      </div>

        <div class="aiz-pagination">
          {{ $stocks->links() }}
        </div>
    </div>
</div>

@endsection
