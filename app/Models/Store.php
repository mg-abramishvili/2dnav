<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    //protected $casts=['tag_id'=>'json'];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function routes()
    {
        return $this->hasMany('App\Models\Route', 'store_id', 'id');
    }

    public function routes02()
    {
        return $this->hasMany('App\Models\Route02', 'store_id', 'id');
    }
}
