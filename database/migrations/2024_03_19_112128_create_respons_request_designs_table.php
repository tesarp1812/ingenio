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
        Schema::create('respons_request_designs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_design_id');
            $table->string('size')->nullable();
            $table->string('duration')->nullable();
            $table->string('description');
            $table->date('deadline');
            $table->enum('is_cito', ['cito','not']);
            $table->integer('whatsapp');
            $table->unsignedBigInteger('status_id')->default('1');
            $table->string('word_file_path');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_design_id')->references('id')->on('type_designs')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status_designs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respons_request_designs');
    }
};
