<a id="wishlist" href="{{ route('wishlists.index') }}" class="d-flex align-items-center text-reset">
    <i class="la la-heart-o la-cx "></i>


        @if(Auth::check())
            <span class="badge badge-primary badge-inline badge-pill"style="position: relative;
  top: -5px;
  right: 5px;" >{{ count(Auth::user()->wishlists)}}</span>
        @else
            <span class="badge badge-primary badge-inline badge-pill" style="position: relative;
  top: -5px;
  right: 5px;">0</span>
        @endif
        <span class="nav-box-text">{{translate('Wishlist')}}</span>

</a>


