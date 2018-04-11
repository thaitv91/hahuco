<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDichvu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('dichvu', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name');
		    $table->string('slug');
		    $table->string('excerpt');
		    $table->string('content');
		    $table->string('image');
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
	    Schema::dropIfExists('dichvu');
    }
}
