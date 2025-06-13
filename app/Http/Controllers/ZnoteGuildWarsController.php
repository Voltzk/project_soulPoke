<?php

namespace App\Http\Controllers;

use App\Models\ZnoteGuildWars;
use Illuminate\Http\Request;

class ZnoteGuildWarsController extends Controller
{
    public function index()
    {
        return ZnoteGuildWars::all();
    }

    public function show($id)
    {
        return ZnoteGuildWars::findOrFail($id);
    }
}
