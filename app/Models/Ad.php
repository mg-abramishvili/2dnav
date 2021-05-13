<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'adfile'
    ];

    public function stores()
    {
        return $this->belongsToMany('App\Models\Store');
    }
}
