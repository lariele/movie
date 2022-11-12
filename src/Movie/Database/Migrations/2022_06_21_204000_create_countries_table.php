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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128)->index();
            $table->timestamps();
        });

        Schema::create('countrisables', function (Blueprint $table) {
            $country_id = $table->foreignId('country_id')->constrained();
            $country_id->cascadeOnDelete();
            $table->morphs('countrisable');

            $table->unique(['country_id', 'countrisable_id', 'countrisable_type'], 'countrisable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
        Schema::dropIfExists('countrisables');
    }
};
