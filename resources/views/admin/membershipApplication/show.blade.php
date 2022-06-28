@extends('admin.layouts.adminMaster')
@section('title', 'Bangali Muslim Marriage')

@push('css')
@endpush

@section('content')
<section class="content-header">
    <h1>
    Membership Application
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Applications</a></li>
      <li class="active">Manage</li>
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
                Membership Application Details
            </h3>
          </div>
        </div>
        @include('alerts.alerts')
      </div>
    </div>

    <div class="card card-widget">
        <div class="card-body w3-medium">
            <div>
                Application status: {{ Str::ucfirst($application->status) }}
                @if ($application->status == 'pending')
                <button class="btn btn-primary btn-sm m-1" onclick="
                document.getElementById('confirm-application-{{ $application->id }}').submit();
                ">Confirm</button>
                <button class="btn btn-danger btn-sm m-1" onclick="
                document.getElementById('cancel-application-{{ $application->id }}').submit();
                ">Cancel</button>
                {{-- @else --}}

                <form action="{{ route('admin.membershipApplication.update', [$application, 'confirm']) }}" id="confirm-application-{{ $application->id }}" method="post">
                @csrf
                </form>
                <form action="{{ route('admin.membershipApplication.update', [$application, 'cancel']) }}" id="cancel-application-{{ $application->id }}" method="post">
                @csrf
                </form>
                @endif

            </div>
            @if ($application->user)
                <div class="text-bold">
                    User: {{ $application->user->email }}
                </div>
                <div class="text-bold">
                    Temporary Password: {{ $application->user->password_temp }}
                </div>
                <div>
                    Registration number: {{ $application->reg_no ?? '' }}
                </div>
            @endif
            <div>
                Membership: {{ $application->membership->title ?? '' }}
            </div>
            <div>
                Course: {{ $application->course->title ?? '' }}
            </div>
            <div>
                Applicant Name: {{ $application->first_name }} {{ $application->last_name }}
            </div>
            <div>
                Email: {{ $application->email }}
            </div>
            <div>
                Gender: {{ Str::ucfirst($application->gender) }}
            </div>
            <div>
                Marital Status: {{ Str::ucfirst($application->marital_status) }}
            </div>
            <div>
                Date of Birth: {{ now()->parse($application->birthdate)->format('d-M-Y') }} ( {{ now()->parse($application->birthdate)->diff(now())
                ->format('%y years, %m months and %d days old') }})
            </div>
            <div>
              Address: {{ $application->address }}
            </div>
            <div>
              State: {{ $application->state }}
            </div>
            <div>
              Country: {{ $application->country }}
            </div>
            <div>
              Zip / Post Code: {{ $application->zip }}
            </div>
            <div>
              Phone: {{ $application->phone }}
            </div>
            <div>
              Mobile: {{ $application->mobile }}
            </div>
            <div>
              Father's Name: {{ $application->father_name }}
            </div>
            <div>
              Mother's Name: {{ $application->mother_name }}
            </div>
            <div>
              Latest Obtained Degree: {{ $application->degree }}
            </div>
            <div>
              Major: {{ $application->major }}
            </div>
            <div>
              College / University: {{ $application->institute }}
            </div>
            <div>
              Result: {{ $application->result }}
            </div>
            <div>
              Passing Year: {{ $application->passing_year }}
            </div>
            <div>
              Employment experiences: {{ $application->experience_years }} year(s)
            </div>
            <div>
              Employer: {{ $application->employer }}
            </div>
            <div>
              Employment Details: {{ $application->employment_details }}
            </div>
            <div>
                Attachments:
                <div class="px-3">
                    @if ($application->attachments->count() > 0)
                        @foreach ($application->attachments as $attachment)
                            <div class="border-bottom py-2">
                                {{ $loop->iteration }}.
                                Type: {{ Str::ucfirst($attachment->file_type) }}

                                <a class="btn btn-info btn-sm" href="{{asset($attachment->link)}}"
                                    download><i class="fa fa-download" aria-hidden="true"></i>
                                    Download</a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
  </section>



@endsection


@push('js')
@endpush

