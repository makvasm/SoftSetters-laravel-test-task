@extends('master')

@section('doc-title', $book->name ?? 'Книга')

@section('body')

<div class="shadow p-3 m-3 bg-white rounded text-break">
  <h1>{{ $book->name }}</h1>
  <p>Автор: {{ "{$author->name} {$author->surname} {$author->patronymic}" }}</p>
  <p>Год выпуска: {{ $book->year }}</p>
  <p>Количество страниц: {{ $book->page_count }}</p>
  <p>Издатель: {{ $book->publisher }}</p>
  <p>Тип обложки: {{ $book->type }}</p>

  <a href={{ route('book-edit', ['id' => $book->id]) }}>
    <button type="button" class="btn btn-primary">Редактировать</button>
  </a>

  <a href={{ route('export-excel', ['id' => $book->id]) }}>
    <button type="button" class="btn btn-primary">Экспортировать в Excel</button>
  </a>

</div>

@endsection