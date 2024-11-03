@extends('layouts.app')

@section('content')
    @livewire('exchange-rate-chart')
    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                console.log("Livewire loaded");
            });
        </script>
    @endpush
@endsection
