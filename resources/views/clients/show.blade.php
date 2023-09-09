@extends('layouts.app')

@section('title', 'Clients show')

@section('body')
    <div class="container">
        <header class="my-3">
            <h1>Detalles del cliente: {{ $client['name'] }}</h1>
        </header>

        <main>
            <a href="{{ route('clients.index') }}" class="btn btn-primary mb-3" role="button">
                Volver
            </a>

            <hr>

            <ul>
                <li>Nombre: {{ $client['name'] }}</li>
                <li>Email: {{ $client['email'] }}</li>
                <li>Teléfono: {{ ($client['phone']) ? $client['phone'] : 'Sin información' }}</li>
                <li>Dirección: {{ ($client['address']) ? $client['address'] : 'Sin información' }}</li>
            </ul>
        </main>
    </div>
@endsection
