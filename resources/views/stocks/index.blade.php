@extends('layouts.app')

@section('content')
    <h1>Stock List</h1>
    <a href="{{ route('stocks.create') }}">Add New Stock</a>
    <ul>
        @foreach ($stocks as $stock)
            <li>{{ $stock->book->title }} - Quantity: {{ $stock->quantity }} 
                <a href="{{ route('stocks.edit', $stock->id) }}">Edit</a>
                <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
