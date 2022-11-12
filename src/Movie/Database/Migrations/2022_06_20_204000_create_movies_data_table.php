<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_data', function (Blueprint $table) {
            $table->foreignId('movie_id')->constrained('movies')->onDelete('cascade');
            $table->date('release_date')->nullable();
            $table->smallInteger('duration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies_data');
    }
};
