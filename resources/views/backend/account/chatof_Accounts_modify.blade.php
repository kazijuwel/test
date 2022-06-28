@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h5 class="text-secondary">Balance Sheet</h5>
                        <a href="{{ route('balancesheet_newgroup') }}" type="button" class="btn btn-light btn-sm">New Group</a>
                        <a href="{{ route('balancesheetnewaccount') }}" type="button" class="btn btn-light btn-sm">New Account</a>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                              <tr>
                                <th style="width: 10%">Action</th>
                                <th scope="col">Name</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ( $coatype->parentBalancesheetGroup() as $bgroup )
                                <tr>
                                    <td>
                                        @if($bgroup->status!=1)
                                        <a href="{{ route('mainBalanceSheetGroupEdit',$bgroup->id) }}" type="button" class="btn btn-light btn-sm">edit</a>
                                        @endif
                                    </td>
                                    <td><p class="text-danger"><strong>{{ $bgroup->name }}</strong></p></td>
                                    <td>
                                        @foreach($bgroup->subGroupBalanceAccount($bgroup->id) as $value)
                                        <tr>
                                            <td><a href="{{ route('subgroupBalaceSheetEdit',$value->id) }}" type="button" class="btn btn-light btn-sm">edit</a></td>
                                            <td>
                                                <p class="text-primary"><strong >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $value->name }}</strong></p>
                                            </td>
                                        </tr>

                                    @foreach($value->childAccount as $subgroupname)
                                        <tr>
                                            <td><a href="{{ route('profitChildGroupEdit',$subgroupname->id) }}" type="button" class="btn btn-light btn-sm">edit</a></td>
                                            <td>
                                                <p class="text-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $subgroupname->name }}</p>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @endforeach

                                        @foreach($bgroup->childAccount as $child)
                                        <tr>
                                        <td><a href="{{ route('UpdatechildBalanceSheetAccount',$child->id) }}" type="button" class="btn btn-light btn-sm">edit</a></td>
                                        <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <p class="text-warning"> {{$child->name }}</p>
                                        </td>
                                    </tr>
                                     @endforeach

                                   </td>
                                </tr>
                                @endforeach

                            </tbody>
                          </table>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h5 class="text-secondary">Profit and Loss</h5>
                        <a href="{{ route('profitandloss_newgroup') }}" type="button" class="btn btn-light btn-sm">New Group</a>
                        <a href="{{ route('profitandlossnewaccount') }}" type="button" class="btn btn-light btn-sm">New Account</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                              <tr>
                                <th style="width: 10%">Action</th>
                                <th scope="col">Name</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ( $coatype->allprofitandlossgroup() as $group )
                                <tr>
                                    <td>
                                        @if($group->status!=1)
                                        <a href="{{ route('profitGroupEdit',$group->id) }}" type="button" class="btn btn-light btn-sm">edit</a>
                                        @endif

                                    </td>
                                    <td><strong class="text-danger">{{ $group->name }}</strong></td>

                                       <td>
                                            @foreach($group->subGroupAccount($group->id) as $value)
                                                <tr>
                                                    <td><a href="{{ route('profitGroupEdit',$value->id) }}" type="button" class="btn btn-light btn-sm">edit</a></td>
                                                    <td>
                                                        <p><strong class="text-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $value->name }}</strong></p>
                                                    </td>
                                                </tr>

                                            @foreach($value->childAccount as $subgroupname)
                                                <tr>
                                                    <td><a href="{{ route('profitChildGroupEdit',$subgroupname->id) }}" type="button" class="btn btn-light btn-sm">edit</a></td>
                                                    <td>
                                                        <p class="text-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $subgroupname->name }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            @endforeach

                                             @foreach($group->childAccount as $child)
                                            <tr>
                                            <td><a href="{{ route('profitChildGroupEdit',$child->id) }}" type="button" class="btn btn-light btn-sm">edit</a></td>
                                            <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{$child->name }}
                                            </td>
                                        </tr>
                                         @endforeach

                                       </td>

                                </tr>
                                @endforeach

                            </tbody>
                          </table>


                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
