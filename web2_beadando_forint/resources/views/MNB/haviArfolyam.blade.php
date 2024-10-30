@extends('layouts.app')
@section('content')
    <div class="container mt-4 my-5">
        <h2 class="text-center mb-4">Havi árfolyam</h2>
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

                <!-- Év -->
                <div class="col">
                    <label for="ev">Év:</label>
                    <input class="form-control" type="number" id="ev" name="ev" required>
                </div>

                <!-- Havi árfolyamok -->
                <div class="col">
                    <label for="havi">Hónap:</label>
                    <select class="form-control" id="havi" name="havi" required>
                        <option value="1">Január</option>
                        <option value="2">Február</option>
                        <option value="3">Március</option>
                        <option value="4">Április</option>
                        <option value="5">Május</option>
                        <option value="6">Június</option>
                        <option value="7">Július</option>
                        <option value="8">Augusztus</option>
                        <option value="9">Szeptember</option>
                        <option value="10">Október</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="col">
                    <br>
                    <button type="submit" class="btn btn-primary">Árfolyam lekérdezése</button>
                </div>
            </div>
            <br>
            <table class="table table-bordered" id="rates-table">
                <thead>
                    <tr>
                        <th>Dátum</th>
                        <th>Napi árfolyam</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </form>
        <canvas id="exchangeRateChart" width="400" height="200"></canvas>
    </div>

    <script>
        document.getElementById('exchange-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const currency = document.getElementById('deviza').value;
            const year = document.getElementById('ev').value;
            const month = document.getElementById('havi').value;
            console.log(`dev: ${currency}, ev: ${year}, ho: ${month}`);

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/mnb/getMonthlyRates', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ year: year, month: month, currency: currency })
            })
            .then(response => response.json())
            .then(data => {
                console.log(JSON.stringify(data));
                const tableBody = document.querySelector('#rates-table tbody');
                tableBody.innerHTML = '';

                //tábla feltöltés
                data.sort((a, b) => new Date(a.date) - new Date(b.date));
                data.forEach(item => {
                    const row = document.createElement('tr');
                    const dateCell = document.createElement('td');
                    const rateCell = document.createElement('td');

                    dateCell.textContent = item.date;
                    rateCell.textContent = item.rate;

                    row.appendChild(dateCell);
                    row.appendChild(rateCell);
                    tableBody.appendChild(row);
                });

                //diagramm feltöltés
                const labels = data.map(item => item.date);
                const values = data.map(item => parseFloat(item.rate.replace(',', '.'))); // tizedesvessző csere

                const ctx = document.getElementById('exchangeRateChart').getContext('2d');
                const exchangeRateChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Napi Árfolyamok',
                            data: values,
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1,
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: false,
                                min: 300,
                                max: 520, //ez még talán egy-két évig elég :) 
                                title: {
                                    display: true,
                                    text: 'Árfolyam (HUF)',
                                }, 
                                ticks: {
                                    stepSize: 5,
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Dátum',
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Hiba történt:', error);
                document.getElementById('exchange-result').textContent = 'Hiba a lekérdezés során';
            });
        });
    </script>
@endsection
