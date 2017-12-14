<?php
/**/
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()/*Assume that when the framework is fully loaded it will perform this actions */
    {
        // \View::composer();
        view()->composer('layouts.sidebar', function ($view) {/*anywhere where we have a sidebar, we will have a an archives*/
            // $view->with('archives', \App\Post::archives());
            // $view->with('tags', \App\Tag::has('posts')->pluck('name')); /*Cache this and dont perform a database query anytime*/


            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');

            $view->with(compact('archives', 'tags'));
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() /*This method binds things into the service container*/
    {
        //
    }
}
