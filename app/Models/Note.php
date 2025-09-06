<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;

class Note extends Authenticatable
{
    protected $connection = "mongodb";
    protected $table = "notes";

    protected $fillable = [
        'user_id',
        'name',
        'note',
        'color',
        'tags'
    ];

    protected $casts = [
        'tags'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
