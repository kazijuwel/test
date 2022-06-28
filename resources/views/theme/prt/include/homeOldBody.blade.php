
{{-- courses slider --}}
<section class="section section-text-light section-background section-center section-overlay-opacity- section-overlay-opacity-gradient- m-0 p-1 pb-4"
style="background: #ededed;">
{{-- <h1 class="mb-2 p-0 w3-text-gray">TOP COURSES</h1> --}}
<div class="col-md-12 align-self-center p-static order-2 text-center">
  <h2 class="w3-text-dark-gray my-4"><b>TOP COURSES</b></h2>
</div>
<div class="container">
  <div class="row">            
      @foreach ($featuredCourses as $course)             
        <div class="col-sm-6"> 
            <a href="{{route('welcome.courseDetails',$course)}}" style="text-decoration: none;">
          <div class="w3-card w3-hover w3-white p-2 mb-3">
              <div class="media">
                  <img class="img-fluid rounded mr-3" src="{{ route('imagecache',['template'=>'ppsm', 'filename'=>$course->usliveFi()]) }}" alt="cimg">
                  <div class="media-body">
                  <h4 class="text-3 m-0 text-left w3-text-dark-gray"><b>{{ucfirst($course->title)}}</b></h5>
                      <h6 class="text-left text-3 m-0 w3-text-gray" >{{custom_title($course->excerpt,45)}}</h6>
                  </div>
              </div>
          </div>
          </a>
      </div>
        @endforeach
  </div>
</div>
</section>
{{-- ./courses slider --}}

{{-- Package section --}}


<section class="m-0 pb-3">
<div class="container">
  
  <br>
  <div class="col-md-12 align-self-center p-static order-2 text-center">
      <h2 class="w3-text-dark-gray my-4"><b>MEMEBERSHIP PACKAGES</b></h2>
  </div>
  <div class="row">
      @foreach ($packages as $pcg)
      <div class="col-md-6 mt-3">
          <div class="pricing-block border rounded w3-card">
              <div class="row">
                  <div class="col-lg-6">
                      <h2 class="font-weight-semibold text-4 line-height-1 mb-3">Package for {{ucfirst($pcg->package_for)}} </h2>
                      <hr>
                      <div class="row">
                          <div class="col-lg-12">
                              <ul class="list list-icons text-1 list-primary mb-0">
                                  <li><i class="icons fas fa-check-square text-color-primary"></i> Total Credits <b>{{number_format($pcg->no_of_credits)}}</b></li>
                                  <li><i class="icons fas fa-check-square text-color-primary"></i> Total no of Course <b>{{number_format($pcg->no_of_courses)}}</b></li>
                              </ul>
                          </div>
                          <div class="col-lg-12">
                              <ul class="list list-icons text-1 list-primary mb-0">
                                  
                                  <li ><i class="icons fas fa-check-square text-color-primary"></i> Package Duration <b>{{$pcg->duration}} Days.</b></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <h4 class="font-weight-bold">{{$pcg->title}}</h4>
                      <div class="plan-price mb-4">
                          <span class="price"><span class="price-unit">£</span>{{$pcg->price}}</span>
                          
                      </div>
                      {{-- <a href="#" class="btn btn-primary btn-modern btn-xl">Sign Up</a> --}}
                      <a href="{{route('welcome.packageDetails',$pcg)}}"
                          class="btn btn-dark btn-sm btn-modern mb-1">View details</a>
                      <a href="{{route('user.checkoutPackage',$pcg)}}" class="btn btn-success btn-sm btn-modern mt-1">
                          Buy Now
                      </a>
                  </div>
              </div>
          </div>
      </div>
      @endforeach
  </div>
</div>
</section>
<br>
{{-- /package --}}

{{-- courses section --}}
<div style="background: #bfbfff;">
@include('theme.prt.course.courseQualificationsAll')
</div>
{{-- courses sections --}}

<div class="container py-2 mt-4">
<div class="heading heading-border heading-middle-border heading-middle-border-center heading-border-xl">
      <h2 class="font-weight-normal">LATEST <strong class="font-weight-extra-bold">NEWS</strong></h2>
