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
        Schema::create('dance_moves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dance_id');
            $table->unsignedBigInteger('move_id');
            $table->foreign('dance_id')->references('id')->on('dances');
            $table->foreign('move_id')->references('id')->on('moves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dance_moves');
    }
};
