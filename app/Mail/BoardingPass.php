<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class BoardingPass extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = PDF::loadView('boarding-pass-pdf', ['ticket' => $this->ticket])->output();


        return $this->subject('Pasabordo ' . $this->ticket->reservation_code . ' vuelo ' . $this->ticket->flight->name)
					->markdown('emails.boarding-pass')
					->attachData($pdf, 'boarding-' . $this->ticket->reservation_code . '.pdf', [
						'mime' => 'application/pdf'
					]);
    }
}
