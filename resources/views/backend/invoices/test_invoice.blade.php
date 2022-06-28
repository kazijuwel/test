@extends('backend.layouts.app')


@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belaobela</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <!-- aiz core css -->
    <link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css') }}">
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            line-height: 1.42857143;
            font-size: 13px;
            -webkit-print-color-adjust: exact !important;
            color: #333;
        }
        .container {
            max-width: 1150px;
        }
        p {
            margin-top: 0;
            margin-bottom: .6rem;
            font-size: 13px ;
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 7px;
        }


        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            padding: 2px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #776e6e;
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 0px;
        }

        table {

            border-collapse: collapse;
            border-spacing: 0;
        }

        td, th { border: 1px solid #776e6e; }

        @media print{
            body {
                -webkit-print-color-adjust: exact !important;
            }

            @page{
                margin-top: .2cm !important;
                margin-bottom: .2cm !important;
                margin-left: .3cm !important;
                margin-right: .3cm !important;
            }

            .noprint{
                display:none;
            }
            p {
                margin-top: 0;
                margin-bottom: .6rem;
                font-size: 13px ;
            }
            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 7px;
            }


        }
        .btn-primary, .btn-soft-primary:hover, .btn-outline-primary:hover {
            background-color: #f16522;
            border-color:#f16522;
            color: #FFFFFF;
        }
        .btn-primary, .btn-soft-primary:hover, .btn-outline-primary:hover {
            background-color: #f14212;
            border-color: #f14212;
            color: #FFFFFF;
        }

    </style>
</head>
<body>

@php
	$logo = get_setting('header_logo');
@endphp

