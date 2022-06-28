<a href="javascript:void(0)" class="d-flex align-items-center text-reset h-100" data-toggle="dropdown"
    data-display="static">
    <div class="admin d-flax justify-items-center">
        <div class="icon">
            <span class="border rounded-circle d-inline-flex justify-content-center align-items-center"
                style="height: 45px; width: 45px; border-width: 3px; background-color:#FD6500; color:white"><i
                    class="fas fa-shopping-cart fa-lg d-inline-block"></i></span>
        </div>
    </div>

    @if (Session::has('cart'))
        <span class="badge badge-primary badge-inline badge-pill"
            style="position: relative; top: -20px; right: 5px;">{{ count(Session::get('cart')) }}</span>

    @else
        <span class="badge badge-primary badge-inline badge-pill"
            style="position: relative; top: -20px; right: 5px;">0</span>
    @endif
    <span class="nav-box-text">{{ translate('Cart') }}</span>
</a>

<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg p-0 stop-propagation">
    {{-- {{  Session::flush()}} --}}
    @if (Session::has('cart'))

        @if (count($cart = Session::get('cart')) > 0)

            <div class="p-3 fs-15 fw-600 p-3 border-bottom">
                {{ translate('Cart Items') }}
            </div>
            <ul class="h-250px overflow-auto c-scrollbar-light list-group list-group-flush">
                @php
                    $total = 0;
                    $product_price_discount_commision_rate = 0;
                    $commission_and_shipping_cost = 0;
                @endphp
                @foreach ($cart as $key => $cartItem)
                    @php
                        $product = \App\Product::find($cartItem['id']);
                        //al start
                        $price = $product->unit_price;
                        
                        $flash_deals = \App\FlashDeal::where('status', 1)->get();
                        $inFlashDeal = false;
                        foreach ($flash_deals as $flash_deal) {
                            if (
                                $flash_deal != null &&
                                $flash_deal->status == 1 &&
                                strtotime(date('d-m-Y')) >= $flash_deal->start_date &&
                                strtotime(date('d-m-Y')) <= $flash_deal->end_date &&
                                FlashDealProduct::where('flash_deal_id', $flash_deal->id)
                                    ->where('product_id', $id)
                                    ->first() != null
                            ) {
                                $flash_deal_product = FlashDealProduct::where('flash_deal_id', $flash_deal->id)
                                    ->where('product_id', $id)
                                    ->first();
                                if ($flash_deal_product->discount_type == 'percent') {
                                    $price -= ($price * $flash_deal_product->discount) / 100;
                                } elseif ($flash_deal_product->discount_type == 'amount') {
                                    $price -= $flash_deal_product->discount;
                                }
                                $inFlashDeal = true;
                                break;
                            }
                        }
                        $price_discount = 0;
                        if (!$inFlashDeal) {
                            if ($product->discount_type == 'percent') {
                                $price_discount = ($price * $product->discount) / 100;
                                $price -= $price_discount;
                            } elseif ($product->discount_type == 'amount') {
                                $price_discount = $product->discount;
                                $price -= $price_discount;
                            }
                        }
                        if ($product->tax_type == 'percent') {
                            $price_tax = ($price * $product->tax) / 100;
                            $price += $price_tax;
                        } elseif ($product->tax_type == 'amount') {
                            $price_tax = $product->tax;
                            $price += $price_tax;
                        }
                        
                        if ($product->category->commision_rate) {
                            if ($product->added_by == 'admin') {
                                $price += 0;
                            } else {
                                $commission_and_shipping_cost = (($product->unit_price + $price_tax - $price_discount) * $product->category->commision_rate) / 100;
                            }
                        }
                        if ($product->shipping_cost) {
                            $commission_and_shipping_cost += $product->shipping_cost;
                        }
                        
                        //end al
                        
                        $total = $total + ($cartItem['price'] + $commission_and_shipping_cost + $price_tax) * $cartItem['quantity'];
                    @endphp
                    @if ($product != null)
                        <li class="list-group-item">
                            <span class="d-flex align-items-center">
                                <a href="{{ route('product', $product->slug) }}"
                                    class="text-reset d-flex align-items-center flex-grow-1">
                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                        data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                        class="img-fit lazyload size-60px rounded"
                                        alt="{{ $product->getTranslation('name') }}">
                                    <span class="minw-0 pl-2 flex-grow-1">
                                        <span class="fw-600 mb-1 text-truncate-2">
                                            {{ $product->getTranslation('name') }}
                                        </span>
                                        <span class="">{{ $cartItem['quantity'] }}x</span>
                                        <span
                                            class="">{{ single_price($cartItem['price'] + $commission_and_shipping_cost + $price_tax) }}</span>
                                    </span>
                                </a>
                                <span class="">
                                    <button onclick="removeFromCart({{ $key }})"
                                        class="btn btn-sm btn-icon stop-propagation">
                                        <i class="la la-close"></i>
                                    </button>
                                </span>
                            </span>
                        </li>
                    @endif
                @endforeach
            </ul>
            <div class="px-3 py-2 fs-15 border-top d-flex justify-content-between">
                <span class="opacity-60">{{ translate('Subtotal') }}</span>
                <span class="fw-600">{{ single_price($total) }}</span>
            </div>
            <div class="px-3 py-2 text-center border-top">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="{{ route('cart') }}" class="btn btn-soft-primary btn-sm">
                            {{ translate('View cart') }}
                        </a>
                    </li>
                    @if (Auth::check())
                        <li class="list-inline-item">
                            <a href="{{ route('checkout.shipping_info') }}" class="btn btn-primary btn-sm">
                                {{ translate('Checkout') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        @else
            <div class="text-center p-3">
                <i class="las la-frown la-3x opacity-60 mb-3"></i>
                <h3 class="h6 fw-700">{{ translate('Your Cart is empty') }}</h3>
            </div>
        @endif
    @else
        <div class="text-center p-3">
            <i class="las la-frown la-3x opacity-60 mb-3"></i>
            <h3 class="h6 fw-700">{{ translate('Your Cart is empty') }}</h3>
        </div>
    @endif
</div>
