@extends('backend.layouts.app')

@section('style')
    <style>
        .ptintA {
            text-decoration: none;
        }

        @media print {
            .ptintA {
                text-decoration: none !important;
                color: black;
            }
        }
    </style>
@endsection
@section('content')
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
        }
    </script>
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <a href="" onclick="return printDiv('printArea');" class="btn btn-success btn-xs">Print</a>

        </div>
    </div>

    <div class="card" id="printArea">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="h5">Purchase Invoice of Supplier:
                {{ $supplier->user ? $supplier->user->name : $supplier->name }}
                ({{ $supplier->id }}) Purchase Id : {{ $purchase->id }} </h1>
            <p>Date: {{ $purchase->date }}</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-borderd table-sm text-nowrap">
                    <thead>
                        <tr>
                            <th>Warehouse</th>
                            <th>Product Name </th>
                            <th>Quantity</th>
                            <th>Purchase Price</th>
                            <th>Sale Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_quantity = 0;
                            $total_purchase_unit_price = 0;
                            $final_price = 0;
                        @endphp
                        @foreach ($purchase_items as $item)
                            <tr>
                                <td> <a href="{{route('all_store_list',['warehouse'=>$item->warehouse_id])}}" class="ptintA">{{ $item->purchase->warehouse->store_name }}</a>
                                </td>
                                <td><a href="{{route('products.all',['product'=>$item->product_id])}}" class="ptintA">{{ $item->product->name }}</a></td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->purchase_unit_price }}</td>
                                <td>{{ $item->sale_price }}</td>
                                @php
                                    $total_quantity += $item->quantity;
                                    $total_purchase_unit_price += $item->purchase_unit_price;
                                    $final_price += $item->quantity * $item->purchase_unit_price;
                                @endphp
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right">Total Quantity: </td>
                                <td colspan="2" class="text-right">{{ $purchase->total_quantity() }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Unit Price/Purchase Price: </td>
                                <td colspan="2" class="text-right">{{ $purchase->purchase_price() }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Total Price: </td>
                                <td colspan="2" class="text-right">{{ $purchase->total_price() }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Paid Amount: </td>
                                <td colspan="2" class="text-right">{{ $purchase->paid_amount }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Grand Total: </td>
                                <td colspan="2" class="text-right">
                                    {{ $purchase->total_price() - $purchase->paid_amount }}</td>
                            </tr>
                        </tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
