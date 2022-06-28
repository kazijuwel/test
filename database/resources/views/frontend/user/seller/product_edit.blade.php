@extends('frontend.layouts.app')

@section('content')


    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-start">
                @include('frontend.inc.user_side_nav')

                <div class="aiz-user-panel">

                    <div class="aiz-titlebar mt-2 mb-4">
                      <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1 class="h3">{{ translate('Update your product') }}</h1>
                        </div>
                      </div>
                    </div>

                    <form class="" action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data" id="choice_form">
                        <input name="_method" type="hidden" value="POST">
                        <input type="hidden" name="lang" value="{{ $lang }}">
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        @csrf
                		<input type="hidden" name="added_by" value="seller">
                        <div class="card">
                            <ul class="nav nav-tabs nav-fill border-light">
                                @foreach (\App\Language::all() as $key => $language)
                                    <li class="nav-item">
                                        <a class="nav-link text-reset @if ($language->code == $lang) active @else bg-soft-dark border-light border-left-0 @endif py-3" href="{{ route('seller.products.edit', ['id'=>$product->id, 'lang'=> $language->code] ) }}">
                                            <img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
                                            <span>{{$language->name}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label">{{translate('Product Name')}}</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="name" placeholder="{{translate('Product Name')}}" value="{{$product->getTranslation('name')}}" required>
                                    </div>
                                </div>
                                <div class="form-group row" id="category">
                                    <label class="col-lg-3 col-from-label">{{translate('Category')}}</label>
                                    <div class="col-lg-8">
                                        <select class="form-control aiz-selectpicker" name="category_id" id="category_id" onchange="get_commission()" data-selected={{ $product->category_id }} required>
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
                                        <select class="form-control aiz-selectpicker" name="brand_id" id="brand_id">
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
                                    <label class="col-lg-3 col-from-label">{{translate('Unit')}}</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="unit" placeholder="{{ translate('Unit (e.g. KG, Pc etc)') }}" value="{{$product->getTranslation('unit')}}" required>
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
                                    <h5 class="mb-0 h6">{{translate('Additional Information')}}</h5>
                                </div>
                                <div class="card-body">
                                  
                                  <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Authenticity')}}</label>
                                        <div class="col-md-8">
                                            <select class="form-control aiz-selectpicker" name="authenticity">
                                                <option value="100% Genuine Product" {{ $product->authenticity == '100% Genuine Product' ? 'selected':'' }}>100% Genuine Product</option>
                                                <option value="Branded Product" {{ $product->authenticity == 'Branded Product' ? 'selected':'' }}>Branded Product</option>
                                                <option value="Brand New Product" {{ $product->authenticity == 'Brand New Product' ? 'selected':'' }}>Brand New Product</option>
                                                <option value="Reconditioned Product" {{ $product->authenticity == 'Reconditioned Product' ? 'selected':'' }}>Reconditioned Product</option>
                                                <option value="Used Product" {{ $product->authenticity == 'Used Product' ? 'selected':'' }}>Used Product</option>
                                                <option value="Old Product" {{ $product->authenticity == 'Old Product' ? 'selected':'' }}>Old Product</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Country of Origin')}}</label>
                                        <div class="col-md-8">
                                            <select class="form-control aiz-selectpicker" name="product_origin_country"
                                                    data-live-search="true">
                                                <option value="">{{ ('Select Country') }}</option>
                                                @foreach (\App\Country::all() as $country)
                                                    <option value="{{ $country->name }}" @if($product->product_origin_country == $country->name) selected @endif>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Country of Assemble')}}</label>
                                        <div class="col-md-8">
                                            <select class="form-control aiz-selectpicker" name="product_assemble_country"
                                                    data-live-search="true">
                                                <option value="">{{ ('Select Country') }}</option>
                                                @foreach (\App\Country::all() as $country)
                                                    <option value="{{ $country->name }}" @if($product->product_assemble_country == $country->name) selected @endif>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Product License / Certification</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="product_license"
                                                   placeholder="Product License / Certification" value="{{$product->product_license}}">
                                        </div>
                                    </div>
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
                                        <select name="choice_attributes[]" data-live-search="true" data-selected-text-format="count" id="choice_attributes" class="form-control aiz-selectpicker" multiple data-placeholder="{{ translate('Choose Attributes') }}">
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
                                        <input onkeyup='total_calculation()' type="number" lang="en"  placeholder="0" name="length" id="length" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label >{{translate('Width(inch)')}}</label>
                                        <input onkeyup='total_calculation()' type="number" lang="en"  placeholder="0" name="width" id="width" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>{{translate('Height(inch)')}}</label>
                                        <input onkeyup='total_calculation()' type="number" lang="en" placeholder="0" name="height" id="height" class="form-control">
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
                            {{-- <div class="card-header">
                                <h5 class="mb-0 h6">{{translate('Product price + stock')}}</h5>
                            </div> --}}                            
                            <div class="card-header">
                                <h5 class="mb-0 h6">{{translate('stock')}}</h5>
                            </div>

                            <div class="card-body">
                                {{-- <div class="form-group row">
                                            <label class="col-md-3 col-from-label">{{translate('MRP price')}}</label>
                                            <div class="col-md-6">
                                                <input onkeyup="total_mrp()" type="number" lang="en" min="0"
                                                    step="0.01" placeholder="{{ translate('Unit price') }}"
                                                    name="unit_price" id="mrp" class="form-control" value="{{$product->unit_price}}" required>
                                            </div>
                                            <!-- <div class="col-md-3">
                                                <input type="number" lang="en" min="0" step="0.01"
                                                    placeholder="{{ translate('Purchase price (Optional)') }}" name="purchase_price"
                                                    class="form-control" value="{{$product->purchase_price}}" required>
                                            </div> -->
                                </div> --}}

                                {{-- <div class="form-group row">
                                            <label class="col-md-3 col-from-label">{{translate('Purchase price')}}</label>
                                           
                                            <div class="col-md-6">
                                                <input type="number" lang="en" min="0" step="0.01"
                                                    placeholder="{{ translate('Purchase price (Optional)') }}" name="purchase_price"
                                                    class="form-control" value="{{$product->purchase_price}}" required>
                                            </div>
                                </div> --}}


                                {{-- <div class="form-group row">
                                    <label class="col-lg-3 col-from-label">{{translate('VAT.')}}</label>
                                    <div class="col-lg-6">
                                        <input onkeyup="total_mrp()" type="number" lang="en" id="tax" min="0" step="0.01" placeholder="{{translate('tax')}}" name="tax" class="form-control" value="{{$product->tax}}" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <select onchange="total_mrp()" id="tax_type" class="form-control aiz-selectpicker" data-selected={{ $product->tax_type }} name="tax_type" required>
                                            <option value="amount"  >{{translate('Flat')}}</option>
                                            <option value="percent"  >{{translate('Percent')}}</option>
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-group row">
                                    <label class="col-lg-3 col-from-label">{{translate('Discount')}}</label>
                                    <div class="col-lg-6">
                                        <input onkeyup="total_mrp()" type="number" lang="en" min="0" step="0.01" placeholder="{{translate('Discount')}}" name="discount" id="discount" class="form-control" value="{{ $product->discount }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <select onchange="total_mrp()" class="form-control aiz-selectpicker" data-selected={{ $product->discount_type }} id="discount_type" name="discount_type" required>
                                            <option value="amount">{{translate('Flat')}}</option>
                                            <option value="percent" >{{translate('Percent')}}</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="form-group row" id="quantity">
                                    <label class="col-lg-3 col-from-label">{{translate('Available Stock')}}</label>
                                    <div class="col-lg-6">
                                        <input type="number" lang="en" value="{{ $product->current_stock }}" step="1" placeholder="{{translate('Quantity')}}" name="current_stock" class="form-control" required>
                                    </div>
                                </div>

                                {{-- <div class="form-group row" id="commision">
                                        <label class="col-md-3 col-from-label">{{translate('Commision(%)')}}</label>
                                        <div class="col-md-6">
                                            <input type="number" placeholder="0" value="" name="commision"
                                                   id="commision_rate" class="form-control" readonly>
                                        </div>
                                    </div> --}}
                                    <br>

                                    {{-- <div>
                                    <h5 style="text-align: center;" class="mb-0 h6">{{translate('(Price Show to the Visitor)')}}</h5>
                                    </div> --}}
                                    {{-- <hr> --}}
                                    {{-- <div class="form-group row" id="add_fields_placeholderValue" style="display:none">
                                        <label class="col-md-3 col-from-label" style="color: #F16522">{{translate('With Discount')}}</label>
                                        <div class="col-md-6">
                                            <input type="number" placeholder="0" value="" name="with_discount"
                                                   id="with_discount" class="form-control" readonly>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="form-group row" id="commision">
                                        <label class="col-md-3 col-from-label">{{translate('Without Discount')}}</label>
                                        <div class="col-md-6">
                                            <input type="number" placeholder="0" value="" name="without_discount"
                                                   id="without_discount" class="form-control" readonly>
                                        </div>
                                    </div> --}}
                                <br>
                                <div class="sku_combination" id="sku_combination">

                                </div>
                            </div>
                        </div>

                        <!-- warranty start -->

                        <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{translate('Product Warranty')}}</h5>
                                </div>
                    <div class="card-body">
                
                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">{{translate('No Warranty')}}</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="is_warranty" value="0" @if($product->is_warranty ==
                            '0') checked @endif>
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">{{translate('Product Warranty')}}</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="is_warranty" value="1" @if($product->is_warranty ==
                            '1') checked @endif>
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="warranty_div" style="display: none">
                        <div class="form-group row">
                           
                                    <label class="col-md-6 col-from-label"></label>
                                    <div class="form-group col-md-3">
                                        <label>{{translate('Warranty Duration')}}</label>
                                        <div class="input-group mb-3">
                                            <input type="number" lang="en" min="0" value="{{ $product->warranty_days }}" step="0.01"
                                    placeholder="{{ translate('Number of days') }}" name="warranty_duration"
                                    class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">{{translate('Days')}}</span>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">{{translate('Parts Warranty')}}</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="parts_warranty_switch(this)" name="parts_warranty" type="checkbox" @if ($product->parts_warranty == 1) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                  
                    <div class="parts_warranty_div">
                    <div class="form-group">
                        <label>{{ translate('Parts Name & Duration') }}</label>
                        <div class="home-banner2-target">   

                        @foreach ($product->product_parts_warranty as $value)
                                    <div class="row gutters-5">
                                        <div class="col">
                                            <div class="form-group">
                                                
                                               <input type="text" class="form-control" placeholder="Parts Name" value="{{$value->parts_name}}" name="parts_name[]">
                                            </div>
                                            
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                
                                                <input type="text" class="form-control" placeholder="Warranty Days" value="{{$value->warranty_days}}" name="warranty_days[]">
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
                                <div class="col">
                                    <div class="form-group">
                                        
                                        <input type="text" class="form-control" placeholder="Parts Name" name="parts_name[]">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        
                                        <input type="text" class="form-control" placeholder="Warranty Days" name="warranty_days[]">
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
                </div>

                        {{-- @if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'product_wise_shipping')
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



                                                    <select onchange="put_shipping_cost()" disabled class="form-control" name="seller_shipping_id"  id="shipping_option" readonly>



                                                    @foreach ($flat_rate as $item)

                                                        <option data-price="{{$item->seller_shipping_cost}}" data-type="{{$item->seller_shipping_type}}" value="{{ $item->id }}" {{ ( $item->id == $product->seller_shipping_id) ? 'selected' : '' }}>
                                                        {{$item->title}}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <input type="hidden" id="seller_shipping_id" name="seller_shipping_id"> -->
                                            <input type="hidden" id="seller_shipping_type" value="flat_rate" name="shipping_type">

                                            <div class="form-group row">
                                                <label class="col-md-3 col-from-label">{{translate('Shipping cost')}}</label>
                                                <div class="col-md-8">

                                                    <input onkeyup="total_mrp()"  id="flat_shipping_cost" type="number" lang="en" min="0" value="{{ $product->shipping_cost }}" step="0.01" placeholder="" name="flat_shipping_cost" class="form-control" required readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             @endif --}}

            <?php
            $type_name = 0;

            if ($product->payment_type == 1) {
            $type_name = 'Payment after Successful delivery';

            }
            if ($product->payment_type == 2) {
            $type_name = 'Advance Payment';

            }
            ?>

            <div class="card" >
            <!-- <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Payment Type')}}<span style="font-style: italic; color: #7ab32f">: {{$type_name}} </span> </h5>
            </div> -->
            {{-- <div class="card-body">
                    <input type="hidden" name="type" value="shipping_type">
                    <div class="radio mar-btm">
                        <input id="" class="magic-radio" type="radio" name="payment_type" value="1" {{ ($product->payment_type=="1")? "checked" : "" }}>
                        <label for="">
                            <span>{{translate('Payment after Successful delivery')}}</span>
                            <span></span>
                        </label>
                    </div>
                    <div class="radio mar-btm">
                        <input id="" class="magic-radio" type="radio" name="payment_type" value="2"{{ ($product->payment_type=="2")? "checked" : "" }}>
                        <label for="">{{translate('Advance Payment')}}</label>
                    </div>
            </div> --}}
        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">{{translate('Product Description')}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">{{translate('Description')}}</label>
                                    <div class="col-md-8">
                                        <textarea class="aiz-text-editor" name="description">{{$product->getTranslation('description')}}</textarea>
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


                       <!--  <div class="card">
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
                                    <label class="col-lg-3 col-form-label">{{translate('Slug')}}</label>
                                    <div class="col-lg-8">
                                        <input type="text" placeholder="{{translate('Slug')}}" id="slug" name="slug" value="{{ $product->slug }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mar-all text-right">
                            <button type="submit" name="button" class="btn btn-primary">{{ translate('Update Product') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">

     $(document).ready(function (){
        show_hide_warranty_div();
    });

    $("[name=is_warranty]").on("change", function (){
        show_hide_warranty_div();
    });

    function show_hide_warranty_div() {
        var warranty_val = $("[name=is_warranty]:checked").val();
        $(".warranty_div").hide();
        if(warranty_val == '1'){
            $(".warranty_div").show();
        }
    }

    function parts_warranty_switch(el) {
            if (el.checked) {
                $(".parts_warranty_div").show();
            }
            else {
                $(".parts_warranty_div").hide(); 
            }

        }

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

        // function put_shipping_cost(){
        //     var shipping_cost = $('#shipping_option option:selected').attr('data-type');
        // if(shipping_cost=="free"){
        //     $('#flat_shipping_cost').val("0");
        //     $('#chang').hide();
        // }else{
        //     $('#chang').show();
        //     $('#flat_shipping_cost').val("0");
        // }
        //     total_mrp();
        // }
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



           var unit_price_commission = ((unit_price + unit_price_tax)*commission) /100;
           var discount_price_commission = (((unit_price - discount_price) + discount_price_tax)*commission) /100;



var total_unit_price = unit_price + unit_price_tax + unit_price_commission +(+flat_shipping_cost);
var total_discount_price = (unit_price - discount_price) + discount_price_tax + discount_price_commission +(+flat_shipping_cost);

            return {unit_price_commission: parseFloat(total_unit_price), discount_price_commission: parseFloat(total_discount_price)};



            //console.log(calculate_price_array);
            //console.log(calculate_tax_array);


        }


        function total_mrp() {


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
        function total_mrp_not_use() {


            var mrp = "";
            var tax = "";
            var tax_type = "";
            var discount = 0;
            var discount_type = "";
            var delivery_cost = "";
            var commission = "";
            var flat_shipping_cost = "";

            mrp = $('#mrp').val();
            tax = $('#tax').val();
            tax_type = $('#tax_type').val();
            discount = $('#discount').val();
            discount_type = $('#discount_type').val();
            delivery_cost = $('#delivery_price').val();
            commission = $('#commision_rate').val();
            flat_shipping_cost = $('#flat_shipping_cost').val();
            var discount_commission = 0;
            var without_discount_commission = 0;
            var discount_price = 0;
            var unit_discount_price = 0;

            var discount_price_tax = 0;
            var unit_price_tax = 0;


            if (discount_type == "percent") {
                discount_price = (mrp * discount) / 100;

            }else{
                discount_price= discount;
            }


            if(discount != 0){

                unit_discount_price = (mrp - discount_price);


            }


            if(discount != 0){
                if (tax_type == "percent") {
                    discount_price_tax = (unit_discount_price * tax) / 100;

                }
                if (tax_type == "percent") {
                    tax = (mrp * tax) / 100;
                }

            }else{
                if (tax_type == "percent") {
                    tax = (mrp * tax) / 100;
                }
            }



            if(commission){
                if(discount != 0){
                    discount_commission = (((+unit_discount_price) + (+discount_price_tax)) * commission) / 100;

                    unit_price_tax =  (+mrp) + (+tax);
                    without_discount_commission = (unit_price_tax * commission) / 100;
                }
                else{
                    unit_price_tax =  (+mrp) + (+tax);
                    without_discount_commission = (unit_price_tax * commission) / 100;
                }


            }



            if (discount != 0) {
                var with_discount = (+unit_discount_price) + (+discount_price_tax) + (+discount_commission) + (+flat_shipping_cost);
                $('#with_discount').val(with_discount.toFixed(0));
                $("#add_fields_placeholderValue").show();
            } else {
                $('#with_discount').val(0);
                $("#add_fields_placeholderValue").hide();
            }
            if(discount != 0){
                var with_out_discount = (+mrp) + (+tax) + (+without_discount_commission) + (+flat_shipping_cost);
            }else {
                var with_out_discount = (+mrp) + (+tax) + (+without_discount_commission) + (+flat_shipping_cost);
            }



            $('#without_discount').val(with_out_discount.toFixed(0));


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

        $(document).ready(function() {
            setTimeout(function() {

                get_commission();
                put_shipping_cost();
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

    </script>
@endsection
