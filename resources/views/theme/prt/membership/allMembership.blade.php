@extends('theme.prt.layouts.prtMaster')

@section('title')
ALL @if(isset($mode)) {{strtoupper(Str::plural($mode))}} @else COURSES @endif | {{ env('APP_NAME_BIG') }}
@endsection
@section('meta')
@endsection

@push('css')
<style>
    .post:hover{
        padding: 30px 5px !important;
        background-color: rgba(199, 104, 60, 0.966) !important;
        color: white !important;
    }
    .post:hover .text-hover{
        color: white !important;
    }
</style>
@endpush

@section('contents')

 <section class="p-0 m-0" style="min-height: 300px;background: #ddd;">
    <div style="width: 100%; min-height: 400px; background: url({{ asset('img/page/MedicalDoctor-04.jpg') }}) no-repeat center; background-size: 100%">

    </div>
    <div class="container pb-5">
    <div class="py-4">
        <div class="text-center text-dark h1">
            BECOME A MEMBER
        </div>
        <div class="text dark text-4">
            RCH London supports members and serves humanity. <br>
At RCH London, we support our members at every stage of their professional journey. Join RCH LONDON today and get the resources you need to help you develop new skills, deepen your knowledge, and strengthen your professional identity.
        </div>
    </div>
    <div class="row">

        @foreach ($memberships as $membership)
        <div class="col-md-4 col-sm-6 p-1 mt-3">
            <div class="card rounded">
                <article class="post post-medium border-0 p-2 rounded w3-hover-shadow">
                    <div class="post-image text-center">
                        <a href="{{ route('welcome.singleMembership', [$membership->id, Str::slug($membership->title) ]) }}" class="text-center">
                            <img style="max-width: 100%" src="{{ asset($membership->fi()) }}" class="img-fluid- m-auto img-thumbnail- img-thumbnail-no-borders- -rounded-0" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <a href="{{ route('welcome.singleMembership', [$membership->id, Str::slug($membership->title) ]) }}">
                            <h2 class="text-hover font-weight-semibold text-5 line-height-6 mt-3 mb-2">{{ Str::limit($membership->title, 40, '...') }}</h2>
                        </a>
                        {{-- <div class="memberDesc">{!! $membership->description !!}</div> --}}
                        <div class="post-meta d-flex">
                            <span class="d-block mt-2"><a href="{{ route('welcome.singleMembership', [$membership->id, Str::slug($membership    ->title) ]) }}" class="btn btn-xs btn-light text-1 text-uppercase w3-hover-blue">Read More</a></span>
                            {{-- <span class="d-block mt-2"><a href="{{ route('user.checkoutMembership', [$membership->id ]) }}" class="btn btn-xs btn-primary text-1 text-uppercase w3-hover-blue">Become A Member</a></span>                             --}}
                            <span class="d-block mt-2"><a href="{{ route('welcome.singleMembership', [$membership->id, Str::slug($membership->title) ]) }}" class="btn btn-xs btn-primary text-1 text-uppercase w3-hover-blue">Become A Member</a></span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        @endforeach

    </div>

     {{$memberships->render()}}

    </div>

 </section>
@endsection

@push('js')
@endpush
