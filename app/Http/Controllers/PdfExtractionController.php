<?php

namespace App\Http\Controllers;

use App\Http\Requests\PdfExtractionRequest;
use App\Mail\PdfExtractionMail;
use App\Models\PdfExtraction;
use Spatie\PdfToText\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PdfExtractionController extends Controller
{

    public function extract(Request $request)
    {
        $dataSend = $request->validate([
            'pdfFile' => 'required|mimes:pdf|max:2048', // PDF validation rules
        ]);



        try {
            $pdfFilePath = $request->file('pdfFile')->getPathname();
            $pdfFileName = $request->file('pdfFile')->getClientOriginalName();

            // Use the Pdf::getText() method to directly extract text from the PDF
            $text = Pdf::getText($pdfFilePath);

            // Create a new PdfExtraction instance
            $pdfExtraction = PdfExtraction::create([
                'user_id' => auth()->user()->id,
                'titre' => $pdfFileName,
                'text' => $text,
            ]);

            Mail::send(new PdfExtractionMail(['titre' => $pdfExtraction['titre']]));

            return back()->with('text', $text)->with('pdfFileName', $pdfFileName);
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred during PDF processing.');
        }
    }
}
