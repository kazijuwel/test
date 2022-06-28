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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                            <b>Store:</b> {{ $warehouse->store_name }}
                            <b>Supplier/Seller:</b> {{ $supplier->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card elevation-2 w3-animate-zoom mt-n2 shadow">

            <div class="card-body  p-2" style="background: #efefef;">
                @include('alerts.alerts')
                <form action="{{ route('addTempItem') }}" method="POST" id="submitTempForm">

                    @csrf

                    <div class="row">
                        <input type="hidden" class="warehouse_id" name="warehouse_id" value="{{ $warehouse->id }}">
                        <input type="hidden" class="supplier_id" name="supplier_id" value="{{ $supplier->id }}">

                    </div>


                    <div class="row ">
                        <div class="col-md-5">
                            <div class="form-group input-group-sm">
                                <label for="name">Name</label>
                                <select id="product" name="product" required
                                    class="form-control user-select select2-container select2 step2-select select2"
                                    data-placeholder="Customer Code / Name" data-ajax-url="{{ route('getProductAjax') }}"
                                    data-ajax-cache="true" data-ajax-dataType="json" data-ajax-delay="200" style="">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group input-group-sm">
                                <label for="quantity">Purchase Qty</label>
                                <input type="number" name="quantity" id="quantity" class="form-control quantity"
                                    placeholder="Purchase Qty" step="any" min="0.01" aria-describedby="helpId" required>
                            </div>
                        </div>


                        <div class="col-md-2 ">
                            <div class="form-group input-group-sm">
                                <label for="purchase_price">Purchase Price</label>
                                <input type="number" name="purchase_price" step="any" min="0.01" class="form-control purchase_price"
                                    placeholder="Purchase Unit Price" aria-describedby="helpId" required>
                            </div>
                        </div>


                        <div class="col-md-2 ">
                            <div class="form-group input-group-sm">
                                <label for="sale_price">Sale Price</label>
                                <input type="number" name="sale_price" step="any" min="0.01" id="sale_price" class="form-control sale_price"
                                    placeholder="Sale Price" aria-describedby="helpId" required>
                            </div>
                        </div>

                        <div class="col-md-1 ">
                            <div class="form-group input-group-sm">
                                <label for=""> &nbsp;</label>
                                <button type="submit" class="btn btn-primary btn-sm btn-block"><i
                                        class="las la-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-footer w3-white p-0 pt-1">
                <form action="{{route('finalSave',['supplier'=>$supplier,'warehouse'=>$warehouse])}}" method="post" class="transfer-final-save">

                    @csrf

                    <style>
                        form.transfer-final-save {
                            width: 100%;
                        }

                        thead>tr>th {
                            font-size: 12px;
                        }
                    </style>

                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Purchase Price</th>
                                    <th>Sale Price</th>
                                    <th>Total Purchase Price</th>
                                </tr>
                            </thead>
                            <tbody id="showTempItems">
                                @foreach ($tempProducts as $item)
                                    <tr>
                                        <td><a class="text-danger deleteItem" href="{{route('deleteTempItem',['item'=>$item->id,'warehouse'=>$warehouse->id,'supplier'=>$supplier->id])}}"><i class="las la-trash"></i></a></td>

                                        <td id="id{{$item->id}}"><small>{{ $item->product->name }}</small></td>

                                        <td class="quantity">
                                            {{ $item->quantity }}
                                        </td>

                                        <td class="p_price">
                                            {{ $item->purchase_price }}

                                        </td>

                                        <td class="s_price">
                                            {{ $item->sale_price }}

                                        </td>
                                        <td class="t_price">{{ $item->total_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>

                                <tr>
                                    <th colspan="5" class="text-right">Purchase Date</th>
                                    <th colspan="2" class="w3-light-gray p-0">
                                        <div class="form-group m-0">
                                            <input type="date" class="form-control" name="purchase_date"
                                                value="{{ date('Y-m-d') }}">
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Supplier</th>
                                    <th colspan="2" class="w3-light-gray p-0">
                                        <input type="text" disabled readonly value="{{ $supplier->name }}"
                                            class="form-control">
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Supplier's Previous Due (TK)</th>
                                    <th colspan="2" class="w3-light-gray p-0">
                                        <div class="form-group form-group-sm mb-0">
                                            <input type="number" placeholder="Previous Due" min="0"
                                                step="any" class="form-control bg-light text-bold"
                                                value="{{ $supplier->due() }}" name="supplier_due" id="supplier_due"
                                                readonly>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Total Purchase Price (TK)</th>
                                    <th colspan="2" class="w3-light-gray p-0">
                                        <div class="form-group form-group-sm mb-0">

                                            <input type="number" placeholder="Total Purchase Price" min="0"
                                                step="any" class="form-control bg-light text-bold" value="{{ $warehouse->total_purchase_price($supplier->id) }}"
                                                name="total_purchase_price" id="total_purchase_price" readonly>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Grand Total (TK)</th>
                                    <th colspan="2" class="w3-light-gray p-0">
                                        <div class="form-group form-group-sm mb-0">
                                            <input type="number" name="grand_total" placeholder="Final Price"
                                                step="any" value="{{ $warehouse->total_purchase_price($supplier->id) }}" class="form-control text-bold bg-light"
                                                id="grand_total" readonly>
                                        </div>
                                    </th>
                                </tr>

                                <tr>
                                    <th colspan="5" class="text-right">Paid (TK)</th>
                                    <th colspan="2" class="w3-light-gray p-0">
                                        <div class="form-group form-group-sm mb-0">
                                            <input type="number" name="paid_amount" placeholder="Paid Amount"
                                                min="0" step="any" value=""
                                                class="form-control text-bold"  id="paid_amount">
                                        </div>
                                    </th>
                                </tr>

                                <tr>
                                    <th colspan="5" class="text-right">New Due</th>
                                    <th colspan="2" class="w3-light-gray p-0">
                                        <div class="form-group form-group-sm mb-0">
                                            <input type="number" name="new_due" placeholder="Return to member"
                                                step="any" value="{{ $warehouse->total_purchase_price($supplier->id) }}" class="form-control bg-light text-bold"
                                                id="new_due" readonly>
                                        </div>
                                    </th>
                                </tr>



                                <tr>
                                    <th colspan="4" class="text-right"></th>
                                    <th colspan="2" class="w3-light-gray py-3 text-center">
                                        <button type="submit"
                                            class="btn btn-sm final-save-btn only-save-btn  btn-primary ">
                                            &nbsp; &nbsp;
                                            &nbsp; &nbsp; Save &nbsp; &nbsp; &nbsp; &nbsp; </button>
                                        &nbsp; &nbsp;
                                        <input class="btn btn-sm final-save-btn final-save-and-print-btn btn-success"
                                            type="submit" data-print-url="" name="save_and_print"
                                            value="Save and Print">
                                    </th>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @include('backend.purchase.suppliers.spurchaseJS');
@endsection
