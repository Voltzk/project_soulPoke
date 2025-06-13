<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnotePaygol extends Model
{
    protected $table = 'znote_paygol';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'account_id',
        'price',
        'points',
        'message_id',
        'service_id',
        'shortcode',
        'keyword',
        'message',
        'sender',
        'operator',
        'country',
        'currency',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}
