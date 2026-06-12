<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('user_email');
            $table->foreignId('barang_id')->constrained('barangs')->cascadeOnDelete();
            $table->string('barang_name');
            $table->unsignedBigInteger('harga');
            $table->unsignedInteger('qty');
            $table->unsignedBigInteger('total');
            $table->string('payment_method')->default('Wallet');
            $table->string('status')->default('Pending');
            $table->string('invoice')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
