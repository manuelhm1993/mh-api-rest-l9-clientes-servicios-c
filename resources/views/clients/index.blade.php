@extends('layouts.app')

@section('title', 'Clients index')

@section('body')
    <div class="container">
        @if(session('status'))
            @if (session('status') === 'Éxito')
            <div class="alert alert-success my-3 alert-dismissible fade show" role="alert">
                <strong>¡{{ session('status') }}!</strong> {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @else
            <div class="alert alert-danger my-3 alert-dismissible fade show" role="alert">
                <strong>¡{{ session('status') }}!</strong> {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        @endif

        <header class="my-3">
            <h1>MHenriquez clientes</h1>
        </header>

        <main>
            <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3" role="button">
                Crear cliente
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $client)
                        <tr>
                            <th scope="row">{{ $client['id'] }}</th>
                            <td>{{ $client['name'] }}</td>
                            <td>{{ $client['email'] }}</td>
                            <td>{{ ($client['phone']) ? $client['phone'] : '-' }}</td>
                            <td>{{ ($client['address']) ? $client['address'] : '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <th scope="row" colspan="5">No hay clientes que mostrar</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </main>
    </div>
@endsection
