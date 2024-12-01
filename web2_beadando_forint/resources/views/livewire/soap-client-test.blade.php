<div class="container my-5">
    <h2 class="mb-4">Adatok megjelenítése</h2>
    <div class="accordion" id="dataAccordion">
        <!-- Érmék -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingErme">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseErme">
                    Érmék
                </button>
            </h2>
            <div id="collapseErme" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <button wire:click="fetchErmek" class="btn btn-primary col-12">Érmék lekérdezése</button>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                        <tr>
                            <th>Érme ID</th>
                            <th>Címlet</th>
                            <th>Tömeg</th>
                            <th>Darabszám</th>
                            <th>Kiadás</th>
                            <th>Bevonás</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ermek as $erme)
                            <tr>
                                <td>{{ $erme['ermeid'] }}</td>
                                <td>{{ $erme['cimlet'] }}</td>
                                <td>{{ $erme['tomeg'] }}</td>
                                <td>{{ $erme['darab'] }}</td>
                                <td>{{ $erme['kiadas'] }}</td>
                                <td>{{ $erme['bevonas'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Anyag -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingAnyag">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAnyag">
                    Anyagok
                </button>
            </h2>
            <div id="collapseAnyag" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <button wire:click="fetchAnyagok" class="btn btn-primary col-12">Anyagok lekérdezése</button>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                        <tr>
                            <th>Fém ID</th>
                            <th>Fém Név</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($anyagok as $anyag)
                            <tr>
                                <td>{{ $anyag['femid'] }}</td>
                                <td>{{ $anyag['femnev'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tervezo -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTervezo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTervezo">
                    Tervezők
                </button>
            </h2>
            <div id="collapseTervezo" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <button wire:click="fetchTervezok" class="btn btn-primary col-12">Tervezők lekérdezése</button>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                        <tr>
                            <th>Tervező ID</th>
                            <th>Név</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tervezok as $tervezo)
                            <tr>
                                <td>{{ $tervezo['tid'] }}</td>
                                <td>{{ $tervezo['nev'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- AKod -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingAKod">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAKod">
                    AKod Kapcsolatok
                </button>
            </h2>
            <div id="collapseAKod" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <button wire:click="fetchAKodok" class="btn btn-primary col-12">A Kódok lekérdezése</button>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                        <tr>
                            <th>Érme ID</th>
                            <th>Fém ID</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($akodok as $akod)
                            <tr>
                                <td>{{ $akod['ermeid'] }}</td>
                                <td>{{ $akod['femid'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- TKod -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTKod">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTKod">
                    TKod Kapcsolatok
                </button>
            </h2>
            <div id="collapseTKod" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <button wire:click="fetchTKodok" class="btn btn-primary col-12">T Kódok lekérdezése</button>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                        <tr>
                            <th>Érme ID</th>
                            <th>Tervező ID</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tkodok as $tkod)
                            <tr>
                                <td>{{ $tkod['ermeid'] }}</td>
                                <td>{{ $tkod['tervezoid'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Összes Érme Információ -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingAllErmek">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAllErmek">
                    Összes Érme Információ
                </button>
            </h2>
            <div id="collapseAllErmek" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <button wire:click="getErmekWithAllInfo" class="btn btn-primary col-12">Összes Érme Információ lekérdezése</button>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                        <tr>
                            <th>Érme ID</th>
                            <th>Címlet</th>
                            <th>Tömeg</th>
                            <th>Darabszám</th>
                            <th>Kiadás</th>
                            <th>Bevonás</th>
                            <th>Anyagok</th>
                            <th>Tervezők</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ermek_ as $erme)
                            <tr>
                                <td>{{ $erme['ermeid'] }}</td>
                                <td>{{ $erme['cimlet'] }}</td>
                                <td>{{ $erme['tomeg'] }}</td>
                                <td>{{ $erme['darab'] }}</td>
                                <td>{{ $erme['kiadas'] }}</td>
                                <td>{{ $erme['bevonas'] }}</td>
                                <td>
                                    @foreach($erme['anyagok'] as $anyag)
                                        {{ $anyag['femid'] }} ({{ $anyag['femnev'] }})<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($erme['tervezok'] as $tervezo)
                                        {{ $tervezo['tid'] }} ({{ $tervezo['nev'] }})<br>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
