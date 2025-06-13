<?php

namespace App\Http\Controllers;

use App\Models\ZnotePlayers;
use Illuminate\Http\Request;

class ZnotePlayersController extends Controller
{
    public function index()
    {
        return ZnotePlayers::all();
    }

    public function show($id)
    {
        return ZnotePlayers::findOrFail($id);
    }
}
