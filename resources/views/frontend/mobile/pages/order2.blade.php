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

    <section class="padding-around m-3">


        <div class="steps-wizard clearfix mb-3 pt-2">
           <div class="step done" data-step-num="1">
               <div class="step-icon"> 1 </div>
               <span class="step-title">Shipping</span>
           </div>
           <div class="step current" data-step-num="2">
               <div class="step-icon"> 2 </div>
               <span class="step-title">Payment</span>
           </div>
           <div class="step" data-step-num="3">
               <div class="step-icon"> 3 </div>
               <span class="step-title">Confirm</span>
           </div>
       </div>
       
       
       <article class="box mb-3 bg-light">
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
               <dd class="text-right"><strong>$79.97</strong></dd>
           </dl>
       </article>
       
       <div class="box-selection active">
           <label class="custom-control custom-radio">
               <input type="radio" name="pay_option" checked="" class="custom-control-input">
               <div class="custom-control-label">Cash pay </div>
           </label>
       </div>
       
       <div class="box-selection">
           <label class="custom-control custom-radio">
               <input type="radio" name="pay_option" class="custom-control-input">
               <div class="custom-control-label">Cart visa -xxxx </div>
           </label>
       </div>
       
       <div class="box-selection">
       <label class="custom-control custom-radio">
           <input type="radio" name="pay_option" class="custom-control-input">
           <div class="custom-control-label">PayPal </div>
       </label>
       </div>
       <br>
       <a href="{{ route('order3') }}" class="btn btn-block btn-primary"> continue </a>
</main>
@endsection