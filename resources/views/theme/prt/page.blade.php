@extends('theme.prt.layouts.prtMaster')

@section('title')
    {{ $page->page_title }} | {{ env('APP_NAME') }}
@endsection
@section('meta')
@endsection

@push('css')
    <style>
        .popup {
            position: fixed;
            right: 50%;
        }

    </style>
@endpush

@section('contents')
    @include('alerts.alerts')
    <div class="row">
        @if ($page->id == 20)
            <div class="col-md-12">
                <div>
                    <div class="d-md-none owl-carousel owl-theme full-width owl-loaded owl-drag owl-carousel-init m-0"
                        data-plugin-options="{'items': 1, 'loop': true, 'nav': true, 'dots': true,
                {{-- 'animateOut':'fadeOut', --}}
                {{-- 'animateOut': 'slideOutLeft', 'animateIn': 'slideInRight', --}} 'autoplayHoverPause':false,  'autoplay':true, 'autoplayTimeout': 4000}">
                        <div>
                            <img src="{{ asset('img/r/1.jpg') }}" class="img-fluid" alt="">

                            <div class="row slider-custom-caption">


                                <div class="col-md-12">

                                    <div class="container p-0">


                                        <div class="w3-card">


                                            <div class="card- w3-card-4- px-5 rounded slider-card-bg-color- w3-orange"
                                                -style="background-color: purple">
                                                <div class="card-body- py-1 pb-3 w3-animate-zoom">

                                                    <div class="row">
                                                        <div class="col-sm-9">

                                                            <h2 class="w3-text-white pt-0">Discover Trip</h2>
                                                            <h4 class="w3-text-white">International & Domestic Air
                                                                Ticketing, Visa and immigration processing</h4>

                                                        </div>
                                                        <div class="col-sm-3">

                                                            <div class="text-center">

                                                                <div class="d-none d-sm-block"><br> <br></div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <img src="{{ asset('img/r/2.jpg') }}" class="img-fluid" alt="">

                            <div class="row slider-custom-caption">

                                <div class="col-md-12">

                                    <div class="container p-0">

                                        <div class="w3-card m-lg-4">


                                            <div class="card- w3-card-4- px-5 rounded slider-card-bg-color- w3-indigo"
                                                -style="background-color: purple">
                                                <div class="card-body- py-1 pb-3">

                                                    <div class="row">
                                                        <div class="col-sm-9">

                                                            <h2 class="w3-text-white pt-0">World-changing ideas.
                                                                Life-changing impact.</h2>
                                                            <h4 class="w3-text-white">Explore the global impact of RCH's
                                                                research. </h4>

                                                        </div>

                                                        <div class="col-sm-3">


                                                            <div class="text-center">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div>
                            <img src="{{ asset('img/r/3.jpg') }}" class="img-fluid" alt="">

                            <div class="row slider-custom-caption">

                                <div class="col-md-12">

                                    <div class="container p-0">

                                        <div class="w3-card m-lg-4">


                                            <div class="card- w3-card-4- px-5 rounded slider-card-bg-color- w3-deep-orange"
                                                -style="background-color: purple">
                                                <div class="card-body- py-1 pb-3">

                                                    <div class="row">
                                                        <div class="col-sm-9">

                                                            <h2 class="w3-text-white pt-0">Centre for Medical Postgraduate
                                                                studies</h2>
                                                            <div class="w3-text-white">Developing the next generation of
                                                                research talent </div>

                                                        </div>

                                                        <div class="col-sm-3">


                                                            <div class="text-center">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div>
                            <img src="{{ asset('img/r/4.jpg') }}" class="img-fluid" alt="">

                            <div class="row slider-custom-caption">

                                <div class="col-md-12">

                                    <div class="container p-0">

                                        <div class="w3-card m-lg-4">


                                            <div class="card- w3-card-4- px-5 rounded slider-card-bg-color- w3-green"
                                                -style="background-color: purple">
                                                <div class="card-body- py-1 pb-3">

                                                    <div class="row">
                                                        <div class="col-sm-9">

                                                            <h2 class="w3-text-white pt-0">Lorem ipsum dolor sit </h2>
                                                            <div class="w3-text-white">Collaborate Lorem ipsum dolor sit
                                                                amet consectetur adipisicing. </div>

                                                        </div>

                                                        <div class="col-sm-3">


                                                            <div class="text-center">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div>
                            <img src="{{ asset('img/r/5.webp') }}" class="img-fluid" alt="">

                            <div class="row slider-custom-caption">

                                <div class="col-md-12">

                                    <div class="container p-0">

                                        <div class="w3-card m-lg-4">


                                            <div class="card- w3-card-4- px-5 rounded slider-card-bg-color- w3-blue"
                                                -style="background-color: purple">
                                                <div class="card-body- py-1 pb-3">

                                                    <div class="row">
                                                        <div class="col-sm-9">

                                                            <h2 class="w3-text-white pt-0">Support & Guidance</h2>
                                                            <div class="w3-text-white">Lorem ipsum dolor sit amet
                                                                consectetur adipisicing elit. Nesciunt officia nemo eum
                                                                aliquid officiis alias? Dignissimos.</div>

                                                        </div>

                                                        <div class="col-sm-3">


                                                            <div class="text-center">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-none d-md-block owl-carousel owl-theme nav-inside"
                        data-plugin-options="{'items': 1, 'margin': 1, 'loop': true, 'nav': true, 'dots': true, 'autoplay': true,  'autoplayTimeout': 4000}">
                        <div>
                            <div class="text-center"
                                style="height: auto; background: url({{ asset('img/r/1.jpg') }}) no-repeat center; background-size: 100%">
                                <div class="card w3-tag w3-orange w3-text-white" style="margin: 240px 0 240px 0">
                                    <div class="card-body">
                                        <div class="text-8 ">
                                            lorem ipsum hollrew
                                        </div>
                                        <div class="text-5">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="text-center"
                                style="height: auto; background: url({{ asset('img/r/2.jpg') }}) no-repeat center; background-size: 100%">
                                <div class="card w3-tag w3-indigo" style="margin: 240px 0 240px 0">
                                    <div class="card-body">
                                        <div class="text-8 ">
                                            World-changing ideas. Life-changing impact.
                                        </div>
                                        <div class="text-5">
                                            Lorem ipsum dolor sit amet consectetur
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="text-center"
                                style="height: auto; background: url({{ asset('img/r/3.jpg') }}) no-repeat center; background-size: 100%">
                                <div class="card w3-tag w3-deep-orange" style="margin: 240px 0 240px 0">
                                    <div class="card-body">
                                        <div class="text-8 ">
                                            Lorem ipsum dolor sit amet, consectetur
                                        </div>
                                        <div class="text-5">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing .
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="text-center"
                                style="height: auto; background: url({{ asset('img/r/4.jpg') }}) no-repeat center; background-size: 100%">
                                <div class="card w3-tag w3-green" style="margin: 240px 0 240px 0">
                                    <div class="card-body">
                                        <div class="text-8 ">
                                            Lorem ipsum dolor sit
                                        </div>
                                        <div class="text-5">
                                            Lorem ipsum dolor sit, amet consectetur .
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="text-center"
                                style="height: auto; background: url({{ asset('img/r/5.webp') }}) no-repeat center; background-size: 100%">
                                <div class="card w3-tag w3-blue" style="margin: 240px 0 240px 0">
                                    <div class="card-body">
                                        <div class="text-8 ">
                                            Support & Guidance
                                        </div>
                                        <div class="text-5">
                                            RCH London offers world-class research support services.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    @isset($page)
                        @foreach ($pageParts as $item)
                            @include('theme.prt.include.pageItem')
                        @endforeach
                    @endisset
                </div>
            </div>
        @elseif ($page->id == 13 || $page->id == 9)
            <div class="col-md-12">
                <div class="">
                    @isset($page)
                        @foreach ($pageParts as $item)
                            @include('theme.prt.include.pageItem')
                        @endforeach
                    @endisset
                </div>
            </div>
        @elseif($page->id == 2)
            <div class="col-md-2">
            </div>
            <div class="col-md-7">
                <div class="card pt-3">
                    <div class="card-header h3 text-dark">
                        Contact Us
                    </div>
                    <div class="card-body text-dark">
                        @include('alerts.alerts')

                        <form action="{{ route('welcome.contactUs.submit') }}" method="post">
                            @honeypot
                            @csrf
                            <div class="form-group">
                                <label for="">Your Name</label>
                                <input type="text" class="form-control" name="forename" required>
                            </div>
                            {{-- <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="surname" required>
                </div> --}}
                            <div class="form-group">
                                <label for="">Your Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            {{-- <div class="form-group">
                    <label for="">Subject</label>
                    <select name="subject" class="form-control" id="">
                        <option value="" selected disabled>Select one</option>
                        <option>Council Shop</option>
                        <option>Course</option>
                        <option>CPD</option>
                        <option>Events</option>
                        <option>Examinations</option>
                        <option>Finance</option>
                        <option>GDPR</option>
                        <option>Library</option>
                        <option>Marketing</option>
                        <option>Media/Press</option>
                        <option>Membership</option>
                        <option>e-Learning</option>
                        <option>Subscription</option>
                        <option>Website and Log in</option>
                        <option>Other</option>
                    </select>
                </div> --}}
                            <div class="form-group">
                                <label for="">Subject</label>
                                <input type="text" class="form-control" name="subject">
                            </div>
                            <div class="form-group">
                                <label for="">Message</label>
                                <textarea class="form-control" name="message"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success px-5"> <i class="fa fa-paper-plane"></i> Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row pt-3">
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Contact Details</h3>
                            </div>
                            <div class="card-body">
                                
                        <div>
                            <b>Trip Beyond</b>
                            <address>
                                <i class="fas fa-map-marker-alt"></i> Bangladesh
                                <br>
                                32/26, Rupnagar, Pallabi, Mirpur, Dhaka 1216.
                                <br> <br>
                                <i class="fas fa-map-marker-alt"></i> USA
                                <br>
                                555 E. Washington Avenue Sunnyvale, California 94086
                            </address>
                        </div>
                        <div>
                            <i class="fas fa-phone"></i> Phone : +1 925-391-0559
                            <br> <br>
                            <i class="fas fa-phone"></i> Hotline : +8801676930540
                            <br> <br>
                            <div>
                                <i class="far fa-envelope-open"></i> info@trip-beyo9nd.com
                            </div>
                            <br>
                            <div>
                                We would be more happy to help you! Knock us on Messenger anytime or Call our Hotline (Sat –
                                Fri; 10AM – 10PM).
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($page->id != 2)
                    <div class="col-md-3 pr-5">
                        @include('theme.prt.course.parts.pageSidebar')
                    </div>
                @endif
            @else
                @if ($page->id == 2)

                @else
                    <div class="col-md-9">
                        <div class="ml-3">
                            @isset($page)
                                @foreach ($pageParts as $item)
                                    @include('theme.prt.include.pageItem')
                                @endforeach
                            @endisset
                        </div>
                        {{-- <div>
        @if ($page->id == 1)
            <div class="container text-center py-4">
                <b>ACADEMIC VARIFICATION</b> <a href="{{ route('welcome.courseVarification') }}">click here</a>
            </div>
        @endif
    </div> --}}
                    </div>
                    <div class="col-md-3 pr-5">
                        @include('theme.prt.course.parts.pageSidebar')
                    </div>
                @endif
        @endif
    </div>


@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#sloganModal').modal('show')
        })
    </script>
@endpush
