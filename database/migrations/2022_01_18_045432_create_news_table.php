<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('news')){
            Schema::create('news', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('link');
                $table->integer('fk_category_id');
                $table->integer('fk_sub_category_id')->nullable();
                $table->string('photo')->nullable();
                $table->text('short_description');
                $table->longText('description');
                $table->integer('hit_counter')->default(0);
                $table->integer('is_featured')->default(0)->comment('1=Featured,0=not Featured');
                $table->integer('is_not_home')->default(1)->comment('1=home,0=not home');
                $table->integer('is_slider')->default(0)->comment('1=slider,0=not slider');
                $table->string('tags')->nullable();
                $table->tinyInteger('status')->default(1);
                $table->tinyInteger('publish_status');
                $table->unsignedInteger('created_by');
                $table->unsignedInteger('updated_by')->nullable();
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
        Schema::dropIfExists('news');
    }
}
