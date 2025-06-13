<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteForum extends Model
{
    protected $table = 'znote_forum';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'access',
        'closed',
        'hidden',
        'guild_id',
    ];

    public function threads()
    {
        return $this->hasMany(ZnoteForumThreads::class, 'forum_id', 'id');
    }
}
