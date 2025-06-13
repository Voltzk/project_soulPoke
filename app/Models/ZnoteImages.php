<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteImages extends Model
{
    protected $table = 'znote_images';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'desc',
        'date',
        'status',
        'image',
        'account_id',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}
