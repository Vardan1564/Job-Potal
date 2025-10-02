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
        Schema::create('jobpost', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id');
            $table->string('jobtitle');
            $table->string('city');
            $table->string('state');
            $table->string('jobtype');
            $table->string('experience_level');
            $table->text('job_description');
            $table->text('qualifications');
            $table->string('company_name');
            $table->date('job_deadline');
            $table->string('salary_range');
            $table->string('Email');
            $table->enum('active_or_not', [1, 0])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobpost');
    }
};
