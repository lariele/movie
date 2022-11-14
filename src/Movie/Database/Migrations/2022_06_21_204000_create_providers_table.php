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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128)->index();
            $table->timestamps();
        });

        Schema::create('providerables', function (Blueprint $table) {
            $country_id = $table->foreignId('provider_id')->constrained();
            $country_id->cascadeOnDelete();
            $table->morphs('providerable');

            $table->unique(['provider_id', 'providerable_id', 'providerable_type'], 'providerable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
        Schema::dropIfExists('providerables');
    }
};
