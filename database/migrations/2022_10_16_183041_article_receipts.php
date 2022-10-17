<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArticleReceipts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_receipts', function (Blueprint $table) {
          
            $table->id();
            $table->unsignedBigInteger('article_id')->nullable();
            $table->foreign('article_id')->references('id')->on('article')->onDelete('cascade');

            $table->unsignedBigInteger('receipts_id')->nullable();
            $table->foreign('receipts_id')->references('id')->on('receipts')->onDelete('cascade');

            $table->float('count');
            $table->float('amount');
            $table->float('total_mount');
            
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
        Schema::dropIfExists('article_receipts');
    }
}
