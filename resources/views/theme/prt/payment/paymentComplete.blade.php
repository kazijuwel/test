@extends('theme.prt.layouts.prtMaster')
@section('title')
Payment Completed | {{ env('APP_NAME_BIG') }} 
@endsection
@section('contents')
@include('theme.prt.payment.parts.paymentComplete')
@endsection