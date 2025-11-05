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
        Schema::create('applyjob', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('C_ID');
            $table->bigInteger('J_ID');
            $table->bigInteger('U_ID');
            $table->enum('status',['pending','review','hired'])->default('pending');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('resume');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applyjob');
    }
};
