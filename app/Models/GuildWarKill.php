<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuildWarKill extends Model
{
    protected $table = 'guildwar_kills';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'killer',
        'target',
        'killerguild',
        'targetguild',
        'warid',
        'time',
    ];
}
