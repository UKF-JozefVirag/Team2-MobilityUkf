<?php

namespace App\Http\Controllers\Ucastnik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VyzvyController extends Controller
{
    public function index(){
        var_dump(22);
        return view('ucastnik.index');
    }
}
