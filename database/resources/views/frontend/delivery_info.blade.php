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
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-map"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block text-capitalize">{{ translate('2. Shipping info')}}</h3>
                            </div>
                        </div>
                        <div class="col active">
                            <div class="text-center text-primary">
                                <i class="la-3x mb-2 las la-truck"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block text-capitalize">{{ translate('3. Delivery info')}}</h3>
                            </div>
                        </div>
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
                        $admin_products = array();
                        $seller_products = array();
                        foreach (Session::get('cart') as $key => $cartItem){
                            if(\App\Product::find($cartItem['id'])->added_by == 'admin'){
                                array_push($admin_products, $cartItem['id']);
                            }
                            else{
                                $product_ids = array();
                                if(array_key_exists(\App\Product::find($cartItem['id'])->user_id, $seller_products)){
                                    $product_ids = $seller_products[\App\Product::find($cartItem['id'])->user_id];
                                }
                                array_push($product_ids, $cartItem['id']);
                                $seller_products[\App\Product::find($cartItem['id'])->user_id] = $product_ids;
                            }
                        }


                    @endphp
                    @if (!empty($admin_products))
                    

                    
                        <form class="form-default" action="{{ route('checkout.store_delivery_info') }}" role="form" method="POST">
                            @csrf
                            <div class="card mb-3 shadow-sm border-0 rounded" style="border: 1px solid #4947a1 !important;">
                                <div class="card-header p-3" style="background: #4947a1; color: white;">
                                    <h5 class="fs-16 fw-600 mb-0">{{ translate('Products') }}</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($admin_products as $key => $cartItem)
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

                                    @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                        <div class="row border-top pt-3"
                                             style="padding-left: 15px; padding-right: 15px; padding-top: 0px !important;border-top:0px !important;">
                                            <div class="col-md-6"
                                                 style="border-right: 0px; border-top: 0px; padding-top: 10px; border-bottom: 0px;">
                                                <h6 class="fs-15 fw-600">{{ translate('Delivery System') }}</h6>
                                            </div>
                                            <!--sharif-->
                                            <div class="col-md-6"
                                                 style="border-left: 0px; border-top: 0px; padding-top: 5px; border-bottom: 0px;">
                                                <div class="row gutters-5">
                                                    <div class="col-12">
                                                        <label class="aiz-megabox d-block bg-white mb-0">
                                                            <input
                                                                type="radio"
                                                                name="shipping_type_{{ \App\User::where('user_type', 'admin')->first()->id }}"
                                                                value="home_delivery"
                                                                onchange="show_pickup_point(this)"
                                                                data-target=".pickup_point_id_admin_999"
                                                                checked
                                                            >
                                                            <span class="d-flex p-3 aiz-megabox-elem"
                                                                  onclick="show_home_delivery_option(999)">
                                                    <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                    <span
                                                        class="flex-grow-1 pl-3 fw-600">{{  translate('Select Your Delivery Option') }}</span>
                                                </span>
                                                        </label>
                                                    </div>


                                                <!-- <div class="col-6">
                                                        <label class="aiz-megabox d-block bg-white mb-0">
                                                            <input
                                                                type="radio"
                                                                name="shipping_type_{{ \App\User::where('user_type', 'admin')->first()->id }}"
                                                                value="pickup_point"
                                                                onchange="show_pickup_point(this)"
                                                                data-target=".pickup_point_id_admin_999"
                                                            >
                                                            <span class="d-flex p-3 aiz-megabox-elem"
                                                                  onclick="hide_home_delivery_option(999)">
                                                    <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                    <span
                                                        class="flex-grow-1 pl-3 fw-600">{{  translate('Pickup') }}</span>
                                                </span>
                                                        </label>
                                                    </div> -->

                                                </div>
                                                <!-- home delivery option div start -->
                                                @php

                                                    $delivry_methods = \App\DelivryMethod::where('parent_id', 0)->whereNotIn('id', [9,10])->get();
                                                @endphp
                                                <div class="mt-4" id="home_delivery_option_999">
                                                    @foreach($delivry_methods as $delivry_method)
                                                        @if(count($delivry_method->subDelivryMethod))
                                                            <div class="order-box"
                                                                 style="box-shadow: 3px 3px 5px 0px rgb(0 0 0 / 5%); border: 1px solid rgba(0, 0, 0, 0.1); padding: 10px 25px 40px;">
                                                                <h4 class="title"
                                                                    style="font-size: 16px; font-weight: 700; text-transform: uppercase; color: #143250; line-height: 28px; margin-bottom: 15px;">{{$delivry_method->title}}</h4>
                                                                <div class="packeging-area">

                                                                    @foreach($delivry_method->subDelivryMethod as $item)

                                                                        <div class="form-check">
                                                                            <input type="radio"
                                                                                   class="form-check-input"
                                                                                   id="delivery-{{$item->id}}"
                                                                                   name="shipping"
                                                                                   value="{{$item->id}}"
                                                                                   {{--checked=""--}} onclick="session_delivery_set(this); show_continue_button({{ App\User::where('user_type', 'admin')->first()->id }});">
                                                                            <span class="checkmark"></span>
                                                                            <label class="form-check-label"
                                                                                   for="free-shepping3">
                                                                                {{$item->title}}


                                                                            </label>
                                                                        </div>
                                                                    @endforeach


                                                                </div>

                                                            </div>
                                                        @else

                                                            <div class="order-box"
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
                                                                                   {{--checked=""--}} onclick="session_delivery_set(this);">
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
                                                <!-- home delivery option div end -->
                                                <div class="mt-4 pickup_point_id_admin common-none"
                                                     id="pickup_point_999">
                                                    <select
                                                        class="form-control aiz-selectpicker"
                                                        name="pickup_point_id_{{ \App\User::where('user_type', 'admin')->first()->id }}"
                                                        data-live-search="true">
                                                        <option>{{ translate('Select your nearest pickup point')}}</option>
                                                        @foreach (\App\PickupPoint::where('pick_up_status',1)->get() as $key => $pick_up_point)
                                                            <option
                                                                value="{{ $pick_up_point->id }}"
                                                                data-content="<span class='d-block'>
                                                                    <span class='d-block fs-16 fw-600 mb-2'>{{ $pick_up_point->getTranslation('name') }}</span>
                                                                    <span class='d-block opacity-50 fs-12'><i class='las la-map-marker'></i> {{ $pick_up_point->getTranslation('address') }}</span>
                                                                    <span class='d-block opacity-50 fs-12'><i class='las la-phone'></i>{{ $pick_up_point->phone }}</span>
                                                                </span>"
                                                            >
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <!--end delivery option sharif-->
                                        </div>
                                    @endif
                                </div>
                                <div class="card-footer justify-content-end">
                                    <button type="submit" class="hide_button btn btn-primary" disabled id="continue_{{ App\User::where('user_type', 'admin')->first()->id }}" name="owner_id" value="{{ App\User::where('user_type', 'admin')->first()->id }}" class="btn fw-600 btn-primary">{{ translate('Continue to Payment')}}</a>
                                </div>
                            </div>
                        </form>
                    @endif

                    <form class="form-default"  action="{{ route('checkout.store_delivery_info') }}" role="form" method="POST">
                        @csrf
                        @if (!empty($seller_products))
                       <!---sharif working-->

                            
                            {{-- @foreach ($seller_products as $key => $seller_product) --}}
                            {{-- {{   print_r($seller_product)}} --}}
                                <div class="card mb-3 shadow-sm border-0 rounded" style="border: 1px solid #4947a1 !important;">
                                    <div class="card-header p-3" style="background: #4947a1; color: white;">
                                        <h5 class="fs-16 fw-600 mb-0">{{ translate('Products') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            @foreach ($seller_products as $key => $seller_product)
                                            @foreach ($seller_product as $cartItem)
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
                                            @endforeach
                                        </ul>


                                        <!-- Delivery option start sabbir -->
                                        @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                            <div class="row border-top pt-3"
                                                 style="padding-left: 15px; padding-right: 15px; padding-top: 0px !important;">
                                                <div class="col-md-6"
                                                     style="  padding-top: 10px; ">
                                                    <h6 class="fs-15 fw-600">{{ translate('Delivery System') }}</h6>
                                                </div>
                                                <div class="col-md-6"
                                                     style=" padding-top: 5px; border-bottom: 0px;">
                                                    <div class="row gutters-5">
                                                        <div class="col-12">
                                                            <label class="aiz-megabox d-block bg-white mb-0">
                                                                <input
                                                                    type="radio"
                                                                    name="shipping_type_{{ $key }}"
                                                                    value="home_delivery"
                                                                    onchange="show_pickup_point(this)"
                                                                    data-target=".pickup_point_id_{{ $key }}"
                                                                    checked
                                                                >
                                                                <span class="d-flex p-3 aiz-megabox-elem"
                                                                      onclick="show_home_delivery_option({{ $key }})">
                                                                <span
                                                                    class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                                <span
                                                                    class="flex-grow-1 pl-3 fw-600">{{  translate('Select Your Delivery Option') }}</span>
                                                            </span>
                                                            </label>
                                                        </div>

                                                    @if (is_array(json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id)))

                                                        <!--  <div class="col-6">
                                                                <label class="aiz-megabox d-block bg-white mb-0">
                                                                    <input
                                                                        type="radio"
                                                                        name="shipping_type_{{ $key }}"
                                                                        value="pickup_point"
                                                                        onchange="show_pickup_point(this)"
                                                                        data-target=".pickup_point_id_{{ $key }}"
                                                                    >
                                                                    <span class="d-flex p-3 aiz-megabox-elem" onclick="hide_home_delivery_option({{ $key }})">
                                                                <span
                                                                    class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                                <span
                                                                    class="flex-grow-1 pl-3 fw-600">{{  translate('Pickup') }}</span>
                                                            </span>
                                                                </label>
                                                            </div> -->

                                                        @endif
                                                    </div>
                                                    <!-- home delivery option div start -->
                                                    @php

                                                        $delivry_methods = \App\DelivryMethod::where('parent_id', 'parent_id')->whereNotIn('id', [9,10])->get();
                                                    @endphp
                                                    <div class="mt-4 " id="home_delivery_option_{{ $key }}">
                                                        @foreach($delivry_methods as $delivry_method)
                                                        
                                                            @if(count($delivry_method->subDelivryMethod))
                                                                <div class="order-box"
                                                                     style="box-shadow: 3px 3px 5px 0px rgb(0 0 0 / 5%); border: 1px solid rgba(0, 0, 0, 0.1); padding: 10px 25px 40px;">
                                                                    <h4 class="title"
                                                                        style="font-size: 16px; font-weight: 700; text-transform: uppercase; color: #143250; line-height: 28px; margin-bottom: 15px;">{{$delivry_method->title}}</h4>
                                                                    <div class="packeging-area">

                                                                        @foreach($delivry_method->subDelivryMethod as $item)

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
                                                                        @endforeach


                                                                    </div>

                                                                </div>
                                                            @else

                                                                <div class="order-box"
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
                                                                                       {{--checked=""--}} onclick="session_delivery_set(this);">
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
                                                    <!-- home delivery option div end -->
                                                    @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                        @if (is_array(json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id)))
                                                            <div
                                                                class="mt-4 common-none pickup_point_id_{{ $key }}"
                                                                id="pickup_point_{{ $key }}">
                                                                <select
                                                                    class="form-control aiz-selectpicker"
                                                                    name="pickup_point_id_{{ $key }}"
                                                                    data-live-search="true"
                                                                >
                                                                    <option>{{ translate('Select your nearest pickup point')}}</option>
                                                                    @foreach (json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id) as $pick_up_point)
                                                                        @if (\App\PickupPoint::find($pick_up_point) != null)
                                                                            <option
                                                                                value="{{ \App\PickupPoint::find($pick_up_point)->id }}"
                                                                                data-content="<span class='d-block'>
                                                                                    <span class='d-block fs-16 fw-600 mb-2'>{{ \App\PickupPoint::find($pick_up_point)->getTranslation('name') }}</span>
                                                                                    <span class='d-block opacity-50 fs-12'><i class='las la-map-marker'></i> {{ \App\PickupPoint::find($pick_up_point)->getTranslation('address') }}</span>
                                                                                    <span class='d-block opacity-50 fs-12'><i class='las la-phone'></i> {{ \App\PickupPoint::find($pick_up_point)->phone }}</span>
                                                                                </span>"
                                                                            >
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                          @endif
                                    <!-- Delivery option End sabbir -->

                                    </div>
                                    <div class="card-footer justify-content-end">
                                        <button type="submit" class="hide_button btn btn-primary" disabled id="continue_{{ $key }}" name="owner_id" value="{{ $key }}" class="btn fw-600 btn-primary">{{ translate('Continue to Payment')}}</a>
                                    </div>
                                </div>
                            {{-- @endforeach --}}

                            <!--end sharif-->
                        @endif
                    </form>
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

@section('script')
    <script type="text/javascript">

    function show_continue_button(id){
        var id_name= '#continue_'+id;
        $('.hide_button').prop( "disabled", true );
        $(id_name).prop( "disabled", false );
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
@endsection

