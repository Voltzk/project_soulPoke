<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    protected $table = 'accounts';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Adicione os campos que podem ser preenchidos em massa
    protected $fillable = [
        'name',
        'password',
        'secret',
        'type',
        'premdays',
        'lastday',
        'email',
        'creation',
        'flag', // país
    ];
}
