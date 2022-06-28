<ul class="list-group list-group-flush">
    <a href="{{ route('dashboard') }}"
        class="list-group-item list-group-item-action {{ areActiveRoutes(['dashboard']) }}"><i class="fa fa-home"
            aria-hidden="true"></i> Dashboard</a>
    <a href="{{ route('purchase_history.index') }}"
        class="list-group-item list-group-item-action {{ areActiveRoutes(['purchase_history.index']) }}"><i
            class="fa fa-file-alt" aria-hidden="true"></i> Purchase History</a>
    <a href="{{ route('customer_refund_request') }}"
        class="list-group-item list-group-item-action {{ areActiveRoutes(['customer_refund_request']) }}"><i
            class="fa fa-backward aiz-side-nav-icon" aria-hidden="true"></i> Sent Refund Request</a>
    <a href="{{ route('wishlists.index') }}"
        class="list-group-item list-group-item-action {{ areActiveRoutes(['wishlists.index']) }}"><i
            class="fa fa-heart" aria-hidden="true"></i> Wishlist</a>
    <!---Seller-->
    @if (Auth::user()->user_type == 'seller')
        <a href="{{ route('seller_upload_brand') }}"
            class="list-group-item list-group-item-action {{ areActiveRoutes(['seller_upload_brand', 'seller_edit_brand']) }}"><i
                class="fa fa-retweet" aria-hidden="true"></i> {{ translate('Brands') }}</a>

        <a href="{{ route('seller.products') }}"
            class="list-group-item list-group-item-action {{ areActiveRoutes(['seller.products', 'seller.products.upload', 'seller.products.edit']) }}"><i
                class="fa fa-th-large" aria-hidden="true"></i> {{ translate('Products') }}</a>

        <a href="{{ route('bulk_seller') }}"
            class="list-group-item list-group-item-action {{ areActiveRoutes(['bulk_seller']) }}"><i
                class="fa fa-upload " aria-hidden="true"></i> {{ translate('Product Bulk Upload') }}</a>
    @endif
    <!--hh-->
    @if (Auth::user()->user_type == 'seller')
        @if (\App\Addon::where('unique_identifier', 'pos_system')->first() != null && \App\Addon::where('unique_identifier', 'pos_system')->first()->activated)
            @if (\App\BusinessSetting::where('type', 'pos_activation_for_seller')->first() != null && \App\BusinessSetting::where('type', 'pos_activation_for_seller')->first()->value != 0)
                <a href="{{ route('poin-of-sales.seller_index') }}"
                    class="list-group-item list-group-item-action {{ areActiveRoutes(['poin-of-sales.seller_index']) }}"><i
                        class="fa fa-fax" aria-hidden="true"></i> {{ translate('POS Manager') }}</a>
            @endif
        @endif

        @php
            $orders = DB::table('orders')
                ->orderBy('code', 'desc')
                ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                ->where('order_details.seller_id', Auth::user()->id)
                ->where('orders.viewed', 0)
                ->select('orders.id')
                ->distinct()
                ->count();
        @endphp
        @php
            $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
            $club_point_addon = \App\Addon::where('unique_identifier', 'club_point')->first();
        @endphp

        <a href="{{ route('orders.index') }}"
            class="list-group-item list-group-item-action {{ areActiveRoutes(['orders.index']) }}"><i
                class="fa fa-fax" aria-hidden="true"></i> {{ translate('Orders') }}@if ($orders > 0)
                <span class="badge badge-inline badge-success">{{ $orders }}
            @endif
            <span></a>

        @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
            <a href="{{ route('vendor_refund_request') }}"
                class="list-group-item list-group-item-action {{ areActiveRoutes(['vendor_refund_request', 'reason_show']) }}"><i
                    class="fa fa-backward" aria-hidden="true"></i> {{ translate('Received Refund Request') }}</a>
        @endif

        @php
            $review_count = DB::table('reviews')
                ->orderBy('code', 'desc')
                ->join('products', 'products.id', '=', 'reviews.product_id')
                ->where('products.user_id', Auth::user()->id)
                ->where('reviews.viewed', 0)
                ->select('reviews.id')
                ->distinct()
                ->count();
        @endphp

        <a href="{{ route('reviews.seller') }}"
            class="list-group-item list-group-item-action{{ areActiveRoutes(['reviews.seller']) }}"><i
                class="fa fa-star-half-alt" aria-hidden="true"></i> {{ translate('Product Reviews') }}</a>
        <!---hdj-->

        <a href="{{ route('shops.index') }}"
            class="list-group-item list-group-item-action{{ areActiveRoutes(['shops.index']) }}"><i
                class="fa fa-cogs" aria-hidden="true"></i> {{ translate('Shop Setting') }}</a>


        <!---sf-->


        <a href="{{ route('payments.index') }}"
            class="list-group-item list-group-item-action {{ areActiveRoutes(['payments.index']) }}"><i
                class="fa fa-history" aria-hidden="true"></i> {{ translate('Payment History') }}</a>

        <!--ar-->

        <a href="{{ route('withdraw_requests.index') }}"
            class="list-group-item list-group-item-action {{ areActiveRoutes(['withdraw_requests.index']) }}"><i
                class="fa fa-money-bill" aria-hidden="true"></i> {{ translate('Money Withdraw') }}</a>

    @endif

    <!--End seller-->





    <a href="{{ route('conversations.index') }}"
        class="list-group-item list-group-item-action {{ areActiveRoutes(['conversations.index']) }}"><i
            class="fa fa-comment" aria-hidden="true"></i> Conversations</a>
    <a href="{{ route('wallet.index') }}"
        class="list-group-item list-group-item-action {{ areActiveRoutes(['wallet.index']) }}"><i
            class="fa fa-dollar-sign" aria-hidden="true"></i> My Wallet</a>
    <a href="{{ route('support_ticket.index') }}"
        class="list-group-item list-group-item-action {{ areActiveRoutes(['support_ticket.index']) }}"><i
            class="fa fa-atom" aria-hidden="true"></i> Support Ticket</a>
    <a href="{{ route('profile') }}"
        class="list-group-item list-group-item-action {{ areActiveRoutes(['profile']) }}"><i class="fa fa-user"
            aria-hidden="true"></i> Manage Profile</a>



    @if (\App\DeliveryMan::where('user_id', Auth::id())->first())
        <a href="{{ route('deliveryman.dashboard') }}"
            class="list-group-item list-group-item-action {{ areActiveRoutes(['deliveryman.dashboard']) }}">
            <i class="fa fa-user" aria-hidden="true"></i> Delivery-Man
        </a>
    @endif







    <a href="{{ url('/logout') }}" class="list-group-item list-group-item-action "> <i class="fa fa-power-off"
            aria-hidden="true"></i> Log Out</a>

    @if (Auth::user()->user_type == 'seller')
        @if (Route::has('login'))
            <hr>
            <h4 class="h5 fw-600 text-center">{{ translate('Sold Amount') }}</h4>
            <!-- <div class="sidebar-widget-title py-3">
        <span></span>
    </div> -->
            @php
                $date = date('Y-m-d');
                $days_ago_30 = date('Y-m-d', strtotime('-30 days', strtotime($date)));
                $days_ago_60 = date('Y-m-d', strtotime('-60 days', strtotime($date)));
            @endphp
            <div class="widget-balance pb-3 pt-1">
                <div class="text-center">
                    <div class="heading-4 strong-700 mb-4">
                        @php
                            $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)
                                ->where('created_at', '>=', $days_ago_30)
                                ->get();
                            $total = 0;
                            foreach ($orderDetails as $key => $orderDetail) {
                                if ($orderDetail->order != null && $orderDetail->order != null && $orderDetail->order->payment_status == 'paid') {
                                    $total += $orderDetail->price;
                                }
                            }
                        @endphp
                        <small class="d-block fs-12 mb-2">{{ translate('Your sold amount (current month)') }}</small>
                        <span class="btn btn-primary fw-600 fs-18">{{ single_price($total) }}</span>
                    </div>
                    <table class="table table-borderless">
                        <tr>
                            @php
                                $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->get();
                                $total = 0;
                                foreach ($orderDetails as $key => $orderDetail) {
                                    if ($orderDetail->order != null && $orderDetail->order->payment_status == 'paid') {
                                        $total += $orderDetail->price;
                                    }
                                }
                            @endphp
                            <td class="p-1" width="60%">
                                {{ translate('Total Sold') }}:
                            </td>
                            <td class="p-1 fw-600" width="40%">
                                {{ single_price($total) }}
                            </td>
                        </tr>
                        <tr>
                            @php
                                $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)
                                    ->where('created_at', '>=', $days_ago_60)
                                    ->where('created_at', '<=', $days_ago_30)
                                    ->get();
                                $total = 0;
                                foreach ($orderDetails as $key => $orderDetail) {
                                    if ($orderDetail->order != null && $orderDetail->order->payment_status == 'paid') {
                                        $total += $orderDetail->price;
                                    }
                                }
                            @endphp
                            <td class="p-1" width="60%">
                                {{ translate('Last Month Sold') }}:
                            </td>
                            <td class="p-1 fw-600" width="40%">
                                {{ single_price($total) }}
                            </td>
                        </tr>
                    </table>
                </div>
                <table>

                </table>
            </div>
        @endif
    @endif
</ul>
