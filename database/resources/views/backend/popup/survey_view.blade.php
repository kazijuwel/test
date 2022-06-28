<style>
.g-3{
	padding-top: 10px;
}
			#popup_name{
				margin-left: 1px;
            }
            #popup_email{
				margin-left: 3px;
            }
            #popup_mobile{
				margin-left: -4px;
    			width: 214px;
            }
            #popup_comment{
                margin-left: -27px;
				margin-bottom: 10px;
            }
</style>
@extends('backend.layouts.app')

@section('content')

<div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Query Details')}}</h5>
            </div>
            <div class="card-body">
        <div class="form-group row">
            <label class="col-md-1 col-form-label" for="signinSrEmail">{{translate('Name:')}}</label>
            <div class="col-md-8">
               
                <p>{{$popup->name}}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-1 col-form-label" for="signinSrEmail">{{translate('Email:')}}</label>
            <div class="col-md-8">
               
                <p>{{$popup->email}}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-1 col-form-label" for="signinSrEmail">{{translate('Mobile:')}}</label>
            <div class="col-md-8">
               
                <p>{{$popup->mobile}}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-1 col-form-label" for="signinSrEmail">{{translate('Comment:')}}</label>
            <div class="col-md-11">
               
                <p>{{$popup->comment}}</p>
            </div>
        </div>
            </div>
        </div>



@endsection

@section('script')



@endsection
