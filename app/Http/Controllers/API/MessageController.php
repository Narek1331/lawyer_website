<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateMessageRequest;
use App\Http\Requests\API\UpdateMessageRequest;
use App\Http\Requests\API\AnswerMessageRequest;
use App\Http\Resources\MessageResource;
use App\Services\MessageService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    protected $messageService;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Services\MessageService  $messageService
     * @return void
     */
    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    /**
     * Display a listing of the messages.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Retrieve all messages using the MessageService
        $messages = $this->messageService->getAllMessages();
        
        // Return a collection of messages as JSON response
        // return MessageResource::collection($messages);
        return response()->json([
            'status' => true,
            'message' => 'Messages finded successfully',
            'data' => MessageResource::collection($messages)
        ],200);
    }

    /**
     * Store a newly created message in storage.
     *
     * @param  \App\Http\Requests\CreateMessageRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateMessageRequest $request)
    {
        // Create a new message using the validated request data
        $message = $this->messageService->createMessage($request->validated());
        
        // Return a collection of messages as JSON response with status, message, and data
        return response()->json([
            'status' => true,
            'message' => 'Message stored successfully',
            'data' => new MessageResource($message)
        ],201);
    }

    /**
     * Display the specified message.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
        // Retrieve a message by ID using the MessageService
        $message = $this->messageService->getMessageById($id);

        if (!$message) {
            throw new ModelNotFoundException();
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Message finded successfully',
            'data' => new MessageResource($message)
        ],200);

    } catch (ModelNotFoundException $exception) {
        // If message not found, return JSON exception with 404 status code
        return response()->json([
            'status' => 'error',
            'message' => 'Message not found',
        ], Response::HTTP_NOT_FOUND);
    }
    }

    /**
     * Update the specified message in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateMessageRequest $request, $id)
    {
        try {
        // Retrieve a message by ID using the MessageService
        $message = $this->messageService->getMessageById($id);
        
        if (!$message) {
            throw new ModelNotFoundException();
        }
        // Update the message using the validated request data
        $message = $this->messageService->updateMessage($message, $request->validated());
        
        return response()->json([
            'status' => true,
            'message' => 'Message updated successfully',
            'data' => new MessageResource($message)
        ],200);
        } catch (ModelNotFoundException $exception) {
            // If message not found, return JSON exception with 404 status code
            return response()->json([
                'status' => 'error',
                'message' => 'Message not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified message from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
        // Retrieve a message by ID using the MessageService
        $message = $this->messageService->getMessageById($id);
        
        if (!$message) {
            throw new ModelNotFoundException();
        }

        // Delete the message using the MessageService
        $this->messageService->deleteMessage($message);
        
        return response()->json([
            'status' => true,
            'message' => 'Message destroyed successfully',
            'data' => null
        ],200);
        } catch (ModelNotFoundException $exception) {
            // If message not found, return JSON exception with 404 status code
            return response()->json([
                'status' => 'error',
                'message' => 'Message not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Answer a message.
     *
     * @param int $id The ID of the message to answer.
     * @param \App\Http\Requests\AnswerMessageRequest $request The request containing the answer message.
     * @return \Illuminate\Http\JsonResponse A JSON response indicating the result of the operation.
     */
    public function answer($id, AnswerMessageRequest $request)
    {
        try {
            // Retrieve a message by ID using the MessageService
            $message = $this->messageService->getMessageById($id);
            
            // Check if the message exists
            if (!$message) {
                // If the message does not exist, throw a ModelNotFoundException
                throw new ModelNotFoundException();
            }
            // Answer the message using the message service
            $message = $this->messageService->answerMessage($id, $request->message);
            
            // Return a JSON response indicating success
            return response()->json([
                'status' => true,
                'message' => 'Message answer stored successfully',
                'data' => new MessageResource($message)
            ], 200);

        } catch (ModelNotFoundException $exception) {
            // If message not found, return JSON exception with 404 status code
            return response()->json([
                'status' => 'error',
                'message' => 'Message not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

}
