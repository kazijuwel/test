@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($coatype->parentBalancesheetGroup() as $bgroup)

                    <div class="row">
                        <div class="col-6">
                            <span class="text-capitalize tex-left"><strong> {{ $bgroup->name }}</strong></span>
                        </div>
                        <div class="col-6">
                            <div class="text-right mb-1">
                                <a href="{{ route('balancesheet_newgroup') }}" class="btn btn-primary btn-sm">New Group</a>
                                <a href="{{ route('balancesheetnewaccount') }}" class="btn btn-primary btn-sm">New
                                    Account</a>
                            </div>
                        </div>
                    </div>

                    <div class="card p-2">

                        <table class="table table-bordered table-sm">

                            <thead>
                                <tr>

                                    <th scope="col">Subgroup</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bgroup->subGroupBalanceAccount($bgroup->id) as $value)
                                    @foreach ($value->childAccount as $subgroupname)
                                        <tr>
                                            <td>{{ $value->name }}</td>
                                            <td scope="col">{{ $subgroupname->code }}</td>
                                            <td scope="col"><a
                                                    href="{{ route('accountDetailsview', $subgroupname->id) }}">{{ $subgroupname->name }}</a>
                                            </td>
                                            <td scope="col">{{ $subgroupname->CoaTypeName->name }}</td>
                                            <td scope="col">{{ $subgroupname->assetsBalance($subgroupname->id) }}</td>
                                            <td scope="col">{{ $subgroupname->assetsStatus($subgroupname->id) }}</td>
                                            <td scope="col">
                                                <a href="{{ route('viewbalanceSheet', $subgroupname->id) }}"><i
                                                        class="las la-eye"></i></a>
                                                <a href="{{ route('balancesheetaccountedit', $subgroupname->id) }}"><i
                                                        class="las la-edit"></i></a>
                                                <a href="{{ route('deleteBalaceSheetAccounts', $subgroupname->id) }}"><i
                                                        class="las la-trash"></i></a>


                                            </td>
                                        </tr>
                                    @endforeach




                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>





























































        <div class="row">
            <div class="col-md-12">
                @foreach ($coatype->allprofitandlossgroup() as $bgroup)
                    <div class="row">
                        <div class="col-6">
                            <span class="text-capitalize tex-left"><strong> {{ $bgroup->name }}</strong></span>
                        </div>
                        <div class="col-6">
                            <div class="text-right mb-1">
                                <a href="{{ route('profitandloss_newgroup') }}" class="btn btn-primary btn-sm">New
                                    Group</a>
                                <a href="{{ route('profitandlossnewaccount') }}" class="btn btn-primary btn-sm">New
                                    Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="card p-2">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Subgroup</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bgroup->childAccount as $sname)


                                    <tr>
                                        <td>{{ $sname->name }}</td>
                                        <td scope="col">{{ $sname->code }}</td>
                                        <td scope="col"><a href="{{ route('accountDetailsview', $sname->id) }}">{{ $sname->name }}</a></td>
                                        <td scope="col">{{ $sname->CoaTypeName->name }}</td>
                                        <td scope="col">{{ $sname->assetsBalance($sname->id) }}</td>
                                        <td scope="col">{{ $sname->assetsStatus($sname->id) }}</td>
                                        <td scope="col">
                                            <a href="{{ route('profitAccountview', $sname->id) }}"><i
                                                    class="las la-eye"></i></a>
                                            <a href="{{ route('profitChildGroupEdit', $sname->id) }}"><i
                                                    class="las la-edit"></i></a>
                                            <a href="{{ route('deleteprofitandlossgroup', $sname->id) }}"><i
                                                    class="las la-trash"></i></a>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>




                @endforeach
            </div>
        </div>



























        {{-- <div class="row">
            <div class="col-md-12">
                <p><strong>Liabilites</strong></p>
                <div class="card p-2">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($chartof_account->allLiabilities() as $chList)
                            <tr>
                                <td scope="col">{{ $chList->code }}</td>
                                <td scope="col">{{ $chList->name }}</td>
                                <td scope="col">{{ $chList->CoaTypeName->name }}</td>
                                <td scope="col">{{ $chList->LiabilitiesBalance($chList->id) }}</td>
                                <td scope="col">{{ $chList->LiabilitiesStatus($chList->id) }}</td>
                                <td scope="col">
                                    <a href="{{ route('viewbalanceSheet',$chList->id) }}"><i class="las la-eye"></i></a>
                                    <a href="{{ route('balancesheetaccountedit',$chList->id) }}"><i class="las la-edit"></i></a>
                                    <a href="{{ route('deleteBalaceSheetAccounts',$chList->id) }}"><i class="las la-trash"></i></a>

                                </td>
                              </tr>
                            @endforeach

                        </tbody>
                      </table>
                </div>

            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <p><strong>Expense</strong></p>
                <div class="card p-2">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($chartof_account->allExpense() as $chList)
                            <tr>
                                <td scope="col">{{ $chList->code }}</td>
                                <td scope="col">{{ $chList->name }}</td>
                                <td scope="col">{{ $chList->CoaTypeName->name }}</td>
                                <td scope="col">{{ $chList->ExpenseBalance($chList->id) }}</td>
                                <td scope="col">{{ $chList->ExpenseStatus($chList->id) }}</td>
                                <td scope="col">
                                    <a href="{{ route('profitAccountview',$chList->id) }}"><i class="las la-eye"></i></a>
                                    <a href="{{ route('profitChildGroupEdit',$chList->id) }}"><i class="las la-edit"></i></a>
                                    <a href="{{ route('deleteprofitandlossgroup',$chList->id) }}"><i class="las la-trash"></i></a>

                                </td>
                              </tr>
                            @endforeach

                        </tbody>
                      </table>
                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <p><strong>Income</strong></p>
                <div class="card p-2">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($chartof_account->allIncome() as $chList)
                            <tr>
                                <td scope="col">{{ $chList->code }}</td>
                                <td scope="col">{{ $chList->name }}</td>
                                <td scope="col">{{ $chList->CoaTypeName->name }}</td>
                                <td scope="col">{{ $chList->IncomeBalance($chList->id) }}</td>
                                <td scope="col">{{ $chList->incomeStatus($chList->id) }}</td>
                                <td scope="col">
                                    <a href="{{ route('profitAccountview',$chList->id) }}"><i class="las la-eye"></i></a>
                                    <a href="{{ route('profitChildGroupEdit',$chList->id) }}"><i class="las la-edit"></i></a>
                                    <a href="{{ route('deleteprofitandlossgroup',$chList->id) }}"><i class="las la-trash"></i></a>

                                </td>
                              </tr>
                            @endforeach

                        </tbody>
                      </table>
                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <p><strong>Equity</strong></p>
                <div class="card p-2">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($chartof_account->allequity() as $chList)
                            <tr>
                                <td scope="col">{{ $chList->code }}</td>
                                <td scope="col">{{ $chList->name }}</td>
                                <td scope="col">{{ $chList->CoaTypeName->name }}</td>
                                <td scope="col">{{ $chList->equityBalance($chList->id) }}</td>
                                <td scope="col">{{ $chList->equityStatus($chList->id) }}</td>
                                <td scope="col">
                                    <a href="{{ route('viewbalanceSheet',$chList->id) }}"><i class="las la-eye"></i></a>
                                    <a href="{{ route('balancesheetaccountedit',$chList->id) }}"><i class="las la-edit"></i></a>
                                    <a href="{{ route('deleteBalaceSheetAccounts',$chList->id) }}"><i class="las la-trash"></i></a>

                                </td>
                              </tr>
                            @endforeach

                        </tbody>
                      </table>
                </div>

            </div>

        </div> --}}
    </div>
@endsection
@section('script')

@endsection
