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
        $this->app->singleton(
            \App\Repositories\RequestNewBook\RequestNewBookRepositoryInterface::class,
            \App\Repositories\RequestNewBook\RequestNewBookRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Book\BookRepositoryInterface::class,
            \App\Repositories\Book\BookRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Publisher\PublisherRepositoryInterface::class,
            \App\Repositories\Publisher\PublisherRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Author\AuthorRepositoryInterface::class,
            \App\Repositories\Author\AuthorRepository::class
        );

        $this->app->singleton(
            \App\Repositories\AuthorBook\AuthorBookRepositoryInterface::class,
            \App\Repositories\AuthorBook\AuthorBookRepository::class
        );

        $this->app->singleton(
            \App\Repositories\UserActivity\UserActivityRepositoryInterface::class,
            \App\Repositories\UserActivity\UserActivityRepository::class
        );

        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );

        $this->app->singleton(
            \App\Repositories\UserFollow\UserFollowRepositoryInterface::class,
            \App\Repositories\UserFollow\UserFollowRepository::class
        );

        $this->app->singleton(
            \App\Repositories\BookUser\BookUserRepositoryInterface::class,
            \App\Repositories\BookUser\BookUserRepository::class
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('user.layouts.menu', function ($view) {
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
