<?php

namespace App\Http\Controllers;

use App\Models\ZnotePagseguro;
use Illuminate\Http\Request;

class ZnotePagseguroController extends Controller
{
    public function index()
    {
        return ZnotePagseguro::all();
    }

    public function show($id)
    {
        return ZnotePagseguro::findOrFail($id);
    }
}