<div class="container">
    <div class="row" style="margin-top:20px">
        <div class="col-md-12">
            <table class="table" style="border:none">
                <tbody style="border:none">
                <tr style="border:none">

                    <td style="border:none;width:30%">
                        <p style="left:0px;font-size:22px"><strong>{{ get_setting('website_name') }}</strong></p>
                        <p style="left:0px">{{ get_setting('contact_address') }}</p>

                    </td>


                    <td  style="border:none;width:25%; text-align:right;">
                    	@if($logo != null)
                        	<img src="{{ uploaded_asset($logo) }}" style="display:inline-block; width: 120px; height: 60px;">
						@else
							<img src="{{ static_asset('assets/img/logo.png') }}" height="30" style="display:inline-block;">
						@endif
                    </td>


                    <td style="border:none; text-align:left;float:right;width:55%" >
                        <h3 style="font-size:20px; font-weight: 600;margin-left: 110px;">INVOICE</h3>
                        <p style="left:0px;border-bottom: 1px solid #ddd;">DATE:{{ date('d-m-Y', $order->date) }}</p>
                        <p style="left:0px;border-bottom: 1px solid #ddd;">INVOICE NO:3454354567</p>

                        <div class="btn-group-vertical">
                        	@php
                        		$status_name = ' ';
                        		$payment_type = ' ';
                        		if($order->payment_status = 'paid'){
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
                            <p class="btn btn-primary" style="border-bottom: 1px solid #776e6e; margin-bottom: 0px; ">{{$status_name}}</p>

                            <p class="btn btn-primary" style="border-top: 1px solid #776e6e !important;">{{$payment_type}}</p>

                        </div>

                    </td>
                </tr>

                </tbody>
            </table>

            <table class="table" style="border:none">
            	@php
					$shipping_address = json_decode($order->shipping_address); 
                    $user_address = \App\Address::where('user_id', $order->user_id)->first();               
				@endphp
                <tbody style="border:none">
                <tr style="border:none">

                    <td  style="border:none;text-align:left; width:30%;">
                        <p style="font-size:18px; font-weight: 600;border-bottom: 1px solid #ddd;">BILL TO</p>
                        <p style="left:0px"><strong>Contact Name: {{ $shipping_address->name }}</strong></p>
                        <!-- <p style="left:0px"><strong>Company Name:Khan busness Limited</strong></p> -->
                        <p style="left:0px"><strong>Address: {{ $shipping_address->address }}, {{ $shipping_address->city }}, {{ $shipping_address->country }}</strong></p>
                        <p style="left:0px"><strong>Phone Number: {{ $shipping_address->phone }}</strong></p>
                        <p style="left:0px"><strong>Email: {{ $shipping_address->email }}</strong></p>
@if($user_address->set_default == 1)
{{$user_address->country}}
@else
{{ $shipping_address->country }}
@endif

                    </td>

                    <td style="border:none; text-align:left; float:right;width:35%;"></p>
                        <p style="font-size:18px; font-weight: 600;border-bottom: 1px solid #ddd;">SHIP TO</p>
                        <p style="left:0px"><strong>Client Name: {{ $shipping_address->name }}</strong></p>
                        <p style="left:0px"><strong>Delivery Address: {{ $shipping_address->address }}, {{ $shipping_address->city }}, {{ $shipping_address->country }}</strong></p>
                        <p style="left:0px"><strong>Phone Number: {{ $shipping_address->phone }}</strong></p>

                    </td>
                </tr>


                </tbody>
            </table>

{{$order->payment_type}}
            <table class="table" style="border:1px solid #ddd">
                <tbody style="border:none;">
                <tr >
                    <th style="text-align: center;background-color:#f16522 !important;">S.N.</th>
                    <th style="text-align: center;background-color:#f16522 !important;">DESCRIPTION</th>
                    <th style="text-align: right;background-color:#f16522 !important;">QTY</th>
                    <th style="text-align: right;background-color:#f16522 !important;">UNIT PRICE</th>
                    <th style="text-align: center;background-color:#f16522 !important;">TOTAL</th>

                </tr>
                @foreach ($order->orderDetails as $key => $orderDetail)
		            @if ($orderDetail->product != null)
                <tr>
                    <td style="text-align: center">{{$loop->iteration}}</td>
                    <td style="text-align: left;padding-left:5px">{{ $orderDetail->product->name }} @if($orderDetail->variation != null) ({{ $orderDetail->variation }}) @endif</td>
                    <td style="text-align: right">{{ $orderDetail->quantity }}</td>
                    <td style="text-align: right">{{ single_price($orderDetail->price/$orderDetail->quantity) }}</td>
                    <td style="text-align: right">{{ single_price($orderDetail->price+$orderDetail->tax) }}</td>

                </tr>
                	@endif
				@endforeach
                </tbody>
            </table>
            <table class="table" style="padding-left:5px;border:none;">
                <tbody style="border:none;">
                <tr>

                    <td style="border: none; vertical-align: bottom;width:55% ">
                        <div style="border:1px solid #776e6e;">
                        <p style="font-size:13px; margin-top: 5px; font-weight: 600;margin-left:5px">Payment Instructions:</p>
                        <p style="font-size:12px; font-weight: 500;margin-left:5px">Please login to your account then select your payment option</p>
                        </div>
                    </td>
                    <td style="text-align: right;border:none;width:27% ">
                        <p>SUBTOTAL</p>
                        <p>DISCOUNT</p>
                        <p>SUBTOTAL LESS DISCOUNT</p>
                        <p>VAT & TAX </p>
                        <p>TOTAL</p>
                        <p>DELIVERY CHARGE</p>
                        <p style="font-weight: 600; padding-top:7px;">Total Amount</p>
                    </td>
                    <td style="text-align: right;border:none;width:20% ">
                        <p style="border-bottom: 1px solid #776e6e;">20.000</p>
                        <p style="border-bottom: 1px solid #776e6e;">20.000</p>
                        <p style="border-bottom: 1px solid #776e6e;">20.000</p>
                        <p style="border-bottom: 1px solid #776e6e;">20.000</p>
                        <p style="border-bottom: 1px solid #776e6e;">20.000</p>
                        <p style="border-bottom: 1px solid #000000;">20.000</p>
                        <p style="background-color: #ddc4ca !important;border-top: 1px solid #000000;border-bottom: 1px solid #000000;">20.000</p>
                    </td>

                </tr>

                </tbody>
            </table>
            <table class="table" style="margin-top:10px;border:1px solid #776e6e">
                <tbody >
                <tr style="border:none">
                    <td class="text-center" style="border:none"><strong>Transaction Date</strong></td>
                    <td class="text-center" style="border:none"><strong>Gateway</strong></td>
                    <td class="text-center" style="border:none"><strong>Transaction ID</strong></td>
                    <td class="text-center" style="border:none"><strong>Amount</strong></td>
                </tr>
                @php                
					$pay_gateway = json_decode($order->payment_details);
				@endphp
                <tr style="border:none">
                    <td class="text-center" style="border:none">{{ date('d-m-Y', $order->date) }}</td>
                    @if($order->payment_type == 'aamarpay')
                    <td class="text-center" style="border:none;background-color: #8edd2a !important;">{{$pay_gateway->card_type}}</td>
                    <td class="text-center" style="border:none">{{$pay_gateway->opt_a}}</td>
                    @endif
                    @if($order->payment_type == 'sslcommerz')
                    <td class="text-center" style="border:none;background-color: #8edd2a !important;">{{$pay_gateway->card_type}}</td>
                    <td class="text-center" style="border:none">{{$pay_gateway->tran_id}}</td>
                    @endif
                    @if($order->payment_type == 'cash_on_delivery')
                    <td class="text-center" style="border:none;background-color: #8edd2a !important;">Cash On Delivery</td>
                    <td class="text-center" style="border:none">{{$order->code}}</td>
                    @endif
                    <td class="text-center" style="border:none">Tk.2400.00 BDT</td>
                </tr>

                </tbody>
            </table>

            <table class="table" style="border:none;margin-top:20px">
                <tbody style="border:none">
                <tr style="border:none">

                    <td style="border:none;float:left">

                        <p style="left:0px;margin-top: 50px">_______________________</p>
                        <p style="left:0px;text-align: left">Signature</p>
                        <p style="left:0px;text-align: left">Account Manager</p>



                    </td>


                    <td style="border:none;float:right">

                        <p style="left:0px;margin-top: 50px">_______________________</p>
                        <p style="left:0px;text-align: center">Signature</p>
                        <p style="left:0px;text-align: center">Customer</p>


                    </td>
                </tr>

                </tbody>
            </table>

            <table class="table" style="border:none;">
                <tbody style="border:none">
                <tr style="border:none">
                    <td style="border:none;float:left; background-color:#dbdef5 !important">
                        <p style="font-size: 13px; font-weight: 600"><u>Return policy of ‘BelaObela:</u></p>
                        <p style="font-size: 13px;">Please note that you must contact us instantly after receiving a defective or broken item on delivery. You must contact us over phone and apply via the return form in our website. You must return the product with the delivery man as well. We'll bear the fee for return delivery. If you do not inform us at the time of delivery, the item will not be taken back and ‘BelaObela’ will not be liable. Customers are requested to contact our customer care team as soon as possible for return of unwanted products.</p>
                        <p style="font-size: 13px; font-weight: 600"><u>Steps to return the product:</u></p>
                        <p style="font-size: 13px;">At the time of delivery, if you are not satisfied with the delivered product or if the model does not match, you must contact us instantly over phone. You have to fill up and submit our complaint form in the website as well. You must return the product with the delivery guy,  if the products you have got are 'damaged',' faulty' or 'not as defined' and we will solve your issue within 3 working days (outside Dhaka 5 working days) after receiving your notice. You will get a replacement product according to your order with a very short time. You can only cancel the order or get money refund, if we are unable to deliver your ordered product. </p>
                        <p style="font-size: 13px; font-weight: 600"><u>The product is not eligible for return, if the product is not - </u></p>
                        <p style="font-size: 13px;">1. Defective product</p>
                        <p style="font-size: 13px;">2. Physically damaged product</p>
                        <p style="font-size: 13px;">1. Product quality is not as described</p>


                    </td>
                </tr>

                </tbody>
            </table>



        </div>

    </div>

</div>

</body>
</html>


@endsection
