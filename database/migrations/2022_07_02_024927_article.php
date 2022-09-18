<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
           
            $table->foreignId('business_id')->constrained("business")->onUpdate('cascade')
            ->onDelete('cascade');
              // relacion con CATEGORIA
            $table->foreignId('category_id')->constrained("category")->onUpdate('cascade')
              ->onDelete('cascade')->nullable();

            // relacion con SUBCATEGORIA
            $table->foreignId('subCategory_id')->constrained("subCategory")->onUpdate('cascade')
            ->onDelete('cascade')->nullable();
            
            $table->id();
            $table->string('name',30);
            $table->string('descripcion',255)->nullable()->default(null);
            $table->string('image_url',255)->nullable()->default(null);
            $table->string('type',20)->nullable()->default(null);
            $table->boolean('isPrepared')->default(false);
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
        Schema::dropIfExists('article');
    }
}
