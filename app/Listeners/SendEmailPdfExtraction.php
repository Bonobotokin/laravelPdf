<?php

namespace App\Listeners;

use Illuminate\Mail\Mailer;
use App\Mail\PdfExtractionMail;
use App\Events\PDFExtractionEvent;
use Illuminate\Support\Facades\Mail;
use App\Events\PdfExtractionRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailPdfExtraction
{
    /**
     * Create the event listener.
     */
    public function __construct(private Mailer $mailer)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PDFExtractionEvent $event)
    {
        $pdfExtraction = $event->pdfExtraction;
        $titre = $pdfExtraction->titre;

        // Affichez le titre sans utiliser dd()
        echo $titre;

        Mail::to(auth()->user()->email)->send(new PdfExtractionMail($pdfExtraction));
    }
}
