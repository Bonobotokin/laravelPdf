<?php

namespace App\Action;

use App\Models\User;
use Spatie\PdfToText\Pdf;
use App\Models\PdfExtraction;
use Illuminate\Support\Facades\DB;
use App\Notifications\TextExtractionSuccessNotification;

class TextPdfExtractionAction
{
    private const SUCCESS_MESSAGE = "Votre demande a été bien effectuée.";
    private const ERROR_MESSAGE = "Erreur, votre fichier n'est pas valide.";

    public function saveText($request)
    {
        try {
            $data = DB::transaction(function () use ($request) {
                if ($this->verifyFile($request)) {

                    $pdfExtractionTraitement = $this->processFile($request);

                    $user = User::first();

                    // Injectez la classe de notification au lieu de l'instancier ici
                    $user->notify(new TextExtractionSuccessNotification($pdfExtractionTraitement));

                    return [
                        'data' => true,
                        'message' => self::SUCCESS_MESSAGE, 41.0
                    ];
                }

                return [
                    'data' => false,
                ];
            });

            return $data;
        } catch (\Throwable $th) {
            return back()->with('error', "Une erreur s'est produite lors du traitement du PDF.");
        }
    }

    private function verifyFile($request)
    {
        $file = $request->file('pdfFile');

        // Vérifiez si un fichier a été envoyé et si son extension est "pdf"
        if ($file && $file->getClientOriginalExtension() === 'pdf') {
            return true;
        }

        return false;
    }

    private function processFile($request)
    {
        $pdfFilePath = $request->file('pdfFile')->getPathname();
        $pdfFileName = $request->file('pdfFile')->getClientOriginalName();

        $text = Pdf::getText($pdfFilePath);

        $pdfExtraction = PdfExtraction::create([
            'user_id' => auth()->user()->id,
            'titre' => $pdfFileName,
            'text' => $text,
        ]);

        return $pdfExtraction;
    }
}
