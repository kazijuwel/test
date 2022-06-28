@extends('frontend.mobile.layout.app')
@section('content')
@section('css')
<style>
    .card .card-body {
    /* padding: 20px 25px; */
    /* border-radius: 4px; */
}
</style>
@endsection
<main class="app-content">
    <section>
        <div class="input-group " style="background-color: #B0E0E6;padding: 8px 10px 8px 10px;">
            <input type="text" class="form-control" placeholder="Search Your Product"
                style="height:37px; border-radius: 0px">
            <div class="input-group-append">
                <span class="input-group-text bgprimary" style="width:70px; height:37px; border-radius: 0px"><i
                        class="fa fa-search text-white" aria-hidden="true"></i></span>
            </div>
        </div>
    </section>
    <!---End Header-->
    <hr class="divider">
    <section>
        <div class="card">
            <div class="card-body">
                @include('frontend.mobile.pages.userdetails')
                @include('frontend.mobile.layout.dashboardlink')
            </div>
          </div>
   </section>
    <hr class="divider">
    <section class="padding-around">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{ translate('Payment History') }}</h5>
            </div>
            @if (count($payments) > 0)
                <div class="card-body">
                    <div style="overflow: auto;">
                    <table class="table  mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ translate('Date')}}</th>
                                <th>{{ translate('Amount')}}</th>
                                <th>{{ translate('Payment Method')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $key => $payment)
                                <tr>
                                    <td>
                                        {{ $key+1 }}
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($payment->created_at)) }}</td>
                                    <td>
                                        {{ single_price($payment->amount) }}
                                    </td>
                                    <td>
                                        {{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }} @if ($payment->txn_code != null) ({{  translate('TRX ID') }} : {{ $payment->txn_code }}) @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="aiz-pagination">
                        {{ $payments->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>


   <!--start footer-->
   </main>

@endsection