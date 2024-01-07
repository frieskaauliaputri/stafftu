<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $fillable = [
        'letter_type_id',
        'letter_perihal',
        'recipients',
        // 'content',
        // 'attacment',
        'notulis',
        
    ];
    use HasFactory;

    public function result()
    {
        return $this->hasMany
        (Result::class);
    }
    public function user()
    {
        return $this->belongsTo
        (User::class);
    }
    public function letter_type()
    {
        return $this->belongsTo
        (letter_type::class);
    }
}

