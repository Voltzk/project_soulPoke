<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteTickets extends Model
{
    protected $table = 'znote_tickets';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'owner',
        'username',
        'subject',
        'message',
        'ip',
        'creation',
        'status',
    ];

    public function replies()
    {
        return $this->hasMany(ZnoteTicketsReplies::class, 'tid', 'id');
    }
}
