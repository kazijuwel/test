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

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mb-2">
                        <div class="card-header">
                            <h3 class="card-title">User Search</h3>

                            <div class="card-tools">
                                <form action="">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input data-url="{{ route('admin.userSearchDashboard') }}" type="text" name="q"
                                            class="form-control ajax-data-search" placeholder="Search User">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-widget">
                        <div class="card-header bg-info"><h4>Search Flight</h4></div>
                        <div class="card-body">
                            <form action="{{ route('admin.flightSearch') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group border">
                                            <label for="from">Flying Form <span class="text-danger">*</span></label>
                                            <select name="from" id="from" class="form-control">
                                              <option value="">Select City</option>
                                              @foreach ($airports as $item)
                                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                              @endforeach
                                            </select>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group border">
                                            <label for="to">Flying To <span class="text-danger">*</span></label>
                                            <select name="to" id="to" class="form-control">
                                              <option value="">Select City</option>
                                              @foreach ($airports as $item)
                                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group border">
                                                    <label for="departing">Departing</label>
                                                    <input type="date" name="departing" id="departing"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                      <label for=""></label>
                                      <input type="submit" value="Search" class="btn btn-info">
                                    </div>
                                </div>
                            </form>
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
