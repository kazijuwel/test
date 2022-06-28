@extends('backend.layouts.app')

@section('content')

    <div class="col-lg-12  mx-auto">
        <div class="card">
            {{-- <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Create Advertisment Container')}}</h5>
            </div> --}}
            <div class="card-body">
                @include('alerts.alerts')
                <form class="form-horizontal" action="{{ route('advertisement_containers_post') }}" method="POST" enctype="multipart/form-data">

                	@csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Device *')}}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="exampleFormControlSelect1" required name="device">
                                <option value="mobile">Mobile</option>
                                <option value="desktop">Desktop</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Place *')}}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="" required name="place">
                                <option value="top">Top</option>
                                <option value="after_category_app_buttons">After Category App Buttons</option>
                                <option value="after_daily_deal_buttons">After Daily Deal Buttons</option>
                                <option value="after_best_sell_products_buttons">After Best Sell Products Buttons</option>
                                <option value="after_upcoming_products_buttons">After Upcoming Products Buttons</option>
                                <option value="after_new_products_buttons">>After New Products Buttons</option>
                                <option value="after_top_rank_products_buttons">After Top Rank Products Buttons</option>
                                <option value="after_populer_products_buttons">After Populer Products Buttons</option>
                                <option value="after_top_brands_products_buttons">After Top Brands Products Buttons</option>

                                <option value="in_category_app_buttons">in Category App Buttons</option>
                                <option value="in_daily_deal_buttons">in Daily Deal Buttons</option>
                                <option value="in_best_sell_products_buttons">in Best Sell Products Buttons</option>
                                <option value="in_upcoming_products_buttons">in Upcoming Products Buttons</option>
                                <option value="in_new_products_buttons">>in New Products Buttons</option>
                                <option value="in_top_rank_products_buttons">in Top Rank Products Buttons</option>
                                <option value="in_populer_products_buttons">in Populer Products Buttons</option>
                                <option value="in_top_brands_products_buttons">in Top Brands Products Buttons</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Page *')}}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="exampleFormControlSelect1" required name="page">
                                <option value="home_page">Home Page</option>
                                <option value="product_details">Product Details</option>
                                <option value="category">Category</option>
                                <option value="subcategory">Subcategory</option>
                                <option value="sub_subcategroy">Subsubcategory</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Position *')}}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="exampleFormControlSelect1" required name="position">
                                <option value="left">Left</option>
                                <option value="right">Right</option>
                                <option value="center">Center</option>
                                <option value="top_center">Top Center</option>
                                <option value="top_left">Top Left</option>
                                <option value="top_right">Top Right</option>
                                <option value="bottom_left">Bottom Left</option>
                                <option value="bottom_right">Bottom Right</option>
                                <option value="bottom_center">Bottom Center</option>
                                <option value="full_weight">Full Weight</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Container_item_count *')}}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="exampleFormControlSelect1" required name="container_item_count">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>6</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Description ')}}</label>
                        <div class="col-sm-9">
                            <textarea  id=""  rows="5" class="form-control" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Active *')}}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="exampleFormControlSelect1" required name="active">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
