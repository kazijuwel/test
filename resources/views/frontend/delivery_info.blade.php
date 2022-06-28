@extends('frontend.layouts.app')
@section('content')
<span></span>

    <section class="pt-5 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="row aiz-steps arrow-divider">
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-shopping-cart"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block text-capitalize">{{ translate('1. My Cart')}}</h3>
                            </div>
                        </div>
                        <div class="col active">
                            <div class="text-center text-primary">
                                <i class="la-3x mb-2 las la-truck"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block text-capitalize">{{ translate('2. Delivery info')}}</h3>
                            </div>
                        </div>
                        {{-- <div class="col">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-map"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block text-capitalize">{{ translate('3. Shipping info')}}</h3>
                            </div>
                        </div> --}}
                        <div class="col">
                            <div class="text-center">
                                <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 text-capitalize">{{ translate('4. Payment')}}</h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center">
                                <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 text-capitalize">{{ translate('5. Confirmation')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 gry-bg">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-xxl-8 col-xl-10 mx-auto text-left">
                    @php
                        // $admin_products = array();
                        // $seller_products = array();
                        $checkFreeOrders= array();
                        $usersProducts=array();

                        foreach (Session::get('cart') as $key => $cartItem){

                            if(\App\Product::find($cartItem['id']))
                                {
                                    array_push($usersProducts, $cartItem['id']);
                                }
                            if(\App\Product::find($cartItem['id'])->delivery_free == '1'){
                                array_push($checkFreeOrders, $cartItem['id']);
                            }






                            // if(\App\Product::find($cartItem['id'])->added_by == 'admin'){
                            //     array_push($admin_products, $cartItem['id']);
                            // }
                            // else{
                            //     $product_ids = array();
                            //     if(array_key_exists(\App\Product::find($cartItem['id'])->user_id, $seller_products)){
                            //         $product_ids = $seller_products[\App\Product::find($cartItem['id'])->user_id];
                            //     }
                            //     array_push($product_ids, $cartItem['id']);
                            //     $seller_products[\App\Product::find($cartItem['id'])->user_id] = $product_ids;
                            // }
                        }
                    @endphp

