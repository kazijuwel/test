@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="text-center p-3">
                    <h5 class="">belaobela.com</h5>
                    <h4>General Ledger Transactions</h4>
                    <p>From:   {{date('d/m/Y',strtotime($start)) }}   --- To: {{date('d/m/Y',strtotime($end)) }}</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Details</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--Income--->
                                @foreach ($chartofIncomeAccounts as $type)
                                    <tr>
                                        <td colspan="5">{{ $type->name}}</td>
                                    </tr>
                                    @php
                                    $openBalance=0;
                                    $openBalance +=$type->openingBalance($type->id,$start,'credit');
                                    @endphp
                                    @foreach($type->Voucheritems as $vItem)
                                    @php
                                    $openBalance +=-$vItem->debit + $vItem->credit;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{date('d/m/Y',strtotime($vItem->voucher->created_at)) }}-{{ $vItem->voucher->name}}</td>
                                        <td>                                       <a href="{{ route('voucheritems',[$vItem->voucher->id,'debit','ledger_trans',$start,$end]) }}">{{ ($vItem->debit !=null)? round($vItem->debit): " " }} </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('voucheritems',[$vItem->voucher->id,'credit','ledger_trans',$start,$end]) }}">{{ ($vItem->credit !=null)? round($vItem->credit): " " }}</a>
                                        </td>
                                        <td>
                                            {{ abs(round($openBalance)) }}cr
                                        </td>
                                    </tr>
                                    @endforeach
                                @endforeach

                                <!---Expense--->

                                @foreach ($chartofExpenseAccounts as $type)
                                    <tr>
                                        <td colspan="5">{{ $type->name}}</td>
                                    </tr>
                                @php
                                $openBalance=0;
                                $openBalance +=$type->openingBalance($type->id,$start,'debit');
                                @endphp
                                @foreach($type->Voucheritems as $vItem)
                                @php
                                $openBalance +=-$vItem->debit + $vItem->credit;
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{date('d/m/Y',strtotime($vItem->voucher->created_at)) }}-{{ $vItem->voucher->name}}</td>
                                    <td>                                       <a href="{{ route('voucheritems',[$vItem->voucher->id,'debit','ledger_trans',$start,$end]) }}">{{ ($vItem->debit !=null)? round($vItem->debit):" " }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('voucheritems',[$vItem->voucher->id,'debit','ledger_trans',$start,$end]) }}">{{ ($vItem->credit !=null)? round($vItem->credit):" "}}</a>
                                    </td>
                                    <td>
                                        {{ abs(round($openBalance)) }}dr
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach
                            {{-- Asset --}}
                            @foreach ($chartofAssetAccounts as $type)
                            <tr>
                                <td colspan="5">{{ $type->name}}</td>
                            </tr>
                            @php
                            $openBalance=0;
                            $openBalance +=$type->openingBalance($type->id,$start,'debit');
                            @endphp
                            @foreach($type->Voucheritems as $vItem)
                            @php
                            $openBalance +=$vItem->debit - $vItem->credit;
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{date('d/m/Y',strtotime($vItem->voucher->created_at)) }}-{{ $vItem->voucher->name}}</td>
                                <td>                                                 <a href="{{ route('voucheritems',[$vItem->voucher->id,'debit','ledger_trans',$start,$end]) }}">
                                    {{ ($vItem->debit !=null)? round($vItem->debit):" " }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('voucheritems',[$vItem->voucher->id,'credit','ledger_trans',$start,$end]) }}">
                                        {{ ($vItem->credit !=null)? round($vItem->credit):" "}}
                                        </a>
                                </td>
                                <td>
                                    {{ abs(round($openBalance)) }}dr
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                            {{-- Liabilities --}}

                            @foreach ($chartofLiabilitiesAccounts as $type)
                            <tr>
                                <td colspan="5">{{ $type->name}}</td>
                            </tr>
                                @php
                                $openBalance=0;
                                $openBalance +=$type->openingBalance($type->id,$start,'credit');
                                @endphp
                            @foreach($type->Voucheritems as $vItem)
                            @php
                            $openBalance += -$vItem->debit + $vItem->credit;
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{date('d/m/Y',strtotime($vItem->voucher->created_at)) }}-{{ $vItem->voucher->name}}</td>
                                <td>                                               <a href="{{ route('voucheritems',[$vItem->voucher->id,'credit','ledger_trans',$start,$end]) }}">{{ ($vItem->debit !=null)? round($vItem->debit):" " }} </a>
                                </td>
                                <td>
                                    <a href="{{ route('voucheritems',[$vItem->voucher->id,'credit','ledger_trans',$start,$end]) }}">
                                        {{ ($vItem->credit !=null)? round($vItem->credit): " "}}
                                        </a>
                                </td>
                                <td>
                                    {{ abs(round($openBalance)) }}cr
                                </td>
                            </tr>
                            @endforeach
                        @endforeach





                            </tbody>
                        </table>
                    </div>
                </div>





















                    {{-- <div class="text-center p-3">
                        <h5 class="">belaobela.com</h5>
                        <h4>General Ledger Transactions</h4>
                        <p>From:   {{date('d/m/Y',strtotime($start)) }}   --- To: {{date('d/m/Y',strtotime($end)) }}</p>
                    </div>
                    <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-1">Debit</div>
                        <div class="col-1">Credit</div>
                        <div class="col-2">Balance</div>
                    </div>
                        @foreach ($chartofIncomeAccounts as $type)
                               <span class="mt-1"><strong>{{ $type->name}}<br></strong></span>
                               @if($type->openingBalance($type->id,$start,'credit') > 0)
                               <div class="row">
                                   <div class="col-8">Opening Balance</div>
                                   <div class="col-1">0</div>
                                   <div class="col-1">{{ $type->openingBalance($type->id,$start,'credit') }}</div>
                                   <div class="col-2">
                                    {{ abs($type->openingBalance($type->id,$start,'credit')) }}
                                   </div>
                               </div>
                               @endif
                                @php
                                $openBalance=0;
                                $openBalance +=$type->openingBalance($type->id,$start,'credit');
                                @endphp
                                @foreach($type->Voucheritems as $vItem)
                                    @php
                                    $openBalance +=-$vItem->debit + $vItem->credit;
                                    @endphp
                                            <div class="row">
                                                <div class="col-8"><span class="pl-4">{{date('d/m/Y',strtotime($vItem->voucher->created_at)) }}-{{ $vItem->voucher->name}}</span></div>
                                                <div class="col-1">
                                                    <a href="{{ route('voucheritems',[$vItem->voucher->id,'debit','ledger_trans',$start,$end]) }}">{{ ($vItem->debit !=null)? $vItem->debit: " " }}</a>
                                                </div>
                                                <div class="col-1">
                                                    <a href="{{ route('voucheritems',[$vItem->voucher->id,'credit','ledger_trans',$start,$end]) }}">{{ ($vItem->credit !=null)? $vItem->credit: " " }}</a>
                                                </div>
                                                <div class="col-2"> {{ abs($openBalance) }}cr</div>
                                            </div>
                                    @endforeach

                        @endforeach
                        {{-- Expense --}}
{{--
                        @foreach ( $chartofExpenseAccounts as $type)
                        <span class="my-2"><strong>{{ $type->name}}<br></strong></span>
                        @if($type->openingBalance($type->id,$start,'debit') > 0)
                        <div class="row">
                            <div class="col-8"><span class="pl-4">Opening Balance</span> </div>
                            <div class="col-1">{{ $type->openingBalance($type->id,$start,'debit') }}</div>
                            <div class="col-1">0</div>
                            <div class="col-2">
                                {{ abs($type->openingBalance($type->id,$start,'debit')) }}dr
                            </div>
                        </div>
                        @endif

                             @php
                             $openBalance=0;
                             $openBalance +=$type->openingBalance($type->id,$start,'debit');
                            @endphp
                                 @foreach($type->Voucheritems as $vItem)
                                 @php
                                 $openBalance +=$vItem->debit - $vItem->credit;
                                 @endphp
                                 <div class="row my-1">
                                    <div class="col-8"><span class="pl-4">{{date('d/m/Y',strtotime($vItem->voucher->created_at)) }}-{{ $vItem->voucher->name}}</span></div>
                                    <div class="col-1"><a href="{{ route('voucheritems',[$vItem->voucher->id,'debit','ledger_trans',$start,$end]) }}">{{ ($vItem->debit !=null)? $vItem->debit:" " }}</a></div>
                                    <div class="col-1"><a href="{{ route('voucheritems',[$vItem->voucher->id,'debit','ledger_trans',$start,$end]) }}">{{ ($vItem->credit !=null)? $vItem->credit:" "}}</a></div>
                                    <div class="col-2">
                                        {{ abs($openBalance) }}dr
                                    </div>
                                </div>
                                 @endforeach

                        @endforeach
                        {{-- Asset --}}
                        {{-- @foreach ($chartofAssetAccounts as $type)
                        <strong>{{ $type->name}}<br></strong>
                        @if($type->openingBalance($type->id,$start,'debit') > 0)
                        <div class="row">
                            <div class="col-8"><span class="pl-4">Opening Balance</span></div>
                            <div class="col-1">{{ $type->openingBalance($type->id,$start,'debit') }}</div>
                            <div class="col-1">0</div>
                            <div class="col-2">
                                {{ abs($type->openingBalance($type->id,$start,'debit')) }}dr
                            </div>
                        </div>
                        @endif
                             @php
                                 $openBalance=0;
                                 $openBalance +=$type->openingBalance($type->id,$start,'debit');
                             @endphp
                                 @foreach($type->Voucheritems as $vItem)
                                 @php
                                 $openBalance +=$vItem->debit - $vItem->credit;
                                 @endphp
                                 <div class="row my-1">
                                    <div class="col-8"><span class="pl-4">{{date('d/m/Y',strtotime($vItem->voucher->created_at)) }}-{{ $vItem->voucher->name}}</span></div>
                                    <div class="col-1">
                                        <a href="{{ route('voucheritems',[$vItem->voucher->id,'debit','ledger_trans',$start,$end]) }}">
                                        {{ ($vItem->debit !=null)? $vItem->debit:" " }}
                                        </a>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{ route('voucheritems',[$vItem->voucher->id,'credit','ledger_trans',$start,$end]) }}">
                                        {{ ($vItem->credit !=null)? $vItem->credit:" "}}
                                        </a>
                                    </div>
                                    <div class="col-2">
                                        {{ abs($openBalance) }}dr
                                    </div>
                                </div>
                                 @endforeach

                 @endforeach
                 {{-- Liabilities --}}
                 {{-- @foreach ($chartofLiabilitiesAccounts as $type)
                 <span class=""> <strong>{{ $type->name}}<br></strong></span>
                 @if($type->openingBalance($type->id,$start,'debit') > 0)
                 <div class="row">
                     <div class="col-8"><span class="pl-4">Opening Balance</span></div>
                     <div class="col-1">0</div>
                     <div class="col-1">{{ $type->openingBalance($type->id,$start,'credit') }}</div>
                     <div class="col-2">
                        {{ $type->openingBalance($type->id,$start,'credit') }}cr
                     </div>
                 </div>
                 @endif

                        @php
                        $openBalance=0;
                        $openBalance +=$type->openingBalance($type->id,$start,'credit');
                        @endphp
                        @foreach($type->Voucheritems as $vItem)
                            @php
                            $openBalance += -$vItem->debit + $vItem->credit;
                            @endphp
                            <div class="row my-1">
                                <div class="col-8"><span class="pl-4">{{date('d/m/Y',strtotime($vItem->voucher->created_at)) }}-{{ $vItem->voucher->name}}</span></div>
                                <div class="col-1"><a href="{{ route('voucheritems',[$vItem->voucher->id,'credit','ledger_trans',$start,$end]) }}">{{ ($vItem->debit !=null)? $vItem->debit:" " }} </a></div>
                                <div class="col-1">
                                    <a href="{{ route('voucheritems',[$vItem->voucher->id,'credit','ledger_trans',$start,$end]) }}">
                                    {{ ($vItem->credit !=null)? $vItem->credit: " "}}
                                    </a>
                                </div>
                                <div class="col-2">
                                    {{ abs($openBalance) }}cr
                                </div>
                            </div>
                              @php
                              $drBalance=$type->Voucheritems->sum('debit');$crBalance=$type->Voucheritems->sum('credit');
                              $finalBalance= $drBalance-$crBalance;
                              @endphp
                          @endforeach
                 @endforeach
                   </table>

                    <hr>
                    <hr> --}}
                {{-- </div> --}}

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
