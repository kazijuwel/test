<nav class="nav-bottom" style="border-top-left-radius: 0px; border-top-right-radius: 0px;">
    <a href="{{ route('home') }}" class="nav-link active">
        <i class="icon fa fa-home"></i><span class="text">Home</span>
    </a>

    <a href="{{ route('categories.all') }}" class="nav-link">
        <i class="icon fa fa-th"></i><span class="text">Category</span>
    </a>

    <a href="{{ route('cart') }}" class="nav-link">

        <i class="icon fa fa-shopping-cart">
        </i>
        @if(Session::has('cart'))
        <span class="badge badge-primary badge-inline badge-pill"
         style="position: relative; top: -5px;right: 5px;" id="cart_items">{{ count(Session::get('cart'))}}
        </span>

        @else
            <span class="badge badge-primary badge-inline badge-pill" id="cart_items"
                    style="position: relative; top: -5px;right: 5px;">0</span>
        @endif

        <span class="text">Cart</span>
    </a>
    @if(Auth::check())
     @if(Auth::user()->user_type == "admin")
    <a href="{{ route('admin_dashboard') }}" class="nav-link">
        <i class="icon fa fa-user"></i><span class="text">Dashboard</span>
    </a>
    @else
    <a href="{{ route('dashboard') }}" class="nav-link">
        <i class="icon fa fa-user"></i><span class="text">Profile</span>
    </a>
    @endif
    @else
    <a href="{{ route('user.login') }}" class="nav-link">
        <i class="icon fa fa-user"></i><span class="text">User</span>
    </a>
    @endif
</nav>
