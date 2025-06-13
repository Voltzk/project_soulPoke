<?php

namespace App\Http\Controllers;

use App\Models\ZnoteVisitorsDetails;
use Illuminate\Http\Request;

class ZnoteVisitorsDetailsController extends Controller
{
    public function index()
    {
        return ZnoteVisitorsDetails::all();
    }

    public function show($id)
    {
        return ZnoteVisitorsDetails::findOrFail($id);
    }
}
