<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image',
    ];

    public function marks()
    {
        return $this->hasMany('App\Models\Mark', 'scheme_id', 'id');
    }

    public function store()
    {
        return $this->belongsToMany('App\Models\Store');
    }

    public function kiosks()
    {
        return $this->belongsToMany('App\Models\Kiosk');
    }
}
