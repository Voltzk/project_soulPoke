<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Player;
use App\Models\Account;

class ServerInfoController extends Controller
{
    public function highscores()
    {
        // Top 10 players by level
        $players = Player::orderBy('level', 'desc')->limit(10)->get(['id', 'name', 'level']);
        // Total registered accounts
        $accountsCount = Account::count();
        return response()->json([
            'highscores' => $players,
            'accounts_count' => $accountsCount,
        ]);
    }

    public function status()
    {
        try {
            DB::connection()->getPdo();
            return response()->json(['online' => true]);
        } catch (\Exception $e) {
            return response()->json(['online' => false]);
        }
    }
}
