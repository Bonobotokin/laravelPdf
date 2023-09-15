<?php

namespace App\Mail;

use App\Models\PdfExtraction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;

class PdfExtractionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfExtraction;

    /**
     * Create a new message instance.
     *
     * @param PDFExtraction $pdfExtraction
     */
    public function __construct(PdfExtraction $pdfExtraction)
    {
        $this->pdfExtraction = $pdfExtraction;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: '',
            subject: 'Pdf Extraction',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.pdf.extraction',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
