<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kiosk extends Model
{
    use HasFactory;

    public function schemes()
    {
        return $this->belongsToMany('App\Models\Scheme');
    }
}
