<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteShop extends Model
{
    protected $table = 'znote_shop';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'type',
        'itemid',
        'count',
        'description',
        'points',
    ];
}
