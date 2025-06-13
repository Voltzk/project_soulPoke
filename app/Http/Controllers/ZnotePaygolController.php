<?php

namespace App\Http\Controllers;

use App\Models\ZnotePaygol;
use Illuminate\Http\Request;

class ZnotePaygolController extends Controller
{
    public function index()
    {
        return ZnotePaygol::all();
    }

    public function show($id)
    {
        return ZnotePaygol::findOrFail($id);
    }
}
