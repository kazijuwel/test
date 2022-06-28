@extends('user.porto.layouts.userLayoutMaster')

@push('css')
<link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<style>
    a#home-tab {
        border: none;
        background-color: #fff;
        color: black;
        margin: 2px 5px;
        font-weight: normal;
    }

    .tarek-head {
        display: inline-block;
        color: black !important;
        font-size: 16px !important;
        font-weight: bold !important;
        margin-bottom: 10px !important;
    }

    .owl-carousel .owl-nav button.owl-prev,
    .owl-carousel .owl-nav button.owl-next {
        display: inline-block;
        position: absolute;
        top: 50%;
        width: 30px;
        height: 30px;
        outline: 0;
        margin: 0;
        transform: translate3d(0, -50%, 0);
        border-radius: 50%;
    }

    .select2-container--bootstrap4 .select2-selection {
        background-color: #fff;
        border: 0px solid #ced4da;
        border-radius: 0.25rem;
        -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        width: 100%;
    }

    .select2-container--bootstrap4 .select2-selection--single .select2-selection__arrow b {
        top: 60%;
        border-color: #343a40 transparent transparent;
        border-style: solid;
        border-width: 0px 0px 0;
        width: 0;
        height: 0;
        left: 50%;
        margin-left: -4px;
        margin-top: -2px;
        position: absolute;
    }


    .owl-carousel .owl-nav button[class*="owl-"]:hover,
    .owl-carousel .owl-nav button[class*="owl-"].hover {
        background-color: #151B49;
        border-color: #151B49 #151B49 #151B49;
    }

    .owl-carousel .owl-nav button[class*="owl-"] {
        background-color: #151B49;
        border-color: #151B49 #151B49 #151B49;
        color: #FFF;
    }

    a#home-tab:hover,
    a#home-tab:focus,
    a#home-tab:active {
        border: none;
    }

    a#profile-tab {
        border: none;
        background-color: #fff;
        color: black !important;
        margin: 2px 5px;
    }

    a#profile-tab:hover,
    a#profile-tab:focus,
    a#profile-tab:active {
        border: none;
    }

    a#contact-tab {
        border: none;
        background-color: #fff;
        color: black;
        margin: 2px 5px;
    }

    a#contact-tab:hover,
    a#contact-tab:focus,
    a#contact-tab:active {
        border: none;
    }


    a#adult-tab {
        border: none;
        background-color: #fff;
        color: black;
        margin: 2px 5px;
        font-weight: normal;
    }

    a#adult-tab:hover,
    a#adult-tab:focus,
    a#adult-tab:active {
        border: none;
    }

    .tarek-border {
        border: none;
    }


    a#economy-tab {
        border: none;
        background-color: #fff;
        color: black;
        margin: 2px 5px;
        font-weight: normal;
    }

    a#economy-tab:hover,
    a#economy-tab:focus,
    a#economy-tab:active {
        border: none;
    }



    a.active:hover,
    a.active:focus,
    a.active:active {
        background-color: #d6d6d6 !important;
        font-weight: 700 !important;
    }

    .select2-search--dropdown .select2-search__field {
        border: none !important;
    }

    input#departs {
        padding-left: 10px !important;
        padding-right: 10px !important;
    }

    div#myTabContent {
        border: none;
    }

    ul#myTab {
        border: none;
    }

    p {
        line-height: normal !important;
    }
</style>
@endpush

