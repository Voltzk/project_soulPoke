<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnotePagseguroNotifications extends Model
{
    protected $table = 'znote_pagseguro_notifications';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'notification_code',
        'details',
        'receive_at',
    ];
}
