<?php

namespace App\Http\Controllers;

use App\Models\Post;

class SitemapController extends Controller {
    public function index()
    {
        $baseUrl = config('app.url'); // Get the base URL from your .env or config
        $posts = Post::all(); // Get your posts

        // Return the sitemap XML view
        return response()->view('sitemap', compact('posts', 'baseUrl'))
            ->header('Content-Type', 'application/xml');
    }
}
