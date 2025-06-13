<?php

namespace App\Http\Controllers;

use App\Models\PlayerItems;
use Illuminate\Http\Request;

class PlayerItemsController extends Controller
{
    public function index()
    {
        return PlayerItems::all();
    }

    public function show($id)
    {
        return PlayerItems::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $playerItem = PlayerItems::create($data);
        return response()->json($playerItem, 201);
    }

    public function update(Request $request, $id)
    {
        $playerItem = PlayerItems::findOrFail($id);
        $playerItem->update($request->all());
        return response()->json($playerItem);
    }

    public function destroy($id)
    {
        $playerItem = PlayerItems::findOrFail($id);
        $playerItem->delete();
        return response()->json(null, 204);
    }
}
