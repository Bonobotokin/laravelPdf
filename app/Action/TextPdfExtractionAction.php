<?php

namespace App\Action;

use Illuminate\Support\Facades\DB;


class TextPdfExtractionAction
{

    public function saveText($request)
    {
        $data = DB::transaction(function () use ($request) {
        });

        return $data;
    }
}
