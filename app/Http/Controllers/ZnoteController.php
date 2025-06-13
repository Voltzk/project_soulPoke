<?php

namespace App\Http\Controllers;

use App\Models\Znote;
use Illuminate\Http\Request;

class ZnoteController extends Controller
{
    public function index()
    {
        return Znote::all();
    }

    public function show($id)
    {
        return Znote::findOrFail($id);
    }
}
