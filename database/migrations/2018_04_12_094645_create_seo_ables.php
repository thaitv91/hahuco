<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoAbles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seoables', function (Blueprint $table) {
	        $table->increments('id');
	        $table->integer('seoable_id');
	        $table->text('seoable_type');
	        $table->text('keyword');
	        $table->text('seoable_title');
	        $table->text('seoable_description');
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
        Schema::table('seoables', function (Blueprint $table) {
	        Schema::dropIfExists('seoables');
        });
    }
}
