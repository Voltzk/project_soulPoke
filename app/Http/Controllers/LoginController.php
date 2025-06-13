<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return response()->json(['message' => 'Login form endpoint']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $account = Account::where('name', $request->name)->first();
        if (!$account || !Hash::check($request->password, $account->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
        if ($account->type === 'admin_blocked') {
            return response()->json(['error' => 'Account blocked by admin'], 403);
        }
        Auth::login($account);
        $request->session()->regenerate();
        return response()->json(['message' => 'Login successful']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Logged out']);
    }
}