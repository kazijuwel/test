@extends('admin.layouts.adminMaster')
@section('title', 'Bangali Muslim Marriage')

@push('css')
@endpush

@section('content')
<section class="content-header">
    <h1>
    Applications
    <small>All</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Applications</a></li>
      <li class="active">{{ $status ? Str::ucfirst($status) : 'All' }}</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Info cards -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-widget">
          <div class="card-header">
            <h3 class="card-title">
                {{ $status ? Str::ucfirst($status) : 'All' }} Membership Applications
            </h3>
          </div>
        </div>
        @include('alerts.alerts')
      </div>
    </div>

    <div class="card card-widget">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-border">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Reg. No.</th>
                            <th>Membership</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Latest Degree</th>
                            <th>Experience</th>
                            <th>Attachments</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                        <tr>
                            <td>{{ $loop->iteration+($applications->firstItem()-1) }}</td>
                            <td>{{ $application->created_at }}</td>
                            <td>{{ $application->reg_no }}</td>
                            <td>{{ $application->membership->title }}</td>
                            <td>{{ Str::ucfirst($application->status) }}</td>
                            <td>{{ $application->first_name.' '.$application->last_name }}</td>
                            <td>
                                <address>
                                    {{ $application->address }} ,<br>
                                    {{ $application->state }} ,<br>
                                    {{ $application->country }} - {{ $application->zip }}
                                </address>
                            </td>
                            <td>
                                Email: {{ $application->email }} <br>
                                Mobile: {{ $application->mobile }} <br>
                                Phone: {{ $application->phone }}
                            </td>
                            <td>
                                {{ $application->degree }} {{ $application->major ? "({$application->major})" : '' }}
                            </td>
                            <td>
                                {{ $application->experience_years }} year(s)
                            </td>
                            <td>
                                @if ($application->attachments->count() > 0)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.membershipApplication.show', [$application]) }}" class="btn btn-primary">manage</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $applications->links() }}
            </div>
        </div>
    </div>
  </section>



@endsection


@push('js')

@endpush

