@extends('backend.layouts.app')

@section('content')

    <div class="card">
        <form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="card-body">
               
                <div class="card shadow-none bg-light">
                  <div class="card-header">
        						<h6 class="mb-0">{{ translate('Auto SMS') }}</h6>
        					</div>
                  <div class="card-body">

                    <div class="form-group">
                        <!-- <label>{{ translate('Social Links') }}</label> -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend col-4">
                               <input type="text" class="form-control" placeholder="Registration for seller (SMS)" readonly>
                            </div>
                            <input type="hidden" name="types[]" value="seller_registration_sms">
                            <input type="text" class="form-control" placeholder="Type SMS" name="seller_registration_sms" value="{{ get_setting('seller_registration_sms')}}">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend col-4">
                               <input type="text" class="form-control" placeholder="Registration for viewer / buyer (SMS)" readonly>
                            </div>
                            <input type="hidden" name="types[]" value="buyer_registration_sms">
                            <input type="text" class="form-control" placeholder="Type SMS" name="buyer_registration_sms" value="{{ get_setting('buyer_registration_sms')}}">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend col-4">
                               <input type="text" class="form-control" placeholder="Order Confirmation / Invoice (SMS)" readonly>
                            </div>
                            <input type="hidden" name="types[]" value="order_confirmation_sms">
                            <input type="text" class="form-control" placeholder="Type SMS" name="order_confirmation_sms" value="{{ get_setting('order_confirmation_sms')}}">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend col-4">
                               <input type="text" class="form-control" placeholder="Payment Received (SMS)" readonly>
                            </div>
                            <input type="hidden" name="types[]" value="payment_received_sms">
                            <input type="text" class="form-control" placeholder="Type SMS" name="payment_received_sms" value="{{ get_setting('payment_received_sms')}}">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend col-4">
                               <input type="text" class="form-control" placeholder="When anyone filled contact us form (Email & SMS)" readonly>
                            </div>
                            <input type="hidden" name="types[]" value="contact_us_sms">
                            <input type="text" class="form-control" placeholder="Type SMS" name="contact_us_sms" value="{{ get_setting('contact_us_sms')}}">
                        </div>
                    </div>
                  </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
                </div>
            </div>
        </form>
	</div>

	<div class="card">
        <form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="card-body">
               
                <div class="card shadow-none bg-light">
                  <div class="card-header">
        						<h6 class="mb-0">{{ translate('Auto Email') }}</h6>
        					</div>
                  <div class="card-body">

                    <div class="form-group">
                        <!-- <label>{{ translate('Social Links') }}</label> -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend col-4">
                               <input type="text" class="form-control" placeholder="Registration for seller (Email)" readonly>
                            </div>
                            <input type="hidden" name="types[]" value="seller_registration_mail">

                            <textarea type="text" class="form-control" placeholder="Type Email" name="seller_registration_mail">{{ get_setting('seller_registration_mail')}}</textarea>
                        </div>
                        <div class="input-group form-group d-none">
                            <div class="input-group-prepend col-4">
                               <input type="text" class="form-control" placeholder="Registration for viewer / buyer (Email)" readonly>
                            </div>
                            <input type="hidden" name="types[]" value="buyer_registration_mail">
                            <textarea type="text" class="form-control" placeholder="Type Email" name="buyer_registration_mail">{{ get_setting('buyer_registration_mail')}}</textarea>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend col-4">
                               <input type="text" class="form-control" placeholder="Order Confirmation / Invoice (Email)" readonly>
                            </div>
                            <input type="hidden" name="types[]" value="order_confirmation_mail">
                            <textarea type="text" class="form-control" placeholder="Type Email" name="order_confirmation_mail">{{ get_setting('order_confirmation_mail')}}</textarea>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend col-4">
                               <input type="text" class="form-control" placeholder="Payment Received (Email)" readonly>
                            </div>
                            <input type="hidden" name="types[]" value="payment_received_mail">
                            <textarea type="text" class="form-control" placeholder="Type Email" name="payment_received_mail">{{ get_setting('payment_received_mail')}}</textarea>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend col-4">
                               <input type="text" class="form-control" placeholder="When anyone filled contact us form (Email)" readonly>
                            </div>
                            <input type="hidden" name="types[]" value="contact_us_mail">
                            <textarea type="text" class="form-control" placeholder="Type Email" name="contact_us_mail">{{ get_setting('contact_us_mail')}}</textarea>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
                </div>
            </div>
        </form>
	</div>
@endsection
