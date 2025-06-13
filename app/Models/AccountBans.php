<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountBans extends Model
{
    protected $fillable = [
        'account_id',
        'reason',
        'banned_at',
        'expires_at',
        'banned_by',
    ];
}
