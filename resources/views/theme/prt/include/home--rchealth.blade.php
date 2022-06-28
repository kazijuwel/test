    <style>
        
          .slider-custom-caption {

    margin-top: -120px;    
    /*border: 1px solid #fff;*/
}

.owl-prev,.owl-next
{
    background: #000033 !important;
    /* background: #04252b !important; */

}

.slider-card-bg-color
{
    background: #00003398 !important;
    color: #fff !important;
}

  


@media only screen and (max-width: 600px) {
  .slider-custom-caption {
    margin-top: 0px;  

  }

  .slider-custom-caption h2
  {
    font-size: 19px !important;
  }


  .slider-custom-caption h4
  {
    font-size: 16px !important;
  }


  .text-6{
    font-size: 18px !important;
  }
  
}


    </style>


    <div class="z-index-1 appear-animation" data-appear-animation="fadeInDownShorter" data-appear-animation-delay="100">
                    <div class="owl-carousel owl-theme full-width owl-loaded owl-drag owl-carousel-init m-0 mb-4" data-plugin-options="{'items': 1, 'loop': true, 'nav': true, 'dots': false,
                    {{-- 'animateOut':'fadeOut', --}}
                     {{-- 'animateOut': 'slideOutLeft', 'animateIn': 'slideInRight', --}} 'autoplayHoverPause':false,  'autoplay':true, 'autoplayTimeout': 5000}">
                        <div>
                            <img src="img/h1.jpg" class="img-fluid" alt="">

                            <div class="row slider-custom-caption">

                            
                                <div class="col-md-12">

                                    <div class="container p-0">
                                        

                                    <div class="w3-card">


                                <div class="card w3-card-4 slider-card-bg-color">
                                    <div class="card-body py-1 pb-3 w3-animate-zoom">


                                        <div class="row">
                                            <div class="col-sm-9">

                                                <h2 class="w3-text-white pt-0">A New Era for Medical Professionals</h2>
                                        <h4 class="w3-text-white">Training the next generation not only benefits the individuals but is essential for the future success of the profession </h4>
                                                
                                            </div>
                                            <div class="col-sm-3">

                                                <div class="text-center">

                            <div class="d-none d-sm-block"><br> <br></div>
                                            <a style="background: #000052 !important;" class="  btn btn-xl btn-outline btn-light  w3-indigo btn-quaternary" href="{{route('welcome.registrationOption')}}"> <i class="far fa-check-circle"></i> Register Now</a>
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
                            <img src="img/h4.jpg" class="img-fluid" alt="">

                            <div class="row slider-custom-caption">
                
                                <div class="col-md-12">

                                     <div class="container p-0">

                                    <div class="w3-card m-lg-4">


                                <div class="card slider-card-bg-color">
                                    <div class="card-body py-1 pb-3">

                                        <div class="row">
                                            <div class="col-sm-9">

                                        <h2 class="w3-text-white pt-0">Fulfilling the needs of the profession</h2>
                                        <h4 class="w3-text-white">RCH London aims to make training and professional development more accessible </h4>

                                    </div>

                                        <div class="col-sm-3">
                                            

                                        <div class="text-center">
                                            <div class="d-none d-sm-block"><br> <br></div>
                                            <a style="background: #000052 !important;" class="  btn btn-xl btn-outline btn-light  w3-indigo btn-quaternary" href="{{route('welcome.registrationOption')}}"> <i class="far fa-check-circle"></i> Register Now</a>
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
                            <img src="img/h5.jpg" class="img-fluid" alt="">

                            <div class="row slider-custom-caption">
                             
                                <div class="col-md-12">

                                     <div class="container p-0">

                                    <div class="w3-card m-lg-4">


                                <div class="card slider-card-bg-color">
                                    <div class="card-body py-1 pb-3">

                                        <div class="row">
                                            <div class="col-sm-9">

                                        <h2 class="w3-text-white pt-0">The future of blended learning is bright</h2>
                                        <h4 class="w3-text-white">Royal College of Health London has built a strong and diverse international network of academics, alumni, students and partners </h4>

                                    </div>

                                    <div class="col-sm-3">
                                        

                                        <div class="text-center">
                                            <div class="d-none d-sm-block"><br> <br></div>
                                            <a style="background: #000052 !important;"  class="  btn btn-xl btn-outline btn-light  w3-indigo btn-quaternary" href="{{route('welcome.registrationOption')}}"> <i class="far fa-check-circle"></i> Register Now</a>
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
                </div>


 


{{-- courses section --}}
@include('theme.prt.course.courseQualificationsAll')
{{-- courses sections --}}

