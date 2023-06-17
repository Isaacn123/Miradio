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
        Schema::create('tbl_settings', function (Blueprint $table) {
            $table->id();
            $table->text('app_fcm_key');
            $table->string('api_key', 255);
            $table->string('package_name', 500)->default('com.app.yourmcradioapp');
            $table->string('onesignal_app_id', 500)->default(0);
            $table->string('onesignal_rest_api_key', 500)->default(0);
            $table->string('protocol_type', 10)->default('http://');
            $table->text('privacy_policy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_settings');
    }
};
