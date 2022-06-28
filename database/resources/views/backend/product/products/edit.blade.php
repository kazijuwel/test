@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <h1 class="mb-0 h6">{{ translate('Edit Product') }}</h1>
</div>
<div class="col-lg-8 mx-auto">
	<form class="form form-horizontal mar-top" action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data" id="choice_form">
		<input name="_method" type="hidden" value="POST">
		<input type="hidden" name="id" value="{{ $product->id }}">
        <input type="hidden" name="lang" value="{{ $lang }}">
		@csrf
		<div class="card">
            <ul class="nav nav-tabs nav-fill border-light">
                @foreach (\App\Language::all() as $key => $language)
                    <li class="nav-item">
                        <a class="nav-link text-reset @if ($language->code == $lang) active @else bg-soft-dark border-light border-left-0 @endif py-3" href="{{ route('products.admin.edit', ['id'=>$product->id, 'lang'=> $language->code] ) }}">
                            <img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
                            <span>{{$language->name}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>

			<div class="card-body">
				<div class="form-group row">
                    <label class="col-lg-3 col-from-label">{{translate('Product Name')}} <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="name" placeholder="{{translate('Product Name')}}" value="{{ $product->getTranslation('name', $lang) }}" required>
                    </div>
                </div>
                <div class="form-group row" id="category">
                    <label class="col-lg-3 col-from-label">{{translate('Category')}}</label>
                    <div class="col-lg-8">
                        <select class="form-control aiz-selectpicker" name="category_id" id="category_id" data-selected="{{ $product->category_id }}" onchange="get_commission()"  data-live-search="true" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
                                @foreach ($category->childrenCategories as $childCategory)
                                    @include('categories.child_category', ['child_category' => $childCategory])
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row" id="brand">
                    <label class="col-lg-3 col-from-label">{{translate('Brand')}}</label>
                    <div class="col-lg-8">
                        <select class="form-control aiz-selectpicker" name="brand_id" id="brand_id" data-live-search="true">
							<option value="">{{ ('Select Brand') }}</option>
							@foreach (\App\Brand::all() as $brand)
								<option value="{{ $brand->id }}" @if($product->brand_id == $brand->id) selected @endif>{{ $brand->getTranslation('name') }}</option>
							@endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-from-label">Model</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="model" placeholder="{{ translate('Model') }}" value="{{$product->model}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-from-label">{{translate('Unit')}} <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i> </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="unit" placeholder="{{ translate('Unit (e.g. KG, Pc etc)') }}" value="{{$product->getTranslation('unit', $lang)}}" required>
                    </div>
                </div>
                <div class="form-group row">
					<label class="col-lg-3 col-from-label">{{translate('Minimum Qty')}}</label>
					<div class="col-lg-8">
						<input type="number" lang="en" class="form-control" name="min_qty" value="@if($product->min_qty <= 1){{1}}@else{{$product->min_qty}}@endif" min="1" required>
					</div>
				</div>
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label">{{translate('Tags')}}</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control aiz-tag-input" name="tags[]" id="tags" value="{{ $product->tags }}" placeholder="{{ translate('Type to add a tag') }}" data-role="tagsinput" required>
                    </div>
                </div>
				@php
				    $pos_addon = \App\Addon::where('unique_identifier', 'pos_system')->first();
				@endphp
				@if ($pos_addon != null && $pos_addon->activated == 1)
					<div class="form-group row">
						<label class="col-lg-3 col-from-label">{{translate('Barcode')}}</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="barcode" placeholder="{{ translate('Barcode') }}" value="{{ $product->barcode }}">
						</div>
					</div>
				@endif

				@php
				    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
				@endphp
				@if ($refund_request_addon != null && $refund_request_addon->activated == 1)
					<div class="form-group row">
						<label class="col-lg-3 col-from-label">{{translate('Refundable')}}</label>
						<div class="col-lg-8">
							<label class="aiz-switch aiz-switch-success mb-0" style="margin-top:5px;">
								<input type="checkbox" name="refundable" @if ($product->refundable == 1) checked @endif>
	                            <span class="slider round"></span></label>
							</label>
						</div>
					</div>
				@endif
			</div>
		</div>

							<div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{translate('Quick Overview')}}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Short Description of the Product')}}</label>
                                        <div class="col-md-8">
                                            <textarea class="aiz-text-editor" name="quick_overview">{{$product->quick_overview}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('Product Images')}}</h5>
			</div>
			<div class="card-body">

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Gallery Images')}}</label>
                    <div class="col-md-8">
                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                            </div>
                            <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                            <input type="hidden" name="photos" value="{{ $product->photos }}" class="selected-files">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Thumbnail Image')}} <small>(290x300)</small></label>
                    <div class="col-md-8">
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                            </div>
                            <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                            <input type="hidden" name="thumbnail_img" value="{{ $product->thumbnail_img }}" class="selected-files">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
				{{-- <div class="form-group row">
					<label class="col-lg-3 col-from-label">{{translate('Gallery Images')}}</label>
					<div class="col-lg-8">
						<div id="photos">
							@if(is_array(json_decode($product->photos)))
								@foreach (json_decode($product->photos) as $key => $photo)
									<div class="col-md-4 col-sm-4 col-xs-6">
										<div class="img-upload-preview">
											<img loading="lazy"  src="{{ uploaded_asset($photo) }}" alt="" class="img-responsive">
											<input type="hidden" name="previous_photos[]" value="{{ $photo }}">
											<button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
										</div>
									</div>
								@endforeach
							@endif
						</div>
					</div>
				</div> --}}
				{{-- <div class="form-group row">
					<label class="col-lg-3 col-from-label">{{translate('Thumbnail Image')}} <small>(290x300)</small></label>
					<div class="col-lg-8">
						<div id="thumbnail_img">
							@if ($product->thumbnail_img != null)
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="img-upload-preview">
										<img loading="lazy"  src="{{ uploaded_asset($product->thumbnail_img) }}" alt="" class="img-responsive">
										<input type="hidden" name="previous_thumbnail_img" value="{{ $product->thumbnail_img }}">
										<button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
									</div>
								</div>
							@endif
						</div>
					</div>
				</div> --}}
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('Product Videos')}}</h5>
			</div>
			<div class="card-body">
				<div class="form-group row">
					<label class="col-lg-3 col-from-label">{{translate('Video Provider')}}</label>
					<div class="col-lg-8">
						<select class="form-control aiz-selectpicker" name="video_provider" id="video_provider">
							<option value="youtube" <?php if($product->video_provider == 'youtube') echo "selected";?> >{{translate('Youtube')}}</option>
							<option value="dailymotion" <?php if($product->video_provider == 'dailymotion') echo "selected";?> >{{translate('Dailymotion')}}</option>
							<option value="vimeo" <?php if($product->video_provider == 'vimeo') echo "selected";?> >{{translate('Vimeo')}}</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-from-label">{{translate('Video Link')}}</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="video_link" value="{{ $product->video_link }}" placeholder="{{ translate('Video Link') }}">
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('Product Variation')}}</h5>
			</div>
			<div class="card-body">
				<div class="form-group row">
					<div class="col-lg-3">
						<input type="text" class="form-control" value="{{translate('Colors')}}" disabled>
					</div>
					<div class="col-lg-8">
						<select class="form-control aiz-selectpicker" data-live-search="true" data-selected-text-format="count" name="colors[]" id="colors" multiple>
							@foreach (\App\Color::orderBy('name', 'asc')->get() as $key => $color)
								<option
									value="{{ $color->code }}"
									data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:{{ $color->code }}'></span><span>{{ $color->name }}</span></span>"
									<?php if(in_array($color->code, json_decode($product->colors))) echo 'selected'?>
								></option>
							@endforeach
						</select>
					</div>
					<div class="col-lg-1">
                        <label class="aiz-switch aiz-switch-success mb-0">
                            <input value="1" type="checkbox" name="colors_active" <?php if(count(json_decode($product->colors)) > 0) echo "checked";?> >
                            <span></span>
                        </label>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-lg-3">
						<input type="text" class="form-control" value="{{translate('Attributes')}}" disabled>
					</div>
                    <div class="col-lg-8">
                        <select name="choice_attributes[]" id="choice_attributes" data-selected-text-format="count" data-live-search="true" class="form-control aiz-selectpicker" multiple data-placeholder="{{ translate('Choose Attributes') }}">
							@foreach (\App\Attribute::all() as $key => $attribute)
								<option value="{{ $attribute->id }}" @if($product->attributes != null && in_array($attribute->id, json_decode($product->attributes, true))) selected @endif>{{ $attribute->getTranslation('name') }}</option>
							@endforeach
                        </select>
                    </div>
                </div>

				<div class="">
					<p>{{ translate('Choose the attributes of this product and then input values of each attribute') }}</p>
					<br>
				</div>

				<div class="customer_choice_options" id="customer_choice_options">
					@foreach (json_decode($product->choice_options) as $key => $choice_option)
						<div class="form-group row">
							<div class="col-lg-3">
								<input type="hidden" name="choice_no[]" value="{{ $choice_option->attribute_id }}">
								<input type="text" class="form-control" name="choice[]" value="{{ \App\Attribute::find($choice_option->attribute_id)->getTranslation('name') }}" placeholder="{{ translate('Choice Title') }}" disabled>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control aiz-tag-input" name="choice_options_{{ $choice_option->attribute_id }}[]" placeholder="{{ translate('Enter choice values') }}" value="{{ implode(',', $choice_option->values) }}" data-on-change="update_sku">
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
                    <input type="hidden" id="added_by" value="{{$product->added_by}}">
		@if($product->added_by == 'seller')

			  @if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'product_wise_shipping')
                        <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{translate('Shipping Method')}}</h5>
                                </div>
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <div class="card-heading">
                                                <h5 class="mb-0 h6">{{translate('Shipping Options')}}</h5>
                                            </div>
                                        </div>
                                        @php
                                          $flat_rate = \DB::table('shipping_sellers')

                                            ->get();
                                        @endphp

                                      <div class="col-md-9">

                                            <div class="form-group row">
                                                <label class="col-md-3 col-from-label">{{translate('Choose')}}</label>
                                                <div class="col-md-8">



                                                    <select  onchange="put_shipping_cost()" class="form-control"  name="seller_shipping_id"  id="shipping_option">

                                                        @foreach ($flat_rate as $item)
                                                            <option data-price="{{$item->seller_shipping_cost}}" data-type="{{$item->seller_shipping_type}}" value="{{ $item->id }}" {{ ( $item->id == $product->seller_shipping_id) ? 'selected' : '' }}>
                                                            {{$item->title}}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <input type="hidden" id="seller_shipping_id" name="seller_shipping_id" value="{{$product->seller_shipping_id}}"> -->
                                            <input type="hidden" id="seller_shipping_type" name="shipping_type" value="flat_rate">

                                            <div class="form-group row" id="chang">
                                                <label class="col-md-3 col-from-label">{{translate('Shipping cost')}}</label>
                                                <div class="col-md-8">

                                                    <input onkeyup="total_mrp()"  id="flat_shipping_cost" type="number" lang="en" min="0" value="{{ $product->shipping_cost }}" step="0.01" placeholder="" name="flat_shipping_cost" class="form-control" required >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             @endif
                        @endif




		<!-- <div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('Measurement of the Product')}}</h5>
			</div>
			<?php
            $type_name = 0;
            $amount = 0;
            if ($product->delivery_price_type == 1) {
            $type_name = 'KG';
            $amount = $product->total_kg;
            } elseif ($product->delivery_price_type == 2) {
            $type_name = 'CFT';
            $amount = $product->total_cft;
            }
            ?>
			<div class="card-body">
				@if($product->total_kg > 0)
				<div class="form-group row">
                    <label class="col-lg-3 col-from-label">{{translate('Product Unit Type(KG)')}}</label>
                    <div class="col-lg-3">
                        <input type="text" placeholder="{{translate('Unit price')}}" name="" class="form-control" value="{{$product->total_kg}} KG" readonly>
                    </div>
                </div>
                @endif
                @if($product->total_cft > 0)
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label">{{translate('Product Unit Type(CFT)')}}</label>
                    <div class="col-lg-3">
                        <input type="text" placeholder="{{translate('Unit price')}}" name="" class="form-control" value="{{$product->total_cft}} CFT" readonly>
                    </div>
                </div>
                @endif

                <input type="number" lang="en" min="0" value="0" step="0.01" placeholder="" name="delivery_price" id="delivery_price" class="form-control" readonly>
                                            <input type="hidden" name="delivery_price_type" id="delivery_price_type">
                                            <input type="hidden" name="total_kg" id="total_kg" value="{{$product->total_kg}}">
                                            <input type="hidden" name="total_cft" id="total_cft" value="{{$product->total_cft}}">

                <div class="form-group row" style="display: none;">
                    <label class="col-lg-3 col-from-label">{{translate('Delivery price')}}</label>
                    <div class="col-lg-3">
                        <input type="number" lang="en" min="0" step="0.01" placeholder="{{translate('Purchase price')}}" name="" class="form-control" value="{{$product->delivery_price}}" readonly>
                    </div>
                </div>
				<br>

			</div>
		</div> -->



		<!-- Measurement Delivery Price -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{translate('Measurement of the Product')}}</h5>
                                </div>
                                 <div class="card-body ">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>{{translate('Gross Weight')}}</label>
                                        <div class="input-group mb-3">
                                            <input onkeyup='total_calculation()' type="number" min="0" step="0.01" lang="en" placeholder="0" name="gross_weight" id="gross_weight" value="{{$product->total_kg}}" class="form-control" aria-label="" aria-describedby="basic-addon2" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">{{translate('KGs')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h2 class="h5 fw-700 mb-2 text-center">
                                            {{translate('Package Size')}}
                                        </h2>
                                    </div>
                                <div class="form-group row">
                                    <div class="form-group col-md-3">
                                        <label >{{translate('Length(inch)')}}</label>
                                        <input onkeyup='total_calculation()' type="number" lang="en" value="0" placeholder="0" name="length" id="length" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label >{{translate('Width(inch)')}}</label>
                                        <input onkeyup='total_calculation()' type="number" lang="en" value="0" placeholder="0" name="width" id="width" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>{{translate('Height(inch)')}}</label>
                                        <input onkeyup='total_calculation()' type="number" lang="en" value="0" placeholder="0" name="height" id="height" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="input-group mb-3" style="margin-top:1.6rem">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon1">=</span>
                                            </div>
                                            <input  type="number" lang="en"  placeholder="0.00" name="total_size" id="total_size" value="{{$product->total_cft}}" class="form-control"  readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text">{{translate('CFT')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4" style="display: none;">
                                        <label>{{translate('Delivery Price')}}</label>
                                        <div class="input-group mb-3">
                                            <input type="number" lang="en" min="0" value="0" step="0.01" placeholder="" name="delivery_price" id="delivery_price" class="form-control" readonly>
                                            <input type="hidden" name="delivery_price_type" id="delivery_price_type">
                                            <input type="hidden" name="total_kg" id="total_kg" value="{{$product->total_kg}}">
                                            <input type="hidden" name="total_cft" id="total_cft" value="{{$product->total_cft}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">{{translate('Tk')}}</span>
                                            </div>
                                        </div>
                                        </div>
                                </div>

                                </div>
                            </div>
                        </div>


		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('Product price + stock')}}</h5>
			</div>
			<div class="card-body">
				<div class="form-group row">
                    <label class="col-lg-3 col-from-label">{{translate('MRP price')}}</label>
                    <div class="col-lg-6">
                        <input onkeyup="total_mrp()" type="text" placeholder="{{translate('Unit price')}}" name="unit_price" id="mrp" class="form-control" value="{{$product->unit_price}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label">{{translate('Purchase price')}}</label>
                    <div class="col-lg-6">
                        <input type="number" lang="en" min="0" step="0.01" placeholder="{{translate('Purchase price')}}" name="purchase_price" class="form-control" value="{{$product->purchase_price}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label">{{translate('VAT.')}}</label>
                    <div class="col-lg-6">
                        <input onkeyup="total_mrp()" type="number" lang="en" min="0" step="0.01" placeholder="{{translate('tax')}}" name="tax" id="tax" class="form-control" value="{{$product->tax}}" required>
                    </div>
                    <div class="col-lg-3">
                        <select onchange="total_mrp()" class="form-control aiz-selectpicker" name="tax_type" data-selected={{ $product->tax_type }} id="tax_type" required>
                        	<option value="amount" >{{translate('Flat')}}</option>
                        	<option value="percent" >{{translate('Percent')}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label">{{translate('Discount')}}</label>
                    <div class="col-lg-6">
                        <input onkeyup="total_mrp()" type="number" lang="en" min="0" step="0.01" placeholder="{{translate('Discount')}}" name="discount" id="discount" class="form-control" value="{{ $product->discount }}">
                    </div>
                    <div class="col-lg-3">
                        <select onchange="total_mrp()" class="form-control aiz-selectpicker" name="discount_type" data-selected={{ $product->discount_type }} id="discount_type" required>
                        	<option value="amount"  >{{translate('Flat')}}</option>
                        	<option value="percent"  >{{translate('Percent')}}</option>
                        </select>
                    </div>
                </div>
				<div class="form-group row" id="quantity">
					<label class="col-lg-3 col-from-label">{{translate('Available Stock')}}</label>
					<div class="col-lg-6">
						<input type="number" lang="en" value="{{ $product->current_stock }}" step="1" placeholder="{{translate('Quantity')}}" name="current_stock" class="form-control" required>
					</div>
				</div>
				@if($product->added_by == 'seller')
				<div class="form-group row" id="quantity">
					<label class="col-lg-3 col-from-label">{{translate('Commission(%)')}}</label>
					<div class="col-lg-6">
						<input id="commision_rate" type="number" lang="en" value="{{$product->category->commision_rate}}" step="1" placeholder="" name="" class="form-control" readonly>
					</div>
				</div>
				@endif

				<div>
                                    <h5 style="text-align: center;" class="mb-0 h6">{{translate('(Price Show to the Visitor)')}}</h5>
                                    </div>
                                    <hr>

				<div class="form-group row" id="add_fields_placeholderValue" style="display:none">
                                        <label class="col-md-3 col-from-label" style="color: #F16522">{{translate('With Discount')}}</label>
                                        <div class="col-md-6">
                                            <input type="number" placeholder="0" value="" name="with_discount"
                                                   id="with_discount" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="commision">
                                        <label class="col-md-3 col-from-label">{{translate('Without Discount')}}</label>
                                        <div class="col-md-6">
                                            <input type="number" placeholder="0" value="" name="without_discount"
                                                   id="without_discount" class="form-control" readonly>
                                        </div>
                                    </div>
				<br>
				<div class="sku_combination" id="sku_combination">

				</div>
			</div>
		</div>

		<?php
            $type_name = 0;

            if ($product->payment_type == 1) {
            $type_name = 'Payment after Successful delivery';

            }
            if ($product->payment_type == 2) {
            $type_name = 'Advance Payment';

            }
            ?>


<!--payment Type-->
  <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{translate('Payment Type')}}</h5>
                                </div>
                                <div class="card-body" style="padding: 20px 42px;">
                                    <div class="form-group row">
                                        <div class="form-check">
                                            <input class="form-check-input" value="1" type="radio" name="payment_type"
                                                   id="flexRadioDefault1" {{ ($product->payment_type=="1")? "checked" : "" }} required>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Payment after Successful delivery.
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <div class="form-check">
                                            <input class="form-check-input" value="2" type="radio" name="payment_type"
                                                   id="flexRadioDefault1" {{ ($product->payment_type=="2")? "checked" : "" }}>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Advance Payment
                                            </label>
                                        </div>
                                        <br>
                                    </div>


                                </div>
                            </div>

<!--end Payment type-->

{{-- @if($product->added_by == 'seller')
<div class="card" >
<div class="card-header">
    <h5 class="mb-0 h6">{{translate('Payment Type')}}<span style="font-style: italic; color: #7ab32f">: {{$type_name}} </span> </h5>
</div>
</div>
@endif --}}


		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('Product Description')}}</h5>
			</div>
			<div class="card-body">
				<div class="form-group row">
                    <label class="col-md-3 col-from-label">{{translate('Description')}} <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i></label>
                    <div class="col-md-8">
                        <textarea class="aiz-text-editor" name="description">{{ $product->getTranslation('description', $lang) }}</textarea>
                    </div>
                </div>
			</div>
		</div>

							<div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{translate('Special Features')}}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Details Features')}}</label>
                                        <div class="col-md-8">
                                            <textarea class="aiz-text-editor" name="special_feature">{{$product->special_feature}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{translate('Specification')}}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Details Specification')}}</label>
                                        <div class="col-md-8">
                                            <textarea class="aiz-text-editor" name="specification">{{$product->specification}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- start Faq -->

           <div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('FAQ') }}</h6>
			</div>
			<div class="card-body">
					<div class="form-group">
						<label>{{ translate('Question & Answer') }}</label>
						<div class="home-banner2-target">
							
							 @foreach ($product->product_faq as $value)
									<div class="row gutters-5">
										<div class="col-5">
											<div class="form-group">
				                                
				                               <input type="text" class="form-control" placeholder="Input your answer here" value="{{$value->question}}" name="question[]">
				                            </div>
				                            
										</div>
										<div class="col">
											<div class="form-group">
												
												<input type="text" class="form-control" placeholder="Input your answer here" value="{{$value->answer}}" name="answer[]">
											</div>
										</div>
										<div class="col-auto">
											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
												<i class="las la-times"></i>
											</button>
										</div>
									</div>
								@endforeach
							
						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm"
							data-toggle="add-more"
							data-content='
							<div class="row gutters-5">
								<div class="col-5">
									<div class="form-group">
										
										<input type="text" class="form-control" placeholder="Input your question here" name="question[]">
									
									</div>
									
								</div>
								<div class="col">
									<div class="form-group">
										<div class="form-group">
												
												<input type="text" class="form-control" placeholder="Input your answer here" name="answer[]">
											</div>
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
							data-target=".home-banner2-target">
							{{ translate('Add New') }}
						</button>
					</div>
				
			</div>
		</div>

                            <!-- End Faq -->



		<!-- <div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('PDF Specification')}}</h5>
			</div>
			<div class="card-body">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('PDF Specification')}}</label>
                    <div class="col-md-8">
                        <div class="input-group" data-toggle="aizuploader">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                            </div>
                            <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                            <input type="hidden" name="pdf" value="{{ $product->pdf }}" class="selected-files">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
			</div>
		</div> -->
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('SEO Meta Tags')}}</h5>
			</div>
			<div class="card-body">
				<div class="form-group row">
					<label class="col-lg-3 col-from-label">{{translate('Meta Title')}}</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="meta_title" value="{{ $product->meta_title }}" placeholder="{{translate('Meta Title')}}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-from-label">{{translate('Description')}}</label>
					<div class="col-lg-8">
						<textarea name="meta_description" rows="8" class="form-control">{{ $product->meta_description }}</textarea>
					</div>
				</div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Meta Images')}}</label>
                    <div class="col-md-8">
                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                            </div>
                            <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                            <input type="hidden" name="meta_img" value="{{ $product->meta_img }}" class="selected-files">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
                <div class="form-group row d-none">
                    <label class="col-md-3 col-form-label">{{translate('Slug')}}</label>
                    <div class="col-md-8">
                        <input type="text" placeholder="{{translate('Slug')}}" id="slug" name="slug" value="{{ $product->slug }}" class="form-control">
                    </div>
                </div>
			</div>
		</div>

		<div class="col-12">
                <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <button type="submit" name="button" class="btn btn-info">{{ translate('Save') }}</button>
                    </div>
                    @if($product->published == 0)
                    <div class="btn-group" role="group" aria-label="Second group">
                        <button type="submit" name="button" value="publish" class="btn btn-success">{{ translate('Save & Publish') }}</button>
                    </div>
                    @endif
                </div>
            </div>

		<!-- <div class="mb-3 text-right">
			<button type="submit" name="button" class="btn btn-info">{{ translate('Update Product') }}</button>
		</div> -->
	</form>
</div>

@endsection

@section('script')

<script type="text/javascript">

	function add_more_customer_choice_option(i, name){
        $('#customer_choice_options').append('<div class="form-group row"><div class="col-md-3"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="{{ translate('Choice Title') }}" readonly></div><div class="col-md-8"><input type="text" class="form-control aiz-tag-input" name="choice_options_'+i+'[]" placeholder="{{ translate('Enter choice values') }}" data-on-change="update_sku"></div></div>');

    	AIZ.plugins.tagify();
	}

	$('input[name="colors_active"]').on('change', function() {
	    if(!$('input[name="colors_active"]').is(':checked')){
			$('#colors').prop('disabled', true);
		}
		else{
			$('#colors').prop('disabled', false);
		}
		update_sku();
	});

	$('#colors').on('change', function() {
	    update_sku();
	});

	function delete_row(em){
		$(em).closest('.form-group').remove();
		update_sku();
	}

    function delete_variant(em){
		$(em).closest('.variant').remove();
	}

	function update_sku(){
		$.ajax({
		   type:"POST",
		   url:'{{ route('products.sku_combination_edit') }}',
		   data:$('#choice_form').serialize(),
		   success: function(data){
			   $('#sku_combination').html(data);
			   if (data.length > 1) {
				   $('#quantity').hide();
			   }
			   else {
					$('#quantity').show();
			   }
		   }
	   });
	}

    AIZ.plugins.tagify();

	$(document).ready(function(){
		update_sku();

		$('.remove-files').on('click', function(){
            $(this).parents(".col-md-4").remove();
        });
	});

	$('#choice_attributes').on('change', function() {
		$.each($("#choice_attributes option:selected"), function(j, attribute){
			flag = false;
			$('input[name="choice_no[]"]').each(function(i, choice_no) {
				if($(attribute).val() == $(choice_no).val()){
					flag = true;
				}
			});
            if(!flag){
				add_more_customer_choice_option($(attribute).val(), $(attribute).text());
			}
        });

		var str = @php echo $product->attributes @endphp;

		$.each(str, function(index, value){
			flag = false;
			$.each($("#choice_attributes option:selected"), function(j, attribute){
				if(value == $(attribute).val()){
					flag = true;
				}
			});
            if(!flag){
				$('input[name="choice_no[]"][value="'+value+'"]').parent().parent().remove();
			}
		});

		update_sku();
	});




