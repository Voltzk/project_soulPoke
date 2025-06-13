<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnotePaypal extends Model
{
    protected $table = 'znote_paypal';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'txn_id',
        'email',
        'accid',
        'price',
        'points',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'accid', 'id');
    }
}
