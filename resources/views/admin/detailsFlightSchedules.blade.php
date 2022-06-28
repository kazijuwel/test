@extends('admin.layouts.adminMaster')

@push('css')

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
                            <i class="fa fa-edit"></i> Flight Schedule Details of {{ $fs->id }}
                        </h3>
                    </div>
                    <div class="card-body">
                      <table class="table table-borderd">
                          <tr>
                              <th>Price</th>
                              <td>$ {{ $fs->price }}</td>
                          </tr>
                          <tr>
                            <th>Airlines Name</th>
                            <td>{{ $fs->airline->Airline }}</td>
                        </tr>
                        <tr>
                            <th>From</th>
                            <td>{{ $fs->airport->name }}</td>
                        </tr>
                        <tr>
                            <th>To</th>
                            <td>{{  $fs->airport2->name  }}</td>
                        </tr>
                        <tr>
                            <th>Start Date</th>
                            <td>{{ $fs->start }}</td>
                        </tr>
                        <tr>
                            <th>End Date</th>
                            <td>{{ $fs->end }}</td>
                        </tr>
                        <tr>
                            <th>AddedBy</th>
                            <td>{{ $fs->addedBy->name }}</td>
                        </tr>

                      </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


