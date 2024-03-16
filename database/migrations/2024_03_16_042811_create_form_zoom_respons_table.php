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
        Schema::create('form_zoom_respons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('region_id');
            $table->enum('activity_type', ['online', 'offline']);
            $table->string('class_name');
            $table->date('start_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('whatsapp');
            $table->unsignedBigInteger('zoom_account_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('zoom_account_id')->references('id')->on('zoom_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_zoom_respons');
    }
};
