<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostService
{
    protected $postRepository;

    // Constructor to inject PostRepository
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Get all posts from the repository.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllPosts()
    {
        // Delegate to the repository to fetch all posts
        return $this->postRepository->all();
    }

    /**
     * Create a new post using the provided data.
     *
     * @param array $data The data to create the post with
     * @return \App\Models\Post The created post instance
     */
    public function createPost($data)
    {
        // Delegate to the repository to create a new post
        return $this->postRepository->create($data);
    }

    /**
     * Update an existing post with the provided data.
     *
     * @param \App\Models\Post $post The post to update
     * @param array $data The data to update the post with
     * @return \App\Models\Post The updated post instance
     */
    public function updatePost(Post $post, $data)
    {
        // Delegate to the repository to update the post
        $this->postRepository->update($post, $data);
        
        // Refresh the post instance to reflect the changes
        return $post->fresh();
    }

    /**
     * Delete the specified post.
     *
     * @param \App\Models\Post $post The post to delete
     * @return bool|null True on successful deletion, false otherwise
     * @throws \Exception
     */
    public function deletePost(Post $post)
    {
        // Delegate to the repository to delete the post
        return $this->postRepository->delete($post);
    }

    /**
     * Retrieve a post by ID.
     *
     * @param int $id
     * @return Post
     */
    public function getPostById($id)
    {
        return $this->postRepository->find($id);
    }
}
