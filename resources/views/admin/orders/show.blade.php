@extends('layouts.app')

@section('content')
    <table class="table table-info">
        <thead>
            <tr class="table-light">
                <th scope="col">ORDINE N.</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Email</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->first_name }}</td>
                <td>{{ $order->last_name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->delivery_address }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
        </tbody>
    </table>
@endsection
