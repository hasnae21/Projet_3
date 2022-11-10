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
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brief_id');

            $table->string('nom_tache');
            $table->datetime('date_debut');
            $table->datetime('date_fin');
            $table->string('description');

            $table->timestamps();
            $table->foreign('brief_id')->references('id')->on('briefs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taches');
    }
};
