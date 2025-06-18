<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shop_offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('type'); // 'item', 'points', etc.
            $table->integer('item_id')->nullable(); // Para ofertas de item
            $table->integer('value'); // quantidade de item ou points
            $table->integer('cost'); // pontos necessários para comprar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shop_offers');
    }
};
