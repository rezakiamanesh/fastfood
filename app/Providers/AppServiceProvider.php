<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::morphMap([
            'product' => Product::class,
            'category' => Category::class
        ]);


        view()->composer(['site.layouts.partials.header'],
            function ($view) {
                $categories = Category::with(['categories'])->whereStatus(1)->where('parent_id', 0)->orderBy('sorting', 'desc')->get();
                $view->with([
                    'categories' => $categories,
                ]);

            });

    }
}
