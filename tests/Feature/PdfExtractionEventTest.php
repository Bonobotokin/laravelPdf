<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use App\Events\PdfExtractionRegistered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\PdfExtraction;
use Database\Factories\PdfExtractionFactory;
use Faker\Factory;

class PdfExtractionEventTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testPdfExtractionEvent()
    {
        Event::fake();

        // Simuler la création d'une instance de PdfExtraction
        $pdfExtraction = PdfExtractionFactory::new()->create(); // Utilisez PdfExtractionFactory::new()

        // Déclencher l'événement PdfExtractionRegistered
        event(new PdfExtractionRegistered($pdfExtraction));

        // Vérifier si l'événement a été déclenché
        Event::assertDispatched(PdfExtractionRegistered::class, function ($e) use ($pdfExtraction) {
            return $e->pdfExtraction->id === $pdfExtraction->id;
        });
    }
}
