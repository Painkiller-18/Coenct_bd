<?php

namespace App\Mail;

use App\Models\ayudasvisuales;
use App\Models\calendario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NotifiacionGmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $cambios;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cambios)
    {
        $this->cambios = $cambios;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Cambios a realizar',
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
            view: 'mails.Notificacion_mail',
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

    public function build()
    {

        $mail = $this->from('javiermartinez@amats.com.mx')
            ->view('mails.Notificacion_mail');
        foreach ($this->cambios as $cambio) {
            $mail->attachFromStorageDisk('ayudasvisuales', $cambio->ayuda_visual);
        }
        return $mail;
    }
}
