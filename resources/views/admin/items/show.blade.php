@extends('layouts.app')

@section('content')
    <div class="card p-2" style="width: 18rem;">
        <img class="card-img-top" src="{{ $item->image }}" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-text">
                Nome Piatto: {{ $item->name }}
            </h4>
            <p class="card-text">
                Descrizione:{{ $item->description }}
            </p>
            <h5 class="card-text">
                Prezzo: {{ $item->price }} &euro;
            </h5>
            <h6 class="card-text">
                Data/Ora creazione: {{ $item->created_at }}
            </h6>
        </div>
    </div>
@endsection
