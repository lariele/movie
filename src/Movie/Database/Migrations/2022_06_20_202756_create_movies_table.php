<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->year('year')->index();

            $table->text('description')->nullable();

            $table->integer('rating')->nullable();
            $table->float('rating_imdb',8,1)->nullable();
            $table->integer('rating_csfd')->nullable();

            $table->boolean('on_netflix')->default(false)->index();
            $table->boolean('on_hbo')->default(false)->index();
            $table->boolean('on_disney')->default(false)->index();

            $table->text('genres')->nullable();
            $table->text('actors')->nullable();

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
        Schema::dropIfExists('movies');
    }
};
