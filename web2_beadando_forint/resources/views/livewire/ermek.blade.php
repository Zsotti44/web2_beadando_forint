<div class="container my-4 ">
    <h2 class="mb-4">Mindenkori érmék legérdekesebb tulajdonságai</h2>
    <form wire:submit="update">
    <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Keresés címlet, anyag vagy tervező alapján" wire:model="search">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Keresés</button>
            </div>
        </div>
        <div wire:loading>
            Betöltés...
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Címlet</th>
                <th>Tömeg (g)</th>
                <th>Darabszám</th>
                <th>Kiadás Dátuma</th>
                <th>Bevonás Dátuma</th>
                <th>Anyagok</th>
                <th>Tervezők</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ermek as $erme)
                <tr>
                    <td>{{ $erme->ermeid }}</td>
                    <td>{{ $erme->cimlet }}</td>
                    <td>{{ $erme->tomeg }}</td>
                    <td>{{ number_format(intval($erme->darab),0,'.',' ') }}</td>
                    <td>{{ $erme->kiadas ? $erme->kiadas : '-' }}</td>
                    <td>{{ $erme->bevonas ? $erme->bevonas : '-' }}</td>
                    <td>
                        @foreach($erme->anyagok as $anyag)
                            {{ $anyag->femnev }},
                        @endforeach
                    </td>
                    <td>
                        @foreach($erme->tervezok as $tervezo)
                            {{ $tervezo->nev }},
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Lapozás -->
    <div class="d-flex justify-content-center mt-4">
        {{ $ermek->links() }}
    </div>
</div>
