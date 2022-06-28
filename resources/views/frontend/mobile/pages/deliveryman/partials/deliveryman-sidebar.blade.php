<ul class="list-group list-group-flush">
    <a href="{{ route('deliveryman.dashboard') }}"
        class="list-group-item list-group-item-action {{ route('deliveryman.dashboard') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
        Deliveryman Dashboard
    </a>

    <a href="{{ route('deliveryman.pending_orders') }}"
        class="list-group-item list-group-item-action {{ areActiveRoutes(['deliveryman.pending_orders']) }}">
        <i class="fa fa-backward aiz-side-nav-icon" aria-hidden="true"></i>
         Pending Orders
    </a>

    <a href="{{ route('deliveryman.delivery_orders') }}"
        class="list-group-item list-group-item-action {{ areActiveRoutes(['deliveryman.delivery_orders']) }}">
        <i class="fa fa-backward aiz-side-nav-icon" aria-hidden="true"></i>
         Delivery Orders
    </a>

    <a href="{{ route('deliveryman.ondelivery_orders') }}"
        class="list-group-item list-group-item-action {{ areActiveRoutes(['deliveryman.ondelivery_orders']) }}">
        <i class="fa fa-backward aiz-side-nav-icon" aria-hidden="true"></i>
        On Delivery Orders
    </a>

    <a href="{{ route('deliveryman.confirmed_orders') }}"
        class="list-group-item list-group-item-action {{ areActiveRoutes(['deliveryman.confirmed_orders']) }}">
        <i class="fa fa-backward aiz-side-nav-icon" aria-hidden="true"></i>
        Confirmed Orders
    </a>

    <a href="{{ route('deliveryman.cancel_orders') }}"
        class="list-group-item list-group-item-action {{ areActiveRoutes(['deliveryman.cancel_orders']) }}">
        <i class="fa fa-backward aiz-side-nav-icon" aria-hidden="true"></i>
        Cancel Orders
    </a>


</ul>