<div class="container py-2">
     <div class="heading heading-border heading-middle-border heading-middle-border-center heading-border-xl">
            <h2 class="font-weight-normal">LATEST <strong class="font-weight-extra-bold">NEWS</strong></h2>
        </div>
    <div class="row mt-2 pt-3 mb-5 pb-3">
        @foreach ($newses as $news)                

        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0 " data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
            
            <div class="w3-card card- mt-3 ">
                <div class="w3-display-container">
                    
                <img class="card-img-top"  src="{{ route('imagecache',['template'=>'crspsm', 'filename'=>$news->usliveFi()]) }}" alt="Card Image">
                <div class="w3-padding w3-display-bottomleft">
                    <div class="tag w3-deep-orange px-2">
                        News
                    </div>
                </div>
                </div>
                <div class="card-body- p-2">
                    <h4 class="card-title mb-1 text-4 font-weight-bold" style="min-height: 65px;">{{$news->title}} <br> <span class="w3-tiny">{{$news->created_at->toDateString()}}</span></h4>
                    <p class="card-text">{{custom_title($news->excerpt,45)}}</p>
                    <a href="{{route('welcome.postDetails',$news)}}" class="read-more text-color-primary font-weight-semibold text-2 mb-2 text-center">View  Details <i class="fas fa-angle-right position-relative top-1 ml-1"></i></a> 
                </div>
            </div>
        </div>

        @if($loop->iteration == 3)
        @break
        @endif
        @endforeach

    </div>

    <div class="text-center mt-n3">
        <a class="w3-btn btn-main-bg w3-round btn" href="{{route('welcome.allLatestNews')}}">See All News</a>
    </div>

   
</div>

<br>


<section>
    
    <div class="container">

        <div class="heading heading-border heading-middle-border heading-middle-border-center heading-border-xl">
            <h2 class="font-weight-normal">SEMINERS & <strong class="font-weight-extra-bold">EVENTS</strong></h2>
        </div>
        
        <div class="tabs tabs-bottom tabs-center tabs-simple">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#upcomingEvent" data-toggle="tab">Upcoming Events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#pastEvent" data-toggle="tab">Past Seminers & Events</a>
                                    </li>
                                     
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="upcomingEvent">
                                        <div class="text-center">
                                            <h4>Upcoming</h4>
                                        </div>


<div class="row mt-2 pt-3 mb-5 pb-3">
@foreach ($courses->shuffle() as $course)                

<div class="col-md-6 col-lg-4 mb-5 mb-lg-0 " data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">

<div class="w3-card card- mt-3 ">
<div class="w3-display-container">

<img class="card-img-top"  src="{{ route('imagecache',['template'=>'crspsm', 'filename'=>$course->usliveFi()]) }}" alt="Card Image">
<div class="w3-padding w3-display-bottomleft">
<div class="tag w3-deep-orange px-2">
Event
</div>
</div>
</div>
<div class="card-body- p-2">
<h4 class="card-title mb-1 text-4 font-weight-bold" style="min-height: 65px;">{{$course->title}} <br> <span class="w3-tiny">{{$course->created_at->toDateString()}}</span></h4>
<p class="card-text">{{custom_title($course->excerpt,45)}}</p>
<a href="" class="read-more text-color-primary font-weight-semibold text-2 mb-2 text-center">View  Details <i class="fas fa-angle-right position-relative top-1 ml-1"></i></a> 
</div>
</div>
</div>

@if($loop->iteration == 3)
@break
@endif
@endforeach

</div>
                                             

                                  
                                    </div>
                                    <div class="tab-pane" id="pastEvent">
                                        <div class="text-center">
                                            <h4>Past </h4>
                                        </div>


<div class="row mt-2 pt-3 mb-5 pb-3">
@foreach ($courses as $course)                

<div class="col-md-6 col-lg-4 mb-5 mb-lg-0 " data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">

<div class="w3-card card- mt-3 ">
<div class="w3-display-container">

<img class="card-img-top"  src="{{ route('imagecache',['template'=>'crspsm', 'filename'=>$course->usliveFi()]) }}" alt="Card Image">
<div class="w3-padding w3-display-bottomleft">
<div class="tag w3-deep-orange px-2">
Seminer
</div>
</div>
</div>
<div class="card-body- p-2">
<h4 class="card-title mb-1 text-4 font-weight-bold" style="min-height: 65px;">{{$course->title}} <br> <span class="w3-tiny">{{$course->created_at->toDateString()}}</span></h4>
<p class="card-text">{{custom_title($course->excerpt,45)}}</p>
<a href="" class="read-more text-color-primary font-weight-semibold text-2 mb-2 text-center">View  Details <i class="fas fa-angle-right position-relative top-1 ml-1"></i></a> 
</div>
</div>
</div>

@if($loop->iteration == 3)
@break
@endif
@endforeach

</div>
                                             
                               
                                    </div>
                                     
                                     
                                </div>
                            </div>
    </div>
</section>
 

<section
    class="section section-text-light section-background section-center section-overlay-opacity- section-overlay-opacity-gradient- m-0"
    style="background: #ededed;">
    <div class="row">
        <div class="col">
            <h1 class="mb-4 w3-text-gray">TOP COURSES</h1>
            <div class="owl-carousel owl-theme show-nav-title"
                data-plugin-options="{'items': 4, 'margin': 10, 'loop': true, 'autoplay': true, 'autoplayTimeout': 3000, 'nav': true, 'dots': false}">
                @foreach ($featuredCourses as $fc)
                <div>
                    <a href="{{route('welcome.courseDetails',$fc)}}" class="no-decoration">
                        <img alt="" class="img-fluid rounded"
                            src="{{ route('imagecache',['template'=>'crspsm','filename'=>$fc->usliveFi()]) }}">



                        <p style="color: #283891;" class="mt-2"><b>{{$fc->title}}</b></p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


