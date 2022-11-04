@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-end mb-3">
    <a href="{{ route('admin.orders.index') }}" class="btn btn-warning">
        <i class="fa-solid fa-arrow-left"></i> Torna agli ordini
    </a>
</div>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Ordine N.</th>
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

    <table class="table">

    <thead class="thead-light">
        <tr>
        <th scope="col">Quantità</th>
        <th scope="col">Piatto</th>
        <th scope="col">Prezzo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->items as $item)
        <tr>
            <td>{{ $item->pivot->quantity }}x</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price * $item->pivot->quantity }} €</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="1"></td>
            <td>Spese di spedizione</td>
            <td>
                {{ $delivery_cost }} €
            </td>
        </tr>
        <tr>
            <td colspan="1"></td>
            <td><strong>Totale</strong></td>
            <td><strong>{{ $total }} €</strong></td>
        </tr>
    </tbody>
</table>
@endsection
