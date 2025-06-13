<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnotePlayers extends Model
{
    protected $table = 'znote_players';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'player_id',
        'created',
        'hide_char',
        'comment',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id', 'id');
    }
}
