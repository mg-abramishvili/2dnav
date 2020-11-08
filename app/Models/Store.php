<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'tag_id'
    ];

    public function tags()
    {
        return $this->hasMany('App\Models\Tag', 'id', 'tag_id');
    }

    public function routes()
    {
        return $this->hasMany('App\Models\Route', 'store_id', 'id');
    }
}
