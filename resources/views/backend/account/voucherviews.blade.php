@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h3>Journal Entry</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8"><strong>{{ $voucher->name }}</strong></div>
        <div class="col-md-4"><p>Date: {{ $voucher->date }}</p></div>
    </div>
    <div class="row">
        <div class="card" style="width: 100%">
            <div class="card" style="width: 100%" >
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Account</th>
                        <th scope="col">Debit</th>
                        <th scope="col">Credit</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($voucher->voucherItems as $items)
                                <tr>
                                    <td > {{ chatofAccountName( $items->chartof_account_id) }}</td>
                                    <td>  {{ $items->debit }}</td>
                                    <td>  {{ $items->credit }}</td>
                                </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>

    </div>
</div>
@endsection