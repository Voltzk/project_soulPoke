<?php

namespace App\Http\Controllers;

use App\Models\ZnoteGlobalStorage;
use Illuminate\Http\Request;

class ZnoteGlobalStorageController extends Controller
{
    public function index()
    {
        return ZnoteGlobalStorage::all();
    }

    public function show($key)
    {
        return ZnoteGlobalStorage::findOrFail($key);
    }
}
