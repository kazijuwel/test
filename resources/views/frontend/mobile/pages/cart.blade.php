@extends('frontend.mobile.layout.app')
@section('content')

<main class="app-content" id="cart-summary">
   

<div class="bg-primary padding-x padding-bottom">
    @php
        if(Session::has('cart'))
        {
            $totalCart=count(Session::get('cart'));
        }
        else{
            $totalCart=0;
        }
    @endphp
<p class="title-header text-white pt-2" style="height: 25px;">Your Cart ({{ $totalCart }})</p>
</div>

<section class="section-products padding-around" >
<!--Single Product---->

@if( Session::has('cart') && count(Session::get('cart')) > 0 )
@php
$total = 0;
$product_shipping_cost = 0;
$product_commision_rate = 0;
@endphp
@foreach (Session::get('cart') as $key => $cartItem)
<!--php--->
@php
$product = \App\Product::find($cartItem['id']);

if ($product->category->commision_rate) {
if ($product->added_by == 'admin') {
$product_commision_rate = 0;
} else {
$product_commision_rate = ((($cartItem['price'] + $cartItem['tax'])) * $product->category->commision_rate) / 100;
}
}
if ($product->shipping_cost) {
$product_shipping_cost = $product->shipping_cost;
}
$total = $total + $cartItem['price']*$cartItem['quantity'] + $product_shipping_cost*$cartItem['quantity'] + $product_commision_rate *$cartItem['quantity'] +$cartItem['tax']*$cartItem['quantity'];
$product_name_with_choice = $product->getTranslation('name');

if ($cartItem['variant'] != null) {
    $product_name_with_choice = $product->getTranslation('name').' - '.$cartItem['variant'];
}
@endphp

<!---php-->
<article class="item-cart">
<figure class="itemside mb-3">
<div class="aside"><img src="{{ uploaded_asset($product->thumbnail_img) }}" class="rounded img-md"></div>
<figcaption class="info">
    <a href="#" class="title text-truncate text-wrap">{{  $product->getTranslation('name')  }}</a>

    <div class="price-wrap mb-3">
        <small class="text-muted">{{ single_price($cartItem['price']+$product_shipping_cost +$product_commision_rate) }} /per item</small>,
        <small class="text-muted">{{ single_price($cartItem['tax']) }} /tax</small><br>
        <strong class="price">{{ single_price(($cartItem['price']+$cartItem['tax'])*$cartItem['quantity']+$product_shipping_cost*$cartItem['quantity'] +$product_commision_rate*$cartItem['quantity']) }}</strong>
    </div>
</figcaption>
</figure>

<a href="#" class="btn btn-icon btn-outline-danger" onclick="removeFromCartView(event, {{ $key }})"> <i class="fa fa-times"></i></a>
<a href="#" class="btn btn-icon btn-light"> <i class="fa fa-heart"></i></a>
<!----hello-->
<div class="input-group input-spinner aiz-plus-minus float-right">
    <button class="btn btn-light"
            type="button" data-type="minus"
            data-field="quantity[{{ $key }}]">
        <i class="fa fa-minus"></i>
    </button>
    <input type="text" name="quantity[{{ $key }}]"
           class="col border-0 text-center flex-grow-1 fs-16 input-number"
           placeholder="1" value="{{ $cartItem['quantity'] }}"
           min="1" max="10" readonly
           onchange="updateQuantity({{ $key }}, this)">
    <button class="btn btn-light"
            type="button" data-type="plus"
            data-field="quantity[{{ $key }}]">
        <i class="fa fa-plus"></i>
    </button>
</div>
<!--Hello-->
</article>
@endforeach

<!-- item-cart.// -->
</section>
</section> 
<hr class="divider">

            <section class="padding-around">
                <dl class="dlist-align">
                    <dt><strong>Subtotal:</strong></dt>
                    <dd class="text-right"><strong>{{ single_price($total) }}</strong></dd>
                </dl>
                @if(Auth::check())
                <a href="{{ route('checkout.shipping_info') }}" class="btn btn-primary btn-block mt-3"> <span class="text"> Checkout
                    </span> <i class="fa fa-chevron-right"></i></a>
                @else
                <button onclick="showCheckoutModal()" class="btn btn-primary btn-block mt-3"> <span class="text"> Checkout
                </span> <i class="fa fa-chevron-right"></i></button>
                @endif

                <a href="#" class="btn btn-light btn-block"> <i class="fa fa-arrow-left"></i> <span class="text">Return to Shop</span></a>


            </section> 
</main>
@else
<div class="row">
    <div class="col-xl-8 mx-auto">
        <div class="shadow-sm bg-white p-4 rounded">
            <div class="text-center p-3">
                <i class="las la-frown la-3x opacity-60 mb-3"></i>
                <h3 class="h4 fw-700">{{translate('Your Cart is empty')}}</h3>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
@section('js')
    <script type="text/javascript">
        function removeFromCartView(e, key) {
            e.preventDefault();
            removeFromCart(key);
        }

        function updateQuantity(key, element) {
            $.post('{{ route('cart.updateQuantity') }}', {
                _token: '{{ csrf_token() }}',
                key: key,
                quantity: element.value
            }, function (data) {
                updateNavCart();
                $('#cart-summary').html(data);
            });
        }

        function showCheckoutModal() {
            $('#GuestCheckout').modal();
        }
    </script>
@endsection