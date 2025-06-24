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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');
            $table->string('name');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');

            $table->enum('type', ['single', 'variable']);

            $table->unsignedBigInteger('unit_id')->unsigned();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');

            $table->unsignedBigInteger('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            $table->unsignedBigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->integer('re_oreder_level')->unsigned()->nullable();
            $table->decimal('purchase_rate', 22, 4)->default(0.00);
            $table->decimal('selling_price', 22, 4)->default(0.00);
            $table->decimal('minimum_selling_price', 22, 4)->default(0.00);
            $table->decimal('wholesale_rate', 22, 4)->default(0.00);
            $table->string('one_cartun_equal', 22, 4)->nullable();
            $table->string('is_service', 22, 4)->nullable();
            $table->decimal('vat', 5, 2)->default(0.00);

            $table->boolean('enable_stock')->default(0);
            $table->decimal('alert_quantity', 22, 4)->default(0);
            $table->string('sku');
            $table->enum('barcode_type', ['C39', 'C128', 'EAN-13', 'EAN-8', 'UPC-A', 'UPC-E', 'ITF-14']);
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->boolean('status')->default(1);
            $table->timestamps();

            //Indexing
            $table->index('name');
            $table->index('branch_id');
            $table->index('unit_id');
            $table->index('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
