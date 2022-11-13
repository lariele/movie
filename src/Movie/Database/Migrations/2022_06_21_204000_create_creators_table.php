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
        Schema::create('creators', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->timestamps();
        });

        Schema::create('creatables', function (Blueprint $table) {
            $creator_id = $table->foreignId('creator_id')->constrained();
            $creator_id->cascadeOnDelete();
            $table->morphs('creatable');
            $table->unique(['creator_id', 'creatable_id', 'creatable_type'], 'creatable');
        });

        Schema::table('creatables', function (Blueprint $table) {
            #$table->smallInteger('creatable_type')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creators');
        Schema::dropIfExists('creatables');
    }
};
