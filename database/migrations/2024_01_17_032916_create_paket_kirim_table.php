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
        Schema::create('paket_kirim', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegiriman_id');
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->unsignedBigInteger('baju_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
            $table->foreign('baju_id')->references('id')->on('baju')->onDelete('cascade');
            $table->foreign('pegiriman_id')->references('id')->on('pengiriman')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_kirim');
    }
};
