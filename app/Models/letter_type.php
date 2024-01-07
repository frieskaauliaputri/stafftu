<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class letter_type extends Model
{
    
    protected $fillable = [
        'letter_code',
        'name_type'
    ];

    use HasFactory;
    public function letter()
    {
        return $this->hasMany
        (Letter::class);
    }
}