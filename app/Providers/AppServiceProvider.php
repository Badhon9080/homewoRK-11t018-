<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {view()->composer("layouts.FrontendLay", function($view)
        {$view->with([
                  "categories"=>Category::with("subcategories")->select("id","category_id","category","slug")->whereNull("category_id")->get(),
                  "cartCount"=>Cart::where("customer_id",auth("customer")->id())->count()
        ]);

        });
    }private function getCategories()
        {view()->composer(["layouts.FrontendLay","Frontend.HomeIndex"], function($view)
            {$view->with([
                      "categories"=>"Hellow categoRieS",
            ]);

            });
        }






}