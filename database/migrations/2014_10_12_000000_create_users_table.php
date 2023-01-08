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
        Schema::create('users' , function (Blueprint $table) {
            $table->id()->nullable();
            $table->string('email')->unique();
            $table->string('name')->unique();
            $table->string('password')->unique();
            $table->string('image_profile')->nullable();
            $table->enum('role', ['admin', 'user']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
