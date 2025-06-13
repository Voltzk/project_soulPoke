<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'houses';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'owner',
        'paid',
        'warnings',
        'name',
        'rent',
        'town_id',
        'bid',
        'bid_end',
        'last_bid',
        'highest_bidder',
        'size',
        'beds',
    ];
}
