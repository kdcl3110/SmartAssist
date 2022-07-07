<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatastudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datastudents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('filiation_id')->constrained();
            $table->foreignId('etatcivil_id')->constrained();
            $table->foreignId('filiere_id')->constrained();
            $table->foreignId('diplome_id')->constrained();
            $table->foreignId('infospaiement_id')->constrained();
            $table->foreignId('infosdiverse_id')->constrained();
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
        Schema::dropIfExists('datastudents');
    }
}
