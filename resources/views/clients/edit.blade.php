@extends('layouts.app')

@section('title', 'Clients create')

@section('body')
    <div class="container">
        <header class="my-3">
            <h1>Actualizar cliente</h1>
        </header>

        <main>
            <a href="{{ route('clients.index') }}" class="btn btn-primary mb-3" role="button">
                Volver
            </a>

            <form action="{{ route('clients.update', $client['id']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ $client['name'] }}" required>
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $client['email'] }}" required>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="phone" placeholder="Teléfono" value="{{ $client['phone'] }}">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="address" placeholder="Dirección" value="{{ $client['address'] }}">
                </div>

                <button type="submit" role="button" class="btn btn-warning">
                    Actualizar
                </button>
            </form>
        </main>
    </div>
@endsection
