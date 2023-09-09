@extends('layouts.app')

@section('title', 'Clients index')

@section('body')
    <div class="container">
        <header class="my-3">
            <h1>MHenriquez clientes</h1>
        </header>

        <main>
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
                    @foreach ($data as $client)
                        <tr>
                            <th scope="row">{{ $client['id'] }}</th>
                            <td>{{ $client['name'] }}</td>
                            <td>{{ $client['email'] }}</td>
                            <td>{{ ($client['phone']) ? $client['phone'] : '-' }}</td>
                            <td>{{ ($client['address']) ? $client['address'] : '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>
@endsection
