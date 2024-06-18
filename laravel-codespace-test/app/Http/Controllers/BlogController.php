<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    /**
     * Show posts on frontpage
     */
    public function frontPage()
    {
        $posts = Post::all();
        return view('frontpage', compact('posts'));
    }

    /**
     * Show posts on blogpage
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10); // Fetch blog posts, adjust as needed
        return view('blog.index', compact('posts'));
    }

    /**
     * Display blog post detail.
     */
    public function show(Post $post)
    {
        return view('blog.blogpost', compact('post'));
    }

    /**
     * Show category page with matching blog posts.
     */
    public function category($category)
    {
        // Retrieve posts for the specified category
        $posts = Post::where('category', $category)->get();
        return view('blog.category', compact('category', 'posts'));
    }    

    /**
     * Show keyword page with matching blog posts.
     */
    public function keyword($keyword)
    {
        // Retrieve posts for the given keyword
        $posts = Post::where('keywords', 'like', '%'.$keyword.'%')->get();
        return view('blog.keyword', compact('keyword', 'posts'));
    }
}

