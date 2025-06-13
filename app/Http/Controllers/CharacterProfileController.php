<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CharacterProfileController extends Controller
{
    public function show(Request $request)
    {
        $name = $request->query('name', null); // Garante que $name sempre existe
        $player = null;
        if ($name) {
            $player = DB::table('players')->where('name', $name)->first();
        }
        // Sempre passa as duas variáveis para a view
        return view('characterprofile', compact('player', 'name'));
    }
}
