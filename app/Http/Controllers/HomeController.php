<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Hash;
use App\Slider;
use App\Category;
use App\FlashDeal;
use App\Brand;
use App\Product;
use App\PickupPoint;
use App\CustomerPackage;
use App\CustomerProduct;
use App\User;
use App\Seller;
use App\Shop;
use App\Color;
use App\Order;
use App\BusinessSetting;
use App\DelivryMethod;
use App\Http\Controllers\SearchController;
use ImageOptimizer;
use Cookie;
use Illuminate\Support\Str;
use App\Mail\SecondEmailVerifyMailManager;
use Mail;
use App\Utility\TranslationUtility;
use App\Utility\CategoryUtility;
use Illuminate\Auth\Events\PasswordReset;
use Jenssegers\Agent\Facades\Agent;
use App\Addon;
use App\Models\AdItem;
use App\Models\AdContainer;
use App\Models\Order as allorder;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $device;
    public function __construct()
    {
        if (!Agent::isDesktop()) {
            $this->device = 'frontend.mobile.pages';
        }
        $this->middleware('onlyview');

    }
    public function login()
    {
        if(Agent::isMobile()){
            if(Auth::check()){
                return redirect()->route('home');
            }
            return view($this->device.'.user_login');

        }else{
            if(Auth::check()){
                return redirect()->route('home');
            }
            return view('frontend.user_login');
        }

    }

    public function registration(Request $request)
    {
        if(Agent::isMobile()){
            $otp_system=Addon::where('unique_identifier', 'otp_system')->first();
            if($otp_system->activated && $otp_system != null)
            {
                $otp_stytems=true;
            }else{
                $otp_stytems=false;
            }
            $BusinessSetting1=BusinessSetting::where('type', 'google_login')->first()->value == 1;
            $BusinessSetting2=BusinessSetting::where('type', 'facebook_login')->first()->value ==1;
            $BusinessSetting3=BusinessSetting::where('type', 'twitter_login')->first()->value ==1;
            $google_recaptcha=BusinessSetting::where('type', 'google_recaptcha')->first()->value == 1;
            if($BusinessSetting1 || $BusinessSetting2 || $BusinessSetting3){
                $BusinessSetting=true;
            }else{
                $BusinessSetting=false;
            }

            if(Auth::check()){
                return redirect()->route('home');
            }
            if($request->has('referral_code')){
                Cookie::queue('referral_code', $request->referral_code, 43200);
            }
            return view($this->device.'.user_registration',compact('otp_stytems','BusinessSetting','BusinessSetting1','BusinessSetting2','BusinessSetting3','google_recaptcha'));
        }else{

           $otp_system=Addon::where('unique_identifier', 'otp_system')->first();
            if($otp_system->activated && $otp_system != null)
            {
                $otp_stytems=true;
            }else{
                $otp_stytems=false;
            }
            $BusinessSetting1=BusinessSetting::where('type', 'google_login')->first()->value == 1;
            $BusinessSetting2=BusinessSetting::where('type', 'facebook_login')->first()->value ==1;
            $BusinessSetting3=BusinessSetting::where('type', 'twitter_login')->first()->value ==1;
            $google_recaptcha=BusinessSetting::where('type', 'google_recaptcha')->first()->value == 1;
            if($BusinessSetting1 || $BusinessSetting2 || $BusinessSetting3){
                $BusinessSetting=true;
            }else{
                $BusinessSetting=false;
            }

        if(Auth::check()){
            return redirect()->route('home');
        }
        if($request->has('referral_code')){
            Cookie::queue('referral_code', $request->referral_code, 43200);
        }
        return view('frontend.user_registration');
    }
    }

    public function cart_login(Request $request)
    {
        $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->orWhere('phone', $request->email)->first();
        if($user != null){
            if(Hash::check($request->password, $user->password)){
                if($request->has('remember')){
                    auth()->login($user, true);

                }
                else{
                    auth()->login($user, false);

                }
            }
            else {
                flash(translate('Invalid email or password!'))->warning();
            }
        }
        return back();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //$this->middleware('auth');
    // }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     public function admin_dashboard()
    {
        $totalConfirmOrders=allorder::whereHas('orderDetails',function($q){
            $q->where('delivery_status','confirmed');
            })->count();
        $amountofcofirmOrder= ceil(DB::table('order_details')->where('delivery_status', '=', 'confirmed')->sum(\DB::raw('delivry_methods_charge + price ')));
        $deliveredOrders=allorder::whereHas('orderDetails',function($q){
            $q->where('delivery_status','delivered');
            })->count();

        $year= date('Y');
        $month =date('m');
        $currentYear=ceil(DB::table('order_details')->whereYear('created_at',$year)->where('payment_status', '=', 'paid')->sum(\DB::raw('delivry_methods_charge + price')));
        $currentMonth=ceil(DB::table('order_details')->whereMonth('created_at',$month)->where('payment_status', '=', 'paid')->sum(\DB::raw('delivry_methods_charge + price')));


        if (Agent::isMobile()) {
           // return view($this->device.'.dashboard');
           return view('backend.dashboard',compact('currentYear','currentMonth','deliveredOrders','amountofcofirmOrder','totalConfirmOrders'));
        }else{
        return view('backend.dashboard',compact('currentYear','currentMonth','deliveredOrders','amountofcofirmOrder','totalConfirmOrders'));

        }
    }

    /**
     * Show the customer/seller dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Agent::isMobile()) {

            if(Auth::user()->user_type == 'seller'){
                return view($this->device.'.seller.dashboard');
            }
            elseif(Auth::user()->user_type == 'customer'){
                return view($this->device.'.customer.dashboard');
            }
            else {
                // abort(404);
            return view('frontend.contact_us');
            }

            //return view($this->device.'.dashboard');
        }else{
        if(Auth::user()->user_type == 'seller'){
            return view('frontend.user.seller.dashboard');
        }
        elseif(Auth::user()->user_type == 'customer'){
            return view('frontend.user.customer.dashboard');
        }
        else {
            // abort(404);
        return view('frontend.contact_us');
        }
    }
    }

    public function profile(Request $request)
    {
        if(Agent::isMobile()){

            if(Auth::user()->user_type == 'customer'){
                return view($this->device.'.customer.profile');
            }
            elseif(Auth::user()->user_type == 'seller'){
                return view('frontend.user.seller.profile');
            }

        }else{
        if(Auth::user()->user_type == 'customer'){
            return view('frontend.user.customer.profile');
        }
        elseif(Auth::user()->user_type == 'seller'){
            return view('frontend.user.seller.profile');
        }
        }
    }

    public function customer_update_profile(Request $request)
    {
        if(env('DEMO_MODE') == 'On'){
            flash(translate('Sorry! the action is not permitted in demo '))->error();
            return back();
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->phone = $request->phone;

        if($request->new_password != null && ($request->new_password == $request->confirm_password)){
            $user->password = Hash::make($request->new_password);
        }
        $user->avatar_original = $request->photo;

        if($user->save()){
            flash(translate('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }


    public function seller_update_profile(Request $request)
    {
        if(env('DEMO_MODE') == 'On'){
            flash(translate('Sorry! the action is not permitted in demo '))->error();
            return back();
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->phone = $request->phone;
        $user->profession = $request->profession;
        $user->birth_date = $request->birth_date;

        if($request->new_password != null && ($request->new_password == $request->confirm_password)){
            $user->password = Hash::make($request->new_password);
        }
        $user->avatar_original = $request->photo;


        $seller = $user->seller;
        $seller->cash_on_delivery_status = $request->cash_on_delivery_status;
        $seller->bank_payment_status = $request->bank_payment_status;
        $seller->bkash_status = $request->bkash_status;
        $seller->nagad_status = $request->nagad_status;
        $seller->bkash = $request->bkash;
        $seller->nagad = $request->nagad;
        $seller->bank_name = $request->bank_name;
        $seller->bank_acc_name = $request->bank_acc_name;
        $seller->bank_acc_no = $request->bank_acc_no;
        $seller->bank_routing_no = $request->bank_routing_no;

        if($user->save() && $seller->save()){
            flash(translate('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }

    /**
     * Show the application frontend home.

     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $agent = new Agent();
        //  if(Agent::is('Windows')){
        //     dd(Agent::browser());
        // }else{
        //     dd("Mobile");
        // }
        //dd($this->device);
        if (Agent::isDesktop()) {
            $populerProducts=filter_products(\App\Product::where('published', 1)->orderBy('customer_seen', 'desc'))->take(7)->get();

            $topAd=AdContainer::where('device','desktop')->where('page','home_page')->where('place','top')->where('active',true)->first();
            $afterCategory=AdContainer::where('device','desktop')->where('page','home_page')->where('place','after_category_app_buttons')->where('active',true)->first();
            $dailyAd=AdContainer::where('device','desktop')->where('page','home_page')->where('place','after_daily_deal_buttons')->where('active',true)->first();
            $bestSellAd=AdContainer::where('device','desktop')->where('page','home_page')->where('place','after_best_sell_products_buttons')->where('active',true)->first();
            $upcomingAd =AdContainer::where('device','desktop')->where('page','home_page')->where('place','after_upcoming_products_buttons')->where('active',true)->first();
            $newProductAd =AdContainer::where('device','desktop')->where('page','home_page')->where('place','after_new_products_buttons')->where('active',true)->first();
            $popProductAd =AdContainer::where('device','desktop')->where('page','home_page')->where('place','after_populer_products_buttons')->where('active',true)->first();
            $inNewProductAd =AdContainer::where('device','desktop')->where('page','home_page')->where('place','in_new_products_buttons')->where('position','left')->where('active',true)->first();

            return view('frontend.index',compact('populerProducts','afterCategory','dailyAd','bestSellAd','upcomingAd','newProductAd','popProductAd','inNewProductAd'));
        }else{
            // $newproducts =Product::where('published', 1)->where('category_id','<>',0)->orderBy('id','Desc')->limit(10)->get();
            // $categorys=Category::where('level', 0)->whereNotNull('priority')->orderBy('priority', 'asc')->take(18)->get();
            // $slider_images = json_decode(get_setting('home_slider_images'), true);
            // $best_Sellings=Product::where('published', 1)->orderBy('num_of_sale', 'desc')->take(12)->get();
            // $brands=Brand::take(12)->get();
            // $Dealy_products=Product::where('published', 1)->where('todays_deal', '1')->limit(12)->get();
            // $upcomming_products=Product::where('published', 1)->where('featured', '4')->limit(12)->get();
            // $it_products=Product::where('published', 1)->where('featured', '5')->limit(12)->get();
            // $electronics_product=Product::where('published', 1)->where('category_id', '14')->limit(12)->get();
            // $mobiles_products=Product::where('published', 1)->where('category_id', '5')->orderby('id','desc')->limit(12)->get();
            // $Groceries_product=Product::where('published', 1)->where('category_id', '19')->orderby('id','desc')->limit(12)->get();
            // $Womens_products =Product::where('published', 1)->where('category_id', '17')->orderby('id','desc')->limit(12)->get();
            // $mans_products =Product::where('published', 1)->where('category_id', '16')->orderby('id','desc')->limit(12)->get();
            // $Beauty_products =Product::where('published', 1)->where('category_id', '24')->orderby('id','desc')->limit(12)->get();
            $topAd=AdContainer::where('device','mobile')->where('page','home_page')->where('place','top')->where('active',true)->first();


            return view('frontend.mobile.pages.index',compact('topAd'));
        }


        //return view('frontend.index');
    }
    public function adViewUpdate(Request $request)
    {

        AdItem::whereIn('id',$request->values)->increment('view_count');

    }
    public function adClickUpdate(Request $request)
    {
        AdItem::where('id',$request->value)->increment('click_count');
    }

    public function delivery_payment(){

        if(Agent::isMobile()){
            return view('frontend.mobile.pages.delivery_payment');
        }
        return view('frontend.pages.delivery_payment');
    }
    public function be_a_service_provider(){

        if(Agent::isMobile()){
            return view('frontend.mobile.pages.be_a_service_provider');
        }
        return view('frontend.pages.be_a_service_provider');

    }

    public function flash_deal_details($slug)
    {
        $flash_deal = FlashDeal::where('slug', $slug)->first();
        if($flash_deal != null)
            return view('frontend.flash_deal_details', compact('flash_deal'));
        else {
            // abort(404);
            echo "<script>";
            echo "alert('Flash Deal May Not Available');";
            echo "</script>";
            return view('frontend.contact_us');
        }
    }

    public function load_featured_section(){
        return view('frontend.partials.featured_products_section');
    }

    public function load_best_selling_section(){
        return view('frontend.partials.best_selling_section');
    }

    public function load_upcoming_section(){
        return view('frontend.partials.upcoming_products_section');
    }

    public function load_pre_order_section(){
        return view('frontend.partials.pre_order_products_section');
    }

    public function load_home_categories_section(){
        return view('frontend.partials.home_categories_section');
    }

    public function load_best_sellers_section(){
        return view('frontend.partials.best_sellers_section');
    }

    public function trackOrder(Request $request)
    {
        if($request->has('order_code')){
            $order = Order::where('code', $request->order_code)->first();
            if($order != null){
                return view('frontend.track_order', compact('order'));
            }
        }
        return view('frontend.track_order');
    }

    public function product(Request $request, $slug)
    {







        $slug_2  = Product::where('slug_2', $slug)->first();
        $slug_1  = Product::where('slug', $slug)->first();


        if ($slug_2) {
            $detailedProduct = $slug_2;
        }
        elseif ($slug_1) {
            if ($slug_1->slug_2) {
                return redirect()->route('product',$slug_1->slug_2);
            }else{
                $detailedProduct = $slug_1;
            }


        }else{
            return back();
        }



        $detailedProduct->increment('customer_seen', 1);


        if (Agent::isMobile()) {
            if($request->has('product_referral_code')){
                Cookie::queue('product_referral_code', $request->product_referral_code, 43200);
                Cookie::queue('referred_product_id', $detailedProduct->id, 43200);
            }
            if($detailedProduct->digital == 1){
                return view('frontend.digital_product_details', compact('detailedProduct'));
            }
            else {

                $reletedproducts=Product::where('category_id',$detailedProduct->category_id)->where('id', '!=', $detailedProduct->id)->limit(10)->get();
               // return view('frontend.product_details', compact('detailedProduct'));
               return view($this->device.'.singleproduct',compact('detailedProduct','reletedproducts'));
            }
            return view($this->device.'.singleproduct');
        }
        else{
        // echo '<pre>';
        // print_r($detailedProduct);
        // exit();
        if($detailedProduct!=null && $detailedProduct->published){
            //updateCartSetup();
            if($request->has('product_referral_code')){
                Cookie::queue('product_referral_code', $request->product_referral_code, 43200);
                Cookie::queue('referred_product_id', $detailedProduct->id, 43200);
            }
            if($detailedProduct->digital == 1){
                return view('frontend.digital_product_details', compact('detailedProduct'));
            }
            else {
                return view('frontend.product_details', compact('detailedProduct'));
            }
        }
        echo "<script>";
        echo "alert('আপনার কাঙ্খিত পন্যটি খুঁজে পাওয়া যাচ্ছে না। আপনার কাঙ্খিত পন্যটি পেতে বা সে সম্পর্কে তথ্য পেতে  অথবা যেকোন পন্যের  বাল্ক অর্ডারে স্পেশাল  ডিসকাউন্ট অফার পেতে  অথবা আমাদের পন্য বা সেবা সম্পর্কে মতামত জানাতে নিচের OK বাটন টি ক্লিক করে লিখুন');";
        echo "</script>";
        return view('frontend.contact_us');
    }
    }



    public function shop($slug)
    {
        $shop  = Shop::where('slug', $slug)->first();
        if($shop!=null){
            $seller = Seller::where('user_id', $shop->user_id)->first();
            if ($seller->verification_status != 0){
                return view('frontend.seller_shop', compact('shop'));
            }
            else{
                return view('frontend.seller_shop_without_verification', compact('shop', 'seller'));
            }
        }
        // abort(404);
            echo "<script>";
            echo "alert('The Shop May Not Available');";
            echo "</script>";
            return view('frontend.contact_us');
    }

    public function filter_shop($slug, $type)
    {
        $shop  = Shop::where('slug', $slug)->first();
        if($shop!=null && $type != null){
            return view('frontend.seller_shop', compact('shop', 'type'));
        }
        // abort(404);
            echo "<script>";
            echo "alert('The Shop May Not Available');";
            echo "</script>";
            return view('frontend.contact_us');
    }

    public function all_categories(Request $request)
    {
        if (Agent::isMobile()) {
            $categories = Category::where('level', 1)->orderBy('priority','asc')->get();

            return view($this->device.'.categoryies',compact('categories'));
        }else{
        $categories = Category::where('level', 0)->orderBy('name', 'asc')->get();
        return view('frontend.all_category', compact('categories'));
        }
    }
    public function all_brands(Request $request)
    {
        $categories = Category::all();
        return view('frontend.all_brand', compact('categories'));
    }

    public function seller_brand_upload(Request $request)
    {
     if(Agent::isMobile()){


        $self_brand = auth()->user()->id;
        $brand_type = $request->input('brand_type');

        if ($brand_type == $self_brand) {
            $sort_search =null;
            $brands = Brand::Where('added_by', $self_brand)->orderBy('name', 'asc')->paginate(15);

        if ($request->has('search')){
            $sort_search = $request->search;
            $brands = $brands->where('name', 'like', '%'.$sort_search.'%');
        }


        } elseif($brand_type == 'all_brand') {

            $sort_search =null;
            $brands = Brand::orderBy('name', 'asc');

            if ($request->has('search')){
            $sort_search = $request->search;
            $brands = $brands->where('name', 'like', '%'.$sort_search.'%');
        }

            $brands = $brands->paginate(15);

        }

        else {

            $sort_search =null;
            $brands = Brand::orderBy('name', 'asc');

        if ($request->has('search')){
            $sort_search = $request->search;
            $brands = $brands->where('name', 'like', '%'.$sort_search.'%');
        }

            $brands = $brands->paginate(15);

        }

        // echo '<pre>';
        // print_r($brands);
        // exit()

        return view($this->device.'.seller.brands', compact('brands', 'sort_search'));

     }else{



        $self_brand = auth()->user()->id;
        $brand_type = $request->input('brand_type');

        if ($brand_type == $self_brand) {
            $sort_search =null;
            $brands = Brand::Where('added_by', $self_brand)->orderBy('name', 'asc')->paginate(15);

        if ($request->has('search')){
            $sort_search = $request->search;
            $brands = $brands->where('name', 'like', '%'.$sort_search.'%');
        }


        } elseif($brand_type == 'all_brand') {

            $sort_search =null;
            $brands = Brand::orderBy('name', 'asc');

            if ($request->has('search')){
            $sort_search = $request->search;
            $brands = $brands->where('name', 'like', '%'.$sort_search.'%');
        }

            $brands = $brands->paginate(15);

        }

        else {

            $sort_search =null;
            $brands = Brand::orderBy('name', 'asc');

        if ($request->has('search')){
            $sort_search = $request->search;
            $brands = $brands->where('name', 'like', '%'.$sort_search.'%');
        }

            $brands = $brands->paginate(15);

        }

        // echo '<pre>';
        // print_r($brands);
        // exit();


        return view('frontend.user.seller.brands.index', compact('brands', 'sort_search'));
    }
    }

     public function seller_brand_edit(Request $request, $id)
    {
        $lang   = $request->lang;
        $brand  = Brand::findOrFail($id);
        return view('frontend.user.seller.brands.edit', compact('lang', 'brand'));
    }
   public function show_product_upload_form(Request $request)
    {
        if(\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated){
            if(Auth::user()->seller->remaining_uploads > 0){
                $categories = Category::all();
                return view('frontend.user.seller.product_upload', compact('categories'));
            }
            else {
                flash(translate('Upload limit has been reached. Please upgrade your package.'))->warning();
                return back();
            }
        }
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();

            $gross_weight_info=DelivryMethod::where('id',9)->get()->first();
            $package_size_info=DelivryMethod::where('id',10)->get()->first();

        return view('frontend.user.seller.product_upload', compact('categories','gross_weight_info','package_size_info'));
    }

    public function show_product_edit_form(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $lang = $request->lang;
        if(empty($lang)){$lang="en";}
        $tags = json_decode($product->tags);
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();

            $gross_weight_info=DelivryMethod::where('id',9)->get()->first();
            $package_size_info=DelivryMethod::where('id',10)->get()->first();

        return view('frontend.user.seller.product_edit', compact('product', 'categories', 'tags', 'lang','gross_weight_info','package_size_info'));
    }

    public function seller_product_list(Request $request)
    {
       if(Agent::isMobile()){
        $search = null;
        $products = Product::where('user_id', Auth::user()->id)->where('digital', 0)->orderBy('created_at', 'desc');
        if ($request->has('search')) {
            $search = $request->search;
            $products = $products->where('name', 'like', '%'.$search.'%');
        }
        $products = $products->paginate(10);
        return view($this->device.'.seller.products', compact('products', 'search'));

       }else{
        $search = null;
        $products = Product::where('user_id', Auth::user()->id)->where('digital', 0)->orderBy('created_at', 'desc');
        if ($request->has('search')) {
            $search = $request->search;
            $products = $products->where('name', 'like', '%'.$search.'%');
        }
        $products = $products->paginate(10);
        return view('frontend.user.seller.products', compact('products', 'search'));

       }
    }

    public function ajax_search(Request $request)
    {
        // if(Agent::isMobile()){
        //     return 0;
        //     $keywords = array();
        //     $products = Product::where('published', 1)->where('tags', 'like', '%'.$request->search.'%')->get();
        //     foreach ($products as $key => $product) {
        //         foreach (explode(',',$product->tags) as $key => $tag) {
        //             if(stripos($tag, $request->search) !== false){
        //                 if(sizeof($keywords) > 20){
        //                     break;
        //                 }
        //                 else{
        //                     if(!in_array(strtolower($tag), $keywords)){
        //                         array_push($keywords, strtolower($tag));
        //                     }
        //                 }
        //             }
        //         }
        //     }

        //     $products = filter_products(Product::where('published', 1)->where('name', 'like', '%'.$request->search.'%'))->get()->take(10);

        //     $categories = Category::where('name', 'like', '%'.$request->search.'%')->get()->take(5);

        //     $shops = Shop::whereIn('user_id', verified_sellers_id())->where('name', 'like', '%'.$request->search.'%')->get()->take(3);

        //     if(sizeof($keywords)>0 || sizeof($categories)>0 || sizeof($products)>0 || sizeof($shops)>0){
        //         return view($this->device.'.search_content', compact('products', 'categories', 'keywords', 'shops'));
        //     }
        //     return '0';

        // }
        // else{
        $keywords = array();
        $products = Product::where('published', 1)->where('tags', 'like', '%'.$request->search.'%')->get();
        foreach ($products as $key => $product) {
            foreach (explode(',',$product->tags) as $key => $tag) {
                if(stripos($tag, $request->search) !== false){
                    if(sizeof($keywords) > 20){
                        break;
                    }
                    else{
                        if(!in_array(strtolower($tag), $keywords)){
                            array_push($keywords, strtolower($tag));
                        }
                    }
                }
            }
        }

        $products = filter_products(Product::where('published', 1)->where('name', 'like', '%'.$request->search.'%'))->get()->take(10);

        $categories = Category::where('name', 'like', '%'.$request->search.'%')->get()->take(5);

        $shops = Shop::whereIn('user_id', verified_sellers_id())->where('name', 'like', '%'.$request->search.'%')->get()->take(3);

        if(sizeof($keywords)>0 || sizeof($categories)>0 || sizeof($products)>0 || sizeof($shops)>0){
            return view('frontend.partials.search_content', compact('products', 'categories', 'keywords', 'shops'));
        }
        return '0';
    }


    public function listing(Request $request)
    {
        return $this->search($request);
    }

    public function listingByCategory(Request $request, $category_slug)
    {


      if(Agent::isMobile()){
        $category = Category::where('slug', $category_slug)->first();
        if ($category != null) {
            return $this->search($request, $category->id);
        }
            return view('frontend.contact_us');

      }else{
        $category = Category::where('slug', $category_slug)->first();
        if ($category != null) {

            return $this->search($request, $category->id);
        }
        // abort(404);
            return view('frontend.contact_us');
        }
    }

    public function listingByBrand(Request $request, $brand_slug)
    {
        $brand = Brand::where('slug', $brand_slug)->first();
        if ($brand != null) {
            return $this->search($request, null, $brand->id);
        }
        // abort(404);
            return view('frontend.contact_us');
    }

    public function search(Request $request, $category_id = null, $brand_id = null)
    {

        $query = $request->q;
        $sort_by = $request->sort_by;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;

        $conditions = ['published' => 1];

        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }elseif ($request->brand != null) {
            $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }

        if($seller_id != null){
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        }

        $products = Product::where($conditions);



        if($category_id != null){
            $category_ids = CategoryUtility::children_ids($category_id);
            $category_ids[] = $category_id;

            $products = $products->whereIn('category_id', $category_ids);
        }

        if($min_price != null && $max_price != null){
            $products = $products->where('unit_price', '>=', $min_price)->where('unit_price', '<=', $max_price);
        }

        if($query != null){
            $searchController = new SearchController;
            $searchController->store($request);
            $products = $products->where('name', 'like', '%'.$query.'%')->orWhere('tags', 'like', '%'.$query.'%');
        }

        if($sort_by != null){

            switch ($sort_by) {
                case 'newest':
                    $products->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $products->orderBy('created_at', 'asc');

                    break;
                case 'price-asc':
                    $products->orderBy('unit_price', 'asc');
                    break;
                case 'price-desc':
                    $products->orderBy('unit_price', 'desc');
                    break;
                default:
                    // code...
                    break;
            }

        }


        $non_paginate_products = filter_products($products)->get();

        //Attribute Filter

        $attributes = array();
        foreach ($non_paginate_products as $key => $product) {
            if($product->attributes != null && is_array(json_decode($product->attributes))){
                foreach (json_decode($product->attributes) as $key => $value) {
                    $flag = false;
                    $pos = 0;
                    foreach ($attributes as $key => $attribute) {
                        if($attribute['id'] == $value){
                            $flag = true;
                            $pos = $key;
                            break;
                        }
                    }
                    if(!$flag){
                        $item['id'] = $value;
                        $item['values'] = array();
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if($choice_option->attribute_id == $value){
                                $item['values'] = $choice_option->values;
                                break;
                            }
                        }
                        array_push($attributes, $item);
                    }
                    else {
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if($choice_option->attribute_id == $value){
                                foreach ($choice_option->values as $key => $value) {
                                    if(!in_array($value, $attributes[$pos]['values'])){
                                        array_push($attributes[$pos]['values'], $value);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $selected_attributes = array();

        foreach ($attributes as $key => $attribute) {
            if($request->has('attribute_'.$attribute['id'])){
                foreach ($request['attribute_'.$attribute['id']] as $key => $value) {
                    $str = '"'.$value.'"';
                    $products = $products->where('choice_options', 'like', '%'.$str.'%');
                }

                $item['id'] = $attribute['id'];
                $item['values'] = $request['attribute_'.$attribute['id']];
                array_push($selected_attributes, $item);
            }
        }


        //Color Filter
        $all_colors = array();

        foreach ($non_paginate_products as $key => $product) {
            if ($product->colors != null) {
                foreach (json_decode($product->colors) as $key => $color) {
                    if(!in_array($color, $all_colors)){
                        array_push($all_colors, $color);
                    }
                }
            }
        }

        $selected_color = null;

        if($request->has('color')){
            $str = '"'.$request->color.'"';
            $products = $products->where('colors', 'like', '%'.$str.'%');
            $selected_color = $request->color;
        }


        $products_bulk = filter_products($products)->get();

        $products = filter_products($products)->paginate(32)->appends(request()->query());

        // dd($products);
        $category=Category::where('id',$category_id)->first();

        if($category_id != null){
            $category_ids = CategoryUtility::children_ids($category_id);
            $category_ids[] = $category_id;

            $brandIds = Product::whereIn('category_id', $category_ids)->where('brand_id', '<>', null)->groupBy('brand_id')->pluck('brand_id');
            $brands = Brand::whereIn('id', $brandIds)->get();
        }
        else{

            // dd($products->pluck('brand_id'));
            if($products){

                $brandIds = $products->pluck('brand_id');
                $brands = Brand::whereIn('id', $brandIds)->get();
            }
            else{
                $brands = Brand::whereId('99999999999999')->get();
            }



        }
        //else{
        //     if($request->q)
        //     {
        //         $products
        //         //$brands=Brand::whereIn('id', $products->brand_id)->get();
        //     }else{
        //         $brands= [];
        //     }
        // }



        // dd($brands);

        if(Agent::isMobile()){

            return view($this->device.'.product_listing', compact('products', 'category', 'brands', 'products_bulk', 'query', 'category_id', 'brand_id', 'sort_by', 'seller_id','min_price', 'max_price', 'attributes', 'selected_attributes', 'all_colors', 'selected_color'));
        }else{
            if($request->ajax()){

            return view('frontend.categoryparts.products', compact('products'))->render();
            }


            return view('frontend.product_listing', compact('products', 'category', 'brands', 'products_bulk', 'query', 'category_id', 'brand_id', 'sort_by', 'seller_id','min_price', 'max_price', 'attributes', 'selected_attributes', 'all_colors', 'selected_color'));
        }
    }

    public function home_settings(Request $request)
    {
        return view('home_settings.index');
    }

    public function top_10_settings(Request $request)
    {
        foreach (Category::all() as $key => $category) {
            if(is_array($request->top_categories) && in_array($category->id, $request->top_categories)){
                $category->top = 1;
                $category->save();
            }
            else{
                $category->top = 0;
                $category->save();
            }
        }

        foreach (Brand::all() as $key => $brand) {
            if(is_array($request->top_brands) && in_array($brand->id, $request->top_brands)){
                $brand->top = 1;
                $brand->save();
            }
            else{
                $brand->top = 0;
                $brand->save();
            }
        }

        flash(translate('Top 10 categories and brands have been updated successfully'))->success();
        return redirect()->route('home_settings.index');
    }

    public function variant_price(Request $request)
    {

        $product = Product::find($request->id);
        $str = '';
        $quantity = 0;

        //return array('price' => single_price($price*$request->quantity), 'quantity' => $quantity, 'digital' => $product->digital);
        if($request->has('color')){
            $data['color'] = $request['color'];
            $str = Color::where('code', $request['color'])->first()->name;
        }

        if(json_decode(Product::find($request->id)->choice_options) != null){
            foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
                if($str != null){
                    $str .= '-'.str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                }
                else{
                    $str .= str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                }
            }
        }



        if($str != null && $product->variant_product){
            exit;
            $product_stock = $product->stocks->where('variant', $str)->first();
            $price = $product_stock->price;
            $quantity = $product_stock->qty;
        }
        else{
            $price = $product->unit_price;
            $quantity = $product->current_stock;
        }
        //discount calculation
        $flash_deals = \App\FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $key => $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first() != null) {
                $flash_deal_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
                if($flash_deal_product->discount_type == 'percent'){
                    $price_discount = ($price*$flash_deal_product->discount)/100;
                    $price -= $price_discount;
                }
                elseif($flash_deal_product->discount_type == 'amount'){
                    $price_discount = $flash_deal_product->discount;
                    $price -= $price_discount;
                }
                $inFlashDeal = true;
                break;
            }
        }
        if (!$inFlashDeal) {
            if($product->discount_type == 'percent'){
                $price_discount = ($price*$product->discount)/100;
                $price -= $price_discount;
            }
            elseif($product->discount_type == 'amount'){
                $price_discount = $product->discount;
                $price -= $price_discount;
            }
        }

        if($product->tax_type == 'percent'){
            $price_tax = ($price*$product->tax)/100;
            $price += $price_tax;
        }
        elseif($product->tax_type == 'amount'){
            $price_tax = $product->tax;
            $price += $price_tax;
        }

        //al
        // dump($product->category);
        // die;
        if ($product->category->commision_rate) {

            if ($product->added_by == 'admin') {
                $price += 0;
            } else {
                $price += ((($product->unit_price + $price_tax) - $price_discount) * $product->category->commision_rate) / 100;
            }

        }
        if ($product->shipping_cost) {
            $price += $product->shipping_cost;
        }
//end al

        return array('price' => single_price($price*$request->quantity), 'quantity' => $quantity, 'digital' => $product->digital);
    }

    public function sellerpolicy(){
        if(Agent::isMobile()){
            return view($this->device.'.sellerpolicy');
        }else
        {
            return view("frontend.policies.sellerpolicy");
        }

    }

    public function returnpolicy(){
        if(Agent::isMobile())
        {
            return view($this->device.".returnpolicy");
        }else{
            return view("frontend.policies.returnpolicy");
        }

    }

    public function supportpolicy(){
        return view("frontend.policies.supportpolicy");
    }

    public function terms(){
        if(Agent::isMobile()){
            return view($this->device.".terms");
        }else{
            return view("frontend.policies.terms");
        }

    }

    public function privacypolicy(){
        if(Agent::isMobile())
        {
            return view($this->device.".privacypolicy");
        }else{
            return view("frontend.policies.privacypolicy");
        }

    }

    public function get_pick_ip_points(Request $request)
    {
        $pick_up_points = PickupPoint::all();
        return view('frontend.partials.pick_up_points', compact('pick_up_points'));
    }

    public function get_category_items(Request $request){
        $category = Category::findOrFail($request->id);
        return view('frontend.partials.category_elements', compact('category'));
    }

    public function premium_package_index()
    {
        $customer_packages = CustomerPackage::all();
        return view('frontend.user.customer_packages_lists', compact('customer_packages'));
    }

    public function seller_digital_product_list(Request $request)
    {
        $products = Product::where('user_id', Auth::user()->id)->where('digital', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.user.seller.digitalproducts.products', compact('products'));
    }
    public function show_digital_product_upload_form(Request $request)
    {
        if(\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated){
            if(Auth::user()->seller->remaining_digital_uploads > 0){
                $business_settings = BusinessSetting::where('type', 'digital_product_upload')->first();
                $categories = Category::where('digital', 1)->get();
                return view('frontend.user.seller.digitalproducts.product_upload', compact('categories'));
            }
            else {
                flash(translate('Upload limit has been reached. Please upgrade your package.'))->warning();
                return back();
            }
        }

        $business_settings = BusinessSetting::where('type', 'digital_product_upload')->first();
        $categories = Category::where('digital', 1)->get();
        return view('frontend.user.seller.digitalproducts.product_upload', compact('categories'));
    }

    public function show_digital_product_edit_form(Request $request, $id)
    {
        $categories = Category::where('digital', 1)->get();
        $lang = $request->lang;
        $product = Product::find($id);
        return view('frontend.user.seller.digitalproducts.product_edit', compact('categories', 'product', 'lang'));
    }

    // Ajax call
    public function new_verify(Request $request)
    {
        $email = $request->email;
        if(isUnique($email) == '0') {
            $response['status'] = 2;
            $response['message'] = 'Email already exists!';
            return json_encode($response);
        }

        $response = $this->send_email_change_verification_mail($request, $email);
        return json_encode($response);
    }


    // Form request
    public function update_email(Request $request)
    {
        $email = $request->email;
        if(isUnique($email)) {
            $this->send_email_change_verification_mail($request, $email);
            flash(translate('A verification mail has been sent to the mail you provided us with.'))->success();
            return back();
        }

        flash(translate('Email already exists!'))->warning();
        return back();
    }

    public function send_email_change_verification_mail($request, $email)
    {
        $response['status'] = 0;
        $response['message'] = 'Unknown';

        $verification_code = Str::random(32);

        $array['subject'] = 'Email Verification';
        $array['from'] = env('MAIL_USERNAME');
        $array['content'] = 'Verify your account';
        $array['link'] = route('email_change.callback').'?new_email_verificiation_code='.$verification_code.'&email='.$email;
        $array['sender'] = Auth::user()->name;
        $array['details'] = "Email Second";

        $user = Auth::user();
        $user->new_email_verificiation_code = $verification_code;
        $user->save();

        try {
            Mail::to($email)->queue(new SecondEmailVerifyMailManager($array));

            $response['status'] = 1;
            $response['message'] = translate("Your verification mail has been Sent to your email.");

        } catch (\Exception $e) {
            // return $e->getMessage();
            $response['status'] = 0;
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    public function email_change_callback(Request $request){
        if($request->has('new_email_verificiation_code') && $request->has('email')) {
            $verification_code_of_url_param =  $request->input('new_email_verificiation_code');
            $user = User::where('new_email_verificiation_code', $verification_code_of_url_param)->first();

            if($user != null) {

                $user->email = $request->input('email');
                $user->new_email_verificiation_code = null;
                $user->save();

                auth()->login($user, true);

                flash(translate('Email Changed successfully'))->success();
                return redirect()->route('dashboard');
            }
        }

        flash(translate('Email was not verified. Please resend your mail!'))->error();
        return redirect()->route('dashboard');

    }

    public function reset_password_with_code(Request $request){
        if (($user = User::where('email', $request->email)->where('verification_code', $request->code)->first()) != null) {
            if($request->password == $request->password_confirmation){
                $user->password = Hash::make($request->password);
                $user->email_verified_at = date('Y-m-d h:m:s');
                $user->save();
                event(new PasswordReset($user));
                auth()->login($user, true);

                flash(translate('Password updated successfully'))->success();

                if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')
                {
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('home');
            }
            else {
                flash("Password and confirm password didn't match")->warning();
                return back();
            }
        }
        else {
            flash("Verification code mismatch")->error();
            return back();
        }
    }

    public function session_delivery(Request $request){
        //return 1;
        //Log::info('Showing delivery info---: '.$request->input('delivery_info'));

        session(['delivery_info' => $request->input('delivery_info')]);
        $delivery_info = session('delivery_info');

        return $delivery_info;
    }
    //mobile view
    public function myreview()
    {
        return view('frontend.mobile.pages.myreviews');
    }
    public function myorders()
    {
        return view('frontend.mobile.pages.myorders');
    }
    public function myprofile()
    {
        return view('frontend.mobile.pages.dashboard');
    }
    public function mybalance()
    {
        return view('frontend.mobile.pages.mybalance');

    }
    public function returnandcancellations()
    {
        return view('frontend.mobile.pages.returnandcancellations');

    }
    public function order1(){
        return view('frontend.mobile.pages.order1');
    }
    public function order2(){
        return view('frontend.mobile.pages.order2');
    }
    public function order3(){
        return view('frontend.mobile.pages.order3');
    }
    public function order4(){
        return view('frontend.mobile.pages.order4');
    }
    public function lazyload(Request $request)
    {
        if(Agent::isMobile()){
            if($request->part =='1')
            {
                $slider_images = json_decode(get_setting('home_slider_images'), true);
                $categorys=Category::where('level', 0)->whereNotNull('priority')->orderBy('priority', 'asc')->take(13)->get();
                $aftercategoryAd=AdContainer::where('device','mobile')->where('page','home_page')->where('place','after_category_app_buttons')->where('active',true)->first();
                if($request->ajax())
                {
                    $page = View('frontend.mobile.partials.indexpart1',['slider_images' =>$slider_images,'categorys'=>$categorys,'aftercategoryAd'=> $aftercategoryAd])->render();

                    return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                    ));
                }


            }
            if($request->part =='2')
            {
                $dailyAd=AdContainer::where('device','mobile')->where('page','home_page')->where('place','after_daily_deal_buttons')->where('active',true)->first();
                $upcomingAd=AdContainer::where('device','mobile')->where('page','home_page')->where('place','after_upcoming_products_buttons')->where('active',true)->first();
                $newProductAd=AdContainer::where('device','mobile')->where('page','home_page')->where('place','after_new_products_buttons')->where('active',true)->first();
                $populerAd=AdContainer::where('device','mobile')->where('page','home_page')->where('place','after_populer_products_buttons')->where('active',true)->first();


                $top_rankeds=Product::where('published', 1)->where('featured', '6')->limit(10)->get();
                $top_brands=Product::where('published', 1)->where('featured', '7')->limit(10)->get();
                $best_Sellings=Product::where('published', 1)->orderBy('num_of_sale', 'desc')->take(10)->get();
                $Dealy_products=Product::where('published', 1)->where('todays_deal', '1')->limit(10)->get();
                $upcomming_products=Product::where('published', 1)->where('featured', '4')->limit(10)->get();
                $populerProducts=Product::where('published', 1)->orderBy('customer_seen', 'desc')->take(7)->get();
                $newproducts =Product::where('published', 1)->where('category_id','<>',0)->orderBy('id','Desc')->limit(10)->get();

                if($request->ajax())
                {
                    $page = View('frontend.mobile.partials.indexpart2',['populerProducts'=>$populerProducts,'Dealy_products'=>$Dealy_products,'best_Sellings'=>$best_Sellings,'upcomming_products'=>$upcomming_products,'newproducts'=>$newproducts,'top_rankeds'=>$top_rankeds,'top_brands'=>$top_brands,'dailyAd'=>$dailyAd,'upcomingAd'=>$upcomingAd,'newProductAd'=>$newProductAd,'populerAd'=>$populerAd])->render();

                    return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                    ));
                }



            }

        }
        //if($request->viewpage == 'index')
        //{


        //     if($request->part =='2')
        //     {
        //         //200 products

        //         $products = DB::table('products')
        //         ->whereActive(true)
        //         ->where('ecommerce',false)
        //         ->where('status','published')
        //         ->where('feature_img','<>',null)
        //         ->where('quantity','>',0)
        //         ->select(['id','title','discount','description','pv','feature_img','final_price','sale_price'])->orderBy('updated_at','desc')
        //         ->paginate(24);



        //         if($request->ajax())
        //         {
        //             if(Agent::isDesktop())
        //             {
        //                 $page = View($this->device.'lazyload.indexPart2',['products' =>$products])->render();

        //                 return Response()->json(array(
        //                 'success' => true,
        //                 'page' => $page,
        //                 'nextPageUrl' => $products->nextPageUrl()
        //                 ));
        //             }
        //             else
        //             {
        //                 $page = View($this->device.'welcome.lazyload.indexPart2',['products' =>$products])->render();

        //                 return Response()->json(array(
        //                 'success' => true,
        //                 'page' => $page,
        //                 'nextPageUrl' => $products->nextPageUrl()
        //                 ));
        //             }

        //         }
        //     }
        // }
        // elseif($request->page == 'category')
        // {

        // }
        // return back();
    }
    public function allproducts($type){

        if($type == "daily-deal"){
            $products = Product::where('published', 1)->where('todays_deal', '1')->paginate(12);
            return view('frontend.products',compact('products'));
        }elseif($type == "new-products"){
            $products = Product::where('published', 1)->orderBy('id', 'desc')->paginate(12);
            return view('frontend.products',compact('products'));
        }elseif($type == "top-rank-products"){
            $products = Product::where('published', 1)->where('featured', '6')->paginate(12);
            return view('frontend.products',compact('products'));
        }elseif($type == "top-brands-products"){
            $products = Product::where('published', 1)->where('featured', '7')->paginate(12);
            return view('frontend.products',compact('products'));
        }elseif($type == "populer-products"){
            $products = Product::where('published', 1)->orderBy('customer_seen', 'desc')->paginate(12);
            return view('frontend.products',compact('products'));
        }elseif($type == "best-sell-products"){
            $products = Product::where('published', 1)->where('featured', '1')->paginate(12);
            return view('frontend.products',compact('products'));
        }elseif($type == "upcoming-products"){
            $products = Product::where('published', 1)->where('featured', '4')->paginate(12);
            return view('frontend.products',compact('products'));
        }

    }

}
