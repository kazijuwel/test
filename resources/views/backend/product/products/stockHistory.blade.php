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
                            Stock History of Stock: {{ $stock->id }} and Product: {{ $stock->product->name }}
                        </span>
                    </div>
                </div>
                <div class="card">

                    <div class="card-body" id="printArea">
                        <div class="table-responsive">
                            <table class="table table-striped table-borderd table-sm text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Supplier/Seller</th>
                                        <th>Warehouse</th>
                                        <th>Quantity</th>
                                        <th>Purchase Price</th>
                                        <th>Sale Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stock_history as $order_item)
                                        <tr>
                                            <td><a
                                                    href="{{ route('all_orders.show', $order_item->order_id) }}">{{ $order_item->order_id }}</a>
                                            </td>
                                            <td>
                                                @if ($order_item->supplier->only_supplier)
                                                    <a
                                                        href="{{ route('supplier.index', ['supplier' => $order_item->supplier->id]) }}">{{ $order_item->supplier->name }}</a>
                                                @else
                                                    <a
                                                        href="{{ route('sellers.index', ['supplier' => $order_item->supplier->id]) }}">{{ $order_item->seller->name }}</a>
                                                @endif
                                            </td>
                                            <td>

                                                @if ($order_item->order->warehouse)
                                                    <a href="{{ route('all_store_list', ['warehouse' => $order_item->order->warehouse_id]) }}"
                                                        class="ptintA">{{ $order_item->order->warehouse->store_name }}</a>
                                                @endif

                                            </td>
                                            <td>{{ $order_item->quantity }}</td>
                                            <td>{{ $order_item->purchase_price }}</td>
                                            <td>{{ $order_item->unit_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $stock_history->render() }}
                    </div>
                </div>
            </div>

        </div>
    @endsection
    @section('script')
    @endsection
