@extends('admin.layouts.adminMaster')

@push('css')

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush

@section('content')
    <section class="content">
        <br>
        @include('alerts.alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                             All Flight Schedules
                            <a class="btn w3-white btn-sm" href="{{ route('admin.addFlightSchedules') }}"><i class="fa fa-plus"></i> Sdd New Schedule</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-striped" style="white-space: nowrap">
                               <thead>
                                   <th>SL</th>
                                   <th>Action</th>
                                   <th>Price</th>
                                   <th>Airline Name</th>
                                   <th>From</th>
                                   <th>To</th>
                                   <th>Start</th>
                                   <th>End</th>
                                   <th>Added By</th>
                               </thead>
                               <tbody>
                                <?php $i = 1; ?>

                                <?php $i = (($flightSchedules->currentPage() - 1) * $flightSchedules->perPage() + 1); ?>
                                   @forelse ($flightSchedules as $fs)
                                       <tr>
                                           <td>{{ $i }}</td>
                                           <td>
                                               <a href="{{ route('admin.detailsFlightSchedules',['schedule'=>$fs->id]) }}" class="btn btn-success btn-xs">Details</a>
                                               <a href="{{ route('admin.editFlightSchedules',['schedule'=>$fs->id]) }}" class="btn btn-info btn-xs">Edit</a>
                                               <a href="{{ route('admin.deleteFlightSchedules',['schedule'=>$fs->id]) }}" onclick="return confirm('Are you sure? You want to delete this flight schedule?');" class="btn btn-danger btn-xs">Delete</a>
                                           </td>
                                           <td>{{ $fs->price }}</td>
                                           <td>{{ $fs->airline->Airline }}</td>
                                           <td>{{ $fs->airport->name }}</td>
                                           <td>{{ $fs->airport2->name }}</td>
                                           <td>{{ $fs->start }}</td>
                                           <td>{{ $fs->end }}</td>
                                           <td>{{ $fs->addedBy->name }}</td>
                                       </tr>
                                       <?php $i++; ?>
                                   @empty
                                   <tr>
                                    <td colspan="9" class="text-danger"> No Schedules Found</td>
                                </tr>
                                   @endforelse
                               </tbody>
                           </table>
                        </div>
                        {{ $flightSchedules->render() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('select').select2();
    </script>
@endpush
