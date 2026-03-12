<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function create()
    {
        return view('blog.create');
    }

    public function index()
    {
        $products = Post::where('type', 'store')
                        ->latest()
                        ->paginate(12);

        return view('blog.stores', compact('products'));
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $relatedPosts = Post::where('category', $post->category)
                        ->where('id', '!=', $post->id)
                        ->latest()
                        ->limit(4)
                        ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }

    public function store_filter(Request $request)
    {
        $search = $request->input('search');
        $products = Post::query()
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%");
            })
            ->paginate(9);

        return view('blog.stores', compact('products'));
    }


    public function store(Request $request)
    {
        $data = $this->validatePost($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $slug = Str::slug($data['title']);
        $count = Post::where('slug', 'like', "$slug%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }
        $data['slug'] = $slug;

        $data['meta_title'] = $data['meta_title'] ?? $data['title'];
        $data['meta_description'] = $data['meta_description'] ?? Str::limit(strip_tags($data['body']), 150);
        $data['meta_keywords'] = $data['meta_keywords'] ?? implode(', ', array_slice(explode(' ', $data['title']), 0, 10));
        $data['user_id'] = auth()->id();
        $data['username'] = auth()->user()->name;

        Post::create($data);

        return redirect()->back()->with('message', 'Blog post created successfully');
    }


    public function edit(Post $post)
    {
        return view('blog.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $this->validatePost($request);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $slug = Str::slug($data['title']);
        $originalSlug = $slug;
        $count = 1;

        while (
        Post::where('slug', $slug)
            ->where('id', '!=', $post->id)
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }

        $data['slug'] = $slug;

        $post->update($data);

        return redirect()->back()->with('message', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->back()->with('message', 'Post deleted successfully.');
    }

    private function validatePost(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string|max:255',
            'type' => 'required|string|in:info,store',
            'price' => 'nullable|required_if:type,store|numeric|min:0',
        ]);
    }
}
