<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bela Obela</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">

    <style>
        @import url('https://fonts.maateen.me/solaiman-lipi/font.css');
    </style>
    <style media="all">
        @php
                if(Session::has('currency_code')){
                $currency_code = Session::get('currency_code');
            }
            else{
                $currency_code = \App\Currency::findOrFail(get_setting('system_default_currency'))->code;
            }
        @endphp
        @if($currency_code == 'BDT')
        @font-face {
            font-family: 'Hind Siliguri';
            src: url("{{ static_asset('assets/fonts/HindSiliguri-Regular.ttf') }}") format("truetype");
            font-weight: normal;
            font-style: normal;
        }



        * {
            margin: 0;
            padding: 0;
            line-height: 1.1;
            font-family: 'Hind Siliguri';
            color: #333542;
        }

        @elseif($currency_code == 'ILS')
@font-face {
            font-family: 'Cairo';
            src: url("{{ static_asset('assets/fonts/Cairo-Regular.ttf') }}") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        * {
            margin: 0;
            padding: 0;
            line-height: 1.1;
            font-family: 'Cairo';
            color: #333542;
        }

        @else
            @font-face {
            font-family: 'Roboto';
            src: url("{{ static_asset('assets/fonts/Roboto-Regular.ttf') }}") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        * {
            margin: 0;
            padding: 0;
            line-height: 1;
            font-family: 'Roboto';
            color: #333542;
        }

        @endif
        body {
            font-size: 0.688rem;

        }

        .gry-color *,
        .gry-color {
            color: #878f9c;
        }

        * {
            margin: 0;
            padding: 0
        }

        table {
            width: 100%;
        }

        table th {
            font-weight: normal;
        }

        table.padding th {
            padding: .2rem .3rem;
        }

        table.padding td {
            padding: .2rem .3rem;
        }

        table.sm-padding td {
            padding: .1rem .3rem;
        }

        .border-bottom td,
        .border-bottom th {
            border-bottom: 1px solid #eceff4;
        }

        td {
            border: 1px solid #ddd;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        #payment {
            width: 50%;
            background-color: #f16522;
            margin-top: 10px;
        }

        #payment p {
            background-color: #f16522;
            color: #ffffff;
        }

    </style>
</head>
<body>
<div>

    @php
        $logo = get_setting('header_logo');
    @endphp

    <div style="background: #ffffff;padding: 1rem;">
        <table class="table" style="border:none">
            <tbody style="border:none">
            <tr style="border:none">

                <td style="border:none;width:30%;vertical-align: text-top;">
                    <p style="left:0px;font-size:22px"><strong>{{ get_setting('site_name') }}</strong></p>
                    <p style="left:0px">{{ get_setting('contact_address') }}</p>

                </td>


                <td style="border:none;width:40%;text-align: center;vertical-align: text-top;">
                    @if($logo != null)
                        <img src="{{ uploaded_asset($logo) }}" style="display:inline-block; height:60px">
                    @else
                        <img src="{{ static_asset('assets/img/logo.png') }}" style="display:inline-block; height:60px">
                    @endif
                </td>


                <td style="border:none; text-align:left;float:right;width:30%;vertical-align: text-top;">
                    <h3 style="font-size: 1.3rem;padding-left: 50px;margin-bottom:15px"
                        class="text-center strong">{{  translate('INVOICE') }}</h3>
                    <p class="small" style="left:0px"><strong><span class="small">{{  translate('Order Date') }}:</span></strong>
                        <span class=" strong">{{\Carbon\Carbon::parse($order->date)->format('j F Y')}}</span></p>
                    <p class="small" style="left:0px"><strong><span class="small">{{  translate('Delivery Date') }}:</span></strong>
                        <span class=" strong">@if($order->delivery_date != null)
                            {{\Carbon\Carbon::parse($order->delivery_date)->format('j F Y')}}
                            @else
                            @endif</span></p>
                    <p class=" small" style="left:0px"><strong><span class="small">{{  translate('Order ID') }}:</span></strong>
                        <span class="strong">{{ $order->code }}</span></p>

                        @if($order->payment_status == "partial")
                            @php
                            $adTotal=0;
                            foreach ($order->advancePayment as $ad) {
                                $s=json_decode($ad->payment);
                                $adTotal=$adTotal+$s->amount;

                            }
                        @endphp


                        <p class=" small" style="left:0px"><strong><span class="small"> Partial payment: </span></strong>
                        <span class="strong"> {{ single_price($adTotal)}} </span></p>
                        <p class=" small" style="left:0px"><strong><span class="small"> Due: </span></strong>
                        <span class="strong"> {{ single_price($order->grand_total - $adTotal) }} </span></p>
                        @endif
                     <div id="payment">
                        @php
                            $status_name = ' ';
                            $payment_type = ' ';
                            if($order->payment_status == 'paid'){
                                $status_name = 'PAID';
                            }
                            else{
                                $status_name = 'DUE';
                            }
                            if($order->payment_type != 'cash_on_delivery'){
                                $payment_type = 'Advance Payment';
                            }
                            else{
                                $payment_type = 'Cash on Delivery';
                            }
                        @endphp

                        <p style="border-bottom: 1px solid #776e6e;padding-left:5px">{{$status_name}}</p>
                        <p style="padding-left:5px">{{$payment_type}}</p>

                    </div>


                </td>
            </tr>

            </tbody>
        </table>
        <table class="table" style="border:none" style="margin-bottom:5px">
            @php
                $shipping_address = json_decode($order->shipping_address);
                $user_address = \App\Address::where('user_id', $order->user_id)->first();
            @endphp
            <tbody style="border:none">
            <tr style="border:none">



                <td style="border:none;text-align:left; width:30%;">
                    <p style="font-size:17px; font-weight: 600;border-bottom: 1px solid #ddd;">BILL TO</p>
                    <p style="left:0px">Contact Name: {{ $shipping_address->name }}</p>
                    <!-- <p style="left:0px"><strong>Company Name:Khan busness Limited</strong></p> -->
                    <p style="left:0px">Address: @if($user_address->set_default == 1)
                            {{ $user_address->address }}, {{ $user_address->city }},{{$user_address->country}}
                        @else
                            {{ $shipping_address->address }}, {{ $shipping_address->city }}
                            , {{ $shipping_address->country }}@endif</p>
                    <p style="left:0px">Phone Number: {{ $order->user->phone }}</p>
                    <p style="left:0px">Email: {{ $order->user->email }}</p>

                </td>
                <td style="border:none;text-align:left; width:40%;">


                </td>

                <td style="border:none; text-align:left; float:right;width:30%;"></p>
                    <p style="font-size:17px; font-weight: 600;border-bottom: 1px solid #ddd;">SHIP TO</p>
                    <p style="left:0px">Client Name: {{ $shipping_address->name }}</p>
                    <p style="left:0px">Delivery Address: {{ $shipping_address->address }}
                        , {{ $shipping_address->city }}, {{ $shipping_address->country }}</p>
                    <p style="left:0px">Phone Number: {{ $shipping_address->phone }}</p>

                </td>
            </tr>


            </tbody>
        </table>

    </div>

    <div style="padding: 1rem;">
        <table class="small border-bottom" style="border:1px solid #ddd;margin-top:-15px !important;">

            <thead>
            <tr>
                <th style="text-align: center;background-color:#f16522 !important;color:#ffffff;">S.N.</th>
                <th style="text-align: center;background-color:#f16522 !important;color:#ffffff;">DESCRIPTION</th>
                <th style="text-align: right;background-color:#f16522 !important;color:#ffffff;">QTY</th>
                <th style="text-align: right;background-color:#f16522 !important;color:#ffffff;">UNIT PRICE</th>
                <th style="text-align: center;background-color:#f16522 !important;color:#ffffff;">TOTAL</th>
                <!-- <th style="text-align: center;background-color:#f16522 !important;color:#ffffff;">Warranty Expire</th> -->

            </tr>
            </thead>
            <tbody class="strong">
            @foreach ($order->orderDetails as $key => $orderDetail)
                @php
                    $parts_warranty = json_decode($orderDetail->parts_warranty);

                @endphp
                @if ($orderDetail->product != null)
                @if($orderDetail->delivery_status != "delivery_status")
                    @if ($orderDetail->delivery_status != "cancel" )
                        <tr>
                            <td style="text-align: center;">{{$loop->iteration}}</td>

                            <td style="text-align: left;"><span style="font-weight: bold;">Product Name: </span>{{ $orderDetail->product->name }} @if($orderDetail->variation != null) ({{ $orderDetail->variation }}) @endif <br>
                            @if($orderDetail->warranty != null && $orderDetail->warranty != 0)
                                @php
                                    $dateToModify = '+'.$orderDetail->warranty.'days';
                                    $expireDate = new \DateTime();
                                    $expireDate = $expireDate->modify($dateToModify);
                                    $order_expire_at = $expireDate->format('d-m-Y');
                                @endphp

                                <span style="font-weight: bold;">Product Warranty </span>Expire Date: {{$order_expire_at}}<br>
                            @endif
                                @if($orderDetail->parts_warranty != null)
                                <span style="font-weight: bold;">Parts Warranty </span>Expire Date: <br>
                                @foreach($parts_warranty as $item)
                                    @php
                                    $dateToModify = '+'.$item->warranty_days.'days';
                                    $expireDate = new \DateTime();
                                    $expireDate = $expireDate->modify($dateToModify);
                                    $order_expire_at = $expireDate->format('d-m-Y');
                                    @endphp

                                    {{$item->parts_name}} -- {{$order_expire_at}} <br>
                                @endforeach
                                @endif

                            </td>
                            <td style="text-align: right;padding-right:5px;">{{ $orderDetail->quantity }}</td>
                            <td style="text-align: right;padding-right:5px;">{{ single_price((($orderDetail->price+ $orderDetail->commision)/$orderDetail->quantity)+ $orderDetail->shipping_cost ) }}</td>
                            <td style="text-align: right;padding-right:5px;">{{ single_price(((($orderDetail->price+ $orderDetail->commision)/$orderDetail->quantity)*$orderDetail->quantity)+($orderDetail->shipping_cost*$orderDetail->quantity)) }}</td>

                        </tr>
                    @endif
                    @endif
                @endif
            @endforeach
            </tbody>
        </table>
        <table class="table" style="border:none;">
            <tbody style="border:none;">
            <tr>

                <td style="border: none; vertical-align: bottom;width:55% ">
                    <div style="border:1px solid #776e6e;">
                        <p style="font-size:13px; margin-top: 5px; font-weight: 600;margin-left:5px">Payment
                            Instructions:</p>
                        <p style="font-size:12px; font-weight: 500;margin-left:5px;margin-bottom:5px">Please login to
                            your account then select your payment option</p>
                    </div>
                </td>
                <td style="text-align: right;border:none;width:27% ">
                    {{--<p>SUBTOTAL</p>--}}
                    <p>DISCOUNT</p>
                    {{--<p>SUBTOTAL LESS DISCOUNT</p>--}}
                    <p>VAT & TAX </p>
                    <p>DELIVERY CHARGE</p>
                    <p>TOTAL</p>
                    {{--<p style="font-weight: 600; padding-top:7px;">Total Amount</p>--}}
                </td>
                <td style="text-align: right;border:none;width:20% ">
                    {{--<p style="border-bottom: 1px solid #776e6e;">{{ single_price($order->orderDetails->sum('price') + $order->orderDetails->sum('commision')+$order->orderDetails->sum('shipping_cost')) }}</p>--}}
                    <p style="border-bottom: 1px solid #776e6e;">{{ single_price($order->coupon_discount) }}</p>
                    {{-- <p style="border-bottom: 1px solid #776e6e;">20.000</p>--}}
                    <p style="border-bottom: 1px solid #776e6e;">{{ single_price($order->orderDetails->sum('tax')) }}</p>
                    <p style="border-bottom: 1px solid #000000;">{{ single_price($order->orderDetails->sum('delivry_methods_charge')) }}</p>
                    <p style="border-bottom: 1px solid #776e6e;">{{ single_price($order->grand_total) }}</p>
                    {{--<p style="background-color: #ddc4ca !important;border-top: 1px solid #000000;border-bottom: 1px solid #000000;">{{ single_price($order->orderDetails->sum('delivry_methods_charge')) }}</p>--}}
                </td>

            </tr>
            {{--<tr>
                <td colspan="3" style="text-align: right;border:none;width:20% "><p
                        style="font-weight: 600; padding-top:7px">Amount in Word: <span
                            style="border-bottom: 1px solid #000000;">Two thousand four hundred taka only</span></p>
                </td>
            </tr>--}}

            </tbody>
        </table>
        @php
        $pay_gateway = json_decode($order->payment_details);
        @endphp
        @if($pay_gateway)
        <table class="table" style="border:1px solid #776e6e;margin-top: 20px">
            <tbody>
            <tr style="border:none">
                <td class="text-center" style="border:none; text-align:center"><strong>Transaction Date</strong></td>
                <td class="text-center" style="border:none;text-align:center"><strong>Gateway</strong></td>
                <td class="text-center" style="border:none;text-align:center"><strong>Transaction ID</strong></td>
                <td class="text-center" style="border:none;text-align:center"><strong>Amount</strong></td>
            </tr>

                <tr style="border:none">


                    @if($order->payment_type == 'aamarpay')
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{ date('d-m-Y', $order->date) }}</td>
                        <td class="text-center"
                            style="border:none;background-color: #8edd2a !important;text-align:center;padding-bottom:5px">{{$pay_gateway->card_type}}</td>
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{$pay_gateway->opt_a}}</td>
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{ single_price($order->grand_total) }}</td>
                    @endif
                    @if($order->payment_type == 'bkash')
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{ date('d-m-Y', $order->date) }}</td>
                        <td class="text-center"
                            style="border:none;background-color: #8edd2a !important;text-align:center;padding-bottom:5px">{{$order->payment_type}}</td>
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{$pay_gateway->paymentID}}</td>
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{ single_price($order->grand_total) }}</td>
                    @endif
                    @if($order->payment_type == 'nagad')
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{ date('d-m-Y', $order->date) }}</td>
                        <td class="text-center"
                            style="border:none;background-color: #8edd2a !important;text-align:center;padding-bottom:5px">{{$order->payment_type}}</td>
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{$pay_gateway->merchantId}}</td>
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{ single_price($order->grand_total) }}</td>
                    @endif
                    @if($order->payment_type == 'sslcommerz')
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{ date('d-m-Y', $order->date) }}</td>
                        <td class="text-center"
                            style="border:none;background-color: #8edd2a !important;text-align:center;padding-bottom:5px">{{$pay_gateway->card_type}}</td>
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{$pay_gateway->tran_id}}</td>
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{single_price($pay_gateway->amount)}}</td>
                    @endif
                    @if($order->payment_type == 'cash_on_delivery')
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{ date('d-m-Y', $order->date) }}</td>
                        <td class="text-center"
                            style="border:none;background-color: #8edd2a !important;text-align:center;padding-bottom:5px">
                            Cash On Delivery
                        </td>
                        <td class="text-center"
                            style="border:none;text-align:center;padding-bottom:5px">{{$order->code}}</td>

                    @endif

                </tr>


            </tbody>
        </table>
        @endif

        <table class="table" style="border:none;">
            <tbody style="border:none">
            <tr style="border:none">

                <td style="border:none;text-align:left;width:70%">

                    <p style="left:0px;margin-top:50px">_______________________</p>
                    <p style="left:0px;padding-left:50px">Signature</p>
                    <p style="left:0px;padding-left:30px">Account Manager</p>


                </td>


                <td style="border:none;text-align:right !important;width:30%;">

                    <p style="left:0px;margin-top:50px;">_______________________</p>
                    <p style="left:0px;padding-right:50px">Signature</p>
                    <p style="left:0px;padding-right:50px">Customer</p>


                </td>

            </tr>

            </tbody>
        </table>
        <table class="table" style="border:none;margin-bottom: 20px">
            <tbody style="border:none">
            <tr style="border:none">
                <td style="border:none;float:right">

                    <p style="float:right;">Receiver name:...............................................................................</p><br>
                    <p style="float:right;margin-top: 15px">Phone Number:...............................................................................</p>

                </td>

            </tr>

            </tbody>
        </table>

        <table class="table" style="border:none;margin-top: 50px">
            <tbody style="border:none">
            <tr style="border:none">
                <td style="border:none;float:left; background-color:#dbdef5 !important">
                    <p style="font-size: 10px; font-weight: 600;margin-top: 0px; margin-bottom:0px; padding-top:0px; padding-bottom:0px">
                        <u>Return policy of ‘BelaObela:</u></p>
                    <p style="font-size: 10px;margin-top: 0px; margin-bottom: 0px; padding-top:0px; padding-bottom:0px">
                        Please note that you must contact us instantly after receiving a defective or broken item on
                        delivery. You must contact us over phone and apply via the return form in our website. You must
                        return the product with the delivery man as well. We'll bear the fee for return delivery. If you
                        do not inform us at the time of delivery, the item will not be taken back and ‘BelaObela’ will
                        not be liable. Customers are requested to contact our customer care team as soon as possible for
                        return of unwanted products.</p>
                    <p style="font-size: 10px; font-weight: 600;margin-top: 1px; margin-bottom:0px; padding-top:1px; padding-bottom:0px">
                        <u>Steps to return the product:</u></p>
                    <p style="font-size: 10px;margin-top: 0px; margin-bottom: 0px; padding-top:0px; padding-bottom:0px">
                        At the time of delivery, if you are not satisfied with the delivered product or if the model
                        does not match, you must contact us instantly over phone. You have to fill up and submit our
                        complaint form in the website as well. You must return the product with the delivery guy, if the
                        products you have got are 'damaged',' faulty' or 'not as defined' and we will solve your issue
                        within 3 working days (outside Dhaka 5 working days) after receiving your notice. You will get a
                        replacement product according to your order with a very short time. You can only cancel the
                        order or get money refund, if we are unable to deliver your ordered product. </p>
                    <p style="font-size: 10px; font-weight: 600;margin-top: 0px; margin-bottom: 0px; padding-top:0px; padding-bottom:0px">
                        <u>The product is not eligible for return, if the product is not - </u></p>
                    <p style="font-size: 10px;margin-top: 0px; margin-bottom: 0px; padding-top:0px; padding-bottom:0px">
                        1. Defective product</p>
                    <p style="font-size: 10px;margin-top: 0px; margin-bottom: 0px; padding-top:0px; padding-bottom:0px">
                        2. Physically damaged product</p>
                    <p style="font-size: 10px;margin-top: 0px; margin-bottom: 1px; padding-top:0px; padding-bottom:0px">
                        1. Product quality is not as described</p>


                </td>
            </tr>

            </tbody>
        </table>
    </div>


</div>
</body>
</html>
