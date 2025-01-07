<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('user');
            $table->string('name')->nullable();
            $table->string('profile_pic')->default('https://via.placeholder.com/150');
            $table->timestamps();

        });

        Schema::create('coach_details', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id');
            $table->string('user_id');
            $table->text('desc');
            $table->integer('price');
            $table->string('cv');
            $table->string('status')->default('unverified');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

        });

        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('game_name');
            $table->string('game_image');
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_name'); // e.g., Morning, Afternoon, Evening
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        });

        Schema::create('coach_game', function (Blueprint $table) {
            $table->id();
            $table->integer('coach_id'); // Reference to coach_details
            $table->integer('game_id'); // Reference to games
            $table->timestamps();
        
            $table->foreign('coach_id')->references('id')->on('coach_details')->onDelete('cascade');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
        
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('coach_id');
            $table->integer('buyer_id');
            $table->integer('game_id');
            $table->integer('session_id');
            $table->integer('amount');
            $table->string('status');
            $table->dateTime('transaction_date');
            $table->dateTime('session_date');
            $table->boolean('isFinished')->default(false);
            $table->boolean('isPaid')->default(false);   
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->foreign('coach_id')->references('id')->on('coach_details')->onDelete('cascade');
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('coach_game');
        Schema::dropIfExists('coach_details');
        Schema::dropIfExists('games');
        Schema::dropIfExists('users');
    }
};
