<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InventarioMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pieza;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pieza)
    {
        $this->pieza = $pieza;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Pieza '.$this->pieza->nombre.' en stock mínimo',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mails.Notificacion_inventario',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    public function build(){
        return $this->from('javiermartinez@amats.com.mx')
        ->view('mails.Notificacion_inventario');
    }
}
