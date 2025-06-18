<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopOffer;
use App\Models\Account;

class ShopController extends Controller
{
    public function index()
    {
        // Busca ofertas do banco de dados
        $offers = ShopOffer::all()->groupBy('type');
        return view('shop.index', compact('offers'));
    }

    public function purchase(Request $request, $id)
    {
        $offer = ShopOffer::findOrFail($id);
        $account = auth()->user()->account;

        if ($account->points < $offer->cost) {
            return back()->with('error', 'Not enough points.');
        }

        // Desconta pontos
        $account->points -= $offer->cost;

        // Se for oferta de points, adiciona points
        if ($offer->type === 'points') {
            $account->points += $offer->value;
        }
        // Se for oferta de item, lógica para entregar item pode ser implementada aqui
        // ...

        $account->save();

        return back()->with('success', 'Offer purchased!');
    }
}
