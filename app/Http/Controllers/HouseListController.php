<?php

namespace App\Http\Controllers;

use App\Models\HouseList;
use Illuminate\Http\Request;

class HouseListController extends Controller
{
    public function index()
    {
        return HouseList::all();
    }

    public function show($id)
    {
        return HouseList::findOrFail($id);
    }
}
