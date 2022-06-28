@extends('backend.layouts.app')


@section('content')


    <div class="row">
        <!-- Delivery Method add div start here -->
        <div class="col-md-6" style="padding-left: 0px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Delivery Method Configuration Form</h5>
                    @if(!empty($edit))
                        <a class="btn btn-success" href="{{route('delivery_method_configuration.index')}}">Add New</a>
                    @endif
                </div>
                <div class="card-body">
                    @if(empty($edit))
                        <form action="{{ route('delivery_method_configuration.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-from-label" for="parent_id"
                                       style="padding-top: 12px;">{{translate('Level')}}</label>
                                <div class="col-sm-9">
                                    <select name="level" class="form-control" id="level_selector" required>
                                        <option value="">Select</option>


                                        <option value="0">Level-0</option>
                                        <option value="1">Level-1</option>
                                        <option value="2">Level-2</option>


                                    </select>
                                </div>
                            </div>

                            <div class="form-group row level_hidden 0 1 2" style="display:none">
                                <label class="col-sm-3 col-from-label" for="title"
                                       style="padding-top: 10px;">{{translate('Delivery Area Title')}}</label>
                                <div class="col-sm-9">
                                    <input autocomplete="off" type="text" placeholder="{{translate('Title')}}" id="title" name="title"
                                           class="form-control" required>
                                    <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">
                                </div>
                            </div>
                            <div class="form-group row level_hidden 1 " style="display:none">
                                <label class="col-sm-3 col-from-label" for="parent_id"
                                       style="padding-top: 12px;">{{translate('Urgency')}}</label>
                                <div class="col-sm-9">
                                    <select name="urgency" class="form-control" id="urgency">
                                        <option value="">Select</option>
                                        @foreach($delivery_method_list_urgency as $value)
                                            <option value="{{$value->id}}">{{$value->title}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row level_hidden 1" style="display:none">
                                <label class="col-sm-3 col-from-label seller_shipping_cost_div"
                                       for="seller_shipping_cost"
                                       style="padding-top: 12px;">{{translate('Delivery Time')}}</label>
                                <div class="col-sm-9 seller_shipping_cost_div">
                                    <input type="text" placeholder="Days" value="0" name="delivery_date" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row level_hidden 2" style="display:none">
                                <label class="col-sm-3 col-from-label" for="parent_id"
                                       style="padding-top: 12px;">{{translate('Parent')}}</label>
                                <div class="col-sm-9">
                                    <select name="parent_id" class="form-control" id="parent_id">
                                        <option value="0">Select</option>
                                        @foreach($delivery_method_list as $delivery_method)


                                            <option value="{{$delivery_method->id}}">{{$delivery_method->title}} <span
                                                    style="color: green"> ({{$delivery_method->parent->title}})</span>
                                            </option>


                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row level_hidden 2" style="display:none">
                                <label class="col-sm-3 col-from-label" for="parent_id"
                                       style="padding-top: 12px;">{{translate('Type')}}</label>
                                <div class="col-sm-9">
                                    <select name="type" class="form-control" id="type">
                                        <option value="">Select</option>
                                        <option value="1">KG</option>
                                        <option value="2">CFT</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row level_hidden 1" style="display:none">
                                <label class="col-sm-3 col-from-label" for="parent_id"
                                       style="padding-top: 12px;">{{translate('Payment Type')}}</label>
                                <div class="col-sm-9">
                                    <select name="delivery_payment_type" class="form-control" id="type">
                                        <option value="">Select</option>
                                        <option value="1">Cash on Delivery</option>
                                        <option value="2">Advance Payment</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row level_hidden 2" style="display:none">
                                <label class="col-sm-3 col-from-label seller_shipping_cost_div"
                                       for="seller_shipping_cost"
                                       style="padding-top: 12px;">{{translate('Delivery Charge (per kg/cft)')}}</label>
                                <div class="col-sm-9 seller_shipping_cost_div">
                                    <input type="text" value="0" placeholder="{{translate('Seller Shipping Cost')}}"
                                           id="delivery_charge" name="delivery_charge" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-right">
                                <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                            </div>
                        </form>
                    @else
                        <form action="{{route('delivery_method_configuration.update_delivery_method')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-from-label" for="title"
                                       style="padding-top: 10px;">{{translate('Title')}}</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="{{translate('Title')}}" id="title" name="title"
                                           class="form-control" value="{{$delivery_method_info->title}}" required>
                                    <input type="hidden" name="id" value="{{$delivery_method_info->id}}">
                                    <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-from-label" for="title"
                                       style="padding-top: 10px;">{{translate('Delivery Time')}}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="delivery_date" placeholder="Days" class="form-control" value="{{$delivery_method_info->delivery_date}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-from-label seller_shipping_cost_div"
                                       for="seller_shipping_cost"
                                       style="padding-top: 12px;">{{translate('Delivery Charge (per kg/cft)')}}</label>
                                <div class="col-sm-9 seller_shipping_cost_div">
                                    <input type="text" placeholder="{{translate('Seller Shipping Cost')}}"
                                           id="delivery_charge" name="delivery_charge" class="form-control"
                                           value="{{$delivery_method_info->delivery_charge}}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0 float-right">
                                <button type="submit" class="btn btn-primary">{{translate('Update')}}</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <!-- Delivery Method end div start here -->

        <!-- minimum charge -->

         <div class="col-md-6" style="padding: 0px;">
            <div class="card">
                <div class="card-header">
                <h5 class="mb-0 h6">Delivery Minimum Charge</h5>
                </div>
                <div class="card-body" >
                    <form action="{{ route('minimum_delivery_charge') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="minimum_charge" value="{{$min_charge->id}}">
                        <div class="form-group row">
                            <label class="col-sm-4 col-from-label" for="title" style="padding-top: 10px;">{{translate('Minimum Delivery Charge')}}</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="{{translate('Input Delivery Minimum Charge')}}" id="" name="minimum_charge" class="form-control" value="{{$min_charge->minimum_charge}}" required>
                            </div>
                        </div>
                       
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

         <!-- End minimum charge -->

        <div class="col-lg-12" style="padding: 0px;">
            <div class="card">
                <div class="card-header row gutters-5">
                    <div class="col text-center text-md-left">
                        <h5 class="mb-md-0 h6">{{ translate('Delivery Method Configuration List') }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                        <tr>
                            
                            <th>#</th>
                            <th>{{translate('Title')}}</th>
                            <th>{{translate('Level')}}</th>
                            <th>{{translate('Urgency')}}</th>
                            <th>{{translate('weight type')}}</th>
                            <th>{{translate('Parent')}}</th>
                            <th>{{translate('Payment Type')}}</th> 
                            <th>{{translate('Delivery Time')}}</th>
                            <th>{{translate('Delivery Charge')}}</th>
                            <th style="text-align: center;">{{translate('Options')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($delivery_method_list_paginate))
                            @foreach($delivery_method_list_paginate as $key => $delivery_method)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$delivery_method->title}}</td>
                                    <td>{{$delivery_method->level}}</td>
                                    <td>
                                        @php
                                            $delivry_methods_urgency = \App\DelivryMethod::where('id', $delivery_method->urgency)->first();
                                        @endphp
                                        @if($delivry_methods_urgency)
                                            <span>{{$delivry_methods_urgency->title}}</span>

                                        @else
                                            <span style="color: blue"></span>
                                        @endif

                                    </td>
                                    <td>
                                        @if($delivery_method->type)
                                            @if($delivery_method->type == 1)
                                                <span >Kg</span>
                                                @elseif($delivery_method->type == 2)
                                                <span >Cft</span>
                                                @endif

                                            @else
                                            <span></span>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach($delivery_method_list as $dm)
                                            @if($delivery_method->parent_id == $dm->id)
                                                {{$dm->title}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <?php
                                            $type_name = 0;

                                            if ($delivery_method->delivery_payment_type == 1) {
                                            $type_name = 'Cash On Delivery';
                                            }

                                            if ($delivery_method->delivery_payment_type == 2) {
                                            $type_name = 'Advance Payment';
                                            }

                                            if ($delivery_method->delivery_payment_type == 0) {
                                            $type_name = ' ';
                                            }

                                            ?>
                                        {{$type_name}}
                                    </td>
                                    <td class="text-center">
                                        @if($delivery_method->level == 1)
                                        @if($delivery_method->delivery_date != 0)
                                        {{$delivery_method->delivery_date}} Day(s)
                                        @else
                                        Same Day
                                        @endif
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($delivery_method->delivery_charge)
                                            @if($delivery_method->delivery_charge == 0.00)
                                                <span></span>
                                                @else
                                                {{$delivery_method->delivery_charge}}
                                                @endif

                                            @else
                                            <span></span>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        <div class="aiz-topbar-item ml-2">
                                            <div class="align-items-stretch d-flex dropdown">
                                                <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown"
                                                   href="javascript:void(0);" role="button" aria-haspopup="false"
                                                   aria-expanded="false">
                                            <span class="d-flex align-items-center">
                                                <span class="d-none d-md-block">
                                                    <button type="button"
                                                            class="btn btn-sm btn-dark">{{translate('Actions')}}</button>
                                                </span>
                                            </span>
                                                </a>
                                                <div
                                                    class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-xs">
                                                    <a href="{{route('delivery_method_configuration.edit', $delivery_method->id)}}"
                                                       class="dropdown-item" type="button" class="btn btn-primary">
                                                        {{translate('Edit')}}
                                                    </a>
                                                    <a onclick="return confirm('Are you sure you want to delete this method ?');"
                                                       href="{{route('delivery_method_configuration.delete_delivery_method', $delivery_method->id)}}"
                                                       class="dropdown-item">
                                                        {{translate('Delete')}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $delivery_method_list_paginate->appends(request()->input())->links() }}
                        @endif
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

        </div>
    </div>


    <script>

    </script>
@endsection
@section('script')
    <script type="text/javascript">
        $(function() {
            $('#level_selector').change(function(){
                $('.level_hidden').hide();
                $('.' + $(this).val()).show();
            });
        });
    </script>
@endsection
