<?php

namespace App\Http\Controllers;

use App\Models\ZnoteTicketsReplies;
use Illuminate\Http\Request;

class ZnoteTicketsRepliesController extends Controller
{
    public function index()
    {
        return ZnoteTicketsReplies::all();
    }

    public function show($id)
    {
        return ZnoteTicketsReplies::findOrFail($id);
    }
}
