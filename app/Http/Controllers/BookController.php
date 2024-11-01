<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Stock;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author', 'category')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
        ]);

        $book = Book::create($validated);
        Stock::create([
            'book_id' => $book->id,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
        ]);

        $book->update($validated);
        $book->stock->update(['quantity' => $request->quantity]);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}

