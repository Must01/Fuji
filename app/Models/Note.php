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
        'custom_color',
        'text_color',
        'tags'
    ];

    protected $casts = [
        'tags'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBgStyleAttribute(): string
    {
        $bg = $this->custom_color ?? null;
        return $bg ? "background-color: {$bg};" : '';
    }

    public function getTextClassAttribute(): string
    {
        if (!empty($this->text_color)) {
            return $this->text_color; // 'text-white' or 'text-black' stored in DB
        }

        if ($this->custom_color) {
            return pickTextColor($this->custom_color); // fallback compute
        }

        // fallback for named tailwind bg colors
        return 'text-black';
    }

    public function getTextColorValueAttribute(): string
    {
        // returns hex color string to use in inline style
        return ($this->text_class === 'text-white') ? '#ffffff' : '#000000';
    }

    public function getButtonBgAttribute(): string
    {
        // subtle translucent contrast background for buttons
        return ($this->text_class === 'text-white') ? 'rgba(255,255,255,0.12)' : 'rgba(0,0,0,0.08)';
    }
}
