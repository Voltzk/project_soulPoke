<?php

namespace App\Http\Controllers;

use App\Models\PlayerDeaths;
use Illuminate\Http\Request;

class PlayerDeathsController extends Controller
{
    public function index()
    {
        return PlayerDeaths::all();
    }

    public function show($id)
    {
        return PlayerDeaths::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $playerDeath = PlayerDeaths::create($data);
        return response()->json($playerDeath, 201);
    }

    public function update(Request $request, $id)
    {
        $playerDeath = PlayerDeaths::findOrFail($id);
        $playerDeath->update($request->all());
        return response()->json($playerDeath);
    }

    public function destroy($id)
    {
        $playerDeath = PlayerDeaths::findOrFail($id);
        $playerDeath->delete();
        return response()->json(null, 204);
    }
}
