<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductTranslation;
use App\ProductStock;
use App\Category;
use App\Language;
use App\Faq;
use App\DelivryMethod;
use App\ProductPartsWarranty;
use Illuminate\Support\Facades\Auth;
use App\SubSubCategory;
use Session;
use ImageOptimizer;
use DB;
use Combinations;
use App\Utility\CategoryUtility;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('onlyview');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_products(Request $request)
    {
        //CoreComponentRepository::instantiateShopRepository();

        $type = 'In House';
        $col_name = null;
        $query = null;
        $sort_search = null;
        $product_category_id = null;

        $products = Product::where('added_by', 'admin');
        if ($request->has('category_id') && $request->category_id != null) {
            $products = $products->where('category_id', $request->category_id);
            $product_category_id = $request->category_id;
        }

        if ($request->type != null) {
            $var = explode(",", $request->type);
            $col_name = $var[0];
            $query = $var[1];
            $products = $products->orderBy($col_name, $query);
            $sort_type = $request->type;
        }
        if ($request->search != null) {
            $products = $products
                ->where('name', 'like', '%' . $request->search . '%');
            $sort_search = $request->search;
        }

        $products = $products->where('digital', 0)->orderBy('created_at', 'desc')->paginate(15);

        return view('backend.product.products.index', compact('products', 'type', 'col_name', 'query', 'sort_search', 'product_category_id'));
    }
    public function select2Productsearch(Request $request)
    {
        $products = Product::where('name', 'Like', "%$request->search %")->select('id', 'name')->get();
        return $products;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seller_products(Request $request)
    {
        $col_name = null;
        $query = null;
        $seller_id = null;
        $sort_search = null;
        $product_category_id = null;

        $products = Product::where('added_by', 'seller');
        if ($request->has('user_id') && $request->user_id != null) {
            $products = $products->where('user_id', $request->user_id);
            $seller_id = $request->user_id;
        }

        if ($request->has('category_id') && $request->category_id != null) {
            $products = $products->where('category_id', $request->category_id);
            $product_category_id = $request->category_id;
        }
        if ($request->search != null) {
            $products = $products
                ->where('name', 'like', '%' . $request->search . '%');
            $sort_search = $request->search;
        }
        if ($request->type != null) {
            $var = explode(",", $request->type);
            $col_name = $var[0];
            $query = $var[1];
            $products = $products->orderBy($col_name, $query);
            $sort_type = $request->type;
        }

        $products = $products->where('digital', 0)->orderBy('created_at', 'desc')->paginate(15);
        $type = 'Seller';

        return view('backend.product.products.index', compact('products', 'type', 'col_name', 'query', 'seller_id', 'sort_search', 'product_category_id'));
    }

    public function all_products(Request $request)
    {
        $col_name = null;
        $query = null;
        $seller_id = null;
        $sort_search = null;
        $product_category_id = null;
        if ($request->product) {
            $products = Product::where('id', $request->product)->paginate(15);
        } else {
            //echo '<pre>'; print_r($request->category_id); exit();

            $products = Product::orderBy('created_at', 'desc');
            if ($request->has('category_id') && $request->category_id != null) {
                $category_ids = CategoryUtility::children_ids($request->category_id);
                $category_ids[] = $request->category_id;
                $products = $products->whereIn('category_id', $category_ids);
                $product_category_id = $request->category_id;
            }

            if ($request->has('user_id') && $request->user_id != null) {
                $products = $products->where('user_id', $request->user_id);
                $seller_id = $request->user_id;
            }

            if ($request->search != null) {
                $products = $products
                    ->where('name', 'like', '%' . $request->search . '%');
                $sort_search = $request->search;
            }
            if ($request->type != null) {
                $var = explode(",", $request->type);
                $col_name = $var[0];
                $query = $var[1];
                $products = $products->orderBy($col_name, $query);
                $sort_type = $request->type;
            }

            $products = $products->paginate(15);
        }
        $type = 'All';

        return view('backend.product.products.index', compact('products', 'type', 'col_name', 'query', 'seller_id', 'sort_search', 'product_category_id'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();

        $gross_weight_info = DelivryMethod::where('id', 9)->get()->first();
        $package_size_info = DelivryMethod::where('id', 10)->get()->first();

        return view('backend.product.products.create', compact('categories', 'gross_weight_info', 'package_size_info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->delivery_free);

        // echo '<pre>'; print_r($request->all()); exit();

        $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();

        $product = new Product;
        $product->name = $request->name;
        $product->model = $request->model; //optional
        $product->slug_2           =  $request->custom_product_slug;

        $product->delivery_free = $request->delivery_free ? 1 : 0;

        $product->added_by = $request->added_by;
        if (Auth::user()->user_type == 'seller') {
            $product->user_id = Auth::user()->id;
        } else {
            $product->user_id = \App\User::where('user_type', 'admin')->first()->id;
        }
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->current_stock = $request->current_stock;
        $product->barcode = $request->barcode;

        if ($refund_request_addon != null && $refund_request_addon->activated == 1) {
            if ($request->refundable != null) {
                $product->refundable = 1;
            } else {
                $product->refundable = 0;
            }
        }
        $product->photos = $request->photos;
        $product->thumbnail_img = $request->thumbnail_img;
        $product->unit = $request->unit;
        $product->min_qty = $request->min_qty;

        $tags = array();
        if ($request->tags[0] != null) {
            foreach (json_decode($request->tags[0]) as $key => $tag) {
                array_push($tags, $tag->value);
            }
        }
        $product->tags = implode(',', $tags);

        $product->authenticity = $request->authenticity;
        $product->product_origin_country = $request->product_origin_country;
        $product->product_assemble_country = $request->product_assemble_country;
        $product->product_license = $request->product_license;

        $product->description = $request->description;
        $product->quick_overview = $request->quick_overview;
        $product->special_feature = $request->special_feature;
        $product->specification = $request->specification;
        $product->video_provider = $request->video_provider;
        $product->video_link = $request->video_link;
        $product->unit_price = $request->unit_price;
        $product->purchase_price = $request->purchase_price;
        $product->tax = $request->tax;
        $product->tax_type = $request->tax_type;
        $product->discount = $request->discount;
        $product->discount_type = $request->discount_type;
        $product->shipping_type = $request->shipping_type;

        if ($request->has('shipping_type')) {
            if ($request->shipping_type == 'free') {
                $product->shipping_cost = 0;
                $product->seller_shipping_id = $request->seller_shipping_id;
            } elseif ($request->shipping_type == 'flat_rate') {
                $product->shipping_cost = $request->flat_shipping_cost;
                $product->seller_shipping_id = $request->seller_shipping_id;
            }
        }


        if ($request->has('is_warranty')) {
            if ($request->is_warranty == '0') {
                $product->warranty_days = 0;
                $product->is_warranty = 0;
                $product->parts_warranty = 0;
            } elseif ($request->is_warranty == '1') {
                $product->is_warranty = 1;
                $product->warranty_days = $request->warranty_duration;
            }
        }

        //echo '<pre>'; print_r($request->all()); exit();

        $product->delivery_price_type = $request->delivery_price_type;
        $product->delivery_price = $request->delivery_price;
        $product->total_kg = (float)$request->total_kg;
        $product->total_cft = $request->total_cft;
        $product->payment_type = $request->payment_type;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;

        if ($request->has('meta_img')) {
            $product->meta_img = $request->meta_img;
        } else {
            $product->meta_img = $product->thumbnail_img;
        }

        if ($product->meta_title == null) {
            $product->meta_title = $product->name;
        }

        if ($product->meta_description == null) {
            $product->meta_description = strip_tags(html_entity_decode($request->quick_overview));
        }

        if ($request->hasFile('pdf')) {
            $product->pdf = $request->pdf->store('uploads/products/pdf');
        }

        $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)) . '-' . Str::random(5);

        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $product->colors = json_encode($request->colors);
        } else {
            $colors = array();
            $product->colors = json_encode($colors);
        }

        $choice_options = array();

        // dd($request->has('choice_no'));
        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;

                $item['attribute_id'] = $no;

                $data = array();

                if (json_decode($request[$str][0])) {
                    foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                        array_push($data, $eachValue->value);
                    }
                }



                $item['values'] = $data;
                array_push($choice_options, $item);
            }
        }

        if (!empty($request->choice_no)) {
            $product->attributes = json_encode($request->choice_no);
        } else {
            $product->attributes = json_encode(array());
        }

        $product->choice_options = json_encode($choice_options);


        //$variations = array();

        $product->save();

        $product_id = $product->id;

        if ($product_id and $request->has('question')) {

            $size = count(collect($request)->get('question'));

            for ($i = 0; $i < $size; $i++) {

                $requestFaq['product_id'] = $product_id;
                $requestFaq['question'] = $request->get('question')[$i];
                $requestFaq['answer'] = $request->get('answer')[$i];
                Faq::create($requestFaq);
            }
        }

        if ($request->parts_warranty == null) {

            $product->parts_warranty = 0;
        } else {

            if ($product_id and $request->has('parts_name')) {

                $size = count(collect($request)->get('parts_name'));

                for ($i = 0; $i < $size; $i++) {

                    $requestPartsWarranty['product_id'] = $product_id;
                    $requestPartsWarranty['parts_name'] = $request->get('parts_name')[$i];
                    $requestPartsWarranty['warranty_days'] = $request->get('warranty_days')[$i];
                    ProductPartsWarranty::create($requestPartsWarranty);
                }
                $product->parts_warranty = 1;
            }
        }

        //combinations start
        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $data = array();

                // dd(json_decode($request[$name][0]));
                if (json_decode($request[$name][0])) {
                    foreach (json_decode($request[$name][0]) as $key => $item) {
                        array_push($data, $item->value);
                    }
                }

                array_push($options, $data);
            }
        }

        //Generates the combinations of customer choice options
        $combinations = Combinations::makeCombinations($options);
        if ($combinations && count($combinations[0]) > 0) {
            $product->variant_product = 1;
            foreach ($combinations as $key => $combination) {
                $str = '';
                foreach ($combination as $key => $item) {
                    if ($key > 0) {
                        $str .= '-' . str_replace(' ', '', $item);
                    } else {
                        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                            $color_name = \App\Color::where('code', $item)->first()->name;
                            $str .= $color_name;
                        } else {
                            $str .= str_replace(' ', '', $item);
                        }
                    }
                }
                $product_stock = ProductStock::where('product_id', $product->id)->where('variant', $str)->first();
                if ($product_stock == null) {
                    $product_stock = new ProductStock;
                    $product_stock->product_id = $product->id;
                }

                $product_stock->variant = $str;
                $product_stock->price = $request['price_' . str_replace('.', '_', $str)];
                $product_stock->sku = $request['sku_' . str_replace('.', '_', $str)];
                $product_stock->qty = $request['qty_' . str_replace('.', '_', $str)];
                $product_stock->save();
            }
        } else {
            $product_stock = new ProductStock;
            $product_stock->product_id = $product->id;
            $product_stock->price = $request->unit_price;
            $product_stock->qty = $request->current_stock;
            $product_stock->save();
        }
        //combinations end

        $product->save();

        // Product Translations
        $product_translation = ProductTranslation::firstOrNew(['lang' => 'en', 'product_id' => $product->id]);
        $product_translation->name = $request->name;
        $product_translation->unit = $request->unit;
        $product_translation->description = $request->description;
        $product_translation->save();

        flash(translate('Product has been inserted successfully'))->success();

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff') {
            return redirect()->route('products.all');
        } else {
            if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated) {
                $seller = Auth::user()->seller;
                $seller->remaining_uploads -= 1;
                $seller->save();
            }
            return redirect()->route('seller.products');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_product_edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $lang = $request->lang;
        if (empty($lang)) {
            $lang = "en";
        }

        $tags = json_decode($product->tags);
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();

        $gross_weight_info = DelivryMethod::where('id', 9)->get()->first();
        $package_size_info = DelivryMethod::where('id', 10)->get()->first();
        return view('backend.product.products.edit', compact('product', 'categories', 'tags', 'lang', 'gross_weight_info', 'package_size_info'));
    }
    public function custom_slug_check(Request $request)
    {
        $mySlug = Str::slug($request->slug);
        $slug = Product::where('slug', $mySlug)->orwhere('slug_2', $request->slug)->first();
        if ($slug) {
            return Response()->json([
                'status' => true,
                'mySlug' => $mySlug

            ]);
        } else {
            return Response()->json([
                'status' => false,
                'mySlug' => $mySlug

            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seller_product_edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $lang = $request->lang;
        if (empty($lang)) {
            $lang = "en";
        }

        if (empty($lang)) {
            $lang = "en";
        }
        $tags = json_decode($product->tags);
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();
        $gross_weight_info = DelivryMethod::where('id', 9)->get()->first();
        $package_size_info = DelivryMethod::where('id', 10)->get()->first();
        return view('backend.product.products.edit', compact('product', 'categories', 'tags', 'lang', 'gross_weight_info', 'package_size_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->delivery_free);

        // echo "<pre>";
        // print_r($parts_all);
        // exit();

        $refund_request_addon       = \App\Addon::where('unique_identifier', 'refund_request')->first();
        $product                    = Product::findOrFail($id);
        $product->category_id       = $request->category_id;
        $product->brand_id          = $request->brand_id;
        $product->current_stock     = $request->current_stock;
        $product->barcode           = $request->barcode;
        $product->slug_2           =  $request->custom_product_slug;
        $product->published         = 0;

        $product->delivery_free     = $request->delivery_free ? 1 : 0;


        if ($refund_request_addon != null && $refund_request_addon->activated == 1) {
            if ($request->refundable != null) {
                $product->refundable = 1;
            } else {
                $product->refundable = 0;
            }
        }

        if ($request->lang == env("DEFAULT_LANGUAGE")) {
            $product->name          = $request->name;
            $product->model         = $request->model;
            $product->unit          = $request->unit;
            $product->description   = $request->description;
            $product->quick_overview = $request->quick_overview;
            $product->special_feature = $request->special_feature;
            $product->specification = $request->specification;
            $product->slug          = strtolower($request->slug);
        }

        $product->photos         = $request->photos;
        $product->thumbnail_img  = $request->thumbnail_img;
        $product->min_qty        = $request->min_qty;

        $tags = array();
        if ($request->tags[0] != null) {
            foreach (json_decode($request->tags[0]) as $key => $tag) {
                array_push($tags, $tag->value);
            }
        }
        $product->tags           = implode(',', $tags);

        $product->authenticity = $request->authenticity;
        $product->product_origin_country = $request->product_origin_country;
        $product->product_assemble_country = $request->product_assemble_country;
        $product->product_license = $request->product_license;

        $product->video_provider = $request->video_provider;
        $product->video_link     = $request->video_link;
        //
        $product->unit_price     = $request->unit_price;
        $product->purchase_price = $request->purchase_price;
        $product->tax            = $request->tax;
        $product->tax_type       = $request->tax_type;
        $product->discount       = $request->discount;
        $product->shipping_type  = $request->shipping_type;
        if ($request->has('shipping_type')) {
            if ($request->shipping_type == 'free') {
                $product->shipping_cost = 0;
                $product->seller_shipping_id = $request->seller_shipping_id;
            } elseif ($request->shipping_type == 'flat_rate') {
                $product->shipping_cost = $request->flat_shipping_cost;
                $product->seller_shipping_id = $request->seller_shipping_id;
            }
        }

        if ($request->has('is_warranty')) {
            if ($request->is_warranty == '0') {
                $product->warranty_days = 0;
                $product->is_warranty = 0;
            } elseif ($request->is_warranty == '1') {
                $product->is_warranty = 1;
                $product->warranty_days = $request->warranty_duration;
            }
        }

        $product->payment_type = $request->payment_type;
        $product->discount_type     = $request->discount_type;
        $product->meta_title        = $request->meta_title;
        $product->meta_description  = $request->meta_description;
        $product->meta_img          = $request->meta_img;

        $product->delivery_price_type = $request->delivery_price_type;
        $product->delivery_price = $request->delivery_price;
        $product->total_kg = (float)$request->total_kg;
        $product->total_cft = $request->total_cft;

        if ($product->meta_title == null) {
            $product->meta_title = $product->name;
        }

        if ($product->meta_description == null) {
            $product->meta_description = strip_tags(html_entity_decode($request->quick_overview));
        }
        $product->pdf = $request->pdf;

        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $product->colors = json_encode($request->colors);
        } else {
            $colors = array();
            $product->colors = json_encode($colors);
        }

        $choice_options = array();

        if ($request->has('choice_no')) {

            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;
                // dd($request[$str]);

                $item['attribute_id'] = $no;

                $data = array();

                if (json_decode($request[$str][0])) {
                    foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                        array_push($data, $eachValue->value);
                    }
                }


                $item['values'] = $data;
                array_push($choice_options, $item);
            }
        }

        foreach ($product->stocks as $key => $stock) {
            $stock->delete();
        }

        if (!empty($request->choice_no)) {
            $product->attributes = json_encode($request->choice_no);
        } else {
            $product->attributes = json_encode(array());
        }

        $product->choice_options = json_encode($choice_options);

        if ($request->button == 'publish') {
            $product->published = 1;
        }


        //combinations start
        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if ($request->has('choice_no')) {

            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $data = array();

                if (json_decode($request[$name][0])) {
                    foreach (json_decode($request[$name][0]) as $key => $item) {
                        array_push($data, $item->value);
                    }
                }

                array_push($options, $data);
            }
        }

        $combinations = Combinations::makeCombinations($options);

        if (!empty($combinations) && count($combinations[0]) > 0) {
            $product->variant_product = 1;
            foreach ($combinations as $key => $combination) {
                $str = '';
                foreach ($combination as $key => $item) {
                    if ($key > 0) {
                        $str .= '-' . str_replace(' ', '', $item);
                    } else {
                        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                            $color_name = \App\Color::where('code', $item)->first()->name;
                            $str .= $color_name;
                        } else {
                            $str .= str_replace(' ', '', $item);
                        }
                    }
                }

                $product_stock = ProductStock::where('product_id', $product->id)->where('variant', $str)->first();
                if ($product_stock == null) {
                    $product_stock = new ProductStock;
                    $product_stock->product_id = $product->id;
                }

                $product_stock->variant = $str;
                $product_stock->price = $request['price_' . str_replace('.', '_', $str)];
                $product_stock->sku = $request['sku_' . str_replace('.', '_', $str)];
                $product_stock->qty = $request['qty_' . str_replace('.', '_', $str)];

                $product_stock->save();
            }
        } else {
            $product_stock              = new ProductStock;
            $product_stock->product_id  = $product->id;
            $product_stock->price       = $request->unit_price;
            $product_stock->qty         = $request->current_stock;
            $product_stock->save();
        }



        if ($id and $request->has('question')) {

            Faq::where('product_id', $id)->delete();

            $size = count(collect($request)->get('question'));

            for ($i = 0; $i < $size; $i++) {

                $requestFaq['product_id'] = $id;
                $requestFaq['question'] = $request->get('question')[$i];
                $requestFaq['answer'] = $request->get('answer')[$i];
                Faq::create($requestFaq);
            }
        }
        if ($request->parts_warranty == null) {

            ProductPartsWarranty::where('product_id', $id)->delete();
            $product->parts_warranty = 0;
        } else {

            if ($id and $request->has('parts_name')) {

                ProductPartsWarranty::where('product_id', $id)->delete();

                $size = count(collect($request)->get('parts_name'));

                for ($i = 0; $i < $size; $i++) {

                    $requestPartsWarranty['product_id'] = $id;
                    $requestPartsWarranty['parts_name'] = $request->get('parts_name')[$i];
                    $requestPartsWarranty['warranty_days'] = $request->get('warranty_days')[$i];
                    ProductPartsWarranty::create($requestPartsWarranty);
                }
                $product->parts_warranty = 1;
            }
        }

        $product->save();

        // Product Translations
        $product_translation                = ProductTranslation::firstOrNew(['lang' => $request->lang, 'product_id' => $product->id]);
        $product_translation->name          = $request->name;
        $product_translation->unit          = $request->unit;
        $product_translation->description   = $request->description;
        $product_translation->save();

        flash(translate('Product has been updated successfully'))->success();

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        foreach ($product->product_translations as $key => $product_translations) {
            $product_translations->delete();
        }
        if (Product::destroy($id)) {

            flash(translate('Product has been deleted successfully'))->success();

            Artisan::call('view:clear');
            Artisan::call('cache:clear');

            if (Auth::user()->user_type == 'admin') {
                return redirect()->route('products.all');
            } else {
                return redirect()->route('seller.products');
            }
        } else {
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Duplicates the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function duplicate(Request $request, $id)
    {
        $product = Product::find($id);
        $product_new = $product->replicate();
        $product_new->slug = substr($product_new->slug, 0, -5) . Str::random(5);

        if ($product_new->save()) {
            flash(translate('Product has been duplicated successfully'))->success();
            if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff') {
                if ($request->type == 'In House')
                    return redirect()->route('products.admin');
                elseif ($request->type == 'Seller')
                    return redirect()->route('products.seller');
                elseif ($request->type == 'All')
                    return redirect()->route('products.all');
            } else {
                return redirect()->route('seller.products');
            }
        } else {
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    public function get_products_by_brand(Request $request)
    {
        $products = Product::where('brand_id', $request->brand_id)->get();
        return view('partials.product_select', compact('products'));
    }

    public function updateTodaysDeal(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->todays_deal = $request->status;
        if ($product->save()) {
            return 1;
        }
        return 0;
    }

    public function updatePublished(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->published = $request->status;

        if ($product->added_by == 'seller' && \App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated) {
            $seller = $product->user->seller;
            if ($seller->invalid_at != null && Carbon::now()->diffInDays(Carbon::parse($seller->invalid_at), false) <= 0) {
                return 0;
            }
        }

        $product->save();
        return 1;
    }

    public function updateApproved(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->admin_approved = $request->status;

        if ($product->added_by == 'seller' && \App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated) {
            $seller = $product->user->seller;
            if ($seller->invalid_at != null && Carbon::now()->diffInDays(Carbon::parse($seller->invalid_at), false) <= 0) {
                return 0;
            }
        }

        $product->save();
        return 1;
    }

    public function updateFeatured(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->featured = $request->status;
        if ($product->save()) {
            return 1;
        }
        return 0;
    }

    public function preorder(Request $request)
    {

        $product = Product::findOrFail($request->id);
        $product->pre_order = $request->status;
        if ($product->save()) {
            return 1;
        }
        return 0;
    }





    public function updateSellerFeatured(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->seller_featured = $request->status;
        if ($product->save()) {
            return 1;
        }
        return 0;
    }

    public function getCommission(Request $request)
    {
        $commision = Category::where('id', $request->category_id)->first();
        $commision_rate = $commision->commision_rate;
        return $commision_rate;
    }

    public function sku_combination(Request $request)
    {
        /* echo "<pre>";
        print_r($request->all());
        exit();*/
        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        } else {
            $colors_active = 0;
        }

        $unit_price = $request->unit_price;
        $product_name = $request->name;

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $data = array();
                foreach (json_decode($request[$name][0]) as $key => $item) {
                    array_push($data, $item->value);
                }
                array_push($options, $data);
            }
        }

        $combinations = Combinations::makeCombinations($options);
        return view('backend.product.products.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
    }

    public function sku_combination_edit(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        } else {
            $colors_active = 0;
        }

        $product_name = $request->name;
        $unit_price = $request->unit_price;

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $data = array();
                foreach (json_decode($request[$name][0]) as $key => $item) {
                    array_push($data, $item->value);
                }
                array_push($options, $data);
            }
        }

        $combinations = Combinations::makeCombinations($options);
        return view('backend.product.products.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
    }
}
