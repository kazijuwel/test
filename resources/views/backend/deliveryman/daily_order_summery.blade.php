@extends('backend.layouts.app')
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Order Summary')}}</h5>
</div>
<div class="col-md-12 mx-auto">
    <div class="card p-2">

        <form action="" method="get">
            <div class="form-row">
                <div class="col-5">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Start Date</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="start_date" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label for="exampleInputPassword1">End Date</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" name="end_date">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">

                        <input type="submit" class="btn btn-primary mt-4" id="" value="Search">
                    </div>
                </div>

            </div>
        </form>

    </div>
    @if($startDate && $endDate)
    <button class="btn btn-warning btn-sm float-right m-2" onclick="exportTableToCSV('order_summary.csv')"><i class="las la-file-alt aiz-side-nav-icon"></i> export</button>
    <div class="card" style="width: 100%">
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Products & Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Qty</th>
                    <th scope="col">In Side Dhaka</th>
                    <th scope="col">Out Side Dhaka</th>
                    @php
                        $len = count($companys);
                    @endphp
                    @foreach ($companys as $key => $company)

                     <th scope="col">{{$company->name}}</th>

                    @endforeach
                    <th scope="col">Belaobela own</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($products as $pro)
                <tr>
                    <th scope="row">{{ $pro->name  }}</th>
                    <td>{{ $pro->model }}</td>
                    <td>{{$pro->totalQuantity($startDate,$endDate)}}</td>
                    <td>{{$pro->insideDhaka($startDate,$endDate)}}</td>
                    <td>{{$pro->outSideDhaka($startDate,$endDate)}}</td>
                    @foreach ($companys as $company)
                    <td>{{$company->qty($startDate,$endDate,$pro->id)}}</th>
                    @endforeach

                    <td>
                        {{$pro->belaobelaOwn($startDate,$endDate)}}
                    </td>

                </tr>
                @endforeach
                <div class="aiz-pagination">
                    {{ $products->appends(request()->input())->links() }}
                </div>

                </tbody>
              </table>

        </div>

    </div>
    @endif
</div>
@endsection
@section('script')
<script>
    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename?filename+'.xls':'user_registration_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob( blob, filename);
        }else{
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }

    function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        // CSV file
        csvFile = new Blob([csv], {type: "text/csv"});

        // Download link
        downloadLink = document.createElement("a");

        // File name
        downloadLink.download = filename;

        // Create a link to the file
        downloadLink.href = window.URL.createObjectURL(csvFile);

        // Hide download link
        downloadLink.style.display = "none";

        // Add the link to DOM
        document.body.appendChild(downloadLink);

        // Click download link
        downloadLink.click();
    }
    function exportTableToCSV(filename) {
        var csv = [];
        var rows = document.querySelectorAll("table tr");

        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll("td, th");

            for (var j = 0; j < cols.length; j++)
            row.push("\""+cols[j].innerText+"\"");

            csv.push(row.join(","));
        }

        // Download CSV file
        downloadCSV(csv.join("\n"), filename);
    }
            </script>

@endsection
