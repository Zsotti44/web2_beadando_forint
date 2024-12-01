@extends('layouts.app')
@section('content')
    @livewire('rest-client', ['ermek' => $ermek])
@endsection
