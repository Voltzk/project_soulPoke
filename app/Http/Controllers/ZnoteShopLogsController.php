<?php

namespace App\Http\Controllers;

use App\Models\ZnoteShopLogs;
use Illuminate\Http\Request;

class ZnoteShopLogsController extends Controller
{
    public function index()
    {
        return ZnoteShopLogs::all();
    }

    public function show($id)
    {
        return ZnoteShopLogs::findOrFail($id);
    }
}
