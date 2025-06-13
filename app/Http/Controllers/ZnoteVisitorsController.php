<?php

namespace App\Http\Controllers;

use App\Models\ZnoteVisitors;
use Illuminate\Http\Request;

class ZnoteVisitorsController extends Controller
{
    public function index()
    {
        return ZnoteVisitors::all();
    }

    public function show($id)
    {
        return ZnoteVisitors::findOrFail($id);
    }
}
