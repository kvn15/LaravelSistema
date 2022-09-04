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
        Schema::create('provedors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identifications_id')
            ->constrained('identifications')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('identification');
            $table->string('name');
            $table->string('direccion');
            $table->string('emcargado');
            $table->string('email');
            $table->string('telefono');
            $table->boolean('estado');
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
        Schema::dropIfExists('provedors');
    }
};
