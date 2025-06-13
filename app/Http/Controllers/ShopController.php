<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // Exemplo de ofertas (você pode substituir por dados do banco depois)
        $offers = [
            'items' => [
                ['name' => 'Crystal coin', 'image' => 'coin.png', 'count' => '5x', 'points' => 100],
                ['name' => 'Fire sword', 'image' => 'firesword.png', 'count' => '1x', 'points' => 10],
            ],
            'premium' => [
                ['name' => 'Premium membership', 'image' => 'premium.png', 'duration' => '7 Days', 'points' => 25],
            ],
            'outfits' => [
                ['name' => 'Nobleman with both addons', 'image' => 'nobleman.png', 'points' => 20],
                ['name' => 'Noblewoman with both addons', 'image' => 'noblewoman.png', 'points' => 20],
            ],
            'mounts' => [
                ['name' => 'Gnarhound mount', 'image' => 'gnarhound.png', 'points' => 20],
                ['name' => 'War horse', 'image' => 'warhorse.png', 'points' => 20],
            ],
            'misc' => [
                ['name' => 'Change character gender', 'count' => '3x', 'points' => 10],
                ['name' => 'Change character gender', 'count' => 'Unlimited', 'points' => 20],
                ['name' => 'Change character name', 'count' => '1x', 'points' => 20],
            ],
        ];
        return view('shop.index', compact('offers'));
    }
}
