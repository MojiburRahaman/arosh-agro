<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSisterConcernsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sister_concerns', function (Blueprint $table) {
            $table->id();
            $table->string('cocern_name');
            $table->text('about_concern')->nullable();
            $table->string('weblink')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sister_concerns');
    }
}
