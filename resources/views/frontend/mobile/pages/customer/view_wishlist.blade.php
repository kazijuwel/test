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
    @include('frontend.mobile.partials.search')
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
    <hr class="divider my-1">
    <section class="padding-x">
        <p class="p-1">Wishlist</p>
        <div class="row">
            @foreach ($wishlists as $key => $wishlist)
            @if ($wishlist->product != null)
            <div class="col-6 col-sm-6 col-md-4">
                <a href="{{ route('product', $wishlist->product->slug) }}" class="product-sm mb-3" style="border: 1px solid gray; padding: 1px;">
                    <div class="img-wrap"> <img src="{{ uploaded_asset($wishlist->product->thumbnail_img) }}"> </div>
                    <div class="text-wrap">
                        <p class="title text-truncate">{{ $wishlist->product->getTranslation('name') }}</p>
                        <div class="price">
                            @if(home_base_price($wishlist->product->id) != home_discounted_base_price($wishlist->product->id))
                            <small class="text-primary">
                                <del>{{ home_base_price($wishlist->product->id)}}</del>
                            </small>
                            @endif
                            <small class="text-primary">
                                {{ home_discounted_base_price($wishlist->product->id)}}
                            </small>
                        </div>
                    </div>
                </a>
            </div> <!-- col.// -->
            @endif
            @endforeach

           
        </div> <!-- row end -->
        
        </section>



   <!--start footer-->
   </main>

@endsection