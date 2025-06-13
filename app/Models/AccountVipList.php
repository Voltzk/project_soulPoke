<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountVipList extends Model
{
    protected $table = 'account_viplist';
    public $timestamps = false;
    protected $fillable = [
        'account_id',
        'player_id',
        'description',
        'icon',
        'notify',
    ];
}
