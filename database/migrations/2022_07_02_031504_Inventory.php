<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Inventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            
          $table->id();
          //  $table->unsignedBigInteger('almacen_id');
            $table->foreignId('store_id')->constrained("store")->onUpdate('cascade')
            ->onDelete('cascade');

           //$table->unsignedBigInteger('articulo_id');
           $table->foreignId('article_id')->constrained("article")->onUpdate('cascade')
            ->onDelete('cascade');
      
            $table->integer('quantity');
            $table->float('price')->default(0);
            $table->float('cost')->default(0);

            $table->timestamps();            

            //haciendo references
         //   $table->foreign('almacen_id')->references('id')->on('Almacen');
          //  $table->foreign('articulo_id')->references('id')->on('Articulo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
