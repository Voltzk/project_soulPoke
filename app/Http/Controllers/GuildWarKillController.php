<?php

namespace App\Http\Controllers;

use App\Models\GuildWarKill;
use Illuminate\Http\Request;

class GuildWarKillController extends Controller
{
    public function index()
    {
        return GuildWarKill::all();
    }

    public function show($id)
    {
        return GuildWarKill::findOrFail($id);
    }
}
