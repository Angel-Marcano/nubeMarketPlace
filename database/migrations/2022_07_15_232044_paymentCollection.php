<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PaymentCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_collection', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId('collection_id')->constrained("collection")->onUpdate('cascade')
            ->onDelete('cascade');

            $table->date('payment_date');
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
        Schema::dropIfExists('payment_collection');
    }
}
