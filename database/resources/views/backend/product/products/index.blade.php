@extends('backend.layouts.app')

@section('content')

    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">{{translate('All products')}}</h1>
            </div>
            @if($type != 'Seller')
                <div class="col-md-6 text-md-right">
                    <a href="{{ route('products.create') }}" class="btn btn-circle btn-info">
                        <span>{{translate('Add New Product')}}</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
    <br>

    <div class="card">
        <form class="" id="sort_products" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('All Product') }}</h5>
                </div>
                @if($type == 'Seller')
                    <div class="col-md-2 ml-auto">
                        <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" id="user_id"
                                name="user_id" onchange="sort_products()">
                            <option value="">{{ translate('All Sellers') }}</option>
                            @foreach (App\Seller::all() as $key => $seller)
                                @if ($seller->user != null && $seller->user->shop != null)
                                    <option value="{{ $seller->user->id }}"
                                            @if ($seller->user->id == $seller_id) selected @endif>{{ $seller->user->shop->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                @endif

                @if($type == 'All')
                    <div class="col-md-2 ml-auto">
                        <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" id="user_id"
                                name="user_id" onchange="sort_products()">
                            <option value="">{{ translate('All Sellers') }}</option>
                            @foreach (App\Seller::all() as $key => $seller)
                                @if ($seller->user != null && $seller->user->shop != null)
                                    <option value="{{ $seller->user->id }}"
                                            @if ($seller->user->id == $seller_id) selected @endif>{{ $seller->user->shop->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="col-md-2 ml-auto">
                    <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" id="category_id" 
                    name="category_id" onchange="sort_products()">
                            <option value="">{{ translate('Category') }}</option>
                            @foreach (App\Category::all() as $key => $categories)
                                <option value="{{ $categories->id }}" @if ($categories->id == $product_category_id) selected @endif>{{ $categories->name }}
                                </option>
                            @endforeach
                    </select>
                </div>
                
               

                <div class="col-md-2 ml-auto">
                    <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" name="type" id="type"
                            onchange="sort_products()">
                        <option value="">{{ translate('Sort By') }}</option>
                        <option value="rating,desc"
                                @isset($col_name , $query) @if($col_name == 'rating' && $query == 'desc') selected @endif @endisset>{{translate('Rating (High > Low)')}}</option>
                        <option value="rating,asc"
                                @isset($col_name , $query) @if($col_name == 'rating' && $query == 'asc') selected @endif @endisset>{{translate('Rating (Low > High)')}}</option>
                        <option value="num_of_sale,desc"
                                @isset($col_name , $query) @if($col_name == 'num_of_sale' && $query == 'desc') selected @endif @endisset>{{translate('Num of Sale (High > Low)')}}</option>
                        <option value="num_of_sale,asc"
                                @isset($col_name , $query) @if($col_name == 'num_of_sale' && $query == 'asc') selected @endif @endisset>{{translate('Num of Sale (Low > High)')}}</option>
                        <option value="unit_price,desc"
                                @isset($col_name , $query) @if($col_name == 'unit_price' && $query == 'desc') selected @endif @endisset>{{translate('Base Price (High > Low)')}}</option>
                        <option value="unit_price,asc"
                                @isset($col_name , $query) @if($col_name == 'unit_price' && $query == 'asc') selected @endif @endisset>{{translate('Base Price (Low > High)')}}</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control form-control-sm" id="search" name="search"
                               @isset($sort_search) value="{{ $sort_search }}"
                               @endisset placeholder="{{ translate('Type & Enter') }}">
                    </div>
                </div>
            </div>
            </form>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table aiz-table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 30%">{{translate('Name')}}</th>
                            @if($type == 'Seller' || $type == 'All')
                                <th>{{translate('Added By')}}</th>
                            @endif
    
                            <th>{{translate('Weight/Dimension')}}</th>
                            <th>{{translate('Purchase Amount')}}</th>
                            <th>{{translate('MRP')}}</th>
                            <th>{{translate('Sells Amount')}}</th>
                            <th>{{translate('Total Stock')}}</th>
    
                            <th>{{translate('Daily Deal')}}</th>
                            <th>{{translate('Rating')}}</th>
                            <th>{{translate('Published')}}</th>
                        <!-- <th>{{translate('Admin Approval')}}</th> -->
                            <th>{{translate('Best Selling')}}</th>
                            <th>{{translate('Upcoming')}}</th>
                            <th>{{translate('Pre Order')}}</th>
                            <th class="text-right">{{translate('Options')}}</th>
                        </tr>
                        </thead>
                        <tbody>
    
                        @foreach($products as $key => $product)
                            @php
                                $price_discount = 0;
                                $product_commision_rate = 0;
                                $price_tax = 0;
                            $price_without_tax = 0;
                            $product_commision_without_rate =0;
                            @endphp
                            <tr>
                                <td>{{ ($key+1) + ($products->currentPage() - 1)*$products->perPage() }}</td>
                                <td style="width: 40%">
                                    <a href="{{ route('product', $product->slug) }}" target="_blank">
                                        <div class="form-group row">
                                            <div style="width: 50px">
                                                <img src="{{ uploaded_asset($product->thumbnail_img)}}" alt="Image"
                                                     class="w-50px">
                                            </div>
                                            <div style="width: 200px">
                                                <span class="text-muted">{{ $product->getTranslation('name') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                @if($type == 'Seller' || $type == 'All')
                                    <td>
                                        <a href="#"
                                           onclick="show_seller_profile('{{$product->user->id}}', '{{$product->user->user_type}}');">
                                           @if($product->user->user_type == 'seller')
                                            {{$product->user->shop->name}}
                                           @else
                                            {{$product->user->name}}
                                           @endif
                                        </a>
    
    
                                    </td>
                                @endif
    
                                <td>
                                    @if(isset($product->total_kg))
                                        @if($product->total_kg !=0)
                                            KG:{{ $product->total_kg }}
                                        @endif
                                    @endif
                                    @if(isset($product->total_cft))
                                        @if($product->total_cft !=0)/
                                        CFT:{{ $product->total_cft }}
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $product->purchase_price }} </td>
                                <td>{{ number_format($product->unit_price) }}</td>
    
                            @php
                            if($product->discount){
                            if($product->discount_type == 'percent'){
                            $price_discount = ($product->unit_price * $product->discount) / 100;
                            }elseif ($product->discount_type == 'amount'){
                             $price_discount = ($product->discount);
                            }
    
                            }
    
                            if($product->tax_type){
                            if ($product->tax_type == 'percent') {
    
                            $price_tax= (($product->unit_price - $price_discount) * $product->tax) / 100;
                            $price_without_tax= (($product->unit_price) * $product->tax) / 100;
                            } elseif ($product->tax_type == 'amount') {
                            $price_tax = $product->tax;
                            }
    
                            }
    
                            if(isset($product->category['commision_rate'])){
                            if($product->added_by == 'admin'){
                            $product_commision_rate = 0;
                            }else{
                            if($product->discount_type == 'percent'){
    
                            $unit_price_discount = (($product->unit_price + $price_tax) - $price_discount);
    
                            $unit_price_without_discount = (($product->unit_price + $price_without_tax));
    
                            $product_commision_rate = ( $unit_price_discount*$product->category->commision_rate)/100 ;
                            $product_commision_without_rate = ( $unit_price_without_discount*$product->category->commision_rate)/100 ;
                            }else{
    
                            $product_commision_rate = ((($product->unit_price +$price_tax) - $product->discount) *$product->category->commision_rate)/100 ;
                            $product_commision_without_rate = ((($product->unit_price +$price_without_tax)) *$product->category->commision_rate)/100 ;
                            }
    
    
                            }
    
                            }
    
                            @endphp
    
                                <td>
                                   WD: {{ ($product->unit_price) +$price_without_tax +$product_commision_without_rate }} <br>
                                   D: {{  ($product->unit_price -$price_discount ) +$price_tax +$product_commision_rate }}
                                </td>
    
                                <td>
                                    @php
                                        $qty = 0;
                                        if($product->variant_product){
                                            foreach ($product->stocks as $key => $stock) {
                                                $qty += $stock->qty;
                                            }
                                        }
                                        else{
                                            $qty = $product->current_stock;
                                        }
                                        echo $qty;
                                    @endphp
    
                                </td>
    
                                <td>
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input onchange="update_todays_deal(this)" value="{{ $product->id }}"
                                               type="checkbox" <?php if ($product->todays_deal == 1) echo "checked";?> >
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>{{ $product->rating }}</td>
                                <td>
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input onchange="update_published(this)" value="{{ $product->id }}"
                                               type="checkbox" <?php if ($product->published == 1) echo "checked";?> >
                                        <span class="slider round"></span>
                                    </label>
                                </td>
    
                            <!-- <td>
                                <label class="aiz-switch aiz-switch-success mb-0">
                                  <input onchange="update_approval(this)" value="{{ $product->id }}" type="checkbox" <?php if ($product->admin_approved == 1) echo "checked";?> >
                                  <span class="slider round"></span>
                                </label>
                            </td> -->
    
                                <td>
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input onchange="update_featured(this,1)" value="{{ $product->id }}"
                                               type="checkbox" <?php if ($product->featured == 1) echo "checked";?> >
                                        <span class="slider round"></span>
                                    </label>
                                </td>
    
                                <td>
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input onchange="update_featured(this,4)" value="{{ $product->id }}"
                                               type="checkbox" <?php if ($product->featured == 4) echo "checked";?> >
                                        <span class="slider round"></span>
                                    </label>
                                </td>
    
                                <td>
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input onchange="update_featured(this,5)" value="{{ $product->id }}"
                                               type="checkbox" <?php if ($product->featured == 5) echo "checked";?> >
                                        <span class="slider round"></span>
                                    </label>
                                </td>
    
                                <td class="text-right">
                                    @if ($type == 'Seller')
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                           href="{{route('products.seller.edit', ['id'=>$product->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}"
                                           title="{{ translate('Edit') }}">
                                            <i class="las la-edit"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                           href="{{route('products.admin.edit', ['id'=>$product->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}"
                                           title="{{ translate('Edit') }}">
                                            <i class="las la-edit"></i>
                                        </a>
                                    @endif
                                    <a class="btn btn-soft-success btn-icon btn-circle btn-sm"
                                       href="{{route('products.duplicate', ['id'=>$product->id, 'type'=>$type]  )}}"
                                       title="{{ translate('Duplicate') }}">
                                        <i class="las la-copy"></i>
                                    </a>
                                    {{-- <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                       data-href="{{route('products.destroy', $product->id)}}"
                                       title="{{ translate('Delete') }}">
                                        <i class="las la-trash"></i>
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="aiz-pagination">
                    {{ $products->appends(request()->input())->links() }}
                </div>
            </div>
    </div>


@endsection

@section('modal')
    @include('modals.delete_modal')

    <div class="modal fade" id="profile_modal">
        <div class="modal-dialog">
            <div class="modal-content" id="profile-modal-content">

            </div>
        </div>
    </div>

@endsection


@section('script')
    <script type="text/javascript">

        function show_seller_profile(id, user_type) {
            if (user_type == 'admin') {
                alert('you are already in Admin Panel');
            }
            $.post('{{ route('sellers.profile_modal_v2') }}', {_token: '{{ @csrf_token() }}', id: id}, function (data) {
                console.log(data);
                $('#profile_modal #profile-modal-content').html(data);
                $('#profile_modal').modal('show', {backdrop: 'static'});
            });
        }

        $(document).ready(function () {
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });

        function update_todays_deal(el) {
            if (el.checked) {
                var status = 1;
            }
            else {
                var status = 0;
            }
            $.post('{{ route('products.todays_deal') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Todays Deal updated successfully') }}');
                }
                else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_published(el) {
            if (el.checked) {
                var status = 1;
            }
            else {
                var status = 0;
            }
            $.post('{{ route('products.published') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Published products updated successfully') }}');
                }
                else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_approval(el) {
            if (el.checked) {
                var status = 1;
            }
            else {
                var status = 0;
            }
            $.post('{{ route('products.approved') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Published products updated successfully') }}');
                }
                else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_featured(el, featured_status) {
            if (el.checked) {
                var status = featured_status;
            }
            else {
                var status = 0;
            }
            $.post('{{ route('products.featured') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Featured products updated successfully') }}');
                }
                else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function sort_products(el) {
            $('#sort_products').submit();
        }

    </script>
@endsection
