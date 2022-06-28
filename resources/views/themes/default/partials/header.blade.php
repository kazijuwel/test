
{{-- @push('css')
<style>
    .viptextcolor {
        color: red;
    }
</style>
@endpush --}}

<header
id="header"
class="header-transparent header-effect-shrink"
data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}"
>
<div class="header-body">
    <div class="header-container container">
        <div class="header-row">
            <div class="header-column">
                <div class="header-row">
                    <div class="header-logo">
                        <a href="">
                            <img
                                class=""
                                alt="Porto"
                                width="140"
                                height="68"
                                data-sticky-width="82"
                                data-sticky-height="40"
                                {{-- {{ route('imagecache', [ 'template'=>'medium','filename' => "logo.png" ]) }} --}}
                                src="{{ asset('img/logo.png')}}" style="border-radius: 5%"
                            />
                        </a>
                        <a class="color-vipmm pt-5 font-weight-bold ml-5" style="white-space: nowrap;" href="tel:+8801767506668"> <i class="icon-phone icons bg-color-vipmm2"></i> 01767506668</a>
                    </div>
                </div>
            </div>
            <div class="header-column justify-content-end">
                <div class="header-row">
                    <div
                        class="
                            header-nav
                            header-nav-line
                            header-nav-top-line
                            header-nav-top-line-with-border
                            order-2 order-lg-1
                        "
                    >
                    <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav" aria-expanded="true">
                        <i class="fas fa-bars"></i>
                    </button>

                        <div
                            class="
                                header-nav-main
                                header-nav-main-square
                                header-nav-main-effect-2
                                header-nav-main-sub-effect-1
                            "
                        >
                            <nav class="collapse show">
                                <ul
                                    class="nav nav-pills"
                                    id="mainNav"
                                >

                                <li class="dropdown">
                                    <a
                                        class="
                                            dropdown-item
                                            dropdown-toggle
                                            color-vipmm  viptextcolor
                                        "
                                        href="{{ url('page/vip-advantage')}}"

                                    >
                                        <span
                                            class="
                                                w3-border
                                                w3-border-white
                                                w3-round
                                                px-3
                                                py-1

                                            "
                                            >Vip Service</span
                                        >
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a
                                        class="
                                            dropdown-item
                                            dropdown-toggle
                                            color-vipmm
                                        "
                                        href="{{ route("blogs.index") }}"

                                    >
                                        <span
                                            class="
                                                w3-border
                                                w3-border-white
                                                w3-round
                                                px-3
                                                py-1
                                            "
                                            >Blogs</span
                                        >
                                    </a>
                                </li>

                                <li class="dropdown">
                                    <a
                                        class="
                                            dropdown-item
                                            dropdown-toggle
                                            color-vipmm
                                        "
                                        href="{{url('/packages')}}"

                                    >
                                        <span
                                            class="
                                                w3-border

                                                w3-border-white
                                                w3-round
                                                px-3
                                                py-1
                                            "
                                            >Our Packages</span
                                        >
                                    </a>
                                </li>

                                <li class="dropdown">
                                    <a
                                        class="
                                            dropdown-item
                                            dropdown-toggle
                                            color-vipmm
                                        "
                                        href="{{ route('page',"about-us") }}"

                                    >
                                        <span
                                            class="
                                                w3-border

                                                w3-border-white
                                                w3-round
                                                px-3
                                                py-1
                                            "
                                            >About Us</span
                                        >
                                    </a>
                                </li>
                                    @guest
                                    <li class="dropdown">
                                        <a
                                            class="
                                                dropdown-item
                                                dropdown-toggle
                                                color-vipmm
                                            "
                                            href=""
                                            data-toggle="modal"
                                            data-target="#smallModal"
                                        >
                                            <span
                                                class="
                                                    w3-border

                                                    w3-border-white
                                                    w3-round
                                                    px-3
                                                    py-1
                                                "
                                                >Login</span
                                            >
                                        </a>
                                    </li>
                                    @else

                                    <li class="dropdown">
                                        <a
                                            class="
                                                dropdown-item
                                                dropdown-toggle
                                                w3-text-white
                                            "
                                            href="{{
                                                route('signout')
                                            }}"
                                        >
                                            <span
                                                class="
                                                    w3-border

                                                    w3-border-white
                                                    w3-round
                                                    px-3
                                                    py-1
                                                "
                                                >Logout</span
                                            >
                                        </a>
                                    </li>
                                    @endguest
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>
