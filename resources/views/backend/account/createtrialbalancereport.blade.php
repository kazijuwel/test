@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="text-center">
                    <h5 class="">belaobela.com</h5>
                    <h4>Trial Balance</h4>
                    <p>From:   {{date('d/m/Y',strtotime($start)) }}   --- To: {{date('d/m/Y',strtotime($end)) }}</p>
                </div>
                <hr class="m-0">

                <div class="card-body">
                    @php
                    $totalIncomeBalance = 0;
                  @endphp
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Particulars</th>
                        <th scope="col">Dr</th>
                        <th scope="col">Cr</th>
                      </tr>
                    </thead>
                    <tbody>
                {{-- <div class="row">
                    <div class="col-10"></div>
                    <div class="col-1">Debit</div>
                    <div class="col-1">Credit</div>
                </div> --}}

                @foreach($coaIncomes as $type)
                {{-- <span class="text-left text-capitalize"><b>{{ $type->name }} :</b></span> --}}
                    @foreach($type->subGroupAccount($type->id) as $sg)

                    {{-- <tr>
                        <td>{{ $sg->name }}</td>
                        <td></td>
                        <td></td>
                    </tr> --}}
                    {{-- <span class="text-left text-capitalize pl-2"><b>{{ $sg->name }}</b></span> --}}

                    @php
                        $subtotalBalance=0;
                        foreach($sg->childAccount as $tb)
                        {
                            $subtotalBalance+=$tb->balance($start,$end, 'credit');
                        }
                    @endphp


                        @foreach($sg->childAccount as $coa)
                        <tr>
                            <td>{{ $coa->name }}</td>
                            <td></td>
                            <td>
                                <a href="{{ route('voucheritems',[$coa->id,'credit','trial_balance',$start,$end]) }}">{{ $coa->balance($start,$end, 'credit') }}</td>
                        </tr>
                        {{-- <div class="row">
                            <div class="col-10">
                                <span class="pl-4">{{ $coa->name }}</span>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-1">
                                <a href="{{ route('voucheritems',[$coa->id,'credit','trial_balance',$start,$end]) }}">{{ $coa->balance($start,$end, 'credit') }}</a>
                            </div>
                        </div> --}}

                        @endforeach

                        @php
                             $totalIncomeBalance = $totalIncomeBalance + $subtotalBalance;
                        @endphp

                    {{-- - <b> Total {{ $sg->name }}: {{ $subtotalBalance }} </b> <br> --}}

                    @endforeach


                    @foreach ($type->childAccount as $ma)
                    <tr>
                        <td>{{ $ma->name }}</td>
                        <td></td>
                        <td>
                            <a href="{{ route('voucheritems',[$ma->id,'credit','trial_balance',$start,$end]) }}">{{ $ma->balance($start,$end, 'credit') }}</a>
                        </td>
                    </tr>
                    {{-- <div class="row">
                        <div class="col-10">
                            <span class="pl-4">{{ $ma->name }}</span>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-1">
                            <a href="{{ route('voucheritems',[$ma->id,'credit','trial_balance',$start,$end]) }}">{{ $ma->balance($start,$end, 'credit') }}</a>
                        </div>
                    </div> --}}



                    @php
                    $totalIncomeBalance = $totalIncomeBalance + $ma->balance($start,$end, 'credit');
                   @endphp
                    @endforeach
                @endforeach


                {{-- <b>Total Income: {{ $totalIncomeBalance }}</b> <br> --}}
                 <!-----------Liabilities----->


                 @php
                     $totalExpenseBalance = 0;
                 @endphp


                @foreach($coaExpenses as $type)
                {{-- <span class="text-left text-capitalize"><b>{{ $type->name }} </b></span> --}}
                    @foreach($type->subGroupAccount($type->id) as $lia)
                   {{-- <span class="text-left text-capitalize pl-2"><b>{{ $lia->name }}</b></span> --}}

                    @php
                        $subtotalBalance=0;
                        foreach($lia->childAccount as $tb)
                        {
                            $subtotalBalance+=$tb->balance($start,$end, 'debit');
                        }
                    @endphp


                        @foreach($lia->childAccount as $coa)
                        <tr>
                            <td><span class="pl-4">{{ $coa->name }}</span></td>
                            <td><a href="{{ route('voucheritems',[$coa->id,'credit','trial_balance',$start,$end]) }}">{{ $coa->balance($start,$end, 'credit') }}</td>
                            <td></td>
                        </tr>
                        {{-- <div class="row">
                            <div class="col-10">
                                <span class="pl-4">{{ $coa->name }}</span>
                            </div>
                            <div class="col-1">
                                <a href="{{ route('voucheritems',[$coa->id,'credit','trial_balance',$start,$end]) }}">{{ $coa->balance($start,$end, 'credit') }}</a>
                            </div>
                            <div class="col-1">
                            </div>
                        </div> --}}
                      {{-- </b> <br> --}}
                        @endforeach

                    {{-- - <b> Total {{ $lia->name }}: {{ $subtotalBalance }} </b> <br> --}}

                    @php
                        $totalExpenseBalance = $totalExpenseBalance + $subtotalBalance;
                    @endphp

                    @endforeach
                    @foreach ($type->childAccount as $exp)
                    <tr>
                        <td><span class="">{{ $exp->name }}</span></td>
                        <td><a href="{{ route('voucheritems',[$exp->id,'debit','trial_balance',$start,$end]) }}">{{ $exp->balance($start,$end, 'debit') }}</a></td>
                        <td></td>
                    </tr>
                    {{-- <div class="row">
                        <div class="col-10">
                            <span class="p-4">{{ $exp->name }}</span>
                        </div>
                        <div class="col-1">
                            <a href="{{ route('voucheritems',[$exp->id,'debit','trial_balance',$start,$end]) }}">{{ $exp->balance($start,$end, 'debit') }}</a>
                        </div>
                        <div class="col-1"></div>
                    </div> --}}
                    @php
                    $totalExpenseBalance = $totalExpenseBalance + $exp->balance($start,$end, 'debit');
                   @endphp
                    @endforeach


                @endforeach
                {{-- <b>Total Expense: {{ $totalExpenseBalance }}</b> <br> --}}

                {{-- <div class="row">
                    <div class="col-10">
                        <b>Net Profit {{ ($totalIncomeBalance - $totalExpenseBalance) >0?"":"(Loss)" }} </b>
                    </div>
                    <div class="col-2">
                        {{ ($totalIncomeBalance - $totalExpenseBalance) > 0 ? ($totalIncomeBalance - $totalExpenseBalance) : ''.abs($totalIncomeBalance - $totalExpenseBalance).''}}
                    </div>
                </div>  --}}

                {{-- </div> --}}
                <!--BalanceSheet-->
                <div class="card-body" class="m-0">
                @php
                $totalAssetBalance = 0;
                @endphp
            @foreach($coaAssets as $type)
            {{-- <span class="text-left text-capitalize"><b>{{ $type->name }} </b></span> --}}

                @foreach($type->subGroupAccount($type->id) as $sg)
                {{-- <span class="text-left text-capitalize pl-2"><b>{{ $sg->name }} </b></span> --}}
                @php
                    $subtotalBalance=0;
                    foreach($sg->childAccount as $tb)
                    {
                        $subtotalBalance+=$tb->balance($start,$end, 'debit');
                    }
                @endphp
                    @foreach($sg->childAccount as $coa)
                    <tr>
                        <td> <span class="pl-4">{{ $coa->name }} </span></td>
                        <td> <a href="{{ route('voucheritems',[$coa->id,'debit','trial_balance',$start,$end]) }}">{{$coa->balance($start,$end, 'debit')}}</a></td>
                        <td></td>
                    </tr>
                    {{-- <div class="row">
                        <div class="col-10">
                            <span class="pl-4">{{ $coa->name }} </span>
                        </div>
                        <div class="col-1">
                            <a href="{{ route('voucheritems',[$coa->id,'debit','trial_balance',$start,$end]) }}">{{$coa->balance($start,$end, 'debit')}}</a>
                        </div>
                        <div class="col-1"></div>
                    </div> --}}
                    @endforeach

                    @php
                         $totalAssetBalance = $totalAssetBalance + $subtotalBalance;
                    @endphp

                {{-- - <b> Total {{ $sg->name }}: {{ $subtotalBalance }} </b> <br> --}}

                @endforeach
                @foreach ($type->childAccount as $ma)
                <tr>
                    <td> <span class="pl-4">{{ $ma->name }}</span></td>
                    <td> <a href="{{ route('voucheritems',[$ma->id,'debit','trial_balance',$start,$end]) }}">{{ $coa->balance($start,$end, 'debit') }}</a></td>
                    <td></td>
                </tr>
                {{-- <div class="row">
                    <div class="col-10">
                        <span class="pl-4">{{ $ma->name }}</span>
                    </div>
                    <div class="col-1">
                        <a href="{{ route('voucheritems',[$ma->id,'debit','trial_balance',$start,$end]) }}">{{ $coa->balance($start,$end, 'debit') }}</a>
                    </div>
                    <div class="col-1"></div>
                </div> --}}


                @php
                $totalAssetBalance = $totalAssetBalance + $coa->balance($start,$end, 'debit');
               @endphp
                @endforeach

            @endforeach


            {{-- <b>Total Assets: {{ $totalAssetBalance }}</b> <br> --}}
             <!-----------Liabilities----->



             @php
                 $totalLiabitiesBalance = 0;
             @endphp


            @foreach($coaLiabilities as $type)
            <span class="text-left text-capitalize">
                {{-- <b>{{ $type->name }} </b></span>
            <br> --}}

                @foreach($type->subGroupAccount($type->id) as $lia)
                {{-- <span class="text-left text-capitalize pl-2"><b>{{ $lia->name }} </b></span> --}}

                @php
                    $subtotalBalance=0;
                    foreach($lia->childAccount as $tb)
                    {
                        $subtotalBalance+=$tb->balance($start,$end, 'credit');
                    }
                @endphp


                    @foreach($lia->childAccount as $coa)
                    <tr>
                        <td>{{ $coa->name }}</td>
                        <td></td>
                        <td>
                            <a href="{{ route('voucheritems',[$coa->id,'credit','trial_balance',$start,$end]) }}">{{ $coa->balance($start,$end, 'credit') }}</a></td>
                    </tr>
                    {{-- <div class="row">
                        <div class="col-10">
                            <span class="pl-4">{{ $coa->name }}</span>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-1 text-right">
                            <a href="{{ route('voucheritems',[$coa->id,'credit','trial_balance',$start,$end]) }}">{{ $coa->balance($start,$end, 'credit') }}</a>
                        </div>

                    </div> --}}
                    @endforeach

                {{-- - <b> Total {{ $lia->name }}: {{ $subtotalBalance }} </b> <br> --}}

                @php
                    $totalLiabitiesBalance = $totalLiabitiesBalance + $subtotalBalance;
                @endphp
                @endforeach
                @foreach ($type->childAccount as $ma)
                <tr>
                    <td>{{ $ma->name }}</td>
                    <td></td>
                    <td><a href="{{ route('voucheritems',[$ma->id,'credit','trial_balance',$start,$end]) }}">{{ $ma->balance($start,$end, 'credit') }}</td>
                </tr>
                {{-- <div class="row">
                    <div class="col-10">
                        <span class="pl-4">{{ $ma->name }}</span>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-1 text-right">
                        <a href="{{ route('voucheritems',[$ma->id,'credit','trial_balance',$start,$end]) }}">{{ $coa->balance($start,$end, 'credit') }}</a>
                    </div>
                </div> --}}

                @php
                $totalLiabitiesBalance = $totalLiabitiesBalance + $coa->balance($start,$end, 'credit')+$ma->balance($start,$end, 'credit');
               @endphp
                @endforeach


            @endforeach
            {{-- <b>Total Liabilities: {{ $totalLiabitiesBalance }}</b> <br> --}}



            {{-- <b>Net Assets: {{ ($totalAssetBalance - $totalLiabitiesBalance) > 0 ? ($totalAssetBalance - $totalLiabitiesBalance) : '('.-($totalAssetBalance - $totalLiabitiesBalance).')'}}</b> --}}
            {{-- </div> --}}
            @php
                $eq1=$totalExpenseBalance +$totalAssetBalance;
                $eq2=$totalIncomeBalance +$totalLiabitiesBalance;
                $eq=$eq1- $eq2;
            @endphp
            <tr>
                <td>Equity</td>
                <td>{{($eq < 0 ? abs($eq) : " ")}}</td>
                <td>{{($eq < 0 ? " " : abs($eq))}}</td>
            </tr>
            <tr>
                <td style="background: yellow">Total</td>
                <!--debit--->
                   @if($eq < 0)
                    <td>{{ $eq1 - $eq }}</td>
                   @else
                   <td>{{ $eq1  }}</td>
                   @endif
                   <!--credit--->
                  @if($eq > 0)
                    <td>{{ $eq2 + $eq }}</td>
                   @else
                   <td>{{ $eq2  }}</td>
                   @endif


                  
     
            </tr>

              {{-- <div class="row">
                  <div class="col-10"></div>
                  <div class="col-1">{{ $totalExpenseBalance +$totalAssetBalance}}</div>
                  <div class="col-1">{{ $totalIncomeBalance +$totalLiabitiesBalance }}</div>
              </div> --}}

            </tbody>
        </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
