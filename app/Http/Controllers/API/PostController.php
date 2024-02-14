<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreatePostRequest;
use App\Http\Requests\API\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    protected $postService;

    // Constructor to inject PostService
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Retrieve all posts
        $posts = $this->postService->getAllPosts();
        
        // Return JSON response using PostResource
        return response()->json([
            'status' => true,
            'message' => 'Posts finded successfully',
            'data' => PostResource::collection($posts)
        ],200);
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \App\Http\Requests\CreatePostRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreatePostRequest $request)
    {
        // Create a new post
        $post = $this->postService->createPost($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Message stored successfully',
            'data' => new PostResource($post)
        ],201);
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {

        try {
            $data = $this->postService->getPostById($id);
    
            if (!$data) {
                throw new ModelNotFoundException();
            }
            
            return response()->json([
                'status' => true,
                'message' => 'Message finded successfully',
                'data' => new PostResource($data)
            ],200);
        } catch (ModelNotFoundException $exception) {
            // If message not found, return JSON exception with 404 status code
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found',
            ], Response::HTTP_NOT_FOUND);
        }
        
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatePostRequest $request,int $id)
    {
        try {
            $data = $this->postService->getPostById($id);
    
            if (!$data) {
                throw new ModelNotFoundException();
            }
        // Update the post
        $updatedPost = $this->postService->updatePost($data, $request->validated());

        // Return JSON response using PostResource
        return response()->json([
            'status' => true,
            'message' => 'Message updated successfully',
            'data' => new PostResource($updatedPost)
        ],200);
        } catch (ModelNotFoundException $exception) {
            // If message not found, return JSON exception with 404 status code
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $data = $this->postService->getPostById($id);
    
            if (!$data) {
                throw new ModelNotFoundException();
            }
        // Delete the post
        $this->postService->deletePost($data);

        return response()->json([
            'status' => true,
            'message' => 'Message destroyed successfully',
            'data' => null
        ],200);
    } catch (ModelNotFoundException $exception) {
        // If message not found, return JSON exception with 404 status code
        return response()->json([
            'status' => 'error',
            'message' => 'Data not found',
        ], Response::HTTP_NOT_FOUND);
    }
    }
}
