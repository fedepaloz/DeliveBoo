@extends('layouts.app')

@section('content')
    {{ $item->name }}
    {{ $item->description }}
    {{ $item->price }}
    {{ $item->created_at }}
    {{ $item->image }}
@endsection
