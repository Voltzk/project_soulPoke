<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Substitua pelo model correto se não for News
use App\Models\ZnoteNews;
use App\Models\Player;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $news = ZnoteNews::orderBy('date', 'desc')->get();
        $topPlayers = Player::orderBy('level', 'desc')->limit(5)->get(['name', 'level']);
        $registeredAccounts = Account::count();
        // Verifica se o banco está online
        try {
            DB::connection()->getPdo();
            $serverOnline = true;
        } catch (\Exception $e) {
            $serverOnline = false;
        }
        return view('welcome', compact('news', 'topPlayers', 'registeredAccounts', 'serverOnline'));
    }
}
