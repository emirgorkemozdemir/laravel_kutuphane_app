@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Yazarlar</h1>
        <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Yeni Yazar Ekle</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Yazar Adı</th>
                    <th>Biyografi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ Str::limit($author->bio, 50) }}</td>
                        <td>
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="d-inline-block">
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
