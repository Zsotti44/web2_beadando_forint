
<div class="container mt-4 my-5">
    <h2 class="mb-4">MNB Árfolyam Lekérdezés</h2>
    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2" style="font-size: 1.5em;"></i>
        <div>
            <strong>Figyelem!</strong> A szolgáltatás csak hétköznapokra tud árfolyam adatokat megjeleníteni.
            Kérjük, válasszon hétköznapi dátumot.
        </div>
    </div>
    <div class="card p-3 mb-4">
        <h4>Napi Árfolyam</h4>
        <div class="row">
            <div class="col">
                <select wire:model="currency" class="form-control">
                    <option value="" disabled>Kérlek válassz devizát</option>
                    @foreach($availableCurrencies as $currencyOption)
                        <option value="{{ $currencyOption }}">{{ $currencyOption }}</option>
                    @endforeach
                </select>

            </div>
            <div class="col">
                <input type="date" wire:model="date" class="form-control">
            </div>
            <div class="col">
                <button wire:click="getDailyRate" class="btn btn-primary">Keresés</button>
            </div>
        </div>
        @if($dailyRate)
            <div class="mt-3">
                <strong>Árfolyam:</strong> {{ $dailyRate }}
            </div>
        @endif
    </div>

    <div class="card p-3">
        <h4>Havi Árfolyam</h4>
        <div class="row">
            <div class="col">
                <input type="text" wire:model="currency" class="form-control" placeholder="Pl. EUR">
            </div>
            <div class="col">
                <input type="number" wire:model="year" class="form-control" placeholder="Év (Pl. 2024)">
            </div>
            <div class="col">
                <input type="number" wire:model="month" class="form-control" placeholder="Hónap (1-12)">
            </div>
            <div class="col">
                <button wire:click="getMonthlyRates" class="btn btn-primary">Lekérdezés</button>
            </div>
        </div>

        @if(count($monthlyRates) > 0)
            <table class="table table-striped mt-3">
                <thead>
                <tr>
                    <th>Dátum</th>
                    <th>Árfolyam</th>
                </tr>
                </thead>
                <tbody>
                @foreach($monthlyRates as $rate)
                    <tr>
                        <td>{{ $rate['date'] ?? 'N/A' }}</td>
                        <td>{{ $rate['rate'] ?? $rate['error'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
