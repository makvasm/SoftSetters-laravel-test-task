@extends('master')

@section('doc-title', "Редактирование {$book->name}" ?? 'Редактирование')

@section('body')

<form method="POST" action="/api/book/edit" class="shadow p-3 m-3 bg-white rounded">
  <input type="hidden" name='id' value={{ $book->id }}>
  <input type="hidden" name='author_id' value={{ $book->author_id }}>

  <div class="form-group">
    <label for="">Название</label>
    <input type="text" name="name" class="form-control" id="" value={{ $book->name }}>
  </div>

  <div class="form-group">
    <label for="">Издатель</label>
    <input type="text" name="publisher" class="form-control" id="" value={{ $book->publisher }}>
  </div>

  <div class="form-group">
    <label for="">Год выпуска</label>
    <input type="number" name="year" max='10000' class="form-control" id="" value={{ $book->year }}>
  </div>

  <div class="form-group">
    <label for="">Количество страниц</label>
    <input type="number" name="page_count" min="0" max="10000" class="form-control" id="" value={{ $book->page_count }}>
  </div>

  <div class="form-group">
    <label for="">Тип обложки</label>
    <select name="type" class="custom-select">
      <option value="мягкая">Мягкая</option>
      <option value="твёрдая">Твёрдая</option>
    </select>
  </div>

  <button type="submit" class="btn btn-success">Сохранить изменения</button>

  <button type="submit" class="btn btn-danger" formaction="/api/book/delete">Удалить книгу</button>

</form>

@endsection