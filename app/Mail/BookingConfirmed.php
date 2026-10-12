<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf; // Import de DomPDF

class BookingConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        // Génération du PDF
        $pdf = Pdf::loadView('pdf.facture', ['booking' => $this->booking]);

        return $this->subject('Confirmation & Facture - Mousstown')
                    ->view('emails.booking_confirmed')
                    ->attachData($pdf->output(), "facture_mousstown_{$this->booking->id}.pdf", [
                        'mime' => 'application/pdf',
                    ]);
    }
}