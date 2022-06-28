<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bela Obela test</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
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
        *{
            margin: 0;
            padding: 0;
            line-height:1.1;
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
        *{
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
        *{
            margin: 0;
            padding: 0;
            line-height: 1;
            font-family: 'Roboto';
            color: #333542;
        }
        @endif
		body{
            font-size: 0.688rem;
        }

        .gry-color *,
        .gry-color{
            color:#878f9c;
        }
        *{margin:0;padding:0}
        table{
            width: 100%;
        }
        table th{
            font-weight: normal;
        }
        table.padding th{
            padding: .2rem .3rem;
        }
        table.padding td{
            padding: .2rem .3rem;
        }
        table.sm-padding td{
            padding: .1rem .3rem;
        }

        .border-bottom td,
        .border-bottom th{
            border-bottom:1px solid #eceff4;
        }
        td {
            border: 1px solid #ddd;
        }
        .text-left{
            text-align:left;
        }
        .text-right{
            text-align:right;
        }

        #payment {
            width: 50%;
            background-color:#f16522;
            margin-top: 10px;
        }

        #payment p {
            background-color:#f16522;
            color:#ffffff;
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
                        <img src="{{ uploaded_asset($logo) }}" style="display:inline-block; height:40px">
                    @else
                        <img src="{{ static_asset('assets/img/logo.png') }}"  style="display:inline-block; height:40px">
                    @endif
                </td>


                <td style="border:none; text-align:left;float:right;width:30%;vertical-align: text-top;" >
                    <h3 style="font-size: 1.3rem;padding-left: 50px;margin-bottom:15px" class="text-center strong">Purchase Order</h3>
                    <p class="small" style="left:0px"><strong><span class="small">{{  translate('Order Date') }}:</span></strong> <span class=" strong">{{ date('d-m-Y', $order->date) }}</span></p>
                    <p class=" small" style="left:0px"><strong><span class="small">PR NO:</span></strong> <span class="strong">{{ $order->code }}</span></p>

                </td>
            </tr>

            </tbody>
        </table>
        <table class="table" style="border:none;margin-bottom:5px; margin-top:20px" >
            @php
                $shipping_address = json_decode($order->shipping_address);
                $seller =\App\User::where('id', $order->orderDetails[0]->seller_id)->first();
                $user_address = \App\Address::where('user_id', $order->user_id)->first();
            @endphp
            <tbody style="border:none">
            <tr style="border:none">

                <td  style="border:none;text-align:left; width:30%;">
                    <p style="font-size:17px; font-weight: 600;border-bottom: 1px solid #ddd;">TO</p>
                    <p style="left:0px">Seller Name: {{ $seller->name }}</p>
                    <p style="left:0px">Company Name: {{ $seller->shop->name }}</p>
                    <!-- <p style="left:0px"><strong>Company Name:Khan busness Limited</strong></p> -->
                    <p style="left:0px">Address: @if($user_address->set_default == 1)
                    {{ $user_address->address }}, {{ $user_address->city }},{{$user_address->country}}
                    @else
                    {{ $shipping_address->address }}, {{ $shipping_address->city }}, {{ $shipping_address->country }}@endif</p>
                    <p style="left:0px">Phone Number: {{ $seller->phone }}</p>
                    @if(isset($seller->email))
                    <p style="left:0px">Email: {{ $seller->email }}</p>
                    @endif

                </td>
                <td  style="border:none;text-align:left; width:40%;">

                </td>
                <td  style="border:none;text-align:left; width:30%;">

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

                <th style="text-align: right;background-color:#f16522 !important;color:#ffffff;padding-right:5px">QTY</th>
                <th style="text-align: right;background-color:#f16522 !important;color:#ffffff;padding-right:5px">PURCHASE PRICE</th>
                <th style="text-align: center;background-color:#f16522 !important;color:#ffffff;padding-right:5px">TOTAL</th>

            </tr>
            </thead>
            <tbody class="strong">
          @php
              $total = 0;
          @endphp
            @foreach ($order->orderDetails as $key => $orderDetail)
                @php
                $total += $orderDetail->purchase_price+ $orderDetail->commision+$orderDetail->shipping_cost;
                    $parts_warranty = json_decode($orderDetail->parts_warranty);
                @endphp
                @if ($orderDetail->product != null)
                    <tr>
                        <td style="text-align: center;">{{$loop->iteration}}</td>

                        <td style="text-align: left;"><span style="font-weight: bold;">Product Name: </span>{{ $orderDetail->product->name }} @if($orderDetail->variation != null) ({{ $orderDetail->variation }}) @endif <br>
                        @if($orderDetail->warranty != null)
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
                        <td style="text-align: right;padding-right:5px;">{{ single_price(($orderDetail->purchase_price+ $orderDetail->commision+$orderDetail->shipping_cost)/$orderDetail->quantity) }}</td>
                        <td style="text-align: right;padding-right:5px;">{{ single_price($orderDetail->purchase_price+ $orderDetail->commision+$orderDetail->shipping_cost) }}</td>

                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        <table class="table" style="border:none;">
            <tbody style="border:none;">
            <tr>
                <td style="border: none; vertical-align: bottom;width:55% ">

                </td>

                <td style="text-align: right;border:none;width:27% ">
                   {{-- <p>SUBTOTAL</p>--}}
                   {{-- <p>DISCOUNT</p>--}}
                    {{--<p>SUBTOTAL LESS DISCOUNT</p>--}}
                   {{-- <p>VAT & TAX </p>--}}
                    {{--<p>DELIVERY CHARGE</p>--}}
                    <p>TOTAL</p>
                    {{--<p style="font-weight: 600; padding-top:7px;">Total Amount</p>--}}
                </td>
                <td style="text-align: right;border:none;width:20% ">
                   {{-- <p style="border-bottom: 1px solid #776e6e;">{{ single_price($order->orderDetails->sum('purchase_price') + $order->orderDetails->sum('commision')+$order->orderDetails->sum('shipping_cost')) }}</p>--}}
                   {{-- <p style="border-bottom: 1px solid #776e6e;">{{ single_price($order->coupon_discount) }}</p>--}}
                    {{--<p style="border-bottom: 1px solid #776e6e;">20.000</p>--}}
                    {{--<p style="border-bottom: 1px solid #776e6e;">{{ single_price($order->orderDetails->sum('tax')) }}</p>--}}
                    {{--<p style="border-bottom: 1px solid #776e6e;">{{ single_price($order->orderDetails->sum('delivry_methods_charge')) }}</p>--}}
                    <p style="border-bottom: 1px solid #000000;">{{ single_price($total) }}</p>
                    {{--<p style="background-color: #ddc4ca !important;border-top: 1px solid #000000;border-bottom: 1px solid #000000;">20.000</p>--}}

                </td>


            </tr>


            </tbody>
        </table>

        <table class="table" style="border:none;">
            <tbody style="border:none">
            <tr style="border:none">

                <td style="border:none;text-align:left;width:30%">

                    <p style="left:0px;margin-top:70px">_______________________</p>
                    <p style="left:0px;padding-left:50px">Signature</p>
                    <p style="left:0px;padding-left:30px">Account Manager</p>



                </td>
                <td style="border:none;text-align:center !important;width:35%;">

                    <p style="left:0px;margin-top:70px;">_______________________</p>
                    <p style="left:0px;">Signature</p>
                    <p style="left:0px;">Reviewed By</p>


                </td>


                <td style="border:none;text-align:right !important;width:30%;">

                    <p style="left:0px;margin-top:70px;">_______________________</p>
                    <p style="left:0px;padding-right:50px">Signature</p>
                    <p style="left:0px;padding-right:45px">Approved By</p>


                </td>

            </tr>

            </tbody>
        </table>

    </div>



</div>
</body>
</html>
