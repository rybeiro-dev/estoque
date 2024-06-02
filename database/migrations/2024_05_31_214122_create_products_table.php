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
            $table->string('description')->nullable();
            $table->string('brand')->nullable();
            $table->string('product_model')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->boolean('status')->default(true);
            $table->string('tag')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->foreignId('group_id')->nullable();
            $table->timestamps();
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
