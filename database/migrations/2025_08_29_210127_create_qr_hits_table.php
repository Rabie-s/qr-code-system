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
        Schema::create('qr_hits', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip_visitor')->nullable();
            $table->foreignId('qr_target_id')->constrained('qr_targets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_hits');
    }
};
