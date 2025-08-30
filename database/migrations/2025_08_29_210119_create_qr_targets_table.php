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
        Schema::create('qr_targets', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['static','dynamic'])->default('static');
            $table->string('short_code', 32)->unique()->nullable();
            $table->string('target_url')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('qr_code_id')->constrained('qr_codes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_targets');
    }
};
