@extends('backend.layouts.app')

@section('content')

<div class="card">
      <form class="" action="" method="GET">
        <div class="card-header row gutters-5">
          <div class="col text-center text-md-left">
            <h5 class="mb-md-0 h6">{{ translate('All Orders') }}</h5>
          </div>
          <div class="col-lg-2">
              <div class="form-group mb-0">
                  <input type="text" class="aiz-date-range form-control" value="{{ $date }}" name="date" placeholder="{{ translate('Filter by date') }}" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
              </div>
          </div>
          <!-- <div class="col-lg-2">
            <div class="form-group mb-0">
              <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Order code & hit Enter') }}">
            </div>
          </div> -->
          <div class="col-auto">
            <div class="form-group mb-0">
              <button type="submit" class="btn btn-primary">{{ translate('Filter') }}</button>
            </div>
          </div>
        </div>
    </form>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ translate('Name') }}</th>
                    <th data-breakpoints="md">{{ translate('Mobile Number') }}</th>
                    <th data-breakpoints="md">{{ translate('Email') }}</th>
                    <th data-breakpoints="md">{{ translate('Academic Qualification') }}</th>
                    <th data-breakpoints="md">{{ translate('Job Experience') }}</th>
                    <th data-breakpoints="md">{{ translate('Skills') }}</th>
                   
                    <th class="text-right" width="15%">{{translate('Download CV')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($join_applications as $key => $application)
                    <tr>
                        <td>
                           {{ $loop->iteration }}
                        </td>

                        <td>
                           {{$application->name}}
                        </td>
                        <td>
                            {{$application->mobile}}
                        </td>
                        <td>
                           {{$application->email}}
                        </td>
                        <td>
                            {{$application->academic_qualification}}
                        </td>

                        <td>
                            {{$application->job_experience}}
                        </td>
                        
                        <td>
                           
                                {{$application->skill}}
                           
                        </td>
                        @php
                        $path_parts = pathinfo($application->join_us_cv); 
                        $extention_name = pathinfo($application->join_us_cv, PATHINFO_EXTENSION)
                        @endphp
                       
                        <td class="text-right">
                            <!-- <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="" title="{{ translate('View') }}">
                                <i class="las la-eye"></i>
                            </a> -->
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{asset($application->join_us_cv)}}" download="{{ substr($path_parts['basename'],11) }}" title="{{ translate('Download CV') }}">
                                <i class="las la-download"></i> 
                            </a>
                            <!-- <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection
