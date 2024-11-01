<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all(); // Yazarları listele
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create'); // Yazar ekleme formunu göster
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        Author::create($request->all()); // Yeni yazar ekle

        return redirect()->route('authors.index')->with('success', 'Yazar başarıyla eklendi.');
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id); // Düzenlenecek yazarı bul
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $author = Author::findOrFail($id);
        $author->update($request->all()); // Yazar bilgisini güncelle

        return redirect()->route('authors.index')->with('success', 'Yazar başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete(); // Yazar silme

        return redirect()->route('authors.index')->with('success', 'Yazar başarıyla silindi.');
    }
}
