@extends('backend.layouts.app')

@section('content')

    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-12 bg-secondary">
                <h1 class="h3 p-2">{{translate('Customer Products')}}</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <p class="p-4">Ledger Book for Customer-<span class="text-primary rounded">{{ $userName }} </span>,Date  {{\Carbon\Carbon::parse($start)->format('l j F Y, h:i A')}} to  {{\Carbon\Carbon::parse($end)->format('l j F Y, h:i A')}}</p>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table aiz-table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{translate('Date')}}</th>
                            <th width="20%">{{translate('Invoice No')}}</th>
                            <th>{{translate('Debit')}}</th>
                            <th>{{translate('credit')}}</th>
                            <th>{{translate('type')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($voucherItems as $key => $item)
                            <tr>
                           <td>{{ $loop->iteration}}</td>
                           <td>                         
                            {{\Carbon\Carbon::parse($item->voucher->created_at)->format('d/m/Y')}}
                           </td>
                           <td><a href="#">{{ $item->voucher->name }}</a></td>
                           <td> {{ $item->debit }}</td>
                           <td> {{ $item->credit }}</td>
                           <td><span class="p-1 bg-warning rounded ">{{$item->voucher->create_type }}</span></td>

                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td><span class="bg-primary px-5">Total</span></td>
                            <td><span class="text-danger">{{ $voucherItems->sum('debit') }}</span></td>
                            <td><span class="text-danger">{{ $voucherItems->sum('credit') }}</span></td>
                        </tr>
                        </tbody>
                    </table>
               </div>
                <div class="aiz-pagination">
                    {{ $voucherItems->appends(request()->input())->links() }}
                </div>
            </div>
    </div>


@endsection


