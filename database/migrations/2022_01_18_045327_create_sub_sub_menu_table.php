<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sub_sub_menu')){
            Schema::create('sub_sub_menu', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('url');
                $table->string('serial_num');
                $table->integer('fk_sub_menu_id');
                $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('sub_sub_menu');
    }
}
