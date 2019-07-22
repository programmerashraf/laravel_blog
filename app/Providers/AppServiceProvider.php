<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use App\Observers\PostObserver;
use App\Post;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\View;
use App\User;


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

    public function boot(Dispatcher $events)
    {
        Post::observe(PostObserver::class);
        config(["defaults"=>File::getRequire(loadConfig('defaults'))]);
        bladeDirectives();
        menuItems($events);
        auth()->shouldUse('web');
        View::share('categories', Category::all());
        View::share('tags', \DB::table("tagging_tags")->get());
        View::share('user', User::find(1));
    }
}
