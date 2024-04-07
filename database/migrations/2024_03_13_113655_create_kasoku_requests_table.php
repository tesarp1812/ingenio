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
        Schema::create('kasoku_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->unsignedBigInteger('baju_id')->nullable();
            $table->integer('qty');
            $table->enum('status',['request','process','done','accepted'])->default('request');
            $table->text('desc');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('baju_id')->references('id')->on('baju')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasoku_requests');
    }
};
