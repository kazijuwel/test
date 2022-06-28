<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bela Obela</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">

    <style media="all">

        * {
            margin: 0;
            padding: 0;
            line-height: 1.1;
            font-family: 'Hind Siliguri';
            color: #333542;
        }

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

        * {
            margin: 0;
            padding: 0;
            line-height: 1;
            font-family: 'Roboto';
            color: #333542;
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

        td, th {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        .border-bottom td,
        .border-bottom th {
            border-bottom: 1px solid #eceff4;
        }

        td {
            border: 1px solid #ddd;
        }


    </style>

</head>
<body>
<div>

    <div style="background: #ffffff;padding: 1rem;">
        <table class="table table-border" style="border:1px solid #ddd;margin-top:50px">
            <tbody>
            <tr>

                <th style="width:10% !important;">
                    <small>Invoice No</small>
                </th>
                <th style="width:8% !important;">Date</th>
                <th style="width:8% !important;">Product Name</th>
                <th style="width:8% !important;">Seller</th>
                <th style="width:8% !important;">Customer</th>
                <th style="width:8% !important;">unit price</th>
                <th style="width:8% !important;">purchase price</th>
                <th style="width:8% !important;">Delivery Cost</th>
                <th style="width:8% !important;">Quantity</th>
                <th style="width:10% !important;">Balance Amount</th>
                <th style="width:8% !important;">Payment Status</th>
                <th style="width:8% !important;">Total Sales Amount</th>

            </tr>
            @foreach($order as $key=>$item)
                @php $price =0; @endphp
                <tr>
                    <td style="width:10% !important;">
                        <small>{{$item->code}}</small>
                    </td>

                    <td colspan="10" style="padding: 0px !important;">
                        <table style="margin-bottom: 0px">

                            @foreach($item->orderDetails as $orders)
                                @php
                                
                                    $price = $orders->product->unit_price;
                                   // $purchase_price = $orders->product->tax;

                                  if ($orders->product->tax_type == 'percent') {
             $price_tax = ($price * $orders->product->tax) / 100;
             $price += $price_tax;
         } elseif ($orders->product->tax_type == 'amount') {
             $price_tax = $orders->product->tax;
             $price += $price_tax;
         }
       
         if ($orders->product->discount_type == 'percent') {
                $price_discount = ($price * $orders->product->discount) / 100;
                $price -= $price_discount;
            } elseif ($orders->product->discount_type == 'amount') {
                $price_discount = $orders->product->discount;
                $price -= $price_discount;
            }

                                 if ($orders->product->category->commision_rate) {
            if ($orders->product->added_by == 'admin') {
                $price += 0;
            } else {
                $price += ((($orders->product->unit_price + $price_tax) - $price_discount) * $orders->product->category->commision_rate) / 100;
            }

        }
                 //new

        if ($orders->product->shipping_cost) {
            $price += $orders->product->shipping_cost;
        }




                                @endphp
                                <tr>
                                    <td style="width:8% !important;">{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</td>
                                    <td style="width:8% !important;">{{$orders->product->name}}</td>
                                    <td style="width:8% !important;">{{$orders->seller->name}}</td>
                                    <td style="width:8% !important;">{{$orders->order->user->name}}</td>
                                    <td style="width:8% !important;">{{round($price)}}</td>
                                    <td style="width:8% !important;">{{round($orders->purchase_price)}}</td>
                                    <td style="width:8% !important;">{{$orders->delivry_methods_charge}}</td>
                                    <td style="width:8% !important;">{{$orders->quantity}}</td>
                                    <td style="width:8% !important;">{{round($orders->order->grand_total - $orders->purchase_price - $orders->delivry_methods_charge)}}</td>
                                    <td style="width:8% !important;">{{$orders->payment_status}}</td>

                                </tr>
                            @endforeach
                        </table>

                    </td>


                    <td style="width:10% !important;">{{round($item->grand_total)}}</td>


                </tr>

            @endforeach


            </tbody>
        </table>

    </div>


</div>
</body>
</html>
