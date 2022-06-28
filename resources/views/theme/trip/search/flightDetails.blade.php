@extends('theme.prt.layouts.prtMaster')

@section('title')
    {{ env('APP_NAME_BIG') }}
@endsection
@section('meta')
@endsection
@section('contents')
    {{-- @include('alerts.alerts') --}}
    @include('theme.trip.search.part.flightDetails')
@endsection