<style>
    #header .header-top {
        min-height: 19px;
        /* background: #003366 !important; */
        background: #000033 !important;
        /* background: #28abdf; */
        background: #28276d !important;

    }

    .header-middle-bg-custom {
        /*background: #001a33 !important;*/
        /* background: #000052 !important; */
        /* background: #074351 !important; */

    }

    .btn-main-bg {
        /*background: #001a33 !important;*/
        /* background: #000052 !important; */
        background: #0059ad !important;
        /* background: #074351 !important; */

        color: #fff !important;

    }

    .header-bottom-bg-custom {
        /*background: #003366 !important;*/
        background: #000033 !important;
        /* background: #0059ad !important; */


        /* background: #04252b !important; */
    }

    #header .header-nav-top .nav>li>a,
    #header .header-nav-top .nav>li>span {
        padding: 0px 10px;
    }

    #header .header-logo {
        margin: 0 !important;
    }

    @media only screen and (max-width: 600px) {
        .marginzero {
            margin: 0px !important;
        }
    }

</style>

<header id="header" class="header-effect-shrink"
    data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0">
    <div class="header-top p-0 w3-small" style="border-bottom: 1px solid #333;">
        <div class="container h-100 p-0 w3-small">
            <div class="header-row h-100 p-0 w3-small">
                <div class="header-column justify-content-start p-0 w3-small">
                    <div class="header-row p-0 w3-small">

                    </div>
                </div>
                <div class="header-column justify-content-end p-0 w3-small">
                    <div class="header-row p-0 w3-small">
                        <nav class="header-nav-top p-0 w3-small">
                            <ul class="nav nav-pills">
                                <li class="nav-item nav-item-borders d-lg-inline-flex">
                                    <a class="w3-blue w3-round w3-border- w3-hover-cyan  w3-btn py-0 m-0"
                                        href="{{route('welcome.becomePartner')}}"> <i class="fa fa-user"></i>
                                        Became a Partner</a>
                                </li>
                                <li class="nav-item nav-item-borders  pr-0 dropdown p-0 w3-small">


                                    @auth

                                        <a class="nav-link w3-text-light-gray" href="{{ route('user.dashboard') }}">

                                            <i class="fa fa-user"></i>
                                            {{ auth()->user()->email }}

                                        </a>

                                    @else

                                        <a class="nav-link w3-text-light-gray" href="{{ route('register') }}">

                                            <i class="fa fa-user-plus"></i>
                                            Register
                                        </a>

                                        <a class="nav-link w3-text-light-gray" href="{{ route('login') }}">

                                            <i class="fa fa-user"></i>
                                            Login
                                        </a>

                                    @endauth
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="header-body border-top-0"> --}}
        <div class="header-container container-fluid px-lg-4">
            <div class="header-row">
                <div class="header-column flex-grow-0">
                    <div class="header-row pr-4">
                        <div class="header-logo">
                            <a href="{{ url('/') }}">
                                @isset($websiteParameter->logo)
                                    <img alt="Porto" width="100%" height="48" data-sticky-width="100"
                                        data-sticky-height="40"
                                        src="{{ asset('storage/logo/' . $websiteParameter->logo) }}">
                                @endisset
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-nav header-nav-links justify-content-center">
                            <div
                                class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse header-mobile-border-top">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle w3-text-blue"
                                                href="{{ url('/') }}">
                                                Home
                                            </a>
                                        </li>
                                        
                                        @isset($aboutUsOp)
                                        <li class="dropdown dropdown-full-color dropdown-light dropdown-mega">
                                            <a href="{{ route('welcome.page', 3) }}" class="dropdown-item dropdown-toggle w3-text-blue" href="#">
                                                {{ $aboutUsOp->menu_title }}
                                            </a>
                                        
                                            <ul class="dropdown-menu marginzero" style="margin-left: 38%">
                                                <div class="dropdown-mega-content">
                                        
                                                    <div class="row">
                                                        <div class="col-md-6">
                                        
                                                        <ul class="dropdown-mega-sub-nav">
                                                @foreach ($aboutUsOp->pages as $page)
                                                <li class="">
                                                    <a class="dropdown-item w3-hover-blue w3-text-purple" href="{{ route('welcome.page', [$page->id,$page->route_name] ) }}" style="padding: 12px;font-size: 15px; background-color: #FED800">
                                                        {{ $page->page_title }}
                                                    </a>
                                                </li>
                                                @endforeach
                                                        </ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <img style="max-width: 100%;"  src="{{ asset('img/a380.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                            </div>
                                            </ul>
                                        </li>
                                        @endisset
                                        @isset($service)
                                        <li class="dropdown dropdown-full-color dropdown-light dropdown-mega">
                                            <a href="{{ route('welcome.page', 3) }}" class="dropdown-item dropdown-toggle w3-text-blue" href="#">
                                                {{ $service->menu_title }}
                                            </a>
                                        
                                            <ul class="dropdown-menu marginzero" style="margin-left: 42%">
                                                <div class="dropdown-mega-content">
                                        
                                                    <div class="row">
                                                        <div class="col-md-6">
                                        
                                                        <ul class="dropdown-mega-sub-nav">
                                                @foreach ($service->pages as $page)
                                                <li class="">
                                                    <a class="dropdown-item w3-hover-blue w3-text-purple" href="{{ route('welcome.page', [$page->id,$page->route_name] ) }}" style="padding: 12px;font-size: 15px; background-color: #FED800">
                                                        {{ $page->page_title }}
                                                    </a>
                                                </li>
                                                @endforeach
                                                        </ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <img style="max-width: 100%;"  src="{{ asset('img/a380.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                            </div>
                                            </ul>
                                        </li>
                                        @endisset
                                        

                                        <li class="dropdown dropdown-full-color dropdown-light dropdown-mega">
                                            <a href="{{ route('welcome.noticeBoard') }}"
                                                class="dropdown-item dropdown-toggle w3-text-blue"
                                                style="cursor: pointer;">
                                                Notice
                                            </a>
                                        </li>
                                        
                                        @if (Auth::guest())

                                            <li class="dropdown dropdown-full-color dropdown-light">
                                                <a class="dropdown-item dropdown-toggle w3-text-blue" href="{{ route('login') }}">
                                                    Login
                                                </a>

                                            </li>

                                            <li class="dropdown dropdown-full-color dropdown-light">
                                                <a class="dropdown-item dropdown-toggle w3-text-blue" href="/register">
                                                    Register
                                                </a>

                                            </li>



                                        @else


                                            <li class="dropdown dropdown-full-color dropdown-light">
                                                <a title="{{ Auth::user()->name }}"
                                                    class="dropdown-item dropdown-toggle  w3-text-blue" href="#">
                                                    <i class="fas fa-user-circle mr-2"></i>
                                                    {{ Str::limit(Auth::user()->email, 10) }}
                                                </a>

                                                <ul class="dropdown-menu">

                                                    @if (Auth::user()->isAdmin())

                                                        <li>
                                                            <a class="dropdown-item w3-hover-blue"
                                                                href="{{ route('admin.dashboard') }}">
                                                                <i class="fas fa-th mr-2 w3-text-deep-orange"></i>
                                                                Admin Dashboard
                                                            </a>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <a class="dropdown-item w3-hover-blue"
                                                            href="{{ route('user.dashboard') }}">
                                                            <i class="fas fa-user-tag mr-2 w3-text-blue"></i>
                                                            My Dashboard
                                                        </a>
                                                    </li> 

                                                    @if (Auth::user()->hasCompanyRole())
                                                        <li class="dropdown-submenu">
                                                        <a class="dropdown-item w3-hover-blue" href="#"><i class="fas fa-th mr-2 w3-text-green"></i> Company</a>
                                                        <ul class="dropdown-menu">
                                                        @foreach (Auth::user()->activeCompanies() as $company)
                                                        <li><a title="{{ $company->title }}" class="dropdown-item w3-hover-blue" href="{{ route('company.dashboard', $company) }}"><i class="fas fa-tag mr-2 w3-text-blue"></i> Company: {{ custom_title($company->company_code,10,'..') }}</a>
                                                        </li>
                                                    @endforeach

                                                        </ul>
                                                        </li>
                                                        @endif




                                                    <li>
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form-header').submit();" class="dropdown-item w3-hover-blue">
                                                            <i class="fas fa-sign-out-alt mr-2"></i>
                                                            {{ __('logout') }}

                                                        </a>
                                                    </li>

                                                    <form id="logout-form-header" action="{{ route('logout') }}"
                                                        method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>

                                                </ul>
                                            </li>

                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="header-column flex-grow-0 justify-content-center">
                    <div class="header-row pl-4 justify-content-end">
                        <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean m-0">
                            <li class="social-icons-facebook"><a href="" target="_blank" title="Facebook"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li class="social-icons-twitter"><a href="" target="_blank" title="Twitter"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li class="social-icons-linkedin"><a href="" target="_blank" title="Linkedin"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                        <button class="btn header-btn-collapse-nav ml-0 ml-sm-3" data-toggle="collapse"
                            data-target=".header-nav-main nav">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</header>
