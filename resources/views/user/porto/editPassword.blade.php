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
                    <h5 class="font-weight-bold">Change Password</h5>
                    <ul class="nav nav-list flex-column">
                        <li class="nav-item"><a class="nav-link "
                                href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('user.myOrder') }}">My
                                Orders</a></li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('user.editProfile') }}">Edit
                                Profile</a></li>
                        <li class="nav-item"><a class="nav-link text-dark active"
                                href="{{ route('user.editPassword') }}">Change Password</a></li>

                        <li class="nav-item">
                            <a class="nav-link" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </aside>
                {{-- <ul class="list-group">
                    <li class="list-group-item "> <a href="{{ route('user.dashboard') }}"><i class="icon-home"></i> Dashboard</a>
                        </li>
                    <li class="list-group-item "><a href="{{ route('user.myOrder') }}"> <i class="fas fa-angle-right"></i> My Order</a></li>
                    <li class="list-group-item"><a href="{{ route('user.editProfile') }}"> <i class="fas fa-angle-right"></i> Edit Profile</a></li>
                    <li class="list-group-item active"><a href="{{ route('user.editPassword') }}"> <i class="fas fa-angle-right"></i> Change Password</a></li>
                    <li class="list-group-item"><a href="#"> <i class="fas fa-angle-right"></i> Logout</a></li>
                </ul> --}}
            </div>
            <div class="col-md-9">
                @include('alerts.alerts')
                <h3>Edit Profile</h3>
                <form class="contact-form" action="{{ route('user.updatePassword') }}" method="POST"
                    novalidate="novalidate">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label class="required font-weight-bold text-dark text-2">Current Password</label>
                            <input type="password" data-msg-required="Please enter your Old Password." maxlength="100"
                                class="form-control" name="current_password" id="current_password" required="">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="required font-weight-bold text-dark text-2">Password</label>
                            <input type="password" data-msg-required="Please enter your password."
                                data-msg-email="Please enter your password" id="password" class="form-control"
                                name="password" required="">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="required font-weight-bold text-dark text-2">Confirmation Password</label>
                            <input type="password" data-msg-required="Please re enter your password."
                                data-msg-email="Please re enter your password" id="password-confirm" class="form-control"
                                name="password-confirm" required="">
                            @error('password-confirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
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
