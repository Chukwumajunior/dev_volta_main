<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('home');
    }

    public function update_feed(Request $request)
    {
        $query = Post::whereNotIn('category', ['Team', 'Reviews'])
            ->where('type', 'info')
            ->latest();

        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        $updates = $query->paginate(9);

        return view('updates', compact('updates'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function projects()
    {
        return view('Projects');
    }

}
