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

    // 1) Creo la "typologies" Migration.

    public function up()
    {
        Schema::create('typologies', function (Blueprint $table) {

            $table->id();

            $table->string('code', 5)->unique();
            $table->string('name', 64);
            $table->boolean('digital')->default(false);

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
        Schema::dropIfExists('typologies');
    }
};