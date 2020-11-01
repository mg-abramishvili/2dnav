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

    protected $casts=['tag_id'=>'json'];

    public function tags()
    {
        return $this->hasMany('App\Models\Tag', 'id', 'tag_id');
    }
}
