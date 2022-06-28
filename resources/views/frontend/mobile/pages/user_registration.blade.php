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
        background-color: #fffff;
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

<main class="app-content" style="background-color:#ffff;">
    @include('frontend.mobile.partials.search')
 <section class="gry-bg py-4">
    <div class="profile">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">
                    <div class="card">
                        <div class="text-center pt-4" style="background: #FD6500; color:white;">
                            <h1 class="h4 fw-600">
                                {{ translate('Create an account.')}}
                            </h1>
                        </div>
                        <div class="px-4 py-3 py-lg-4">
                            <div class="">
                                <form id="reg-form" class="form-default" role="form" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{  translate('Full Name') }}" name="name" required>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    @if ($otp_stytems)
                                        <div class="form-group phone-form-group mb-1">
                                            <input autocomplete="off" type="tel" pattern="0?1[3456789][0-9]{8}\b" title="Please Input a valid Phone Number" id="phone-code" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="" name="phone" autocomplete="off" required>
                                        </div>

                                        <input type="hidden" name="country_code" value="">

                                        <!-- <div class="form-group email-form-group mb-1 d-none">
                                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email"  autocomplete="off">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div> -->

                                       <!--  <div class="form-group text-right">
                                            <button class="btn btn-link p-0 opacity-50 text-reset" type="button" onclick="toggleEmailPhone(this)">{{ translate('Use Email Instead') }}</button>
                                        </div>  -->
                                    <!-- else -->
                                        <!-- <div class="form-group">
                                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div> -->
                                    @endif

                                    <div class="form-group">
                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{  translate('Password') }}" name="password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="{{  translate('Confirm Password') }}" name="password_confirmation">
                                    </div>

                                    @if($google_recaptcha)
                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label class="aiz-checkbox">
                                            <input type="checkbox" name="checkbox_example_1" required>
                                            <span class=opacity-60>{{ translate('By signing up you agree to our terms and conditions.')}}</span>
                                            <span class="aiz-square-check"></span>
                                        </label>
                                    </div>

                                    <div class="mb-5" style="background-color: #FD6500">
                                        <button type="submit" class="btn btn-primary btn-block fw-600" style="background-color: #FD6500">{{  translate('Create Account') }}</button>
                                    </div>
                                </form>
                                @if($BusinessSetting)
                                    <div class="separator mb-3">
                                        <span class="bg-white px-3 opacity-60">{{ translate('Or Join With')}}</span>
                                    </div>
                                    <ul class="list-inline social colored text-center mb-5">
                                        @if ($BusinessSetting1)
                                            <li class="list-inline-item">
                                                <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="facebook">
                                                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($BusinessSetting2)
                                            <li class="list-inline-item">
                                                <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google">
                                                    <i class="fab fa-google"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($BusinessSetting3)
                                            <li class="list-inline-item">
                                                <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="twitter">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </div>
                            <div class="text-center">
                                <p class="text-muted mb-0">{{ translate('Already have an account?')}}</p>
                                <a href="{{ route('user.login') }}">{{ translate('Log In')}}</a>
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
@section('js')
    @if($google_recaptcha)
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif

    <script type="text/javascript">

        @if($google_recaptcha)
        // making the CAPTCHA  a required field for form submission
        $(document).ready(function(){
            // alert('helloman');
            $("#reg-form").on("submit", function(evt)
            {
                var response = grecaptcha.getResponse();
                if(response.length == 0)
                {
                //reCaptcha not verified
                    alert("please verify you are humann!");
                    evt.preventDefault();
                    return false;
                }
                //captcha verified
                //do the rest of your validations here
                $("#reg-form").submit();
            });
        });
        @endif

        var isPhoneShown = true,
            countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone-code");

        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if(country.iso2 == 'bd'){
                country.dialCode = '88';
            }
        }

        var iti = intlTelInput(input, {
            separateDialCode: true,
            utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",
            onlyCountries: @php echo json_encode(\App\Country::where('status', 1)->pluck('code')->toArray()) @endphp,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                if(selectedCountryData.iso2 == 'bd'){
                    return "01xxxxxxxxx";
                }
                return selectedCountryPlaceholder;
            }
        });

        var country = iti.getSelectedCountryData();
        $('input[name=country_code]').val(country.dialCode);

        input.addEventListener("countrychange", function(e) {
            // var currentMask = e.currentTarget.placeholder;

            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);

        });

        function toggleEmailPhone(el){
            if(isPhoneShown){
                $('.phone-form-group').addClass('d-none');
                $('.email-form-group').removeClass('d-none');
                isPhoneShown = false;
                $(el).html('{{ translate('Use Phone Instead') }}');
            }
            else{
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                isPhoneShown = true;
                $(el).html('{{ translate('Use Email Instead') }}');
            }
        }
    </script>
@endsection