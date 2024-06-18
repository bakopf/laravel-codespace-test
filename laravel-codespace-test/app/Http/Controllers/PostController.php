<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Display frontpage with blog post teaser list.
     */
    public function frontPage()
    {
        $posts = Post::all();
        return view('frontpage', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'headline' => 'required|string|max:255',
            'publish_date' => 'required|date',
            'category' => 'required|string',
            'keywords' => 'nullable|string',
            'text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed (in kilobytes)
        ]);
    
         // Create the post with the provided data
        $post = new Post();
        $post->author = $request->input('author');
        $post->headline = $request->input('headline');
        $post->publish_date = $request->input('publish_date');
        $post->category = $request->input('category');
        $post->keywords =  $request->input('keywords');
        $post->text = $request->input('text');
    
         // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/assets/images/uploads', $filename); // Store image in the specified directory
    
            // Save image data to database
            $post->filename = $filename;
            $post->filepath = 'assets/images/uploads/' . $filename;
            $post->upload_date = now();
            list($width, $height) = getimagesize($image);
            $post->image_width = $width;
            $post->image_height = $height;
        }
    
        $post->save();
    
        return redirect()->route('posts.index')->with('success', 'Article created successfully!');
    }
    /**
     * Show the form for editing blog posts
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    
    /**
     * Update blog posts from edit form.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'headline' => 'required|string|max:255',
            'publish_date' => 'required|date',
            'category' => 'required|string',
            'keywords' => 'nullable|string',
            'text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
        ]);
    
        // Update the existing post with the provided data
        $post->author = $request->input('author');
        $post->headline = $request->input('headline');
        $post->publish_date = $request->input('publish_date');
        $post->category = $request->input('category');
        $post->keywords = $request->input('keywords');
        $post->text = $request->input('text');
    
        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image file if it exists
            if ($post->filename) {
                Storage::delete('public/assets/images/uploads/' . $post->filename);
            }
    
            // Upload and save the new image file
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/assets/images/uploads', $filename); // Store image in the specified directory
            $post->filename = $filename;
            $post->filepath = 'assets/images/uploads/' . $filename;
            $post->upload_date = now();
            list($width, $height) = getimagesize($image);
            $post->image_width = $width;
            $post->image_height = $height;
        }
    
        $post->save();
    
        return redirect()->route('posts.index')->with('success', 'Article updated successfully!');
    }
    

    /**
     * Remove a single blog post from db.
     */
    public function destroy(Post $post)
    {
        if ($post->filename) {
            Storage::delete('public/assets/images/uploads/' . $post->filename);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Article deleted successfully!');
    }
    public function indexApi()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function showApi($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    public function showByAuthor($author)
    {
        $posts = Post::where('author', $author)->get();
        return response()->json($posts);
    }
}
