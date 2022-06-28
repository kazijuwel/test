@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        Summary
                    </div>
                    <div class="card-body">
                       <div class="row">
                           <div class="col-md-6">
                               <h4 class="p-2 text-secondary" >Balance Sheet statement</h4>
                               @foreach ($coaType->parentBalancesheetGroup() as $parent )
                               <div class="card">
                                <div class="card-header">
                                    @php
                                    $varamount=0;
                                    foreach ($parent->childAccount as $account) {
                                        $varamount+=$account->Voucheritems->sum('debit')-$account->Voucheritems->sum('credit');

                                      }
                                      @endphp

                                    <strong>{{ $parent->name }}</strong>
                                    <span class="text-right"><strong>{{ abs($parent->childAccount->sum('starting_balance') +$varamount) }} Tk</strong></span>




                                </div>
                                <div class="card-body">
                                    <div class="card">
                                        @foreach($coaType->childSubcategorybalanceSheet($parent->id) as  $value)
                                        <div class="card-header">
                                         <p>{{ $value->name }}</p>
                                         <p>{{ $coaType->totalChildDebitamount($value->id) }}</p>
                                        <br>
                                        </div>
                                        <div class="card-body">
                                            <ul>
                                        @foreach ($value->childAccount as $child )
                                         @php
                                        //$peramount=0;
                                        // foreach ($child->childAccount as $account) {
                                        //     $peramount+=$account->Voucheritems->sum('debit');

                                        // }
                                          @endphp

                                        <li><span class="text-left">{{ $child->name }}</span> <span class="text-right">{{ abs($child->starting_balance + $child->Voucheritems->sum('debit')-$child->Voucheritems->sum('credit')) }}Tk</span></li>
                                        @endforeach

                                       </ul>

                                        </div>
                                        @endforeach

                                    </div>
                                    {{-- <ul>
                                        @foreach ($parent->childAccount as $child )
                                       @php
                                        //$peramount=0;
                                        // foreach ($child->childAccount as $account) {
                                        //     $peramount+=$account->Voucheritems->sum('debit');

                                        // }
                                          @endphp

                                        <li><span class="text-left">{{ $child->name }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-right">{{ abs($child->starting_balance + $child->Voucheritems->sum('debit')-$child->Voucheritems->sum('credit')) }}Tk</span></li>
                                        @endforeach

                                    </ul> --}}
                                </div>
                               </div>
                              @endforeach
                           </div>

                           <div class="col-md-6">
                            <h4 class="text-secondary p-2">Profit and loss statement</h4>
                            @foreach ($coaType->allprofitandlossgroups() as $parent )
                            @php
                            $totalBalance=0;
                            foreach ($parent->childAccount as $account) {
                                $totalBalance+=$account->Voucheritems->sum('debit')+$account->Voucheritems->sum('credit');

                            }
                              @endphp
                            <div class="card">
                             <div class="card-header"><strong class="tex-left">{{ $parent->name }}</strong> <strong class="tex-right">{{ $parent->childAccount->sum('starting_balance')+$totalBalance }}Tk</strong></div>
                             <div class="card-body">
                                 <ul>
                                     @foreach ($parent->childAccount as $child )
                                     <li>{{ $child->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$child->Voucheritems->sum('debit')+$child->Voucheritems->sum('credit')  }} Tk</li>
                                     @endforeach

                                 </ul>
                             </div>
                            </div>
                           @endforeach
                           <div class="card">
                            <div class="card-header"><strong class="tex-left">Net Profit</strong> <strong class="tex-right"></strong></div>
                            <div class="card-body">

                                {{ $coaType->profitIncomeBalance() -  $coaType->profitExpenseBalance() }}

                            </div>
                           </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
