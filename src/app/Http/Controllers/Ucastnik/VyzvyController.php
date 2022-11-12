<?php

namespace App\Http\Controllers\Ucastnik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VyzvyController extends Controller
{

    public function index(){
        return view('ucastnik.index');
    }
}
