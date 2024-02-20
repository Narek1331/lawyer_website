<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnswerMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $question;
    public $answer;
    public $username;

    public function __construct($question, $answer, $username)
    {
        $this->question = $question;
        $this->answer = $answer;
        $this->username = $username;
    }

    public function build()
    {
        return $this->view('emails.answer_message')
                    ->with([
                        'question' => $this->question,
                        'answer' => $this->answer,
                        'username' => $this->username,
                    ]);
    }
}
