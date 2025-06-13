<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    protected $table = 'guilds';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'ownerid',
        'creationdata',
        'motd',
    ];
}
