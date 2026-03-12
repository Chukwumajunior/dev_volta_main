<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Post;
use Illuminate\Support\Facades\App;

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
        View::composer('*', function ($view) {
            $allPosts = Post::where('section', 'development')->get();
            $updates = $allPosts->whereNotIn('category', ['Team', 'Reviews']);
            $teamMembers = $allPosts->where('category', 'team');
            $storePosts = $allPosts->where('type', 'store')
                ->merge($allPosts->where('category', 'updates'))
                ->sortByDesc('created_at');
            $reviews = $allPosts->where('category', 'reviews')->sortByDesc('created_at');
            $sections = $allPosts->where('category', 'section')->sortByDesc('created_at');
            $projects = $allPosts->where('category', 'projects')->sortByDesc('created_at');
            $partnerships = $allPosts->where('category', 'partnerships')->sortByDesc('created_at');

            $view->with(compact('teamMembers', 'storePosts', 'allPosts', 'updates', 'reviews', 'projects', 'sections', 'partnerships'));
        });

    }

}
