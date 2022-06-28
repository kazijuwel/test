@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="text-center p-3">
                    <h5 class="">belaobela.com</h5>
                    <h4>General Ledger Summery</h4>
                    <p>From:   {{date('d/m/Y',strtotime($start)) }}   --- To: {{date('d/m/Y',strtotime($end)) }}</p>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Opening Balance</th>
                            <th scope="col">Total Dr</th>
                            <th scope="col">Total Cr</th>
                            <th scope="col">Colsing Balance</th>
                          </tr>
                        </thead>
                        <tbody>



                    {{-- <div class="row text-right">
                        <div class="col-4"></div>
                        <div class="col-2">Opening Balance</div>
                        <div class="col-1">Total Dr</div>
                        <div class="col-1">Total Cr</div>
                        <div class="col-2">Colsing Balance</div>
                    </div>
                    <hr> --}}
                    @php
                    $totalIncomeBalance = 0;
                   @endphp
                @foreach($coaIncomes as $type)

                <b> {{ $type->name }} :</b> <br>

                    @foreach($type->subGroupAccount($type->id) as $sg)
                    <tr>
                        <th scope="row"><b>{{ $sg->name }}</b></th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    {{-- - {{ $sg->name }} <br> --}}
                    @php

                        $subtotalBalance=0;
                        foreach($sg->childAccount as $tb)
                        {
                            $subtotalBalance+=$tb->journalBalance($start,$end, 'credit');

                        }
                    @endphp

                        @foreach($sg->childAccount as $coa)
                        <tr>
                            <td>{{ $coa->name }}</td>
                            <td>{{ $coa->journalOpeningBalance($start,$end) }}</td>
                            <td>
                                @if( $coa->journalTotalBalance($start,$end, 'debit') == 0)
                                0
                            @else
                             <a href="{{ route('voucheritems',[$coa->id,'debit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalTotalBalance($start,$end, 'debit') }}</b></a>
                             @endif
                            </td>
                            <td>
                                @if( $coa->journalTotalBalance($start,$end, 'credit') == 0)
                                0
                               @else
                               <a href="{{ route('voucheritems',[$coa->id,'credit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalTotalBalance($start,$end, 'credit') }}</b></a>
                               @endif
                            </td>
                            <td></td>
                        </tr>
                        {{-- <div class="row text-right">
                            <div class="col-4">{{ $coa->name }}</div>
                            <div class="col-2">{{ $coa->journalOpeningBalance($start,$end) }}</div>
                            <div class="col-1">
                            @if( $coa->journalTotalBalance($start,$end, 'debit') == 0)
                                0
                            @else
                             <a href="{{ route('voucheritems',[$coa->id,'debit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalTotalBalance($start,$end, 'debit') }}</b></a>
                             @endif
                            </div>
                            <div class="col-1">
                                @if( $coa->journalTotalBalance($start,$end, 'credit') == 0)
                                0
                               @else
                               <a href="{{ route('voucheritems',[$coa->id,'credit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalTotalBalance($start,$end, 'credit') }}</b></a>
                               @endif
                            </div>
                            <div class="col-2">
                                @if( $coa->journalTotalBalance($start,$end, 'credit') != 0)
                                <a href="{{ route('voucheritems',[$coa->id,'credit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalTotalBalance($start,$end, 'credit') }}</b></a>
                               @endif
                            </div>
                            <div class="col-2"></div>
                        </div> --}}
                        @endforeach
                        @php
                             $totalIncomeBalance = $totalIncomeBalance + $subtotalBalance;
                        @endphp

                    {{-- - <b> Total {{ $sg->name }}: {{ $subtotalBalance }} </b> <br> --}}

                    @endforeach
                    <br>
                    {{-- Main Group Account --}}

                    @foreach ($type->childAccount as $ma)
                        <tr>
                            <td><span class="pl-4">{{ $ma->name }}</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <div class="row text-right">
                        <tr>
                            <td><span class="pl-4">{{ $ma->name }}</span></td>
                            <td><span class="pl-4">{{ $ma->journalOpeningBalance($start,$end) }}</span></td>
                            <td>
                            @if( $ma->journalTotalBalance($start,$end, 'debit') == 0)
                                0
                            @else
                             <a href="{{ route('voucheritems',[$ma->id,'debit','ledger_summery',$start,$end]) }}"><b>{{ $ma->journalTotalBalance($start,$end, 'debit') }}</b></a>
                             @endif
                            </td>
                        </tr>
                        <div class="col-4 text-left">
                            
                        </div>
                        <div class="col-2"></div>
                        <div class="col-1">

                        </div>
                        <div class="col-1">
                            @if( $ma->journalTotalBalance($start,$end, 'credit') == 0)
                            0
                           @else
                           <a href="{{ route('voucheritems',[$ma->id,'credit','ledger_summery',$start,$end]) }}"><b>{{ $ma->journalTotalBalance($start,$end, 'credit') }}</b></a>
                           @endif
                        </div>
                        <div class="col-2">
                            @if( $ma->journalTotalBalance($start,$end, 'credit') != 0)
                           <a href="{{ route('voucheritems',[$ma->id,'credit','ledger_summery',$start,$end]) }}"><b>{{ $ma->journalTotalBalance($start,$end, 'credit') }} cr</b>
                           </a>
                           @endif
                        </div>
                        <div class="col-2"></div>
                    </div>
                    @php
                    $totalIncomeBalance = $totalIncomeBalance + $ma->journalBalance($start,$end, 'credit');
                   @endphp
                    @endforeach


                @endforeach
                </tbody>
            </table>
      <!---End Income---->
                 <br>
{{-- Expense --}}
                 @php
                     $totalExpenseBalance = 0;
                 @endphp


                @foreach($coaExpenses as $type)
                <b> {{ $type->name }} :</b> <br>
                    @foreach($type->subGroupAccount($type->id) as $lia)
                    <span><b>{{ $lia->name }} </b></span>
                    <br>
                    @php
                        $subtotalBalance=0;
                        foreach($lia->childAccount as $tb)
                        {
                            $subtotalBalance+=$tb->journalBalance($start,$end, 'debit');
                        }
                    @endphp
                        @foreach($lia->childAccount as $coa)

                        <div class="row text-right">
                            <div class="col-4 pl-4">{{ $coa->name }}</div>
                            <div class="col-2">{{ $coa->journalOpeningBalance($start,$end) }}</div>
                            <div class="col-1">
                            @if( $coa->journalTotalBalance($start,$end, 'debit') == 0)
                                0
                            @else
                             <a href="{{ route('voucheritems',[$coa->id,'debit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalTotalBalance($start,$end, 'debit') }}</b></a>
                             @endif
                            </div>
                            <div class="col-1">
                                @if( $coa->journalTotalBalance($start,$end, 'credit') == 0)
                                0
                               @else
                               <a href="{{ route('voucheritems',[$coa->id,'credit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalTotalBalance($start,$end, 'credit') }}</b></a>
                               @endif
                            </div>
                            <div class="col-2">
                                @if( $coa->journalTotalBalance($start,$end, 'credit') != 0)
                                <a href="{{ route('voucheritems',[$coa->id,'debit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalBalanceWithType($start,$end, 'debit') }}</b></a>
                               @endif
                            </div>
                            <div class="col-2"></div>
                        </div>

