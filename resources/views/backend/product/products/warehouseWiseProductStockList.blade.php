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
                            Stock List Of Product {{ $product->name }}
                        </span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <a href="{{route('products.all',['product'=>$product->id])}}" class="ptintA">
                                <img class="ml-3 img-fluid"
                                    src="{{ route('imagecache', ['template' => 'cpmd', 'filename' => single_image($product->thumbnail_img)]) }}"
                                    alt="Generic placeholder image">
                                </a>
                            </div>
                            <div class="col-12 col-md-9">
                                <h5 class="mt-0 mb-1"> <a href="{{route('products.all',['product'=>$product->id])}}" class="ptintA">{{ $product->name }}</a> </h5>
                                <div><b>Unit Price: </b> {{ $product->unit_price }}</div>
                                <div><b>Product Id: </b> {{ $product->id }}</div>
                                <div><b>Total Stock Quantity: </b> {{ $product->total_stock_quantity() }}</div>
                                <div><b>Total Stock Purchase Price: </b> {{ $total_stock_price }}</div>
                            </div>
                        </div>
                    </div>



                    <div class="card-body" id="printArea">
                        <div class="table-responsive">
                            <table class="table table-striped table-borderd table-sm text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Warehouse</th>
                                        <th>Supplier/Seller</th>
                                        <th>Batch</th>
                                        <th>Purchase Qty</th>
                                        <th>Stock Qty</th>
                                        <th>Purchase Sale Price</th>
                                        <th>Live Sale Price</th>
                                        <th>Sales History</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                        <tr>
                                            <td> <a href="{{route('all_store_list',['warehouse'=>$stock->warehouse_id])}}" class="ptintA">{{ $stock->warehouse->store_name }}</a> </td>
                                            <td>
                                                @if ($stock->supplier->only_supplier)
                                                <a href="{{route('supplier.index',['supplier'=>$stock->supplier_id])}}">{{ $stock->supplier->user ? $stock->supplier->name : $stock->supplier->name }}</a>

                                                @else
                                                <a href="{{route('sellers.index',['supplier'=>$stock->supplier_id])}}">{{  $stock->supplier->user->name  }}</a>
                                                @endif

                                            </td>
                                            <td> <a href="{{route('warehousePurchaseItem',['warehouse'=>$stock->warehouse_id,'purchase'=>$stock->purchase_id])}}">{{ $stock->purchase_id }}</a></td>
                                            <td>{{ $stock->purchase_item->quantity }}</td>
                                            <td>{{ $stock->quantity }}</td>
                                            <td>{{$stock->purchase_price}}</td>
                                            <td>{{home_discounted_base_price($stock->product_id)}}</td>
                                            <td><a class="btn btn-sm btn-success" href="{{route('salesHistoryOfStock',$stock)}}">Sales History</a></td>
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
