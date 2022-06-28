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
        <table class="table table-border" style="border:1px solid #ddd;margin-top:40px">
            <tbody>
            <tr>

                <th >Seller Name</th>
                <th >Due Payment</th>


            </tr>
            @foreach($seller_due as $value)
            <tr>
                <td style="text-align: center">{{$value->user['name']}}</td>
                <td style="text-align: center">{{$value->admin_to_pay}}</td>


            </tr>
                @endforeach
            </tbody>

        </table>

    </div>


</div>
</body>
</html>
