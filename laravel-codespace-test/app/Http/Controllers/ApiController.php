<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Post;

class ApiController extends Controller
{
    public function getPosts()
    {
        $posts = Post::all();
                Log::info('createPost endpoint called');
        return response()->json($posts);
    }

    public function getPostById($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    public function getPostsByAuthor($author)
    {
        $posts = Post::where('author', $author)->get();
        return response()->json($posts);
    }
    
    public function createPost(Request $request)
    {
        // Retrieve data from the request query parameters
        $data = $request->all();

        // Manually perform validation
        $validatedData = $this->validateRequestData($data);

        // Create a new post using the validated data
        $post = Post::create($validatedData);

        // Return the created post as JSON response
        return response()->json(['message' => 'Blog post created successfully', 'post' => $post], 201);
    }

    // Custom method to validate request data
    private function validateRequestData($data)
    {
        // Validate the request data manually
        $validatedData = [
            'author' => $data['author'] ?? null,
            'publish_date' => $data['publish_date'] ?? null,
            'headline' => $data['headline'] ?? null,
            'text' => $data['text'] ?? null,
        ];

        return $validatedData;
    }
}
