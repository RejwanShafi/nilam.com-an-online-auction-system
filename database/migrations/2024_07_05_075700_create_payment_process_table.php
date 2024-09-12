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
        Schema::create('payment_process', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customer');
            $table->unsignedBigInteger('auction_id');
            $table->string('Method');
            $table->decimal('amount',10,2);
            $table->unsignedBigInteger('approved_admin');
            $table->foreign('auction_id')->references('auction_id')->on('create_auction');
            $table->foreign("approved_admin")->references('admin_id')->on('admins')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_process');
    }
};
