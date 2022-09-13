<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_controls', function (Blueprint $table) {
            $table->id();
            $table->integer('credit_amount');
            $table->integer('credit_value');
            $table->integer('purchase_amount');
            $table->integer('status')->comment('1= active ,2=inactive');
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
        Schema::dropIfExists('credit_controls');
    }
}
