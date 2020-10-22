<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
  public function List(Request $req)
  {
    $books = Book::paginate(4);
    return view('book/list', ['books' => $books]);
  }

  public function Get(Request $req)
  {
    $book = Book::get($req);
    return view('book/view', ['book' => $book, 'author' => $book->author]);
  }

  public function Create(Request $req)
  {
    $authors = Author::all()->take(50);
    return view('book/create', ['authors' => $authors]);
  }

  public function Edit(Request $req)
  {
    $book = Book::get($req);
    return view('book/edit', ['book' => $book, 'author' => $book->author]);
  }

  public function ApiEdit(Request $req)
  {
    $status = Book::edit($req);
    return redirect()
      ->route('book-list')
      ->with('status', $status);
  }

  public function ApiCreate(Request $req)
  {
    $status = Book::create($req);
    return redirect()
      ->route('book-list')
      ->with('status', $status);
  }

  public function ApiDelete(Request $req)
  {
    $status = Book::destroy($req->id);
    return redirect()
      ->route('book-list')
      ->with('status', $status);
  }
}
