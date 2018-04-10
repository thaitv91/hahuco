<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCategoryIdFieldProductTermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_term', function (Blueprint $table) {
            if (Schema::hasColumn('product_term', 'product_category_id')) 
            {
                $table->dropForeign('product_category_term');
                $table->dropColumn('product_category_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_term', function (Blueprint $table) {
            
        });
    }
}
