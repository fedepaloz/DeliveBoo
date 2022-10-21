@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.restaurants.store') }}" enctype="multipart/form-data" method="POST" novalidate>
        @csrf
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="name">Nome ristorante *</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $restaurant->name) }}">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="category_id">Categoria *</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Nessuna categoria</option>
                        @foreach ($categories as $category)
                            <option @if (old('category_id', $restaurant->category_id) == $category->id) selected @endif value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="image">Immagine</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
            {{-- <div class="col-1">
        <img class="img-fluid pt-4"
            src="{{ $post->image ? asset('storage/' . $post->image) : 'https://media.istockphoto.com/vectors/thumbnail-image-vector-graphic-vector-id1147544807?k=20&m=1147544807&s=612x612&w=0&h=pBhz1dkwsCMq37Udtp9sfxbjaMl27JUapoyYpQm0anc=' }}"
            alt="{{$post->image ? $post->title : 'placeholder'}}">
    </div> --}}
            <div class="col-6">
                <div class="form-group">
                    <label for="vat_number">Partita IVA *</label>
                    <input type="text" class="form-control" id="vat_number" name="vat_number"
                        value="{{ old('vat_number', $restaurant->vat_number) }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="phone">Telefono *</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                        value="{{ old('phone', $restaurant->phone) }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="address">Indirizzo *</label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="{{ old('address', $restaurant->address) }}">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="opening_time">Orario di apertura *</label>
                    <input type="time" class="form-control" id="opening_time" name="opening_time"
                        value="{{ old('opening_time', $restaurant->opening_time) || '11:30' }}">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="closure_time">Orario di chiusura *</label>
                    <input type="time" class="form-control" id="closure_time" name="closure_time"
                        value="{{ old('closure_time', $restaurant->closure_time) || '24:00' }}">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="min_order">Ordine minimo (in euro)</label>
                    <input type="number" class="form-control" id="min_order" name="min_order"
                        value="{{ old('min_order', $restaurant->min_order) }}">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="delivery_cost">Spese di consegna (in euro)</label>
                    <input type="number" class="form-control" id="delivery_cost" name="delivery_cost"
                        value="{{ old('delivery_cost', $restaurant->delivery_cost) }}">
                </div>
            </div>
        </div>
        <p><strong>N.B. I campi contrassegnati dall'asterisco * sono obbligatori.</strong></p>
        <hr />

        <footer class="d-flex justify-content-between">
            <a class="btn btn-secondary" href="{{ route('admin.restaurants.index') }}">
                <i class="fa-solid fa-rotate-left mr-2"></i> Indietro
            </a>
            <button class="btn btn-success" type="submit">
                <i class="fa-solid fa-floppy-disk mr-2"></i> Salva
            </button>
        </footer>
    </form>
@endsection
