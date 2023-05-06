<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('ads_management')){
            Schema::create('ads_management', function (Blueprint $table) {
                $table->id();
                $table->text('script');
                $table->integer('position_id');
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
        Schema::dropIfExists('ads_management');
    }
}
