<?php

namespace App\Http\Controllers;

use App\Action\TextPdfExtractionAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PdfExtractionController extends Controller
{
    public function extract(Request $request, TextPdfExtractionAction $action)
    {
        try {
            $response = $action->saveText($request);

            if (!is_null($response['data'])) {

                return redirect()->route('home', ['response' => $response])->with('success', $response['message']);
            }
            return redirect()->back()->withErrors($response)->withInput();
        } catch (\Exception $e) {
            dd($e);
            Log::error('Erreur lors de l\'extraction PDF: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'Une erreur est survenue lors du traitement. Veuillez réessayer plus tard.');
        }
    }
}
