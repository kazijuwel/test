@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card">
                <table class="table table-bordered">

                    <h4 class="text-primary text-center">Total Qty:{{ $orderid->orderDetails->sum('quantity')}}</h4>

                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Name</th>
                        <th scope="col">type</th>
                        <th scope="col">Date</th>
                        <th>In</th>
                        <th>Out</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($Vouchers as $v)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <th scope="row">{{ $v->name }}</th>

                            <td>
                                @if($v->type=="supplier")
                                Purchase
                                @else
                                Seles
                                @endif
                            </td>
                            <td>{{  $v->created_at }}</td>
                            <td>
                                @if($v->type=="supplier")
                                @php
                                $Inqty=0;
                                $v_items= $v->voucherItems;
                                foreach($v_items as  $item) {
                                if(($item->chartof_account_id == $Accpay ) && ($item->credit > 0 ))
                                    {

                                      $itemqty= $item->getqty->quantity;
                                      $Inqty=$Inqty+$itemqty;
                                    }

                                   }
                                @endphp

                                  {{ $Inqty }}pcs
                                  @endif
                                @if($v->type=="customer")
                                @php
                                $Inqty=0;
                                $v_items= $v->voucherItems;

                                foreach($v_items as  $item) {
                                if(($item->chartof_account_id == $Accrec ) && ($item->debit > 0 ))
                                    {
                                      $itemqty= $item->getqty->quantity;
                                      $Inqty=$Inqty+$itemqty;
                                    }

                                   }
                                @endphp

                                  {{ $Inqty }}pcs
                                @endif

                            </td>
                            <td>
                                @if($v->type=="supplier")
                                @php

                                   $outqty=0;
                                   $v_items= $v->voucherItems;

                                   foreach ($v_items as  $item) {
                                    if(($item->chartof_account_id == $Accpay) && ($item->debit > 0 ))
                                    {

                                      $itemqty= $item->getqty->quantity;
                                      $outqty=$outqty+$itemqty;
                                    }

                                   }
                                @endphp
                                {{ $outqty }}pcs
                                @endif


                                @if($v->type=="customer")
                                @php
                                $outqty=0;
                                   $v_items= $v->voucherItems;
                                   foreach ($v_items as  $item) {
                                    if(($item->chartof_account_id == $cashId) && ($item->debit > 0 ))
                                    {
                                      $itemqty= $item->getqty->quantity;
                                      $outqty=$outqty+$itemqty;
                                    }

                                   }
                                @endphp
                                {{ $outqty }}pcs




                                @endif
                                {{-- @php
                                $outqty=0;
                                   $v_items= $v->voucherItems;

                                   foreach ($v_items::where('chartof_account_id',$cashId)->get() as  $item) {
                                       if($item->credit >= 0){
                                      $itemqty= $item->getqty->quantity;
                                      $outqty=$outqty+$itemqty;
                                       }

                                   }
                                @endphp --}}






                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
