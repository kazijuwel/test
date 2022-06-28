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
                        New Purchase
                    </div>
                    <div class="card-body">
                        @include('alerts.alerts')
                        <div class="table-responsive">
                            <b>Store:</b> {{ $warehouse->name }}
                            <b>Supplier/Seller:</b> {{ $supplier->user->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3 m-auto">
                <input type="search" placeholder="Search Here" id="search" class="form-control">
            </div>
        </div>
        <div class="card">
            <div class="card-body" style="height: 300px; overflow: scroll">
                <div class="row product_row">
                    @foreach ($products as $key => $product)
                        <div class="col-6 col-md-2 product">
                            <div class="card product-card p-0 id-{{ $product->id }} {{ $product->hasTemp($warehouse->id) ? 'checkedProduct' : '' }}"
                                style="min-height: 210px;" data-product-id="{{ $product->id }}"
                                data-select-url="{{ route('selectTempProduct', ['product' => $product, 'warehouse' => $warehouse, 'supplier' => $supplier]) }}"
                                data-unselect-url="{{ route('unselectTempProduct', ['product' => $product, 'warehouse' => $warehouse, 'supplier' => $supplier]) }}">
                                <img src="{{ route('imagecache', [ 'template'=>'pnimd','filename' => single_image($product->thumbnail_img) ]) }}" class="card-img-top" alt="...">
                                <div class="card-body p-0">
                                    <h3 class="card-title productTitle py-1">{{ mb_substr($product->name, 0, 60) }}
                                    </h3>
                                    <span> <b>Stock: </b>{{$product->total_stock()}}</span>
                                </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                        {{-- </div> --}}
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Selected Items</div>
            <div class="card-body">
                <form action="{{route('storePurchase',['warehouse'=>$warehouse,'supplier'=>$supplier])}}" method="POST">
                        @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Purchase Price</th>
                                    <th>Sale Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody id="showTempItems">
                                @foreach ($tempProducts as $item)
                                    <tr>
                                        <td><input type="checkbox" class="tempCheckedUncecked"
                                                id="id-{{ $item->product_id }} "
                                                {{ $item->product->hasTemp($warehouse->id) ? 'checked' : '' }}
                                                data-unselect-url="{{ route('unselectTempProduct', ['product' => $item->product_id, 'warehouse' => $warehouse, 'supplier' => $supplier]) }}"></td>
                                        <td><small>{{ $item->product->name }}</small></td>

                                        <td><input class="quantity_change"
                                            data-url="{{ route('updateTempItem', ['type' => 'quantity', 'item' => $item->id, 'warehouse' => $warehouse, 'supplier' => $supplier]) }}"
                                            type="number" step="any" min="1" id="quantity" required name="quantity" value="{{ $item->quantity }}"></td>
                                        <td>
                                            <input class="price_change"
                                                data-url="{{ route('updateTempItem', ['type' => 'price', 'item' => $item->id, 'warehouse' => $warehouse, 'supplier' => $supplier]) }}"
                                                type="number" step="any" min="1.00" id="purchase_price" required name="purchase_price" value="{{ $item->purchase_price }}">

                                        </td>



                                        <td>
                                            <input class="sale_price"
                                                data-url="{{ route('updateTempItem', ['type' => 'sale_price', 'item' => $item->id, 'warehouse' => $warehouse, 'supplier' => $supplier]) }}"
                                                required type="number" step="any" min="1.00" id="sale_price" required name="sale_price"
                                                value="{{ $item->sale_price }}">

                                        </td>

                                        <td class="total_item_price">{{ $item->total_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                {{-- <tr>
                                <td colspan="4" class="text-right">DDDD</td>
                                <td colspan="2" class="text-right">DDDD</td>
                            </tr> --}}
                                <tr>
                                    <td colspan="4" class="text-right">Purchase date: </td>
                                    <td colspan="2" class=""><input type="date" class="form-control" name="date" required></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Supplier: </td>
                                    <td colspan="2" class="">{{ $supplier->user->name }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Supplier's Previous Due: </td>
                                    <td colspan="2" class="">
                                        <input type="number" class="form-control" disabled id="supplier_due"
                                            value={{ $supplier->due() }}>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right ">Total Purchase Price: </td>
                                    <td colspan="2" class="">
                                        <input type="number" class="form-control" disabled id="total_purchase_price"
                                            value={{ $warehouse->total_purchase_price($supplier->id) }}>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right ">Grand Total : </td>
                                    <td colspan="2" class="">
                                        <input type="number" class="form-control" disabled id="grand_total"
                                            value={{ $warehouse->total_purchase_price($supplier->id) + $supplier->due() }}>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right ">Paid Amount: </td>
                                    <td colspan="2" class=""><input type="number" name="paid_amount" value="0"
                                            class="form-control" id="paid_amount"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Final Total Price: </td>
                                    <td colspan="2">
                                        <input type="number" class="form-control " disabled id="new_due"
                                            value={{ $warehouse->total_purchase_price($supplier->id) + $supplier->due() }}>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <button type="submit" name="submitType" value="submit"
                                            {{ $tempProducts->count() <= 0 ? 'disabled' : '' }}
                                            class="btn btn-sm btn-success submitBtn">Submit</button>
                                        <button type="submit" name="submitType"
                                            {{ $tempProducts->count() <= 0 ? 'disabled' : '' }}
                                            class="btn btn-sm btn-warning submitBtn" value="save_and_print">Submit And Print</button>
                                    </td>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('backend.purchase.purchaseJS');
@endsection
