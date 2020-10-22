<?php

use App\Models\Book;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('books', function (Blueprint $table) {
      $table->id();

      $table->text('name');
      $table->unsignedBigInteger('author_id');
      $table->smallInteger('page_count');
      $table->smallInteger('year');
      $table->text('publisher');
      $table->enum('type', ['твёрдая', 'мягкая']);

      $table->foreign('author_id')->references('id')->on('authors');

      $table->timestamps();
    });

    $types = ['твёрдая', 'мягкая'];
    for ($i = 0; $i < 30; $i++) {
      $Book = new Book();

      $Book->name = 'Name';
      $Book->author_id = random_int(1,30);
      $Book->year = random_int(1000, 2020);
      $Book->publisher = 'Test';
      $Book->page_count = random_int(1, 3000);
      $Book->type = $types[random_int(0,1)];


      $Book->save();
    }
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('books');
  }
}
