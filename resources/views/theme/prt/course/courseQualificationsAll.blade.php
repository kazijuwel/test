<div>

</div>
<div class="container py-2 mt-2">
    <div class="col-md-12 align-self-center p-static order-2 text-center">
        <h2 class="w3-text-dark-gray my-4"><b>ALL @if(isset($mode)) {{strtoupper(Str::plural($mode))}} @else COURSES @endif</b></h2>
    </div>
    @if(isset($mode))
    <div class="row mt-2 pt-3 mb-5 pb-3">
        @foreach ($courses as $course)
        <div class="col-md-6 col-lg-4 mb-5 mb-1 appear-animation w3-border-top" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">

            <div class="w3-card-4 card- mt-3 w3-round-large w3-white" style="height: 300px; position: relative;">
              <a href="{{route('welcome.courseDetails',$course)}}">
                <img class="card-img-top"  src="{{ route('imagecache',['template'=>'crspsm', 'filename'=>$course->usliveFi()]) }}" alt="Card Image">
              </a>
                <div class="card-body p-2">
                  <a href="{{route('welcome.courseDetails',$course)}}">
                    <h4 class="card-title mb-1 text-4 font-weight-bold" style="min-height: 30px;">{{$course->title}} </h4>
                    {{-- <p class="card-text">{{custom_title($course->excerpt,45)}}</p> --}}
                  </a>
                    {{-- <a href="{{route('welcome.courseDetails',$course)}}" class="read-more text-color-primary font-weight-semibold text-2 mb-2 text-center">read more <i class="fas fa-angle-right position-relative top-1 ml-1"></i></a> --}}
                </div>
                {{-- <div class="w3-blue w-100 p-3 d-flex justify-content-between" style="border-radius: 0px 0px 8px 8px; position: absolute; bottom: -10px;">
                  <span class="text-white h5 m-0">{{ $course->topics->count() }} Lessons</span>
                  <span class="w3-text-aqua"> {{ $course->course_credit ? 'Credit:'.$course->course_credit : 'Free' }}</span>
                </div> --}}
            </div>
        </div>
        @endforeach



    </div>
    @else
    @foreach ($subjects->chunk(2) as $sub2)
      <div class="row">
        @foreach($sub2 as $subject)
          <div class="col-sm-6">
            <div class="w3-card mb-4">
              <div class="box box-widget w3-white">
                <div class="box-header w3-leftbar w3-border-blue">
                  <h3 class="box-title pl-2 pt-2">{{$subject->title}} </h3>
                </div>
                <div class="box-body pt-0 pr-2">
                  <div class="row">
                    <div class="col-sm-6 w3-panel">
                        @php
                            $course = $subject->courses()->latest()->first();
                        @endphp
                        <a class="text-muted" style="text-decoration:none;" href="{{route('welcome.courseDetails',$course)}}">
                            <div style="background-color: #f1f1f1!important;" class="ml-2 mb-2">
                                <img class="img-responsive" width="100%" src="{{ route('imagecache',['template'=>'crspsm', 'filename'=>$course->usliveFi()]) }}" alt="{{$course->title}}">
                                <div class="w3-container">
                                    <p style="font-weight: bold;font-size: 16px; color: black; margin-top:10px">{{custom_title($course->title,25)}}</p>
                                    <p class="w3-text-black" style="line-height: 20px">{{custom_title($course->excerpt,45)}}</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 w3-panel pl-4">
                      @foreach ($subject->courses()->latest()->skip(0)->take(6)->get() as $course)
                      <div class="attachment-block clearfix">
                        <a href="{{route('welcome.courseDetails',$course)}}">
                          <img style="width: 50px;" src="{{ route('imagecache',['template'=>'crspsm', 'filename'=>$course->usliveFi()]) }}" alt="cimg">

                          <div class="attachment-pushed" style="margin-top: -35px; margin-left: 60px;">
                            <h4 style="font-size: 14px;">{{$course->title}}</h4>
                          </div>
                        </a>
                      </div>
                      @endforeach
                      @if($subject->courses->count() >6)
                      <small class="w3-small"><a href="{{route('welcome.allCoursesBySubject',$subject)}}">All Courses</a></small>
                      @endif
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
        @endforeach
      </div>
    @endforeach
    @endif


</div>
