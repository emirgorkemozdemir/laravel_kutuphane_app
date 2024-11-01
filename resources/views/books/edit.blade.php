@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kitap Düzenle</h1>
        
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Kitap Başlığı</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $book->title) }}" required>
            </div>

            <div class="form-group">
                <label for="author_id">Yazar</label>
                <select name="author_id" id="author_id" class="form-control" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="category_id">Kategori</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Stok Miktarı</label>
                <input type="number" name="quantity" class="form-control" id="quantity" value="{{ old('quantity', $book->stock->quantity) }}" required>
            </div>

            <button type="submit" class="btn btn-warning">Kitap Düzenle</button>
        </form>
    </div>
@endsection
