@extends('theme.prt.layouts.prtMaster')

@section('title')
    {{ env('APP_NAME_BIG') }}
@endsection
@section('meta')
@endsection

@push('css')

@endpush

@section('contents')
    <div class="card">
        

        <div class="w3-center card-header p-0">
            <img src="{{ asset('img/trip/switzerland-hero.jpg') }}" style="height:425px;" width="85%" alt="">
        </div>
        <div class="card-body">
            @include('alerts.alerts')
            <div class="row">
                <div class="col-md-10 offset-1">
                    <div class="card" style="box-shadow: 5px 5px 13px 7px #cccccc;">
                        <div class="card-header" style="background: #317cc0;">
                            <h4 class="card-title w3-center w3-text-white"><b style="letter-spacing: 2.4px;">BECOME A PARTNER</b></h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('welcome.addNewPartner') }}" method="post" class="form-group">
                                @honeypot
                                @csrf
                                <div class="row">
                                    @if (!$user)
                                    <div class="col-md-6 form-group">
                                        <label for="Title">Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Enter Username"
                                            value="{{ old('title') }}" id="title">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="login_password">Login Password (Main Website)</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter login password"  id="password">
                                    </div>
                                    {{-- <div class="col-md-6 form-group">
                                        <label for="login_password">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password"  id="login_password">
                                    </div> --}}
                                    <div class="form-group col-md-6">
                                        <label for="password-confirm"
                                            >{{ __('Confirm Password') }}</label>
                
                                        
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required placeholder="Confirm password" autocomplete="new-password">
                                        
                                    </div>
                                    @endif
                                    <div class="col-md-6 form-group">
                                        <label for="Title">Company Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title"
                                            value="{{ old('title') }}" id="title">
                                    </div>
                    
                                    <div class="col-md-6 form-group">
                                        <label for="Description">Company Description</label>
                                        <input type="text" name="description" class="form-control" placeholder="Enter Description"
                                            value="{{ old('description') }}" id="description">
                                    </div>
                    
                                    <div class="col-md-6 form-group">
                                        <label for="company_code">Company Code / Company Username</label>
                                        <input type="text" name="company_code" class="form-control" placeholder="Enter login code"
                                            value="{{ old('company_code') }}" id="company_code">
                                    </div>                    
                    
                                    <div class="col-md-6 form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" name="mobile" class="form-control" placeholder="Enter company mobile"
                                            value="{{ old('mobile')  }}" id="mobile">
                                    </div>
                    
                                    <div class="col-md-6 form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter company email"
                                            value="{{ old('email')  }}" id="email">
                                    </div>
                    
                    
                                    <div class="col-md-6 form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" class="form-control" placeholder="Company Address" id="address" cols="30"
                                            rows="2">{!! old('address') !!}</textarea>
                                    </div>
                    
                    
                                    <div class="col-md-6 form-group">
                                        <label for="zip_code">Zip Code</label>
                                        <input type="text" name="zip_code" class="form-control" placeholder="Enter company zip code"
                                            value="{{ old('zip_code')  }}" id="zip_code">
                                    </div>
                    
                    
                                    <div class="col-md-6 form-group">
                                        <label for="city">City</label>
                                        <input type="text" name="city" class="form-control" placeholder="Enter city"
                                            value="{{ old('city')  }}" id="city">
                                    </div>
                    
                    
                                    <div class="col-md-6 form-group">
                                        <label for="country">Country</label>
                                        <input type="text" name="country" class="form-control" placeholder="Enter company country"
                                            value="{{ old('country')  }}" id="country">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
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
