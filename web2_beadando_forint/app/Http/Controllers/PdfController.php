<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Erme;
use App\Models\Anyag;
use App\Models\Tervezo;
use TCPDF;


class PdfController extends Controller
{
    public function __construct()
    {
    }
    public function index(){

        $ermek = Erme::all();
        $anyagok = Anyag::all();
        $tervezok = Tervezo::all();
        return view('pdf.pdf', compact('ermek', 'anyagok', 'tervezok'));
    }
    public function generatePDF(Request $request)
    {
        $erme = Erme::find($request->input('ermeid'));
        $anyag = Anyag::find($request->input('femid'));
        $tervezo = Tervezo::find($request->input('tid'));

        // Nézet renderelése HTML-be
        $html = view('pdf.layout', compact('erme', 'anyag', 'tervezo'))->render();

        // TCPDF inicializálása és beállítása
        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Forint');
        $pdf->SetTitle('Érme Információk');
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetAutoPageBreak(TRUE, 10);
        $pdf->AddPage();

        // HTML hozzáadása a TCPDF-hez
        $pdf->writeHTML($html, true, false, true, false, '');

        // PDF letöltése
        $pdf->Output('erme_informaciok.pdf', 'D');
    }

}
