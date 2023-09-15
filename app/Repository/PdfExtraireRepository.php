<?php

namespace App\Repository;

use App\Interfaces\PdfExtraireInterface;
use App\Models\PdfExtraction;

class PdfExtraireRepository implements PdfExtraireInterface
{
    public function getAll()
    {

        $data = PdfExtraction::all();

        return $data;
    }
}
