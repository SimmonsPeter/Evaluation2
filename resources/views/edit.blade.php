@extends('layout')

@section('title', 'Edit Item')

@section('content')
    <h1>Modifier un Item</h1>
    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <x-item-form :item="$item" buttonText="Modifier"></x-item-form>
    </form>
@endsection