<section class="parallax section section-text-light section-parallax section-center mt-0 mb-0" data-plugin-parallax
    data-plugin-options="{'speed': 1.5}" data-image-src="{{asset('prt/img/medicare/Gray-background-3.jpg')}}"
    style="height: 179% !important;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="owl-carousel owl-theme nav-bottom rounded-nav"
                    data-plugin-options="{'items': 1, 'autoplay': true, 'autoplayTimeout': 3000 }">
                    <div>
                        <div class="testimonial testimonial-style-2 testimonial-with-quotes mb-0">
                            <div class="testimonial-author">
                                <img src="img/clients/client-1.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                            <blockquote>
                                <p class="mb-0">sample test text lorem ipsum sample test text lorem ipsumsample test
                                    text lorem ipsumsample test text lorem ipsumsample test text lorem ipsumsample test
                                    text lorem ipsumsample test text lorem ipsumsample test text lorem ipsum</p>
                            </blockquote>
                            <div class="testimonial-author">
                                <p><strong class="font-weight-extra-bold">John Doe</strong><span>CEO & Founder</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="testimonial testimonial-style-2 testimonial-with-quotes mb-0">
                            <div class="testimonial-author">
                                <img src="img/clients/client-1.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                            <blockquote>
                                <p class="mb-0">sample test only sample test onlysample test onlysample test onlysample
                                    test onlysample test onlysample test onlysample test onlysample test onlysample test
                                    onlysample test onlysample test only</p>
                            </blockquote>
                            <div class="testimonial-author">
                                <p><strong class="font-weight-extra-bold">Danny Abraham</strong><span>CEO &
                                        Founder</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- end testimonial --}}




{{-- Package section --}}

@auth

<section class="m-0" style="background: #ccc;">
    <div class="container" id="buyPackage">
        <br>
        <br>
        <div class="col-md-12 align-self-center p-static order-2 text-center">
            <h1>ALL PACKAGES</h1>
        </div>
        <div class="row mb-5 pb-3">
            <?php
               $count = $packages->count();
            ?>
            @foreach ($packages as $pcg)

            <div class="col-md-6 col-lg-4 mb-5 mb-lg-0 appear-animation mt-4" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="400">
                <div class="card card-background-image-hover border-0"
                    style="background-image: url({{asset('storage/package/'.$pcg->file_name)}});">
                    <div class="card-body p-5">
                        {{-- <i class="icon-layers icons text-center text-color-primary text-10"></i> --}}
                        <h4 class="card-title mt-2-- mb-2 text-5 font-weight-bold text-center">{{$pcg->title}}</h4>
                        <p class="card-text text-center">Package for {{ucfirst($pcg->package_for)}}</p>
                        <p class="card-text text-center">Package Duration <b>{{$pcg->duration}} Days.</b></p>
                        <p class="card-text text-center">Total Credits <b>{{number_format($pcg->no_of_credits)}}</b></p>
                        <p class="card-text text-center">Price <b>£{{$pcg->price}}</b></p>
                        <div class="text-center">
                            <a href="{{route('welcome.packageDetails',$pcg)}}"
                                class="btn btn-dark btn-sm btn-modern">Details</a>
                            <a href="{{route('user.checkoutPackage',$pcg)}}" class="btn btn-success btn-sm btn-modern">
                                check out
                            </a>
                        </div>
                        {{-- @if($pcg->package_for =="individual") --}}


                        {{-- @endif --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@else

<section class="  mb-0 mt-0 p-lg-5 py-3  " style="background: rgba(0, 70, 127,1);color:white;">

    <div class="container">

        <div class="text-center">
            <h2 class="text-white">FREE TRIAL</h2>


        </div>

        <div class="row">
            <div class="col-sm-6 col-6 p-1">


                <a class="no-decoration" href="{{route('register')}}">
                    <div class="w3-card-4">



                        <section class="rounded p-1  bg-primary  mb-4">
                            <div class="col-12">
                                <div class="call-to-action-content text-center">
                                    <h3 class="text-white text-4">Trial as Individual</h3>
                                </div>
                            </div>

                        </section>
                    </div>
                </a>






            </div>
            <div class="col-sm-6 col-6 p-1">

                <a class="no-decoration" href="{{route('registerBusiness')}}">

                    <div class="w3-card-4">
                        <section class="rounded w3-deep-orange p-1 mb-4">
                            <div class="col-12">
                                <div class="call-to-action-content text-center">
                                    <h3 class="text-white text-4">Trial as Company</h3>
                                </div>
                            </div>

                        </section>
                    </div>
                </a>
            </div>


        </div>

        <div class="text-center">



            <p class="text-white text-4"><i>

                    Select your suitable courses from our large professional training modules.
                </i>
            </p>

            <p class="text-white text-3">Lot of options for convenience.</p>

        </div>
    </div>

</section>



@endauth


{{-- /package --}}
