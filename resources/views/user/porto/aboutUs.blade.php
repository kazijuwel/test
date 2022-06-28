@extends('user.porto.layouts.userLayoutMaster')

@push('css')
<style>
    .blog-posts:not(.blog-posts-no-margins) article {
        border-bottom: 0px !important;
        margin-bottom: 50px;
        padding-bottom: 0px !important;
    }

    a.sticky {
        outline: none;
        text-decoration: none !important;
        color: black !important;
        font-weight: 600 !important;
        transition: .2s;
        border-bottom: 2px solid transparent;
    }

    a.sticky:hover {
        text-decoration: none !important;
        color: #fda300 !important;
        border-bottom: 2px solid #fda300;
        /* border-bottom-width: medium; */
        margin-bottom: 14px;
    }

    p.card2 {
        line-height: 2 !important;
        /* color: #000; */
    }

    .call-btn {
        height: 25px;
        width: 25px;
        border-radius: 50%;
        background-color: orange;
    }

    .tarek-about-border {
        height: 260px;
        width: 260px;
        background-color: #F6931D;
        position: absolute;
        left: -20px;
        top: -15px;
        z-index: -1;
    }

    .tarek-about-border-2 {
        height: 260px;
        width: 260px;
        background-color: #F6931D;
        position: absolute;
        right: 20px;
        top: -15px;
        z-index: -1;
    }

    .tarek-tarek {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin: 0 auto !important;
        /* margin-right: -15px; */
        /* margin-left: -15px; */
        text-align: center;
    }


    .container2 {
        width: 1100px !important;
        margin: 0 auto;
    }

    @media only screen and (max-width: 1200px) {


        .tarek-about-border-2 {
            height: 260px;
            width: 260px;
            background-color: #F6931D;
            position: absolute;
            right: -5px;
            top: -15px;
            z-index: -1;
        }
    }

    @media only screen and (max-width: 992px) {


        .tarek-about-border-2 {
            height: 260px;
            width: 260px;
            background-color: #F6931D;
            position: absolute;
            right: -80px;
            top: -15px;
            z-index: -1;
        }

        .tarek-border-m {
            margin-left: 30px !important;
        }
    }


    @media only screen and (max-width: 768px) {


        .tarek-about-border-2 {
            height: 260px;
            width: 260px;
            background-color: #F6931D;
            position: absolute;
            right: 60px;
            top: -15px;
            z-index: -1;
        }
    }

    @media only screen and (max-width: 576px) {


        .tarek-about-border-2 {
            height: 260px;
            width: 260px;
            background-color: #F6931D;
            position: absolute;
            right: -30px;
            top: -15px;
            z-index: -1;
        }
    }
</style>
@endpush

