<?php

namespace App\Services;

use App\Models\Message;
use App\Repositories\MessageRepository;
use Illuminate\Support\Facades\Mail;
use App\Mail\AnswerMessage;

class MessageService
{
    protected $messageRepository;

    /**
     * Constructor to inject MessageRepository instance.
     *
     * @param MessageRepository $messageRepository
     */
    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    /**
     * Retrieve all messages.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllMessages()
    {
        return $this->messageRepository->getAll();
    }

    /**
     * Create a new message.
     *
     * @param array $data
     * @return Message
     */
    public function createMessage(array $data)
    {
        return $this->messageRepository->create($data);
    }

    /**
     * Retrieve a message by ID.
     *
     * @param int $id
     * @return Message
     */
    public function getMessageById($id)
    {
        return $this->messageRepository->find($id);
    }

    /**
     * Update a message.
     *
     * @param Message $message
     * @param array $data
     * @return Message
     */
    public function updateMessage(Message $message, array $data)
    {
        return $this->messageRepository->update($message, $data);
    }

    /**
     * Delete a message.
     *
     * @param Message $message
     * @return void
     */
    public function deleteMessage(Message $message)
    {
        $this->messageRepository->delete($message);
    }

    /**
     * answer the message.
     *
     * @param int $id
     * @param string $message
     */
    public function answerMessage(int $id,string $message){

        // $this->messageRepository->answerMessage($id, $message);

        // $message = $this->messageRepository->find($id);

        // $a = Mail::to($message['email'])->send(new AnswerMessage($message['message'], $message['answer']['message'],$message['name']));
        dd(11);
        return $message;

    }
}
