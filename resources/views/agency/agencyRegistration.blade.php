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

    body {
        background-color: #F4F4F4 !important;
    }
</style>
@endpush

@section('content')

<div role="main" class="main margin-start pt-5" style="background-color: #F4F4F4;">
    <div class="tarek-container7 main margin-start p-4" style="background-color: #ffff; border-radius:25px">
        <div class="font-weight-bold text-dark tarek-padding-y tarek-text-heading mb-5">
            Agency Registration
        </div>
        @include('alerts.alerts')
        <form class="contact-form" action="{{ route('welcome.addNewPartner') }}" method="POST" novalidate="novalidate">
            @csrf
            <div class="tarek-agency-form-card p-2">
                <div class="p-2 tarek-padding-y">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">Type of organization</label>
                            <select data-msg-required="Please enter the subject."
                                class="form-control tarek-border-bottom-black" name="oragnization_type" id="subject"
                                required>
                                <option value="">Select</option>
                                <option value="Option 1">Option 1</option>
                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>
                                <option value="Option 4">Option 4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="p-2 tarek-padding-y">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">Name of organization</label>
                            <select data-msg-required="Please enter the subject."
                                class="form-control tarek-border-bottom-black" name="title" id="subject" required>
                                <option value="">Select</option>
                                <option value="Option 1">Option 1</option>
                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>
                                <option value="Option 4">Option 4</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>



            <div class="font-weight-bold text-dark tarek-padding-y tarek-text-heading">
                Enter cpntact details
            </div>

            <div class="tarek-agency-form-card p-2">
                <div class="p-2 tarek-padding-y">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">First Name</label>
                            <div class="">
                                <!-- <div>
                                    <select data-msg-required="Please enter the subject."
                                        class="form-control tarek-border-bottom-black" name="subject" id="subject"
                                        required>
                                        <option value="">Select</option>
                                        <option value="Option 1">Option 1</option>
                                        <option value="Option 2">Option 2</option>
                                        <option value="Option 3">Option 3</option>
                                        <option value="Option 4">Option 4</option>
                                    </select>
                                </div> -->

                                <input type="text" value="" data-msg-required="Please enter the subject."
                                    maxlength="100" class="form-control tarek-border-bottom-black" name="f_name"
                                    required>


                            </div>

                        </div>


                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">Username</label>
                            <div class="">
                                <!-- <div>
                                    <select data-msg-required="Please enter the subject."
                                        class="form-control tarek-border-bottom-black" name="subject" id="subject"
                                        required>
                                        <option value="">Select</option>
                                        <option value="Option 1">Option 1</option>
                                        <option value="Option 2">Option 2</option>
                                        <option value="Option 3">Option 3</option>
                                        <option value="Option 4">Option 4</option>
                                    </select>
                                </div> -->

                                <input type="text" value="" data-msg-required="Please enter the subject."
                                    maxlength="100" class="form-control tarek-border-bottom-black" name="username"
                                    required>


                            </div>

                        </div>
                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">Address Line 1*</label>
                            <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100"
                                class="form-control tarek-border-bottom-black" name="address" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">City/Town</label>
                            <select data-msg-required="Please enter the subject."
                                class="form-control tarek-border-bottom-black" name="city" id="subject" required>
                                <option value="">Select</option>
                                <option value="Option 1">Option 1</option>
                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>
                                <option value="Option 4">Option 4</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">Email Address*</label>
                            <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100"
                                class="form-control tarek-border-bottom-black" name="email" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">Prefered Currency</label>
                            <select data-msg-required="Please enter the subject."
                                class="form-control tarek-border-bottom-black" name="currency" id="subject" required>
                                <option value="">Select</option>
                                <option value="Option 1">Option 1</option>
                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>
                                <option value="Option 4">Option 4</option>
                            </select>
                        </div>



                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">Confirm Password</label>
                            <input type="password" value="" data-msg-required="Please enter the subject."
                                maxlength="100" class="form-control tarek-border-bottom-black" name="confirm_password"
                                required>
                        </div>


                    </div>
                </div>
                <div class="p-2 tarek-padding-y">
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="text-warning tarek-font">Last Name</label>
                            <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100"
                                class="form-control tarek-border-bottom-black" name="l_name" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">Address line 2*</label>
                            <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100"
                                class="form-control tarek-border-bottom-black" name="address2" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">Country</label>
                            <select data-msg-required="Please enter the subject."
                                class="form-control tarek-border-bottom-black" name="country" id="subject" required>
                                <option value="">Select</option>
                                <option value="Option 1">Option 1</option>
                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>
                                <option value="Option 4">Option 4</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">Phone Number</label>
                            <div class="">
                                <!-- <div>
                                    <select data-msg-required="Please enter the subject."
                                        class="form-control tarek-border-bottom-black" name="mpbile" id="subject"
                                        required>
                                        <option value="">Code</option>
                                        <option value="Option 1">Option 1</option>
                                        <option value="Option 2">Option 2</option>
                                        <option value="Option 3">Option 3</option>
                                        <option value="Option 4">Option 4</option>
                                    </select>
                                </div> -->

                                <input type="text" value="" data-msg-required="Please enter the subject."
                                    maxlength="100" class="form-control tarek-border-bottom-black" name="mobile"
                                    required>


                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">Zip/Postal Code</label>
                            <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100"
                                class="form-control tarek-border-bottom-black" name="zip_code" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="text-warning tarek-font">Password</label>
                            <input type="password" value="" data-msg-required="Please enter the subject."
                                maxlength="100" class="form-control tarek-border-bottom-black" name="password" required>
                        </div>
                        <div class="form-group col-md-12 tarek-font text-dark">
                            By creating an account you are agreeing to <a href="">T & C's</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tarek-agency-form-card p-2">
                <div class="tarek-padding-y">
                    <label class="custom-file-upload btn btn-xl btn-block btn-tarek-grey btn-rounded text-dark">
                        <input type="file" name="file_name" />
                        <i class="fas fa-upload pr-4"></i>Custom Upload
                    </label>

                </div>
                <div class="tarek-padding-y">
                    <button class="btn btn-xl btn-rounded btn-dark">
                        Submit</button>


                </div>
            </div>
        </form>

    </div>
</div>









@endsection