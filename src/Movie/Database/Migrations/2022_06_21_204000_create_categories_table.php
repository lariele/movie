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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->timestamps();
        });

        Schema::create('categorisables', function (Blueprint $table) {
            $category_id = $table->foreignId('category_id')->constrained();
            $category_id->cascadeOnDelete();
            $table->morphs('categorisable');

            $table->unique(['category_id', 'categorisable_id', 'categorisable_type'], 'categorisable');
        });

        Schema::table('categorisables', function (Blueprint $table) {
            #$table->smallInteger('categorisable_type')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('categorisables');
    }
};
