<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'title', 'cover', 'year'];

    public function author()
    {
        return $this->belongsTo(authors::class);
    }
    public function publisher()
    {
        return $this->belongsTo(publisher::class);
    }
}
