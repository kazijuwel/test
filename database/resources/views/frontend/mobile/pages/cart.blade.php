@extends('frontend.mobile.layout.app')
@section('content')

<main class="app-content">
    <section>

        <div class="input-group" style="background-color: #B0E0E6;padding: 8px 10px 8px 10px;">
            <input type="text" class="form-control" placeholder="Search Your Product"
                style="height:37px; border-radius: 0px">
            <div class="input-group-append">
                <span class="input-group-text bgprimary" style="width:70px; height:37px; border-radius: 0px"><i
                        class="fa fa-search text-white" aria-hidden="true"></i></span>
            </div>
        </div>
    </section>

<div class="bg-primary padding-x padding-bottom">
<p class="title-header text-white pt-2" style="height: 25px;">Your Cart (2)</p>
</div>

<section class="section-products padding-around">

<article class="item-cart">
<figure class="itemside mb-3">
<div class="aside"><img src="{{asset('public/mobileview')}}/images/items/item.jpg" class="rounded img-md"></div>
<figcaption class="info">
    <a href="#" class="title text-truncate">Great product name</a>
    <small class="text-muted d-block mb-1">
        Color: red, Capacity: 32 GB <br>  
    </small>

    <div class="price-wrap mb-3">
        <small class="text-muted">$34.00 /per item</small><br>
        <strong class="price">$120.00</strong>
    </div>
</figcaption>
</figure>

<a href="#" class="btn btn-icon btn-outline-danger"> <i class="fa fa-times"></i></a>
<a href="#" class="btn btn-icon btn-light"> <i class="fa fa-heart"></i></a>
<div class="input-group input-spinner float-right">
<div class="input-group-prepend">
    <button class="btn btn-light" type="button"> <i class="fa fa-minus"></i> </button>
</div>
<input type="number" class="form-control" value="1">
<div class="input-group-append">
    <button class="btn btn-light" type="button"> <i class="fa fa-plus"></i> </button>
</div>
</div>
</article> <!-- item-cart.// -->



<article class="item-cart">
<figure class="itemside mb-3">
<div class="aside"><img src="{{asset('public/mobileview')}}/images/items/item.jpg" class="rounded img-md"></div>
<figcaption class="info">
    <a href="#" class="title text-truncate">Great product name</a>
    <small class="text-muted d-block mb-1">
        Color: red, Capacity: 32 GB <br>  
    </small>

    <div class="price-wrap mb-3">
        <small class="text-muted">$34.00 /per item</small><br>
        <strong class="price">$120.00</strong>
    </div>
</figcaption>
</figure>

<a href="#" class="btn btn-icon btn-outline-danger"> <i class="fa fa-times"></i></a>
<a href="#" class="btn btn-icon btn-light"> <i class="fa fa-heart"></i></a>
<div class="input-group input-spinner float-right">
<div class="input-group-prepend">
    <button class="btn btn-light" type="button"> <i class="fa fa-minus"></i> </button>
</div>
<input type="number" class="form-control" value="1">
<div class="input-group-append">
    <button class="btn btn-light" type="button"> <i class="fa fa-plus"></i> </button>
</div>
</div>
</article> <!-- item-cart.// -->



<article class="item-cart">
<figure class="itemside mb-3">
<div class="aside"><img src="{{asset('public/mobileview')}}/images/items/item.jpg" class="rounded img-md"></div>
<figcaption class="info">
    <a href="#" class="title text-truncate">Great product name</a>
    <small class="text-muted d-block mb-1">
        Color: red, Capacity: 32 GB <br>  
    </small>

    <div class="price-wrap mb-3">
        <small class="text-muted">$34.00 /per item</small><br>
        <strong class="price">$120.00</strong>
    </div>
</figcaption>
</figure>

<a href="#" class="btn btn-icon btn-outline-danger"> <i class="fa fa-times"></i></a>
<a href="#" class="btn btn-icon btn-light"> <i class="fa fa-heart"></i></a>
<div class="input-group input-spinner float-right">
<div class="input-group-prepend">
    <button class="btn btn-light" type="button"> <i class="fa fa-minus"></i> </button>
</div>
<input type="number" class="form-control" value="1">
<div class="input-group-append">
    <button class="btn btn-light" type="button"> <i class="fa fa-plus"></i> </button>
</div>
</div>
</article> <!-- item-cart.// -->


</section> 
<hr class="divider">

    <section class="padding-around">
        <div class="coupon-apply">

    <form method="post" action="https://jam.com.bd/mypanel/my-coupon-apply">
      <input type="hidden" name="_token" value="98hvok7OcoRs1G0YLGb33SfdouCeVd6TTe8t928S">  
        
      <h5>Use Coupon Code</h5>
      <div class="input-group input-group-sm mb-3">
        <input type="text" class="form-control" name="coupon_code" placeholder="Apply your coupon code">
      <div class="input-group-append">
        <button class="btn btn-primary- btn-dark" type="submit">Apply Coupon</button>

      </div>


</div>
<span class="help-text">Enter your coupon code if you have one.</span>
        
      
     
    </form>
  </div>
        <dl class="dlist-align text-muted">
            <dt>Total price:</dt>
            <dd class="text-right">$69.97</dd>
        </dl>
        <dl class="dlist-align text-muted">
            <dt>Shipping:</dt>
            <dd class="text-right">$10.00</dd>
        </dl>
        <dl class="dlist-align">
            <dt><strong>Total:</strong></dt>
            <dd class="text-right"><strong>$59.97</strong></dd>
        </dl>

        <a href="{{ route('order1') }}" class="btn btn-primary btn-block mt-3"> <span class="text"> Checkout
            </span> <i class="fa fa-chevron-right"></i></a>

        <a href="{{ route('order1') }}" class="btn btn-light btn-block"> <i class="fa fa-arrow-left"></i> <span class="text">Continue Shopping</span></a>


    </section>

</main>

@endsection