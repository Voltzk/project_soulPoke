<?php

namespace App\Http\Controllers;

use App\Models\ZnotePaypal;
use Illuminate\Http\Request;

class ZnotePaypalController extends Controller
{
    public function index()
    {
        return ZnotePaypal::all();
    }

    public function show($id)
    {
        return ZnotePaypal::findOrFail($id);
    }
}
