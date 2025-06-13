<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            Log::debug('Login request data:', $request->all());

            $request->validate([
                'name' => 'required|string',
                'password' => 'required|string',
            ]);

            $account = Account::where('name', $request->name)
                ->where('password', sha1($request->password))
                ->first();

            Log::debug('Account found:', $account ? $account->toArray() : []);

            if (!$account) {
                return back()->withErrors(['login' => 'Credenciais inválidas.']);
            }

            Auth::login($account);
            return redirect()->route('myaccount');
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return back()->withErrors(['login' => 'Erro ao fazer login: ' . $e->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
