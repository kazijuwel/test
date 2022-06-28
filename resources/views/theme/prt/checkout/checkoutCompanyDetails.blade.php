@extends('theme.prt.layouts.prtMaster')
@section('title')
Checkout | {{ env('APP_NAME_BIG') }} 
@endsection
@section('contents')
@include('theme.prt.checkout.parts.checkoutCompanyDetails')
@endsection