<?php

namespace App\Http\Controllers;

use Spatie\PdfToText\Pdf;
use Illuminate\Http\Request;

class PdfExtractionController extends Controller
{
    public function extract(Request $request)
    {
        $request->validate([
            'pdfFile' => 'required|mimes:pdf|max:2048', // PDF validation rules
        ]);

        try {
            $pdfFilePath = $request->file('pdfFile')->getPathname();

            $pdf = Pdf::getText($pdfFilePath);
            dd($pdf);
            // $text = $pdf->text();

            return back()->with('text', $text);
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during PDF processing
            return back()->with('error', 'An error occurred during PDF processing.');
        }
    }
}
