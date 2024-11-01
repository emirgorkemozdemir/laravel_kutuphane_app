@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Yeni Kitap Ekle</h1>
        
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Kitap Başlığı</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Kitap Başlığını Girin" required>
            </div>

            <div class="form-group">
                <label for="author_id">Yazar</label>
                <select name="author_id" id="author_id" class="form-control" required>
                    <option value="">Yazar Seçin</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="category_id">Kategori</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Kategori Seçin</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Stok Miktarı</label>
                <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Stok Miktarını Girin" required>
            </div>

            <button type="submit" class="btn btn-success">Kitap Ekle</button>
        </form>
    </div>
@endsection
