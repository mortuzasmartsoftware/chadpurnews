<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sub_category')){
            Schema::create('sub_category', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('link')->nullable();
                $table->integer('fk_category_id');
                $table->integer('serial_num')->nullable();
                $table->integer('status');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_category');
    }
}
