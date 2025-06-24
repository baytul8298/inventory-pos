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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('branch_name');
            $table->string('branch_title')->nullable();
            $table->string('branch_address')->nullable();
            $table->boolean('branch_sales')->comment('1: Wholesales, 2: Retail');
            $table->string('add_by')->nullable();
            $table->string('update_by')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('branch_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};