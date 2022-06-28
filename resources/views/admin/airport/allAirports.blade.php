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
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-edit"></i> All Airline Company
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Country Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>

                                    <?php $i = (($allAirports->currentPage() - 1) * $allAirports->perPage() + 1); ?>
                                    @foreach ($allAirports as $air)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$air->code}}</td>

                                            <td>{{$air->name}}</td>
                                            <td>{{$air->countryName}}</td>
                                            <td>
                                                <a href="{{route('admin.editAirports',$air)}}" class="btn btn-sm btn-warning">Edit</a>
                                            </td>
                                        </tr>
                                        @php
                                            $i++
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$allAirports->render()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection