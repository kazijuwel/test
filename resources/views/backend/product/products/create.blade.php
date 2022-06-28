@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Add New Product')}}</h5>
</div>
<div class="col-md-10 mx-auto">
	<form class="form form-horizontal mar-top" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
		@csrf
		<input type="hidden" name="added_by" value="admin">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('Product Information')}}</h5>
			</div>
			<div class="card-body">
				<div class="form-group row">
					<label class="col-md-3 col-from-label">{{translate('Product Name')}} <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="name" placeholder="{{ translate('Product Name') }}" onchange="update_sku()" required>
					</div>
				</div>
                <div class="form-group row">
                    <p id="slugMsg"></p>
                    <label class="col-lg-3 col-from-label">{{translate('Custom Product Slug')}} <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="custom_product_slug" placeholder="{{translate('Custom Product Slug')}}"  id="custom_product_slug">
                    </div>
                </div>
				<div class="form-group row" id="category">
					<label class="col-md-3 col-from-label">{{translate('Category')}} <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<select class="form-control aiz-selectpicker" name="category_id" id="category_id" data-live-search="true" required>
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
					<label class="col-md-3 col-from-label">{{translate('Brand')}}</label>
					<div class="col-md-8">
						<select class="form-control aiz-selectpicker" name="brand_id" id="brand_id" data-live-search="true">
							<option value="">{{ ('Select Brand') }}</option>
							@foreach (\App\Brand::all() as $brand)
								<option value="{{ $brand->id }}">{{ $brand->getTranslation('name') }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group row">
                    <label class="col-md-3 col-from-label">Model <small>(optional)</small></label>
                      <div class="col-md-8">
                      <input type="text" class="form-control" name="model" placeholder="Model name">
                    </div>
                </div>
				<div class="form-group row">
					<label class="col-md-3 col-from-label">{{translate('Unit')}}</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="unit" placeholder="{{ translate('Unit (e.g. KG, Pc etc)') }}" required>
					</div>
				</div>
                <div class="form-group row">
					<label class="col-md-3 col-from-label">{{translate('Delivery Fee')}} <span class="text-danger">*</span></label>
					<div class="col-md-1">
						<input type="checkbox" lang="en" class="" name="delivery_free" placeholder="Delivery Free">
					</div>
				</div>
                <div class="form-group row">
					<label class="col-md-3 col-from-label">{{translate('Minimum Qty')}} <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="number" lang="en" class="form-control" name="min_qty" value="1" min="1" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-from-label">{{translate('Tags')}} <span class="text-danger">*</span></label>
					<div class="col-md-8">
                        <input type="text" class="form-control aiz-tag-input" name="tags[]" placeholder="{{ translate('Type and hit enter to add a tag') }}" required>
                        <small class="text-muted">{{translate('This is used for search. Input those words by which cutomer can find this product.')}}</small>
					</div>
				</div>

				@php
				    $pos_addon = \App\Addon::where('unique_identifier', 'pos_system')->first();
				@endphp
				@if ($pos_addon != null && $pos_addon->activated == 1)
					<div class="form-group row">
						<label class="col-md-3 col-from-label">{{translate('Barcode')}}</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="barcode" placeholder="{{ translate('Barcode') }}">
						</div>
					</div>
				@endif

				@php
				    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
				@endphp
				@if ($refund_request_addon != null && $refund_request_addon->activated == 1)
					<div class="form-group row">
						<label class="col-md-3 col-from-label">{{translate('Refundable')}}</label>
						<div class="col-md-8">
                          <label class="aiz-switch aiz-switch-success mb-0">
                              <input type="checkbox" name="refundable" checked>
                              <span></span>
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
                                            <textarea class="aiz-text-editor" name="quick_overview"></textarea>
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
                <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Gallery Images')}} <small>(600x600)</small></label>
                <div class="col-md-8">
                    <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                        </div>
                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                        <input type="hidden" name="photos" class="selected-files">
                    </div>
                    <div class="file-preview box sm">
                    </div>
                    <small class="text-muted">{{translate('These images are visible in product details page gallery. Use 600x600 sizes images.')}}</small>
                </div>
            </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Thumbnail Image')}} <small>(300x300)</small></label>
            <div class="col-md-8">
                <div class="input-group" data-toggle="aizuploader" data-type="image" required>
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                    </div>
                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                    <input type="hidden" name="thumbnail_img" class="selected-files">
                </div>
                <div class="file-preview box sm" required>
                </div>
                <small class="text-muted">{{translate('This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.')}}</small>
            </div>
        </div>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('Product Videos')}}</h5>
			</div>
			<div class="card-body">
				<div class="form-group row">
					<label class="col-md-3 col-from-label">{{translate('Video Provider')}}</label>
					<div class="col-md-8">
						<select class="form-control aiz-selectpicker" name="video_provider" id="video_provider">
							<option value="youtube">{{translate('Youtube')}}</option>
							<option value="dailymotion">{{translate('Dailymotion')}}</option>
							<option value="vimeo">{{translate('Vimeo')}}</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-from-label">{{translate('Video Link')}}</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="video_link" placeholder="{{ translate('Video Link') }}">
                        <small class="text-muted">{{translate("Use proper link without extra parameter. Don't use short share link/embeded iframe code.")}}</small>
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
					<div class="col-md-3">
						<input type="text" class="form-control" value="{{translate('Colors')}}" disabled>
					</div>
					<div class="col-md-8">
						<select class="form-control aiz-selectpicker" data-live-search="true" data-selected-text-format="count" name="colors[]" id="colors" multiple disabled>
							@foreach (\App\Color::orderBy('name', 'asc')->get() as $key => $color)
								<option  value="{{ $color->code }}" data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:{{ $color->code }}'></span><span>{{ $color->name }}</span></span>"></option>
							@endforeach
						</select>
					</div>
					<div class="col-md-1">
						<label class="aiz-switch aiz-switch-success mb-0">
							<input value="1" type="checkbox" name="colors_active">
							<span></span>
						</label>
					</div>
				</div>

				<div class="form-group row">
    				<div class="col-md-3">
    					<input type="text" class="form-control" value="{{translate('Attributes')}}" disabled>
    				</div>
		            <div class="col-md-8">
						<select name="choice_attributes[]" id="choice_attributes" class="form-control aiz-selectpicker" data-selected-text-format="count" data-live-search="true" multiple data-placeholder="{{ translate('Choose Attributes') }}">
							@foreach (\App\Attribute::all() as $key => $attribute)
							<option value="{{ $attribute->id }}">{{ $attribute->getTranslation('name') }}</option>
							@endforeach
						</select>
		            </div>
	        	</div>
				<div>
					<p>{{ translate('Choose the attributes of this product and then input values of each attribute') }}</p>
					<br>
				</div>

				<div class="customer_choice_options" id="customer_choice_options">

				</div>
			</div>
		</div>

		<!-- @if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'product_wise_shipping')
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
                                                    <select class="form-control" name="seller_shipping_id"  id="option-choice-form-selected">
                                                        <option >Select  Rate</option>

                                                        @foreach($flat_rate as $item)
                                                        <option value="{{$item->id}}" data-price="{{$item->seller_shipping_cost}}" data-type="{{$item->seller_shipping_type}}">{{$item->title}}</option>
                                                       @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" id="seller_shipping_id" name="seller_shipping_id">
                                            <input type="hidden" id="seller_shipping_type" name="shipping_type">

                                            <div class="form-group row">
                                                <label class="col-md-3 col-from-label">{{translate('Shipping cost')}}</label>
                                                <div class="col-md-8">

                                                    <input id="flat_shipping_cost" type="number" lang="en" min="0" value="0" step="0.01" placeholder="{{ translate('Shipping cost') }}" name="flat_shipping_cost" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             @endif -->

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
                                            <input onkeyup='total_calculation()' type="number" min="0" step="0.01" lang="en" placeholder="0" name="gross_weight" id="gross_weight" class="form-control" aria-label="" aria-describedby="basic-addon2" required>
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
                                        <input onkeyup='total_calculation()' type="number" lang="en" placeholder="0" name="length" id="length" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label >{{translate('Width(inch)')}}</label>
                                        <input onkeyup='total_calculation()' type="number" lang="en" placeholder="0" name="width" id="width" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>{{translate('Height(inch)')}}</label>
                                        <input onkeyup='total_calculation()' type="number" lang="en" placeholder="0" name="height" id="height" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="input-group mb-3" style="margin-top:1.6rem">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon1">=</span>
                                            </div>
                                            <input  type="number" lang="en"  placeholder="0.00" name="total_size" id="total_size" class="form-control"  readonly>
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
                                            <input type="hidden" name="total_kg" id="total_kg">
                                            <input type="hidden" name="total_cft" id="total_cft">
                                            <div class="input-group-append">
                                                <span class="input-group-text">{{translate('Tk')}}</span>
                                            </div>
                                        </div>
                                        </div>
                                </div>

                                </div>
                            </div>
                        </div>



<!--
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
                                                        <select class="form-control" name="seller_shipping_id"
                                                                id="option-choice-form-selected" required>
                                                            <option value="">Select Rate</option>

                                                            @foreach($flat_rate as $item)
                                                                <option value="{{$item->id}}"
                                                                        data-price="{{$item->seller_shipping_cost}}"
                                                                        data-type="{{$item->seller_shipping_type}}">{{$item->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="seller_shipping_id" name="seller_shipping_id">
                                                <input type="hidden" id="seller_shipping_type" name="shipping_type">


                                                <div class="form-group row" id="chang">
                                                    <label class="col-md-3 col-from-label">{{translate('Shipping cost')}}</label>
                                                    <div class="col-md-8">

                                                        <input onchange="total_mrp()" id="flat_shipping_cost"
                                                               type="number" lang="en" min="0"
                                                               value="0" step="0.01"
                                                               placeholder="{{ translate('Shipping cost') }}"
                                                               name="flat_shipping_cost" class="form-control" readonly
                                                               required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif -->


		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('Product price + stock')}}</h5>
			</div>
			<div class="card-body">
				<div class="form-group row">
					<label class="col-md-3 col-from-label">{{translate('MRP price')}} <span class="text-danger">*</span></label>
					<div class="col-md-6">
						<input onkeyup="total_mrp()" type="number" lang="en" min="0" value="0" step="0.01" placeholder="{{ translate('Unit price') }}" id="mrp" name="unit_price" class="form-control" required>
					</div>
					<!-- <div class="col-md-3">
						<input  type="number" lang="en" min="0" value="0" step="0.01" placeholder="{{ translate('Purchase price') }}" name="purchase_price" class="form-control" required>
					</div> -->
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-from-label">{{translate('Purchase price')}} <span class="text-danger">*</span></label>
					<div class="col-md-6">
						<input type="number" lang="en" min="0" step="0.01" placeholder="{{ translate('Purchase price') }}" name="purchase_price" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-from-label">{{translate('VAT.')}} <span class="text-danger">*</span></label>
					<div class="col-md-6">
						<input onkeyup="total_mrp()" type="number" lang="en" min="0" value="0" step="0.01" placeholder="{{ translate('Tax') }}" name="tax" id="tax" class="form-control" required>
					</div>
					<div class="col-md-3">
						<select onchange="total_mrp()" class="form-control aiz-selectpicker" name="tax_type" id="tax_type">
							<option value="amount">{{translate('Flat')}}</option>
							<option value="percent">{{translate('Percent')}}</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-from-label">{{translate('Discount')}} <span class="text-danger">*</span></label>
					<div class="col-md-6">
						<input onkeyup="total_mrp()" type="number" lang="en" min="0" value="0" step="0.01" placeholder="{{ translate('Discount') }}" name="discount" id="discount" class="form-control">
					</div>
					<div class="col-md-3">
						<select onchange="total_mrp()" class="form-control aiz-selectpicker" name="discount_type" id="discount_type">
							<option value="amount">{{translate('Flat')}}</option>
							<option value="percent">{{translate('Percent')}}</option>
						</select>
					</div>
				</div>
				<div class="form-group row" id="quantity">
					<label class="col-md-3 col-from-label">{{translate('Available Stock')}} <span class="text-danger">*</span></label>
					<div class="col-md-6">
						<input type="number" lang="en" min="0" step="1" value="0" placeholder="{{ translate('Quantity') }}" name="current_stock" class="form-control" required>
					</div>
				</div>
				<br>

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

				<div class="sku_combination" id="sku_combination">

				</div>
			</div>
		</div>


		 <!--Payment Type -->
                            <div class="card" >
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{translate('Payment Type')}}</h5>
                                </div>
                                <div class="card-body" style="padding: 20px 42px;">

                                    <div class="form-group row">
                                        <div class="form-check">
                                            <input class="form-check-input" value="2" type="radio" name="payment_type"
                                                   id="flexRadioDefault1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Cash On Delivery Payment
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <div class="form-check">
                                            <input class="form-check-input" value="2" type="radio" name="payment_type"
                                                   id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Advance Payment
                                            </label>
                                        </div>
                                        <br>
                                    </div>


                                </div>
                            </div>

                         <!--End Payment Type -->



							<div class="card">
								<div class="card-header">
									<h5 class="mb-0 h6">{{translate('Product Description')}}</h5>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<label class="col-md-3 col-from-label">{{translate('Description')}}</label>
										<div class="col-md-8">
											<textarea class="aiz-text-editor" name="description"></textarea>
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
                                            <textarea class="aiz-text-editor" name="special_feature"></textarea>
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
                                            <textarea class="aiz-text-editor" name="specification"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Faq Start -->

         <div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('FAQ') }}</h6>
			</div>
			<div class="card-body">

					<div class="form-group">
						<label>{{ translate('Question & Answer') }}</label>
						<div class="home-banner2-target">

						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm"
							data-toggle="add-more"
							data-content='
							<div class="row gutters-5">
								<div class="col">
									<div class="form-group">

										<input type="text" class="form-control" placeholder="Input your question here" name="question[]">
									</div>
								</div>
								<div class="col">
									<div class="form-group">

										<input type="text" class="form-control" placeholder="Input your answer here" name="answer[]">
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

                            <!-- Faq End -->



		<!-- <div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('PDF Specification')}}</h5>
			</div>
			<div class="card-body">
              <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('PDF Specification')}}</label>
                  <div class="col-md-8">
                      <div class="input-group" data-toggle="aizuploader" data-type="document">
                          <div class="input-group-prepend">
                              <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                          </div>
                          <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                          <input type="hidden" name="pdf" class="selected-files">
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
					<label class="col-md-3 col-from-label">{{translate('Meta Title')}}</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="meta_title" placeholder="{{ translate('Meta Title') }}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 col-from-label">{{translate('Description')}}</label>
					<div class="col-md-8">
						<textarea name="meta_description" rows="8" class="form-control"></textarea>
					</div>
				</div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="signinSrEmail">{{ translate('Meta Image') }}</label>
                    <div class="col-md-8">
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                            </div>
                            <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                            <input type="hidden" name="meta_img" class="selected-files">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<div class="mb-3 text-right">
			<button type="submit" name="button" class="btn btn-primary">{{ translate('Save Product') }}</button>
		</div>
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

	$('input[name="unit_price"]').on('keyup', function() {
	    update_sku();
	});

	$('input[name="name"]').on('keyup', function() {
	    update_sku();
	});

	function delete_row(em){
		$(em).closest('.form-group row').remove();
		update_sku();
	}

    function delete_variant(em){
		$(em).closest('.variant').remove();
	}

	function update_sku(){
		$.ajax({
		   type:"POST",
		   url:'{{ route('products.sku_combination') }}',
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

	$('#choice_attributes').on('change', function() {
		$('#customer_choice_options').html(null);
		$.each($("#choice_attributes option:selected"), function(){
            add_more_customer_choice_option($(this).val(), $(this).text());
        });
		update_sku();
	});


	$(document).ready(function() {
		$( "#option-choice-form-selected" ).change(function() {
			var shipping_method = $('#option-choice-form-selected').val();
			if(shipping_method==1){
				$('#chang').hide();
			}else{
				$('#chang').show();
			}
		});
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


function total_mrp() {


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


}


</script>




<script>
$(document).ready(function(){
 $("#custom_product_slug").on('focusout',function(){
    var that =$(this);
    var url="{{ route('products.custom_slug_check') }}"
    var slug= that.val();

    $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            cache: false,
            data:{
                slug:slug
            }
            })
            .done(function(data) {
                console.log(data.mySlug);
                if(data.status){
                    that.val(data.mySlug);
                    that.removeClass("is-valid");
                    that.addClass("is-invalid")
                    $(".savesfkj").attr('disabled',true)
                }else{
                    that.val(data.mySlug);
                    that.removeClass("is-invalid");
                    that.addClass("is-valid");
                    $(".savesfkj").attr('disabled',false)
                }
            });
 });
});
</script>

@endsection
