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
                            <i class="fa fa-edit"></i> All Destination List
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Cost</th>
                                        <th>City</th>
                                        <th>Country Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>

                                    <?php $i = (($hotels->currentPage() - 1) * $hotels->perPage() + 1); ?>
                                    @foreach ($hotels as $hotel)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td><img src="{{asset('storage/hotel/'.$hotel->image)}}" alt="" height="50" width="50"></td>

                                            <td>{{$hotel->title}}</td>
                                            <td>{!!$hotel->cost!!}</td>

                                            <td>{!!$hotel->city!!}</td>
                                            <td>{{$hotel->country}}</td>
                                            <td>
                                                <a href="{{route('admin.editHotel',$hotel)}}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="{{route('admin.deleteHotel',$hotel)}}" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this destination ?')">Delete</a>
                                            </td>
                                        </tr>
                                        @php
                                            $i++
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$hotels->render()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection