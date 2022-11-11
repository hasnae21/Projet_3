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
        Schema::create('briefs_apprenants', function (Blueprint $table) {
                $table->primary(['brief_id', 'apprenant_id']);

                $table->bigInteger('brief_id')->unsigned();
                $table->bigInteger('apprenant_id')->unsigned();

                $table->timestamps();
                $table->foreign('brief_id')->references('id')->on('briefs')->onDelete('cascade');
                $table->foreign('apprenant_id')->references('id')->on('apprenants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('briefs_apprenants');
    }
};
