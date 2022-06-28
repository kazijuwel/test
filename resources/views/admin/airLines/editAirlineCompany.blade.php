@extends('admin.layouts.adminMaster')

@push('css')

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endpush

@section('content')
    <section class="content">

        <br>

        <div class="row">

            <div class="col-sm-12">


                @include('alerts.alerts')







                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-edit"></i> Edit Airline Company
                        </h3>
                    </div>
                    <div class="card-body w3-light-gray pb-0">


                        <div class="row">
                            <div class="col-sm-12 col-md-10   offset-md-1 col-lg-8 offset-lg-2">



                                <div class="card card-widget">
                                    
                                    <div class="card card-widget">
                                        <div class="card-header">
                                            <h3 class="card-title"><i class="fa fa-briefcase text-primary"></i> <span
                                                    class="badge badge-light">

                                                    Company Information

                                                </span>
                                            </h3>
                                        </div>
                                        <div class="card-body" style="min-height: 200px;">


                                            <form method="post" action="{{route('admin.updateAirlineCompany',$air)}}">

                                                @csrf

                                                <div class="form-group">
                                                    <label for="Title">Airline Company Title</label>
                                                    <input type="text" name="title" class="form-control"
                                                        placeholder="Enter Title" value="{{ old('title') ? : $air->Airline }}" id="title">
                                                </div>

                                                <div class="form-group">
                                                    <label for="callsign">Company CallSign</label>
                                                    <input type="text" name="callsign" class="form-control"
                                                        placeholder="Company CallSign" value="{{ old('callsign') ? : $air->Callsign}}"
                                                        id="callsign">
                                                </div>
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input type="text" name="country" class="form-control"
                                                        placeholder="Enter Country" value="{{ old('country') ? : $air->Country }}"
                                                        id="country">
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label for="logo">Logo</label>
                                                    <input type="file" name="logo" class="form-control"
                                                        placeholder="Enter Description" value="{{ old('logo') }}"
                                                        id="logo">
                                                </div> --}}
                                                {{-- <div class="form-group form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" name="status" type="checkbox">
                                                        Active
                                                    </label>
                                                </div> --}}
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>



    </section>
@endsection


@push('js')

    <!-- Select2 -->
    <script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>


@endpush
