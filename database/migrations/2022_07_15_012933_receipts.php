<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Receipts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()       
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('business_id')->constrained("business")->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('client_id')->constrained("clients")->onUpdate('cascade')
            ->onDelete('cascade');

            $table->float('amount');

            $table->string('status',5)->default('PEN');

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
        Schema::dropIfExists('receipts');
    }
}