@section('content')
<div class="main mb-5" role="main">


    <div role="main" class="main margin-start">
        <div class="sticky-active" id="st">

            <div class="row s" style="height: 60px">
                <div class="col-md-12 text-center my-3">
                    <a class="w3-text-black font-weight-bold pr-4 sticky"
                        style="font-size: 20; color:#fda300 !important; border-bottom: 2px solid #fda300;"
                        href="#our_story">Our
                        Story</a>
                    <a class="w3-text-black font-weight-bold pr-4 sticky" style="font-size: 20;" href="#our_mission">Our
                        Mission</a>
                    <a class="w3-text-black font-weight-bold pr-4 sticky" style="font-size: 20;" href="#our_service">Our
                        Servicess</a>

                    <a class="w3-text-black font-weight-bold pr-4 sticky" style="font-size: 20;" href="#our_value">Our
                        Values</a>

                    <a class="w3-text-black font-weight-bold sticky" style="font-size: 20;" href="#why_us">Why book with
                        us</a>

                </div>
            </div>

        </div>
    </div>

    <div id="our_story"></div>
    <div class="row">
        <div class="col">
            <div class="blog-posts">

                <article class="post post-large">
                    <div class="post-image">
                        <a href="blog-post.html">
                            <img src="{{ asset('user/img/our-story-cover.png') }}"
                                class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                        </a>
                    </div>


                </article>

            </div>
        </div>

    </div>
    <div id="our_mission"></div>


    <div class="container pt-3 tarek-tarek">
        <div class="col-md-12 text-center">
            <p class="font-weight-bold text-black" style="font-size: 16px;"><span style="color: orange;">Our</span>
                Story
            </p>
            <p class="card2">Trip Beyond, is one of the fastest growing online travel agencies (OTA) based in Bangladesh
                which is certified by International Air Transport Association (IATA).</p>

            <p class="card2">Trip beyond was launched on September, 2019 with the slogan “Go beyond Your Dreams.” We are
                truly committed to providing you with quality services to make your tours easier, convenient and
                hassle-free</p>
        </div>

        <div class="col-md-12 text-center pt-5">
            <p class="text-black font-weight-bold" style="font-size: 16px;"><span style="color: orange;">Our</span>
                Mission
            </p>
            <p class="card2">Our mission is to meet our clients’ every travel needs through our excellent customer
                service, efficient and cost-effective operations. To reach the company’s vision, our mission extends
                with global promotion strategies, establishment and/or acquisition of new companies, partnerships and
                other ways to further extend our global market entry strategy and strength.

            </p>
            <p class="card2" id="our_service">We link people. We use our platform and technological capabilities to
                organize the movement of people and the delivery of travel experiences on a local and global scale
                across a diverse portfolio of businesses and brands. We assist our customers and partners in navigating
                through millions of options to arrive at the best potential result.</p>
        </div>




        <div class="col-md-12 text-center pt-5">
            <p class="text-black font-weight-bold" style="font-size: 16px;"><span style="color: orange;">Our</span>
                Services
            </p>
            <div class="blog-posts">


                <article class="post post-medium pt-5">
                    <div class="row mb-3">

                        <div class="col-lg-6 text-center">
                            <div class="post-content">
                                <p class="head-content-latter "> Air Ticketing</p>
                                <hr class="blackhr">


                                <p class="card2 pt-3">Air travel is the quickest and most efficient method of reaching
                                    one's destination. It saves us time and makes our travel more simpler. Traveling by
                                    flight is the greatest option when we need to get someplace urgently and fast.
                                    However, we are occasionally concerned about the costs, even though they are not
                                    always as high as we believe. Our firm processes air tickets for you at a very
                                    reasonable and cheap price in both domestic and international routes to make your
                                    travel stress-free, convenient, and easy. As a result, you won't have to be
                                    concerned about making an aircraft travel because we'll be there to support you
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6 pl-5">
                            <div class="post-image">
                                <a href="blog-post.html">

                                    <div style="position: relative; z-index: 2">


                                        <div class="w3-round-xxlarge" style="background-color: #0D4699; border: 0">
                                            <img src="{{ asset('user/servicess/1.png') }}"
                                                class="img1 to-left-border img-fluid w3-round-xxlarge  d-inline-block tarek-service-img"
                                                alt="">
                                        </div>

                                        <div class="w3-round-xxlarge tarek-about-border" style="">

                                        </div>
                                    </div>



                                </a>
                            </div>
                        </div>
                    </div>

                </article>

                <article class="post post-medium">
                    <div class="row mb-3">
                        <div class="col-lg-6 pr-5">
                            <div class="post-image">
                                <div style="position: relative; z-index: 2">



                                    <img src="{{ asset('user/servicess/2.jpeg') }}"
                                        class="img1 to-left-border img-fluid w3-round-xxlarge  d-inline-block tarek-service-img"
                                        alt="">


                                    <div class="w3-round-xxlarge tarek-about-border-2" style="">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 text-left pl-5">
                            <div class="post-content tarek-border-m">
                                <p class="head-content-latter pt-4"> Visa Processing</p>
                                <hr class="blackhr">


                                <p class="card2 pt-3">Most nations require a valid VISA to participate in overseas
                                    tours. Many individuals find managing visas quite difficult. However, if you come to
                                    us, our team of professionals will provide you with complete assistance in obtaining
                                    your most wanted visas. We process visas for a variety of nations, including the
                                    United Kingdom, the United States, Canada, China, Thailand, Singapore, Malaysia,
                                    Dubai, India, and others.

                                </p>
                            </div>
                        </div>
                    </div>

                </article>






                <article class="post post-medium">
                    <div class="row mb-3">

                        <div class="col-lg-6 text-left pr-5">
                            <div class="post-content">
                                <p class="head-content-latter pt-4">> Hotel Reservation</p>
                                <hr class="blackhr">


                                <p class="card2 pt-3">It is true that acclimating to a new area is difficult, especially
                                    if the place is unfamiliar to the traveler.</p>
                                <p class="card2">Keeping this in mind, we can provide you with "meet and greet service"
                                    as well as "hotel bookings service." Our agent meets you at the airport and
                                    transports you to the hotel you have reserved.
                                </p>
                                <p class="card2">As a result, we strive to make your experience as simple as possible.
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6 pl-5">
                            <div class="post-image">
                                <a href="blog-post.html">
                                    <div style="position: relative; z-index: 2">


                                        <div class="w3-round-xxlarge" style="background-color: #0D4699; border: 0">
                                            <img src="{{ asset('user/servicess/3.jpg') }}"
                                                class="img1 to-left-border img-fluid w3-round-xxlarge  d-inline-block tarek-service-img"
                                                alt="">
                                        </div>

                                        <div class="w3-round-xxlarge tarek-about-border">

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </article>



                <article class="post post-medium">
                    <div class="row mb-3">
                        <div class="col-lg-6 pr-5">
                            <div class="post-image">
                                <a href="blog-post.html">
                                    <div style="position: relative; z-index: 2">



                                        <img src="{{ asset('user/servicess/4.jpg') }}"
                                            class="img1 to-left-border img-fluid w3-round-xxlarge  d-inline-block tarek-service-img"
                                            alt="">


                                        <div class="w3-round-xxlarge tarek-about-border-2" style="">

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-left pl-5">
                            <div class="post-content tarek-border-m">
                                <p class="head-content-latter pt-4">> Transportation Services</p>
                                <hr class="blackhr">


                                <p class="card2 pt-3">Transportation is quite important while going on city sightseeing
                                    tours. Our company provides outstanding transportation services to every place you
                                    visit to ensure a comfortable and enjoyable journey. We may organize several modes
                                    of transportation, such as a four-seater vehicle, a luxury bus, or anything you
                                    choose. So, by choosing us, you may obtain the transportation services you want
                                    while staying within your budget.

                                </p>
                            </div>
                        </div>
                    </div>

                </article>




                <article class="post post-medium">
                    <div class="row mb-3">

                        <div class="col-lg-6 text-left pr-5">
                            <div class="post-content">
                                <p class="head-content-latter pt-4">> Local an International Tour Packages</p>
                                <hr class="blackhr">


                                <p class="card2 pt-3">Making excursions allows you to escape the monotony and dullness
                                    of your daily routine. A tour, on the other hand, cannot be entertaining enough if
                                    it is poorly organized. As a result, we put together appealing and cost-effective
                                    travel packages for you both at home and abroad.

                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6 pl-5">
                            <div class="post-image">
                                <a href="blog-post.html">
                                    <div style="position: relative; z-index: 2">


                                        <div class="w3-round-xxlarge" style="background-color: #0D4699; border: 0">
                                            <img src="{{ asset('user/servicess/3.jpg') }}"
                                                class="img1 to-left-border img-fluid w3-round-xxlarge  d-inline-block tarek-service-img"
                                                alt="">
                                        </div>

                                        <div class="w3-round-xxlarge tarek-about-border" style="">

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </article>



                <article class="post post-medium">
                    <div class="row mb-3">
                        <div class="col-lg-6 pr-5">
                            <div class="post-image">
                                <a href="blog-post.html">
                                    <div style="position: relative; z-index: 2">



                                        <img src="{{ asset('user/servicess/4.jpg') }}"
                                            class="img1 to-left-border img-fluid w3-round-xxlarge  d-inline-block tarek-service-img"
                                            alt="">


                                        <div class="w3-round-xxlarge tarek-about-border-2" style="">

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-left pl-5" id="our_value">
                            <div class="post-content tarek-border-m">
                                <p class="head-content-latter pt-4">> Customized Tours</p>
                                <hr class="blackhr">


                                <p class="card2 pt-3">You may customize your airline, tour plan, lodging, cuisines, and
                                    other aspects of your trip by choosing a customized tour package. Managing
                                    everything at the same time, though, can be challenging at times, it is our
                                    responsibility to organize and implement everything in accordance with your wishes
                                    in order to make your trip pleasurable, comfortable, and unforgettable. We owe it to
                                    you to give you with all required assistance in order for your personalized trip to
                                    be a success.

                                </p>
                            </div>
                        </div>
                    </div>

                </article>



            </div>
        </div>




        <div class="col-md-12 text-center" id="why_us">
            <p class="card2 font-weight-bold" style="font-size: 18px;"><span style="color: orange;">Our</span>
                Values
            </p>
            <p class="card2">We are a team of highly competent professionals who have hands-on expertise in their
                respective fields. They have the knowledge and ability to understand and meet the needs of each and
                every consumer. We respect people's trust in our services and strive to provide the finest possible
                service to each customer. Our strength is our clients' trust, and we endeavor to provide high-quality
                service every time they choose us.</p>
        </div>

    </div>



    <div class="col-md-12 text-center  pt-5">
        <p class="card2 font-weight-bold" style="font-size: 18px;"> Why book <span style="color: orange;">with
                us</span></p>

    </div>

