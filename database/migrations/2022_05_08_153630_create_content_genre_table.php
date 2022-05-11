<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_genre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->constrained('contents')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('genre_id')->constrained('genres')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_genre');
    }
}
