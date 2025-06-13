<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteNews extends Model
{
    protected $table = 'znote_news';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'text',
        'date',
        'pid',
    ];
}
