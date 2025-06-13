<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseList extends Model
{
    protected $table = 'house_lists';
    public $timestamps = false;
    protected $fillable = [
        'house_id',
        'listid',
        'list',
    ];
}
