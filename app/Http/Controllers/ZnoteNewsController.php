<?php

namespace App\Http\Controllers;

use App\Models\ZnoteNews;
use Illuminate\Http\Request;

class ZnoteNewsController extends Controller
{
    public function index()
    {
        return ZnoteNews::all();
    }

    public function show($id)
    {
        return ZnoteNews::findOrFail($id);
    }
}
