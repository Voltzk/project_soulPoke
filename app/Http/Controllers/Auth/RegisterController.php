<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            Log::debug('Register request data:', $request->all());

            $request->validate([
                'name' => 'required|string|unique:accounts,name',
                'email' => 'required|email|unique:accounts,email',
                'password' => 'required|string|min:4|confirmed',
            ]);

            $account = Account::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => sha1($request->password),
            ]);

            Log::debug('Account created:', $account->toArray());

            return redirect('/')->with('success', 'Conta criada com sucesso!');
        } catch (\Exception $e) {
            Log::error('Register error: ' . $e->getMessage());
            return back()->withErrors(['register' => 'Erro ao criar conta: ' . $e->getMessage()]);
        }
    }
}
