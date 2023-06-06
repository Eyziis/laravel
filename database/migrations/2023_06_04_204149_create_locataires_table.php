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
        Schema::create('locataires', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('logement_id')->unsigned()->nullable();
            $table->string('nom');
            $table->string('email')->nullable();
            $table->Integer('age');
            $table->date('date_e')->nullable();
            $table->date('date_s')->nullable();
            $table->string('reference_prec')->nullable();
            $table->foreign('logement_id')->references('id')->on('logements')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locataires');
    }
};
