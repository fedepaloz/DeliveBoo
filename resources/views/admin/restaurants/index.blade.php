@extends('layouts.app')

@section('content')
    <h1 class="my-5">I tuoi ristoranti:</h1>
    
    <div class="card mb-3" style="height:400px; max-width: 100%;">
        <div class="row no-gutters">
            <div class="col-md-5">
                <img class="img-fluid" src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}">
            </div>
            <div class="col-md-7">
                <div class="card-body ml-5 mb-3">
                    <h3 class="card-title my-3">Nome: {{ $restaurant->name }}</h3>
                    <h5 class="card-text">Indirizzo: {{ $restaurant->address }}</h5>
                    <h5 class="card-text">Partita IVA: {{ $restaurant->vat_number }}</h5>
                    <h5 class="card-text">Telefono: {{ $restaurant->phone }}</h5>
                    <h5 class="card-text">Orario di apertura: {{ $restaurant->opening_time }}</h5>
                    <h5 class="card-text">Orario di chiusura: {{ $restaurant->closure_time }}</h5>
                    <h5 class="card-text">Ordine minimo: {{ $restaurant->min_order }}</h5>
                    <h5 class="card-text">Spese di consegna: {{ $restaurant->delivery_cost}}</h5>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="" class="btn btn-success mr-3" ><i class="fa-solid fa-bars"></i> Visualizza menu</a>
                    <a href="" class="btn btn-primary mr-5" ><i class="fa-solid fa-plus"></i> Aggiungi piatto</a>
                </div>
            </div>
        </div>
      </div>
@endsection
