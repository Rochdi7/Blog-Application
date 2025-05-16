<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index($slug = null)
{
    $categories = Category::all();

    $posts = Post::when($slug, function ($query, $slug) {
        return $query->whereHas('category', function ($q) use ($slug) {
            $q->where('slug', $slug);
        });
    })->latest()->get();

    return view('index', compact('categories', 'posts', 'slug'));
}

}
