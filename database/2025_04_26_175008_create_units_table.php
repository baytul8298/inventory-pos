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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->string('name');
            $table->string('code')->comment('units code');
            $table->string('allow_decimal');
            $table->string('add_multiple')->default('0');
            $table->string('time_base_unit')->nullable();
            $table->decimal('select_base_unit', 10, 2)->nullable();
            $table->text('note')->nullable();
            $table->integer('status')->default('1');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
