@extends('backend.layouts.app')

@section('content')
<style>
    .seller_shipping_cost_div{
        display:none;
    }
</style>
<div class="row">
    <div class="col-lg-6" style="padding-left:0px;">
        <div class="card" >
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Select Shipping Method')}}</h5>
            </div>
            <div class="card-body" style="height: 258px;">
                <form action="{{ route('shipping_configuration.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="shipping_type">
                    <div class="radio mar-btm">
                        <input id="product-shipping" class="magic-radio" type="radio" name="shipping_type" value="product_wise_shipping" <?php if(\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'product_wise_shipping') echo "checked";?>>
                        <label for="product-shipping">
                            <span>{{translate('Product Wise Shipping Cost')}}</span>
                            <span></span>
                        </label>
                    </div>
                    <!-- <div class="radio mar-btm">
                        <input id="flat-shipping" class="magic-radio" type="radio" name="shipping_type" value="flat_rate" <?php if(\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'flat_rate') echo "checked";?>>
                        <label for="flat-shipping">{{translate('Flat Rate Shipping Cost')}}</label>
                    </div>
                    <div class="radio mar-btm">
                        <input id="seller-shipping" class="magic-radio" type="radio" name="shipping_type" value="seller_wise_shipping" <?php if(\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'seller_wise_shipping') echo "checked";?>>
                        <label for="seller-shipping">{{translate('Seller Wise Flat Shipping Cost')}}</label>
                    </div>
                    <div class="radio mar-btm">
                        <input id="area-shipping" class="magic-radio" type="radio" name="shipping_type" value="area_wise_shipping" <?php if(\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'area_wise_shipping') echo "checked";?>>
                        <label for="area-shipping">{{translate('Area Wise Flat Shipping Cost')}}</label>
                    </div> -->
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Shipping Seller Cost div start here -->
        <div class="col-lg-6" style="padding: 0px;">
            <div class="card" style="height: 309px;">
                <div class="card-header">
                <h5 class="mb-0 h6">Shipping Configuration Form</h5>
                </div>
                <div class="card-body" >
                    <form action="{{ route('shipping_configuration.save') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="title" style="padding-top: 10px;">{{translate('Title')}}</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{translate('Title')}}" id="title" name="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="email" style="padding-top: 12px;">{{translate('Seller Shipping Type')}}</label>
                            <div class="col-sm-9">
                                <select name="seller_shipping_type" class="form-control" id="seller_shipping_type" onchange="shipping_cost_div()">
                                    <option value="free">Free</option>
                                    <option value="flat_rate">Charge</option>
                                </select>
                                <!-- <input type="text" placeholder="{{translate('Seller Shipping Type')}}" id="seller_shipping_type" name="seller_shipping_type" class="form-control" required> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label seller_shipping_cost_div" for="seller_shipping_cost" style="padding-top: 12px;"><!-- {{translate('Seller Shipping Cost')}} --></label>
                            <div class="col-sm-9 seller_shipping_cost_div">
                                <input type="hidden" value="0" placeholder="{{translate('Seller Shipping Cost')}}" id="seller_shipping_cost" name="seller_shipping_cost" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Shipping configuration list start here -->
        <div class="col-lg-12" style="padding: 0px;">
            <div class="card">
                <div class="card-header row gutters-5">
                    <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('Seller Configuration List') }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{translate('Title')}}</th>
                            <th>{{translate('Seller Shipping Type')}}</th>
                          <!--   <th>{{translate('Seller Shipping Cost')}}</th> -->
                            <th style="text-align: center;">{{translate('Options')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shipping_configuration as $key => $shipping_config)
                        <?php
                            $type_name = ' ';
                           
                            if ($shipping_config->seller_shipping_type == 'free') {
                            $type_name = 'FREE';
                            
                            } elseif ($shipping_config->seller_shipping_type == 'flat_rate') {
                            $type_name = 'Charge';
                            
                            }
                        ?>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$shipping_config->title}}</td>
                            <td>{{$type_name}}</td>
                            <!-- <td>{{$shipping_config->seller_shipping_cost}}</td> -->
                            <td>
                                <div class="aiz-topbar-item ml-2">
                                    <div class="align-items-stretch d-flex dropdown">
                                        <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                                            <span class="d-flex align-items-center">
                                                <span class="d-none d-md-block">
                                                    <button type="button" class="btn btn-sm btn-dark">{{translate('Actions')}}</button>
                                                </span>
                                            </span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-xs">
                                            <a href="{{route('shipping_configuration.edit', $shipping_config->id)}}" class="dropdown-item" type="button" class="btn btn-primary">
                                                {{translate('Edit')}}
                                            </a>
                                            <a href="{{route('shipping_configuration.delete', $shipping_config->id)}}" class="dropdown-item" >
                                                {{translate('Delete')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                         {{ $shipping_configuration->appends(request()->input())->links() }}
                        </tbody>
                    </table>
                    <div class="aiz-pagination">
                    
                    </div>
                </div>
            </div>
        </div>
        <!-- Shipping configuration list end here -->

    <!-- Shipping Seller Cost div end here -->

    <div class="col-lg-6">
        <!-- <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Note')}}</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        1. {{ translate('Product Wise Shipping Cost calulation: Shipping cost is calculate by addition of each product shipping cost') }}.
                    </li>
                    <li class="list-group-item">
                        2. {{ translate('Flat Rate Shipping Cost calulation: How many products a customer purchase, doesn\'t matter. Shipping cost is fixed') }}.
                    </li>
                    <li class="list-group-item">
                        3. {{ translate('Seller Wise Flat Shipping Cost calulation: Fixed rate for each seller. If customers purchase 2 product from two seller shipping cost is calculated by addition of each seller flat shipping cost') }}.
                    </li>
                    <li class="list-group-item">
                        4. {{ translate('Area Wise Flat Shipping Cost calulation: Fixed rate for each area. If customers purchase multiple products from one seller shipping cost is calculated by the customer shipping area. To configure area wise shipping cost go to ') }} <a href="{{ route('cities.index') }}">{{ translate('Shipping Cities') }}</a>.
                    </li>
                </ul>
            </div>
        </div> -->
    </div>
</div>

<!-- <div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Flat Rate Cost')}}</h5>
            </div>
            <form action="{{ route('shipping_configuration.update') }}" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                  @csrf
                  <input type="hidden" name="type" value="flat_rate_shipping_cost">
                  <div class="form-group">
                      <div class="col-lg-12">
                          <input class="form-control" type="text" name="flat_rate_shipping_cost" value="{{ \App\BusinessSetting::where('type', 'flat_rate_shipping_cost')->first()->value }}">
                      </div>
                  </div>
                  <div class="form-group mb-0 text-right">
                      <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                  </div>
              </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Note')}}</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        {{ translate('1. Flat rate shipping cost is applicable if Flat rate shipping is enabled.') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Shipping Cost for Admin Products')}}</h5>
            </div>
            <form action="{{ route('shipping_configuration.update') }}" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                  @csrf
                  <input type="hidden" name="type" value="shipping_cost_admin">
                  <div class="form-group">
                      <div class="col-lg-12">
                          <input class="form-control" type="text" name="shipping_cost_admin" value="{{ \App\BusinessSetting::where('type', 'shipping_cost_admin')->first()->value }}">
                      </div>
                  </div>
                  <div class="form-group mb-0 text-right">
                      <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                  </div>
              </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Note')}}</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        {{ translate('1. Shipping cost for admin is applicable if Seller wise shipping cost is enabled.') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> -->


<script>

    function shipping_cost_div(){
        if($('#seller_shipping_type').val() == 'flat_rate') {
            $('.seller_shipping_cost_div').show(); 
        } else {
            $('.seller_shipping_cost_div').hide(); 
        }
    }

</script>
@endsection
