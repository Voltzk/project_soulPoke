<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteDeletedCharacters extends Model
{
    protected $table = 'znote_deleted_characters';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'original_account_id',
        'character_name',
        'time',
        'done',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'original_account_id', 'id');
    }
}
