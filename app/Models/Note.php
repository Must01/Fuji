<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;

class Note extends Authenticatable
{
    protected $connection = "mongodb";
    protected $table = "notes";

    protected $fillable = [
        'name',
        'note',
        'color',
        'tag'
    ];

    protected $casts = [
        'tag'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
