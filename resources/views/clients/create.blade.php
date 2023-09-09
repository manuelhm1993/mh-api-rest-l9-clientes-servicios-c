@extends('layouts.app')

@section('title', 'Clients create')

@section('body')
    <div class="container">
        <header class="my-3">
            <h1>Crear nuevo cliente</h1>
        </header>

        <main>
            <a href="{{ route('clients.index') }}" class="btn btn-primary mb-3" role="button">
                Volver
            </a>

            <form action="{{ route('clients.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="phone" placeholder="Teléfono">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="address" placeholder="Dirección">
                </div>

                <button type="submit" role="button" class="btn btn-success">
                    Enviar
                </button>
            </form>
        </main>
    </div>
@endsection
