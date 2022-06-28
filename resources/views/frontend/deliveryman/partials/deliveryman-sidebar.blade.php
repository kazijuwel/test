<div class="aiz-user-sidenav-wrap pt-4 position-relative z-1 shadow-sm">
    <div class="aiz-user-sidenav rounded overflow-hidden  c-scrollbar-light">
        <div class="px-4 text-center mb-4">
            <span class="avatar avatar-md mb-3">
                @if (Auth::user()->avatar_original != null)
                    <img src="{{ uploaded_asset(Auth::user()->avatar_original) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                @else
                    <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="image rounded-circle" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                @endif
            </span>
        </div>

        <div class="sidemnenu mb-3">
            <ul class="aiz-side-nav-list" data-toggle="aiz-side-menu">

                <li class="aiz-side-nav-item">
                    <a href="{{ route('deliveryman.dashboard') }}" class="aiz-side-nav-link {{ areActiveRoutes(['dashboard'])}}">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Dashboard') }}</span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="{{ route('deliveryman.pending_orders') }}" class="aiz-side-nav-link {{ areActiveRoutes(['deliveryman.pending_orders'])}}">
                        <i class="las la-file-alt aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"> Pending Orders </span>

                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('deliveryman.delivery_orders') }}" class="aiz-side-nav-link {{ areActiveRoutes(['deliveryman.delivery_orders'])}}">
                        <i class="las la-file-alt aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Delivery Orders </span>

                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('deliveryman.ondelivery_orders') }}" class="aiz-side-nav-link {{ areActiveRoutes(['deliveryman.ondelivery_orders'])}}">
                        <i class="las la-file-alt aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">On Delivery Orders </span>

                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('deliveryman.confirmed_orders') }}" class="aiz-side-nav-link {{ areActiveRoutes(['deliveryman.confirmed_orders'])}}">
                        <i class="las la-file-alt aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Confirmed Orders </span>

                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('deliveryman.cancel_orders') }}" class="aiz-side-nav-link {{ areActiveRoutes(['deliveryman.cancel_orders'])}}">
                        <i class="las la-file-alt aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Cancel Orders </span>

                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>
