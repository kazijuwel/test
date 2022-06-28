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
                            Purchase items of {{ $purchase->id }} and Store/Warehouse : {{ $warehouse->store_name }}
                            <a href="" onclick="return printDiv('printArea');" class="btn btn-success btn-xs">Print</a>
                        </span>
                        <span><a href="{{ route('purchaseList', ['warehouse' => $warehouse]) }}"
                                class="btn btn-warning btn-xs">Back</a></span>
                    </div>
                </div>


                <script type="text/javascript">
                    function printDiv(divName) {
                        var printContents = document.getElementById(divName).innerHTML;
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        window.print();
                    }
                </script>


                <div class="card-body" id="printArea">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderd table-sm text-nowrap">
                            <thead>
                                <tr>
                                    <th>#id</th>
                                    <th>Supplier</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Sale Price</th>
                                    <th>Total Price</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchase_items as $purchase_item)
                                    <tr>
                                        <td>{{ $purchase_item->id }}</td>
                                        <td>
                                            @if ($purchase_item->supplier->only_supplier)
                                                <a
                                                    href="{{ route('supplier.index', ['supplier' => $purchase_item->supplier->id]) }}">{{ $purchase_item->supplier->user ? $purchase_item->supplier->name : $purchase_item->supplier->name }}</a>
                                            @else
                                                <a
                                                    href="{{ route('sellers.index', ['supplier' => $purchase_item->supplier->id]) }}">{{ $purchase_item->supplier->user->name }}</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('products.all',['product'=>$purchase_item->product_id])}}" class="ptintA">{{ $purchase_item->product->name }}</a>
                                            </td>
                                        <td>{{ $purchase_item->quantity }}</td>
                                        <td>{{ $purchase_item->purchase_unit_price }}</td>
                                        <td>{{ $purchase_item->sale_price }}</td>
                                        <td>{{ $purchase_item->total_price }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="text-right">Total Quantity: </td>
                                    <td colspan="1" class="text-right">{{ $purchase->total_quantity() }}</td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right">Unit Price/Purchase Price: </td>
                                    <td colspan="1" class="text-right">{{ $purchase->purchase_price() }}</td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right">Total Price: </td>
                                    <td colspan="1" class="text-right">{{ $purchase->total_price() }}</td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right">Paid Amount: </td>
                                    <td colspan="1" class="text-right">{{ $purchase->paid_amount }}</td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right">Grand Total: </td>
                                    <td colspan="1" class="text-right">
                                        {{ $purchase->total_price() - $purchase->paid_amount }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
@endsection
