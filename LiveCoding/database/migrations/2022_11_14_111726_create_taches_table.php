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
            
            $table->string('nomTache');
            $table->datetime('debutTache');
            $table->datetime('finTache');
            $table->string('description');
            
            // $table->unsinged('Brief_id');
            // $table->foreignId('Brief_id')
            //     ->constrained('briefs');

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
        Schema::dropIfExists('taches');
    }
};
