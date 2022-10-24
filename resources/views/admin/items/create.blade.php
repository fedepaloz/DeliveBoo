@extends('layouts.app')
@section('content')
@if (session('message'))
<div class="alert alert-{{ session('type') ?? 'info' }}">
    {{ session('message') }}
</div>
@endif
    @if ($errors->any())
        <div class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.items.store', $item) }}" enctype="multipart/form-data" method="POST" novalidate>
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">Nome piatto *</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $item->name) }}" required minlenght="5" maxlenght="50">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="description">Descrizione</label>
                    <textarea rows="6" class="form-control" id="description" name="description" required>{{ old('description', $item->description) }}</textarea>
                </div>
            </div>


            <div class="col-6">
                <div class="form-group">
                    <label for="visible">Disponibile</label>
                    <select class="form-control" id="visible" name="visible">
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="price">Prezzo</label>
                    <input type="text" class="form-control" id="price" name="price"
                        value="{{ old('price', $item->price) }}" required minlenght="5" maxlenght="50">
                </div>
            </div>

            <div class="col-10 my-4">
                <div class="form-group">
                    <label for="image">Inserisci il logo del tuo ristorante:</label>
                    <br>
                    <input type="file" id="image" name="image">
                </div>
            </div>
            {{-- TODO --}}
            {{-- <div class="col-1">
        <img class="img-fluid pt-4"
            src="{{ $post->image ? asset('storage/' . $post->image) : 'https://media.istockphoto.com/vectors/thumbnail-image-vector-graphic-vector-id1147544807?k=20&m=1147544807&s=612x612&w=0&h=pBhz1dkwsCMq37Udtp9sfxbjaMl27JUapoyYpQm0anc=' }}"
            alt="{{$post->image ? $post->title : 'placeholder'}}">
    </div> --}}
        </div>
        <p><strong>N.B. I campi contrassegnati dall'asterisco * sono obbligatori.</strong></p>
        <hr />

        <footer class="d-flex justify-content-end">
            <a class="btn btn-secondary mr-3" href="{{ route('admin.items.index') }}">
                <i class="fa-solid fa-rotate-left mr-2"></i> Indietro
            </a>
            <button class="btn btn-success " type="submit">
                <i class="fa-solid fa-floppy-disk mr-2"></i> Salva
            </button>
        </footer>
    </form>
@endsection
