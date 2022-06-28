@extends('frontend.mobile.layout.app')
@section('content')
@section('css')
<style>
    .card .card-body {
    /* padding: 20px 25px; */
    /* border-radius: 4px; */
}
</style>
@endsection
<main class="app-content">
    <!---End Header-->
    <hr class="divider">
    <section>
        <div class="card">
            <div class="card-body">
                @include('frontend.mobile.pages.userdetails')
                @include('frontend.mobile.layout.dashboardlink')
            </div>
          </div>
   </section>
    <hr class="divider">
    <section class="padding-around">
        <ul class="row">
            <li class="col-4">
                <a href="#" class="btn-card-icontop btn">
                    <span class="icon"> <i class="fa fa-heart"></i> </span>
                    @php
                    $orders = \App\Order::where('user_id', Auth::user()->id)->get();
                    $total = 0;
                    foreach ($orders as $key => $order) {
                        $total += count($order->orderDetails);
                    }
                   @endphp
                    <small class="text text-center">{{ count(Auth::user()->wishlists)}} Products</small>
                    <small class="text text-center">in your Wishlist </small>
                </a>
            </li>
            <li class="col-4">
                <a href="#" class="btn-card-icontop btn">
                    <span class="icon"> <i class="fa fa-cart-arrow-down"></i> </span>
                    @if(Session::has('cart'))
                    <small class="text text-center"> {{ count(Session::get('cart'))}} Products</small>
                    @else
                    <small class="text text-center"> 0 Product</small>
                    @endif
                    <small class="text text-center">in your Cart</small>
                </a>
            </li>
            <li class="col-4">
                <a href="#" class="btn-card-icontop btn">
                    <span class="icon"> <i class="fa fa-wallet"></i> </span>
                    @php
                    $orders = \App\Order::where('user_id', Auth::user()->id)->get();
                    $total = 0;
                    foreach ($orders as $key => $order) {
                        $total += count($order->orderDetails);
                    }
                   @endphp
                    <small class="text text-center"> {{ $total}} Products</small>
                    <small class="text text-center">in your Order</small>
                </a>
            </li>
        </ul>
    </section>
    <hr class="divider">
    <section class="padding-around">
        <div class="card">
            <div class="card-header">Default Shipping Address</div>
            <div class="card-body">
                <p> @if(Auth::user()->addresses != null)
                    @php
                        $address = Auth::user()->addresses->where('set_default', 1)->first();
                    @endphp
                    @if($address != null)
                        <ul class="list-unstyled mb-0">
                            <li class=" py-2"><span>{{ translate('Address') }} : {{ $address->address }}</span></li>
                            <li class=" py-2"><span>{{ translate('Country') }} : {{ $address->country }}</span></li>
                            <li class=" py-2"><span>{{ translate('City') }} : {{ $address->city }}</span></li>
                            <li class=" py-2"><span>{{ translate('Postal Code') }} : {{ $address->postal_code }}</span></li>
                            <li class=" py-2"><span>{{ translate('Phone') }} : {{ $address->phone }}</span></li>
                        </ul>
                    @endif
                @endif</p>
            </div>

        </div>
    </section>

   <!--start footer-->
   </main>

@endsection
