@extends('backend.layouts.app')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
        integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .select2 {
            padding: 0.6rem 1rem;
            font-size: .875rem;
            height: calc(1.3125rem + 1.2rem + 2px);
            border: 1px solid #e2e5ec;
            color: #898b92;
        }
    </style>
@endsection

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class=" align-items-center">
            <h1 class="h3">{{ translate('Purchase report') }}</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('purchaseReport') }}" method="GET">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <input type="date" class="form-control" name="from" id="from">
                    </div>

                    <div class="col-12 col-md-3">
                        <input type="date" class="form-control" name="to" id="to">
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="warehouse" class="form-control select2" id="warehouse">
                            <option value="">Select Warehouse</option>
                            @foreach ($warehouse_list as $warehouse)
                                <option
                                    {{ isset($request['warehouse']) && $warehouse->id == $request['warehouse'] ? 'selected' : '' }}
                                    value="{{ $warehouse->id }}">{{ $warehouse->store_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-3">
                        <select id="supplier" name="supplier"
                        class="form-control user-select select2-container supplier-select select2"
                        data-placeholder="Supplier Name/ID" data-ajax-url="{{ route('supplierAllAjax') }}"
                        data-ajax-cache="true" data-ajax-dataType="json" data-ajax-delay="200" style="">
                    </select>
                    </div>
                    <div class="col-12 col-md-3">
                        <select id="seller" name="seller"
                        class="form-control user-select select2-container seller-select select2"
                        data-placeholder="Seller Name/ID" data-ajax-url="{{ route('sellerAllAjax',['type'=>'seller']) }}"
                        data-ajax-cache="true" data-ajax-dataType="json" data-ajax-delay="200" style="">
                        @if ($supplier)
                        <option selected value="{{$suplier->id}}"> {{$supplier->user ? $supplier->user->name : $supplier->name}}</option>

                        @endif
                    </select>
                    </div>
                    <div class="col-12 col-md-3">
                        <button class="btn btn-success">Filter</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            });

            $('.supplier-select').select2({
                theme: 'bootstrap4',
                // minimumInputLength: 1,
                ajax: {
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        // alert(data[0].s);
                        var data = $.map(data, function(obj) {
                            obj.id = obj.id || obj.id;
                            return obj;
                        });
                        var data = $.map(data, function(obj) {
                            obj.text = obj.name + "(" + obj.id + ")";
                            return obj;
                        });
                        return {
                            results: data,
                            pagination: {
                                more: (params.page * 10) < data.total_count
                            }
                        };
                    }
                },
            });
            $('.seller-select').select2({
                theme: 'bootstrap4',
                // minimumInputLength: 1,
                ajax: {
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        // alert(data[0].s);
                        var data = $.map(data, function(obj) {
                            obj.id = obj.id || obj.id;
                            return obj;
                        });
                        var data = $.map(data, function(obj) {
                            obj.text = obj.name + "(" + obj.id + ")";
                            return obj;
                        });
                        return {
                            results: data,
                            pagination: {
                                more: (params.page * 10) < data.total_count
                            }
                        };
                    }
                },
            });


        });
    </script>
@endsection
