<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Store', 'tag_id', 'id');
    }
}
