<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Preparation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preparation', function (Blueprint $table) {

            $table->id();
            $table->foreignId('article_preparations')->constrained("article")->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('consume')->constrained("article")->onUpdate('cascade')
            ->onDelete('cascade');

            $table->float('quantity');

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
        Schema::dropIfExists('preparation');
    }
}
