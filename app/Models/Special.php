<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    use HasFactory;

    public function stores()
    {
        return $this->belongsToMany('App\Models\Store');
    }
}
