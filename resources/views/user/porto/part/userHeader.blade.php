<header id="header"
    data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': false, 'stickyStartAt': 0}">
    <div class="header-body border-top-0" style="background-color: #0C254D;">
        <div class="header-container container pl-5">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="{{ url('/') }}">
                                <img alt="Porto" width="100%" height="40"
                                    src="{{ asset('user/img/tripbeyondlogo.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links order-2 order-lg-1">

                            <div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-text-capitalize header-nav-main-text-size-2 header-nav-main-mobile-dark header-nav-main-effect-1 header-nav-main-sub-effect-1 appear-animation"
                                data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}">
                                <nav class="collapse">
                                    <ul class="nav nav-pills pb-3 pt-3" id="mainNav">
                                        <a class="btn font-weight-semibold appear-animation tarek-h-a"
                                            style="border: 2px solid white;  height:35px" data-appear-animation="fadeIn"
                                            data-plugin-options="{'accY': 100}" href="#"><small>USD <i
                                                    class="icon-arrow-down icons pl-2"></i></small></a>

                                        <a class="btn  appear-animation tarek-h-a" style="font-size:11px"
                                            data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}"
                                            href="{{ route('welcome.contactUs2') }}">Contact us</a>



                                        @guest
                                        <a class="btn  appear-animation tarek-h-a" font-size:11px"
                                            data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}" href=""
                                            data-toggle="modal" data-target="#defaultModal">Sign Up</a>

                                        <a class="btn  appear-animation tarek-h-a tarek-d" style=" font-size:11px"
                                            data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}"
                                            href="">|</a>

                                        <a class="btn  appear-animation tarek-h-a" style="font-size:11px"
                                            data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}" href=""
                                            data-toggle="modal" data-target="#signInModal">Sign In</a>

                                        @endguest
                                        @auth
                                        {{-- <a class="btn font-weight-semibold px-2 tarekl-3 appear-animation "
                                            data-appear-animation="fadeIn " data-toggle="dropdown"
                                            data-plugin-options="{ 'accY': 100} " href="" target="_blank "><i class="fas
                                                fa-user-circle pr-2 "></i>
                                            Welcome {{ \Auth::user()->name }}</a> --}}


                                        <a class=" nav-link dropdown btn font-weight-bold px-2 tarekl-3 appear-animation "
                                            data-appear-animation="fadeIn " data-toggle="dropdown"
                                            data-plugin-options="{ 'accY': 100} " href="#"><img class="pr-3"
                                                src="{{ asset('user/svg/user.svg') }}" height="23" alt="">
                                            Welcome {{ \Auth::user()->name }}</a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            {{-- <span class="dropdown-header">15 Notifications</span> --}}
                                            {{-- <div class="dropdown-divider"></div> --}}
                                            @if (Auth::user()->isAdmin())
                                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                                <i class="fas fa-th mr-2"></i> {{ __('Admin Dashboard') }}

                                            </a>
                                            @endif
                                            {{-- @if (Auth::user()->isCoordinator())
                                            <a href="{{ route('coordinator.dashboard') }}" class="dropdown-item">
                                                <i class="fas fa-th mr-2"></i> {{ __('Coordinator Dashboard') }}
                                            </a>
                                            @endif --}}

                                            @if (Auth::user()->hasCompanyRole())

                                            @foreach (Auth::user()->activeCompanies() as $company)
                                            <a title="{{ $company->title }}"
                                                href="{{ route('company.dashboard', $company) }}" class="dropdown-item">
                                                <i class="fas fa-user-circle mr-2"></i>

                                                Company: {{ custom_title($company->company_code, 10, '..') }}

                                            </a>
                                            @endforeach
                                            @endif



                                            {{-- @if (Auth::user()->hasSubrole())
                                            @foreach (Auth::user()->activeSubroles() as $subrole)
                                            <a title="company: {{$subrole->company? $subrole->company->title : ''}}"
                                                href="{{ route('subrole.dashboard', $subrole) }}" class="dropdown-item">

                                                <i class="fas fa-user-tag mr-2"></i>
                                                Member Role: {{$subrole->title}}
                                            </a>
                                            @endforeach

                                            @endif --}}
                                            @if (Auth::user())
                                            <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                                <i class="fas fa-user-tag mr-2"></i>
                                                User Dashboard</a>
                                            @endif




                                            <div class="dropdown-divider"></div>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                  document.getElementById('logout-form').submit();"
                                                class="dropdown-item">
                                                <i class="fas fa-sign-out-alt mr-2"></i> {{ __('logout') }}
                                                {{-- <span class="float-right text-muted text-sm"></span> --}}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                        <a class="btn font-weight-semibold px-2 ml-1 appear-animation  tarek-h-a"
                                            data-appear-animation="fadeIn" data-plugin-options="{ 'accY': 100} "
                                            href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">{{
                                            __('logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        {{-- @include('welcome.layouts.roleDashboardLinks') --}}
                                        @endauth


                                        <a class="btn  font-weight-semibold tarekl-3 appear-animation text-dark tarek-h-a tb-o"
                                            style="background-color: #F6931D; height: 35px;"
                                            data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}" href=""
                                            data-toggle="modal" data-target="#signInAgentModal">Agent Login</a>



                                        <a class="btn  font-weight-semibold tarekl-3 appear-animation text-dark tarek-h-a tb-o"
                                            style="background-color: #F6931D; height: 35px;"
                                            data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}"
                                            href="tel:01744562356"><i class="fas fa-phone-alt"></i></a>
                                    </ul>
                                </nav>
                            </div>

                            <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                data-target=".header-nav-main nav"><i class="fa fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>