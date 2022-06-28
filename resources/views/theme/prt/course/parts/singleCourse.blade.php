
<style>
  .course-caption {

    margin-top: -100px;
}


.content{
    height: 120px !important;
}

@media only screen and (max-width: 600px) {
  .course-caption {
    margin-top: -20px;

  }
  .text-6{
    font-size: 18px !important;
  }

  .content{
      height: 30px !important;
  }
}
@media only screen and (max-width: 600px) {
  .nav-item{
    width: 100% !important;
    margin: 2px 0;
    display: none;
  }

}

</style>

{{-- <section class="page-header page-header-modern page-header-background page-header-background-md overlay- overlay-color-dark- overlay-show overlay-op-7-" style="background-image: url({{asset('images/topbanner.jpg')}});">
                    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <div class="row">
                    <div class="col-md-12 align-self-center p-static order-2">
                        <div class="overflow-hidden pb-2">
                            <h1 class="  font-weight-bold text-9 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{$course->title}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

    <div class="content">


        @php
        $rand = rand(1,3);
        $topb = 'img/topbanner'. $rand . '.jpg';
        @endphp
        {{-- <img class="img-fluid" src="{{asset($topb)}}" alt="Subject"> --}}
    </div>

 <div class="container appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="300">
     <div class="course-caption">
        <div class="row">
            <div class="col-md-7">
                <div class="w3-card rounded">

                <div class="card card-default">
                    <div class="card-body">
                          <div class="row">
                              <div class="col-sm-7">

                                <img src="{{ route('imagecache',['template'=>'cplg', 'filename'=>$course->usliveFi()]) }}" class="img-fluid rounded w-100" alt="img">

                                <h1 class="  font-weight-bold text-6"  >{{$course->title}}</h1>

                          <p>{!! $course->excerpt !!}</p>

                              </div>
                              <div class="col-sm-5">


                              </div>
                          </div>


                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card m-auto">
                    <div class="w3-border w3-container w3-border-light-gray rounded">


                        <h3 class="text-primary">Course Key Points</h3>


          <p class="">
              <b>Course Code:</b> <span class="badge badge-primary">{{ $course->course_code }}</span> <br>
              <b>Subject Area:</b> {{$course->subject ? $course->subject->title : ''}} <br>
              <b>Duration:</b> {{ $course->duration_one }} months
            {{ $course->duration_two ? ' / ' . $course->duration_two . ' months' : '' }} {{ $course->duration_three ? ' / ' . $course->duration_three . ' months' : '' }} <br>
            <b>Mode:</b> {{ ucfirst($course->course_mode) }} <br>
            <b>Credit:</b> {{ ucfirst($course->course_credit) }}

          </p>

          @if($course->course_brochure)
          <p>
            <a class="btn btn-block btn-primary box-shadow-2 btn-lg mb-3 text-center" href="{{ asset($course->brochureLink()) }}" download style="background: #0077d6;padding: 5px;color:#fff;text-align: left;"><i class="fa fa-download"></i> Download Brochure</a>
          </p>

          @endif

          {{-- @if($course->syllabus_file)
          <p>
            <a class="btn btn-block btn-primary box-shadow-2 btn-lg mb-3" href="{{ asset($course->syllabusLink()) }}" download style="background: #0077d6;padding: 5px;color:#fff;text-align: left;"><i class="fa fa-download"></i> Download Syllabus</a>
          </p>
          @endif --}}


          @auth

          <div class="text-center mb-3">

    @if ($course->packageable)

    {{-- <style type="text/css">
    html {
    scroll-behavior: smooth;
    }
    </style> --}}

    <a class="btn btn-lg  w3-deep-orange btn-block w3-hover-shadow" href="#coursepackagearea">Take Containing Package</a>

    @else
    <button class="btn btn-lg  w3-deep-orange btn-block"   data-toggle="modal" data-target="#modalBuyCredit" >Take this {{ Str::ucfirst($course->course_mode) }}</button>




    {{-- modal is in prt\course\singleCourseDetails.blade.php --}}

    @endif
    </div>

                      @else

                      <div class="text-center mb-3">

                      <a class="btn btn-lg  w3-deep-orange btn-block w3-hover-shadow" href="{{ route('welcome.applyNow') }}">
                        {{-- Apply now to Take This Course --}}
                        Enroll Now
                    </a>
                      </div>

                      @endauth

            </div>
                  </div>
            </div>
        </div>
     </div>
 </div>
{{--
 <section class=" w3-container  with-button-arrow call-to-action-in-footer w3-light-gray py-4">
                    <div class="container text-center">

                      <div class="row">
                        <div class="col-sm-3">

                          <div>

                           <p class="">
                            <b>
                         Course Code

                           </b> <br>
                        <span class="badge badge-primary">{{ $course->course_code }}</span></p>
                          </div>

                        </div>
                        <div class="col-sm-3">
                          <div>

                           <p class="">
                            <b>
                         Course Assesments

                           </b> <br>
                       {{ $course->assesments }}</p>
                          </div>

                        </div>
                        <div class="col-sm-3">

                          <div>

                           <p class="">
                            <b>
                         Accreditation
                           </b> <br>
                       {{ $course->accreditation }}</p>
                          </div>


                        </div>
                        <div class="col-sm-3">


                          <div>

                           <p class="">
                            <b>
                         Duration

                           </b> <br>
                        {{ $course->duration_one }} months
              {{ $course->duration_two ? ' / ' . $course->duration_two . ' months' : '' }} {{ $course->duration_three ? ' / ' . $course->duration_three . ' months' : '' }}</p>
                          </div>

                        </div>
                      </div>



                    </div>
                </section>

<br> <br> <br>

<div class="container ">



    <div class="row ">
        <div class="col-md-5 mb-4 mb-md-0" id="desc">
             <div class="overflow-hidden">
                <h2 class="text-color-primary font-weight-normal text-5  mb-0" > <strong class="font-weight-extra-bold">Description</strong></h2>
            </div>

            <p  class="text-justify" style="white-space: pre-line;">{!! $course->description  !!}</p>



        </div>
        <div class="col-md-5">

            <div class="overflow-hidden">
                <h2 class="text-color-primary font-weight-normal text-5  mb-0" > How To Apply </h2>
            </div>


            <p class="text-justify" style="white-space: pre-line;">{!! $course->how_to_apply  !!}</p>


        </div>
        <div class="col-md-2">
          @if ($course->face_to_face == true)
          <a href="#" class="btn btn-primary btn-block" href="{{ route('welcome.faceToFace', $course) }}" >Face to Face</a>

            @endif
        </div>
    </div>

</div> --}}

{{-- start --}}

<div class="container pt-4">
    <div class="h4">
        The material includes four main knowledge areas:
    </div>
    <div class="accordion" id="accordionExample">
        @foreach ($course->descriptionPoints as $point)

        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left w3-large" type="button" data-toggle="collapse" data-target="#collapse_{{ $point->id }}" aria-expanded="true" aria-controls="collapseOne">
                {{ $loop->iteration }}. {{ $point->title }}
              </button>
            </h2>
          </div>

          <div id="collapse_{{ $point->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body w3-medium text-dark">
              {!! $point->description !!}
            </div>
          </div>
        </div>
        @endforeach

      </div>

      <div class="py-3 text-dark">
        These can be purchased as a package or as individual modules.
      </div>
      <div class="h4 pt-3 text-dark">
        Fees
      </div>
      <div class="py-3 text-dark">
          {{ $course->course_credit }} per course
      </div>
</div>

{{-- end --}}




@push('js')
@endpush

