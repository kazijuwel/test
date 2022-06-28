@extends('user.porto.layouts.userLayoutMaster')
@push('css')
    <style>
        #newBG {
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-color: gray;
            height: 100%;
            opacity: .8;
        }

        /* .col-lg-12 {
                padding-left: 50px;
                padding-right: 50px !important;
            } */

    </style>
@endpush
@section('content')
    <div role="main" id="newBG" class="main margin-start"
        style="background-image: url('https://www.okler.net/previews/porto/8.0.0/img/blog/wide/blog-11.jpg');">
        <div class="container" style="overflow: hidden">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card border-0 border-radius-2 my-5">
                        @include('alerts.alerts')
                        <h1 class="m-auto  text-center font-weight-bold border-bottom py-2 border-dark border-2">Become A
                            Partner</h1>
                        <div class="card-body">
                            <form class="contact-form" action="{{ route('welcome.addNewPartner') }}" method="POST"
                                novalidate="novalidate">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label class="required font-weight-bold text-dark text-2">Username</label>
                                        <input type="text" value="{{ old('Username') }}" data-msg-required="Username....."
                                            class="form-control" name="username" placeholder="Username">
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="password" class="required font-weight-bold text-dark text-2">Login
                                            Password (Main Website)</label>
                                        <input type="password" value="{{ old('password') }}" placeholder="password."
                                            class="form-control" name="password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="password_confirmation"
                                            class="required font-weight-bold text-dark text-2">Confirm Password</label>
                                        <input type="password" value="{{ old('password_confirmation') }}"
                                            placeholder="Confirmation Password" class="form-control"
                                            name="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="title" class="required font-weight-bold text-dark text-2">Title</label>
                                        <input type="text" value="{{ old('title') }}"
                                            data-msg-required="Please enter your title" placeholder="Title"
                                            class="form-control" name="title">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="description" class="required font-weight-bold text-dark text-2">Company
                                            Description</label>
                                        <input type="text" value="{{ old('description') }}"
                                            data-msg-required="Please enter your description" placeholder="description"
                                            class="form-control" name="description">
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="password" class="required font-weight-bold text-dark text-2">Company
                                            Code / Company Username</label>
                                        <input type="text" value="{{ old('company_code') }}"
                                            data-msg-required="Please enter your company_code." placeholder="Company Code."
                                            class="form-control" name="company_code">
                                        @error('company_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="mobile"
                                            class="required font-weight-bold text-dark text-2">Mobile</label>
                                        <input type="text" value="{{ old('mobile') }}"
                                            data-msg-required="Please enter your Mobile." placeholder="mobile."
                                            class="form-control" name="mobile">
                                        @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="email" class="required font-weight-bold text-dark text-2">Email</label>
                                        <input type="email" value="{{ old('email') }}"
                                            data-msg-required="Please enter your email address." placeholder="E-mail."
                                            class="form-control" name="email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="address"
                                            class="required font-weight-bold text-dark text-2">Sddress</label>
                                        <textarea name="address" id="address" cols="30" rows="2" class="form-control"
                                            placeholder="Address">

                                                </textarea>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="zip_code" class="required font-weight-bold text-dark text-2">Zip
                                            Code</label>
                                        <input type="text" value="{{ old('zip_code') }}"
                                            data-msg-required="Please enter your Zip Code" placeholder="Zip Code"
                                            class="form-control" name="zip_code">
                                        @error('zip_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="city" class="required font-weight-bold text-dark text-2">City</label>
                                        <input type="text" value="{{ old('city') }}"
                                            data-msg-required="Please enter your City" placeholder="City."
                                            class="form-control" name="city">
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="country"
                                            class="required font-weight-bold text-dark text-2">Country</label>
                                        <input type="country" value="{{ old('country') }}"
                                            data-msg-required="Please enter your Country" placeholder="Country"
                                            class="form-control" name="country">
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit" class="btn btn-primary btn-modern"
                                            data-loading-text="Loading...">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@push('js')


@endpush
