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
        Schema::create('trading_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('receiver_id')->constrained('accounts')->onDelete('cascade');
            $table->unsignedInteger('trading_amount');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trading_histories');
    }
};
