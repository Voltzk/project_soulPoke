<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteForumThreads extends Model
{
    protected $table = 'znote_forum_threads';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'forum_id',
        'player_id',
        'player_name',
        'title',
        'text',
        'created',
        'updated',
        'sticky',
        'hidden',
        'closed',
    ];

    public function forum()
    {
        return $this->belongsTo(ZnoteForum::class, 'forum_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(ZnoteForumPosts::class, 'thread_id', 'id');
    }
}