@section('content')
<div role="main" class="main margin-start">
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold" id="defaultModalLabel">Sign Up</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="contact-form" action="php/contact-form.php" method="POST">
                        <div class="contact-form-success alert alert-success d-none mt-4">
                            <strong>Success!</strong> Your message has been sent to us.
                        </div>

                        <div class="contact-form-error alert alert-danger d-none mt-4">
                            <strong>Error!</strong> There was an error sending your message.
                            <span class="mail-error-message text-1 d-block"></span>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" value="" data-msg-required="Please enter your name." maxlength="100"
                                    class="form-control" name="name" placeholder="First Name..." required>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" value="" data-msg-required="Please enter your email address."
                                    data-msg-email="Please enter a valid email address." maxlength="100"
                                    class="form-control" name="email" placeholder="Last Name.." required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" value="" data-msg-required="Please enter the subject."
                                    maxlength="100" class="form-control" name="subject" placeholder="Email..." required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <input type="password" value="" data-msg-required="Please enter the subject."
                                    maxlength="100" class="form-control" name="subject" placeholder="Password" required>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col">
                                <input type="password" value="" data-msg-required="Please enter the subject."
                                    maxlength="100" class="form-control" name="subject" placeholder="Re Enter Password"
                                    required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <input type="submit" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row  tarek-cover-hight">
        <div class="col-md-12 m-auto" style="position: relative; width: 100%; ">

            <div class="text-right">
                <img src="{{ asset('user/img/cover2.jpeg') }}" class="img-fluid" style="height:310px ; width:100%"
                    alt="">
            </div>

            <div class="tarek-polygon-text">
                <div class="d-flex align-items-center tarek-polygon"
                    style="height:310px; width: 100%; background-color: #ffff  ">


                    <div style="width: 30%; margin: 0 auto; ">

                        <span class="font-weight-bold text-left text-40" style=" color:#F6931D; ">Join Us</span>
                        <br>
                        <span>Make a great career out of your
                            passion</span>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="container-n">

        <section>
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p style="font-size: 18px; font-weight:bold;"><span style="color:#F6931D">Our</span> Vission
                    </p>
                    <p class="card2 px-2">Trip beyond is one of the fastest growing agencies based in Dhaka,
                        Bangladesh which is certified by International Air Transport Association (IATA).
                        This company Was established with the slogan "Go beyond your dreams."
                        We are trully commited to providing you with quality services to make your tours
                        easier, convented and hassle free.</p>
                </div>
            </div>
            <div class="container">
                <div class="sort-destination-loader-loader-showing">
                    <div class="row portfolio-list" data-sort-id="portfolio" style="margin-right: -32px;">


                        <div class="col-md-5  isotope-item col-text-center">
                            <div class="portfolio-item pl-4">

                                <span class="thumb-info thumb-info-lighten border-radius-0 pb-3">
                                    <span class="border-radius-0"
                                        style="font-size: 50px; font-weight: bold; color:black">

                                        Become a local <br> tour guide

                                    </span>
                                </span>
                                <a class="btn btn-rounded btn-lg btn-tarek" href="">Join Us</a>

                            </div>
                        </div>

                        <!-- img-text1: text-align:right/text-align:center  -->


                        <div class="col-md-7  isotope-item img-text1">
                            <div class="portfolio-item">

                                <span class="border-radius-0">
                                    <span class="border-radius-0">
                                        <div style="position: relative;z-index: 1">


                                            <img src="{{ asset('user/img/toureguide.jpg') }}"
                                                class="img1 to-left-border img-fluid  d-inline-block" style="" alt="">

                                            <div class="tarek-img-border-contact-top">

                                            </div>
                                        </div>
                                    </span>
                                </span>

                            </div>
                        </div>



                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center pt-5 pb-5">
                        <span class="text-dark font-weight-bold">Why you should join <span style="color:#F6931D ">Trip
                                Beyond</span></span>
                    </div>
                    <div class="col-md-12 ">
                        <div class="tarek-align-center" style="width:80%;position: relative;z-index: 1">
                            <img class="img-fluid d-inline-block" src="{{ asset('user/img/imagenew.jpg') }}"
                                class="img-fluid" style="width: 100%; " alt="Project Image">
                            <div
                                style="height: 150px; width:150px; background-color: #F6931D; position:absolute; right: -20px; bottom: -15px; z-index: -1">

                            </div>
                        </div>
                    </div>



                </div>

                <div class="row pt-5 mt-5 tarek-align-center" style="width: 90%">
                    <div class="col-md-6 tarek-align-center">
                        <span class="tarek-head">Grow Your Career</span>
                        <p class="tarek-text-dark">Trip Beyond offers you a fantastic opportunity to a
                            dvance your career. It allows you to lead your career
                            in the proper direction because it is an emerging
                            travel agency that is continuously developing.</p>

                    </div>

                    <div class="col-md-6 tarek-align-center">
                        <span class="tarek-head">Get Hands-on Training and Brush up Your Skills</span>
                        <p class="tarek-text-dark">Working at Trip Beyond will provide you with a fantastic
                            opportunity to receive adequate training and assert your
                            abilities in a way that will benefit both you and the company.
                            It provides you with the best environment in which to foster
                            and leverage your professional abilities</p>

                    </div>

                    <div class="col-md-6 tarek-align-center">
                        <span class="tarek-head">Friendly Work Environment with Flexibility</span>
                        <p class="tarek-text-dark">Trip Beyond maintains a welcoming work atmosphere in
                            which all workers, regardless of background, are valued.
                            Our flexible working environment allows you to strike a
                            better work-life balance.</p>

                    </div>

                    <div class="col-md-6 tarek-align-center">
                        <span class="tarek-head">Lucrative Compensation Package</span>
                        <p class="tarek-text-dark">We provide a competitive remuneration plan to our workers.
                            As part of their overall remuneration, all employees get an
                            equity package in the company.</p>

                    </div>
                </div>

                <div class="row pt-5 pl-4 tarek-openning-margin-r">
                    <div class="col-md-12">

                        <p style="font-size: 50px; font-weight: bold; color:black">Openning</p>
                        <div class="row">
                            <div class="col-md-10">
                                <p class="card2">We are looking for people to join the team who are as excited
                                    as we are to help build the emplowers the future genaration of creators to
                                    be successfull online</p>
                            </div>

                            <div class="col-md-2 text-right">
                                <a class="btn btn-rounded btn-xl btn-tarek text-dark" href="">Apply Now</a>

                            </div>
                        </div>
                        <hr class="yellowhr">
                    </div>



                </div>



                <div class="row pl-4 tarek-openning-margin-r">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="mr-5 pr-5" style="width: 100%;">
                                <tr class="py-2">
                                    <th>Country</th>
                                    <th>Administrative</th>
                                    <th>Legal</th>
                                </tr>

                                <tr class="py-2">
                                    <td>All</td>
                                    <td>Management</td>
                                    <td>Salese</td>
                                </tr>

                                <tr class="py-2">
                                    <td>Bangladesh</td>
                                    <td>Business Development</td>
                                    <td>Reservation</td>
                                </tr class="py-2">

                                <tr class="py-2">
                                    <td>United Kingdom</td>
                                    <td>Business Operation/analysis</td>
                                    <td>Marketing</td>
                                </tr>

                                <tr class="py-2">
                                    <td></td>
                                    <td>ata Science</td>
                                    <td>Human Resource</td>
                                </tr>

                                <tr class="py-2">
                                    <td></td>
                                    <td>Engineering</td>
                                    <td>Digital Marketing</td>
                                </tr>

                                <tr class="py-2">
                                    <td></td>
                                    <td>Finance & Accounting</td>
                                    <td>Customer Service</td>
                                </tr>

                                <tr class="py-2">
                                    <td></td>
                                    <td>Information Technology</td>
                                    <td></td>
                                </tr>

                            </table>
                        </div>
                    </div>

                    <!-- container-col: margin-right:150px/0px -->
                    <div class="col-md-12 text-right pl-4 ">
                        <a class="btn btn-rounded btn-tarek btn-xl text-dark " href="">Apply Now</a>
                        <hr class="yellowhr ">
                    </div>
                </div>
            </div>
    </div>
    </section>
    <div class="container py-2 pl-5">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <p style="font-size: 35px; font-weight: bold; color:black">Gallery</p>


                        <div class="lightbox"
                            data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
                            <div class="owl-carousel owl-theme stage-margin"
                                data-plugin-options="{'items': 3, 'margin': 15, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': -155}">


                                <div>
                                    <img class="img-fluid e" src="{{ asset('user/gallery/1.jpg') }}"
                                        style="height: 240px; width:360px; position: relative" alt="Project Image">
                                    <div style="position: absolute; z-index: 99;top:0" class="p-5 pb-3">


                                    </div>

                                </div>

                                <div>
                                    <img class="img-fluid e" src="{{ asset('user/gallery/2.jpg') }}"
                                        style="height: 240px; width:360px; position: relative" alt="Project Image">
                                    <div style="position: absolute; z-index: 99;top:0" class="p-5 pb-3">


                                    </div>

                                </div>


                                <div>
                                    <img class="img-fluid e" src="{{ asset('user/gallery/3.png') }}"
                                        style="height: 240px; width:360px; position: relative" alt="Project Image">
                                    <div style="position: absolute; z-index: 99;top:0" class="p-5 pb-3">


                                    </div>

                                </div>


                                <div>
                                    <img class="img-fluid e" src="{{ asset('user/gallery/1.jpg') }}"
                                        style="height: 240px; width:360px; position: relative" alt="Project Image">
                                    <div style="position: absolute; z-index: 99;top:0" class="p-5 pb-3">


                                    </div>

                                </div>


                                {{-- <div>
                                    <img class="img-fluid w3-round-xxlarge"
                                        src="{{ route('imagecache',['template'=>'cardslider','filename'=>$hotel->image]) }}"
                                        style="height: 240px;" alt="Project Image">
                                    <p class="p-3" style="margin-top: -210px;"> <span
                                            class="w3-text-white  font-weight-bold" style="font-size: 22px;">{{
                                            $hotel->title }} <br></span> </p>
                                    <div class="w3-text-orange w3-large p-3 pb-2">{{ $hotel->cost }} <br>
                                        <div class="pt-5 mt-1">
                                            <a href="{{ route('imagecache',['template'=>'cardslider','filename'=>$hotel->image]) }}"
                                                class="btn w3-text-white w3-large">Plan it now <i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div> --}}

                                <div style="display: none">

                                </div>



                                {{-- <div>
                                    <img class="img-fluid w3-round-xxlarge"
                                        src="{{ asset('user/img/projects/project.jpg') }}" alt="Project Image">
                                </div> --}}
                            </div>
                        </div>


                        {{-- <div class="lightbox"
                            data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
                            <div class="owl-carousel owl-theme stage-margin"
                                data-plugin-options="{'items': 3, 'margin': 15, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': -155}">
                                <div>
                                    <a class="img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon"
                                        href="{{ asset('user/img/night-view2.jpg') }}">
                                        <img class="img-fluid" src="{{ asset('user/img/night-view2.jpg') }}"
                                            style="height: 260px; " alt="Project Image">
                                    </a>
                                </div>
                                <div>
                                    <a class="img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon"
                                        href="{{ asset('user/img/night-view-2.jpg') }}">
                                        <img class="img-fluid" src="{{ asset('user/img/night-view-2.jpg') }}"
                                            style="height: 260px; " alt="Project Image">
                                    </a>
                                </div>
                                <div>
                                    <a class="img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon"
                                        href="{{ asset('user/img/night-view2.jpg') }}">
                                        <img class="img-fluid" src="{{ asset('user/img/night-view2.jpg') }}"
                                            style="height: 260px; " alt="Project Image">
                                    </a>
                                </div>
                                <div>
                                    <a class="img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon"
                                        href="{{ asset('user/img/night-view-2.jpg') }}">
                                        <img class="img-fluid" src="{{ asset('user/img/night-view-2.jpg') }}"
                                            style="height: 260px; " alt="Project Image">
                                    </a>
                                </div>
                                <div>
                                    <a class="img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon"
                                        href="{{ asset('user/img/night-view2.jpg') }}">
                                        <img class="img-fluid" src="{{ asset('user/img/night-view2.jpg') }}"
                                            style="height: 260px;" alt="Project Image">
                                    </a>
                                </div>
                                <div>
                                    <a class="img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon"
                                        href="{{ asset('user/img/night-view-2.jpg') }}">
                                        <img class="img-fluid" src="{{ asset('user/img/night-view-2.jpg') }}"
                                            style="height: 260px;" alt="Project Image">
                                    </a>
                                </div>
                                <div>
                                    <a class="img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon"
                                        href="{{ asset('user/img/night-view2.jpg') }}">
                                        <img class="img-fluid" src="{{ asset('user/img/night-view2.jpg') }}"
                                            style="height: 260px;" alt="Project Image">
                                    </a>
                                </div>
                                <div>
                                    <a class="img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon"
                                        href="{{ asset('user/img/night-view-2.jpg') }}">
                                        <img class="img-fluid" src="{{ asset('user/img/night-view-2.jpg') }}"
                                            style="height: 260px;" alt="Project Image">
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

<div class="pt-5 mt-3" style="background-color: #F7F7F7">
    <div class="container py-2" style="background-color: #F7F7F7;">

        <div class="row mb-5 pb-3" style="width: 100%; margin: 0 auto">

            <div class="col-md-12">
                <h4 class="mb-4 text-center"><span class="text-warning">Employee</span> Testmonial</h4>
            </div>

            <div class="col-md-6 col-lg-4 appear-animation py-2" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="600">


                <div class="card border-0 bg-color-grey">
                    <div class="card-body w3-round-xxlarge" style="line-height:2.5; background-color: #FFFFFF;">

                        <p class="card-title mt-2 mb-1 text-4 font-weight-bold pb-2 card2"><img
                                src="{{ asset('user/svg/user.jpg') }}"
                                style="width:50px; height:50px; border-radius: 50%;" alt="Employee"><span
                                class="pl-4">Full Name</span></p>
                        <p class="card-text card2">Clita invidunt aliquyam consetetur et eirmod ea et diam diam,
                            et voluptua dolores voluptua et dolor consetetur, vero est duo ea sed stet nonumy no
                            clita eirmod, eirmod lorem stet.Tempor dolor dolore at vero diam et aliquyam.Amet at duo sit
                            diam stet sadipscing sadipscing invidunt, clita voluptua accusam nonumy ipsum ipsum elitr
                            aliquyam diam gubergren. Erat. </p>
                        <hr class="yellowhr">
                        <div class="row">

                            <div class="col-md-12">
                                <p class="card2">Business Developer</p>
                            </div>
                        </div>
                    </div>


                </div>


            </div>

            <div class="col-md-6 col-lg-4 appear-animation py-2" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="600">


                <div class="card border-0 bg-color-grey">
                    <div class="card-body w3-round-xxlarge" style="background-color: #FFFFFF;">
                        <p class="card-title mt-2 mb-1 text-4 font-weight-bold pb-2 card2 ">
                            <img src="{{ asset('user/svg/user.jpg') }}"
                                style="width:50px; height:50px; border-radius: 50%;" alt="Employee ">
                            <span class=" pl-4 ">Full
                                Name</span>
                        </p>
                        <p class=" card-text card2 ">Sed stet nonumy amet et ut accusam sadipscing sed gubergren, ut
                            tempor sanctus dolor takimata lorem, diam dolore sadipscing dolor diam dolore erat labore
                            ut, dolore sit erat justo accusam.At amet stet ea et rebum diam sadipscing.Accusam lorem
                            magna tempor duo lorem sed accusam aliquyam nonumy, nonumy gubergren labore elitr invidunt
                            sit dolores. Et ea diam. </p>
                        <hr class=" yellowhr ">
                        <div class=" row ">
                            <div class=" col-md-12 ">
                                <p class=" card2 ">Business Developer</p>
                            </div>
                        </div>
                    </div>


                </div>


            </div>


            <div class=" col-md-6 col-lg-4 appear-animation py-2" data-appear-animation="fadeInUpShorter "
                data-appear-animation-delay=" 600 ">
                <div class=" card border-0 bg-color-grey ">
                    <div class=" card-body w3-round-xxlarge " style=" background-color: #FFFFFF; ">
                        <p class=" card-title mt-2 mb-1 text-4 font-weight-bold pb-2 card2 "> <img
                                src="{{ asset('user/svg/user.jpg') }}"
                                style="width:50px; height:50px; border-radius: 50%;" alt="Employee ">
                            <span class=" pl-4 ">Full
                                Name</span>
                        </p>
                        <p class=" card-text card2 " style=" line-height:1.5; ">Accusam duo justo ipsum ea ut no et
                            nonumy. Magna nonumy magna stet et et, eirmod rebum erat dolor amet sit sit. At sit diam
                            nonumy diam tempor vero clita,.Magna et erat stet ipsum dolores aliquyam invidunt, rebum
                            sanctus kasd. Dolor voluptua et justo sit gubergren tempor elitr eos voluptua voluptua.
                            Gubergren gubergren kasd duo elitr sit et, no lorem.</p>
                        <hr class=" yellowhr ">


                        <div class=" row ">
                            <div class=" col-md-12 ">
                                <p class=" card2 ">Business Developer</p>
                            </div>
                        </div>
                    </div>


                </div>


            </div>

        </div>


    </div>

</div>
@endsection