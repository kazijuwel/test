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
                             <div class="card">
                                 <div class="card-header bg-secondary">Financial Statements</div>
                                 <div class="card-body">
                                    <ul class="list-group">
                                        <a href="{{ route('profitandlossreport') }}" class="list-group-item">Profit and Loss</a>
                                        <a href="{{ route('balancesheetReport') }}" class="list-group-item">Balance sheet</a>
                                      </ul>
                                 </div>
                             </div>
                           </div>
                           <div class="col-md-6">
                             <div class="card">
                                <div class="card-header bg-secondary">General Ledger</div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <a href="{{ route('trial_balance_report') }}" class="list-group-item">Trial Balance</a>
                                        <a href="{{ route('general_ledger_summery') }} " class="list-group-item">Genarel Ledger Summery</a>
                                        {{-- <a href="{{ route('general_ledger_transection') }}" class="list-group-item">Genarel Ledger Transection</a> --}}
                                        <a href="{{ route('ledger_searching') }}" class="list-group-item">Ledger</a>
                                      </ul>
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
