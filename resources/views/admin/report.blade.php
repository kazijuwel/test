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
                                            <input type="date" name="date_from" class="form-control ml-1 mr-1"
                                                id="date_from">
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="date_to">To:</label>
                                            <input type="date" name="date_to" class="form-control ml-1 mr-2" id="date_to">
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <select name="company_id" id="" class="form-control">
                                                <option value="">Select Status</option>
                                                @foreach ($select as $company)
                                                <option value="{{ $company->id }}">{{ $company->company_code }}</option>
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
                                        <input type="date" name="date_from" class="form-control ml-1 mr-1"
                                            id="date_from">
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="date_to">To:</label>
                                        <input type="date" name="date_to" class="form-control ml-1 mr-2" id="date_to">
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <select name="company_id" id="" class="form-control">
                                            <option value="">Select Status</option>
                                            @foreach ($select as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                          
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-sm ml-2">Submit</button>
                                </form>
                            </div>
                        @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                      <div class="card-body text-center w3-text-blue">
                        <h2><b class="w3-animate-fading">Select Date (or Select Date Interval) and Submit</b></h2>
                      </div>
                    </div>
                  </div>
            </div>


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


@endpush
