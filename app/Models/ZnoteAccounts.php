<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteAccounts extends Model
{
    protected $table = 'znote_accounts';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'account_id',
        'ip',
        'created',
        'points',
        'cooldown',
        'active',
        'activekey',
        'flag',
        'secret',
    ];

    public function shopOrders()
    {
        return $this->hasMany(ZnoteShopOrders::class, 'account_id', 'account_id');
    }

    public function shopLogs()
    {
        return $this->hasMany(ZnoteShopLogs::class, 'account_id', 'account_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}
