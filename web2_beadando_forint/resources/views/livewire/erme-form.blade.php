<div class="container my-4 ">
<h2 class="text-center mb-4">Érme Információk</h2>

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form wire:submit.prevent="generatePDF" class="p-4 bg-light border rounded">
        <!-- Érmék -->
        <div class="form-group">
            <label for="selectedErme">Érme Címletek:</label>
            <select wire:model.lazy="selectedErme" class="form-control" id="selectedErme">
                <option value="">Válasszon címletet</option>
                @foreach ($ermek as $erme)
                    <option value="{{ $erme->ermeid }}">{{ $erme->cimlet }} forint</option>
                @endforeach
            </select>
        </div>

        <!-- Anyagok -->
        <div class="form-group">
            <label for="selectedAnyag">Anyag Típusok:</label>
            <select wire:model="selectedAnyag" class="form-control" id="selectedAnyag">
                <option value="">Válasszon anyagot</option>
                @foreach ($filteredAnyagok as $anyag)
                    <option value="{{ $anyag->femid }}">{{ $anyag->femnev }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tervezők -->
        <div class="form-group">
            <label for="selectedTervezo">Tervezők:</label>
            <select wire:model="selectedTervezo" class="form-control" id="selectedTervezo">
                <option value="">Válasszon tervezőt</option>
                @foreach ($filteredTervezok as $tervezo)
                    <option value="{{ $tervezo->tid }}">{{ $tervezo->nev }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block my-4">PDF Generálása</button>
    </form>
</div>
