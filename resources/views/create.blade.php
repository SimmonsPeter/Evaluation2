@extends('layout')

@section('title', 'Create Item')

@section('content')
    <h1>Créer un nouvel Item</h1>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <x-item-form :item="null" buttonText="Créer"></x-item-form>
    </form>
@endsection
