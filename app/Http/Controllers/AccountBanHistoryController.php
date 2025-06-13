<?php

namespace App\Http\Controllers;

use App\Models\AccountBanHistory;
use Illuminate\Http\Request;

class AccountBanHistoryController extends Controller
{
    public function index()
    {
        return AccountBanHistory::all();
    }

    public function show($id)
    {
        return AccountBanHistory::findOrFail($id);
    }
}
