@if ($errors->any())
    <div class='alert alert-danger'>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </div>
@endif

@if ($item->exists)
    <form id="edit-item-form" action="{{ route('admin.items.update', $item) }}" enctype="multipart/form-data" method="POST" novalidate>
        @method('PUT')
    @else
        <form id="edit-item-form" action="{{ route('admin.items.store') }}" enctype="multipart/form-data" method="POST" novalidate>
@endif

@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="name">Nome piatto *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $item->name) }}" required minlenght="5" maxlenght="50">
            <div id="name-feedback" class="invalid-feedback">Il campo "Nome piatto" non é corretto</div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea rows="6" class="form-control @error('description') is-invalid @enderror" id="description"
                name="description" required>{{ old('description', $item->description) }}</textarea>
        </div>
    </div>


    <div class="col-6">
        <div class="form-check">
            <input class="form-check-input @error('visible') is-invalid @enderror" name="visible" type="checkbox"
                value="1" @if(old('visible', $item->visible)) checked @endif id="visible">
            <label class="form-check-label" for="visible">
                Disponibile
            </label>
            <div id="visible-feedback" class="invalid-feedback">Selezionare Si o No</div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                name="price" value="{{ old('price', $item->price) }}" required minlenght="5" maxlenght="50">
            <div id="price-feedback" class="invalid-feedback">Il campo "Prezzo" non può essere vuoto</div>
        </div>
    </div>

    <div class="col-9">
        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="file" id="image" name="image">

        </div>
    </div>
    <div class="col-3">
        <img class="img-fluid"
            src="{{$item->image ? asset('storage/' . $item->image) : 'https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png' }}"
            alt="{{$item->name}}" id="preview">
    </div>
    {{-- <div class="col-10 my-4">
        <div class="form-group @error('image') is-invalid @enderror">
            <label for="image">Inserisci il logo del tuo ristorante:</label>
            <br>
            <input type="file" id="image" name="image">
        </div>
    </div> --}}

</div>
<p><strong>N.B. I campi contrassegnati dall'asterisco * sono obbligatori.</strong></p>
<hr />

<footer class="d-flex justify-content-end">
    <a class="btn btn-secondary mr-3" href="{{ route('admin.items.index') }}">
        <i class="fa-solid fa-rotate-left mr-2"></i> Indietro
    </a>
    <button class="btn btn-success" type="submit">
        <i class="fa-solid fa-floppy-disk mr-2"></i> Salva
    </button>
</footer>
</form>
@section('extra-js')
    <script src="{{ asset('js/items-form-validation.js') }}" defer></script>
    <script src="{{ asset('js/image_preview.js') }} " defer></script>
@endsection
