@extends('theme.prt.layouts.prtMaster')

@section('title')
 All News | {{ env('APP_NAME') }}
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
                <h1 class="">All News</strong></h1>
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-right breadcrumb-light">
                    <li><a href="/">Home</a></li>
                    <li class="active">News</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        @if (isset($allNews) && $allNews->count() > 0)
        @foreach ($allNews as $newscard)
        @include('theme.prt.news.modules.newsCard')
        @endforeach
        <div class="col-xs-12">
            {{ $allNews->links() }}
        </div>
        @else
            No news found!        
        @endif
    </div>
</div>
@endsection

@push('js')
@endpush