<?php

namespace App\Http\Controllers;

use App\Models\GuildRank;
use Illuminate\Http\Request;

class GuildRankController extends Controller
{
    public function index()
    {
        return GuildRank::all();
    }

    public function show($id)
    {
        return GuildRank::findOrFail($id);
    }
}
