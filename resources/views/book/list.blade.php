@extends('master')

@section('doc-title', 'Список книг')

@section('body')

<div class="shadow p-3 m-3 bg-white rounded">
  <h1>Список книг</h1>

  @if (isset($books))

  @foreach ($books as $book)
  <div class='shadow-sm p-3 m-1 bg-white rounded'>

    <div>
      <a href={{ route('book-get', ['id' => $book->id]) }} class="m-1 text-capitalize text-break">
        <h3>
          {{ $book->name }}
        </h3>
      </a>
      <h5>Издатель: {{ $book->publisher }}</h5>
      <small>Год выпуска: {{ $book->year }}</small>
    </div>

  </div>
  @endforeach

  @else
    <div>Книги не найдены</div>
  @endif

</div>

@if (isset($books))
<div class="p-1 m-1 d-flex justify-content-center">
  {{ $books->links() }}
</div>
@endif

@endsection