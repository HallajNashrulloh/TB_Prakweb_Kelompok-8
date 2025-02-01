<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kontestan_id');
            $table->timestamps();

            // Membatasi agar 1 user hanya bisa memberikan 1 suara
            $table->unique('user_id', 'unique_user_vote');

            // Relasi ke tabel users dan kontestans
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kontestan_id')->references('id')->on('kontestans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
