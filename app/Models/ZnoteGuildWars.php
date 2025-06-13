<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteGuildWars extends Model
{
    protected $table = 'znote_guild_wars';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'limit',
    ];

    public function guildWar()
    {
        return $this->belongsTo(GuildWar::class, 'id', 'id');
    }
}
