@extends('layouts.app')
@section('content')

<h1>Anyagok Listája</h1>
    <ul>
        @foreach ($ermek as $erme)
            <li>{{ $erme->ermeid }} - {{ $erme->cimlet }} - {{ $erme->tomeg }} - {{ $erme->darab }}</li>
        @endforeach
    </ul>
@endsection
