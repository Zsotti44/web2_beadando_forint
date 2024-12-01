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
    }

    public function updatedSelectedErme($value)
    {
        if ($value) {
            $erme = Erme::with('anyagok', 'tervezok')->find($value);
            $this->filteredAnyagok = $erme ? $erme->anyagok : [];
            $this->filteredTervezok = $erme ? $erme->tervezok : [];
        } else {
            $this->filteredAnyagok = [];
            $this->filteredTervezok = [];
        }
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

        $this->redirect("/generate-pdf/{$this->selectedErme}/{$this->selectedAnyag}/{$this->selectedTervezo}");
    }

    public function render()
    {
        return view('livewire.erme-form', [
            'filteredAnyagok' => $this->filteredAnyagok,
            'filteredTervezok' => $this->filteredTervezok,
        ]);
    }
}
