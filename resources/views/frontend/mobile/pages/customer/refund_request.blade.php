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
    @include('frontend.mobile.partials.search')
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
       
            <div class="card mt-2">
               <div class="card-header">
                   <p><strong>Sent Refund Request</strong></p>
               </div>
                   <div class="card-body">
                       <div style="overflow: auto;">
                        <table class="table  mb-0">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th data-breakpoints="lg">{{ translate('Date') }}</th>
                                  <th>{{translate('Order id')}}</th>
                                  <th data-breakpoints="lg">{{translate('Product')}}</th>
                                  <th data-breakpoints="lg">{{translate('Amount')}}</th>
                                  <th>{{translate('Status')}}</th>
                                </tr>
                            </thead>
                            <tbody class="pb-3">
                                  @foreach ($refunds as $key => $refund)
                                      <tr>
                                          <td>{{ $key+1 }}</td>
                                          <td>{{ date('d-m-Y', strtotime($refund->created_at)) }}</td>
                                          <td>
                                              @if ($refund->order != null)
                                                  {{ $refund->order->code }}
                                              @endif
                                          </td>
                                          <td>
                                              @if ($refund->orderDetail != null && $refund->orderDetail->product != null)
                                                  {{ $refund->orderDetail->product->getTranslation('name') }}
                                              @endif
                                          </td>
                                          <td>
                                              @if ($refund->orderDetail != null)
                                                  {{single_price($refund->orderDetail->price)}}
                                              @endif
                                          </td>
                                          <td>
                                              @if ($refund->refund_status == 1)
                                                  <span class="badge badge-inline badge-success">{{translate('Approved')}}</span>
                                              @elseif ($refund->refund_status == 2)
                                                  <span class="badge badge-inline badge-danger">{{translate('REJECTED')}}</span>
                                                  <a href="javascript:void(0);" onclick="refund_reject_reason_show('{{ route('reject_reason_show', $refund->id )}}')" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="{{ translate('Reject Reason') }}">
                                                      <i class="las la-eye"></i>
                                                  </a>
                                              @else
                                                  <span class="badge badge-inline badge-info">{{translate('PENDING')}}</span>
                                              @endif
                                          </td>
                                      </tr>
                                  @endforeach
                            </tbody>
                        </table>
                        <div class="aiz-pagination">
                                {{ $refunds->links() }}
                          </div>
                        </div>
                   </div>
             </div>
    </section>



   <!--start footer-->
   </main>

@endsection