<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('about_company')){
            Schema::create('about_company', function (Blueprint $table) {
                $table->id();
                $table->string('company_name');
                $table->string('logo');
                $table->text('address');
                $table->string('mobile_no');
                $table->string('fb_link');
                $table->string('email');
                $table->text('short_description');
                $table->longText('description');
                $table->text('map_embed');
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
        Schema::dropIfExists('about_company');
    }
}
