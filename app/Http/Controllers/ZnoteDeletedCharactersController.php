<?php

namespace App\Http\Controllers;

use App\Models\ZnoteDeletedCharacters;
use Illuminate\Http\Request;

class ZnoteDeletedCharactersController extends Controller
{
    public function index()
    {
        return ZnoteDeletedCharacters::all();
    }

    public function show($id)
    {
        return ZnoteDeletedCharacters::findOrFail($id);
    }
}
