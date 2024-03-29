<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('contact', function (Blueprint $table) {
		    $table->increments('id');
		    $table->text('name');
		    $table->text('email');
		    $table->text('phone');
		    $table->text('content');
		    $table->integer('status');
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
	    Schema::dropIfExists('contact');
    }
}
