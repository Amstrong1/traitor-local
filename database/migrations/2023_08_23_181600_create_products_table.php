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
            $table->foreignId('traitor_id')->constrained();
            $table->foreignId('nature_id')->constrained();
            $table->string('type');
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->string('notice')->nullable();
            $table->string('min_order_qte');
            $table->string('preparation_delay');
            $table->string('image');
            $table->text('description');
            $table->integer('rate')->default(0);
            $table->softDeletes();
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
