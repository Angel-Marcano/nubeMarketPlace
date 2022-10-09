<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Subcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subCategory', function (Blueprint $table) {
            
            $table->id();
            //nombre de la subCategoria
            $table->string('name',30);
            // estado actual
            $table->boolean('isActive')->default(true);
            //relacion categoria

            $table->unsignedBigInteger('category_id');


            /*$table->foreignId('category_id')->constrained("category")->onUpdate('cascade')
            ->onDelete('cascade');*/
            $table->foreign('category_id')->references('id')->on('category')
                ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('subcategory');
    }
}
