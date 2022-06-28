@extends('backend.layouts.app')

@section('content')
<style>
    .seller_shipping_cost_div{
        display:none;
    }
</style>

@if($shipping_configuration->seller_shipping_cost != 0)
<style>
.seller_shipping_cost_div{
    display:block;
}
</style>
@endif

<div class="row">
    <!-- Shipping Seller Cost div start here -->
        <div class="col-lg-6" style="padding: 0px;">
            <div class="card" style="height: 309px;">
                <div class="card-header">
                <h5 class="mb-0 h6">Shipping Configuration Edit</h5>
                <a style="text-alig:right;"  class="btn btn-primary" href="{{ route('shipping_configuration.index') }}">Shipping Configuration List</a>
                </div>
                <div class="card-body" >
                    <form action="{{ route('shipping_seller_configuration_update') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="title" style="padding-top: 10px;">{{translate('Title')}}</label>
                            <div class="col-sm-9">
                                <input type="hidden" value="{{$shipping_configuration->id}}" name="id" >
                                <input type="text" value="{{$shipping_configuration->title}}" placeholder="{{translate('Title')}}" id="title" name="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="email" style="padding-top: 12px;">{{translate('Seller Shipping Type')}}</label>
                            <div class="col-sm-9">
                                <select name="seller_shipping_type" class="form-control" id="seller_shipping_type" onchange="shipping_cost_div()">
                                    <option value="free" {{ $shipping_configuration->seller_shipping_type == 'free' ? 'selected':'' }}>FREE</option>
                                    <option value="flat_rate" {{ $shipping_configuration->seller_shipping_type == 'flat_rate' ? 'selected':'' }}>Charge</option>                                   
                                </select>
                                <!-- <input type="text" placeholder="{{translate('Seller Shipping Type')}}" id="seller_shipping_type" name="seller_shipping_type" class="form-control" required> -->
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-sm-3 col-from-label seller_shipping_cost_div" for="seller_shipping_cost" style="padding-top: 12px;">{{translate('Seller Shipping Cost')}}</label>
                            <div class="col-sm-9 seller_shipping_cost_div">
                                <input value="{{$shipping_configuration->seller_shipping_cost}}" type="text" value="0" placeholder="{{translate('Seller Shipping Cost')}}" id="seller_shipping_cost" name="seller_shipping_cost" class="form-control" required>
                            </div>
                        </div> -->
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{translate('Update')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- Shipping Seller Cost div end here -->

    <div class="col-lg-6">
           
    </div>
</div>



<script>

    function shipping_cost_div(){
        if($('#seller_shipping_type').val() == 'flat_rate') {
            $('.seller_shipping_cost_div').hide(); 
        } else {
            $('.seller_shipping_cost_div').hide(); 
        }
    }
</script>

@endsection
