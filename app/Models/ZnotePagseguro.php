<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnotePagseguro extends Model
{
    protected $table = 'znote_pagseguro';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'transaction',
        'account',
        'price',
        'points',
        'payment_status',
        'completed',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account', 'id');
    }
}
