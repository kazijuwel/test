<style>
    #header .header-top {
        min-height: 22px;
        /*background: #003366 !important;*/
        /* background: #000033 !important; */
        background: #28abdf;
        /* background: #04252b !important; */

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
        /* background: #000033 !important; */
        background: #0059ad !important;


        /* background: #04252b !important; */
    }

    #header .header-nav-top .nav>li>a,
    #header .header-nav-top .nav>li>span {
        padding: 2px 10px;
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

<header class="py-0" id="header" 
    data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 130, 'stickySetTop': '-130px', 'stickyChangeLogo': true}">
    <div class="header-body border-color-primary header-middle-bg-custom border-top-0 box-shadow-none py-0">


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
                                        <a class="w3-blue w3-round w3-border- w3-hover-cyan  w3-btn"
                                            href="{{ route('welcome.gallery') }}"> <i class="fa fa-cubes"></i>
                                            Gallery</a>
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

        <div class="header-container container z-index-2  py-0">
            <div class="header-row py-0">
                <div class="header-column py-0">
                    <div class="header-row py-0">
                        <div class="header-logo header-logo-sticky-change py-0">
                            <a class="py-0" href="{{ url('/') }}">
                                {{-- <img class="header-logo-sticky opacity-0" alt="{{env('APP_NAME_BIG')}}"   height="100" data-sticky-height="55" data-sticky-top="100" src="{{asset('img/rcs.png')}}"> --}}
                                {{-- <img class="header-logo-non-sticky opacity-0 py-0" alt="Porto"   height="100" src="{{asset('img/rc.png')}}"> --}}

                                @isset($websiteParameter->logo_alt)
                                    <img class="header-logo-sticky opacity-0" alt="{{ env('APP_NAME_BIG') }}" height="100"
                                        data-sticky-height="55" data-sticky-top="100"
                                        src="{{ asset('storage/logo/' . $websiteParameter->logo_alt) }}">

                                @endisset
                                @isset($websiteParameter->logo)
                                    <img class="header-logo-non-sticky opacity-0 py-0" alt="{{ env('APP_NAME_BIG') }}"
                                        style="max-width: 350%;" height="100%"
                                        src="{{ asset('storage/logo/' . $websiteParameter->logo) }}">

                                @endisset
                                @if (!isset($websiteParameter->logo_alt) && !isset($websiteParameter->logo))
                                    <b>{{ env('APP_NAME') }}</b>
                                @endif




                            </a>
                        </div>
                    </div>
                </div>

                {{-- <div class="d-none d-sm-block">
<div class="w3-card rounded">

<img class="rounded" width="200" src="{{asset('img/newteam.png')}}" alt="">
</div>
</div> --}}


                <div class="header-column justify-content-end">
                    <div class="header-row h-100">
                        <div class="text-9 w3-text-white d-none d-lg-block"
                            style="font-family: 'Times New Roman', Times, serif">
                            {{ Str::upper(env('APP_NAME_BIG')) }}
                            {{-- <img style="margin-right: -117px;" src="{{ asset('img/amc/logo_baner.png') }}" alt=""> --}}
                        </div>
                        <ul class="header-extra-info d-flex h-100 align-items-center">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav-bar bg-primary- header-bottom-bg-custom "
            data-sticky-header-style="{'minResolution': 991}"
            data-sticky-header-style-active="{'background-color': 'transparent'}"
            data-sticky-header-style-deactive="{'background-color': '#0088cc'}" style="border-top: 1px solid #333;">
            <div class="container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-colum order-2 order-lg-1">
                                <div class="header-row">
                                    <div class="header-nav header-nav-stripe header-nav-divisor header-nav-force-light-text justify-content-start"
                                        data-sticky-header-style="{'minResolution': 991}"
                                        data-sticky-header-style-active="{'margin-left': '110px'}"
                                        data-sticky-header-style-deactive="{'margin-left': '0'}">
                                        <div
                                            class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                            <nav class="collapse">
                                                <ul class="nav nav-pills" id="mainNav">
                                                    <li class="dropdown dropdown-full-color dropdown-light">
                                                        <a class="  dropdown-item dropdown-toggle " href="/">
                                                            Home
                                                        </a>

                                                    </li>


                                                    @isset($about)
                                                        <li
                                                            class="dropdown dropdown-full-color dropdown-light dropdown-mega">
                                                            <a href="{{ route('welcome.page', 3) }}"
                                                                class="dropdown-item dropdown-toggle" href="#">
                                                                {{ $about->menu_title }}
                                                            </a>

                                                            <ul class="dropdown-menu marginzero" style="margin-left: 3%">
                                                                <div class="dropdown-mega-content">

                                                                    <div class="row">
                                                                        <div class="col-md-6">

                                                                            <ul class="dropdown-mega-sub-nav">
                                                                                @foreach ($about->pages as $page)
                                                                                    <li class="">
                                                                                        <a class="dropdown-item w3-hover-blue w3-text-purple"
                                                                                            href="{{ route('welcome.page', [$page->id, $page->route_name]) }}"
                                                                                            style="padding: 12px;font-size: 15px; background-color: #FED800">
                                                                                            {{ $page->page_title }}
                                                                                        </a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <img style="max-width: 100%;"
                                                                                src="{{ asset('img/h11.jpg') }}" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </ul>
                                                        </li>
                                                    @endisset

                                                    @if (isset($qualification))
                                                        <li
                                                            class="dropdown dropdown-full-color dropdown-light dropdown-mega">
                                                            <a class="dropdown-item dropdown-toggle"
                                                                style="cursor: pointer;">
                                                                {{ $qualification->menu_title }}
                                                            </a>
                                                            <ul class="dropdown-menu marginzero"
                                                                style="margin-left: 10%">
                                                                <li class="">
                                                                    <div class="dropdown-mega-content">

                                                                        <div class="row">
                                                                            @foreach ($qualification->pages->chunk(5) as $pagess2)
                                                                                <div class="col-lg-4 col-sm-12">
                                                                                    <ul class="dropdown-mega-sub-nav">
                                                                                        @foreach ($pagess2 as $whm)
                                                                                            <li><a class="dropdown-item w3-hover-blue w3-text-white"
                                                                                                    href="{{ route('welcome.page', [$whm->id]) }}"
                                                                                                    style="padding: 15px;font-size: 15px; background-color: #983276">{{ $whm->page_title }}</a>
                                                                                            </li>
                                                                                        @endforeach
                                                                                        {{-- <li><a class="dropdown-item w3-hover-blue w3-text-white" href="{{ route('welcome.allCoursesQualificationByMode', 'qualification' ) }}" style="padding: 15px;font-size: 15px; background-color: #983276">All Qualifications</a></li> --}}
                                                                                    </ul>
                                                                                </div>
                                                                            @endforeach
                                                                            <div class="col-lg-8 d-none d-md-block">
                                                                                <img style="max-width: 100%;"
                                                                                    src="{{ asset('img/amc/bia_lab_edit.png') }}"
                                                                                    alt="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    @endif



                                                    @if (isset($membershipMenu))
                                                        <li
                                                            class="dropdown dropdown-full-color dropdown-light dropdown-mega">
                                                            <a class="dropdown-item dropdown-toggle"
                                                                style="cursor: pointer;">
                                                                {{ $membershipMenu->menu_title }}
                                                            </a>
                                                            <ul class="dropdown-menu marginzero"
                                                                style="margin-left: 16%">
                                                                <li>
                                                                    <div class="dropdown-mega-content">

                                                                        <div class="row">
                                                                            @foreach ($membershipMenu->pages->chunk(5) as $pagess2)
                                                                                <div class="col-lg-4 col-sm-12">
                                                                                    <ul class="dropdown-mega-sub-nav">

                                                                                        @foreach ($pagess2 as $whm)

                                                                                            <li><a class="dropdown-item w3-grey- w3-hover-blue w3-text-white"
                                                                                                    href="{{ route('welcome.page', [$whm->id]) }}"
                                                                                                    style="padding: 15px;font-size: 15px; background-color: #821D5E">{{ $whm->page_title }}</a>
                                                                                            </li>

                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                            @endforeach
                                                                            <div class="col-lg-8  d-none d-md-block">
                                                                                <img style="max-width: 100%;"
                                                                                    src="{{ asset('img/amc/history.png') }}"
                                                                                    alt="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    @endif
                                                    @if (isset($department))
                                                        <li
                                                            class="dropdown dropdown-full-color dropdown-light dropdown-mega">
                                                            <a class="dropdown-item dropdown-toggle"
                                                                style="cursor: pointer;">
                                                                {{ $department->menu_title }}
                                                            </a>
                                                            <ul class="dropdown-menu marginzero"
                                                                style="margin-left: 24%">
                                                                <li>
                                                                    <div class="dropdown-mega-content">

                                                                        <div class="row">
                                                                            @foreach ($department->pages->chunk(5) as $pagess2)
                                                                                <div class="col-lg-4 col-sm-12">
                                                                                    <ul class="dropdown-mega-sub-nav">

                                                                                        @foreach ($pagess2 as $whm)

                                                                                            <li><a class="dropdown-item w3-grey- w3-hover-blue w3-text-white"
                                                                                                    href="{{ route('welcome.page', [$whm->id]) }}"
                                                                                                    style="padding: 15px;font-size: 15px; background-color: #821D5E">{{ $whm->page_title }}</a>
                                                                                            </li>

                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                            @endforeach
                                                                            <div class="col-lg-8  d-none d-md-block">
                                                                                <img style="max-width: 100%;"
                                                                                    src="{{ asset('img/amc/8.png') }}"
                                                                                    alt="">
                                                                                {{-- </div>
                    <div class="col-lg-4 ">
                        <img style="max-width: 100%;" src="{{ asset('img/OT-02.jpg') }}" alt=""> --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    @endif



                                                    {{-- <li class="dropdown dropdown-full-color dropdown-light dropdown-mega">
    <a class="dropdown-item dropdown-toggle" style="cursor: pointer;">
        Events
    </a>
    @isset($lastFiveEvents)
    <ul class="dropdown-menu marginzero" style="margin-left: 28%">
        <li>
            <div class="dropdown-mega-content">

                <div class="row">
                    @isset($lastFiveEvents)
                    <div class="col-lg-5 col-sm-12">
                        <ul class="dropdown-mega-sub-nav">
                            @foreach ($lastFiveEvents as $evnt)
                            <li><a class="dropdown-item w3-hover-blue w3-text-white" href="{{ route('welcome.event', [$evnt->id, Str::slug($evnt->title) ]) }}" style="padding: 15px;font-size: 15px; background-color: #FF6F00;">{{ Str::limit($evnt->title, 40, '...') }}</a></li>
                            @endforeach

                            
                            <li><a class="dropdown-item w3-hover-blue w3-text-white"  href="{{ route('welcome.eventsAll') }}"  style="padding: 15px;font-size: 15px; background-color: #FF6F00;">All Events</a></li>
                        </ul>
                    </div>
                    @endisset

                    <div class="col-lg-5 text-center d-none d-md-block">
                        <img class="w-100 m-auto" src="{{ asset('img/OT-01.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </li>
    </ul>
    @endisset
</li> --}}

                                                    <li
                                                        class="dropdown dropdown-full-color dropdown-light dropdown-mega">
                                                        <a href="{{ route('welcome.noticeBoard') }}"
                                                            class="dropdown-item dropdown-toggle"
                                                            style="cursor: pointer;">
                                                            Notice
                                                        </a>
                                                    </li>

                                                    <li
                                                        class="dropdown dropdown-full-color dropdown-light dropdown-mega">
                                                        <a href="" class="dropdown-item dropdown-toggle"
                                                            style="cursor: pointer;">
                                                            Contact
                                                        </a>
                                                        <ul class="dropdown-menu marginzero" style="margin-left: 12%">
                                                            <li>
                                                                <div class="dropdown-mega-content">

                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-sm-12">
                                                                            <ul class="dropdown-mega-sub-nav">
                                                                                <li><a class="dropdown-item w3-grey- w3-hover-blue w3-text-white"
                                                                                        href=""
                                                                                        style="padding: 15px;font-size: 15px; background-color: #821D5E">About
                                                                                        us</a></li>
                                                                            </ul>
                                                                            <ul class="dropdown-mega-sub-nav">
                                                                                <li><a class="dropdown-item w3-grey- w3-hover-blue w3-text-white"
                                                                                        href=""
                                                                                        style="padding: 15px;font-size: 15px; background-color: #821D5E">Promotions</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-lg-8  d-none d-md-block">
                                                                            <img style="max-width: 100%;"
                                                                                src="{{ asset('img/a380.jpg') }}"
                                                                                alt="">
                                                                            {{-- </div>
                    <div class="col-lg-4 ">
                        <img style="max-width: 100%;" src="{{ asset('img/OT-02.jpg') }}" alt=""> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>



                                                    @if (isset($contact))
                                                        <li
                                                            class="dropdown dropdown-full-color dropdown-light dropdown-mega">
                                                            <a class="dropdown-item dropdown-toggle"
                                                                style="cursor: pointer;">
                                                                {{ $contact->menu_title }}
                                                            </a>
                                                            <ul class="dropdown-menu marginzero"
                                                                style="margin-left: 38%">
                                                                <li>
                                                                    <div class="dropdown-mega-content">

                                                                        <div class="row">
                                                                            @foreach ($contact->pages->chunk(5) as $pagess2)
                                                                                <div class="col-lg-4 col-sm-12">
                                                                                    <ul class="dropdown-mega-sub-nav">

                                                                                        @foreach ($pagess2 as $whm)

                                                                                            <li><a class="dropdown-item w3-grey- w3-hover-blue w3-text-white"
                                                                                                    href="{{ route('welcome.page', [$whm->id]) }}"
                                                                                                    style="padding: 15px;font-size: 15px; background-color: #821D5E">{{ $whm->page_title }}</a>
                                                                                            </li>

                                                                                        @endforeach
                                                                                        <li><a class="dropdown-item w3-grey- w3-hover-blue w3-text-white"
                                                                                                href="{{ route('welcome.newsAll') }}"
                                                                                                style="padding: 15px;font-size: 15px; background-color: #821D5E">News</a>
                                                                                        </li>
                                                                                        <li><a class="dropdown-item w3-grey- w3-hover-blue w3-text-white"
                                                                                                href="{{ route('welcome.eventsAll') }}"
                                                                                                style="padding: 15px;font-size: 15px; background-color: #821D5E">Events</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            @endforeach
                                                                            <div class="col-lg-8  d-none d-md-block">
                                                                                <img style="max-width: 100%;"
                                                                                    src="{{ asset('img/amc/1.png') }}"
                                                                                    alt="">
                                                                                {{-- </div>
                    <div class="col-lg-4 ">
                        <img style="max-width: 100%;" src="{{ asset('img/OT-02.jpg') }}" alt=""> --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    @endif



                                                    {{-- <li class="dropdown dropdown-full-color dropdown-light dropdown-mega">
    <a class="dropdown-item dropdown-toggle" style="cursor: pointer;">
        Events
    </a>
    @isset($lastFiveEvents)
    <ul class="dropdown-menu marginzero" style="margin-left: 28%">
        <li>
            <div class="dropdown-mega-content">

                <div class="row">
                    @isset($lastFiveEvents)
                    <div class="col-lg-5 col-sm-12">
                        <ul class="dropdown-mega-sub-nav">
                            @foreach ($lastFiveEvents as $evnt)
                            <li><a class="dropdown-item w3-hover-blue w3-text-white" href="{{ route('welcome.event', [$evnt->id, Str::slug($evnt->title) ]) }}" style="padding: 15px;font-size: 15px; background-color: #FF6F00;">{{ Str::limit($evnt->title, 40, '...') }}</a></li>
                            @endforeach

                            
                            <li><a class="dropdown-item w3-hover-blue w3-text-white"  href="{{ route('welcome.eventsAll') }}"  style="padding: 15px;font-size: 15px; background-color: #FF6F00;">All Events</a></li>
                        </ul>
                    </div>
                    @endisset

                    <div class="col-lg-5 text-center d-none d-md-block">
                        <img class="w-100 m-auto" src="{{ asset('img/OT-01.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </li>
    </ul>
    @endisset
</li> --}}


                                                    @if (Auth::guest())

                                                        {{-- <li class="dropdown dropdown-full-color dropdown-light">
<a class="dropdown-item dropdown-toggle" href="{{route('login')}}">
Login
</a>

</li>

<li class="dropdown dropdown-full-color dropdown-light">
<a class="dropdown-item dropdown-toggle  " href="/register">
Register
</a>

</li> --}}



                                                    @else


                                                        <li class="dropdown dropdown-full-color dropdown-light">
                                                            <a title="{{ Auth::user()->name }}"
                                                                class="dropdown-item dropdown-toggle  " href="#">
                                                                <i class="fas fa-user-circle mr-2"></i>
                                                                {{ Str::limit(Auth::user()->email, 10) }}
                                                            </a>

                                                            <ul class="dropdown-menu">

                                                                @if (Auth::user()->isAdmin())

                                                                    <li>
                                                                        <a class="dropdown-item w3-hover-blue"
                                                                            href="{{ route('admin.dashboard') }}">
                                                                            <i
                                                                                class="fas fa-th mr-2 w3-text-deep-orange"></i>
                                                                            Admin Dashboard
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                                {{-- @if (Auth::user()->isCoordinator())
    <li>
    <a href="{{ route('coordinator.dashboard') }}" class="dropdown-item w3-hover-blue">
        <i class="fas fa-th mr-2 w3-text-deep-orange"></i> Coordinator Dashboard
    </a>
    </li>
    @endif --}}
                                                                <li>
                                                                    <a class="dropdown-item w3-hover-blue"
                                                                        href="{{ route('user.dashboard') }}">
                                                                        <i
                                                                            class="fas fa-user-tag mr-2 w3-text-blue"></i>
                                                                        My Dashboard 
                                                                    </a>
                                                                </li>

                                                                {{-- @if (Auth::user()->hasCompanyRole())
    <li class="dropdown-submenu">
    <a class="dropdown-item w3-hover-blue" href="#"><i class="fas fa-th mr-2 w3-text-green"></i> Company</a>
    <ul class="dropdown-menu">
    @foreach (Auth::user()->activeCompanies() as $company)
    <li><a title="{{ $company->title }}" class="dropdown-item w3-hover-blue" href="{{ route('company.dashboard', $company) }}"><i class="fas fa-tag mr-2 w3-text-blue"></i> Company: {{ custom_title($company->company_code,10,'..') }}</a>
    </li>
    @endforeach

    </ul>
    </li>
    @endif --}}

                                                                {{-- @if (Auth::user()->hasSubrole())
    <li class="dropdown-submenu">
    <a class="dropdown-item w3-hover-blue" href="#"><i class="fas fa-user mr-2"></i> Company Member</a>
    <ul class="dropdown-menu">
    @foreach (Auth::user()->activeSubroles() as $subrole)

    <li><a  title="company: {{$subrole->company? $subrole->company->title : ''}}" class="dropdown-item w3-hover-blue" href="{{ route('subrole.dashboard', $subrole) }}"><i class="fas fa-user-tag mr-2"></i>
    Member Role: {{$subrole->title}}</a></li>

    @endforeach
    </ul>
    </li>
    @endif --}}


                                                                <li>
                                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form-header').submit();" class="dropdown-item w3-hover-blue">
                                                                        <i class="fas fa-sign-out-alt mr-2"></i>
                                                                        {{ __('logout') }}
                                                                        {{-- <span class="float-right text-muted text-sm"></span> --}}
                                                                    </a>
                                                                </li>

                                                                <form id="logout-form-header"
                                                                    action="{{ route('logout') }}" method="POST"
                                                                    style="display: none;">
                                                                    {{ csrf_field() }}
                                                                </form>

                                                            </ul>
                                                        </li>

                                                    @endif

                                                    {{-- old about us --}}

                                                </ul>
                                            </nav>
                                        </div>
                                        <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                            data-target=".header-nav-main nav">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="header-column order-1 order-lg-2">
                                <div class="header-row justify-content-end">
                                    {{-- <div class="header-nav-features header-nav-features-no-border w-75 w-auto-mobile d-none d-sm-flex">
<form role="search" class="d-flex w-100" action="" method="get">
<div class="simple-search input-group w-100">
<input class="form-control rounded-left border-0" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
<span class="input-group-append rounded-right bg-light border-0">
<button class="btn" type="submit">
<i class="fa fa-search header-nav-top-icon"></i>
</button>
</span>
</div>
</form>
</div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
