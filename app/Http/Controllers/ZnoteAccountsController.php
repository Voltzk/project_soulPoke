<?php

namespace App\Http\Controllers;

use App\Models\ZnoteAccounts;
use Illuminate\Http\Request;

class ZnoteAccountsController extends Controller
{
    public function index()
    {
        return ZnoteAccounts::all();
    }

    public function show($id)
    {
        return ZnoteAccounts::findOrFail($id);
    }
}
