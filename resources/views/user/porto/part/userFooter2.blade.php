<footer id="footer" class="border-top-0" style="background-color: #000035;">
    <div class="container pt-5">
        <div class="row pt-5">

            <div class="col-md-6 col-lg-2 mb-4 mb-lg-0">
                <div class="col-md-12 copyright-position">
                    <a href="{{ url('/') }}" class="logo pr-0 pr-lg-3">
                        <img alt="Trip Beyond" src="{{ asset('user/img/tripbeyondlogo.png') }}"
                            class="opacity-7 bottom-4" height="33">
                    </a>
                </div>
                <div class="col-md-12 text-center">
                    <p class="text-color-light">Copyrights: All rights reserved</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 mb-4 mb-lg-0">
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <p class="mb-3 opacity-7 font-weight-bold" style="font-size: 18px; color: orange;">Company</p>

                        <div id="tweet" class="twitter twitter-light" data-plugin-tweets
                            data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
                            <p class="text-color-light"> <a class="text-color-light"
                                    href="{{ route('welcome.about') }}">About</a> </p>
                            <p class="text-color-light">Career</p>
                            <p class="text-color-light">Our Pertner</p>
                            <p class="text-color-light">Privacy Policy</p>
                            <p class="text-color-light">T&C</p>
                            <p class="text-color-light">Blog</p>
                            <p class="text-color-light">Promotion</p>
                            <p class="text-color-light">Affiliate Program</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-0 mb-lg-0">

                        <p class="mb-3 opacity-7 font-weight-bold" style="font-size: 18px; color: orange;">Booking</p>
                        <div id="tweet" class="twitter twitter-light" data-plugin-tweets
                            data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
                            <p class=""><a class="text-color-light" href="#">Flights</a></p>
                            <p class="text-color-light"> <a class="text-color-light"
                                    href="{{ route('welcome.hotels') }}">Hotels</a></p>
                            <p class="text-color-light"> <a class="text-color-light"
                                    href="{{ route('welcome.packages') }}">Packages</a> </p>
                            <p class="text-color-light">Transportation</p>
                            <p class="text-color-light">Special Deals</p>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-0 mb-lg-0">
                        <p class="mb-3 opacity-7 font-weight-bold" style="font-size: 18px; color: orange;">Contact Us
                        </p>

                        <div id="tweet" class="twitter twitter-light" data-plugin-tweets
                            data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
                            <p class="text-color-white">Help</p>
                            <p class="text-color-white">1800-100-767-00</p>
                            <p class="text-color-white">Email: mail@example.com</p>


                        </div>

                        <div class="row pt-5 mt-5">
                            <div class="col-md-12">
                                <p class="text-color-light">We Accept</p>
                                <img src="{{ asset('user/img/payment-icon.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-8 ">
                        <p class="mb-3 opacity-7 font-weight-bold" style="font-size: 18px; color: orange;">Social Media
                        </p>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <ul class="header-social-icons social-icons">
                                            <li class="social-icons-facebook"><a href="http://www.facebook.com/"
                                                    target="_blank" title="Facebook"><i
                                                        class="fab fa-facebook-f"></i></a></li>
                                            <li class="social-icons-twitter"><a href="http://www.twitter.com/"
                                                    target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="social-icons-linkedin"><a href="http://www.linkedin.com/"
                                                    target="_blank" title="Linkedin"><i
                                                        class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-comments fa-3x"></i>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6 col-lg-12 mb-4 mb-lg-0">
                        <p class="mb-3 opacity-7 font-weight-bold pt-3" style="font-size: 18px; color: orange;">
                            Newsletter</p>
                        <div class="alert alert-success d-none" id="newsletterSuccess">
                            <strong>Success!</strong> You've been added to our email list.
                        </div>
                        <div class="alert alert-danger d-none" id="newsletterError"></div>
                        <form id="newsletterForm" action="#" method="POST" class="mw-100">
                            <div class="input-group input-group-rounded">
                                <input class="form-control form-control-sm bg-light" placeholder="Email Address"
                                    name="newsletterEmail" id="newsletterEmail" type="text">
                                <span class="input-group-append">
                                    <button class="btn text-color-dark" style="background-color: orange;"
                                        type="submit"><strong>Subscribe</strong></button>
                                </span>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12 mt-5 pt-4">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="text-3 mb-3">Acreddited Member:</h5>
                                <div class="colmd-12">
                                    <img src="{{ asset('user/img/basis.png') }}" alt=""
                                        style="width:60px; border-radius: 10%;" class="img-fluid">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h5 class="text-3 mb-3">Verified by:</h5>
                                <div class="colmd-12">
                                    <img src="{{ asset('user/img/basis.png') }}" alt=""
                                        style="width:60px; border-radius: 10%;" class="img-fluid">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h5 class="text-3 mb-3">Authorised By:</h5>
                                <div class="colmd-12">
                                    <img src="{{ asset('user/img/basis.png') }}" alt=""
                                        style="width:60px; border-radius: 10%;" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</footer>