<?php

namespace App\Repositories;

use App\Models\Message;

class MessageRepository
{
    /**
     * Retrieve all messages.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Message::all();
    }

    /**
     * Create a new message.
     *
     * @param array $data
     * @return Message
     */
    public function create(array $data)
    {
        return Message::create($data);
    }

    /**
     * Retrieve a message by ID.
     *
     * @param int $id
     * @return Message|null
     */
    public function find($id)
    {
        return Message::find($id);
    }

    /**
     * Update a message.
     *
     * @param Message $message
     * @param array $data
     * @return Message
     */
    public function update(Message $message, array $data)
    {
        $message->update($data);
        return $message;
    }

    /**
     * Delete a message.
     *
     * @param Message $message
     * @return bool|null
     */
    public function delete(Message $message)
    {
        return $message->delete();
    }
}
