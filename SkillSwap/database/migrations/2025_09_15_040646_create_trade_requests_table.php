<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trade_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requester_id')->constrained('users')->onDelete('cascade'); // Sender
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade'); //  Receiver
            $table->foreignId('offered_card_id')->constrained('user_cards')->onDelete('cascade');
            $table->foreignId('requested_card_id')->constrained('user_cards')->onDelete('cascade');
            $table->string('status')->default('pending'); // Status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_requests');
    }
};
