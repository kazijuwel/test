<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SubSubCategory;
use App\Category;
use Session;
use App\Color;
use Cookie;
use Agent;

class CartController extends Controller
{
    protected $device;
    public function __construct()
    {
        if (!Agent::isDesktop()) {
            $this->device = 'frontend.mobile.pages';
        }
    }
    public function index(Request $request)
    {
        if (Agent::isMobile()) {
            $categories = Category::all();
            return view($this->device.'.cart',compact('categories'));
        }else{

     /*echo '<pre>';
     print_r($request->all()); exit();*/
        $categories = Category::all();
        return view('frontend.view_cart', compact('categories'));
        }
    }

    public function showCartModal(Request $request)
    {
        $product = Product::find($request->id);
        return view('frontend.partials.addToCart', compact('product'));
    }

    public function updateNavCart(Request $request)
    {
        if(Agent::isMobile()){
            if(Session::has('cart'))
            {
                return count(Session::get('cart'));

            }
            else{
                return 0;
            }
            //return view($this->device.'.partials.updatecart');
        }else{
            return view('frontend.partials.cart');
        }

    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);

        $data = array();
        $data['id'] = $product->id;
        $data['owner_id'] = $product->user_id;
        $data['product_payment_type'] = $product->payment_type;
        $str = '';
        $tax = 0;

        if($product->digital != 1 && $request->quantity < $product->min_qty) {
            return array('status' => 0, 'view' => view('frontend.partials.minQtyNotSatisfied', [
                'min_qty' => $product->min_qty
            ])->render());
        }


        //check the color enabled or disabled for the product
        if($request->has('color')){
            $data['color'] = $request['color'];
            $str = Color::where('code', $request['color'])->first()->name;
        }

