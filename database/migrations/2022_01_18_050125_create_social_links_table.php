<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('social_links')){
            Schema::create('social_links', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->tinyText('link');
                $table->string('icon_class');
                $table->tinyInteger('status')->default(0);
                $table->integer('serial_num');
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
        Schema::dropIfExists('social_links');
    }
}
