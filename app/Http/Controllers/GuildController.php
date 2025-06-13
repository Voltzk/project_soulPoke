<?php

namespace App\Http\Controllers;

use App\Models\Guild;
use Illuminate\Http\Request;

class GuildController extends Controller
{
    public function index()
    {
        return Guild::all();
    }

    public function show($id)
    {
        return Guild::findOrFail($id);
    }
}
