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
        Schema::create('ppdbs', function (Blueprint $table) {
            $table->id()->nullable();
            $table->string('nisn')->unique();
            $table->string('name');
            $table->string('school');
            $table->enum('gender', ['perempuan', 'laki-laki']);
            $table->string('email')->unique();
            $table->string('major');
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
        Schema::dropIfExists('ppdbs');
    }
};