function total_calculation() {


var length = $('#length').val();
var width = $('#width').val();
var height = $('#height').val();
var length_value = 0;
var width_value = 0;
var height_value = 0;
if (length != '') {
	length_value = (length / 12);
}
if (width != '') {
	width_value = (width / 12);
}
if (height != '') {
	height_value = (height / 12);
}
;


var total_cft = (length_value * width_value * height_value);
$('#total_size').val(total_cft.toFixed(2));


var size_wise_charge = total_cft *
		{{$package_size_info->delivery_charge}}

var gross_weight = $('#gross_weight').val();
var gross_weight_price = gross_weight *{{$gross_weight_info->delivery_charge}};

if (gross_weight_price < size_wise_charge) {
	$('#delivery_price').val(Math.round(size_wise_charge));
	$('#delivery_price_type').val(2); /*2=size*/
	$('#total_cft').val(total_cft.toFixed(2)); /*2=size*/
	$('#total_kg').val(gross_weight); /*1=kg*/


}
else {
	$('#delivery_price').val(Math.round(gross_weight_price));
	$('#delivery_price_type').val(1); /*1=kg*/
	$('#total_kg').val(gross_weight); /*1=kg*/
	$('#total_cft').val(total_cft.toFixed(2)); /*2=size*/

}


}

