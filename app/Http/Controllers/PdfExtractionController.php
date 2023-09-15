<?php

namespace App\Http\Controllers;

use Spatie\PdfToText\Pdf;
use Illuminate\Http\Request;
use App\Models\PdfExtraction;
use App\Mail\PdfExtractionMail;
use App\Events\PDFExtractionEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
use App\Events\PdfExtractionRegistered;
use App\Http\Requests\PdfExtractionRequest;

class PdfExtractionController extends Controller
{

    public function extract(Request $request)
    {
        // Validation des données du formulaire
        $dataSend = $request->validate([
            'pdfFile' => 'required|mimes:pdf|max:2048', // Règles de validation du PDF
        ]);



        try {
            // Obtenez le chemin du fichier PDF et son nom
            $pdfFilePath = $request->file('pdfFile')->getPathname();
            $pdfFileName = $request->file('pdfFile')->getClientOriginalName();

            // Utilisez la méthode Pdf::getText() pour extraire directement le texte du PDF
            $text = Pdf::getText($pdfFilePath);

            // Créez une nouvelle instance de PdfExtraction
            $pdfExtraction = PDFExtraction::create([
                'user_id' => auth()->user()->id,
                'titre' => $pdfFileName,
                'text' => $text,
            ]);

            // Déclenchez un événement
            event(new PDFExtractionEvent($pdfExtraction));            // Créez une instance de PdfExtraction pour l'événement


            // Déclenchez l'événement PdfExtractionRegistered


            // Redirigez avec les données extraites vers la vue
            return back()->with('text', $text)->with('pdfFileName', $pdfFileName);
        } catch (\Exception $e) {
            dd($e);
            // En cas d'erreur, renvoyez un message d'erreur
            return back()->with('error', 'Une erreur s\'est produite lors du traitement du PDF.');
        }
    }
}
