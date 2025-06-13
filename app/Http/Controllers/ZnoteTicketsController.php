<?php

namespace App\Http\Controllers;

use App\Models\ZnoteTickets;
use Illuminate\Http\Request;

class ZnoteTicketsController extends Controller
{
    public function index()
    {
        return ZnoteTickets::all();
    }

    public function show($id)
    {
        return ZnoteTickets::findOrFail($id);
    }
}
