<?php

namespace App\Http\Controllers;
use App\Models\Erme;
use App\Models\Anyag;
use App\Models\Tervezo;
use TCPDF;

class PdfController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('PDF.pdf');
    }

    public function generatePDF($ermeid, $femid, $tid)
    {
        error_log($ermeid);
        error_log($femid);
        error_log($tid);
        // A modellek keresése
        $erme = Erme::findOrFail($ermeid);
        $anyag = Anyag::findOrFail($femid);
        $tervezo = Tervezo::findOrFail($tid);

        // HTML nézet generálása
        $html = view('PDF.layout', compact('erme', 'anyag', 'tervezo'))->render();

        // TCPDF PDF generálása
        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Forint');
        $pdf->SetTitle('Érme Információk');
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetAutoPageBreak(true, 10);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');

        // PDF válasz visszaadása
        return response($pdf->Output('erme_informaciok.pdf', 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="erme_informaciok.pdf"');
    }

}
