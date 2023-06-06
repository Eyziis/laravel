<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('logement_id')->unsigned();
            $table->string('rue');
            $table->Integer('numero');
            $table->Integer('codePostal');
            $table->string('ville');
            $table->string('pays');
            $table->foreign('logement_id')->references('id')->on('logements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