{{----Editsaif---}}
<form class="form-default"  action="{{ route('checkout.store_shipping_infostore') }}" role="form" method="POST">
@csrf
@if (!empty($usersProducts))
<!---sharif working-->
        {{-- @foreach ($seller_products as $key => $seller_product) --}}
        {{-- {{   print_r($seller_product)}} --}}
            <div class="card mb-3 shadow-sm border-0 rounded" style="border: 1px solid #4947a1 !important;">
                <div class="card-header p-3" style="background: #4947a1; color: white;">
                    <h5 class="fs-16 fw-600 mb-0">{{ translate('Products') }}</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        @foreach ($usersProducts as $key => $cartItem)
                            @php
                                $product = \App\Product::find($cartItem);
                            @endphp
                            <li class="list-group-item">
                                <div class="d-flex">
                            <span class="mr-2">
                            <img
                                src="{{ uploaded_asset($product->thumbnail_img) }}"
                                    class="img-fit size-60px rounded"
                                    alt="{{  $product->getTranslation('name')  }}"
                                >
                            </span>
                            <span class="fs-14 opacity-60">{{ $product->getTranslation('name') }}</span>
                            </div>
                            </li>
                        @endforeach
                    </ul>



                    <!-- Delivery option start sabbir -->
                    @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                        <div class="row border-top pt-3"
                            style="padding-left: 15px; padding-right: 15px; padding-top: 0px !important;">
                            <div class="col-md-6"
                                style="padding-top: 10px; ">
                                <h6 class="fs-15 fw-600">{{ translate('Delivery System : Select Delivery option') }}</h6>
                            </div>
                            <div class="col-md-12"
                                style=" padding-top: 5px; border-bottom: 0px;">
                                <div class="row gutters-5">
                                @php

                                    $delivry_methods = \App\DelivryMethod::where('parent_id', 'parent_id')->whereNotIn('id', [9,10])->get();
                                @endphp
                                <div class="mt-4 " id="home_delivery_option_{{ $key }}">
                                    <div class="card-deck">
                                    @foreach($delivry_methods as $delivry_method)

                                        @if(count($delivry_method->subDelivryMethod))

                                        <div style=" padding: 10px 25px 40px;">
                                            <!--<div class="card order-box"-->
                                            <!--    style="box-shadow: 3px 3px 5px 0px rgb(0 0 0 / 5%); border: 1px solid rgba(0, 0, 0, 0.1); padding: 10px 25px 40px;">-->
                                                <!--<h4 class="title"-->
                                                <!--    style="font-size: 16px; font-weight: 700; text-transform: uppercase; color: #143250; line-height: 28px; margin-bottom: 15px;">{{$delivry_method->title}}</h4>-->
                                                <!--<div class="packeging-area">-->

                                                    @foreach($delivry_method->subDelivryMethod as $item)

                                                    @if($item->parent_id == "2")

                                                      @if($item->id != 177)
                                                      <div class="form-check">
                                                        <input type="radio"
                                                            class="form-check-input"
                                                            id="delivery-{{$item->id}}"
                                                            name="shipping"
                                                            value="{{$item->id}}"
                                                            {{--checked=""--}} onclick="session_delivery_set(this); show_continue_button({{ $key }});">
                                                        <span class="checkmark"></span>

                                                        <label class="form-check-label"
                                                            for="delivery-{{$item->id}}">
                                                            {{$item->title}}


                                                        </label>
                                                    </div>
                                                    @endif
                                                    @if(count($checkFreeOrders) == count($usersProducts))
                                                    @if($item->id == 177)


                                                    <div class="form-check">
                                                      <input type="radio"
                                                          class="form-check-input"
                                                          id="delivery-{{$item->id}}"
                                                          name="shipping"
                                                          value="{{$item->id}}"
                                                          {{--checked=""--}} onclick="session_delivery_set(this); show_continue_button({{ $key }});">
                                                      <span class="checkmark"></span>
                                                      <label class="form-check-label"
                                                          for="free-shepping3">
                                                          {{$item->title}}


                                                      </label>
                                                  </div>
                                                  @endif
                                                    @endif
                                                    @endif





                                                    @endforeach


                                                <!--</div>-->

                                            <!--</div>-->
                                            </div>

                                        @else

                                            <div class=" card order-box"
                                                style="box-shadow: 3px 3px 5px 0px rgb(0 0 0 / 5%); border: 1px solid rgba(0, 0, 0, 0.1); padding: 10px 25px 40px;">
                                                <h4 class="title"
                                                    style="font-size: 16px; font-weight: 700; text-transform: uppercase; color: #143250; line-height: 28px; margin-bottom: 15px;"></h4>
                                                <div class="packeging-area">

                                                    <div class="radio-design">
                                                        <div class="form-check">

                                                            <input type="radio"
                                                                class="form-check-input"
                                                                id="delivery-{{$delivry_method->id}}"
                                                                name="shipping"
                                                                value="{{$delivry_method->id}}"
                                                                onclick="session_delivery_set(this);">
                                                            <span class="checkmark"></span>
                                                            <label class="form-check-label"
                                                                for="free-shepping3">
                                                                {{$delivry_method->title}}

                                                                <small>{{$delivry_method->delivery_charge}}</small>
                                                            </label>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                </div>
                                <!-- home delivery option div end -->
                            </div>
                        </div>
                    @endif
                <!-- Delivery option End sabbir -->
                {{-- {{ translate('Continue to Payment')}} --}}
                </div>
               {{----shipping information----}}
                <div class="">
                    <h6 class="fs-15 fw-600 ml-3 text-bold">
                        Shipping System:Select shipping Info
                    </h6>
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
                </div>

            {{--End shipping---}}

                <div class="card-footer justify-content-end">
                    <button type="submit" class="hide_button btn btn-primary" disabled id="continue" name="owner_id" value="{{ $key }}" class="btn fw-600 btn-primary">{{ translate('Continue to Payment')}}</a>
                </div>
            </div>
        {{-- @endforeach --}}
        <!--end sharif-->
</form>
@endif
{{----Editsaif---}}

                    <div class="pt-4">
                        <a href="{{ route('home') }}" >
                            <i class="la la-angle-left"></i>
                            {{ translate('Return to shop')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('modal')
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
                                <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="country" required>
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
                                    <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="city" required>
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
                                    <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="city" required>
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
@endsection

@section('script')
    <script type="text/javascript">

    function show_continue_button(id){

        var id_name= '#continue';
        $('.hide_button').prop( "disabled", true );
        $(id_name).prop( "disabled", false );
        console.log(id_name);
    }

        function display_option(key){

        }
        function show_pickup_point(el) {
            var value = $(el).val();
            var target = $(el).data('target');

            // console.log(value);

            if(value == 'home_delivery'){
                if(!$(target).hasClass('d-none')){
                    $(target).addClass('d-none');
                }
            }else{
                $(target).removeClass('d-none');
            }
        }


        function session_delivery_set(el) {


            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            /*var delivery_details = $("input[name='shipping']:checked").val();*/
            var delivery_details =  $(el).val();
            $.ajax({
                url: "{{url('/session_delivery')}}",
                type: "POST",
                data: {
                    delivery_info: delivery_details,
                    _token: CSRF_TOKEN,
                },
                // dataType: 'JSON',
                success: function (response) {
                    if (response) {

                        /*<input type="hidden" id="seller_shipping_type" name="shipping_type">*/
                        $("#seller_shipping_type").val(response);
                    }
                },
            });
        }


    </script>
    <script type="text/javascript">
        function add_new_address(){
            $('#new-address-modal').modal('show');
        }
    </script>
@endsection

