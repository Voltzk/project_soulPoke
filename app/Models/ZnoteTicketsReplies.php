<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZnoteTicketsReplies extends Model
{
    protected $table = 'znote_tickets_replies';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'tid',
        'username',
        'message',
        'created',
    ];

    public function ticket()
    {
        return $this->belongsTo(ZnoteTickets::class, 'tid', 'id');
    }
}
