@extends('theme.prt.layouts.prtMaster')

@section('title')
 All Events | {{ env('APP_NAME') }}
@endsection
@section('meta')
@endsection

@push('css')

@endpush

@section('contents')
@include('alerts.alerts')
<section class="page-header page-header-modern bg-color-primary page-header-md">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <div class="h1 bold text-white">All Events</div>
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-right breadcrumb-light">
                    <li><a href="/">Home</a></li>
                    <li class="active">Events</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div>
        We can only innovate when we bring people together to inspire, connect and share knowledge.
    </div>
    <div class="row">
        @if (isset($allEvents) && $allEvents->count() > 0)
        @foreach ($allEvents as $eventcard)
        @include('theme.prt.event.modules.eventCard')
        @endforeach
        <div class="col-xs-12">
            {{ $allEvents->links() }}
        </div>
        @else
            No news found!        
        @endif
    </div>
</div>
@endsection

@push('js')
@endpush