function put_shipping_cost(){
            var shipping_cost = $('#shipping_option option:selected').attr('data-type');
        if(shipping_cost=="free"){
            $('#flat_shipping_cost').val("0");
            $('#chang').hide();
        }else{
            $('#chang').show();
            $('#flat_shipping_cost').val("0");
        }
            total_mrp();
        }



        function calculatePrice(mrp,discount, discount_type) {
            var discount_price = 0;

            if (discount_type == "percent" && discount != 0) {
                discount_price = (mrp * discount) / 100;

            }else if(discount_type== "amount" && discount != 0){
                discount_price =  discount;
            }else{
                 discount_price = 0;
            }
            return {unit_price: parseFloat(mrp), discount_price: parseFloat(discount_price)};


        }

        function calculateTax(calculate_price_array, tax, tax_type) {
           var discount_price_tax = 0;
            var unit_price_tax = 0;
            if (tax_type == "percent" && tax != 0) {
                if(calculate_price_array.discount_price !=0){

                    discount_price_tax = ((calculate_price_array.unit_price - calculate_price_array.discount_price) * tax) / 100;

                }else{
                    discount_price_tax = 0;

                }
                unit_price_tax = (calculate_price_array.unit_price * tax) / 100;

            } else if(tax_type == "amount" && tax != 0){
                if(calculate_price_array.discount_price !=0){

                    discount_price_tax = tax;

                }else{
                    discount_price_tax = 0;
                }
                unit_price_tax = tax;
            }else{
                discount_price_tax = 0;
                unit_price_tax = 0;
            }
            return {unit_price_tax: parseFloat(unit_price_tax), discount_price_tax: parseFloat(discount_price_tax)};
        }
        function calculateCommission(commission, calculate_price_array, calculate_tax_array,flat_shipping_cost) {


           var unit_price = calculate_price_array.unit_price;
           var discount_price = calculate_price_array.discount_price;



           var unit_price_tax = calculate_tax_array.unit_price_tax;
           var discount_price_tax = calculate_tax_array.discount_price_tax;

           /* console.log(discount_price_tax); exit();*/
            /*console.log('unit_price'+ unit_price_tax)
            console.log('discount_price'+ discount_price_tax); exit();*/



           var unit_price_commission = ((unit_price + 0)*commission) /100;
           var discount_price_commission = (((unit_price - discount_price) + discount_price_tax)*commission) /100;



var total_unit_price = unit_price + unit_price_tax + unit_price_commission +(+flat_shipping_cost);
var total_discount_price = (unit_price - discount_price) + discount_price_tax + discount_price_commission +(+flat_shipping_cost);

            return {unit_price_commission: parseFloat(total_unit_price), discount_price_commission: parseFloat(total_discount_price)};



            //console.log(calculate_price_array);
            //console.log(calculate_tax_array);


        }



