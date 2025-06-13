<?php

namespace App\Http\Controllers;

use App\Models\ZnoteChangelog;
use Illuminate\Http\Request;

class ZnoteChangelogController extends Controller
{
    public function index()
    {
        return ZnoteChangelog::all();
    }

    public function show($id)
    {
        return ZnoteChangelog::findOrFail($id);
    }
}
