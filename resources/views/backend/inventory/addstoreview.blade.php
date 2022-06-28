@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        Product List
                      </div>
                    <div class="card-body">
                        <p class="text-center">Belaobela.com.bd</p>
                        <p class="text-primary">Order Name:bob{{ $orederId }}</p>
                        <label for="">Selected store:</label>
                        <form action="{{ route('addstoreupdate') }}" method="post">
                            @csrf
                            <input type="hidden" name="orderId" value="{{ $orederId }}">
                            <select class="form-select form-control" name="storeId">
                                <option value="Null">Select Store</option>
                                @foreach ($stores as $store)
                                <option value="{{ $store->id }}" {{ ($store->id == $Inv->store_id)? "selected":Null}}>{{ $store->store_name }}</option>
                                @endforeach
                              </select>
                              <input type="submit" value="Save" class="btn btn-primary mt-1 float-right">
                        </form>
                    </div>
                    <div class="card-body">
                       <div class="row">
                           <div class="table-responsive">
                               <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col" style="width: 200px">store</th>
                                    <th scope="col">serial</th>
                                    <th scope="col">In</th>
                                    <th scope="col">out</th>
                                    <th scope="col">Stock Balance</th>
                              </tr>
                            </thead>
                            <tbody id="addtoproductitem">
                                <form action="">
                                @foreach ($InvProducts as $iv)
                             
                                    @foreach ($iv->inventoryItems as $item)

                             

                                    <tr data-item="{{ $item->order_item_id }}">
                                        <td>{{ $loop->index+1 }}</td>
                                        <td><a href="{{ route('productwisestock',$item->product_id) }}">{{ $item->product ? $item->product->name : '' }}</a></td>
                                        <td>
                                        <select class="form-select form-control store" data-field="{{$item->order_item_id}}">
                                            <option>Select Store</option>
                                                @foreach ($stores as $store)
                                                <option value={{ $store->id }} {{ ($store->id == $item->store_id)? "selected":" " }}>{{ $store->store_name }}</option>
                                                @endforeach
                                        </select>
                                        </td>
                                        <td>

                                            <input type="text" value="{{ $item->serial }}" class="form-control serial" data-field="{{$item->order_item_id}}">

                                        </td>
                                        <td>
                                            <input type="text" class="form-control in" value="{{  $item->purchase_quentity }}" data-field="{{$item->order_item_id}}">

                                        </td>
                                        <td>
                                        <input type="text" class="form-control out" value="{{ $item->sale_quentity }}" data-field="{{$item->order_item_id}}">
                                        </td>
                                        <td>
                                            {{ $item->stock_quentity }}
                                        </td>

                                    </tr>

                                    @endforeach

                                 @endforeach
                                </form>
                            </tbody>

                          </table>
                        </div>
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
@section('script')
<script>
$(document).on("change", ".out", function() {

var that =$(this);
var item= that.closest('tr').attr('data-item');
var produtItemId= that.attr('data-field');
var value= that.val();
var _token= "{{ csrf_token() }}";
var url = "{{ route("addproductitemupdate") }}";
var fieldName = "sale_quentity";
var OrderId= "{{ $orederId }}";
var type="sales";
$.post(url, {value: value,_token:_token,produtItemId:produtItemId,fieldName:fieldName,type:type,OrderId:OrderId}, function(result){
alert(result);

  });
});




$(document).on("change", ".in", function() {

var that =$(this);
var item= that.closest('tr').attr('data-item');
var produtItemId= that.attr('data-field');
var value= that.val();
var _token= "{{ csrf_token() }}";
var url = "{{ route("addproductitemupdate") }}";
var fieldName = "purchase_quentity";
var OrderId= "{{ $orederId }}";
var type="purchase";
$.post(url, {value: value,_token:_token,produtItemId:produtItemId,fieldName:fieldName,type:type,OrderId:OrderId}, function(result){
    alert(result);

  });
});

$(document).on("change", ".serial", function() {
var that =$(this);
var item= that.closest('tr').attr('data-item');
var produtItemId= that.attr('data-field');
var value= that.val();
var _token= "{{ csrf_token() }}";
var url = "{{ route("storeandpurchaseupdate") }}";
var fieldName = "serial";
var OrderId= "{{ $orederId }}";
$.post(url, {value: value,_token:_token,produtItemId:produtItemId,fieldName:fieldName,OrderId:OrderId}, function(result){
    alert(result)

  });
});



$(document).on("change", ".store", function() {
var that =$(this);
var item= that.closest('tr').attr('data-item');
var produtItemId= that.attr('data-field');
var value= that.val();
var _token= "{{ csrf_token() }}";
var url = "{{ route("storeandpurchaseupdate") }}";
var fieldName = "store_id";
var OrderId= "{{ $orederId }}";
$.post(url, {value: value,_token:_token,produtItemId:produtItemId,fieldName:fieldName,OrderId:OrderId}, function(result){
    alert(result)

  });
});
</script>

@endsection
