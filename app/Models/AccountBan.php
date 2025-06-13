<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountBan extends Model
{
    protected $table = 'account_bans';
    public $timestamps = false;
    protected $fillable = [
        'account_id', 'reason', 'banned_by', // adicione outros campos conforme o banco
    ];
}
