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
        Schema::create('char_move_sets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('head_id')->nullable();
            $table->unsignedBigInteger('body_id')->nullable();
            $table->unsignedBigInteger('arm_id')->nullable();
            $table->unsignedBigInteger('leg_id')->nullable();
            $table->foreign('head_id')->references('id')->on('moves');
            $table->foreign('body_id')->references('id')->on('moves');
            $table->foreign('arm_id')->references('id')->on('moves');
            $table->foreign('leg_id')->references('id')->on('moves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('char_move_sets');
    }
};
