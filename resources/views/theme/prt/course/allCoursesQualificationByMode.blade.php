@extends('theme.prt.layouts.prtMaster')

@section('title')
ALL @if(isset($mode)) {{strtoupper(Str::plural($mode))}} @else COURSES @endif | {{ env('APP_NAME_BIG') }}
@endsection
@section('meta')
@endsection

@push('css')

@endpush

@section('contents')

 <section class="p-0 m-0" style="min-height: 300px;background: #ddd;">


    @if ($mode == 'qualification')
    <div class="container">
        @include('theme.prt.course.courseQualificationsAll')
    @else
    <div class="container-fluid w3-white">
        @include('theme.prt.course.parts.courseAll')
    @endif

     {{$courses->render()}}

    </div>

 </section>
@endsection

@push('js')
@endpush
