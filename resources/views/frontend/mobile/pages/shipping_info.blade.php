@extends('frontend.mobile.layout.app')
@section('content')

<main class="app-content" >


    <section class="padding-around m-3">


        <div class="steps-wizard clearfix mb-3 pt-2">
            <div class="step done" data-step-num="1">
                <div class="step-icon"> 1 </div>
                <span class="step-title">Delivery</span>
            </div>
            <div class="step current" data-step-num="2">
                <div class="step-icon"> 2 </div>
                <span class="step-title">Shipping</span>
            </div>
            <div class="step" data-step-num="3">
                <div class="step-icon"> 3 </div>
                <span class="step-title">Payment</span>
            </div>
        </div>


<div class="card">
  <form class="form-default" data-toggle="validator" action="{{ route('checkout.store_shipping_infostore') }}" role="form" method="POST" >
    @csrf
        @if(Auth::check())
        <div class="shadow-sm bg-white p-4 rounded mb-4">
            <div class="row gutters-5">
                @foreach (Auth::user()->addresses as $key => $address)
                    <div class="col-md-6 mb-3">
                        <label class="aiz-megabox d-block bg-white mb-0">
                            <input type="radio" name="address_id" value="{{ $address->id }}" @if ($address->set_default)
                                checked
                            @endif required>
                            <span class="d-flex p-3 aiz-megabox-elem">
                                <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                <span class="flex-grow-1 pl-3 text-left">
                                    <div>
                                        <span class="opacity-60">{{ translate('Address') }}:</span>
                                        <span class="fw-600 ml-2">{{ $address->address }}</span>
                                    </div>
                                    <div>
                                        <span class="opacity-60">{{ translate('Postal Code') }}:</span>
                                        <span class="fw-600 ml-2">{{ $address->postal_code }}</span>
                                    </div>
                                    <div>
                                        <span class="opacity-60">{{ translate('City') }}:</span>
                                        <span class="fw-600 ml-2">{{ $address->city }}</span>
                                    </div>
                                    <div>
                                        <span class="opacity-60">{{ translate('Country') }}:</span>
                                        <span class="fw-600 ml-2">{{ $address->country }}</span>
                                    </div>
                                    <div>
                                        <span class="opacity-60">{{ translate('Phone') }}:</span>
                                        <span class="fw-600 ml-2">{{ $address->phone }}</span>
                                    </div>
                                </span>
                            </span>
                        </label>
                    </div>
                @endforeach
                <input type="hidden" name="checkout_type" value="logged">
                <div class="col-md-6 mx-auto mb-3" >
                    <div class="border p-3 rounded mb-3 c-pointer text-center bg-white h-100 d-flex flex-column justify-content-center" onclick="add_new_address()">
                        <i class="las la-plus la-2x mb-3"></i>
                        <div class="alpha-7">{{ translate('Add New Address') }}</div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="shadow-sm bg-white p-4 rounded mb-4">
                <div class="form-group">
                    <label class="control-label">{{ translate('Name')}}</label>
                    <input type="text" class="form-control" name="name" placeholder="{{ translate('Name')}}" required>
                </div>

                <div class="form-group">
                    <label class="control-label">{{ translate('Email')}}</label>
                    <input type="text" class="form-control" name="email" placeholder="{{ translate('Email')}}" required>
                </div>

                <div class="form-group">
                    <label class="control-label">{{ translate('Address')}}</label>
                    <input type="text" class="form-control" name="address" placeholder="{{ translate('Address')}}" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">{{ translate('Select your country')}}</label>
                            <select class="form-control aiz-selectpicker" data-live-search="true" name="country">
                                @foreach (\App\Country::where('status', 1)->get() as $key => $country)
                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            @if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'area_wise_shipping')
                                <label class="control-label">{{ translate('City')}}</label>
                                <select class="form-control aiz-selectpicker" data-live-search="true" name="city" required>
                                    @foreach (\App\City::get() as $key => $city)
                                        <option value="{{ $city->name }}">{{ $city->getTranslation('name') }}</option>
                                    @endforeach
                                </select>
                            @else
                                <label class="control-label">{{ translate('City')}}</label>
                                <input type="text" class="form-control" placeholder="{{ translate('City')}}" name="city" required>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">{{ translate('Postal code')}}</label>
                            <input type="text" class="form-control" placeholder="{{ translate('Postal code')}}" name="postal_code">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">{{ translate('Phone')}}</label>
                            <input type="number" lang="en" min="0" class="form-control" placeholder="{{ translate('Phone')}}" name="phone" required>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="checkout_type" value="guest">
            </div>
        @endif
    <div class="row align-items-center mb-2">
        <div class="col-md-6 text-center mb-1">
            <button type="submit" class="btn btn-primary fw-600">{{ translate('Continue to Payment')}}</a>
        </div>
        <div class="col-md-6 text-center  order-1 order-md-0">
          <a href="{{ route('home') }}" type="button" class="btn btn-outline-primary">
              <i class="las la-arrow-left"></i>
              {{ translate('Return to shop')}}
          </a>
      </div>
    </div>
   </form>
</div>
</section>
<div class="modal fade" id="new-address-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">{{ translate('New Address')}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-default" role="form" action="{{ route('addresses.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="p-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Address')}}</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea class="form-control textarea-autogrow mb-3" placeholder="{{ translate('Your Address')}}" rows="1" name="address" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Country')}}</label>
                                </div>
                                <div class="col-md-10">
                                    <select class="form-control mb-3 "  name="country" required>
                                        @foreach (\App\Country::where('status', 1)->get() as $key => $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'area_wise_shipping')
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>{{ translate('City')}}</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control mb-3" name="city" required>
                                            @foreach (\App\City::get() as $key => $city)
                                                <option value="{{ $city->name }}">{{ $city->getTranslation('name') }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>{{ translate('City')}}</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control mb-3"  name="city" required>
                                            @foreach (\App\City::get() as $key => $city)
                                                <option value="{{ $city->name }}">{{ $city->getTranslation('name') }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Postal code')}}</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3" placeholder="{{ translate('Your Postal Code')}}" name="postal_code" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Phone')}}</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3" placeholder="{{ translate('+880')}}" name="phone" value="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{  translate('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
</main>

@endsection
@section('js')
<script type="text/javascript">
    function add_new_address(){
        $('#new-address-modal').modal('show');
    }
</script>
