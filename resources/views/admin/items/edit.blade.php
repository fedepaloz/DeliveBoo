@extends('layouts.app')
@section('content')
@section('extra-js')
    <script src="{{ asset('js/items-form-validation.js') }}" defer></script>
    <script async src="{{ asset('js/image_preview.js') }}" defer></script>
@endsection
    @include('includes.admin.items.form')
@endsection
