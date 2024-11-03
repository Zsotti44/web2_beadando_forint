<div class="container mt-4 my-5">
    <h2 class="text-center mb-4">Havi árfolyam</h2>
        <div class="row">
            <!-- Devizanem -->
            <div class="col">
                <label for="deviza">Devizák:</label>
                <select wire:model="currency" class="form-control" id="deviza" required>
                    <option value="">Válasszon devizanemet</option>
                    @foreach ($devizak as $deviza)
                        <option value="{{ $deviza }}">{{ $deviza }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Év -->
            <div class="col">
                <label for="ev">Év:</label>
                <input wire:model="year" class="form-control" type="number" id="ev" required>
            </div>
             {{$month}}
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
            <th>Napi árfolyam</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($rates as $rate)
            <tr>
                <td>{{ $rate['date'] }}</td>
                <td>{{ $rate['rate'] }}</td>
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
            const labels = rates[0].map(rate => rate.date);
            const values = rates[0].map(rate => parseFloat(rate.rate));
            console.log(values)
            const minValue = Math.min(...values) - 5;
            const maxValue = Math.max(...values) + 5;

            if (exchangeRateChart) {
                exchangeRateChart.data.labels = labels;
                exchangeRateChart.data.datasets[0].data = values;
                exchangeRateChart.options.scales.y.min = minValue;
                exchangeRateChart.options.scales.y.max = maxValue;
                exchangeRateChart.update();
            } else {
                exchangeRateChart = new Chart(ctx, {
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
                                min: minValue,
                                max: maxValue,
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
            }
        });
    });
</script>
@endscript
