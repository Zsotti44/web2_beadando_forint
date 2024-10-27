<?php

namespace App\Livewire;
use Livewire\WithoutUrlPagination;

use App\Models\Erme;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Ermek extends Component
{
    use WithPagination,WithoutUrlPagination;

    public $search = "";
    public $ermek_;
    public function mount()
    {
    }

    public function update()
    {
        $this->resetPage();
    }
    public function render(Request $request)
    {
        return view('livewire.ermek', ['ermek' => Erme::with(['anyagok', 'tervezok'])
            ->when(!empty($this->search), function ($query) {
                $search = $this->search;
                $query->where('cimlet', 'like', "%{$search}%")
                    ->orWhereHas('anyagok', function ($q) use ($search) {
                        $q->where('femnev', 'like', "%{$search}%");
                    })
                    ->orWhereHas('tervezok', function ($q) use ($search) {
                        $q->where('nev', 'like', "%{$search}%");
                    });
            })
            ->cursorPaginate(10) ]);
    }
}
