@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.items.create') }}" class="btn btn-success mr-3"><i class="fa-solid fa-plus "></i> Crea
            articolo</a>
    </div>
    @foreach ($items as $item)
        <div class="card my-3">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="{{ $item->image }}" alt="{{ $item->name }}" class="p-3 img-fluid">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h1 class="card-title">{{ $item->name }} - €{{ $item->price }}</h1>
                        <div class="card-text my-3">
                            <p>Descrizione: {{ $item->description }}</p>
                            <h6>Data creazione: {{ $item->created_at }}</h6>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.items.show', $item) }}" class="btn btn-warning mr-3">
                                    <i class="fa-solid fa-eye "></i> Dettagli articolo</a>
                            </div>

                            <a href="{{ route('admin.items.edit', $item) }}" class="btn btn-primary mr-3"><i
                                    class="fa-solid fa-pen"></i> Modifica piatto</a>

                            <form action="{{ route('admin.items.destroy', $item->id) }} " method='POST'>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Sei sicuro di voler eliminare il piatto?')" class="btn btn-danger mr-3" type="submit">
                                    <i class="fa-solid fa-trash"></i> Elimina articolo
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </body>
@endsection
