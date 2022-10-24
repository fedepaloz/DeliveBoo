@extends('layouts.app')
@section('extra-js')
    <script src="{{ asset('js/items-form-validation.js') }}" defer></script>
@endsection
@section('content')
    @include('includes.admin.items.form')
@endsection
