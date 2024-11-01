@extends('layouts.app')

@section('content')
    <h1>Edit Stock</h1>
    <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="book_id">Select Book</label>
        <select name="book_id" id="book_id" required>
            @foreach ($books as $book)
                <option value="{{ $book->id }}" {{ $book->id == $stock->book_id ? 'selected' : '' }}>
                    {{ $book->title }}
                </option>
            @endforeach
        </select>
        <br>
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" value="{{ $stock->quantity }}" required min="0">
        <button type="submit">Update Stock</button>
    </form>
@endsection
