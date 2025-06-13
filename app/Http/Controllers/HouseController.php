<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        return House::all();
    }

    public function show($id)
    {
        return House::findOrFail($id);
    }
}
