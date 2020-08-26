<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Blog;
// Extended to use View controller
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // We can use it without writing code on Controller as Blog::all
        View::composer(['partials.meta_dynamic', 'layouts.nav', 'blogs.index'], function ($view) {
            $view->with('blogs', Blog::where('status', 1)->latest()->get());
        });
    }
}
