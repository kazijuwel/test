@if(request()->has('status'))
@php
$status=request()->get('status');
$payment_ref_id=request()->get('payment_ref_id');
$order_id=request()->get('order_id');
$merchant=request()->get('merchant');
@endphp
@if($status=="Success")
<script>window.location = "{{ route('nagad.success', ['order_id' => $order_id,'payment_ref_id' =>$payment_ref_id,'merchant'=> $merchant]) }}";</script>
exit();
@else
 <script>window.location = "{{ route('nagad.errorstatus',$status)}}";
 </script>
 exit();
@endif
@endif