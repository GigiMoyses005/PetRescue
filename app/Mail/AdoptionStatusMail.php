<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdoptionStatusMail extends Mailable
{
    use Queueable, SerializesModels;
    public $adoption;

    public function __construct($adoption){
        $this->adoption = $adoption;
    }

    public function build(){
        return $this->subject('Status da sua solicitação de adoção')
                    ->markdown('emails.adoption.status');
    }
}
