<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('ad_status', 5)->default('on');
            $table->string('ad_type', 45)->default('admob');
            $table->string('admob_publisher_id', 45)->default(0);
            $table->string('admob_app_id', 255)->default(0);
            $table->string('admob_banner_unit_id', 255)->default(0);
            $table->string('admob_interstitial_unit_id', 255)->default(0);
            $table->string('admob_native_unit_id', 255)->default(0);
            $table->string('fan_banner_unit_id', 255)->default(0);
            $table->string('fan_interstitial_unit_id', 255)->default(0);
            $table->string('fan_native_unit_id', 255)->default(0);
            $table->string('startapp_app_id', 255)->default(0);
            $table->string('unity_game_id', 45)->default(0);
            $table->string('unity_banner_placement_id', 45)->default('banner');
            $table->string('unity_interstitial_placement_id', 45)->default('video');
            $table->integer('interstitial_ad_interval')->default(3);
            $table->integer('native_ad_interval')->default(20);
            $table->integer('native_ad_index')->default(4);
            $table->timestamp('date_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('date_time')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            // $table->timestamp('date_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('date_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('date_time')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));  0755270496
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
