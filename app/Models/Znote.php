<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Znote extends Model
{
    protected $table = 'znote';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'version',
        'installed',
        'cached',
    ];

    public function accounts()
    {
        return $this->hasMany(ZnoteAccounts::class, 'account_id', 'id');
    }
}
