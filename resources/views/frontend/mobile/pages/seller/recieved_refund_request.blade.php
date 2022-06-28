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
                <h5 class="mb-0 h6">{{ translate('Refund Request') }}</h5>
            </div>
            <div class="card-body">
                <div style="overflow: auto;">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th data-breakpoints="lg">{{ translate('Date') }}</th>
                            <th>{{translate('Order id')}}</th>
                            <th data-breakpoints="lg">{{translate('Product')}}</th>
                            <th data-breakpoints="lg">{{translate('Amount')}}</th>
                            <th data-breakpoints="lg">{{translate('Status')}}</th>
                            <th data-breakpoints="lg">{{translate('Reason')}}</th>
                            <th>{{translate('Approval')}}</th>
                            <th data-breakpoints="lg">{{translate('Reject')}}</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    @if($refund->refund_status == 1)
                                      <span class="badge badge-inline badge-success"><strong>{{translate('Approved')}}</strong></span>
                                    @elseif($refund->refund_status == 2)
                                      <span class="badge badge-inline badge-danger"><strong>{{translate('Rejected')}}</strong></span>
                                    @else
                                      <span class="badge badge-inline badge-warning"><strong>{{translate('PENDING')}}</strong></span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('reason_show', $refund->id) }}"><span class="badge badge-inline badge-success">{{translate('Show')}}</span></a>
                                </td>
                                <td>
                                  @if($refund->refund_status != 2 && $refund->seller_approval != 2)
                                    @if ($refund->seller_approval == 1)
                                        <label class="aiz-switch aiz-switch-success mb-0 ">
                                            <input type="checkbox" @if ($refund->seller_approval == 1) checked  @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    @else
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input onchange="update_refund_approval('{{ $refund->id }}')" type="checkbox" @if ($refund->seller_approval == 1) checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    @endif
                                  @endif
                                </td>
                                <td>
                                  @if($refund->refund_status == 0 && $refund->seller_approval == 0)
                                    <a class="btn btn-soft-danger btn-icon btn-circle btn-sm" onclick="reject_refund_request({{$refund->id}})" title="{{ translate('Reject Refund Request') }}">
                                        <i class="las la-trash"></i>
                                    </a>
                                  @elseif($refund->seller_approval == 2 || $refund->refund_status == 2)
                                    <a href="javascript:void(0);" onclick="refund_reject_reason_show('{{ route('reject_reason_show', $refund->id )}}')" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="{{ translate('Reject Reason') }}">
                                        <i class="las la-eye"></i>
                                    </a>
                                  @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="aiz-pagination">
                    {{ $refunds->links() }}
                  </div>
            </div>
        </div>
    </section>


   <!--start footer-->
   </main>

@endsection