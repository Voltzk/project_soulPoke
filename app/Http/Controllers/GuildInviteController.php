<?php

namespace App\Http\Controllers;

use App\Models\GuildInvite;
use Illuminate\Http\Request;

class GuildInviteController extends Controller
{
    public function index()
    {
        return GuildInvite::all();
    }

    public function show($id)
    {
        return GuildInvite::findOrFail($id);
    }
}
