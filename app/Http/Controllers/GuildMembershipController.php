<?php

namespace App\Http\Controllers;

use App\Models\GuildMembership;
use Illuminate\Http\Request;

class GuildMembershipController extends Controller
{
    public function index()
    {
        return GuildMembership::all();
    }

    public function show($id)
    {
        return GuildMembership::findOrFail($id);
    }
}
