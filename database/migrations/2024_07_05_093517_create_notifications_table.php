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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('notification_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('auction_id');
            $table->string('type');
            $table->text('content');
            $table->timestamps();

            $table->foreign('user_id')->references('customer_id')->on('customer')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('auction_id')->references('auction_id')->on('create_auction')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
