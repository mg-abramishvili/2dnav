<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'x_01', 'y_01'
    ];

    //protected $casts=['tag_id'=>'json'];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function schemes()
    {
        return $this->belongsToMany('App\Models\Scheme');
    }

    public function routes()
    {
        return $this->belongsToMany('App\Models\Route');
    }

    public function specials()
    {
        return $this->belongsToMany('App\Models\Special');
    }
}
