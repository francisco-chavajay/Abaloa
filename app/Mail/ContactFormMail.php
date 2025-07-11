<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use SerializesModels;

    public $contact;
    public $userEmail; // El correo del usuario

    public function __construct($contact, $userEmail)
    {
        $this->contact = $contact;
        $this->userEmail = $userEmail;
    }

    public function build()
    {
        return $this->from($this->userEmail) // El remitente es el correo del usuario
                    ->to(config('mail.from.address')) // El destinatario es el correo configurado
                    ->subject('Nuevo mensaje de contacto')
                    ->view('emails.contact')
                    ->with([
                        'contact' => $this->contact,
                    ]);
    }
}
