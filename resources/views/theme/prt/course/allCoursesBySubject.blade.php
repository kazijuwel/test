@extends('theme.prt.layouts.prtMaster')

@section('title')
@endsection
@section('meta')
@endsection

@push('css')

@endpush

@section('contents')
 
 <section class="p-0 m-0" style="min-height: 300px;background: #ddd;">

    <div class="container">
        
    @include('theme.prt.course.parts.allCoursesBySubject')

     {{$courses->render()}}
 
    </div>
     
 </section>
@endsection

@push('js')
@endpush