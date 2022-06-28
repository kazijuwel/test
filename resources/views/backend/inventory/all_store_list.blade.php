@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        All Stores/Warehouses List
                        <a class="btn btn-light btn-sm" data-toggle="modal" data-target="#bobstore">Add Belaobela Store</a>
                    </div>

                    <div class="card-body">
                        {{-- <div class="table-responsive"> --}}
                        <table class="table table-bordered aiz-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Store Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Edited By</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores as $s)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('selectWarehouseToPurchase', $s) }}">Seller
                                                        Purchases</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('supplier.selectWarehouseToPurchase', $s) }}">Supplier
                                                        Purchases</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('warehousePurchaseList', $s) }}">Supplier
                                                        Purchases List</a>
                                                    <a class="dropdown-item" href="{{ route('purchaseList', $s) }}">Seller
                                                        Purchases List</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('warhouseStockList', $s) }}">Stock List</a>
                                                    {{-- <a class="dropdown-item"
                                                        href="{{ route('storewiseProductStock', $s->id) }}">Inventories</a> --}}

                                                    <a class="dropdown-item"
                                                        href="{{ route('store_edit', $s->id) }}">Edit</a>
                                                    {{-- <a class="dropdown-item"
                                                        href="{{ route('store_delete', $s->id) }}">Delete</a> --}}
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $s->store_name }}</td>
                                        <td>{{ $s->address }}</td>
                                        <td>{{ $s->user->name }}</td>
                                        <td>
                                            @if ($s->EditedName)
                                                {{ $s->EditedName->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($s->active == 1)
                                                <span class="text-primary">Active</span>
                                            @else
                                                <span class="text-danger">Deactive</span>
                                            @endif

                                        </td>


                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="aiz-pagination">
                            {{ $stores->appends(request()->input())->links() }}
                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="bobstore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Belaobela Store</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('bobcreatestore') }}" method="Post">
                            @csrf
                            <div class="form-group">
                                <label for="Storename">Store Name</label>
                                <input type="text" name="store_name" class="form-control" id="Storename"
                                    aria-describedby="emailHelp" placeholder="Store Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Status</label>
                                <select class="form-control" id="exampleFormControlSelect2" name="active">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
