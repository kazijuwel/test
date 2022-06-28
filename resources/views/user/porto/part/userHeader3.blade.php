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

                            <div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-text-capitalize header-nav-main-text-size-2 header-nav-main-mobile-dark header-nav-main-effect-1  appear-animation"
                                data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}">
                                <nav class="collapse">
                                    <ul class="nav nav-pills pb-3 pt-3" id="mainNav">
                                        <a class="btn btn-rounded font-weight-semibold ml-3 appear-animation text-dark trip-nav-li"
                                            style="background-color: #F6931D; height: 35px;"
                                            data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}"
                                            href="{{ url('/') }}">Home</a>

                                            <a class="btn btn-rounded font-weight-semibold ml-3 appear-animation text-dark trip-nav-li"
                                            style="background-color: #F6931D; height: 35px;"
                                            data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}"
                                            href="{{ route('welcome.myBooking') }}">My Booking</a>

                                            <a class="btn btn-rounded font-weight-semibold ml-3 appear-animation text-dark trip-nav-li"
                                            style="background-color: #F6931D; height: 35px;"
                                            data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}"
                                            href="{{ route('welcome.booking') }}">Booking</a>

                                        <a class="btn btn-rounded font-weight-semibold ml-3 appear-animation text-dark trip-nav-li"
                                            style="background-color: #F6931D; height: 35px;"
                                            data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}"
                                            href="{{ route('welcome.contactUs2') }}">Contact us</a>
                                            

                                        <a class="btn btn-rounded font-weight-semibold ml-3 appear-animation text-dark trip-nav-li"
                                            style="background-color: #F6931D; height: 35px;"
                                            data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}"
                                            href="" data-toggle="modal" data-target="#signInAgentModal">Agent Login</a>

                                        <a class="btn btn-rounded font-weight-semibold ml-3 appear-animation text-dark trip-nav-li"
                                        style="background-color: #F6931D; height: 35px;"
                                            data-appear-animation="fadeIn" data-plugin-options="{'accY': 100}"
                                            href="tel:01744562356"><i
                                                class="fas fa-phone-alt"></i></a>
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
