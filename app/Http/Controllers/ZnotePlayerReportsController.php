<?php

namespace App\Http\Controllers;

use App\Models\ZnotePlayerReports;
use Illuminate\Http\Request;

class ZnotePlayerReportsController extends Controller
{
    public function index()
    {
        return ZnotePlayerReports::all();
    }

    public function show($id)
    {
        return ZnotePlayerReports::findOrFail($id);
    }
}
