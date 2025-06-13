<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountBanHistory extends Model
{
    protected $table = 'account_ban_history';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'account_id',
        'reason',
        'banned_at',
        'expired_at',
        'banned_by',
    ];
}
