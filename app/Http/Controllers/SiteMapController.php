<?php

namespace App\Http\Controllers;

use App\Models\BusinessSetting;
use App\Models\Category;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Jenssegers\Agent\Facades\Agent;

class SiteMapController extends Controller
{
    protected $device;
    public function __construct()
    {
        if (!Agent::isDesktop()) {
            $this->device = 'frontend.mobile.pages';
        }
    }

    public function index(Request $request)
    {

        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }

   public function products(Request $request)
    {
        $products = Product::where('published',true)->latest()->get();
        return response()->view('sitemap.products', [
            'products' => $products,
        ])->header('Content-Type', 'text/xml');

    //     $profiles = User::latest()->get();
    //    return response()->view('sitemap.profile', [
    //        'profiles' => $profiles,
    //    ])->header('Content-Type', 'text/xml');


    }
    public function pages(Request $request)
    {
       $page = BusinessSetting::where('type','widget_one_links')->first();
       $created_at=Carbon::parse($page->created_at)->format('Y-m-d\TH:i:sP');
       $pages = json_decode($page->value);



     return response()->view('sitemap.pages', [
           'pages' => $pages,
           'created_at' => $created_at,
       ])->header('Content-Type', 'text/xml');



    }
    public function categories(Request $request)
    {
        $categories=Category::get();
       return response()->view('sitemap.categories', [
           'categories'=>$categories
       ])->header('Content-Type', 'text/xml');

    }
    public function sitemapPage(){
        if(Agent::isMobile()){
            return view($this->device.'.sitemapPage');
        }else{
            return view('frontend.sitemapPage');
        }

    }
}
