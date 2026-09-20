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
        Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('queue_code', 3);
        $table->string('receipt_code', 6)->unique();
        $table->enum('payment_method', ['cod', 'qris']);
        $table->enum('payment_status', ['pending', 'paid', 'expired'])->default('pending');
        $table->decimal('total', 10, 2);
        $table->timestamp('expires_at');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
