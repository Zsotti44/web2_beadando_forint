@extends('layouts.app')
@section('content')
    <div class="container mt-4 my-5">
        <h2 class="text-center mb-4">Napi árfolyam</h2>
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2" style="font-size: 1.5em;"></i>
            <div>
                <strong>Figyelem!</strong> A szolgáltatás csak hétköznapokra tud árfolyam adatokat megjeleníteni.
                Kérjük, válasszon hétköznapi dátumot.
            </div>
        </div>
        
        <form id="exchange-form" class="card p-3 mb-4">
            @csrf
            <div class="row">
                <!-- Devizanem -->
                <div class="col">
                    <label for="deviza">Devizák:</label>
                    <select class="form-control" id="deviza" name="deviza" required>
                        <option value="">Válasszon devizanemet</option>
                        @foreach ($devizak as $deviza)
                            <option value="{{ $deviza }}">{{ $deviza }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Dátum -->
                <div class="col">
                    <label for="datum">Dátum:</label>
                    <input class="form-control" type="date" id="datum" name="datum">
                </div>
                <div class="col">
                    <br>
                    <button type="submit" class="btn btn-primary">Árfolyam lekérdezése</button>
                </div>
                <div class="mt-3">
                    <strong id="exchange-result"></strong>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('exchange-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const date = document.getElementById('datum').value;
            const currency = document.getElementById('deviza').value;
            console.log(`date: ${date}, dev: ${currency}`);

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/mnb/getDailyRate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ date: date, currency: currency })
            })
            .then(response => response.json())
            .then(data => {
                if (data.rate) {
                    document.getElementById('exchange-result').textContent = `A ${date} napi ${currency} árfolyam: ${data.rate}Ft`;
                } else {
                    document.getElementById('exchange-result').textContent = `Nem található a megadott dátumra ${currency} árfolyam`;
                }
            })
            .catch(error => {
                console.error('Hiba történt:', error);
                document.getElementById('exchange-result').textContent = 'Hiba a lekérdezés során';
            });
        });
    </script>
@endsection
