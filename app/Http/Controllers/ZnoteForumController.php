<?php

namespace App\Http\Controllers;

use App\Models\ZnoteForum;
use Illuminate\Http\Request;

class ZnoteForumController extends Controller
{
    public function index()
    {
        return ZnoteForum::all();
    }

    public function show($id)
    {
        return ZnoteForum::findOrFail($id);
    }
}