{{--
                        -- {{ $coa->name }}  <b>{{ $coa->journalOpeningBalance($start,$end) }}</b>-<b>{{ $coa->journalTotalBalance($start,$end, 'debit') }}</b> -<b>{{ $coa->journalTotalBalance($start,$end, 'credit') }}</b>-<b>{{ $coa->journalBalanceWithType($start,$end, 'debit') }}</b>- <b>{{ $coa->journalBalanceWithType($start,$end, 'debit') }} <br> --}}
                        @endforeach

                    {{-- - <b> Total {{ $lia->name }}: {{ $subtotalBalance }} </b> <br> --}}

                    @php
                        $totalExpenseBalance = $totalExpenseBalance + $subtotalBalance;
                    @endphp

                    @endforeach
                    @foreach ($type->childAccount as $exp)
                    <div class="row text-right">
                        <div class="col-4 text-left"><span class="pl-4">{{ $exp->name }}</span></div>
                        <div class="col-2">{{ $exp->journalOpeningBalance($start,$end) }}</div>
                        <div class="col-1">
                        @if( $exp->journalTotalBalance($start,$end, 'debit') == 0)
                            0
                        @else
                         <a href="{{ route('voucheritems',[$exp->id,'debit','ledger_summery',$start,$end]) }}"><b>{{ $exp->journalTotalBalance($start,$end, 'debit') }}</b></a>
                         @endif
                        </div>
                        <div class="col-1">
                            @if( $exp->journalTotalBalance($start,$end, 'credit') == 0)
                            0
                           @else
                           <a href="{{ route('voucheritems',[$exp->id,'credit','ledger_summery',$start,$end]) }}"><b>{{ $exp->journalTotalBalance($start,$end, 'credit') }}</b></a>
                           @endif
                        </div>
                        <div class="col-2">
                            @if( $exp->journalTotalBalance($start,$end, 'debit') != 0)
                           <a href="{{ route('voucheritems',[$exp->id,'debit','ledger_summery',$start,$end]) }}"><b>{{ $exp->journalBalanceWithType($start,$end, 'debit') }}</b>
                           </a>
                           @endif
                        </div>
                        <div class="col-2"></div>
                    </div>

                    {{-- ---{{ $exp->name }} <b>{{ $exp->journalOpeningBalance($start,$end) }}</b>-<b>{{ $exp->journalTotalBalance($start,$end, 'debit') }}</b> -<b>{{ $exp->journalTotalBalance($start,$end, 'credit') }}</b>-<b>{{ $exp->journalBalanceWithType($start,$end, 'debit') }}</b>- <b>{{ $exp->journalBalanceWithType($start,$end, 'debit') }}</b> --}}
                    @php
                    $totalExpenseBalance = $totalExpenseBalance + $exp->journalBalance($start,$end, 'debit');
                   @endphp
                    @endforeach
                @endforeach
                <br>
                <hr class="">
                @php
                    $netProfit=$totalIncomeBalance - $totalExpenseBalance;
                @endphp
                <div class="row">
                    <div class="col-6"><b>Net Profit
                        @if($netProfit < 0 )
                       (loss)
                        @endif
                    </b></div>
                    <div class="col-6">{{ abs($netProfit) }}</div>
                </div>

                <hr class="m-0">


                </div>
                {{-- Asset --}}
                <div class="card-body">
                @php
                $totalAssetBalance = 0;
            @endphp


            @foreach($coaAssets as $type)

            <b> {{ $type->name }} :</b> <br>

                @foreach($type->subGroupAccount($type->id) as $sg)

                <span class="pl-2"><strong>{{ $sg->name }}</strong> </span> <br>
                @php
                    $subtotalBalance=0;
                    foreach($sg->childAccount as $tb)
                    {
                        $subtotalBalance+=$tb->journalBalance($start,$end, 'debit');

                    }
                @endphp
                    @foreach($sg->childAccount as $coa)
                    <div class="row text-right">
                        <div class="col-4 text-left pl-5">{{ $coa->name }}</div>
                        <div class="col-2">{{ $coa->journalOpeningBalance($start,$end) }}</div>
                        <div class="col-1">
                        @if( $coa->journalTotalBalance($start,$end, 'debit') == 0)
                            0
                        @else
                         <a href="{{ route('voucheritems',[$coa->id,'debit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalTotalBalance($start,$end, 'debit') }}</b></a>
                         @endif
                        </div>
                        <div class="col-1">
                            @if( $coa->journalTotalBalance($start,$end, 'credit') == 0)
                            0
                           @else
                           <a href="{{ route('voucheritems',[$coa->id,'credit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalTotalBalance($start,$end, 'credit') }}</b></a>
                           @endif
                        </div>
                        <div class="col-2">
                            @if( $coa->journalTotalBalance($start,$end, 'credit') != 0)
                            <a href="{{ route('voucheritems',[$coa->id,'debitandcredit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalBalanceWithType($start,$end, 'debit') }}</b></a>
                           @endif
                        </div>
                        <div class="col-2"></div>
                    </div>




                    {{-- -- {{ $coa->name }}  <b>{{ $exp->journalOpeningBalance($start,$end) }}</b>-<b>{{ $coa->journalTotalBalance($start,$end, 'debit') }}</b> -<b>{{ $coa->journalTotalBalance($start,$end, 'credit') }}</b>-<b>{{ $coa->journalBalanceWithType($start,$end, 'debit') }}</b>- <b>{{ $coa->journalBalanceWithType($start,$end, 'debit') }}</b> <br> --}}

                    @endforeach

                    @php
                         $totalAssetBalance = $totalAssetBalance + $subtotalBalance;
                    @endphp

                {{-- - <b> Total {{ $sg->name }}: {{ $subtotalBalance }} </b> <br> --}}

                @endforeach
                @foreach ($type->childAccount as $ma)
                <div class="row text-right">
                    <div class="col-4 text-left text-justify"><span class="pl-4">{{ $ma->name }}</span></div>
                    <div class="col-2">{{ $ma->journalOpeningBalance($start,$end) }}</div>
                    <div class="col-1">
                    @if( $ma->journalTotalBalance($start,$end, 'debit') == 0)
                        0
                    @else
                     <a href="{{ route('voucheritems',[$ma->id,'debit','ledger_summery',$start,$end]) }}"><b>{{ $ma->journalTotalBalance($start,$end, 'debit') }}</b></a>
                     @endif
                    </div>
                    <div class="col-1">
                        @if( $ma->journalTotalBalance($start,$end, 'credit') == 0)
                        0
                       @else
                       <a href="{{ route('voucheritems',[$ma->id,'credit','ledger_summery',$start,$end]) }}"><b>{{ $ma->journalTotalBalance($start,$end, 'credit') }}</b></a>
                       @endif
                    </div>
                    <div class="col-2">
                        @if( $ma->journalTotalBalance($start,$end, 'debit') != 0)
                       <a href="{{ route('voucheritems',[$ma->id,'debit','ledger_summery',$start,$end]) }}"><b>{{ $ma->journalBalanceWithType($start,$end, 'debit') }}</b>
                       </a>
                       @endif
                    </div>
                    <div class="col-2"></div>
                </div>
                {{-- ---{{ $ma->name }}  <b>{{ $ma->journalOpeningBalance($start,$end) }}</b>-<b>{{ $ma->journalTotalBalance($start,$end, 'debit') }}</b> -<b>{{ $ma->journalTotalBalance($start,$end, 'credit') }}</b>-<b>{{ $ma->journalBalanceWithType($start,$end, 'debit') }}</b> - <b>{{ $ma->journalBalanceWithType($start,$end, 'debit') }}</b> --}}
                <br>

                @php
                $totalAssetBalance = $totalAssetBalance + $coa->journalBalance($start,$end, 'debit');
               @endphp
                @endforeach

            @endforeach
{{-- End Asset --}}

            {{-- <b>Total Assets: {{ $totalAssetBalance }}</b> <br> --}}
             <!-----------Liabilities----->

             <br>

             @php
                 $totalLiabitiesBalance = 0;
             @endphp


            @foreach($coaLiabilities as $type)

           <b> {{ $type->name }} :</b> <br>

                @foreach($type->subGroupAccount($type->id) as $lia)

                <span class="pl-2"><strong>{{ $lia->name }}</strong></span> <br>
                @php
                    $subtotalBalance=0;
                    foreach($lia->childAccount as $tb)
                    {
                        $subtotalBalance+=$tb->journalBalance($start,$end, 'credit');
                    }
                @endphp


                    @foreach($lia->childAccount as $coa)
                    <div class="row text-right">
                        <div class="col-4 pl-4 text-left pl-2">{{ $coa->name }}</div>
                        <div class="col-2">{{ $coa->journalOpeningBalance($start,$end) }}</div>
                        <div class="col-1">
                        @if( $coa->journalTotalBalance($start,$end, 'debit') == 0)
                            0
                        @else
                         <a href="{{ route('voucheritems',[$coa->id,'debit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalTotalBalance($start,$end, 'debit') }}</b></a>
                         @endif
                        </div>
                        <div class="col-1">
                            @if( $coa->journalTotalBalance($start,$end, 'credit') == 0)
                            0
                           @else
                           <a href="{{ route('voucheritems',[$coa->id,'credit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalTotalBalance($start,$end, 'credit') }}</b></a>
                           @endif
                        </div>
                        <div class="col-2">
                            @if( $coa->journalTotalBalance($start,$end, 'credit') != 0)
                            <a href="{{ route('voucheritems',[$coa->id,'credit','ledger_summery',$start,$end]) }}"><b>{{ $coa->journalBalanceWithType($start,$end, 'credit') }}</b></a>
                           @endif
                        </div>
                        <div class="col-2"></div>
                    </div>
                    {{-- -- {{ $coa->name }}  <b>{{ $coa->journalOpeningBalance($start,$end) }}</b>-<b>{{ $coa->journalTotalBalance($start,$end, 'debit') }}</b> -<b>{{ $coa->journalTotalBalance($start,$end, 'credit') }}</b>-<b>{{ $coa->journalBalanceWithType($start,$end, 'credit') }}</b>- <b>{{ $coa->journalBalanceWithType($start,$end, 'credit') }}</b> <br> --}}
                    @endforeach

                {{-- - <b> Total {{ $lia->name }}: {{ $subtotalBalance }} </b> <br> --}}

                @php
                    $totalLiabitiesBalance = $totalLiabitiesBalance + $subtotalBalance;
                @endphp

                @endforeach
                @foreach ($type->childAccount as $ma)
                <div class="row text-right">
                    <div class="col-4 text-left pl-4 ">{{ $ma->name }}</div>
                    <div class="col-2">{{ $ma->journalOpeningBalance($start,$end) }}</div>
                    <div class="col-1">
                    @if( $ma->journalTotalBalance($start,$end, 'debit') == 0)
                        0
                    @else
                     <a href="{{ route('voucheritems',[$ma->id,'debit','ledger_summery',$start,$end]) }}"><b>{{ $ma->journalTotalBalance($start,$end, 'debit') }}</b></a>
                     @endif
                    </div>
                    <div class="col-1">
                        @if( $ma->journalTotalBalance($start,$end, 'credit') == 0)
                        0
                       @else
                       <a href="{{ route('voucheritems',[$ma->id,'credit','ledger_summery',$start,$end]) }}"><b>{{ $ma->journalTotalBalance($start,$end, 'credit') }}</b></a>
                       @endif
                    </div>
                    <div class="col-2">
                        @if( $ma->journalTotalBalance($start,$end, 'credit') != 0)
                        <a href="{{ route('voucheritems',[$ma->id,'credit','ledger_summery',$start,$end]) }}"><b>{{ $ma->journalBalanceWithType($start,$end, 'credit') }}</b></a>
                       @endif
                    </div>
                    <div class="col-2"></div>
                </div>
                {{-- ---{{ $ma->name }}  <b>{{ $ma->journalOpeningBalance($start,$end) }}</b>-<b>{{ $ma->journalTotalBalance($start,$end, 'debit') }}</b> -<b>{{ $ma->journalTotalBalance($start,$end, 'credit') }}</b>-<b>{{ $ma->journalBalanceWithType($start,$end, 'credit') }}</b>- <b>{{ $ma->journalBalanceWithType($start,$end, 'credit') }}</b> --}}
                <br>

                @php
                $totalLiabitiesBalance = $totalLiabitiesBalance + $coa->journalBalance($start,$end, 'credit');
               @endphp
                @endforeach


            @endforeach
            {{-- <b>Total Liabilities: {{ $totalLiabitiesBalance }}</b> <br> --}}

            <br>


            <hr class="">
            <div class="row">
                <div class="col-6"></div>
                <div class="col-1">
                    <strong>{{ $totalLiabitiesBalance + $totalIncomeBalance }}</strong>
                   
             
                </div>
                <div class="col-1">
                   <strong>{{ $totalLiabitiesBalance + $totalIncomeBalance }}</strong> 
                </div>
            </div>
            <b> </b>
            <hr>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
