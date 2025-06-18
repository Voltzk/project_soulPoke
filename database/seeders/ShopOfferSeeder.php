<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShopOffer;

class ShopOfferSeeder extends Seeder
{
    public function run(): void
    {
        ShopOffer::create([
            'name' => 'Points Converter',
            'image' => 'points_converter.png',
            'type' => 'points',
            'item_id' => 27635, // conforme imagem enviada
            'value' => 100, // quantidade de points recebidos
            'cost' => 1, // custo em points da loja
        ]);
    }
}