function total_mrp() {
var added_by = $('#added_by').val();

if(added_by != "seller"){

var mrp = "";
var tax = "";
var tax_type = "";
var discount = 0;
var discount_type = "";
var delivery_cost = "";
var flat_shipping_cost = "";

mrp = $('#mrp').val();
tax = $('#tax').val();
tax_type = $('#tax_type').val();
discount = $('#discount').val();
discount_type = $('#discount_type').val();
delivery_cost = $('#delivery_price').val();


if (discount_type == "percent") {
	discount = (mrp * discount) / 100;
}


if (tax_type == "percent") {
	if(discount != 0){
		discount_tax = (((+mrp) - discount) * tax) / 100;
		unit_tax = (mrp * tax) / 100;
	}else{
	unit_tax = (mrp * tax) / 100;
	}
}else{
	discount_tax = tax;
	unit_tax =  tax;
}


if (discount != 0) {
	var with_discount = ((+mrp) + (+discount_tax)) - (discount);
	$('#with_discount').val(with_discount.toFixed(0));
	$("#add_fields_placeholderValue").show();
} else {
	$('#with_discount').val(0);
	$("#add_fields_placeholderValue").hide();
}

	var with_out_discount = (+mrp) + (+unit_tax) ;


$('#without_discount').val(with_out_discount.toFixed(0));


}else{
  // for seller edit by admin product edit

            var mrp = "";
            var tax = "";
            var tax_type = "";
            var discount = 0;
            var discount_type = "";
            var delivery_cost = "";
            var commission = "";
            var flat_shipping_cost = 0;

            mrp = $('#mrp').val();
            tax = $('#tax').val();
            tax_type = $('#tax_type').val();
            discount = $('#discount').val();
            discount_type = $('#discount_type').val();
            delivery_cost = $('#delivery_price').val();
            commission = $('#commision_rate').val();
            flat_shipping_cost = $('#flat_shipping_cost').val();
            var with_discount = 0;

            //start price calculate
            var calculate_price_array = calculatePrice(mrp,discount, discount_type);
            /*console.log(calculate_price_array); exit();*/

            //end price calculate

            // start tax calculate
            var calculate_tax_array = calculateTax(calculate_price_array, tax, tax_type);

            //end tax calculate

            // start commission calculate

            var calculate_commission_array = calculateCommission(commission, calculate_price_array, calculate_tax_array,flat_shipping_cost);
             total_unit_price = calculate_commission_array.unit_price_commission ;
            total_discount_price = calculate_commission_array.discount_price_commission ;

            $('#without_discount').val(total_unit_price.toFixed(0));


            if (discount != 0) {
                 with_discount = total_discount_price;
                $('#with_discount').val(with_discount.toFixed(0));
                $("#add_fields_placeholderValue").show();
            } else {
                $('#with_discount').val(0);
                $("#add_fields_placeholderValue").hide();
            }
     }

}



$(document).ready(function() {
            setTimeout(function() {

                get_commission();
            }, 200);

            setTimeout(function() {
                total_mrp();
            }, 1000);

            $( "#category_id" ).change(function() {
                setTimeout(function() {
                total_mrp();
            }, 1000);

            });

            });


            function get_commission() {
            var category = $("#category_id").val();
            $.ajax({
                type: "POST",
                url: '{{ route('products.commission') }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    category_id: category,
                },
                success: function (data) {
                    $("#commision_rate").val(data);

                }
            });
            }

            function get_commission() {
            var category = $("#category_id").val();
            $.ajax({
                type: "POST",
                url: '{{ route('products.commission') }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    category_id: category,
                },
                success: function (data) {
                    $("#commision_rate").val(data);
                }
            });
            }

</script>

@endsection
