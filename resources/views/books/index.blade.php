@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kütüphane Kitapları</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Yeni Kitap Ekle</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Kitap Başlığı</th>
                    <th>Yazar</th>
                    <th>Kategori</th>
                    <th>Stok Miktarı</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>{{ $book->stock->quantity }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
