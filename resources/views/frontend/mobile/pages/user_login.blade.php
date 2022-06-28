@extends('frontend.mobile.layout.app')
@section('css')
<style type="text/css">
    :root {
        --primary=#fd6500;
    }

    body {
        font-family: Verdana, sans-serif;
        background-color: var(--primary);
    }

    .mySlides {
        display: none;
    }

    .bgprimary {
        background-color: #fd6a02;
    }

    img {
        vertical-align: middle;
    }



    .padding-around,
    .padding-xy {
        padding: 0px !important;
    }

    ::placeholder {
        color: gray !important;
        opacity: 1;
        /* Firefox */
    }

    .text-truncate {
        color: black !important;
        font-size: 11px;
        font-weight: bold;
    }

    .product-sm .img-wrap {
        height: 140px;
        background-color: #E5EBFF;
        border-radius: 0rem !important;
    }

    .topright {
        position: absolute;
        top: 9px;
        left: 9px;
        font-size: 18px;
    }

    .topright .btn-warning {
        background-color: #fd6a02;
    }



    .checked {
        color: #fd6a02;
    }

    /* Number text (1/3 etc) */


    /* The dots/bullets/indicators */
    .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .divider {
        border-top: 10px solid #fceea7;
        margin-top: 0;
        margin-bottom: 0;
    }

    .mySlides {
        display: none;
    }

    .bg-this{
        background-color: #FCEEA7;
    }
    .container-tarek{
        color: red;
    }

    .tarek-login {
        width: 330px; margin:20px; background-color:white; border: 1px solid black;
    }

    .tarek-btn-login {
        background-color: #FD6500;
        width: 100%;
        color: white;
    }

    .tarek-btn-facebook {
        background-color: #FD6500;
        width: 100%;
        color: white;
    }

    .tarek-btn-google {
        background-color: #DE2928;
        width: 100%;
        color: white;
    }

    ::placeholder {
        font-size: 14px;
    }
</style>
@endsection
@section('content')

<main class="app-content" style="background-color:white;" >
    <!---End Header-->
    <section>
        <div class="row pt-5 pl-2">
            <div class="col-sm-12 pl-3 pr-3">
                <p style="font-size: 18px; font-weight:bold;">Welcome to Belaobela! Please, Login</p>
            </div>

            <div class="col-sm-12 text-right">

            </div>
        </div>
    </section>
    <section >
        <div class="tarek-login pb-3">
            <div class="px-4 py-3 py-lg-4">
                <div class="">
                    <form class="form-default" role="form" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                                <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ translate('Email Or Phone')}}" name="email" id="email">
                            @else
                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email">
                            @endif
                            @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                                <!-- <span class="opacity-60">{{  translate('Use country code before number') }}</span> -->
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ translate('Password')}}" name="password" id="password">
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class=opacity-60>{{  translate('Remember Me') }}</span>
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('password.request') }}" class="text-reset opacity-60 fs-14">{{ translate('Forgot password?')}}</a>
                            </div>
                        </div>

                        <div class="mb-5" style="background: #FD6500">
                            <button type="submit" class="btn btn btn-block fw-600" style="color: white;">{{  translate('Login') }}</button>
                        </div>
                    </form>
                    @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                        <div class="separator mb-3">
                            <span class="bg-white px-3 opacity-60">{{ translate('Or Login With')}}</span>
                        </div>
                        <ul class="list-inline social colored text-center mb-5">
                            @if (\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1)
                                <li class="list-inline-item">
                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="facebook">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                            @endif
                            @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1)
                                <li class="list-inline-item">
                                    <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google">
                                        <i class="fa fa-google"></i>
                                    </a>
                                </li>
                            @endif
                            <!--@if (\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)-->
                            <!--    <li class="list-inline-item">-->
                            <!--        <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="twitter">-->
                            <!--            <i class="fa fa-twitter"></i>-->
                            <!--        </a>-->
                            <!--    </li>-->
                            <!--@endif-->
                        </ul>
                    @endif
                </div>
                <div class="text-center">
                    <p style="color:red;">একাউন্ট না থাকলে আগে একাউন্ট করুন তারপর লগ ইন করুন</p>
                    <p class="text-muted mb-0">{{ translate('Dont have an account?')}}</p>
                    <a style="color: #FD6500;" href="{{ route('user.registration') }}">{{ translate('Register Now')}}</a>
                </div>
            </div>
        </div>
    </section>



   <!--start footer-->
</main>

@endsection
