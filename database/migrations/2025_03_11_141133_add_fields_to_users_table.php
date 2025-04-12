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
            $table->string('verifycode')->nullable()->after('user_type');
            $table->string('image')->nullable()->after('verifycode');
            $table->string('status')->after('image'); 
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