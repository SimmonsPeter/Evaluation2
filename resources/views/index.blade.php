@extends('layout')

@section('title', 'Items List')

@section('content')
    <h1>Liste d'items</h1>
    <a href="{{ route('items.create') }}" class="btn btn-primary">Ajouter un nouvel item</a>

    @forelse($items as $item)
        @if ($loop->first)
            <table class="table mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @endif
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->date_field }}</td>
                    <td>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @if ($loop->last)
                </tbody>
            </table>
        @endif
    @empty
        <p class="mt-4">Aucun item trouvé.</p>
    @endforelse
@endsection
