@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header bg-secondary">
                      All Intentory List
                    </div>
                    <div class="card-body">
                       <div class="row">
                           <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Store Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Details</th>
                                <th scope="col">Date</th>
                                <th scope="col">Product Serial No</th>
                                <th scope="col">Suppiler</th>
                                <th scope="col">Customer</th>
                                <th scope="col">In</th>
                                <th scope="col">Out</th>
                                <th scope="col">Stock Qty</th>
                                <th scope="col">Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventorys as $iv)
                                <tr>
                                    <td>

                                            <a href="{{ route('editinventory',$iv->id) }}" class="btn btn-primary">Edit</a>

                                    </td>
                                    <td>bob{{ $iv->order_id }}</td>
                                    <td>
                                        @if($iv->store)
                                        <a href="{{ route('storewiseProductStock',$iv->store_id) }}">{{ $iv->store->store_name}}</a>
                                        @endif
                                    </td>
                                    <td>
                                        <ul>
                                        @foreach ($iv->inventoryItems as $item )
                                        <li>
                                            @if($item->product)

                                            <a href="{{ route('productwisestock',$item->product_id) }}">{{ $item->product->name}}</a>

                                            @endif
                                        </li>

                                            <br>
                                        @endforeach
                                        </ul>

                                    </td>
                                    <td>
                                        <ul>


                                    </td>
                                    <td scope="col">

                                        {{ date('d/m/Y',strtotime($iv->created_at)) }}
                                    </td>
                                    <td>{{ $iv->order_id }}</td>
                                    <td>
                                        @if($iv->sellerName)
                                        {{ $iv->sellerName->name }}
                                        @endif


                                    </td>
                                    <td>
                                        @if($iv->customerName)
                                        {{ $iv->customerName->name }}
                                        @endif
                                    </td>
                                        @php
                                            $purchaseAmount=0;

                                            foreach ($iv->inventoryItems as  $pur) {

                                                if($pur->purchase){
                                                $purchaseAmount += $pur->purchase->purchase_price * $pur->purchase_quentity ;
                                            }
                                            }

                                            $salesAmount=0;

                                            foreach ($iv->inventoryItems as  $sale) {

                                             if($sale->purchase){
                                                $salesAmount += $sale->purchase->purchase_price * $sale->sale_quentity ;
                                             }

                                            }
                                        @endphp

                                         <td>
                                        {{ $iv->inventoryItems()->sum('purchase_quentity') }}
                                    </td>
                                    <td>
                                        {{ $iv->inventoryItems()->sum('sale_quentity') }}

                                    </td>
                                    <td>
                                        {{ $iv->inventoryItems()->sum('stock_quentity') }}
                                    </td>
                                    <td>
                                        {{ $purchaseAmount - $salesAmount }}
                                    </td>
                                  </tr>
                                @endforeach

                            </tbody>
                          </table>
                        </div>
                          {{-- <div class="aiz-pagination">
                            {{ $stores->appends(request()->input())->links() }}
                        </div> --}}
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
@endsection
@section('script')

@endsection
