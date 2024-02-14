<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    /**
     * Retrieve all posts from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        // Fetch all posts using Eloquent ORM
        return Post::all();
    }

    /**
     * Create a new post in the database.
     *
     * @param array $data The data to create the post with
     * @return \App\Models\Post The created post instance
     */
    public function create($data)
    {
        // Create a new post using the create method of the Post model
        return Post::create($data);
    }

    /**
     * Update an existing post in the database.
     *
     * @param \App\Models\Post $post The post to update
     * @param array $data The data to update the post with
     * @return void
     */
    public function update(Post $post, $data)
    {
        // Update the attributes of the given post
        $post->update($data);
    }

    /**
     * Delete a post from the database.
     *
     * @param \App\Models\Post $post The post to delete
     * @return bool|null True on successful deletion, false otherwise
     * @throws \Exception
     */
    public function delete(Post $post)
    {
        // Delete the given post from the database
        return $post->delete();
    }

    /**
     * Retrieve a post by ID.
     *
     * @param int $id
     * @return Post|null
     */
    public function find($id)
    {
        return Post::find($id);
    }
}
