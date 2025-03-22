<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary();
            $table->string('license_number')->nullable();
            $table->text('certifications')->nullable();
            $table->integer('years_experience')->default(0);
            $table->text('bio')->nullable();
            $table->string('profile_picture')->nullable();
            $table->unsignedBigInteger('role_based_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('agents');
    }
};

