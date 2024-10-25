@extends('layouts.app')
@section('content')
    <div class="container mt-5 my-5">
        <h2 class="text-center mb-4">Érme Információk Lekérdezése</h2>
        <form action="{{ url('/generate-pdf') }}" method="POST" class="p-4 bg-light border rounded">
            @csrf

            <!-- Érmék -->
            <div class="form-group">
                <label for="ermeid">Érme Címletek:</label>
                <select class="form-control" id="ermeid" name="ermeid" required>
                    <option value="">Válasszon címletet</option>
                    @foreach ($ermek as $erme)
                        <option value="{{ $erme->ermeid }}">Címlet: {{ $erme->cimlet }} forint</option>
                    @endforeach
                </select>
            </div>

            <!-- Anyagok -->
            <div class="form-group">
                <label for="femid">Anyag Típusok:</label>
                <select class="form-control" id="femid" name="femid" required>
                    <option value="">Válasszon anyagot</option>
                    @foreach ($anyagok as $anyag)
                        <option value="{{ $anyag->femid }}">{{ $anyag->femnev }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tervező -->
            <div class="form-group">
                <label for="tid">Tervezők:</label>
                <select class="form-control" id="tid" name="tid" required>
                    <option value="">Válasszon tervezőt</option>
                    @foreach ($tervezok as $tervezo)
                        <option value="{{ $tervezo->tid }}">{{ $tervezo->nev }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block my-5">PDF Generálása</button>
        </form>
    </div>

@endsection
