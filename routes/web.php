<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Models\Book;

Route::get('/', function () {
      // Kitapları veritabanından al
      $books = Book::with('author', 'category', 'stock')->get();
    
      // Kitaplar ve ilişkili yazarlar, kategoriler ve stok ile birlikte index sayfasını döndür
      return view('books.index', compact('books'));
});

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('categories', CategoryController::class);
Route::resource('stocks', StockController::class);


