<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link bg-primary">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu"
            data-accordion="true">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item has-treeview {{ session('lsbm') == 'dashboard' ? ' menu-open ' : '' }}">
                <a href="{{ route('company.dashboard', $company) }}" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Dashboard') }}
                        {{-- <i class="right fas fa-angle-left"></i> --}}
                    </p>
                </a>
                {{-- <ul class="nav nav-treeview">

                    <li class="nav-item ">
                        <a href="{{ route('company.dashboard', $company) }}"
                            class="nav-link {{ session('lsbsm') == 'dashboard' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Dashboard') }}</p>
                        </a>
                    </li>
                </ul> --}}
            </li>





            {{-- company --}}
            <li class="nav-item has-treeview {{ session('lsbm') == 'company' ? ' menu-open ' : '' }}">
                <a href="{{ route('company.companyDetails', $company) }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('Agent') }}
                        {{-- <i class="fas fa-angle-left right"></i> --}}
                    </p>
                </a>
                {{-- <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{ route('company.companyDetails', $company) }}"
                            class="nav-link {{ session('lsbsm') == 'companyDetails' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Company Details') }}</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{ route('company.companyDetailsUpdate', $company) }}"
                            class="nav-link {{ session('lsbsm') == 'companyDetailsUpdate' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Company Details Update') }}</p>
                        </a>
                    </li>
                </ul> --}}
            </li>
            {{-- ./company --}}
            {{-- search --}}
            <li class="nav-item has-treeview {{ session('lsbm') == 'search' ? ' menu-open ' : '' }}">
                <a href="{{route('company.advanceFlightSearch',$company)}}" class="nav-link">
                    <i class="fa fa-search nav-icon"></i>
                    <p>{{ __('Advance Flight Search') }}
                        {{-- <i class="fas fa-angle-left right"></i> --}}
                    </p>
                </a>

            </li>
            {{-- ./search --}}
            {{-- book ticket --}}
            <li class="nav-item has-treeview {{ session('lsbm') == 'bookATicket' ? ' menu-open ' : '' }}">
                <a href="{{ route('company.bookATicketForUser',$company) }}" class="nav-link">
                    <i class="fa fa-file-alt nav-icon"></i>
                    <p>{{ __('Book A Ticket') }}
                        {{-- <i class="fas fa-angle-left right"></i> --}}
                    </p>
                </a>

            </li>
            <li class="nav-item has-treeview {{ session('lsbm') == 'orderHistory' ? ' menu-open ' : '' }}">
                <a href="{{ route('company.orderHistoryOfCompany',$company) }}" class="nav-link">
                    <i class="fa fa-file-alt nav-icon"></i>
                    <p>{{ __('Order History') }}
                        {{-- <i class="fas fa-angle-left right"></i> --}}
                    </p>
                </a>

            </li>
            <li class="nav-item has-treeview {{ session('lsbm') == 'addToBalance' ? ' menu-open ' : '' }}">
                <a href="{{ route('company.addToBalance',$company) }}" class="nav-link">
                    <i class="fa fa-file-alt nav-icon"></i>
                    <p>{{ __('Add To Balance') }}
                        {{-- <i class="fas fa-angle-left right"></i> --}}
                    </p>
                </a>

            </li>
            {{-- ./book ticket --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
