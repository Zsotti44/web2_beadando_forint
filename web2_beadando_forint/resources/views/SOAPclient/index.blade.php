@extends('layouts.app')
@section('content')
    <div class="container mt-4 my-5">
        <h2 class="text-center mb-4">SOAP szolgáltatással elérhető adathalmazok</h2>
        <form id="data-form" class="card p-3 mb-4">
            @csrf
            <div class="row">

                <!-- Adathalmaz -->
                <div class="col">
                    <label for="adathalmaz">Elérhető adathalmazok:</label>
                    <select class="form-control" id="adathalmaz" name="adathalmaz" required>
                        <option value="erme">Érmék</option>
                        <option value="tervezo">Tervezők</option>
                        <option value="anyag">Anyagok</option>
                    </select>
                </div>

                <div class="col">
                    <br>
                    <button type="submit" class="btn btn-primary">Adatok megjelenítése</button>
                </div>
            </div>
            <br>
            <div id="results">

            </div>
        </form>
    </div>
    <script>
        document.getElementById('data-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const dataSet = document.getElementById('adathalmaz').value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const dataSets = {
                erme: 'Érmék',
                tervezo: 'Tervezők',
                anyag: 'Anyagok:',
            }
            const nameOfDataSet = dataSets[dataSet];

            const columns = {
                erme: ['Érme azonosító', 'Címlet', 'Tömeg', 'Darabszám', 'Kiadás', 'Bevonás'],
                tervezo: ['Tervező azonosító', 'Név'],
                anyag: ['Anyag azonosító', 'Megnevezés'],
            };

            const usedColumns = columns[dataSet];

            fetch(`/api/${dataSet}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(JSON.stringify(data));

                let table = '<table class="table table-bordered" id="rates-table"><thead><tr>';
                    usedColumns.forEach(column => {
                        table += `<th>${column}</th>`;
                    });
                    table += '</tr></thead><tbody>';
                    data.forEach(item => {
                        table += '<tr>';
                        Object.values(item).forEach(value => {
                            table += `<td>${ (value === undefined || value === null) ? '' : value}</td>`;
                        });
                        table += '</tr>';
                    });
                    table += '</tbody></table>';
                    document.getElementById('results').innerHTML = `<strong>${nameOfDataSet}</strong> ${table}`;
            })
            .catch(error => {
                console.error('Hiba történt:', error);
                document.getElementById('results').innerHTML = '<strong>Hiba történt az adatok lekérdezése során</strong>';
            });
        });
    </script>
@endsection




