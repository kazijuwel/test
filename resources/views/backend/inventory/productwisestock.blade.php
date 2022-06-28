@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Product: {{ $product->name }}

                        <span class="btn btn-primary"><b>Total Stock: {{ $totalQty }}</b></span>
                      </div>

                    <div class="card-body">
                       <div class="row">
                           <div class="table-responsive">
                               <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">date</th>
                                    <th scope="col" style="width: 200px">Order Id</th>
                                    <th scope="col">Store</th>
                                    <th scope="col">In</th>
                                    <th scope="col">out</th>
                                    <th scope="col">Stock Qty </th>
                                   
                                </tr>
                            </thead>
                            <tbody id="addtoproductitem">
                                @foreach ($inventorys as $pro)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ date('d/m/Y',strtotime($pro->created_at)) }}</td>
                                        <td>{{ $pro->order_id }}</td>
                                        <td>
                                            @if($pro->store)
                                            <a href="{{ route('storewiseProductStock', $pro->store_id) }}" class="btn btn-link">{{ $pro->store->store_name }}</a>
                                            @endif
                                            </td>
                                        <td>
                                            {{ $pro->purchase_quentity }}
                                        </td>
                                        <td>
                                            {{ $pro->sale_quentity }}
                                        </td>
                                        <td>{{ $pro->stock_quentity }}</td>
                                         
                                    </tr>
                                @endforeach
                            </tbody>

                          </table>
                        </div>
                        </div>

                        {{ $inventorys->links() }}
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
@section('script')
@endsection

