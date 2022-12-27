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
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->date('date_signature');
            $table->date('date_occupation');
            $table->date('date_fin');
            $table->integer('loyer_mensuel');
            $table->integer('nbre_mois_verser');
            $table->integer('caution');
            $table->foreignId('locataire_id')->constrained();
            $table->foreignId('type_logement_id')->constrained();
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
        Schema::dropIfExists('contrats');
    }
};
