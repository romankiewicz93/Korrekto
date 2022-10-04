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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('module_id');//->constrained();//->onDelete('cascade');
            $table->foreignId('materials_id');//->constrained();//->onDelete('cascade');
            //$table->string('modul');
            //$table->string('material');
            // $table->string('modul_id');
            // $table->string('material_id');
            
            $table->string('priority');
            $table->string('kategory');
            $table->string('status');
            $table->longText('description');
            $table->longText('comment');
            $table->string('screenshot')->nullable();
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
        Schema::dropIfExists('tickets');
    }
};
