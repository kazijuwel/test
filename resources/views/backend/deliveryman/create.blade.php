@extends('backend.layouts.app')
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Add Delivery Man')}}</h5>
</div>
<div class="col-md-10 mx-auto">
    <form class="form form-horizontal mar-top" action="{{route('deliveryMan.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
        @csrf
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Delivery Man Information')}}</h5>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">{{translate('Name')}} <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" placeholder="name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">{{translate('Select User')}} <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <select class="form-control aiz-selectpicker" name="user_id" id="user_id" data-live-search="true" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Mobile Number(1st) <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="tel" name="mobile_1" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Mobile Number(2nd) <span class="text-danger"></span></label>
                    <div class="col-md-8">
                        <input type="tel" name="mobile_2" id="" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Email Address(1st) <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="email" name="email_1" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Email Address(2nd) <span class="text-danger"></span></label>
                    <div class="col-md-8">
                        <input type="email" name="email_2" id="" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">area <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <textarea name="area" class="form-control" id="" cols="30" rows="10" required></textarea>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_delivery_company" name="is_delivery_company">
                    <label class="form-check-label" for="exampleCheck1">Delivery Company</label>
                </div>
            </div>
        </div>
        <div class="mb-3 text-right">
            <button type="submit" name="button" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
