<?php

namespace App\Http\Controllers;

use App\Models\ZnoteImages;
use Illuminate\Http\Request;

class ZnoteImagesController extends Controller
{
    public function index()
    {
        return ZnoteImages::all();
    }

    public function show($id)
    {
        return ZnoteImages::findOrFail($id);
    }
}
