<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('auction_genre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auction_id');
            $table->unsignedBigInteger('genre_id');
            $table->timestamps();

            $table->foreign('auction_id')->references('auction_id')->on('create_auction')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('genre_id')->references('genre_id')->on('genres')->onDelete('cascade');

            $table->unique(['auction_id', 'genre_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('auction_genre');
    }
};
