@extends('frontend.layouts.app')

@section('content')

<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">{{ translate('')}}</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="{{ route('contuct_us.create') }}">"{{ translate('Contact Us')}}"</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="pt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-md-8 mx-auto">
                <form id="shop" class="" action="{{ route('contuct_us.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                        <div class="bg-white rounded shadow-sm mb-3"> 
                            <div class="fs-15 fw-600 p-3 border-bottom">
                                {{ translate('Contact Us')}}
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
                                    <label>{{ translate('Comments')}} <span class="text-primary">*</span></label>
                                    <textarea type="" rows="8" class="form-control{{ $errors->has('comments') ? ' is-invalid' : '' }}" placeholder="{{  translate('Comments') }}" name="comments"></textarea>                                   
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