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
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_id')->unique()->after('id'); 
            $table->string('user_type')->after('user_id'); 
            $table->unsignedBigInteger('branch_id')->nullable()->after('user_type'); 
            $table->string('verifycode')->nullable()->after('branch_id');
            $table->string('image')->nullable()->after('verifycode');
            $table->string('status')->after('image'); 

            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['user_id', 'user_type', 'verifycode', 'image', 'status']);
        });
    }
};