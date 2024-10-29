@extends('layouts.app')
@section('content')
    <div class="container mt-5 my-5">
        <h2 class="text-center mb-4">Napi árfolyam</h2>
        <form id="exchange-form" class="p-4 bg-light border rounded">
            @csrf

            <!-- Devizanem -->
            <div class="form-group">
                <label for="deviza">Devizák:</label>
                <select class="form-control" id="deviza" name="deviza" required>
                    <option value="">Válasszon devizanemet</option>
                    @foreach ($devizak as $deviza)
                        <option value="{{ $deviza }}">{{ $deviza }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Dátum -->
            <div class="form-group">
                <label for="datum">Dátum:</label>
                <input class="form-control" type="date" id="datum" name="datum">
            </div>

            <button type="submit" class="btn btn-primary btn-block my-5">Árfolyam lekérdezése</button>
        </form>
        <br>
        <h2 id="exchange-result"></h2>
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
