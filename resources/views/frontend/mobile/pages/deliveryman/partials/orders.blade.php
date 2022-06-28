@if($orders->count() > 0)
<section class="p-2">
<div class="table-responsive">
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Order Id</th>
        <th scope="col">User Name</th>
        <th scope="col">Customer Address</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($orders as $order)
       <tr>
        <th scope="row">Pro-{{$order->id }}</th>
        <td> {{$order->user ? $order->user->name :"" }}</td>
        <td>
            <address>
            @foreach(json_decode($order->shipping_address) as $key => $s)

                {{$key}}:{{$s}}
                    <br>

            @endforeach
            <address>


        </td>
      </tr>

       @endforeach



    </tbody>
  </table>
</div>
  <div class="aiz-pagination">
    {{ $orders->appends(request()->input())->links() }}
</div>
@else
<p class="bg-primary bg-danger text-center w-100 p-3">Orders No Found</p>
</section>

@endif
