<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuildRank extends Model
{
    protected $table = 'guild_ranks';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'guild_id',
        'name',
        'level',
    ];
}
