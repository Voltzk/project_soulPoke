<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function show()
    {
        return view('settings');
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'country' => 'required|string',
        ]);

        $user = Auth::user();
        $user->email = $request->email;
        $user->flag = $request->country;
        $user->save();

        return back()->with('success', 'Settings updated successfully!');
    }
}
