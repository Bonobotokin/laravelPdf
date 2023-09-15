<?php

namespace App\Http\Controllers;

use App\Action\TextPdfExtractionAction;
use Illuminate\Http\Request;

class PdfExtractionController extends Controller
{

    public function extract(Request $request, TextPdfExtractionAction $action)
    {
        $response_action = $action->saveText($request);

        if (!$response_action['data']) {
            abort(404, 'Erreur de traitement, veuillez ressaaillez.');
        }

        return redirect()->route('home', ['reponse' => $response_action])->with('success', $response_action['message']);
    }
}
