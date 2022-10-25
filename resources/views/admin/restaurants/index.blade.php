@php
    

@endphp

@extends('layouts.app')

@section('content')


    <h1 class="my-5 text-center">Il tuo ristorante</h1>
    <div class="card mb-3" style="height:400px;">
        <div class="row no-gutters">
            <div class="col-md-4 d-flex align-items-center">
                <img class="p-4 align-items-center img-fluid"  src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}">
            </div>
            <div class="col-md-8">
                <div class="card-body ml-5 mb-3">
                    <h3 class="card-title my-3">Nome: {{ $restaurant->name }}</h3>
                    <h5 class="card-text">Indirizzo: {{ $restaurant->address }}</h5>
                    <h5 class="card-text">Partita IVA: {{ $restaurant->vat_number }}</h5>
                    <h5 class="card-text">Telefono: {{ $restaurant->phone }}</h5>
                    <h5 class="card-text">Orario di apertura: {{ $restaurant->opening_time }}</h5>
                    <h5 class="card-text">Orario di chiusura: {{ $restaurant->closure_time }}</h5>
                    <h5 class="card-text">Categoria: {{ $categories_string }}</h5>
                    <h6 class="card-text">Ordine minimo: €{{ $restaurant->min_order }}</h6>
                    <h6 class="card-text">Spese di consegna: €{{ $restaurant->delivery_cost }}</h6>
                </div>

                <div class="d-flex justify-content-end">
                    {{-- @dd($item) --}}
                    <a href="{{ route('admin.items.index') }}" class="btn btn-success mr-3"><i
                            class="fa-solid fa-bars"></i> Visualizza menu</a>
                    <a href="{{ route('admin.items.create') }}" class="btn btn-primary mr-5"><i
                            class="fa-solid fa-plus"></i> Aggiungi piatto</a>
                </div>
            </div>
        </div>
    </div>
@endsection
