<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteGlobalStorage extends Model
{
    protected $table = 'znote_global_storage';
    public $timestamps = false;
    protected $primaryKey = 'key';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'key',
        'value',
    ];
}
