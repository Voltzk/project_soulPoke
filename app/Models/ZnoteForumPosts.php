<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteForumPosts extends Model
{
    protected $table = 'znote_forum_posts';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'thread_id',
        'player_id',
        'player_name',
        'text',
        'created',
        'updated',
    ];

    public function thread()
    {
        return $this->belongsTo(ZnoteForumThreads::class, 'thread_id', 'id');
    }
}
