<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldAdminEmailTableConfigures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configure', function (Blueprint $table) {
            $table->string('email')->default('admin@gmail.com');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configure', function (Blueprint $table) {
            if (Schema::hasColumn('email'))
                $table->dropColumn('email');
        });
    }
}
