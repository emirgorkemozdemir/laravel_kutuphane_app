<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Book;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('book')->get(); // Stocklar ile kitapları birleştirerek listele
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $books = Book::all(); // Mevcut kitapları al
        return view('stocks.create', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:0',
        ]);

        Stock::create($request->all());

        return redirect()->route('stocks.index');
    }

    public function edit(Stock $stock)
    {
        $books = Book::all(); // Mevcut kitapları al
        return view('stocks.edit', compact('stock', 'books'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $stock->update($request->all());

        return redirect()->route('stocks.index');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index');
    }
}
