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
        Schema::create('zoom_respons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('region_id');
            $table->enum('is_online', ['true', 'false']);
            $table->unsignedBigInteger('activity_type_id');
            $table->string('class_name');
            $table->date('start_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('whatsapp');
            $table->unsignedBigInteger('zoom_account_id');
            $table->string('login_url');
            $table->integer('claim_host');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('activity_type_id')->references('id')->on('activity_types')->onDelete('cascade');
            $table->foreign('zoom_account_id')->references('id')->on('zoom_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zoom_respons');
    }
};
