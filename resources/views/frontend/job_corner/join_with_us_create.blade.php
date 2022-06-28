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
                <a href="{{ route('shops.create') }}" class="fw-600 h4 text-reset">{{ translate('Join with US')}}</a>
            </div>
           
        </div>
    </div>
</section>

<section class="pt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-md-8 mx-auto">
                <form id="shop" class="" action="{{ route('jobs.join.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                        <div class="bg-white rounded shadow-sm mb-3"> 
                            <div class="fs-15 fw-600 p-3 border-bottom">
                                {{ translate('Personal Info')}}
                            </div>
                            <div class="p-3">
                                <div class="form-group">
                                    <label>{{ translate('Your Name')}} <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{  translate('Name') }}" name="name">
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('Your Mobile Number')}} <span class="text-primary">*</span></label>
                                    <input type="" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" value="{{ old('mobile') }}" placeholder="{{  translate('Your Mobile Number') }}" name="mobile">
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('Your Email')}} <span class="text-primary">*</span></label>
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email">
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('Your Academic Qualification')}} <span class="text-primary">*</span></label>
                                    <textarea type="" class="form-control{{ $errors->has('academic_qualification') ? ' is-invalid' : '' }}" placeholder="{{  translate('Academic Qualification') }}" name="academic_qualification"></textarea>                                   
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('Your Job Experience')}} <span class="text-primary">*</span></label>
                                    <textarea type="" class="form-control{{ $errors->has('job_experience') ? ' is-invalid' : '' }}" placeholder="{{  translate('Job Experience') }}" name="job_experience"></textarea>                                   
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('Your Skills')}} <span class="text-primary">*</span></label>
                                    <textarea type="" class="form-control{{ $errors->has('skill') ? ' is-invalid' : '' }}" placeholder="{{  translate('Your Skills') }}" name="skill"></textarea>                                   
                                </div>
                                 <div class="form-group">
                                <label>{{ translate('Upload CV')}}</label>
                                <div class="custom-file">
                                    <label class="custom-file-label">
                                        <input type="file" class="custom-file-input" name="join_us_cv">
                                        <span class="custom-file-name">{{ translate('Choose File') }}</span>
                                    </label>
                                </div>
                            </div>
                            </div>
                        </div>
                  
                    
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary fw-600">{{ translate('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection