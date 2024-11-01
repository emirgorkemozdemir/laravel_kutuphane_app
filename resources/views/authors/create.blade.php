@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Yeni Yazar Ekle</h1>
        
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Yazar Adı</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Yazar adı girin" required>
            </div>

            <div class="form-group">
                <label for="bio">Biyografi</label>
                <textarea name="bio" class="form-control" id="bio" rows="3" placeholder="Yazar hakkında bilgi"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Yazar Ekle</button>
        </form>
    </div>
@endsection