</div>

<div style="max-width: 100%; background-color: #f0eef7 ;">
    <section class="container pt-5 pb-4  " style="background-color: #f0eef7;">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-lg-4 appear-animation pt-4  " data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="600">

                <div class="mr-3 ml-3">
                    <div class="card border-0 bg-color-white pr-2 pl-3 border-curve2">
                        <div class="card-body">
                            <img class="img-fluid feature-image" src="{{ asset('user/img/global.JPG') }}" alt="">
                            <h4 class="card-title mt-2 mb-1 text-4 font-weight-bold w3-text-black pb-3">Global Coverage
                            </h4>
                            <p class="card2">Irrespective of your destination, Trip Beyond provides you with essential
                                travel support with a wide range of services whether it is flight tickets, hotel
                                rentals, visa processing or anything else. </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-4 appear-animation pt-4" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="600">

                <div class="mr-3 ml-3">
                    <div class="card border-0 bg-color-white pr-2 pl-3 border-curve2">
                        <div class="card-body">
                            <img class="img-fluid feature-image" src="{{ asset('user/img/dollar.JPG') }}" alt="">
                            <h4 class="card-title mt-2 mb-1 text-4 font-weight-bold pb-3">Reasonable Pricing</h4>
                            <p class="card2">By traveling with Trip Beyond, you will be able to take advantage of
                                considerable amount of concession on everything that saves your money greatly while
                                providing quality service at the same time. Become a member to receive more savings on
                                our deals! </p>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-6 col-lg-4 appear-animation pt-4" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="600">

                <div class="ml-3 mr-3">
                    <div class="card border-0 bg-color-white pr-2 pl-3 border-curve2">
                        <div class="card-body">
                            <img class="img-fluid feature-image" src="{{ asset('user/img/secuirity.JPG') }}" alt="">
                            <h4 class="card-title mt-2 mb-1 text-4 font-weight-bold pb-3">Secure Payment</h4>
                            <p class="card2">One of our major concerns is the security of the payment process. Whether
                                you pay using credit cards or another method (such as third-party payment alternatives),
                                you can be certain that your payment information is secure.
                            </p>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-6 col-lg-4 appear-animation pt-4" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="600">

                <div class="mr-3 ml-3">
                    <div class="card border-0 bg-color-white pr-2 pl-3 border-curve2">
                        <div class="card-body">
                            <img class="img-fluid feature-image" src="{{ asset('user/img/user.JPG') }}" alt="">
                            <h4 class="card-title mt-2 mb-1 text-4 font-weight-bold pb-3">Monitoring the Quality of
                                Servicess</h4>
                            <p class="card2">Maintaining quality is one of the most important requirements for company
                                success. With this in mind, we constantly monitor our company's operations and strive to
                                improve the quality of our service. When our policies aren't in the best interests of
                                our loyal consumers, we don't hesitate to alter them.
                            </p>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-6 col-lg-4 appear-animation pt-4" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="600">

                <div class="mr-3 ml-3">
                    <div class="card border-0 bg-color-white pr-2 pl-3 border-curve2">
                        <div class="card-body">
                            <img class="img-fluid feature-image" src="{{ asset('user/img/support.JPG') }}" alt="">
                            <h4 class="card-title mt-2 mb-1 text-4 font-weight-bold pb-3">24 Hours Emergency Support
                            </h4>
                            <p class="card2">To make a journey safe and secure, regular and unbroken communication with
                                the travel agency is required. Keeping this in mind, our committed staff is here to
                                assist you 24 hours a day, seven days a week. When you need to communicate with us, you
                                may do so at any moment using your cell phone or social media.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>


</div>
@endsection