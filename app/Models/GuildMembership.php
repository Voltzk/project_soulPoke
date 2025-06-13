<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuildMembership extends Model
{
    protected $table = 'guild_membership';
    public $timestamps = false;
    protected $fillable = [
        'player_id',
        'guild_id',
        'rank_id',
        'nick',
    ];
}
