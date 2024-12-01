<div class="container mt-4 my-5">
    <h2 class="text-center mb-4">Havi árfolyam</h2>
    <div class="row">
        <!-- Devizanem -->
        <div class="col">
            <label for="deviza">Devizák:</label>
            <select wire:model="currencies" class="form-control" id="deviza" multiple required>
                <option value="">Válasszon devizanemet</option>
                @foreach ($devizak as $deviza)
                    <option value="{{ $deviza }}">{{ $deviza }}</option>
                @endforeach
            </select>
        </div>

        <!-- Év -->
        <div class="col">
            <label for="ev">Év:</label>
            <input wire:model="year" class="form-control" type="number" min="1956" max="2026" id="ev" required>
        </div>

        <!-- Hónap -->
        <div class="col">
            <label for="havi">Hónap:</label>
            <select wire:model="month" class="form-control" id="havi" required>
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
            <button wire:click="getRates" class="btn btn-primary">Árfolyam lekérdezése</button>
        </div>
    </div>

    <table class="table table-bordered mt-4">
        <thead>
        <tr>
            <th>Dátum</th>
            <th>Napi árfolyamok</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($rates as $date => $currencies)
            <tr>
                <td>{{ $date }}</td>
                <td>
                    @foreach ($currencies as $currency => $rate)
                        <div>{{ $currency }}: {{ $rate }}</div>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <canvas id="exchangeRateChart" width="400" height="200"></canvas>
</div>

@script
<script>
    document.addEventListener('livewire:initialized', function () {
        const ctx = document.getElementById('exchangeRateChart').getContext('2d');
        let exchangeRateChart;

        Livewire.on('ratesUpdated', rates => {
            console.log(rates);

            // Készítsünk egy üres adattáblát a diagramhoz
            const datasets = [];
            const currencyLabels = new Set(); // Halmozott deviza címkék

            // Iterálunk a dátumokon
            Object.keys(rates[0]).forEach(date => {
                console.log(date);
                Object.keys(rates[0][date]).forEach(currency => {
                    currencyLabels.add(currency);

                    // Ellenőrizzük, hogy már létezik-e a deviza a datasets tömbben
                    let dataset = datasets.find(ds => ds.label === currency);
                    if (!dataset) {
                        dataset = {
                            label: currency,
                            data: [],
                            borderColor: getRandomColor(),
                            fill: false,
                        };
                        datasets.push(dataset);
                    }

                    // Ellenőrizzük, hogy az érték egy string
                    let rateValue = rates[0][date][currency];
                    if (typeof rateValue === 'string') {
                        rateValue = parseFloat(rateValue.replace(',', '.')); // Csak ha string
                    } else if (typeof rateValue === 'number') {
                        rateValue = rateValue; // Ha már szám, hagyjuk úgy
                    }

                    // Hozzáadjuk az értéket a megfelelő dátumhoz
                    dataset.data.push({
                        x: new Date(date), // A dátumot Date objektummá alakítjuk
                        y: rateValue, // Az árfolyam
                    });
                });
            });

            // Frissítjük a diagramot
            if (exchangeRateChart) {
                exchangeRateChart.data.datasets = datasets;
                exchangeRateChart.update();
            } else {
                exchangeRateChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        datasets: datasets,
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                type: 'time',
                                time: {
                                    unit: 'day',
                                    tooltipFormat: 'll',
                                },
                                title: {
                                    display: true,
                                    text: 'Dátum',
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Árfolyam (HUF)',
                                },
                                beginAtZero: true, // Kezdje a 0-ról
                            }
                        }
                    }
                });
            }
        });

        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    });
</script>

@endscript
