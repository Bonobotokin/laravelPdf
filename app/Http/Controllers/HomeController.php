<?php

namespace App\Http\Controllers;

use App\Repository\PdfExtraireRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $pdfExtraireRepository;

    public function __construct(PdfExtraireRepository $pdfExtraireRepository)
    {
        $this->pdfExtraireRepository = $pdfExtraireRepository;
    }

    public function index(): View
    {
        $liste = $this->pdfExtraireRepository->getAll();


        return view(
            'home',
            [
                'liste' => $liste
            ]
        );
    }
}
