<?php

namespace App\Notifications;

use App\Models\PdfExtraction;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TextExtractionSuccessNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $pdfExtraction;

    public function __construct(PdfExtraction $pdfExtraction)
    {
        $this->pdfExtraction = $pdfExtraction;
        // dd($this->pdfExtraction);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        sleep(2);
        return (new MailMessage)
            ->line('L\'extraction de texte à partir du PDF a été effectuée avec succès.')
            ->action('Voir le résultat', url('/'))
            ->line('Merci d\'utiliser notre service !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
