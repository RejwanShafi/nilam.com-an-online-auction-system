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
        Schema::create('reports', function (Blueprint $table) {
            $table->id('report_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('auction_id');
            $table->unsignedBigInteger('reviewed_admin_id');
            $table->text('description');
            $table->string('status');
            $table->timestamps();

            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
            $table->foreign('auction_id')->references('auction_id')->on('create_auction')->onDelete('cascade');
            $table->foreign('reviewed_admin_id')->references('admin_id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
