@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="d-flex justify-content-between align-items-center">
		<h1 class="h3">Purchase History Of Supplier/Seller : {{$supplier->user ? $supplier->user->name : $supplier->name}} ({{$supplier->id}})</h1>
        <p>Total Purchase Price: {{$supplier->total_purchase_price()}}</p>

	</div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-borderd table-sm text-nowrap">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Action</th>
                        <th>Purchase Price</th>
                        <th>Supplier Due</th>
                        <th>Grand Total</th>
                        <th>Paid Amount</th>
                        <th>Current Due</th>
                        <th>Purchase Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $purchase)
                        <tr>
                            <td>{{ $purchase->id }}</td>
                            <td><a href="{{route('supplier.supplierInvoiceDetails',['supplier'=>$supplier,'purchase'=>$purchase])}}" class="btn btn-success btn-sm">Details</a></td>
                            <td>{{ $purchase->purchase_price }}</td>
                            <td>{{ $purchase->supplier_due }}</td>
                            <td>{{ $purchase->grand_total }}</td>
                            <td>{{ $purchase->paid_amount }}</td>
                            <td>{{ $purchase->new_due }}</td>
                            <td>{{ $purchase->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$purchases->render()}}
    </div>
</div>

@endsection
