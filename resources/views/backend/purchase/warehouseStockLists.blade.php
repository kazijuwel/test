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
                    <div class="card-header bg-secondary d-flex justify-content-between">
                        <span>
                            Stock List Of Store/Warehouse : {{ $warehouse->store_name }}
                            {{-- <a href="" onclick="return printDiv('printArea');" class="btn btn-success btn-xs">Print</a> --}}
                        </span>
                        {{-- <span><a href="{{route('purchaseList',['warehouse'=>$warehouse])}}" class="btn btn-warning btn-xs">Back</a></span> --}}
                    </div>
                </div>



                <div class="card-body" id="printArea">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderd table-sm text-nowrap">
                            <thead>
                                <tr>
                                    <th>#id</th>
                                    <th>Supplier</th>
                                    <th>Per_Inv</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Sale Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)
                                    <tr>
                                        <td>{{ $stock->id }}</td>
                                        <td>


                                            @if ($stock->supplier->only_supplier)
                                                <a
                                                    href="{{ route('supplier.index', ['supplier' => $stock->supplier->id]) }}">{{ $stock->supplier->user ? $stock->supplier->name : $stock->supplier->name }}</a>
                                            @else
                                                <a
                                                    href="{{ route('sellers.index', ['supplier' => $stock->supplier->id]) }}">{{ $stock->supplier->user->name }}</a>
                                            @endif
                                        </td>

                                        <td><a href="{{ route('supplier.supplierInvoiceDetails', ['supplier' => $stock->supplier_id, 'purchase' => $stock->purchase_id]) }}" >{{ $stock->purchase_id }}</a></td>

                                        <td>
                                            <a href="{{ route('products.all', ['product' => $stock->product_id]) }}"
                                                class="ptintA">{{ $stock->product->name }}</a>
                                        </td>

                                        <td>{{ $stock->quantity }}</td>
                                        <td>{{ $stock->purchase_price }}</td>
                                        <td>{{ $stock->sale_price }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $stocks->render() }}
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
@endsection
