<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('_sidebar', function($view) {

			$view->with('popularPosts', Post::popularPosts());

			$view->with('lastPosts', Post::lastPosts());

			$view->with('listCategories', Category::getAllCategories());
        });

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
