@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Yazar Düzenle</h1>

        <form action="{{ route('authors.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Yazar Adı</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $author->name) }}" required>
            </div>

            <div class="form-group">
                <label for="bio">Biyografi</label>
                <textarea name="bio" class="form-control" id="bio" rows="3">{{ old('bio', $author->bio) }}</textarea>
            </div>

            <button type="submit" class="btn btn-warning">Yazar Güncelle</button>
        </form>
    </div>
@endsection
