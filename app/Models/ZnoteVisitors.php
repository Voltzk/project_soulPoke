<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteVisitors extends Model
{
    protected $table = 'znote_visitors';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'ip',
        'value',
    ];
}
