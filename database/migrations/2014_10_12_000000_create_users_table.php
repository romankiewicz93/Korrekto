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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->foreignId('role_id');//->constrained();//->onUpdate('cascade');
            /*$table->foreignId('role_id')//->constrained('roles'); //TODO Funktioniert nicht mit CASCADE -> vermutlich aufgrund der Reihenfolge, es müsste Zuerst die Roles erstellt werden und dann erst die Users-Tabelle. Wo kann die Reihenfolge erstellt werden?
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');*/
            //$table->foreign('role_id')->references('id')->on('roles');

            $table->string('title'); //Titel ist bedeutend, sind schließlich eine Universität
            $table->string('firstName');
            $table->string('lastName');
            $table->string('country');  //verschiedene Länder, Zeitzohnen, und Sprachen IU in Deutsch, Englisch vll auch noch weitere Sprachen
            $table->string('city');
            $table->string('postcode');
            $table->string('streetName');
            $table->string('jobTitle');
            $table->string('languageCode');
            $table->string('phoneNumber');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('registered_at')->nullable();
            $table->string('password');
            $table->string('department');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
