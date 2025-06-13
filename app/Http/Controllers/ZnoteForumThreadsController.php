<?php

namespace App\Http\Controllers;

use App\Models\ZnoteForumThreads;
use Illuminate\Http\Request;

class ZnoteForumThreadsController extends Controller
{
    public function index()
    {
        return ZnoteForumThreads::all();
    }

    public function show($id)
    {
        return ZnoteForumThreads::findOrFail($id);
    }
}
