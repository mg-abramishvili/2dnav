<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Scheme;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function schemes()
    {
        return Scheme::all();
    }

    public function banners()
    {
        return Ad::all();
    }
}
