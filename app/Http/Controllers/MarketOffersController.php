<?php

namespace App\Http\Controllers;

use App\Models\MarketOffers;
use Illuminate\Http\Request;

class MarketOffersController extends Controller
{
    public function index()
    {
        return MarketOffers::all();
    }

    public function show($id)
    {
        return MarketOffers::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $marketOffer = MarketOffers::create($data);
        return response()->json($marketOffer, 201);
    }

    public function update(Request $request, $id)
    {
        $marketOffer = MarketOffers::findOrFail($id);
        $marketOffer->update($request->all());
        return response()->json($marketOffer);
    }

    public function destroy($id)
    {
        $marketOffer = MarketOffers::findOrFail($id);
        $marketOffer->delete();
        return response()->json(null, 204);
    }
}
