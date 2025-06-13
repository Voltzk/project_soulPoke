<?php

namespace App\Http\Controllers;

use App\Models\ZnoteShopOrders;
use Illuminate\Http\Request;

class ZnoteShopOrdersController extends Controller
{
    public function index()
    {
        return ZnoteShopOrders::all();
    }

    public function show($id)
    {
        return ZnoteShopOrders::findOrFail($id);
    }
}
