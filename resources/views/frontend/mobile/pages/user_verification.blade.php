@extends('frontend.mobile.layout.app')
@section('css')
<style type="text/css">
    :root {
        --primary=#fd6a02;
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
        background-color: #FD6A02;
        width: 100%;
        color: white;
    }

    .tarek-btn-facebook {
        background-color: #2170B0;
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

<main class="app-content" style="background-color:#FCEEA7;">
    @include('frontend.mobile.partials.search')
 <section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-5 mx-auto">
                <div class="card">
                    <div class="text-center pt-5">
                        <h1 class="h2 fw-600">
                            {{translate('Phone Verification')}}
                        </h1>
                        <p>Verification code has been sent. Please wait a few minutes.</p>
                        <a href="{{ route('verification.phone.resend') }}" class="btn btn-outline-primary">{{translate('Resend Code')}}</a>
                    </div>
                    <div class="px-5 py-lg-5 mt-2">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg">
                                <form class="form-default" role="form" action="{{ route('verification.submit') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group input-group--style-1">
                                            <input type="text" class="form-control" name="verification_code">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">{{ translate('Verify') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




   <!--start footer-->
</main>

@endsection