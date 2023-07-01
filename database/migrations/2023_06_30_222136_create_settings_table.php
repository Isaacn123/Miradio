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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_fcm_key')->nullable();
            $table->string('api_key')->nullable();
            $table->string('package_name')->nullable();
            $table->string('onesignal_app_id')->nullable();
            $table->string('onesignal_rest_api_key')->nullable();
            $table->string('protocol_type')->nullable();
            $table->string('privacy_policy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
