@extends('theme.prt.layouts.prtMaster')

@section('title')
 Apply For Membership Now | {{ env('APP_NAME') }}
@endsection
@section('meta')
@endsection

@push('css')
<style>
    @media only screen and (max-width: 600px){
        .text-right{
            text-align: left !important;
        }
    }
</style>
@endpush

@section('contents')
@include('alerts.alerts')

<div class="container text-dark">
    <div class="text-6 px-3 my-3 w3-deep-orange">
        Online Enrolment Form
    </div>
    <div class="text-5 w3-text-green">
        Thank you for starting your application to {{ env('APP_NAME_BIG') }}.
    </div>
    <div class="text-3">
        This form contains five (5) sections. <br>
        Upon submission of this form, you will be directed to our secure payment page for making the payment of GBP £15 towards enrolment fees. <br>
        If you require any assistance while filling the form, you can contact us via live chat by clicking here . We will respond as soon as possible to help guide you through the application process. <br><br>

        Anderson Cooper <br>
        Chief Academic Officer <br><br>

        Please fill the form below to start your enrolment. <br>
    </div>
    <form action="{{ route('welcome.application.submit') }}" method="post" enctype="multipart/form-data">

        @honeypot
        @csrf

        <div class="text-6 px-3 my-3 w3-indigo">
            Part 1: Personal Details
        </div>
        <div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="membership"> Select Membership :*</label>
                </div>
                <div class="col-md-8">
                    <select class="form-control @error('membership') is-invalid @enderror" name="membership">
                    <option value="" selected disabled>Select Membership</option>
                    @foreach ($memberships as $membership)
                        <option value="{{ $membership->id }}" @if($membership->id == old('membership')) @endif>{{ $membership->title }} for {{ $membership->duration }} days </option>
                    @endforeach
                    <option value="">Non Member</option>
                    </select>
                    @error('membership')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="course"> Select Course :*</label>
                </div>
                <div class="col-md-8">
                    <select class="form-control @error('course') is-invalid @enderror" name="course">
                    <option value="" selected disabled>Select Course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" @if($course->id == old('course')) @endif>{{ $course->title }} </option>
                    @endforeach
                    </select>
                    @error('course')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="first_name"> First name:*</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('first_name') is-invalid @enderror" name="first_name" type="text" value="{{ old('first_name') }}">
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="last_name"> Last name:*</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('last_name') is-invalid @enderror" name="last_name" type="text" value="{{ old('last_name') }}">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="email"> Email:*</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="gender"> Gender:*</label>
                </div>
                <div class="col-md-8">
                    <span class="pr-5"><input class="form-" name="gender" type="radio" value="male" @if(old('gender') == 'male') checked @endif> Male</span>
                    <span class=""><input class="form-" name="gender" type="radio" value="female" @if(old('gender') == "female") checked @endif> Female</span>
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="marital_status"> Marital Status:*</label>
                </div>
                <div class="col-md-8">
                    <span class="pr-5"><input class="form-" name="marital_status" type="radio" value="single" @if(old('marital_status') == 'single') checked @endif> Single</span>
                    <span class=""><input class="form-" name="marital_status" type="radio" value="married" @if(old('marital_status') == "married") checked @endif> Married</span>
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="birthdate"> Date of birth:*</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" type="date" value="{{ old('birthdate') }}">
                    @error('birthdate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="address"> Address:*</label>
                </div>
                <div class="col-md-8">
                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" >{{ old('address') }}</textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="state"> State:*</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('state') is-invalid @enderror" name="state" type="text" value="{{ old('state') }}">
                    @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="country"> Select Country :*</label>
                </div>
                <div class="col-md-8">
                    <select class="form-control @error('country') is-invalid @enderror" name="country">
                    <option value="" selected disabled>Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->name }}" @if($country->name == old('country')) @endif>{{ $country->name }} </option>
                    @endforeach
                    </select>
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="zip"> Zipcode or Postcode (optional):</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('zip') is-invalid @enderror" name="zip" type="text" value="{{ old('zip') }}">
                    @error('zip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="phone"> Phone Number:</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="text" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="mobile"> Mobile Number*:</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('mobile') is-invalid @enderror" name="mobile" type="text" value="{{ old('mobile') }}">
                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="text-6 px-3 my-3 w3-indigo">
            Part 2: Family Information
        </div>
        <div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="father_name"> Father's name:*</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('father_name') is-invalid @enderror" name="father_name" type="text" value="{{ old('father_name') }}">
                    @error('father_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="mother_name"> Mother's name:*</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" type="text" value="{{ old('mother_name') }}">
                    @error('mother_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="text-6 px-3 my-3 w3-indigo">
            Part 3: Education Details
        </div>
        <div>
            <div class="text-2">
                Academic credentials are important for our Admissions Committee. We will review the school you attended, your degree and subject, as well as your final or current grades. Please list the highest level of degree/ qualification obtained by you.
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="degree"> Highest degree/ qualification obtained:*</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('degree') is-invalid @enderror" name="degree" type="text" value="{{ old('degree') }}">
                    @error('degree')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="major"> Major/ specialisation (If applicable):*</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('major') is-invalid @enderror" name="major" type="text" value="{{ old('major') }}">
                    @error('major')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="institute"> Name of school/ university:*</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('institute') is-invalid @enderror" name="institute" type="text" value="{{ old('institute') }}">
                    @error('institute')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="result"> Grade point/ score/ percentage attained:*</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('result') is-invalid @enderror" name="result" type="text" value="{{ old('result') }}" placeholder="ex. 3.85 out of 4.00">
                    @error('result')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="passing_year"> Completion year:*</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('passing_year') is-invalid @enderror" name="passing_year" type="text" value="{{ old('passing_year') }}">
                    @error('passing_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="text-6 px-3 my-3 w3-indigo">
            Part 4: Employment Details
        </div>
        <div>
            <div class="text-2">
                Please provide us with your employment details, if you possess work experience.
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="experience_years"> Work experience in number of years:</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('experience_years') is-invalid @enderror" name="experience_years" type="text" value="{{ old('experience_years') }}">
                    @error('experience_years')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="employer"> Current/ most recent employer name:</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control @error('employer') is-invalid @enderror" name="employer" type="text" value="{{ old('employer') }}">
                    @error('employer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="employment_details"> Brief details of your current/ most recent employment:</label>
                </div>
                <div class="col-md-8">
                    <textarea class="form-control @error('employment_details') is-invalid @enderror" name="employment_details" >{{ old('employment_details') }}</textarea>
                    @error('employment_details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        </div>
        <div class="text-6 px-3 my-3 w3-indigo">
            Part 5: Attach Documents
        </div>
        <div>
            <div class="text-2">
                Attach any file if required. <br>
                <small>*Max 2MB and Image, Doc/Docx, PDF, Zip/Rar files are accepted.</small>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="attachment_one"> Attachment 1:</label>
                </div>
                <div class="col-md-8">
                    <input type="file" class="form-control @error('attachment_one') is-invalid @enderror" name="attachment_one" type="text" value="{{ old('attachment_one') }}">
                    @error('attachment_one')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="attachment_two"> Attachment 2:</label>
                </div>
                <div class="col-md-8">
                    <input type="file" class="form-control @error('attachment_two') is-invalid @enderror" name="attachment_two" type="text" value="{{ old('attachment_two') }}">
                    @error('attachment_two')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group my-4">
                <div class="col-md-4 text-right">
                    <label class="" for="attachment_three"> Attachment 3:</label>
                </div>
                <div class="col-md-8">
                    <input type="file" class="form-control @error('attachment_three') is-invalid @enderror" name="attachment_three" >
                    @error('attachment_three')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        </div>
        <div class="text-center">
            <button class="btn btn-primary px-5">Submit</button>
        </div>
    </form>
</div>


@endsection

@push('js')
@endpush
