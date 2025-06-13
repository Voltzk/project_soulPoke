<?php

namespace App\Http\Controllers;

use App\Models\ZnotePagseguroNotifications;
use Illuminate\Http\Request;

class ZnotePagseguroNotificationsController extends Controller
{
    public function index()
    {
        return ZnotePagseguroNotifications::all();
    }

    public function show($id)
    {
        return ZnotePagseguroNotifications::findOrFail($id);
    }
}
