<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return response()->json(['message' => 'Register form endpoint']);
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|unique:accounts,name',
                'email' => 'required|email|unique:accounts,email',
                'password' => 'required|string|min:4|confirmed',
                'country' => 'required|string',
                'rules_agree' => 'required|in:1',
            ], [
                'rules_agree.in' => 'Você deve concordar com as regras do servidor para se registrar.'
            ]);

            $account = Account::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => sha1($request->password),
                'creation' => now()->timestamp,
                'flag' => $request->country,
            ]);

            return redirect('/')->with('success', 'Conta criada com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['register' => 'Erro ao criar conta: ' . $e->getMessage()]);
        }
    }
}
