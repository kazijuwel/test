@extends('user.porto.layouts.userLayoutMaster3')

@push('css')
<style>
    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }

    .tarek-input {
        height: 50px !important;
        border-radius: 10px !important;
        border: 1px solid #989898 !important;
    }

    .tarek-textarea-b-dark {
        border: 1px solid #989898 !important;
    }

    body {
        background-color: #F4F4F4 !important;
    }




    @media only screen and (max-width: 1110px) {
        .mlt-3 {
            padding-left: 15px !important;
        }
    }
</style>
@endpush

@section('content')

<div role="main" class="main margin-start pt-5">
    <div class="tarek-container7 main margin-start p-4" style="background-color: #ffff; border-radius:25px">
        <div>
            <iframe src="{{$websiteParameter->google_map_code}}" width=100% height="300"
                style="border:1px grey dashed; border-radius:25px" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="mt-5 pt-3">
            <p class="text-center text-dark pb-3" style="font-size:14px; font-weight:600">How can we help you?</p>
            <form class="contact-form" action="{{ route('contactUsPost') }}" method="POST">

                @include('alerts.alerts')
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" name="name" value="{{ old('name') }}"
                                    data-msg-required="Please enter the subject." placeholder="Name" maxlength="100"
                                    class="form-control tarek-input" name="subject" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="email" value="{{ old('business_email') }}"
                                    data-msg-required="Please enter the subject." placeholder="Business Email"
                                    name="business_email" maxlength="100" class="form-control tarek-input"
                                    name="subject" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" value="{{ old('company_name') }}"
                                    data-msg-required="Please enter the subject." name="company_name"
                                    placeholder="Company Name" maxlength="100" class="form-control tarek-input"
                                    name="subject" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="string" value="{{ old('phone_number') }}"
                                    data-msg-required="Please enter the subject." name="phone_number"
                                    placeholder="Phone Number" maxlength="100" class="form-control tarek-input"
                                    name="subject" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" value="{{ old('Username') }}"
                                    data-msg-required="Please enter the subject." placeholder="Country" maxlength="100"
                                    class="form-control tarek-input" value="{{ old('country') }}" name="country"
                                    required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="4"
                                    class="form-control tarek-textarea-b-dark" name="message_body"
                                    required>Your Message</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <input type="submit" value="Send Message"
                                    class="btn btn-tarek btn-rounded btn-block btn-modern"
                                    data-loading-text="Loading...">
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>


    <div class="tarek-container7 mt-5 pt-3 mlt-3">
        <div class="row tarek-loc-p">
            <div class="col-md-4">
                <div class="text-dark" style="font-size: 12px; font-weight:600">
                    Bangladesh
                </div>
                <hr class="yellowhr mr-5">

                <p class="text-dark" style="font-size: 12px; font-weight:600">Mollick Complex ( 5th Floor ),</p>
                <p class="text-dark" style="font-size: 12px; font-weight:600">12 Purana Paltan, Dhaka 1000,</p>
                <p class="text-dark" style="font-size: 12px; font-weight:600">Bangladesh</p>
            </div>
            <div class="col-md-4">
                <div class="text-dark" style="font-size: 12px; font-weight:600">
                    United State
                </div>
                <hr class="yellowhr mr-5">
                <p class="text-dark" style="font-size: 12px; font-weight:600">555 E Washington Ave, Sunnyvale,</p>
                <p class="text-dark" style="font-size: 12px; font-weight:600">CA 94086,</p>
                <p class="text-dark" style="font-size: 12px; font-weight:600">United State Of America</p>
            </div>

            <div class="col-md-4">
                <div class="text-dark" style="font-size: 12px; font-weight:600">
                    Helpline
                </div>
                <hr class="yellowhr mr-5">
                <p class="text-dark" style="font-size: 12px; font-weight:600">1800-000-000</p>
                <p class="text-dark" style="font-size: 12px; font-weight:600">Email :</p>
                <p class="text-dark" style="font-size: 12px; font-weight:600">info@tripbeyond.com</p>
            </div>
        </div>
    </div>

    <div class="container pt-5 ">
        <div class="row text-center ">
            <div class="col-md-12 ">
                <div class="blog-posts ">
                    <article class="post post-medium btn btn-rounded ">
                        <div class="post-image ">
                            <a href="# ">
                                <img src="{{ asset('user/img/ios.png') }} "
                                    class="img-fluid img-thumbnail-no-borders rounded-5 border-curve " alt=" " />
                            </a>
                        </div>

                    </article>
                </div>
            </div>
        </div>
        @stack('extra')
    </div>

</div>

@endsection

@push('js')
<script>
    function myMap() {
        var mapProp = {
            center: new google.maps.LatLng(23.754824505975083, 90.41530172168011),
            zoom: 5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
@endpush