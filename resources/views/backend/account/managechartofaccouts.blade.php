@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                @foreach ($bsCoaTypes as $bgroup)
                <div class="row">
                    <div class="col-6">
                        <span class="text-capitalize tex-left"><strong> {{ $bgroup->name }}</strong></span></div>
                    <div class="col-6">
                        <div class="text-right mb-1">
                            <a href="{{ route('balancesheet_newgroup') }}" class="btn btn-primary btn-sm">New Group</a >
                            <a href="{{ route('balancesheetnewaccount') }}" class="btn btn-primary btn-sm">New Account</a >
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">




                        <strong>{{ $bgroup->name }}</strong>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered" style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                      <th scope="col" width="130">Code</th>
                                      <th scope="col" width="320">Name</th>

                                      <th scope="col" width="120">Balance</th>

                                      <th scope="col"  width="120">Action</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                      @foreach($bgroup->childAccount as $coa)
                                      <tr>
                                          <td>{{ $coa->code }}</td>
                                          <td> <a class="" href={{route('accountDetailsview',$coa->id) }}><a class="" href={{route('accountDetailsview',$coa->id) }}>{{ $coa->name }}</a></a></td>

                                          <td>{{ $coa->balance() }}</td>

                                          <td>

                                    <a class="btn btn-primary btn-xs" href="{{ route('balancesheetaccountedit',$coa->id) }}"><i class="las la-edit"></i></a>

                                    @if ( $coa->balance() <= 1)
                                         <a class="btn btn-warning btn-xs" onclick="return confirm('Do you really want to delete this?')" href="{{ route('deleteBalaceSheetAccounts',$coa->id) }}"><i class="las la-trash"></i></a>
                                    @endif





                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                            </table>
                        </div>





                        @foreach($bgroup->childCoaTypes() as $subgroup)

                        <strong>{{ $subgroup->name }}</strong>

                        <div class="table-responsive">
                            <table class="table table-sm table-bordered" style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                      <th scope="col" width="130">Code</th>
                                      <th scope="col"  width="320">Name</th>

                                      <th scope="col" width="120">Balance</th>

                                      <th scope="col"  width="120">Action</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                      @foreach($subgroup->childAccount as $coa)
                                      <tr>
                                          <td>{{ $coa->code }}</td>
                                          <td><a class="" href={{route('accountDetailsview',$coa->id) }}>{{ $coa->name }}</a></td>

                                          <td>{{ $coa->balance() }}</td>

                                          <td>
                                            <a class="btn btn-primary btn-xs" href="{{ route('balancesheetaccountedit',$coa->id) }}"><i class="las la-edit"></i></a>
                                            @if ( $coa->balance() <= 1)
                                      
                                            <a class="btn btn-warning btn-xs" onclick="return confirm('Do you really want to delete this?')" href="{{ route('deleteBalaceSheetAccounts',$coa->id) }}"><i class="las la-trash"></i></a>
                                            @endif
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                            </table>


                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach














                @foreach ($plCoaTypes as $bgroup)
                <div class="row">
                    <div class="col-6">
                        <span class="text-capitalize tex-left"><strong> {{ $bgroup->name }}</strong></span></div>
                    <div class="col-6">
                        <div class="text-right mb-1">
                            <a href="{{ route('profitandloss_newgroup') }}" class="btn btn-primary btn-sm">New Group</a >
                                <a href="{{ route('profitandlossnewaccount') }}" class="btn btn-primary btn-sm">New Account</a >
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">


                        <strong>{{ $bgroup->name }}</strong>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered" style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                      <th scope="col" width="130">Code</th>
                                      <th scope="col"  width="320">Name</th>

                                      <th scope="col" width="120">Balance</th>

                                      <th scope="col"  width="120">Action</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                      @foreach($bgroup->childAccount as $coa)
                                      <tr>
                                          <td>{{ $coa->code }}</td>
                                          <td><a class="" href={{route('accountDetailsview',$coa->id) }}>{{ $coa->name }}</a></td>

                                          <td>{{ $coa->balance() }}</td>

                                          <td>
                                            <a class="btn btn-primary btn-xs" href="{{ route('profitChildGroupEdit',$coa->id) }}"><i class="las la-edit"></i></a>
                                            @if($coa->balance() <= 1)
                                            <a class="btn btn-warning btn-xs" onclick="return confirm('Do you really want to delete this?')" href="{{ route('deleteprofitandlossgroup',$coa->id) }}"><i class="las la-trash"></i></a>
                                            @endif
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                            </table>
                        </div>





                        @foreach($bgroup->childCoaTypes() as $subgroup)

                        <strong>{{ $subgroup->name }}</strong>

                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                      <th scope="col" width="130">Code</th>
                                      <th scope="col" width="320">Name</th>

                                      <th scope="col" width="120">Balance</th>

                                      <th scope="col"  width="120">Action</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                    @foreach($subgroup->childAccount as $coa)
                                    <tr>
                                        <td>{{ $coa->code }}</td>
                                        <td><a class="" href={{route('accountDetailsview',$coa->id) }}>{{ $coa->name }}</a></td>

                                        <td>{{ $coa->balance() }}</td>

                                        <td>
                                            <a class="btn btn-primary btn-xs" href="{{ route('profitChildGroupEdit',$coa->id) }}"><i class="las la-edit"></i></a>
                                            @if ( $coa->balance() <= 1)
                                            <a class="btn btn-warning btn-xs" onclick="return confirm('Do you really want to delete this?')" href="{{ route('deleteprofitandlossgroup',$coa->id) }}"><i class="las la-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        @endforeach

                    </div>
                </div>
                @endforeach


            </div>
        </div>
















    </div>
@endsection
@section('script')

@endsection
