@extends('layouts.app')

@section('title', 'Clients index')

@section('body')
    <h1>MHenriquez clientes</h1>

    <table>
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
                    <td>{{ $client['id'] }}</td>
                    <td>{{ $client['name'] }}</td>
                    <td>{{ $client['email'] }}</td>
                    <td>{{ ($client['phone']) ? $client['phone'] : '-' }}</td>
                    <td>{{ ($client['address']) ? $client['address'] : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
