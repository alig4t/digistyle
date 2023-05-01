<?php

namespace App\Providers;

use App\Brand;
use App\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        view()->composer('frontend.layout.master', function ($view) {

            $HeaderMenuCats = Category::HeaderMenuCategories();
            $brands = Brand::HomePageBrands();

            $view->with(['HeaderMenuCats' => $HeaderMenuCats, 'brands' => $brands]);
        });
    }
}
