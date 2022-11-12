<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VyzvyController extends Controller
{
    public function index(){
        // ak ma user rolu 3 tak redirect inak 403
        if (Auth::user()->hasRole('3')) {
            return view('admin.index');


        }

        else return response('503', 503);
    }
}
