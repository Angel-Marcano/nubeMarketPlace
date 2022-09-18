<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Store extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
           
            $table->id();
            //nombre del almacen
            $table->string('name',30);
            // relacion con empresa
            $table->foreignId('business_id')->constrained("business")->onUpdate('cascade')
            ->onDelete('cascade');
            // estado actual
            $table->boolean('isActive')->default(true);

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
        Schema::dropIfExists('store');
    }
}
