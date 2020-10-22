<?php

namespace App\Models;

use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Book extends Model
{
  use HasFactory;

  public function author()
  {
    return $this->belongsTo(Author::class, 'author_id');
  }

  public static function get($req)
  {
    try {
      $book_id = $req->id;
      return Book::find($book_id);
    } catch (QueryException $err) {
      Book::redirectWithError($err->getCode());
    }
  }

  public static function create($req)
  {
    try {
      $new_book = new Book();
      return Book::fillInstance($new_book, $req)->save();
    } catch (QueryException $err) {
      Book::redirectWithError($err->getCode());
    }
  }

  public static function edit($req)
  {
    try {
      $book = Book::find($req->id);
      return Book::fillInstance($book, $req)->save();
    } catch (QueryException $err) {
      Book::redirectWithError($err->getCode());
    }
  }

  private static function redirectWithError($code)
  {
    return redirect('/')->with('status', "Произошла ошибка. Код ошибки: {$code}");
  }

  private static function fillInstance(Book $instance, $req)
  {
    $instance->name = $req->name;
    $instance->author_id = $req->author_id;
    $instance->page_count = $req->page_count;
    $instance->year = $req->year;
    $instance->publisher = $req->publisher;
    $instance->type = $req->type;
    return $instance;
  }
}