</div>
<div class="row pt-1 mb-5 pb-3">
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
      <h2 class="font-weight-normal">SEMINARS & <strong class="font-weight-extra-bold">EVENTS</strong></h2>
  </div>
  
  <div class="tabs tabs-bottom tabs-center tabs-simple">
      <ul class="nav nav-tabs">
          <li class="nav-item active">
              <a class="nav-link" href="#upcomingEvent" data-toggle="tab">Upcoming Events</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#pastEvent" data-toggle="tab">Past Seminars & Events</a>
          </li>
      </ul>
      <div class="tab-content">
          <div class="tab-pane active" id="upcomingEvent">
              <div class="text-center">
                  <h4>Upcoming</h4>
              </div>
              <div class="row mt-2 pt-3 mb-5 pb-3">
                  @foreach ($events->shuffle() as $event)                

                  <div class="col-md-6 col-lg-4 mb-5 mb-lg-0 " data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">

                  <div class="w3-card card- mt-3 ">
                  <div class="w3-display-container">

                  <img class="card-img-top"  src="{{ route('imagecache',['template'=>'crspsm', 'filename'=>$event->usliveFi()]) }}" alt="Card Image">
                  <div class="w3-padding w3-display-bottomleft">
                  <div class="tag w3-deep-orange px-2">
                  {{ucfirst($event->type)}}
                  </div>
                  </div>
                  </div>
                  <div class="card-body- p-2">
                  <h4 class="card-title mb-1 text-4 font-weight-bold" style="min-height: 65px;">{{custom_title($event->title,25)}} <br> <span class="w3-tiny">{{ucfirst($event->type)}} on : {{Carbon\Carbon::parse($event->event_started_at)->format('d-m-Y')}}</span></h4>
                  <p class="card-text">{{custom_title($event->excerpt,45)}}</p>
                  <a href="{{route('welcome.postDetails',$event)}}" class="read-more text-color-primary font-weight-semibold text-2 mb-2 text-center">View  Details <i class="fas fa-angle-right position-relative top-1 ml-1"></i></a> 
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
                  @if($pastEvents)
                      @foreach ($pastEvents as $event)                

                          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0 " data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">

                              <div class="w3-card card- mt-3 ">
                                  <div class="w3-display-container">

                                      <img class="card-img-top"  src="{{ route('imagecache',['template'=>'crspsm', 'filename'=>$event->usliveFi()]) }}" alt="Card Image">
                                      <div class="w3-padding w3-display-bottomleft">
                                          <div class="tag w3-deep-orange px-2">
                                              {{ucfirst($event->type)}}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-body- p-2">
                                      <h4 class="card-title mb-1 text-4 font-weight-bold" style="min-height: 65px;">{{custom_title($event->title,25)}}<br> <span class="w3-tiny">{{ucfirst($event->type)}} held on {{Carbon\Carbon::parse($event->event_started_at)->format('d-m-Y')}}</span></h4>
                                      <p class="card-text">{{custom_title($event->excerpt,45)}}</p>
                                      <a href="{{route('welcome.postDetails',$event)}}" class="read-more text-color-primary font-weight-semibold text-2 mb-2 text-center">View  Details <i class="fas fa-angle-right position-relative top-1 ml-1"></i></a> 
                                  </div>
                              </div>
                          </div>

                          @if($loop->iteration == 3)
                              @break
                          @endif
                      @endforeach
                  @else 
                  <div class="col-md-6 col-lg-4 mb-5 mb-lg-0 ">
                      <p class="w3-red"> No Events or Seminer Held Yet</p>
                  </div>
                  @endif
              </div>
          </div>
      </div>
  </div>
  <div class="text-center mt-n3">
      <a class="w3-btn btn-main-bg w3-round btn" href="{{route('welcome.allSeminars')}}">See All</a>
  </div>
</div>
</section>


<br>

<section class="call-to-action call-to-action-default" style="background: #15324f">
<div class="container">
  <div class="row">
      <div class="col-sm-9 col-lg-9">
          <div class="call-to-action-content">
              @auth
              <h2 class="w3-text-white">
                  The New Era  focuses on  <br>
                  <span>
                      <small>
                          better educational programmes, as well as providing further opportunities for healthcare professionals in practice.

                      </small>
                  </span>
              </h2>
              @else 
              <h2 class="w3-text-white">
                  Become a RCH London Member <br>
                  <span>
                      <small>
                          There are a number of different ways for you to become a member of the RCH London depending on where you are in your career.

                      </small>
                  </span>
              </h2>
              @endauth  
          </div>
      </div>
      <div class="col-sm-3 col-lg-3">
          <div class="call-to-action-btn">

              @auth
              <a href="{{route('home')}}" class="btn btn-modern p-4  btn-primary">My Dashboard</a><span class="arrow hlb d-none d-md-block" data-appear-animation="rotateInUpLeft" style="left: 110%; top: -40px;"></span>
              @else
              <a href="{{route('welcome.registrationOption')}}" class="btn btn-modern p-4 btn-primary">Join Today</a><span class="arrow hlb d-none d-md-block" data-appear-animation="rotateInUpLeft" style="left: 110%; top: -40px;"></span>
              @endauth
          </div>
      </div>
  </div>
</div>
</section>