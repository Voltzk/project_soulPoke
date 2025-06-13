<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteVisitorsDetails extends Model
{
    protected $table = 'znote_visitors_details';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'ip',
        'time',
        'type',
        'account_id',
    ];
}
