<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Player;

class CharacterController extends Controller
{
    public function showCreateForm()
    {
        return view('createcharacter');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:players,name',
            'sex' => 'required|integer',
        ]);

        Player::create([
            'name' => $request->name,
            'account_id' => Auth::user()->id,
            'group_id' => 1,
            'level' => 1,
            'vocation' => 0,
            'health' => 960,
            'healthmax' => 960,
            'experience' => 0,
            'lookbody' => 68,
            'lookfeet' => 76,
            'lookhead' => 78,
            'looklegs' => 58,
            'looktype' => 1970,
            'lookaddons' => 0,
            'maglevel' => 0,
            'mana' => 75,
            'manamax' => 75,
            'manaspent' => 0,
            'soul' => 100,
            'town_id' => 34,
            'posx' => 1055,
            'posy' => 1048,
            'posz' => 7,
            'conditions' => '',
            'cap' => 6,
            'sex' => $request->sex,
            'lastlogin' => 0,
            'lastip' => 0,
            'save' => 1,
            'skull' => 0,
            'skulltime' => 0,
            'lastlogout' => 0,
            'blessings' => 0,
            'onlinetime' => 0,
            'deletion' => 0,
            'balance' => 0,
            'offlinetraining_time' => 43200,
            'offlinetraining_skill' => -1,
            'stamina' => 2520,
            'skill_fist' => 10,
            'skill_fist_tries' => 0,
            'skill_club' => 10,
            'skill_club_tries' => 0,
            'skill_sword' => 10,
            'skill_sword_tries' => 0,
            'skill_axe' => 10,
            'skill_axe_tries' => 0,
            'skill_dist' => 10,
            'skill_dist_tries' => 0,
            'skill_shielding' => 10,
            'skill_shielding_tries' => 0,
            'skill_fishing' => 10,
            'skill_fishing_tries' => 0,
        ]);

        return redirect()->route('myaccount')->with('success', 'Character created successfully!');
    }
}
