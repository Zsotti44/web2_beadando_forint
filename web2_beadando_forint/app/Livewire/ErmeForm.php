<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Erme;
use App\Models\Anyag;
use App\Models\Tervezo;
use TCPDF;

class ErmeForm extends Component
{
    public $selectedErme = null;
    public $selectedAnyag = null;
    public $selectedTervezo = null;

    public $ermek = [];
    public $anyagok = [];
    public $tervezok = [];
    public $filteredAnyagok = [];
    public $filteredTervezok = [];

    public function mount()
    {
        $this->ermek = Erme::all();
        $this->anyagok = Anyag::all();
        $this->tervezok = Tervezo::all();
    }

    public function updatedSelectedErme($value)
    {
        $this->filteredAnyagok = Erme::find($value)?->anyagok ?? [];
        $this->filteredTervezok = Erme::find($value)?->tervezok ?? [];
    }

    public function generatePDF()
    {
        $erme = Erme::find($this->selectedErme);
        $anyag = Anyag::find($this->selectedAnyag);
        $tervezo = Tervezo::find($this->selectedTervezo);

        if (!$erme || !$anyag || !$tervezo) {
            session()->flash('error', 'Kérjük, válasszon ki minden mezőt!');
            return;
        }

        $this->redirect("/generate-pdf/{$erme->id}/{$anyag->id}/{$tervezo->id}");
     /*   $html = view('PDF.layout', compact('erme', 'anyag', 'tervezo'))->render();

        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Forint');
        $pdf->SetTitle('Érme Információk');
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetAutoPageBreak(true, 10);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        return response($pdf->Output('erme_informaciok.pdf', 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="erme_informaciok.pdf"');*/
    }

    public function render()
    {
        return view('livewire.erme-form', [
            'filteredAnyagok' => $this->filteredAnyagok,
            'filteredTervezok' => $this->filteredTervezok,
        ]);
    }
}
