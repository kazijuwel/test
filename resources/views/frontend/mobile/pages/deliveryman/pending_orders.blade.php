
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
                <section class="padding-x p-2 bg-primary text-white ">
                    <figure class="icontext align-items-center mr-4" style="max-width: 300px;">
                        <img class="icon icon-md rounded-circle" src="{{ "public/mobileview/" }}/images/avatars/1.jpg">
                        <figcaption class="text">
                            <p class="h5 title">
                                @if(Auth::check())
                                    {{auth()->user()->name}}
                                @endif
                            </p>
                            <p class=""><span class="bg-success pl-1 pr-1 rounded-pill">active</span></p>
                        </figcaption>
                    </figure>
                </section>
                @include('frontend.mobile.pages.deliveryman.partials.deliveryman-sidebar')
            </div>
          </div>
   </section>
    <hr class="divider">

      <section>
          <div class="p-3 text-center">
            <h5>Pending Orders</h5>
          </div>
          @include('frontend.mobile.pages.deliveryman.partials.orders')
      </section>

   </main>

@endsection
