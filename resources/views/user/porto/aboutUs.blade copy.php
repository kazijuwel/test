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

        .container2 {
            width: 1100px !important;
            margin: 0 auto;
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
                        <div class="post-image" >
                            <a href="blog-post.html">
                                <img src="{{ asset('user/img/our-story-cover.png') }}"
                                    class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt=""  />
                            </a>
                        </div>

                        
                    </article>

                </div>
            </div>

        </div>
        


        <div class="row container-xl pt-3" style="margin: 0 auto;">
            <div class="col-md-12 text-center">
                <p class="font-weight-bold text-black" style="font-size: 16px;"><span style="color: orange;">Our</span>
                    Story
                </p>
                <p class="card2" id="our_mission">Trip beyond is one of the fastest growing agencies based in Dhaka, Bangladesh
                    which
                    is certified by International Air Transport Association (IATA). This company Was established
                    with the slogan "Go beyond your dreams." We are trully
                    commited to providing you with quality services to make your tours easier, convented and hassle
                    free.</p>
            </div>

            <div class="col-md-12 text-center pt-5" >
                <p class="text-black font-weight-bold" style="font-size: 16px;"><span style="color: orange;">Our</span>
                    Mission
                </p>
                <p class="card2">Our mission is to meat]]et our clients every travel needs through our excellent
                    customer service, efficient and cost-effective operations. To each company's vission, our
                    mission wxtends with global promotion stratagies, establishment
                    and/or acquisition of new companies, pertnerships and other way tofurther extends our gloabl
                    market entry stratagy and strength.
                </p>
                <p class="card2" id="our_service">We link people. We use our platform and technological capabilities to organize the
                    movement of paople and the delivery of travel experiencess on a local and global scale across a
                    diverse portfolio of business and brands. We assists
                    our customer and pertners in navigating through millions of options to arrive at the best
                    pottensial result.</p>
            </div>




            <div class="col-md-12 text-center pt-5" >
                <p class="text-black font-weight-bold" style="font-size: 16px;"><span style="color: orange;">Our</span>
                    Services
                </p>
                <div class="blog-posts">


                    <article class="post post-medium pt-5">
                        <div class="row mb-3">

                            <div class="col-lg-6 text-left pr-5">
                                <div class="post-content">
                                    <p class="head-content-latter "> Air Ticketing</p>
                                    <hr class="blackhr">


                                    <p class="card2 pt-3">Euismod atras vulputate iltricies etri elit. Class aptent
                                        taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                        himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam
                                        dolor ligula,
                                        faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque
                                        tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem.
                                        Proin rhoncus consequat nisl, eu ornare mauris tincidunt
                                        vitae. [...]
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-6 pl-5">
                                <div class="post-image">
                                    <a href="blog-post.html">

                                        <div class="tarek-service-img" style="position: relative; z-index: 2">


                                            <div class="w3-round-xxlarge " style="background-color: #0D4699;">
                                                <img src="{{ asset('user/servicess/1.png') }}"
                                                    class="img1 to-left-border  w3-round-xxlarge  d-inline-block "
                                                    alt=""
                                                    style="height: 100%;
                                                    width: 100%;">
                                            </div>

                                            <div class="w3-round-xxlarge"
                                                style="height: 260px; width:260px; background-color: #F6931D; position:absolute; left: -20px; top: -15px; z-index: -1">

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
                                    <div class="tarek-service-img" style="position: relative; z-index: 2">


                                        <div class="w3-round-xxlarge ">
                                        <img src="{{ asset('user/servicess/2.jpeg') }}"
                                            class="img1 to-left-border img-fluid w3-round-xxlarge  d-inline-block"
                                            alt=""
                                            style="height: 100%;
                                                    width: 100%;
                                                    background-color: #0D4699;">
                                            </div>


                                        <div class="w3-round-xxlarge"
                                            style="height: 230px; width:260px; background-color: #F6931D; position:absolute; right: -15px; top: -15px; z-index: -1">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 text-left pl-5">
                                <div class="post-content">
                                    <p class="head-content-latter pt-4"> Visa Processing</p>
                                    <hr class="blackhr">


                                    <p class="card2 pt-3">Euismod atras vulputate iltricies etri elit. Class aptent
                                        taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                        himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam
                                        dolor ligula,
                                        faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque
                                        tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem.
                                        Proin rhoncus consequat nisl, eu ornare mauris tincidunt
                                        vitae. [...]
                                    </p>
                                </div>
                            </div>
                        </div>

                    </article>






                    <article class="post post-medium">
                        <div class="row mb-3">

                            <div class="col-lg-6 text-left pr-5">
                                <div class="post-content">
                                    <p class="head-content-latter pt-4">> Hotel Reservation Servicess</p>
                                    <hr class="blackhr">


                                    <p class="card2 pt-3">Euismod atras vulputate iltricies etri elit. Class aptent
                                        taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                        himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam
                                        dolor ligula,
                                        faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque
                                        tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem.
                                        Proin rhoncus consequat nisl, eu ornare mauris tincidunt
                                        vitae. [...]
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-6 pl-5">
                                <div class="post-image">
                                    <a href="blog-post.html">

                                        <div class="tarek-service-img" style="position: relative; z-index: 2">


                                            <div class="w3-round-xxlarge " style="background-color: #0D4699; height: 100%; width: 100%;">
                                                <img src="{{ asset('user/servicess/3.jpg') }}"
                                                    class="img1 to-left-border  w3-round-xxlarge  d-inline-block "
                                                    alt=""
                                                    style="height: 320px;
                                                    width: 100%;">
                                            </div>

                                            <div class="w3-round-xxlarge"
                                                style="height: 250px; width:260px; background-color: #F6931D; position:absolute; left: -20px; top: -15px; z-index: -1">

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
                                        <div class="tarek-service-img" style="position: relative; z-index: 2">


                                            <div class="w3-round-xxlarge " style=" border: 0">
                                            <img src="{{ asset('user/servicess/4.jpg') }}"
                                                class="img1 to-left-border img-fluid w3-round-xxlarge  d-inline-block "
                                                alt=""
                                                style="height: 100%;
                                                width: 100%;
                                                background-color: #0D4699;">
                                            </div>


                                            <div class="w3-round-xxlarge"
                                                style="height: 230px; width:260px; background-color: #F6931D; position:absolute; right: -15px; top: -15px; z-index: -1">

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-left pl-5">
                                <div class="post-content">
                                    <p class="head-content-latter pt-4">> Transportation Servicess</p>
                                    <hr class="blackhr">


                                    <p class="card2 pt-3">Euismod atras vulputate iltricies etri elit. Class aptent
                                        taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                        himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam
                                        dolor ligula,
                                        faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque
                                        tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem.
                                        Proin rhoncus consequat nisl, eu ornare mauris tincidunt
                                        vitae. [...]
                                    </p>
                                </div>
                            </div>
                        </div>

                    </article>




                    <article class="post post-medium">
                        <div class="row mb-3">

                            <div class="col-lg-6 text-left pr-5">
                                <div class="post-content">
                                    <p class="head-content-latter pt-4">> Local an International Tour Packagess</p>
                                    <hr class="blackhr">


                                    <p class="card2 pt-3">Euismod atras vulputate iltricies etri elit. Class aptent
                                        taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                        himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam
                                        dolor ligula,
                                        faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque
                                        tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem.
                                        Proin rhoncus consequat nisl, eu ornare mauris tincidunt
                                        vitae. [...]
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-6 pl-5">
                                <div class="post-image">
                                    <a href="blog-post.html">
                                        <div class="tarek-service-img" style="position: relative; z-index: 2">


                                            <div class="w3-round-xxlarge " style=" border: 0">
                                                <img src="{{ asset('user/servicess/3.jpg') }}"
                                                    class="img1 to-left-border img-fluid w3-round-xxlarge  d-inline-block "
                                                    alt=""
                                                    style="height: 100%;
                                                    width: 100%;
                                                    background-color: #0D4699;">
                                            </div>

                                            <div class="w3-round-xxlarge"
                                                style="height: 260px; width:260px; background-color: #F6931D; position:absolute; left: -20px; top: -15px; z-index: -1">

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
                                        <div class="tarek-service-img" style="position: relative; z-index: 2">


                                            <div class="w3-round-xxlarge ">
                                            <img src="{{ asset('user/servicess/4.jpg') }}"
                                                class="img1 to-left-border img-fluid w3-round-xxlarge  d-inline-block"
                                                alt=""
                                                style="height: 100%;
                                                    width: 100%;">>
                                        </div>


                                            <div class="w3-round-xxlarge"
                                                style="height: 230px; width:260px; background-color: #F6931D; position:absolute; right: -15px; top: -15px; z-index: -1">

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-left pl-5" id="our_value">
                                <div class="post-content">
                                    <p class="head-content-latter pt-4">> Customized Tours</p>
                                    <hr class="blackhr">


                                    <p class="card2 pt-3">Euismod atras vulputate iltricies etri elit. Class aptent
                                        taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                        himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam
                                        dolor ligula,
                                        faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque
                                        tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem.
                                        Proin rhoncus consequat nisl, eu ornare mauris tincidunt
                                        vitae. [...]
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
                <p class="card2">Ipsum justo ipsum sit sed dolores,Kasd ipsum sit est invidunt at, sea labore amet
                    takimata voluptua dolores. Tempor kasd lorem diam eos dolor invidunt est,. at et sit ea lorem
                    nonumy takimata consetetur diam accusam. Amet erat no no
                    lorem dolores erat eos sed. Sed voluptua eos et amet sit et accusam et, dolore dolor magna
                    accusam stet amet.</p>
            </div>

        </div>



        <div class="col-md-12 text-center  pt-5" >
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
                                <p class="card2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Curabitur rhoncus nulla dui, in dapi.Elitr et invidunt eos amet sit, labore elitr dolor
                                    amet ipsum dolores et rebum kasd, nonumy accusam duo sed at. </p>
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
                                <p class="card2">Lorem ipsum dolor sit amet, consectetur in dapi. Sadipscing
                                    dolores vero dolore takimata duo accusam magna takimata, amet erat voluptua rebum ipsum
                                    takimata kasd dolor sanctus. Tempor takimata.</p>
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
                                <p class="card2">Lorem ipsum dolor sit amet, consectetur nulla dui, in dapi.No
                                    aliquyam dolore sadipscing rebum sed clita dolore dolores dolor kasd. Lorem dolor eirmod
                                    diam lorem sadipscing erat vero eos,. </p>
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
                                <p class="card2">Lorem ipsum dolor sit amet, rhoncus nulla dui, in dapi.Dolor stet
                                    ea sit consetetur eirmod ipsum nonumy takimata et sadipscing, eirmod et dolor duo lorem
                                    sit sanctus, consetetur eos. </p>
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
                                <p class="card2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Curabitur rhoncus nulla dui, in dapi. Ea sit rebum lorem diam dolores gubergren et ut,
                                    ipsum labore erat dolores invidunt no kasd magna et, sed labore.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>


    </div>
@endsection
