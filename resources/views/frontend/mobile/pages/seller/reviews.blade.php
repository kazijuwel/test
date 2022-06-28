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
                <h5 class="mb-0 h6">{{ translate('Product Reviews') }}</h5>
            </div>
            <div class="card-body">
                <div style="overflow: auto;">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ translate('Product')}}</th>
                            <th data-breakpoints="lg">{{ translate('Customer')}}</th>
                            <th>{{ translate('Rating')}}</th>
                            <th data-breakpoints="lg">{{ translate('Comment')}}</th>
                            <th data-breakpoints="lg">{{ translate('Published')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $key => $value)
                            @php
                                $review = \App\Review::find($value->id);
                            @endphp
                            @if($review != null && $review->product != null && $review->user != null)
                                <tr>
                                    <td>
                                        {{ $key+1 }}
                                    </td>
                                    <td>
                                        <a href="{{ route('product', $review->product->slug) }}" target="_blank">{{  $review->product->getTranslation('name') }}</a>
                                    </td>
                                    <td>{{ $review->user->name }} ({{ $review->user->email }})</td>
                                    <td>
                                        <span class="rating rating-sm">
                                            @for ($i=0; $i < $review->rating; $i++)
                                                <i class="las la-star active"></i>
                                            @endfor
                                            @for ($i=0; $i < 5-$review->rating; $i++)
                                                <i class="las la-star"></i>
                                            @endfor
                                        </span>
                                    </td>
                                    <td>{{ $review->comment }}</td>
                                    <td>
                                        @if ($review->status == 1)
                                            <span class="badge badge-inline badge-success">{{  translate('Published') }}</span>
                                        @else
                                            <span class="badge badge-inline badge-danger">{{  translate('Unpublished') }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
                <div class="aiz-pagination">
                    {{ $reviews->links() }}
                  </div>
            </div>
        </div>
    </section>



   <!--start footer-->
   </main>

@endsection