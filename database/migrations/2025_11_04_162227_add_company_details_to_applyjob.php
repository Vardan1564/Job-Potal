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
        Schema::table('applyjob', function (Blueprint $table) {
            $table->string('company_name')->after('resume');
            $table->string('job_title')->after('company_name');
            $table->string('city')->after('job_title');
            $table->string('state')->after('city'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applyjob', function (Blueprint $table) {
            //
        });
    }
};
