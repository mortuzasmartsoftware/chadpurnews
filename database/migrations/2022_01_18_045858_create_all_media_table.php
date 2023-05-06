<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('all_media')){
            Schema::create('all_media', function (Blueprint $table) {
                $table->id();
                $table->integer('serial_number')->nullable()->default(0);
                $table->integer('fk_category_id')->nullable()->default(0);
                $table->string('media_name')->nullable()->default(0);
                $table->string('media_link')->nullable()->default(0);
                $table->string('photo')->nullable()->default(0);
                $table->tinyInteger('status')->nullable()->default(0);
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
        Schema::dropIfExists('all_media');
    }
}
