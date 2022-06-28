@extends('backend.layouts.app')

@section('content')

    <div class="col-lg-12  mx-auto">
        <div class="card">
            {{-- <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Advertisment Containers Edit')}}</h5>
            </div> --}}
            <div class="card-body">
                @include('alerts.alerts')
                <form class="form-horizontal" action="{{ route('advertisement_containers_post.update') }}" method="POST" enctype="multipart/form-data">

                	@csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Device *')}}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="exampleFormControlSelect1" required name="device">
                                <option value="mobile" {{$ad->device=="mobile"? "selected":"" }}>Mobile</option>
                                <option value="desktop" {{$ad->device=="desktop"? "selected":"" }}>Desktop</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Place *')}}</label>
                        <div class="col-sm-9">
                            <input type="hidden" value="{{$ad->id}}" name="containerId">
                            <select class="form-control" id="" required name="place">
                                <option value="top" {{$ad->place=="top"? "selected":"" }}>Top</option>
                                <option value="after_category_app_buttons" {{$ad->place=="after_category_app_buttons"? "selected":"" }}>After Category App Buttons</option>
                                <option value="after_daily_deal_buttons" {{$ad->place=="after_daily_deal_buttons"? "selected":"" }}>After Daily Deal Buttons</option>
                                <option value="after_best_sell_products_buttons" {{$ad->place=="after_best_sell_products_buttons"? "selected":"" }}>After Best Sell Products Buttons</option>
                                <option value="after_upcoming_products_buttons" {{$ad->place=="after_upcoming_products_buttons"? "selected":"" }}>After Upcoming Products Buttons</option>
                                <option value="after_new_products_buttons" {{$ad->place=="after_new_products_buttons"? "selected":"" }}>After New Products Buttons</option>
                                <option value="after_top_rank_products_buttons" {{$ad->place=="after_top_rank_products_buttons"? "selected":"" }}>After Top Rank Products Buttons</option>
                                <option value="after_populer_products_buttons" {{$ad->place=="after_populer_products_buttons"? "selected":"" }}>After Populer Products Buttons</option>
                                <option value="after_top_brands_products_buttons" {{$ad->place=="after_top_brands_products_buttons"? "selected":"" }}>After Top Brands Products Buttons</option>

                                <option value="in_category_app_buttons" {{$ad->place=="in_category_app_buttons"? "selected":"" }}>in Category App Buttons</option>
                                <option value="in_daily_deal_buttons" {{$ad->place=="in_daily_deal_buttons"? "selected":"" }}>in Daily Deal Buttons</option>
                                <option value="in_best_sell_products_buttons" {{$ad->place=="in_best_sell_products_buttons"? "selected":"" }}>in Best Sell Products Buttons</option>
                                <option value="in_upcoming_products_buttons" {{$ad->place=="in_upcoming_products_buttons"? "selected":"" }}>in Upcoming Products Buttons</option>
                                <option value="in_new_products_buttons" {{$ad->place=="in_new_products_buttons"? "selected":"" }}>in New Products Buttons</option>
                                <option value="in_top_rank_products_buttons" {{$ad->place=="in_top_rank_products_buttons"? "selected":"" }}>in Top Rank Products Buttons</option>
                                <option value="in_populer_products_buttons" {{$ad->place=="in_populer_products_buttons"? "selected":"" }}>in Populer Products Buttons</option>
                                <option value="in_top_brands_products_buttons" {{$ad->place=="in_top_brands_products_buttons"? "selected":"" }}>in Top Brands Products Buttons</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Page *')}}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="exampleFormControlSelect1" required name="page">
                                <option value="home_page" {{$ad->page=="home_page"? "selected":"" }}>Home Page</option>
                                <option value="product_details" {{$ad->page=="product_details"? "selected":"" }}>Product Details</option>
                                <option value="category" {{$ad->page=="category"? "selected":"" }}>Category</option>
                                <option value="subcategory" {{$ad->page=="subcategory"? "selected":"" }}>Subcategory</option>
                                <option value="sub_subcategroy" {{$ad->page=="sub_subcategroy"? "selected":"" }}>Subsubcategory</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Position *')}}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="exampleFormControlSelect1" required name="position">
                                <option value="left" {{$ad->position=="left" ? "selected":"" }}>Left</option>
                                <option value="right" {{$ad->position=="right" ? "selected":"" }}>Right</option>
                                <option value="center"  {{$ad->position=="center" ? "selected":"" }}>Center</option>
                                <option value="top_center" {{$ad->position=="top_center" ? "selected":"" }}>Top Center</option>
                                <option value="top_left"  {{$ad->position=="top_left" ? "selected":"" }}>Top Left</option>
                                <option value="top_right" {{$ad->position=="top_right" ? "selected":"" }}>Top Right</option>
                                <option value="bottom_left" {{$ad->position=="bottom_left" ? "selected":"" }}>Bottom Left</option>
                                <option value="bottom_right" {{$ad->position=="bottom_right" ? "selected":"" }}>Bottom Right</option>
                                <option value="bottom_center"{{$ad->position=="bottom_center" ? "selected":"" }} >Bottom Center</option>
                                <option value="full_weight" {{$ad->position=="full_weight" ? "selected":"" }}>Full Weight</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Container_item_count *')}}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="exampleFormControlSelect1" required name="container_item_count">
                                <option value="1" {{$ad->container_item_count=="1" ? "selected":"" }}>1</option>
                                <option value="2" {{$ad->container_item_count=="2" ? "selected":"" }}>2</option>
                                <option value="3" {{$ad->container_item_count=="3" ? "selected":"" }}>3</option>
                                <option value="4" {{$ad->container_item_count=="4" ? "selected":"" }}>4</option>
                                <option value="6" {{$ad->container_item_count=="6" ? "selected":"" }}>6</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Description ')}}</label>
                        <div class="col-sm-9">
                            <textarea name="" id=""  rows="5" class="form-control" name="description">{!! $ad->description!!}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Active *')}}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="exampleFormControlSelect1" required name="active">
                                <option value="1" {{$ad->active=="1" ? "selected":"" }}>Active</option>
                                <option value="0"  {{$ad->active=="0" ? "selected":"" }}>Deactive</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">{{translate('Update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
