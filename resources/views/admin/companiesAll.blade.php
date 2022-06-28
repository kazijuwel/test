@extends('admin.layouts.adminMaster')

@push('css')
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
                            All @if(isset($status)){{$status}} @endif Companies
                        </h3>
                    </div>
                    <div class="card-body">


                        <div class="table-responsive">


                            <table class="table table-hover">


                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Company Code</th>
                                    {{-- <th>Password</th> --}}
                                    {{-- <th>Login Type</th> --}}
                                    {{-- <th>Last Login</th> --}}
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php $i = 1; ?>

                                <?php $i = (($companiesAll->currentPage() - 1) * $companiesAll->perPage() + 1); ?>

                                @foreach($companiesAll as $company)


                                    <tr>

                                        <td>{{ $i }}</td>
                                        <td>
                                            <div class="widget-user-image">
                                                <img width="60" class="img-circle elevation-2"
                                                     src="{{ asset($company->logo()) }}" alt="User Avatar">
                                            </div>
                                        </td>
                                        <td>{{ $company->title }}</td>
                                        <td>{{ $company->company_code }}</td>
                                        {{-- <td>{{ $company->login_password }}</td> --}}
                                        {{-- <td>{{ $company->login_type }}</td> --}}
                                        {{-- <td>{{ $company->loggedin_at }}</td> --}}
                                        <td>{{ $company->mobile }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->balance }}</td>
                                        <td>{{ $company->status }}</td>

                                        <td width="250">

                                            <div class="dropdown mb-1">
                                                <div class="btn-group ">
                                                    <button type="button"
                                                            class="btn btn-primary  btn-xs dropdown-toggle"
                                                            data-toggle="dropdown">
                                                        Option
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="{{ route('admin.companyEdit', $company) }}">
                                                            <button type="button"
                                                                    class="dropdown-item btn btn-primary btn-xs">Edit
                                                            </button>
                                                        </a>
                                                        <a href="{{ route('admin.companyDetails', $company) }}">
                                                            <button type="button"
                                                                    class="dropdown-item btn btn-primary btn-xs">Details
                                                            </button>
                                                        </a>
                                                        <a href="{{ route('admin.allTransactionHistory',['type'=>'agent','user'=>$company->id]) }}">
                                                            <button type="button"
                                                                    class="dropdown-item btn btn-primary btn-xs">
                                                                Transaction History
                                                            </button>
                                                        </a>
                                                        {{-- <a href="{{ route('admin.companyDatas', $company) }}"><button type="button" class="dropdown-item btn btn-primary btn-xs">All Data</button></a> --}}
                                                        <a onclick="return confirm('Do you really want to delete this company?');"
                                                           href="{{ route('admin.companyDelete', $company) }}">
                                                            <button type="button"
                                                                    class="dropdown-item btn btn-primary btn-xs">Delete
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="dropdown ">

                                                {{-- <div class="btn-group">
                                                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                                    Data
                                                  </button>
                                                  <div class="dropdown-menu">
                                                    <a href="{{ route('admin.companyDatas', $company) }}"><button type="button" class="dropdown-item btn btn-primary btn-xs">All Data</button></a>
                                                    <a href="{{ route('admin.companyDatas', ['company'=>$company,'type'=>'battery']) }}"><button type="button" class="dropdown-item btn btn-primary btn-xs">Battery Data</button></a>
                                                    <a href="{{ route('admin.companyDatas', ['company'=>$company,'type'=>'rectifier']) }}"><button type="button" class="dropdown-item btn btn-primary btn-xs">Rectifier Data</button></a>

                                                  </div>
                                                </div> --}}

                                                {{-- <div class="btn-group">
                                                  <button type="button" class="btn btn-primary  btn-xs dropdown-toggle" data-toggle="dropdown">
                                                     Alarm
                                                  </button>
                                                  <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('admin.allAlarmData',$company->id)}}">Alarm Data</a>

                                                  </div>
                                                </div> --}}

                                            </div>


                                        </td>

                                    </tr>

                                    <?php $i++; ?>

                                @endforeach
                                </tbody>

                            </table>

                            {{ $companiesAll->appends(['status' =>  isset($status) ? $status : null])->render() }}

                        </div>


                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection


@push('js')

@endpush

