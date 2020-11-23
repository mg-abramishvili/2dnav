<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
    ];

    public function marks()
    {
        return $this->belongsToMany('App\Models\Mark');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
