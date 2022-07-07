<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiliationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            //$table->foreignId('datastudent_id')->constrained();
            $table->string('nationalite');
            $table->string('region');
            $table->string('departement' );
            $table->string('nom_pere');
            $table->string('profe_pere');
            $table->string('nom_mere');
            $table->string('profe_mere');
            $table->string('nom_contact');
            $table->string('telephone_contact');
            $table->string('ville_contact');
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
        Schema::dropIfExists('filiations');
    }
}
