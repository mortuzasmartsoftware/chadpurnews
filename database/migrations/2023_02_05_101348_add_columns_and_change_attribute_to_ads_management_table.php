<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsAndChangeAttributeToAdsManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads_management', function (Blueprint $table) {
            $table->text('script')->nullable()->change();
            $table->string('ads_image')->after('script')->nullable();
            $table->string('image_url')->after('ads_image')->nullable();
            $table->integer('script_image_status')->default(0)->after('ads_image')->comment('0=Active Image,1=Active Script');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads_management', function (Blueprint $table) {
            $table->text('script')->nullable(false)->change();
            $table->dropColumn('ads_image')->after('script')->nullable();
            $table->dropColumn('image_url')->after('ads_image')->nullable();
            $table->dropColumn('script_image_status')->after('ads_image');
        });
    }
}
