<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return Account::all();
    }

    public function show($id)
    {
        return Account::findOrFail($id);
    }

    public function myAccount()
    {
    $account = Auth::user();
    $characters = Player::where('account_id', $account->id)->get();

    return view('myaccount', compact('account', 'characters'));
    }

    public function handleAction(Request $request)
    {
        $action = $request->input('action');
        $selectedCharacter = $request->input('selected_character');

        if ($action === 'delete_character') {
            $character = Player::where('name', $selectedCharacter)
                               ->where('account_id', Auth::id())
                               ->first();

            if ($character) {
                $character->delete();
                return redirect()->route('myaccount')->with('success', 'Character deleted.');
            } else {
                return redirect()->route('myaccount')->with('error', 'Character not found or unauthorized.');
            }
        }

        return redirect()->route('myaccount')->with('info', 'Action not implemented yet.');
    }

    public function updateAccount(Request $request)
    {
        $account = Auth::user();
        $account->name = $request->input('name');
        $account->email = $request->input('email');
        // Add other fields as necessary
        $account->save();

        return redirect()->route('myaccount')->with('success', 'Account updated successfully.');
    }
}
