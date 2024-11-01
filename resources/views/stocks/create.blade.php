@extends('layouts.app')

@section('content')
    <h1>Add New Stock</h1>
    <form action="{{ route('stocks.store') }}" method="POST">
        @csrf
        <label for="book_id">Select Book</label>
        <select name="book_id" id="book_id" required>
            @foreach ($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>
        <br>
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" required min="0">
        <button type="submit">Add Stock</button>
    </form>
@endsection