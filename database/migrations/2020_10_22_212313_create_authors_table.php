<?php

use App\Models\Author;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('authors', function (Blueprint $table) {
      $table->id();

      $table->text('name');
      $table->text('surname');
      $table->text('patronymic');
      $table->text('country');

      $table->timestamps();
    });

    for ($i = 0; $i < 30; $i++) {
      $Author = new Author();

      $Author->name = 'Name';
      $Author->surname = 'Surname';
      $Author->patronymic = 'Patronymic';
      $Author->country = 'Russia';

      $Author->save();
    }

  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('authors');
  }
}
