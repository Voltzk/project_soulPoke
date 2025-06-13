<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuildWar extends Model
{
    protected $table = 'guild_wars';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'guild1',
        'guild2',
        'name1',
        'name2',
        'status',
        'started',
        'ended',
    ];
}
