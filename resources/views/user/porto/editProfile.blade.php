@extends('user.porto.layouts.userLayoutMaster')
@push('css')
    <style>
        .list-group-item.active {
            z-index: 2;
            font-weight: 700;
            background-color: transparent;
            color: black;
        }

        .list-group-item {
            border: none;
            color: black;
            padding: 2px;
        }

        .list-group-item a {
            list-style: none !important;
            text-decoration: none !important;
            color: black;
        }

    </style>
@endpush

@section('content')
    <div class="container p-4">
        <div class="row">
            <div class="col-md-3">
                <aside class="sidebar mt-2">
                    <h5 class="font-weight-bold">Edit Profile</h5>
                    <ul class="nav nav-list flex-column">
                        <li class="nav-item"><a class="nav-link "
                                href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.myOrder') }}">My
                                Orders</a></li>
                        <li class="nav-item"><a class="nav-link text-dark active"
                                href="{{ route('user.editProfile') }}">Edit Profile</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('user.editPassword') }}">Change Password</a></li>

                        <li class="nav-item"><a class="nav-link" href="#">Logout</a></li>
                    </ul>
                </aside>
            </div>
            <div class="col-md-9">
                @include('alerts.alerts')
                <h3>Edit Profile</h3>
                <form class="contact-form" action="{{ route('user.updateProfile') }}" method="POST"
                    novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="required font-weight-bold text-dark text-2">Full Name</label>
                            <input type="text" value="{{ $user->name }}" data-msg-required="Please enter your name."
                                maxlength="100" class="form-control" name="name" required="">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="required font-weight-bold text-dark text-2">Email Address</label>
                            <input type="email" value="{{ old('email') ?: $user->email }}"
                                data-msg-required="Please enter your email address."
                                data-msg-email="Please enter a valid email address." class="form-control" name="email"
                                required="">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="font-weight-bold text-dark text-2">Subject</label>
                            <input type="text" value="{{ old('mobile') ?: $user->mobile }}"
                                data-msg-required="Please enter the subject." maxlength="100" name="mobile"
                                class="form-control" name="subject">
                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="font-weight-bold text-dark text-2">Your Image</label>
                            <input class="d-block" type="file" name="image" id="image"
                                value="{{ old('image') ?: $user->image }}">
                            <div class="mt-2">
                                <img src="{{ route('imagecache', ['template' => 'ppsm', 'filename' => $user->profilePic()]) }}"
                                    alt="">
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col">
                            <input type="submit" value="Send Message" class="btn btn-primary btn-modern"
                                data-loading-text="Loading...">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
