<div class="container py-2 mt-2">
    <div class="col-md-12 align-self-center p-static order-2 text-center">
        <h2 class="w3-text-dark-gray my-4"><b>All Courses of {{ucfirst($subject->title)}}</b></h2>
    </div>
    @if(isset($subject))
    <div class="row mt-2 pt-3 mb-5 pb-3">
        @foreach ($courses as $course)                

        <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
            
            <div class="w3-card card mt-3">
                <img class="card-img-top"  src="{{ route('imagecache',['template'=>'crspsm', 'filename'=>$course->usliveFi()]) }}" alt="Card Image">
                <div class="card-body p-2">
                    <h4 class="card-title mb-1 text-4 font-weight-bold" style="min-height: 65px;">{{$course->title}} </h4>
                    <p class="card-text">{{custom_title($course->excerpt,45)}}</p>
                    <a href="{{route('welcome.courseDetails',$course)}}" class="read-more text-color-primary font-weight-semibold text-2 mb-2 text-center">View @if(isset($course->course_mode)) {{ucfirst($course->course_mode)}} @else COURSE @endif <i class="fas fa-angle-right position-relative top-1 ml-1"></i></a>
                </div>
            </div>
        </div>
        @endforeach



    </div>
    
    @endif
  
   
</div>