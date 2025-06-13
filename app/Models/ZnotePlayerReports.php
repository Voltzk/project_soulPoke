<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnotePlayerReports extends Model
{
    protected $table = 'znote_player_reports';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'posx',
        'posy',
        'posz',
        'report_description',
        'date',
        'status',
    ];
}
