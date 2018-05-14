<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('rating', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('1sao');
		    $table->integer('2sao');
		    $table->integer('3sao');
		    $table->integer('4sao');
		    $table->integer('5sao');
		    $table->integer('count');
		    $table->integer('product_id');
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
	    Schema::dropIfExists('rating');
    }
}
