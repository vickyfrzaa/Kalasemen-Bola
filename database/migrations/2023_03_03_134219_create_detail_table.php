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
        Schema::create('detail', function (Blueprint $table) {
            $table->id('detailId');
            $table->unsignedBigInteger('pertandinganId');
            $table->foreign('pertandinganId')->references('id')->on('pertandingan')->onDelete('cascade');
            $table->string('main');
            $table->string('menang');
            $table->string('seri');
            $table->string('kalah');
            $table->string('gm');
            $table->string('gk');
            $table->string('point');
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
        Schema::dropIfExists('detail');
    }
};
