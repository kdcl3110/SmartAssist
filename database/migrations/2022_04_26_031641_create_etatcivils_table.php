<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtatcivilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etatcivils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('code');
            $table->string('nom');
            $table->string('prenom' );
            $table->date('date_naiss');
            $table->string('datePrécise');
            $table->string('lieu_naiss');
            $table->string('sexe');
            $table->string('statut_matrimonial');
            $table->string('situation_pro');
            $table->string('premiere_langue');
            $table->string('email');
            $table->integer('telephone');
            $table->string('num_cni');
            $table->string('adresse');
            $table->date('date_rdv');
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
        Schema::dropIfExists('etatcivils');
    }
}
