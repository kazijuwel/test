@extends('backend.layouts.app')
@section('style')
    <style>
        .checkedProduct {
            border: 2px solid green;
        }

        .productTitle {
            padding: 0px 5px !important;
            font-size: 12px;
        }

        .product-card {
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        Purchase list Of Store/Warehouse : {{ $warehouse->store_name }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderd table-sm text-nowrap">
                            <thead>
                                <tr>
                                    <th>#id</th>
                                    <th>Action</th>
                                    <th>Supplier</th>
                                    <th>Purchase Price</th>
                                    <th>Supplier Due</th>
                                    <th>Grand Total</th>
                                    <th>Paid Amount</th>
                                    <th>Current Due</th>
                                    <th>Purchase Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchase_lists as $purchase)
                                    <tr>
                                        <td>{{ $purchase->id }}</td>
                                        <td><a href="{{route('purchaseItems',['warehouse'=>$warehouse,'purchase'=>$purchase])}}" class="btn btn-success btn-sm">Details</a></td>
                                        <td>
                                            @if ($purchase->supplier->only_supplier)

                                            <a href="{{route('supplier.index',['supplier'=>$purchase->supplier->id])}}">{{ $purchase->supplier->user ? $purchase->supplier->name : $purchase->supplier->name }}</a>

                                            @else
                                            <a href="{{route('sellers.index',['supplier'=>$purchase->supplier->id])}}">{{ $purchase->supplier->user->name }}</a>
                                            @endif

                                        </td>
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
                    {{$purchase_lists->render()}}
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
@endsection