        if ($product->digital != 1) {
            //Gets all the choice values of customer choice option and generate a string like Black-S-Cotton
            foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
                if($str != null){
                    $str .= '-'.str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                }
                else{
                    $str .= str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                }
            }
        }

        $data['variant'] = $str;

        if($str != null && $product->variant_product){
            $product_stock = $product->stocks->where('variant', $str)->first();
            $price = $product_stock->price;
            $quantity = $product_stock->qty;

            if($quantity < $request['quantity']){
                return array('status' => 0, 'view' => view('frontend.partials.outOfStockCart')->render());
            }
        }
        else{
            $price = $product->unit_price;
        }

        //discount calculation based on flash deal and regular discount
        //calculation of taxes
        $flash_deals = \App\FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1  && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first() != null) {
                $flash_deal_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
                if($flash_deal_product->discount_type == 'percent'){
                    $price_discount = ($price*$flash_deal_product->discount)/100;
                    $price -= $price_discount;
                }
                elseif($flash_deal_product->discount_type == 'amount'){
                    $price_discount = $flash_deal_product->discount;
                    $price -= $price_discount;
                }
                $inFlashDeal = true;
                break;
            }
        }
        if (!$inFlashDeal) {
            if($product->discount_type == 'percent'){
                $price_discount = ($price*$product->discount)/100;
                $price -= $price_discount;
            }
            elseif($product->discount_type == 'amount'){
                $price_discount = $product->discount;
                $price -= $price_discount;
            }
        }

        if($product->tax_type == 'percent'){
            $price_tax = ($price*$product->tax)/100;
            $tax = $price_tax;
        }
        elseif($product->tax_type == 'amount'){
            $price_tax = $product->tax;
            $tax = $price_tax;
        }

        $data['quantity'] = $request['quantity'];
        $data['price'] = $price;
        $data['tax'] = $tax;
        $data['shipping'] = 0;
        $data['shipping_cost'] = 0;
        //saif
        $data['shipping_type'] = "home_delivery";
        //saif
        $data['product_referral_code'] = null;
        $data['digital'] = $product->digital;
        //al
        if ($product->category->commision_rate) {
            if ($product->added_by == 'admin') {
               $data['commision_rate'] = 0;
            } else {
                $data['commision_rate']= ((($product->unit_price + $price_tax) - $price_discount) * $product->category->commision_rate) / 100;
            }

        }
        if ($product->shipping_cost) {
            $data['shipping_cost'] = $product->shipping_cost;
        }


        //endal
        if ($request['quantity'] == null){
            $data['quantity'] = 1;
        }

        if(Cookie::has('referred_product_id') && Cookie::get('referred_product_id') == $product->id) {
            $data['product_referral_code'] = Cookie::get('product_referral_code');
        }

        if($request->session()->has('cart')){
            $foundInCart = false;
            $cart = collect();

            foreach ($request->session()->get('cart') as $key => $cartItem){
                if($cartItem['id'] == $request->id){
                    if($cartItem['variant'] == $str && $str != null){
                        $product_stock = $product->stocks->where('variant', $str)->first();
                        $quantity = $product_stock->qty;

                        if($quantity < $cartItem['quantity'] + $request['quantity']){
                            return array('status' => 0, 'view' => view('frontend.partials.outOfStockCart')->render());
                        }
                        else{
                            $foundInCart = true;
                            $cartItem['quantity'] += $request['quantity'];
                        }
                    }
                }
                $cart->push($cartItem);
            }

            if (!$foundInCart) {
                $cart->push($data);
            }
            $request->session()->put('cart', $cart);
        }
        else{
            $cart = collect([$data]);
            $request->session()->put('cart', $cart);
        }
        if(Agent::isMobile()){
            return array('status' => 1, 'view' => view('frontend.mobile.partials.addedToCart', compact('product', 'data'))->render());
        }else{
            return array('status' => 1, 'view' => view('frontend.partials.addedToCart', compact('product', 'data'))->render());
        }


    }

    //removes from Cart
    public function removeFromCart(Request $request)
    {
        if(Agent::isMobile())
        {
            if($request->session()->has('cart')){
            $cart = $request->session()->get('cart', collect([]));
            $cart->forget($request->key);
            $request->session()->put('cart', $cart);
        }
        return view('frontend.mobile.partials.cart_details');
        }else{
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart', collect([]));
            $cart->forget($request->key);
            $request->session()->put('cart', $cart);
        }
        return view('frontend.partials.cart_details');
    }
    }

    //updated the quantity for a cart item
    public function updateQuantity(Request $request)
    {
        if(Agent::isMobile()){
            $cart = $request->session()->get('cart', collect([]));
            $cart = $cart->map(function ($object, $key) use ($request) {
                if($key == $request->key){
                    $product = \App\Product::find($object['id']);
                    if($object['variant'] != null && $product->variant_product){
                        $product_stock = $product->stocks->where('variant', $object['variant'])->first();
                        $quantity = $product_stock->qty;
                        if($quantity >= $request->quantity){
                            if($request->quantity >= $product->min_qty){
                                $object['quantity'] = $request->quantity;
                            }
                        }
                    }
                    elseif ($product->current_stock >= $request->quantity) {
                        if($request->quantity >= $product->min_qty){
                            $object['quantity'] = $request->quantity;
                        }
                    }
                }
                return $object;
            });
            $request->session()->put('cart', $cart);

            return view('frontend.mobile.partials.cart_details');

        }else{
        $cart = $request->session()->get('cart', collect([]));
        $cart = $cart->map(function ($object, $key) use ($request) {
            if($key == $request->key){
                $product = \App\Product::find($object['id']);
                if($object['variant'] != null && $product->variant_product){
                    $product_stock = $product->stocks->where('variant', $object['variant'])->first();
                    $quantity = $product_stock->qty;
                    if($quantity >= $request->quantity){
                        if($request->quantity >= $product->min_qty){
                            $object['quantity'] = $request->quantity;
                        }
                    }
                }
                elseif ($product->current_stock >= $request->quantity) {
                    if($request->quantity >= $product->min_qty){
                        $object['quantity'] = $request->quantity;
                    }
                }
            }
            return $object;
        });
        $request->session()->put('cart', $cart);

        return view('frontend.partials.cart_details');
    }
}
}
