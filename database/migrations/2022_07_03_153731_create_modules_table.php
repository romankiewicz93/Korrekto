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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('user_id')->
            $table->foreignId('user_id');//->constrained()->onDelete('cascade');
            $table->string('kurskuerzel');
            $table->string('kurzbezeichnung');
            $table->longtext('beschreibung');
            $table->string('tags');
            $table->string('logo')->nullable();
            //$table->string('sprache'); --> wirft aktuell einen Fehler -> über ALTER TABLE
            //$table->date('beginn_datum');
            //$table->date('end_datum');
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
        Schema::dropIfExists('modules');
    }
};
