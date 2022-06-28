@extends('frontend.layouts.app')

@section('content')

<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">   
        <div class="col-lg-3 text-center text-lg-left">
                <a href="{{ route('shops.create') }}" class="fw-600 h4 text-reset">{{ translate('Current Job Cercular')}}</a>
            </div>

            <div class="col-lg-3 text-center text-lg-left">
                <a href="{{ route('jobs.internship.create') }}" class="fw-600 h4 text-reset">{{ translate('Internship')}}</a>
            </div>

            <div class="col-lg-3 text-center text-lg-left">
                <a href="{{ route('shops.create') }}" class="fw-600 h4 text-reset">{{ translate('Service Provider')}}</a>
            </div>

            <div class="col-lg-3 text-center text-lg-left">
                <a href="{{ route('jobs.join.create') }}" class="fw-600 h4 text-reset">{{ translate('Join with US')}}</a>
            </div>
           
        </div>
    </div>
</section>

@endsection