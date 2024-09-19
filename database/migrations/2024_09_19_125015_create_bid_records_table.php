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
        Schema::create('bid_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auction_id');
            $table->unsignedBigInteger('customer_id');
            $table->decimal('amount', 18, 2);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('auction_item_id')->references('id')->on('auction_items')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bid_records');
    }
};
