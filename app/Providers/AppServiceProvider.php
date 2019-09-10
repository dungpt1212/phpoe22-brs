<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
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
        View::composer('user.layouts.menu', function($view) {
            $bookCategories = Category::all();
            $authors = Author::all();
            $publishers = Publisher::all();
            $view->with([
               'bookCategories' => $bookCategories,
               'authors' => $authors,
               'publishers' => $publishers,

            ]);

        });

    }
}
