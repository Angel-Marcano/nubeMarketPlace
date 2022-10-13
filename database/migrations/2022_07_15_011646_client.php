<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Client extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->string('name',30);
            $table->string('dni',20);
            $table->string('address',150)->nullable();
            $table->string('phone',30)->nullable();
            $table->string('type_client',10); // person or company 
            $table->boolean('isActive')->default(true);

            $table->foreignId('business_id')->constrained("business")->onUpdate('cascade')
            ->onDelete('cascade');

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
        Schema::dropIfExists('clients');
    }
}
