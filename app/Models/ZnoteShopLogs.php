<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteShopLogs extends Model
{
    protected $table = 'znote_shop_logs';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'account_id',
        'type',
        'itemid',
        'count',
        'points',
        'time',
    ];

    public function account()
    {
        return $this->belongsTo(ZnoteAccounts::class, 'account_id', 'account_id');
    }
}
