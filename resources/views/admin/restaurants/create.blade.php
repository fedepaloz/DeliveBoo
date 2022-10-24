@extends('layouts.app')

@section('extra-js')
    <script src="{{ asset('js/res-form-validation.js') }}" defer></script>
@endsection

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

    <form id="restaurant-form" action="{{ route('admin.restaurants.store') }}" enctype="multipart/form-data" method="POST" novalidate>
        @csrf
        <div class="row mt-5">
            <div class="col-8">
                <div class="form-group">
                    <label for="name">Nome ristorante *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $restaurant->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $restaurant->name) }}">
                    <div id="name-feedback" class="invalid-feedback">Il campo "Nome ristorante" non può essere vuoto</div> --}}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="category_id">Categoria *</label>
                    <select class="form-control @error('category') is-invalid @enderror" id="category_id"
                        name="category_id">
                        <option value="">Nessuna categoria</option>
                        @foreach ($categories as $category)
                            <option @if (old('category_id', $restaurant->category_id) == $category->id) selected @endif value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                            @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endforeach
                    </select>
                    <div id="category-feedback" class="invalid-feedback">Selezionare una categoria</div>
                </div>
            </div>
            
            <div class="col-3">
                <div class="form-group">
                    <label for="vat_number">Partita IVA *</label>
                    <input type="text" class="form-control @error('vat_number') is-invalid @enderror" id="vat_number"
                        name="vat_number" value="{{ old('vat_number', $restaurant->vat_number) }}">
                    @error('vat_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- <input type="text" class="form-control" id="vat_number" name="vat_number"
                    value="{{ old('vat_number', $restaurant->vat_number) }}">
                    <div id="vat-feedback" class="invalid-feedback">Il campo "Partita IVA" non può essere vuoto</div> --}}

                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="phone">Telefono *</label>

                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone"
                        name="phone" value="{{ old('phone', $restaurant->phone) }}">
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- <input type="tel" class="form-control" id="phone" name="phone"
                    value="{{ old('phone', $restaurant->phone) }}">
                    <div id="phone-feedback" class="invalid-feedback">Il campo "Telefono" non può essere vuoto</div> --}}

                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="address">Indirizzo *</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" value="{{ old('address', $restaurant->address) }}">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- <input type="text" class="form-control" id="address" name="address"
                    value="{{ old('address', $restaurant->address) }}">
                    <div id="address-feedback" class="invalid-feedback">Il campo "Indirizzo" non può essere vuoto</div> --}}

                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="opening_time">Orario di apertura *</label>
                    <input type="time" class="form-control @error('opening_time') is-invalid @enderror" id="opening_time"
                        name="opening_time" value="{{ old('opening_time', $restaurant->opening_time) || '11:30' }}">
                    @error('opening_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- <input type="time" class="form-control" id="opening_time" name="opening_time"
                    value="{{ old('opening_time', $restaurant->opening_time) || '11:30' }}">
                    <div id="opening-feedback" class="invalid-feedback">Il campo "Orario di apertura" non può essere vuoto</div> --}}

                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="closure_time">Orario di chiusura *</label>
                    <input type="time" class="form-control @error('closure_time') is-invalid @enderror" id="closure_time"
                        name="closure_time" value="{{ old('closure_time', $restaurant->closure_time) || '24:00' }}">
                    @error('closure_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- <input type="time" class="form-control" id="closure_time" name="closure_time"
                    value="{{ old('closure_time', $restaurant->closure_time) || '24:00' }}">
                    <div id="closure-feedback" class="invalid-feedback">Il campo "Orario di chiusura" non può essere vuoto</div> --}}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="min_order">Ordine minimo * (in euro)</label>
                    <input type="number" class="form-control @error('min_order') is-invalid @enderror" id="min_order"
                        name="min_order" value="{{ old('min_order', $restaurant->min_order) }}">
                    @error('min_order')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- <input type="number" class="form-control" id="min_order" name="min_order"
                    value="{{ old('min_order', $restaurant->min_order) }}">
                    <div id="min-feedback" class="invalid-feedback">Il campo "Ordine minimo" non può essere vuoto</div> --}}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="delivery_cost">Spese di consegna * (in euro)</label>
                    <input type="number" class="form-control @error('delivery_cost') is-invalid @enderror"
                        id="delivery_cost" name="delivery_cost"
                        value="{{ old('delivery_cost', $restaurant->delivery_cost) }}">
                    @error('delivery_cost')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- <input type="number" class="form-control" id="delivery_cost" name="delivery_cost"
                    value="{{ old('delivery_cost', $restaurant->delivery_cost) }}">
                    <div id="dcost-feedback" class="invalid-feedback">Il campo "Spese di consegna" non può essere vuoto</div> --}}
                </div>
            </div>

            <div class="col-10 my-4">
                <div class="form-group">
                    <label for="image">Inserisci il logo del tuo ristorante:</label>
                    <br>
                    <input class="" type="file" id="image" name="image">
                </div>
            </div>
            <div class="col-1">
                {{-- <img class="img-fluid pt-4"
            src="{{ $post->image ? asset('storage/' . $post->image) : 'https://media.istockphoto.com/vectors/thumbnail-image-vector-graphic-vector-id1147544807?k=20&m=1147544807&s=612x612&w=0&h=pBhz1dkwsCMq37Udtp9sfxbjaMl27JUapoyYpQm0anc=' }}"
            alt="{{$post->image ? $post->title : 'placeholder'}}"> --}}
            </div>
        </div>

        <p><strong>N.B. I campi contrassegnati dall'asterisco * sono obbligatori.</strong></p>
        <hr />

        <footer class="d-flex justify-content-end">
            {{-- <a class="btn btn-secondary" href="{{ route('admin.restaurants.index') }}">
                <i class="fa-solid fa-rotate-left mr-2"></i> Indietro
            </a> --}}
            <button class="btn btn-success" type="submit">
                <i class="fa-solid fa-floppy-disk mr-2"></i> Salva
            </button>
        </footer>
    </form>
@endsection
