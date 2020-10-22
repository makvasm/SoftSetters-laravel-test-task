@extends('master')

@section('doc-title', 'Добавить книгу')

@section('body')

<form method="POST" action="/api/book/create" class="shadow p-3 m-3 bg-white rounded">

  <div class="form-group">
    <label for="">Название</label>
    <input type="text" name="name" class="form-control" id="">
  </div>

  <div class="form-group">
    <label for="">Издатель</label>
    <input type="text" name="publisher" class="form-control" id="">
  </div>

  <div class="form-group">
    <label for="">Год выпуска</label>
    <input type="number" name="year" max='10000' class="form-control" id="">
  </div>

  <div class="form-group">
    <label for="">Количество страниц</label>
    <input type="number" name="page_count" min="0" max="10000" class="form-control" id="">
  </div>

  <div class="form-group">
    <label for="">Тип обложки</label>
    <select name="type" class="custom-select">
      <option value="мягкая">Мягкая</option>
      <option value="твёрдая">Твёрдая</option>
    </select>
  </div>

  <div class="form-group">
    <label for="">Автор</label>
    <select name="author_id" class="custom-select">
      @foreach ($authors as $author)
      <option value={{ $author->id }}>{{ "{$author->name} {$author->surname} {$author->patronymic}" }}</option>
      @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Добавить</button>

</form>

@endsection