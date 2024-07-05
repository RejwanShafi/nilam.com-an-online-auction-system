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
        Schema::create('create_auction', function (Blueprint $table) {
            $table->id('auction_id');
            $table->string('status'); // Might need to change later like auuction running, over, not sold
            $table->string('item_name');
            $table->string('manufacturer_info');
            $table->decimal('starting_price', 8, 2);
            $table->decimal('reserve_price', 8, 2)->nullable();
            $table->decimal('current_price', 8, 2)->nullable();
            $table->dateTime('end_time');
            $table->unsignedBigInteger('seller_id'); // Foreign key referencing sellers.seller_id
            $table->timestamps();

            $table->foreign('seller_id')->references('seller_id')->on('sellers')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auction');
    }
};
