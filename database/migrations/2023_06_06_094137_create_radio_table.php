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
        Schema::create('radios', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('radio_name', 255);
            $table->string('radio_image', 255);
            $table->string('radio_url', 255);
            $table->integer('featured')->default(0);
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamps();
            // `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
        });
    }

    // `id` int(11) NOT NULL,
    // `category_id` int(11) NOT NULL,
    // `radio_name` varchar(255) NOT NULL,
    // `radio_image` varchar(255) NOT NULL,
    // `radio_url` varchar(255) NOT NULL,
    // `featured` int(11) NOT NULL DEFAULT 0,

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radios');
    }
};
