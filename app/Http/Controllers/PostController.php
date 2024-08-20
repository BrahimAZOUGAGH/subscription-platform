<?php

namespace App\Http\Controllers;

use App\Events\PostPublished;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * @OA\Post(
     *     path="/api/posts",
     *     summary="Create a post for a specific website",
     *     tags={"Posts"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"website_id", "title", "description"},
     *             @OA\Property(property="website_id", type="integer", example=1),
     *             @OA\Property(property="title", type="string", example="New Post Title"),
     *             @OA\Property(property="description", type="string", example="This is the post description")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Post created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Post created successfully!")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'website_id' => 'required|exists:websites,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        $post = Post::create($request->all());
        event(new PostPublished($post));
    
        return response()->json($post, 201);
    }
}
