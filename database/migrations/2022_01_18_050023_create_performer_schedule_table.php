<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('performer_schedule')){
            Schema::create('performer_schedule', function (Blueprint $table) {
                $table->id();
                $table->integer('fk_event_id');
                $table->integer('day_number');
                $table->string('time_schedule');
                $table->string('photo');
                $table->string('name');
                $table->string('designation');
                $table->integer('serialno');
                $table->string('details');
                $table->tinyInteger('status');
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
        Schema::dropIfExists('performer_schedule');
    }
}
