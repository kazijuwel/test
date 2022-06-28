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
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-1">Debit</div>
                        <div class="col-1">Credit</div>
                        <div class="col-2">Balance</div>
                    </div>
                   {{-- Income --}}
                        @foreach ($chartofIncomeAccounts as $type)

                               <strong>{{ $type->name}}<br></strong>
                               <div class="row">
                                   <div class="col-8"><span class="pl-4">Opening Balance</span></div>
                                   <div class="col-1"></div>
                                   <div class="col-1">{{ $type->openingBalance($type->id,$start,'credit') }}</div>
                                   <div class="col-2">{{ abs($type->openingBalance($type->id,$start,'credit')) }}cr</div>
                               </div>
                        @endforeach
                        <br>
                        {{-- Expense --}}
                        @foreach ( $chartofExpenseAccounts as $type)
                        <strong>{{ $type->name}}<br></strong>
                        <div class="row">
                            <div class="col-8"><span class="pl-4">Opening Balance</span></div>
                            <div class="col-1">{{ $type->openingBalance($type->id,$start,'debit') }}</div>
                            <div class="col-1"></div>
                            <div class="col-2">{{ abs($type->openingBalance($type->id,$start,'debit')) }}dr</div>
                        </div>
                        <br>
                        @endforeach

                        {{-- Asset --}}
                        @foreach ($chartofAssetAccounts as $type)

                        <strong>{{ $type->name}}<br></strong>
                        <div class="row">
                            <div class="col-8"><span class="pl-4">Opening Balance</span></div>
                            <div class="col-1"> {{ $type->openingBalance($type->id,$start,'debit') }}</div>
                            <div class="col-1"></div>
                            <div class="col-2"> {{ abs($type->openingBalance($type->id,$start,'debit')) }}dr</div>
                        </div>
                             <br>
                             @php
                                 $openBalance=0;
                                 $openBalance +=$type->openingBalance($type->id,$start,'debit');
                             @endphp
                 @endforeach
                 {{-- Liabilities --}}
                 @foreach ($chartofLiabilitiesAccounts as $type)

                 <strong>{{ $type->name}}<br></strong>
                 <div class="row">
                    <div class="col-8"><span class="pl-4">Opening Balance</span></div>
                    <div class="col-1"></div>
                    <div class="col-1">{{ $type->openingBalance($type->id,$start,'credit') }}</div>
                    <div class="col-2"> {{ abs($type->openingBalance($type->id,$start,'credit')) }}cr</div>
                </div>
                      <br>
                      @php
                      $openBalance=0;
                      $openBalance +=$type->openingBalance($type->id,$start,'credit');
                     @endphp
                 @endforeach
                   </table>

                    <hr>
                    <hr>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
