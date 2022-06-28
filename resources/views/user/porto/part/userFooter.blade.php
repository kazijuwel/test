<footer id="footer" class="border-top-0 mb-0" style="background-color: #000035">
    <div class="container pt-5">
        <div class="row pt-5">
            <div class="col-lg-2 mb-4 mb-lg-0">
                <div class="col-md-12 ">
                    <a href="{{ url('/') }}" class="logo pr-0 pr-lg-3">
                        <img alt="Trip Beyond" src="{{ asset('user/img/tripbeyondlogo.png') }}"
                            class="opacity-7 bottom-4" height="33" />
                    </a>
                </div>

            </div>
            <div class="col-lg-3 mb-4 mb-lg-0">
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0">
                        <p class="mb-3 opacity-7 font-weight-bold" style="font-size: 18px; color: orange">
                            Company
                        </p>

                        <div id="tweet" class="twitter twitter-light" data-plugin-tweets
                            data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
                            <p>
                                <a class="text-color-light" href="{{ route('welcome.about') }}">About</a>
                            </p>

                            <p>
                                <a class="text-color-light" href="{{ route('welcome.career') }}">Career</a>
                            </p>

                            <p>
                                <a class="text-color-light" href="{{ route('welcome.privacyPolicy') }}">Privacy
                                    Policy</a>
                            </p>

                            <p>
                                <a class="text-color-light" href="{{ route('welcome.termConditions') }}">Terms &
                                    Conditions</a>
                            </p>
                            <!-- @foreach ($pages as $page)
                            <p>
                                <a
                                    href="{{
                                        route('welcome.pageView', $page)
                                    }}"
                                    class="text-color-light"
                                    >{{$page->page_title}}</a
                                >
                            </p>
                            @endforeach -->
                            {{--
                            <p class="text-color-light">Career</p>
                            <p class="text-color-light">Privacy Policy</p>
                            <p class="text-color-light">T&C</p>
                            <p class="text-color-light">Blog</p>
                            <p class="text-color-light">Promotion</p>
                            <p class="text-color-light">Affiliate Program</p>
                            --}}
                        </div>
                    </div>
                    <div class="col-md-6 mb-0 mb-lg-0">
                        <p class="mb-3 opacity-7 font-weight-bold" style="font-size: 18px; color: orange">
                            Booking
                        </p>
                        <div id="tweet" class="twitter twitter-light" data-plugin-tweets
                            data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
                            <p class="">
                                <a class="text-color-light" href="#">Flights</a>
                            </p>
                            <p class="text-color-light">
                                <a class="text-color-light" href="{{ route('welcome.hotels') }}">Hotels</a>
                            </p>
                            <p class="text-color-light">
                                <a class="text-color-light" href="{{ route('welcome.packages') }}">Packages</a>
                            </p>
                            <p class="text-color-light">
                                <a class="text-color-light" href=""> Transportation</a>
                            </p>
                            <p class="text-color-light"><a class="text-color-light" href="">Special Deals</a></p>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-md-4">
                        <p class="mb-3 opacity-7 font-weight-bold" style="font-size: 18px; color: orange">
                            Need Help?
                        </p>

                        <div id="tweet" class="twitter twitter-light pb-3" data-plugin-tweets
                            data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
                            <span class="text-color-white" style="line-height: 2;">
                                We are always here for you <br> Knock us on messenger
                            </span>


                            {{--
                            <p class="text-color-white">
                                <a class="text-color-white"
                                    href="mailto:{{$websiteParameter->contact_email}}">Email</a>:
                                {{$websiteParameter->contact_email}}
                            </p>
                            --}}
                        </div>
                        <p class="mb-3 opacity-7 font-weight-bold" style="font-size: 18px; color: orange">
                            Contact Us
                        </p>

                        <div id="tweet" class="twitter twitter-light" data-plugin-tweets
                            data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
                            <p class="text-color-white">
                                <a class="text-color-white" href="tel:1800-100-767-00">Help</a>
                            </p>

                            <p class="text-color-white">{{$websiteParameter->contact_mobile}}</p>

                            <p class="text-color-white">
                                <a class="text-color-white" href="mailto:{{$websiteParameter->contact_email}}">Email</a>
                            </p>

                            <p class="text-color-white">{{$websiteParameter->contact_email}}</p>



                        </div>

                    </div>

                    <div class="col-md-8">
                        <p class="mb-3 opacity-7 font-weight-bold" style="font-size: 18px; color: orange">
                            Payment Options
                        </p>
                        {{--
                        <img src="{{ asset('user/img/payment-icon.png') }}" alt="" class="img-fluid" />
                        --}}
                        <div class="row">

                            <div class="col">
                                <img class="mt-1" src="{{
                                        asset('user/img/american-express.svg')
                                    }}" alt="" style="
                                        height: 30px;
                                        width: 68px;
                                        background-color: #fff;
                                        border-radius: 3px;
                                        margin-right:1px;
                                    " />

                                <img class="mt-1" src="{{ asset('user/img/visa.svg') }}" alt="" style="
                                        height: 30px;
                                        width: 68px;
                                        background-color: #fff;
                                        border-radius: 3px;
                                        margin-right:1px;
                                    " />


                                <img class="mt-1" src="{{ asset('user/img/mastercard.svg') }}" alt="" style="
                                        height: 30px;
                                        width: 68px;
                                        background-color: #fff;
                                        border-radius: 3px;
                                        margin-right:1px;
                                    " />



                                <img class="mt-1" src="{{ asset('user/img/bkash.svg') }}" alt="" style="
                                        height: 30px;
                                        width: 68px;
                                        background-color: #fff;
                                        border-radius: 3px;
                                        margin-right:1px;
                                    " />



                                <img class="mt-1" src="{{ asset('user/img/nagad.svg') }}" alt="" style="
                                        height: 30px;
                                        width: 68px;
                                        background-color: #fff;
                                        border-radius: 3px;
                                        margin-right:1px;
                                    " />
                            </div>

                        </div>
                        <div class="row pt-3 pl-2" style="width: 400px;">
                            <div class="col-md-4">
                                <h6 class="text-3 mb-3" style="white-space:nowrap;">Acreddited Member:</h6>

                                <img src="{{ asset('user/img/basis.svg') }}" alt="" style="
                                        width: 120px;
                                        height: 40px;
                                        border-radius: 5%;
                                        background-color: gray;
                                    " class="img-fluid" />
                            </div>

                            <div class="col-md-4">
                                <h6 class="text-3 mb-3">Verified by:</h6>


                                <img src="{{ asset('user/img/comodo.png') }}" alt="" class="img-fluid" style="  width: 120px;
                                        height: 40px;
                                        border-radius: 5%;
                                        background-color: #fff;" />

                            </div>

                            <div class="col-md-4">
                                <h6 class="text-3 mb-3">Authorised By:</h6>

                                <img src="{{ asset('user/img/iata.svg') }}" alt="" style="
                                        width: 120px;
                                        height: 40px;
                                        border-radius: 5%;
                                        background-color: #fff;
                                    " class="img-fluid" />
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-12 text-center">
                <p class="text-color-light pt-3">
                    Copyrights: All rights reserved
                </p>
            </div>

            <div class="col-lg-6 col-md-12 text-center">
                <ul class="
                                              
                                                social-icons
                                                
                                            ">
                    <li class="social-icons-facebook">
                        <a href="{{$websiteParameter->fb_page_link}}" target="_blank" title="Facebook"><i class="
                                                            fab
                                                            fa-facebook-f
                                                        "></i></a>
                    </li>
                    <li class="social-icons-twitter">
                        <a href="{{$websiteParameter->twitter_url}}" target="_blank" title="Twitter"><i
                                class="fab fa-twitter"></i></a>
                    </li>
                    <li class="social-icons-instagram">
                        <a href="{{$websiteParameter->instagram_url}}" target="_blank" title="Twitter"><i
                                class="fab fa-instagram"></i></a>
                    </li>
                    <li class="social-icons-linkedin">
                        <a href="{{$websiteParameter->linkedin_url}}" target="_blank" title="Linkedin"><i class="
                                                            fab
                                                            fa-linkedin-in
                                                        "></i></a>
                    </li>

                    <li class="social-icons-twitter">
                        <a href="{{$websiteParameter->youtube_url}}" target="_blank" title="Twitter"><i
                                class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-12 tarek-social-align-right tarek-comment-topm">



            </div>
        </div>
    </div>
</footer>