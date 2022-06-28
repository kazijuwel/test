@extends('frontend.layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-start">
            @include('frontend.deliveryman.partials.deliveryman-sidebar')
            <div class="aiz-user-panel">
                <div class="aiz-titlebar mt-2 mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1 class="h3">Confirmed Orders</h1>
                        </div>
                    </div>
                </div>
                <div class="row gutters-10">
                    @include('frontend.deliveryman.partials.orders')
            	</div>
        </div>
    </div>
</section>
@endsection
