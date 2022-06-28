<div class="card border-0 shadow-sm rounded">
    <div class="card-header">
        <h3 class="fs-16 fw-600 mb-0">{{translate('Summary')}}</h3>
        <div class="text-right">
            <span class="badge badge-inline badge-primary">{{ count(Session::get('cart')) }} {{translate('Items')}}</span>
        </div>
    </div>
             @php

            $delivry_methods_title= '';
            $delivry_methods_delivery_charge = 0;
            $product_shipping_cost = 0;
            $product_commision_rate = 0;
            $total_kg_or_total_cft = 0;
            $delivry_methods_item_kg = 0;
            $delivry_methods_item_cft = 0;
            $seller_shipping_cost = 0;
            $delivry_methods_array = array();
            $total_delivery_charge = 0;
            $final_delivery_charge = 0;
            $commission = 0;
           @endphp
 

    <div class="card-body">
        @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
            @php
                $total_point = 0;
            @endphp
            @foreach (Session::get('cart')->where('owner_id', Session::get('owner_id')) as $key => $cartItem)
                @php
                    $product = \App\Product::find($cartItem['id']);
                    $total_point += $product->earn_point*$cartItem['quantity'];
                @endphp
            @endforeach
            <div class="rounded px-2 mb-2 bg-soft-primary border-soft-primary border">
                {{ translate("Total Club point") }}:
                <span class="fw-700 float-right">{{ $total_point }}</span>
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th class="product-name">{{translate('Product')}}</th>
                <th class="product-total text-right">{{translate('Total')}}</th>
            </tr>
            </thead>
            <tbody>
            @php
                $subtotal = 0;
                $tax = 0;
                $shipping = 0;
            @endphp
            @foreach (Session::get('cart') as $key => $cartItem)
                @php
                    $product = \App\Product::find($cartItem['id']);

                     if (Session::get('delivry_method_id')){


                    $delivry_method_id_session = Session::get('delivry_method_id');

                            $delivry_methods = \App\DelivryMethod::where('parent_id',
                            $delivry_method_id_session)->get();
                            $delivry_methods_item_kg = array();
                            $delivry_methods_item_cft = array();
                            foreach ($delivry_methods as $delivry_methods_item){


                             if($delivry_methods_item->type == 1){
                             $delivry_methods_item_kg['delivery_charge_compare'] = $product->total_kg*$delivry_methods_item->delivery_charge;
                             $delivry_methods_item_kg['delivery_charge'] = $delivry_methods_item->delivery_charge;
                             $delivry_methods_item_kg['title'] = $delivry_methods_item->title;
                             $delivry_methods_item_kg['total_kg_or_total_cft'] = $product->total_kg;
                             }
                              if($delivry_methods_item->type == 2){
                             $delivry_methods_item_cft['delivery_charge_compare'] = $product->total_cft*$delivry_methods_item->delivery_charge;
                             $delivry_methods_item_cft['delivery_charge'] = $delivry_methods_item->delivery_charge;
                             $delivry_methods_item_cft['title'] =  $delivry_methods_item->title;
                             $delivry_methods_item_cft['total_kg_or_total_cft'] = $product->total_cft;
                             }



                             }
                             if($delivry_methods_item_kg['delivery_charge_compare'] < $delivry_methods_item_cft['delivery_charge_compare']){
                            $delivry_methods_array[] = $delivry_methods_item_cft;
                             }else{
                            $delivry_methods_array[] = $delivry_methods_item_kg;
                             }








               }

                    if($product->discount_type == 'percent'){
 $price_discount = ($product->unit_price*$product->discount)/100;
 //al
   if ($product->category->commision_rate) {
            if ($product->added_by == 'admin') {
                $commission = 0;
            } else {
                $commission= ((($cartItem['price'] + $cartItem['tax'])) * $product->category->commision_rate) / 100;
            }

        }
          if ($product->shipping_cost) {
            $product_shipping_cost = $product->shipping_cost;
        }
 //end al
$subtotal += ($cartItem['price'] + $commission +$product_shipping_cost)*$cartItem['quantity'] ;
}else{

 //al
   if ($product->category->commision_rate) {
            if ($product->added_by == 'admin') {
                $commission = 0;
            } else {
                $commission= ((($cartItem['price'] + $cartItem['tax'])) * $product->category->commision_rate) / 100;
            }

        }
          if ($product->shipping_cost) {
            $product_shipping_cost = $product->shipping_cost;
        }
 //end al


$subtotal += ($cartItem['price'] + $commission + $product_shipping_cost)*$cartItem['quantity'] ;
#$subtotal += ($cartItem['price'])*$cartItem['quantity'];
}
                    #$subtotal += $cartItem['price']*$cartItem['quantity'];

                    $tax += $cartItem['tax']*$cartItem['quantity'];
                    $shipping += $cartItem['shipping'];

                    $product_name_with_choice = $product->getTranslation('name');
                    if ($cartItem['variant'] != null) {
                        $product_name_with_choice = $product->getTranslation('name').' - '.$cartItem['variant'];
                    }
                @endphp
                <tr class="cart_item">
                    <td class="product-name">
                        {{ $product_name_with_choice }}
                        <strong class="product-quantity">× {{ $cartItem['quantity'] }}</strong>
                    </td>
                    <td class="product-total text-right">
                        <span class="pl-4">{{ single_price((($cartItem['price']+$commission)*$cartItem['quantity']) +($product_shipping_cost *$cartItem['quantity'])) }}</span>
                        {{--<span class="pl-4">{{ single_price($cartItem['price']*$cartItem['quantity']) }}</span>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <table class="table">

            <tfoot>
            <tr class="cart-subtotal">
                <th>{{translate('Subtotal')}}</th>
                <td class="text-right">
                    <span class="fw-600">{{ single_price($subtotal) }}</span>
                </td>
            </tr>

            <tr class="cart-shipping">
                <th>{{translate('Tax')}}</th>
                <td class="text-right">
                    <span class="font-italic">{{ single_price($tax) }}</span>
                </td>
            </tr>
            @php


                    $min_delivery_charge = \App\MinDeliveryCharge::where('id',1)->get()->first();
                        foreach ($delivry_methods_array  as $key=>$value){


                        if($value['delivery_charge_compare'] > 0 && $value['delivery_charge_compare'] < $min_delivery_charge->minimum_charge){
                        $total_delivery_charge += $min_delivery_charge->minimum_charge;
                        }else{
                         $total_delivery_charge +=($value['delivery_charge'] * $value['total_kg_or_total_cft']) ;
                        }

                        $delivry_methods_title = $value['title'];


                        }
                       // $total_delivery_charge +=$total_delivery_charge;

        /*                $min_delivery_charge = \App\MinDeliveryCharge::where('id',1)->first();


                        if($total_delivery_charge > 0 && $total_delivery_charge < $min_delivery_charge->minimum_charge){


                            $delivry_methods_title = $min_delivery_charge->min_title;

                        }*/



                      /*  else
                            {$total_delivery_charge = $final_delivery_charge  ;
                        }*/


            @endphp

            <tr class="cart-shipping">
                {{--<th>{{translate('Delivery')}} </th>--}}
                <th>{{translate('Delivery')}} <small>({{$delivry_methods_title}})</small></th>

                <td class="text-right">

                    <span
                        class="font-italic">{{ single_price($total_delivery_charge) }}</span>
                </td>
            </tr>

            {{--<tr class="cart-shipping">
                <th>{{translate('Total Shipping')}}</th>
                <td class="text-right">
                    <span class="font-italic">{{ single_price($shipping) }}</span>
                </td>
            </tr>--}}

            @if (Session::has('coupon_discount'))
                <tr class="cart-shipping">
                    <th>{{translate('Coupon Discount')}}</th>
                    <td class="text-right">
                        <span class="font-italic">{{ single_price(Session::get('coupon_discount')) }}</span>
                    </td>
                </tr>
            @endif

            @php
                /*$total = $subtotal+$tax+$shipping+$delivry_methods_delivery_charge;*/
                $total = $subtotal+$tax+$total_delivery_charge;
                if(Session::has('coupon_discount')){
                    $total -= Session::get('coupon_discount');
                }
            @endphp

            <tr class="cart-total">
                <th><span class="strong-600">{{translate('Total')}}</span></th>
                <td class="text-right">
                    <strong><span>{{ single_price($total) }}</span></strong>
                </td>
            </tr>
            </tfoot>
        </table>

        @if (Auth::check() && \App\BusinessSetting::where('type', 'coupon_system')->first()->value == 1)
            @if (Session::has('coupon_discount'))
                <div class="mt-3">
                    <form class="" action="{{ route('checkout.remove_coupon_code') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <div class="form-control">{{ \App\Coupon::find(Session::get('coupon_id'))->code }}</div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">{{translate('Change Coupon')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            @else
                <div class="mt-3">
                    <form class="" action="{{ route('checkout.apply_coupon_code') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="code" placeholder="{{translate('Have coupon code? Enter here')}}" required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">{{translate('Apply')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        @endif
        <tr>
            <td>
                <div class="pt-1">
                    <label class="aiz-checkbox">
                        <input type="checkbox" required id="agree_checkbox">
                        <span class="aiz-square-check"></span>
                        <span>{{ translate('I agree to the')}}</span>
                    </label>
                    <a href="{{ route('terms') }}"  class="m-0">{{ translate('terms and conditions')}}</a>,
                    <a href="{{ route('returnpolicy') }}"  class="m-0">{{ translate('return policy')}}</a> &
                    <a href="{{ route('privacypolicy') }}" class="m-0">{{ translate('privacy policy')}}</a>
                </div>
            </td>
            <td>
                <div class="text-right mt-3">
                    <button type="button" onclick="submitOrder(this)" class="btn btn-info btn-block fw-600 ">{{ translate('Complete Order')}}</button>
                </div>
            </td>
        </tr>

    </div>
</div>
