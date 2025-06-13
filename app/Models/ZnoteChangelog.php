<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteChangelog extends Model
{
    protected $table = 'znote_changelog';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'text',
        'time',
        'report_id',
        'status',
    ];
}
