<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'icon'
    ];

    public function store()
    {
        return $this->belongsToMany('App\Models\Store');
    }

    public function markimages()
    {
        return $this->belongsToMany('App\Models\MarkImage');
    }
}
