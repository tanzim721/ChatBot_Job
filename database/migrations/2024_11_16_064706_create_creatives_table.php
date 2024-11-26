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
        Schema::create('creatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creative_type_id')->nullable()->constrained('creative_types')->nullOnDelete();
            $table->json('image')->nullable();
            $table->json('video')->nullable();
            $table->string('content')->nullable();
            $table->string('cta_name')->nullable();
            $table->string('landing_url')->nullable();
            $table->string('tracking_url')->nullable();
            $table->string('creative_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creatives');
    }
};
