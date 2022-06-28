@extends('admin.layouts.adminMaster')

@push('css')

    <script src="{{ asset('select2/dist/css/select2.min.css') }}"></script>
    <style>
        span.select2-selection.select2-selection--single {
            border: none;
        }

        span.select2-selection__arrow {
            display: none;
        }

    </style>
@endpush

@section('content')
    <section class="content">

        <br>
        @include('alerts.alerts')
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-widget">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 mt-1">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                            data-toggle="dropdown">Select Date
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a class="ml-3"
                                                    href="{{ route('admin.reportsGetByDate', ['date' => 'today', 'type' => $type]) }}">Today</a>
                                            </li>
                                            <li><a class="ml-3"
                                                    href="{{ route('admin.reportsGetByDate', ['date' => 'yesterday', 'type' => $type]) }}">Yesterday</a>
                                            </li>
                                            <li><a class="ml-3"
                                                    href="{{ route('admin.reportsGetByDate', ['date' => 7, 'type' => $type]) }}">Last
                                                    7 Days</a></li>
                                            <li><a class="ml-3"
                                                    href="{{ route('admin.reportsGetByDate', ['date' => 30, 'type' => $type]) }}">Last
                                                    30 Days</a></li>
                                            <li><a class="ml-3"
                                                    href="{{ route('admin.reportsGetByDate', ['date' => 'this_month', 'type' => $type]) }}">This
                                                    Month</a></li>
                                            <li><a class="ml-3"
                                                    href="{{ route('admin.reportsGetByDate', ['date' => 'last_month', 'type' => $type]) }}">Last
                                                    Month</a></li>
                                        </ul>
                                    </div>
                                </div>
                                @if ($type == 'company')
                                    <div class="col-sm-9">
                                        <form class="form-inline" method="get"
                                            action="{{ route('admin.reportsGetByDateInterval', ['type' => $type]) }}">
                                            <div class="form-group form-group-sm">
                                                <label for="date_from">From:</label>
                                                <input type="date" name="date_from" value="{{ $start??null }}" class="form-control ml-1 mr-1"
                                                    id="date_from">
                                            </div>
                                            <div class="form-group form-group-sm">
                                                <label for="date_to">To:</label>
                                                <input type="date" name="date_to" value="{{ $end??null }}" class="form-control ml-1 mr-2"
                                                    id="date_to">
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <select name="company_id" id="" class="form-control">
                                                    <option value="">Select Company</option>
                                                    @foreach ($select as $company)
                                                    @if (isset($option))
                                                    <option {{ $option == $company->id? 'selected':null }} value="{{ $company->id }}">{{ $company->company_code }}
                                                    </option>
                                                    @else
                                                    <option value="{{ $company->id }}">{{ $company->company_code }}
                                                    </option>
                                                    @endif
                                                        
                                                    @endforeach

                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-sm ml-2">Submit</button>
                                        </form>
                                    </div>
                                @endif
                                @if ($type == 'customer')
                                    <div class="col-sm-9">
                                        <form class="form-inline" method="get"
                                            action="{{ route('admin.reportsGetByDateInterval', ['type' => $type]) }}">
                                            <div class="form-group form-group-sm">
                                                <label for="date_from">From:</label>
                                                <input type="date" name="date_from" value="{{ $start??null }}" class="form-control ml-1 mr-1"
                                                    id="date_from">
                                            </div>
                                            <div class="form-group form-group-sm">
                                                <label for="date_to">To:</label>
                                                <input type="date" name="date_to" value="{{ $end??null }}" class="form-control ml-1 mr-2"
                                                    id="date_to">
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <select name="customer_id" id="" class="form-control">
                                                    <option value=""> Select Customer</option>
                                                    @foreach ($select as $customer)
                                                    @if (isset($option))
                                                    <option {{ $option == $customer->id? 'selected':null }} value="{{ $customer->id }}">{{ $customer->name }}
                                                    </option>
                                                    @else
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}
                                                    </option>
                                                    @endif
                                                        
                                                    @endforeach

                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-sm ml-2">Submit</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <div class="card-tools mt-2">
                                <button class="btn btn-sm btn-primary "
                                    onclick="exportTableToCSV('{{ $type }}Data.csv')">Export To CSV</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (isset($reports))
                @if ($type == 'customer')
                @include('admin.reportPart.customerReport')
                @elseif ($type == 'company')
                @include('admin.reportPart.companyReport')

                @else
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body text-center w3-text-blue">
                                <h2><b class="w3-animate-fading">Select Date (or Select Date Interval) and Submit</b></h2>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

        </div><!-- /.container-fluid -->
    </section>
@endsection


@push('js')


    <script src="{{ asset('select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $('select').select2();
        // $('#datetimepicker').datetimepicker({
        //     format: 'yyyy-mm-dd hh:ii'
        // });
        $('.js-data-example-ajax').select2({
            ajax: {
                url: 'https://api.github.com/search/repositories',
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });
    </script>
<script>
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

@endpush
