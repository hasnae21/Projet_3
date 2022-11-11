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
        Schema::create('brifapprents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('brif_id')->unsigned();
            $table->bigInteger('apprenent_id')->unsigned();
            $table->foreign('brif_id')->references('id')->on('brifs')->onDelete('cascade');
            $table->foreign('apprenent_id')->references('id')->on('apprenents')->onDelete('cascade');
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
        Schema::dropIfExists('brifapprents');
    }
};
