<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\AdContainer;
use View;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    Schema::defaultStringLength(191);

    $parentCategorys=Category::where('level',0)
    ->whereNotNull('priority')
    ->orderBy('priority','asc')
    ->get()
    ->take(10);
    View::share('parentCategorys', $parentCategorys);
    $allCategorys=Category::orderBy('priority','asc')->get();
    View::share('allCategorys', $allCategorys);

    $topAd=AdContainer::where('device','desktop')->where('page','home_page')->where('place','top')->where('active',true)->first();
    View::share('topAd', $topAd);

  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }
}
