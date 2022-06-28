@extends('theme.prt.layouts.prtMaster')
@section('title')
Payment | {{ env('APP_NAME_BIG') }} 
@endsection
@section('contents')
@include('theme.prt.payment.parts.paymentPage')
@endsection