<?php

namespace App\Http\Controllers;

use App\Models\AccountVipList;
use Illuminate\Http\Request;

class AccountVipListController extends Controller
{
    public function index()
    {
        return AccountVipList::all();
    }

    public function show($id)
    {
        return AccountVipList::findOrFail($id);
    }
}
