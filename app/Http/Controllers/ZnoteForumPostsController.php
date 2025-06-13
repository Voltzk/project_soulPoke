<?php

namespace App\Http\Controllers;

use App\Models\ZnoteForumPosts;
use Illuminate\Http\Request;

class ZnoteForumPostsController extends Controller
{
    public function index()
    {
        return ZnoteForumPosts::all();
    }

    public function show($id)
    {
        return ZnoteForumPosts::findOrFail($id);
    }
}
