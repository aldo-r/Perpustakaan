<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
    ];

    public function books()
    {
        return $this->hasMany(books::class);
    }
}
