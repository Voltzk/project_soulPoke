<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuildInvite extends Model
{
    protected $table = 'guild_invites';
    public $timestamps = false;
    protected $fillable = [
        'player_id',
        'guild_id',
    ];
}
