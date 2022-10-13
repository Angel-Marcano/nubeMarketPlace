<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolesUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            
            $table->id();

            // relacion con usuario
            $table->foreignId('user_id')->constrained("users")->onUpdate('cascade')
            ->onDelete('cascade')->nullable();

            //nombre de la categoria
            $table->string('module',30);

            $table->integer('level');

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
        //
    }
}
