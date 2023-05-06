<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('blog')){
            Schema::create('blog', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('short_description');
                $table->string('link')->nullable();
                $table->integer('category');
                $table->text('description');
                $table->string('photo');
                $table->tinyInteger('status')->default(1);
                $table->integer('hit_count')->nullable();
                $table->integer('is_apporved')->default(0);
                $table->integer('apporved_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('blog');
    }
}
