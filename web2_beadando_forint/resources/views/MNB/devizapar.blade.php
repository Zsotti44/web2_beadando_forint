@extends('layouts.app')
@section('content')
    <div class="container mt-5 my-5">
        <h2 class="text-center mb-4">Devizapárok</h2>
        <form id="exchange-form" class="p-4 bg-light border rounded">
            @csrf

            <!-- Devizanem -->
            <div class="form-group">
                <label for="deviza1">Deviza 1</label>
                <select class="form-control" id="deviza1" name="deviza1" required>
                    <option value="">Válasszon devizanemet</option>
                    @foreach ($devizak as $deviza)
                        <option value="{{ $deviza }}">{{ $deviza }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Devizanem -->
            <div class="form-group">
                <label for="deviza2">Deviza 2</label>
                <select class="form-control" id="deviza2" name="deviza2" required>
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
        <p id=exchange-result>

        </p>
    </div>

    <script>
        document.getElementById('exchange-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const date = document.getElementById('datum').value;
            const currency1 = document.getElementById('deviza1').value;
            const currency2 = document.getElementById('deviza2').value;
            console.log(`date: ${date}, dev1: ${currency1}, dev2: ${currency2}`);

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/mnb/getCurrencyPair', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ date: date, currency1: currency1, currency2 : currency2 })
            })
            .then(response => response.json())
            .then(data => {
                console.log(`megjott a valasz: ${JSON.stringify(data)}`);
                console.log('valami');
                if (data.rate1) {
                    console.log('belep');
                    document.getElementById('exchange-result').innerHTML = `<h2>A devizapár ${date} napi árfolyama:</h2><br>
                        <h3>${currency1}-${currency2} : ${data.rate1}${currency2}<h3> 
                        <h3>${currency2}-${currency1} : ${data.rate2}${currency1}<h3>`;
                } else {
                    document.getElementById('exchange-result').innerHTML = `<h2>Nem található a megadott dátumra ${currency} árfolyam</h2>`;
                } 
            })
            .catch(error => {
                console.error('Hiba történt:', error);
                document.getElementById('exchange-result').innerHTML = '<h2>Hiba a lekérdezés során, kérjük próbálja meg újra.</h2>';
            });
        });
    </script>
@endsection
